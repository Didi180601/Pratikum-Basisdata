-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 10:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basdat_responsi`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `del_detail_bayar` (`del_id_detail` INT(10))   BEGIN
	DELETE FROM detail_bayar WHERE id_detail = del_id_detail;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_header_bayar` (`del_no_nota` CHAR(10))   BEGIN
	DELETE FROM header_bayar WHERE no_nota = del_no_nota;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_merk` (IN `del_id_merk` INT(15))   BEGIN
	DELETE FROM merk WHERE id_merk = del_id_merk;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_sepatu` (`del_id_sepatu` INT(10))   BEGIN
	DELETE FROM sepatu WHERE id_sepatu = del_id_sepatu;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HitungTotalPembelian` ()   BEGIN
		select jumlah_beli * harga as 'Total Pembelian'
		from detail_bayar join sepatu
		where detail_bayar.id_sepatu = sepatu.id_sepatu;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertdatamerk` (IN `in_nama_merk` VARCHAR(20), IN `in_model_sepatu` VARCHAR(20))   BEGIN
	INSERT INTO merk(nama_merk, model_sepatu)
	VALUES (in_nama_merk, in_model_sepatu);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertdatasepatu` (IN `in_id_merk` VARCHAR(10), IN `in_ukuran` INT(2), IN `in_warna` VARCHAR(10), IN `in_harga` INT(15), IN `in_stok` INT(10))   BEGIN
	INSERT INTO sepatu(id_merk, ukuran, warna, harga, stok)
	VALUES (in_id_merk, in_ukuran, in_warna, in_harga, in_stok);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertdetail_bayar` (IN `in_id_sepatu` INT(10), IN `in_jumlah_beli` INT(5))   BEGIN
	INSERT INTO detail_bayar(id_sepatu, jumlah_beli)
	VALUES (in_id_sepatu, in_jumlah_beli);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertheader_bayar` (IN `in_tanggal` DATE, IN `in_id_detail` VARCHAR(10), IN `in_total_pembelian` INT(15), IN `in_bayar` INT(15), IN `in_sisa_bayar` INT(15))   BEGIN
	INSERT INTO header_bayar(tanggal, id_detail, total_pembelian, bayar, sisa_bayar)
	VALUES (in_tanggal, In_id_detail, in_total_pembelian, in_bayar, in_sisa_bayar);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlahtransaksi` ()   BEGIN
		select count(detail_bayar.id_sepatu) as 'Jumlah Transaksi', nama_merk as 'Merk Sepatu'
		from detail_bayar
		join sepatu on detail_bayar.id_sepatu = sepatu.id_sepatu
		join merk on sepatu.id_merk = merk.id_merk
		group by detail_bayar.id_sepatu;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ManajemenTransaksi` ()   BEGIN
		SELECT no_nota AS 'Nomor Nota', nama_merk AS 'Merk', model_sepatu AS 'Model Sepatu', ukuran, warna, harga, 
		jumlah_beli AS 'Jumlah Beli', jumlah_beli * harga AS 'Total Pembelian',
		bayar, bayar - jumlah_beli * harga AS 'Sisa Bayar', tanggal
		FROM header_bayar
		JOIN detail_bayar ON header_bayar.id_detail = detail_bayar.id_detail
		JOIN sepatu ON detail_bayar.id_sepatu = sepatu.id_sepatu
		JOIN merk ON sepatu.id_merk = merk.id_merk;
		
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sepatupalingbanyakdibeli` ()   BEGIN
		Select nama_merk as 'Merk Sepatu', jumlah_beli as 'Paling Banyak Dibeli'
		From detail_bayar 
		join sepatu on detail_bayar.id_sepatu = sepatu.id_sepatu
		join merk on sepatu.id_merk = merk.id_merk
		
		where jumlah_beli =(select max(jumlah_beli) from detail_bayar);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sepatupalingmahal` ()   BEGIN
		select nama_merk as 'Merk Sepatu', harga as 'Sepatu Paling Mahal'
		from sepatu
		join merk on sepatu.id_merk = merk.id_merk
		where harga = (select max(harga) from sepatu);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sepatupalingmurah` ()   BEGIN
		SELECT nama_merk AS 'Merk Sepatu', harga AS 'Sepatu Paling Mahal'
		FROM sepatu
		JOIN merk ON sepatu.id_merk = merk.id_merk
		WHERE harga = (SELECT min(harga) FROM sepatu);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `up_detailbayar` (IN `up_id_detail` VARCHAR(10), IN `up_id_sepatu` INT(10), IN `up_jumlah_beli` INT(5))   BEGIN
	UPDATE detail_bayar
	SET id_sepatu = in_id_sepatu, jumlah_beli = in_jumlah_beli
    WHERE id_detail = in_id_detail;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `up_headerbayar` (IN `up_no_nota` CHAR(10), IN `up_tanggal` DATE, IN `up_id_detail` VARCHAR(10), IN `up_total_pembelian` INT(15), IN `up_bayar` INT(15), IN `up_sisa_bayar` INT(15))   BEGIN
	UPDATE header_bayar
	SET tanggal = up_tanggal, id_detail = up_id_detail, 
	total_pembelian = up_total_pembelian, bayar = up_bayar, sisa_bayar = up_sisa_bayar
    WHERE no_nota = up_no_nota;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `up_merk` (IN `up_id_merk` VARCHAR(10), IN `up_nama_merk` VARCHAR(10), IN `up_model_sepatu` VARCHAR(20))   BEGIN
	UPDATE merk
	SET nama_merk = up_nama_merk, model_sepatu = up_model_sepatu
    WHERE id_merk = up_id_merk;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `up_sepatu` (IN `up_id_sepatu` INT(10), IN `up_id_merk` VARCHAR(10), IN `up_ukuran` VARCHAR(2), IN `up_warna` VARCHAR(10), IN `up_harga` INT(15), IN `up_stok` INT(10))   BEGIN
	UPDATE sepatu
	SET id_merk = up_id_merk, ukuran = up_ukuran, warna = up_warna, harga = up_harga, 
	stok = up_stok
    where id_sepatu = up_id_sepatu;
	END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `BuatNoNota` (`tgl` DATE, `nomornota` INT) RETURNS VARCHAR(100) CHARSET utf8mb4  BEGIN
	declare tahun1 char(2);
	DECLARE bulan1 CHAR(2);
	DECLARE tanggal1 CHAR(2);
	DECLARE no_urut1 varCHAR(3);
	DECLARE t varCHAR(2);	
	DECLARE nt varCHAR(20);
	
	set tahun1 = Substr(tgl, 3);
	SET bulan1 = SUBSTR(tgl, 6);
	SET tanggal1 = SUBSTR(tgl, 9);
	set t = ('-');
	set nt = (SELECT no_nota from header_bayar where no_nota=nomornota);
	select count(no_nota) from header_bayar where no_nota like concat(tahun1, bulan1, tanggal1, '-', t) into no_urut1;
	return concat (tahun1, bulan1, tanggal1, '-', no_urut1, nomornota);
	
    END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `merk` (`id` INT(100)) RETURNS VARCHAR(30) CHARSET utf8mb4  BEGIN
DECLARE NAME VARCHAR(3);
SELECT nama_merk FROM merk WHERE id_merk=id INTO NAME;
RETURN NAME;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `pemasukan_harian` (`tanggal_` DATE) RETURNS VARCHAR(100) CHARSET utf8mb4  BEGIN
DECLARE total VARCHAR(100);
SELECT total_pembelian FROM header_bayar WHERE tanggal=tanggal_ INTO total;
RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_bayar`
--

CREATE TABLE `detail_bayar` (
  `id_detail` int(5) NOT NULL,
  `id_sepatu` int(5) DEFAULT NULL,
  `jumlah_beli` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_bayar`
--

INSERT INTO `detail_bayar` (`id_detail`, `id_sepatu`, `jumlah_beli`) VALUES
(8, 11, 10),
(9, 12, 5);

--
-- Triggers `detail_bayar`
--
DELIMITER $$
CREATE TRIGGER `edit_stok` AFTER INSERT ON `detail_bayar` FOR EACH ROW BEGIN
	update sepatu set stok = stok-new.jumlah_beli
	where id_sepatu = new.id_sepatu;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `header_bayar`
--

CREATE TABLE `header_bayar` (
  `no_nota` int(5) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_detail` int(5) DEFAULT NULL,
  `total_pembelian` int(20) DEFAULT NULL,
  `bayar` int(20) DEFAULT NULL,
  `sisa_bayar` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_bayar`
--

INSERT INTO `header_bayar` (`no_nota`, `tanggal`, `id_detail`, `total_pembelian`, `bayar`, `sisa_bayar`) VALUES
(8, '2023-04-04', 8, 100000, 100000, 0),
(9, '2023-04-04', 9, 25000, 30000, 5000);

--
-- Triggers `header_bayar`
--
DELIMITER $$
CREATE TRIGGER `HapusDetailBayar` AFTER DELETE ON `header_bayar` FOR EACH ROW BEGIN
    delete detail_bayar from detail_bayar where id_detail = old.id_detail;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(5) NOT NULL,
  `nama_merk` varchar(20) DEFAULT NULL,
  `model_sepatu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`, `model_sepatu`) VALUES
(18, 'Nike', 'Nike Adidas'),
(19, 'Adidas', 'sneakers');

--
-- Triggers `merk`
--
DELIMITER $$
CREATE TRIGGER `hapus_data_sepatu` BEFORE DELETE ON `merk` FOR EACH ROW BEGIN
	delete from header_bayar
	where id_detail = (
	select detail_bayar.id_detail from detail_bayar
	join sepatu on detail_bayar.id_sepatu = sepatu.id_sepatu
	join merk on sepatu.id_merk = merk.id_merk
	where merk.id_merk = old.id_merk );
	
	delete from detail_bayar
	where id_sepatu = (
	select detail_bayar.id_sepatu from detail_bayar
	join sepatu on detail_bayar.id_sepatu = sepatu.id_sepatu
	join merk on sepatu.id_merk = merk.id_merk
	where merk.id_merk = old.id_merk );
	
	delete from sepatu where id_merk = old.id_merk;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pemasukan_harian`
-- (See below for the actual view)
--
CREATE TABLE `pemasukan_harian` (
`No Nota` int(5)
,`Tanggal` date
,`Total Pemasukan` decimal(41,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `sepatu`
--

CREATE TABLE `sepatu` (
  `id_sepatu` int(5) NOT NULL,
  `id_merk` int(5) DEFAULT NULL,
  `ukuran` int(5) DEFAULT NULL,
  `warna` varchar(10) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `stok` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sepatu`
--

INSERT INTO `sepatu` (`id_sepatu`, `id_merk`, `ukuran`, `warna`, `harga`, `stok`) VALUES
(11, 18, 40, 'putih', 2000, 10),
(12, 19, 41, 'merah', 2000, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sepatu_puma`
-- (See below for the actual view)
--
CREATE TABLE `sepatu_puma` (
`nama_merk` varchar(20)
,`model_sepatu` varchar(20)
,`ukuran` int(5)
,`warna` varchar(10)
,`harga` int(20)
);

-- --------------------------------------------------------

--
-- Structure for view `pemasukan_harian`
--
DROP TABLE IF EXISTS `pemasukan_harian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemasukan_harian`  AS   (select `header_bayar`.`no_nota` AS `No Nota`,`header_bayar`.`tanggal` AS `Tanggal`,sum(`header_bayar`.`total_pembelian`) AS `Total Pemasukan` from `header_bayar` group by `header_bayar`.`tanggal`)  ;

-- --------------------------------------------------------

--
-- Structure for view `sepatu_puma`
--
DROP TABLE IF EXISTS `sepatu_puma`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sepatu_puma`  AS   (select `m`.`nama_merk` AS `nama_merk`,`m`.`model_sepatu` AS `model_sepatu`,`s`.`ukuran` AS `ukuran`,`s`.`warna` AS `warna`,`s`.`harga` AS `harga` from (`merk` `m` join `sepatu` `s` on(`m`.`id_merk` = `s`.`id_merk`)) where `m`.`nama_merk` = 'Puma')  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_bayar`
--
ALTER TABLE `detail_bayar`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_detail_bayar` (`id_sepatu`);

--
-- Indexes for table `header_bayar`
--
ALTER TABLE `header_bayar`
  ADD PRIMARY KEY (`no_nota`),
  ADD KEY `fk_header_bayar` (`id_detail`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`),
  ADD UNIQUE KEY `id_merk` (`id_merk`);

--
-- Indexes for table `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`id_sepatu`),
  ADD KEY `fk_sepatu` (`id_merk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_bayar`
--
ALTER TABLE `detail_bayar`
  MODIFY `id_detail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `header_bayar`
--
ALTER TABLE `header_bayar`
  MODIFY `no_nota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sepatu`
--
ALTER TABLE `sepatu`
  MODIFY `id_sepatu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_bayar`
--
ALTER TABLE `detail_bayar`
  ADD CONSTRAINT `fk_detail_bayar` FOREIGN KEY (`id_sepatu`) REFERENCES `sepatu` (`id_sepatu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `header_bayar`
--
ALTER TABLE `header_bayar`
  ADD CONSTRAINT `fk_header_bayar` FOREIGN KEY (`id_detail`) REFERENCES `detail_bayar` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sepatu`
--
ALTER TABLE `sepatu`
  ADD CONSTRAINT `fk_sepatu` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
