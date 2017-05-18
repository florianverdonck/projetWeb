-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 16 Mai 2017 à 11:26
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `attendances`
--

-- --------------------------------------------------------

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
#('gregory.seront@vinci.be', 'Seront', 'Gregory', 'true'),
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
-- Contenu de la table `weeks`
--

INSERT INTO `weeks` (`week_id`, `week_number`, `term`, `monday_date`) VALUES
(1, '1', '1', '19/09/2016'),
(2, '2', '1', '26/09/2016'),
(3, '3', '1', '3/10/2016'),
(4, '4', '1', '10/10/2016'),
(5, '5', '1', '17/10/2016'),
(6, '6', '1', '24/10/2016'),
(7, '7', '1', '7/11/2016'),
(8, '8', '1', '14/11/2016'),
(9, '9', '1', '21/11/2016'),
(10, '10', '1', '28/11/2016'),
(11, '11', '1', '5/11/2016'),
(12, '12', '1', '12/11/2016'),
(13, '13', '1', '19/11/2016'),
(14, '1', '2', '6/02/2017'),
(15, '2', '2', '13/02/2017'),
(16, '3', '2', '20/02/2017'),
(17, '4', '2', '27/02/2017'),
(18, '5', '2', '6/03/2017'),
(19, '6', '2', '13/03/2017'),
(20, '7', '2', '20/03/2017'),
(21, '8', '2', '27/03/2017'),
(22, '9', '2', '17/04/2017'),
(23, '10', '2', '24/04/2017'),
(24, '11', '2', '1/05/2017'),
(25, '12', '2', '8/05/2017'),
(26, '13', '2', '15/05/2017');