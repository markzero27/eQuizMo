-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 04:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daquizdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_table`
--

CREATE TABLE `account_table` (
  `id` int(11) NOT NULL,
  `school` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `student_1` varchar(255) NOT NULL,
  `student_2` varchar(255) NOT NULL,
  `student_3` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'player',
  `show_screen` tinyint(4) NOT NULL DEFAULT '0',
  `imei` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_table`
--

INSERT INTO `account_table` (`id`, `school`, `course`, `team_name`, `student_1`, `student_2`, `student_3`, `password`, `role`, `show_screen`, `imei`) VALUES
(1, 'Trimex', '', 'admin', '', '', '', 'admin', 'admin', 1, ''),
(76, 'mark', 'bsit', 'mark', '', '', '', '1234', 'player', 0, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`id`, `category`) VALUES
(8, 'Biology'),
(9, 'Chemistry'),
(10, 'Math'),
(11, 'Language and Literature'),
(12, 'Food and Nutrition'),
(13, 'Wika at Panitikan'),
(14, 'History'),
(15, 'Culture and Sports'),
(16, 'Politics and Governance'),
(17, 'General Information');

-- --------------------------------------------------------

--
-- Table structure for table `display_table`
--

CREATE TABLE `display_table` (
  `id` int(11) NOT NULL,
  `screen` varchar(50) NOT NULL,
  `show_screen` tinyint(1) NOT NULL DEFAULT '0',
  `q_id` int(11) NOT NULL DEFAULT '0',
  `difficulty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `display_table`
--

INSERT INTO `display_table` (`id`, `screen`, `show_screen`, `q_id`, `difficulty`) VALUES
(6, 'display_screen', 1, 72, 'Easy'),
(9, 'android_screen', 0, 0, ''),
(10, 'mark', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `game_set`
--

CREATE TABLE `game_set` (
  `game_id` int(11) NOT NULL,
  `game_type` text NOT NULL,
  `is_locked` tinyint(4) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_set`
--

INSERT INTO `game_set` (`game_id`, `game_type`, `is_locked`, `date`) VALUES
(1, 'Multiple Choice', 0, '2019-02-22 02:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `login_authentication`
--

CREATE TABLE `login_authentication` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `code` varchar(80) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_authentication`
--

INSERT INTO `login_authentication` (`id`, `username`, `code`, `login_time`) VALUES
(3, 'mark', '9TBboQ7FN7', '2019-02-19 21:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `points_table`
--

CREATE TABLE `points_table` (
  `uniq_id` int(11) NOT NULL,
  `team` varchar(255) NOT NULL,
  `q_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `difficulty` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `tbscore` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `q_sequence` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question_table`
--

CREATE TABLE `question_table` (
  `q_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `question` text NOT NULL,
  `q_image` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(250) NOT NULL,
  `option4` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `points` int(11) NOT NULL,
  `is_selected` tinyint(1) NOT NULL DEFAULT '0',
  `is_done` tinyint(1) NOT NULL DEFAULT '0',
  `q_sequence` int(11) NOT NULL DEFAULT '0',
  `timer` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_table`
--

INSERT INTO `question_table` (`q_id`, `category`, `difficulty`, `type`, `question`, `q_image`, `option1`, `option2`, `option3`, `option4`, `answer`, `points`, `is_selected`, `is_done`, `q_sequence`, `timer`) VALUES
(72, 'Biology', 'Easy', 'Multiple Choice', 'Bio-molecules have a wide range of sizes and structures. The four major types of bio-molecules are carbohydrates, lipids, nucleic acids and proteins. Which among the bio-molecules is not composed of repeating units?', '', 'Carbohydrates', 'Lipids', 'Nucleic acids', 'Proteins', 'Lipids', 1, 1, 0, 1, 5),
(73, 'Biology', 'Easy', 'Multiple Choice', 'Natural selection is a mechanism in evolution in which heritable traits that help organism survive and reproduce become more common in a population over time. This mechanism was suggested by:', '', 'Charles Darwin', 'Gregor Mendel', 'Alfred Wallace', 'Robert Hooke', 'Charles Darwin', 1, 1, 0, 2, 5),
(74, 'Biology', 'Easy', 'Multiple Choice', 'Feedback mechanisms help the organisms maintain homeostasis to reproduce and survive. Which of the system below is able to provide feedback mechanism?', '', 'Digestive System', 'Excretory System', 'Endocrine System', 'Skeletal System', 'Endocrine System', 1, 1, 0, 3, 5),
(75, 'Chemistry', 'Easy', 'Multiple Choice', 'Matter undergoes physical or chemical changes. Which among the following is a chemical change?', '', 'Crumpling of paper', 'Evaporation of water', 'Melting of ice', 'Ripening of fruits', 'Ripening of fruits', 1, 1, 0, 4, 5),
(76, 'Chemistry', 'Easy', 'Multiple Choice', 'Charcoal is usually produced by slow pyrolysis - the heating of wood in the other substances in the absence of oxygen. What is charcoal composed of?', '', 'C', 'CO<sub>2</sub>', 'CH<sub>2</sub>O', 'HCO<sub>2</sub>', 'C', 1, 1, 0, 5, 5),
(77, 'Chemistry', 'Easy', 'Multiple Choice', 'Mixtures are classified either as homogeneous or heterogeneous. An ice cube floating in a glass of water is classified as a heterogeneous mixture. When all of the ice melts, it will result into a', '', 'homogeneous mixture', 'compound', 'solution', 'suspension', 'suspension', 1, 1, 0, 6, 5),
(78, 'Math', 'Easy', 'Multiple Choice', 'What is the smallest prime number?', '', '2', '1', '3', '5', '2', 1, 1, 0, 7, 5),
(79, 'Math', 'Easy', 'Multiple Choice', 'How many straight edges does a cube have?', '', '6', '12', '14', '16', '12', 1, 1, 0, 8, 5),
(80, 'Math', 'Easy', 'Multiple Choice', 'What name is given to a triangle with no equal sides?', '', 'right', 'isosceles', 'scalene', 'equilateral', 'scalene', 1, 1, 0, 9, 5),
(81, 'Language and Literature', 'Easy', 'Multiple Choice', 'Which of the following is probably the most widely used English word throughout the world?', '', 'dollar', 'Okay', 'internet', 'sex', 'Okay', 1, 1, 0, 10, 5),
(82, 'Language and Literature', 'Easy', 'Multiple Choice', 'English is considered as universal language for it is being spoken by many groups of people. In approximately how many countries does the English language have official or special status?', '', '10', '15', '35', '75', '75', 1, 1, 0, 11, 5),
(83, 'Language and Literature', 'Easy', 'Multiple Choice', 'Which of the following is the longest word that appears in a play by William Shakespeare?', '', 'honorificabilitudinitatibus', 'sesquipedalian', 'antidisestablishmentarianism', 'disproportionableness', 'honorificabilitudinitatibus', 1, 1, 0, 12, 5),
(84, 'Food and Nutrition', 'Easy', 'Multiple Choice', 'Riboflavin is a vitamin that is also known as:', '', 'Vitamin B1', 'Vitamin B6', 'Vitamin B12', 'Vitamin B2', 'Vitamin B2', 1, 1, 0, 13, 5),
(85, 'Food and Nutrition', 'Easy', 'Multiple Choice', 'Which blood type is the \"Meat Eater\" who has an overactive immune system and a hardy digestive tract?', '', 'Type A', 'Type B', 'Type O', 'Type AB', 'Type O', 1, 1, 0, 14, 5),
(86, 'Food and Nutrition', 'Easy', 'Multiple Choice', 'I am somewhat alarmed that my child`s vitamin supplement contains an ingredient with with the scary-sounding chemical name \"dl-Alpha Tocopheryl Acetate\". This is a synthetic version of which vitamin?', '', 'Vitamin A', 'Vitamin E', 'Vitamin C', 'Vitamin D', 'Vitamin E', 1, 1, 0, 15, 5),
(87, 'Wika at Panitikan', 'Easy', 'Multiple Choice', 'Mahabang tulang nagsasalaysay ng pakikipagtunggali ng isang bayani sa mga kaaway. Ito ay may mga kababalaghang hindi kapani-paniwala.', '', 'Balad', 'Epiko', 'Karagatan', 'Awit ng Koridor', 'Epiko', 1, 1, 0, 16, 5),
(88, 'Wika at Panitikan', 'Easy', 'Multiple Choice', 'Isa pang tagisan ng talino sa pamamagitan ng palitan ng katwiran sa pamamaraang patulo.', '', 'Karagatan', 'Duplo', 'Balagtasan', 'Epiko', 'Balagtasan', 1, 1, 0, 17, 5),
(89, 'Biology', 'Average', 'Multiple Choice', 'Nearly every cell in a person`s body has the same DNA. The information in DNA is stored as a code made up of purine and pyrimidine bases namely adenine (<b>A</b>), guanine (<b>G</b>), cytosine (<b>C</b>), and thymine (<b>T</b>). Which among the four bases are classified as pyrimidine bases?', '', 'Thymine and Cytosine', 'Guanine and Adenine', 'Adenine and Cytosine', 'Cytosine and Thymine', 'Cytosine and Thymine', 2, 1, 0, 1, 5),
(90, 'Biology', 'Average', 'Multiple Choice', 'Recessive traits can be carried in a person`s genes without appearing in that person. For example, a dark-haired person may have one gene for dark hair, which is a dominant trait, and one gene for light hair, which is recessive. Which among the choices is a recessive trait?', '', 'Astigmatism', 'Long Big Toe', 'Dwarfism', 'Baldness', 'Long Big Toe', 2, 1, 0, 2, 5),
(91, 'Biology', 'Average', 'Multiple Choice', 'An ecosystem is a community of living and nonliving components interacting as a system which is influenced by biotic and abiotic factors. An example of an abiotic factor is: ', '', 'predation', 'symbiosis', 'weathering', 'parasitism', 'weathering', 2, 1, 0, 3, 5),
(92, 'Biology', 'Hard', 'Multiple Choice', 'James Watson and Francis Crick received the Nobel Prize in 1953 for the determination of the structure of DNA. There should have been another recipient, however, this recipient died before the award is given. The Novel Prize at that time stipulates that the award cannot be given to dead person. Who should have been this third Nobel Prize recipient?', '', 'Maurice Wilkins', 'Sydney Brenner', 'Rosalind Franklin', 'Friedrich Miescher', 'Rosalind Franklin', 3, 1, 0, 1, 5),
(93, 'Biology', 'Hard', 'Multiple Choice', 'The double-stranded structure of DNA owes its stability to the base paring of nucleotides in each strand. IF one strand of DNA has the sequence <b>A-G-C-A-T-C</b>, what is the complimentary base pair in the other strand? ', '', 'C-T-A-C-G-A', 'T-C-G-T-A-G', 'U-C-G-U-A-G', 'G-T-A-G-C-A', 'T-C-G-T-A-G', 3, 1, 0, 2, 5),
(94, 'Biology', 'Hard', 'Multiple Choice', 'The Central Dogma of molecular biology describes the processes by which the information in genes flows from DNA to RNA and thereby producing a protein. Which process in the Central Dogma describes  with the synthesis of an RNA copy of a DNA segment?', '', 'Translation', 'Replication', 'Transcription', 'Reverse Transcription', 'Transcription', 3, 1, 0, 3, 5),
(96, 'Chemistry', 'Average', 'Multiple Choice', 'Gas behavior is characterized by the distance between gas particles. The behavior of gases is governed by different Gas Laws. What will happen to the volume of a confined gas if its initial pressure is increased while holding the temperature constant?', '', 'The volume will increase', 'The volume will not change', 'The volume will be twice its original', 'The volume will decrease', 'The volume will decrease', 2, 1, 0, 4, 5),
(97, 'Chemistry', 'Average', 'Multiple Choice', 'Muriatic acid is a very reactive liquid and considered among the most hazardous chemicals. Like many acid cleaners, muriatic acid can be used around the house to get out tough stains and molds. What is the chemical formula of muriatic acid?', '', 'H<sub>2</sub>SO<sub>4</sub>', 'HCl', 'N<sub>a</sub>HClO', 'HNO<sub>3</sub>', 'HCl', 2, 1, 0, 5, 5),
(98, 'Chemistry', 'Average', 'Multiple Choice', 'Pure substances can exist in three physical states either as a solid, a liquid or a gas. Some liquids in particular converted into gas, rapidly or slowly. Which among the following liquids is the most volatile?', '', 'rubbing alcohol', 'brandy', 'acetone', 'water', 'acetone', 2, 1, 0, 6, 5),
(99, 'Chemistry', 'Hard', 'Multiple Choice', 'Chemical reactions are usually accompanied by either the release or absorption of heat. Antacids are used to reduce stomach acidity. The reaction between an antacid stomach acid may be classified as:', '', 'an endothermic reaction', 'an isothermic reaction', 'an exothermic reaction', 'a hypothermic reaction', 'a hypothermic reaction', 3, 1, 0, 4, 5),
(100, 'Chemistry', 'Hard', 'Multiple Choice', 'Carbon is considered as the most versatile element in the periodic table. Because of this versatility, it is able to form numerous compound when combined with other elements. The strongest form of carbon is:', '', 'coal', 'diamond', 'coke', 'graphite', 'diamond', 3, 1, 0, 5, 5),
(101, 'Chemistry', 'Hard', 'Multiple Choice', 'Chemical equations are representations of a chemical reaction. Several information provided by a chemical equation describes the chemical reaction that took place. Which among the following chemical equations indicates the formation of a precipitate?', '', 'Zn<sub>(s)</sub> + 2HCl<sub>(aq)</sub> â†’ H<sub>2</sub>â†‘ + ZnCl<sub>2(aq)</sub>', '2Na<sub>(a)</sub> + H<sub>2</sub>O<sub>(I)</sub> â†’ 2NaOH<sub>(aq)</sub> + H<sub>2</sub>â†‘', '2Kl<sub>(aq)</sub> + PbCrO<sub>4(aq)</sub> â†’ K<sub>2</sub>CrO<sub>4(aq)</sub> + PbI<sub>2</sub>â†“', '2Fe<sub>(s)</sub> + O<sub>2(g)</sub> â†’ 2FeO<sub>(s)</sub>', '2Kl(aq) + PbCrO4(aq) â†’ K2CrO4(aq) + PbI2â†“', 3, 1, 0, 6, 5),
(102, 'Math', 'Average', 'Multiple Choice', 'How many legs are there altogether on 2 spiders and 3 grasshoppers?', '', '30', '36', '34', '38', '34', 2, 1, 0, 7, 10),
(103, 'Math', 'Average', 'Multiple Choice', 'What is the missing number from the following sequence: 8, 16, 32, ...,128, 256, 512?', '', '54', '58', '60', '64', '64', 2, 1, 0, 8, 10),
(104, 'Math', 'Average', 'Multiple Choice', 'The value <i>pi</i> is 3.1416. It is a non-repeating, non-terminating constant. The value of <i>pi</i> was derived as the ration of a circle`s diameter to its:', '', 'radius', 'subtended arc', 'area', 'circumference', 'circumference', 2, 1, 0, 9, 10),
(105, 'Math', 'Hard', 'Multiple Choice', 'You were on your way to the market. While walking down the street, you met a man and his wife, along with their two daughters and two sons, each daughter and son carried a baby girl and a baby boy. All in all, how many were going to the market?', '', '12', '1', '16', '14', '1', 3, 1, 0, 7, 15),
(106, 'Math', 'Hard', 'Multiple Choice', 'The Fibonacci sequence is given by the series 1, 2, 3, 5, 8, 13, ... What is the 10<sup>th</sup> term in the Fibonacci Sequence?', '', '59', '67', '74', '89', '89', 3, 1, 0, 8, 15),
(107, 'Math', 'Hard', 'Multiple Choice', 'What will be the result of the indicated operations: (13 + 7) x (5 - 3) / 4 x (1 + 1) = ?', '', '3', '4', '5', '7', '5', 3, 1, 0, 9, 15),
(108, 'Language and Literature', 'Average', 'Multiple Choice', 'An acronym is a word formed from the initial letters of a name. An eponym is a word derived from the proper name of a person or place. What term is used for a word that`s derived from the same root as another word?', '', 'Retronym', 'Paronym', 'Oronym', 'Exonym', 'Paronym', 2, 1, 0, 10, 5),
(109, 'Language and Literature', 'Average', 'Multiple Choice', 'Which one of the following observations applies to the word <i><b>typewriter</b><i>?', '', 'It is the longest word that is typed with only left hand.', 'It appeared in the Samuel Johnson`s Dictionary of the English Language - Several decades before the invention of the first typing machine.', 'It is the only word in English that doesn`t rhyme with any other word.', 'It can be typed using only the top row keys on a standard keyboard.', 'It can be typed using only the top row keys on a standard keyboard.', 2, 1, 0, 11, 5),
(110, 'Language and Literature', 'Average', 'Multiple Choice', 'This book of the Bible deals with Hebrew`s escape from the Egypt and their journey back to Palestine under the able leadership of Moses.', '', 'Genesis', 'Leviticus', 'Exodus', 'Hebrew', 'Exodus', 2, 1, 0, 12, 5),
(111, 'Language and Literature', 'Hard', 'Multiple Choice', 'Which of the following is generally regarded as the first genuine dictionary in English?', '', 'The Elementarie, by Richard Mulcaster', 'A Table Alphabetical, by Robert Cawdrey', 'Glossographia, Thomas Blount', 'An american Dictionary of the English Language, by Noah Webster', 'A Table Alphabetical, by Robert Cawdrey', 3, 1, 0, 10, 5),
(112, 'Language and Literature', 'Hard', 'Multiple Choice', 'Which Disney movie boasts the only soundtrack for an animated film to be certified Diamond (ten times platinum) by the Recording Industry Association of America?', '', 'Frozen', 'Tarzan', 'Mulan', 'The Lion King', 'The Lion King', 3, 1, 0, 11, 5),
(113, 'Language and Literature', 'Hard', 'Multiple Choice', 'The famous Disney character who once stated that \"Think of all the joy you`ll find, when you lived the world behind and bid your cares goodbye. You can fly.\"', '', 'Ariel of Little Mermaid', 'Cinderella', 'Peter Pan', 'Belle of Beauty and the Beast.', 'Peter Pan', 3, 1, 0, 12, 5),
(114, 'Food and Nutrition', 'Average', 'Multiple Choice', 'Good and bad cholesterol are not the only factors that predict one`s risk of heart attack and strokes. Which of the following is also predictive of cardiovascular risk?', '', 'Age and Gender', 'Smoking status', 'Blood pressure', 'All of these', 'All of these', 2, 1, 0, 13, 5),
(115, 'Food and Nutrition', 'Average', 'Multiple Choice', 'Which of these DO NOT effectively block sunshine?', '', 'SPF 20 sunscreen', 'sun-protective clothing', 'unbleached cotton', 'light, open-weave fabric', 'light, open-weave fabric', 2, 1, 0, 14, 5),
(116, 'Food and Nutrition', 'Average', 'Multiple Choice', 'Which of these is a waxy, fatlike, substance found in most animal products?', '', 'Cholesterol', 'Oil', 'Amino acids', 'Bile', 'Cholesterol', 2, 1, 0, 15, 5),
(117, 'Food and Nutrition', 'Hard', 'Multiple Choice', 'What type of flowers produce vanilla pods?', '', 'Tulips', 'Carnation', 'Orchids', 'Daffodils', 'Orchids', 3, 1, 0, 13, 5),
(118, 'Food and Nutrition', 'Hard', 'Multiple Choice', 'Which plant of the carrot family has stems that are crystallized and used in baking and cake decoration?', '', 'Parsley', 'Angelica', 'Celery', 'Caraway', 'Angelica', 3, 1, 0, 14, 5),
(119, 'Food and Nutrition', 'Hard', 'Multiple Choice', 'The Atkins Diet is a popular weight lost strategy. Which of these foods would I be able to eat or drink in almost unlimited supply and remain faithful to the diet?', '', 'Sweet potatoes', 'Coffe', 'Whole grains', 'Bacon', 'Bacon', 3, 1, 0, 15, 5),
(120, 'Wika at Panitikan', 'Average', 'Multiple Choice', 'Paligsahan sa tula na karaniwang ginaganap sa ikasiyam na gabi sa bakuran ng namatayan matapos mailibing na patay bilang pang-aliw sa mga ulila nito.', '', 'Duplo', 'Oda', 'Elehiya', 'Dalit', 'Duplo', 2, 1, 0, 16, 5),
(121, 'Wika at Panitikan', 'Average', 'Multiple Choice', 'Alin sa mga sumusunod na akda ang tumatalakay sa mga prayleng mataba?', '', 'El Filibusterismo', 'Noli Me Tangere', 'Dasalan at Tocsohan', 'Fray Botod', 'Fray Botod', 2, 1, 0, 17, 5),
(122, 'Wika at Panitikan', 'Hard', 'Multiple Choice', 'Ang kauna-unahang nailathala ay ang isang aklat na kinasusulatan ng mga dasal na ngayon ay kinikilala bilang Doctrina Christiana. Ito ay inilimbag noong 1593, Ang Panimula nito ay naglalaman ng alpabetong Filipino, mga dasal gaya ng Pater Noster, Ave Maria, Credo at Salve Regina, at iba pang aralin sa relihiyon. ang libro ay ginamitan ng dalawang uri ng lingguwahe (bilinguka), Espanyol at Filipino. Sino ang naglimbag ng aklat na isa ring Franciscan Friar?', '', 'Juan de Plasencia', 'Francisco Blancas de San Jose', 'Diego Talagha', 'Juan de Vera', 'Juan de Plasencia', 3, 1, 0, 16, 5),
(123, 'Wika at Panitikan', 'Hard', 'Multiple Choice', 'NUESTRA SENORA DEL ROSARIO - ikalawang aklat na nalimbag sa Pilipinas noong 1602 at nalimbag sa Imprenta ng Pamantasan ng Sto. Tomas sa tulong ni Juan de Vera, isang mestisong Intsik. Naglalaman ito ng mga talambuhay ng mga santo, novena, at mga tanong at sagot sa relihiyon. Sino ang may akda ng libro?', '', 'Juan de Plasencia', 'Francisco Blancas de San Jose', 'Diego Talagha', 'Juan de Vera', 'Francisco Blancas de San Jose', 3, 1, 0, 17, 5),
(124, 'History', 'Easy', 'Multiple Choice', 'He was the Brains of the Revolution and the first Filipino to be appointed as Secretary of Foreign Affairs.', '', 'Emilio Jacinto', 'Andres Bonifacio', 'Apolinario Mabini', 'Manuel Quezon', 'Apolinario Mabini', 1, 1, 0, 18, 5),
(125, 'History', 'Easy', 'Multiple Choice', 'Promoted to the rank of General at a very young age and became the hero of Tirad Pass:', '', 'Emilio Aguinaldo', 'Miguel Malvar', 'Gregorio Del Pilar', 'Deodato Arellano', 'Gregorio Del Pilar', 1, 1, 0, 19, 5),
(126, 'Culture and Sports', 'Easy', 'Multiple Choice', 'The Foil and Epee are implements of which sport?', '', 'Bowling', 'Fencing', 'Ice scating', 'Horseback-riding', 'Fencing', 1, 1, 0, 20, 5),
(127, 'Culture and Sports', 'Easy', 'Multiple Choice', 'Rings represent the Olympic Symbol. There are:', '', '3 Rings', '4 Rings', '5 Rings ', '6 Rings', '5 Rings', 1, 1, 0, 21, 5),
(128, 'Politics and Governance', 'Easy', 'Multiple Choice', 'Other than being former Presidents of the Republic, they were also Generals of the Arm Forces of The Philippines except:', '', 'Emilio Aguinaldo', 'Manuel Roxas', 'Ferdinand Marcos', 'Fidel Ramos', 'Ferdinand Marcos', 1, 1, 0, 22, 5),
(129, 'Politics and Governance', 'Easy', 'Multiple Choice', 'The Congress of the Philippines has this number of Senators:', '', '22', '24', '26', '28', '24', 1, 1, 0, 23, 5),
(130, 'General Information', 'Easy', 'Multiple Choice', 'The first air-conditioned building in the Philippines:', '', 'Malacanan Palace', 'Congress of The Philippines', 'Manila Hotel', 'Central Bank', 'Manila Hotel', 1, 1, 0, 24, 5),
(131, 'General Information', 'Easy', 'Multiple Choice', 'This color is the symbol of quality in pencils:', '', 'Blue', 'Black', 'Yellow', 'Red', 'Yellow', 1, 1, 0, 25, 5),
(132, 'History', 'Average', 'Multiple Choice', 'He was the first American Governor-General to reside in the Malacanan Palace:', '', 'Gen. George Dewey', 'Gen. Arthur Mc Arthur', 'Gen. Eisenhower', 'Gen. Howard Taft', 'Gen. Arthur Mc Arthur', 2, 1, 0, 18, 5),
(133, 'History', 'Average', 'Multiple Choice', 'He was the President of the 1934 Constitutional Convention which drafted the 1935 Constitution:', '', 'Manuel Roxas', 'Claro M. Recto', 'Sergio Osmena', 'Carlos P. Garcia', 'Claro M. Recto', 2, 1, 0, 19, 5),
(134, 'Culture and Sports', 'Average', 'Multiple Choice', 'It is the capital of Australia:', '', 'Sydney', 'Melbourne', 'Brisbane', 'Canberra', 'Canberra', 2, 1, 0, 20, 5),
(135, 'Culture and Sports', 'Average', 'Multiple Choice', 'What country has the word`s largest Muslim population?', '', 'Saudi Arabia', 'Indonesia', 'Pakistan', 'India', 'Indonesia', 2, 1, 0, 21, 5),
(136, 'Politics and Governance', 'Average', 'Multiple Choice', 'She was the first woman to be appointed Justice of the Supreme Court and President of the Constitutional Commission which drafted the 1987 Constitution.', '', 'Teresita De Castro', 'Estela M. Bernabe', 'Cecilia Munoz Palma', 'Ma. Lourdes Sereno', 'Cecilia Munoz Palma', 2, 1, 0, 22, 5),
(137, 'Politics and Governance', 'Average', 'Multiple Choice', 'Which of the following is not part of this group?', '', 'Fernando Lopez', 'Teopisto Guingona', 'Noli De Castro', 'Ferdinand Marcos', 'Ferdinand Marcos', 2, 1, 0, 23, 5),
(138, 'General Information', 'Average', 'Multiple Choice', 'Which military officer carries a four-star rank on his shoulder?', '', 'General', 'Brigadier General', 'Major General', 'Lieutenant General ', 'General', 2, 1, 0, 24, 5),
(139, 'General Information', 'Average', 'Multiple Choice', 'This Animal`s appetite is never satisfied--- it lives in a state of continual hunger. ', '', 'Anaconda', 'Shark', 'Crocodile', 'Lion', 'Shark', 2, 1, 0, 25, 5),
(140, 'Sample Questions', 'Easy', 'Multiple Choice', 'DOWNTRODDEN means:', '', 'abused', 'gloomy', 'sleepy', 'trickling', 'abused', 1, 0, 0, 0, 5),
(141, 'Sample Questions', 'Easy', 'Multiple Choice', 'What is the capital of Hongkong?', '', 'Shanghai', 'Canton', 'Victoria', 'Ho Chi Minh', 'Victoria', 1, 0, 0, 0, 5),
(142, 'Sample Questions', 'Easy', 'Multiple Choice', 'His book THE PRINCE inspired most dictators. Name its author.', '', 'Georges Bizet', 'Niccolo Machiavelli', 'Benito Mussolini', 'Aristotle', 'Niccolo Machiavelli', 1, 0, 0, 0, 5),
(143, 'Sample Questions', 'Easy', 'Multiple Choice', 'What type of instrument is an OBOE?', '', 'Brasswind', 'Woodwind', 'Percussion', 'Keyboard', 'Woodwind', 1, 0, 0, 0, 5),
(144, 'Sample Questions', 'Easy', 'Multiple Choice', 'What Philippine City has the biggest area?', '', 'Quezon City', 'Davao City', 'Cebu City', 'Bacolod City', 'Davao City', 1, 0, 0, 0, 5),
(145, 'History', 'Hard', 'Multiple Choice', 'This Philosopher gave us the concept of what LYCEUM is: ', '', 'Socrates', 'Plato', 'Aristotle', 'Alexander The Great', 'Aristotle', 3, 1, 0, 18, 5),
(146, 'History', 'Hard', 'Multiple Choice', 'What do you call the guiding CODE OF ETHICS of the Japanese Samurai Warrior?', '', 'Tatami', 'Shogun', 'Bushido', 'Ikebana', 'Bushido', 3, 1, 0, 19, 5),
(147, 'Culture and Sports', 'Hard', 'Multiple Choice', 'Which three-stringed musical instrument with a long neck and triangular body was invented by the Tatar tribes of Russia?', '', 'Banjo', 'Mandolin', 'Balalaika', 'Babushka', 'Balalaika', 3, 1, 0, 20, 5),
(148, 'Culture and Sports', 'Hard', 'Multiple Choice', 'The dance Rumba and Mambo originated from which country?', '', 'Mexico', 'Cuba', 'Spain', 'Puerto Rico', 'Cuba', 3, 1, 0, 21, 5),
(149, 'Politics and Governance', 'Hard', 'Multiple Choice', 'Under Philippine Laws, which of the following is not allowed to solemnize marriage?', '', 'Mayor', 'Attorney-At-Law', 'Consul', 'Priest', 'Attorney-At-Law', 3, 1, 0, 22, 5),
(150, 'Politics and Governance', 'Hard', 'Multiple Choice', 'Which of the following was the first Philippine Political Party?', '', 'Liberal Party', 'Federal Party', 'Nacionalista Party', 'Party for Philippine Progress', 'Federal Party', 3, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `used_question`
--

CREATE TABLE `used_question` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `difficulty` varchar(255) NOT NULL,
  `q_type` varchar(255) NOT NULL DEFAULT 'Multiple Choice'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_table`
--
ALTER TABLE `account_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `display_table`
--
ALTER TABLE `display_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_set`
--
ALTER TABLE `game_set`
  ADD PRIMARY KEY (`game_id`),
  ADD UNIQUE KEY `game_id` (`game_id`);

--
-- Indexes for table `login_authentication`
--
ALTER TABLE `login_authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points_table`
--
ALTER TABLE `points_table`
  ADD PRIMARY KEY (`uniq_id`);

--
-- Indexes for table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`q_id`),
  ADD UNIQUE KEY `question_number` (`q_id`);

--
-- Indexes for table `used_question`
--
ALTER TABLE `used_question`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_table`
--
ALTER TABLE `account_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `display_table`
--
ALTER TABLE `display_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `game_set`
--
ALTER TABLE `game_set`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_authentication`
--
ALTER TABLE `login_authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `points_table`
--
ALTER TABLE `points_table`
  MODIFY `uniq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `used_question`
--
ALTER TABLE `used_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
