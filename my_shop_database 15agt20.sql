-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 06:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_shop_database`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATISRESELLER` (`nomer` INT) RETURNS CHAR(8) CHARSET utf8mb4 BEGIN
DECLARE kodebaru CHAR(8);
DECLARE urut INT;

SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("RSL", LPAD(urut, 6, 0));

RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATISUSER` (`nomer` INT) RETURNS CHAR(8) CHARSET utf8mb4 BEGIN
DECLARE kodebaru CHAR(8);
DECLARE urut INT;

SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("ADM", LPAD(urut, 6, 0));

RETURN kodebaru;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(64) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `judul`, `gambar`, `deskripsi`) VALUES
(2, 'contoh judul about', '2.png', 'contoh deskripsi');

-- --------------------------------------------------------

--
-- Table structure for table `batal_pembelian`
--

CREATE TABLE `batal_pembelian` (
  `id_batal_pembelian` varchar(64) NOT NULL,
  `id_pembelian` varchar(64) NOT NULL,
  `id_pelanggan` varchar(64) NOT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_pembelian` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `batal_pembelian`
--
DELIMITER $$
CREATE TRIGGER `return_stok` AFTER DELETE ON `batal_pembelian` FOR EACH ROW BEGIN
  INSERT INTO return_stok
        (       id_return_stok,
                id_pembelian,
                id_pelanggan,
                total_pembelian
        )
  VALUES
        (       OLD.id_batal_pembelian,
                OLD.id_pembelian,
                OLD.id_pelanggan,
                OLD.total_pembelian
        );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_batal`
--

CREATE TABLE `detail_batal` (
  `id_detail_batal` varchar(64) NOT NULL,
  `id_pembelian` varchar(64) NOT NULL,
  `id_produk` varchar(111) NOT NULL,
  `jumlah` int(64) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `harga` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `detail_batal`
--
DELIMITER $$
CREATE TRIGGER `detail_return` AFTER DELETE ON `detail_batal` FOR EACH ROW BEGIN
  INSERT INTO detail_return
        (       id_detail_return,
                id_pembelian,
                id_produk,
         		jumlah,
         		nama,
         		foto,
                harga
        )
  VALUES
        (       OLD.id_detail_batal,
                OLD.id_pembelian,
                OLD.id_produk,
         		OLD.jumlah,
         		OLD.nama,
         		OLD.foto,
                OLD.harga
        );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_return`
--

CREATE TABLE `detail_return` (
  `id_detail_return` varchar(64) NOT NULL,
  `id_pembelian` varchar(64) NOT NULL,
  `id_produk` varchar(111) NOT NULL,
  `jumlah` int(64) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `harga` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `detail_return`
--
DELIMITER $$
CREATE TRIGGER `return_pembelian_produk` AFTER DELETE ON `detail_return` FOR EACH ROW BEGIN
  INSERT INTO pembelian_produk
        (       id_pembelian_produk,
                id_pembelian,
                id_produk,
         		jumlah,
         		nama,
         		foto,
                harga
        )
  VALUES
        (       OLD.id_detail_return,
                OLD.id_pembelian,
                OLD.id_produk,
         		OLD.jumlah,
         		OLD.nama,
         		OLD.foto,
                OLD.harga
        );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `return_stok_products` AFTER INSERT ON `detail_return` FOR EACH ROW BEGIN
	UPDATE products SET stok=stok+NEW.jumlah
    WHERE product_id = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` varchar(64) NOT NULL,
  `kategori_name` varchar(255) NOT NULL,
  `image_ktg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_name`, `image_ktg`) VALUES
('10', 'sport', '10.png'),
('12', 'smartphone', '12.png'),
('15', 'elektronik', '15.png'),
('16', 'fasion', '2.png'),
('18', 'peralatan rumah', '18.png'),
('9', 'peralatan bayi', '9.png');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` varchar(64) NOT NULL,
  `id_pembelian` varchar(64) NOT NULL,
  `id_produk` varchar(111) NOT NULL,
  `jumlah` int(64) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `harga` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `foto`, `tgl`, `harga`) VALUES
('5f378251d6840', '5f378250adade', '5eb2e780949e3', 4, 'Kemeja Batik Pria Lengan Pendek Murah Baju Batik Cowok Alur - Hitam, size XL', '1.jpg', '2020-08-15 16:17:13', 50000),
('5f37825293f95', '5f378250adade', '5ef84a36561d7', 2, 'TRIPOD SPIDER HP DAN KAMERA/TRIPOD MINI/TRIPOD MURAH - Mera', '5ef84a36561d7.jpg', '2020-08-15 16:17:13', 10000);

--
-- Triggers `laporan`
--
DELIMITER $$
CREATE TRIGGER `detail_batal` AFTER DELETE ON `laporan` FOR EACH ROW BEGIN
  INSERT INTO detail_batal
        (       id_detail_batal,
                id_pembelian,
                id_produk,
         		jumlah,
         		nama,
         		foto,
                harga
        )
  VALUES
        (       OLD.id_laporan,
                OLD.id_pembelian,
                OLD.id_produk,
         		OLD.jumlah,
         		OLD.nama,
         		OLD.foto,
                OLD.harga
        );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(64) NOT NULL,
  `id_pelanggan` varchar(64) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `transaksi` AFTER DELETE ON `pembelian` FOR EACH ROW BEGIN
  INSERT INTO transaksi
        (       id_transaksi,
                id_pembelian,
                id_pelanggan,
                total_pembelian
        )
  VALUES
        (       OLD.id_pembelian,
                OLD.id_pembelian,
                OLD.id_pelanggan,
                OLD.total_pembelian
        );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` varchar(64) NOT NULL,
  `id_pembelian` varchar(64) NOT NULL,
  `id_produk` varchar(111) NOT NULL,
  `jumlah` int(64) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `harga` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `pembelian_produk`
--
DELIMITER $$
CREATE TRIGGER `laporan` AFTER DELETE ON `pembelian_produk` FOR EACH ROW BEGIN
  INSERT INTO laporan
        (       id_laporan,
                id_pembelian,
                id_produk,
         		jumlah,
         		nama,
         		foto,
                harga
        )
  VALUES
        (       OLD.id_pembelian_produk,
                OLD.id_pembelian,
                OLD.id_produk,
         		OLD.jumlah,
         		OLD.nama,
         		OLD.foto,
                OLD.harga
        );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pembelian_products` AFTER INSERT ON `pembelian_produk` FOR EACH ROW BEGIN
	UPDATE products SET stok=stok-NEW.jumlah
    WHERE product_id = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(64) NOT NULL,
  `kategori_id` int(62) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `kategori_id`, `image`, `description`, `stok`) VALUES
('5eb2e780949e3', 'Kemeja Batik Pria Lengan Pendek Murah Baju Batik Cowok Alur - Hitam, size XL', 50000, 16, '1.jpg', 'Deskripsi Kemeja Batik Pria Lengan Pendek Murah Baju Batik Cowok Alur - Hitam, XL\r\nHarap membaca deskripsi dan menanyakan stock terlebih dahulu sebelum order.\r\n\r\n- Semua foto adalah foto ASLI.\r\n\r\n- Bahan: Katun, tidak slimfit\r\n\r\n- Tersedia ukuran:\r\nXL (Lingkar Dada: -/+ 111 cm)\r\n\r\n\r\n- Pada patung menggunakan ukuran XL. Tinggi patung 180 cm.\r\n\r\n- Batik lengan pendek beratnya 150gram, batik lengan panjang beratnya 200gram. (1kg muat 5-6 pcs)\r\n\r\n- Pastikan alamat anda jelas dan lengkap', 185),
('5eb2e84da263d', 'Sepatu Wanita Adidas Running Olahraga Neo / Zoom / Quest Women Import', 100000, 10, '5eb2e84da263d.jpg', 'Deskripsi Sepatu Wanita Adidas Running Olahraga Neo / Zoom / Quest Women Import\r\nSPESIFIKASI\r\nBRAND : Adidas\r\nVARIANT : Zoom 2.0\r\nSIZE : 36-40\r\nQUALITY : made vietnam\r\nSTOK : Ready stock (limited)\r\n\r\nPESAN SEKARANG JUGA\r\n(Tulis dalam catatan ketika order: warna, dan ukuran)\r\nContoh : Order warna kode 2, size 40\r\n\r\nRESELLER or DROPSHIPER ARE WELCOME\r\n--> HARGA DIJAMIN TERMURAH\r\n--> Favorite kan toko kami agar mendapat update barang terbaru\r\n\r\nSILAHKAN ORDER BOSS JANGAN RAGU :)', 92),
('5eb2e8957075e', 'JILBAB HIJAB KERUDUNG SEGIEMPAT SEGI EMPAT SAUDIA POLOS HITAM', 20000, 16, '5eb2e8957075e.jpg', 'Deskripsi JILBAB HIJAB KERUDUNG SEGIEMPAT SEGI EMPAT SAUDIA POLOS HITAM\r\nJilbab Hijab Kerudung Segiempat Saudia Polos Hitam\r\n\r\nHijab Segiempat Bahan Katun Saudia Premium (diatas katun paris), tepi rawis khusus warna Hitam.\r\n\r\nUkuran : 115 x 115 cm\r\n\r\nBahan : Katun Saudia Premium\r\n\r\nVarian warna hanya khusus warna HITAM\r\n\r\nHitam : Ready', 186),
('5ef84a36561d6', 'Lampu Hias Dekorasi Clip Foto Polaroid String 20 LED 2 Meter White', 35000, 15, '5ef84a36561d6.jpg', 'Deskripsi Lampu Hias Dekorasi Clip Foto Polaroid String 20 LED 2 Meter White\r\nLampu hias yang biasa digunakan untuk kebutuhan dekorasi pesta, pernikahan, ulang tahun dan lainnya. Lampu ini memiliki 20 buah LED dan panjang 2 meter sehingga Anda dapat dengan bebas menciptakan kreasi cahaya Anda sendiri.\r\n\r\nLED 20 LED\r\nBattery Type 3 x AA\r\nVoltage : 4.5V\r\nColor Temperature : Warm White\r\nDimension : 2 meter\r\n\r\nDecoration LED Light\r\nLampu hias yang biasa digunakan untuk kebutuhan dekorasi pesta, pernikahan, ulang tahun dan lainnya.\r\n\r\nBattery Powered\r\nLampu LED hias ini ditenagai menggunakan baterai AA sebanyak 3 buah sehingga tidak perlu repot mencolok ke listrik dinding.\r\n\r\nEasy to Install\r\nLampu LED hias ini sangat mudah untuk di pasangkan, Anda hanya perlu menggantungkan lampu ini pada posisi yang ingin Anda pasangkan lampu', 49),
('5ef84a36561d7', 'TRIPOD SPIDER HP DAN KAMERA/TRIPOD MINI/TRIPOD MURAH - Mera', 10000, 12, '5ef84a36561d7.jpg', 'Deskripsi TRIPOD SPIDER HP DAN KAMERA/TRIPOD MINI/TRIPOD MURAH - Merah\r\n????????????READY STOCK BOS????????????\r\n\r\n???? MINI TRIPOD SPIDER FLEXIBLE / TRIPOD HP ATAU KAMERA / TRIPOD MINI\r\n\r\nREADY WARNA\r\n- HITAM\r\n- BIRU\r\n- MERAH\r\n\r\nFEATURES:\r\n- KAKI TRIPOD DILAPISI SEJENIS BUSA\r\n\r\n- FLEXIBLE DESIGN\r\nFLEXIBLE TRIPOD MEMILIKI 3 KAKI YANG MASING-MASING KAKINYA FLEXIBLE, ANDA DAPAT MENGGANTUNG TRIPOD INI KE TIANG DAN DI TEMPAT TEMPAT LAIN YANG TIDAK MUNGKIN DILAKUKAN TRIPOD PADA UMUMNYA\r\n\r\n- UNIVERSAL SOCKET\r\nUNIVERSAL 1/4 SCREW, SEHINGGA SEMUA KAMERA SAKU YANG MEMILIKI JENIS SOCKET INI DAPAT DIGUNAKAN DI TRIPOD INI.\r\n\r\n- MINI BALLHEAD ROTATION\r\nANDA DAPAT MEMUTAR POSISI KAMERAN HINGGA 360 DERAJAT DAN DAPAT DI KUNCI POSISINYA JIKA TELAH MENEMUKAN POSISI YANG SESUAI.\r\nPAKET MINI TRIPOD\r\nMERUPAKAN SEJENIS MINI TRIPOD FLEXIBLE YANG DAPAT DIGUNAKAN PADA BIDANG ATAU PERMUKAAN YANG TIDAK RATA.\r\n\r\nPENGGUNAAAN BISA DIGANTUNG ATAU DI LILITKAN PADA SEBUAH BENDA MISALNYA POHON, TIANG , KURSI DLL. UNTUK KAMU PECINTA TRAVELLING TRIPOD INI SANGAT COCOK DI GUNAKAN\r\n\r\nMINI SPIDER POD INI MEMILIKI KAKI YANG FLEXIBLE NAMUN TETAP KUAT UNTUK MENOPANG BEBAN SMARTPHONE ATAU KAMERA LAINNYA.\r\n', 365),
('5ef8517665872', 'kipas mini portebel lucu', 30000, 15, '5ef8517665872.jpg', 'Deskripsi Kipas Angin Tangan Portable Karakter Mini Fan Cartoon Kartun\r\nFeatures\r\nAdjusable Fan Speed\r\nAnda dapat mengatur kecepatan angin sesuai dengan yang Anda inginkan.\r\n\r\nCute Design\r\nKipas dengan desain unik dengan kuping binatang yang imut.\r\n\r\nRechargeable\r\nAnda dapat mencharge kembali kipas mini ini ketika baterainya sudah habis.\r\n\r\nStrong Wind\r\nKipas ini memiliki kekuatan menghembuskan angin yang tinggi, Anda akan merasakan kesegaran dari kipas ini.\r\n\r\nSpesifikasi\r\n- Material ABS Plastic\r\n- Dimension 22cm x 12cm\r\n- Connection USB\r\n- Model baterry Li-ion 18650\r\n- Charging Time: 4-6jam', 91),
('5ef851a4dc777', 'Kerudung segi empat jumbo wollpeach premium', 30000, 16, '5ef851a4dc777.jpg', 'Deskripsi Kerudung segi empat jumbo wollpeach premium\r\nKerudung segi empat jumbo woolpeach premium\r\nASLI PRODUKSI KONVEKSI KAMI.\r\nUkuran = +/- 130 x 130\r\nBahan Wolpeach Premium\r\nBahan enak nyaman dipakai dan tidak panas\r\nBahan tebal dan tidak nerawang\r\nMudah di bentuk dan tidak kusut\r\nPinggir Jilbab Jahit lipat\r\n\r\nBerat Produk+packing = +/- 200 gram (sekilo bisa muat 5 pcs)\r\nBoleh Beli Satuan (tanpa minimum order)\r\n\r\nWarna sesuai tertera di foto\r\n\r\nWARNA pada FOTO / GAMBAR di etalase kami.. Toleransi Warna +- ( Plus Minus ) 85%\r\ndari Warna Asli Produk. Hal ini dikarena EFFECT CAMERA dan PENCAHAYAAN.\r\n\r\nBarang READY Silahkan LANGSUNG DI ORDER\r\n', 192),
('5ef851a4dc779', 'tas pink', 30000, 16, '2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis noexercit ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id.', 196),
('5f1fbddb48001', 'Gelang Tangan Titanium Steel Kpop BTS Bangtan Boys Rantai - 16cm', 15000, 16, '5f1fbddb48001.jpg', 'Deskripsi Gelang Tangan Titanium Steel Kpop BTS Bangtan Boys Rantai - 16cm\r\nProduct Description\r\n100% brand new\r\nMaterial: Titanium steel\r\nColor: shown as picture\r\nChain width 0.4cm, 16cm / 18cm + 5cm tail chain\r\n\r\nPackage: 1 piece', 110);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `promo_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_prm` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`promo_id`, `name`, `image_prm`) VALUES
('3', 'tst', 'my1.jpg'),
('4', 'test promo', 'my2.jpg'),
('5', 'coba', 'myb.jpg'),
('7', 'jj', '7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reseller`
--

CREATE TABLE `reseller` (
  `reseller_id` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data for table `reseller`
--

INSERT INTO `reseller` (`reseller_id`, `username`, `password`, `email`, `phone`, `role`, `last_login`, `photo`, `created_at`, `is_active`, `alamat`) VALUES
('RSL_5f37817316212', 'sasan', 'sasan', 'ikhsansatwika@gmail.com', '085727526500', 'customer', '2020-08-15 06:32:19', 'RSL_5f37817316212.jpg', '2020-08-15 06:32:19', 0, 'amboekembang Gg.9, No.28, Rt.2 Rw.1 Kedungwuni'),
('RSL_5f380395c5c88', 'fajar', 'fajarlintang10', 'fajarlintang10@gmail.com', '085879056017', 'customer', '2020-08-15 15:47:34', 'default.jpg', '2020-08-15 15:47:34', 0, 'Gembong Gg.Mawar 5, No.30, Rt.02 Rw.01 Kedungwuni, Pekalongan');

--
-- Triggers `reseller`
--
DELIMITER $$
CREATE TRIGGER `KODEOTOMATISRSL` BEFORE INSERT ON `reseller` FOR EACH ROW BEGIN
DECLARE s VARCHAR(8);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(reseller_id,3,6) AS Nomer
FROM reseller ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATISRESELLER(i));
 
IF(NEW.reseller_id IS NULL OR NEW.reseller_id = '')
 THEN SET NEW.reseller_id =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `return_stok`
--

CREATE TABLE `return_stok` (
  `id_return_stok` varchar(64) NOT NULL,
  `id_pembelian` varchar(64) NOT NULL,
  `id_pelanggan` varchar(64) NOT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_pembelian` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `return_stok`
--
DELIMITER $$
CREATE TRIGGER `return_pembelian` AFTER DELETE ON `return_stok` FOR EACH ROW BEGIN
  INSERT INTO pembelian
        (       id_pembelian,
                id_pelanggan,
                tanggal_pembelian,
                total_pembelian
        )
  VALUES
        (       OLD.id_pembelian,
                OLD.id_pelanggan,
                OLD.tanggal_pembelian,
                OLD.total_pembelian
        );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(64) NOT NULL,
  `id_pembelian` varchar(64) NOT NULL,
  `id_pelanggan` varchar(64) NOT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_pembelian` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`) VALUES
('5f378250adade', '5f378250adade', 'RSL_5f37817316212', '2020-08-15 16:17:13', 220000);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `batal_pembelian` AFTER DELETE ON `transaksi` FOR EACH ROW BEGIN
  INSERT INTO batal_pembelian
        (       id_batal_pembelian,
                id_pembelian,
                id_pelanggan,
                total_pembelian
        )
  VALUES
        (       OLD.id_transaksi,
                OLD.id_pembelian,
                OLD.id_pelanggan,
                OLD.total_pembelian
        );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phone`, `role`, `last_login`, `photo`, `created_at`, `is_active`) VALUES
(3, 'fajar', 'lintang', 'fajarlintang2000@gmail.com', '085879056017', 'admin', '2020-05-04 15:51:12', 'user_no_image.jpg', '2020-05-04 15:51:12', 1),
(4, 'maya', '$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.', 'mayacahya31@gmail.com', '085799275385', 'admin', '2020-08-15 15:30:12', 'user_no_image.jpg', '2020-05-04 15:57:49', 0);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `KODEOTOMATIS` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
DECLARE s VARCHAR(8);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(user_id,3,6) AS Nomer
FROM users ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATISUSER(i));
 
IF(NEW.user_id IS NULL OR NEW.user_id = '')
 THEN SET NEW.user_id =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `z_clean`
--

CREATE TABLE `z_clean` (
  `id_z_clean` varchar(64) NOT NULL,
  `id_pembelian` varchar(64) NOT NULL,
  `id_pelanggan` varchar(64) NOT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_pembelian` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `z_detail_clean`
--

CREATE TABLE `z_detail_clean` (
  `id_z_detail_clean` varchar(64) NOT NULL,
  `id_pembelian` varchar(64) NOT NULL,
  `id_produk` varchar(111) NOT NULL,
  `jumlah` int(64) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `harga` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `batal_pembelian`
--
ALTER TABLE `batal_pembelian`
  ADD PRIMARY KEY (`id_batal_pembelian`);

--
-- Indexes for table `detail_batal`
--
ALTER TABLE `detail_batal`
  ADD PRIMARY KEY (`id_detail_batal`);

--
-- Indexes for table `detail_return`
--
ALTER TABLE `detail_return`
  ADD PRIMARY KEY (`id_detail_return`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`reseller_id`);

--
-- Indexes for table `return_stok`
--
ALTER TABLE `return_stok`
  ADD PRIMARY KEY (`id_return_stok`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `z_clean`
--
ALTER TABLE `z_clean`
  ADD PRIMARY KEY (`id_z_clean`);

--
-- Indexes for table `z_detail_clean`
--
ALTER TABLE `z_detail_clean`
  ADD PRIMARY KEY (`id_z_detail_clean`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
