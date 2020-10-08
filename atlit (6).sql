-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Sep 2020 pada 14.58
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atlit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_cabor`
--

CREATE TABLE `admin_cabor` (
  `id` int(11) NOT NULL,
  `Nama` varchar(250) NOT NULL,
  `nama_cabor` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_cabor`
--

INSERT INTO `admin_cabor` (`id`, `Nama`, `nama_cabor`, `email`, `username`) VALUES
(1, 'jayadi', 'bola', 'afiffudinm688@gmail.com', 'ADMIN'),
(2, 'dea', 'bulu tangkis', 'jady@gmail.com', 'jaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabor`
--

CREATE TABLE `cabor` (
  `id` int(11) NOT NULL,
  `nama_cabor` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cabor`
--

INSERT INTO `cabor` (`id`, `nama_cabor`) VALUES
(4, 'bulu tangkis'),
(5, 'sepak takraw');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_master_atlet`
--

CREATE TABLE `data_master_atlet` (
  `id` int(11) NOT NULL,
  `Nama` varchar(250) NOT NULL,
  `Nomer_Telepon` varchar(20) NOT NULL,
  `Jenis_kelamin` varchar(20) NOT NULL,
  `foto_ktp` varchar(50) NOT NULL,
  `nomer_ktp` varchar(25) DEFAULT NULL,
  `Alamat` varchar(250) NOT NULL,
  `nama_cabor` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_master_atlet`
--

INSERT INTO `data_master_atlet` (`id`, `Nama`, `Nomer_Telepon`, `Jenis_kelamin`, `foto_ktp`, `nomer_ktp`, `Alamat`, `nama_cabor`, `email`) VALUES
(31, 'jaenal', '089777823131', 'L', '1854171785.jpg', '327605230199123', 'jalan kalibaru', 'bulu tangkis', 'jaenal@gmail.com'),
(32, 'aya', '089666721312', 'P', '1694269227.jpg', '32760897316131231', 'palembang', 'bulu tangkis', 'Aya@gmail.com'),
(33, 'afif', '08988787287', 'L', '1688216327.jpg', '32760523019912312', 'dsadadasda', 'bulu tangkis', 'adasdasdas@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_master_nomer_ketua_koni`
--

CREATE TABLE `data_master_nomer_ketua_koni` (
  `id` int(11) NOT NULL,
  `Nama` varchar(150) NOT NULL,
  `Nomer_Telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_master_nomer_ketua_koni`
--

INSERT INTO `data_master_nomer_ketua_koni` (`id`, `Nama`, `Nomer_Telepon`) VALUES
(1, 'dea', '12456'),
(2, 'riya riswa', '089123131231'),
(4, 'admin', '089777231123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `PIC` varchar(50) DEFAULT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Tiket_Pesawat` varchar(25) DEFAULT NULL,
  `Tanggal_keberangkatan` date DEFAULT NULL,
  `Tanggal_kepulangan` date DEFAULT NULL,
  `Penginapan` varchar(150) DEFAULT NULL,
  `no_kamar` varchar(25) DEFAULT NULL,
  `no_booking` varchar(25) DEFAULT NULL,
  `Tempat_Pertandingan` varchar(250) DEFAULT NULL,
  `Inventaris_mobil` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `PIC`, `Nama`, `Tiket_Pesawat`, `Tanggal_keberangkatan`, `Tanggal_kepulangan`, `Penginapan`, `no_kamar`, `no_booking`, `Tempat_Pertandingan`, `Inventaris_mobil`) VALUES
(3, NULL, NULL, '1977945956.jpg', '2020-12-26', '2020-09-25', 'Hotel nirwana', 'mwr011212', 'kmb212', 'Gor asrama', 'B12345CD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_27_060104_create_model_users_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(11) NOT NULL,
  `jadwal_keberangkatan_atlit` date NOT NULL,
  `jadwal_kepulangan_atlit` date NOT NULL,
  `Emergency` varchar(50) NOT NULL,
  `Timeline_keseluruhan_aktifitas_pic_aktifitas` date NOT NULL,
  `Jadwal_final` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `monitoring`
--

INSERT INTO `monitoring` (`id`, `jadwal_keberangkatan_atlit`, `jadwal_kepulangan_atlit`, `Emergency`, `Timeline_keseluruhan_aktifitas_pic_aktifitas`, `Jadwal_final`) VALUES
(1, '2020-08-21', '2020-08-27', 'darurat', '2020-08-27', '2020-09-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring_koni`
--

CREATE TABLE `monitoring_koni` (
  `jadwal_keberangkatan_atlit` date NOT NULL,
  `jadwal_kepulangan_atlit` date NOT NULL,
  `penginapan` varchar(150) NOT NULL,
  `Tempat_Pertandingan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('afiffudinm688@gmail.com', '$2y$10$lyqlquCn./2Scpr3QvM7sOiK4Ij2JY4h5p30b65kZjSM6DVvzASx.', '2020-08-06 03:36:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `serah_terima_inventaris`
--

CREATE TABLE `serah_terima_inventaris` (
  `id` int(11) NOT NULL,
  `stnk` varchar(100) DEFAULT NULL,
  `Tanggal_keberangkatan` date DEFAULT NULL,
  `Inventaris_mobil` varchar(15) DEFAULT NULL,
  `PIC` varchar(50) DEFAULT NULL,
  `diterima_oleh` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `serah_terima_inventaris`
--

INSERT INTO `serah_terima_inventaris` (`id`, `stnk`, `Tanggal_keberangkatan`, `Inventaris_mobil`, `PIC`, `diterima_oleh`) VALUES
(3, '412131', '2020-08-20', 'B907214EF', '332131', 'MR Ade');

-- --------------------------------------------------------

--
-- Struktur dari tabel `super_admin`
--

CREATE TABLE `super_admin` (
  `Data_master_admin` varchar(255) NOT NULL,
  `monitoring` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`, `name`, `remember_token`) VALUES
(17, 'admin@gmail.com', 'admin123', '2020-08-27 17:00:00', '2020-08-28 17:00:00', 'admin', '123'),
(18, 'admin@gmail.com', 'admin123', '2020-08-27 17:00:00', '2020-08-28 17:00:00', 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_cabor`
--
ALTER TABLE `admin_cabor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cabor`
--
ALTER TABLE `cabor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_master_atlet`
--
ALTER TABLE `data_master_atlet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `data_master_nomer_ketua_koni`
--
ALTER TABLE `data_master_nomer_ketua_koni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Inventaris_mobil` (`Inventaris_mobil`),
  ADD UNIQUE KEY `PIC_2` (`PIC`),
  ADD KEY `PIC` (`PIC`),
  ADD KEY `PIC_3` (`PIC`),
  ADD KEY `Inventaris_mobil_2` (`Inventaris_mobil`),
  ADD KEY `Tanggal_keberangkatan` (`Tanggal_keberangkatan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `serah_terima_inventaris`
--
ALTER TABLE `serah_terima_inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_cabor`
--
ALTER TABLE `admin_cabor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cabor`
--
ALTER TABLE `cabor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_master_atlet`
--
ALTER TABLE `data_master_atlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `data_master_nomer_ketua_koni`
--
ALTER TABLE `data_master_nomer_ketua_koni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `serah_terima_inventaris`
--
ALTER TABLE `serah_terima_inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
