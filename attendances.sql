-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 11 Mai 2017 à 09:32
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
  `attendance_sheet_id` int(11) NOT NULL,
  `sick_note` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `attendances`
--

INSERT INTO `attendances` (`attendance_id`, `attendance`, `student_id`, `attendance_sheet_id`, `sick_note`) VALUES
(1, 'absent', 3031, 7, NULL),
(2, 'absent', 3032, 7, NULL),
(3, 'absent', 3033, 7, NULL),
(4, 'absent', 3034, 7, NULL),
(5, 'absent', 3035, 7, NULL),
(6, 'absent', 3036, 7, NULL),
(7, 'absent', 3037, 7, NULL),
(8, 'absent', 3038, 7, NULL),
(9, 'absent', 3039, 7, NULL),
(10, 'absent', 3040, 7, NULL),
(11, 'absent', 3041, 7, NULL),
(12, 'absent', 3042, 7, NULL),
(13, 'absent', 3043, 7, NULL),
(14, 'absent', 3044, 7, NULL),
(15, 'absent', 3045, 7, NULL),
(16, 'absent', 3046, 7, NULL),
(17, 'absent', 3047, 7, NULL),
(18, 'absent', 3048, 7, NULL),
(19, 'absent', 3049, 7, NULL),
(20, 'absent', 3050, 7, NULL),
(21, 'absent', 3051, 7, NULL),
(22, 'absent', 3052, 7, NULL),
(23, 'absent', 3053, 7, NULL),
(24, 'absent', 3054, 7, NULL),
(25, 'absent', 3055, 7, NULL),
(26, 'absent', 3056, 7, NULL),
(27, 'absent', 3057, 7, NULL),
(28, 'absent', 3058, 7, NULL),
(29, 'absent', 3059, 7, NULL),
(30, 'absent', 3060, 7, NULL),
(31, 'absent', 3061, 7, NULL),
(32, 'absent', 3062, 7, NULL),
(33, 'absent', 3063, 7, NULL),
(34, 'absent', 3064, 7, NULL),
(35, 'absent', 3065, 7, NULL),
(36, 'absent', 3066, 7, NULL),
(37, 'absent', 3067, 7, NULL),
(38, 'absent', 3068, 7, NULL),
(39, 'absent', 3069, 7, NULL),
(40, 'absent', 3070, 7, NULL),
(41, 'absent', 3071, 7, NULL),
(42, 'absent', 3072, 7, NULL),
(43, 'absent', 3074, 7, NULL),
(44, 'absent', 3075, 7, NULL),
(45, 'absent', 3076, 7, NULL),
(46, 'absent', 3077, 7, NULL),
(47, 'absent', 3078, 7, NULL),
(48, 'absent', 3079, 7, NULL),
(49, 'absent', 3080, 7, NULL),
(50, 'absent', 3081, 7, NULL),
(51, 'absent', 3082, 7, NULL),
(52, 'absent', 3083, 7, NULL),
(53, 'absent', 3084, 7, NULL),
(54, 'absent', 3085, 7, NULL),
(55, 'absent', 3086, 7, NULL),
(56, 'absent', 3087, 7, NULL),
(57, 'absent', 3088, 7, NULL),
(58, 'absent', 3089, 7, NULL),
(59, 'absent', 3090, 7, NULL),
(60, 'absent', 3091, 7, NULL),
(61, 'absent', 3092, 7, NULL),
(62, 'absent', 3093, 7, NULL),
(63, 'absent', 3094, 7, NULL),
(64, 'absent', 3073, 7, NULL),
(65, 'absent', 3095, 7, NULL),
(66, 'absent', 3096, 7, NULL),
(67, 'absent', 3097, 7, NULL),
(68, 'absent', 3098, 7, NULL),
(69, 'absent', 3099, 7, NULL),
(70, 'absent', 3100, 7, NULL),
(71, 'absent', 3101, 7, NULL),
(72, 'absent', 3102, 7, NULL),
(73, 'absent', 3103, 7, NULL),
(74, 'absent', 3104, 7, NULL),
(75, 'absent', 3105, 7, NULL),
(76, 'absent', 3106, 7, NULL),
(77, 'absent', 3107, 7, NULL),
(78, 'absent', 3108, 7, NULL),
(79, 'absent', 3109, 7, NULL),
(80, 'absent', 3110, 7, NULL),
(81, 'absent', 3111, 7, NULL),
(82, 'absent', 3112, 7, NULL),
(83, 'absent', 3113, 7, NULL),
(84, 'absent', 3114, 7, NULL),
(85, 'absent', 3115, 7, NULL),
(86, 'absent', 3116, 7, NULL),
(87, 'absent', 3117, 7, NULL),
(88, 'absent', 3118, 7, NULL),
(89, 'absent', 3119, 7, NULL),
(90, 'absent', 3120, 7, NULL),
(91, 'absent', 3121, 7, NULL),
(92, 'absent', 3122, 7, NULL),
(93, 'absent', 3123, 7, NULL),
(94, 'absent', 3124, 7, NULL),
(95, 'absent', 3125, 7, NULL),
(96, 'absent', 3126, 7, NULL),
(97, 'absent', 3127, 7, NULL),
(98, 'absent', 3128, 7, NULL),
(99, 'absent', 3129, 7, NULL),
(100, 'absent', 3130, 7, NULL),
(101, 'absent', 3131, 7, NULL),
(102, 'absent', 3132, 7, NULL),
(103, 'absent', 3133, 7, NULL),
(104, 'absent', 3134, 7, NULL),
(105, 'absent', 3135, 7, NULL),
(106, 'absent', 3136, 7, NULL),
(107, 'absent', 3137, 7, NULL),
(108, 'absent', 3138, 7, NULL),
(109, 'absent', 3139, 7, NULL),
(110, 'absent', 3140, 7, NULL),
(111, 'absent', 3141, 7, NULL),
(112, 'absent', 3142, 7, NULL),
(113, 'absent', 3143, 7, NULL),
(114, 'absent', 3144, 7, NULL),
(115, 'absent', 3145, 7, NULL),
(116, 'absent', 3146, 7, NULL),
(117, 'absent', 3147, 7, NULL),
(118, 'absent', 3148, 7, NULL),
(119, 'absent', 3149, 7, NULL),
(120, 'absent', 3150, 7, NULL),
(121, 'absent', 3151, 7, NULL),
(122, 'absent', 3152, 7, NULL),
(123, 'absent', 3153, 7, NULL),
(124, 'absent', 3154, 7, NULL),
(125, 'absent', 3155, 7, NULL),
(126, 'absent', 3156, 7, NULL),
(127, 'absent', 3157, 7, NULL),
(128, 'absent', 3158, 7, NULL),
(129, 'absent', 3159, 7, NULL),
(130, 'absent', 3160, 7, NULL),
(131, 'absent', 3161, 7, NULL),
(132, 'absent', 3162, 7, NULL),
(133, 'absent', 3163, 7, NULL),
(134, 'absent', 3164, 7, NULL),
(135, 'absent', 3165, 7, NULL),
(136, 'absent', 3166, 7, NULL),
(137, 'absent', 3167, 7, NULL),
(138, 'absent', 3168, 7, NULL),
(139, 'absent', 3169, 7, NULL),
(140, 'absent', 3170, 7, NULL),
(141, 'absent', 3171, 7, NULL),
(142, 'absent', 3172, 7, NULL),
(143, 'absent', 3173, 7, NULL),
(144, 'absent', 3174, 7, NULL),
(145, 'absent', 3175, 7, NULL),
(146, 'absent', 3176, 7, NULL),
(147, 'absent', 3177, 7, NULL),
(148, 'absent', 3178, 7, NULL),
(149, 'absent', 3179, 7, NULL),
(150, 'absent', 3180, 7, NULL),
(151, 'absent', 3181, 7, NULL),
(152, 'absent', 3182, 7, NULL),
(153, 'absent', 3183, 7, NULL),
(154, 'absent', 3184, 7, NULL),
(155, 'absent', 3185, 7, NULL),
(156, 'absent', 3186, 7, NULL),
(157, 'absent', 3187, 7, NULL),
(158, 'absent', 3188, 7, NULL),
(159, 'absent', 3189, 7, NULL),
(160, 'absent', 3190, 7, NULL),
(161, 'absent', 3191, 7, NULL),
(162, 'absent', 3237, 7, NULL),
(163, 'absent', 3192, 7, NULL),
(164, 'absent', 3193, 7, NULL),
(165, 'absent', 3194, 7, NULL),
(166, 'absent', 3195, 7, NULL),
(167, 'absent', 3196, 7, NULL),
(168, 'absent', 3197, 7, NULL),
(169, 'absent', 3198, 7, NULL),
(170, 'absent', 3199, 7, NULL),
(171, 'absent', 3200, 7, NULL),
(172, 'absent', 3201, 7, NULL),
(173, 'absent', 3202, 7, NULL),
(174, 'absent', 3203, 7, NULL),
(175, 'absent', 3204, 7, NULL),
(176, 'absent', 3205, 7, NULL),
(177, 'absent', 3206, 7, NULL),
(178, 'absent', 3207, 7, NULL),
(179, 'absent', 3238, 7, NULL),
(180, 'absent', 3208, 7, NULL),
(181, 'absent', 3209, 7, NULL),
(182, 'absent', 3210, 7, NULL),
(183, 'absent', 3211, 7, NULL),
(184, 'absent', 3212, 7, NULL),
(185, 'absent', 3213, 7, NULL),
(186, 'absent', 3214, 7, NULL),
(187, 'absent', 3215, 7, NULL),
(188, 'absent', 3216, 7, NULL),
(189, 'absent', 3217, 7, NULL),
(190, 'absent', 3218, 7, NULL),
(191, 'absent', 3219, 7, NULL),
(192, 'absent', 3220, 7, NULL),
(193, 'absent', 3221, 7, NULL),
(194, 'absent', 3222, 7, NULL),
(195, 'absent', 3223, 7, NULL),
(196, 'absent', 3224, 7, NULL),
(197, 'absent', 3225, 7, NULL),
(198, 'absent', 3226, 7, NULL),
(199, 'absent', 3227, 7, NULL),
(200, 'absent', 3228, 7, NULL),
(201, 'absent', 3236, 7, NULL),
(202, 'absent', 3229, 7, NULL),
(203, 'absent', 3230, 7, NULL),
(204, 'absent', 3231, 7, NULL),
(205, 'absent', 3232, 7, NULL),
(206, 'absent', 3233, 7, NULL),
(207, 'absent', 3234, 7, NULL),
(208, 'absent', 3235, 7, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `attendance_sheets`
--

CREATE TABLE `attendance_sheets` (
  `attendance_sheet_id` int(11) NOT NULL,
  `seance_template_id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `week_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `attendance_sheets`
--

INSERT INTO `attendance_sheets` (`attendance_sheet_id`, `seance_template_id`, `mail`, `week_id`) VALUES
(7, 1, 'gregory.seront@vinci.be', 231);

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
('', 'php', 1, 3, 1, 'php', ''),
('IE445LI', 'algotest', 1, 6, 1, 'algo', 'CU'),
('IEDDE', 'math1', 1, 1, 1, 'math', 'cu'),
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
(6, 2, 5),
(7, 1, 5),
(8, 2, 6),
(9, 1, 7),
(10, 4, 9),
(11, 4, 8),
(12, 3, 6),
(13, 7, 8),
(14, 6, 9),
(15, 7, 9);

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
('annick.dupont@vinci.be', 'Dupont', 'Annick', 'false'),
('anthony.legrand@vinci.be', 'Legrand', 'Anthony', 'false'),
('bernard.frank@vinci.be', 'Frank', 'Bernard', 'false'),
('bernard.henriet@vinci.be', 'Henriet', 'Bernard', 'blocs'),
('brigitte.binot@vinci.be', 'Binot', 'Brigitte', 'false'),
('brigitte.lehmann@vinci.be', 'Lehmann', 'Brigitte', 'false'),
('christophe.damas@vinci.be', 'Damas', 'Christophe', 'bloc2'),
('colette.demuylder@vinci.be', 'De Muylder', 'Colette', 'false'),
('donatien.grolaux@vinci.be', 'Grolaux', 'Donatien', 'bloc3'),
('emmeline.leconte@vinci.be', 'Leconte', 'Emmeline', 'blocs'),
('gregory.seront@vinci.be', 'Seront', 'Gregory', 'true'),
('jeanluc.collinet@ipl.be', 'Collinet', 'Jean-Luc', 'bloc1'),
('jose.vandermeulen@vinci.be', 'Vandermeulen', 'José', 'false'),
('julien.federinov@vinci.be', 'Federinov', 'Julien', 'false'),
('laurent.leleux@vinci.be', 'Leleux', 'Laurent', 'false'),
('michel.debacker@vinci.be', 'Debacker', 'Michel', 'false'),
('olivier.choquet@vinci.be', 'Choquet', 'Olivier', 'false'),
('philippe.vaneerdenbrugghe@vinci.be', 'Vaneerdenbrugghe', 'Philippe', 'false'),
('sonia.belina@vinci.be', 'Belina-Podgaetsky', 'Sonia', 'false'),
('stephanie.ferneeuw@vinci.be', 'Ferneeuw', 'Stéphanie', 'false');

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
(3, 'php', 'X', 'IE445LI'),
(4, 'math', 'XO', 'IEDDE'),
(5, 'test', 'X', 'IEDDE'),
(6, 'test2', 'X', 'IEDDE'),
(7, 'test3', 'X', 'IL4545POI');

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
(5, 2, 3, 1),
(6, 2, 2, 1),
(7, 2, 1, 1),
(8, 1, 1, 1),
(9, 1, 2, 1),
(10, 1, 4, 1),
(11, 1, 5, 1);

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
(2892, 'kodjo.adegnon@student.vinci.be', 3, 'ADEGNON', 'Kodjo', 6),
(2893, 'mustafa.alp@student.vinci.be', 3, 'ALP', 'Mustafa', 5),
(2894, 'laurent.batslé@student.vinci.be', 3, 'BATSLÉ', 'Laurent', 8),
(2895, 'stefan.bogdanovic@student.vinci.be', 3, 'BOGDANOVIC', 'Stefan', 7),
(2896, 'fany.bottemanne@student.vinci.be', 3, 'BOTTEMANNE', 'Fany', 9),
(2897, 'bill.brancart@student.vinci.be', 3, 'BRANCART', 'Bill', NULL),
(2898, 'antoine.colet@student.vinci.be', 3, 'COLET', 'Antoine', NULL),
(2899, 'pierric.cotton@student.vinci.be', 3, 'COTTON', 'Pierric', NULL),
(2900, 'andré.daspremont@student.vinci.be', 3, 'DASPREMONT', 'André', NULL),
(2901, 'marc.de burlet@student.vinci.be', 3, 'de BURLET', 'Marc', NULL),
(2902, 'jimmy.de la cruz mallada@student.vinci.be', 3, 'DE LA CRUZ MALLADA', 'Jimmy', NULL),
(2903, 'maxime.de maubeuge@student.vinci.be', 3, 'DE MAUBEUGE', 'Maxime', NULL),
(2904, 'gabriel.delhaye@student.vinci.be', 2, 'DELHAYE', 'Gabriel', NULL),
(2905, 'mathieu.descantons de montblanc@student.vinci.be', 3, 'DESCANTONS de MONTBLANC', 'Mathieu', NULL),
(2906, 'dylan.di vito@student.vinci.be', 3, 'DI VITO', 'Dylan', NULL),
(2907, 'theodor.dimov@student.vinci.be', 3, 'DIMOV', 'Theodor', NULL),
(2908, 'patrycjusz.dolega@student.vinci.be', 3, 'DOLEGA', 'Patrycjusz', NULL),
(2909, 'bastien.dos santos@student.vinci.be', 3, 'DOS SANTOS', 'Bastien', NULL),
(2910, 'philippe.dragomir@student.vinci.be', 3, 'DRAGOMIR', 'Philippe', NULL),
(2911, 'emilien.durieu@student.vinci.be', 3, 'DURIEU', 'Emilien', NULL),
(2912, 'romain.duvillier@student.vinci.be', 3, 'DUVILLIER', 'Romain', NULL),
(2913, 'amaury.evrard@student.vinci.be', 3, 'EVRARD', 'Amaury', NULL),
(2914, 'mike.gaillet@student.vinci.be', 3, 'GAILLET', 'Mike', NULL),
(2915, 'philippe.giuge@student.vinci.be', 3, 'GIUGE', 'Philippe', NULL),
(2916, 'fabio.grumiro@student.vinci.be', 3, 'GRUMIRO', 'Fabio', NULL),
(2917, 'xavier.hoffmann@student.vinci.be', 3, 'HOFFMANN', 'Xavier', NULL),
(2918, 'damien.kech@student.vinci.be', 3, 'KECH', 'Damien', NULL),
(2919, 'aurélien.lefebvre@student.vinci.be', 3, 'LEFEBVRE', 'Aurélien', NULL),
(2920, 'gaël.leroy@student.vinci.be', 3, 'LEROY', 'Gaël', NULL),
(2921, 'junior.maduka@student.vinci.be', 3, 'MADUKA', 'Junior', NULL),
(2922, 'anthony.maton@student.vinci.be', 3, 'MATON', 'Anthony', NULL),
(2923, 'jean-pacifique.mbonyincungu @student.vinci.be', 3, 'MBONYINCUNGU ', 'Jean-Pacifique', NULL),
(2924, 'christian.mendes rosa@student.vinci.be', 3, 'MENDES ROSA', 'Christian', NULL),
(2925, 'yannick.molinghen@student.vinci.be', 3, 'MOLINGHEN', 'Yannick', NULL),
(2926, 'florian.morel@student.vinci.be', 3, 'MOREL', 'Florian', NULL),
(2927, 'hamza.mounir@student.vinci.be', 3, 'MOUNIR', 'Hamza', NULL),
(2928, 'sam.ndagano@student.vinci.be', 3, 'NDAGANO', 'Sam', NULL),
(2929, 'quoc dat.nguyen@student.vinci.be', 3, 'NGUYEN', 'Quoc Dat', NULL),
(2930, 'nicolas.oste@student.vinci.be', 3, 'OSTE', 'Nicolas', NULL),
(2931, 'lionel.ovaert@student.vinci.be', 3, 'OVAERT', 'Lionel', NULL),
(2932, 'ivan.pessers@student.vinci.be', 3, 'PESSERS', 'Ivan', NULL),
(2933, 'delanoe.pirard@student.vinci.be', 3, 'PIRARD', 'Delanoe', NULL),
(2934, 'arnaud.rochez@student.vinci.be', 3, 'ROCHEZ', 'Arnaud', NULL),
(2935, 'konstantin.romanov@student.vinci.be', 3, 'ROMANOV', 'Konstantin', NULL),
(2936, 'jean-françois.schweisthal@student.vinci.be', 3, 'SCHWEISTHAL', 'Jean-François', NULL),
(2937, 'philipp.shevtchenko@student.vinci.be', 3, 'SHEVTCHENKO', 'Philipp', NULL),
(2938, 'mathieu.steenput@student.vinci.be', 3, 'STEENPUT', 'Mathieu', NULL),
(2939, 'loïc.stevens@student.vinci.be', 3, 'STEVENS', 'Loïc', NULL),
(2940, 'mélissa.strauven@student.vinci.be', 3, 'STRAUVEN', 'Mélissa', NULL),
(2941, 'damien.syemons@student.vinci.be', 3, 'SYEMONS', 'Damien', NULL),
(2942, 'martin.techy@student.vinci.be', 3, 'TECHY', 'Martin', NULL),
(2943, 'vinh kien.truong@student.vinci.be', 3, 'TRUONG', 'Vinh Kien', NULL),
(2944, 'antoine.verlant@student.vinci.be', 3, 'VERLANT', 'Antoine', NULL),
(2945, 'maxime.verwilghen@student.vinci.be', 3, 'VERWILGHEN', 'Maxime', NULL),
(2946, 'milenko.vorkapic@student.vinci.be', 3, 'VORKAPIC', 'Milenko', NULL),
(2947, 'jacques.yakoub@student.vinci.be', 3, 'YAKOUB', 'Jacques', NULL),
(2948, 'sheng hao.ye@student.vinci.be', 3, 'YE', 'Sheng Hao', NULL),
(2949, 'michaël.andre@student.vinci.be', 2, 'ANDRE', 'Michaël', NULL),
(2950, 'kamil.arszagi vel harszagi@student.vinci.be', 2, 'ARSZAGI VEL HARSZAGI', 'Kamil', NULL),
(2951, 'rachid.asli@student.vinci.be', 2, 'ASLI', 'Rachid', NULL),
(2952, 'nathan.ayele@student.vinci.be', 2, 'AYELE', 'Nathan', NULL),
(2953, 'abdelhak.bakalem@student.vinci.be', 2, 'BAKALEM', 'Abdelhak', NULL),
(2954, 'sami.barchid@student.vinci.be', 2, 'BARCHID', 'Sami', NULL),
(2955, 'ahmad.bashir@student.vinci.be', 2, 'BASHIR', 'Ahmad', NULL),
(2956, 'benjamin.bergé@student.vinci.be', 2, 'BERGÉ', 'Benjamin', NULL),
(2957, 'nicolas.bertolini@student.vinci.be', 2, 'BERTOLINI', 'Nicolas', NULL),
(2958, 'christophe.bortier@student.vinci.be', 2, 'BORTIER', 'Christophe', NULL),
(2959, 'timothée.bouvin@student.vinci.be', 2, 'BOUVIN', 'Timothée', NULL),
(2960, 'roland.bura@student.vinci.be', 2, 'BURA', 'Roland', NULL),
(2961, 'johann.buxant@student.vinci.be', 2, 'BUXANT', 'Johann', NULL),
(2962, 'nicolas.christodoulou de graillet@student.vinci.be', 2, 'CHRISTODOULOU de GRAILLET', 'Nicolas', NULL),
(2963, 'mamadou.cissé@student.vinci.be', 2, 'CISSÉ', 'Mamadou', NULL),
(2964, 'jean-françois.cochart@student.vinci.be', 2, 'COCHART', 'Jean-François', NULL),
(2965, 'alexandre.coste-gandrey@student.vinci.be', 2, 'COSTE-GANDREY', 'Alexandre', NULL),
(2966, 'virginia.dabrowski@student.vinci.be', 2, 'DABROWSKI', 'Virginia', NULL),
(2967, 'michel.de broux@student.vinci.be', 2, 'De Broux', 'Michel', NULL),
(2968, 'gaspard.de villenfagne de vogelsanck@student.vinci.be', 2, 'de VILLENFAGNE de VOGELSANCK', 'Gaspard', NULL),
(2969, 'lancelot.de wouters de bouchout@student.vinci.be', 2, 'de WOUTERS de BOUCHOUT', 'Lancelot', NULL),
(2970, 'benjamin.declercq@student.vinci.be', 2, 'DECLERCQ', 'Benjamin', NULL),
(2971, 'olivier.degrève@student.vinci.be', 2, 'DEGRÈVE', 'Olivier', NULL),
(2972, 'valentin.delwart@student.vinci.be', 2, 'DELWART', 'Valentin', NULL),
(2973, 'quentin.denis@student.vinci.be', 2, 'DENIS', 'Quentin', NULL),
(2974, 'maxime.denuit@student.vinci.be', 2, 'DENUIT', 'Maxime', NULL),
(2975, 'romain.descamps@student.vinci.be', 2, 'DESCAMPS', 'Romain', NULL),
(2976, 'valentin.desénépart@student.vinci.be', 2, 'DESÉNÉPART', 'Valentin', NULL),
(2977, 'christophe.driessen@student.vinci.be', 2, 'DRIESSEN', 'Christophe', NULL),
(2978, 'clément.du jardin@student.vinci.be', 2, 'du JARDIN', 'Clément', NULL),
(2979, 'corenthin.dubois@student.vinci.be', 2, 'DUBOIS', 'Corenthin', NULL),
(2980, 'adeline.duterre@student.vinci.be', 2, 'DUTERRE', 'Adeline', NULL),
(2981, 'arnaud.etienne@student.vinci.be', 2, 'ETIENNE', 'Arnaud', NULL),
(2982, 'pierre-paul.gaillet@student.vinci.be', 2, 'GAILLET', 'Pierre-Paul', NULL),
(2983, 'marcos.garcia augusto@student.vinci.be', 2, 'GARCIA AUGUSTO', 'Marcos', NULL),
(2984, 'quentin.gilmart@student.vinci.be', 2, 'GILMART', 'Quentin', NULL),
(2985, 'romain.grimmonpré@student.vinci.be', 2, 'GRIMMONPRÉ', 'Romain', NULL),
(2986, 'gabriel.haba@student.vinci.be', 2, 'HABA', 'Gabriel', NULL),
(2987, 'alexandre.hardi@student.vinci.be', 2, 'HARDI', 'Alexandre', NULL),
(2988, 'kevin.heylbroeck@student.vinci.be', 2, 'HEYLBROECK', 'Kevin', NULL),
(2989, 'frédéric.hubert@student.vinci.be', 2, 'HUBERT', 'Frédéric', NULL),
(2990, 'félix.jacoby@student.vinci.be', 2, 'JACOBY', 'Félix', NULL),
(2991, 'johnny.la@student.vinci.be', 2, 'LA', 'Johnny', NULL),
(2992, 'gauthier.lallemand@student.vinci.be', 2, 'LALLEMAND', 'Gauthier', NULL),
(2993, 'antoine.lambricht@student.vinci.be', 2, 'LAMBRICHT', 'Antoine', NULL),
(2994, 'zakaria.lamrini@student.vinci.be', 2, 'LAMRINI', 'Zakaria', NULL),
(2995, 'alexandre.maniet@student.vinci.be', 2, 'MANIET', 'Alexandre', NULL),
(2996, 'antoine.maniet@student.vinci.be', 2, 'MANIET', 'Antoine', NULL),
(2997, 'mickaël.marlard@student.vinci.be', 2, 'MARLARD', 'Mickaël', NULL),
(2998, 'patrick.mazur@student.vinci.be', 2, 'MAZUR', 'Patrick', NULL),
(2999, 'damien.meur@student.vinci.be', 2, 'MEUR', 'Damien', NULL),
(3000, 'ibrahim.mourade@student.vinci.be', 2, 'MOURADE', 'Ibrahim', NULL),
(3001, 'meriam.mzoughi@student.vinci.be', 2, 'MZOUGHI', 'Meriam', NULL),
(3002, 'dat toan.nguyen@student.vinci.be', 2, 'NGUYEN', 'Dat Toan', NULL),
(3003, 'tran.nguyen@student.vinci.be', 2, 'NGUYEN', 'Tran', NULL),
(3004, 'diego.nuez soriano@student.vinci.be', 2, 'NUEZ SORIANO', 'Diego', NULL),
(3005, 'simon.oldenhove de guertechin@student.vinci.be', 2, 'OLDENHOVE de GUERTECHIN', 'Simon', NULL),
(3006, 'anthony.pierre@student.vinci.be', 2, 'PIERRE', 'Anthony', NULL),
(3007, 'benjamin.pierre@student.vinci.be', 2, 'PIERRE', 'Benjamin', NULL),
(3008, 'maxime.pirlet@student.vinci.be', 2, 'PIRLET', 'Maxime', NULL),
(3009, 'sébastien.place@student.vinci.be', 2, 'PLACE', 'Sébastien', NULL),
(3010, 'anthony.pyck@student.vinci.be', 2, 'PYCK', 'Anthony', NULL),
(3011, 'gilles.renson@student.vinci.be', 2, 'RENSON', 'Gilles', NULL),
(3012, 'antonin.riche@student.vinci.be', 2, 'RICHE', 'Antonin', NULL),
(3013, 'thomas.ronsmans@student.vinci.be', 2, 'RONSMANS', 'Thomas', NULL),
(3014, 'jean-bosco.rwibutso@student.vinci.be', 2, 'RWIBUTSO', 'Jean-Bosco', NULL),
(3015, 'christopher.sacré@student.vinci.be', 2, 'SACRÉ', 'Christopher', NULL),
(3016, 'roman.skubiszewski@student.vinci.be', 2, 'SKUBISZEWSKI', 'Roman', NULL),
(3017, 'tanguy.snoeck@student.vinci.be', 2, 'SNOECK', 'Tanguy', NULL),
(3018, 'julien.solinas@student.vinci.be', 2, 'SOLINAS', 'Julien', NULL),
(3019, 'alexandre.sousa dos santos@student.vinci.be', 2, 'SOUSA DOS SANTOS', 'Alexandre', NULL),
(3020, 'emre.tasyürek@student.vinci.be', 2, 'TASYÜREK', 'Emre', NULL),
(3021, 'cedric.tavernier@student.vinci.be', 2, 'TAVERNIER', 'Cedric', NULL),
(3022, 'debrah.tinsia@student.vinci.be', 2, 'TINSIA', 'Debrah', NULL),
(3023, 'kyrill.tircher@student.vinci.be', 2, 'TIRCHER', 'Kyrill', NULL),
(3024, 'thomas.van gelder@student.vinci.be', 2, 'van GELDER', 'Thomas', NULL),
(3025, 'amandine.van grunderbeeck@student.vinci.be', 2, 'VAN GRUNDERBEECK', 'Amandine', NULL),
(3026, 'romain.van lithaut@student.vinci.be', 2, 'VAN LITHAUT', 'Romain', NULL),
(3027, 'anthony.vancampenhault@student.vinci.be', 2, 'VANCAMPENHAULT', 'Anthony', NULL),
(3028, 'nolan.vanmoortel@student.vinci.be', 2, 'VANMOORTEL', 'Nolan', NULL),
(3029, 'jolan.wathelet@student.vinci.be', 2, 'WATHELET', 'Jolan', NULL),
(3030, 'robert.woronko@student.vinci.be', 2, 'WORONKO', 'Robert', NULL),
(3031, 'ismaila.abdoulahi adamou@student.vinci.be', 1, 'ABDOULAHI ADAMOU', 'Ismaila', NULL),
(3032, 'viken.afsar@student.vinci.be', 1, 'AFSAR', 'Viken', NULL),
(3033, 'shayan.amini@student.vinci.be', 1, 'AMINI', 'Shayan', NULL),
(3034, 'marco.amory@student.vinci.be', 1, 'AMORY', 'Marco', NULL),
(3035, 'thibault.andersson@student.vinci.be', 1, 'ANDERSSON', 'Thibault', NULL),
(3036, 'ange cedrick.angaman@student.vinci.be', 1, 'ANGAMAN', 'Ange Cedrick', NULL),
(3037, 'bunyamin.aslan@student.vinci.be', 1, 'ASLAN', 'Bunyamin', NULL),
(3038, 'yassin.assecoum@student.vinci.be', 1, 'ASSECOUM', 'Yassin', NULL),
(3039, 'youssef.astitou@student.vinci.be', 1, 'ASTITOU', 'Youssef', NULL),
(3040, 'iulian.avram@student.vinci.be', 1, 'Avram', 'Iulian', NULL),
(3041, 'samir.bacha@student.vinci.be', 1, 'BACHA', 'Samir', NULL),
(3042, 'jérémy.balcinhas godinho@student.vinci.be', 1, 'BALCINHAS GODINHO', 'Jérémy', NULL),
(3043, 'mac blair.ballecer@student.vinci.be', 1, 'BALLECER', 'Mac Blair', NULL),
(3044, 'ilias.barrani@student.vinci.be', 1, 'BARRANI', 'Ilias', NULL),
(3045, 'tahir.bashir@student.vinci.be', 1, 'BASHIR', 'Tahir', NULL),
(3046, 'logan.bauduin@student.vinci.be', 1, 'BAUDUIN', 'Logan', NULL),
(3047, 'youness.belhassnaoui@student.vinci.be', 1, 'BELHASSNAOUI', 'Youness', NULL),
(3048, 'driss.ben geloune@student.vinci.be', 1, 'BEN GELOUNE', 'Driss', NULL),
(3049, 'khalil.benazzouz@student.vinci.be', 1, 'BENAZZOUZ', 'Khalil', NULL),
(3050, 'yahya.bennaghmouch@student.vinci.be', 1, 'BENNAGHMOUCH', 'Yahya', NULL),
(3051, 'patrick.bikorimana@student.vinci.be', 1, 'BIKORIMANA', 'Patrick', NULL),
(3052, 'thomas.boon@student.vinci.be', 1, 'BOON', 'Thomas', NULL),
(3053, 'morgan.bossin@student.vinci.be', 1, 'BOSSIN', 'Morgan', NULL),
(3054, 'salim.bouchbouk@student.vinci.be', 1, 'Bouchbouk', 'Salim', NULL),
(3055, 'nawfal.boujtat@student.vinci.be', 1, 'BOUJTAT', 'Nawfal', NULL),
(3056, 'sohaib.boulban yousrani@student.vinci.be', 1, 'BOULBAN YOUSRANI', 'Sohaib', NULL),
(3057, 'logan.bourez@student.vinci.be', 1, 'BOUREZ', 'Logan', NULL),
(3058, 'arnaud.bourez@student.vinci.be', 1, 'BOUREZ', 'Arnaud', NULL),
(3059, 'alan.buelinckx@student.vinci.be', 1, 'BUELINCKX', 'Alan', NULL),
(3060, 'tuan.bui@student.vinci.be', 1, 'BUI', 'Tuan', NULL),
(3061, 'samuel.camus@student.vinci.be', 1, 'CAMUS', 'Samuel', NULL),
(3062, 'liseta.carcani@student.vinci.be', 1, 'CARCANI', 'Liseta', NULL),
(3063, 'christopher.castel@student.vinci.be', 1, 'CASTEL', 'Christopher', NULL),
(3064, 'rocco.cauchi@student.vinci.be', 1, 'CAUCHI', 'Rocco', NULL),
(3065, 'mohammed.chairi bounekoub@student.vinci.be', 1, 'Chairi Bounekoub', 'Mohammed', NULL),
(3066, 'chamil.chakhabov@student.vinci.be', 1, 'CHAKHABOV', 'Chamil', NULL),
(3067, 'nicolas.chapelle@student.vinci.be', 1, 'CHAPELLE', 'Nicolas', NULL),
(3068, 'soufiane.chelaghmi@student.vinci.be', 1, 'CHELAGHMI', 'Soufiane', NULL),
(3069, 'yiwei.chen@student.vinci.be', 1, 'CHEN', 'Yiwei', NULL),
(3070, 'tom.conneely mcinerney@student.vinci.be', 1, 'CONNEELY MCINERNEY', 'Tom', NULL),
(3071, 'sébastien.croonen@student.vinci.be', 1, 'CROONEN', 'Sébastien', NULL),
(3072, 'gabriel.curatolo@student.vinci.be', 1, 'CURATOLO', 'Gabriel', NULL),
(3073, 'martin.d’hoedt @student.vinci.be', 1, 'D’HOEDT ', 'Martin', NULL),
(3074, 'kadir.dagyaran@student.vinci.be', 1, 'DAGYARAN', 'Kadir', NULL),
(3075, 'arnaud.de boeck@student.vinci.be', 1, 'DE BOECK', 'Arnaud', NULL),
(3076, 'benjamin.de bosscher@student.vinci.be', 1, 'De Bosscher', 'Benjamin', NULL),
(3077, 'hugues.de mathelin de papigny@student.vinci.be', 1, 'de Mathelin de Papigny', 'Hugues', NULL),
(3078, 'augustin.de meeûs d\'argenteuil@student.vinci.be', 1, 'de MEEÛS d\'ARGENTEUIL', 'Augustin', NULL),
(3079, 'antoine.de roose@student.vinci.be', 1, 'DE ROOSE', 'Antoine', NULL),
(3080, 'andy.de smedt@student.vinci.be', 1, 'De Smedt', 'Andy', NULL),
(3081, 'nestor.debiesme@student.vinci.be', 1, 'Debiesme', 'Nestor', NULL),
(3082, 'jérôme.deborsu@student.vinci.be', 1, 'DEBORSU', 'Jérôme', NULL),
(3083, 'antoine.debroux@student.vinci.be', 1, 'DEBROUX', 'Antoine', NULL),
(3084, 'grégory.decraemer@student.vinci.be', 1, 'DECRAEMER', 'Grégory', NULL),
(3085, 'loïc.defossé@student.vinci.be', 1, 'Defossé', 'Loïc', NULL),
(3086, 'nicolas.delannoy@student.vinci.be', 1, 'DELANNOY', 'Nicolas', NULL),
(3087, 'adrian.dellavalle morinigo@student.vinci.be', 1, 'DELLAVALLE MORINIGO', 'Adrian', NULL),
(3088, 'léo.descamps@student.vinci.be', 1, 'DESCAMPS', 'Léo', NULL),
(3089, 'bastien.dessy@student.vinci.be', 1, 'DESSY', 'Bastien', NULL),
(3090, 'thibault.devaleriola@student.vinci.be', 1, 'DEVALERIOLA', 'Thibault', NULL),
(3091, 'brian.diaz alvarez@student.vinci.be', 1, 'Diaz Alvarez', 'Brian', NULL),
(3092, 'romain.donck@student.vinci.be', 1, 'DONCK', 'Romain', NULL),
(3093, 'julien.doyen@student.vinci.be', 1, 'DOYEN', 'Julien', NULL),
(3094, 'jean.dubuisson@student.vinci.be', 1, 'DUBUISSON', 'Jean', NULL),
(3095, 'othmane.echagdali zahri@student.vinci.be', 1, 'ECHAGDALI ZAHRI', 'Othmane', NULL),
(3096, 'hicham.el asri@student.vinci.be', 1, 'EL ASRI', 'Hicham', NULL),
(3097, 'ismaël.el f\'kih ben ahmed@student.vinci.be', 1, 'El F\'Kih Ben Ahmed', 'Ismaël', NULL),
(3098, 'yassine.el hadouchi@student.vinci.be', 1, 'EL HADOUCHI', 'Yassine', NULL),
(3099, 'mohammed.el khattabi@student.vinci.be', 1, 'EL KHATTABI', 'Mohammed', NULL),
(3100, 'zineb.el mokadem@student.vinci.be', 1, 'EL MOKADEM', 'Zineb', NULL),
(3101, 'younes.erraide@student.vinci.be', 1, 'Erraide', 'Younes', NULL),
(3102, 'majd.fahmi@student.vinci.be', 1, 'FAHMI', 'Majd', NULL),
(3103, 'risaci-deogratias.faizi@student.vinci.be', 1, 'FAIZI', 'Risaci-Deogratias', NULL),
(3104, 'sami.farhat@student.vinci.be', 1, 'FARHAT', 'Sami', NULL),
(3105, 'albinot.fetahi@student.vinci.be', 1, 'Fetahi', 'Albinot', NULL),
(3106, 'paul-edouard.fouquet@student.vinci.be', 1, 'FOUQUET', 'Paul-Edouard', NULL),
(3107, 'vincent.franchomme@student.vinci.be', 1, 'FRANCHOMME', 'Vincent', NULL),
(3108, 'geoffroy.frennet@student.vinci.be', 1, 'FRENNET', 'Geoffroy', NULL),
(3109, 'adrian.gajda@student.vinci.be', 1, 'GAJDA', 'Adrian', NULL),
(3110, 'nicolas.gasia@student.vinci.be', 1, 'GASIA', 'Nicolas', NULL),
(3111, 'lopodi.gaza@student.vinci.be', 1, 'GAZA', 'Lopodi', NULL),
(3112, 'ali.godazendeh@student.vinci.be', 1, 'GODAZENDEH', 'Ali', NULL),
(3113, 'sebastian.gonzalez moran@student.vinci.be', 1, 'GONZALEZ MORAN', 'Sebastian', NULL),
(3114, 'diana.grama@student.vinci.be', 1, 'Grama', 'Diana', NULL),
(3115, 'gauthier.grandhenry@student.vinci.be', 1, 'GRANDHENRY', 'Gauthier', NULL),
(3116, 'lukas.greif@student.vinci.be', 1, 'GREIF', 'Lukas', NULL),
(3117, 'dorian.gruselin@student.vinci.be', 1, 'GRUSELIN', 'Dorian', NULL),
(3118, 'hamza.guerrouaj@student.vinci.be', 1, 'GUERROUAJ', 'Hamza', NULL),
(3119, 'simon.guilmot@student.vinci.be', 1, 'GUILMOT', 'Simon', NULL),
(3120, 'soufiane.haidour@student.vinci.be', 1, 'HAIDOUR', 'Soufiane', NULL),
(3121, 'kei-jyu.hama@student.vinci.be', 1, 'HAMA', 'Kei-Jyu', NULL),
(3122, 'anas.hammani@student.vinci.be', 1, 'HAMMANI', 'Anas', NULL),
(3123, 'mohamed.hassouni@student.vinci.be', 1, 'HASSOUNI', 'Mohamed', NULL),
(3124, 'cyril.hennen@student.vinci.be', 1, 'HENNEN', 'Cyril', NULL),
(3125, 'jeremy.holodiline@student.vinci.be', 1, 'Holodiline', 'Jeremy', NULL),
(3126, 'romaric.honorez@student.vinci.be', 1, 'HONOREZ', 'Romaric', NULL),
(3127, 'cyrille.hourant@student.vinci.be', 1, 'HOURANT', 'Cyrille', NULL),
(3128, 'mehdi.ibnlfassi@student.vinci.be', 1, 'IBNLFASSI', 'Mehdi', NULL),
(3129, 'said.imran@student.vinci.be', 1, 'IMRAN', 'Said', NULL),
(3130, 'christophe.jabbour@student.vinci.be', 1, 'Jabbour', 'Christophe', NULL),
(3131, 'loury.jacob@student.vinci.be', 1, 'JACOB', 'Loury', NULL),
(3132, 'ilias.jafar@student.vinci.be', 1, 'JAFAR', 'Ilias', NULL),
(3133, 'pawel.jalbrzykowski@student.vinci.be', 1, 'JALBRZYKOWSKI', 'Pawel', NULL),
(3134, 'thibaut.janssens@student.vinci.be', 1, 'JANSSENS', 'Thibaut', NULL),
(3135, 'adnan.jlassi@student.vinci.be', 1, 'JLASSI', 'Adnan', NULL),
(3136, 'egide.kabanza@student.vinci.be', 1, 'KABANZA', 'Egide', NULL),
(3137, 'rubain.kamegneson wabo@student.vinci.be', 1, 'KAMEGNESON WABO', 'Rubain', NULL),
(3138, 'burim.kastrati@student.vinci.be', 1, 'KASTRATI', 'Burim', NULL),
(3139, 'bouchra.kh\' leeh@student.vinci.be', 1, 'KH\' LEEH', 'Bouchra', NULL),
(3140, 'gaël.kifoumbi @student.vinci.be', 1, 'KIFOUMBI ', 'Gaël', NULL),
(3141, 'kamil.kowalczyk@student.vinci.be', 1, 'KOWALCZYK', 'Kamil', NULL),
(3142, 'dejvi.kurti@student.vinci.be', 1, 'KURTI', 'Dejvi', NULL),
(3143, 'martin.kutzner@student.vinci.be', 1, 'KUTZNER', 'Martin', NULL),
(3144, 'sandra.kwibuka@student.vinci.be', 1, 'KWIBUKA', 'Sandra', NULL),
(3145, 'otman.lachkar@student.vinci.be', 1, 'LACHKAR', 'Otman', NULL),
(3146, 'badreddine.lahrichi@student.vinci.be', 1, 'LAHRICHI', 'Badreddine', NULL),
(3147, 'lorenzo.lapage@student.vinci.be', 1, 'LAPAGE', 'Lorenzo', NULL),
(3148, 'youssef.larbi@student.vinci.be', 1, 'LARBI', 'Youssef', NULL),
(3149, 'lorenzo.lauricella@student.vinci.be', 1, 'LAURICELLA', 'Lorenzo', NULL),
(3150, 'nicolas.lecoq@student.vinci.be', 1, 'LECOQ', 'Nicolas', NULL),
(3151, 'robin.lefebvre@student.vinci.be', 1, 'LEFEBVRE', 'Robin', NULL),
(3152, 'guillaume.lion@student.vinci.be', 1, 'LION', 'Guillaume', NULL),
(3153, 'thomas.lion@student.vinci.be', 1, 'LION', 'Thomas', NULL),
(3154, 'filip.lolic@student.vinci.be', 1, 'Lolic', 'Filip', NULL),
(3155, 'nicolas.lorphelin@student.vinci.be', 1, 'LORPHELIN', 'Nicolas', NULL),
(3156, 'robin.louis@student.vinci.be', 1, 'LOUIS', 'Robin', NULL),
(3157, 'rachid.mabrouk@student.vinci.be', 1, 'MABROUK', 'Rachid', NULL),
(3158, 'joelle.maffo meleu@student.vinci.be', 1, 'MAFFO MELEU', 'Joelle', NULL),
(3159, 'hamza.mahmoudi@student.vinci.be', 1, 'MAHMOUDI', 'Hamza', NULL),
(3160, 'lucas.malmport@student.vinci.be', 1, 'Malmport', 'Lucas', NULL),
(3161, 'yannis.manguin@student.vinci.be', 1, 'MANGUIN', 'Yannis', NULL),
(3162, 'azeddine.mansour@student.vinci.be', 1, 'Mansour', 'Azeddine', NULL),
(3163, 'mathieu.marcq@student.vinci.be', 1, 'MARCQ', 'Mathieu', NULL),
(3164, 'nicolas.marcq@student.vinci.be', 1, 'Marcq', 'Nicolas', NULL),
(3165, 'sacha.maricau@student.vinci.be', 1, 'MARICAU', 'Sacha', NULL),
(3166, 'max.marin@student.vinci.be', 1, 'Marin', 'Max', NULL),
(3167, 'alexandre.maroun@student.vinci.be', 1, 'Maroun', 'Alexandre', NULL),
(3168, 'cedric.martin@student.vinci.be', 1, 'MARTIN', 'Cedric', NULL),
(3169, 'marc.meganck@student.vinci.be', 1, 'MEGANCK', 'Marc', NULL),
(3170, 'kevin.mero vallas@student.vinci.be', 1, 'MERO VALLAS', 'Kevin', NULL),
(3171, 'pierre.michiels@student.vinci.be', 1, 'MICHIELS', 'Pierre', NULL),
(3172, 'malo.misson@student.vinci.be', 1, 'MISSON', 'Malo', NULL),
(3173, 'xavier.mouffo@student.vinci.be', 1, 'Mouffo', 'Xavier', NULL),
(3174, 'younes.moulila@student.vinci.be', 1, 'MOULILA', 'Younes', NULL),
(3175, 'arturo.mozzon@student.vinci.be', 1, 'MOZZON', 'Arturo', NULL),
(3176, 'zohaib.muhammad@student.vinci.be', 1, 'MUHAMMAD', 'Zohaib', NULL),
(3177, 'ikram.noorzaai@student.vinci.be', 1, 'NOORZAAI', 'Ikram', NULL),
(3178, 'yvette roseline.noula fonkou@student.vinci.be', 1, 'NOULA FONKOU', 'Yvette Roseline', NULL),
(3179, 'andrea.occhilupo@student.vinci.be', 1, 'OCCHILUPO', 'Andrea', NULL),
(3180, 'djama.omar@student.vinci.be', 1, 'OMAR', 'Djama', NULL),
(3181, 'zakaria.oulji@student.vinci.be', 1, 'OULJI', 'Zakaria', NULL),
(3182, 'kawtar.oumghar@student.vinci.be', 1, 'OUMGHAR', 'kawtar', NULL),
(3183, 'ekrem.öztürk@student.vinci.be', 1, 'Öztürk', 'Ekrem', NULL),
(3184, 'sophie.paligot@student.vinci.be', 1, 'PALIGOT', 'Sophie', NULL),
(3185, 'sébastien.pauwels@student.vinci.be', 1, 'PAUWELS', 'Sébastien', NULL),
(3186, 'françois.pecheur@student.vinci.be', 1, 'Pecheur', 'François', NULL),
(3187, 'emanuel.peroni@student.vinci.be', 1, 'PERONI', 'Emanuel', NULL),
(3188, 'victor.pierrot@student.vinci.be', 1, 'Pierrot', 'Victor', NULL),
(3189, 'joris.pluton@student.vinci.be', 1, 'PLUTON', 'Joris', NULL),
(3190, 'françois.pochet@student.vinci.be', 1, 'Pochet', 'François', NULL),
(3191, 'maxime.poelaert@student.vinci.be', 1, 'POELAERT', 'Maxime', NULL),
(3192, 'hakan.poyraz@student.vinci.be', 1, 'POYRAZ', 'Hakan', NULL),
(3193, 'antoine.ramelot@student.vinci.be', 1, 'RAMELOT', 'Antoine', NULL),
(3194, 'alexis.rifaut@student.vinci.be', 1, 'RIFAUT', 'Alexis', NULL),
(3195, 'sébastien.riga@student.vinci.be', 1, 'RIGA', 'Sébastien', NULL),
(3196, 'dani.rocha azevedo@student.vinci.be', 1, 'Rocha Azevedo', 'Dani', NULL),
(3197, 'shahadat.sadeque@student.vinci.be', 1, 'SADEQUE', 'Shahadat', NULL),
(3198, 'jozef.sako@student.vinci.be', 1, 'SAKO', 'Jozef', NULL),
(3199, 'brieuc.seeger@student.vinci.be', 1, 'SEEGER', 'Brieuc', NULL),
(3200, 'sébastien.serré@student.vinci.be', 1, 'SERRÉ', 'Sébastien', NULL),
(3201, 'florian.sollami@student.vinci.be', 1, 'SOLLAMI', 'Florian', NULL),
(3202, 'arthur.speicher@student.vinci.be', 1, 'SPEICHER', 'Arthur', NULL),
(3203, 'johnny.steutgens@student.vinci.be', 1, 'STEUTGENS', 'Johnny', NULL),
(3204, 'damian.szacun@student.vinci.be', 1, 'SZACUN', 'Damian', NULL),
(3205, 'kevin.tang@student.vinci.be', 1, 'Tang', 'Kevin', NULL),
(3206, 'dawid.tararuj@student.vinci.be', 1, 'Tararuj', 'Dawid', NULL),
(3207, 'fabian.teichmann@student.vinci.be', 1, 'TEICHMANN', 'Fabian', NULL),
(3208, 'arnaud.terryn@student.vinci.be', 1, 'TERRYN', 'Arnaud', NULL),
(3209, 'florian.timmermans@student.vinci.be', 1, 'TIMMERMANS', 'Florian', NULL),
(3210, 'halil.top@student.vinci.be', 1, 'TOP', 'Halil', NULL),
(3211, 'nicolas.tremerie@student.vinci.be', 1, 'Tremerie', 'Nicolas', NULL),
(3212, 'tomasz.trykozko@student.vinci.be', 1, 'Trykozko', 'Tomasz', NULL),
(3213, 'artjam.umanyan@student.vinci.be', 1, 'Umanyan', 'Artjam', NULL),
(3214, 'amatus.umugabe@student.vinci.be', 1, 'UMUGABE', 'Amatus', NULL),
(3215, 'ralph.urbach@student.vinci.be', 1, 'URBACH', 'Ralph', NULL),
(3216, 'louis.van aken@student.vinci.be', 1, 'VAN AKEN', 'Louis', NULL),
(3217, 'colin.van den brande@student.vinci.be', 1, 'VAN DEN BRANDE', 'Colin', 10),
(3218, 'wim.van der schueren@student.vinci.be', 1, 'Van der Schueren', 'Wim', 11),
(3219, 'nicolas.van gelder@student.vinci.be', 1, 'van GELDER', 'Nicolas', 9),
(3220, 'vincent.van rossem@student.vinci.be', 1, 'VAN ROSSEM', 'Vincent', 7),
(3221, 'driss.vandenheede@student.vinci.be', 1, 'VANDENHEEDE', 'Driss', NULL),
(3222, 'jérémy.vander motte@student.vinci.be', 1, 'VANDER MOTTE', 'Jérémy', 8),
(3223, 'guy.vassart@student.vinci.be', 1, 'VASSART', 'Guy', 10),
(3224, 'florian.verdonck@student.vinci.be', 1, 'VERDONCK', 'Florian', 8),
(3225, 'thomas.verelst@student.vinci.be', 1, 'Verelst', 'Thomas', 8),
(3226, 'jonathan.visiedo gil@student.vinci.be', 1, 'Visiedo Gil', 'Jonathan', NULL),
(3227, 'andy.voiturier@student.vinci.be', 1, 'VOITURIER', 'Andy', NULL),
(3228, 'joachim.vranken@student.vinci.be', 1, 'VRANKEN', 'Joachim', NULL),
(3229, 'guillaume.wery@student.vinci.be', 1, 'WERY', 'Guillaume', NULL),
(3230, 'julien.wets@student.vinci.be', 1, 'WETS', 'Julien', NULL),
(3231, 'romain.weynand@student.vinci.be', 1, 'WEYNAND', 'Romain', NULL),
(3232, 'loic.willems@student.vinci.be', 1, 'WILLEMS', 'Loic', NULL),
(3233, 'klevis.xhakollari@student.vinci.be', 1, 'XHAKOLLARI', 'Klevis', NULL),
(3234, 'gorgis.yaramis@student.vinci.be', 1, 'YARAMIS', 'Gorgis', NULL),
(3235, 'tarik.yüksel@student.vinci.be', 1, 'Yüksel', 'Tarik', NULL),
(3236, 'alexandre.wacquier@student.vinci.be', 1, 'WACQUIER', 'Alexandre', NULL),
(3237, 'arnaud.poullet@student.vinci.be', 1, 'POULLET', 'Arnaud', NULL),
(3238, 'ilias.tellihi@student.vinci.be', 1, 'TELLIHI', 'Ilias', NULL);

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
(220, '1', '1', '19/09/2016'),
(221, '2', '1', '26/09/2016'),
(222, '3', '1', '3/10/2016'),
(223, '4', '1', '10/10/2016'),
(224, '5', '1', '17/10/2016'),
(225, '6', '1', '24/10/2016'),
(226, '7', '1', '7/11/2016'),
(227, '8', '1', '14/11/2016'),
(228, '9', '1', '21/11/2016'),
(229, '10', '1', '28/11/2016'),
(230, '11', '1', '5/11/2016'),
(231, '12', '1', '12/11/2016'),
(232, '13', '1', '19/11/2016'),
(233, '1', '2', '6/02/2017'),
(234, '2', '2', '13/02/2017'),
(235, '3', '2', '20/02/2017'),
(236, '4', '2', '27/02/2017'),
(237, '5', '2', '6/03/2017'),
(238, '6', '2', '13/03/2017'),
(239, '7', '2', '20/03/2017'),
(240, '8', '2', '27/03/2017'),
(241, '9', '2', '17/04/2017'),
(242, '10', '2', '24/04/2017'),
(243, '11', '2', '1/05/2017'),
(244, '12', '2', '8/05/2017'),
(245, '13', '2', '15/05/2017');

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
  ADD KEY `given_seance_id` (`seance_template_id`),
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
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
--
-- AUTO_INCREMENT pour la table `attendance_sheets`
--
ALTER TABLE `attendance_sheets`
  MODIFY `attendance_sheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `given_seances`
--
ALTER TABLE `given_seances`
  MODIFY `given_seance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `seance_templates`
--
ALTER TABLE `seance_templates`
  MODIFY `seance_template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `serie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3241;
--
-- AUTO_INCREMENT pour la table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `week_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
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
  ADD CONSTRAINT `fk_given_seance_id` FOREIGN KEY (`seance_template_id`) REFERENCES `seance_templates` (`seance_template_id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
