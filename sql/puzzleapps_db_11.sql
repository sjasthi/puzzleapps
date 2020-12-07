-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 09:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puzzleapps_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id` int(12) UNSIGNED NOT NULL,
  `name` varchar(4000) NOT NULL,
  `path` varchar(4000) NOT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  `inputFromDB` tinyint(1) NOT NULL DEFAULT 0,
  `inputFromUI` tinyint(1) NOT NULL DEFAULT 0,
  `outputToDB` tinyint(1) NOT NULL DEFAULT 0,
  `outputToUI` tinyint(1) NOT NULL DEFAULT 0,
  `developer` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(50) NOT NULL,
  `playable` tinyint(1) NOT NULL DEFAULT 0,
  `icon` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `name`, `path`, `description`, `notes`, `inputFromDB`, `inputFromUI`, `outputToDB`, `outputToUI`, `developer`, `status`, `token`, `playable`, `icon`) VALUES
(1, 'Vowel Changer', 'http://localhost/VowelChange/index.php', 'The vowels are changing', 'Fun way to learn how vowels change', 0, 0, 0, 0, 'Siva', 1, 'VowelChange/index.php', 1, 'vowels.png'),
(2, 'Dabble (Pyramids)', 'http://localhost/Dabble/index.php', 'Pyramids Dabble Puzzle', 'This is Dabble game.', 0, 0, 0, 0, 'Babatunde', 1, 'Dabble/index.php', 1, 'dabble.png'),
(3, 'Cross Word', 'http://localhost/CrossWord/index.php', 'The words are crossing', 'Fun way to learn words', 0, 0, 0, 0, 'Siva', 1, 'CrossWord/index.php', 1, 'crosswords.png'),
(4, 'Scrambler', 'http://localhost/Scrambler/index.php', 'Scrambler Puzzle', 'This is Scrambler game', 0, 0, 0, 0, 'Babatunde', 1, 'Scrambler/index.php', 1, 'scrambler.jpeg'),
(5, 'Rebus', 'http://localhost/Rebus/index.php', 'Rebus Puzzle', 'This is Rebus game', 0, 0, 0, 0, 'Babatunde', 1, 'Rebus/index.php', 1, 'rebus.png'),
(6, 'Word Find', 'http://localhost/WordFind/index.html', 'Word Find', 'This is Word_Find game', 0, 0, 0, 0, 'Siva', 1, 'WordFind/index.html', 1, 'wordFind.png'),
(7, 'Wordoku', 'http://localhost/Wordoku/index.php', 'Wordoku Puzzle', 'This is Wordoku game', 0, 0, 0, 0, 'Stephen', 1, 'Wordoku/index.php', 1, 'wordoku.png'),
(8, 'CrossWord (Fill-in)', 'http://localhost/Crossword/index.php', 'Crossword Fill-in', 'This is CrossWord Fill-in game', 0, 0, 0, 0, 'Stephen', 1, 'Crossword/index.php', 1, 'join.jpeg'),
(9, 'CrossWord (Classic)', 'http://localhost/Crossword/index.php', 'Crossword Classic', 'This is CrossWord Classic game', 0, 0, 0, 0, 'Babatunde', 1, 'Crossword/index.php', 1, 'join.jpeg'),
(10, 'CrossWord (Skeleton)', 'http://localhost/Crossword/index.php', 'Crossword Skeleton', 'This is CrossWord Skeleton game', 0, 0, 0, 0, 'Babatunde', 1, 'Crossword/index.php', 1, 'join.jpeg'),
(11, 'Scrambled Shapes', 'http://localhost/ScrambledShapes/indexshapes.html', 'Scrambled Shapes', 'This is Scrambled Shapes game', 0, 0, 0, 0, 'Siva', 1, 'ScrambledShapes/indexshapes.html', 1, 'ScrambledShapes.png'),
(12, 'Bingo', 'http://localhost/bingo/Bingo.php', 'Bingo Puzzle', 'This is Bingo game', 0, 0, 0, 0, 'Siva', 1, 'bingo/Bingo.php', 1, 'bingo.png'),
(13, 'Word Match', 'http://localhost/Word_Match/index.html', 'Word Match', 'This is Word Match game', 0, 0, 0, 0, 'Siva', 1, 'Word_Match/index.html', 1, 'wordMatch.png'),
(14, '4Pics1Word', 'http://localhost/Rebus/index.php', '4 Pics 1 Word', 'This is 4 Pics 1 Word game', 0, 0, 0, 0, 'Siva', 1, 'Rebus/index.php', 1, '4pic1word.png'),
(15, 'Whats the Name', 'http://localhost/Whats/index.php', 'What is the Name', 'This is Name in Synonyms game', 0, 0, 0, 0, 'Siva', 1, 'Whats/index.php', 1, 'whats.png'),
(16, 'Quote Scrambler', 'http://localhost/QSFL/Index.php', 'Quote Scrambler', 'This is Quote Scrambler game', 0, 0, 0, 0, 'Siva', 1, 'QSFL/Index.php', 1, 'FindTheWords.GIF'),
(17, 'Text Analyzer', 'http://localhost/IndicTextAnalyzer/index.html', 'Text Analyzer', 'This is Text Analyzer game', 0, 0, 0, 0, 'Siva', 1, 'IndicTextAnalyzer/index.html', 1, 'IndicTextAnalyzer.png'),
(18, 'Is it a Pair', 'http://localhost/TestingLanguages/Index.html', 'Is it a Pair', 'This is Is it a Pair game', 0, 0, 0, 0, 'Siva', 1, 'TestingLanguages1/Index.html', 1, 'Test.png'),
(19, 'Drop Quote', 'http://localhost/QSFL/Index.php', 'Drop Quote', 'This is Drop Quote game', 0, 0, 0, 0, 'Siva', 1, 'QSFL/Index.php', 1, 'FindTheWords.GIF'),
(20, '7 little words', 'http://localhost/Wordoku/index.php', '7 little words', 'This is 7 Little Words game', 0, 0, 0, 0, 'Alieu', 1, 'Wordoku/index.php', 1, '7littlewords.png'),
(21, 'FillIn', 'http://localhost/ScrambledShapes/indexshapes.html', 'Fill In', 'This is FillIn game', 0, 0, 0, 0, 'Alieu', 1, 'ScrambledShapes/indexshapes.html', 1, 'fillIn.png'),
(22, 'Jumble', 'http://localhost/Wordoku/index.php', 'Jumble', 'This is Jumble game', 0, 0, 0, 0, 'Babatunde', 1, 'Wordoku/index.php', 1, 'jumble.png'),
(23, 'Pick n Assemble (PAW)', 'http://localhost/Crossword/index.php', 'Pick n Assemble', 'This is Pick and Assemble game', 0, 0, 0, 0, 'Siva', 1, 'Crossword/index.php', 1, 'picknassemble.png'),
(24, 'Word Ladder', 'http://localhost/WordFind/index.html', 'Word Ladder', 'This is Word Ladder game', 0, 0, 0, 0, 'Babatunde', 1, 'WordFind/index.html', 1, 'wordLadder.png'),
(25, 'Quiz Master', 'http://localhost/Crossword/index.php', 'Quiz Master', 'This is Quiz Master game', 0, 0, 0, 0, 'Alieu', 1, 'Crossword/index.php', 1, 'quiz.jpeg'),
(26, 'Text Twist', 'http://localhost/ScrambledShapes/indexshapes.html', 'Text Twist', 'This is Text Twist game', 0, 0, 0, 0, 'Babatunde', 1, 'ScrambledShapes/indexshapes.html', 1, 'textTwist.png'),
(27, 'Rank By X', 'http://localhost/bingo/Bingo.php', 'Rank By X', 'This is Rank By X game', 0, 0, 0, 0, 'Alieu', 1, 'bingo/Bingo.php', 1, 'RankByX.png'),
(28, 'Dabble Old', 'http://llocalhost/Dabble/index.php', 'Old Dabble', 'This is Old Dabble game', 0, 0, 0, 0, 'Babatunde', 1, 'Dabble/index.php', 1, 'dabble.png');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(12) UNSIGNED NOT NULL,
  `author_id` int(12) UNSIGNED NOT NULL,
  `sponsor_id` int(12) UNSIGNED DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `front_cover` varchar(500) DEFAULT NULL,
  `back_cover` varchar(500) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  `keywords` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `author_id`, `sponsor_id`, `title`, `description`, `front_cover`, `back_cover`, `notes`, `keywords`) VALUES
(1, 2, 5, 'Book Name', 'Such a good puzzle book', 'dabble.png', 'dabble.png', 'Book notes', 'book'),
(2, 2, 5, 'Easy Crosswords V1', 'Easy crosswords!', 'crosswords.png', 'crosswords.png', '', NULL),
(3, 2, 5, 'English Vowel Changes', 'Those crazy vowels!', 'vowels.png', 'vowels.png', '', NULL),
(4, 2, 5, 'Word Find Book 10', 'Find them all!', 'wordfind.gif', 'wordfind.gif', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books_puzzles`
--

CREATE TABLE `books_puzzles` (
  `book_id` int(12) UNSIGNED NOT NULL,
  `puzzle_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_puzzles`
--

INSERT INTO `books_puzzles` (`book_id`, `puzzle_id`) VALUES
(1, 201),
(2, 201),
(2, 202),
(2, 203),
(2, 204),
(2, 205),
(2, 206),
(2, 207),
(2, 208),
(2, 209),
(2, 210),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(4, 101),
(4, 102),
(4, 103),
(4, 104),
(4, 105),
(4, 106),
(4, 107),
(4, 108),
(4, 109),
(4, 110);

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `preference_name` varchar(500) NOT NULL,
  `preference_value` varchar(500) NOT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `preference_name`, `preference_value`, `comments`) VALUES
(1, 'book_height', '200', NULL),
(2, 'book_width', '200', NULL),
(3, 'books_per_row', '4', NULL),
(4, 'books_to_show', '21', NULL),
(5, 'app_height', '200', NULL),
(6, 'app_width', '300', NULL),
(7, 'apps_per_row', '4', NULL),
(8, 'apps_to_show', '200', NULL),
(9, 'puzzle_height', '200', NULL),
(10, 'puzzle_width', '300', NULL),
(11, 'puzzles_per_row', '4', NULL),
(12, 'puzzles_to_show', '21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `puzzles`
--

CREATE TABLE `puzzles` (
  `id` int(12) UNSIGNED NOT NULL,
  `app_id` int(12) UNSIGNED NOT NULL,
  `author_id` int(12) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `sub_title` varchar(100) DEFAULT NULL,
  `directions` mediumblob DEFAULT NULL,
  `puzzle_image` varchar(250) DEFAULT NULL,
  `solution_image` varchar(250) DEFAULT NULL,
  `notes` blob DEFAULT NULL,
  `keywords` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `puzzles`
--

INSERT INTO `puzzles` (`id`, `app_id`, `author_id`, `title`, `sub_title`, `directions`, `puzzle_image`, `solution_image`, `notes`, `keywords`) VALUES
(1, 1, 2, 'vowel_changes_1', NULL, NULL, 'alice31.gif', 'alice23.gif', 0x70757a7a6c657320776974682074686520696d616765732031, NULL),
(2, 1, 2, 'vowel_changes_2', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(3, 1, 2, 'vowel_changes_3', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(4, 1, 2, 'vowel_changes_4', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(5, 1, 2, 'vowel_changes_5', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(6, 1, 2, 'vowel_changes_6', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(7, 1, 2, 'vowel_changes_7', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(8, 1, 2, 'vowel_changes_8', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(9, 1, 2, 'vowel_changes_9', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(10, 1, 2, 'vowel_changes_10', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(11, 1, 2, 'vowel_changes_11', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(12, 1, 2, 'vowel_changes_12', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(13, 1, 2, 'vowel_changes_13', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(14, 1, 2, 'vowel_changes_14', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(15, 1, 2, 'vowel_changes_15', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(16, 1, 2, 'vowel_changes_16', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(17, 1, 2, 'vowel_changes_17', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(18, 1, 2, 'vowel_changes_18', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(19, 1, 2, 'vowel_changes_19', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(20, 1, 2, 'vowel_changes_20', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(21, 1, 2, 'vowel_changes_21', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(22, 1, 2, 'vowel_changes_22', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(23, 1, 2, 'vowel_changes_23', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(24, 1, 2, 'vowel_changes_24', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(25, 1, 2, 'vowel_changes_25', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(26, 1, 2, 'vowel_changes_26', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(27, 1, 2, 'vowel_changes_27', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(28, 1, 2, 'vowel_changes_28', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(29, 1, 2, 'vowel_changes_29', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(30, 1, 2, 'vowel_changes_30', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(31, 1, 2, 'vowel_changes_31', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(32, 1, 2, 'vowel_changes_32', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(33, 1, 2, 'vowel_changes_33', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(34, 1, 2, 'vowel_changes_34', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(35, 1, 2, 'vowel_changes_35', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(36, 1, 2, 'vowel_changes_36', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(37, 1, 2, 'vowel_changes_37', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(38, 1, 2, 'vowel_changes_38', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(39, 1, 2, 'vowel_changes_39', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(40, 1, 2, 'vowel_changes_40', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(41, 1, 2, 'vowel_changes_41', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(42, 1, 2, 'vowel_changes_42', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(43, 1, 2, 'vowel_changes_43', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(44, 1, 2, 'vowel_changes_44', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(45, 1, 2, 'vowel_changes_45', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(46, 1, 2, 'vowel_changes_46', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(47, 1, 2, 'vowel_changes_47', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(48, 1, 2, 'vowel_changes_48', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(49, 1, 2, 'vowel_changes_49', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(50, 1, 2, 'vowel_changes_50', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(51, 1, 2, 'vowel_changes_51', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(52, 1, 2, 'vowel_changes_52', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(53, 1, 2, 'vowel_changes_53', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(54, 1, 2, 'vowel_changes_54', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(55, 1, 2, 'vowel_changes_55', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(56, 1, 2, 'vowel_changes_56', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(57, 1, 2, 'vowel_changes_57', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(58, 1, 2, 'vowel_changes_58', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(59, 1, 2, 'vowel_changes_59', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(60, 1, 2, 'vowel_changes_60', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(61, 1, 2, 'vowel_changes_61', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(62, 1, 2, 'vowel_changes_62', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(63, 1, 2, 'vowel_changes_63', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(64, 1, 2, 'vowel_changes_64', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(65, 1, 2, 'vowel_changes_65', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(66, 1, 2, 'vowel_changes_66', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(67, 1, 2, 'vowel_changes_67', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(68, 1, 2, 'vowel_changes_68', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(69, 1, 2, 'vowel_changes_69', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(70, 1, 2, 'vowel_changes_70', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(71, 1, 2, 'vowel_changes_71', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(72, 1, 2, 'vowel_changes_72', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(73, 1, 2, 'vowel_changes_73', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(74, 1, 2, 'vowel_changes_74', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(75, 1, 2, 'vowel_changes_75', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(76, 1, 2, 'vowel_changes_76', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(77, 1, 2, 'vowel_changes_77', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(78, 1, 2, 'vowel_changes_78', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(79, 1, 2, 'vowel_changes_79', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(80, 1, 2, 'vowel_changes_80', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(81, 1, 2, 'vowel_changes_81', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(82, 1, 2, 'vowel_changes_82', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(83, 1, 2, 'vowel_changes_83', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(84, 1, 2, 'vowel_changes_84', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(85, 1, 2, 'vowel_changes_85', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(86, 1, 2, 'vowel_changes_86', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(87, 1, 2, 'vowel_changes_87', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(88, 1, 2, 'vowel_changes_88', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(89, 1, 2, 'vowel_changes_89', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(90, 1, 2, 'vowel_changes_90', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(91, 1, 2, 'vowel_changes_91', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(92, 1, 2, 'vowel_changes_92', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(93, 1, 2, 'vowel_changes_93', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(94, 1, 2, 'vowel_changes_94', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(95, 1, 2, 'vowel_changes_95', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(96, 1, 2, 'vowel_changes_96', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(97, 1, 2, 'vowel_changes_97', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(98, 1, 2, 'vowel_changes_98', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(99, 1, 2, 'vowel_changes_99', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(100, 1, 2, 'vowel_changes_100', NULL, NULL, 'alice31.gif', 'alice23.gif', '', NULL),
(101, 6, 2, 'word_search_1', NULL, NULL, 'word_search_1.jpg', 'word_search_1_sol.jpg', 0x74686973206973207468652066697273742070757a7a6c65, NULL),
(102, 6, 2, 'word_search_2', NULL, NULL, 'word_search_2.jpg', 'word_search_2_sol.jpg', '', NULL),
(103, 6, 2, 'word_search_3', NULL, NULL, 'word_search_3.jpg', 'word_search_3_sol.jpg', '', NULL),
(104, 6, 2, 'word_search_4', NULL, NULL, 'word_search_4.jpg', 'word_search_4_sol.jpg', '', NULL),
(105, 6, 2, 'word_search_5', NULL, NULL, 'word_search_5.jpg', 'word_search_5_sol.jpg', '', NULL),
(106, 6, 2, 'word_search_6', NULL, NULL, 'word_search_6.jpg', 'word_search_6_sol.jpg', '', NULL),
(107, 6, 2, 'word_search_7', NULL, NULL, 'word_search_7.jpg', 'word_search_7_sol.jpg', '', NULL),
(108, 6, 2, 'word_search_8', NULL, NULL, 'word_search_8.jpg', 'word_search_8_sol.jpg', '', NULL),
(109, 6, 2, 'word_search_9', NULL, NULL, 'word_search_9.jpg', 'word_search_9_sol.jpg', '', NULL),
(110, 6, 2, 'word_search_10', NULL, NULL, 'word_search_10.jpg', 'word_search_10_sol.jpg', '', NULL),
(111, 6, 2, 'word_search_11', NULL, NULL, 'word_search_11.jpg', 'word_search_11_sol.jpg', '', NULL),
(112, 6, 2, 'word_search_12', NULL, NULL, 'word_search_12.jpg', 'word_search_12_sol.jpg', '', NULL),
(113, 6, 2, 'word_search_13', NULL, NULL, 'word_search_13.jpg', 'word_search_13_sol.jpg', '', NULL),
(114, 6, 2, 'word_search_14', NULL, NULL, 'word_search_14.jpg', 'word_search_14_sol.jpg', '', NULL),
(115, 6, 2, 'word_search_15', NULL, NULL, 'word_search_15.jpg', 'word_search_15_sol.jpg', '', NULL),
(116, 6, 2, 'word_search_16', NULL, NULL, 'word_search_16.jpg', 'word_search_16_sol.jpg', '', NULL),
(117, 6, 2, 'word_search_17', NULL, NULL, 'word_search_17.jpg', 'word_search_17_sol.jpg', '', NULL),
(118, 6, 2, 'word_search_18', NULL, NULL, 'word_search_18.jpg', 'word_search_18_sol.jpg', '', NULL),
(119, 6, 2, 'word_search_19', NULL, NULL, 'word_search_19.jpg', 'word_search_19_sol.jpg', '', NULL),
(120, 6, 2, 'word_search_20', NULL, NULL, 'word_search_20.jpg', 'word_search_20_sol.jpg', '', NULL),
(121, 6, 2, 'word_search_21', NULL, NULL, 'word_search_21.jpg', 'word_search_21_sol.jpg', '', NULL),
(122, 6, 2, 'word_search_22', NULL, NULL, 'word_search_22.jpg', 'word_search_22_sol.jpg', '', NULL),
(123, 6, 2, 'word_search_23', NULL, NULL, 'word_search_23.jpg', 'word_search_23_sol.jpg', '', NULL),
(124, 6, 2, 'word_search_24', NULL, NULL, 'word_search_24.jpg', 'word_search_24_sol.jpg', '', NULL),
(125, 6, 2, 'word_search_25', NULL, NULL, 'word_search_25.jpg', 'word_search_25_sol.jpg', '', NULL),
(126, 6, 2, 'word_search_26', NULL, NULL, 'word_search_26.jpg', 'word_search_26_sol.jpg', '', NULL),
(127, 6, 2, 'word_search_27', NULL, NULL, 'word_search_27.jpg', 'word_search_27_sol.jpg', '', NULL),
(128, 6, 2, 'word_search_28', NULL, NULL, 'word_search_28.jpg', 'word_search_28_sol.jpg', '', NULL),
(129, 6, 2, 'word_search_29', NULL, NULL, 'word_search_29.jpg', 'word_search_29_sol.jpg', '', NULL),
(130, 6, 2, 'word_search_30', NULL, NULL, 'word_search_30.jpg', 'word_search_30_sol.jpg', '', NULL),
(131, 6, 2, 'word_search_31', NULL, NULL, 'word_search_31.jpg', 'word_search_31_sol.jpg', '', NULL),
(132, 6, 2, 'word_search_32', NULL, NULL, 'word_search_32.jpg', 'word_search_32_sol.jpg', '', NULL),
(133, 6, 2, 'word_search_33', NULL, NULL, 'word_search_33.jpg', 'word_search_33_sol.jpg', '', NULL),
(134, 6, 2, 'word_search_34', NULL, NULL, 'word_search_34.jpg', 'word_search_34_sol.jpg', '', NULL),
(135, 6, 2, 'word_search_35', NULL, NULL, 'word_search_35.jpg', 'word_search_35_sol.jpg', '', NULL),
(136, 6, 2, 'word_search_36', NULL, NULL, 'word_search_36.jpg', 'word_search_36_sol.jpg', '', NULL),
(137, 6, 2, 'word_search_37', NULL, NULL, 'word_search_37.jpg', 'word_search_37_sol.jpg', '', NULL),
(138, 6, 2, 'word_search_38', NULL, NULL, 'word_search_38.jpg', 'word_search_38_sol.jpg', '', NULL),
(139, 6, 2, 'word_search_39', NULL, NULL, 'word_search_39.jpg', 'word_search_39_sol.jpg', '', NULL),
(140, 6, 2, 'word_search_40', NULL, NULL, 'word_search_40.jpg', 'word_search_40_sol.jpg', '', NULL),
(141, 6, 2, 'word_search_41', NULL, NULL, 'word_search_41.jpg', 'word_search_41_sol.jpg', '', NULL),
(142, 6, 2, 'word_search_42', NULL, NULL, 'word_search_42.jpg', 'word_search_42_sol.jpg', '', NULL),
(143, 6, 2, 'word_search_43', NULL, NULL, 'word_search_43.jpg', 'word_search_43_sol.jpg', '', NULL),
(144, 6, 2, 'word_search_44', NULL, NULL, 'word_search_44.jpg', 'word_search_44_sol.jpg', '', NULL),
(145, 6, 2, 'word_search_45', NULL, NULL, 'word_search_45.jpg', 'word_search_45_sol.jpg', '', NULL),
(146, 6, 2, 'word_search_46', NULL, NULL, 'word_search_46.jpg', 'word_search_46_sol.jpg', '', NULL),
(147, 6, 2, 'word_search_47', NULL, NULL, 'word_search_47.jpg', 'word_search_47_sol.jpg', '', NULL),
(148, 6, 2, 'word_search_48', NULL, NULL, 'word_search_48.jpg', 'word_search_48_sol.jpg', '', NULL),
(149, 6, 2, 'word_search_49', NULL, NULL, 'word_search_49.jpg', 'word_search_49_sol.jpg', '', NULL),
(150, 6, 2, 'word_search_50', NULL, NULL, 'word_search_50.jpg', 'word_search_50_sol.jpg', '', NULL),
(151, 6, 2, 'word_search_51', NULL, NULL, 'word_search_51.jpg', 'word_search_51_sol.jpg', '', NULL),
(152, 6, 2, 'word_search_52', NULL, NULL, 'word_search_52.jpg', 'word_search_52_sol.jpg', '', NULL),
(153, 6, 2, 'word_search_53', NULL, NULL, 'word_search_53.jpg', 'word_search_53_sol.jpg', '', NULL),
(154, 6, 2, 'word_search_54', NULL, NULL, 'word_search_54.jpg', 'word_search_54_sol.jpg', '', NULL),
(155, 6, 2, 'word_search_55', NULL, NULL, 'word_search_55.jpg', 'word_search_55_sol.jpg', '', NULL),
(156, 6, 2, 'word_search_56', NULL, NULL, 'word_search_56.jpg', 'word_search_56_sol.jpg', '', NULL),
(157, 6, 2, 'word_search_57', NULL, NULL, 'word_search_57.jpg', 'word_search_57_sol.jpg', '', NULL),
(158, 6, 2, 'word_search_58', NULL, NULL, 'word_search_58.jpg', 'word_search_58_sol.jpg', '', NULL),
(159, 6, 2, 'word_search_59', NULL, NULL, 'word_search_59.jpg', 'word_search_59_sol.jpg', '', NULL),
(160, 6, 2, 'word_search_60', NULL, NULL, 'word_search_60.jpg', 'word_search_60_sol.jpg', '', NULL),
(161, 6, 2, 'word_search_61', NULL, NULL, 'word_search_61.jpg', 'word_search_61_sol.jpg', '', NULL),
(162, 6, 2, 'word_search_62', NULL, NULL, 'word_search_62.jpg', 'word_search_62_sol.jpg', '', NULL),
(163, 6, 2, 'word_search_63', NULL, NULL, 'word_search_63.jpg', 'word_search_63_sol.jpg', '', NULL),
(164, 6, 2, 'word_search_64', NULL, NULL, 'word_search_64.jpg', 'word_search_64_sol.jpg', '', NULL),
(165, 6, 2, 'word_search_65', NULL, NULL, 'word_search_65.jpg', 'word_search_65_sol.jpg', '', NULL),
(166, 6, 2, 'word_search_66', NULL, NULL, 'word_search_66.jpg', 'word_search_66_sol.jpg', '', NULL),
(167, 6, 2, 'word_search_67', NULL, NULL, 'word_search_67.jpg', 'word_search_67_sol.jpg', '', NULL),
(168, 6, 2, 'word_search_68', NULL, NULL, 'word_search_68.jpg', 'word_search_68_sol.jpg', '', NULL),
(169, 6, 2, 'word_search_69', NULL, NULL, 'word_search_69.jpg', 'word_search_69_sol.jpg', '', NULL),
(170, 6, 2, 'word_search_70', NULL, NULL, 'word_search_70.jpg', 'word_search_70_sol.jpg', '', NULL),
(171, 6, 2, 'word_search_71', NULL, NULL, 'word_search_71.jpg', 'word_search_71_sol.jpg', '', NULL),
(172, 6, 2, 'word_search_72', NULL, NULL, 'word_search_72.jpg', 'word_search_72_sol.jpg', '', NULL),
(173, 6, 2, 'word_search_73', NULL, NULL, 'word_search_73.jpg', 'word_search_73_sol.jpg', '', NULL),
(174, 6, 2, 'word_search_74', NULL, NULL, 'word_search_74.jpg', 'word_search_74_sol.jpg', '', NULL),
(175, 6, 2, 'word_search_75', NULL, NULL, 'word_search_75.jpg', 'word_search_75_sol.jpg', '', NULL),
(176, 6, 2, 'word_search_76', NULL, NULL, 'word_search_76.jpg', 'word_search_76_sol.jpg', '', NULL),
(177, 6, 2, 'word_search_77', NULL, NULL, 'word_search_77.jpg', 'word_search_77_sol.jpg', '', NULL),
(178, 6, 2, 'word_search_78', NULL, NULL, 'word_search_78.jpg', 'word_search_78_sol.jpg', '', NULL),
(179, 6, 2, 'word_search_79', NULL, NULL, 'word_search_79.jpg', 'word_search_79_sol.jpg', '', NULL),
(180, 6, 2, 'word_search_80', NULL, NULL, 'word_search_80.jpg', 'word_search_80_sol.jpg', '', NULL),
(181, 6, 2, 'word_search_81', NULL, NULL, 'word_search_81.jpg', 'word_search_81_sol.jpg', '', NULL),
(182, 6, 2, 'word_search_82', NULL, NULL, 'word_search_82.jpg', 'word_search_82_sol.jpg', '', NULL),
(183, 6, 2, 'word_search_83', NULL, NULL, 'word_search_83.jpg', 'word_search_83_sol.jpg', '', NULL),
(184, 6, 2, 'word_search_84', NULL, NULL, 'word_search_84.jpg', 'word_search_84_sol.jpg', '', NULL),
(185, 6, 2, 'word_search_85', NULL, NULL, 'word_search_85.jpg', 'word_search_85_sol.jpg', '', NULL),
(186, 6, 2, 'word_search_86', NULL, NULL, 'word_search_86.jpg', 'word_search_86_sol.jpg', '', NULL),
(187, 6, 2, 'word_search_87', NULL, NULL, 'word_search_87.jpg', 'word_search_87_sol.jpg', '', NULL),
(188, 6, 2, 'word_search_88', NULL, NULL, 'word_search_88.jpg', 'word_search_88_sol.jpg', '', NULL),
(189, 6, 2, 'word_search_89', NULL, NULL, 'word_search_89.jpg', 'word_search_89_sol.jpg', '', NULL),
(190, 6, 2, 'word_search_90', NULL, NULL, 'word_search_90.jpg', 'word_search_90_sol.jpg', '', NULL),
(191, 6, 2, 'word_search_91', NULL, NULL, 'word_search_91.jpg', 'word_search_91_sol.jpg', '', NULL),
(192, 6, 2, 'word_search_92', NULL, NULL, 'word_search_92.jpg', 'word_search_92_sol.jpg', '', NULL),
(193, 6, 2, 'word_search_93', NULL, NULL, 'word_search_93.jpg', 'word_search_93_sol.jpg', '', NULL),
(194, 6, 2, 'word_search_94', NULL, NULL, 'word_search_94.jpg', 'word_search_94_sol.jpg', '', NULL),
(195, 6, 2, 'word_search_95', NULL, NULL, 'word_search_95.jpg', 'word_search_95_sol.jpg', '', NULL),
(196, 6, 2, 'word_search_96', NULL, NULL, 'word_search_96.jpg', 'word_search_96_sol.jpg', '', NULL),
(197, 6, 2, 'word_search_97', NULL, NULL, 'word_search_97.jpg', 'word_search_97_sol.jpg', '', NULL),
(198, 6, 2, 'word_search_98', NULL, NULL, 'word_search_98.jpg', 'word_search_98_sol.jpg', '', NULL),
(199, 6, 2, 'word_search_99', NULL, NULL, 'word_search_99.jpg', 'word_search_99_sol.jpg', '', NULL),
(200, 6, 2, 'word_search_100', NULL, NULL, 'word_search_100.jpg', 'word_search_100_sol.jpg', 0x74686973206973207468652031303074682070757a7a6c65, NULL),
(201, 3, 2, 'cross_word_1', NULL, NULL, 'cross_word_1.jpg', 'cross_word_1_sol.jpg', 0x74686973206973207468652066697273742070757a7a6c65, NULL),
(202, 3, 2, 'cross_word_2', NULL, NULL, 'cross_word_2.jpg', 'cross_word_2_sol.jpg', '', NULL),
(203, 3, 2, 'cross_word_3', NULL, NULL, 'cross_word_3.jpg', 'cross_word_3_sol.jpg', '', NULL),
(204, 3, 2, 'cross_word_4', NULL, NULL, 'cross_word_4.jpg', 'cross_word_4_sol.jpg', '', NULL),
(205, 3, 2, 'cross_word_5', NULL, NULL, 'cross_word_5.jpg', 'cross_word_5_sol.jpg', '', NULL),
(206, 3, 2, 'cross_word_6', NULL, NULL, 'cross_word_6.jpg', 'cross_word_6_sol.jpg', '', NULL),
(207, 3, 2, 'cross_word_7', NULL, NULL, 'cross_word_7.jpg', 'cross_word_7_sol.jpg', '', NULL),
(208, 3, 2, 'cross_word_8', NULL, NULL, 'cross_word_8.jpg', 'cross_word_8_sol.jpg', '', NULL),
(209, 3, 2, 'cross_word_9', NULL, NULL, 'cross_word_9.jpg', 'cross_word_9_sol.jpg', '', NULL),
(210, 3, 2, 'cross_word_10', NULL, NULL, 'cross_word_10.jpg', 'cross_word_10_sol.jpg', '', NULL),
(211, 3, 2, 'cross_word_11', NULL, NULL, 'cross_word_11.jpg', 'cross_word_11_sol.jpg', '', NULL),
(212, 3, 2, 'cross_word_12', NULL, NULL, 'cross_word_12.jpg', 'cross_word_12_sol.jpg', '', NULL),
(213, 3, 2, 'cross_word_13', NULL, NULL, 'cross_word_13.jpg', 'cross_word_13_sol.jpg', '', NULL),
(214, 3, 2, 'cross_word_14', NULL, NULL, 'cross_word_14.jpg', 'cross_word_14_sol.jpg', '', NULL),
(215, 3, 2, 'cross_word_15', NULL, NULL, 'cross_word_15.jpg', 'cross_word_15_sol.jpg', '', NULL),
(216, 3, 2, 'cross_word_16', NULL, NULL, 'cross_word_16.jpg', 'cross_word_16_sol.jpg', '', NULL),
(217, 3, 2, 'cross_word_17', NULL, NULL, 'cross_word_17.jpg', 'cross_word_17_sol.jpg', '', NULL),
(218, 3, 2, 'cross_word_18', NULL, NULL, 'cross_word_18.jpg', 'cross_word_18_sol.jpg', '', NULL),
(219, 3, 2, 'cross_word_19', NULL, NULL, 'cross_word_19.jpg', 'cross_word_19_sol.jpg', '', NULL),
(220, 3, 2, 'cross_word_20', NULL, NULL, 'cross_word_20.jpg', 'cross_word_20_sol.jpg', '', NULL),
(221, 3, 2, 'cross_word_21', NULL, NULL, 'cross_word_21.jpg', 'cross_word_21_sol.jpg', '', NULL),
(222, 3, 2, 'cross_word_22', NULL, NULL, 'cross_word_22.jpg', 'cross_word_22_sol.jpg', '', NULL),
(223, 3, 2, 'cross_word_23', NULL, NULL, 'cross_word_23.jpg', 'cross_word_23_sol.jpg', '', NULL),
(224, 3, 2, 'cross_word_24', NULL, NULL, 'cross_word_24.jpg', 'cross_word_24_sol.jpg', '', NULL),
(225, 3, 2, 'cross_word_25', NULL, NULL, 'cross_word_25.jpg', 'cross_word_25_sol.jpg', '', NULL),
(226, 3, 2, 'cross_word_26', NULL, NULL, 'cross_word_26.jpg', 'cross_word_26_sol.jpg', '', NULL),
(227, 3, 2, 'cross_word_27', NULL, NULL, 'cross_word_27.jpg', 'cross_word_27_sol.jpg', '', NULL),
(228, 3, 2, 'cross_word_28', NULL, NULL, 'cross_word_28.jpg', 'cross_word_28_sol.jpg', '', NULL),
(229, 3, 2, 'cross_word_29', NULL, NULL, 'cross_word_29.jpg', 'cross_word_29_sol.jpg', '', NULL),
(230, 3, 2, 'cross_word_30', NULL, NULL, 'cross_word_30.jpg', 'cross_word_30_sol.jpg', '', NULL),
(231, 3, 2, 'cross_word_31', NULL, NULL, 'cross_word_31.jpg', 'cross_word_31_sol.jpg', '', NULL),
(232, 3, 2, 'cross_word_32', NULL, NULL, 'cross_word_32.jpg', 'cross_word_32_sol.jpg', '', NULL),
(233, 3, 2, 'cross_word_33', NULL, NULL, 'cross_word_33.jpg', 'cross_word_33_sol.jpg', '', NULL),
(234, 3, 2, 'cross_word_34', NULL, NULL, 'cross_word_34.jpg', 'cross_word_34_sol.jpg', '', NULL),
(235, 3, 2, 'cross_word_35', NULL, NULL, 'cross_word_35.jpg', 'cross_word_35_sol.jpg', '', NULL),
(236, 3, 2, 'cross_word_36', NULL, NULL, 'cross_word_36.jpg', 'cross_word_36_sol.jpg', '', NULL),
(237, 3, 2, 'cross_word_37', NULL, NULL, 'cross_word_37.jpg', 'cross_word_37_sol.jpg', '', NULL),
(238, 3, 2, 'cross_word_38', NULL, NULL, 'cross_word_38.jpg', 'cross_word_38_sol.jpg', '', NULL),
(239, 3, 2, 'cross_word_39', NULL, NULL, 'cross_word_39.jpg', 'cross_word_39_sol.jpg', '', NULL),
(240, 3, 2, 'cross_word_40', NULL, NULL, 'cross_word_40.jpg', 'cross_word_40_sol.jpg', '', NULL),
(241, 3, 2, 'cross_word_41', NULL, NULL, 'cross_word_41.jpg', 'cross_word_41_sol.jpg', '', NULL),
(242, 3, 2, 'cross_word_42', NULL, NULL, 'cross_word_42.jpg', 'cross_word_42_sol.jpg', '', NULL),
(243, 3, 2, 'cross_word_43', NULL, NULL, 'cross_word_43.jpg', 'cross_word_43_sol.jpg', '', NULL),
(244, 3, 2, 'cross_word_44', NULL, NULL, 'cross_word_44.jpg', 'cross_word_44_sol.jpg', '', NULL),
(245, 3, 2, 'cross_word_45', NULL, NULL, 'cross_word_45.jpg', 'cross_word_45_sol.jpg', '', NULL),
(246, 3, 2, 'cross_word_46', NULL, NULL, 'cross_word_46.jpg', 'cross_word_46_sol.jpg', '', NULL),
(247, 3, 2, 'cross_word_47', NULL, NULL, 'cross_word_47.jpg', 'cross_word_47_sol.jpg', '', NULL),
(248, 3, 2, 'cross_word_48', NULL, NULL, 'cross_word_48.jpg', 'cross_word_48_sol.jpg', '', NULL),
(249, 3, 2, 'cross_word_49', NULL, NULL, 'cross_word_49.jpg', 'cross_word_49_sol.jpg', '', NULL),
(250, 3, 2, 'cross_word_50', NULL, NULL, 'cross_word_50.jpg', 'cross_word_50_sol.jpg', '', NULL),
(251, 3, 2, 'cross_word_51', NULL, NULL, 'cross_word_51.jpg', 'cross_word_51_sol.jpg', '', NULL),
(252, 3, 2, 'cross_word_52', NULL, NULL, 'cross_word_52.jpg', 'cross_word_52_sol.jpg', '', NULL),
(253, 3, 2, 'cross_word_53', NULL, NULL, 'cross_word_53.jpg', 'cross_word_53_sol.jpg', '', NULL),
(254, 3, 2, 'cross_word_54', NULL, NULL, 'cross_word_54.jpg', 'cross_word_54_sol.jpg', '', NULL),
(255, 3, 2, 'cross_word_55', NULL, NULL, 'cross_word_55.jpg', 'cross_word_55_sol.jpg', '', NULL),
(256, 3, 2, 'cross_word_56', NULL, NULL, 'cross_word_56.jpg', 'cross_word_56_sol.jpg', '', NULL),
(257, 3, 2, 'cross_word_57', NULL, NULL, 'cross_word_57.jpg', 'cross_word_57_sol.jpg', '', NULL),
(258, 3, 2, 'cross_word_58', NULL, NULL, 'cross_word_58.jpg', 'cross_word_58_sol.jpg', '', NULL),
(259, 3, 2, 'cross_word_59', NULL, NULL, 'cross_word_59.jpg', 'cross_word_59_sol.jpg', '', NULL),
(260, 3, 2, 'cross_word_60', NULL, NULL, 'cross_word_60.jpg', 'cross_word_60_sol.jpg', '', NULL),
(261, 3, 2, 'cross_word_61', NULL, NULL, 'cross_word_61.jpg', 'cross_word_61_sol.jpg', '', NULL),
(262, 3, 2, 'cross_word_62', NULL, NULL, 'cross_word_62.jpg', 'cross_word_62_sol.jpg', '', NULL),
(263, 3, 2, 'cross_word_63', NULL, NULL, 'cross_word_63.jpg', 'cross_word_63_sol.jpg', '', NULL),
(264, 3, 2, 'cross_word_64', NULL, NULL, 'cross_word_64.jpg', 'cross_word_64_sol.jpg', '', NULL),
(265, 3, 2, 'cross_word_65', NULL, NULL, 'cross_word_65.jpg', 'cross_word_65_sol.jpg', '', NULL),
(266, 3, 2, 'cross_word_66', NULL, NULL, 'cross_word_66.jpg', 'cross_word_66_sol.jpg', '', NULL),
(267, 3, 2, 'cross_word_67', NULL, NULL, 'cross_word_67.jpg', 'cross_word_67_sol.jpg', '', NULL),
(268, 3, 2, 'cross_word_68', NULL, NULL, 'cross_word_68.jpg', 'cross_word_68_sol.jpg', '', NULL),
(269, 3, 2, 'cross_word_69', NULL, NULL, 'cross_word_69.jpg', 'cross_word_69_sol.jpg', '', NULL),
(270, 3, 2, 'cross_word_70', NULL, NULL, 'cross_word_70.jpg', 'cross_word_70_sol.jpg', '', NULL),
(271, 3, 2, 'cross_word_71', NULL, NULL, 'cross_word_71.jpg', 'cross_word_71_sol.jpg', '', NULL),
(272, 3, 2, 'cross_word_72', NULL, NULL, 'cross_word_72.jpg', 'cross_word_72_sol.jpg', '', NULL),
(273, 3, 2, 'cross_word_73', NULL, NULL, 'cross_word_73.jpg', 'cross_word_73_sol.jpg', '', NULL),
(274, 3, 2, 'cross_word_74', NULL, NULL, 'cross_word_74.jpg', 'cross_word_74_sol.jpg', '', NULL),
(275, 3, 2, 'cross_word_75', NULL, NULL, 'cross_word_75.jpg', 'cross_word_75_sol.jpg', '', NULL),
(276, 3, 2, 'cross_word_76', NULL, NULL, 'cross_word_76.jpg', 'cross_word_76_sol.jpg', '', NULL),
(277, 3, 2, 'cross_word_77', NULL, NULL, 'cross_word_77.jpg', 'cross_word_77_sol.jpg', '', NULL),
(278, 3, 2, 'cross_word_78', NULL, NULL, 'cross_word_78.jpg', 'cross_word_78_sol.jpg', '', NULL),
(279, 3, 2, 'cross_word_79', NULL, NULL, 'cross_word_79.jpg', 'cross_word_79_sol.jpg', '', NULL),
(280, 3, 2, 'cross_word_80', NULL, NULL, 'cross_word_80.jpg', 'cross_word_80_sol.jpg', '', NULL),
(281, 3, 2, 'cross_word_81', NULL, NULL, 'cross_word_81.jpg', 'cross_word_81_sol.jpg', '', NULL),
(282, 3, 2, 'cross_word_82', NULL, NULL, 'cross_word_82.jpg', 'cross_word_82_sol.jpg', '', NULL),
(283, 3, 2, 'cross_word_83', NULL, NULL, 'cross_word_83.jpg', 'cross_word_83_sol.jpg', '', NULL),
(284, 3, 2, 'cross_word_84', NULL, NULL, 'cross_word_84.jpg', 'cross_word_84_sol.jpg', '', NULL),
(285, 3, 2, 'cross_word_85', NULL, NULL, 'cross_word_85.jpg', 'cross_word_85_sol.jpg', '', NULL),
(286, 3, 2, 'cross_word_86', NULL, NULL, 'cross_word_86.jpg', 'cross_word_86_sol.jpg', '', NULL),
(287, 3, 2, 'cross_word_87', NULL, NULL, 'cross_word_87.jpg', 'cross_word_87_sol.jpg', '', NULL),
(288, 3, 2, 'cross_word_88', NULL, NULL, 'cross_word_88.jpg', 'cross_word_88_sol.jpg', '', NULL),
(289, 3, 2, 'cross_word_89', NULL, NULL, 'cross_word_89.jpg', 'cross_word_89_sol.jpg', '', NULL),
(290, 3, 2, 'cross_word_90', NULL, NULL, 'cross_word_90.jpg', 'cross_word_90_sol.jpg', '', NULL),
(291, 3, 2, 'cross_word_91', NULL, NULL, 'cross_word_91.jpg', 'cross_word_91_sol.jpg', '', NULL),
(292, 3, 2, 'cross_word_92', NULL, NULL, 'cross_word_92.jpg', 'cross_word_92_sol.jpg', '', NULL),
(293, 3, 2, 'cross_word_93', NULL, NULL, 'cross_word_93.jpg', 'cross_word_93_sol.jpg', '', NULL),
(294, 3, 2, 'cross_word_94', NULL, NULL, 'cross_word_94.jpg', 'cross_word_94_sol.jpg', '', NULL),
(295, 3, 2, 'cross_word_95', NULL, NULL, 'cross_word_95.jpg', 'cross_word_95_sol.jpg', '', NULL),
(296, 3, 2, 'cross_word_96', NULL, NULL, 'cross_word_96.jpg', 'cross_word_96_sol.jpg', '', NULL),
(297, 3, 2, 'cross_word_97', NULL, NULL, 'cross_word_97.jpg', 'cross_word_97_sol.jpg', '', NULL),
(298, 3, 2, 'cross_word_98', NULL, NULL, 'cross_word_98.jpg', 'cross_word_98_sol.jpg', '', NULL),
(299, 3, 2, 'cross_word_99', NULL, NULL, 'cross_word_99.jpg', 'cross_word_99_sol.jpg', '', NULL),
(300, 3, 2, 'cross_word_100', NULL, NULL, 'cross_word_100.jpg', 'cross_word_100_sol.jpg', 0x74686973206973207468652031303074682070757a7a6c65, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) UNSIGNED NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('SUPER_ADMIN','ADMIN','USER') NOT NULL DEFAULT 'USER',
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `notes` varchar(1000) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `modified_at` date NOT NULL DEFAULT current_timestamp(),
  `last_login_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `first_name`, `last_name`, `active`, `notes`, `created_at`, `modified_at`, `last_login_at`) VALUES
(1, 'admin@admin.admin', '$2y$10$WQtaA4BvivKovbQlVyTL0eUWDwZnrEvx.6S..cQwaz5CER7QuIB1e', 'ADMIN', 'Best', 'Admin', 1, NULL, '2020-11-17', '2020-11-17', NULL),
(2, 'siva@jasthi.com', '$2y$10$6WJhLi8VkaKuO6dBob8zleY29E2AD1rLy1PDz64JMyi4J2atzy1C.', 'SUPER_ADMIN', 'Siva', 'Jasthi', 1, NULL, '2020-11-17', '2020-11-17', NULL),
(3, 'siva@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'ADMIN', 'Siva', 'Jasthi', 1, NULL, '2020-11-17', '2020-11-17', NULL),
(4, 'test@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'USER', 'SILC', 'Tester', 1, NULL, '2020-11-17', '2020-11-17', NULL),
(5, 'cs320@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'USER', 'SILC', 'CS320', 1, NULL, '2020-11-17', '2020-11-17', NULL),
(6, 'ics499@metrostate.edu', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'ADMIN', 'ICS', '499', 1, NULL, '2020-11-17', '2020-11-17', NULL),
(7, 'test@test.test', '$2y$10$JjPh4C/g1fvjMwpRx922rOajQ7fWTU2p/JwFBDnDMUo9aCMCxWPgO', 'USER', 'test', 'test', 0, NULL, '2020-11-23', '2020-11-23', NULL),
(8, 'test@test.test2', '$2y$10$PbCAS./jJagbjtr7FEFW.e7sZq7v0G7SZOGMSiQxsoPxAr9sG797y', 'ADMIN', 'test2', 'test', 0, NULL, '2020-11-23', '2020-11-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_apps`
--

CREATE TABLE `users_apps` (
  `user_id` int(12) UNSIGNED NOT NULL,
  `app_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_apps`
--

INSERT INTO `users_apps` (`user_id`, `app_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(4, 1),
(4, 2),
(7, 1),
(7, 2),
(7, 3),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users_books`
--

CREATE TABLE `users_books` (
  `user_id` int(12) UNSIGNED NOT NULL,
  `book_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_books`
--

INSERT INTO `users_books` (`user_id`, `book_id`) VALUES
(1, 1),
(3, 3),
(5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_books_author_id` (`author_id`);

--
-- Indexes for table `books_puzzles`
--
ALTER TABLE `books_puzzles`
  ADD PRIMARY KEY (`book_id`,`puzzle_id`),
  ADD KEY `puzzle_id` (`puzzle_id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `puzzles`
--
ALTER TABLE `puzzles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_puzzles_app_id` (`app_id`),
  ADD KEY `fk_puzzles_author_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `users_apps`
--
ALTER TABLE `users_apps`
  ADD PRIMARY KEY (`user_id`,`app_id`),
  ADD KEY `app_id` (`app_id`);

--
-- Indexes for table `users_books`
--
ALTER TABLE `users_books`
  ADD PRIMARY KEY (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `puzzles`
--
ALTER TABLE `puzzles`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_books_author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `books_puzzles`
--
ALTER TABLE `books_puzzles`
  ADD CONSTRAINT `books_puzzles_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `books_puzzles_ibfk_2` FOREIGN KEY (`puzzle_id`) REFERENCES `puzzles` (`id`);

--
-- Constraints for table `puzzles`
--
ALTER TABLE `puzzles`
  ADD CONSTRAINT `fk_puzzles_app_id` FOREIGN KEY (`app_id`) REFERENCES `apps` (`id`),
  ADD CONSTRAINT `fk_puzzles_author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_apps`
--
ALTER TABLE `users_apps`
  ADD CONSTRAINT `users_apps_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_apps_ibfk_2` FOREIGN KEY (`app_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `users_books`
--
ALTER TABLE `users_books`
  ADD CONSTRAINT `users_books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
