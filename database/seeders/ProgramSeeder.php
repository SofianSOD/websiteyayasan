<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            // A. Kursus Komputer
            [
                'category' => 'Kursus Komputer',
                'title' => 'Program Office (Word, Excel, PowerPoint)',
                'slug' => 'program-office',
                'description' => 'Pelatihan intensif penggunaan Microsoft Office untuk kebutuhan administratif dan perkantoran modern. Materi mencakup pengolahan kata (Word), pengolahan angka (Excel), dan pembuatan presentasi (PowerPoint).',
                'price' => 750000,
                'duration' => '1 Bulan',
                'is_active' => true,
            ],
            [
                'category' => 'Kursus Komputer',
                'title' => 'Program Mengetik 10 Jari',
                'slug' => 'mengetik-10-jari',
                'description' => 'Meningkatkan kecepatan dan akurasi mengetik menggunakan teknik 10 jari yang benar untuk efisiensi kerja yang maksimal.',
                'price' => 300000,
                'duration' => '2 Minggu',
                'is_active' => true,
            ],
            [
                'category' => 'Kursus Komputer',
                'title' => 'Program Desain Grafis (Photoshop & CorelDraw)',
                'slug' => 'desain-grafis',
                'description' => 'Belajar desain visual dari tingkat dasar hingga mahir menggunakan Adobe Photoshop dan CorelDraw untuk pembuatan materi promosi, logo, dan konten kreatif.',
                'price' => 1200000,
                'duration' => '2 Bulan',
                'is_active' => true,
            ],
            // B. Kursus Bahasa
            [
                'category' => 'Kursus Bahasa',
                'title' => 'Kursus Bahasa Inggris',
                'slug' => 'bahasa-inggris',
                'description' => 'Penguasaan bahasa Inggris dari tingkat dasar hingga cakap untuk komunikasi profesional dan sehari-hari, mencakup Reading, Writing, Listening, dan Speaking.',
                'price' => 850000,
                'duration' => '3 Bulan',
                'is_active' => true,
            ],
            [
                'category' => 'Kursus Bahasa',
                'title' => 'Kursus Bahasa Arab',
                'slug' => 'bahasa-arab',
                'description' => 'Pembelajaran bahasa Arab yang mencakup percakapan, membaca, dan menulis dengan metode praktis yang mudah dipahami.',
                'price' => 800000,
                'duration' => '3 Bulan',
                'is_active' => true,
            ],
            [
                'category' => 'Kursus Bahasa',
                'title' => 'Kursus Bahasa Jepang',
                'slug' => 'bahasa-jepang',
                'description' => 'Pengenalan bahasa Jepang (Hiragana, Katakana, Kanji) dan percakapan dasar untuk persiapan kerja atau studi di Jepang.',
                'price' => 950000,
                'duration' => '3 Bulan',
                'is_active' => true,
            ],
            // C. Bimbingan Al-quran
            [
                'category' => 'Bimbingan Al-quran',
                'title' => 'Bimbingan Baca Tulis Al-quran',
                'slug' => 'baca-tulis-alquran',
                'description' => 'Program bimbingan khusus untuk memahami teknik membaca dan menulis Al-quran dengan tajwid yang benar dan tartil.',
                'price' => 450000,
                'duration' => 'Sesuai Tingkatan',
                'is_active' => true,
            ],
            // D. Bimbingan Calistung
            [
                'category' => 'Bimbingan Calistung',
                'title' => 'Bimbingan Calistung (Baca, Tulis, Hitung)',
                'slug' => 'calistung',
                'description' => 'Bimbingan belajar dasar untuk anak-anak untuk menguasai kemampuan membaca, menulis, dan berhitung dengan metode yang menyenangkan dan efektif.',
                'price' => 400000,
                'duration' => 'Sesuai Tingkatan',
                'is_active' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
