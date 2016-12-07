-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2016 at 07:57 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursa_darbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `ID` int(11) NOT NULL,
  `nosaukums` text NOT NULL,
  `teksts` text NOT NULL,
  `lietotajs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`ID`, `nosaukums`, `teksts`, `lietotajs`) VALUES
(2, '', '', 3),
(5, 'Tests', 'Å im vajadzÄ“tu parÄdÄ«ties augÅ¡Ä ;)', 3),
(16, 'Beidzot', 'ArÄ« komentÄru dzÄ“Å¡ana srtÄdÄ!\r\nTaga atliek komentÄru rediÄ£Ä“Å¡ana un warp text Å¡ajÄ kastÄ“ :D', 3),
(20, '1st comment', 'this is first second test user comment test', 10),
(21, '', '', 10),
(23, '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lietotaji`
--

CREATE TABLE `lietotaji` (
  `ID` int(11) NOT NULL,
  `vards` text,
  `uzvards` text,
  `epasts` text,
  `parole` text,
  `dzimsanas_datums` text,
  `valsts` text,
  `dzimums` text,
  `telefons` varchar(20) NOT NULL,
  `bilde` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lietotaji`
--

INSERT INTO `lietotaji` (`ID`, `vards`, `uzvards`, `epasts`, `parole`, `dzimsanas_datums`, `valsts`, `dzimums`, `telefons`, `bilde`) VALUES
(3, 'Juris', 'Jenerts', 'jurisjenerts@inbox.lv', '5541c7b5a06c39b267a5efae6628e003', '1997-09-11', 'Latvija', 'AnonÄ«ms', '20127338', ''),
(4, 'Juris2', 'Jenerts2', 'jurisjenerts@inbox.lv', 'c2c3c5e06cfc641edae43937600f9351', '1997-09-11', 'Latvija', 'Unknown', '', ''),
(5, 'Juris', 'Jenerts', 'Admin@epasts.lv', 'd4fc8813c7d0510367a09ffd307e41b9', '2016-11-16', 'Okupantu zeme', 'Male', '', ''),
(6, 'Juris', 'Jenerts', 'jurisjenerts@inbox.lv', '5541c7b5a06c39b267a5efae6628e003', '', 'Latvija', 'Female', '', ''),
(7, 'Juris2', 'Igaunis', 'jurisjenerts@inbox.lv', '5541c7b5a06c39b267a5efae6628e003', '2016-11-26', 'Latvija', 'Male', '', ''),
(8, 'qq', 'qq', 'jurisjenerts@inbox.lv', '5541c7b5a06c39b267a5efae6628e003', '', 'Latvija', 'AnonÄ«ms', '', ''),
(9, 'fff', 'Jenerts', 'jurisjenerts@inbox.lv', '5541c7b5a06c39b267a5efae6628e003', '1111-11-11', 'Latvija', 'AnonÄ«ms', '', ''),
(10, '11', '11', 'siers@inbox.lv', '47bce5c74f589f4867dbd57e9ca9f808', '1111-11-11', 'Latvija', 'VÄ«rietis', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `lietotajs` (`lietotajs`);

--
-- Indexes for table `lietotaji`
--
ALTER TABLE `lietotaji`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `lietotaji`
--
ALTER TABLE `lietotaji`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`lietotajs`) REFERENCES `lietotaji` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
