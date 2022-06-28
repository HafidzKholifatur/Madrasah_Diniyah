-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2022 pada 15.47
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tpa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(35) NOT NULL,
  `admin_username` varchar(25) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`) VALUES
(1, 'Adminin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `tgl_dibuat`) VALUES
(11, 'Praktek', '2022-06-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` int(11) NOT NULL,
  `mapel_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `mapel_nama`) VALUES
(5, 'Al-Qur\'an'),
(6, 'Al-Hadits'),
(7, 'Terjemah'),
(8, 'Aqidah Ahlak'),
(9, 'Fiqih'),
(10, 'Sejarah Kebudayaan Islam'),
(11, 'Bahasa Arab'),
(12, 'Praktek Ibadah'),
(13, 'Do\'a Harian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `pengajar_id` int(11) NOT NULL,
  `pengajar_nama` varchar(50) NOT NULL,
  `pengajar_jk` varchar(15) NOT NULL,
  `pengajar_lahir` date NOT NULL,
  `pengajar_telp` varchar(30) NOT NULL,
  `pengajar_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`pengajar_id`, `pengajar_nama`, `pengajar_jk`, `pengajar_lahir`, `pengajar_telp`, `pengajar_alamat`) VALUES
(7, 'Sanih Halimah', 'Perempuan', '1969-06-27', '081748293013', 'Jl Masjid Jami Alfurqon, Kec. Jatiasih, Bekasi'),
(8, 'Masnah, S.Ag', 'Perempuan', '1980-02-26', '081564728192', 'Jl Masjid Jami Alfurqon, Kec. Jatiasih, Bekasi'),
(9, 'Kimah', 'Perempuan', '1977-11-19', '081573829012', 'Jl Masjid Jami Alfurqon, Kec. Jatiasih, Bekasi'),
(10, 'Nahari Naharudin, S.Ag', 'Laki-Laki', '1968-08-23', '08174620127', 'Jl Masjid Jami Alfurqon, Kec. Jatiasih, Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `penilaian_id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`penilaian_id`, `id_kategori`, `id_santri`, `id_mapel`, `nilai`) VALUES
(43, 11, 9, 12, 85),
(45, 11, 11, 12, 85),
(46, 11, 10, 12, 85),
(47, 11, 12, 5, 65),
(48, 11, 13, 12, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `santri_id` int(11) NOT NULL,
  `santri_nama` varchar(50) NOT NULL,
  `santri_jk` varchar(50) NOT NULL,
  `santri_lahir` date NOT NULL,
  `santri_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`santri_id`, `santri_nama`, `santri_jk`, `santri_lahir`, `santri_alamat`) VALUES
(9, 'Aulia', 'Perempuan', '2009-06-12', 'Komplek Asabri'),
(10, 'Naila', 'Perempuan', '2008-05-09', 'Jatiasih'),
(11, 'Fahmi', 'Laki-Laki', '2008-11-16', 'Komplek Danamon'),
(12, 'Dzaki', 'Laki-Laki', '2009-01-03', 'Jl. Sirojul Munir'),
(13, 'Muhammad Akmal', 'Laki-Laki', '2002-11-28', 'Jatiasih');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indeks untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`pengajar_id`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`penilaian_id`),
  ADD KEY `mapel_id` (`id_mapel`),
  ADD KEY `santri_id` (`id_santri`) USING BTREE,
  ADD KEY `penilaian_ibfk_3` (`id_kategori`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`santri_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `mapel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `pengajar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `penilaian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `santri`
--
ALTER TABLE `santri`
  MODIFY `santri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `santri` (`santri_id`),
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`mapel_id`),
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`kategori_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
