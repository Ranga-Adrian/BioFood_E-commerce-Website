-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2021 at 10:21 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biofooddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `coscumparaturi`
--

CREATE TABLE `coscumparaturi` (
  `ID_COMANDA` int(11) NOT NULL,
  `NUME_UTILIZATOR` varchar(255) NOT NULL,
  `DESCRIERE` text NOT NULL,
  `CANTITATE` int(11) NOT NULL,
  `PRET` double NOT NULL,
  `IMAGINE` varchar(255) NOT NULL,
  `SUMA_TOTALA` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coscumparaturifinal`
--

CREATE TABLE `coscumparaturifinal` (
  `ID_COMANDA` int(11) NOT NULL,
  `NUME_UTILIZATOR` varchar(255) NOT NULL,
  `DESCRIERE` text NOT NULL,
  `CANTITATE` int(11) NOT NULL,
  `PRET` double NOT NULL,
  `IMAGINE` varchar(255) NOT NULL,
  `SUMA_TOTALA` double NOT NULL,
  `STATUS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coscumparaturifinal`
--

INSERT INTO `coscumparaturifinal` (`ID_COMANDA`, `NUME_UTILIZATOR`, `DESCRIERE`, `CANTITATE`, `PRET`, `IMAGINE`, `SUMA_TOTALA`, `STATUS`) VALUES
(11, 'Craciunescu', 'NECTAR BIO DIN PIERSICI, 1L HOLLINGER', 30, 15.61, './assets/images/suc-2-nectar-piersici.jpg', 468.3, 'Efectuata'),
(21, 'Craciunescu', 'SUC BIO DE STRUGURI ROSII, 1L HOLLINGER', 4, 16.5, './assets/images/hollinger-suc-bio-de-struguri-rosii-1l.jpg', 66, 'In desfasurare'),
(31, 'Craciunescu', 'BABY BANANE DESHIDRATATE BIO, 30G FRUANDES', 4, 7.49, './assets/images/baby-banane-deshidratate-bio-30g-juan-valdez.jpg', 29.96, 'In desfasurare'),
(59, 'Craciunescu', 'BATON ENERGIZANT BIO, RAW ENERGY, CU ARAHIDE SI CACAO 50G BOMBUS', 3, 7.49, './assets/images/baton-energizant-bio-raw-energy-cu-arahide-si-cacao-50g-bombus.jpg', 47.47, 'In desfasurare'),
(87, 'ana', 'CHILI CON CARNE BIO 360G OMAS', 3, 41.2, './assets/images/carne-1-chili-concarnec.jpg', 123.6, 'Efectuata');

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `COD_PRODUS` int(11) NOT NULL COMMENT 'Codul unic de identificare al produsului',
  `COD_FURNIZOR` int(11) NOT NULL COMMENT 'Codul furnizorului de produs',
  `DENUMIRE` text NOT NULL COMMENT 'Denumirea produslui',
  `PRET` double NOT NULL COMMENT 'Pretul produslui',
  `STOC` int(11) NOT NULL COMMENT 'Numarul de bucati disponibile',
  `IMAGINE` varchar(255) NOT NULL COMMENT 'Calea de referinta din fisier pentru imaginea produsului',
  `CATEGORIE` text NOT NULL COMMENT 'Categoria din care face parte produsul'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`COD_PRODUS`, `COD_FURNIZOR`, `DENUMIRE`, `PRET`, `STOC`, `IMAGINE`, `CATEGORIE`) VALUES
(1, 12, 'NECTAR BIO DIN PIERSICI, 1L HOLLINGER', 15.61, 35, './assets/images/suc-2-nectar-piersici.jpg', 'Sucuri'),
(2, 12, 'NECTAR BIO DE COACAZE NEGRE HOLLINGER 1L HOLLINGER', 15.61, 120, './assets/images/nectar-bio-de-coacaze-negre.jpg', 'Sucuri'),
(3, 12, 'NECTAR BIO DE MANGO 1L HOLLINGER', 16.5, 84, './assets/images/nectar-bio-de-mango-1l.jpg', 'Sucuri'),
(4, 12, 'SUC BIO DE STRUGURI ROSII, 1L HOLLINGER', 16.5, 72, './assets/images/hollinger-suc-bio-de-struguri-rosii-1l.jpg', 'Sucuri'),
(5, 12, 'MULTI SUNSET SUC BIO DE FRUCTE SI SFECLA ROSIE, 1L HOLLINGER', 16.28, 26, './assets/images/hollinger-multi-sunset-suc-bio-de-fructe-si-sfecla-rosie-1l.jpg', 'Sucuri'),
(6, 12, 'NECTAR BIO DE PORTOCALE HOLLINGER 1L HOLLINGER', 15.61, 61, './assets/images/nectar-bio-de-portocale-hollinger-1l.jpg', 'Sucuri'),
(7, 12, 'NECTAR BIO DE CAISE HOLLINGER 1L HOLLINGER', 15.61, 80, './assets/images/nectar-bio-de-caise-hollinger-1l.jpg', 'Sucuri'),
(10, 7, 'ALUNE INVELITE IN CIOCOLATA, BIO, 30G FRUANDES', 9.9, 25, './assets/images/alune-1-caju-cioco.jpg', 'Snacksuri'),
(11, 7, 'BABY BANANE DESHIDRATATE BIO, 30G FRUANDES', 7.49, 49, './assets/images/baby-banane-deshidratate-bio-30g-juan-valdez.jpg', 'Snacksuri'),
(12, 7, 'ANANAS DESHIDRATAT BIO, 30G FRUANDES', 7.49, 20, './assets/images/ananas-deshidratat-bio-30g-juan-valdez.jpg', 'Snacksuri'),
(13, 7, 'ANANAS DESHIDRATAT INVELIT IN CIOCOLATA, BIO, 30G FRUANDES', 9.9, 37, './assets/images/ananas-deshidratat-invelit-in-ciocolata-bio-30g-juan-valdez.jpg', 'Snacksuri'),
(14, 9, 'BATON ENERGIZANT BIO, RAW ENERGY, CU ARAHIDE SI CACAO 50G BOMBUS', 7.49, 20, './assets/images/baton-energizant-bio-raw-energy-cu-arahide-si-cacao-50g-bombus.jpg', 'Snacksuri'),
(15, 7, 'BANANE DESHIDRATATE INVELITE IN CIOCOLATA, BIO, 30G FRUANDES', 9.9, 35, './assets/images/banane-deshidratate-invelite-in-ciocolata-bio-30g-juan-valdez.jpg', 'Snacksuri'),
(16, 9, 'BATON ENERGIZANT BIO, RAW ENERGY, CU COACAZE NEGRE SI NUCA DE COCOS 50G BOMBUS', 7.56, 28, './assets/images/baton-energizant-bio-raw-energy-cu-coacaze-negre-si-nuca-de-cocos-50g-bombus.jpg', 'Snacksuri'),
(17, 9, 'BATON ENERGIZANT BIO, RAW ENERGY, CU LAMAIE SI NUCA DE COCOS 50G BOMBUS', 7.56, 0, './assets/images/baton-energizant-bio-raw-energy-cu-lamaie-si-nuca-de-cocos-50g-bombus.jpg', 'Snacksuri'),
(19, 10, 'FISTIC FARA COAJA, 100G', 19.9, 60, './assets/images/fructe-uscate-1-fistic.jpg', 'FructeUscate'),
(20, 10, 'CAISE BIO FARA SAMBURI, FRUCTE USCATE LA SOARE, 250G', 19.49, 38, './assets/images/caise-bio-fara-samburi-fructe-uscate-la-soare-250g.jpg', 'FructeUscate'),
(22, 10, 'AFINE ROSII BIO INDULCITE CU SUC DE MERE, 100G', 10.6, 20, './assets/images/afine-rosii-bio-indulcite-cu-suc-de-mere-100g.jpg', 'FructeUscate'),
(24, 10, 'AFINE ROSII BIO INDULCITE CU ZAHAR DIN TRESTIE, 200G', 15.7, 50, './assets/images/afine-rosii-bio-indulcite-cu-zahar-din-trestie-200g.jpg', 'FructeUscate'),
(26, 10, 'CHIPSURI BIO DE BANANE CU MIERE, 100G\r\n', 6.36, 100, './assets/images/chipsuri-bio-de-banane-cu-miere-100g.jpg', 'FructeUscate'),
(28, 15, 'CASTANE BIO GATA DE CONSUM, 100G MORGENLAND', 18.2, 95, './assets/images/castane-bio-gata-de-consum-100g-morgenland.jpg', 'FructeUscate'),
(29, 14, 'CASTANE COMESTIBILE BIO, 200G MARONEN', 36.49, 24, './assets/images/maronen-castane-comestibile-bio-200g.jpg', 'FructeUscate'),
(30, 20, 'CHILI CON CARNE BIO 360G OMAS', 41.2, 35, './assets/images/carne-1-chili-concarnec.jpg', 'Carne'),
(31, 21, 'FILE DIN PIEPT DE RATA BIO IN VID 1 BUC, 250G BIO ENTE', 87.49, 22, './assets/images/file-din-piept-de-rata-bio-in-vid-1-buc-250g-bio-ente.jpg', 'Carne'),
(32, 21, 'PULPE DE RATA BIO IN VID 2 BUC, 430G BIO ENTE', 57.55, 18, './assets/images/pulpe-de-rata-bio-in-vid-2-buc-430g-bio-ente.jpg', 'Carne'),
(33, 20, 'RAGU BIO DIN CARNE DE PUI 360G OMAS', 44.6, 21, './assets/images/ragu-bio-din-carne-de-pui-360g-omas.jpg', 'Carne'),
(34, 22, 'CREMVURSTI BIO DIN CARNE DE CURCAN CU ULEI DE FLOAREA SOARELUI, 380G OKOLAND', 7.49, 15, './assets/images/cremvursti-bio-din-carne-de-curcan-cu-ulei-de-floarea-soarelui-380g-okoland.jpg', 'Carne'),
(35, 22, 'CREMVURSTI BIO DIN CARNE DE PORC, 540G OKOLAND', 36, 40, './assets/images/cremvursti-bio-din-carne-de-porc-540g-oekoland.jpg', 'Carne'),
(36, 23, 'AMESTEC DE LEGUMINOASE BIO, 1000 G', 19.07, 110, './assets/images/amestec-de-leguminoase-bio-1000-g.jpg', 'Leguminoase'),
(37, 24, 'AMARANT BIO, 350 G', 9.1, 66, './assets/images/amarant-bio-350gr.jpg', 'Leguminoase'),
(38, 24, 'ARPACAS DE ORZ BIO, 350G', 9.15, 62, './assets/images/arpacas-de-orz-bio-350g.jpg', 'Leguminoase'),
(39, 25, 'FASOLE ADZUKI BIO, 500 G', 18.49, 44, './assets/images/fasole-adzuki-bio-500g.jpg', 'Leguminoase'),
(40, 25, 'FASOLE ALBA BIO 500G', 16.9, 40, './assets/images/fasole-alba-bio-500-g.jpg', 'Leguminoase'),
(41, 25, 'FASOLE NEAGRA BIO, 500 G', 13.2, 44, './assets/images/fasole-neagra-bio-500-g.jpg', 'Leguminoase'),
(42, 25, 'FASOLE PESTRITA BIO 500G', 9.9, 40, './assets/images/fasole-pestrita-bio-pinto-borlotti-500g.jpg', 'Leguminoase'),
(43, 26, 'TERCI BIO DE OVAZ CU FRUCTE, 400 G HAMMER MUHLE', 29.8, 70, './assets/images/cereale-1-ovaz-fructe.jpg', 'Cereale'),
(44, 26, 'TERCI ECOLOGIC DE OVAZ FARA GLUTEN CU SEMINTE DE IN, 375G HAMMER MUHLE', 16.9, 40, './assets/images/terci-ecologic-de-ovaz-fara-gluten-cu-seminte-de-in-375g-hammer-muhle.jpg', 'Cereale'),
(45, 27, 'BILUTE BIO DIN PORUMB EXPANDAT CU MIERE, 125G', 4.24, 50, './assets/images/bilute-bio-din-porumb-expandat-cu-miere-125g.jpg', 'Cereale'),
(46, 27, 'BILUTE CROCANTE DIN MULTICEREALE BIO + CIOCOLATA CU LAPTE, 125 G', 5.3, 40, './assets/images/bilute-crocante-din-multicereale-bio-ciocolata-cu-lapte-125-g.jpg', 'Cereale'),
(47, 26, 'TERCI ECOLOGIC DE OVAZ FARA GLUTEN CU SEMINTE DE IN, 375G HAMMER MUHLE', 16.9, 40, './assets/images/terci-ecologic-de-ovaz-fara-gluten-cu-seminte-de-in-375g-hammer-muhle.jpg', 'Cereale'),
(48, 27, 'BILUTE BIO DIN PORUMB EXPANDAT CU MIERE, 125G', 4.24, 50, './assets/images/bilute-bio-din-porumb-expandat-cu-miere-125g.jpg', 'Cereale'),
(51, 30, 'LAPTE BIO DE OAIE, 750 ML UHT LEEB VITAL', 17.21, 40, './assets/images/lapte-1-oaie.jpg', 'Lactate'),
(55, 30, 'LAPTE BIO DE CAPRA UHT, 750 ML LEEB VITAL', 14.9, 40, './assets/images/lapte-bio-de-capra-500ml-leeb.jpg', 'Lactate'),
(56, 30, 'LAPTE BIO DE CAPRA, 500 ML LEEB VITAL', 12.15, 50, './assets/images/lapte-bio-de-capra-5005ml-leeb.jpg', 'Lactate'),
(58, 30, 'LAPTE BIO DE OAIE, 500 ML LEEB VITAL 5% GRASIME', 5.3, 40, './assets/images/lapte-bio-de-capra-50055ml-leeb.jpg', 'Lactate'),
(60, 30, 'BRANZA BIO DIN LAPTE DE CAPRA, 150G LEEB VITAL', 15.22, 10, './assets/images/branza-bio-lapte-capra.jpg', 'Lactate'),
(62, 30, 'BRANZA BIO DIN LAPTE DE OAIE, 200G LEEB VITAL', 12.51, 12, './assets/images/lapte-bio-de-oaie-500ml-leeb.jpg', 'Lactate'),
(69, 30, 'IAURT BIO DIN LAPTE DE CAPRA CU MANGO, 125G LEEB VITAL', 8.3, 18, './assets/images/iaurt-bio-din-lapte-de-capra-cu-mango-125g-leeb-vital.jpg', 'Lactate'),
(72, 30, 'IAURT BIO DIN LAPTE DE CAPRA CU VANILIE, 125G LEEB VITAL', 9.1, 24, './assets/images/iaurt-bio-lapte-capra-vanilie.jpg', 'Lactate'),
(74, 30, 'IAURT BIO DIN LAPTE DE CAPRA CU ZMEURA, 125G LEEB VITAL', 8.24, 50, './assets/images/iaurt-bio-din-lapte-de-capra-cu-zmeura-125g-leeb-vital.jpg', 'Lactate'),
(80, 30, 'IAURT GRECESC BIO DIN LAPTE DE OAIE, 150G LEEB VITAL', 8.3, 40, './assets/images/iaurt-bio-grecesc-oaie.jpg', 'Lactate'),
(123, 32, 'CIOCOLATA ALBA BIO, 100 G CHOCOLATES SOLE', 22, 12, './assets/images/chocolates-sole-ciocolata-alba-bio-100-g.jpg', 'Dulciuri');

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `ID_UTILIZATOR` int(11) NOT NULL,
  `NUME` varchar(255) NOT NULL COMMENT 'Numele utilizatorului',
  `PRENUME` varchar(255) NOT NULL COMMENT 'Prenumele utilizatorului',
  `E-MAIL` varchar(255) NOT NULL COMMENT 'Adresa de e-mail a clientului',
  `PAROLA` varchar(255) NOT NULL COMMENT 'Parola utilizatorului',
  `ADRESA` varchar(255) NOT NULL COMMENT 'Adresa de livrare a comenzii',
  `TELEFON` int(10) NOT NULL COMMENT 'Numarul de telefon al clientului',
  `TIP_UTILIZATOR` varchar(20) NOT NULL COMMENT 'Tipul utilizatorului admin/client',
  `NUME_UTILIZATOR` varchar(255) NOT NULL COMMENT 'Numele cu care utilizatorul se autentifica'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`ID_UTILIZATOR`, `NUME`, `PRENUME`, `E-MAIL`, `PAROLA`, `ADRESA`, `TELEFON`, `TIP_UTILIZATOR`, `NUME_UTILIZATOR`) VALUES
(1, 'Adrian', 'Ranga', 'rangaadrian@yahoo.com', 'adrian', 'Strada Fagarasului, nr.21, Sc.C, Ap.6', 771380983, 'admin', 'Lem0n'),
(7, 'Florin', 'Cornea', 'cornea_codrut@yahoo.com', 'craciun', 'liliacul nr 2', 727798912, 'utilizator', 'Craciunescu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coscumparaturi`
--
ALTER TABLE `coscumparaturi`
  ADD PRIMARY KEY (`ID_COMANDA`);

--
-- Indexes for table `coscumparaturifinal`
--
ALTER TABLE `coscumparaturifinal`
  ADD PRIMARY KEY (`ID_COMANDA`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`COD_PRODUS`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`ID_UTILIZATOR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coscumparaturi`
--
ALTER TABLE `coscumparaturi`
  MODIFY `ID_COMANDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `coscumparaturifinal`
--
ALTER TABLE `coscumparaturifinal`
  MODIFY `ID_COMANDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `ID_UTILIZATOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
