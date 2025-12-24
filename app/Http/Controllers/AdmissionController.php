<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{
    /**
     * Show the student dashboard.
     */
    public function dashboard()
    {
        $user = Auth::user();
        // Get the latest admission for this user
        $admission = Admission::where('user_id', $user->id)->with('program')->latest()->first();
        $programs = Program::where('is_active', true)->get();

        return view('admission.dashboard', compact('admission', 'programs'));
    }

    /**
     * Show the program catalog within the portal.
     */
    public function programs()
    {
        $programs = Program::where('is_active', true)->get();
        return view('admission.programs', compact('programs'));
    }

    /**
     * Show the admission registration form.
     */
    public function showRegistrationForm(Request $request)
    {
        $selectedProgramId = $request->query('program');
        $programs = Program::where('is_active', true)->get();

        return view('admission.register', compact('programs', 'selectedProgramId'));
    }

    /**
     * Handle the admission registration submission.
     */
    public function submitRegistration(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'ktp_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ijazah_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'notes' => 'nullable|string',
        ]);

        $documents = [];
        if ($request->hasFile('ktp_path')) {
            $documents['ktp'] = $request->file('ktp_path')->store('admissions/ktp', 'public');
        }
        if ($request->hasFile('ijazah_path')) {
            $documents['ijazah'] = $request->file('ijazah_path')->store('admissions/ijazah', 'public');
        }

        Admission::create([
            'user_id' => Auth::id(),
            'program_id' => $request->program_id,
            'status' => 'pending',
            'payment_status' => 'unpaid',
            'documents' => json_encode($documents),
            'notes' => $request->notes,
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Pendaftaran Anda berhasil dikirim! Silakan tunggu verifikasi tim kami.');
    }

    /**
     * Show announcements for students.
     */
    public function announcements()
    {
        $posts = \App\Models\Post::where('is_published', true)->latest()->get();
        return view('admission.announcements', compact('posts'));
    }

    /**
     * Show the student's personal schedule.
     */
    public function schedule()
    {
        $admission = Admission::where('user_id', Auth::id())->with('program')->latest()->first();
        return view('admission.schedule', compact('admission'));
    }

    /**
     * Show the profile edit page.
     */
    public function profile()
    {
        $user = Auth::user();
        return view('admission.profile', compact('user'));
    }

    /**
     * Update student profile.
     */
    public function updateProfile(Request $request)
    {
        $user = \App\Models\User::find(Auth::id());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profil Anda berhasil diperbarui.');
    }
}
