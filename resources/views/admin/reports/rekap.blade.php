<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan LKP Abqary - {{ date('d/m/Y') }}</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            color: #1f2937;
            padding: 40px;
            line-height: 1.5;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
        }

        .header p {
            margin: 5px 0 0;
            color: #6b7280;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-box {
            border: 1px solid #e5e7eb;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }

        .stat-box h4 {
            margin: 0 0 10px;
            font-size: 14px;
            color: #6b7280;
            text-transform: uppercase;
        }

        .stat-box span {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #e5e7eb;
            padding: 10px;
            text-align: left;
            font-size: 12px;
        }

        th {
            background: #f9fafb;
            font-weight: 600;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 12px;
            color: #6b7280;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                padding: 0;
            }

            @page {
                margin: 2cm;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="no-print"
        style="background: #fef3c7; padding: 10px; text-align: center; margin-bottom: 20px; border-radius: 8px;">
        <p style="margin: 0; font-weight: 600;">💡 Tip: Gunakan setelan "Save as PDF" di dialog cetak untuk mengunduh
            laporan ini.</p>
    </div>

    <div class="header">
        <h1>Rekap Laporan Pendaftaran LKP Abqary</h1>
        <p>Dicetak pada: {{ date('d/m/Y H:i') }}</p>
    </div>

    <div class="stats-grid">
        <div class="stat-box">
            <h4>Total Peserta</h4>
            <span>{{ $stats['total_admissions'] }}</span>
        </div>
        <div class="stat-box">
            <h4>Peserta Lunas</h4>
            <span>{{ $stats['paid_admissions'] }}</span>
        </div>
        <div class="stat-box">
            <h4>Total Pendapatan</h4>
            <span>Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</span>
        </div>
    </div>

    <h3>Daftar Peserta Terbaru</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Program Pelatihan</th>
                <th>Status Dokumen</th>
                <th>Status Bayar</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admissions as $idx => $admission)
                <tr>
                    <td>{{ $idx + 1 }}</td>
                    <td style="font-weight: 600;">{{ $admission->user->name }}</td>
                    <td>{{ $admission->program->title }}</td>
                    <td>{{ strtoupper($admission->status) }}</td>
                    <td>{{ strtoupper($admission->payment_status) }}</td>
                    <td>{{ $admission->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dokumen ini dihasilkan secara otomatis oleh Sistem LKP Abqary.</p>
    </div>
</body>

</html>