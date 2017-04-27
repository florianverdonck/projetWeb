-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Avril 2017 à 09:57
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

-- --------------------------------------------------------

--
-- Structure de la table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL,
  `attendance` varchar(15) NOT NULL,
  `student_id` int(11) NOT NULL,
  `attendance_sheet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `attendance_sheets`
--

CREATE TABLE `attendance_sheets` (
  `attendance_sheet_id` int(11) NOT NULL,
  `given_seance_id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `week_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `code` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `term` int(11) NOT NULL,
  `ECTs` int(11) NOT NULL,
  `bloc` int(11) NOT NULL,
  `abbreviation` varchar(20) DEFAULT NULL,
  `course_unit_learning_activity` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `courses`
--

INSERT INTO `courses` (`code`, `name`, `term`, `ECTs`, `bloc`, `abbreviation`, `course_unit_learning_activity`) VALUES
('IE445LI', 'algotest', 1, 6, 1, 'algo', 'CU'),
('IL4545POI', 'PHP', 2, 6, 2, NULL, 'CU');

-- --------------------------------------------------------

--
-- Structure de la table `given_seances`
--

CREATE TABLE `given_seances` (
  `given_seance_id` int(11) NOT NULL,
  `seance_template_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `professors`
--

CREATE TABLE `professors` (
  `mail` varchar(50) NOT NULL,
  `responsible` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `professors`
--

INSERT INTO `professors` (`mail`, `responsible`, `name`, `first_name`) VALUES
('tes2t@test.te', 'true', 'test2', 'test2'),
('test@test.te', 'blocs', 'Test', 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `seance_templates`
--

CREATE TABLE `seance_templates` (
  `seance_template_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `attendance_type` varchar(10) NOT NULL,
  `code` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `serie_id` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `serie_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `series`
--

INSERT INTO `series` (`serie_id`, `term`, `serie_name`) VALUES
(3, 2, 'serie_1_bloc_1'),
(4, 2, 'serie_2_bloc_3');

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `student-id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `bloc` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `serie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`student-id`, `mail`, `bloc`, `name`, `first_name`, `serie_id`) VALUES
(1, 'student1@mail.vinci', 1, 'stud1', 'stud1', NULL),
(6, 'teeest@test.te', 2, 'Teston', 'Teste', 3);

-- --------------------------------------------------------

--
-- Structure de la table `weeks`
--

CREATE TABLE `weeks` (
  `week_id` int(11) NOT NULL,
  `week_number` varchar(9) NOT NULL,
  `term` varchar(2) NOT NULL,
  `monday_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `weeks`
--

INSERT INTO `weeks` (`week_id`, `week_number`, `term`, `monday_date`) VALUES
(1, '', '1', '2017-04-03'),
(2, '', '1', '2017-04-10');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `attendance_sheet_id` (`attendance_sheet_id`);

--
-- Index pour la table `attendance_sheets`
--
ALTER TABLE `attendance_sheets`
  ADD PRIMARY KEY (`attendance_sheet_id`),
  ADD KEY `given_seance_id` (`given_seance_id`),
  ADD KEY `mail` (`mail`),
  ADD KEY `week_number` (`week_number`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `given_seances`
--
ALTER TABLE `given_seances`
  ADD PRIMARY KEY (`given_seance_id`),
  ADD KEY `seance_template_id` (`seance_template_id`),
  ADD KEY `serie_id` (`serie_id`);

--
-- Index pour la table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`mail`);

--
-- Index pour la table `seance_templates`
--
ALTER TABLE `seance_templates`
  ADD PRIMARY KEY (`seance_template_id`),
  ADD KEY `code` (`code`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`serie_id`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student-id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `serie_id` (`serie_id`);

--
-- Index pour la table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`week_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `attendance_sheets`
--
ALTER TABLE `attendance_sheets`
  MODIFY `attendance_sheet_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `given_seances`
--
ALTER TABLE `given_seances`
  MODIFY `given_seance_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `seance_templates`
--
ALTER TABLE `seance_templates`
  MODIFY `seance_template_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `serie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `student-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `week_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `fk1_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`student-id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_attendance_sheet_id` FOREIGN KEY (`attendance_sheet_id`) REFERENCES `attendance_sheets` (`attendance_sheet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `attendance_sheets`
--
ALTER TABLE `attendance_sheets`
  ADD CONSTRAINT `fk_given_seance_id` FOREIGN KEY (`given_seance_id`) REFERENCES `given_seances` (`given_seance_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mail` FOREIGN KEY (`mail`) REFERENCES `professors` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_week_number` FOREIGN KEY (`week_number`) REFERENCES `weeks` (`week_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `given_seances`
--
ALTER TABLE `given_seances`
  ADD CONSTRAINT `fk1_seance_template` FOREIGN KEY (`seance_template_id`) REFERENCES `seance_templates` (`seance_template_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_serie_id` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `seance_templates`
--
ALTER TABLE `seance_templates`
  ADD CONSTRAINT `fk_code` FOREIGN KEY (`code`) REFERENCES `courses` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_serie_id` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
