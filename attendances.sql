-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 30 Avril 2017 à 09:43
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
  `mail` varchar(100) NOT NULL,
  `bloc` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `serie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`student_id`, `mail`, `bloc`, `name`, `first_name`, `serie_id`) VALUES
(78, 'kodjo.adegnon@student.vinci.be\r', 3, 'ADEGNON', 'Kodjo', NULL),
(79, 'mustafa.alp@student.vinci.be\r', 3, 'ALP', 'Mustafa', NULL),
(80, 'laurent.batslé@student.vinci.be\r', 3, 'BATSLÉ', 'Laurent', NULL),
(81, 'stefan.bogdanovic@student.vinci.be\r', 3, 'BOGDANOVIC', 'Stefan', NULL),
(82, 'fany.bottemanne@student.vinci.be\r', 3, 'BOTTEMANNE', 'Fany', NULL),
(83, 'bill.brancart@student.vinci.be\r', 3, 'BRANCART', 'Bill', NULL),
(84, 'antoine.colet@student.vinci.be\r', 3, 'COLET', 'Antoine', NULL),
(85, 'pierric.cotton@student.vinci.be\r', 3, 'COTTON', 'Pierric', NULL),
(86, 'andré.daspremont@student.vinci.be\r', 3, 'DASPREMONT', 'André', NULL),
(87, 'marc.de burlet@student.vinci.be\r', 3, 'de BURLET', 'Marc', NULL),
(88, 'jimmy.de la cruz mallada@student.vinci.be\r', 3, 'DE LA CRUZ MALLADA', 'Jimmy', NULL),
(89, 'maxime.de maubeuge@student.vinci.be\r', 3, 'DE MAUBEUGE', 'Maxime', NULL),
(90, 'gabriel.delhaye@student.vinci.be\r', 2, 'DELHAYE', 'Gabriel', NULL),
(91, 'mathieu.descantons de montblanc@student.vinci.be\r', 3, 'DESCANTONS de MONTBLANC', 'Mathieu', NULL),
(92, 'dylan.di vito@student.vinci.be\r', 3, 'DI VITO', 'Dylan', NULL),
(93, 'theodor.dimov@student.vinci.be\r', 3, 'DIMOV', 'Theodor', NULL),
(94, 'patrycjusz.dolega@student.vinci.be\r', 3, 'DOLEGA', 'Patrycjusz', NULL),
(95, 'bastien.dos santos@student.vinci.be\r', 3, 'DOS SANTOS', 'Bastien', NULL),
(96, 'philippe.dragomir@student.vinci.be\r', 3, 'DRAGOMIR', 'Philippe', NULL),
(97, 'emilien.durieu@student.vinci.be\r', 3, 'DURIEU', 'Emilien', NULL),
(98, 'romain.duvillier@student.vinci.be\r', 3, 'DUVILLIER', 'Romain', NULL),
(99, 'amaury.evrard@student.vinci.be\r', 3, 'EVRARD', 'Amaury', NULL),
(100, 'mike.gaillet@student.vinci.be\r', 3, 'GAILLET', 'Mike', NULL),
(101, 'philippe.giuge@student.vinci.be\r', 3, 'GIUGE', 'Philippe', NULL),
(102, 'fabio.grumiro@student.vinci.be\r', 3, 'GRUMIRO', 'Fabio', NULL),
(103, 'xavier.hoffmann@student.vinci.be\r', 3, 'HOFFMANN', 'Xavier', NULL),
(104, 'damien.kech@student.vinci.be\r', 3, 'KECH', 'Damien', NULL),
(105, 'aurélien.lefebvre@student.vinci.be\r', 3, 'LEFEBVRE', 'Aurélien', NULL),
(106, 'gaël.leroy@student.vinci.be\r', 3, 'LEROY', 'Gaël', NULL),
(107, 'junior.maduka@student.vinci.be\r', 3, 'MADUKA', 'Junior', NULL),
(108, 'anthony.maton@student.vinci.be\r', 3, 'MATON', 'Anthony', NULL),
(109, 'jean-pacifique.mbonyincungu @student.vinci.be\r', 3, 'MBONYINCUNGU ', 'Jean-Pacifique', NULL),
(110, 'christian.mendes rosa@student.vinci.be\r', 3, 'MENDES ROSA', 'Christian', NULL),
(111, 'yannick.molinghen@student.vinci.be\r', 3, 'MOLINGHEN', 'Yannick', NULL),
(112, 'florian.morel@student.vinci.be\r', 3, 'MOREL', 'Florian', NULL),
(113, 'hamza.mounir@student.vinci.be\r', 3, 'MOUNIR', 'Hamza', NULL),
(114, 'sam.ndagano@student.vinci.be\r', 3, 'NDAGANO', 'Sam', NULL),
(115, 'quoc dat.nguyen@student.vinci.be\r', 3, 'NGUYEN', 'Quoc Dat', NULL),
(116, 'nicolas.oste@student.vinci.be\r', 3, 'OSTE', 'Nicolas', NULL),
(117, 'lionel.ovaert@student.vinci.be\r', 3, 'OVAERT', 'Lionel', NULL),
(118, 'ivan.pessers@student.vinci.be\r', 3, 'PESSERS', 'Ivan', NULL),
(119, 'delanoe.pirard@student.vinci.be\r', 3, 'PIRARD', 'Delanoe', NULL),
(120, 'arnaud.rochez@student.vinci.be\r', 3, 'ROCHEZ', 'Arnaud', NULL),
(121, 'konstantin.romanov@student.vinci.be\r', 3, 'ROMANOV', 'Konstantin', NULL),
(122, 'jean-françois.schweisthal@student.vinci.be\r', 3, 'SCHWEISTHAL', 'Jean-François', NULL),
(123, 'philipp.shevtchenko@student.vinci.be\r', 3, 'SHEVTCHENKO', 'Philipp', NULL),
(124, 'mathieu.steenput@student.vinci.be\r', 3, 'STEENPUT', 'Mathieu', NULL),
(125, 'loïc.stevens@student.vinci.be\r', 3, 'STEVENS', 'Loïc', NULL),
(126, 'mélissa.strauven@student.vinci.be\r', 3, 'STRAUVEN', 'Mélissa', NULL),
(127, 'damien.syemons@student.vinci.be\r', 3, 'SYEMONS', 'Damien', NULL),
(128, 'martin.techy@student.vinci.be\r', 3, 'TECHY', 'Martin', NULL),
(129, 'vinh kien.truong@student.vinci.be\r', 3, 'TRUONG', 'Vinh Kien', NULL),
(130, 'antoine.verlant@student.vinci.be\r', 3, 'VERLANT', 'Antoine', NULL),
(131, 'maxime.verwilghen@student.vinci.be\r', 3, 'VERWILGHEN', 'Maxime', NULL),
(132, 'milenko.vorkapic@student.vinci.be\r', 3, 'VORKAPIC', 'Milenko', NULL),
(133, 'jacques.yakoub@student.vinci.be\r', 3, 'YAKOUB', 'Jacques', NULL),
(134, 'sheng hao.ye@student.vinci.be\r', 3, 'YE', 'Sheng Hao', NULL),
(135, 'michaël.andre@student.vinci.be\r', 2, 'ANDRE', 'Michaël', NULL),
(136, 'kamil.arszagi vel harszagi@student.vinci.be\r', 2, 'ARSZAGI VEL HARSZAGI', 'Kamil', NULL),
(137, 'rachid.asli@student.vinci.be\r', 2, 'ASLI', 'Rachid', NULL),
(138, 'nathan.ayele@student.vinci.be\r', 2, 'AYELE', 'Nathan', NULL),
(139, 'abdelhak.bakalem@student.vinci.be\r', 2, 'BAKALEM', 'Abdelhak', NULL),
(140, 'sami.barchid@student.vinci.be\r', 2, 'BARCHID', 'Sami', NULL),
(141, 'ahmad.bashir@student.vinci.be\r', 2, 'BASHIR', 'Ahmad', NULL),
(142, 'benjamin.bergé@student.vinci.be\r', 2, 'BERGÉ', 'Benjamin', NULL),
(143, 'nicolas.bertolini@student.vinci.be\r', 2, 'BERTOLINI', 'Nicolas', NULL),
(144, 'christophe.bortier@student.vinci.be\r', 2, 'BORTIER', 'Christophe', NULL),
(145, 'timothée.bouvin@student.vinci.be\r', 2, 'BOUVIN', 'Timothée', NULL),
(146, 'roland.bura@student.vinci.be\r', 2, 'BURA', 'Roland', NULL),
(147, 'johann.buxant@student.vinci.be\r', 2, 'BUXANT', 'Johann', NULL),
(148, 'nicolas.christodoulou de graillet@student.vinci.be\r', 2, 'CHRISTODOULOU de GRAILLET', 'Nicolas', NULL),
(149, 'mamadou.cissé@student.vinci.be\r', 2, 'CISSÉ', 'Mamadou', NULL),
(150, 'jean-françois.cochart@student.vinci.be\r', 2, 'COCHART', 'Jean-François', NULL),
(151, 'alexandre.coste-gandrey@student.vinci.be\r', 2, 'COSTE-GANDREY', 'Alexandre', NULL),
(152, 'virginia.dabrowski@student.vinci.be\r', 2, 'DABROWSKI', 'Virginia', NULL),
(153, 'michel.de broux@student.vinci.be\r', 2, 'De Broux', 'Michel', NULL),
(154, 'gaspard.de villenfagne de vogelsanck@student.vinci.be\r', 2, 'de VILLENFAGNE de VOGELSANCK', 'Gaspard', NULL),
(155, 'lancelot.de wouters de bouchout@student.vinci.be\r', 2, 'de WOUTERS de BOUCHOUT', 'Lancelot', NULL),
(156, 'benjamin.declercq@student.vinci.be\r', 2, 'DECLERCQ', 'Benjamin', NULL),
(157, 'olivier.degrève@student.vinci.be\r', 2, 'DEGRÈVE', 'Olivier', NULL),
(158, 'valentin.delwart@student.vinci.be\r', 2, 'DELWART', 'Valentin', NULL),
(159, 'quentin.denis@student.vinci.be\r', 2, 'DENIS', 'Quentin', NULL),
(160, 'maxime.denuit@student.vinci.be\r', 2, 'DENUIT', 'Maxime', NULL),
(161, 'romain.descamps@student.vinci.be\r', 2, 'DESCAMPS', 'Romain', NULL),
(162, 'valentin.desénépart@student.vinci.be\r', 2, 'DESÉNÉPART', 'Valentin', NULL),
(163, 'christophe.driessen@student.vinci.be\r', 2, 'DRIESSEN', 'Christophe', NULL),
(164, 'clément.du jardin@student.vinci.be\r', 2, 'du JARDIN', 'Clément', NULL),
(165, 'corenthin.dubois@student.vinci.be\r', 2, 'DUBOIS', 'Corenthin', NULL),
(166, 'adeline.duterre@student.vinci.be\r', 2, 'DUTERRE', 'Adeline', NULL),
(167, 'arnaud.etienne@student.vinci.be\r', 2, 'ETIENNE', 'Arnaud', NULL),
(168, 'pierre-paul.gaillet@student.vinci.be\r', 2, 'GAILLET', 'Pierre-Paul', NULL),
(169, 'marcos.garcia augusto@student.vinci.be\r', 2, 'GARCIA AUGUSTO', 'Marcos', NULL),
(170, 'quentin.gilmart@student.vinci.be\r', 2, 'GILMART', 'Quentin', NULL),
(171, 'romain.grimmonpré@student.vinci.be\r', 2, 'GRIMMONPRÉ', 'Romain', NULL),
(172, 'gabriel.haba@student.vinci.be\r', 2, 'HABA', 'Gabriel', NULL),
(173, 'alexandre.hardi@student.vinci.be\r', 2, 'HARDI', 'Alexandre', NULL),
(174, 'kevin.heylbroeck@student.vinci.be\r', 2, 'HEYLBROECK', 'Kevin', NULL),
(175, 'frédéric.hubert@student.vinci.be\r', 2, 'HUBERT', 'Frédéric', NULL),
(176, 'félix.jacoby@student.vinci.be\r', 2, 'JACOBY', 'Félix', NULL),
(177, 'johnny.la@student.vinci.be\r', 2, 'LA', 'Johnny', NULL),
(178, 'gauthier.lallemand@student.vinci.be\r', 2, 'LALLEMAND', 'Gauthier', NULL),
(179, 'antoine.lambricht@student.vinci.be\r', 2, 'LAMBRICHT', 'Antoine', NULL),
(180, 'zakaria.lamrini@student.vinci.be\r', 2, 'LAMRINI', 'Zakaria', NULL),
(181, 'alexandre.maniet@student.vinci.be\r', 2, 'MANIET', 'Alexandre', NULL),
(182, 'antoine.maniet@student.vinci.be\r', 2, 'MANIET', 'Antoine', NULL),
(183, 'mickaël.marlard@student.vinci.be\r', 2, 'MARLARD', 'Mickaël', NULL),
(184, 'patrick.mazur@student.vinci.be\r', 2, 'MAZUR', 'Patrick', NULL),
(185, 'damien.meur@student.vinci.be\r', 2, 'MEUR', 'Damien', NULL),
(186, 'ibrahim.mourade@student.vinci.be\r', 2, 'MOURADE', 'Ibrahim', NULL),
(187, 'meriam.mzoughi@student.vinci.be\r', 2, 'MZOUGHI', 'Meriam', NULL),
(188, 'dat toan.nguyen@student.vinci.be\r', 2, 'NGUYEN', 'Dat Toan', NULL),
(189, 'tran.nguyen@student.vinci.be\r', 2, 'NGUYEN', 'Tran', NULL),
(190, 'diego.nuez soriano@student.vinci.be\r', 2, 'NUEZ SORIANO', 'Diego', NULL),
(191, 'simon.oldenhove de guertechin@student.vinci.be\r', 2, 'OLDENHOVE de GUERTECHIN', 'Simon', NULL),
(192, 'anthony.pierre@student.vinci.be\r', 2, 'PIERRE', 'Anthony', NULL),
(193, 'benjamin.pierre@student.vinci.be\r', 2, 'PIERRE', 'Benjamin', NULL),
(194, 'maxime.pirlet@student.vinci.be\r', 2, 'PIRLET', 'Maxime', NULL),
(195, 'sébastien.place@student.vinci.be\r', 2, 'PLACE', 'Sébastien', NULL),
(196, 'anthony.pyck@student.vinci.be\r', 2, 'PYCK', 'Anthony', NULL),
(197, 'gilles.renson@student.vinci.be\r', 2, 'RENSON', 'Gilles', NULL),
(198, 'antonin.riche@student.vinci.be\r', 2, 'RICHE', 'Antonin', NULL),
(199, 'thomas.ronsmans@student.vinci.be\r', 2, 'RONSMANS', 'Thomas', NULL),
(200, 'jean-bosco.rwibutso@student.vinci.be\r', 2, 'RWIBUTSO', 'Jean-Bosco', NULL),
(201, 'christopher.sacré@student.vinci.be\r', 2, 'SACRÉ', 'Christopher', NULL),
(202, 'roman.skubiszewski@student.vinci.be\r', 2, 'SKUBISZEWSKI', 'Roman', NULL),
(203, 'tanguy.snoeck@student.vinci.be\r', 2, 'SNOECK', 'Tanguy', NULL),
(204, 'julien.solinas@student.vinci.be\r', 2, 'SOLINAS', 'Julien', NULL),
(205, 'alexandre.sousa dos santos@student.vinci.be\r', 2, 'SOUSA DOS SANTOS', 'Alexandre', NULL),
(206, 'emre.tasyürek@student.vinci.be\r', 2, 'TASYÜREK', 'Emre', NULL),
(207, 'cedric.tavernier@student.vinci.be\r', 2, 'TAVERNIER', 'Cedric', NULL),
(208, 'debrah.tinsia@student.vinci.be\r', 2, 'TINSIA', 'Debrah', NULL),
(209, 'kyrill.tircher@student.vinci.be\r', 2, 'TIRCHER', 'Kyrill', NULL),
(210, 'thomas.van gelder@student.vinci.be\r', 2, 'van GELDER', 'Thomas', NULL),
(211, 'amandine.van grunderbeeck@student.vinci.be\r', 2, 'VAN GRUNDERBEECK', 'Amandine', NULL),
(212, 'romain.van lithaut@student.vinci.be\r', 2, 'VAN LITHAUT', 'Romain', NULL),
(213, 'anthony.vancampenhault@student.vinci.be\r', 2, 'VANCAMPENHAULT', 'Anthony', NULL),
(214, 'nolan.vanmoortel@student.vinci.be\r', 2, 'VANMOORTEL', 'Nolan', NULL),
(215, 'jolan.wathelet@student.vinci.be\r', 2, 'WATHELET', 'Jolan', NULL),
(216, 'robert.woronko@student.vinci.be\r', 2, 'WORONKO', 'Robert', NULL),
(217, 'ismaila.abdoulahi adamou@student.vinci.be\r', 1, 'ABDOULAHI ADAMOU', 'Ismaila', NULL),
(218, 'viken.afsar@student.vinci.be\r', 1, 'AFSAR', 'Viken', NULL),
(219, 'shayan.amini@student.vinci.be\r', 1, 'AMINI', 'Shayan', NULL),
(220, 'marco.amory@student.vinci.be\r', 1, 'AMORY', 'Marco', NULL),
(221, 'thibault.andersson@student.vinci.be\r', 1, 'ANDERSSON', 'Thibault', NULL),
(222, 'ange cedrick.angaman@student.vinci.be\r', 1, 'ANGAMAN', 'Ange Cedrick', NULL),
(223, 'bunyamin.aslan@student.vinci.be\r', 1, 'ASLAN', 'Bunyamin', NULL),
(224, 'yassin.assecoum@student.vinci.be\r', 1, 'ASSECOUM', 'Yassin', NULL),
(225, 'youssef.astitou@student.vinci.be\r', 1, 'ASTITOU', 'Youssef', NULL),
(226, 'iulian.avram@student.vinci.be\r', 1, 'Avram', 'Iulian', NULL),
(227, 'samir.bacha@student.vinci.be\r', 1, 'BACHA', 'Samir', NULL),
(228, 'jérémy.balcinhas godinho@student.vinci.be\r', 1, 'BALCINHAS GODINHO', 'Jérémy', NULL),
(229, 'mac blair.ballecer@student.vinci.be\r', 1, 'BALLECER', 'Mac Blair', NULL),
(230, 'ilias.barrani@student.vinci.be\r', 1, 'BARRANI', 'Ilias', NULL),
(231, 'tahir.bashir@student.vinci.be\r', 1, 'BASHIR', 'Tahir', NULL),
(232, 'logan.bauduin@student.vinci.be\r', 1, 'BAUDUIN', 'Logan', NULL),
(233, 'youness.belhassnaoui@student.vinci.be\r', 1, 'BELHASSNAOUI', 'Youness', NULL),
(234, 'driss.ben geloune@student.vinci.be\r', 1, 'BEN GELOUNE', 'Driss', NULL),
(235, 'khalil.benazzouz@student.vinci.be\r', 1, 'BENAZZOUZ', 'Khalil', NULL),
(236, 'yahya.bennaghmouch@student.vinci.be\r', 1, 'BENNAGHMOUCH', 'Yahya', NULL),
(237, 'patrick.bikorimana@student.vinci.be\r', 1, 'BIKORIMANA', 'Patrick', NULL),
(238, 'thomas.boon@student.vinci.be\r', 1, 'BOON', 'Thomas', NULL),
(239, 'morgan.bossin@student.vinci.be\r', 1, 'BOSSIN', 'Morgan', NULL),
(240, 'salim.bouchbouk@student.vinci.be\r', 1, 'Bouchbouk', 'Salim', NULL),
(241, 'nawfal.boujtat@student.vinci.be\r', 1, 'BOUJTAT', 'Nawfal', NULL),
(242, 'sohaib.boulban yousrani@student.vinci.be\r', 1, 'BOULBAN YOUSRANI', 'Sohaib', NULL),
(243, 'logan.bourez@student.vinci.be\r', 1, 'BOUREZ', 'Logan', NULL),
(244, 'arnaud.bourez@student.vinci.be\r', 1, 'BOUREZ', 'Arnaud', NULL),
(245, 'alan.buelinckx@student.vinci.be\r', 1, 'BUELINCKX', 'Alan', NULL),
(246, 'tuan.bui@student.vinci.be\r', 1, 'BUI', 'Tuan', NULL),
(247, 'samuel.camus@student.vinci.be\r', 1, 'CAMUS', 'Samuel', NULL),
(248, 'liseta.carcani@student.vinci.be\r', 1, 'CARCANI', 'Liseta', NULL),
(249, 'christopher.castel@student.vinci.be\r', 1, 'CASTEL', 'Christopher', NULL),
(250, 'rocco.cauchi@student.vinci.be\r', 1, 'CAUCHI', 'Rocco', NULL),
(251, 'mohammed.chairi bounekoub@student.vinci.be\r', 1, 'Chairi Bounekoub', 'Mohammed', NULL),
(252, 'chamil.chakhabov@student.vinci.be\r', 1, 'CHAKHABOV', 'Chamil', NULL),
(253, 'nicolas.chapelle@student.vinci.be\r', 1, 'CHAPELLE', 'Nicolas', NULL),
(254, 'soufiane.chelaghmi@student.vinci.be\r', 1, 'CHELAGHMI', 'Soufiane', NULL),
(255, 'yiwei.chen@student.vinci.be\r', 1, 'CHEN', 'Yiwei', NULL),
(256, 'tom.conneely mcinerney@student.vinci.be\r', 1, 'CONNEELY MCINERNEY', 'Tom', NULL),
(257, 'sébastien.croonen@student.vinci.be\r', 1, 'CROONEN', 'Sébastien', NULL),
(258, 'gabriel.curatolo@student.vinci.be\r', 1, 'CURATOLO', 'Gabriel', NULL),
(259, 'martin.d’hoedt @student.vinci.be\r', 1, 'D’HOEDT ', 'Martin', NULL),
(260, 'kadir.dagyaran@student.vinci.be\r', 1, 'DAGYARAN', 'Kadir', NULL),
(261, 'arnaud.de boeck@student.vinci.be\r', 1, 'DE BOECK', 'Arnaud', NULL),
(262, 'benjamin.de bosscher@student.vinci.be\r', 1, 'De Bosscher', 'Benjamin', NULL),
(263, 'hugues.de mathelin de papigny@student.vinci.be\r', 1, 'de Mathelin de Papigny', 'Hugues', NULL),
(264, 'augustin.de meeûs d\'argenteuil@student.vinci.be\r', 1, 'de MEEÛS d\'ARGENTEUIL', 'Augustin', NULL),
(265, 'antoine.de roose@student.vinci.be\r', 1, 'DE ROOSE', 'Antoine', NULL),
(266, 'andy.de smedt@student.vinci.be\r', 1, 'De Smedt', 'Andy', NULL),
(267, 'nestor.debiesme@student.vinci.be\r', 1, 'Debiesme', 'Nestor', NULL),
(268, 'jérôme.deborsu@student.vinci.be\r', 1, 'DEBORSU', 'Jérôme', NULL),
(269, 'antoine.debroux@student.vinci.be\r', 1, 'DEBROUX', 'Antoine', NULL),
(270, 'grégory.decraemer@student.vinci.be\r', 1, 'DECRAEMER', 'Grégory', NULL),
(271, 'loïc.defossé@student.vinci.be\r', 1, 'Defossé', 'Loïc', NULL),
(272, 'nicolas.delannoy@student.vinci.be\r', 1, 'DELANNOY', 'Nicolas', NULL),
(273, 'adrian.dellavalle morinigo@student.vinci.be\r', 1, 'DELLAVALLE MORINIGO', 'Adrian', NULL),
(274, 'léo.descamps@student.vinci.be\r', 1, 'DESCAMPS', 'Léo', NULL),
(275, 'bastien.dessy@student.vinci.be\r', 1, 'DESSY', 'Bastien', NULL),
(276, 'thibault.devaleriola@student.vinci.be\r', 1, 'DEVALERIOLA', 'Thibault', NULL),
(277, 'brian.diaz alvarez@student.vinci.be\r', 1, 'Diaz Alvarez', 'Brian', NULL),
(278, 'romain.donck@student.vinci.be\r', 1, 'DONCK', 'Romain', NULL),
(279, 'julien.doyen@student.vinci.be\r', 1, 'DOYEN', 'Julien', NULL),
(280, 'jean.dubuisson@student.vinci.be\r', 1, 'DUBUISSON', 'Jean', NULL),
(281, 'othmane.echagdali zahri@student.vinci.be\r', 1, 'ECHAGDALI ZAHRI', 'Othmane', NULL),
(282, 'hicham.el asri@student.vinci.be\r', 1, 'EL ASRI', 'Hicham', NULL),
(283, 'ismaël.el f\'kih ben ahmed@student.vinci.be\r', 1, 'El F\'Kih Ben Ahmed', 'Ismaël', NULL),
(284, 'yassine.el hadouchi@student.vinci.be\r', 1, 'EL HADOUCHI', 'Yassine', NULL),
(285, 'mohammed.el khattabi@student.vinci.be\r', 1, 'EL KHATTABI', 'Mohammed', NULL),
(286, 'zineb.el mokadem@student.vinci.be\r', 1, 'EL MOKADEM', 'Zineb', NULL),
(287, 'younes.erraide@student.vinci.be\r', 1, 'Erraide', 'Younes', NULL),
(288, 'majd.fahmi@student.vinci.be\r', 1, 'FAHMI', 'Majd', NULL),
(289, 'risaci-deogratias.faizi@student.vinci.be\r', 1, 'FAIZI', 'Risaci-Deogratias', NULL),
(290, 'sami.farhat@student.vinci.be\r', 1, 'FARHAT', 'Sami', NULL),
(291, 'albinot.fetahi@student.vinci.be\r', 1, 'Fetahi', 'Albinot', NULL),
(292, 'paul-edouard.fouquet@student.vinci.be\r', 1, 'FOUQUET', 'Paul-Edouard', NULL),
(293, 'vincent.franchomme@student.vinci.be\r', 1, 'FRANCHOMME', 'Vincent', NULL),
(294, 'geoffroy.frennet@student.vinci.be\r', 1, 'FRENNET', 'Geoffroy', NULL),
(295, 'adrian.gajda@student.vinci.be\r', 1, 'GAJDA', 'Adrian', NULL),
(296, 'nicolas.gasia@student.vinci.be\r', 1, 'GASIA', 'Nicolas', NULL),
(297, 'lopodi.gaza@student.vinci.be\r', 1, 'GAZA', 'Lopodi', NULL),
(298, 'ali.godazendeh@student.vinci.be\r', 1, 'GODAZENDEH', 'Ali', NULL),
(299, 'sebastian.gonzalez moran@student.vinci.be\r', 1, 'GONZALEZ MORAN', 'Sebastian', NULL),
(300, 'diana.grama@student.vinci.be\r', 1, 'Grama', 'Diana', NULL),
(301, 'gauthier.grandhenry@student.vinci.be\r', 1, 'GRANDHENRY', 'Gauthier', NULL),
(302, 'lukas.greif@student.vinci.be\r', 1, 'GREIF', 'Lukas', NULL),
(303, 'dorian.gruselin@student.vinci.be\r', 1, 'GRUSELIN', 'Dorian', NULL),
(304, 'hamza.guerrouaj@student.vinci.be\r', 1, 'GUERROUAJ', 'Hamza', NULL),
(305, 'simon.guilmot@student.vinci.be\r', 1, 'GUILMOT', 'Simon', NULL),
(306, 'soufiane.haidour@student.vinci.be\r', 1, 'HAIDOUR', 'Soufiane', NULL),
(307, 'kei-jyu.hama@student.vinci.be\r', 1, 'HAMA', 'Kei-Jyu', NULL),
(308, 'anas.hammani@student.vinci.be\r', 1, 'HAMMANI', 'Anas', NULL),
(309, 'mohamed.hassouni@student.vinci.be\r', 1, 'HASSOUNI', 'Mohamed', NULL),
(310, 'cyril.hennen@student.vinci.be\r', 1, 'HENNEN', 'Cyril', NULL),
(311, 'jeremy.holodiline@student.vinci.be\r', 1, 'Holodiline', 'Jeremy', NULL),
(312, 'romaric.honorez@student.vinci.be\r', 1, 'HONOREZ', 'Romaric', NULL),
(313, 'cyrille.hourant@student.vinci.be\r', 1, 'HOURANT', 'Cyrille', NULL),
(314, 'mehdi.ibnlfassi@student.vinci.be\r', 1, 'IBNLFASSI', 'Mehdi', NULL),
(315, 'said.imran@student.vinci.be\r', 1, 'IMRAN', 'Said', NULL),
(316, 'christophe.jabbour@student.vinci.be\r', 1, 'Jabbour', 'Christophe', NULL),
(317, 'loury.jacob@student.vinci.be\r', 1, 'JACOB', 'Loury', NULL),
(318, 'ilias.jafar@student.vinci.be\r', 1, 'JAFAR', 'Ilias', NULL),
(319, 'pawel.jalbrzykowski@student.vinci.be\r', 1, 'JALBRZYKOWSKI', 'Pawel', NULL),
(320, 'thibaut.janssens@student.vinci.be\r', 1, 'JANSSENS', 'Thibaut', NULL),
(321, 'adnan.jlassi@student.vinci.be\r', 1, 'JLASSI', 'Adnan', NULL),
(322, 'egide.kabanza@student.vinci.be\r', 1, 'KABANZA', 'Egide', NULL),
(323, 'rubain.kamegneson wabo@student.vinci.be\r', 1, 'KAMEGNESON WABO', 'Rubain', NULL),
(324, 'burim.kastrati@student.vinci.be\r', 1, 'KASTRATI', 'Burim', NULL),
(325, 'bouchra.kh\' leeh@student.vinci.be\r', 1, 'KH\' LEEH', 'Bouchra', NULL),
(326, 'gaël.kifoumbi @student.vinci.be\r', 1, 'KIFOUMBI ', 'Gaël', NULL),
(327, 'kamil.kowalczyk@student.vinci.be\r', 1, 'KOWALCZYK', 'Kamil', NULL),
(328, 'dejvi.kurti@student.vinci.be\r', 1, 'KURTI', 'Dejvi', NULL),
(329, 'martin.kutzner@student.vinci.be\r', 1, 'KUTZNER', 'Martin', NULL),
(330, 'sandra.kwibuka@student.vinci.be\r', 1, 'KWIBUKA', 'Sandra', NULL),
(331, 'otman.lachkar@student.vinci.be\r', 1, 'LACHKAR', 'Otman', NULL),
(332, 'badreddine.lahrichi@student.vinci.be\r', 1, 'LAHRICHI', 'Badreddine', NULL),
(333, 'lorenzo.lapage@student.vinci.be\r', 1, 'LAPAGE', 'Lorenzo', NULL),
(334, 'youssef.larbi@student.vinci.be\r', 1, 'LARBI', 'Youssef', NULL),
(335, 'lorenzo.lauricella@student.vinci.be\r', 1, 'LAURICELLA', 'Lorenzo', NULL),
(336, 'nicolas.lecoq@student.vinci.be\r', 1, 'LECOQ', 'Nicolas', NULL),
(337, 'robin.lefebvre@student.vinci.be\r', 1, 'LEFEBVRE', 'Robin', NULL),
(338, 'guillaume.lion@student.vinci.be\r', 1, 'LION', 'Guillaume', NULL),
(339, 'thomas.lion@student.vinci.be\r', 1, 'LION', 'Thomas', NULL),
(340, 'filip.lolic@student.vinci.be\r', 1, 'Lolic', 'Filip', NULL),
(341, 'nicolas.lorphelin@student.vinci.be\r', 1, 'LORPHELIN', 'Nicolas', NULL),
(342, 'robin.louis@student.vinci.be\r', 1, 'LOUIS', 'Robin', NULL),
(343, 'rachid.mabrouk@student.vinci.be\r', 1, 'MABROUK', 'Rachid', NULL),
(344, 'joelle.maffo meleu@student.vinci.be\r', 1, 'MAFFO MELEU', 'Joelle', NULL),
(345, 'hamza.mahmoudi@student.vinci.be\r', 1, 'MAHMOUDI', 'Hamza', NULL),
(346, 'lucas.malmport@student.vinci.be\r', 1, 'Malmport', 'Lucas', NULL),
(347, 'yannis.manguin@student.vinci.be\r', 1, 'MANGUIN', 'Yannis', NULL),
(348, 'azeddine.mansour@student.vinci.be\r', 1, 'Mansour', 'Azeddine', NULL),
(349, 'mathieu.marcq@student.vinci.be\r', 1, 'MARCQ', 'Mathieu', NULL),
(350, 'nicolas.marcq@student.vinci.be\r', 1, 'Marcq', 'Nicolas', NULL),
(351, 'sacha.maricau@student.vinci.be\r', 1, 'MARICAU', 'Sacha', NULL),
(352, 'max.marin@student.vinci.be\r', 1, 'Marin', 'Max', NULL),
(353, 'alexandre.maroun@student.vinci.be\r', 1, 'Maroun', 'Alexandre', NULL),
(354, 'cedric.martin@student.vinci.be\r', 1, 'MARTIN', 'Cedric', NULL),
(355, 'marc.meganck@student.vinci.be\r', 1, 'MEGANCK', 'Marc', NULL),
(356, 'kevin.mero vallas@student.vinci.be\r', 1, 'MERO VALLAS', 'Kevin', NULL),
(357, 'pierre.michiels@student.vinci.be\r', 1, 'MICHIELS', 'Pierre', NULL),
(358, 'malo.misson@student.vinci.be\r', 1, 'MISSON', 'Malo', NULL),
(359, 'xavier.mouffo@student.vinci.be\r', 1, 'Mouffo', 'Xavier', NULL),
(360, 'younes.moulila@student.vinci.be\r', 1, 'MOULILA', 'Younes', NULL),
(361, 'arturo.mozzon@student.vinci.be\r', 1, 'MOZZON', 'Arturo', NULL),
(362, 'zohaib.muhammad@student.vinci.be\r', 1, 'MUHAMMAD', 'Zohaib', NULL),
(363, 'ikram.noorzaai@student.vinci.be\r', 1, 'NOORZAAI', 'Ikram', NULL),
(364, 'yvette roseline.noula fonkou@student.vinci.be\r', 1, 'NOULA FONKOU', 'Yvette Roseline', NULL),
(365, 'andrea.occhilupo@student.vinci.be\r', 1, 'OCCHILUPO', 'Andrea', NULL),
(366, 'djama.omar@student.vinci.be\r', 1, 'OMAR', 'Djama', NULL),
(367, 'zakaria.oulji@student.vinci.be\r', 1, 'OULJI', 'Zakaria', NULL),
(368, 'kawtar.oumghar@student.vinci.be\r', 1, 'OUMGHAR', 'kawtar', NULL),
(369, 'ekrem.öztürk@student.vinci.be\r', 1, 'Öztürk', 'Ekrem', NULL),
(370, 'sophie.paligot@student.vinci.be\r', 1, 'PALIGOT', 'Sophie', NULL),
(371, 'sébastien.pauwels@student.vinci.be\r', 1, 'PAUWELS', 'Sébastien', NULL),
(372, 'françois.pecheur@student.vinci.be\r', 1, 'Pecheur', 'François', NULL),
(373, 'emanuel.peroni@student.vinci.be\r', 1, 'PERONI', 'Emanuel', NULL),
(374, 'victor.pierrot@student.vinci.be\r', 1, 'Pierrot', 'Victor', NULL),
(375, 'joris.pluton@student.vinci.be\r', 1, 'PLUTON', 'Joris', NULL),
(376, 'françois.pochet@student.vinci.be\r', 1, 'Pochet', 'François', NULL),
(377, 'maxime.poelaert@student.vinci.be\r', 1, 'POELAERT', 'Maxime', NULL),
(378, 'hakan.poyraz@student.vinci.be\r', 1, 'POYRAZ', 'Hakan', NULL),
(379, 'antoine.ramelot@student.vinci.be\r', 1, 'RAMELOT', 'Antoine', NULL),
(380, 'alexis.rifaut@student.vinci.be\r', 1, 'RIFAUT', 'Alexis', NULL),
(381, 'sébastien.riga@student.vinci.be\r', 1, 'RIGA', 'Sébastien', NULL),
(382, 'dani.rocha azevedo@student.vinci.be\r', 1, 'Rocha Azevedo', 'Dani', NULL),
(383, 'shahadat.sadeque@student.vinci.be\r', 1, 'SADEQUE', 'Shahadat', NULL),
(384, 'jozef.sako@student.vinci.be\r', 1, 'SAKO', 'Jozef', NULL),
(385, 'brieuc.seeger@student.vinci.be\r', 1, 'SEEGER', 'Brieuc', NULL),
(386, 'sébastien.serré@student.vinci.be\r', 1, 'SERRÉ', 'Sébastien', NULL),
(387, 'florian.sollami@student.vinci.be\r', 1, 'SOLLAMI', 'Florian', NULL),
(388, 'arthur.speicher@student.vinci.be\r', 1, 'SPEICHER', 'Arthur', NULL),
(389, 'johnny.steutgens@student.vinci.be\r', 1, 'STEUTGENS', 'Johnny', NULL),
(390, 'damian.szacun@student.vinci.be\r', 1, 'SZACUN', 'Damian', NULL),
(391, 'kevin.tang@student.vinci.be\r', 1, 'Tang', 'Kevin', NULL),
(392, 'dawid.tararuj@student.vinci.be\r', 1, 'Tararuj', 'Dawid', NULL),
(393, 'fabian.teichmann@student.vinci.be\r', 1, 'TEICHMANN', 'Fabian', NULL),
(394, 'arnaud.terryn@student.vinci.be\r', 1, 'TERRYN', 'Arnaud', NULL),
(395, 'florian.timmermans@student.vinci.be\r', 1, 'TIMMERMANS', 'Florian', NULL),
(396, 'halil.top@student.vinci.be\r', 1, 'TOP', 'Halil', NULL),
(397, 'nicolas.tremerie@student.vinci.be\r', 1, 'Tremerie', 'Nicolas', NULL),
(398, 'tomasz.trykozko@student.vinci.be\r', 1, 'Trykozko', 'Tomasz', NULL),
(399, 'artjam.umanyan@student.vinci.be\r', 1, 'Umanyan', 'Artjam', NULL),
(400, 'amatus.umugabe@student.vinci.be\r', 1, 'UMUGABE', 'Amatus', NULL),
(401, 'ralph.urbach@student.vinci.be\r', 1, 'URBACH', 'Ralph', NULL),
(402, 'louis.van aken@student.vinci.be\r', 1, 'VAN AKEN', 'Louis', NULL),
(403, 'colin.van den brande@student.vinci.be\r', 1, 'VAN DEN BRANDE', 'Colin', NULL),
(404, 'wim.van der schueren@student.vinci.be\r', 1, 'Van der Schueren', 'Wim', NULL),
(405, 'nicolas.van gelder@student.vinci.be\r', 1, 'van GELDER', 'Nicolas', NULL),
(406, 'vincent.van rossem@student.vinci.be\r', 1, 'VAN ROSSEM', 'Vincent', NULL),
(407, 'driss.vandenheede@student.vinci.be\r', 1, 'VANDENHEEDE', 'Driss', NULL),
(408, 'jérémy.vander motte@student.vinci.be\r', 1, 'VANDER MOTTE', 'Jérémy', NULL),
(409, 'guy.vassart@student.vinci.be\r', 1, 'VASSART', 'Guy', NULL),
(410, 'florian.verdonck@student.vinci.be\r', 1, 'VERDONCK', 'Florian', NULL),
(411, 'thomas.verelst@student.vinci.be\r', 1, 'Verelst', 'Thomas', NULL),
(412, 'jonathan.visiedo gil@student.vinci.be\r', 1, 'Visiedo Gil', 'Jonathan', NULL),
(413, 'andy.voiturier@student.vinci.be\r', 1, 'VOITURIER', 'Andy', NULL),
(414, 'joachim.vranken@student.vinci.be\r', 1, 'VRANKEN', 'Joachim', NULL),
(415, 'guillaume.wery@student.vinci.be\r', 1, 'WERY', 'Guillaume', NULL),
(416, 'julien.wets@student.vinci.be\r', 1, 'WETS', 'Julien', NULL),
(417, 'romain.weynand@student.vinci.be\r', 1, 'WEYNAND', 'Romain', NULL),
(418, 'loic.willems@student.vinci.be\r', 1, 'WILLEMS', 'Loic', NULL),
(419, 'klevis.xhakollari@student.vinci.be\r', 1, 'XHAKOLLARI', 'Klevis', NULL),
(420, 'gorgis.yaramis@student.vinci.be\r', 1, 'YARAMIS', 'Gorgis', NULL),
(421, 'tarik.yüksel@student.vinci.be\r', 1, 'Yüksel', 'Tarik', NULL),
(422, 'alexandre.wacquier@student.vinci.be\r', 1, 'WACQUIER', 'Alexandre', NULL),
(423, 'arnaud.poullet@student.vinci.be\r', 1, 'POULLET', 'Arnaud', NULL),
(424, 'ilias.tellihi@student.vinci.be\r', 1, 'TELLIHI', 'Ilias', NULL);

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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;
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
