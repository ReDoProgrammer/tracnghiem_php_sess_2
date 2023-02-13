-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 13, 2023 lúc 07:27 AM
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
-- Cấu trúc bảng cho bảng `ds_cau_hoi`
--

CREATE TABLE `ds_cau_hoi` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ds_cau_hoi`
--

INSERT INTO `ds_cau_hoi` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(1, 'Đâu là chương trình trong máy tính?', 'Word', 'Excel', 'Powerpoint', 'Tất cả đáp án trên', 'D'),
(2, 'Chương trình liveshow truyền hình?', 'Ai là triệu phú', 'Hãy chọn giá đúng', 'Vietnam got Talents', 'All', 'D'),
(3, 'Luật Tổ chức chính quyền địa phương được Quốc Hội thông qua ngày tháng năm nào?', 'Ngày 19/06/2016', 'Ngày 19/06/2015', 'Ngày 21/12/2015', 'Ngày 01/07/2016', 'B'),
(4, 'Luật Tổ chức chính quyền địa phương 2015 có hiệu lực từ ngày tháng năm nào?', '01/01/2016', '20/10/2015', '31/12/2015', '01/07/2016', 'A'),
(5, 'Chương I của Luật tổ chức chính quyền địa phương có nội dung gì?', 'Những quy định chung', 'Phạm vi điều chỉnh và đối tượng áp dụng.', 'Đơn vị hành chính.', 'Đơn vị hành chính và phân loại đơn vị hành chính.', 'A'),
(6, 'Chương I Luật tổ chức chính quyền địa phương có mấy điều?', '15', '20', '25', '30', 'A'),
(7, 'Phạm vi điều chỉnh của Luật Tổ chức chính quyền địa phương có nội dung gì?', 'Quy định về đơn vị hành chính và tổ chức, hoạt động cũng như nguyên tắc vận hành của các đơn vị hành chính.', 'Quy định về đơn vị hành chính và tổ chức, hoạt động của chính quyền địa phương ở các đơn vị hành chính.', 'Quy định về chính quyền địa phương các cấp tại các đơn vị hành chính.', 'Đơn vị hành chính và việc áp dụng đơn vị hành chính ở chính quyền địa phương các cấp.', 'B'),
(8, 'Thành phố Hà Nội và thành phố Hồ Chí Minh là loại đơn vị hành chính nào?', 'Cấp tỉnh loại I.', 'Cấp tỉnh.', 'Cấp thành phố trực thuộc trung ương.', 'Cấp tỉnh loại đặc biệt.', 'D'),
(9, 'Mục đích của việc phân loại đơn vị hành chính là?', 'Cơ sở để hoạch định chính sách phát triển kinh tế - xã hội; xây dựng tổ chức bộ máy, chế độ, chính sách đối với cán bộ, công chức của chính quyền địa phương phù hợp với từng loại đơn vị hành chính.', 'Cơ sở để hoạch định chính sách phát triển kinh tế - xã hội phù hợp với từng địa phương, ngành, lĩnh vực.', 'Cơ sở để quyết định chính sách phát triển cơ sở hạ tầng, ngân sách cho từng địa phương phù hợp với từng loại đơn vị hành chính.', 'Bảo đảm chính sách an sinh xã hội, phát triển các ngành, lĩnh vực trên từng địa bàn.', 'A'),
(10, 'Đơn vị hành chính cấp tỉnh được chia thành mấy loại?', '04 loại.', '03 loại.', '05 loại.', '02 loại.', 'A'),
(11, 'Đâu không phải là tiêu chí để phân loại đơn vị hành chính?', 'Trình độ dân trí, mức độ phát triển các ngành, lĩnh vực.', 'Quy mô dân số.', 'Diện tích tự nhiên.', 'Số đơn vị hành chính trực thuộc.', 'A');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketqua`
--

CREATE TABLE `ketqua` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `exam_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `questions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`questions`)),
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ketqua`
--

INSERT INTO `ketqua` (`id`, `username`, `exam_date`, `questions`, `mark`) VALUES
(1, 'admin', '0000-00-00 00:00:00', '[{\"id\":\"11\",\"answer\":\"A\"},{\"id\":\"9\",\"answer\":\"A\"},{\"id\":\"4\",\"answer\":\"A\"},{\"id\":\"7\",\"answer\":\"B\"},{\"id\":\"10\",\"answer\":\"A\"}]', 0),
(2, 'admin', '0000-00-00 00:00:00', '[{\"id\":\"11\",\"choice\":\"A\",\"answer\":\"A\"},{\"id\":\"1\",\"choice\":\"B\",\"answer\":\"D\"},{\"id\":\"9\",\"choice\":\"D\",\"answer\":\"A\"},{\"id\":\"2\",\"choice\":\"C\",\"answer\":\"D\"},{\"id\":\"10\",\"choice\":\"B\",\"answer\":\"A\"}]', 0),
(3, 'admin', '0000-00-00 00:00:00', '[{\"id\":\"3\",\"answer\":\"B\"},{\"id\":\"8\",\"answer\":\"D\"},{\"id\":\"4\",\"answer\":\"A\"},{\"id\":\"10\",\"answer\":\"A\"},{\"id\":\"1\",\"answer\":\"D\"}]', 0),
(4, 'admin', '2023-02-09 14:26:15', '[{\"id\":\"1\",\"answer\":\"D\"},{\"id\":\"2\",\"answer\":\"D\"},{\"id\":\"7\",\"answer\":\"B\"},{\"id\":\"9\",\"answer\":\"A\"},{\"id\":\"8\",\"answer\":\"D\"}]', 0),
(5, 'admin', '2023-02-09 15:17:31', '[{\"id\":\"3\",\"choice\":\"A\",\"answer\":\"B\"},{\"id\":\"11\",\"choice\":\"B\",\"answer\":\"A\"},{\"id\":\"10\",\"choice\":\"C\",\"answer\":\"A\"},{\"id\":\"5\",\"choice\":\"D\",\"answer\":\"A\"},{\"id\":\"7\",\"choice\":\"D\",\"answer\":\"B\"}]', 0),
(6, 'admin', '2023-02-09 15:17:35', '[{\"id\":\"3\",\"choice\":\"A\",\"answer\":\"B\"},{\"id\":\"11\",\"choice\":\"B\",\"answer\":\"A\"},{\"id\":\"10\",\"choice\":\"C\",\"answer\":\"A\"},{\"id\":\"5\",\"choice\":\"D\",\"answer\":\"A\"},{\"id\":\"7\",\"choice\":\"D\",\"answer\":\"B\"}]', 0),
(7, 'admin', '2023-02-09 15:19:19', '[{\"id\":\"4\",\"choice\":\"A\",\"answer\":\"A\"},{\"id\":\"11\",\"choice\":\"B\",\"answer\":\"A\"},{\"id\":\"3\",\"choice\":\"D\",\"answer\":\"B\"},{\"id\":\"7\",\"choice\":\"B\",\"answer\":\"B\"},{\"id\":\"10\",\"choice\":\"A\",\"answer\":\"A\"}]', 0),
(8, 'tk1', '2023-02-13 06:21:57', '[{\"id\":\"3\",\"choice\":\"D\",\"answer\":\"B\"},{\"id\":\"6\",\"choice\":\"A\",\"answer\":\"A\"},{\"id\":\"4\",\"choice\":\"B\",\"answer\":\"A\"},{\"id\":\"7\",\"choice\":\"D\",\"answer\":\"B\"},{\"id\":\"10\",\"choice\":\"A\",\"answer\":\"A\"},{\"id\":\"11\",\"choice\":\"D\",\"answer\":\"A\"},{\"id\":\"2\",\"choice\":\"A\",\"answer\":\"D\"},{\"id\":\"5\",\"choice\":\"C\",\"answer\":\"A\"},{\"id\":\"9\",\"choice\":\"C\",\"answer\":\"A\"},{\"id\":\"8\",\"choice\":\"C\",\"answer\":\"D\"},{\"id\":\"1\",\"choice\":\"B\",\"answer\":\"D\"}]', 4),
(9, 'tk1', '2023-02-13 06:22:59', '[{\"id\":\"4\",\"choice\":\"C\",\"answer\":\"A\"},{\"id\":\"1\",\"choice\":\"B\",\"answer\":\"D\"},{\"id\":\"2\",\"choice\":\"D\",\"answer\":\"D\"},{\"id\":\"10\",\"choice\":\"A\",\"answer\":\"A\"},{\"id\":\"7\",\"choice\":\"C\",\"answer\":\"B\"},{\"id\":\"3\",\"choice\":\"B\",\"answer\":\"B\"},{\"id\":\"5\",\"choice\":\"A\",\"answer\":\"A\"},{\"id\":\"6\",\"choice\":\"D\",\"answer\":\"A\"},{\"id\":\"8\",\"choice\":\"A\",\"answer\":\"D\"},{\"id\":\"9\",\"choice\":\"B\",\"answer\":\"A\"},{\"id\":\"11\",\"choice\":\"A\",\"answer\":\"A\"}]', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `username` varchar(20) NOT NULL COMMENT 'tài khoản',
  `password` varchar(150) NOT NULL COMMENT 'mật khẩu',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'là admin',
  `fullname` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`username`, `password`, `is_admin`, `fullname`, `phone`, `email`, `address`) VALUES
('admin', '12345', 1, 'Administrator', '0911397764', 'tracnghiem@gmail.com', 'địa chỉ admin'),
('tk1', '123', 0, 'tên tk 1 nè', 'đt tk 1', 'email tk 1', 'đc tk1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ds_cau_hoi`
--
ALTER TABLE `ds_cau_hoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ds_cau_hoi`
--
ALTER TABLE `ds_cau_hoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
