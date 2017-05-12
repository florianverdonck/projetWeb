-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 12 Mai 2017 à 10:18
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `attendances`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=3241 DEFAULT CHARSET=utf8;

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
(3030, 'robert.woronko@student.vinci.be', 2, 'WORONKO', 'Robert', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `serie_id` (`serie_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3241;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_serie_id` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE SET NULL ON UPDATE NO ACTION;
