-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2024 pada 14.19
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
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `kategori` enum('teknologi','lifestyle') NOT NULL,
  `author` varchar(100) NOT NULL,
  `tanggal_publikasi` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `view_count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `kategori`, `author`, `tanggal_publikasi`, `gambar`, `view_count`, `created_at`) VALUES
(12, 'Perkembangan Teknologi AI di Dunia Kerja', 'AI semakin populer di dunia kerja, membantu otomatisasi tugas-tugas rutin seperti pengolahan data dan layanan pelanggan. Teknologi ini diharapkan mampu meningkatkan produktivitas, namun juga memunculkan kekhawatiran soal lapangan kerja.', 'teknologi', 'fellix', '2024-10-31', 'uploads/PAS_FOTO_FELLIX.jpeg', 21, '2024-10-31 12:58:41'),
(13, 'Tren Teknologi Blockchain dalam Finansial', 'Blockchain, teknologi di balik cryptocurrency, mulai diterapkan di berbagai sektor, khususnya finansial. Blockchain dianggap mampu menciptakan sistem yang lebih aman dan transparan dalam transaksi keuangan.', 'teknologi', 'fellix', '2024-10-31', 'uploads/WIN_20240516_13_13_08_Pro.jpg', 16, '2024-10-31 12:59:44'),
(14, 'Mobil Listrik di Masa Depan', 'Produsen mobil besar berlomba mengembangkan mobil listrik untuk mengurangi emisi karbon. Perkembangan baterai yang lebih efisien dan infrastruktur pengisian listrik terus diupayakan agar mobil listrik bisa diakses lebih luas.', 'teknologi', 'fellix', '2024-10-31', 'uploads/3.jpg', 9, '2024-10-31 13:01:43'),
(15, '5G dan Dampaknya pada Kecepatan Internet', 'Teknologi jaringan 5G menjanjikan kecepatan internet yang jauh lebih tinggi daripada 4G. Selain itu, 5G mendukung aplikasi IoT, AR, dan VR yang semakin populer di industri hiburan dan telekomunikasi.', 'teknologi', 'fellix', '2024-10-31', 'uploads/14.jpg', 12, '2024-10-31 13:02:18'),
(16, 'Smart Home: Mengubah Rumah dengan Teknologi', 'Teknologi rumah pintar memungkinkan kita mengendalikan berbagai perangkat rumah, seperti lampu dan AC, melalui ponsel atau suara. Smart home makin digemari karena kenyamanan dan efisiensinya.', 'teknologi', 'fellix', '2024-10-31', 'uploads/1.jpg', 4, '2024-10-31 13:02:57'),
(17, 'Cybersecurity dan Keamanan Data Pribadi', 'Dengan semakin banyaknya data yang tersimpan di internet, keamanan siber menjadi semakin penting. Teknik seperti enkripsi dan autentikasi dua faktor terus dikembangkan untuk melindungi data pribadi.', 'teknologi', 'fellix', '2024-10-31', 'uploads/9.jpg', 13, '2024-10-31 13:03:36'),
(18, 'Perkembangan Teknologi Wearable', 'Gadget wearable, seperti smartwatch dan fitness tracker, membantu pengguna memantau kesehatan mereka sehari-hari. Data yang dikumpulkan dari wearable juga bermanfaat dalam pengembangan medis.', 'teknologi', 'fellix', '2024-10-31', 'uploads/24.jpg', 19, '2024-10-31 13:04:25'),
(19, 'Augmented Reality (AR) dan Virtual Reality (VR) di Pendidikan', 'Teknologi AR dan VR mulai diterapkan dalam pendidikan untuk menciptakan pengalaman belajar yang lebih interaktif dan menarik. Teknologi ini memudahkan simulasi dan eksperimen virtual bagi siswa.', 'teknologi', 'fellix', '2024-10-31', 'uploads/32.jpg', 23, '2024-10-31 13:05:04'),
(20, 'Komputasi Kuantum: Revolusi dalam Pengolahan Data', 'Komputasi kuantum mampu memproses data jauh lebih cepat daripada komputer biasa. Meskipun masih dalam tahap pengembangan, teknologi ini menjanjikan lompatan besar dalam berbagai bidang, seperti farmasi dan logistik.', 'teknologi', 'fellix', '2024-10-31', 'uploads/8.jpg', 8, '2024-10-31 13:06:19'),
(21, 'Tren E-commerce dan Teknologi Pembayaran Digital', 'Belanja online semakin populer, terutama dengan adanya metode pembayaran digital seperti e-wallet dan QR code. Teknologi ini memudahkan konsumen dalam bertransaksi dan mendorong pertumbuhan ekonomi digital.', 'teknologi', 'fellix', '2024-10-31', 'uploads/2.jpg', 8, '2024-10-31 13:06:48'),
(22, 'Mengenal Diet Plant-Based dan Manfaatnya', 'Diet plant-based atau diet berbasis tumbuhan kini semakin populer karena dipercaya baik untuk kesehatan dan lingkungan. Diet ini berfokus pada konsumsi sayuran, buah-buahan, biji-bijian, dan kacang-kacangan.', 'lifestyle', 'fellix', '2024-10-31', 'uploads/PAS_FOTO_FELLIX.jpeg', 20, '2024-10-31 13:07:29'),
(23, 'Cara Mengatasi Stres dengan Teknik Mindfulness', 'Mindfulness adalah teknik relaksasi yang mengajarkan kita untuk lebih fokus pada momen saat ini. Teknik ini terbukti dapat membantu mengurangi stres dan meningkatkan kesehatan mental.', 'lifestyle', 'fellix', '2024-10-31', 'uploads/WIN_20240516_09_28_36_Pro.jpg', 17, '2024-10-31 13:07:58'),
(24, 'Tren Fashion Ramah Lingkungan', 'Fashion ramah lingkungan atau sustainable fashion semakin diminati. Tren ini mendorong penggunaan bahan yang lebih ramah lingkungan dan mendukung proses produksi yang lebih etis.', 'lifestyle', 'fellix', '2024-10-31', 'uploads/p6.jpg', 27, '2024-10-31 13:08:52'),
(25, 'Tips Produktivitas dengan Metode Pomodoro', 'Metode Pomodoro adalah teknik manajemen waktu yang membagi pekerjaan menjadi interval 25 menit. Teknik ini diklaim bisa meningkatkan fokus dan produktivitas, cocok untuk pelajar dan pekerja kantoran.', 'lifestyle', 'fellix', '2024-10-31', 'uploads/p2.jpg', 26, '2024-10-31 13:09:27'),
(26, 'Manfaat Olahraga Ringan Seperti Jalan Kaki', 'Olahraga ringan seperti jalan kaki memiliki banyak manfaat bagi kesehatan, seperti menurunkan risiko penyakit jantung dan meningkatkan kesehatan mental. Jalan kaki juga cocok untuk berbagai usia dan dapat dilakukan kapan saja.', 'lifestyle', 'fellix', '2024-10-31', 'uploads/p7.jpg', 0, '2024-10-31 13:10:00'),
(27, 'Fenomena \"Work-Life Balance\" di Era Modern', 'Work-life balance menjadi isu penting di era modern, di mana banyak orang merasa kesulitan menyeimbangkan pekerjaan dan kehidupan pribadi. Beberapa tips untuk menjaga keseimbangan ini adalah membatasi jam kerja dan meluangkan waktu untuk hobi.', 'lifestyle', 'fellix', '2024-10-31', 'uploads/blog.jpg', 0, '2024-10-31 13:10:32'),
(28, 'Tren Dekorasi Rumah Minimalis', 'Dekorasi minimalis sedang digemari, dengan fokus pada kesederhanaan, ruang yang lega, dan pemilihan warna netral. Konsep ini dipercaya memberikan ketenangan dan meningkatkan kenyamanan di rumah.', 'lifestyle', 'fellix', '2024-10-31', 'uploads/p4.jpg', 13, '2024-10-31 13:11:12'),
(29, 'Manfaat Tidur Berkualitas bagi Kesehatan', 'Tidur berkualitas sangat penting bagi kesehatan fisik dan mental. Kurang tidur dapat mengganggu konsentrasi, menurunkan imunitas, dan memicu penyakit kronis. Tips untuk tidur berkualitas meliputi menjaga rutinitas tidur dan menghindari kafein.', 'lifestyle', 'fellix', '2024-10-31', 'uploads/p.jpg', 12, '2024-10-31 13:11:50'),
(30, 'Fenomena Self-Care di Media Sosial', 'Self-care kini menjadi bagian penting dalam gaya hidup modern dan sering dibagikan di media sosial. Konsep ini meliputi kegiatan untuk menjaga kesehatan fisik dan mental, seperti perawatan tubuh, meditasi, dan olahraga.', 'lifestyle', 'fellix', '2024-10-31', 'uploads/p3.jpg', 9, '2024-10-31 13:12:19'),
(31, 'Pentingnya Mengurangi Pemakaian Plastik Sekali Pakai', 'Gaya hidup ramah lingkungan semakin populer, termasuk mengurangi pemakaian plastik sekali pakai. Alternatif yang bisa dicoba antara lain membawa tas belanja sendiri, memakai botol minum pribadi, dan memilih produk yang lebih ramah lingkungan.', 'lifestyle', 'fellix', '2024-10-31', 'uploads/p5.jpg', 17, '2024-10-31 13:12:46');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
