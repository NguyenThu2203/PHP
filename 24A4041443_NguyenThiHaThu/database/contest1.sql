-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2024 lúc 09:04 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `contest1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `Maloai` varchar(5) NOT NULL,
  `Tenloai` varchar(50) NOT NULL,
  `Mota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`Maloai`, `Tenloai`, `Mota`) VALUES
('LOAI', 'Máy tính Laptop', ''),
('LOAI1', 'Điện thoại Iphone', ''),
('LOAI2', 'Điện thoại SamSung', ''),
('LOAI3', 'Điện thoại Redmi ', ''),
('LOAI4', 'Điện thoại Realmi', ''),
('LOAI5', 'Điện thoại OPPO', ''),
('LOAI6', 'Điện thoại VIVO', ''),
('LOAI7', 'Tai nghe Apple ', ''),
('LOAI8', 'Đồng hồ Apple Watch', ''),
('LOAI9', 'Bình nước giữ nhiệt', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `Mahang` varchar(5) NOT NULL,
  `Tenhang` varchar(50) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Hinhanh` varchar(30) NOT NULL,
  `Mota` varchar(100) NOT NULL,
  `Giahang` decimal(10,1) NOT NULL,
  `Maloai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`Mahang`, `Tenhang`, `Soluong`, `Hinhanh`, `Mota`, `Giahang`, `Maloai`) VALUES
('MH10', 'Điện thoại VIVO Y21S', 10, 's24+.webp', 'Điện thoại Iphone', 23000000.0, 'LOAI6'),
('MH11', 'Tai nghe Apple', 12, 'tainghe1.webp', '', 7000000.0, 'LOAI7'),
('MH16', 'Điện thoại Samsung S23', 21, 'iphone11.webp', '', 12000000.0, 'LOAI2'),
('MH17', 'Điện thoại Samsung S24', 12, 's24+.webp', '', 15000000.0, 'LOAI2'),
('MH20', 'Điện thoại VIVO Y18S', 12, 's24+.webp', '', 6600000.0, 'LOAI6'),
('MH21', 'Điện thoại OPPO A4', 20, 's23ultra.jpeg', '', 0.0, ''),
('MH25', 'Điện thoại VIVO', 10, 's24+.webp', '', 200000.0, 'LOAI6'),
('MH3', 'Điện thoại Iphone 15', 10, 'iphone15.webp', 'Điện thoại Iphone', 30000000.0, 'LOAI1'),
('MH35', 'Điện thoại Redmi 15', 0, 'redmi 12.jpg', 'Điện thoại mới ', 12000000.0, 'LOAI9'),
('MH40', 'Điện thoại Iphone 17', 0, 's24+.webp', 'Điện thoại mới ', 12000000.0, 'LOAI1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`Maloai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Mahang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
