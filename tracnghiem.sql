-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 09, 2023 lúc 04:16 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tracnghiem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketqua`
--

CREATE TABLE `ketqua` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `exam_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `questions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`questions`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ketqua`
--

INSERT INTO `ketqua` (`id`, `username`, `exam_date`, `questions`) VALUES
(1, 'admin', '0000-00-00 00:00:00', '[{\"id\":\"11\",\"answer\":\"A\"},{\"id\":\"9\",\"answer\":\"A\"},{\"id\":\"4\",\"answer\":\"A\"},{\"id\":\"7\",\"answer\":\"B\"},{\"id\":\"10\",\"answer\":\"A\"}]'),
(2, 'admin', '0000-00-00 00:00:00', '[{\"id\":\"11\",\"choice\":\"A\",\"answer\":\"A\"},{\"id\":\"1\",\"choice\":\"B\",\"answer\":\"D\"},{\"id\":\"9\",\"choice\":\"D\",\"answer\":\"A\"},{\"id\":\"2\",\"choice\":\"C\",\"answer\":\"D\"},{\"id\":\"10\",\"choice\":\"B\",\"answer\":\"A\"}]'),
(3, 'admin', '0000-00-00 00:00:00', '[{\"id\":\"3\",\"answer\":\"B\"},{\"id\":\"8\",\"answer\":\"D\"},{\"id\":\"4\",\"answer\":\"A\"},{\"id\":\"10\",\"answer\":\"A\"},{\"id\":\"1\",\"answer\":\"D\"}]'),
(4, 'admin', '2023-02-09 14:26:15', '[{\"id\":\"1\",\"answer\":\"D\"},{\"id\":\"2\",\"answer\":\"D\"},{\"id\":\"7\",\"answer\":\"B\"},{\"id\":\"9\",\"answer\":\"A\"},{\"id\":\"8\",\"answer\":\"D\"}]');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
