-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: dec. 29, 2021 la 11:33 PM
-- Versiune server: 10.4.6-MariaDB
-- Versiune PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `elvis_laravel_p6`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `classroom`
--

CREATE TABLE `classroom` (
  `id_classroom` bigint(20) UNSIGNED NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `classroom`
--

INSERT INTO `classroom` (`id_classroom`, `id_teacher`, `id_subject`, `id_schedule`, `name`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 'Class1', '2021-12-29 18:18:03', '2021-12-29 18:18:03'),
(2, 5, 1, 3, 'Class2', '2021-12-29 18:44:33', '2021-12-29 18:44:33'),
(3, 5, 2, 5, 'Class3', '2021-12-29 18:45:40', '2021-12-29 19:18:04');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `classroom_student`
--

CREATE TABLE `classroom_student` (
  `id_classroom_student` bigint(20) UNSIGNED NOT NULL,
  `id_classroom` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `classroom_student`
--

INSERT INTO `classroom_student` (`id_classroom_student`, `id_classroom`, `id_student`, `created_at`, `updated_at`) VALUES
(2, 1, 2, '2021-12-29 18:18:28', '2021-12-29 18:18:28'),
(3, 1, 3, '2021-12-29 18:18:28', '2021-12-29 18:18:28'),
(4, 1, 4, '2021-12-29 18:18:28', '2021-12-29 18:18:28'),
(5, 2, 2, '2021-12-29 18:44:40', '2021-12-29 18:44:40'),
(6, 2, 3, '2021-12-29 18:44:40', '2021-12-29 18:44:40'),
(7, 2, 4, '2021-12-29 18:44:40', '2021-12-29 18:44:40'),
(8, 3, 2, '2021-12-29 18:45:45', '2021-12-29 18:45:45'),
(9, 3, 3, '2021-12-29 18:45:45', '2021-12-29 18:45:45'),
(10, 3, 4, '2021-12-29 18:45:45', '2021-12-29 18:45:45');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `course`
--

CREATE TABLE `course` (
  `id_course` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `course`
--

INSERT INTO `course` (`id_course`, `name`, `created_at`, `updated_at`) VALUES
(1, 'curs 1', '2021-12-29 16:51:21', '2021-12-29 16:51:21');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `course_subject`
--

CREATE TABLE `course_subject` (
  `id_course_subject` bigint(20) UNSIGNED NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `course_subject`
--

INSERT INTO `course_subject` (`id_course_subject`, `id_course`, `id_subject`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2021-12-29 18:16:52', '2021-12-29 18:16:52');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `exam`
--

CREATE TABLE `exam` (
  `id_exam` bigint(20) UNSIGNED NOT NULL,
  `id_subject` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `exam`
--

INSERT INTO `exam` (`id_exam`, `id_subject`, `id_student`, `name`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'exam 1', '10.00', '2021-12-29 16:49:42', '2021-12-29 16:49:48'),
(2, 1, 2, 'Exam 1', '5.00', '2021-12-29 20:17:32', '2021-12-29 20:17:32'),
(3, 1, 3, 'Exam 1', '5.00', '2021-12-29 20:17:52', '2021-12-29 20:17:52'),
(4, 1, 3, 'Exam 2', '7.00', '2021-12-29 20:18:00', '2021-12-29 20:18:00'),
(5, 1, 3, 'Exam 3', '8.00', '2021-12-29 20:18:07', '2021-12-29 20:18:07');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_05_09_121120_create_table_courses_migration', 1),
(4, '2020_05_09_131803_create_table_schedule_migration', 1),
(5, '2020_05_15_161809_create_table_profile_migration', 1),
(6, '2020_05_17_065600_create_table_classroom_migration', 1),
(7, '2020_05_17_100629_create_table_classroom_student_migration', 1),
(8, '2020_05_22_182215_create_table_subject_migration', 1),
(9, '2020_05_22_182930_create_table_course_subject_migration', 1),
(10, '2020_05_23_104028_create_table_subject_student_migration', 1),
(11, '2020_05_23_182652_create_table_exam_migration', 1),
(12, '2020_05_23_182657_create_table_work_migration', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile_user` bigint(20) UNSIGNED NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `profile`
--

INSERT INTO `profile` (`id_profile_user`, `id_profile`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-12-29 16:46:02', '2021-12-29 16:46:02'),
(2, 1, 2, '2021-12-29 18:03:36', '2021-12-29 18:03:36'),
(4, 2, 5, '2021-12-29 18:17:48', '2021-12-29 18:17:48'),
(5, 1, 6, '2021-12-29 20:30:18', '2021-12-29 20:30:18');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` bigint(20) UNSIGNED NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `time_start`, `time_end`, `day`, `created_at`, `updated_at`) VALUES
(1, '10:00:00', '11:00:00', 'Lunes', '2021-12-29 16:46:42', '2021-12-29 16:46:42'),
(2, '12:00:00', '13:00:00', 'Lunes', '2021-12-29 16:46:57', '2021-12-29 16:46:57'),
(3, '10:00:00', '11:00:00', 'Miércoles', '2021-12-29 18:44:05', '2021-12-29 18:44:05'),
(4, '13:00:00', '14:00:00', 'Miércoles', '2021-12-29 18:44:17', '2021-12-29 18:44:17'),
(5, '11:00:00', '12:00:00', 'Jueves', '2021-12-29 18:45:31', '2021-12-29 18:45:31');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `subject`
--

CREATE TABLE `subject` (
  `id_subject` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage_exam` decimal(10,2) DEFAULT NULL,
  `percentage_work` decimal(10,2) DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `subject`
--

INSERT INTO `subject` (`id_subject`, `name`, `percentage_exam`, `percentage_work`, `date_start`, `date_end`, `created_at`, `updated_at`) VALUES
(1, 'Asignatura 1', '0.50', '0.70', '2021-12-01', '2021-12-30', '2021-12-29 16:48:48', '2021-12-29 19:46:10'),
(2, 'Asignatura 2', '1.00', '1.00', '2021-12-01', '2021-12-29', '2021-12-29 19:17:36', '2021-12-29 19:17:43');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `subject_student`
--

CREATE TABLE `subject_student` (
  `id_subject_student` bigint(20) UNSIGNED NOT NULL,
  `id_subject` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `note_exam` decimal(10,2) DEFAULT NULL,
  `note_work` decimal(10,2) DEFAULT NULL,
  `note_final` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `subject_student`
--

INSERT INTO `subject_student` (`id_subject_student`, `id_subject`, `id_student`, `note_exam`, `note_work`, `note_final`, `created_at`, `updated_at`) VALUES
(2, 2, 2, NULL, NULL, NULL, '2021-12-29 19:17:51', '2021-12-29 19:17:51'),
(3, 2, 3, NULL, NULL, NULL, '2021-12-29 19:17:51', '2021-12-29 19:17:51'),
(4, 2, 4, NULL, NULL, NULL, '2021-12-29 19:17:51', '2021-12-29 19:17:51'),
(5, 1, 1, NULL, NULL, NULL, '2021-12-29 20:17:23', '2021-12-29 20:17:23'),
(6, 1, 2, NULL, NULL, NULL, '2021-12-29 20:17:23', '2021-12-29 20:17:23'),
(7, 1, 3, '6.67', '7.00', '8.24', '2021-12-29 20:17:23', '2021-12-29 20:18:20'),
(8, 1, 4, NULL, NULL, NULL, '2021-12-29 20:17:23', '2021-12-29 20:17:23');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `nif`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Student', 'Student', 'student', '123', 123, 'student@student.ro', NULL, '$2y$10$ILPn.4903/lYPqwuvO.okuhhnFeAvPzpGWnu8Y.RcOS788GYOu2i2', NULL, '2021-12-29 18:00:42', '2021-12-29 18:00:42'),
(3, 'Student 2', 'Student 2', 'studnet2', '123', 123, 'studnet2@studnet.ro', NULL, '$2y$10$5fokpoVe4Wiy4k169z7OwuWj7IKE3Hw/sWy8/XvMwEFysmCfxTUb.', NULL, '2021-12-29 18:08:51', '2021-12-29 18:08:51'),
(4, 'Student 3', 'Student 3', 'student3', '123', 123, 'studnet3@student.ro', NULL, '$2y$10$qHBMpcNMFLeVnHBYM.gYUeEv.o/qwK6pJ5DU1yrv5p22UbxeqlNWq', NULL, '2021-12-29 18:13:52', '2021-12-29 18:13:52'),
(5, 'Profesor1', 'Profesor1', 'profesor', '123', 123, 'profesor@profesor.ro', NULL, '$2y$10$RbQVicCm.PL9/yOpcfnz.eYzqIl/vK5ml.gQZZPY6uNvrZzGFQhte', NULL, '2021-12-29 18:17:48', '2021-12-29 18:17:48'),
(6, 'Elvis', 'Maestro', 'elvis', '123', 123, 'elvis@maestro.com', NULL, '$2y$10$wTRS6nZ1ZXGiNNLw3cLmLux20eQntwmzXBjsQhXp.icsyODRnQTne', NULL, '2021-12-29 20:30:18', '2021-12-29 20:30:18');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `work`
--

CREATE TABLE `work` (
  `id_work` bigint(20) UNSIGNED NOT NULL,
  `id_subject` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `work`
--

INSERT INTO `work` (`id_work`, `id_subject`, `id_student`, `name`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Trabajo 1', '8.00', '2021-12-29 20:17:39', '2021-12-29 20:17:39'),
(2, 1, 3, 'Trabajo 1', '7.00', '2021-12-29 20:18:15', '2021-12-29 20:18:15');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id_classroom`);

--
-- Indexuri pentru tabele `classroom_student`
--
ALTER TABLE `classroom_student`
  ADD PRIMARY KEY (`id_classroom_student`);

--
-- Indexuri pentru tabele `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

--
-- Indexuri pentru tabele `course_subject`
--
ALTER TABLE `course_subject`
  ADD PRIMARY KEY (`id_course_subject`);

--
-- Indexuri pentru tabele `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id_exam`);

--
-- Indexuri pentru tabele `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexuri pentru tabele `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile_user`);

--
-- Indexuri pentru tabele `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indexuri pentru tabele `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_subject`);

--
-- Indexuri pentru tabele `subject_student`
--
ALTER TABLE `subject_student`
  ADD PRIMARY KEY (`id_subject_student`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexuri pentru tabele `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id_work`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id_classroom` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `classroom_student`
--
ALTER TABLE `classroom_student`
  MODIFY `id_classroom_student` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `course`
--
ALTER TABLE `course`
  MODIFY `id_course` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `course_subject`
--
ALTER TABLE `course_subject`
  MODIFY `id_course_subject` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `exam`
--
ALTER TABLE `exam`
  MODIFY `id_exam` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `subject`
--
ALTER TABLE `subject`
  MODIFY `id_subject` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `subject_student`
--
ALTER TABLE `subject_student`
  MODIFY `id_subject_student` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `work`
--
ALTER TABLE `work`
  MODIFY `id_work` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
