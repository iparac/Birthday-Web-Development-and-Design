-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2021 at 03:59 PM
-- Server version: 5.5.62-0+deb8u1
-- PHP Version: 7.2.25-1+0~20191128.32+debian8~1.gbp108445

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebDiP2020x066`
--

-- --------------------------------------------------------

--
-- Table structure for table `dnevnik`
--

CREATE TABLE `dnevnik` (
  `dnevnik_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `tip_dnevnik_id` int(11) NOT NULL,
  `radnja` text NOT NULL,
  `datum_vrijeme` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dnevnik`
--

INSERT INTO `dnevnik` (`dnevnik_id`, `korisnik_id`, `tip_dnevnik_id`, `radnja`, `datum_vrijeme`) VALUES
(1, 43, 1, 'registracija', '2021-06-15 18:40:46'),
(2, 0, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-15 19:04:50'),
(3, 3, 3, 'Uspjesna prijava bez zapamti me', '2021-06-15 19:06:44'),
(4, 0, 5, 'Neuspjesna prijava bez zapamti me', '2021-06-15 19:07:45'),
(5, 0, 4, 'Neuspjesna prijava + zapamti me', '2021-06-15 19:08:01'),
(6, 0, 5, 'Neuspjesna prijava bez zapamti me', '2021-06-15 19:08:05'),
(7, 3, 5, 'Neuspjesna prijava bez zapamti me', '2021-06-15 19:12:06'),
(8, 3, 4, 'Neuspjesna prijava + zapamti me', '2021-06-15 19:12:11'),
(9, 3, 4, 'Neuspjesna prijava + zapamti me', '2021-06-15 19:12:21'),
(10, 3, 6, 'zakljucan racun + zapamti me', '2021-06-15 19:12:21'),
(11, 4, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-15 19:15:45'),
(12, 4, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-15 19:17:37'),
(13, 4, 8, 'odjava', '2021-06-15 19:17:43'),
(14, 4, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-15 19:18:10'),
(15, 4, 9, 'otvorena registracija_pregledaj', '2021-06-15 19:23:54'),
(16, 4, 9, 'otvorena registracija_pregledaj', '2021-06-15 19:23:55'),
(17, 4, 10, 'unesena nova registracija', '2021-06-15 19:24:18'),
(18, 4, 9, 'otvorena registracija_pregledaj', '2021-06-15 19:24:18'),
(19, 4, 10, 'unesena nova registracija', '2021-06-15 19:24:52'),
(20, 4, 9, 'otvorena registracija_pregledaj', '2021-06-15 19:24:52'),
(21, 4, 11, 'rezervacija update', '2021-06-15 19:25:13'),
(22, 4, 9, 'otvorena registracija_pregledaj', '2021-06-15 19:25:13'),
(23, 0, 12, 'rezervacija obrisi', '2021-06-15 19:25:23'),
(24, 4, 9, 'otvorena registracija_pregledaj', '2021-06-15 19:25:23'),
(25, 0, 4, 'Neuspjesna prijava + zapamti me', '2021-06-15 22:04:55'),
(26, 6, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-15 22:05:13'),
(27, 0, 12, 'rezervacija obrisi', '2021-06-15 22:10:35'),
(28, 6, 9, 'otvorena registracija_pregledaj', '2021-06-15 22:10:36'),
(29, 0, 12, 'rezervacija obrisi', '2021-06-15 22:10:48'),
(30, 6, 9, 'otvorena registracija_pregledaj', '2021-06-15 22:10:48'),
(31, 0, 12, 'rezervacija obrisi', '2021-06-15 22:11:24'),
(32, 6, 9, 'otvorena registracija_pregledaj', '2021-06-15 22:11:25'),
(33, 6, 9, 'otvorena registracija_pregledaj', '2021-06-15 22:15:50'),
(34, 6, 13, 'moderator/administrator pregledava rezervacije', '2021-06-15 22:15:52'),
(35, 0, 12, '', '2021-06-15 22:15:55'),
(36, 6, 13, 'moderator/administrator pregledava rezervacije', '2021-06-15 22:15:55'),
(37, 44, 1, 'registracija', '2021-06-15 22:30:20'),
(38, 44, 5, 'Neuspjesna prijava bez zapamti me', '2021-06-15 22:30:56'),
(39, 44, 5, 'Neuspjesna prijava bez zapamti me', '2021-06-15 22:30:56'),
(40, 6, 4, 'Neuspjesna prijava + zapamti me', '2021-06-15 22:31:00'),
(41, 6, 4, 'Neuspjesna prijava + zapamti me', '2021-06-15 22:31:17'),
(42, 6, 4, 'Neuspjesna prijava + zapamti me', '2021-06-15 22:31:20'),
(43, 6, 6, 'zakljucan racun + zapamti me', '2021-06-15 22:31:20'),
(44, 44, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-15 22:31:37'),
(45, 44, 20, 'otvaranje pocetne stranice', '2021-06-15 22:31:37'),
(46, 44, 9, 'otvorena registracija_pregledaj', '2021-06-15 22:32:19'),
(47, 44, 10, 'unesena nova registracija', '2021-06-15 22:32:46'),
(48, 44, 9, 'otvorena registracija_pregledaj', '2021-06-15 22:32:46'),
(49, 44, 11, 'rezervacija update', '2021-06-15 22:33:06'),
(50, 44, 9, 'otvorena registracija_pregledaj', '2021-06-15 22:33:06'),
(51, 0, 12, 'rezervacija obrisi', '2021-06-15 22:33:30'),
(52, 44, 9, 'otvorena registracija_pregledaj', '2021-06-15 22:33:30'),
(53, 44, 13, 'moderator/administrator pregledava rezervacije', '2021-06-15 22:33:44'),
(54, 44, 14, 'moderator/administrator potvrduje/odbija rezervaciju', '2021-06-15 22:33:49'),
(55, 44, 13, 'moderator/administrator pregledava rezervacije', '2021-06-15 22:33:49'),
(56, 0, 16, 'moderator/administrator briše rezervacije', '2021-06-15 22:34:23'),
(57, 44, 13, 'moderator/administrator pregledava rezervacije', '2021-06-15 22:34:23'),
(58, 44, 15, 'Oporavak lozinke', '2021-06-15 22:34:57'),
(59, 0, 17, 'aktivacija ra?una', '2021-06-15 22:35:39'),
(60, 0, 18, 'pokušaj ve? aktiviranog ra?una', '2021-06-15 22:35:46'),
(61, 44, 20, 'otvaranje pocetne stranice', '2021-06-15 22:38:41'),
(62, 44, 19, 'pregledavanje dokumentacija', '2021-06-15 22:38:51'),
(63, 44, 8, 'odjava', '2021-06-15 22:42:23'),
(64, 44, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-15 22:56:47'),
(65, 44, 20, 'otvaranje pocetne stranice', '2021-06-15 22:56:47'),
(66, 44, 20, 'otvaranje pocetne stranice', '2021-06-15 22:56:55'),
(67, 44, 19, 'pregledavanje dokumentacija', '2021-06-15 22:57:09'),
(68, 44, 9, 'otvorena registracija_pregledaj', '2021-06-15 22:57:17'),
(69, 44, 9, 'otvorena registracija_pregledaj', '2021-06-15 22:57:23'),
(70, 44, 9, 'otvorena registracija_pregledaj', '2021-06-15 22:58:36'),
(71, 44, 8, 'odjava', '2021-06-15 22:58:38'),
(72, 7, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-15 22:58:49'),
(73, 7, 20, 'otvaranje pocetne stranice', '2021-06-15 22:58:49'),
(74, 7, 20, 'otvaranje pocetne stranice', '2021-06-15 22:59:01'),
(75, 7, 19, 'pregledavanje dokumentacija', '2021-06-15 22:59:02'),
(76, 7, 9, 'otvorena registracija_pregledaj', '2021-06-15 22:59:06'),
(77, 7, 13, 'moderator/administrator pregledava rezervacije', '2021-06-15 22:59:10'),
(78, 7, 8, 'odjava', '2021-06-15 22:59:16'),
(79, 9, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-15 22:59:45'),
(80, 9, 20, 'otvaranje pocetne stranice', '2021-06-15 22:59:45'),
(81, 9, 13, 'moderator/administrator pregledava rezervacije', '2021-06-15 22:59:49'),
(82, 0, 13, 'moderator/administrator pregledava rezervacije', '2021-06-16 00:02:32'),
(83, 0, 20, 'otvaranje pocetne stranice', '2021-06-16 00:02:43'),
(84, 0, 19, 'pregledavanje dokumentacija', '2021-06-16 00:02:47'),
(85, 0, 19, 'pregledavanje dokumentacija', '2021-06-16 00:02:57'),
(86, 0, 20, 'otvaranje pocetne stranice', '2021-06-16 00:02:58'),
(87, 0, 20, 'otvaranje pocetne stranice', '2021-06-16 00:05:09'),
(88, 0, 20, 'otvaranje pocetne stranice', '2021-06-16 00:05:13'),
(89, 0, 20, 'otvaranje pocetne stranice', '2021-06-16 00:05:13'),
(90, 0, 20, 'otvaranje pocetne stranice', '2021-06-16 00:05:46'),
(91, 0, 20, 'otvaranje pocetne stranice', '2021-06-16 00:05:50'),
(92, 0, 19, 'pregledavanje dokumentacija', '2021-06-16 00:05:51'),
(93, 0, 20, 'otvaranje pocetne stranice', '2021-06-16 00:05:53'),
(94, 7, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-16 01:22:32'),
(95, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 01:22:32'),
(96, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 01:24:47'),
(97, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 01:31:32'),
(98, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 01:31:33'),
(99, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 01:31:34'),
(100, 7, 13, 'moderator/administrator pregledava rezervacije', '2021-06-16 02:12:58'),
(101, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 02:13:02'),
(102, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 02:19:31'),
(103, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 02:19:32'),
(104, 7, 21, 'dodjela moderatora', '2021-06-16 02:19:48'),
(105, 7, 21, 'dodjela moderatora', '2021-06-16 02:21:38'),
(106, 7, 13, 'moderator/administrator pregledava rezervacije', '2021-06-16 02:23:46'),
(107, 7, 21, 'dodjela moderatora', '2021-06-16 02:23:51'),
(108, 7, 21, 'dodjela moderatora', '2021-06-16 02:32:44'),
(109, 7, 21, 'dodjela moderatora', '2021-06-16 02:33:01'),
(110, 7, 22, 'otkljucavanje korisnika', '2021-06-16 02:59:53'),
(111, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 03:21:17'),
(112, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 03:27:47'),
(113, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 03:57:23'),
(114, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 04:09:59'),
(115, 7, 23, 'zakljucavanje korisnika', '2021-06-16 04:10:25'),
(116, 7, 23, 'zakljucavanje korisnika', '2021-06-16 04:12:17'),
(117, 7, 23, 'zakljucavanje korisnika', '2021-06-16 04:12:35'),
(118, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 04:15:41'),
(119, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 05:01:23'),
(120, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 05:01:24'),
(121, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 05:01:25'),
(122, 7, 19, 'pregledavanje dokumentacija', '2021-06-16 05:01:30'),
(123, 7, 19, 'pregledavanje dokumentacija', '2021-06-16 05:02:06'),
(124, 7, 19, 'pregledavanje dokumentacija', '2021-06-16 05:02:08'),
(125, 7, 19, 'pregledavanje dokumentacija', '2021-06-16 05:02:47'),
(126, 7, 19, 'pregledavanje dokumentacija', '2021-06-16 05:21:41'),
(127, 7, 19, 'pregledavanje dokumentacija', '2021-06-16 05:39:17'),
(128, 7, 19, 'pregledavanje dokumentacija', '2021-06-16 05:39:18'),
(129, 7, 19, 'pregledavanje dokumentacija', '2021-06-16 05:39:19'),
(130, 7, 19, 'pregledavanje dokumentacija', '2021-06-16 05:39:19'),
(131, 7, 19, 'pregledavanje dokumentacija', '2021-06-16 05:40:10'),
(132, 7, 8, 'odjava', '2021-06-16 05:40:17'),
(133, 5, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-16 05:41:00'),
(134, 5, 20, 'otvaranje pocetne stranice', '2021-06-16 05:41:00'),
(135, 5, 20, 'otvaranje pocetne stranice', '2021-06-16 05:41:07'),
(136, 5, 19, 'pregledavanje dokumentacija', '2021-06-16 05:41:08'),
(137, 5, 9, 'otvorena registracija_pregledaj', '2021-06-16 05:41:11'),
(138, 5, 13, 'moderator/administrator pregledava rezervacije', '2021-06-16 05:41:13'),
(139, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(140, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(141, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(142, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(143, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(144, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(145, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(146, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(147, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(148, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(149, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(150, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(151, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(152, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(153, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(154, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(155, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(156, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(157, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(158, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(159, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(160, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(161, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(162, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(163, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(164, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(165, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(166, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(167, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(168, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(169, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(170, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(171, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(172, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 05:41:35'),
(173, 5, 20, 'otvaranje pocetne stranice', '2021-06-16 05:48:51'),
(174, 5, 20, 'otvaranje pocetne stranice', '2021-06-16 05:55:39'),
(175, 5, 8, 'odjava', '2021-06-16 05:55:44'),
(176, 5, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-16 05:59:21'),
(177, 5, 20, 'otvaranje pocetne stranice', '2021-06-16 05:59:21'),
(178, 5, 8, 'odjava', '2021-06-16 05:59:30'),
(179, 45, 1, 'registracija', '2021-06-16 06:00:21'),
(180, 0, 17, 'aktivacija racuna', '2021-06-16 06:00:37'),
(181, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 06:07:14'),
(182, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 06:07:15'),
(183, 0, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 06:07:47'),
(184, 45, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 06:09:43'),
(185, 5, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-16 06:09:53'),
(186, 5, 20, 'otvaranje pocetne stranice', '2021-06-16 06:09:53'),
(187, 5, 8, 'odjava', '2021-06-16 06:09:54'),
(188, 46, 1, 'registracija', '2021-06-16 06:10:34'),
(189, 46, 17, 'aktivacija racuna', '2021-06-16 06:10:47'),
(190, 46, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 06:11:27'),
(191, 46, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 06:12:17'),
(192, 46, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 06:12:21'),
(193, 46, 3, 'Uspjesna prijava bez zapamti me', '2021-06-16 06:12:38'),
(194, 46, 20, 'otvaranje pocetne stranice', '2021-06-16 06:12:38'),
(195, 46, 8, 'odjava', '2021-06-16 06:12:41'),
(196, 5, 4, 'Neuspjesna prijava + zapamti me', '2021-06-16 06:12:51'),
(197, 46, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-16 06:13:00'),
(198, 46, 20, 'otvaranje pocetne stranice', '2021-06-16 06:13:00'),
(199, 46, 8, 'odjava', '2021-06-16 06:13:08'),
(200, 46, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-16 06:13:14'),
(201, 46, 20, 'otvaranje pocetne stranice', '2021-06-16 06:13:14'),
(202, 46, 8, 'odjava', '2021-06-16 06:13:37'),
(203, 46, 5, 'Neuspjesna prijava bez zapamti me', '2021-06-16 06:13:39'),
(204, 46, 5, 'Neuspjesna prijava bez zapamti me', '2021-06-16 06:13:41'),
(205, 46, 5, 'Neuspjesna prijava bez zapamti me', '2021-06-16 06:13:43'),
(206, 46, 7, 'zakljucan racun bez zapamti me', '2021-06-16 06:13:43'),
(207, 2, 15, 'Oporavak lozinke', '2021-06-16 06:15:03'),
(208, 2, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-16 06:16:04'),
(209, 2, 20, 'otvaranje pocetne stranice', '2021-06-16 06:16:04'),
(210, 2, 8, 'odjava', '2021-06-16 06:16:15'),
(211, 7, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-16 06:16:30'),
(212, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 06:16:30'),
(213, 7, 20, 'otvaranje pocetne stranice', '2021-06-16 06:18:13'),
(214, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:24:26'),
(215, 7, 10, 'unesena nova registracija', '2021-06-16 06:24:35'),
(216, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:24:35'),
(217, 7, 10, 'unesena nova registracija', '2021-06-16 06:24:45'),
(218, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:24:45'),
(219, 7, 11, 'rezervacija update', '2021-06-16 06:25:10'),
(220, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:25:10'),
(221, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:25:13'),
(222, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:25:14'),
(223, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:25:16'),
(224, 7, 11, 'rezervacija update', '2021-06-16 06:25:30'),
(225, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:25:30'),
(226, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:25:32'),
(227, 7, 11, 'rezervacija update', '2021-06-16 06:25:43'),
(228, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:25:43'),
(229, 0, 12, 'rezervacija obrisi', '2021-06-16 06:25:47'),
(230, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:25:47'),
(231, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:25:49'),
(232, 7, 9, 'otvorena registracija_pregledaj', '2021-06-16 06:25:50'),
(233, 7, 13, 'moderator/administrator pregledava rezervacije', '2021-06-16 06:26:43'),
(234, 7, 14, 'moderator/administrator potvrduje/odbija rezervaciju', '2021-06-16 06:26:54'),
(235, 7, 13, 'moderator/administrator pregledava rezervacije', '2021-06-16 06:26:54'),
(236, 7, 22, 'otkljucavanje korisnika', '2021-06-16 06:28:28'),
(237, 7, 22, 'otkljucavanje korisnika', '2021-06-16 06:28:29'),
(238, 7, 23, 'zakljucavanje korisnika', '2021-06-16 06:28:32'),
(239, 7, 23, 'zakljucavanje korisnika', '2021-06-16 06:28:32'),
(240, 7, 21, 'dodjela moderatora', '2021-06-16 06:29:08'),
(241, 7, 21, 'dodjela moderatora', '2021-06-16 06:29:10'),
(242, 47, 1, 'registracija', '2021-06-16 14:58:16'),
(243, 47, 2, 'Uspjesna prijava + Zapamti Me', '2021-06-16 14:58:30'),
(244, 47, 20, 'otvaranje pocetne stranice', '2021-06-16 14:58:30'),
(245, 47, 17, 'aktivacija racuna', '2021-06-16 14:59:28'),
(246, 47, 18, 'pokušaj vec aktiviranog racuna', '2021-06-16 14:59:32'),
(247, 47, 20, 'otvaranje pocetne stranice', '2021-06-16 14:59:40'),
(248, 47, 19, 'pregledavanje dokumentacija', '2021-06-16 15:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE `galerija` (
  `galerija_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `materijal_id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `materijal_dir` varchar(255) NOT NULL,
  `suglasnost` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`galerija_id`, `korisnik_id`, `materijal_id`, `ime`, `materijal_dir`, `suglasnost`) VALUES
(1, 1, 1, 'slika1', 'slika', 1),
(2, 5, 1, 'video1', 'video1', 1),
(3, 4, 1, 'slika2', 'slika2', 0),
(3, 13, 1, 'slika3', 'slika3', 1),
(4, 14, 2, 'video2', 'video2', 0),
(5, 41, 1, 'video3', 'video3', 1),
(6, 38, 2, 'video4', 'video4', 0),
(7, 36, 1, 'slika4', 'slika4', 1),
(8, 26, 1, 'slika5', 'slika5', 1),
(9, 34, 1, 'slika6', 'slika6', 1),
(10, 13, 2, 'video5', 'video5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grupa`
--

CREATE TABLE `grupa` (
  `grupa_id` int(11) NOT NULL,
  `ime` varchar(25) NOT NULL,
  `opis_grupa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grupa`
--

INSERT INTO `grupa` (`grupa_id`, `ime`, `opis_grupa`) VALUES
(1, 'znalci', 'Djeca od 2-5 godina.'),
(2, 'majstori', 'Djeca od 5-10 godina.'),
(3, 'genijalci', 'Djeca od 10-15 godina.');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `uloga_id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `korisnicko_ime` varchar(45) NOT NULL,
  `lozinka` varchar(45) NOT NULL,
  `lozinka_sha256` char(64) NOT NULL,
  `email` varchar(45) NOT NULL,
  `uvjeti` varchar(50) DEFAULT NULL,
  `status_kor` varchar(1) NOT NULL,
  `broj_neuspjesnih_prijava` int(11) DEFAULT NULL,
  `datum_registracije` datetime DEFAULT NULL,
  `aktivacijski_kod` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `uloga_id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `lozinka_sha256`, `email`, `uvjeti`, `status_kor`, `broj_neuspjesnih_prijava`, `datum_registracije`, `aktivacijski_kod`) VALUES
(0, 3, 'marko', 'markic', 'mmarkic', 'e5xmkucwn8', '76998f1bda1db80079f812b8269148f1d5ff1f9d0e362a5293181f5a3edf8511', 'mmarkic@gmail.com', NULL, '1', 0, '2021-06-08 21:29:34', ''),
(1, 2, 'toni', 'parac', 'tparac', 'asdfgh123', '513106c051f94528f1d386926aa65e1a', 'tparac@gmail.com', NULL, '1', 0, '2021-06-08 22:59:24', ''),
(2, 3, 'ivan', 'parac', 'iparac', '8fb7o09ud2', 'b81060c6146306fc4e65037df79081f23c462ff7a5f3c029b74b53c519ba902b', 'iparac@foi.hr', NULL, '1', 0, '2021-06-08 23:09:04', ''),
(3, 3, 'ivan', 'parac', 'iparacc', 'fx2otburd4', '951dbaad017e9f5d97535a92e54e8c159bf6efd2ba6b22aed0dab952ee6fa832', 'iparac@foi.hr', NULL, '1', 0, '2021-06-09 02:12:23', ''),
(4, 2, 'toni', 'markic', 'iparaccc', 'asd', '7815696ecbf1c96e6894b779456d330e', 'iparac@foi.hr', NULL, '1', 0, '2021-06-09 02:15:38', ''),
(5, 5, 'marino', 'marinic', 'mmarinic', 'asd', '7815696ecbf1c96e6894b779456d330e', 'mmarinic@gmail.com', NULL, '1', 1, '2021-06-09 03:43:45', ''),
(6, 5, 'matija', 'matic', 'mmatic', 'c08kx7ehml', '291490268daf94382da18f412cf6b910896ca30087091a648afd7d7648e1dbb9', 'mmatic@gmail.com', NULL, '1', 3, '2021-06-09 19:15:22', ''),
(7, 5, 'bruno', 'brunic', 'bbrunic', 'asd', '7815696ecbf1c96e6894b779456d330e', 'bbrunic@gmail.com', NULL, '1', 0, '2021-06-09 19:15:59', ''),
(8, 1, 'brunoo', 'brunic', 'bbruniccaaaaa', 'asd', '7815696ecbf1c96e6894b779456d330e', 'bbrunic@gmail.com', NULL, '1', 0, '2021-06-09 21:29:44', ''),
(9, 2, 'pero', 'peric', 'ppericc', 'Asdf123#', 'ad07706b97957ed5bc787cfb39d5befe', 'pperic@gmail.com', NULL, '1', 0, '2021-06-09 23:37:27', ''),
(10, 1, 'Luka', 'Lukić', 'llukic', 'Asdf123#', 'ad07706b97957ed5bc787cfb39d5befe', 'llukic@gmail.com', NULL, '1', 0, '2021-06-09 23:51:52', ''),
(11, 1, 'Marija', 'Maric', 'mmaric', 'Asdf123#', '39c7656d68e7def302f689fb7aa963af3b2f6d2869c59776606b8365ce40c4f1', 'mmaric@gmail.com', NULL, '1', 0, '2021-06-09 23:55:45', ''),
(12, 5, 'dora', 'doric', 'ddoric', 'Asdf123#', '7172fe05d0a8c123a423d7139be54b22bd380931e3e457fc8e61258894f5fff9', 'ddoric@gmail.com', NULL, '1', 0, '2021-06-10 00:36:04', ''),
(13, 5, 'mara', 'maric', 'mmaricc', 'Asdf123#', 'bcb1810ad84cb958d679f6555123eb124ee1f7b51271183416cc4df2b778e4e2', 'mmaric@hotmail.com', NULL, '1', 0, '2021-06-10 00:37:25', ''),
(14, 1, 'anabela', 'anabelic', 'aanabelic', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'aanabelic@hotmail.com', NULL, '1', 0, '2021-06-10 00:38:50', ''),
(15, 1, 'ivans', 'sda', 'sasda', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'dsad@gmail.com', NULL, '1', 0, '2021-06-10 00:57:12', ''),
(16, 1, 'anabela', 'anabelic', 'aanabelicc', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'iparac@foi.hr', NULL, '1', 0, '2021-06-10 01:39:43', ''),
(17, 1, 'anabela', 'anabelicc', 'aaaaas', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'iparac@foi.hr', NULL, '1', 0, '2021-06-10 01:53:36', ''),
(18, 1, 'anabelaaa', 'asdaaa', 'aaaaasss', 'Asdf123$', '592c747cec88d6c2beb0d64049313b8c1d8a921881f66a347ffb0a92d472db99', 'bbrunic@gmail.com', NULL, '1', 0, '2021-06-10 21:47:34', ''),
(19, 1, 'anabelaaa', 'asdaaa', 'aaaaassss', 'Asdf123$', '592c747cec88d6c2beb0d64049313b8c1d8a921881f66a347ffb0a92d472db99', 'bbrunic@gmail.com', NULL, '1', 0, '2021-06-10 21:48:44', ''),
(20, 1, 'anabelaaaa', 'asdaaaa', 'aaaaassssa', 'Asdf123$', '592c747cec88d6c2beb0d64049313b8c1d8a921881f66a347ffb0a92d472db99', 'bbrunic@gmail.com', NULL, '1', 0, '2021-06-10 21:50:08', ''),
(21, 1, 'anabelaaaaa', 'asdaaaaa', 'aaaaassssaa', 'Asdf123$', '592c747cec88d6c2beb0d64049313b8c1d8a921881f66a347ffb0a92d472db99', 'bbrunic@gmail.com', NULL, '1', 0, '2021-06-10 21:50:23', ''),
(22, 5, 'toni', 'milun', 'tmilun', 'Asdf123$', '592c747cec88d6c2beb0d64049313b8c1d8a921881f66a347ffb0a92d472db99', 'tmilun@gmail.com', NULL, '1', 0, '2021-06-10 21:52:23', ''),
(23, 1, 'sadaaaa', 'asdaaaa', 'aaasda', 'Asdf123$', '592c747cec88d6c2beb0d64049313b8c1d8a921881f66a347ffb0a92d472db99', 'mmatic@gmail.coma', NULL, '1', 0, '2021-06-10 22:19:19', ''),
(24, 1, 'sad', 'sdada', 'sdada', 'Asdf123$', '592c747cec88d6c2beb0d64049313b8c1d8a921881f66a347ffb0a92d472db99', 'dsad@gmail.coma', NULL, '1', 0, '2021-06-10 22:27:39', ''),
(25, 1, 'Dado', 'Bego', 'dbego', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'ivky1234@gmail.com', NULL, '1', 0, '2021-06-11 00:50:39', ''),
(26, 3, 'bego', 'bego', 'bbego', 'p06ie2lvbt', 'a2c0593f14360debbf7f96309c59d9ffd45d28c64c21050bc14ef4e47b3c0f68', 'ivky1234@gmail.com', NULL, '1', 0, '2021-06-11 00:56:15', ''),
(27, 5, 'kifl', 'kifla', 'kkifla', '6d3jhaziq0', 'ecefe10655c1c7fc17a0921c3e4d220ca176ca983aa4ee7fe83b554ccdce939c', 'ivky1234@gmail.com', NULL, '1', 3, '2021-06-11 00:57:05', ''),
(28, 5, 'afro', 'afro', 'aafro', '96ncap4qbs', '77f2bebee75e82a38ec7b9d2fa77cb511cb2227a025350691a5abb2e01da2bfb', 'ivky1234@gmail.com', NULL, '1', 3, '2021-06-11 00:58:40', ''),
(29, 5, 'rado', 'radic', 'rradic', 'v9er7nwbks', '7fc3126acc23b40062626c9948ea8eaf255fd67cca176634d391de1a04826580', 'ivky1234@gmail.com', NULL, '1', 0, '2021-06-11 01:03:49', ''),
(30, 5, 'asa', 'asa', 'aasaa', 'vj8h24owr5', '9dbc54711eaf06fa78203d048eec22c4b02f13bed0c552eaa25aeb7739515788', 'ivky1234@gmail.com', NULL, '1', 4, '2021-06-11 01:06:12', ''),
(31, 5, 'Marko', 'Markic', 'mmarkicc', 'abrgw6xp5e', '93d636eb9ea50f62a2da74899570a942c1e29864fae81300d21b0a19b7dc90bf', 'ivky1234@gmail.com', NULL, '1', 3, '2021-06-11 01:15:41', ''),
(32, 5, 'almir', 'almira', 'aalmira', '0sey9g842c', '9caf7e0ded06b0ee1700859ae3c499f033504cbb0a50572f408e07a7674df86a', 'ivky1234@gmail.com', NULL, '1', 3, '2021-06-11 01:19:08', ''),
(33, 5, 'ana', 'begic', 'abegic', '5bic94z8k0', 'f9371f2308709a61c92aa8f01402b6f0531ec97bc17fa1c12c0ed0139ad544b0', 'ivky1234@gmail.com', NULL, '1', 3, '2021-06-11 01:39:20', ''),
(34, 5, 'ivan', 'parac', 'ipara', '96gblopkn5', 'af2c74aa85dc263cc118da78d47ed6940e927999f10f02edc1c1284c22d8d65f', 'ivky1234@gmail.com', NULL, '1', 3, '2021-06-11 01:52:05', 'c0a775217061855fd7e0364d79a9b43f'),
(35, 3, 'pilic', 'milic', 'pmilic', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'ivky1234@gmail.com', NULL, '1', 0, '2021-06-11 01:57:02', '4f19ae2d8ee3d0d70b26a84ad66119d3'),
(36, 1, 'James', 'Bond', 'Bond007', 'pokx4q5iyn', '9c981508b88c77080aa9d1252f2c22959a2244915ed50d1ed6133dc6ffdabb02', 'ivky1234@gmail.com', NULL, '1', 0, '2021-06-11 02:00:23', 'ad746d9f6155d73881a4a70fddd0864f'),
(37, 2, 'pilic', 'milic', 'pmilica', 'h1xt4zlfqw', 'a8b1524c1b40feba6595a45d5500767e060c55f3244ab64f4fefdffff17c5928', 'ivky1234@gmail.com', NULL, '1', 0, '2021-06-11 21:02:21', '9f0cb3038ea2a18e48020a2ddd60c111'),
(38, 3, 'Mate', 'Matic', 'Mmatic1', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'ivky1234@gmail.com', NULL, '1', 0, '2021-06-12 16:55:21', 'be273877e3e554ef080db13d6a71b33e'),
(39, 3, 'filip', 'filipović', 'ffilipovic', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'ivky1234@gmail.com', NULL, '1', 0, '2021-06-12 21:38:18', '00541f95bb672192d77b97485077f3de'),
(40, 3, 'filip', 'pavlis', 'fpavlis', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'ivky1234@gmail.com', NULL, '1', 1, '2021-06-14 20:31:52', '0cf8b755244f6a6762f85cdee39bb135'),
(41, 3, 'ante', 'antic', 'aanitcc', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'ivky1234@gmail.com', NULL, '0', 0, '2021-06-15 18:07:17', 'edece715a5bef14fd7bf9cd33af092c9'),
(42, 3, 'Matija', 'MarkoviÄ‡', 'mmarkovic', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'ivky1234@gmail.com', NULL, '1', 0, '2021-06-15 18:37:13', '18ea708251593196baedabb9407dbb17'),
(43, 3, 'Pavao', 'Prvi', 'pprvi', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'ivky1234@gmail.com', NULL, '1', 0, '2021-06-15 18:40:45', 'e0732f8fef2e08477d342e81470e195b'),
(44, 3, 'Pavao', 'Treci', 'ptreci', '94fbu8e72z', '895e950ee4b6abad59518a70b49d013eed3ce272807b77819b22a48956139b3d', 'ivky1234@hotmail.com', NULL, '1', 0, '2021-06-15 22:30:20', '10526c5c2210d69fd06c1a6706638c1d'),
(45, 3, 'Marko', 'Marulic', 'mmarulic', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'iparac@foi.hr', NULL, '1', 0, '2021-06-16 06:00:21', 'c7a56a1ecc9453c8c40cee4dcf9985e1'),
(46, 5, 'Petar', 'Pedic', 'ppedic', '2bot0acepf', '60285226f821dd4fe7afef4cae86dfb35f19f02fae94b4d1c810e79f850220c2', 'iparac@foi.hr', NULL, '1', 3, '2021-06-16 06:10:34', 'bd2d848492a942b22e96c454ae0e0f6e'),
(47, 3, 'Mile', 'Milic', 'mmilic', 'Asdf123#', 'cea514526fade8c68458ed69a8e75854b73db7d02b648b4ef8e0ac536cda10b2', 'ivky1234@gmail.com', NULL, '1', 0, '2021-06-16 14:58:16', 'd4cb891f1d7624c82d44f1717d368dad');

-- --------------------------------------------------------

--
-- Table structure for table `materijal`
--

CREATE TABLE `materijal` (
  `materijal_id` int(11) NOT NULL,
  `vrsta_materijala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materijal`
--

INSERT INTO `materijal` (`materijal_id`, `vrsta_materijala`) VALUES
(1, 'Slika'),
(2, 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija_termin`
--

CREATE TABLE `rezervacija_termin` (
  `rezervacija_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `status_rezervacija_termina_id` int(11) NOT NULL,
  `broj_djece` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `grupa_grupa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rezervacija_termin`
--

INSERT INTO `rezervacija_termin` (`rezervacija_id`, `korisnik_id`, `status_rezervacija_termina_id`, `broj_djece`, `datum`, `grupa_grupa_id`) VALUES
(3, 2, 1, 3, '2060-06-22 00:00:00', 3),
(15, 2, 3, 444, '2021-06-16 00:00:00', 2),
(18, 2, 3, 111, '0000-00-00 00:00:00', 2),
(21, 1, 2, 11, '2021-06-23 00:00:00', 1),
(22, 1, 2, 21, '2021-07-01 00:00:00', 3),
(23, 1, 3, 23, '2021-07-02 00:00:00', 2),
(26, 0, 3, 1, '2021-07-01 00:00:00', 2),
(30, 4, 1, 565, '2021-07-01 00:00:00', 1),
(33, 7, 3, 43, '2021-07-02 00:00:00', 2),
(35, 8, 2, 12, '2021-06-17 00:00:00', 2),
(36, 13, 3, 54, '2021-06-30 00:00:00', 2),
(37, 6, 2, 31, '2021-06-29 00:00:00', 1),
(38, 19, 1, 41, '2021-06-30 10:17:43', 1),
(39, 36, 1, 21, '2021-06-23 00:00:00', 2),
(40, 23, 3, 332, '2021-06-18 15:23:48', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rodendan`
--

CREATE TABLE `rodendan` (
  `rodendan_id` int(11) NOT NULL,
  `rezervacija_termin_id` int(11) NOT NULL,
  `tema_rođendan_id` int(11) NOT NULL,
  `dostupno` varchar(25) NOT NULL,
  `datum_odrzavanja` datetime NOT NULL,
  `kontakt_telefon` varchar(45) NOT NULL,
  `grupa_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rodendan`
--

INSERT INTO `rodendan` (`rodendan_id`, `rezervacija_termin_id`, `tema_rođendan_id`, `dostupno`, `datum_odrzavanja`, `kontakt_telefon`, `grupa_id`, `korisnik_id`, `ime`) VALUES
(1, 21, 1, 'Da', '2021-06-03 09:35:17', '091-321-324', 1, 32, 'Pirati'),
(3, 35, 4, 'Da', '2021-06-24 00:00:00', '091-312-543', 2, 8, 'Rodendan 2'),
(4, 21, 3, 'Da', '2021-06-23 00:00:00', '091-312-543', 1, 16, 'Rodendan 3'),
(5, 33, 5, 'Ne', '2021-06-25 08:34:11', '091-312-543', 3, 9, 'Rodendan 4'),
(6, 35, 6, 'Da', '2021-06-11 15:19:48', '091-312-543', 1, 36, 'Rodendan 5'),
(7, 35, 5, 'Da', '2021-07-08 14:34:29', '091-312-543', 2, 44, 'Rodendan 6'),
(8, 36, 4, 'Da', '2021-06-24 13:20:40', '091-312-543', 2, 39, 'Rodendan 7'),
(9, 23, 5, 'Da', '2021-06-10 10:24:17', '091-312-543', 1, 37, 'Rodendan 8'),
(10, 23, 6, 'Da', '2021-06-30 00:00:00', '091-312-543', 2, 22, 'Rodendan 9'),
(11, 30, 7, 'Da', '2021-06-17 00:00:00', '091-312-543', 2, 18, 'Rodendan 10'),
(12, 36, 4, 'Da', '2021-06-17 00:00:00', '091-312-543', 2, 18, 'Rodendan 11'),
(13, 35, 5, 'Da', '2021-06-03 00:00:00', '091-312-543', 2, 10, 'Rodendan 12'),
(14, 18, 3, 'Da', '2021-06-23 00:00:00', '091-312-543', 1, 7, 'Rodendan 13'),
(15, 33, 5, 'Da', '2021-06-25 00:00:00', '091-312-543', 2, 18, 'Rodendan 14'),
(16, 33, 4, 'Da', '2021-06-30 00:00:00', '091-312-543', 2, 27, 'Rodendan 15'),
(17, 22, 3, 'Da', '2021-06-10 00:00:00', '091-312-543', 2, 41, 'Rodendan 16');

-- --------------------------------------------------------

--
-- Table structure for table `sigurnosna_kopija`
--

CREATE TABLE `sigurnosna_kopija` (
  `sigurnosna_kopija_id` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `sql_skripta_rodendan` text NOT NULL,
  `sql_skripta_galerija` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sigurnosna_kopija`
--

INSERT INTO `sigurnosna_kopija` (`sigurnosna_kopija_id`, `datum`, `sql_skripta_rodendan`, `sql_skripta_galerija`) VALUES
(1, '2021-06-18 00:00:00', 'skripta1_rodendan', 'skripta1_galerija'),
(2, '2021-06-18 00:00:00', 'skripta2_rodendan', 'skripta2_galerija'),
(3, '2021-06-24 00:00:00', 'skripta3_rodendan', 'skripta3_galerija'),
(4, '2021-06-24 00:00:00', 'skripta4_rodendan', 'skripta3_galerija');

-- --------------------------------------------------------

--
-- Table structure for table `status_rezervacija_termina`
--

CREATE TABLE `status_rezervacija_termina` (
  `status_rezervacija_termina` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `opis_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_rezervacija_termina`
--

INSERT INTO `status_rezervacija_termina` (`status_rezervacija_termina`, `status`, `opis_status`) VALUES
(1, 'Potvrdi', 'Potvrđen termin'),
(2, 'Odbijeno', 'Odbijena rezervacija'),
(3, 'Ceka odluku', 'Nije niti potvrđeno niti odbijeno');

-- --------------------------------------------------------

--
-- Table structure for table `tema_rođendan`
--

CREATE TABLE `tema_rođendan` (
  `tema_rodendan_id` int(11) NOT NULL,
  `ime_teme` varchar(255) NOT NULL,
  `broj_djece` varchar(45) NOT NULL,
  `opis_teme` text NOT NULL,
  `cijena` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tema_rođendan`
--

INSERT INTO `tema_rođendan` (`tema_rodendan_id`, `ime_teme`, `broj_djece`, `opis_teme`, `cijena`) VALUES
(1, 'Pirati', '25', 'Tema pirata', '1600kn'),
(2, 'Auti', '50', 'Tema trkačih auta', '1800kn'),
(3, 'Superheroji', '100', 'Superheroji', '3000kn'),
(4, 'Svemir', '50', 'Svemir i vanzemaljci', '1500kn'),
(5, 'Barbie', '25', 'Barbie', '1900kn'),
(6, 'Ben 10', '75', 'Svemir i vanzemaljci', '2500kn'),
(7, 'disney', '60', 'Disney', '4000kn');

-- --------------------------------------------------------

--
-- Table structure for table `tip_dnevnik`
--

CREATE TABLE `tip_dnevnik` (
  `tip_dnevnik_id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tip_dnevnik`
--

INSERT INTO `tip_dnevnik` (`tip_dnevnik_id`, `naziv`) VALUES
(1, 'registracija'),
(2, 'Uspjesna prijava + Zapamti Me'),
(3, 'Uspjesna prijava bez zapamti me'),
(4, 'Neuspjesna prijava + zapamti me'),
(5, 'Neuspjesna prijava bez zapamti me'),
(6, 'zakljucan racun + zapamti me'),
(7, 'zakljucan racun bez zapamti me'),
(8, 'odjava'),
(9, 'otvorena registracija_pregledaj'),
(10, 'unesena nova registracija'),
(11, 'rezervacija update'),
(12, 'rezervacija obrisi'),
(13, 'moderator/administrator pregledava rezervacije'),
(14, 'moderator/administrator potvrduje/odbija rezervaciju'),
(15, 'Oporavak lozinke'),
(16, 'moderator/administrator briše rezervacije'),
(17, 'aktivacija racuna'),
(18, 'pokušaj vec aktiviranog racuna'),
(19, 'pregledavanje dokumentacija'),
(20, 'otvaranje pocetne stranice'),
(21, 'dodjela moderatora'),
(22, 'otkljucavanje korisnika'),
(23, 'zakljucavanje korisnika');

-- --------------------------------------------------------

--
-- Table structure for table `uloga_korisnik`
--

CREATE TABLE `uloga_korisnik` (
  `uloga_id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `opis_uloga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uloga_korisnik`
--

INSERT INTO `uloga_korisnik` (`uloga_id`, `ime`, `opis_uloga`) VALUES
(1, 'Administrator', 'Uloga koja ima sva prava.'),
(2, 'Moderator', 'Korisnik sa pravima između administratora i običnog korisnika'),
(3, 'Obican korisnik', 'Korisnik sa ograničenim pravima'),
(4, 'neregistrirani korisnik', 'Neregistrirani korisnik'),
(5, 'Zakljucani korisnik', 'Nakon 3 netočna pokušaja prijavljivanja, zaključa se korisnik.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dnevnik`
--
ALTER TABLE `dnevnik`
  ADD PRIMARY KEY (`dnevnik_id`,`korisnik_id`,`tip_dnevnik_id`),
  ADD KEY `fk_dnevnik_korisnik1_idx` (`korisnik_id`),
  ADD KEY `fk_dnevnik_tip_dnevnik1_idx` (`tip_dnevnik_id`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
  ADD PRIMARY KEY (`galerija_id`,`korisnik_id`),
  ADD KEY `fk_galerija_materijal1_idx` (`materijal_id`),
  ADD KEY `fk_galerija_korisnik1_idx` (`korisnik_id`);

--
-- Indexes for table `grupa`
--
ALTER TABLE `grupa`
  ADD PRIMARY KEY (`grupa_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD KEY `fk_korisnik_uloga_idx` (`uloga_id`);

--
-- Indexes for table `materijal`
--
ALTER TABLE `materijal`
  ADD PRIMARY KEY (`materijal_id`);

--
-- Indexes for table `rezervacija_termin`
--
ALTER TABLE `rezervacija_termin`
  ADD PRIMARY KEY (`rezervacija_id`,`korisnik_id`),
  ADD KEY `fk_rezervacija_termin_status_rezervacija_termina1_idx` (`status_rezervacija_termina_id`),
  ADD KEY `fk_rezervacija_termin_korisnik1_idx` (`korisnik_id`),
  ADD KEY `fk_rezervacija_termin_grupa1_idx` (`grupa_grupa_id`);

--
-- Indexes for table `rodendan`
--
ALTER TABLE `rodendan`
  ADD PRIMARY KEY (`rodendan_id`,`rezervacija_termin_id`,`tema_rođendan_id`),
  ADD KEY `fk_rođendan_rezervacija_termin1_idx` (`rezervacija_termin_id`),
  ADD KEY `fk_rođendan_tema_rođendan1_idx` (`tema_rođendan_id`),
  ADD KEY `fk_grupa_id` (`grupa_id`),
  ADD KEY `fk_korisnik_id` (`korisnik_id`);

--
-- Indexes for table `sigurnosna_kopija`
--
ALTER TABLE `sigurnosna_kopija`
  ADD PRIMARY KEY (`sigurnosna_kopija_id`);

--
-- Indexes for table `status_rezervacija_termina`
--
ALTER TABLE `status_rezervacija_termina`
  ADD PRIMARY KEY (`status_rezervacija_termina`);

--
-- Indexes for table `tema_rođendan`
--
ALTER TABLE `tema_rođendan`
  ADD PRIMARY KEY (`tema_rodendan_id`);

--
-- Indexes for table `tip_dnevnik`
--
ALTER TABLE `tip_dnevnik`
  ADD PRIMARY KEY (`tip_dnevnik_id`);

--
-- Indexes for table `uloga_korisnik`
--
ALTER TABLE `uloga_korisnik`
  ADD PRIMARY KEY (`uloga_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dnevnik`
--
ALTER TABLE `dnevnik`
  MODIFY `dnevnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `galerija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `grupa`
--
ALTER TABLE `grupa`
  MODIFY `grupa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `materijal`
--
ALTER TABLE `materijal`
  MODIFY `materijal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rezervacija_termin`
--
ALTER TABLE `rezervacija_termin`
  MODIFY `rezervacija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `rodendan`
--
ALTER TABLE `rodendan`
  MODIFY `rodendan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `sigurnosna_kopija`
--
ALTER TABLE `sigurnosna_kopija`
  MODIFY `sigurnosna_kopija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status_rezervacija_termina`
--
ALTER TABLE `status_rezervacija_termina`
  MODIFY `status_rezervacija_termina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tema_rođendan`
--
ALTER TABLE `tema_rođendan`
  MODIFY `tema_rodendan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tip_dnevnik`
--
ALTER TABLE `tip_dnevnik`
  MODIFY `tip_dnevnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `uloga_korisnik`
--
ALTER TABLE `uloga_korisnik`
  MODIFY `uloga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dnevnik`
--
ALTER TABLE `dnevnik`
  ADD CONSTRAINT `fk_dnevnik_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dnevnik_tip_dnevnik1` FOREIGN KEY (`tip_dnevnik_id`) REFERENCES `tip_dnevnik` (`tip_dnevnik_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galerija`
--
ALTER TABLE `galerija`
  ADD CONSTRAINT `fk_galerija_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_galerija_materijal1` FOREIGN KEY (`materijal_id`) REFERENCES `materijal` (`materijal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_uloga` FOREIGN KEY (`uloga_id`) REFERENCES `uloga_korisnik` (`uloga_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezervacija_termin`
--
ALTER TABLE `rezervacija_termin`
  ADD CONSTRAINT `fk_rezervacija_termin_grupa1` FOREIGN KEY (`grupa_grupa_id`) REFERENCES `grupa` (`grupa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rezervacija_termin_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rezervacija_termin_status_rezervacija_termina1` FOREIGN KEY (`status_rezervacija_termina_id`) REFERENCES `status_rezervacija_termina` (`status_rezervacija_termina`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rodendan`
--
ALTER TABLE `rodendan`
  ADD CONSTRAINT `fk_grupa_id` FOREIGN KEY (`grupa_id`) REFERENCES `grupa` (`grupa_id`),
  ADD CONSTRAINT `fk_korisnik_id` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`),
  ADD CONSTRAINT `fk_rođendan_rezervacija_termin1` FOREIGN KEY (`rezervacija_termin_id`) REFERENCES `rezervacija_termin` (`rezervacija_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rođendan_tema_rođendan1` FOREIGN KEY (`tema_rođendan_id`) REFERENCES `tema_rođendan` (`tema_rodendan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
