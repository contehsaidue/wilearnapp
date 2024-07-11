-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2021 at 03:07 AM
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
-- Database: `dp_wilearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategories`
--

DROP TABLE IF EXISTS `tblcategories`;
CREATE TABLE IF NOT EXISTS `tblcategories` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategories`
--

INSERT INTO `tblcategories` (`categoryid`, `categoryname`) VALUES
(1, 'Technology'),
(2, 'Engineering'),
(3, 'Medicine'),
(4, 'Law'),
(5, 'Senior School');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

DROP TABLE IF EXISTS `tblcomments`;
CREATE TABLE IF NOT EXISTS `tblcomments` (
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) DEFAULT NULL,
  `visitorid` int(11) DEFAULT NULL,
  `comment` text,
  `date_commented` date DEFAULT NULL,
  PRIMARY KEY (`commentid`),
  KEY `postid` (`postid`),
  KEY `visitorid` (`visitorid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`commentid`, `postid`, `visitorid`, `comment`, `date_commented`) VALUES
(1, 14, 2, 'A word stress Is when speakers pronounce a particular syllable with more emphasis or force than the other syllables. For example the word â€˜â€™tomatoâ€™â€™ we realize that the second syllable â€˜â€™MAâ€™â€™ carries prominence than the others. We can therefore say the middle syllable is stress. On the other hand, sentence stress refers to a particular word that is given prominence in comparison to the rest of the words. For example if we say â€“ it was awesome, the main stress is laid on the word â€˜â€™awesome', '2021-10-26'),
(2, 14, 2, 'speakers lay on specific syllables of a word or normally a specific word within a sentence. This means that stress occurs in two ways at word level and sentence level. A word stress Is when speakers pronounce a particular syllable with more emphasis or force than the other syllables. For example the word â€˜â€™tomatoâ€™â€™ we realize that the second syllable', '2021-10-26'),
(3, 12, 2, 'nice work chase', '2021-10-26'),
(4, 14, 2, 'finally it worked!!!', '2021-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `tblfriendrequest`
--

DROP TABLE IF EXISTS `tblfriendrequest`;
CREATE TABLE IF NOT EXISTS `tblfriendrequest` (
  `friendrequestid` int(11) NOT NULL AUTO_INCREMENT,
  `outgoingsenderid` int(11) DEFAULT NULL,
  `incomingreceiverid` int(11) DEFAULT NULL,
  PRIMARY KEY (`friendrequestid`),
  KEY `outgoingsenderid` (`outgoingsenderid`),
  KEY `incomingreceiverid` (`incomingreceiverid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfriendrequest`
--

INSERT INTO `tblfriendrequest` (`friendrequestid`, `outgoingsenderid`, `incomingreceiverid`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 1, 2),
(4, 1, 2),
(5, 3, 1),
(6, 3, 2),
(8, 2, 1),
(9, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblpostarticle`
--

DROP TABLE IF EXISTS `tblpostarticle`;
CREATE TABLE IF NOT EXISTS `tblpostarticle` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `date_published` date DEFAULT NULL,
  PRIMARY KEY (`postid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpostarticle`
--

INSERT INTO `tblpostarticle` (`postid`, `userid`, `image`, `title`, `body`, `date_published`) VALUES
(1, NULL, '../assets/articleimages/IMG-20210310-WA0017.jpg', 'First blog post', 'type article here... and see it come to life', '2021-10-23'),
(2, 2, '../assets/articleimages/IMG-20210319-WA0038.jpg', 'Sammy library hour', 'type article here... lets get going', '2021-10-23'),
(3, 2, '../assets/articleimages/IMG-20210310-WA0011.jpg', 'with my man chase edited again', '   type article here... third year loading', '2021-10-23'),
(4, 1, '../assets/articleimages/IMG-20210410-WA0015.jpg', 'this is chasey chase post', 'type article here...  seconteh', '2021-10-23'),
(5, 1, '../assets/articleimages/IMG-20210311-WA0024.jpg', 'try new has been updated by chasey chase', 'type article here... okay', '2021-10-23'),
(13, 2, '../assets/articleimages/course-1.jpg', 'Web development 2.5', 'Join the webinar session on web development', '2021-10-26'),
(7, 1, '../assets/articleimages/IMG-20210319-WA0045.jpg', 'try new has been updated session message', 'type article here... ', '2021-10-23'),
(8, 1, '../assets/articleimages/IMG-20210319-WA0037.jpg', 'try new has been updated again session', 'type article here... ', '2021-10-23'),
(14, 2, '../assets/articleimages/course-1.jpg', 'Web development 3.0', '                     DIFFERENCES BETWEEN STRESS AND INTONATION\r\nStress refers to the emphasis speakers lay on specific syllables of a word or normally a specific word within a sentence. This means that stress occurs in two ways at word level and sentence level.\r\nA word stress Is when speakers pronounce a particular syllable with more emphasis or force than the other syllables. For example the word â€˜â€™tomatoâ€™â€™ we realize that the second syllable â€˜â€™MAâ€™â€™ carries prominence than the others. We can therefore say the middle syllable is stress.\r\nOn the other hand, sentence stress refers to a particular word that is given prominence in comparison to the rest of the words. For example if we say â€“ it was awesome, the main stress is laid on the word â€˜â€™awesomeâ€™â€™.\r\n', '2021-10-26'),
(10, 1, '../assets/articleimages/IMG-20210310-WA0010.jpg', 'Article feed', 'type article here... testing feed post', '2021-10-23'),
(11, 3, '../assets/articleimages/bg-masthead.jpg', 'Creed', 'Secant Chase', '2021-10-24'),
(12, 1, '../assets/articleimages/hero-bg.jpg', 'Virtual Reality 2.0', ' Trying out the virtual reality as a new stepping stone in human capital development', '2021-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbltopics`
--

DROP TABLE IF EXISTS `tbltopics`;
CREATE TABLE IF NOT EXISTS `tbltopics` (
  `topicid` int(11) NOT NULL AUTO_INCREMENT,
  `topiccreator` int(11) DEFAULT NULL,
  `topicname` varchar(255) DEFAULT NULL,
  `topiccategory` int(11) DEFAULT NULL,
  PRIMARY KEY (`topicid`),
  KEY `topiccreator` (`topiccreator`),
  KEY `topiccategory` (`topiccategory`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltopics`
--

INSERT INTO `tbltopics` (`topicid`, `topiccreator`, `topicname`, `topiccategory`) VALUES
(1, 3, 'Computer Science', 1),
(2, 3, 'Computer Science', 1),
(3, 3, 'Algorithm', 1),
(4, 1, 'Medical Law', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserregistration`
--

DROP TABLE IF EXISTS `tbluserregistration`;
CREATE TABLE IF NOT EXISTS `tbluserregistration` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluserregistration`
--

INSERT INTO `tbluserregistration` (`userid`, `username`, `firstname`, `middlename`, `lastname`, `email`, `gender`, `dateofbirth`, `password`, `photo`) VALUES
(1, '@chaseychase', 'Saidu', 'Emmanuel', 'Conteh', 'csaidue@gmail.com', 'Male', '2001-01-03', '1234', 'assets/userregisteruploads/IMG-20210325-WA0002.jpg'),
(2, '@sammy', 'Samuel', 'JT', 'Lehbie', 'jtlehbie@gmail.com', 'Male', '1998-10-02', '1234', 'assets/userregisteruploads/IMG-20210319-WA0040.jpg'),
(3, '@chase', 'Secant', '', 'Chase', 'secant@gmail.com', 'Male', '2001-01-03', '1234', 'assets/userregisteruploads/IMG-20210528-WA0053.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
