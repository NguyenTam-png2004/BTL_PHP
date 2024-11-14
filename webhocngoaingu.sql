-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2024 lúc 04:17 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webhocngoaingu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

CREATE TABLE `answers` (
  `ID` int(11) NOT NULL,
  `ID_question` int(11) NOT NULL,
  `answer` text NOT NULL,
  `is_correct` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`ID`, `ID_question`, `answer`, `is_correct`) VALUES
(13, 4, 'A greeting', 1),
(14, 4, 'A farewell', 0),
(15, 4, 'A question', 0),
(16, 4, 'An insult', 0),
(17, 5, 'High', 1),
(18, 5, 'Hey', 0),
(19, 5, 'Ho', 0),
(20, 5, 'How', 0),
(21, 6, 'Chào buổi sáng', 1),
(22, 6, 'Chúc ngủ ngon', 0),
(23, 6, 'Chúc mừng năm mới', 0),
(24, 6, 'Xin lỗi', 0),
(25, 7, 'Good afternoon', 1),
(26, 7, 'Good night', 0),
(27, 7, 'Goodbye', 0),
(28, 7, 'Good morning', 0),
(29, 8, 'Good evening', 1),
(30, 8, 'Good morning', 0),
(31, 8, 'Goodbye', 0),
(32, 8, 'Good night', 0),
(33, 9, 'Tạm biệt', 1),
(34, 9, 'Chúc mừng năm mới', 0),
(35, 9, 'Chào buổi sáng', 0),
(36, 9, 'Xin lỗi', 0),
(37, 10, 'Tạm biệt', 1),
(38, 10, 'Chúc mừng năm mới', 0),
(39, 10, 'Chào buổi sáng', 0),
(40, 10, 'Chúc ngủ ngon', 0),
(41, 11, 'Good morning', 1),
(42, 12, 'Goodbye', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `ID` int(11) NOT NULL,
  `ID_language` int(11) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`ID`, `ID_language`, `course`) VALUES
(3, 1, 'Introductions'),
(4, 1, 'Personality traits'),
(5, 1, 'Travel'),
(6, 1, 'Technology'),
(7, 1, 'At work');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `grammars`
--

CREATE TABLE `grammars` (
  `ID` int(11) NOT NULL,
  `ID_language` int(11) NOT NULL,
  `grammar` text NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `grammars`
--

INSERT INTO `grammars` (`ID`, `ID_language`, `grammar`, `name`, `description`) VALUES
(1, 1, 'The Present Simple tense is used to describe habits, unchanging situations, general truths, and fixed arrangements. Example: \"I go to school every day.\"', 'Present Simple', 'Basic usage of the Present Simple tense.'),
(2, 1, 'The Past Simple tense is used to talk about completed actions in the past. Example: \"I visited my grandparents last weekend.\"', 'Past Simple', 'Basic usage of the Past Simple tense.'),
(3, 1, 'The Future Simple tense is used to talk about actions that will happen in the future. Example: \"I will travel to Japan next year.\"', 'Future Simple', 'Basic usage of the Future Simple tense.'),
(4, 1, 'The Present Continuous tense describes actions happening at the moment of speaking or temporary situations. Example: \"I am reading a book right now.\"', 'Present Continuous', 'Usage of the Present Continuous tense.'),
(5, 1, 'The Present Perfect tense connects the past to the present. It is used for actions that have happened at some point up to now. Example: \"I have visited France.\"', 'Present Perfect', 'Introduction to the Present Perfect tense.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `languages`
--

CREATE TABLE `languages` (
  `ID` int(11) NOT NULL,
  `language` varchar(50) NOT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `languages`
--

INSERT INTO `languages` (`ID`, `language`, `flag`, `symbol`) VALUES
(1, 'English', 'english_flag.png', 'EN.png'),
(2, 'Japan', 'france.png', 'FR.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lessons`
--

CREATE TABLE `lessons` (
  `ID` int(11) NOT NULL,
  `ID_course` int(11) NOT NULL,
  `lesson` varchar(100) NOT NULL,
  `lesson_order` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lessons`
--

INSERT INTO `lessons` (`ID`, `ID_course`, `lesson`, `lesson_order`, `description`, `image`) VALUES
(7, 3, 'Hello!', 1, 'Learn greetings for meeting people', 'hello.jpg'),
(8, 3, 'Referring to a person', 2, 'Learn the singular pronouns \"I\" and \"you\"', 'youjpg.jpg'),
(9, 3, 'Asking where somebody is from', 3, 'Learn how to ask which country somebody is from', 'which.jpg'),
(10, 3, 'Identifying people in a workplace', 4, 'Learn vocabulary to talk about people in a workplace', 'workplace.jpg'),
(11, 3, 'Talking about languages', 5, 'Learn vocabulary to talk about languages', 'language.jpg'),
(12, 3, 'Discussing personal items', 6, 'Talk about essential personal items', 'items.jpg'),
(13, 3, 'Answering and hanging up the phone', 7, 'Learn phrases to start and finish a phone conversation', 'which.jpg'),
(14, 3, 'Hello!', 8, 'Learn greetings for meeting people', 'lesson.jpg'),
(15, 3, 'Referring to a person', 9, 'Learn the singular pronouns \"I\" and \"you\"', 'youjpg.jpg'),
(16, 3, 'Asking where somebody is from', 10, 'Learn how to ask which country somebody is from', 'which.jpg'),
(17, 3, 'Identifying people in a workplace', 11, 'Learn vocabulary to talk about people in a workplace', 'workplace.jpg'),
(18, 3, 'Talking about languages', 12, 'Learn vocabulary to talk about languages', 'language.jpg'),
(19, 3, 'Discussing personal items', 13, 'Talk about essential personal items', 'items.jpg'),
(20, 3, 'Answering and hanging up the phone', 14, 'Learn phrases to start and finish a phone conversation', 'which.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `progress`
--

CREATE TABLE `progress` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_course` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `progress`
--

INSERT INTO `progress` (`ID`, `ID_user`, `ID_course`, `percent`, `updated_at`) VALUES
(1, 1, 1, 33, '2024-11-12 01:08:06'),
(8, 8, 1, 33, '2024-11-13 12:21:00'),
(9, 1, 3, 14, '2024-11-13 19:45:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `ID` int(11) NOT NULL,
  `ID_vocabulary` int(11) NOT NULL,
  `question` text NOT NULL,
  `type` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`ID`, `ID_vocabulary`, `question`, `type`) VALUES
(4, 129, 'What is the meaning of \"hello\"?', '2'),
(5, 130, 'How do you pronounce \"hi\"?', '2'),
(6, 131, 'Translate \"good morning\" to Vietnamese.', '2'),
(7, 132, 'Choose the correct response for \"good afternoon\".', '2'),
(8, 133, 'What is the correct pronunciation of \"good evening\"?', '2'),
(9, 134, 'Translate \"goodbye\" to Vietnamese.', '2'),
(10, 135, 'What does \"see you\" mean in Vietnamese?', '2'),
(11, 131, 'Complete the sentence: \"I usually say ____ in the morning.\"', '1'),
(12, 134, 'Complete the sentence: \"When we leave, we say ____.\"', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `experience` int(11) DEFAULT 0,
  `role` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID`, `username`, `email`, `password`, `avatar`, `experience`, `role`) VALUES
(1, 'NguyenTam3', 'tam@gmail.com', '1', '', 4, 1),
(7, 'Tam Nguyen', 'nguyentampt14052004@gmail.com', 'rAhKiubBDR', 'https://lh3.googleusercontent.com/a/ACg8ocKyuW-fkxrAa1qc4GUwZbTGuMdUJdTsSs94zy_veCRc5IkqMQ=s96-c', 14, 1),
(8, 'a', 'a@gmail.com', '1', '', 8, 1),
(9, 'exampleUser', 'b@gmail.com', 'hashed_password', 'default_avatar.png', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vocabstatus`
--

CREATE TABLE `vocabstatus` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_vocabulary` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vocabstatus`
--

INSERT INTO `vocabstatus` (`ID`, `ID_user`, `ID_vocabulary`, `status`) VALUES
(17, 1, 129, 'weak'),
(18, 1, 130, 'weak'),
(19, 1, 131, 'weak'),
(20, 1, 132, 'weak'),
(21, 1, 133, 'weak');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vocabularies`
--

CREATE TABLE `vocabularies` (
  `ID` int(11) NOT NULL,
  `ID_lesson` int(11) NOT NULL,
  `vocabulary` varchar(100) NOT NULL,
  `sound` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meaning` text NOT NULL,
  `example` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vocabularies`
--

INSERT INTO `vocabularies` (`ID`, `ID_lesson`, `vocabulary`, `sound`, `image`, `description`, `meaning`, `example`) VALUES
(129, 7, 'hello', 'dog.mp3', 'vocab.jpg', 'A common greeting used to say hi.', 'Xin chào', 'Hello! How are you?'),
(130, 7, 'hi', 'dog.mp3', 'vocab.jpg', 'An informal greeting.', 'Chào', 'Hi! Long time no see!'),
(131, 7, 'good morning', 'dog.mp3', 'vocab.jpg', 'A greeting used in the morning.', 'Chào buổi sáng', 'Good morning, everyone!'),
(132, 8, 'good afternoon', 'dog.mp3', 'vocab.jpg', 'A greeting used in the afternoon.', 'Chào buổi chiều', 'Good afternoon! How was your day?'),
(133, 8, 'good evening', 'dog.mp3', 'vocab.jpg', 'A greeting used in the evening.', 'Chào buổi tối', 'Good evening, nice to meet you!'),
(134, 9, 'goodbye', 'dog.mp3', 'vocab.jpg', 'A word used to say farewell.', 'Tạm biệt', 'Goodbye, see you tomorrow!'),
(135, 9, 'see you', 'dog.mp3', 'vocab.jpg', 'An informal way to say goodbye.', 'Hẹn gặp lại', 'See you next week!');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_question` (`ID_question`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_language` (`ID_language`);

--
-- Chỉ mục cho bảng `grammars`
--
ALTER TABLE `grammars`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_language` (`ID_language`);

--
-- Chỉ mục cho bảng `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_course` (`ID_course`);

--
-- Chỉ mục cho bảng `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_vocabulary` (`ID_vocabulary`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_experience` (`experience`);

--
-- Chỉ mục cho bảng `vocabstatus`
--
ALTER TABLE `vocabstatus`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_vocabulary` (`ID_vocabulary`);

--
-- Chỉ mục cho bảng `vocabularies`
--
ALTER TABLE `vocabularies`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_lesson` (`ID_lesson`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answers`
--
ALTER TABLE `answers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `grammars`
--
ALTER TABLE `grammars`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `languages`
--
ALTER TABLE `languages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lessons`
--
ALTER TABLE `lessons`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `progress`
--
ALTER TABLE `progress`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `vocabstatus`
--
ALTER TABLE `vocabstatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `vocabularies`
--
ALTER TABLE `vocabularies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`ID_question`) REFERENCES `questions` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`ID_language`) REFERENCES `languages` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `grammars`
--
ALTER TABLE `grammars`
  ADD CONSTRAINT `grammars_ibfk_1` FOREIGN KEY (`ID_language`) REFERENCES `languages` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`ID_course`) REFERENCES `courses` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`ID_vocabulary`) REFERENCES `vocabularies` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `vocabstatus`
--
ALTER TABLE `vocabstatus`
  ADD CONSTRAINT `vocabstatus_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `vocabstatus_ibfk_2` FOREIGN KEY (`ID_vocabulary`) REFERENCES `vocabularies` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `vocabularies`
--
ALTER TABLE `vocabularies`
  ADD CONSTRAINT `vocabularies_ibfk_1` FOREIGN KEY (`ID_lesson`) REFERENCES `lessons` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
