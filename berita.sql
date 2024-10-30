-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2024 pada 13.56
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `kategori` enum('Technology','Lifestyle') NOT NULL,
  `author` varchar(100) NOT NULL,
  `tanggal_publikasi` date NOT NULL,
  `images` varchar(100) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `kategori`, `author`, `tanggal_publikasi`, `images`, `view`) VALUES
(1, 'Perkembangan Teknologi AI', 'Teknologi kecerdasan buatan (AI) semakin berkembang pesat. Dalam beberapa tahun terakhir, AI telah mampu mempelajari banyak hal dan memberikan kemudahan dalam berbagai sektor.', 'Technology', 'Andi Wijaya', '2024-10-01', '1.jpg', 3),
(2, 'Gaya Hidup Sehat di Era Modern', 'Gaya hidup sehat semakin menjadi perhatian di era modern. Banyak orang mulai memahami pentingnya menjaga kesehatan dengan berolahraga dan mengonsumsi makanan sehat.', 'Lifestyle', 'Budi Santoso', '2024-10-02', '2.jpg', 0),
(3, 'Peran Teknologi dalam Pendidikan', 'Dengan adanya teknologi, pendidikan semakin mudah diakses. Berbagai platform pembelajaran online memudahkan siswa untuk belajar dari mana saja.', 'Technology', 'Citra Dewi', '2024-10-03', '3.jpg', 2),
(4, 'Pentingnya Manajemen Waktu', 'Manajemen waktu yang baik adalah kunci untuk mencapai kehidupan yang seimbang. Mengatur jadwal dan prioritas dapat meningkatkan produktivitas.', 'Lifestyle', 'Dewi Sari', '2024-10-04', '4.jpg', 1),
(5, 'Inovasi dalam Teknologi Ramah Lingkungan', 'Berbagai inovasi teknologi ramah lingkungan muncul untuk mengurangi dampak negatif terhadap lingkungan, termasuk energi terbarukan dan kendaraan listrik.', 'Technology', 'Eka Pratama', '2024-10-05', '5.jpg', 0),
(6, 'Tren Fashion Tahun Ini', 'Fashion terus berkembang mengikuti perubahan zaman. Tren fashion tahun ini mengedepankan kesederhanaan namun tetap elegan.', 'Lifestyle', 'Fajar Nugroho', '2024-10-06', '6.jpg', 0),
(7, 'Dampak Teknologi pada Kehidupan Sosial', 'Teknologi telah mengubah cara kita berinteraksi satu sama lain. Media sosial memungkinkan kita untuk terhubung dengan lebih banyak orang, namun juga menimbulkan berbagai tantangan.', 'Technology', 'Gina Putri', '2024-10-07', '7.jpg', 0),
(8, 'Pentingnya Mindfulness untuk Kesehatan Mental', 'Mindfulness adalah teknik meditasi yang dapat membantu menjaga kesehatan mental. Praktik ini semakin populer di kalangan orang-orang modern.', 'Lifestyle', 'Hendra Susanto', '2024-10-08', '8.jpg', 0),
(9, 'Blockchain dan Masa Depan Keuangan', 'Blockchain merupakan teknologi yang memiliki potensi besar dalam dunia keuangan. Dengan transparansi yang tinggi, blockchain dianggap sebagai teknologi masa depan.', 'Technology', 'Indra Kusuma', '2024-10-09', '9.jpg', 0),
(10, 'Mengenal Diet Plant-Based', 'Diet plant-based menjadi semakin populer di kalangan masyarakat yang peduli dengan kesehatan dan lingkungan. Diet ini fokus pada konsumsi tanaman dan menghindari produk hewani.', 'Lifestyle', 'Irfan Sabrian', '2024-10-28', '10.jpg', 0),
(11, 'test', 'isi test', 'Technology', 'nama test', '2024-10-30', '11.jpg', 0),
(23, 'wfdsfsddsf', 'werwer', 'Technology', 'ewrrwe', '2024-10-29', '23.jpg', 0),
(24, '123', '43tref', 'Lifestyle', 'tera', '2024-10-20', '24.jpg', 0),
(27, 'efdsf', 'rdgfdggh', 'Lifestyle', '5etryrtyr', '2024-10-08', '', 0),
(31, '3ew333', 'ewrewr', 'Lifestyle', 'ewrewfds', '2024-10-28', '14.jpg', 0),
(32, 'nopal balek', 'nopal ganti skin', 'Technology', 'nopapl kazama', '2024-10-29', '32.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
