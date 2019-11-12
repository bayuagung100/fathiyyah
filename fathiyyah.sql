-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Nov 2019 pada 04.29
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fathiyyah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_transfer`
--

CREATE TABLE `bank_transfer` (
  `id` int(10) NOT NULL,
  `nama_bank` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemilik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bank_transfer`
--

INSERT INTO `bank_transfer` (`id`, `nama_bank`, `no_rek`, `nama_pemilik`) VALUES
(1, 'MANDIRI', '1510002481999', 'SELLY PATRICIA AROR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cat_product`
--

CREATE TABLE `cat_product` (
  `id` int(225) NOT NULL,
  `nama_cp` varchar(225) NOT NULL,
  `icon` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cat_product`
--

INSERT INTO `cat_product` (`id`, `nama_cp`, `icon`) VALUES
(7, 'Gamis Syari Set Khimar', 'Y 1-min.jpg'),
(8, 'Gamis Syari Set Khimar Dan Niqab', 'T 2-min.jpg'),
(9, 'Niqab/Cadar Bandana 1 Layer', 'A1.jpg'),
(10, 'Niqab/Cadar Tali 1 Layer', 'J1.jpg'),
(11, 'Hijab Square Motif The Fathiyyah', 'IMG_3675.jpg'),
(12, 'Hijab Square Polos The Fathiyyah', 'IMG_36106-min.jpg'),
(13, 'Ciput/Inner Antem Resleting', 'ciput 3.jpg'),
(14, 'Gamis Syar\'i The Fathiyyah', 'IMG_4325-min.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id` int(100) NOT NULL,
  `bank_tujuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_pengirim` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek_pengirim` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_transfer` date NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `konfirmasi` enum('n','y') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id`, `bank_tujuan`, `bank_pengirim`, `no_rek_pengirim`, `nama_pengirim`, `tgl_transfer`, `bukti_pembayaran`, `catatan`, `konfirmasi`) VALUES
(1, 'MANDIRI', 'Bank BCA', '123123123', 'Bayu', '2019-10-04', 'Screenshot from 2019-10-03 15-17-54.png', '123123', 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_temp`
--

CREATE TABLE `order_temp` (
  `id` int(255) NOT NULL,
  `id_produk` int(255) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_temp`
--

INSERT INTO `order_temp` (`id`, `id_produk`, `id_session`, `jumlah`, `ukuran`, `tanggal`) VALUES
(1, 11, 'okkpg4khcduuof4fq412vetkhd', 6, 'S', '2019-09-25'),
(2, 11, 'okkpg4khcduuof4fq412vetkhd', 4, 'M', '2019-09-25'),
(3, 0, '', 0, '', '2019-09-25'),
(4, 9, '', 1, 'S', '2019-09-25'),
(5, 35, 'c6272e3156ebbc6c26ab396c53262e14', 2, 'S', '2019-09-25'),
(6, 6, 'c6272e3156ebbc6c26ab396c53262e14', 1, 'S', '2019-09-25'),
(8, 36, 'jcoabvjvrf5osq7i8135n6enc2', 2, 'S', '2019-09-26'),
(9, 35, 'jcoabvjvrf5osq7i8135n6enc2', 1, 'S', '2019-09-26'),
(12, 31, '20820ee097ba9a22c9204acf67207b51', 5, 'S', '2019-09-26'),
(13, 35, '20820ee097ba9a22c9204acf67207b51', 1, 'S', '2019-09-26'),
(16, 10, '0392e94f6db5357043b180ccae2b25f6', 1, 'S', '2019-09-26'),
(17, 21, '0392e94f6db5357043b180ccae2b25f6', 1, 'S', '2019-09-26'),
(19, 27, 'fk88pphmp7jnfdfrsrmdd91ba1', 2, 'S', '2019-09-27'),
(20, 36, 'fadfde572b847380ed1365019096efe4', 1, 'S', '2019-09-27'),
(22, 34, 'ae63e56eda4dc2d1871d60dfa133025f', 1, 'S', '2019-09-27'),
(23, 6, 'ae63e56eda4dc2d1871d60dfa133025f', 1, 'S', '2019-09-27'),
(24, 27, '493c8837602207733f2139ffc1668f91', 1, 'S', '2019-09-29'),
(28, 16, 'be3e93cd8d83ca35e99b3dfb489b4388', 1, 'S', '2019-10-01'),
(29, 27, '', 2, 'S', '2019-10-01'),
(31, 36, 'ae02a3c62b78b184754edb9025f1b7a4', 1, 'S', '2019-10-01'),
(32, 27, 'ca048d2fd2da0f1a60a5195f861b8b7f', 1, 'S', '2019-10-01'),
(34, 10, 'f7829b2a8fd456cd561ed075a602b4be', 5, 'S', '2019-10-02'),
(39, 13, '28a068341094e5d56012b64802b84a71', 1, 'S', '2019-10-03'),
(43, 34, '61510760ac1b3f8ed7b73f0055bac6e7', 1, 'S', '2019-10-04'),
(59, 15, '0691a275b78c041643e34769b0a6eeab', 1, 'S', '2019-10-04'),
(60, 37, '4755dfa8b657dbf682c06380a47a511c', 1, 'S', '2019-10-07'),
(61, 10, '0f70470984920602237e37c2136120fc', 1, 'S', '2019-10-07'),
(63, 78, '24b980d26fd24261b35f7c202cd34d54', 1, 'S', '2019-10-10'),
(64, 76, '6d59bd5761fbeba4f5e2205dc292fa9b', 1, 'S', '2019-10-25'),
(66, 32, '7f6687ecbd09177b7601d70e5a68dee5', 1, 'S', '2019-10-31'),
(67, 85, 'c923b1478d58616db20a4a9b95779f5a', 1, 'S', '2019-10-31'),
(68, 69, '9fd3251b55c99d334732c8636c6232f4', 1, 'S', '2019-11-01'),
(70, 76, 'e30f4e7499287cbe8622453ce9e0117a', 1, 'S', '2019-11-04'),
(73, 77, '3fb9bb8904251017c4582e6cd8b450c8', 1, 'S', '2019-11-05'),
(75, 89, 'ed7871bc50179fd1815c96c81985d4f8', 1, 'S', '2019-11-06'),
(76, 61, '0f75130df0d3a46709d9cac511d3d035', 1, 'S', '2019-11-07'),
(77, 77, '0f75130df0d3a46709d9cac511d3d035', 1, 'S', '2019-11-07'),
(79, 77, 'ab102edf25484a30fa024a89af1e4beb', 1, 'S', '2019-11-07'),
(80, 77, 'c563450171e621a5d53553d6dec163fb', 2, 'S', '2019-11-07'),
(81, 77, '7e092450648a99db0cc8b8268f580690', 1, 'S', '2019-11-07'),
(82, 77, '3c4f995dfff33f2716b598f975adb9b5', 1, 'S', '2019-11-07'),
(83, 77, '0218a2458651fdbcce2a974104f68756', 1, 'S', '2019-11-07'),
(84, 77, 'ba6cbae2a71ec18192d74f981dce0d37', 2, 'S', '2019-11-08'),
(85, 77, 'c370c0ef9820aedfcafb0f465bf7baed', 2, 'S', '2019-11-08'),
(86, 77, 'd75ea3e09ed8a6935d62353119dffe0f', 2, 'S', '2019-11-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(255) NOT NULL,
  `no_tagihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user_shop` int(255) NOT NULL,
  `id_produk` int(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `ukuran` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` int(10) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `no_tagihan`, `id_user_shop`, `id_produk`, `jumlah`, `ukuran`, `tanggal`, `nama`, `email`, `hp`, `kota`, `pos`, `alamat`, `payment`) VALUES
(3, '201910012613', 11, 13, 1, 'S', '2019-10-01', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(4, '201910012613', 11, 27, 1, 'S', '2019-10-01', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(5, '201910012613', 11, 13, 1, 'S', '2019-10-01', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(6, '201910012613', 11, 27, 1, 'S', '2019-10-01', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(7, '201910023732', 11, 32, 1, 'S', '2019-10-02', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(8, '201910034025', 11, 25, 1, 'S', '2019-10-03', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(9, '201910034025', 11, 31, 1, 'S', '2019-10-03', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(10, '201910034235', 11, 35, 1, 'S', '2019-10-03', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(11, '201910044425', 11, 25, 1, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(12, '201910044529', 11, 29, 1, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(13, '201910044635', 11, 35, 1, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(14, '201910044737', 11, 37, 1, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(15, '201910044737', 11, 31, 3, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(16, '201910044937', 11, 37, 4, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(17, '201910045013', 11, 13, 1, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(18, '201910045013', 11, 15, 2, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(19, '20191004529', 11, 9, 2, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(20, '20191004529', 11, 14, 2, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(21, '201910045415', 11, 15, 2, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(22, '201910045415', 11, 9, 1, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(23, '201910045415', 11, 15, 2, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(24, '201910045415', 11, 9, 1, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(25, '201910045415', 11, 15, 2, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(26, '201910045415', 11, 9, 1, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(27, '201910045632', 11, 32, 1, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(28, '201910045632', 11, 25, 1, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'new'),
(29, '20191004587', 11, 7, 1, 'S', '2019-10-04', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Tangerang', 15730, 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730', 'done'),
(30, '201910076243', 12, 43, 1, 'S', '2019-10-07', 'Anastasiaratri', 'anastasiaratrih@gmail.com', '081111250898', 'Jakarta Selatan', 17320, 'perumahan kemang jaya taman  no 9b', 'new'),
(31, '201910316511', 13, 11, 1, 'L', '2019-10-31', 'Anastasia', 'anastasiaratrih@gmail.com', '08111250898', 'Tangerang', 15610, 'bgb f3 no 6', 'new');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(225) NOT NULL,
  `kd_product` varchar(225) NOT NULL,
  `nama_product` varchar(225) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `gambar2` varchar(255) NOT NULL,
  `gambar3` varchar(255) NOT NULL,
  `gambar4` varchar(255) NOT NULL,
  `gambar5` varchar(255) NOT NULL,
  `gambar6` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(225) NOT NULL,
  `berat` int(50) DEFAULT NULL,
  `category` varchar(225) NOT NULL,
  `slide` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `kd_product`, `nama_product`, `gambar`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `gambar6`, `deskripsi`, `harga`, `berat`, `category`, `slide`) VALUES
(6, '', 'Aara - (Pink-White Edition)', '1 A-min.jpg', '2 A-min.jpg', '3 A-min.jpg', '4 A-min.jpg', '5 A-min.jpg', '6 A-min.jpg', '<p>Satu set baju syar\'i bernuansa pink-putih ini kami namai Aara, yang berjiwa lembut. dapatkan \"Aara\" mu segera, untuk muslimah berjiwa lembut. tersedia dalam ukuran S,M,L,XL.</p>', '499900', NULL, '7', 'N'),
(7, '', 'Aara - (pink-ungu Edition)', '1 B-min.jpg', '2 B-min.jpg', '3 B-min.jpg', '4 B-min.jpg', '5 B-min.jpg', '6 B-min.jpg', '<p>Satu set baju syar\'i bernuansa pink ungu ini kami namai Aaara, yang berjiwa lembut. dapatkan \'Aara\' mu segera, untuk muslimah berjiwa lembut. tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '7', 'N'),
(9, '', 'Azka - (Navy-Pink Edition)', '1 D-min.jpg', '2 D-min.jpg', '3 D-min.jpg', '4 D-min.jpg', '5 D-min.jpg', '6 D-min.jpg', '<p>Satu set baju syar\'i ini kami namai \"Azka\" yang bermakna kesucian dan kehormatan terinspirasi dari kesucian dan kehormatan wanita dalam islam. dapatkan \"Azka\" mu segera, tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '7', 'N'),
(10, '', 'Afra', '1 E-min.jpg', '2 E-min.jpg', '3 E-min.jpg', '4 E-min.jpg', '5 E-min.jpg', '6 E-min.jpg', '<p>Satu set baju syar\'i bernuansa coklat muda ini kami namai Afra bermakna warna bumi. dapatkan \"Afra\" mu segera, untuk yang menyukai keindahan bumi. tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '7', 'N'),
(11, '', 'Nadira - (Purple Edition)', 'F 1-min.jpg', 'F 2-min.jpg', 'F 3-min.jpg', 'F 4-min.jpg', 'F 5-min.jpg', 'F 6-min.jpg', '<p>Satu set baju syar\'i ini kami namai \"Nadira\" yang bermakna Berharga. Dengan nuansa ungu yang indah dan berharga , dapatkan \"Nadira\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '7', 'N'),
(12, '', 'Nadira - (Grey Edition)', 'G 1-min.jpg', 'G 2-min.jpg', 'G 3-min.jpg', 'G 4-min.jpg', 'G 5-min.jpg', '', '<p>Satu set baju syar\'i ini kami namai \"Nadira\" yang bermakna Berharga. Dengan nuansa Abu Abu yang indah dan berharga , dapatkan \"Nadira\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '7', 'N'),
(13, '', 'Kara - (All Black Edition)', 'H 1-min.jpg', 'H 2-min.jpg', 'H 3-min.jpg', 'H 4-min.jpg', 'H 5-min.jpg', 'H 6-min.jpg', '<p>Satu set baju syar\'i lengkap dengan niqab ini kami namai \"Kara\" yang bermakna Cahaya. Dapatkan \"Kara\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '599900', NULL, '7', 'N'),
(14, '', 'Nadira - (Red Edition)', 'I 1-min.jpg', 'I 2-min.jpg', 'I 3-min.jpg', 'I 4-min.jpg', '', '', '<p>Satu set baju syar\'i ini kami namai \"Nadira\" yang bermakna Berharga. Dengan nuansa merah yang indah dan berharga , dapatkan \"Nadira\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '7', 'N'),
(15, '', 'Ayesha - ( Mustard Edition)', 'J 1-min.jpg', 'J 2-min.jpg', 'J 3-min.jpg', 'J 4-min.jpg', 'J 5-min.jpg', 'J 6-min.jpg', '<p>Satu set baju Syar\'i ini kami namai \"Ayesha\" yang bermakna kebaikan. Dapatkan \"Ayesha\" mu segera, untuk yang mencintai kebaikan. Tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '7', 'N'),
(16, '', 'Azka - (Tosca-Pink Edition)', 'K 1-min.jpg', 'K 2-min.jpg', 'K 3-min.jpg', 'K 4-min.jpg', 'K 5-min.jpg', 'K 6-min.jpg', '<p>Satu set baju Syar\'i ini kami namai \"Azka\" bermakna kesucian dan kehormatan Terinspirasi dari kesucian dan kehormatan wanita dalam islam. Dapatkan \"Azka\" mu segera, tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '7', 'N'),
(19, '', 'Elmeera - (Rasin Edition)', 'M 1-min.jpg', 'M 2-min.jpg', 'M 3-min.jpg', 'M 4-min.jpg', 'M 5-min.jpg', 'M 6-min.jpg', '<p>Satu set baju syar\'i lengkap dengan niqab ini kami namai \"Elmeera\" yang bermakna mulia. Terinspirasi dari kemuliaan muslimah, dapatkan \"Elmeera\" mu segera, Tersedia dalam ukuran S,M,L,XL</p>', '599900', NULL, '8', 'N'),
(20, '', 'Elmeera - (Peacock Edition)', 'N 1-min.jpg', 'N 2-min.jpg', 'N 3-min.jpg', 'N 4-min.jpg', 'N 5-min.jpg', 'N 6-min.jpg', '<p>Satu set baju syar\'i lengkap dengan niqab ini kami namai \"Elmeera\" yang bermakna Mulia. Dengan nuansa nan cemerlang, dapatkan \"Elmeera.\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '599900', NULL, '8', 'N'),
(21, '', 'Asira - (Pink Edition)', 'O 1-min.jpg', 'O 2-min.jpg', 'O 3-min.jpg', 'O 4-min.jpg', 'O 5-min.jpg', 'O 6-min.jpg', '<p>Satu set baju syar\'i lengkap dengan niqab ini kami namai \"Asira\" yang bermakna Menawan. Dapatkan \"Asira\" mu yang menawan segera Tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '8', 'N'),
(22, '', 'Asira - (Light Pink Edition)', 'P 1-min.jpg', 'P 2-min.jpg', 'P 3-min.jpg', 'P 4-min.jpg', 'P 5-min.jpg', 'P 6-min.jpg', '<p>Satu set baju syar\'i lengkap dengan niqab ini kami namai \"Asira\" yang bermakna Menawan. Dapatkan \"Asira\" mu yang menawan segera Tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '8', 'N'),
(23, '', 'Asira - (Blue Grey Edition)', 'Q 1-min.jpg', 'Q 2-min.jpg', 'Q 3-min.jpg', 'Q 4-min.jpg', 'Q 5-min.jpg', 'Q 6-min.jpg', '<p>Satu set baju syar\'i lengkap dengan niqab ini kami namai \"Asira\" yang bermakna Menawan. Dapatkan \"Asira\" mu yang menawan segera Tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '8', 'N'),
(24, '', 'Asira - (grey Edition)', 'R 1-min.jpg', 'R 2-min.jpg', 'R 3-min.jpg', 'R 4-min.jpg', 'R 5-min.jpg', 'R 6-min.jpg', '<p>Satu set baju syar\'i lengkap dengan niqab ini kami namai \"Asira\" yang bermakna Menawan. Dapatkan \"Asira\" mu yang menawan segera Tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '8', 'N'),
(25, '', 'Clemira - (All White Edition)', 'S 1-min.jpg', 'S 2-min.jpg', 'S 3-min.jpg', 'S 4-min.jpg', 'S 5-min.jpg', 'S 6-min.jpg', '<p>Satu set baju syar\'i lengkap dengan niqab ini kami namai \"Clemira\" yang bermakna Cemerlang. Dengan nuansa putih nan cemerlang, dapatkan \"Clemira\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '599900', NULL, '8', 'N'),
(26, '', 'Clemira (White-Black Edition)', 'L 1-min.jpg', 'L 2-min.jpg', 'L 3-min.jpg', 'L 4-min.jpg', 'L 5-min.jpg', 'L 6-min.jpg', '<p>Satu set baju syar\'i lengkap dengan niqab ini kami namai \"Clemira\" yang bermakna Cemerlang. Dengan nuansa putih dan hitam nan cemerlang, dapatkan \"Clemira\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '599900', NULL, '8', 'N'),
(27, '', ' Belvana - (Tosca Blue Edition)', 'T 1-min.jpg', 'T 2-min.jpg', 'T 3-min.jpg', 'T 4-min.jpg', 'T 5-min.jpg', 'T 6-min.jpg', '<p>Satu set baju syar\'i ini kami namai \" Belvana\" yang bermakna cantik dan anggun. Dengan nuansa&nbsp; yang cantik dan anggun , dapatkan \" Belvana\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '8', 'N'),
(28, '', 'Naura - (Beige Edition)', 'U 1-min.jpg', 'U 2-min.jpg', 'U 3-min.jpg', 'U 4-min.jpg', 'U 5-min.jpg', 'U 6-min.jpg', '<p>Satu set baju Syar\'i ini kami namai \"Naura\" yang bermakna cahaya yang bersinar terang. Dapatkan \"Naura\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '599900', NULL, '7', 'N'),
(29, '', 'Naura ( Black Edition )', 'V 1-min.jpg', 'V 2-min.jpg', 'V 3-min.jpg', 'V 4-min.jpg', 'V 5-min.jpg', 'V 6-min.jpg', '<p>Satu set baju Syar\'i ini kami namai \"Naura\" yang bermakna cahaya yang bersinar terang.</p>\r\n<p>Dapatkan \"Naura\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '599900', NULL, '7', 'N'),
(30, '', 'Naura ( White Edition )', 'W 1-min.jpg', 'W 2-min.jpg', 'W 3-min.jpg', 'W 4-min.jpg', 'W 5-min.jpg', 'W 6-min.jpg', '<p>Satu set baju Syar\'i ini kami namai \"Naura\" yang bermakna cahaya yang bersinar terang. Dapatkan \"Naura\" mu segera.</p>\r\n<p>Tersedia dalam ukuran S,M,L,XL</p>', '599900', NULL, '7', 'N'),
(31, '', 'Naura - (Orange Edition)', 'X 1-min.jpg', 'X 2-min.jpg', 'X 3-min.jpg', 'X 4-min.jpg', 'X 5-min.jpg', '', '<p>Satu set baju Syar\'i ini kami namai \"Naura\" yang bermakna cahaya yang bersinar terang. Dapatkan \"Naura\" mu segera.</p>\r\n<p>Tersedia dalam ukuran S,M,L,XL</p>', '599900', NULL, '7', 'N'),
(32, '', 'Naura - (Green Edition)', 'Y 1-min.jpg', 'Y 2-min.jpg', 'Y 3-min.jpg', 'Y 4-min.jpg', 'Y 5-min.jpg', 'Y 6-min.jpg', '<p>Satu set baju Syar\'i ini kami namai \"Naura\" yang bermakna cahaya yang bersinar terang. Dapatkan \"Naura\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '599900', NULL, '7', 'N'),
(33, '', 'Naura ( Gold Edition )', 'Z 1-min.jpg', 'Z 2-min.jpg', 'Z 3-min.jpg', 'Z 4-min.jpg', 'Z 5-min.jpg', 'Z 6-min.jpg', '<p>Satu set baju Syar\'i ini kami namai \"Naura\" yang bermakna cahaya yang bersinar terang.</p>\r\n<p>Dapatkan \"Naura\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '599900', NULL, '7', 'N'),
(34, '', 'Sharda - (Pink Edition)', 'syari 1-min.jpg', 'syari 2-min.jpg', 'syari 3-min.jpg', 'syari 4-min.jpg', 'syari 5-min.jpg', 'syari 6-min.jpg', '<p>Satu set baju syar\'i lengkap dengan niqab ini kami namai \"Sharda\" yang bermakna Pelari. Baju syar\'i dengan bawahan celana ini nyaman untuk ukhti yang memiliki banyak aktifitas. Dapatkan \"Sharda\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '8', 'N'),
(35, '', 'Sharda - (Red Edition)', 'pants 1-min.jpg', 'pants 2-min.jpg', 'pants 3-min.jpg', 'pants 4-min.jpg', 'pants 5-min.jpg', 'pants 6-min.jpg', '<p>Satu set baju syar\'i lengkap dengan niqab ini kami namai \"Sharda\" yang bermakna Pelari. Baju syar\'i dengan bawahan celana ini nyaman untuk ukhti yang memiliki banyak aktifitas. Dapatkan \"Sharda\" mu segera. Tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '8', 'N'),
(36, '', 'Azka - (Navy-Blue Edition)', '1 C-min.jpg', '2 C-min.jpg', '3 C-min.jpg', '4 C-min.jpg', '5 C-min.jpg', '6 C-min.jpg', '<p>Satu set baju syar\'i ini kami namai \"Azka\" yang bermakna kesucian dan kehormatan terinspirasi dari kesucian dan kehormatan wanita dalam islam. dapatkan \"Azka\" mu segera, tersedia dalam ukuran S,M,L,XL</p>', '499900', NULL, '7', 'N'),
(38, '', 'Niqab/Cadar Bandana - The Fathiyyah (Crepe Edition)', 'A1.jpg', 'A2.jpg', 'A3.jpg', 'A4.jpg', 'niqob baby pink.jpg', '', '<p>Niqab/Cadar Bandana 1 Layer - The Fathiyyah (Crepe Edition)</p>\r\n<p>-&nbsp; Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>-&nbsp; Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Bandana/Tali : 100cm</p>', '35000', NULL, '9', 'N'),
(39, '', 'Niqab/Cadar Bandana - The Fathiyyah (Maroon Edition)', 'B1.jpg', 'B2.jpg', 'B3.jpg', 'niqob maroon.jpg', '', '', '<p>Niqab/Cadar Bandana 1 Layer - The Fathiyyah (Maroon Edition)</p>\r\n<p>-&nbsp; Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>-&nbsp; Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Bandana/Tali : 100cm</p>', '35000', NULL, '9', 'N'),
(40, '', 'Niqab/Cadar Bandana - The Fathiyyah (Walnut Edition)', 'C1.jpg', 'C2.jpg', 'C3.jpg', 'niqob cokelat tua.jpg', '', '', '<p>Niqab/Cadar Bandana 1 Layer - The Fathiyyah (Walnut Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Bandana/Tali : 100cm</p>', '35000', NULL, '9', 'N'),
(41, '', 'Niqab/Cadar Bandana - The Fathiyyah (Light Grey Edition)', 'D1.jpg', 'D2.jpg', 'D3.jpg', 'niqob abu-abu.jpg', '', '', '<p>Niqab/Cadar Bandana 1 Layer - The Fathiyyah (Light Grey Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Bandana/Tali : 100cm</p>', '35000', NULL, '9', 'N'),
(42, '', 'Niqab/Cadar Bandana - The Fathiyyah (Cream Edition)', 'E1.jpg', 'E2.jpg', 'E3.jpg', 'E4.jpg', 'niqob coksu_.jpg', '', '<p>Niqab/Cadar Bandana 1 Layer - The Fathiyyah (Cream Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Bandana/Tali : 100cm</p>', '35000', NULL, '9', 'N'),
(43, '', 'Niqab/Cadar Bandana - The Fathiyyah (Light Blue Edition)', 'F1.jpg', 'F2.jpg', 'F3.jpg', 'F4.jpg', 'niqob baby blue.jpg', '', '<p>Niqab/Cadar Bandana 1 Layer - The Fathiyyah (Light Blue Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Bandana/Tali : 100cm</p>', '35000', NULL, '9', 'N'),
(44, '', 'Niqab/Cadar Bandana - The Fathiyyah (Grey Edition)', 'G1.jpg', 'G2.jpg', 'G3.jpg', 'niqob army.jpg', '', '', '<p>Niqab/Cadar Bandana 1 Layer - The Fathiyyah (Grey Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Bandana/Tali : 100cm</p>', '35000', NULL, '9', 'N'),
(45, '', 'Niqab/Cadar Bandana - The Fathiyyah (Navy Edition)', 'H1.jpg', 'H2.jpg', 'H3.jpg', 'niqob navy.jpg', '', '', '<p>Niqab/Cadar Bandana 1 Layer - The Fathiyyah (Navy Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Bandana/Tali : 100cm</p>', '35000', NULL, '9', 'N'),
(46, '', 'Niqab/Cadar Bandana - The Fathiyyah (Light Green Edition)', 'I1.jpg', 'I2.jpg', 'I3.jpg', 'niqob mint.jpg', '', '', '<p>Niqab/Cadar Bandana 1 Layer - The Fathiyyah (Light Green Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Bandana/Tali : 100cm</p>', '35000', NULL, '9', 'N'),
(47, '', 'Niqab/Cadar Tali - The Fathiyyah (Grey Edition)', 'J1.jpg', 'J2.jpg', 'J3.jpg', 'cadar army.jpg', '', '', '<p>Niqab/Cadar Tali 1 Layer - The Fathiyyah ( Grey Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Tali : 100cm</p>', '30000', NULL, '10', 'N'),
(48, '', 'Niqab/Cadar Tali - The Fathiyyah (maroon Edition)', 'K1.jpg', 'K2.jpg', 'K3.jpg', 'cadar maroon.jpg', '', '', '<p>Niqab/Cadar Tali 1 Layer - The Fathiyyah ( Maroon Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Tali : 100cm</p>', '30000', NULL, '10', 'N'),
(49, '', 'Niqab/Cadar Tali - The Fathiyyah (Crepe Edition)', 'IMG_36120-min.jpg', 'IMG_36121-min.jpg', 'IMG_362122-min.jpg', 'niqob baby pink.jpg', '', '', '<p>Niqab/Cadar Tali 1 Layer - The Fathiyyah ( Crepe Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Tali : 100cm</p>', '30000', NULL, '10', 'N'),
(50, '', 'Niqab/Cadar Tali - The Fathiyyah (Navy Edition)', 'IMG_36118-min.jpg', 'IMG_36119-min.jpg', 'IMG_36117-min.jpg', 'cadar navy.jpg', '', '', '<p>Niqab/Cadar Tali 1 Layer - The Fathiyyah ( Navy Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Tali : 100cm</p>', '30000', NULL, '10', 'N'),
(51, '', 'Niqab/Cadar Tali - The Fathiyyah (Light Green Edition)', 'M1.jpg', 'M2.jpg', 'M3.jpg', 'cadar mint.jpg', '', '', '<p>Niqab/Cadar Tali 1 Layer - The Fathiyyah ( Light Green Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Tali : 100cm</p>', '30000', NULL, '10', 'N'),
(52, '', 'Niqab/Cadar Tali - The Fathiyyah (Light Grey Edition)', 'L1.jpg', 'L2.jpg', 'cadar abu-abu.jpg', '', '', '', '<p>Niqab/Cadar Tali 1 Layer - The Fathiyyah ( Light Grey Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Tali : 100cm</p>', '30000', NULL, '10', 'N'),
(53, '', 'Niqab/Cadar Tali - The Fathiyyah (walnut Edition)', 'IMG_36116-min.jpg', 'cadar cokelat.jpg', '', '', '', '', '<p>Niqab/Cadar Tali 1 Leyer - The Fathiyyah (Walnut Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Tali : 100cm</p>', '30000', NULL, '10', 'N'),
(54, '', 'Hijab Square Polos - The Fathiyyah (Dusty Purple Edition)', 'IMG_3685.jpg', 'IMG_3684.jpg', 'IMG_3683.jpg', 'IMG_3686.jpg', 'IMG_4803.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(55, '', 'Hijab Square Polos - The Fathiyyah (Denim Edition)', 'IMG_3691.jpg', 'IMG_3690.jpg', 'IMG_3689.jpg', 'IMG_3692.jpg', 'IMG_4787.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">- Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">- Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(56, '', 'Hijab Square Polos - The Fathiyyah (Green Edition)', 'IMG_3699.jpg', 'IMG_3698.jpg', 'IMG_3697.jpg', 'IMG_3696.jpg', 'IMG_4794.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(57, '', 'Hijab Square Polos - The Fathiyyah (Navy Edition)', 'IMG_36113.jpg', 'IMG_36108.jpg', 'IMG_36112.jpg', 'IMG_36110.jpg', 'IMG_4814.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas nyaman dipakai</p>\r\n<p style=\"text-align: left;\">- Tidak transparan, ringan dan tidak stretch</p>\r\n<p style=\"text-align: left;\">- tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(58, '', 'Hijab Square Polos - The Fathiyyah (Mustard Edition)', 'IMG_36106-min (1).jpg', 'IMG_36105-min.jpg', 'IMG_36104-min.jpg', 'IMG_36103-min.jpg', 'IMG_4861-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas nyaman dipakai</p>\r\n<p style=\"text-align: left;\">- Tidak transparan, ringan dan tidak stretch</p>\r\n<p style=\"text-align: left;\">- tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(59, '', 'Hijab Square Polos - The Fathiyyah (Dusty Pink Edition)', 'IMG_36157.jpg', 'IMG_36158.jpg', 'IMG_36154.jpg', 'IMG_36155.jpg', 'IMG_4783.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(60, '', 'Hijab Square Polos - The Fathiyyah (White Edition)', 'IMG_36132.jpg', 'IMG_36131.jpg', 'IMG_36130.jpg', 'IMG_36129.jpg', 'IMG_4819.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(61, '', 'Hijab Square Polos - The Fathiyyah (Green Tosca Edition)', 'IMG_36143.jpg', 'IMG_36142.jpg', 'IMG_36139.jpg', 'IMG_36141.jpg', 'IMG_4852-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(62, '', 'Hijab Square Polos - The Fathiyyah (Green Lime Edition)', 'IMG_36133.jpg', 'IMG_36136.jpg', 'IMG_36137.jpg', 'IMG_36135.jpg', 'IMG_4865-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(63, '', 'Hijab Square Polos - The Fathiyyah (Army Edition)', 'IMG_361673-min.jpg', 'IMG_361672-min.jpg', 'IMG_361671-min.jpg', 'IMG_361670-min.jpg', 'IMG_4848-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(64, '', 'Hijab Square Polos - The Fathiyyah (Nude Edition)', 'IMG_361678-min.jpg', 'IMG_361674-min.jpg', 'IMG_361677-min.jpg', 'IMG_361675-min.jpg', 'IMG_4870-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(65, '', 'Hijab Square Polos - The Fathiyyah (Grey Edition)', 'IMG_361686.jpg', 'IMG_361687.jpg', 'IMG_361688.jpg', 'IMG_361684.jpg', 'IMG_4844-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(66, '', 'Hijab Square Polos - The Fathiyyah (Blue Edition)', 'IMG_361699.jpg', 'IMG_361698.jpg', 'IMG_361697.jpg', 'IMG_361695.jpg', 'IMG_4887-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(67, '', 'Hijab Square Polos - The Fathiyyah (Black Edition)', 'IMG_3616104.jpg', 'IMG_3616103.jpg', 'IMG_3616101.jpg', 'IMG_3616100.jpg', 'IMG_4827.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(68, '', 'Hijab Square Polos - The Fathiyyah (Mocca Edition)', 'IMG_3616111.jpg', 'IMG_3616115.jpg', 'IMG_3616112.jpg', 'IMG_3616114.jpg', 'IMG_4836-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(69, '', 'Hijab Square Polos - The Fathiyyah (Lite Grey Edition)', 'IMG_3616110.jpg', 'IMG_3616109.jpg', 'IMG_3616108.jpg', 'IMG_3616106.jpg', 'IMG_4883-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(70, '', 'Hijab Square Polos - The Fathiyyah (Purple Edition)', 'IMG_361683.jpg', 'IMG_361679.jpg', 'IMG_361682.jpg', 'IMG_361680.jpg', 'IMG_4808.jpg', '', '<p style=\"text-align: left;\">Hijab Square Polos The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan voal yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p style=\"text-align: left;\">- Banyak pilihan warna</p>', '149900', NULL, '12', 'N'),
(71, '', 'Hijab Square Motif - The Fathiyyah (Summer Edition)', 'IMG_3675.jpg', 'IMG_3676.jpg', 'IMG_3678.jpg', 'IMG_3679.jpg', 'IMG_4968-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Motif The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Hijab bernuansa motif yang indah dan elegan</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan Silk Material yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>', '179900', NULL, '11', 'N'),
(72, '', 'Hijab Square Motif - The Fathiyyah (Rainy Edition)', 'IMG_36148-min.jpg', 'IMG_36145-min.jpg', 'IMG_36144-min.jpg', 'IMG_36146-min.jpg', 'IMG_4983-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Motif The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Hijab bernuansa motif yang indah dan elegan</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan Silk Material yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p>&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>', '179900', NULL, '11', 'N'),
(73, '', 'Hijab Square Motif - The Fathiyyah (Autumn Edition)', 'IMG_36153-min.jpg', 'IMG_36152-min.jpg', 'IMG_36149-min.jpg', 'IMG_36151-min.jpg', 'IMG_4953-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Motif The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Hijab bernuansa motif yang indah dan elegan</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan Silk Material yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p>&nbsp;</p>', '179900', NULL, '11', 'N'),
(74, '', 'Hijab Square Motif - The Fathiyyah (Winter Edition)', 'IMG_36163.jpg', 'IMG_36161.jpg', 'IMG_36162.jpg', 'IMG_36160.jpg', 'IMG_4962-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Motif The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Hijab bernuansa motif yang indah dan elegan</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan Silk Material yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p>&nbsp;</p>', '179900', NULL, '11', 'N'),
(75, '', 'Hijab Square Motif - The Fathiyyah (Classical Edition)', 'IMG_361692.jpg', 'IMG_361691.jpg', 'IMG_361689.jpg', 'IMG_361690.jpg', 'IMG_4991-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Motif The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Hijab bernuansa motif yang indah dan elegan</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan Silk Material yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p>&nbsp;</p>', '179900', NULL, '11', 'N'),
(76, '', 'Hijab Square Motif - The Fathiyyah (Spring Edition)', 'IMG_3616118.jpg', 'IMG_3616119.jpg', 'IMG_3616116.jpg', 'IMG_3616117.jpg', 'IMG_4955-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Motif The Fathiyyah&nbsp;</p>\r\n<p style=\"text-align: left;\">- Hijab bernuansa motif yang indah dan elegan</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi &nbsp;laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan Silk Material yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-&nbsp; Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p>&nbsp;</p>', '179900', NULL, '11', 'N'),
(77, '', 'Hijab Square Motif - The Fathiyyah (Ocean Edition)', 'IMG_3616121.jpg', 'IMG_3616122.jpg', 'IMG_3616125.jpg', 'IMG_3616123.jpg', 'IMG_4975-min.jpg', '', '<p style=\"text-align: left;\">Hijab Square Motif The Fathiyyah </p>\r\n<p style=\"text-align: left;\">- Hijab bernuansa motif yang indah dan elegan</p>\r\n<p style=\"text-align: left;\">- Detail bagian tepi  laser cutting (tidak dijahit)</p>\r\n<p style=\"text-align: left;\">- Berbahan Silk Material yang ketebalannya pas</p>\r\n<p style=\"text-align: left;\">-  Tidak transparan dan nyaman dipakai</p>\r\n<p style=\"text-align: left;\">-  Tidak bikin budeg/kedap di telinga</p>\r\n<p style=\"text-align: left;\">- Size Panjang x Lebar: 115cm x 115cm</p>\r\n<p> </p>', '179900', 250, '11', 'N'),
(79, '', 'Niqab/Cadar Tali - The Fathiyyah (Light Blue Edition)', 'PicsArt_10-10-12-00-51.jpg', 'PicsArt_10-10-12-01-36.jpg', 'PicsArt_10-10-12-02-13.jpg', 'cadar baby blue.jpg', '', '', '<p>Niqab/Cadar Tali 1 Layer - The Fathiyyah ( Light Blue Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Tali : 100cm</p>', '30000', NULL, '10', 'N'),
(80, '', 'Niqab/Cadar Tali - The Fathiyyah (Cream Edition)', 'PicsArt_10-10-12-02-47.jpg', 'PicsArt_10-10-12-03-58.jpg', 'PicsArt_10-10-12-03-17.jpg', 'cadar coksu.jpg', '', '', '<p>Niqab/Cadar Tali 1 Layer - The Fathiyyah ( Cream Edition)</p>\r\n<p>- &nbsp;Memakai kain wolfis/woolpeach premium (adem, nyaman di pakai), kain tidak nerawang, tidak bikin gerah dan tidak bikin pengap</p>\r\n<p>- &nbsp;Jahitan rapi tenaga jahit ahli</p>\r\n<p>- Tepian/pinggiran di neci</p>\r\n<p>* Ukuran :</p>\r\n<p>- Niqab : 35x45cm</p>\r\n<p>- Panjang Tali : 100cm</p>', '30000', NULL, '10', 'N'),
(81, '', 'Ciput/Inner Antem Resleting', 'ciput 3.jpg', 'ciput 3 detail.jpg', '', '', '', '', '<p>Ciput/Inner Antem Resleting&nbsp;</p>\r\n<ul class=\"\" style=\"list-style-type: circle;\">\r\n<li class=\"\">inner model antem, anti tembem dengan sambungan di dekat dagu.</li>\r\n<li class=\"\">bahan Rayon Spandex Super yang berkualitas, lebih awet dan menyerap keringat</li>\r\n<li class=\"\">jahitan overdeck, anti sakit di kuping atau telinga</li>\r\n<li class=\"\">panjang hingga pundak</li>\r\n<li class=\"\">bagian belakang menutup sempurna karna menggunakan sleting&nbsp;</li>\r\n<li class=\"\">cocok untuk di padu padan dengan pashmina, segiempat, hoodie, ataupun turban</li>\r\n<li class=\"\">anti melar dan anti melorot, karna sifat bahannya kaos jd akan diam di tempatnya</li>\r\n<li class=\"\">Banyak pilihan warna</li>\r\n</ul>', '20000', NULL, '13', 'N'),
(82, '', 'Ciput/Inner Antem Kerut Resleting ', 'ciput 1.jpg', 'ciput 1 detail.jpg', '', '', '', '', '<p>Ciput/Inner Antem Kerut Resleting&nbsp;</p>\r\n<ul class=\"\">\r\n<li class=\"\">inner model antem, anti tembem dengan sambungan di dekat dagu.</li>\r\n<li class=\"\">bahan Rayon Spandex Super yang berkualitas, lebih awet dan menyerap keringat</li>\r\n<li class=\"\">jahitan overdeck, anti sakit di kuping atau telinga</li>\r\n<li class=\"\">panjang hingga pundak</li>\r\n<li class=\"\">bagian belakang menutup sempurna karna menggunakan sleting&nbsp;</li>\r\n<li class=\"\">cocok untuk di padu padan dengan pashmina, segiempat, hoodie, ataupun turban</li>\r\n<li class=\"\">anti melar dan anti melorot, karna sifat bahannya kaos jd akan diam di tempatnya</li>\r\n<li class=\"\">Banyak pilihan warna</li>\r\n</ul>\r\n<p>&nbsp;</p>', '20000', NULL, '13', 'N'),
(83, '', 'Ciput/Inner Antem Silang Resleting', 'ciput 2.jpg', 'ciput 2 detail.jpg', '', '', '', '', '<p>Ciput/Inner Antem Silang Resleting&nbsp;</p>\r\n<ul class=\"\">\r\n<li class=\"\">inner model antem, anti tembem dengan sambungan di dekat dagu.</li>\r\n<li class=\"\">bahan Rayon Spandex Super yang berkualitas, lebih awet dan menyerap keringat</li>\r\n<li class=\"\">jahitan overdeck, anti sakit di kuping atau telinga</li>\r\n<li class=\"\">panjang hingga pundak</li>\r\n<li class=\"\">bagian belakang menutup sempurna karna menggunakan sleting&nbsp;</li>\r\n<li class=\"\">cocok untuk di padu padan dengan pashmina, segiempat, hoodie, ataupun turban</li>\r\n<li class=\"\">anti melar dan anti melorot, karna sifat bahannya kaos jd akan diam di tempatnya</li>\r\n<li class=\"\">Banyak pilihan warna</li>\r\n</ul>', '20000', NULL, '13', 'N'),
(84, '', 'Aisha (Black-Pink Edition)', 'baru/IMG_3932-min.jpg', 'baru/IMG_3933-min.jpg', 'baru/IMG_3931-min.jpg', 'baru/IMG_3930-min.jpg', 'baru/IMG_3929-min.jpg', '', '<p>Aisha Gamis cantik yang siap menemani keseharianmu dengan bahan premium crepe dibuat kombinasi warna Hitam dipadukan dengan warna dasar Pink. Spesifikasi :</p>\r\n<ul>\r\n<li>Bahan Wollycrepe premium, dengan karakteristik teksture pasir, tebal tetapi ringan, jatuh, adem, tidak mudah kusut, tidak licin, dan tidak transparan. Cocok untuk acara Formal &amp; Informal.</li>\r\n<li>Reseleting depan (Busui Friendly), Tangan karet (Wudhu Friendly), Terdapat bagian outer luar yang menyatu dengan dress serta kriwil rampel dibagian bawah manis dan simpel banget, dan ada tali belakang.</li>\r\n<li>Available size S,M,L,XL</li>\r\n</ul>\r\n<p>Detail size Ukuran LD/PB</p>\r\n<p>S 96/137</p>\r\n<p>M 100/138</p>\r\n<p>L 104/139</p>\r\n<p>XL 108/140</p>\r\n<p><em>Catatan: (Kemiripan warna 95% tergantung pada resolusi layar laptop/hp masing-masing atau pencahayaan ketika pemotretan)</em></p>', '349900', NULL, '14', 'N'),
(85, '', 'Aisha (Navy-Pink Edition)', 'baru/IMG_4326-min.jpg', 'baru/IMG_4331-min.jpg', 'baru/IMG_4329-min.jpg', 'baru/IMG_4328-min.jpg', 'baru/IMG_4327-min.jpg', 'baru/IMG_4330-min.jpg', '<p>Aisha Gamis cantik yang siap menemani keseharianmu dengan bahan premium crepe dibuat kombinasi warna Navy dipadukan dengan warna dasar Pink. Spesifikasi :</p>\r\n<ul>\r\n<li>Bahan Wollycrepe premium, dengan karakteristik teksture pasir, tebal tetapi ringan, jatuh, adem, tidak mudah kusut, tidak licin, dan tidak transparan. Cocok untuk acara Formal &amp; Informal.</li>\r\n<li>Reseleting depan (Busui Friendly), Tangan karet (Wudhu Friendly), Terdapat bagian outer luar yang menyatu dengan dress serta kriwil rampel dibagian bawah manis dan simpel banget, dan ada tali belakang.</li>\r\n<li>Available size S,M,L,XL</li>\r\n</ul>\r\n<p>Detail size Ukuran LD/PB</p>\r\n<p>S 96/137</p>\r\n<p>M 100/138</p>\r\n<p>L 104/139</p>\r\n<p>XL 108/140</p>\r\n<p><em>Catatan: (Kemiripan warna 95% tergantung pada resolusi layar laptop/hp masing-masing atau pencahayaan ketika pemotretan)</em></p>', '349900', NULL, '14', 'N'),
(86, '', 'Alia (Brown-Black Edition)', 'baru/IMG_3942-min.jpg', 'baru/IMG_3943-min.jpg', 'baru/IMG_3940-min.jpg', 'baru/IMG_3938-min.jpg', 'baru/IMG_3934-min.jpg', 'baru/IMG_3941-min.jpg', '<p>Alia&nbsp; Gamis cantik yang siap menemani keseharianmu dengan bahan premium crepe dibuat kombinasi warna coklat dipadukan dengan warna dasar hitam. Spesifikasi :</p>\r\n<ul>\r\n<li>Bahan Wollycrepe premium, dengan karakteristik teksture pasir, tebal tetapi ringan, jatuh, adem, tidak mudah kusut, tidak licin, dan tidak transparan. Cocok untuk acara Formal &amp; Informal.</li>\r\n<li>Reseleting depan (Busui Friendly), Tangan karet (Wudhu Friendly), Terdapat bagian outer luar yang&nbsp; simpel banget, dan ada tali depan.</li>\r\n<li>Available size S,M,L,XL</li>\r\n</ul>\r\n<p>Detail size Ukuran LD/PB</p>\r\n<p>S 96/137</p>\r\n<p>M 100/138</p>\r\n<p>L 104/139</p>\r\n<p>XL 108/140</p>\r\n<p><em>Catatan: (Kemiripan warna 95% tergantung pada resolusi layar laptop/hp masing-masing atau pencahayaan ketika pemotretan)</em></p>', '349900', NULL, '14', 'N'),
(87, '', 'Alia (Coral-White Edition)', 'baru/IMG_4325-min.jpg', 'baru/IMG_4316-min.jpg', 'baru/IMG_4317-min.jpg', 'baru/IMG_4322-min.jpg', 'baru/IMG_4321-min.jpg', '', '<p>Alia&nbsp; Gamis cantik yang siap menemani keseharianmu dengan bahan premium crepe dibuat kombinasi warna coral dipadukan dengan warna dasar putih. Spesifikasi :</p>\r\n<ul>\r\n<li>Bahan Wollycrepe premium, dengan karakteristik teksture pasir, tebal tetapi ringan, jatuh, adem, tidak mudah kusut, tidak licin, dan tidak transparan. Cocok untuk acara Formal &amp; Informal.</li>\r\n<li>Reseleting depan (Busui Friendly), Tangan karet (Wudhu Friendly), Terdapat bagian outer luar yang&nbsp; simpel banget, dan ada tali bagian belakang.</li>\r\n<li>Available size S,M,L,XL</li>\r\n</ul>\r\n<p>Detail size Ukuran LD/PB</p>\r\n<p>S 96/137</p>\r\n<p>M 100/138</p>\r\n<p>L 104/139</p>\r\n<p>XL 108/140</p>\r\n<p><em>Catatan: (Kemiripan warna 95% tergantung pada resolusi layar laptop/hp masing-masing atau pencahayaan ketika pemotretan)</em></p>\r\n<p>&nbsp;</p>', '349900', NULL, '14', 'N'),
(88, '', 'Alia (Grey-Purple Edition)', 'baru/IMG_4335 min.jpg', 'baru/IMG_4333.jpg', '', '', '', '', '<p>Alia&nbsp; Gamis cantik yang siap menemani keseharianmu dengan bahan premium crepe dibuat kombinasi warna abu dipadukan dengan warna dasar ungu. Spesifikasi :</p>\r\n<ul>\r\n<li>Bahan Wollycrepe premium, dengan karakteristik teksture pasir, tebal tetapi ringan, jatuh, adem, tidak mudah kusut, tidak licin, dan tidak transparan. Cocok untuk acara Formal &amp; Informal.</li>\r\n<li>Reseleting depan (Busui Friendly), Tangan karet (Wudhu Friendly), Terdapat bagian outer luar yang&nbsp; simpel banget, dan ada tali bagian belakang.</li>\r\n<li>Available size S,M,L,XL</li>\r\n</ul>\r\n<p>Detail size Ukuran LD/PB</p>\r\n<p>S 96/137</p>\r\n<p>M 100/138</p>\r\n<p>L 104/139</p>\r\n<p>XL 108/140</p>\r\n<p><em>Catatan: (Kemiripan warna 95% tergantung pada resolusi layar laptop/hp masing-masing atau pencahayaan ketika pemotretan)</em></p>\r\n<p>&nbsp;</p>', '349900', NULL, '14', 'N'),
(89, '', 'Zara - (Black Edition)', 'baru/IMG_0550.jpg', 'baru/IMG_0552 min.jpg', 'baru/IMG_0548.jpg', 'baru/IMG_0560.jpg', 'baru/IMG_0561.jpg', 'baru/IMG_0564-min.jpg', '<p>Zara Gamis set khimar dan niqab yang cantik siap menemani keseharianmu dengan bahan &nbsp;jetblack cordoba dibuat dengan warna dasar hitam . Spesifikasi :</p>\r\n<ul>\r\n<li>Bahan jetblack cordoba,&nbsp; jatuh, adem, tidak mudah kusut, tidak licin, dan tidak transparan. Cocok untuk acara Formal &amp; Informal.</li>\r\n<li>Reseleting depan (Busui Friendly), Tangan kancing, Terdapat list silver di pinggir khimar, dan ada glitter yang membuat gamis terkesan mewah nan elegant.</li>\r\n<li>Available size S,M,L,XL</li>\r\n</ul>\r\n<p>Detail size Ukuran LD/PB</p>\r\n<p>S 96/137</p>\r\n<p>M 100/138</p>\r\n<p>L 104/139</p>\r\n<p>XL 108/140</p>\r\n<p><em>Catatan: (Kemiripan warna 95% tergantung pada resolusi layar laptop/hp masing-masing atau pencahayaan ketika pemotretan)</em></p>\r\n<p>&nbsp;</p>', '699900', NULL, '8', 'N'),
(90, '', 'Clemira (Black Edition)', 'baru/IMG_0574 -min.jpg', 'baru/IMG_0571-min.jpg', 'baru/IMG_0568-min.jpg', 'baru/IMG_0577-min.jpg', 'baru/IMG_0567-min.jpg', 'baru/IMG_0569-min.jpg', '<p>Clemira Gamis set khimar yang cantik siap menemani keseharianmu dengan bahan&nbsp; wolly crepe dibuat dengan warna dasar hitam . Spesifikasi :</p>\r\n<ul>\r\n<li>Bahan wolly crepe,&nbsp; jatuh, adem, tidak mudah kusut, tidak licin, dan tidak transparan. Cocok untuk acara Formal &amp; Informal.</li>\r\n<li>Tangan kancing, Terdapat renda dan list hitam dan ada glitter yang membuat gamis terkesan mewah nan elegant.</li>\r\n<li>Available size S,M,L,XL</li>\r\n</ul>\r\n<p>Detail size Ukuran LD/PB</p>\r\n<p>S 96/137</p>\r\n<p>M 100/138</p>\r\n<p>L 104/139</p>\r\n<p>XL 108/140</p>\r\n<p><em>Catatan: (Kemiripan warna 95% tergantung pada resolusi layar laptop/hp masing-masing atau pencahayaan ketika pemotretan)</em></p>', '599900', NULL, '7', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(225) NOT NULL,
  `judul_website` varchar(225) NOT NULL,
  `url` varchar(225) NOT NULL,
  `icon` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `ig` varchar(225) NOT NULL,
  `wa` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `judul_website`, `url`, `icon`, `deskripsi`, `alamat`, `email`, `ig`, `wa`) VALUES
(1, 'The Fathiyyah', 'http://localhost/fathiyyah/', '20191008_101047.jpg', 'The Fathiyyah Our Journey to Jannah', '', 'thefathiyyah@erolperkasamandiri.co.id', 'https://www.instagram.com/the_fathiyyah/', '62812842502260');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `level` enum('admin','author') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'fathiyyah', '72762f9d3621084f5c38809435415b91', 'The Fathiyyah', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_shop`
--

CREATE TABLE `user_shop` (
  `id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` int(7) NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_shop`
--

INSERT INTO `user_shop` (`id`, `username`, `password`, `nama`, `email`, `hp`, `provinsi`, `city`, `pos`, `kecamatan`, `alamat`) VALUES
(11, 'bayuagung100', 'e955a0cd420939c1a8812ac52342ba0f', 'Bayu Agung Gumelar', 'bayuagung100@gmail.com', '089634372389', 'Banten', 'Tangerang', 15730, 'Cisoka', 'Kemuning Permai Blok b2 no 31, jeungjing, cisoka, kab.tangerang, banten, 15730'),
(12, 'Anasrasiaratri', 'e8c9777a68c33c5198f036b5d5016deb', 'Anastasiaratri', 'anastasiaratrih@gmail.com', '081111250898', '', 'Jakarta Selatan', 17320, '', 'perumahan kemang jaya taman  no 9b'),
(13, 'Anastasiartr', '1a6463ecfa9afc3b96af7b6ad2abb2be', 'Anastasia', 'anastasiaratrih@gmail.com', '08111250898', '', 'Tangerang', 15610, '', 'bgb f3 no 6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank_transfer`
--
ALTER TABLE `bank_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cat_product`
--
ALTER TABLE `cat_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_temp`
--
ALTER TABLE `order_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_shop`
--
ALTER TABLE `user_shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank_transfer`
--
ALTER TABLE `bank_transfer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `cat_product`
--
ALTER TABLE `cat_product`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `order_temp`
--
ALTER TABLE `order_temp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_shop`
--
ALTER TABLE `user_shop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
