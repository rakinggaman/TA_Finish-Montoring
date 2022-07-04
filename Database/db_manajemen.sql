-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2022 pada 15.14
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_manajemen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_user` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('admin','superadmin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_user`, `username`, `nama`, `email`, `password`, `level`) VALUES
(1, 'rifki', 'Muhammad Rifki Pratama ', 'mrifkipratama@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'superadmin'),
(2, 'ricu', 'ricu pratama', 'ricupratama@gmail.com', '4d4dc6c45f47b15778b590bdbedd386e', 'admin'),
(6, 'aisyah', 'Aisyah azzura', 'aisyah@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'superadmin'),
(9, 'salsa', 'Shalsabila Adriani K', 'smi.ngga.t.33@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(11, 'ikhwan', 'Ikhwan hmm', 'ikhwan..', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(12, 'daniel', 'Daniel PA', 'daniel00', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(13, 'yuli', 'Yuli A', 'yuli@', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(14, 'mita', 'Mita T', 'mita88', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(15, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'admin'),
(16, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'admin'),
(17, 'anim', 'Anim IT', 'animhu', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(18, 'renato', 'Renato OP', 'renato66', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(19, 'almeida', 'Almeida', 'www@gmail.com', '85d708c6077c5113fb0dbb81f39fc4b8', 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `kode_artikel` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `artikel` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`kode_artikel`, `judul`, `gambar`, `artikel`) VALUES
(1, 'Apa Itu Website?', 'https://www.sekawanmedia.co.id/wp-content/uploads/elementor/thumbs/website-adalah-ozy5y7ex66fhmu4mzc2g19z5mhhy3mnui3ysxmkabk.jpg', 'Pengertian website\r\nWebsite adalah kumpulan halaman dalam suatu domain yang memuat tentang berbagai informasi agar dapat dibaca dan dilihat oleh pengguna internet melalui sebuah mesin pencari. Informasi yang dapat dimuat dalam sebuah website umumnya berisi mengenai konten gambar, ilustrasi, video, dan teks untuk berbagai macam kepentingan.\r\n\r\nBiasanya untuk tampilan awal sebuah website dapat diakses melalui halaman utama (homepage) menggunakan browser dengan menuliskan URL yang tepat. Di dalam sebuah homepage, juga memuat beberapa halaman web turunan yang saling terhubung satu dengan yang lain.\r\n\r\nSejarah website\r\nSejarah website pertama kali dimulai dari seorang ilmuwan yang berasal dari Inggris, bernama Tim Berners-Lee. Orang tua dari Berners juga merupakan ilmuwan komputer pada era awal dunia komputasi. \r\n\r\nTujuan awal dari Tim Berners membuat sebuah website adalah supaya lebih memudahkan para peneliti di tempat kerjanya untuk mendapatkan dan bertukar informasi. Kemudian, pada tanggal 30 April 1993, secara resmi CERN yang merupakan laboratorium fisika di Swiss mengumumkan tentang perilisan website secara gratis.\r\n\r\nSebelum itu pada tahun 1990, Tim Berners-Lee juga menuliskan tentang tiga teknologi dasar web, antara lain:\r\n\r\nHTML (HyperText Markup Language)\r\nMerupakan bahasa markup atau format untuk halaman web.\r\n\r\nURI (Uniform Resource Identifier)\r\nMerupakan sebuah alamat unik untuk membuka halaman situs. Fungsinya adalah mengidentifikasi setiap sumber daya yang ada pada web. Saat ini sering disebut dengan URL (Uniform Resource Locator).\r\n\r\nHTTP (HyperText Transfer Protocol)\r\nTeknologi ini memungkinkan seseorang untuk mengambil kembali sumber daya yang terkoneksi dengan semua situs web.\r\n\r\nFungsi website\r\nTerdapat beberapa fungsi website yang memiliki keunggulan dan kualitas yang berbeda sesuai dengan target pemasaran maupun bisnis. Berikut ini merupakan beberapa fungsi yang dikategorikan sesuai dengan tujuan bisnis.'),
(5, 'BUKU ITU?', 'https://images.unsplash.com/photo-1543002588-bfa74002ed7e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80', 'Pengertian Buku adalah jendela ilmu pengetahuan  Apakah kamu familiar dengan slogan tersebut? Tentu saja. Kalimat tersebut biasanya ada di bagian bawah lembaran buku tulis sekolah. Makna dari slogan ‘buku adalah jendela ilmu pengetahuan’ adalah kita bisa mendapatkan wawasan dan pengetahuan yang luas dengan membaca berbagai buku sebab dengan membaca buku, wawasanmu akan bertambah. Lalu menstimulasi otak dan meningkatkan rasa ingin tahu dan rasa ingin belajar.  Pengertian buku berdasarkan tipe buku ada dua yakni fiksi dan non fiksi. Buku fiksi merupakan karangan yang tidak berdasarkan kisah nyata dan fakta sehingga sifatnya faktual, sedangkan buku non fiksi sebaliknya. Keduanya memiliki nilai yang sama, yakni mampu menambah dan memperluas wawasan dan pengetahuan pembaca. '),
(6, 'Rekomendasi Laptop 3', 'https://images.unsplash.com/photo-1623040522601-18ef4bf3ddc9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80 3', 'Metode pembelajaran jarak jauh akibat pandemi Covid-19 menjadi salah satu alasannya.  Hari ini, terdapat banyak merek laptop yang menyediakan spesifikasi mumpuni untuk kegiatan belajar.  Mulai dari Acer, Asus, Lenovo, Dell, HP hingga Apple.  Namun, dari sekian banyak produk yang ditawarkan brand tersebut.  Mana ya yang kira-kira patut untuk dibeli?  Yuk, langsung saja kita simak daftar 8 rekomendasi laptop untuk mahasiswa dan pelajar terbaik tahun 2021 berikut ini. 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `domisili`
--

CREATE TABLE `domisili` (
  `kode_domisili` int(11) NOT NULL,
  `domisili` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `domisili`
--

INSERT INTO `domisili` (`kode_domisili`, `domisili`) VALUES
(1, 'Malang'),
(2, 'Bekasi'),
(3, 'Surabaya'),
(4, 'Jakarta'),
(5, 'Jakarta'),
(6, 'ponorogo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `industri`
--

CREATE TABLE `industri` (
  `kode_industri` int(11) NOT NULL,
  `industri` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `industri`
--

INSERT INTO `industri` (`kode_industri`, `industri`) VALUES
(1, 'Fashion'),
(2, 'Food'),
(3, 'Grovement'),
(4, 'Manajemen'),
(5, 'kreatifitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kode_produk` int(11) NOT NULL,
  `produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kode_produk`, `produk`) VALUES
(1, 'Instagram Konten'),
(2, 'Aplikasi Moblie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progres_projek`
--

CREATE TABLE `progres_projek` (
  `kode_projek_id` int(40) NOT NULL,
  `kode_projek` int(40) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `progres_projek`
--

INSERT INTO `progres_projek` (`kode_projek_id`, `kode_projek`, `deskripsi`, `created_at`) VALUES
(2, 7, 'tes pertama\r\n', '2022-06-18 22:40:08'),
(3, 7, 'tes pertama\r\n', '2022-06-18 22:40:12'),
(4, 7, 'tes pertama\r\n', '2022-06-18 22:42:08'),
(5, 7, 'tes kedua\r\n', '2022-06-18 22:42:14'),
(6, 6, 'hi', '2022-06-18 22:45:27'),
(7, 7, 'tes ke 5\r\n', '2022-06-26 12:34:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `projek`
--

CREATE TABLE `projek` (
  `kode_projek` int(40) NOT NULL,
  `pelanggan` varchar(40) NOT NULL,
  `kode_domisili` int(11) NOT NULL,
  `kode_industri` int(11) NOT NULL,
  `kode_produk` int(11) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `facebook` varchar(40) NOT NULL,
  `nama_perwakilan` varchar(40) NOT NULL,
  `wa_perwakilan` varchar(40) NOT NULL,
  `kode_status` int(11) NOT NULL,
  `gambar_projek` varchar(200) NOT NULL,
  `harga_projek` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `projek`
--

INSERT INTO `projek` (`kode_projek`, `pelanggan`, `kode_domisili`, `kode_industri`, `kode_produk`, `instagram`, `facebook`, `nama_perwakilan`, `wa_perwakilan`, `kode_status`, `gambar_projek`, `harga_projek`) VALUES
(6, 'gambar tes 2', 1, 1, 1, 'gambar ig', 'gambar fb', 'gambar pwer', '0899090921', 3, 'src1.png', 24000000),
(7, 'rifki', 2, 2, 2, 'rifkii', 'rifki fb', 'rifki', '0899090921', 1, 'Dribble.jpg', 24000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `kode_status` int(20) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`kode_status`, `status`) VALUES
(1, 'Selesai'),
(2, 'Belum selesai'),
(3, 'Pengerjaan'),
(4, 'Wawancaras');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`kode_artikel`);

--
-- Indeks untuk tabel `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`kode_domisili`);

--
-- Indeks untuk tabel `industri`
--
ALTER TABLE `industri`
  ADD PRIMARY KEY (`kode_industri`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indeks untuk tabel `progres_projek`
--
ALTER TABLE `progres_projek`
  ADD PRIMARY KEY (`kode_projek_id`),
  ADD KEY `kode_projek_id` (`kode_projek`);

--
-- Indeks untuk tabel `projek`
--
ALTER TABLE `projek`
  ADD PRIMARY KEY (`kode_projek`),
  ADD KEY `kode_domisili` (`kode_domisili`,`kode_industri`,`kode_produk`,`kode_status`),
  ADD KEY `relasi_industri` (`kode_industri`),
  ADD KEY `relasi_produk` (`kode_produk`),
  ADD KEY `relasi_status` (`kode_status`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`kode_status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `kode_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `domisili`
--
ALTER TABLE `domisili`
  MODIFY `kode_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `industri`
--
ALTER TABLE `industri`
  MODIFY `kode_industri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `kode_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `progres_projek`
--
ALTER TABLE `progres_projek`
  MODIFY `kode_projek_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `projek`
--
ALTER TABLE `projek`
  MODIFY `kode_projek` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `kode_status` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `progres_projek`
--
ALTER TABLE `progres_projek`
  ADD CONSTRAINT `kode_projek_id` FOREIGN KEY (`kode_projek`) REFERENCES `projek` (`kode_projek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `projek`
--
ALTER TABLE `projek`
  ADD CONSTRAINT `relasi_domisili` FOREIGN KEY (`kode_domisili`) REFERENCES `domisili` (`kode_domisili`),
  ADD CONSTRAINT `relasi_industri` FOREIGN KEY (`kode_industri`) REFERENCES `industri` (`kode_industri`),
  ADD CONSTRAINT `relasi_produk` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`),
  ADD CONSTRAINT `relasi_status` FOREIGN KEY (`kode_status`) REFERENCES `status` (`kode_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
