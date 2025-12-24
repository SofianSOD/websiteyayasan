<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Pendaftaran Gelombang 1 Tahun 2026 Dibuka!',
                'content' => 'Yayasan Pembaharuan Indonesia secara resmi membuka pendaftaran untuk calon siswa baru Gelombang 1. Kami menawarkan berbagai program unggulan di bidang teknologi dan bisnis.',
                'is_published' => true,
            ],
            [
                'title' => 'YPI Berkolaborasi dengan Perusahaan Teknologi Internasional',
                'content' => 'Untuk meningkatkan kualitas lulusan, YPI menjalin kerjasama strategis dengan beberapa raksasa teknologi. Siswa kini akan mendapatkan akses ke kurikulum berskala internasional.',
                'is_published' => true,
            ],
            [
                'title' => 'Tips Memilih Program Pelatihan yang Tepat',
                'content' => 'Banyak calon siswa bingung memilih program pelatihan. Dalam artikel ini, kami membahas langkah-langkah untuk mengidentifikasi bakat dan minat Anda sebelum mendaftar.',
                'is_published' => true,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
