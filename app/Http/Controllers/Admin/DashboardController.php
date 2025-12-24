<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Program;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_students' => User::where('role', 'student')->count(),
            'pending_admissions' => Admission::where('status', 'pending')->count(),
            'total_programs' => Program::count(),
            'total_admissions' => Admission::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
