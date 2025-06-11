-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2025 at 11:19 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhom_6`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `ma_donhang` varchar(255) DEFAULT NULL,
  `nguoinhan_ten` varchar(255) DEFAULT NULL,
  `nguoinhan_diachi` varchar(255) DEFAULT NULL,
  `nguoinhan_sdt` int DEFAULT NULL,
  `nguoinhan_email` varchar(255) DEFAULT NULL,
  `pt_thanhtoan` tinyint DEFAULT NULL,
  `voucher` varchar(255) DEFAULT NULL,
  `ship` int DEFAULT NULL,
  `tong_thanhtoan` int DEFAULT NULL,
  `ngay_dat_hang` date DEFAULT NULL,
  `order_notes` varchar(255) DEFAULT NULL,
  `trangthai` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int NOT NULL,
  `san_pham_id` int DEFAULT NULL,
  `tai_khoan_id` int DEFAULT NULL,
  `noi_dung` text,
  `noi_dung_tra_loi` text,
  `ngay_binh_luan` date DEFAULT NULL,
  `trang_thai` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int NOT NULL,
  `don_hang_id` int DEFAULT NULL,
  `san_pham_id` int DEFAULT NULL,
  `don_gia` decimal(10,2) DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `ngay_bat_dau` text,
  `thanh_tien` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `id` int NOT NULL,
  `gio_hang_id` int DEFAULT NULL,
  `san_pham_id` int DEFAULT NULL,
  `so_luong` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL,
  `ten_loai` varchar(255) DEFAULT NULL,
  `mota` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten_loai`, `mota`) VALUES
(1, 'iphone', '123');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(255) DEFAULT NULL,
  `tai_khoan_id` int DEFAULT NULL,
  `ten_nguoi_nhan` varchar(255) DEFAULT NULL,
  `email_nguoi_nhan` varchar(255) DEFAULT NULL,
  `sdt_nguoi_nhan` varchar(20) DEFAULT NULL,
  `dia_chi_nguoi_nhan` text,
  `ngay_dat` date DEFAULT NULL,
  `tong_tien` decimal(10,2) DEFAULT NULL,
  `ghi_chu` text,
  `phuong_thuc_thanh_toan_id` int DEFAULT NULL,
  `trang_thai_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int NOT NULL,
  `tai_khoan_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_pham`
--

CREATE TABLE `hinh_anh_san_pham` (
  `id` int NOT NULL,
  `san_pham_id` int DEFAULT NULL,
  `link_hinh_anh` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hinh_anh_san_pham`
--

INSERT INTO `hinh_anh_san_pham` (`id`, `san_pham_id`, `link_hinh_anh`) VALUES
(1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toan`
--

CREATE TABLE `phuong_thuc_thanh_toan` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL,
  `ten_sp` varchar(255) DEFAULT NULL,
  `gia` int DEFAULT NULL,
  `giam_gia` int DEFAULT NULL,
  `hinh` text,
  `soluong` int DEFAULT NULL,
  `ngay_nhap` date DEFAULT NULL,
  `mo_ta` text,
  `danh_muc_id` int DEFAULT NULL,
  `trang_thai` tinyint DEFAULT NULL,
  `so_luot_xem` int DEFAULT NULL,
  `is_hot` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten_sp`, `gia`, `giam_gia`, `hinh`, `soluong`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`, `so_luot_xem`, `is_hot`) VALUES
(1, 'iphone', 123133, 123333, './uploads/1747912495Hinh-nen-linh-ho-tro-thoi-chien-4k-1024x685.png', 123, '2025-05-11', '123', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int NOT NULL,
  `hoten` varchar(255) DEFAULT NULL,
  `hinh` text,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` tinyint DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `gioi_tinh` tinyint DEFAULT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  `dienthoai` int DEFAULT NULL,
  `trang_thai` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `hoten`, `hinh`, `ngay_sinh`, `email`, `role`, `diachi`, `gioi_tinh`, `mat_khau`, `dienthoai`, `trang_thai`) VALUES
(1, 'canh', NULL, NULL, 'canh@gmail.com', 1, NULL, NULL, '$2y$10$zWdbYGGkBR.RnWARVQRLRuRDOOBG5cwabX3aNd1D3Ykd5p.aec00G', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hang`
--

CREATE TABLE `trang_thai_don_hang` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hang_id` (`don_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hang_id` (`gio_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`),
  ADD KEY `phuong_thuc_thanh_toan_id` (`phuong_thuc_thanh_toan_id`),
  ADD KEY `trang_thai_id` (`trang_thai_id`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Indexes for table `hinh_anh_san_pham`
--
ALTER TABLE `hinh_anh_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danh_muc_id` (`danh_muc_id`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hinh_anh_san_pham`
--
ALTER TABLE `hinh_anh_san_pham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tai_khoan` (`id`);

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoan` (`id`);

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hang` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_1` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hang` (`id`),
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoan` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`phuong_thuc_thanh_toan_id`) REFERENCES `phuong_thuc_thanh_toan` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_3` FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai_don_hang` (`id`);

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoan` (`id`);

--
-- Constraints for table `hinh_anh_san_pham`
--
ALTER TABLE `hinh_anh_san_pham`
  ADD CONSTRAINT `hinh_anh_san_pham_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`danh_muc_id`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
