-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2017 at 05:02 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dahouetReg`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getRegCode` (`reg_id` INT(5)) RETURNS VARCHAR(11) CHARSET latin1 BEGIN
DECLARE regCode varchar(11);
DECLARE chaCode int (1);
DECLARE regDate int(2);
DECLARE seqNum int(2);

SELECT c.cha_id into chaCode from challenge c inner join regate r on c.cha_id = r.cha_id where r.reg_id = reg_id;

SELECT MONTH(r.reg_date) into regDate from regate r where r.reg_id = reg_id;

SET seqNum = reg_id;

IF seqNum > 1 THEN

SET seqNum = reg_id + 1;

END IF;

SET regCode = CONCAT(chaCode,regDate, seqNum);


RETURN  regCode;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `challenge`
--

CREATE TABLE `challenge` (
  `cha_id` int(11) NOT NULL,
  `cha_nom` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challenge`
--

INSERT INTO `challenge` (`cha_id`, `cha_nom`) VALUES
(1, 'été'),
(2, 'hiver');

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `cla_id` int(11) NOT NULL,
  `cla_coefficient` decimal(6,2) DEFAULT NULL,
  `cla_nom` varchar(25) DEFAULT NULL,
  `ser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`cla_id`, `cla_coefficient`, `cla_nom`, `ser_id`) VALUES
(6, NULL, 'Corsaire', 1),
(7, NULL, 'Surprise', 1),
(8, NULL, '8 metres', 1),
(9, NULL, 'Maraudeur', 1),
(10, NULL, 'Figaro', 1),
(11, NULL, 'Flying Fifteen', 2),
(12, NULL, 'Soling', 2),
(13, NULL, 'Star', 2),
(14, NULL, 'Tempest', 2),
(15, NULL, 'Yngling', 2),
(16, NULL, '5.5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `club_nautique`
--

CREATE TABLE `club_nautique` (
  `clu_id` int(11) NOT NULL,
  `clu_nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club_nautique`
--

INSERT INTO `club_nautique` (`clu_id`, `clu_nom`) VALUES
(1, 'Club Brestois'),
(2, 'Club morlaisien'),
(3, 'Club lorientais'),
(4, 'Club de la Baie '),
(5, 'Club Rennais');

-- --------------------------------------------------------

--
-- Table structure for table `comite_commissaire`
--

CREATE TABLE `comite_commissaire` (
  `cmt_com_id` int(11) NOT NULL,
  `cmt_com_nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comite_commissaire`
--

INSERT INTO `comite_commissaire` (`cmt_com_id`, `cmt_com_nom`) VALUES
(1, 'Comité de Bretagne'),
(2, 'Comité d\'Ile de France'),
(3, 'Comité des Pays de Loire'),
(4, 'Comité du Poitou-Charente'),
(5, 'Comité d\'Aquitaine'),
(6, 'Comité de ');

-- --------------------------------------------------------

--
-- Table structure for table `comite_course`
--

CREATE TABLE `comite_course` (
  `cmt_cou_id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comite_course`
--

INSERT INTO `comite_course` (`cmt_cou_id`, `reg_id`, `com_id`) VALUES
(1, 1, 1),
(2, 5, 2),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `commissaire`
--

CREATE TABLE `commissaire` (
  `com_id` int(11) NOT NULL,
  `cmt_com_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commissaire`
--

INSERT INTO `commissaire` (`com_id`, `cmt_com_id`, `per_id`) VALUES
(1, 1, 10),
(2, 2, 9),
(3, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `equipier`
--

CREATE TABLE `equipier` (
  `equ_id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  `par_voi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipier`
--

INSERT INTO `equipier` (`equ_id`, `par_id`, `par_voi_id`) VALUES
(1, 4, 12),
(2, 5, 16),
(3, 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `par_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `par_numero_ffv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`par_id`, `per_id`, `par_numero_ffv`) VALUES
(1, 1, 54565),
(2, 2, 65654),
(3, 3, 56645),
(4, 4, 35465),
(5, 5, 64665),
(6, 6, 68463);

-- --------------------------------------------------------

--
-- Table structure for table `participation_voilier`
--

CREATE TABLE `participation_voilier` (
  `par_voi_id` int(11) NOT NULL,
  `voi_id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `voi_skipper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participation_voilier`
--

INSERT INTO `participation_voilier` (`par_voi_id`, `voi_id`, `reg_id`, `voi_skipper_id`) VALUES
(11, 11, 1, 1),
(12, 12, 2, 3),
(13, 13, 3, 2),
(14, 14, 3, 2),
(15, 15, 13, 2),
(16, 13, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `per_id` int(11) NOT NULL,
  `per_nom` varchar(50) DEFAULT NULL,
  `per_prenom` varchar(50) DEFAULT NULL,
  `per_date_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`per_id`, `per_nom`, `per_prenom`, `per_date_naissance`) VALUES
(1, 'Fourteau', 'Lucas', '2017-12-21'),
(2, 'Balcon', 'Yoann', '2017-02-10'),
(3, 'Le Henaff', 'Gwenolé', '2017-02-15'),
(4, 'Nicolas ', 'Rodriguez', '2017-02-17'),
(5, 'Trompette', 'Tanguy', '2017-02-03'),
(6, 'Sonia', 'Hervochon', '2017-02-15'),
(7, 'Carré', 'Lydie', '2017-02-10'),
(8, 'Ursache', 'Ovidiu', '2017-02-07'),
(9, 'Lelu', 'Florent', '2017-02-16'),
(10, 'Jezecquel', 'Margaux', '2017-02-02'),
(11, 'Goyot', 'Gaetane', '2017-02-08'),
(12, 'Bur', 'Nathalie', '2017-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `pro_id` int(11) NOT NULL,
  `per_id` int(11) DEFAULT NULL,
  `clu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proprietaire`
--

INSERT INTO `proprietaire` (`pro_id`, `per_id`, `clu_id`) VALUES
(4, 7, 3),
(5, 11, 4),
(6, 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `regate`
--

CREATE TABLE `regate` (
  `reg_id` int(11) NOT NULL,
  `reg_libellé` varchar(150) NOT NULL,
  `reg_date` date DEFAULT NULL,
  `reg_distance` decimal(6,2) NOT NULL,
  `cha_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regate`
--

INSERT INTO `regate` (`reg_id`, `reg_libellé`, `reg_date`, `reg_distance`, `cha_id`) VALUES
(1, 'Regate d\'été de la Baie 1', '2017-11-05', '5.65', 1),
(2, 'Regate d\'été de la Baie 2', '2017-11-12', '6.26', 1),
(3, 'Regate d\'été de la Baie 3', '2017-11-19', '5.25', 1),
(4, 'Regate d\'été de la Baie 4', '2017-11-26', '3.36', 1),
(5, 'Regate d\'été de la Baie 5', '2017-12-03', '5.58', 1),
(6, 'Regate d\'été de la Baie 6', '2017-12-10', '9.20', 1),
(7, 'Regate d\'été de la Baie 7', '2017-12-17', '7.50', 1),
(8, 'Regate d\'été de la Baie 8', '2018-01-14', '6.84', 1),
(9, 'Regate d\'été de la Baie 9', '2018-01-28', '6.20', 1),
(10, 'Regate d\'été de la Baie 10', '2018-02-18', '9.69', 1),
(11, 'Regate d\'été de la Baie 11', '2018-03-11', '7.58', 1),
(12, 'Regate d\'été de la Baie 12', '2018-03-25', '5.36', 1),
(13, 'Regate d\'hiver de la Baie 1', '2017-05-14', '5.69', 2),
(14, 'Regate d\'hiver de la Baie 2', '2017-05-28', '6.69', 2),
(15, 'Regate d\'hiver de la Baie 3', '2017-06-11', '8.25', 2),
(16, 'Regate d\'hiver de la Baie 4', '2017-06-18', '4.36', 2),
(17, 'Regate d\'hiver de la Baie 5', '2017-07-02', '5.45', 2),
(18, 'Regate d\'hiver de la Baie 6', '2017-07-16', '5.36', 2),
(19, 'Regate d\'hiver de la Baie 7', '2017-07-30', '5.69', 2),
(20, 'Regate d\'hiver de la Baie 8', '2017-08-06', '7.56', 2),
(21, 'Regate d\'hiver de la Baie 9', '2017-08-20', '9.35', 2),
(22, 'Regate d\'hiver de la Baie 10', '2017-09-03', '9.23', 2),
(23, 'Regate d\'hiver de la Baie 11', '2017-09-17', '4.65', 2),
(24, 'Regate d\'hiver de la Baie 12', '2017-09-24', '8.88', 2);

-- --------------------------------------------------------

--
-- Table structure for table `resultat`
--

CREATE TABLE `resultat` (
  `res_id` int(11) NOT NULL,
  `res_temps` datetime DEFAULT NULL,
  `res_points` int(11) DEFAULT NULL,
  `par_voi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resultat`
--

INSERT INTO `resultat` (`res_id`, `res_temps`, `res_points`, `par_voi_id`) VALUES
(23, '2017-02-22 03:14:22', 1, 11),
(24, '2017-02-22 03:29:32', 2, 12),
(25, '2017-02-22 03:50:47', 3, 13),
(26, '2017-02-22 04:18:11', 2, 14),
(27, '2017-02-22 03:18:12', 1, 15),
(28, '2017-02-22 04:17:08', 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `serie`
--

CREATE TABLE `serie` (
  `ser_id` int(11) NOT NULL,
  `ser_nom` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serie`
--

INSERT INTO `serie` (`ser_id`, `ser_nom`) VALUES
(1, 'Habitables'),
(2, 'Quillard');

-- --------------------------------------------------------

--
-- Table structure for table `voilier`
--

CREATE TABLE `voilier` (
  `voi_id` int(11) NOT NULL,
  `voi_num_voile` int(11) DEFAULT NULL,
  `voi_nom` varchar(70) NOT NULL,
  `cla_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voilier`
--

INSERT INTO `voilier` (`voi_id`, `voi_num_voile`, `voi_nom`, `cla_id`, `pro_id`) VALUES
(11, 656466, 'L\'écume des jours', 7, 4),
(12, 365465, 'Annytia', 12, 5),
(13, 564665, 'Carmalia', 13, 6),
(14, 646866, 'Mor-Braz', 13, 5),
(15, 546466, 'L\'héliotrope', 12, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`cha_id`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`cla_id`),
  ADD KEY `FK_classe_ser_id` (`ser_id`);

--
-- Indexes for table `club_nautique`
--
ALTER TABLE `club_nautique`
  ADD PRIMARY KEY (`clu_id`);

--
-- Indexes for table `comite_commissaire`
--
ALTER TABLE `comite_commissaire`
  ADD PRIMARY KEY (`cmt_com_id`);

--
-- Indexes for table `comite_course`
--
ALTER TABLE `comite_course`
  ADD PRIMARY KEY (`cmt_cou_id`),
  ADD KEY `reg_id` (`reg_id`),
  ADD KEY `com_id` (`com_id`);

--
-- Indexes for table `commissaire`
--
ALTER TABLE `commissaire`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `FK_commissaire_per_id` (`per_id`),
  ADD KEY `cmt_id` (`cmt_com_id`),
  ADD KEY `com_id` (`com_id`);

--
-- Indexes for table `equipier`
--
ALTER TABLE `equipier`
  ADD PRIMARY KEY (`equ_id`),
  ADD KEY `par_id` (`par_id`),
  ADD KEY `par_voi_id` (`par_voi_id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`par_id`),
  ADD KEY `per_id` (`per_id`);

--
-- Indexes for table `participation_voilier`
--
ALTER TABLE `participation_voilier`
  ADD PRIMARY KEY (`par_voi_id`),
  ADD KEY `voi_id` (`voi_id`),
  ADD KEY `reg_id` (`reg_id`),
  ADD KEY `voi_skipper_id` (`voi_skipper_id`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `clu_id` (`clu_id`),
  ADD KEY `per_id` (`per_id`);

--
-- Indexes for table `regate`
--
ALTER TABLE `regate`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `FK_regate_cha_id` (`cha_id`);

--
-- Indexes for table `resultat`
--
ALTER TABLE `resultat`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `voi_id` (`par_voi_id`);

--
-- Indexes for table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `voilier`
--
ALTER TABLE `voilier`
  ADD PRIMARY KEY (`voi_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `pro_id_2` (`pro_id`),
  ADD KEY `cla_id` (`cla_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challenge`
--
ALTER TABLE `challenge`
  MODIFY `cha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `cla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `club_nautique`
--
ALTER TABLE `club_nautique`
  MODIFY `clu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comite_commissaire`
--
ALTER TABLE `comite_commissaire`
  MODIFY `cmt_com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comite_course`
--
ALTER TABLE `comite_course`
  MODIFY `cmt_cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `commissaire`
--
ALTER TABLE `commissaire`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `equipier`
--
ALTER TABLE `equipier`
  MODIFY `equ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `participation_voilier`
--
ALTER TABLE `participation_voilier`
  MODIFY `par_voi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `regate`
--
ALTER TABLE `regate`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `resultat`
--
ALTER TABLE `resultat`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `serie`
--
ALTER TABLE `serie`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `voilier`
--
ALTER TABLE `voilier`
  MODIFY `voi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `FK_classe_ser_id` FOREIGN KEY (`ser_id`) REFERENCES `serie` (`ser_id`);

--
-- Constraints for table `comite_course`
--
ALTER TABLE `comite_course`
  ADD CONSTRAINT `comite_course_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `regate` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comite_course_ibfk_2` FOREIGN KEY (`com_id`) REFERENCES `commissaire` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commissaire`
--
ALTER TABLE `commissaire`
  ADD CONSTRAINT `FK_commissaire_per_id` FOREIGN KEY (`per_id`) REFERENCES `personne` (`per_id`),
  ADD CONSTRAINT `commissaire_ibfk_1` FOREIGN KEY (`cmt_com_id`) REFERENCES `comite_commissaire` (`cmt_com_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipier`
--
ALTER TABLE `equipier`
  ADD CONSTRAINT `equipier_ibfk_1` FOREIGN KEY (`par_id`) REFERENCES `participant` (`par_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipier_ibfk_2` FOREIGN KEY (`par_voi_id`) REFERENCES `participation_voilier` (`par_voi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`per_id`) REFERENCES `personne` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participation_voilier`
--
ALTER TABLE `participation_voilier`
  ADD CONSTRAINT `participation_voilier_ibfk_2` FOREIGN KEY (`reg_id`) REFERENCES `regate` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participation_voilier_ibfk_3` FOREIGN KEY (`voi_skipper_id`) REFERENCES `participant` (`par_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participation_voilier_ibfk_4` FOREIGN KEY (`voi_id`) REFERENCES `voilier` (`voi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD CONSTRAINT `proprietaire_ibfk_1` FOREIGN KEY (`clu_id`) REFERENCES `club_nautique` (`clu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proprietaire_ibfk_2` FOREIGN KEY (`per_id`) REFERENCES `personne` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regate`
--
ALTER TABLE `regate`
  ADD CONSTRAINT `FK_regate_cha_id` FOREIGN KEY (`cha_id`) REFERENCES `challenge` (`cha_id`);

--
-- Constraints for table `resultat`
--
ALTER TABLE `resultat`
  ADD CONSTRAINT `resultat_ibfk_1` FOREIGN KEY (`par_voi_id`) REFERENCES `participation_voilier` (`par_voi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voilier`
--
ALTER TABLE `voilier`
  ADD CONSTRAINT `voilier_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `proprietaire` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voilier_ibfk_2` FOREIGN KEY (`cla_id`) REFERENCES `classe` (`cla_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
