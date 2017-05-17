-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 12 Mai 2017 à 16:25
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `attendances`
--

--
-- Contenu de la table `courses`
--

INSERT INTO `courses` (`code`, `name`, `term`, `ECTs`, `bloc`, `abbreviation`, `course_unit_learning_activity`) VALUES
('1T1Q5', 'Economie', 1, 4, 1, 'Eco', 'LA'),
('1T1Q1', 'Mathematique', 1, 6, 1, 'Math', 'CU'),
('1T1Q2', 'Algorithmique', 1, 5, 1, 'Algo', 'CU'),
('1T1Q3', 'Assemblage', 1, 4, 1, NULL, 'LA'),
('1T1Q4', 'Description des ordinateurs', 1, 4, 1, 'DO', 'LA');

--
-- Contenu de la table `seance_templates`
--

INSERT INTO `seance_templates` (`seance_template_id`, `name`, `attendance_type`, `code`) VALUES
(8, 'A', 'X', '1T1Q1'),
(9, 'B', 'noted', '1T1Q2'),
(10, 'C', 'X', '1T1Q3'),
(11, 'D', 'X', '1T1Q4'),
(12, 'E', 'XO', '1T1Q1');

--
-- Contenu de la table `series`
--

INSERT INTO `series` (`serie_id`, `term`, `serie_numero`, `bloc`) VALUES
(45, 1, 1, 1),
(46, 1, 2, 1);

--
-- Contenu de la table `given_seances`
--

INSERT INTO `given_seances` (`given_seance_id`, `seance_template_id`, `serie_id`) VALUES
(16, 8, 45),
(17, 8, 46),
(18, 9, 45),
(19, 9, 46),
(20, 10, 45),
(21, 10, 46),
(22, 11, 45),
(23, 11, 46),
(24, 12, 45),
(25, 12, 46);

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`student_id`, `mail`, `bloc`, `name`, `first_name`, `serie_id`) VALUES
(3454, 'alice.test@student.vinci.be', 1, 'Test', 'Alice', 45),
(3455, 'bob.test@student.vinci.be', 1, 'Test', 'Bob', 45),
(3456, 'charlie.test@student.vinci.be', 1, 'Test', 'Charlie', 46);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
