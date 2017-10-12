-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 09:18 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `class_id` int(10) UNSIGNED NOT NULL,
  `class_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_section` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`class_id`, `class_name`, `class_section`, `class_date`, `class_time`, `course_id`) VALUES
(1, 'DifferentialEquations-A', 'A', '10/19/2017', '12:00 PM', 1),
(2, 'DifferentialEquations-B', 'B', '10/19/2017', '12:00 PM', 1),
(3, 'Linear Algebra-A', 'A', '10/27/2017', '12:00 PM', 2),
(4, 'Linear Algebra-B', 'B', '10/28/2017', '12:00 PM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`) VALUES
(1, 'DifferentialEquations', 'Study of differential equations, including modeling physical systems. Solution of first-order ODEs by analytical, graphical, and numerical'),
(2, 'Linear Algebra', 'irst order linear systems: normal modes, matrix exponentials, variation of parameters. Heat equation, wave equation. Nonlinear autonomous systems: critical point analysis, phase plane diagrams');

-- --------------------------------------------------------

--
-- Table structure for table `courses_teachers`
--

CREATE TABLE `courses_teachers` (
  `course_teacher_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses_teachers`
--

INSERT INTO `courses_teachers` (`course_teacher_id`, `course_id`, `class_id`, `teacher_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 3, 2),
(4, 2, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(10) UNSIGNED NOT NULL,
  `exam_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_name`, `exam_description`, `course_id`) VALUES
(1, 'First Term DE', 'First Term', 1),
(2, 'First Term LA', 'First Term', 2);

-- --------------------------------------------------------

--
-- Table structure for table `exam_classes`
--

CREATE TABLE `exam_classes` (
  `exam_class_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_classes`
--

INSERT INTO `exam_classes` (`exam_class_id`, `exam_id`, `class_id`) VALUES
(1, 1, 1),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fee_id` int(10) UNSIGNED NOT NULL,
  `fee_name` varchar(100) NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `fee_duedate` varchar(50) NOT NULL,
  `fee_details` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fee_id`, `fee_name`, `fee_amount`, `fee_duedate`, `fee_details`) VALUES
(1, 'ID card', 1500, '10/26/2017', 'card'),
(2, 'notes', 500, '10/18/2017', 'notes');

-- --------------------------------------------------------

--
-- Table structure for table `fee_students`
--

CREATE TABLE `fee_students` (
  `fee_student_id` int(10) UNSIGNED NOT NULL,
  `fee_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `fee_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_students`
--

INSERT INTO `fee_students` (`fee_student_id`, `fee_id`, `student_id`, `fee_status`) VALUES
(4, 1, 1, 'paid'),
(5, 1, 2, 'unpaid'),
(6, 1, 3, 'unpaid'),
(7, 2, 1, 'paid'),
(8, 2, 2, 'unpaid'),
(9, 2, 3, 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `finances`
--

CREATE TABLE `finances` (
  `finance_id` int(10) UNSIGNED NOT NULL,
  `finance_name` varchar(100) NOT NULL,
  `finance_amount` int(11) NOT NULL,
  `finance_status` varchar(50) NOT NULL,
  `finance_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finances`
--

INSERT INTO `finances` (`finance_id`, `finance_name`, `finance_amount`, `finance_status`, `finance_time`) VALUES
(1, 'Books sold', 15000, 'received', '2017-10-05 13:43:57'),
(2, 'Books bought', 15000, 'paid', '2017-10-05 13:44:12'),
(3, 'pages sold', 10000, 'received', '2017-10-05 13:45:04'),
(4, 'pages bought', 3000, 'paid', '2017-10-05 13:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_17_105534_create_parents_table', 1),
(4, '2017_09_17_111251_create_students_table', 1),
(5, '2017_09_17_111640_create_teachers_table', 1),
(6, '2017_09_17_112013_create_classrooms_table', 1),
(7, '2017_09_17_112413_create_courses_table', 1),
(8, '2017_09_17_112443_create_exams_table', 1),
(9, '2017_09_17_113014_create_students_classrooms_table', 1),
(10, '2017_09_17_113106_create_students_courses_table', 1),
(11, '2017_09_17_113218_create_courses_classrooms_table', 1),
(12, '2017_09_17_113248_create_courses_teachers_table', 1),
(13, '2017_09_17_113345_create_students_exams_grades_table', 1),
(14, '2017_09_17_113430_create_exams_courses_table', 1),
(15, '2017_09_17_114743_create_students_attendences_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(10) UNSIGNED NOT NULL,
  `parent_first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_sex` tinyint(1) NOT NULL,
  `parent_dob` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_phone_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parent_id`, `parent_first_name`, `parent_last_name`, `parent_sex`, `parent_dob`, `parent_phone_number`, `parent_address`, `user_id`) VALUES
(1, 'John', 'Deakin', 1, '03/12/1971', '04237123489', 'Lahore', 3),
(2, 'Harris', 'Leo', 1, '09/09/1969', '12345666622', 'Lahore', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `student_first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_sex` tinyint(1) NOT NULL,
  `student_dob` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_phone_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_join_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `student_address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_first_name`, `student_last_name`, `student_sex`, `student_dob`, `student_phone_number`, `student_join_at`, `student_address`, `user_id`, `parent_id`) VALUES
(1, 'Sophie', 'Meadows', 0, '08/12/1993', '04237894561', '2017-10-05 18:18:40', 'Lahore', 5, 1),
(2, 'Darren', 'Kirk', 1, '07/12/1994', '03007894561', '2017-10-05 18:21:03', 'Lahore', 6, 2),
(3, 'Daisy', 'Rogers', 0, '10/12/1993', '03007894561', '2017-10-05 18:22:50', 'Lahore', 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `students_attendences`
--

CREATE TABLE `students_attendences` (
  `student_attendence_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `attendence_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendence_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_attendences`
--

INSERT INTO `students_attendences` (`student_attendence_id`, `student_id`, `class_id`, `course_id`, `attendence_status`, `attendence_date`) VALUES
(1, 1, 1, 1, 'present', '10/05/2017'),
(2, 2, 1, 1, 'present', '10/05/2017');

-- --------------------------------------------------------

--
-- Table structure for table `students_courses`
--

CREATE TABLE `students_courses` (
  `student_course_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_courses`
--

INSERT INTO `students_courses` (`student_course_id`, `student_id`, `course_id`, `class_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 3),
(3, 2, 1, 1),
(4, 2, 2, 3),
(5, 3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `students_exams_grades`
--

CREATE TABLE `students_exams_grades` (
  `student_exam_grade_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `exam_grade` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_exams_grades`
--

INSERT INTO `students_exams_grades` (`student_exam_grade_id`, `student_id`, `exam_id`, `class_id`, `exam_grade`) VALUES
(1, 1, 1, 1, 'A'),
(2, 2, 1, 1, 'A-'),
(3, 1, 2, 3, 'B'),
(4, 2, 2, 3, 'A'),
(5, 3, 2, 3, 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `teacher_first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_sex` tinyint(1) NOT NULL,
  `teacher_dob` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_phone_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_join_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_first_name`, `teacher_last_name`, `teacher_sex`, `teacher_dob`, `teacher_phone_number`, `teacher_address`, `teacher_join_at`, `user_id`) VALUES
(1, 'Sally', 'Brown', 0, '06/12/1985', '134652929292', 'Lahore', '2017-10-05 13:35:16', 8),
(2, 'Martin', 'Brown', 1, '06/12/1985', '134652929292', 'Lahore', '2017-10-09 07:01:47', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'faryamasif@gmail.com', '$2y$10$Tqk4eyDp9Fhs7.WhsQDZFeOV22kbZ2i5uLw4V/091e/SxFeFBw0x.', 'admin', '9ujVHC0Pscke9eoHUQPIkQ4vOUwUlbPHzJoFkDGlxWQUojsptgYdQsKmWohN', '2017-10-01 23:00:12', '2017-10-03 03:39:28'),
(2, 'faryam', 'faryamasif@gmail.com', '$2y$10$gDVjurSwM/dwq6cY8o5Id.7ycd7soCj5GN4E3DJVXcFrp7bZ5W6Gq', 'admin', 'GXIYPKRIzW', '2017-10-05 12:57:45', '2017-10-05 12:57:45'),
(3, 'parent', 'John@gmail.com', '$2y$10$3i16vFZ3FN3/.VfeNLVdgOLdzCQd5OguzCkRS.l9eN6wdJPhEXloS', 'parent', 'ZfqrmnYWsCpY4nvxYZbH929mAhia64ihCDQW5zsbjsW8DW8RyQQGKZjE4C5B', '2017-10-05 13:12:00', '2017-10-05 13:57:19'),
(4, 'Harris', 'Harris@gmail.com', '$2y$10$TGZGktBMweKfd0PrMKRd3.DwycHUzdsdC5DInTtexm.5G2rvIybVe', 'parent', 'pxBYir3XFF', '2017-10-05 13:16:18', '2017-10-05 13:16:18'),
(5, 'Sophie', 'Sophie@gmail.com', '$2y$10$WTS4tJ9g6Vyv7kfA7RzJveRlClBPiT1Po00XmqO1qQlUax6Sqa42S', 'student', 'v1x0rn4Wgy', '2017-10-05 13:18:40', '2017-10-05 13:18:40'),
(6, 'Darren', 'Darren@gmail.com', '$2y$10$lCvGJDXsx8eLK7iIu9M0MONLNofS8mX7M4gnYXQ/JTwHXZDzdJi1K', 'student', 'idJrX8Yqei', '2017-10-05 13:21:02', '2017-10-05 13:21:02'),
(7, 'student', 'Daisy@gmail.com', '$2y$10$n/r3vUORP5.ici9I3AVOJukBGG3msBMO7I/AkwOhMPpR5PNG9m.wK', 'student', 'iw4bnfBUIb9mlLzhP4MmYMGr2dQIwIv6xG5QXwyeuJyUNMAEBzMKuN64I6kp', '2017-10-05 13:22:50', '2017-10-05 13:22:50'),
(8, 'teacher', 'Sally@gmail.com', '$2y$10$d3jTy/yLgPDclGVjJbD4veKHFcTuPSDK6hx4Ssr5L6r8MPfC8an5K', 'teacher', 'IKfnqeXHTtUqXT9inbmdb3WX6q6b4exUjEXRS6Z6urBGnHd8q3NXlgUz89hg', '2017-10-05 13:35:16', '2017-10-05 13:35:16'),
(9, 'Martin', 'Martin@gmail.com', '$2y$10$W8AvaGfmYXsBPIw8F/qb0OVEGLSGhhE3QG46NTNqCUqR6RG5RLGIO', 'teacher', 'FB57kOKKEE', '2017-10-05 13:35:42', '2017-10-05 13:35:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_name` (`class_name`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courses_teachers`
--
ALTER TABLE `courses_teachers`
  ADD PRIMARY KEY (`course_teacher_id`),
  ADD KEY `courses_teachers_course_id_foreign` (`course_id`),
  ADD KEY `courses_teachers_teacher_id_foreign` (`teacher_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `exam_classes`
--
ALTER TABLE `exam_classes`
  ADD PRIMARY KEY (`exam_class_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `fee_students`
--
ALTER TABLE `fee_students`
  ADD PRIMARY KEY (`fee_student_id`),
  ADD KEY `fee_id` (`fee_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`finance_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `parents_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `students_ibfk_1` (`parent_id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `students_attendences`
--
ALTER TABLE `students_attendences`
  ADD PRIMARY KEY (`student_attendence_id`),
  ADD KEY `students_attendences_student_id_foreign` (`student_id`),
  ADD KEY `students_attendences_class_id_foreign` (`class_id`),
  ADD KEY `students_attendences_course_id_foreign` (`course_id`);

--
-- Indexes for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD PRIMARY KEY (`student_course_id`),
  ADD KEY `students_courses_student_id_foreign` (`student_id`),
  ADD KEY `students_courses_course_id_foreign` (`course_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `students_exams_grades`
--
ALTER TABLE `students_exams_grades`
  ADD PRIMARY KEY (`student_exam_grade_id`),
  ADD KEY `students_exams_grades_student_id_foreign` (`student_id`),
  ADD KEY `students_exams_grades_exam_id_foreign` (`exam_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `class_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `courses_teachers`
--
ALTER TABLE `courses_teachers`
  MODIFY `course_teacher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam_classes`
--
ALTER TABLE `exam_classes`
  MODIFY `exam_class_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fee_students`
--
ALTER TABLE `fee_students`
  MODIFY `fee_student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `finances`
--
ALTER TABLE `finances`
  MODIFY `finance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students_attendences`
--
ALTER TABLE `students_attendences`
  MODIFY `student_attendence_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `students_courses`
--
ALTER TABLE `students_courses`
  MODIFY `student_course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `students_exams_grades`
--
ALTER TABLE `students_exams_grades`
  MODIFY `student_exam_grade_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `courses_teachers`
--
ALTER TABLE `courses_teachers`
  ADD CONSTRAINT `courses_teachers_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `courses_teachers_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classrooms` (`class_id`),
  ADD CONSTRAINT `courses_teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `exam_classes`
--
ALTER TABLE `exam_classes`
  ADD CONSTRAINT `exam_classes_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classrooms` (`class_id`),
  ADD CONSTRAINT `exam_classes_ibfk_2` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`);

--
-- Constraints for table `fee_students`
--
ALTER TABLE `fee_students`
  ADD CONSTRAINT `fee_students_ibfk_1` FOREIGN KEY (`fee_id`) REFERENCES `fees` (`fee_id`),
  ADD CONSTRAINT `fee_students_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`parent_id`),
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students_attendences`
--
ALTER TABLE `students_attendences`
  ADD CONSTRAINT `students_attendences_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classrooms` (`class_id`),
  ADD CONSTRAINT `students_attendences_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `students_attendences_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD CONSTRAINT `students_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `students_courses_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classrooms` (`class_id`),
  ADD CONSTRAINT `students_courses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `students_exams_grades`
--
ALTER TABLE `students_exams_grades`
  ADD CONSTRAINT `students_exams_grades_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`),
  ADD CONSTRAINT `students_exams_grades_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classrooms` (`class_id`),
  ADD CONSTRAINT `students_exams_grades_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
