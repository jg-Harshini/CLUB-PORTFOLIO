-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2025 at 11:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'technical',
  `logo` varchar(255) DEFAULT NULL,
  `introduction` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `staff_coordinator_name` varchar(255) NOT NULL,
  `staff_coordinator_email` varchar(255) NOT NULL,
  `staff_coordinator_photo` varchar(255) DEFAULT NULL,
  `year_started` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `category`, `logo`, `introduction`, `mission`, `staff_coordinator_name`, `staff_coordinator_email`, `staff_coordinator_photo`, `year_started`, `created_at`, `updated_at`, `department_id`) VALUES
(1, 'IoT', 'technical', 'club_logos/N9yXe9zUvInJTFuelHpmDvHIHNYnkcKYlArOTjFA.png', 'The IoT Club centers around the Internet of Things and its industrial and societal applications. The club promotes sensor-based innovations, smart home prototypes, and real-time monitoring projects. Its social contributions include community automation projects such as smart irrigation and energy-saving devices.', 'To empower students with hands-on skills in the Internet of Things by fostering innovation, collaboration, and real-world problem-solving through workshops, projects engagement.', 'Mrs.C.V.Nisha Angeline ,Assistant Professor,IT', 'nishaangeline@gmail.com', 'staff_photos/loXsJoLeRTjoKnHohpj2sxNRLmvdBTkW6cYlc0Rp.jpg', 2012, '2025-06-21 00:31:40', '2025-07-20 14:11:16', 4),
(3, 'App Development', 'technical', 'club_logos/6GIs6qsVaTJGN3XyHsfTwZTyN6XkDvwNpOwfb7Gr.png', 'Empowers students to build Android & iOS apps.', 'To create apps that solve real-world problems.', 'Mrs.C.V.Nisha Angeline ,Assistant Professor,IT', 'nishaangeline@gmail.com', 'staff_photos/08ia4Zzhs45DeS1Y6s1UEk3iAMFKwznp18Z2tRQV.jpg', 2019, NULL, '2025-07-20 14:11:27', 4),
(4, 'AR/VR', 'technical', 'club_logos/xuZU6zm2uCvwEfPtLJ1iEP7aw5yJeSgiWKf1tK2n.png', 'Dive into augmented and virtual reality tech.', 'To enhance interaction through immersive tech.', 'Dr. N. Shivakumar,Assistant Professor,CSE', 'shiva@tce.edu', 'staff_photos/ucgkF4pbUE1wU6c0A06T4ycGDpH2YbBwrtqAagCI.jpg', 2020, NULL, '2025-07-20 14:11:06', 5),
(5, 'Prometheans', 'technical', 'club_logos/WkWsFkL3uG17aghOJRoK9OfLD1hmh74H3jN7dHmd.png', 'Fosters innovation and curiosity.', 'To ignite the flame of creation in every student.', 'Dr. C. Vignesh,Assistant Professor,MECH', 'cvmech@tce.edu', 'staff_photos/3x9eVtoXrBIteyBEHGEhGohpLuzAfRrrOXiRU5Lh.png', 2017, NULL, '2025-07-20 14:13:08', 2),
(6, 'Eureka', 'technical', 'club_logos/SR2QK7pgFyTbQ2VA2dzNFRttZY4nyowQCIp3jSI1.png', 'Where curiosity meets discovery.', 'To inspire research and experimentation.', 'Dr. S. Arunkumar,Assistant Professor,MECH', 'sakmech@tce.edu', 'staff_photos/djpAUdLAGwJJ6xdXrCwzcMfnnwY4WINWxlnIVrUf.jpg', 2016, NULL, '2025-07-20 14:15:44', 2),
(7, 'Coders Club', 'technical', 'club_logos/LOWxyQurYkz862KaXDXQar4SvT2RA8K6Y2b7TwEx.png', 'For those who love to code.', 'To empower students through problem solving and programming.', 'Dr. A. M. Abirami,Associate Professor,IT', 'abiramiam@tce.edu', 'staff_photos/35s4OImhdKkjmG64Dh1HyJYdMUseRrXBDYsCmn92.jpg', 2015, NULL, '2025-07-20 14:16:37', 4),
(8, 'Ekalayva', 'technical', 'club_logos/VsAihPvNKsBxP3hkE67ps3tXswsWcxro1v5RpdnM.png', 'Self-learning is our strength.', 'To promote independent learning through projects.', 'Dr. R. Rajan Prakash,Associate Professor,EEE', 'r_rajanprakash@tce.edu', 'staff_photos/ypLyMvtiO5NGZO5dqzMPJI10Zjol2jgWDqKRwxF4.jpg', 2020, NULL, '2025-07-20 14:17:31', 3),
(11, 'YUKTA Racing', 'technical', 'club_logos/59TrJak3Rz3Ym9G8ksjZlt7h7H0fXwtsI4y25Wfu.png', 'Fuel your dreams with speed.', 'To design and race efficient student-built vehicles.', 'Dr. S. Umar Sherif,Assistant Professor,MECH', 'susmech@tce.edu', 'staff_photos/qXVEQJuCA9ocPVKeapCTgDl9lHeEqaJOMz2taf4I.jpg', 2016, NULL, '2025-07-20 14:18:47', 2),
(12, 'Algo Geeks', 'technical', 'club_logos/YFWkACMopbTlxvwWbVGODPBY79SlTRuznz6bDo4N.png', 'Love for algorithms and DSA.', 'To master the art of competitive programming.', 'Dr. Raja Lavanya,Assistant Professor,CSE', 'rlit@tce.edu', 'staff_photos/PWSJP6SSFGoTCPWBFM4LSJoZ3fF36tQXCGvhy0pz.webp', 2018, NULL, '2025-07-20 14:19:58', 5),
(14, 'Ascenders-EEE Aerial Vehicle Club', 'technical', 'club_logos/c8nH7qRAxM8gInC8l35KOZAaEMwRlwjOVMQEhnmp.png', 'Rise and evolve together.', 'To build leadership and career readiness.', 'Dr. R. Rajan Prakash,Associate Professor,EEE', 'r_rajanprakash@tce.edu', 'staff_photos/bKD7LPIBf0oP1GORCptnpppt89iGY36bM7DDKHAT.jpg', 2020, NULL, '2025-07-20 14:21:00', 3),
(17, 'Anglophile Longue', 'non-technical', 'club_logos/BfZ5kbGih4wuMvGeGFkMXoiCIEsCOTZxjEZznltD.png', 'Celebrate English language.', 'To develop public speaking and literature skills.', 'Dr. T. Arul Prakash,Associate Professor,English department', 'tapeng@tce.edu', 'staff_photos/jiDSdj8FqNOR9FLKrIx92zaVl0ZQ5qMVW5Wr0VTw.png', 2021, NULL, '2025-07-20 14:22:46', 13),
(19, 'Ventura', 'technical', 'club_logos/g4TtCosaFf9u1A2RhLFnB6vWlOnh233KFVA6ThKZ.png', 'Entrepreneurship development cell.', 'To turn ideas into startups.', 'Dr. R. Rajan Prakash,Associate Professor,EEE', 'r_rajanprakash@tce.edu', 'staff_photos/ldwofIs8IkRdrGG8pRfzxzK8SLOYiROzlxxJaBs6.jpg', 2018, NULL, '2025-07-20 14:23:25', 3),
(20, 'Innov CHEM', 'technical', 'club_logos/WoG6TkgwH6fVPaAWT7EFYEKNssirMuVU17lvwKWi.png', 'For future chemical engineers.', 'To build process understanding and safety.', 'Dr. A. J. Sunija,Assistant Professor,Departemnt of Chemistry', 'ajschem@tce.edu', 'staff_photos/IJp0Bjyo4vFM84ymygdYyMmASTihvaBRsWbubgJi.jpg', 2016, NULL, '2025-07-20 14:24:41', 12),
(22, 'Foreign language club', 'non-technical', 'club_logos/Mu0VjNoXT1aphsrZVnOZb5Ovz237ya3Yo8k5nBLF.png', 'The foreign language club is for students to learn different languages for wider oppurtunities', 'To explore languages and cultures worldwide.', 'Dr. G. Jeya Jeevakani,Assistant Professo,Department of English', 'gjjeng@tce.edu', 'staff_photos/grGwZ3knquHANPb9AHMmR3QEnZVnnElQs1fBkJaA.png', 2019, NULL, '2025-07-20 14:27:10', 13),
(23, 'Happy Hive', 'technical', 'club_logos/lXTxxHfD654GXtvwh3hswmgMWxGszzB0HqhWiCra.png', 'Your mental health buddy.', 'To promote mental well-being and happiness.', 'Ms. S. Srimathi,Assistant Professor,AMCS', 'ssids@tce.edu', 'staff_photos/d1A1sJ8Wmcl1nVWWktqM0mjTKYZMn8dM17kgRqpb.png', 2021, NULL, '2025-07-20 14:28:39', 8),
(24, 'Kernel Club', 'technical', 'club_logos/Jod4TkOQXIo1FlOiR6iRnKzhn6KD8X0JDFND5oNH.png', 'Systems and Linux lovers unite.', 'To deep dive into OS, kernel, and security.', 'Dr. D. Anitha,Associate Professor,AMCS', 'anithad@tce.edu', 'staff_photos/lGJrTOGaScfy5sgt5P14kJmAdjOULrP7B23js3Pb.png', 2018, NULL, '2025-07-20 14:29:49', 8),
(25, 'Math Club', 'technical', 'club_logos/qh0INKzh9UEqIN75vx9Tj0BMKdoHaBFmoypJGlau.png', 'Beyond numbers.', 'To build mathematical intuition and fun.', 'Dr. C. S. Senthilkumar,Assitant Proffessor,Department of Maths', 'umarstays@tce.edu', 'staff_photos/dAu1FGQheZ4ppK7phjg2vQW6I9FWEcBIrBUfI0cx.jpg', 2015, NULL, '2025-07-20 14:31:13', 14),
(26, 'Spark Club', 'technical', 'club_logos/CgvhX0B2OMfe49fNocWGWP1W9taayrNDRXpH3b4F.png', 'Where ideas spark.', 'To promote ideation and innovation.', 'Dr. V. Aravindan,Assistant Professor,Departemnt of Physics', 'vaphy@tce.edu', 'staff_photos/wAc3IFZ3IVAMx0i9uul89pXaSzuFlMGdVCOro8fs.png', 2020, NULL, '2025-07-20 14:32:31', 11),
(27, 'TECHXPLORERS', 'technical', 'club_logos/eb43zxHJ7EziFG5yyUQ7EfTtyOh2QYP0mxKYj3Q6.png', 'Exploring tech beyond textbooks.', 'To explore, build, and break technology barriers.', 'Mr. M. Gowtham Sethupathi,Assistant Professor,CSBS', 'mgsca@tce.edu', 'staff_photos/5g5jDdCcn8fBKEwnD9yeP7fKkzoMvLYdrWAZPurJ.jpg', 2021, NULL, '2025-07-20 14:33:37', 10),
(35, 'AI Consortium', 'technical', 'club_logos/PirrXIOV1lS7XgfsSB4maYzXQ5hrPz4NYg7xUVLd.jpg', 'AI Consortium is a student-driven club dedicated to exploring the world of Artificial Intelligence and Machine Learning. We bring together enthusiasts, innovators, and learners to build, share, and grow in the rapidly evolving AI ecosystem.', 'To empower students with knowledge, hands-on experience, and a collaborative platform to innovate and apply AI for real-world impact.', 'K.V.Uma,Associate Professor,IT', 'kvuit@tce.edu', 'staff_photos/6yyQcqTx5miTwTH096rxPfgUCrwtZUScGJ2H7jTb.jpg', 2025, '2025-07-15 05:05:59', '2025-07-20 14:11:50', 4),
(36, 'Drone Club', 'technical', NULL, 'The Drone Club explores the exciting world of UAVs, fostering innovation in aerial technology and applications.', 'To equip students with hands-on drone experience and promote research, creativity, and responsible flying practices.', 'Dr. M. Rajalakshmi,Assistant Professor,Mechatronics', 'mrimect@tce.edu', NULL, 2021, NULL, NULL, 7),
(37, 'School of Thoughts', 'technical', NULL, 'A hub for creative minds to explore architecture and design thinking.\r\n', 'To inspire innovation and collaboration in architectural expressio', 'Mr.M.Vishal,Assistant Professor,ARCH\r\n', 'mvlarch@tce.edu\r\n\r\n', NULL, 2020, NULL, NULL, 9),
(38, 'Sustainable Development Goals', 'technical', NULL, NULL, NULL, 'Dr. A. Ramalinga Chandra Sekar,Assistant Professor,Chemistry', 'arcchem@tce.edu', NULL, 2019, NULL, NULL, 12),
(39, 'HAM club', 'technical', NULL, NULL, NULL, 'Dr. G. Ananthi,Associate Professor,ECE', 'gananthi@tce.edu', NULL, 2019, NULL, NULL, 6),
(40, 'Electronic Hardware club', 'technical', NULL, NULL, NULL, 'Dr. M. Senthilarasi,Assistant Professor,ECE', 'msiece@tce.edu', NULL, 2018, NULL, NULL, 6),
(41, 'All About Art', 'non-technical', NULL, NULL, NULL, 'Mr.M.Vishal,Assistant Professor,ARCH', ' mvlarch@tce.edu\r\n\r\n', NULL, 2021, NULL, NULL, 9),
(42, 'Always on Trend', 'non-technical', NULL, NULL, NULL, 'Mr.M.Vishal, Assitant Professor,ARCH', 'mvlarch@tce.edu\r\n\r\n', NULL, 2019, NULL, NULL, 9),
(43, 'Cinemates', 'non-technical', NULL, NULL, NULL, 'Mr.M.Vishal,Assistant Professor,ARCH', 'mvlarch@tce.edu\r\n\r\n', NULL, 2018, NULL, NULL, 9),
(44, 'Literary Society', 'non-technical', NULL, NULL, NULL, 'Mr.M.Vishal,Assistant Professor,ARCH', ' mvlarch@tce.edu\r\n\r\n', NULL, 2020, NULL, NULL, 9),
(45, 'SADAS - The Debate Club of TCE', 'non-technical', NULL, NULL, NULL, 'Dr. S. Karthikeyan,Professor (CAS),MECH', ' skarthikeyanlme@tce.edu', NULL, 2020, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `club_registration`
--

CREATE TABLE `club_registration` (
  `id` bigint(20) NOT NULL,
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club_registration`
--

INSERT INTO `club_registration` (`id`, `registration_id`, `club_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-06-22 06:03:56', '2025-06-22 06:03:56'),
(2, 2, 1, '2025-06-22 06:08:38', '2025-06-22 06:08:38'),
(4, 4, 1, '2025-06-22 06:20:06', '2025-06-22 06:20:06'),
(5, 5, 1, '2025-06-22 06:27:25', '2025-06-22 06:27:25'),
(6, 6, 5, '2025-06-22 06:33:10', '2025-06-22 06:33:10'),
(7, 6, 6, '2025-06-22 06:33:10', '2025-06-22 06:33:10'),
(8, 6, 11, '2025-06-22 06:33:10', '2025-06-22 06:33:10'),
(9, 7, 1, '2025-06-22 23:34:21', '2025-06-22 23:34:21'),
(10, 7, 4, '2025-06-22 23:34:21', '2025-06-22 23:34:21'),
(11, 7, 7, '2025-06-22 23:34:21', '2025-06-22 23:34:21'),
(12, 8, 8, '2025-06-23 01:09:36', '2025-06-23 01:09:36'),
(13, 8, 12, '2025-06-23 01:09:36', '2025-06-23 01:09:36'),
(14, 8, 14, '2025-06-23 01:09:36', '2025-06-23 01:09:36'),
(15, 9, 3, '2025-06-24 08:06:46', '2025-06-24 08:06:46'),
(16, 9, 6, '2025-06-24 08:06:46', '2025-06-24 08:06:46'),
(17, 9, 7, '2025-06-24 08:06:46', '2025-06-24 08:06:46'),
(18, 10, 1, '2025-06-24 08:18:02', '2025-06-24 08:18:02'),
(19, 10, 4, '2025-06-24 08:18:02', '2025-06-24 08:18:02'),
(20, 10, 8, '2025-06-24 08:18:02', '2025-06-24 08:18:02'),
(21, 11, 1, '2025-06-24 08:26:22', '2025-06-24 08:26:22'),
(22, 11, 6, '2025-06-24 08:26:22', '2025-06-24 08:26:22'),
(23, 11, 8, '2025-06-24 08:26:22', '2025-06-24 08:26:22'),
(24, 12, 3, '2025-06-24 08:49:31', '2025-06-24 08:49:31'),
(25, 12, 7, '2025-06-24 08:49:31', '2025-06-24 08:49:31'),
(27, 13, 1, '2025-07-03 12:40:32', '2025-07-03 12:40:32'),
(28, 13, 3, '2025-07-03 12:40:32', '2025-07-03 12:40:32'),
(29, 13, 7, '2025-07-03 12:40:32', '2025-07-03 12:40:32'),
(30, 14, 1, '2025-07-04 05:03:29', '2025-07-04 05:03:29'),
(31, 14, 6, '2025-07-04 05:03:29', '2025-07-04 05:03:29'),
(32, 14, 8, '2025-07-04 05:03:29', '2025-07-04 05:03:29'),
(33, 15, 1, '2025-07-07 23:17:07', '2025-07-07 23:17:07'),
(34, 15, 4, '2025-07-07 23:17:07', '2025-07-07 23:17:07'),
(35, 15, 8, '2025-07-07 23:17:07', '2025-07-07 23:17:07'),
(36, 16, 35, '2025-07-15 13:23:56', '2025-07-15 13:23:56'),
(37, 17, 14, '2025-07-18 10:37:12', '2025-07-18 10:37:12'),
(39, 18, 1, '2025-07-18 10:40:07', '2025-07-18 10:40:07'),
(40, 18, 17, '2025-07-18 10:40:07', '2025-07-18 10:40:07'),
(42, 19, 35, '2025-07-18 10:44:09', '2025-07-18 10:44:09'),
(44, 20, 24, '2025-07-18 11:01:10', '2025-07-18 11:01:10'),
(82, 39, 8, '2025-07-20 04:34:58', '2025-07-20 04:34:58'),
(83, 39, 39, '2025-07-20 04:34:58', '2025-07-20 04:34:58'),
(84, 39, 41, '2025-07-20 04:34:58', '2025-07-20 04:34:58'),
(85, 40, 25, '2025-07-20 04:37:58', '2025-07-20 04:37:58'),
(87, 40, 22, '2025-07-20 04:37:58', '2025-07-20 04:37:58'),
(88, 41, 5, '2025-07-20 04:40:40', '2025-07-20 04:40:40'),
(89, 41, 26, '2025-07-20 04:40:40', '2025-07-20 04:40:40'),
(90, 41, 17, '2025-07-20 04:40:40', '2025-07-20 04:40:40'),
(112, 50, 7, '2025-07-20 05:52:25', '2025-07-20 05:52:25'),
(113, 50, 36, '2025-07-20 05:52:25', '2025-07-20 05:52:25'),
(114, 50, 41, '2025-07-20 05:52:25', '2025-07-20 05:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(15, 'AIML'),
(8, 'AMCS'),
(9, 'ARCH'),
(12, 'CHEMISTRY'),
(1, 'CIVIL'),
(10, 'CSBS'),
(5, 'CSE'),
(6, 'ECE'),
(3, 'EEE'),
(13, 'ENGLISH'),
(4, 'IT'),
(14, 'MATHS'),
(2, 'MECH'),
(7, 'MECT'),
(11, 'PHYSICS');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `chief_guest` varchar(255) DEFAULT 'NA',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `participants` int(11) DEFAULT NULL,
  `coordinators` int(11) DEFAULT NULL,
  `best_performance` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gallery` text DEFAULT NULL,
  `winner_name` varchar(100) DEFAULT NULL,
  `winner_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `club_id`, `event_name`, `description`, `chief_guest`, `start_date`, `end_date`, `start_time`, `end_time`, `participants`, `coordinators`, `best_performance`, `date`, `time`, `image_path`, `created_at`, `updated_at`, `gallery`, `winner_name`, `winner_photo`) VALUES
(6, 1, 'sensors hunts', 'decode that sensor', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-24', '15:30:00', 'event_images/QdMdXttjzUyrZP35Cxl88KWHTRxd52ET7lLKOJHi.png', '2025-06-22 01:11:38', '2025-07-03 23:32:17', NULL, NULL, NULL),
(8, 6, 'Invent New', 'Idea pitching event', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-10', '09:30:00', 'event_images/fF0DgtGgOlbCK7Mx0WNrWFwKlfrviywsh3LnpQW0.jpg', '2025-06-22 09:29:42', '2025-06-24 08:09:32', NULL, NULL, NULL),
(9, 3, 'App Mentor', 'Create new apps', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-03', '16:30:00', 'event_images/9WJYHcvyBEjyZkUgnk4jE7Q2DVrjk04l5nyC60DJ.png', '2025-06-22 09:55:31', '2025-06-24 11:34:03', NULL, NULL, NULL),
(10, 4, 'Field visit', 'School children interaction', 'hari', '2025-06-13', '2025-06-14', '15:30:00', '16:00:00', 15, 5, 0, '2025-06-04', '17:56:00', 'event_images/4FWGVuPgsT4DKPjj49qsdJNexeyp2LbAfiKXxLkN.png', '2025-06-22 10:03:41', '2025-07-20 15:43:04', NULL, NULL, NULL),
(11, 7, 'CodeFest', 'Coding in C program', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-07', '13:25:00', 'event_images/IkJ6ANX0JcKLOawDa8PQQAkcTxB6W2sIcJP4D1db.png', '2025-06-22 11:01:36', '2025-07-17 02:23:34', '[\"event_gallery\\/Gj99BdyaD544Dcw8N6hZPY1mz2jBl2U1vl1dFCVc.jpg\",\"event_gallery\\/81k3ucCERJgYzjjQx7jcadgkl8mDwlZUPoT5pXRZ.jpg\",\"event_gallery\\/6qFbzXBDhJ0FLZqDurSGIwBZSZBnY2kgpIMogvVk.jpg\",\"event_gallery\\/9IbIEqvIEK1sbeyI7ZhTU4oCu4hGp1q7N1qF1GrO.jpg\"]', NULL, NULL),
(12, 7, 'Hackfest', 'Coding in hackerrank', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-27', '14:00:00', 'event_images/nu7dKeThHRiVL6kDhpZBkeJ5pvfEtce0uaQffJsm.png', '2025-06-22 11:02:18', '2025-06-24 11:35:19', NULL, NULL, NULL),
(13, 4, 'Crime Scene', 'Identify the murderer using clues', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-12', '17:08:00', 'event_images/7qj9TqOYljGzwSQIOhRHSVxZTdL3MN5sdE2LyySo.png', '2025-06-22 11:03:24', '2025-06-24 11:34:34', NULL, NULL, NULL),
(16, 3, 'dfdfdf', 'fdadaewrewr', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-12', '15:44:00', 'event_images/GIdkGjGULper3rw6SyHlQJNjQvyxpUfDA5Vn9H1D.png', '2025-06-24 04:44:29', '2025-06-24 04:44:29', NULL, NULL, NULL),
(18, 1, 'Connexions', 'Connect things and find out !', 'NA', '2025-05-09', '2025-05-09', '15:00:00', '17:30:00', 40, 4, 2, '2025-07-04', '12:51:00', 'event_images/pdwvks8MbOziKn0CKMrY6jYjRLjV35bgJoSdCe3Z.png', '2025-06-24 08:46:06', '2025-07-20 15:27:36', NULL, NULL, NULL),
(19, 35, 'AI week celebration', 'Organized by the AI Consortium, this 5-day power-packed event will take you through the exciting world of Artificial Intelligence — from real-world applications to futuristic innovations!', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-14', '15:30:00', 'event_images/mOtKKDCLvdpNXsk4U8WKZliMTtRIzaHcIXYJM52W.jpg', '2025-07-15 05:11:30', '2025-07-15 05:43:29', '[\"event_gallery\\/0NcQukwqTK7s4qQsLw3YdURjEA70p7WAbA4yqfC9.jpg\"]', NULL, NULL),
(20, 35, 'AI Sprint', 'A hands-on In-Lab Internship Opportunity designed for II- and III-year students.\r\n Explore Real-World AI Solutions Across These Key Domains:\r\n MediVision,Decoding Bharat ,Business Minds 2.0, Beyond Tomorrow ,AI Illuminates .', 'NA', '2025-06-02', '2025-06-13', '09:30:00', '16:30:00', 167, 10, 3, '2025-06-02', '09:30:00', 'event_images/lFPL7kvNdKFpsQ6tQgI2825oB0tw6Xbo3JN4cFSC.jpg', '2025-07-15 05:49:31', '2025-07-17 08:54:26', '[\"event_gallery\\/c77lusBueKU0bho8CshS7bv64wi42HXZKy6tQDYo.jpg\",\"event_gallery\\/lE70XNzbZxSl4AZzj5LWQHSTtAPiuW5wK5MMnxyl.jpg\",\"event_gallery\\/QuhVGspqgdcRglkiRCkjMhx1nD61vvYsog3Kop7l.jpg\",\"event_gallery\\/TRAdCa9JNVwvwwK0s2kXPUB7fhEJe0FLr1uhDv54.jpg\"]', NULL, NULL),
(21, 35, 'Inauguration of AI consortium-  Gen AI in Action', 'The AI Consortium was inaugurated to bring together experts, students, and institutions in the field of Artificial Intelligence.It aims to promote collaboration, research, and innovation in AI technologies.', 'Dr.Suresh Rajappa ,Ph.D.MBA ,Global data leader, KPMG dallas,US', '2025-04-02', '2025-04-02', '10:00:00', '12:00:00', 30, 5, 0, '2025-04-02', '10:00:00', 'event_images/UCpS2pSfO6gKjUTpxToq5Q1ktefmlPMAiGdb1zQZ.jpg', '2025-07-15 12:22:52', '2025-07-20 15:47:43', '[\"event_gallery\\/UMfixJteKyXJSm99mVlqMDSkmld3Llhpsc6H2ObX.jpg\",\"event_gallery\\/AToOxLR26FmnAjLL0hDgAbsbaYe54DL0LrJ4391o.jpg\",\"event_gallery\\/sFJNydYFxf150QFhg2uwlkUAtuv88JJ36Q8qHMIV.jpg\",\"event_gallery\\/6hv2yla5jVe3yCSfLzwjyBlUHaZZ6qK1SaJjnBNv.jpg\"]', NULL, NULL),
(22, 35, 'CRAFT THE CORE – Logo Design Contest', 'Unleash your creativity and design a logo that reflects the core themes of Innovation ,Education and AI Technology.', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-20', '06:00:00', 'event_images/qFp4MydHybOdjNzNIWSXpg1t89NjUe5pIl9bQg7b.jpg', '2025-07-15 12:31:19', '2025-07-15 12:31:19', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_20_140631_create_clubs_table', 1),
(5, '2025_06_20_142828_create_student_coordinators_table', 1),
(6, '2025_06_21_052824_add_logo_to_clubs_table', 1),
(7, '2025_07_19_151409_add_category_to_clubs_table', 2),
(8, '2025_07_20_154250_add_department_id_to_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `roll_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `name`, `roll_no`, `email`, `department`, `created_at`, `updated_at`, `gender`) VALUES
(1, 'Aburvaa', '660423', 'aburvaasenthilkumarias@gmail.com', 'IT', '2025-06-22 06:03:56', '2025-07-18 15:04:43', 'female'),
(2, 'Kiruthika', '789330', 'kiru@gmail.com', 'IT', '2025-06-22 06:08:38', '2025-07-18 15:06:10', 'female'),
(4, 'Varshini', '373290', 'vars@gmail.com', 'ECE', '2025-06-22 06:20:06', '2025-07-18 15:06:10', 'female'),
(5, 'Harshini', '445321', 'harsh@gmail.com', 'AI-ML', '2025-06-22 06:27:25', '2025-07-18 15:06:10', 'female'),
(6, 'Ganga', '334223', 'ganga@gmail.com', 'ROBOTICS', '2025-06-22 06:33:10', '2025-07-18 15:06:10', 'female'),
(7, 'Kaviya', '532133', 'kaviya@gmail.com', 'IT', '2025-06-22 23:34:21', '2025-07-18 15:06:10', 'female'),
(8, 'hari', '987665', 'hari@gmail.com', 'CSE', '2025-06-23 01:09:36', '2025-07-18 15:07:45', 'female'),
(9, 'Dharshan', '342413', 'dharsh@gmail.com', 'CIVIL', '2025-06-24 08:06:46', '2025-07-18 16:21:56', 'male'),
(10, 'Abinaya', '654221', 'abi@gmail.com', 'CSE', '2025-06-24 08:18:02', '2025-07-18 15:06:10', 'female'),
(11, 'Abinaya Sri', '654223', 'abinaya@gmail.com', 'ECE', '2025-06-24 08:26:22', '2025-07-18 15:05:18', 'female'),
(12, 'Senthil', '776543', 'senthil@gmail.com', 'EEE', '2025-06-24 08:49:31', '2025-07-18 16:21:56', 'male'),
(13, 'VARSHINI C', '660792', 'cvarshini@student.tce.edu', 'IT', '2025-07-03 12:40:32', '2025-07-18 15:05:52', 'female'),
(14, 'janani', '342116', 'jan@gmail.com', 'ECE', '2025-07-04 05:03:29', '2025-07-18 15:06:10', 'female'),
(15, 'Jeyaram', '556789', 'jeyaram@gmail.com', 'ECE', '2025-07-07 23:17:07', '2025-07-18 16:21:56', 'male'),
(16, 'harshini jg', '660100', 'jghar@gmail.com', 'IT', '2025-07-15 13:23:56', '2025-07-18 15:06:10', 'female'),
(17, 'Ganesh', '667899', 'ganesh@gmail.com', 'MECT', '2025-07-18 10:37:12', '2025-07-18 16:21:56', 'male'),
(18, 'Aravind', '678921', 'ara@gmail.com', 'CSBS', '2025-07-18 10:40:07', '2025-07-18 16:21:34', 'male'),
(19, 'Goutham', '678095', 'goutham@gmail.com', 'DS', '2025-07-18 10:44:09', '2025-07-18 16:21:56', 'male'),
(20, 'Harish', '678905', 'har@gmail.com', 'ARCH', '2025-07-18 11:01:10', '2025-07-18 11:01:10', 'Male'),
(39, 'Mai', '661112', 'mai@gmail.com', 'CSE', '2025-07-19 23:04:58', '2025-07-19 23:04:58', 'Female'),
(40, 'sss', '660789', 'sss@gmail.com', 'EEE', '2025-07-19 23:07:58', '2025-07-19 23:07:58', 'Male'),
(41, 'jjj', '660786', 'jjj@gmail.com', 'CIVIL', '2025-07-19 23:10:40', '2025-07-19 23:10:40', 'Male'),
(50, 'Nikitha', '660718', 'nikithaa@student.tce.edu', 'AI-ML', '2025-07-20 00:22:24', '2025-07-20 00:22:24', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ik1oW51HZPLr8XWKcLX1LAPGlimkakZrOY7ysETZ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYXVFNE5lN1BCeDRxVUR5VE5yRXFxbzNxS0ZJa1RMWFFheE9pT2dDbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90Y2Uvc3VwZXJhZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1753046381);

-- --------------------------------------------------------

--
-- Table structure for table `student_coordinators`
--

CREATE TABLE `student_coordinators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_coordinators`
--

INSERT INTO `student_coordinators` (`id`, `club_id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Varshini C , IT, III year', 'student_photos/hiRL8wUuj1O5h3Prm2NMXXB5aWltZKhhMvRlGlgB.jpg', '2025-06-21 00:31:40', '2025-07-20 14:54:02'),
(2, 1, 'Kiruthika B, IT , III year', 'student_photos/DKmmEzvZGHH4Sw1bMWYE4M1IoiCRQGAg48kpAhoZ.jpg', '2025-06-22 04:02:15', '2025-07-20 14:54:02'),
(3, 3, 'Nikitha A S , IT , III year', '', '2025-06-22 04:03:13', '2025-07-03 22:51:23'),
(4, 35, 'R. Vimitha , CSBS , III year', 'student_photos/RPY3CSHDIrIEDRQ6mmcGWFFe4cBIPSjPTDmeLhbd.png', '2025-07-15 05:06:46', '2025-07-15 05:06:46'),
(5, 7, 'Aburvaa A S , ECE , III year', NULL, '2025-07-20 14:57:57', '2025-07-20 14:57:57'),
(6, 4, 'Harshini JG, CSE,III year', NULL, '2025-07-20 14:58:42', '2025-07-20 14:58:42'),
(7, 5, 'Janani S, MECH,III year', NULL, '2025-07-20 14:58:53', '2025-07-20 14:58:53'),
(8, 6, 'Harini ,MECH , III year', NULL, '2025-07-20 14:59:29', '2025-07-20 14:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `club_id`, `department_id`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$7jM1YdJZ1WjVpU48YrlXE.Q1f2hRVL8S/JvIS/Q/JNz7oQn9V2Tji', NULL, '2025-07-03 18:32:28', '2025-07-03 18:32:28', 'super_admin', NULL, NULL),
(2, 'Club A Admin', 'cluba@example.com', NULL, '$2y$12$Si5Zj.7yfVwKr24HFEqGA.TV1n8QjzxrxEupbY8ziNC5VDxO9wXri', NULL, '2025-07-15 10:10:42', '2025-07-15 10:10:42', 'club_admin', 1, NULL),
(3, 'Coders Club Admin', 'coders@example.com', NULL, '$2y$12$jZBkxyKpTGAEWqYEaRSdh.b7Ev14y/Po4L4pSftlavpvCOcTSsqse', NULL, '2025-07-15 10:14:46', '2025-07-15 10:14:46', 'club_admin', 7, NULL),
(5, 'Deisy', 'deisy@tce.edu', NULL, '$2y$12$kgOgS9uVK0KBfd4XEYK7beWjyWSySX87XGwStIccztBYuddHPPKxS', NULL, '2025-07-20 10:31:05', '2025-07-20 10:31:05', 'hod', NULL, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clubs_department` (`department_id`);

--
-- Indexes for table `club_registration`
--
ALTER TABLE `club_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registration_id` (`registration_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_club_id_foreign` (`club_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll_no` (`roll_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_coordinators`
--
ALTER TABLE `student_coordinators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_coordinators_club_id_foreign` (`club_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `club_registration`
--
ALTER TABLE `club_registration`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `student_coordinators`
--
ALTER TABLE `student_coordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `fk_clubs_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `club_registration`
--
ALTER TABLE `club_registration`
  ADD CONSTRAINT `club_registration_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `club_registration_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_coordinators`
--
ALTER TABLE `student_coordinators`
  ADD CONSTRAINT `student_coordinators_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
