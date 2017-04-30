-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 29 Avril 2017 à 21:32
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

--
-- Contenu de la table `attendances`
--

INSERT INTO `attendances` (`attendance_id`, `attendance`, `student_id`, `attendance_sheet_id`) VALUES
(3, '17', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `attendance_sheets`
--

CREATE TABLE `attendance_sheets` (
  `attendance_sheet_id` int(11) NOT NULL,
  `given_seance_id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `week_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `attendance_sheets`
--

INSERT INTO `attendance_sheets` (`attendance_sheet_id`, `given_seance_id`, `mail`, `week_id`) VALUES
(4, 4, 'brigitte.lehmann@vinci.be', 174),
(5, 5, 'christophe.damas@vinci.be', 170),
(6, 3, 'anthony.legrand@vinci.be', 168);

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

--
-- Contenu de la table `given_seances`
--

INSERT INTO `given_seances` (`given_seance_id`, `seance_template_id`, `serie_id`) VALUES
(3, 2, 6),
(4, 2, 6),
(5, 1, 5),
(6, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `professors`
--

CREATE TABLE `professors` (
  `mail` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `responsible` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `professors`
--

INSERT INTO `professors` (`mail`, `name`, `first_name`, `responsible`) VALUES
('annick.dupont@vinci.be', 'Dupont', 'Annick', 'false\r'),
('anthony.legrand@vinci.be', 'Legrand', 'Anthony', 'false\r'),
('bernard.frank@vinci.be', 'Frank', 'Bernard', 'false\r'),
('bernard.henriet@vinci.be', 'Henriet', 'Bernard', 'blocs\r'),
('brigitte.binot@vinci.be', 'Binot', 'Brigitte', 'false\r'),
('brigitte.lehmann@vinci.be', 'Lehmann', 'Brigitte', 'false\r'),
('christophe.damas@vinci.be', 'Damas', 'Christophe', 'bloc2\r'),
('colette.demuylder@vinci.be', 'De Muylder', 'Colette', 'false\r'),
('donatien.grolaux@vinci.be', 'Grolaux', 'Donatien', 'bloc3\r'),
('emmeline.leconte@vinci.be', 'Leconte', 'Emmeline', 'blocs\r'),
('gregory.seront@vinci.be', 'Seront', 'Gregory', 'true\r'),
('jeanluc.collinet@ipl.be', 'Collinet', 'Jean-Luc', 'bloc1\r'),
('jose.vandermeulen@vinci.be', 'Vandermeulen', 'José', 'false\r'),
('julien.federinov@vinci.be', 'Federinov', 'Julien', 'false\r'),
('laurent.leleux@vinci.be', 'Leleux', 'Laurent', 'false\r'),
('michel.debacker@vinci.be', 'Debacker', 'Michel', 'false\r'),
('olivier.choquet@vinci.be', 'Choquet', 'Olivier', 'false\r'),
('philippe.vaneerdenbrugghe@vinci.be', 'Vaneerdenbrugghe', 'Philippe', 'false\r'),
('sonia.belina@vinci.be', 'Belina-Podgaetsky', 'Sonia', 'false\r'),
('stephanie.ferneeuw@vinci.be', 'Ferneeuw', 'Stéphanie', 'false\r');

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

--
-- Contenu de la table `seance_templates`
--

INSERT INTO `seance_templates` (`seance_template_id`, `name`, `attendance_type`, `code`) VALUES
(1, 'algo1', 'XO', 'IE445LI'),
(2, 'algo2', 'Notee', 'IE445LI'),
(3, NULL, 'X', 'IL4545POI');

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `serie_id` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `serie_numero` int(50) NOT NULL,
  `bloc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `series`
--

INSERT INTO `series` (`serie_id`, `term`, `serie_numero`, `bloc`) VALUES
(5, 2, 2, 1),
(6, 2, 2, 1),
(7, 2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `bloc` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `serie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`student_id`, `mail`, `bloc`, `name`, `first_name`, `serie_id`) VALUES
(1, 'student1@student.vinci.be', 1, 'stud1', 'stud1', NULL);

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
(168, 'semaine1', 'q1', '19/09/2016\r'),
(169, 'semaine2', 'q1', '26/09/2016\r'),
(170, 'semaine3', 'q1', '3/10/2016\r'),
(171, 'semaine4', 'q1', '10/10/2016\r'),
(172, 'semaine5', 'q1', '17/10/2016\r'),
(173, 'semaine6', 'q1', '24/10/2016\r'),
(174, 'semaine7', 'q2', '7/11/2016\r'),
(175, 'semaine8', 'q1', '14/11/2016\r'),
(176, 'semaine9', 'q1', '21/11/2016\r'),
(177, 'semaine10', 'q1', '28/11/2016\r'),
(178, 'semaine11', 'q1', '5/11/2016\r'),
(179, 'semaine12', 'q1', '12/11/2016\r'),
(180, 'semaine13', 'q1', '19/11/2016\r'),
(181, 'semaine1', 'q2', '6/02/2017\r'),
(182, 'semaine2', 'q2', '13/02/2017\r'),
(183, 'semaine3', 'q2', '20/02/2017\r'),
(184, 'semaine4', 'q2', '27/02/2017\r'),
(185, 'semaine5', 'q2', '6/03/2017\r'),
(186, 'semaine6', 'q2', '13/03/2017\r'),
(187, 'semaine7', 'q2', '20/03/2017\r'),
(188, 'semaine8', 'q2', '27/03/2017\r'),
(189, 'semaine9', 'q2', '17/04/2017\r'),
(190, 'semaine10', 'q2', '24/04/2017\r'),
(191, 'semaine11', 'q2', '1/05/2017\r'),
(192, 'semaine12', 'q2', '8/05/2017\r'),
(193, 'semaine13', 'q2', '15/05/2017');

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
  ADD KEY `week_number` (`week_id`);

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
  ADD PRIMARY KEY (`student_id`),
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
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `attendance_sheets`
--
ALTER TABLE `attendance_sheets`
  MODIFY `attendance_sheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `given_seances`
--
ALTER TABLE `given_seances`
  MODIFY `given_seance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `seance_templates`
--
ALTER TABLE `seance_templates`
  MODIFY `seance_template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `serie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `week_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `fk1_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_attendance_sheet_id` FOREIGN KEY (`attendance_sheet_id`) REFERENCES `attendance_sheets` (`attendance_sheet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `attendance_sheets`
--
ALTER TABLE `attendance_sheets`
  ADD CONSTRAINT `fk_given_seance_id` FOREIGN KEY (`given_seance_id`) REFERENCES `given_seances` (`given_seance_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mail` FOREIGN KEY (`mail`) REFERENCES `professors` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_week_id` FOREIGN KEY (`week_id`) REFERENCES `weeks` (`week_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
