-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 01:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_notes`
--
DROP DATABASE IF EXISTS `gestion_notes`;
CREATE DATABASE IF NOT EXISTS `gestion_notes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gestion_notes`;

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE `enseignant` (
  `num_ens` int(11) NOT NULL,
  `nom_ens` varchar(60) NOT NULL,
  `num_matr` varchar(15) NOT NULL,
  `grade` varchar(15) NOT NULL,
  `anciennete` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`num_ens`, `nom_ens`, `num_matr`, `grade`, `anciennete`) VALUES
(1, 'Amrouch Mustafa', 'AZ451124', 'PL1', '2ans'),
(4, 'Ali Elmazouary', 'ZF27522224', 'PL5', '3ans'),
(5, 'Sabour Abderahim', 'XYZ15482100', 'Z10', '5ans');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE `etudiant` (
  `num_etu` int(11) NOT NULL,
  `nom_etu` varchar(60) NOT NULL,
  `CNE` varchar(12) NOT NULL,
  `date_naiss` date NOT NULL,
  `sexe` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`num_etu`, `nom_etu`, `CNE`, `date_naiss`, `sexe`) VALUES
(10, 'Ayoub Maghdaoui', 'D143027395', '2020-04-01', 'homme'),
(11, 'Ahmed Idmouh', 'D147852221', '2000-05-01', 'homme'),
(12, 'Zakariya Bootegra', 'Z147852222', '2020-05-15', 'homme');

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE `matiere` (
  `num_mat` int(11) NOT NULL,
  `nom_mat` varchar(50) NOT NULL,
  `coef` int(11) NOT NULL,
  `_num_ens` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`num_mat`, `nom_mat`, `coef`, `_num_ens`) VALUES
(2, 'PHP et programmation web', 3, 1),
(3, 'Génie Logiciel', 2, 4),
(4, 'Langage C et Algorithmique', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `_num_etu` int(11) NOT NULL,
  `_num_mat` int(11) NOT NULL,
  `note` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `_num_etu`, `_num_mat`, `note`) VALUES
(127, 10, 4, 17),
(128, 11, 4, 11),
(129, 12, 4, 10),
(130, 10, 2, 20),
(131, 11, 2, 14),
(132, 12, 2, 10),
(133, 10, 3, 14),
(134, 11, 3, 11),
(135, 12, 3, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`num_ens`),
  ADD UNIQUE KEY `num_matr` (`num_matr`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`num_etu`),
  ADD UNIQUE KEY `CNE` (`CNE`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`num_mat`),
  ADD KEY `matiere_vers_enseignant` (`_num_ens`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_vers_etud` (`_num_etu`),
  ADD KEY `notes_vers_matiere` (`_num_mat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `num_ens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `num_etu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `num_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `matiere_vers_enseignant` FOREIGN KEY (`_num_ens`) REFERENCES `enseignant` (`num_ens`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_vers_etud` FOREIGN KEY (`_num_etu`) REFERENCES `etudiant` (`num_etu`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_vers_matiere` FOREIGN KEY (`_num_mat`) REFERENCES `matiere` (`num_mat`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
