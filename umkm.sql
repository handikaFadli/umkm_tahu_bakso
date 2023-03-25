-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 07:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_produks`
--

CREATE TABLE `gambar_produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_produk` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gambar_produks`
--

INSERT INTO `gambar_produks` (`id`, `kd_produk`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PRDK-001', '1676354188212.jpeg', '1', '2023-02-13 22:56:28', '2023-02-13 22:56:28'),
(2, 'PRDK-001', '1676354188378.jpeg', '1', '2023-02-13 22:56:28', '2023-02-13 22:56:28'),
(3, 'PRDK-001', '1676354188396.jpeg', '1', '2023-02-13 22:56:28', '2023-02-13 22:56:28'),
(4, 'PRDK-002', '1676354322996.jpeg', '1', '2023-02-13 22:58:42', '2023-02-13 22:58:42'),
(5, 'PRDK-002', '1676354323015.jpeg', '1', '2023-02-13 22:58:43', '2023-02-13 22:58:43'),
(6, 'PRDK-002', '1676354323040.jpeg', '1', '2023-02-13 22:58:43', '2023-02-13 22:58:43'),
(7, 'PRDK-003', '1676354464095.jpg', '1', '2023-02-13 23:01:04', '2023-02-13 23:01:04'),
(8, 'PRDK-003', '1676354464101.jpg', '1', '2023-02-13 23:01:04', '2023-02-13 23:01:04'),
(9, 'PRDK-003', '1676354464105.jpg', '1', '2023-02-13 23:01:04', '2023-02-13 23:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nm_kategori` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nm_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Original', '2023-02-13 22:13:34', '2023-02-13 22:13:34'),
(2, 'Rawit', '2023-02-13 22:13:34', '2023-02-13 22:13:34'),
(3, 'Mix', '2023-02-13 22:13:34', '2023-02-13 22:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_12_093129_create_produk_table', 1),
(6, '2023_01_12_165303_create_kategori_table', 1),
(7, '2023_01_24_135110_create_reseller_table', 1),
(8, '2023_01_30_083445_create_gambar_produks_table', 1),
(9, '2023_01_31_002442_create_penjualan_table', 1),
(10, '2023_02_12_102915_create_penjualan_detail_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_customer` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembayaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengiriman` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `nm_customer`, `no_hp`, `alamat`, `pembayaran`, `pengiriman`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Alin', '081234678920', 'Perumahan Taman Cipto', 'Bank BJB', 'Diantar', 125000, '2023-02-13 23:21:36', '2023-02-13 23:29:39'),
(2, 'Cellya', '087678908765', 'Jl Sena III', 'Cash', 'COD', 225000, '2023-02-13 23:23:02', '2023-02-13 23:23:02'),
(3, 'Tri Oetami Putri', '087263792798', 'Perumahan Bumi Asri Dawuan', 'Shopeepay', 'Diantar', 350000, '2023-02-13 23:29:10', '2023-02-13 23:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penjualan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `produk_id`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(1, '1', 'PRDK-001', 2, 50000, '2023-02-13 23:21:36', '2023-02-13 23:21:36'),
(2, '1', 'PRDK-003', 3, 75000, '2023-02-13 23:21:36', '2023-02-13 23:21:36'),
(3, '2', 'PRDK-002', 4, 100000, '2023-02-13 23:23:02', '2023-02-13 23:23:02'),
(4, '3', 'PRDK-002', 3, 75000, '2023-02-13 23:29:10', '2023-02-13 23:29:10'),
(5, '3', 'PRDK-003', 2, 50000, '2023-02-13 23:29:10', '2023-02-13 23:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_produk` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_produk` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `jenis_masakan` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `masa_penyimpanan` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_produk`, `nm_produk`, `kategori`, `stok`, `jenis_masakan`, `jumlah_produk`, `berat_produk`, `masa_penyimpanan`, `harga`, `ket`, `status`, `created_at`, `updated_at`) VALUES
('PRDK-001', 'Tahu Bakso', 1, 92, 'Homemade', 10, 200, '1 bulan', 25000, '<div><strong>Spesifikasi Produk</strong><br>Merek : Tahu Bakso Sambal Kecap Jani<br>Negara Asal : Indonesia<br>Kondisi Penyimpanan : Lemari Pendingin (0°C - 10°C)<br>Jenis Masakan : Hidangan Siap Saji/Kukus/Goreng<br>Jumlah Produk dalam Kemasan : 10 biji beserta sambal<br>Berat Produk : 200g<br>Masa Penyimpanan : 1 bulan<br>Stok : 6297793<br>Dikirim Dari : Kabupaten Cirebon<br><br><strong>Deskripsi</strong><br>Nama produk : Tahu Bakso Original<br>Dibuat dengan bahan yang alami, fresh, berkualitas dan tidak menggunakan bahan pengawet, sehingga rasanya lebih enak dan aman untuk di konsumsi.<br><br><strong>Tata Cara Menyajikan Tahu Bakso</strong><br><strong>Cara memasak Tahu Bakso (dikukus) :</strong><br>• Kukus tahu bakso selama 20-30 menit<br>• Setelah tahu bakso matang, angkat dan letakkan di atas piring<br>• Tuang sambal kecap yang ada dalam kemasan ke atas piring kecil atau mangkok khusus sambal<br>• Tahu bakso siap disantap<br><br><strong>Cara memasak Tahu Bakso (digoreng) :<br></strong>• Goreng tahu bakso hingga matang<br>• Setelah tahu bakso matang, angkat dan letakkan di atas piring<br>• Tuang sambal kecap yang ada dalam kemasan ke atas piring kecil atau mangkok khusus sambal<br>• Tahu bakso siap disantap<br><br><strong>Ketahanan Tahu Bakso<br></strong>• Tahu bakso tahan di udara luar 3 hari<br>• Tahu bakso expired 1 bulan dari pabrik di udara kulkas<br>• Segera masukkan ke dalam kulkas saat barang tiba jika tidak langsung di konsumsi<br><br><strong>Info Pemesanan<br></strong>• Jam kerja : Setiap hari (pukul 08.00 - 19.00 WIB)<br>• Pemesanan minimal H-1, jika memesan lebih dari &gt;=20 pcs maka pemesanan minimal H-3<br>• Pemesanan di atas jam 7 malam akan dikirim besok hari<br>• Pengiriman sesuai dengan pembayaran yang masuk duluan<br>• Keterlambatan dan kerusakan barang setelah di kirim bukan tanggung jawab kami<br><br><strong>Note<br></strong>Harap buat video awal kamu buka paket sampai barang terlihat lalu cek secara keseluruhan, dan juga harap hati-hati saat membuka paket jika menggunakan benda tajam. Segala kerusakan dan kekurangan tanpa ada bukti video bukan tanggung jawab kami!<br><br>❤ <strong>Happy Shopping</strong> ❤<br><strong>By : Tahu Bakso Sambal Kecap Jani</strong></div>', '1', '2023-02-13 22:56:28', '2023-02-13 23:30:09'),
('PRDK-002', 'Tahu Bakso', 2, 113, 'Homemade', 10, 200, '1 bulan', 25000, '<div><strong>Spesifikasi Produk</strong><br>Merek : Tahu Bakso Sambal Kecap Jani<br>Negara Asal : Indonesia<br>Kondisi Penyimpanan : Lemari Pendingin (0°C - 10°C)<br>Jenis Masakan : Hidangan Siap Saji/Kukus/Goreng<br>Jumlah Produk dalam Kemasan : 10 biji beserta sambal<br>Berat Produk : 200g<br>Masa Penyimpanan : 1 bulan<br>Stok : 6297793<br>Dikirim Dari : Kabupaten Cirebon<br><br><strong>Deskripsi</strong><br>Nama produk : Tahu Bakso Rawit<br>Dibuat dengan bahan yang alami, fresh, berkualitas dan tidak menggunakan bahan pengawet, sehingga rasanya lebih enak dan aman untuk di konsumsi.<br><br><strong>Tata Cara Menyajikan Tahu Bakso</strong><br><strong>Cara memasak Tahu Bakso (dikukus) :</strong><br>• Kukus tahu bakso selama 20-30 menit<br>• Setelah tahu bakso matang, angkat dan letakkan di atas piring<br>• Tuang sambal kecap yang ada dalam kemasan ke atas piring kecil atau mangkok khusus sambal<br>• Tahu bakso siap disantap<br><br><strong>Cara memasak Tahu Bakso (digoreng) :<br></strong>• Goreng tahu bakso hingga matang<br>• Setelah tahu bakso matang, angkat dan letakkan di atas piring<br>• Tuang sambal kecap yang ada dalam kemasan ke atas piring kecil atau mangkok khusus sambal<br>• Tahu bakso siap disantap<br><br><strong>Ketahanan Tahu Bakso<br></strong>• Tahu bakso tahan di udara luar 3 hari<br>• Tahu bakso expired 1 bulan dari pabrik di udara kulkas<br>• Segera masukkan ke dalam kulkas saat barang tiba jika tidak langsung di konsumsi<br><br><strong>Info Pemesanan<br></strong>• Jam kerja : Setiap hari (pukul 08.00 - 19.00 WIB)<br>• Pemesanan minimal H-1, jika memesan lebih dari &gt;=20 pcs maka pemesanan minimal H-3<br>• Pemesanan di atas jam 7 malam akan dikirim besok hari<br>• Pengiriman sesuai dengan pembayaran yang masuk duluan<br>• Keterlambatan dan kerusakan barang setelah di kirim bukan tanggung jawab kami<br><br><strong>Note<br></strong>Harap buat video awal kamu buka paket sampai barang terlihat lalu cek secara keseluruhan, dan juga harap hati-hati saat membuka paket jika menggunakan benda tajam. Segala kerusakan dan kekurangan tanpa ada bukti video bukan tanggung jawab kami!<br><br>❤ <strong>Happy Shopping</strong> ❤<br><strong>By : Tahu Bakso Sambal Kecap Jani</strong></div>', '1', '2023-02-13 22:58:43', '2023-02-13 23:29:10'),
('PRDK-003', 'Tahu Bakso', 3, 45, 'Homemade', 10, 200, '1 bulan', 25000, '<div><strong>Spesifikasi Produk</strong><br>Merek : Tahu Bakso Sambal Kecap Jani<br>Negara Asal : Indonesia<br>Kondisi Penyimpanan : Lemari Pendingin (0°C - 10°C)<br>Jenis Masakan : Hidangan Siap Saji/Kukus/Goreng<br>Jumlah Produk dalam Kemasan : 10 biji beserta sambal<br>Berat Produk : 200g<br>Masa Penyimpanan : 1 bulan<br>Stok : 6297793<br>Dikirim Dari : Kabupaten Cirebon<br><br><strong>Deskripsi</strong><br>Nama produk : Tahu Bakso Mix<br>Dibuat dengan bahan yang alami, fresh, berkualitas dan tidak menggunakan bahan pengawet, sehingga rasanya lebih enak dan aman untuk di konsumsi.<br><br><strong>Tata Cara Menyajikan Tahu Bakso</strong><br><strong>Cara memasak Tahu Bakso (dikukus) :</strong><br>• Kukus tahu bakso selama 20-30 menit<br>• Setelah tahu bakso matang, angkat dan letakkan di atas piring<br>• Tuang sambal kecap yang ada dalam kemasan ke atas piring kecil atau mangkok khusus sambal<br>• Tahu bakso siap disantap<br><br><strong>Cara memasak Tahu Bakso (digoreng) :<br></strong>• Goreng tahu bakso hingga matang<br>• Setelah tahu bakso matang, angkat dan letakkan di atas piring<br>• Tuang sambal kecap yang ada dalam kemasan ke atas piring kecil atau mangkok khusus sambal<br>• Tahu bakso siap disantap<br><br><strong>Ketahanan Tahu Bakso<br></strong>• Tahu bakso tahan di udara luar 3 hari<br>• Tahu bakso expired 1 bulan dari pabrik di udara kulkas<br>• Segera masukkan ke dalam kulkas saat barang tiba jika tidak langsung di konsumsi<br><br><strong>Info Pemesanan<br></strong>• Jam kerja : Setiap hari (pukul 08.00 - 19.00 WIB)<br>• Pemesanan minimal H-1, jika memesan lebih dari &gt;=20 pcs maka pemesanan minimal H-3<br>• Pemesanan di atas jam 7 malam akan dikirim besok hari<br>• Pengiriman sesuai dengan pembayaran yang masuk duluan<br>• Keterlambatan dan kerusakan barang setelah di kirim bukan tanggung jawab kami<br><br><strong>Note<br></strong>Harap buat video awal kamu buka paket sampai barang terlihat lalu cek secara keseluruhan, dan juga harap hati-hati saat membuka paket jika menggunakan benda tajam. Segala kerusakan dan kekurangan tanpa ada bukti video bukan tanggung jawab kami!<br><br>❤ <strong>Happy Shopping</strong> ❤<br><strong>By : Tahu Bakso Sambal Kecap Jani</strong></div>', '1', '2023-02-13 23:01:04', '2023-02-13 23:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `reseller`
--

CREATE TABLE `reseller` (
  `id_reseller` int(10) UNSIGNED NOT NULL,
  `no_reseller` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_reseller` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reseller`
--

INSERT INTO `reseller` (`id_reseller`, `no_reseller`, `nm_reseller`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'RS001', 'Mba Sandra', '+6287717477027', 'Jl Sikranji 7, No. 18', '2023-02-13 23:03:28', '2023-02-13 23:16:41'),
(3, 'RS002', 'Caca', '+6281823062712', 'Jakarta', '2023-02-13 23:13:02', '2023-02-13 23:18:23'),
(4, 'RS003', 'Pak Andreans', '+6288222900192', 'Jl Pangeran Drajat', '2023-02-13 23:13:44', '2023-02-13 23:13:44'),
(5, 'RS004', 'Mas Rayyan', '+6289520215504', 'Perumahan Puri Taman Sari', '2023-02-13 23:14:19', '2023-02-13 23:14:19'),
(6, 'RS005', 'Nabiel Nastiar', '+6282141503719', 'Jl Cipto Mangunkusumo', '2023-02-13 23:15:02', '2023-02-13 23:15:02'),
(7, 'RS006', 'Nawatra Nathan', '+6282320102513', 'GSP', '2023-02-13 23:15:30', '2023-02-13 23:15:30'),
(8, 'RS007', 'Mas Wildan', '+6281809804473', 'Tasikmalaya', '2023-02-13 23:15:59', '2023-02-13 23:15:59'),
(9, 'RS008', 'Wira Zandra', '+6281296592096', 'Sleman, Yogyakarta', '2023-02-13 23:17:35', '2023-02-13 23:17:35'),
(10, 'RS009', 'Farrel Marchi', '+6281221853942', 'Bandung', '2023-02-13 23:18:13', '2023-02-13 23:18:13'),
(11, 'RS010', 'Shanti', '+6281286980004', 'Jakarta Barat', '2023-02-13 23:19:26', '2023-02-13 23:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$a1Bs0Vy0B56BiIQNEiQqY.LCRr6.hWTNkRG.bBP1cfsn4qwCeL1ie', NULL, '2023-02-13 22:13:34', '2023-02-13 22:13:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gambar_produks`
--
ALTER TABLE `gambar_produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indexes for table `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`id_reseller`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar_produks`
--
ALTER TABLE `gambar_produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reseller`
--
ALTER TABLE `reseller`
  MODIFY `id_reseller` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
