-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 12 Mai 2017 à 12:46
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `attendance_sheets`
--

CREATE TABLE `attendance_sheets` (
  `attendance_sheet_id` int(11) NOT NULL,
  `seance_template_id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `week_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `series`
--

INSERT INTO `series` (`serie_id`, `term`, `serie_numero`, `bloc`) VALUES
(27, 1, 1, 1),
(28, 1, 2, 1),
(29, 1, 3, 1),
(30, 1, 4, 1),
(31, 1, 5, 1),
(32, 1, 6, 1),
(33, 1, 1, 1),
(34, 1, 2, 1),
(35, 1, 3, 1),
(36, 1, 4, 1),
(37, 1, 5, 1),
(38, 1, 6, 1),
(39, 1, 1, 1),
(40, 1, 2, 1),
(41, 1, 3, 1),
(42, 1, 4, 1),
(43, 1, 5, 1),
(44, 1, 6, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3454 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`student_id`, `mail`, `bloc`, `name`, `first_name`, `serie_id`) VALUES
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
(3241, 'kodjo.adegnon@student.vinci.be', 3, 'ADEGNON', 'Kodjo', NULL),
(3242, 'mustafa.alp@student.vinci.be', 3, 'ALP', 'Mustafa', NULL),
(3243, 'laurent.batslé@student.vinci.be', 3, 'BATSLÉ', 'Laurent', NULL),
(3244, 'stefan.bogdanovic@student.vinci.be', 3, 'BOGDANOVIC', 'Stefan', NULL),
(3245, 'fany.bottemanne@student.vinci.be', 3, 'BOTTEMANNE', 'Fany', NULL),
(3246, 'ismaila.abdoulahi adamou@student.vinci.be', 1, 'ABDOULAHI ADAMOU', 'Ismaila', 27),
(3247, 'viken.afsar@student.vinci.be', 1, 'AFSAR', 'Viken', 27),
(3248, 'shayan.amini@student.vinci.be', 1, 'AMINI', 'Shayan', 27),
(3249, 'marco.amory@student.vinci.be', 1, 'AMORY', 'Marco', 27),
(3250, 'thibault.andersson@student.vinci.be', 1, 'ANDERSSON', 'Thibault', 27),
(3251, 'ange cedrick.angaman@student.vinci.be', 1, 'ANGAMAN', 'Ange Cedrick', 27),
(3252, 'bunyamin.aslan@student.vinci.be', 1, 'ASLAN', 'Bunyamin', 27),
(3253, 'yassin.assecoum@student.vinci.be', 1, 'ASSECOUM', 'Yassin', 27),
(3254, 'youssef.astitou@student.vinci.be', 1, 'ASTITOU', 'Youssef', 27),
(3255, 'iulian.avram@student.vinci.be', 1, 'Avram', 'Iulian', 27),
(3256, 'samir.bacha@student.vinci.be', 1, 'BACHA', 'Samir', 27),
(3257, 'jérémy.balcinhas godinho@student.vinci.be', 1, 'BALCINHAS GODINHO', 'Jérémy', 27),
(3258, 'mac blair.ballecer@student.vinci.be', 1, 'BALLECER', 'Mac Blair', 27),
(3259, 'ilias.barrani@student.vinci.be', 1, 'BARRANI', 'Ilias', 27),
(3260, 'tahir.bashir@student.vinci.be', 1, 'BASHIR', 'Tahir', 27),
(3261, 'logan.bauduin@student.vinci.be', 1, 'BAUDUIN', 'Logan', 27),
(3262, 'youness.belhassnaoui@student.vinci.be', 1, 'BELHASSNAOUI', 'Youness', 27),
(3263, 'driss.ben geloune@student.vinci.be', 1, 'BEN GELOUNE', 'Driss', 27),
(3264, 'khalil.benazzouz@student.vinci.be', 1, 'BENAZZOUZ', 'Khalil', 27),
(3265, 'yahya.bennaghmouch@student.vinci.be', 1, 'BENNAGHMOUCH', 'Yahya', 27),
(3266, 'patrick.bikorimana@student.vinci.be', 1, 'BIKORIMANA', 'Patrick', 27),
(3267, 'thomas.boon@student.vinci.be', 1, 'BOON', 'Thomas', 27),
(3268, 'morgan.bossin@student.vinci.be', 1, 'BOSSIN', 'Morgan', 27),
(3269, 'salim.bouchbouk@student.vinci.be', 1, 'Bouchbouk', 'Salim', 27),
(3270, 'nawfal.boujtat@student.vinci.be', 1, 'BOUJTAT', 'Nawfal', 27),
(3271, 'sohaib.boulban yousrani@student.vinci.be', 1, 'BOULBAN YOUSRANI', 'Sohaib', 27),
(3272, 'logan.bourez@student.vinci.be', 1, 'BOUREZ', 'Logan', 27),
(3273, 'arnaud.bourez@student.vinci.be', 1, 'BOUREZ', 'Arnaud', 27),
(3274, 'alan.buelinckx@student.vinci.be', 1, 'BUELINCKX', 'Alan', 27),
(3275, 'tuan.bui@student.vinci.be', 1, 'BUI', 'Tuan', 27),
(3276, 'samuel.camus@student.vinci.be', 1, 'CAMUS', 'Samuel', 27),
(3277, 'liseta.carcani@student.vinci.be', 1, 'CARCANI', 'Liseta', 27),
(3278, 'christopher.castel@student.vinci.be', 1, 'CASTEL', 'Christopher', 27),
(3279, 'rocco.cauchi@student.vinci.be', 1, 'CAUCHI', 'Rocco', 27),
(3280, 'mohammed.chairi bounekoub@student.vinci.be', 1, 'Chairi Bounekoub', 'Mohammed', 33),
(3281, 'chamil.chakhabov@student.vinci.be', 1, 'CHAKHABOV', 'Chamil', 33),
(3282, 'nicolas.chapelle@student.vinci.be', 1, 'CHAPELLE', 'Nicolas', 33),
(3283, 'soufiane.chelaghmi@student.vinci.be', 1, 'CHELAGHMI', 'Soufiane', 33),
(3284, 'yiwei.chen@student.vinci.be', 1, 'CHEN', 'Yiwei', 33),
(3285, 'tom.conneely mcinerney@student.vinci.be', 1, 'CONNEELY MCINERNEY', 'Tom', 33),
(3286, 'sébastien.croonen@student.vinci.be', 1, 'CROONEN', 'Sébastien', 33),
(3287, 'gabriel.curatolo@student.vinci.be', 1, 'CURATOLO', 'Gabriel', 33),
(3288, 'martin.d’hoedt @student.vinci.be', 1, 'D’HOEDT ', 'Martin', 33),
(3289, 'kadir.dagyaran@student.vinci.be', 1, 'DAGYARAN', 'Kadir', 33),
(3290, 'arnaud.de boeck@student.vinci.be', 1, 'DE BOECK', 'Arnaud', 33),
(3291, 'benjamin.de bosscher@student.vinci.be', 1, 'De Bosscher', 'Benjamin', 33),
(3292, 'hugues.de mathelin de papigny@student.vinci.be', 1, 'de Mathelin de Papigny', 'Hugues', 33),
(3293, 'augustin.de meeûs d''argenteuil@student.vinci.be', 1, 'de MEEÛS d''ARGENTEUIL', 'Augustin', 33),
(3294, 'antoine.de roose@student.vinci.be', 1, 'DE ROOSE', 'Antoine', 33),
(3295, 'andy.de smedt@student.vinci.be', 1, 'De Smedt', 'Andy', 33),
(3296, 'nestor.debiesme@student.vinci.be', 1, 'Debiesme', 'Nestor', 33),
(3297, 'jérôme.deborsu@student.vinci.be', 1, 'DEBORSU', 'Jérôme', 33),
(3298, 'antoine.debroux@student.vinci.be', 1, 'DEBROUX', 'Antoine', 33),
(3299, 'grégory.decraemer@student.vinci.be', 1, 'DECRAEMER', 'Grégory', 33),
(3300, 'loïc.defossé@student.vinci.be', 1, 'Defossé', 'Loïc', 33),
(3301, 'nicolas.delannoy@student.vinci.be', 1, 'DELANNOY', 'Nicolas', 33),
(3302, 'adrian.dellavalle morinigo@student.vinci.be', 1, 'DELLAVALLE MORINIGO', 'Adrian', 33),
(3303, 'léo.descamps@student.vinci.be', 1, 'DESCAMPS', 'Léo', 33),
(3304, 'bastien.dessy@student.vinci.be', 1, 'DESSY', 'Bastien', 33),
(3305, 'thibault.devaleriola@student.vinci.be', 1, 'DEVALERIOLA', 'Thibault', 33),
(3306, 'brian.diaz alvarez@student.vinci.be', 1, 'Diaz Alvarez', 'Brian', 33),
(3307, 'romain.donck@student.vinci.be', 1, 'DONCK', 'Romain', 33),
(3308, 'julien.doyen@student.vinci.be', 1, 'DOYEN', 'Julien', 33),
(3309, 'jean.dubuisson@student.vinci.be', 1, 'DUBUISSON', 'Jean', 33),
(3310, 'othmane.echagdali zahri@student.vinci.be', 1, 'ECHAGDALI ZAHRI', 'Othmane', 33),
(3311, 'hicham.el asri@student.vinci.be', 1, 'EL ASRI', 'Hicham', 33),
(3312, 'ismaël.el f''kih ben ahmed@student.vinci.be', 1, 'El F''Kih Ben Ahmed', 'Ismaël', 33),
(3313, 'yassine.el hadouchi@student.vinci.be', 1, 'EL HADOUCHI', 'Yassine', 33),
(3314, 'mohammed.el khattabi@student.vinci.be', 1, 'EL KHATTABI', 'Mohammed', 39),
(3315, 'zineb.el mokadem@student.vinci.be', 1, 'EL MOKADEM', 'Zineb', 39),
(3316, 'younes.erraide@student.vinci.be', 1, 'Erraide', 'Younes', 39),
(3317, 'majd.fahmi@student.vinci.be', 1, 'FAHMI', 'Majd', 39),
(3318, 'risaci-deogratias.faizi@student.vinci.be', 1, 'FAIZI', 'Risaci-Deogratias', 39),
(3319, 'sami.farhat@student.vinci.be', 1, 'FARHAT', 'Sami', 39),
(3320, 'albinot.fetahi@student.vinci.be', 1, 'Fetahi', 'Albinot', 39),
(3321, 'paul-edouard.fouquet@student.vinci.be', 1, 'FOUQUET', 'Paul-Edouard', 39),
(3322, 'vincent.franchomme@student.vinci.be', 1, 'FRANCHOMME', 'Vincent', 39),
(3323, 'geoffroy.frennet@student.vinci.be', 1, 'FRENNET', 'Geoffroy', 39),
(3324, 'adrian.gajda@student.vinci.be', 1, 'GAJDA', 'Adrian', 39),
(3325, 'nicolas.gasia@student.vinci.be', 1, 'GASIA', 'Nicolas', 39),
(3326, 'lopodi.gaza@student.vinci.be', 1, 'GAZA', 'Lopodi', 39),
(3327, 'ali.godazendeh@student.vinci.be', 1, 'GODAZENDEH', 'Ali', 39),
(3328, 'sebastian.gonzalez moran@student.vinci.be', 1, 'GONZALEZ MORAN', 'Sebastian', 39),
(3329, 'diana.grama@student.vinci.be', 1, 'Grama', 'Diana', 39),
(3330, 'gauthier.grandhenry@student.vinci.be', 1, 'GRANDHENRY', 'Gauthier', 39),
(3331, 'lukas.greif@student.vinci.be', 1, 'GREIF', 'Lukas', 39),
(3332, 'dorian.gruselin@student.vinci.be', 1, 'GRUSELIN', 'Dorian', 39),
(3333, 'hamza.guerrouaj@student.vinci.be', 1, 'GUERROUAJ', 'Hamza', 39),
(3334, 'simon.guilmot@student.vinci.be', 1, 'GUILMOT', 'Simon', 39),
(3335, 'soufiane.haidour@student.vinci.be', 1, 'HAIDOUR', 'Soufiane', 39),
(3336, 'kei-jyu.hama@student.vinci.be', 1, 'HAMA', 'Kei-Jyu', 39),
(3337, 'anas.hammani@student.vinci.be', 1, 'HAMMANI', 'Anas', 39),
(3338, 'mohamed.hassouni@student.vinci.be', 1, 'HASSOUNI', 'Mohamed', 39),
(3339, 'cyril.hennen@student.vinci.be', 1, 'HENNEN', 'Cyril', 39),
(3340, 'jeremy.holodiline@student.vinci.be', 1, 'Holodiline', 'Jeremy', 39),
(3341, 'romaric.honorez@student.vinci.be', 1, 'HONOREZ', 'Romaric', 39),
(3342, 'cyrille.hourant@student.vinci.be', 1, 'HOURANT', 'Cyrille', 39),
(3343, 'mehdi.ibnlfassi@student.vinci.be', 1, 'IBNLFASSI', 'Mehdi', 39),
(3344, 'said.imran@student.vinci.be', 1, 'IMRAN', 'Said', 39),
(3345, 'christophe.jabbour@student.vinci.be', 1, 'Jabbour', 'Christophe', 39),
(3346, 'loury.jacob@student.vinci.be', 1, 'JACOB', 'Loury', 39),
(3347, 'ilias.jafar@student.vinci.be', 1, 'JAFAR', 'Ilias', 39),
(3348, 'pawel.jalbrzykowski@student.vinci.be', 1, 'JALBRZYKOWSKI', 'Pawel', 28),
(3349, 'thibaut.janssens@student.vinci.be', 1, 'JANSSENS', 'Thibaut', 28),
(3350, 'adnan.jlassi@student.vinci.be', 1, 'JLASSI', 'Adnan', 28),
(3351, 'egide.kabanza@student.vinci.be', 1, 'KABANZA', 'Egide', 28),
(3352, 'rubain.kamegneson wabo@student.vinci.be', 1, 'KAMEGNESON WABO', 'Rubain', 28),
(3353, 'burim.kastrati@student.vinci.be', 1, 'KASTRATI', 'Burim', 28),
(3354, 'bouchra.kh'' leeh@student.vinci.be', 1, 'KH'' LEEH', 'Bouchra', 28),
(3355, 'gaël.kifoumbi @student.vinci.be', 1, 'KIFOUMBI ', 'Gaël', 28),
(3356, 'kamil.kowalczyk@student.vinci.be', 1, 'KOWALCZYK', 'Kamil', 28),
(3357, 'dejvi.kurti@student.vinci.be', 1, 'KURTI', 'Dejvi', 28),
(3358, 'martin.kutzner@student.vinci.be', 1, 'KUTZNER', 'Martin', 28),
(3359, 'sandra.kwibuka@student.vinci.be', 1, 'KWIBUKA', 'Sandra', 28),
(3360, 'otman.lachkar@student.vinci.be', 1, 'LACHKAR', 'Otman', 28),
(3361, 'badreddine.lahrichi@student.vinci.be', 1, 'LAHRICHI', 'Badreddine', 28),
(3362, 'lorenzo.lapage@student.vinci.be', 1, 'LAPAGE', 'Lorenzo', 28),
(3363, 'youssef.larbi@student.vinci.be', 1, 'LARBI', 'Youssef', 28),
(3364, 'lorenzo.lauricella@student.vinci.be', 1, 'LAURICELLA', 'Lorenzo', 28),
(3365, 'nicolas.lecoq@student.vinci.be', 1, 'LECOQ', 'Nicolas', 28),
(3366, 'robin.lefebvre@student.vinci.be', 1, 'LEFEBVRE', 'Robin', 28),
(3367, 'guillaume.lion@student.vinci.be', 1, 'LION', 'Guillaume', 28),
(3368, 'thomas.lion@student.vinci.be', 1, 'LION', 'Thomas', 28),
(3369, 'filip.lolic@student.vinci.be', 1, 'Lolic', 'Filip', 28),
(3370, 'nicolas.lorphelin@student.vinci.be', 1, 'LORPHELIN', 'Nicolas', 28),
(3371, 'robin.louis@student.vinci.be', 1, 'LOUIS', 'Robin', 28),
(3372, 'rachid.mabrouk@student.vinci.be', 1, 'MABROUK', 'Rachid', 28),
(3373, 'joelle.maffo meleu@student.vinci.be', 1, 'MAFFO MELEU', 'Joelle', 28),
(3374, 'hamza.mahmoudi@student.vinci.be', 1, 'MAHMOUDI', 'Hamza', 28),
(3375, 'lucas.malmport@student.vinci.be', 1, 'Malmport', 'Lucas', 28),
(3376, 'yannis.manguin@student.vinci.be', 1, 'MANGUIN', 'Yannis', 28),
(3377, 'azeddine.mansour@student.vinci.be', 1, 'Mansour', 'Azeddine', 28),
(3378, 'mathieu.marcq@student.vinci.be', 1, 'MARCQ', 'Mathieu', 28),
(3379, 'nicolas.marcq@student.vinci.be', 1, 'Marcq', 'Nicolas', 28),
(3380, 'sacha.maricau@student.vinci.be', 1, 'MARICAU', 'Sacha', 28),
(3381, 'max.marin@student.vinci.be', 1, 'Marin', 'Max', 28),
(3382, 'alexandre.maroun@student.vinci.be', 1, 'Maroun', 'Alexandre', 34),
(3383, 'cedric.martin@student.vinci.be', 1, 'MARTIN', 'Cedric', 34),
(3384, 'marc.meganck@student.vinci.be', 1, 'MEGANCK', 'Marc', 34),
(3385, 'kevin.mero vallas@student.vinci.be', 1, 'MERO VALLAS', 'Kevin', 34),
(3386, 'pierre.michiels@student.vinci.be', 1, 'MICHIELS', 'Pierre', 34),
(3387, 'malo.misson@student.vinci.be', 1, 'MISSON', 'Malo', 34),
(3388, 'xavier.mouffo@student.vinci.be', 1, 'Mouffo', 'Xavier', 34),
(3389, 'younes.moulila@student.vinci.be', 1, 'MOULILA', 'Younes', 34),
(3390, 'arturo.mozzon@student.vinci.be', 1, 'MOZZON', 'Arturo', 34),
(3391, 'zohaib.muhammad@student.vinci.be', 1, 'MUHAMMAD', 'Zohaib', 34),
(3392, 'ikram.noorzaai@student.vinci.be', 1, 'NOORZAAI', 'Ikram', 34),
(3393, 'yvette roseline.noula fonkou@student.vinci.be', 1, 'NOULA FONKOU', 'Yvette Roseline', 34),
(3394, 'andrea.occhilupo@student.vinci.be', 1, 'OCCHILUPO', 'Andrea', 34),
(3395, 'djama.omar@student.vinci.be', 1, 'OMAR', 'Djama', 34),
(3396, 'zakaria.oulji@student.vinci.be', 1, 'OULJI', 'Zakaria', 34),
(3397, 'kawtar.oumghar@student.vinci.be', 1, 'OUMGHAR', 'kawtar', 34),
(3398, 'ekrem.öztürk@student.vinci.be', 1, 'Öztürk', 'Ekrem', 34),
(3399, 'sophie.paligot@student.vinci.be', 1, 'PALIGOT', 'Sophie', 34),
(3400, 'sébastien.pauwels@student.vinci.be', 1, 'PAUWELS', 'Sébastien', 34),
(3401, 'françois.pecheur@student.vinci.be', 1, 'Pecheur', 'François', 34),
(3402, 'emanuel.peroni@student.vinci.be', 1, 'PERONI', 'Emanuel', 34),
(3403, 'victor.pierrot@student.vinci.be', 1, 'Pierrot', 'Victor', 34),
(3404, 'joris.pluton@student.vinci.be', 1, 'PLUTON', 'Joris', 34),
(3405, 'françois.pochet@student.vinci.be', 1, 'Pochet', 'François', 34),
(3406, 'maxime.poelaert@student.vinci.be', 1, 'POELAERT', 'Maxime', 34),
(3407, 'hakan.poyraz@student.vinci.be', 1, 'POYRAZ', 'Hakan', 34),
(3408, 'antoine.ramelot@student.vinci.be', 1, 'RAMELOT', 'Antoine', 34),
(3409, 'alexis.rifaut@student.vinci.be', 1, 'RIFAUT', 'Alexis', 34),
(3410, 'sébastien.riga@student.vinci.be', 1, 'RIGA', 'Sébastien', 34),
(3411, 'dani.rocha azevedo@student.vinci.be', 1, 'Rocha Azevedo', 'Dani', 34),
(3412, 'shahadat.sadeque@student.vinci.be', 1, 'SADEQUE', 'Shahadat', 34),
(3413, 'jozef.sako@student.vinci.be', 1, 'SAKO', 'Jozef', 34),
(3414, 'brieuc.seeger@student.vinci.be', 1, 'SEEGER', 'Brieuc', 34),
(3415, 'sébastien.serré@student.vinci.be', 1, 'SERRÉ', 'Sébastien', 40),
(3416, 'florian.sollami@student.vinci.be', 1, 'SOLLAMI', 'Florian', 40),
(3417, 'arthur.speicher@student.vinci.be', 1, 'SPEICHER', 'Arthur', 40),
(3418, 'johnny.steutgens@student.vinci.be', 1, 'STEUTGENS', 'Johnny', 40),
(3419, 'damian.szacun@student.vinci.be', 1, 'SZACUN', 'Damian', 40),
(3420, 'kevin.tang@student.vinci.be', 1, 'Tang', 'Kevin', 40),
(3421, 'dawid.tararuj@student.vinci.be', 1, 'Tararuj', 'Dawid', 40),
(3422, 'fabian.teichmann@student.vinci.be', 1, 'TEICHMANN', 'Fabian', 40),
(3423, 'arnaud.terryn@student.vinci.be', 1, 'TERRYN', 'Arnaud', 40),
(3424, 'florian.timmermans@student.vinci.be', 1, 'TIMMERMANS', 'Florian', 40),
(3425, 'halil.top@student.vinci.be', 1, 'TOP', 'Halil', 40),
(3426, 'nicolas.tremerie@student.vinci.be', 1, 'Tremerie', 'Nicolas', 40),
(3427, 'tomasz.trykozko@student.vinci.be', 1, 'Trykozko', 'Tomasz', 40),
(3428, 'artjam.umanyan@student.vinci.be', 1, 'Umanyan', 'Artjam', 40),
(3429, 'amatus.umugabe@student.vinci.be', 1, 'UMUGABE', 'Amatus', 40),
(3430, 'ralph.urbach@student.vinci.be', 1, 'URBACH', 'Ralph', 40),
(3431, 'louis.van aken@student.vinci.be', 1, 'VAN AKEN', 'Louis', 40),
(3432, 'colin.van den brande@student.vinci.be', 1, 'VAN DEN BRANDE', 'Colin', 40),
(3433, 'wim.van der schueren@student.vinci.be', 1, 'Van der Schueren', 'Wim', 40),
(3434, 'nicolas.van gelder@student.vinci.be', 1, 'van GELDER', 'Nicolas', 40),
(3435, 'vincent.van rossem@student.vinci.be', 1, 'VAN ROSSEM', 'Vincent', 40),
(3436, 'driss.vandenheede@student.vinci.be', 1, 'VANDENHEEDE', 'Driss', 40),
(3437, 'jérémy.vander motte@student.vinci.be', 1, 'VANDER MOTTE', 'Jérémy', 40),
(3438, 'guy.vassart@student.vinci.be', 1, 'VASSART', 'Guy', 40),
(3439, 'florian.verdonck@student.vinci.be', 1, 'VERDONCK', 'Florian', 40),
(3440, 'thomas.verelst@student.vinci.be', 1, 'Verelst', 'Thomas', 40),
(3441, 'jonathan.visiedo gil@student.vinci.be', 1, 'Visiedo Gil', 'Jonathan', 40),
(3442, 'andy.voiturier@student.vinci.be', 1, 'VOITURIER', 'Andy', 40),
(3443, 'joachim.vranken@student.vinci.be', 1, 'VRANKEN', 'Joachim', 40),
(3444, 'guillaume.wery@student.vinci.be', 1, 'WERY', 'Guillaume', 40),
(3445, 'julien.wets@student.vinci.be', 1, 'WETS', 'Julien', 40),
(3446, 'romain.weynand@student.vinci.be', 1, 'WEYNAND', 'Romain', 40),
(3447, 'loic.willems@student.vinci.be', 1, 'WILLEMS', 'Loic', 27),
(3448, 'klevis.xhakollari@student.vinci.be', 1, 'XHAKOLLARI', 'Klevis', 33),
(3449, 'gorgis.yaramis@student.vinci.be', 1, 'YARAMIS', 'Gorgis', 39),
(3450, 'tarik.yüksel@student.vinci.be', 1, 'Yüksel', 'Tarik', 28),
(3451, 'alexandre.wacquier@student.vinci.be', 1, 'WACQUIER', 'Alexandre', 40),
(3452, 'arnaud.poullet@student.vinci.be', 1, 'POULLET', 'Arnaud', 34),
(3453, 'ilias.tellihi@student.vinci.be', 1, 'TELLIHI', 'Ilias', 40);

-- --------------------------------------------------------

--
-- Structure de la table `weeks`
--

CREATE TABLE `weeks` (
  `week_id` int(11) NOT NULL,
  `week_number` varchar(9) NOT NULL,
  `term` varchar(2) NOT NULL,
  `monday_date` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;

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
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=209;
--
-- AUTO_INCREMENT pour la table `attendance_sheets`
--
ALTER TABLE `attendance_sheets`
  MODIFY `attendance_sheet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `given_seances`
--
ALTER TABLE `given_seances`
  MODIFY `given_seance_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `seance_templates`
--
ALTER TABLE `seance_templates`
  MODIFY `seance_template_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `serie_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3454;
--
-- AUTO_INCREMENT pour la table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `week_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=246;
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
  ADD CONSTRAINT `fk_serie_id` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE SET NULL ON UPDATE NO ACTION;
