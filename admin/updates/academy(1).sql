-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2021 at 04:19 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `pid` varchar(200) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `user` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `pid`, `comment`, `user`, `date`) VALUES
(1, '1', 'Good', 'CNA', '2021-05-24 09:48:02'),
(2, '1', 'Welldone sir', 'CNA', '2021-05-25 14:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `languages` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `code`, `unit`, `level`, `languages`, `duration`, `department`) VALUES
(1, 'Introduction to Programming', 'PRG101', '2.0', 'Beginner', 'HTML,JS & PHP', '1 month', 'PHPweb'),
(2, 'Introduction to website designing', 'PRG102', '2.0', 'Beginner', 'HTML,JS & PHP', '1 month', 'PHPweb');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `department` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `faculty` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `description`, `faculty`, `status`) VALUES
(1, 'PHPweb', 'For designing a php powered website', 'Website Designing', 'inactive'),
(2, 'Pyweb', 'For designing a website using Python CGI', 'Website Designing', 'inactive'),
(3, 'Laravel', 'Php Framework for website design', 'Website Designing', 'inactive'),
(4, 'Django', 'Python Framework for website design', 'Website Designing', 'inactive'),
(5, 'Angular', 'Javascript Framework for website design ', 'Website Designing', 'inactive'),
(6, 'Nodejs', 'Javascript Framework for website design', 'Website Designing', 'inactive'),
(7, 'Vuejs', 'Javascript Framework for website design', 'Website Designing', 'inactive'),
(8, 'React', 'Javascript Framework for website design', 'Website Designing', 'inactive'),
(9, 'JSweb', 'Javascript and html frontend for mobile application design', 'Mobile programming', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

DROP TABLE IF EXISTS `faculties`;
CREATE TABLE IF NOT EXISTS `faculties` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `faculty` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty`, `description`, `icon`) VALUES
(1, 'Website Designing', 'For all kind of website design', 'c6.jpg'),
(2, 'Mobile programming', 'For all kind of smartphone application.', 'images.jpeg'),
(3, 'Software development', 'For desktop application packages programming', '105160304_muslim.jpg'),
(4, 'Python', 'For any programming related to Python', 'world-people-25464689.jpg'),
(5, 'JavaScript', 'For any programming related to Javascript', '27376945-business-people-are-standing-on-a-world-globe-vector-illustration.jpg'),
(6, 'Game development', 'For game programming or making', '2b10c29dd08b7ee38c36366c7d2b3228.jpg'),
(7, 'Graphics design', 'For all kind of graphics design', 'IMG_20150729_181923.jpg'),
(8, '3D Animation', 'For all kind of 3D animation work', 'hero-image.png'),
(9, 'Digital Marketing', 'For  internet or digital marketing', '2goygth - Copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

DROP TABLE IF EXISTS `lectures`;
CREATE TABLE IF NOT EXISTS `lectures` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `topic` varchar(200) NOT NULL,
  `note` varchar(5000) NOT NULL,
  `daye` varchar(200) NOT NULL,
  `lecturer` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `audio` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `topic`, `note`, `daye`, `lecturer`, `course`, `level`, `department`, `image`, `audio`, `video`) VALUES
(1, 'What is Computer programming', 'aaaaaaaaaaaaaaaaaaaaaaa', '18-May-2021', 'Ademola Quadri', 'PRG101', 'Beginner', 'PHPweb', '2b10c29dd08b7ee38c36366c7d2b3228.jpg', 'http://www.share.com/aud.mp3', 'http://www.share.com/aud.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `level` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`, `duration`) VALUES
(1, 'Beginner', '1 month'),
(2, 'Intermidiate', '1 month'),
(3, 'Professional', '1 month');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

DROP TABLE IF EXISTS `responses`;
CREATE TABLE IF NOT EXISTS `responses` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `cid` int(60) NOT NULL,
  `pid` int(200) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `user` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `cid`, `pid`, `comment`, `user`, `date`) VALUES
(1, 1, 1, 'You sure', 'CNA', '2021-05-25 14:43:33'),
(2, 1, 1, 'really', 'CNA', '2021-05-25 16:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `staffid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `access` varchar(200) NOT NULL DEFAULT 'staff',
  `gender` varchar(200) NOT NULL DEFAULT 'Male',
  `phone` varchar(200) NOT NULL DEFAULT '+234',
  `image` varchar(200) NOT NULL DEFAULT 'staffs.png',
  `status` varchar(200) NOT NULL DEFAULT 'inactive',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `staffid`, `name`, `email`, `password`, `access`, `gender`, `phone`, `image`, `status`, `date`) VALUES
(1, 'CNA-0001', 'Ademola Quadri', 'ademolaquadri@gmail.com', 'be16dc0519bab54e5b806004a22e315f', 'staff', 'Male', '+234', 'staffs.png', 'inactive', '2021-05-09 13:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `studentid` varchar(200) NOT NULL DEFAULT 'CNA',
  `gender` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'inactive',
  `image` varchar(200) NOT NULL DEFAULT 'student.png',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `faculty` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `dob` varchar(200) DEFAULT NULL,
  `code` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `middlename`, `phone`, `studentid`, `gender`, `email`, `level`, `department`, `password`, `status`, `image`, `date`, `address`, `country`, `state`, `faculty`, `city`, `dob`, `code`) VALUES
(6, 'Ademola', 'Muhydeen', 'Adeshina', '08176497281', 'CNA', 'male', 'ademolaquadri@gmail.com', 'Beginner', 'PHPweb', 'be16dc0519bab54e5b806004a22e315f', 'active', 'student.png', '2021-05-07 12:04:34', 'Ijagemo', 'Afganistan', 'Lagos', 'Website Designing', 'Alimosho', '05/19/2021', '522063708 ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
