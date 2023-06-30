-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 07:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `ID` int(11) NOT NULL,
  `name_ASSINMINT` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `POSITION` varchar(255) NOT NULL,
  `FILE_TYPE` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `time_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`ID`, `name_ASSINMINT`, `file`, `POSITION`, `FILE_TYPE`, `teacher_id`, `course_id`, `time_insert`, `student_id`) VALUES
(3, 'js', '7889584.jpg', 'Upload/7889584.jpg', 'image/jpeg', 0, 0, '2023-05-09 14:39:08', 0),
(4, 'php', 'Experiment No7 (1).pdf', 'Upload/Experiment No7 (1).pdf', 'application/pdf', 0, 0, '2023-05-09 14:39:08', 0),
(5, 'php', 'Rank mining (1).pdf', 'Upload/Rank mining (1).pdf', 'application/pdf', 0, 0, '2023-05-09 14:39:08', 0),
(7, 'php', 'code.png', '', '', 46, 2, '2023-05-18 21:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `duration` text NOT NULL,
  `date` datetime NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `category`, `duration`, `date`, `image`) VALUES
(2, 'css', 'web app', '40', '2023-06-16 00:00:00', 'CSS3.png'),
(11, 'php', 'server app', '10', '2023-03-28 00:00:00', 'download.png'),
(12, 'js', 'web app', '10', '2023-04-02 00:00:00', '7889641.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lessons_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `descussion`
--

CREATE TABLE `descussion` (
  `ID` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `course_id` int(11) NOT NULL,
  `section` varchar(20) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `time_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `descussion`
--

INSERT INTO `descussion` (`ID`, `text`, `course_id`, `section`, `teacher_id`, `student_id`, `time_insert`, `user_type`) VALUES
(41, '       Hello bassem', 2, '', 46, 49, '2023-05-14 21:00:00', 'student'),
(68, '        welcome', 2, '', 46, 49, '2023-05-17 21:00:00', 'teacher'),
(69, '        bassem', 2, '', 46, 49, '2023-05-17 21:00:00', 'student'),
(70, '        bassem', 2, '', 46, 49, '2023-05-17 21:00:00', 'student'),
(71, '        bassem', 2, '', 46, 49, '2023-05-17 21:00:00', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `details_discussion`
--

CREATE TABLE `details_discussion` (
  `details_id_dscu` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `techer_name` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `time_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `details_q`
--

CREATE TABLE `details_q` (
  `id_det` int(11) NOT NULL,
  `number_of_que` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details_q`
--

INSERT INTO `details_q` (`id_det`, `number_of_que`, `score`, `teacher_id`) VALUES
(0, 6, 1, 0),
(0, 6, 1, 46);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL,
  `chapter` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `FILE_TYPE` varchar(255) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `FILE` varchar(255) NOT NULL,
  `POSITION` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `time_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `chapter`, `title`, `FILE_TYPE`, `course_id`, `FILE`, `POSITION`, `Subject`, `teacher_id`, `time_insert`) VALUES
(39, 'two', 'form', 'document', NULL, 'BASSEM HUSSSEIN.pdf', 'Upload/BASSEM HUSSSEIN.pdf', 'html', 0, '2023-05-09 14:40:18'),
(48, 'bassm', 'html', 'document', NULL, 'Rank mining (1).pdf', 'Upload/Rank mining (1).pdf', 'htmlVV', 0, '2023-05-09 14:40:18'),
(49, 'John', 'php', 'image', NULL, 'Rank mining (1).pdf', 'Upload/Rank mining (1).pdf', 'html', 0, '2023-05-09 14:40:18'),
(50, 'John', 'php', 'document', NULL, 'Rank mining (1).pdf', 'Upload/Rank mining (1).pdf', 'html', 0, '2023-05-09 14:40:18'),
(66, 'bassm', 'js', 'image/png', NULL, 'download.png', 'Upload/download.png', 'htmlVV', 46, '2023-05-09 14:40:18'),
(74, 'fore', 'php', '', 11, 'photo_٢٠٢٢-١١-٢٦_٢٢-١٦-٠٤.jpg', '', '', 46, '2023-05-09 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `less_link`
--

CREATE TABLE `less_link` (
  `id_link` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chose` varchar(20) NOT NULL,
  `ttext` text NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `less_link`
--

INSERT INTO `less_link` (`id_link`, `title`, `chose`, `ttext`, `teacher_id`) VALUES
(1, 'x', 'link', 'https://www.w3schools.com/', 0),
(4, 'text', 'text', 'Hi guys! Thanks a lot to both of you for your help! I\'ve used both inputs as a solution. I set parameters before binding them and it fixed everything! So strange, but everything works now. :)', 0),
(5, 'text', 'text', 'Hi guys! Thanks a lot to both of you for your help! I\'ve used both inputs as a solution. I set parameters before binding them and it fixed everything! So strange, but everything works now. :)', 0),
(7, 'nn', 'text', 'Hi guys! Thanks a lot to both of you for your help! I\'ve used both inputs as a solution. I set parameters before binding them and it fixed everything! So strange, but everything works now. :)', 46),
(8, 'nn', 'text', 'Hi guys! Thanks a lot to both of you for your help! I\'ve used both inputs as a solution. I set parameters before binding them and it fixed everything! So strange, but everything works now. :)', 46),
(9, 'KS', 'link', 'https://www.w3schools.com/', 46),
(10, 'KS', 'link', 'https://www.w3schools.com/', 46);

-- --------------------------------------------------------

--
-- Table structure for table `quize`
--

CREATE TABLE `quize` (
  `ID` int(11) NOT NULL,
  `name_quize` varchar(255) NOT NULL,
  `file` longblob NOT NULL,
  `POSITION` varchar(255) NOT NULL,
  `FILE_TYPE` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `time_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quize`
--

INSERT INTO `quize` (`ID`, `name_quize`, `file`, `POSITION`, `FILE_TYPE`, `teacher_id`, `course_id`, `time_insert`, `student_id`) VALUES
(3, 'html', 0x556e7469746c656420576f726b73706163652e706e67, '', '', 46, 2, '2023-05-19 21:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_m`
--

CREATE TABLE `quiz_m` (
  `id` int(255) NOT NULL,
  `que` text NOT NULL,
  `option_1` varchar(222) NOT NULL,
  `option_2` varchar(222) NOT NULL,
  `option_3` varchar(222) NOT NULL,
  `option_4` varchar(222) NOT NULL,
  `ans` varchar(222) NOT NULL,
  `userans` text DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `quiz_det` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quiz_m`
--

INSERT INTO `quiz_m` (`id`, `que`, `option_1`, `option_2`, `option_3`, `option_4`, `ans`, `userans`, `course_id`, `teacher_id`, `quiz_det`) VALUES
(1, 'what is php', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', 'Hypertext Preprocessor', 'Hypertext Transfer Protocol', 'Hypertext Preprocessor', 'Hypertext Preprocessor', 2, 46, 0),
(2, 'what is php', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', 'Hypertext Preprocessor', 'Hypertext Transfer Protocol', 'Hypertext Preprocessor', 'Hypertext Preprocessor', 2, 46, 0),
(3, 'what is php', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', 'Hypertext Preprocessor', 'Hypertext Transfer Protocol', 'Hypertext Preprocessor', 'Hypertext Preprocessor', 2, 46, 0),
(4, 'what is php', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', 'Hypertext Preprocessor', 'Hypertext Transfer Protocol', 'Hypertext Preprocessor', 'Hypertext Preprocessor', 2, 46, 0),
(5, 'what is php', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', 'Hypertext Preprocessor', 'Hypertext Transfer Protocol', 'Hypertext Preprocessor', 'Hypertext Preprocessor', 2, 46, 0),
(6, 'what is php', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', 'Hypertext Preprocessor', 'Hypertext Transfer Protocol', 'Hypertext Preprocessor', 'Hypertext Preprocessor', 2, 46, 0),
(7, 'what is php', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', 'Hypertext Preprocessor', 'Hypertext Transfer Protocol', 'Hypertext Preprocessor', 'Hypertext Preprocessor', 2, 46, 0);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id_score` int(11) NOT NULL,
  `scor_quize` int(11) NOT NULL,
  `scor_number_mulit` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `scor_mid` int(11) NOT NULL,
  `scor_finally` int(11) NOT NULL,
  `Degree_of_pursuit` int(11) NOT NULL,
  `score_assigmaint` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `ID` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'images_pofile.png',
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL COMMENT 'identify the admin and uesr',
  `name` varchar(255) NOT NULL,
  `SECURITY_CODE` varchar(255) NOT NULL,
  `ACTIVTION` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`ID`, `image`, `password`, `email`, `user_type`, `name`, `SECURITY_CODE`, `ACTIVTION`) VALUES
(37, 'photo_٢٠٢٢-١١-٢٦_٢٢-١٦-٠٤.jpg', '25d55ad283aa400af464c76d713c07ad', 'bassmhu786@gmail.com', 'admin', 'bassm husein', '005a43e131853f89190f7442a6c1a995', 1),
(38, 'author-image4.jpg', '25d55ad283aa400af464c76d713c07ad', 'asasas2@gmail.com', 'teacher', 'bassm ', 'd21bcb314594b331dc3753a9973fe643', 1),
(46, 'avatar-06.png', '25d55ad283aa400af464c76d713c07ad', 'bassu786@gmail.com', 'teacher', 'bassm husein', 'cac9d1a810eb3e44d21aea261e3e23ba', 1),
(47, 'author-image3.jpg', '25d55ad283aa400af464c76d713c07ad', 'abdul324@gmail.com', 'teacher', 'abdulla', '8106f6b607ffefcfae2ca2074ec0f75f', 1),
(50, 'images_pofile.png', '25d55ad283aa400af464c76d713c07ad', 'dfgsd567@gmail.com', 'admin', 'bassm husein', '8365aa70f0388f5d2d39b4538cad8069', 0),
(51, 'images_pofile.png', '25f9e794323b453885f5181f1b624d0b', 'dfgsd57@gmail.com', 'admin', 'bassm husein', '2026a215c1f5407df5333d6d39a89e4e', 0),
(52, 'images_pofile.png', '25f9e794323b453885f5181f1b624d0b', 'dfgs67@gmail.com', 'admin', 'bassm husein', '3be9256fe5098c50c006c6c976f7ea2e', 1),
(53, 'images_pofile.png', '', '', 'admin', '', 'cf4b19d2b3ab38fe797468690c0bd754', 0),
(54, 'pic-1.png', '25d55ad283aa400af464c76d713c07ad', 'dfg7@gmail.com', 'student', 'bassm husein', '2db4b3af85ffa5ef712645dd0b368d20', 1),
(55, 'pic-5.png', '25d55ad283aa400af464c76d713c07ad', 'ali45@gmail.com', 'student', 'ali', 'f3ef474ab70ab004ac730e252e49c314', 1),
(56, '7889622.jpg', '25d55ad283aa400af464c76d713c07ad', 'zainb345@gmail.com', 'student', 'zainb', '81f6fc50e7abf86b614181c523ae503b', 1),
(57, 'receive-mail.png', '25d55ad283aa400af464c76d713c07ad', 'vdf34@gmail.com', 'student', 'bassm husein', '861d1772daeb6e4b5d1ae8e0cb02ee95', 1),
(59, 'author-image4.jpg', '25d55ad283aa400af464c76d713c07ad', 'must655@gmail.com', 'teacher', 'Mustafa basher ', 'e90900538b77900b80f2fc0ac4c8a2d1', 1),
(61, 'images_pofile.png', '25d55ad283aa400af464c76d713c07ad', 'nor45@gmail.com', 'student', 'Nor', '7049489b0c707938a7f9ad82d631d637', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `descussion`
--
ALTER TABLE `descussion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `dscution_id` (`student_id`);

--
-- Indexes for table `details_discussion`
--
ALTER TABLE `details_discussion`
  ADD PRIMARY KEY (`details_id_dscu`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `less_link`
--
ALTER TABLE `less_link`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `quize`
--
ALTER TABLE `quize`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `quiz_m`
--
ALTER TABLE `quiz_m`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id_score`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `descussion`
--
ALTER TABLE `descussion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `details_discussion`
--
ALTER TABLE `details_discussion`
  MODIFY `details_id_dscu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `less_link`
--
ALTER TABLE `less_link`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quize`
--
ALTER TABLE `quize`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz_m`
--
ALTER TABLE `quiz_m`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
