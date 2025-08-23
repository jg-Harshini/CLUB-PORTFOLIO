-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2025 at 10:43 AM
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
-- Database: `club_portfolio`
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
  `department_id` int(11) DEFAULT NULL,
  `staff_coordinator2_name` varchar(255) DEFAULT NULL,
  `staff_coordinator2_email` varchar(255) DEFAULT NULL,
  `staff_coordinator2_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `category`, `logo`, `introduction`, `mission`, `staff_coordinator_name`, `staff_coordinator_email`, `staff_coordinator_photo`, `year_started`, `created_at`, `updated_at`, `department_id`, `staff_coordinator2_name`, `staff_coordinator2_email`, `staff_coordinator2_photo`) VALUES
(1, 'IoT', 'technical', 'club_logos/N9yXe9zUvInJTFuelHpmDvHIHNYnkcKYlArOTjFA.png', 'The IoT Club centers around the Internet of Things and its industrial and societal applications. The club promotes sensor-based innovations, smart home prototypes, and real-time monitoring projects. Its social contributions include community automation projects such as smart irrigation and energy-saving devices.', 'To empower students with hands-on skills in the Internet of Things by fostering innovation, collaboration, and real-world problem solving through workshops, projects engagement.', 'Mrs.C.V.Nisha Angeline ,Assistant Professor,IT', 'nishaangeline@gmail.com', 'staff_photos/XQuk1WT10PVx3l79sGvCN5WQ6uuVHJr4y5NTBR7p.jpg', 2012, '2025-06-21 00:31:40', '2025-08-21 10:55:35', 4, NULL, NULL, NULL),
(3, 'App Development', 'technical', 'club_logos/6GIs6qsVaTJGN3XyHsfTwZTyN6XkDvwNpOwfb7Gr.png', 'Empowers students to build Android & iOS apps.', 'To create apps that solve real-world problems.', 'Mrs.C.V.Nisha Angeline ,Assistant Professor,IT', 'nishaangeline@gmail.com', 'staff_photos/h0VOelCTr2OkUrLADPIzpgSCyPNz3aHudA1vF0OB.jpg', 2019, NULL, '2025-08-21 05:05:28', 4, NULL, NULL, NULL),
(4, 'AR/VR', 'technical', 'club_logos/xuZU6zm2uCvwEfPtLJ1iEP7aw5yJeSgiWKf1tK2n.png', 'Dive into augmented and virtual reality tech.', 'To enhance interaction through immersive tech.', 'Dr. N. Shivakumar,Assistant Professor,CSE', 'shiva@tce.edu', 'staff_photos/kps141dzoWPce6kDLRqtg95KSB0PruYr8AaKfzxM.jpg', 2020, NULL, '2025-08-21 05:07:54', 5, NULL, NULL, NULL),
(7, 'Coders Club', 'technical', 'club_logos/LOWxyQurYkz862KaXDXQar4SvT2RA8K6Y2b7TwEx.png', 'For those who love to code.', 'To empower students through problem solving and programming.', 'Dr. A. M. Abirami,Professor,IT', 'abiramiam@tce.edu', 'staff_photos/kRQtIkRGSRglmpEot3kY523pTN1otQ18qrIloijw.jpg', 2015, NULL, '2025-08-21 04:58:32', 4, 'Dr. P. Karthikeyan, Professor, IT', 'karthikit@tce.edu', 'staff_photos/bxTxhJKHhtEhUP17sZnC3Lgin3uRNNf0uv5l6kpC.jpg'),
(8, 'Ekalayva', 'technical', 'club_logos/VsAihPvNKsBxP3hkE67ps3tXswsWcxro1v5RpdnM.png', 'Self-learning is our strength.', 'To promote independent learning through projects.', 'Dr. R. Rajan Prakash,Associate Professor,EEE', 'r_rajanprakash@tce.edu', 'staff_photos/ypLyMvtiO5NGZO5dqzMPJI10Zjol2jgWDqKRwxF4.jpg', 2020, NULL, '2025-07-20 14:17:31', 3, NULL, NULL, NULL),
(12, 'Algo Geeks', 'technical', 'club_logos/YFWkACMopbTlxvwWbVGODPBY79SlTRuznz6bDo4N.png', 'Love for algorithms and DSA.', 'To master the art of competitive programming.', 'Dr. Raja Lavanya,Assistant Professor,CSE', 'rlit@tce.edu', 'staff_photos/PWSJP6SSFGoTCPWBFM4LSJoZ3fF36tQXCGvhy0pz.webp', 2018, NULL, '2025-07-20 14:19:58', 5, NULL, NULL, NULL),
(14, 'Ascenders-EEE Aerial Vehicle Club', 'technical', 'club_logos/c8nH7qRAxM8gInC8l35KOZAaEMwRlwjOVMQEhnmp.png', 'Rise and evolve together.', 'To build leadership and career readiness.', 'Dr. R. Rajan Prakash,Associate Professor,EEE', 'r_rajanprakash@tce.edu', 'staff_photos/bKD7LPIBf0oP1GORCptnpppt89iGY36bM7DDKHAT.jpg', 2020, NULL, '2025-07-20 14:21:00', 3, NULL, NULL, NULL),
(17, 'Anglophile Longue', 'non-technical', 'club_logos/BfZ5kbGih4wuMvGeGFkMXoiCIEsCOTZxjEZznltD.png', 'Celebrate English language.', 'To develop public speaking and literature skills.', 'Dr. T. Arul Prakash,Associate Professor,English department', 'tapeng@tce.edu', 'staff_photos/jiDSdj8FqNOR9FLKrIx92zaVl0ZQ5qMVW5Wr0VTw.png', 2021, NULL, '2025-07-20 14:22:46', 13, NULL, NULL, NULL),
(19, 'Ventura', 'technical', 'club_logos/g4TtCosaFf9u1A2RhLFnB6vWlOnh233KFVA6ThKZ.png', 'Entrepreneurship development cell.', 'To turn ideas into startups.', 'Dr. R. Rajan Prakash,Associate Professor,EEE', 'r_rajanprakash@tce.edu', 'staff_photos/ldwofIs8IkRdrGG8pRfzxzK8SLOYiROzlxxJaBs6.jpg', 2018, NULL, '2025-07-20 14:23:25', 3, NULL, NULL, NULL),
(20, 'Innov CHEM', 'technical', 'club_logos/WoG6TkgwH6fVPaAWT7EFYEKNssirMuVU17lvwKWi.png', 'For future chemical engineers.', 'To build process understanding and safety.', 'Dr. A. J. Sunija,Assistant Professor,Departemnt of Chemistry', 'ajschem@tce.edu', 'staff_photos/IJp0Bjyo4vFM84ymygdYyMmASTihvaBRsWbubgJi.jpg', 2016, NULL, '2025-07-20 14:24:41', 12, NULL, NULL, NULL),
(22, 'Foreign language club', 'non-technical', 'club_logos/Mu0VjNoXT1aphsrZVnOZb5Ovz237ya3Yo8k5nBLF.png', 'The foreign language club is for students to learn different languages for wider oppurtunities', 'To explore languages and cultures worldwide.', 'Dr. G. Jeya Jeevakani,Assistant Professo,Department of English', 'gjjeng@tce.edu', 'staff_photos/grGwZ3knquHANPb9AHMmR3QEnZVnnElQs1fBkJaA.png', 2019, NULL, '2025-07-20 14:27:10', 13, NULL, NULL, NULL),
(23, 'Happy Hive', 'technical', 'club_logos/lXTxxHfD654GXtvwh3hswmgMWxGszzB0HqhWiCra.png', 'Your mental health buddy.', 'To promote mental well-being and happiness.', 'Ms. S. Srimathi,Assistant Professor,AMCS', 'ssids@tce.edu', 'staff_photos/d1A1sJ8Wmcl1nVWWktqM0mjTKYZMn8dM17kgRqpb.png', 2021, NULL, '2025-07-20 14:28:39', 8, NULL, NULL, NULL),
(24, 'Kernel Club', 'technical', 'club_logos/Jod4TkOQXIo1FlOiR6iRnKzhn6KD8X0JDFND5oNH.png', 'Systems and Linux lovers unite.', 'To deep dive into OS, kernel, and security.', 'Dr. D. Anitha,Associate Professor,AMCS', 'anithad@tce.edu', 'staff_photos/lGJrTOGaScfy5sgt5P14kJmAdjOULrP7B23js3Pb.png', 2018, NULL, '2025-07-20 14:29:49', 8, NULL, NULL, NULL),
(25, 'Math Club', 'technical', 'club_logos/qh0INKzh9UEqIN75vx9Tj0BMKdoHaBFmoypJGlau.png', 'Beyond numbers.', 'To build mathematical intuition and fun.', 'Dr. C. S. Senthilkumar,Assitant Proffessor,Department of Maths', 'umarstays@tce.edu', 'staff_photos/dAu1FGQheZ4ppK7phjg2vQW6I9FWEcBIrBUfI0cx.jpg', 2015, NULL, '2025-07-20 14:31:13', 14, NULL, NULL, NULL),
(27, 'TECHXPLORERS', 'technical', 'club_logos/eb43zxHJ7EziFG5yyUQ7EfTtyOh2QYP0mxKYj3Q6.png', 'Exploring tech beyond textbooks.', 'To explore, build, and break technology barriers.', 'Mr. M. Gowtham Sethupathi,Assistant Professor,CSBS', 'mgsca@tce.edu', 'staff_photos/5g5jDdCcn8fBKEwnD9yeP7fKkzoMvLYdrWAZPurJ.jpg', 2021, NULL, '2025-07-20 14:33:37', 10, NULL, NULL, NULL),
(35, 'AI Consortium', 'technical', 'club_logos/nQwGjKOTwUHi9b7Tr3H4Y1lzjJzT3y4GLnpXzqxz.png', 'AI Consortium is a student-driven club dedicated to exploring the world of Artificial Intelligence and Machine Learning. We bring together enthusiasts, innovators, and learners to build, share, and grow in the rapidly evolving AI ecosystem.', 'To empower students with knowledge, hands-on experience, and a collaborative platform to innovate and apply AI for real-world impact.', 'K.V.Uma,Associate Professor,IT', 'kvuit@tce.edu', 'staff_photos/t0grywGMfFonj5gOKRNgdowhLPNOMtOQofF9tMPr.jpg', 2025, '2025-07-15 05:05:59', '2025-08-21 10:56:22', 4, 'Mrs. A. Indirani, Assistant Professor, IT', 'aiica@tce.edu', 'staff_photos/it0Zc54JxLd6N1LQ1XTUdHrKsJjDzJ3NG8A33sne.jpg'),
(36, 'Drone Club', 'technical', NULL, 'The Drone Club explores the exciting world of UAVs, fostering innovation in aerial technology and applications.', 'To equip students with hands-on drone experience and promote research, creativity, and responsible flying practices.', 'Dr. M. Rajalakshmi,Assistant Professor,Mechatronics', 'mrimect@tce.edu', NULL, 2021, NULL, NULL, 7, NULL, NULL, NULL),
(37, 'School of Thoughts', 'technical', NULL, 'A hub for creative minds to explore architecture and design thinking.\r\n', 'To inspire innovation and collaboration in architectural expressio', 'Mr.M.Vishal,Assistant Professor,ARCH\r\n', 'mvlarch@tce.edu\r\n\r\n', NULL, 2020, NULL, NULL, 9, NULL, NULL, NULL),
(38, 'Sustainable Development Goals', 'technical', NULL, NULL, NULL, 'Dr. A. Ramalinga Chandra Sekar,Assistant Professor,Chemistry', 'arcchem@tce.edu', NULL, 2019, NULL, NULL, 12, NULL, NULL, NULL),
(39, 'HAM club', 'technical', NULL, NULL, NULL, 'Dr. G. Ananthi,Associate Professor,ECE', 'gananthi@tce.edu', NULL, 2019, NULL, NULL, 6, NULL, NULL, NULL),
(40, 'Electronic Hardware club', 'technical', NULL, NULL, NULL, 'Dr. M. Senthilarasi,Assistant Professor,ECE', 'msiece@tce.edu', NULL, 2018, NULL, NULL, 6, NULL, NULL, NULL),
(41, 'All About Art', 'non-technical', NULL, NULL, NULL, 'Mr.M.Vishal,Assistant Professor,ARCH', ' mvlarch@tce.edu\r\n\r\n', NULL, 2021, NULL, NULL, 9, NULL, NULL, NULL),
(42, 'Always on Trend', 'non-technical', NULL, NULL, NULL, 'Mr.M.Vishal, Assitant Professor,ARCH', 'mvlarch@tce.edu\r\n\r\n', NULL, 2019, NULL, NULL, 9, NULL, NULL, NULL),
(43, 'Cinemates', 'non-technical', NULL, NULL, NULL, 'Mr.M.Vishal,Assistant Professor,ARCH', 'mvlarch@tce.edu\r\n\r\n', NULL, 2018, NULL, NULL, 9, NULL, NULL, NULL),
(44, 'Literary Society', 'non-technical', NULL, NULL, NULL, 'Mr.M.Vishal,Assistant Professor,ARCH', ' mvlarch@tce.edu\r\n\r\n', NULL, 2020, NULL, NULL, 9, NULL, NULL, NULL),
(45, 'SADAS - The Debate Club of TCE', 'non-technical', NULL, NULL, NULL, 'Dr. S. Karthikeyan,Professor (CAS),MECH', 'skarthikeyanlme@tce.edu', NULL, 2020, NULL, '2025-08-20 19:44:54', 2, 'Dr. G. Jeya Jeevakani, Assistant Professor, Dept. of English, TCE.', 'gjjeng@tce.edu', NULL),
(48, 'TCE IP Innovators Club', 'technical', 'club_logos/QIFYmrZNAaiTj0lUoHldeTJFvT6fpq9E0tcO4tGE.png', 'The TCE IP Innovators Club is an initiative by the Department of Electronics and\r\nCommunication Engineering at Thiagarajar College of Engineering (TCE), aimed\r\nat fostering a strong culture of intellectual property (IP) awareness, innovation\r\nprotection, and patent filing among students and faculty.', 'Promotes research-to-patent transformation, guiding students\r\nthrough the entire IP lifecycle—from ideation and invention disclosure to patent\r\ndrafting and filing', 'NA', 'NA@example.com', NULL, 2025, '2025-08-20 19:27:46', '2025-08-20 19:27:46', 6, NULL, NULL, NULL),
(49, 'Vyugam', 'non-technical', 'club_logos/fs2e2kJCGtZGE9clr2OWNCqMUThGDRHNCFGgbkg6.png', 'Vyugam is our college’s youngest and most dynamic branding club, founded to\r\nbridge creativity with purpose. In just one year, we\'ve grown from a bold idea\r\ninto a thriving community, charting a clear and impactful path forward.', 'It’s a vibrant space for students passionate about design, marketing, storytelling,\r\nand fresh ideas—where imagination finds structure, and strategy fuels\r\ninnovation.', 'Dr. J. Dharani, Assistant Professor, Dept. of CSE, TCE', 'jdicse@tce.edu', 'staff_photos/WrgI0u7UvoFHV2u6Kt6HxQjfIbTf4P9NoAa8jRrN.png', 2023, '2025-08-20 19:32:30', '2025-08-20 19:32:30', 5, 'Ms. S. Sujitha, Assistant Professor, Dept. of IT, TCE', 'ssiit@tce.edu', NULL),
(50, 'Sports & Cultural Club', 'non-technical', 'club_logos/k2dBOeVjnPcpveGQweIVLrhLGQfoJxh20sgGipoF.png', 'The Sports & Culturals Club at Thiagarajar College of Engineering (TCE), under\r\nthe guidance of the Department of Architecture, is a dynamic student-driven\r\nplatform that promotes holistic development through athletic and artistic\r\nengagement.This club organizes and encourages participation in inter- and intra-college\r\nsports tournaments, cultural festivals, dance, drama, music, and visual arts.', 'Plays a vital role in nurturing talent, fostering team spirit, and creating a vibrant\r\nand inclusive campus culture through year-round events and flagship fests', 'Ar. Vishal M,Assistant Professor,Department of Architecture', 'mvlarch@tce.edu', NULL, 2020, '2025-08-20 19:35:25', '2025-08-20 19:35:25', 9, NULL, NULL, NULL),
(51, 'SAE Collegiate Club', 'non-technical', 'club_logos/iq3UvVMxZZY1yKiXn7YQBcJeGjoTCFPTRAwsdQwY.png', 'SAEINDIA Collegiate club provides a dynamic platform for students to enhance\r\ntheir technical knowledge, practical skills, and leadership abilities in the field of\r\nmobility and automotive engineering through active participation in SAEINDIA\r\nevents, workshops, and industry-driven projects. SAEINDIA student members\r\nare also entitled to many of the services available to SAEINDIA’s regular\r\nmembers.', 'To enhance technical knowledge, practical skills, and leadership abilities in the field of\r\nmobility and automotive engineering', 'Dr. B. Karthikeyan,Assistant Professor,MECH', 'bkmech@tce.edu', 'staff_photos/54e72eRzfl6q6VroPYlbpv2qkHHpAeMtehiV3jet.jpg', 2023, '2025-08-21 10:48:24', '2025-08-21 10:49:05', 2, 'Dr. B. Varun Kumar Associate Professor,Mech', 'bvkmech@tce.edu', 'staff_photos/n5phUO2C8f5fp19GQqo8YLY4Ia6na14W03C7DJ0i.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `club_registration`
--

CREATE TABLE `club_registration` (
  `id` bigint(20) NOT NULL,
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club_registration`
--

INSERT INTO `club_registration` (`id`, `registration_id`, `club_id`, `status`, `created_at`, `updated_at`) VALUES
(178, 71, 7, 'pending', '2025-08-20 10:03:27', '2025-08-20 10:03:27'),
(180, 71, 22, 'pending', '2025-08-20 10:03:27', '2025-08-20 10:03:27'),
(181, 72, 7, 'pending', '2025-08-20 10:12:13', '2025-08-20 10:12:13'),
(182, 72, 1, 'pending', '2025-08-20 10:12:13', '2025-08-20 10:12:13'),
(183, 72, 45, 'pending', '2025-08-20 10:12:13', '2025-08-20 10:12:13'),
(184, 73, 7, 'pending', '2025-08-20 10:12:15', '2025-08-20 10:12:15'),
(185, 73, 36, 'pending', '2025-08-20 10:12:15', '2025-08-20 10:12:15'),
(186, 73, 22, 'pending', '2025-08-20 10:12:15', '2025-08-20 10:12:15'),
(187, 74, 7, 'pending', '2025-08-20 10:12:44', '2025-08-20 10:12:44'),
(188, 74, 25, 'pending', '2025-08-20 10:12:44', '2025-08-20 10:12:44'),
(189, 74, 45, 'pending', '2025-08-20 10:12:44', '2025-08-20 10:12:44'),
(190, 75, 7, 'pending', '2025-08-20 10:15:32', '2025-08-20 10:15:32'),
(191, 75, 40, 'pending', '2025-08-20 10:15:32', '2025-08-20 10:15:32'),
(192, 75, 45, 'pending', '2025-08-20 10:15:32', '2025-08-20 10:15:32'),
(193, 76, 3, 'pending', '2025-08-20 10:17:22', '2025-08-20 10:17:22'),
(194, 76, 7, 'pending', '2025-08-20 10:17:22', '2025-08-20 10:17:22'),
(195, 76, 22, 'pending', '2025-08-20 10:17:22', '2025-08-20 10:17:22'),
(196, 77, 7, 'pending', '2025-08-20 10:19:11', '2025-08-20 10:19:11'),
(197, 77, 1, 'pending', '2025-08-20 10:19:11', '2025-08-20 10:19:11'),
(198, 77, 43, 'pending', '2025-08-20 10:19:11', '2025-08-20 10:19:11'),
(199, 78, 7, 'pending', '2025-08-20 10:23:09', '2025-08-20 10:23:09'),
(200, 78, 36, 'pending', '2025-08-20 10:23:09', '2025-08-20 10:23:09'),
(201, 78, 17, 'pending', '2025-08-20 10:23:09', '2025-08-20 10:23:09'),
(202, 79, 7, 'pending', '2025-08-20 10:25:04', '2025-08-20 10:25:04'),
(203, 79, 36, 'pending', '2025-08-20 10:25:04', '2025-08-20 10:25:04'),
(204, 79, 17, 'pending', '2025-08-20 10:25:04', '2025-08-20 10:25:04'),
(205, 80, 35, 'pending', '2025-08-20 10:32:39', '2025-08-20 10:32:39'),
(206, 80, 7, 'pending', '2025-08-20 10:32:39', '2025-08-20 10:32:39'),
(207, 80, 45, 'pending', '2025-08-20 10:32:39', '2025-08-20 10:32:39'),
(208, 81, 7, 'pending', '2025-08-20 10:32:40', '2025-08-20 10:32:40'),
(209, 81, 20, 'pending', '2025-08-20 10:32:40', '2025-08-20 10:32:40'),
(210, 81, 45, 'pending', '2025-08-20 10:32:40', '2025-08-20 10:32:40'),
(211, 82, 7, 'pending', '2025-08-20 10:32:56', '2025-08-20 10:32:56'),
(212, 82, 40, 'pending', '2025-08-20 10:32:56', '2025-08-20 10:32:56'),
(213, 82, 45, 'pending', '2025-08-20 10:32:56', '2025-08-20 10:32:56'),
(214, 83, 3, 'pending', '2025-08-20 10:38:57', '2025-08-20 10:38:57'),
(215, 83, 7, 'pending', '2025-08-20 10:38:57', '2025-08-20 10:38:57'),
(216, 83, 22, 'pending', '2025-08-20 10:38:57', '2025-08-20 10:38:57'),
(217, 84, 3, 'pending', '2025-08-20 10:38:58', '2025-08-20 10:38:58'),
(218, 84, 7, 'pending', '2025-08-20 10:38:58', '2025-08-20 10:38:58'),
(219, 84, 22, 'pending', '2025-08-20 10:38:58', '2025-08-20 10:38:58'),
(220, 85, 35, 'pending', '2025-08-20 10:46:13', '2025-08-20 10:46:13'),
(221, 85, 14, 'pending', '2025-08-20 10:46:13', '2025-08-20 10:46:13'),
(222, 85, 45, 'pending', '2025-08-20 10:46:13', '2025-08-20 10:46:13'),
(223, 86, 36, 'pending', '2025-08-20 10:49:44', '2025-08-20 10:49:44'),
(224, 86, 1, 'pending', '2025-08-20 10:49:44', '2025-08-20 10:49:44'),
(225, 86, 22, 'pending', '2025-08-20 10:49:44', '2025-08-20 10:49:44'),
(226, 87, 3, 'pending', '2025-08-20 11:57:55', '2025-08-20 11:57:55'),
(227, 87, 7, 'pending', '2025-08-20 11:57:55', '2025-08-20 11:57:55'),
(228, 87, 22, 'pending', '2025-08-20 11:57:55', '2025-08-20 11:57:55'),
(229, 88, 7, 'pending', '2025-08-20 13:01:42', '2025-08-20 13:01:42'),
(230, 88, 40, 'pending', '2025-08-20 13:01:42', '2025-08-20 13:01:42'),
(231, 88, 45, 'pending', '2025-08-20 13:01:42', '2025-08-20 13:01:42'),
(232, 89, 7, 'pending', '2025-08-20 13:08:59', '2025-08-20 13:08:59'),
(233, 89, 40, 'pending', '2025-08-20 13:08:59', '2025-08-20 13:08:59'),
(234, 89, 45, 'pending', '2025-08-20 13:08:59', '2025-08-20 13:08:59'),
(235, 90, 3, 'pending', '2025-08-20 14:43:41', '2025-08-20 14:43:41'),
(236, 90, 7, 'pending', '2025-08-20 14:43:41', '2025-08-20 14:43:41'),
(237, 90, 22, 'pending', '2025-08-20 14:43:41', '2025-08-20 14:43:41'),
(238, 91, 35, 'pending', '2025-08-20 15:09:38', '2025-08-20 15:09:38'),
(239, 91, 7, 'pending', '2025-08-20 15:09:38', '2025-08-20 15:09:38'),
(240, 91, 22, 'pending', '2025-08-20 15:09:38', '2025-08-20 15:09:38'),
(241, 92, 7, 'pending', '2025-08-21 00:50:46', '2025-08-21 00:50:46'),
(242, 92, 40, 'pending', '2025-08-21 00:50:46', '2025-08-21 00:50:46'),
(243, 92, 22, 'pending', '2025-08-21 00:50:46', '2025-08-21 00:50:46'),
(244, 93, 12, 'pending', '2025-08-21 02:25:11', '2025-08-21 02:25:11'),
(245, 93, 1, 'pending', '2025-08-21 02:25:11', '2025-08-21 02:25:11'),
(246, 93, 42, 'pending', '2025-08-21 02:25:11', '2025-08-21 02:25:11'),
(247, 93, 12, 'pending', '2025-08-21 02:25:15', '2025-08-21 02:25:15'),
(248, 93, 1, 'pending', '2025-08-21 02:25:15', '2025-08-21 02:25:15'),
(249, 93, 42, 'pending', '2025-08-21 02:25:15', '2025-08-21 02:25:15'),
(250, 94, 12, 'pending', '2025-08-21 02:25:15', '2025-08-21 02:25:15'),
(251, 94, 1, 'pending', '2025-08-21 02:25:15', '2025-08-21 02:25:15'),
(252, 94, 42, 'pending', '2025-08-21 02:25:15', '2025-08-21 02:25:15'),
(253, 95, 8, 'pending', '2025-08-21 15:25:14', '2025-08-21 15:25:14'),
(254, 95, 40, 'pending', '2025-08-21 15:25:14', '2025-08-21 15:25:14'),
(255, 95, 22, 'pending', '2025-08-21 15:25:14', '2025-08-21 15:25:14'),
(256, 96, 40, 'pending', '2025-08-21 16:58:34', '2025-08-21 16:58:34'),
(257, 96, 25, 'pending', '2025-08-21 16:58:34', '2025-08-21 16:58:34'),
(258, 96, 22, 'pending', '2025-08-21 16:58:34', '2025-08-21 16:58:34'),
(259, 97, 12, 'pending', '2025-08-22 02:04:31', '2025-08-22 02:04:31'),
(260, 97, 24, 'pending', '2025-08-22 02:04:31', '2025-08-22 02:04:31'),
(261, 97, 22, 'pending', '2025-08-22 02:04:31', '2025-08-22 02:04:31'),
(262, 98, 12, 'pending', '2025-08-22 02:36:42', '2025-08-22 02:36:42'),
(263, 98, 14, 'pending', '2025-08-22 02:36:42', '2025-08-22 02:36:42'),
(264, 98, 17, 'pending', '2025-08-22 02:36:42', '2025-08-22 02:36:42'),
(265, 99, 20, 'pending', '2025-08-22 03:16:17', '2025-08-22 03:16:17'),
(266, 99, 27, 'pending', '2025-08-22 03:16:17', '2025-08-22 03:16:17'),
(267, 99, 22, 'pending', '2025-08-22 03:16:17', '2025-08-22 03:16:17'),
(268, 100, 36, 'pending', '2025-08-22 03:38:06', '2025-08-22 03:38:06'),
(269, 100, 27, 'pending', '2025-08-22 03:38:06', '2025-08-22 03:38:06'),
(270, 100, 22, 'pending', '2025-08-22 03:38:06', '2025-08-22 03:38:06'),
(271, 101, 36, 'pending', '2025-08-22 03:40:37', '2025-08-22 03:40:37'),
(272, 101, 27, 'pending', '2025-08-22 03:40:37', '2025-08-22 03:40:37'),
(273, 101, 22, 'pending', '2025-08-22 03:40:37', '2025-08-22 03:40:37'),
(274, 102, 36, 'pending', '2025-08-22 03:45:53', '2025-08-22 03:45:53'),
(275, 102, 40, 'pending', '2025-08-22 03:45:53', '2025-08-22 03:45:53'),
(276, 102, 22, 'pending', '2025-08-22 03:45:53', '2025-08-22 03:45:53'),
(277, 103, 36, 'pending', '2025-08-22 07:23:15', '2025-08-22 07:23:15'),
(278, 103, 25, 'pending', '2025-08-22 07:23:15', '2025-08-22 07:23:15'),
(279, 103, 22, 'pending', '2025-08-22 07:23:15', '2025-08-22 07:23:15'),
(280, 104, 36, 'pending', '2025-08-22 07:24:29', '2025-08-22 07:24:29'),
(281, 104, 25, 'pending', '2025-08-22 07:24:29', '2025-08-22 07:24:29'),
(282, 104, 22, 'pending', '2025-08-22 07:24:29', '2025-08-22 07:24:29'),
(283, 105, 23, 'pending', '2025-08-22 08:20:24', '2025-08-22 08:20:24'),
(284, 105, 25, 'pending', '2025-08-22 08:20:24', '2025-08-22 08:20:24'),
(285, 105, 17, 'pending', '2025-08-22 08:20:24', '2025-08-22 08:20:24'),
(286, 106, 23, 'pending', '2025-08-22 10:26:26', '2025-08-22 10:26:26'),
(287, 106, 24, 'pending', '2025-08-22 10:26:26', '2025-08-22 10:26:26'),
(288, 106, 17, 'pending', '2025-08-22 10:26:26', '2025-08-22 10:26:26'),
(289, 107, 12, 'pending', '2025-08-22 10:28:49', '2025-08-22 10:28:49'),
(290, 107, 8, 'pending', '2025-08-22 10:28:49', '2025-08-22 10:28:49'),
(291, 107, 17, 'pending', '2025-08-22 10:28:49', '2025-08-22 10:28:49'),
(292, 108, 12, 'pending', '2025-08-22 10:40:58', '2025-08-22 10:40:58'),
(293, 108, 25, 'pending', '2025-08-22 10:40:58', '2025-08-22 10:40:58'),
(294, 108, 17, 'pending', '2025-08-22 10:40:58', '2025-08-22 10:40:58'),
(295, 109, 36, 'pending', '2025-08-22 10:56:15', '2025-08-22 10:56:15'),
(296, 109, 8, 'pending', '2025-08-22 10:56:15', '2025-08-22 10:56:15'),
(297, 109, 22, 'pending', '2025-08-22 10:56:15', '2025-08-22 10:56:15'),
(298, 110, 12, 'pending', '2025-08-22 11:00:33', '2025-08-22 11:00:33'),
(299, 110, 25, 'pending', '2025-08-22 11:00:33', '2025-08-22 11:00:33'),
(300, 110, 22, 'pending', '2025-08-22 11:00:33', '2025-08-22 11:00:33'),
(301, 111, 40, 'pending', '2025-08-22 11:01:29', '2025-08-22 11:01:29'),
(302, 111, 27, 'pending', '2025-08-22 11:01:29', '2025-08-22 11:01:29'),
(303, 111, 17, 'pending', '2025-08-22 11:01:29', '2025-08-22 11:01:29'),
(304, 112, 40, 'pending', '2025-08-22 11:01:37', '2025-08-22 11:01:37'),
(305, 112, 27, 'pending', '2025-08-22 11:01:37', '2025-08-22 11:01:37'),
(306, 112, 17, 'pending', '2025-08-22 11:01:37', '2025-08-22 11:01:37'),
(307, 113, 12, 'pending', '2025-08-22 11:04:12', '2025-08-22 11:04:12'),
(308, 113, 40, 'pending', '2025-08-22 11:04:12', '2025-08-22 11:04:12'),
(309, 113, 17, 'pending', '2025-08-22 11:04:12', '2025-08-22 11:04:12');

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

INSERT INTO `events` (`id`, `club_id`, `event_name`, `description`, `chief_guest`, `start_date`, `end_date`, `start_time`, `end_time`, `participants`, `coordinators`, `best_performance`, `image_path`, `created_at`, `updated_at`, `gallery`, `winner_name`, `winner_photo`) VALUES
(6, 1, 'sensors hunts', 'decode that sensor', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'event_images/QdMdXttjzUyrZP35Cxl88KWHTRxd52ET7lLKOJHi.png', '2025-06-22 01:11:38', '2025-07-03 23:32:17', NULL, NULL, NULL),
(9, 3, 'App Mentor', 'Create new apps', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'event_images/9WJYHcvyBEjyZkUgnk4jE7Q2DVrjk04l5nyC60DJ.png', '2025-06-22 09:55:31', '2025-06-24 11:34:03', NULL, NULL, NULL),
(10, 4, 'Field visit', 'School children interaction', 'hari', '2025-06-13', '2025-06-14', '15:30:00', '16:00:00', 15, 5, 0, 'event_images/4FWGVuPgsT4DKPjj49qsdJNexeyp2LbAfiKXxLkN.png', '2025-06-22 10:03:41', '2025-07-20 15:43:04', NULL, NULL, NULL),
(11, 7, 'CodeFest', 'Coding in C program', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'event_images/IkJ6ANX0JcKLOawDa8PQQAkcTxB6W2sIcJP4D1db.png', '2025-06-22 11:01:36', '2025-07-17 02:23:34', '[\"event_gallery\\/Gj99BdyaD544Dcw8N6hZPY1mz2jBl2U1vl1dFCVc.jpg\",\"event_gallery\\/81k3ucCERJgYzjjQx7jcadgkl8mDwlZUPoT5pXRZ.jpg\",\"event_gallery\\/6qFbzXBDhJ0FLZqDurSGIwBZSZBnY2kgpIMogvVk.jpg\",\"event_gallery\\/9IbIEqvIEK1sbeyI7ZhTU4oCu4hGp1q7N1qF1GrO.jpg\"]', NULL, NULL),
(12, 7, 'Hackfest', 'Coding in hackerrank', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'event_images/nu7dKeThHRiVL6kDhpZBkeJ5pvfEtce0uaQffJsm.png', '2025-06-22 11:02:18', '2025-06-24 11:35:19', NULL, NULL, NULL),
(13, 4, 'Crime Scene', 'Identify the murderer using clues', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'event_images/7qj9TqOYljGzwSQIOhRHSVxZTdL3MN5sdE2LyySo.png', '2025-06-22 11:03:24', '2025-06-24 11:34:34', NULL, NULL, NULL),
(18, 1, 'Connexions', 'Connect things and find out !', 'NA', '2025-05-09', '2025-05-09', '15:00:00', '17:30:00', 40, 4, 2, 'event_images/pdwvks8MbOziKn0CKMrY6jYjRLjV35bgJoSdCe3Z.png', '2025-06-24 08:46:06', '2025-07-20 15:27:36', NULL, NULL, NULL),
(19, 35, 'AI week celebration', 'Organized by the AI Consortium, this 5-day power-packed event will take you through the exciting world of Artificial Intelligence — from real-world applications to futuristic innovations!', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'event_images/mOtKKDCLvdpNXsk4U8WKZliMTtRIzaHcIXYJM52W.jpg', '2025-07-15 05:11:30', '2025-07-15 05:43:29', '[\"event_gallery\\/0NcQukwqTK7s4qQsLw3YdURjEA70p7WAbA4yqfC9.jpg\"]', NULL, NULL),
(20, 35, 'AI Sprint', 'A hands-on In-Lab Internship Opportunity designed for II- and III-year students.\r\n Explore Real-World AI Solutions Across These Key Domains:\r\n MediVision,Decoding Bharat ,Business Minds 2.0, Beyond Tomorrow ,AI Illuminates .', 'NA', '2025-06-02', '2025-06-13', '09:30:00', '16:30:00', 167, 10, 3, 'event_images/lFPL7kvNdKFpsQ6tQgI2825oB0tw6Xbo3JN4cFSC.jpg', '2025-07-15 05:49:31', '2025-07-17 08:54:26', '[\"event_gallery\\/c77lusBueKU0bho8CshS7bv64wi42HXZKy6tQDYo.jpg\",\"event_gallery\\/lE70XNzbZxSl4AZzj5LWQHSTtAPiuW5wK5MMnxyl.jpg\",\"event_gallery\\/QuhVGspqgdcRglkiRCkjMhx1nD61vvYsog3Kop7l.jpg\",\"event_gallery\\/TRAdCa9JNVwvwwK0s2kXPUB7fhEJe0FLr1uhDv54.jpg\"]', NULL, NULL),
(21, 35, 'Inauguration of AI consortium-  Gen AI in Action', 'The AI Consortium was inaugurated to bring together experts, students, and institutions in the field of Artificial Intelligence.It aims to promote collaboration, research, and innovation in AI technologies.', 'Dr.Suresh Rajappa ,Ph.D.MBA ,Global data leader, KPMG dallas,US', '2025-04-02', '2025-04-02', '10:00:00', '12:30:00', 30, 5, 0, 'event_images/UCpS2pSfO6gKjUTpxToq5Q1ktefmlPMAiGdb1zQZ.jpg', '2025-07-15 12:22:52', '2025-08-20 19:18:09', '[\"event_gallery\\/UMfixJteKyXJSm99mVlqMDSkmld3Llhpsc6H2ObX.jpg\",\"event_gallery\\/AToOxLR26FmnAjLL0hDgAbsbaYe54DL0LrJ4391o.jpg\",\"event_gallery\\/sFJNydYFxf150QFhg2uwlkUAtuv88JJ36Q8qHMIV.jpg\",\"event_gallery\\/6hv2yla5jVe3yCSfLzwjyBlUHaZZ6qK1SaJjnBNv.jpg\"]', NULL, NULL),
(22, 35, 'CRAFT THE CORE – Logo Design Contest', 'Unleash your creativity and design a logo that reflects the core themes of Innovation ,Education and AI Technology.', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'event_images/qFp4MydHybOdjNzNIWSXpg1t89NjUe5pIl9bQg7b.jpg', '2025-07-15 12:31:19', '2025-07-15 12:31:19', NULL, NULL, NULL);

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

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"03c1568d-6abc-4f4c-ae3c-c662b647cbfb\",\"displayName\":\"App\\\\Mail\\\\RegistrationRejectedMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:33:\\\"App\\\\Mail\\\\RegistrationRejectedMail\\\":3:{s:4:\\\"data\\\";a:2:{s:4:\\\"name\\\";s:8:\\\"janani b\\\";s:4:\\\"club\\\";s:3:\\\"IoT\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:23:\\\"bjanani@student.tce.edu\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1755098114,\"delay\":null}', 0, NULL, 1755098114, 1755098114);

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
(8, '2025_07_20_154250_add_department_id_to_users_table', 3),
(9, '2025_08_13_095828_add_status_to_club_registration_table', 4);

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
(71, 'SHRAVAN KRISSHNA E', '681194', 'shravan.krissh@gmail.com', 'MECH', '2025-08-20 10:03:27', '2025-08-20 10:03:27', 'Male'),
(72, 'S.M.Harini Sree', '680360', 'smharinisree2007@gmail.com', 'ECE', '2025-08-20 10:12:13', '2025-08-20 10:12:13', 'Female'),
(73, 'Aravind S', '680614', 'aravind.ashb@gmail.com', 'MECT', '2025-08-20 10:12:15', '2025-08-20 10:12:15', 'Male'),
(74, 'Dhiya S', '680659', 'dhsdhkr@gmail.com', 'ECE', '2025-08-20 10:12:44', '2025-08-20 10:12:44', 'Female'),
(75, 'sakthivell gu', '680744', 'sakthivellgu@gmail.com', 'MECH', '2025-08-20 10:15:32', '2025-08-20 10:15:32', 'Male'),
(76, 'Benjamin raja R', '681124', 'jabaraja83@gmail.com', 'MECH', '2025-08-20 10:17:22', '2025-08-20 10:17:22', 'Male'),
(77, 's.sivanisri', '681149', 'sivanisri314@gmail.com', 'MECT', '2025-08-20 10:19:11', '2025-08-20 10:19:11', 'Female'),
(78, 'MAHA ARTHI.D', '680454', 'arthimaha010@gmail.com', 'MECT', '2025-08-20 10:23:09', '2025-08-20 10:23:09', 'Female'),
(79, 'AISHWARYA M', '680766', 'aishwaryakarishma04@gmail.com', 'MECT', '2025-08-20 10:25:04', '2025-08-20 10:25:04', 'Female'),
(80, 'sri rishwanth.B', '680767', 'sririshwanthbalamurugan2008@gmail.com', 'MECH', '2025-08-20 10:32:39', '2025-08-20 10:32:39', 'Male'),
(81, 'SIVA SAKTHI BALAN C', '680591', 'sivasivassb@gmail.com', 'IT', '2025-08-20 10:32:40', '2025-08-20 10:32:40', 'Male'),
(82, 'Sarathi S', '680795', 'sms.sarathi2007@gmail.com', 'MECH', '2025-08-20 10:32:56', '2025-08-20 10:32:56', 'Male'),
(83, 'Sachin K', '680120', 'sachinannam.s@gmail.com', 'MECT', '2025-08-20 10:38:57', '2025-08-20 10:38:57', 'Male'),
(84, 'S Arunachalam', '680110', 'arunsethu949@gmail.com', 'IT', '2025-08-20 10:38:58', '2025-08-20 10:38:58', 'Male'),
(85, 'MURUGAN U', '69EE04', '213027murugan@gmail.com', 'EEE', '2025-08-20 10:46:13', '2025-08-20 10:46:13', 'Male'),
(86, 'GANESH N', '680947', 'ganesh20408@gmail.com', 'MECT', '2025-08-20 10:49:44', '2025-08-20 10:49:44', 'Male'),
(87, 'Deepak', '680770', 'deepmem2025@gmail.com', 'EEE', '2025-08-20 11:57:55', '2025-08-20 11:57:55', 'Male'),
(88, 'Kevin joel P', '680700', 'joelkevin1742@gmail.com', 'EEE', '2025-08-20 13:01:42', '2025-08-20 13:01:42', 'Male'),
(89, 'Kamalesh s', '680704', 'kamaleshraj638@gmail.com', 'IT', '2025-08-20 13:08:59', '2025-08-20 13:08:59', 'Male'),
(90, 'Angel S S', '681249', 'angelkumar2207@gmail.com', 'MECH', '2025-08-20 14:43:41', '2025-08-20 14:43:41', 'Female'),
(91, 'Vishnuvarshini .R', '681235', 'vishnuvarsh2007@gmail.com', 'CIVIL', '2025-08-20 15:09:38', '2025-08-20 15:09:38', 'Female'),
(92, 'Vishwanathan S', '680772', 'vishwavadipatti@gmail.com', 'MECH', '2025-08-21 00:50:46', '2025-08-21 00:50:46', 'Male'),
(93, 'Ganesh kumar', '68EC01', 'gkumar85857@gmail.com', 'ECE', '2025-08-21 02:25:09', '2025-08-21 02:25:09', 'Male'),
(94, 'Mani Barathi M', '68EC05', 'manibarathi27042007@gmail.com', 'ECE', '2025-08-21 02:25:12', '2025-08-21 02:25:12', 'Male'),
(95, 'V. PRASANNA', '680535', 'prasannavengadesh2007@gmail.com', 'MECH', '2025-08-21 15:25:14', '2025-08-21 15:25:14', 'Male'),
(96, 'SUKRAN T', '680390', 'bhuvansuriyan@gmail.com', 'MECH', '2025-08-21 16:58:34', '2025-08-21 16:58:34', 'Male'),
(97, 'Satyajith Babu T R', '680477', 'satyajithbabu07@gmail.com', 'AIML', '2025-08-22 02:04:31', '2025-08-22 02:04:31', 'Male'),
(98, 'ARAVIND MANIKANDAN JEYAKUMAR', '680114', 'aravindjeyakumar2007@gmail.com', 'IT', '2025-08-22 02:36:42', '2025-08-22 02:36:42', 'Male'),
(99, 'GANESHRAJA S S', '680656', 'srihariganeshraja@gmail.com', 'MECH', '2025-08-22 03:16:17', '2025-08-22 03:16:17', 'Male'),
(100, 'Dhanya Shree K', '680783', 'dshree8608@gmail.com', 'MECH', '2025-08-22 03:38:06', '2025-08-22 03:38:06', 'Female'),
(101, 'Jeevitha P', '680782', 'jeevithavirumaraja@gmail.com', 'MECH', '2025-08-22 03:40:37', '2025-08-22 03:40:37', 'Female'),
(102, 'Annamalai Mv', '680067', 'annamalai07@myyahoo.com', 'ECE', '2025-08-22 03:45:53', '2025-08-22 03:45:53', 'Male'),
(103, 'Kavya S', '680788', 'kavyaappuchi@gmail.com', 'MECT', '2025-08-22 07:23:15', '2025-08-22 07:23:15', 'Female'),
(104, 'Swetha K.S', '680724', 'hamadeviks596@gamil.com', 'MECH', '2025-08-22 07:24:29', '2025-08-22 07:24:29', 'Female'),
(105, 'K. ARCHANA', '680016', 'karchankarchana2007@gmail.com', 'ECE', '2025-08-22 08:20:24', '2025-08-22 08:20:24', 'Female'),
(106, 'Supraja', '68DS07', 'suprajamanikandan1@gmail.com', 'AMCS', '2025-08-22 10:26:26', '2025-08-22 10:26:26', 'Female'),
(107, 'Manicka selvi M', '680497', 'mallikakumarmallikakumar@gmail.com', 'MECH', '2025-08-22 10:28:49', '2025-08-22 10:28:49', 'Female'),
(108, 'Nagajothi G', '680499', 'Nagajothigobal56@gmail.com', 'CSE', '2025-08-22 10:40:58', '2025-08-22 10:40:58', 'Female'),
(109, 'Santanu Tripathi', '681176', 'santanutripathi406@gmail.com', 'EEE', '2025-08-22 10:56:15', '2025-08-22 10:56:15', 'Male'),
(110, 'KRISHNA PRIYA s', '680576', 'skp20102007@gmail.com', 'CSE', '2025-08-22 11:00:33', '2025-08-22 11:00:33', 'Female'),
(111, 'R.B.Hariharan', '680708', 'rbhariharan12@gmail.com', 'ECE', '2025-08-22 11:01:29', '2025-08-22 11:01:29', 'Male'),
(112, 'K.mohaprasath', '680643', 'mohaprasathk@gmail.com', 'ECE', '2025-08-22 11:01:37', '2025-08-22 11:01:37', 'Male'),
(113, 'S. Dharani sri', '680496', 'sridharani122008@gmail.com', 'CSBS', '2025-08-22 11:04:12', '2025-08-22 11:04:12', 'Female');

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
('DpTD93CINtRWkIYSmqSPXmNn7m7NIaRQq0iFVihZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkhkM3BYR2hvTDg4VXM3ek80cnkxN2VLSUhidUtQckROYU1kVmIydiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90Y2UvbG9naW4iO319', 1755938503);

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
(1, 1, 'Nikitha A S, IT, III year', 'student_photos/hiRL8wUuj1O5h3Prm2NMXXB5aWltZKhhMvRlGlgB.jpg', '2025-06-21 00:31:40', '2025-08-21 05:01:21'),
(2, 1, 'Visaka, CSBS, III year', 'student_photos/DKmmEzvZGHH4Sw1bMWYE4M1IoiCRQGAg48kpAhoZ.jpg', '2025-06-22 04:02:15', '2025-08-21 05:04:25'),
(3, 3, 'Snowfina J , IT , III year', 'student_photos/zwTzNGJNvgqPrVGIOIlGb3tL5yoqy3PUawmCtHP1.png', '2025-06-22 04:03:13', '2025-08-21 11:17:10'),
(4, 35, 'R. Vimitha ,IT, III year', 'student_photos/SmqBCcSZydNZ7t41t4Hfig2Yc5d9djHIzed17AxF.png', '2025-07-15 05:06:46', '2025-08-21 10:58:16'),
(5, 7, 'Aburvaa A S , ECE , III year', NULL, '2025-07-20 14:57:57', '2025-07-20 14:57:57'),
(6, 4, 'Janani S, CSE,III year', NULL, '2025-07-20 14:58:42', '2025-08-20 19:42:06'),
(9, 35, 'Harshini JG , IT , III year', 'student_photos/cyHihxD7my63PiK3nYn00RVCavmXxQRfrDbPF8xy.png', '2025-08-20 19:17:26', '2025-08-21 10:58:16'),
(10, 35, 'Joshika Sri N R,CSE,IIIyear', 'student_photos/XvIucnHdHIZAsg85lSFKfdtgv3RjlQQlO5ea232H.png', '2025-08-21 11:04:23', '2025-08-21 11:04:23'),
(11, 35, 'Kaaviyaa I,CSBS,III year', 'student_photos/Kk8DkjftQjzbjYOaMqN48O5ePQRLaA2ZWDiqmTf0.png', '2025-08-21 11:04:23', '2025-08-21 11:04:23'),
(12, 35, 'AdarshKumar S,CSBS,III year', 'student_photos/l18WfcziZVXKIstK9QIoK6aUIHUEqHaQBopHAoK6.png', '2025-08-21 11:04:23', '2025-08-21 11:04:23'),
(13, 3, 'Shivani shree S, IT, III year', 'student_photos/MldOQoDnEHwsDu1EvpwFYKIAd6q6Zv2rbJ1UC5nK.png', '2025-08-21 11:17:10', '2025-08-21 11:17:10');

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
(5, 'hod it', 'hodit@example.com', NULL, '$2y$12$kgOgS9uVK0KBfd4XEYK7beWjyWSySX87XGwStIccztBYuddHPPKxS', NULL, '2025-07-20 16:01:05', '2025-07-20 16:01:05', 'hod', NULL, 4),
(8, 'AI consortium admin', 'aicon@example.com', NULL, '$2y$12$rXvux/lJhVDiW3D0e1FiZu44k3ZPqbo/ZknEO2Bfh5KeQcksXGCk.', NULL, '2025-08-20 19:10:10', '2025-08-20 19:15:31', 'club_admin', 35, NULL),
(9, 'tceip', 'tceip@example.com', NULL, '$2y$12$dx6KSkotekQ4nK2oJ4Qi0ehmQLPg0UYJm33PdJVf.FvPIsG./d7yC', NULL, '2025-08-20 19:27:47', '2025-08-20 19:27:47', 'club_admin', 48, NULL),
(10, 'vyugam admin', 'vyugam@example.com', NULL, '$2y$12$SaEOYSYYfYOSNsJwpEMHY.29RIn7QT52TRzzHWlug6MHdUvLvlzci', NULL, '2025-08-20 19:32:30', '2025-08-20 19:32:30', 'club_admin', 49, NULL),
(11, 'sports & culturals admin', 'sport@example.com', NULL, '$2y$12$UcJjraEVlhWePK5O9q0ExOMh4W3uf8DvN.hahXhIgxYTg9PpFl7hC', NULL, '2025-08-20 19:35:25', '2025-08-20 19:35:25', 'club_admin', 50, NULL),
(12, 'ADC admin', 'adc@example.com', NULL, '$2y$12$8cD9bATXJIqeb984Vx9OSOKypFflGx5SNgSjsdHFC.3U.vRO3BUeq', NULL, '2025-08-20 19:41:03', '2025-08-20 19:41:03', 'club_admin', 3, NULL),
(13, 'AR VR admin', 'arvr@example.com', NULL, '$2y$12$5.DUK8bLJbyAxwmgJ3yoYOse4dgPIvJU4g91YgCm/2TQv/spCwGBe', NULL, '2025-08-20 19:42:06', '2025-08-20 19:42:06', 'club_admin', 4, NULL),
(14, 'Sadas admin', 'sadas@example.com', NULL, '$2y$12$uBU3/UA0NFek6AFtcbx0Vuo4D4wDRhLs.1JoIFOEePf6BJ2ulzRBm', NULL, '2025-08-20 19:44:54', '2025-08-20 19:44:54', 'club_admin', 45, NULL),
(15, 'SAE admin', 'sae@example.com', NULL, '$2y$12$k5sqFqnVSCdIWyQKhQ8C/eRaXs92oUkfxe6otAesLhAcIQdmgTy/e', NULL, '2025-08-21 10:48:25', '2025-08-21 10:48:25', 'club_admin', 51, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `club_registration`
--
ALTER TABLE `club_registration`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `student_coordinators`
--
ALTER TABLE `student_coordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
