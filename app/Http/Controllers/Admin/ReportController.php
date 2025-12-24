<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $stats = $this->getStats();
        return view('admin.reports.index', compact('stats'));
    }

    public function rekap()
    {
        $stats = $this->getStats();
        $admissions = Admission::with(['user', 'program'])->latest()->get();
        return view('admin.reports.rekap', compact('stats', 'admissions'));
    }

    public function exportCSV()
    {
        $headers = [
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=Laporan_LKP_Abqary_' . date('Y-m-d') . '.csv',
            'Expires' => '0',
            'Pragma' => 'public',
        ];

        $admissions = Admission::with(['user', 'program'])->latest()->get();

        $callback = function () use ($admissions) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['No', 'Nama Siswa', 'Program', 'Status Dokumen', 'Status Pembayaran', 'Tanggal Daftar']);

            foreach ($admissions as $idx => $admission) {
                fputcsv($file, [
                    $idx + 1,
                    $admission->user->name,
                    $admission->program->title,
                    strtoupper($admission->status),
                    strtoupper($admission->payment_status),
                    $admission->created_at->format('d/m/Y'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function getStats()
    {
        return [
            'total_admissions' => Admission::count(),
            'approved_admissions' => Admission::where('status', 'approved')->count(),
            'pending_admissions' => Admission::where('status', 'pending')->count(),
            'paid_admissions' => Admission::where('payment_status', 'paid')->count(),
            'total_revenue' => Admission::where('payment_status', 'paid')
                ->join('programs', 'admissions.program_id', '=', 'programs.id')
                ->sum('programs.price'),
        ];
    }
}
