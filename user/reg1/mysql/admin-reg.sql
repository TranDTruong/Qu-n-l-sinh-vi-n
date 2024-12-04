-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 16, 2024 lúc 03:56 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `admin-reg`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `grades`
--

CREATE TABLE `grades` (
  `id` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL,
  `diemchuyencan` float NOT NULL,
  `diemgiuaky` float NOT NULL,
  `diemcuoiky` float NOT NULL,
  `diemtong` float NOT NULL,
  `lanthi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `grades`
--

INSERT INTO `grades` (`id`, `uid`, `diemchuyencan`, `diemgiuaky`, `diemcuoiky`, `diemtong`, `lanthi`) VALUES
('IT3220', 212121, 5, 6, 7, 6.6, 1),
('IT3261', 20213147, 10, 8, 7, 7.5, 1),
('IT3261', 20213131, 9, 6, 7, 7, 1),
('IT3220', 20213143, 9, 8, 7, 7.4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `makhoa` varchar(50) NOT NULL,
  `tenkhoa` varchar(100) NOT NULL,
  `diachi` varchar(250) NOT NULL,
  `sdt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`makhoa`, `tenkhoa`, `diachi`, `sdt`) VALUES
('TMCNTT', 'Công nghệ thông tin', 'Đại học Thương Mại', 1234567890),
('TMQTKD', 'Quản trị kinh doanh', 'Đại học Thương Mại', 121220922);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `malop` varchar(50) NOT NULL,
  `tenlop` varchar(50) NOT NULL,
  `namdaotao` date NOT NULL,
  `namketthuc` date NOT NULL,
  `makhoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`malop`, `tenlop`, `namdaotao`, `namketthuc`, `makhoa`) VALUES
('CNTT', 'Công Nghệ Thông Tin', '2010-12-12', '2014-12-12', 'TMCNTT  '),
('QTKD', 'Quản trị kinh doanh', '1111-11-11', '2222-02-22', 'TMQTKD'),
('QTKD1', 'Quản trị kinh doanh', '1111-11-11', '2222-02-22', 'TMQTKD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `uid` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `malop` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`uid`, `fullname`, `date`, `gender`, `address`, `malop`) VALUES
(212121, 'Nguyễn Văn Hiệp', '1212-12-12', 'Nam', 'Hà Nội', 'DCCNTT'),
(20121222, 'Lê Xuân Thái', '2003-10-31', 'Nam', 'Phú Thọ', 'DCCNTT'),
(20211122, 'Hà Quang Vinh', '2222-12-12', 'Nam', 'Hà Nội', 'DCCNTT'),
(20213131, 'Nguyễn Văn Hiệp', '2003-12-12', 'Nam', 'Hà Nội', 'DCCNTT'),
(20213140, 'Hoàng Linh Chi', '1212-12-12', 'Nữ', 'Hà Nội', 'DCCNTT'),
(20213141, 'Trần Đức Trường', '1212-12-12', 'Nam', 'Bắc Ninh', '0'),
(20213142, 'Nguyễn Văn Hiệp', '1212-12-12', 'Nam', 'Hà Nội', '0'),
(20213143, 'Trần Mỹ An', '2003-10-12', '', 'Hà Nội', 'DCCNTT'),
(20213147, 'Bùi Ngọc Quân', '1111-11-11', 'Nam', 'Quảng Ninh', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sotinchi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `subject`
--

INSERT INTO `subject` (`id`, `name`, `sotinchi`) VALUES
('IT3220', 'Lập trình Web', 3),
('IT3239', 'Tiếng anh CN CNPM', 2),
('IT3241', 'Lập trình ứng dụng với Python', 4),
('IT3252', 'Thiết kế và xây dựng hệ thống mạng doanh nghiệp', 4),
('IT3254', 'Cơ sở dữ liệu phân tán', 3),
('IT3261', 'Lập trình Web với PHP', 4),
('IT3262', 'Đồ án chuyên ngành', 5),
('MIE1216', 'Xác suất thống kê', 2),
('SSH1204', 'Lịch sử Đảng Cộng sản Việt Nam', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `uid` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `certificate` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`uid`, `fullname`, `gender`, `date`, `address`, `phone`, `certificate`, `specialization`) VALUES
(121212, 'Nguyễn Văn Hiệp', 'Nam', '1212-12-12', 'Hà Nội', 912233211, 'Cử nhân', 'Kỹ thuật Ô tô'),
(222222, 'Trần Đức Trường', 'Nam', '0111-11-11', 'Hà Nội', 9122332, 'Cử nhân', 'Công nghệ thông tin'),
(1111111, 'Đạt', 'Nam', '2222-02-22', 'Phú Thọ', 91223321, 'Thạc Sĩ', 'Kỹ thuật Ô tô'),
(20213146, 'Trần Đức Trường', 'Nam', '1212-02-11', 'Bắc Ninh', 2147483647, 'Kỹ Sư', 'Công nghệ thông tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234567'),
(2, 'admin', '1234567'),
(3, 'trường', '1234567');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `confirm_password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `city` varchar(30) NOT NULL,
  `hobby` enum('music','sport','shopping','travel') NOT NULL,
  `yourself` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `confirm_password`, `email`, `date`, `gender`, `city`, `hobby`, `yourself`) VALUES
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 'vuiver@gmail.com', '1212-12-12', 'male', 'Bac Giang', 'music', 'sdasd'),
(4, 'admin1', '698d51a19d8a121ce581499d7b701668', '698d51a19d8a121ce581499d7b701668', 'truongdhdk012@gmail.com', '1111-11-11', 'male', 'Bac Ninh', 'sport', 'sss'),
(5, 'admin1', '698d51a19d8a121ce581499d7b701668', '698d51a19d8a121ce581499d7b701668', 'truongdhdk012@gmail.com', '1111-11-11', 'male', 'Bac Ninh', 'sport', 'sss');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `grades`
--
ALTER TABLE `grades`
  ADD KEY `FK_KQ_MH` (`id`),
  ADD KEY `FK_KQ_MSV` (`uid`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`makhoa`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`malop`),
  ADD KEY `makhoa` (`makhoa`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`uid`);

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`uid`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `FK_KQ_MH` FOREIGN KEY (`id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `FK_KQ_MSV` FOREIGN KEY (`uid`) REFERENCES `student` (`uid`);

--
-- Các ràng buộc cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_ibfk_1` FOREIGN KEY (`makhoa`) REFERENCES `khoa` (`makhoa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
