-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2021 pada 23.12
-- Versi server: 10.5.5-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ornamen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE `brands` (
  `brd_id` int(3) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`brd_id`, `brand`, `logo`) VALUES
(16, '8dimensi', '8dimensi.png'),
(17, 'tigaenterprise', 'tigaenterprise.png'),
(19, 'holcim', 'holcim.png'),
(20, 'honda', 'honda.png'),
(21, 'wartsila', 'wartsila.png'),
(22, 'telkom', 'telkom.png'),
(24, 'sdadd', 'IMG_20180807_060245.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `counter`
--

CREATE TABLE `counter` (
  `counter_id` int(11) NOT NULL,
  `counter_ip` varchar(50) NOT NULL,
  `counter_date` date NOT NULL,
  `counter_time` time NOT NULL,
  `counter_visit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `counter`
--

INSERT INTO `counter` (`counter_id`, `counter_ip`, `counter_date`, `counter_time`, `counter_visit`) VALUES
(1, '::1', '2021-04-27', '21:25:29', 1),
(2, '::1', '2021-05-16', '21:48:44', 1),
(3, '::1', '2021-05-17', '00:10:58', 1),
(4, '::1', '2021-05-27', '15:25:28', 2),
(5, '::1', '2021-05-27', '15:25:28', 2),
(6, '::1', '2021-05-29', '14:29:43', 1),
(7, '::1', '2021-05-31', '23:53:13', 1),
(8, '::1', '2021-06-01', '00:03:01', 1),
(9, '::1', '2021-06-02', '22:10:27', 1),
(10, '::1', '2021-06-03', '19:43:35', 1),
(11, '::1', '2021-06-04', '00:03:15', 1),
(12, '::1', '2021-06-09', '08:07:07', 1),
(13, '::1', '2021-06-10', '15:59:10', 1),
(14, '::1', '2021-06-11', '09:18:17', 1),
(15, '::1', '2021-06-14', '08:19:29', 1),
(16, '::1', '2021-06-15', '11:18:48', 1),
(17, '::1', '2021-06-16', '00:01:22', 1),
(18, '::1', '2021-06-17', '13:33:21', 1),
(19, '::1', '2021-06-18', '08:52:31', 1),
(20, '::1', '2021-06-20', '14:08:35', 1),
(21, '::1', '2021-06-21', '08:32:33', 1),
(22, '::1', '2021-06-22', '23:02:42', 1),
(23, '::1', '2021-06-23', '20:59:15', 2),
(24, '::1', '2021-06-24', '10:42:47', 1),
(25, '::1', '2021-06-25', '23:45:59', 2),
(26, '::1', '2021-06-26', '10:35:27', 1),
(27, '::1', '2021-06-27', '00:02:18', 1),
(28, '::1', '2021-06-28', '00:11:10', 1),
(29, '::1', '2021-06-29', '00:46:26', 1),
(30, '::1', '2021-06-30', '20:22:21', 2),
(31, '::1', '2021-07-01', '00:01:09', 1),
(32, '::1', '2021-07-02', '22:14:40', 2),
(33, '::1', '2021-07-03', '00:01:24', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `member_id` int(8) NOT NULL,
  `order_id` varchar(5) NOT NULL,
  `fullname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `kritik` mediumtext CHARACTER SET latin1 NOT NULL,
  `saran` mediumtext CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`member_id`, `order_id`, `fullname`, `kritik`, `saran`) VALUES
(1, '1', 'fajar maulana', 'keren', 'tapi mahal'),
(2, '2', 'fajar maulana', 'keren', 'mba mbanya jutek'),
(3, '3', 'agus maulana', 'w', 'x');

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `item_id` varchar(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `brd_id` int(11) NOT NULL,
  `size` varchar(30) NOT NULL,
  `clr_id` varchar(11) NOT NULL,
  `bgimg` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `material_care` mediumtext NOT NULL,
  `price` varchar(11) NOT NULL,
  `discount` varchar(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `available` varchar(10) NOT NULL,
  `creation_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `cat_id`, `scat_id`, `brd_id`, `size`, `clr_id`, `bgimg`, `image`, `detail`, `material_care`, `price`, `discount`, `stock`, `available`, `creation_date`) VALUES
('0008', 'Paket 2 Jam', 2, 28, 0, 'S,M,L,XL', '', '0630paket2.jpeg', 'paket2.jpeg', 'hjgjgj', '-Cetak Foto 4R / 6R\r\n-Fun Props\r\n-Photo Template\r\n-Frame / Bingkai Foto Kertas\r\n-Printer Kodak 605\r\n-Studio Lighting\r\n-Fotografer + Operator\r\n-Softcopy (1 CD Master)', '2500000', '0', 6, 'Ada', '2021-06-30'),
('0009', 'Paket 3 Jam', 2, 0, 0, 'S,M,L,XL', '', '0630Paket3.jpeg', 'Paket3.jpeg', 'oo', '-Cetak Foto 4R / 6R\r\n-Fun Props\r\n-Photo Template\r\n-Frame / Bingkai Foto Kertas\r\n-Printer Kodak 605\r\n-Studio Lighting\r\n-Fotografer + Operator\r\n-Softcopy (1 CD Master)', '3500000', '0', 95, 'Ada', '2021-06-30'),
('0010', 'Paket 4 Jam', 2, 0, 0, 'S,M,L,XL', '', '0630Paket4.jpeg', 'Paket4.jpeg', 'rrrrrr', '-Cetak Foto 4R / 6R\r\n-Fun Props\r\n-Photo Template\r\n-Frame / Bingkai Foto Kertas\r\n-Printer Kodak 605\r\n-Studio Lighting\r\n-Fotografer + Operator\r\n-Softcopy (1 CD Master)', '4500000', '0', 4, 'Ada', '2021-06-30'),
('0011', 'Photobooth 180 degree', 2, 0, 0, 'S,M,L,XL', '', '0630paket180.jpeg', 'paket180.jpeg', 'rrrr', '-10 kamera DSLR\r\n-2 lighting\r\n-1 LCD preview\r\n-1 set software system\r\n-Branding layout\r\n-Unlimited photo\r\n-Sharing station\r\n-Cloud storage and share', '9000000', '0', 0, 'Habis', '2021-06-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `order_id` varchar(8) CHARACTER SET latin1 NOT NULL,
  `transaksi_id` int(8) NOT NULL,
  `member_id` varchar(8) CHARACTER SET latin2 COLLATE latin2_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `member_id` int(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(80) NOT NULL,
  `state` varchar(60) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`member_id`, `fullname`, `gender`, `address`, `city`, `state`, `zip_code`, `phone`, `email`, `password`, `reg_date`) VALUES
(1, 'agus maulana', 'Laki-laki', 'Kebon sirih', 'Menteng', 'DKI jakarta', '12313', '+6223342123', 'jahro666@gmail.com', '448ba9e21b56d82e5edca3fd25d1748e', '2021-07-03'),
(2, 'fajar maulana', 'Laki-laki', 'Jl. DANAU KELAPA DUA', 'Tangerang', 'Banten', '15811', '+6285714575433', 'fajarmaulana110897@gmail.com', '448ba9e21b56d82e5edca3fd25d1748e', '2021-07-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` varchar(11) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `nama_acara` varchar(100) NOT NULL,
  `tempat_acara` varchar(100) NOT NULL,
  `cardbank_type` varchar(12) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `totals` varchar(11) NOT NULL,
  `creation_date` date NOT NULL,
  `creation_time` time NOT NULL DEFAULT '00:00:00',
  `order_status` varchar(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `owner_name`, `nama_acara`, `tempat_acara`, `cardbank_type`, `card_number`, `payment_status`, `totals`, `creation_date`, `creation_time`, `order_status`, `order_date`) VALUES
(1, '2', 'fajar agus maulana', 'sunatan ', 'balaisarbini', 'Bank BCA', '344444', 'APPROVED', '5000000', '2021-07-03', '22:50:28', 'CONFIRM', '2021-07-03'),
(2, '2', 'hajatan', 'Pesta rakyatbosssssss', 'balai sarbini', 'Bank BCA', '213131', 'Menunggu Konfrimasi Pembayaran Oleh Admin', '3500000', '2021-07-03', '22:52:40', 'PENDING', '2222-02-22'),
(3, '1', 'Fitrahudin', 'nikahan', 'Gedung serba guna', 'Bank BRI', '123123', 'Menunggu Konfrimasi Pembayaran Oleh Admin', '2500000', '2021-07-03', '22:54:42', 'PENDING', '2021-03-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `detail_id` int(11) NOT NULL,
  `order_id` varchar(11) NOT NULL,
  `bgimg` varchar(100) NOT NULL,
  `item_code` varchar(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `color` varchar(11) NOT NULL,
  `size` varchar(5) NOT NULL,
  `qty` int(11) NOT NULL,
  `disc` int(3) NOT NULL,
  `price` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`detail_id`, `order_id`, `bgimg`, `item_code`, `item_name`, `color`, `size`, `qty`, `disc`, `price`) VALUES
(1, '1', '0630paket2.jpeg', '0008', 'Paket 2 Jam', '', '', 2, 0, '2500000'),
(2, '2', '0630Paket3.jpeg', '0009', 'Paket 3 Jam', '', '', 1, 0, '3500000'),
(3, '3', '0630paket2.jpeg', '0008', 'Paket 2 Jam', '', '', 1, 0, '2500000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subcategories`
--

CREATE TABLE `subcategories` (
  `scat_id` int(11) NOT NULL,
  `subcategory` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subcategories`
--

INSERT INTO `subcategories` (`scat_id`, `subcategory`, `cat_id`) VALUES
(1, 'T-Shirt', 1),
(2, 'Casual Shirts', 1),
(3, 'Formal Shirts', 1),
(26, 'Boys Sports Shoes', 9),
(27, 'Shorts and Skirts', 4),
(28, 'baju', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(8) NOT NULL,
  `order_id` varchar(8) CHARACTER SET latin1 NOT NULL,
  `member_id` int(8) NOT NULL,
  `total_harga` varchar(11) CHARACTER SET latin1 NOT NULL,
  `bukti` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `order_id`, `member_id`, `total_harga`, `bukti`) VALUES
(1, '0001', 7, '4500000', '60-00010003.jpg'),
(2, '0002', 7, '4500000', '21-00020007.jpg'),
(3, '0003', 7, '8000000', '16-00030008.jpg'),
(4, '0004', 7, '4500000', '98-000423674745_a8491d4c-3b9c-465b-9fb2-3516749fb0c9_580_580.png'),
(5, '1', 1, '4500000', '80-15827563-bow-tie-png-download-3271068-free-transparent-necktie-png-necktie-png-900_1080.png'),
(6, '2', 1, '7000000', '24-23936.jpg'),
(7, '1', 2, '5000000', '80-15827563-bow-tie-png-download-3271068-free-transparent-necktie-png-necktie-png-900_1080.png'),
(8, '2', 2, '3500000', '24-23936.jpg'),
(9, '3', 1, '2500000', '20-3Kerangka Pikir(1)(2).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `fullname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `user` varchar(30) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `user`, `pass`) VALUES
(1, 'Victory Webstore', 'admin', '0192023a7bbd73250516f069df18b500'),
(2, 'avra nabila', 'avra21', '0192023a7bbd73250516f069df18b500'),
(3, 'Jeje Camila', 'jeje19', '7f95b733f4210c71482904eb422143f8'),
(5, 'farhan m', 'farhan19', '7f95b733f4210c71482904eb422143f8'),
(8, 'Freya Kayonna', 'freya01', 'rahasia123'),
(9, 'Dwi Handa', 'dwi02', 'rahasia123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brd_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indeks untuk tabel `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`counter_id`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD UNIQUE KEY `member_id` (`member_id`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`scat_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `brd_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `counter`
--
ALTER TABLE `counter`
  MODIFY `counter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `member_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `scat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
