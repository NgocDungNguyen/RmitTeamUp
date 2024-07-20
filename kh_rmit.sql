-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2024 lúc 03:15 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kh_rmit`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_friend`
--

CREATE TABLE `rmit_friend` (
  `id` int(11) NOT NULL,
  `id_from` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rmit_friend`
--

INSERT INTO `rmit_friend` (`id`, `id_from`, `id_to`, `status`) VALUES
(40, 9, 6, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_groups`
--

CREATE TABLE `rmit_groups` (
  `id` int(11) NOT NULL,
  `images_group` varchar(50) NOT NULL,
  `name_group` varchar(255) NOT NULL,
  `content_group` text NOT NULL,
  `member_group` text NOT NULL,
  `creator_group` int(11) NOT NULL,
  `date_creat` int(11) NOT NULL,
  `code_group` varchar(20) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 là hoạt động, 1 là đang xóa nhóm, 2 quá trình tự hủy, 3 delete',
  `date_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rmit_groups`
--

INSERT INTO `rmit_groups` (`id`, `images_group`, `name_group`, `content_group`, `member_group`, `creator_group`, `date_creat`, `code_group`, `status`, `date_end`) VALUES
(6, 'avatar-group-rmit1234.png', 'Test Nội Dung', '', '[\"9\"]', 9, 1715962950, '21774636639500037083', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_groups_end`
--

CREATE TABLE `rmit_groups_end` (
  `id` int(11) NOT NULL,
  `code_group` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_groups_evaluate`
--

CREATE TABLE `rmit_groups_evaluate` (
  `id` int(11) NOT NULL,
  `code_group` varchar(20) NOT NULL,
  `id_user_evaluate` int(11) NOT NULL,
  `id_user_get_evaluate` int(11) NOT NULL,
  `point` int(1) NOT NULL,
  `content_evaluate` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_groups_member`
--

CREATE TABLE `rmit_groups_member` (
  `id` int(11) NOT NULL,
  `code_group` varchar(30) NOT NULL,
  `id_invite` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rmit_groups_member`
--

INSERT INTO `rmit_groups_member` (`id`, `code_group`, `id_invite`, `status`) VALUES
(12, '21774636639500037083', 6, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_group_cloud`
--

CREATE TABLE `rmit_group_cloud` (
  `id` int(11) NOT NULL,
  `content_group` text NOT NULL,
  `file_group` text NOT NULL,
  `type_content` varchar(15) NOT NULL,
  `code_group` varchar(20) NOT NULL,
  `code_cloud` varchar(30) NOT NULL,
  `id_user_send` int(11) NOT NULL,
  `date_creat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rmit_group_cloud`
--

INSERT INTO `rmit_group_cloud` (`id`, `content_group`, `file_group`, `type_content`, `code_group`, `code_cloud`, `id_user_send`, `date_creat`) VALUES
(48, 'sdadasd', '', '', '21774636639500037083', '', 6, 1715999163),
(49, 'ádasdsadad', '', '', '21774636639500037083', '', 6, 1715999507);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_messenger`
--

CREATE TABLE `rmit_messenger` (
  `id` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `content` text NOT NULL,
  `code_group_mess` varchar(20) NOT NULL,
  `date_group_mess` int(11) NOT NULL,
  `date_creat` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rmit_messenger`
--

INSERT INTO `rmit_messenger` (`id`, `id_user_from`, `id_user_to`, `content`, `code_group_mess`, `date_group_mess`, `date_creat`, `status`) VALUES
(43, 9, 6, '123123', 'eDGCm73yOd1FgRuawp8A', 24, 1716000917, 0),
(44, 9, 6, '123123', 'eDGCm73yOd1FgRuawp8A', 25, 1716000919, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_messenger_group`
--

CREATE TABLE `rmit_messenger_group` (
  `id` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `code_mess` varchar(20) NOT NULL,
  `date_group_mess` int(11) NOT NULL,
  `father_group_mess` int(11) NOT NULL,
  `mess_user_from` int(4) NOT NULL,
  `mess_user_to` int(4) NOT NULL,
  `content_end` varchar(25) NOT NULL,
  `date_creat` int(11) NOT NULL,
  `time_creat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rmit_messenger_group`
--

INSERT INTO `rmit_messenger_group` (`id`, `id_user_from`, `id_user_to`, `code_mess`, `date_group_mess`, `father_group_mess`, `mess_user_from`, `mess_user_to`, `content_end`, `date_creat`, `time_creat`) VALUES
(24, 9, 6, 'eDGCm73yOd1FgRuawp8A', 1715965200, 0, 0, 0, '123123', 1715965200, 1716000919),
(25, 0, 0, '', 1715965200, 24, 0, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_notification`
--

CREATE TABLE `rmit_notification` (
  `id` int(11) NOT NULL,
  `id_user_send` int(11) NOT NULL,
  `message_notification` text NOT NULL,
  `id_user_notification` int(11) NOT NULL,
  `link_notification` text NOT NULL,
  `code_notification` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `date_creat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rmit_notification`
--

INSERT INTO `rmit_notification` (`id`, `id_user_send`, `message_notification`, `id_user_notification`, `link_notification`, `code_notification`, `status`, `date_creat`) VALUES
(4, 9, 'sent you a friend request.', 6, 'profile?id=rmit1234&code_noti=046776123483039321978133883509', '046776123483039321978133883509', 1, 1715960121),
(9, 9, 'invite you to join Group \" Test Nội Dung \"', 6, 'groups-profile?codegroup=21774636639500037083&code_noti=558230943002645993762853085476', '558230943002645993762853085476', 0, 1715962950),
(11, 6, 'do not accept invitations to join the group \" Test Nội Dung \"', 9, 'groups-profile?codegroup=&code_noti=937488312377520909845615344533', '937488312377520909845615344533', 0, 1715998850),
(12, 6, 'accept invitations to join the group \" Test Nội Dung \"', 9, 'groups-profile?codegroup=&code_noti=489334215970435620390134465389', '489334215970435620390134465389', 0, 1715998951),
(13, 6, 'accept invitations to join the group \" Test Nội Dung \"', 6, 'groups-profile?codegroup=&code_noti=592842823229893033259150363774', '592842823229893033259150363774', 0, 1715998951),
(14, 6, 'accept invitations to join the group \" Test Nội Dung \"', 9, 'groups-profile?codegroup=&code_noti=069148711997344710389440167840', '069148711997344710389440167840', 0, 1715999153),
(15, 6, 'accept invitations to join the group \" Test Nội Dung \"', 6, 'groups-profile?codegroup=&code_noti=914891316144221781429471616067', '914891316144221781429471616067', 0, 1715999153),
(16, 6, 'just posted content in the group \" Test Nội Dung \"', 9, 'groups-profile?codegroup=&code_noti=236751864343035321693663677129', '236751864343035321693663677129', 0, 1715999507),
(17, 6, 'just exited the group \" Test Nội Dung \"', 9, 'groups-profile?codegroup=&code_noti=980322455719799747268136849980', '980322455719799747268136849980', 0, 1715999774),
(18, 6, 'accept invitations to join the group \" Test Nội Dung \"', 9, 'groups-profile?codegroup=&code_noti=098182177152647614441647322400', '098182177152647614441647322400', 0, 1715999796),
(19, 6, 'accept invitations to join the group \" Test Nội Dung \"', 6, 'groups-profile?codegroup=&code_noti=964442661198620034268643504591', '964442661198620034268643504591', 0, 1715999796),
(20, 6, 'just exited the group \" Test Nội Dung \"', 9, 'groups-profile?codegroup=&code_noti=426012242751941054634398594722', '426012242751941054634398594722', 0, 1715999907);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_packet`
--

CREATE TABLE `rmit_packet` (
  `id` int(11) NOT NULL,
  `name_packet` varchar(100) NOT NULL,
  `price_packet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rmit_packet`
--

INSERT INTO `rmit_packet` (`id`, `name_packet`, `price_packet`) VALUES
(1, 'Trial Plan', 0),
(3, 'Basic Plan', 10000),
(4, 'Standard Plan', 15000),
(5, 'Premium Plan', 15000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_subject`
--

CREATE TABLE `rmit_subject` (
  `id` int(11) NOT NULL,
  `code_subject` varchar(200) NOT NULL,
  `name_subject` varchar(255) NOT NULL,
  `study_level` varchar(50) NOT NULL,
  `credit_points` varchar(50) NOT NULL,
  `subject_area` varchar(50) NOT NULL,
  `campus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rmit_subject`
--

INSERT INTO `rmit_subject` (`id`, `code_subject`, `name_subject`, `study_level`, `credit_points`, `subject_area`, `campus`) VALUES
(1, 'COSC2203', 'Algorithms and Analysis', 'Postgraduate', '12', 'AI and Cyber Security', 'Saigon South'),
(2, 'COSC2976', 'Programming Fundamentals', 'Postgraduate', '12', 'AI and Cyber Security', 'Saigon South'),
(3, 'COSC2980', 'Cloud Computing', 'Postgraduate', '12', 'AI and Cyber Security', 'Saigon South'),
(4, 'COSC2984', 'Social Media and Networks Analytics', 'Postgraduate', '12', 'AI and Cyber Security', 'Saigon South'),
(6, 'COSC2993', 'Minor Thesis/Project', 'Postgraduate', '36', 'AI and Cyber Security', 'Saigon South'),
(7, 'COSC3003', 'Artificial Intelligence Postgraduate Project', 'Postgraduate', '24', 'AI and Cyber Security', 'Saigon South');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_user`
--

CREATE TABLE `rmit_user` (
  `id` int(11) NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `msv` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usersex` int(2) NOT NULL,
  `relationship` int(2) NOT NULL,
  `userbio` text NOT NULL,
  `images_check` varchar(255) NOT NULL,
  `decentralization` text NOT NULL,
  `date_creat` int(11) NOT NULL,
  `user_gpa` text NOT NULL,
  `user_point` text NOT NULL,
  `friend_group` text NOT NULL,
  `status` int(2) NOT NULL COMMENT '0 mới đăng kí chưa điền thông tin xác thực. 1 là đã điền thông tin xác thực, 2 là cho phép hoạt động,3 là yêu cầu cập nhật lại vì sai thông tin,4 là hủy mã xác nhận',
  `service_pack` int(1) NOT NULL DEFAULT 1,
  `expiration_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rmit_user`
--

INSERT INTO `rmit_user` (`id`, `user_avatar`, `username`, `msv`, `password`, `email`, `usersex`, `relationship`, `userbio`, `images_check`, `decentralization`, `date_creat`, `user_gpa`, `user_point`, `friend_group`, `status`, `service_pack`, `expiration_date`) VALUES
(5, 'avatar-rmit2228.jpg', 'Lưu Ngọc Quang', 'rmit222', '123', 'admin@gmail.com', 1, 1, '123', 'rmit2222.jpg', '', 1715493721, '2.88', '0', '[]', 2, 1, 1715752921),
(6, 'avatar-rmit123.jpg', 'Nguyễn Hồng Nhung', 'rmit123', '123', 'admin1@gmail.com', 2, 1, '123', 'rmit2222.jpg', '', 1715493721, '4.00', '0', '[\"9\"]', 2, 3, 1726121557),
(7, 'avatar-rmit124.jpg', 'Nguyễn Quảng', 'rmit124', '123', 'admin2@gmail.com', 1, 2, '123', 'rmit2222.jpg', '', 1715493721, '1.00', '0', '[]', 2, 1, 1715752921),
(8, 'avatar-rmit1251.jpg', 'Lê Lan', 'rmit125', '123', 'admin3@gmail.com', 2, 1, '123', 'rmit2222.jpg', '', 1715493721, '1.00', '0', '[]', 2, 1, 1715752921),
(9, 'avatar-rmit1234.png', 'Nguyễn B', 'rmit1234', '123', 'admin@gmail.com', 1, 1, '123', 'rmit1234.png', '', 1715493721, '2.88', '0', '[\"6\"]', 2, 4, 1718173922);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_user_admin`
--

CREATE TABLE `rmit_user_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `decentralization` text NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rmit_user_admin`
--

INSERT INTO `rmit_user_admin` (`id`, `email`, `username`, `password`, `status`, `name`, `decentralization`, `admin`) VALUES
(1, 'infor.tapchitamlyhocvietnam@gmail.com', 'admin', '123', 1, 'Lưu Ngọc Quang', '[\"18\",\"141\",\"33\"]', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rmit_user_subject`
--

CREATE TABLE `rmit_user_subject` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `scores` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rmit_user_subject`
--

INSERT INTO `rmit_user_subject` (`id`, `subject_id`, `scores`, `user_id`) VALUES
(14, 2, 'HD', 5),
(15, 6, 'HD', 5),
(16, 7, 'PA', 5),
(19, 4, 'DI', 5),
(20, 2, 'HD', 6),
(21, 2, 'DI', 7),
(22, 2, 'CR', 8),
(23, 1, 'HD', 9),
(24, 2, 'HD', 9),
(25, 3, 'HD', 9),
(26, 7, 'HD', 9),
(27, 6, 'CR', 9),
(28, 1, 'HD', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `rmit_friend`
--
ALTER TABLE `rmit_friend`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_groups`
--
ALTER TABLE `rmit_groups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_groups_end`
--
ALTER TABLE `rmit_groups_end`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_groups_evaluate`
--
ALTER TABLE `rmit_groups_evaluate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_groups_member`
--
ALTER TABLE `rmit_groups_member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_group_cloud`
--
ALTER TABLE `rmit_group_cloud`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_messenger`
--
ALTER TABLE `rmit_messenger`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_messenger_group`
--
ALTER TABLE `rmit_messenger_group`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_notification`
--
ALTER TABLE `rmit_notification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_packet`
--
ALTER TABLE `rmit_packet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_subject`
--
ALTER TABLE `rmit_subject`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_user`
--
ALTER TABLE `rmit_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_user_admin`
--
ALTER TABLE `rmit_user_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rmit_user_subject`
--
ALTER TABLE `rmit_user_subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `rmit_friend`
--
ALTER TABLE `rmit_friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `rmit_groups`
--
ALTER TABLE `rmit_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `rmit_groups_end`
--
ALTER TABLE `rmit_groups_end`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `rmit_groups_evaluate`
--
ALTER TABLE `rmit_groups_evaluate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `rmit_groups_member`
--
ALTER TABLE `rmit_groups_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `rmit_group_cloud`
--
ALTER TABLE `rmit_group_cloud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `rmit_messenger`
--
ALTER TABLE `rmit_messenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `rmit_messenger_group`
--
ALTER TABLE `rmit_messenger_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `rmit_notification`
--
ALTER TABLE `rmit_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `rmit_packet`
--
ALTER TABLE `rmit_packet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `rmit_subject`
--
ALTER TABLE `rmit_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `rmit_user`
--
ALTER TABLE `rmit_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `rmit_user_admin`
--
ALTER TABLE `rmit_user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `rmit_user_subject`
--
ALTER TABLE `rmit_user_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
