-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Des 2025 pada 03.30
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websiteyayasan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admissions`
--

CREATE TABLE `admissions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` enum('unpaid','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `documents` json DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admissions`
--

INSERT INTO `admissions` (`id`, `user_id`, `program_id`, `status`, `payment_status`, `documents`, `notes`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'pending', 'unpaid', NULL, 'Pendaftaran simulasi untuk pengetesan sistem.', '2025-12-20 08:20:32', '2025-12-20 08:20:32'),
(2, 1, 1, 'approved', 'paid', '\"{\\\"ktp\\\":\\\"admissions\\\\/ktp\\\\/c9me8HLn4GBm3EDVoDG43SzUWiIKjhvvR4RcMvWw.png\\\",\\\"ijazah\\\":\\\"admissions\\\\/ijazah\\\\/bFS4LuvW36rBJNVxyJcxGjHbJzotPKTA5oq3vkUd.png\\\"}\"', NULL, '2025-12-20 09:24:00', '2025-12-23 20:21:10'),
(3, 3, 5, 'approved', 'paid', '\"{\\\"ktp\\\":\\\"admissions\\\\/ktp\\\\/OtEJtUky9PaNZ6PaLgmtA3KMnJm8gB2TSRIzAjlM.png\\\",\\\"ijazah\\\":\\\"admissions\\\\/ijazah\\\\/4BfVkE0cA6gXGEaEcaagzM1pqVZIvwz1SFf77nB6.png\\\"}\"', NULL, '2025-12-20 09:34:49', '2025-12-20 09:35:15'),
(4, 4, 1, 'approved', 'paid', '\"{\\\"ktp\\\":\\\"admissions\\\\/ktp\\\\/T0PimKcuLubCnE1qvMbsiugsq4bSj7RX2WnRQOhn.jpg\\\",\\\"ijazah\\\":\\\"admissions\\\\/ijazah\\\\/0hNg8j6HuaU0zEDuKga5LnkYFUeXeef3d8YOdOZc.jpg\\\"}\"', 'Catatan tambahan', '2025-12-23 20:15:51', '2025-12-23 20:16:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `category`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'Seminar Inspiratif', 'galleries/lG5xSO8yOtILwVpDghObNp0t2cjLRUD4h4cx1AfN.jpg', 'Pelatihan', 'Seminar UMKM', 1, '2025-12-23 19:51:30', '2025-12-23 19:51:30'),
(5, 'Seminar', 'galleries/s7e7BBcS5KhU2GsIKhUr0D9zK2PJiTAHVkj8q7ef.jpg', 'Pelatihan', 'Bersama Dengan Narasumber dan Pembina Yayasan', 1, '2025-12-23 19:51:59', '2025-12-23 19:51:59'),
(6, 'Seminar', 'galleries/1bQ6DuQij8qo1PcpEuR80JFJQ3tlNfU8Qi7ioPXl.jpg', 'Pelatihan', 'Bersama Dengan Pengawas Yayasan', 1, '2025-12-23 19:52:27', '2025-12-23 19:52:27'),
(7, 'Uji Komeptensi', 'galleries/fDZ6qnqKupjfFgSMfbfFXNQbHwuOVyjAla1Mo0f1.jpg', 'Uji Kompetensi', 'Uji Kompetensi', 1, '2025-12-23 19:53:14', '2025-12-23 19:53:14'),
(8, 'Uji Kompetensi', 'galleries/qVi9etyobN8WM505REAlxbF3PYy6rSlmfMLhYYFt.jpg', 'Uji Kompetensi', 'Uji Kompetensi', 1, '2025-12-23 19:53:29', '2025-12-23 19:53:29'),
(9, 'Uji Kompetensi', 'galleries/obolhTKzieIuXPTPmfojV2EuC2eamif8YgzJyuR6.jpg', 'Uji Kompetensi', 'Uji Kompetensi', 1, '2025-12-23 19:53:47', '2025-12-23 19:53:47'),
(10, 'Pertemuan dengan orangtua', 'galleries/K5z3IRK8K9NfykBHt8Z3I6SdXWZ2dIvtr8Xqc3uj.jpg', 'Kegiatan Lain', 'Pertemuan dengan orangtua', 1, '2025-12-23 19:54:09', '2025-12-23 19:54:09'),
(11, 'Piagam Penghargaan', 'galleries/Jai5bQp6RhuSXCmQ1ZlMC4JGsRjlKFSpTwr4mGdv.jpg', 'Wisuda', 'Penghargaan', 1, '2025-12-23 19:55:20', '2025-12-23 19:55:20'),
(12, 'Piagam Penghargaan', 'galleries/n7ZMFkVIpzlehdd7qnBdmablhTSCJAPr0gvCOdDz.jpg', 'Wisuda', 'Penghargaan', 1, '2025-12-23 19:55:46', '2025-12-23 19:55:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(35, '2019_08_19_000000_create_failed_jobs_table', 1),
(36, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(37, '2025_12_19_062643_create_programs_table', 1),
(38, '2025_12_19_062645_create_admissions_table', 1),
(39, '2025_12_19_062648_add_role_to_users_table', 1),
(40, '2025_12_19_071232_create_posts_table', 1),
(41, '2025_12_20_165550_create_galleries_table', 2),
(42, '2025_12_22_023939_create_sliders_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `image`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'Pendaftaran Gelombang 1 Tahun 2026 Dibuka!', 'pendaftaran-gelombang-1-tahun-2026-dibuka', 'Yayasan Pembaharuan Indonesia secara resmi membuka pendaftaran untuk calon siswa baru Gelombang 1. Kami menawarkan berbagai program unggulan di bidang teknologi dan bisnis.', 'posts/6JQtCDWjA58QtOVz1TmpClaONsUCjNuUVkRPAMTu.jpg', 1, '2025-12-20 08:20:32', '2025-12-23 20:00:43'),
(2, 'YPI Berkolaborasi dengan Perusahaan Teknologi Internasional', 'ypi-berkolaborasi-dengan-perusahaan-teknologi-internasional', 'Untuk meningkatkan kualitas lulusan, YPI menjalin kerjasama strategis dengan beberapa raksasa teknologi. Siswa kini akan mendapatkan akses ke kurikulum berskala internasional.', 'posts/31ghvOXSRIWcRPai9muQV0LozMiG7SRxtxiGfvjA.jpg', 1, '2025-12-20 08:20:32', '2025-12-23 20:00:58'),
(3, 'Tips Memilih Program Pelatihan yang Tepat', 'tips-memilih-program-pelatihan-yang-tepat', 'Banyak calon siswa bingung memilih program pelatihan. Dalam artikel ini, kami membahas langkah-langkah untuk mengidentifikasi bakat dan minat Anda sebelum mendaftar.', 'posts/DIIQ08ANprhbrG5NzDufCPy7HL47BDkswgUTXxCM.jpg', 1, '2025-12-20 08:20:32', '2025-12-23 20:01:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `programs`
--

CREATE TABLE `programs` (
  `id` bigint UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `programs`
--

INSERT INTO `programs` (`id`, `category`, `title`, `slug`, `description`, `price`, `duration`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Kursus Komputer', 'Program Office (Word, Excel, PowerPoint)', 'program-office', 'Pelatihan intensif penggunaan Microsoft Office untuk kebutuhan administratif dan perkantoran modern. Materi mencakup pengolahan kata (Word), pengolahan angka (Excel), dan pembuatan presentasi (PowerPoint).', 15000.00, '1 JAM', 'programs/launy1XPRC5EguPgbEb8Rgd9iBz5gDZMvjnAoGNK.jpg', 1, '2025-12-20 08:20:32', '2025-12-23 19:57:54'),
(2, 'Kursus Komputer', 'Program Office & Mengetik 10 Jari', 'mengetik-10-jari', 'Meningkatkan kecepatan dan akurasi mengetik menggunakan teknik 10 jari yang benar untuk efisiensi kerja yang maksimal.', 300000.00, 'Life Time', 'programs/nvNWK5jv6k44ANWrZPApiakeEaVkieDrJ0VMD3D3.jpg', 1, '2025-12-20 08:20:32', '2025-12-23 19:58:17'),
(3, 'Kursus Komputer', 'Program Desain Grafis (Photoshop & CorelDraw)', 'desain-grafis', 'Belajar desain visual dari tingkat dasar hingga mahir menggunakan Adobe Photoshop dan CorelDraw untuk pembuatan materi promosi, logo, dan konten kreatif.', 400000.00, 'Sampai Bisa', 'programs/GMuNIorRqgcobJ2puzVsfHkwq5ewLi3nLLXW9vcr.jpg', 1, '2025-12-20 08:20:32', '2025-12-23 19:58:28'),
(4, 'Kursus Bahasa', 'Kursus Bahasa Inggris', 'bahasa-inggris', 'Penguasaan bahasa Inggris dari tingkat dasar hingga cakap untuk komunikasi profesional dan sehari-hari, mencakup Reading, Writing, Listening, dan Speaking.', 50000.00, '1 JAM', 'programs/cAQYnMBEscHcbu1L0flv1iNYPAI0U8OxINPXeMsg.jpg', 1, '2025-12-20 08:20:32', '2025-12-23 19:59:03'),
(5, 'Kursus Bahasa', 'Kursus Bahasa Arab', 'bahasa-arab', 'Pembelajaran bahasa Arab yang mencakup percakapan, membaca, dan menulis dengan metode praktis yang mudah dipahami.', 50000.00, '1 JAM', 'programs/ILyrXneR5KG6upNgbeFMoqscNyGzVYQC3BjQSrav.jpg', 1, '2025-12-20 08:20:32', '2025-12-23 19:59:15'),
(6, 'Kursus Bahasa', 'Kursus Bahasa Jepang', 'bahasa-jepang', 'Pengenalan bahasa Jepang (Hiragana, Katakana, Kanji) dan percakapan dasar untuk persiapan kerja atau studi di Jepang.', 50000.00, '1 JAM', 'programs/R4wuSqAboguL1amQS9Q2jRladlGK44zSEHbJTC2r.jpg', 1, '2025-12-20 08:20:32', '2025-12-23 19:59:25'),
(7, 'Bimbingan Al-quran', 'Bimbingan Baca Tulis Al-quran', 'baca-tulis-alquran', 'Program bimbingan khusus untuk memahami teknik membaca dan menulis Al-quran dengan tajwid yang benar dan tartil.', 20000.00, '1 JAM', 'programs/21Lp66AphQwLpn2IwnLfi1U1WTVkXysJkNtMbqi0.jpg', 1, '2025-12-20 08:20:32', '2025-12-23 19:59:40'),
(8, 'Bimbingan Calistung', 'Bimbingan Calistung (Baca, Tulis, Hitung)', 'calistung', 'Bimbingan belajar dasar untuk anak-anak untuk menguasai kemampuan membaca, menulis, dan berhitung dengan metode yang menyenangkan dan efektif.', 20000.00, '1 JAM', 'programs/e1tCOkIIZjQ3d47zK5FXeKdjnAM1NDpJojwmgH6O.jpg', 1, '2025-12-20 08:20:32', '2025-12-23 19:59:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_headline` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `headline`, `sub_headline`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'sliders/8qJM5uRqcKuKJx5JjReMf5CCCJ5xOYi3AzWIcURn.jpg', 'Belajar Dengan Tutor Profesional dalam Bidangnya', 'Belajar asyik dengan kurikulum modern', 3, 1, '2025-12-21 19:49:17', '2025-12-21 19:49:17'),
(2, 'sliders/HnizQN1dMOz1DWiesAhIEQUXF3q42nBb6xXoqm4n.jpg', 'Masa Depan Cerah Dimulai dari Sini', 'Bergabunglah dengan program pelatihan terbaik untuk karir impian anda', 1, 1, '2025-12-21 19:51:17', '2025-12-21 19:51:17'),
(3, 'sliders/FMDGbTpsjBkmaSfW3rSAyWM6oEfpwVCwbyrsT2oI.jpg', 'Update dengan Perkembangan Tekhnology Saat ini', 'Bergabunglah dengan program pelatihan kursus komputer', 2, 1, '2025-12-21 19:52:39', '2025-12-21 19:52:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator YPI', 'admin@yayasanpi.ac.id', 'admin', NULL, '$2y$12$zIL3OlnX9lR0cWtr/PJCaurEawzyv2Ul9pUoSNe495z8CqilxIccG', NULL, '2025-12-20 08:20:32', '2025-12-20 08:20:32'),
(2, 'Budi Santoso', 'student@example.com', 'student', NULL, '$2y$12$FLKxc44HfPK6qXhlBYm7rOEKXMga9edNLKZkP2t55uuVyNS.75TC6', NULL, '2025-12-20 08:20:32', '2025-12-20 08:20:32'),
(3, 'sean', 'seanwirahadi1@gmail.com', 'student', NULL, '$2y$12$HDLkRRKfSm9uUVdJf3HaYeP/1phuMJb7Qatzt1DSwhu7Ifxo9MRye', NULL, '2025-12-20 09:21:39', '2025-12-20 09:21:39'),
(4, 'Heru Hermawan', 'heru@peserta.com', 'student', NULL, '$2y$12$KnRkv4PogLVALEulOwwbi.YA53lxchsgg3BcVRd13BCN1/0iPWXky', NULL, '2025-12-23 20:14:45', '2025-12-23 20:14:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admissions_user_id_foreign` (`user_id`),
  ADD KEY `admissions_program_id_foreign` (`program_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indeks untuk tabel `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programs_slug_unique` (`slug`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admissions`
--
ALTER TABLE `admissions`
  ADD CONSTRAINT `admissions_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
