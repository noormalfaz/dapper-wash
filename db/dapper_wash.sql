-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Apr 2023 pada 07.09
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
-- Database: `dapper_wash`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int NOT NULL,
  `kode` varchar(10) COLLATE utf16_unicode_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `nohp` varchar(15) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `kode`, `nama`, `alamat`, `nohp`) VALUES
(14, 'MBR001', 'Noor Mohamad Alfaz', 'Tasikmalaya', '082129530705'),
(15, 'MBR002', 'Vina Lestari', 'Tasikmalaya', '083134675876'),
(16, 'MBR003', 'Sabilla Noerkhotimah', 'Tasikmalaya', '089836497182'),
(17, 'MBR004', 'Muhamad Irfai', 'Tasikmalaya', '086983762546'),
(18, 'MBR005', 'Adit Paldiana', 'Tasikmalaya', '084587293409');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int NOT NULL,
  `kode` varchar(10) COLLATE utf16_unicode_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `harga` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `hari` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `kode`, `nama`, `harga`, `hari`) VALUES
(11, 'PKT001', 'Cuci Kering', '15000', 1),
(13, 'PKT002', 'Cuci Basah', '12000', 1),
(14, 'PKT003', 'Cuci Setrika', '22000', 2),
(15, 'PKT004', 'Cuci Setrika + Pewangi', '27000', 3),
(16, 'PKT005', 'Cuci + Pewangi', '18000', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kode` varchar(10) COLLATE utf16_unicode_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `paket_id` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `berat` int NOT NULL,
  `total` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `tgl_ambil` date NOT NULL,
  `status` int NOT NULL,
  `member` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_masuk`, `kode`, `nama`, `paket_id`, `berat`, `total`, `tgl_ambil`, `status`, `member`, `user_id`) VALUES
(30, '2022-12-10', 'TRANS001', 'Aldi Jaya Mulyana', '11', 3, '45000', '2022-12-11', 2, 'Non Member', 21),
(31, '2022-12-10', 'TRANS002', 'Noor Mohamad Alfaz', '15', 2, '45900', '2022-12-13', 2, 'Member', 21),
(32, '2022-12-10', 'TRANS003', 'Salsabilla', '14', 1, '22000', '2022-12-12', 2, 'Non Member', 21),
(33, '2022-12-11', 'TRANS004', 'Rohman', '11', 2, '30000', '2022-12-12', 2, 'Non Member', 21),
(34, '2022-12-11', 'TRANS005', 'Vina Lestari', '16', 3, '45900', '2022-12-13', 2, 'Member', 21),
(35, '2022-12-12', 'TRANS006', 'Aldi Jaya Maulana', '13', 2, '20400', '2022-12-13', 2, 'Member', 21),
(36, '2022-12-12', 'TRANS007', 'Noor Mohamad Alfaz', '11', 1, '15000', '2022-12-13', 2, 'Non Member', 21),
(37, '2022-12-12', 'TRANS008', 'Muhamad Irfai', '11', 1, '12750', '2022-12-13', 0, 'Member', 21),
(38, '2022-12-12', 'TRANS009', 'qwrwqerf', '11', 1, '15000', '2022-12-13', 0, 'Non Member', 21),
(39, '2022-12-12', 'TRANS010', 'Sabilla Noerkhotimah', '11', 1, '12750', '2022-12-13', 0, 'Member', 21),
(40, '2022-12-12', 'TRANS011', 'Vikry Anjay', '15', 3, '81000', '2022-12-15', 0, 'Non Member', 21),
(41, '2022-12-12', 'TRANS012', 'Vina Lestari', '15', 3, '68850', '2022-12-15', 0, 'Member', 21),
(42, '2023-02-21', 'TRANS013', 'Vina Lestari', '14', 2, '37400', '2023-02-23', 0, 'Member', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `name` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf16_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(9, 'Aldi Jaya Mulyana', 'aldikakabow28@gmail.com', 'default2.jpg', '$2y$10$VaQgMCUUXtCV/qql5TvMy.J6iwtLhD85h4qhYqqfdOSfe9vvMbQ3m', 1, 1, 1665241651),
(16, 'Aldi', 'aldijaya280902@gmail.com', 'default.jpg', '$2y$10$aNXVqtxjdbI7QEYiMCmBbeNa7k36GzfMfbBRACtrhY0eTgd5Fq7d2', 2, 1, 1668272091),
(17, 'Aldi Jaya Mulyana', '12210838@bsi.ac.id', 'default.jpg', '$2y$10$B1FmjSWqXG5ddgA8o7dAZuE904TSUXvsDJnKmvmOicpDAT8RoQ6Di', 2, 1, 1668419932),
(21, 'Noor Mohamad Alfaz', 'noormzzz07@gmail.com', 'default1.jpg', '$2y$10$v1A6XU/VXxHB4KhG0QO1eO0KbribJwGAtfFKNXA5U1oaEFrS3Kj8y', 1, 1, 1668939115),
(27, 'Noor Mohamad Alfaz', 'noorm4210@gmail.com', 'default.jpg', '$2y$10$qQx.sk8NtWm7t3mMrH4N/Oinj3ZTqDjOCCiYpw5.lB5PQCFU6K1mK', 2, 1, 1670999647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_user_access_menu` int NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_user_access_menu`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(6, 1, 3),
(7, 1, 2),
(10, 3, 2),
(12, 1, 8),
(14, 2, 8),
(15, 5, 2),
(17, 1, 13),
(21, 1, 11),
(22, 1, 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id_user_menu` int NOT NULL,
  `menu` varchar(128) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id_user_menu`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(8, 'Laundry'),
(11, 'Paket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_user_role` int NOT NULL,
  `role` varchar(128) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_user_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_user_sub_menu` int NOT NULL,
  `menu_id` int NOT NULL,
  `title` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `icon` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_user_sub_menu`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil Saya', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profil', 'user/edit', 'fa fa-fw fa-user-edit', 1),
(4, 3, 'Manajemen Menu', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Manajemen Submenu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fa fa-fw fa-user-tie', 1),
(8, 2, 'Ubah Password', 'user/changepassword', 'fa fa-fw fa-key', 1),
(11, 8, 'Data Member', 'laundry', 'fa fa-fw fa-users', 1),
(12, 11, 'Data Paket', 'paket', 'fa fa-fw fa-suitcase', 1),
(13, 8, 'Data Transaksi', 'laundry/transaksi', 'fa fa-fw fa-money-bill-wave', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_user_token` int NOT NULL,
  `email` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `token` varchar(129) COLLATE utf16_unicode_ci NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id_user_token`, `email`, `token`, `date_created`) VALUES
(6, 'aldijaya280902@gmail.com', 'QqnESUuUttlhc2Hx9qXQPqhsQGH88gAK5Wjau7KoqmA=', 1668345129),
(7, 'aldijaya280902@gmail.com', 'IxQO2tkOFGjXEzyWbTEqXQ+mByAkkdEkBy8H71NNi24=', 1668345152),
(12, 'noorrikudou93@gmail.com', 'JGH4p8PYzsK7FzR9WvzmSVOCyTQgHH8dRhHfI+/X6x0=', 1668939040);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_user_access_menu`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_user_menu`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_user_role`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_user_sub_menu`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_user_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_user_access_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_user_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_user_sub_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_user_token` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
