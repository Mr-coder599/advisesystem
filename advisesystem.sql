-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2023 at 09:58 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advisesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `id` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(500) NOT NULL,
  `type` varchar(200) NOT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `author` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `note` varchar(500) NOT NULL,
  `designated` varchar(200) NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `sender` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `note`, `designated`, `file`, `sender`, `date`) VALUES
(1, 'We welcome you all', 'We thank God for the completion of this program today.', 'All', 'Ajimoh Film Producer.pptx', 'Ademola Quadri Adeshina', '2021-07-11 02:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `middlename` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `access` varchar(60) NOT NULL DEFAULT 'staff',
  `gender` varchar(60) NOT NULL,
  `status` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active',
  `department` varchar(200) DEFAULT NULL,
  `about` varchar(500) DEFAULT NULL,
  `image` varchar(200) DEFAULT 'avatar.png',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `firstname`, `lastname`, `middlename`, `username`, `email`, `password`, `phone`, `access`, `gender`, `status`, `department`, `about`, `image`, `date`) VALUES
(1, 'Ademola', 'Quadri', 'Adeshina', 'IbnIsmaeel', 'ademolaquadri@gmail.com', 'be16dc0519bab54e5b806004a22e315f', '08176497281', 'admin', 'male', 'active', NULL, NULL, NULL, '2021-07-11 14:09:52'),
(2, 'Ademola', 'Muhydeen', 'Akolade', 'Muhydeen', 'ademolamuhydeen@gmail.com', 'be16dc0519bab54e5b806004a22e315f', '08176497281', 'staff', 'male', 'active', NULL, NULL, NULL, '2021-07-11 14:11:01'),
(3, 'LAMID', 'ALIMOT', 'ABIOLA', 'admin', 'hammedmessi@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '07035352446', 'staff', 'male', 'inactive', 'Computer Science', NULL, 'avatar.png', '2023-04-01 05:35:57'),
(4, 'SALAMI ', 'KOLADE', 'KUNLE', 'SALAMI', 'salami@gmail.com', 'ad7693db67149b846d36237cc2d31564', '08144509192', 'staff', 'male', 'inactive', 'Computer Science', NULL, 'avatar.png', '2023-05-16 16:22:12'),
(5, 'kolade', 'solape', 'kolade', 'kolade', 'kolade@gmail.com', 'a361bcc1ece2673ae67465b2621d2e3f', '00000000000', 'staff', 'male', 'active', 'Computer Science', NULL, 'avatar.png', '2023-05-16 16:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `matricno` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `picture` varchar(200) DEFAULT 'avatar.png',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `matricno`, `name`, `email`, `password`, `phone`, `department`, `picture`, `date`) VALUES
(1, 'CS20180100945', 'Ademola Quadri', 'ademolaquadri@gmail.com', 'be16dc0519bab54e5b806004a22e315f', '08176497281', '', NULL, '2021-07-11 01:47:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
