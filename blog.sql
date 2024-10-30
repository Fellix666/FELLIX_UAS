-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2024 pada 17.54
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
-- Database: `blog`
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
(0, 'Kecerdasan Buatan (Artificial Intelligence - AI)', 'Perkembangan AI Generatif: Saat ini, AI generatif seperti ChatGPT dan DALL-E 3 dapat menghasilkan teks, gambar, dan bahkan musik. Artikel terkait membahas bagaimana teknologi ini dikembangkan, tantangan etisnya, serta dampaknya pada pekerjaan dan industri kreatif.\r\nAI dalam Otomasi Industri: Banyak industri kini menggunakan AI untuk meningkatkan efisiensi operasional, seperti di bidang manufaktur, kesehatan, dan transportasi. Artikel terkait akan menjelaskan aplikasi praktis, keuntungan, dan dampak sosialnya.', 'Technology', 'fellix', '2024-10-30', '0.jpg', 0),
(0, 'Internet of Things (IoT)', 'Smart Home dan IoT di Rumah Tangga: Artikel ini membahas bagaimana perangkat IoT seperti lampu pintar, termostat pintar, dan speaker pintar membuat rumah lebih cerdas dan efisien.\r\nIoT di Pertanian (Agri-Tech): Teknologi IoT di bidang pertanian memungkinkan petani mengontrol kondisi tanah, cuaca, dan pemupukan dengan lebih akurat. Artikel ini mencakup bagaimana IoT meningkatkan hasil panen dan efisiensi sumber daya.', 'Technology', 'fellix', '2024-10-30', '0.jpg', 0),
(0, 'Komputasi Awan (Cloud Computing)', 'Perkembangan Cloud Hybrid: Artikel ini membahas tren cloud hybrid, yang memungkinkan bisnis untuk menggunakan kombinasi server lokal dan cloud publik untuk menyimpan data dengan aman dan efisien.\r\nPeningkatan Keamanan di Cloud Computing: Keamanan menjadi perhatian utama dalam cloud computing, terutama bagi perusahaan yang menangani data sensitif. Artikel ini membahas praktik keamanan terkini, seperti enkripsi data dan keamanan jaringan.', 'Lifestyle', 'fellix', '2024-10-30', '0.jpg', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
