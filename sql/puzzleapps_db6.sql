-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 09:06 PM
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
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(4000) NOT NULL,
  `path` varchar(4000) NOT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  `inputFromDB` tinyint(1) NOT NULL,
  `inputFromUI` tinyint(1) NOT NULL,
  `outputToDB` tinyint(1) NOT NULL,
  `outputToUI` tinyint(1) NOT NULL,
  `developer` varchar(500) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `playable` tinyint(1) NOT NULL,
  `icon` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `name`, `path`, `description`, `notes`, `inputFromDB`, `inputFromUI`, `outputToDB`, `outputToUI`, `developer`, `status`, `token`, `playable`, `icon`) VALUES
(1, 'Dabble (Pyramids)', 'http://localhost/Dabble/index.php', 'Pyramids Dabble Puzzle', 'This is Dabble game.', 0, 0, 0, 0, 'Babatunde', 1, 'Dabble/index.php', 1, 'images/apps/thumbnails/dabble.png'),
(2, 'Scrambler', 'http://localhost/Scrambler/index.php', 'Scrambler Puzzle', 'This is Scrambler game', 0, 0, 0, 0, 'Babatunde', 1, 'Scrambler/index.php', 1, 'images/apps/thumbnails/scrambler.jpeg'),
(3, 'Rebus', 'http://localhost/Rebus/index.php', 'Rebus Puzzle', 'This is Rebus game', 0, 0, 0, 0, 'Babatunde', 1, 'Rebus/index.php', 1, 'images/apps/thumbnails/rebus.png'),
(4, 'Word Find', 'http://localhost/WordFind/index.html', 'Word Find', 'This is Word_Find game', 0, 0, 0, 0, 'Siva', 1, 'WordFind/index.html', 1, 'images/apps/thumbnails/wordFind.png'),
(5, 'Wordoku', 'http://localhost/Wordoku/index.php', 'Wordoku Puzzle', 'This is Wordoku game', 0, 0, 0, 0, 'Stephen', 1, 'Wordoku/index.php', 1, 'images/apps/thumbnails/wordoku.png'),
(6, 'CrossWord (Fill-in)', 'http://localhost/Crossword/index.php', 'Crossword Fill-in', 'This is CrossWord Fill-in game', 0, 0, 0, 0, 'Stephen', 1, 'Crossword/index.php', 1, 'images/apps/thumbnails/join.jpeg'),
(7, 'CrossWord (Classic)', 'http://localhost/Crossword/index.php', 'Crossword Classic', 'This is CrossWord Classic game', 0, 0, 0, 0, 'Babatunde', 1, 'Crossword/index.php', 1, 'images/apps/thumbnails/join.jpeg'),
(8, 'CrossWord (Skeleton)', 'http://localhost/Crossword/index.php', 'Crossword Skeleton', 'This is CrossWord Skeleton game', 0, 0, 0, 0, 'Babatunde', 1, 'Crossword/index.php', 1, 'images/apps/thumbnails/join.jpeg'),
(9, 'Scrambled Shapes', 'http://localhost/ScrambledShapes/indexshapes.html', 'Scrambled Shapes', 'This is Scrambled Shapes game', 0, 0, 0, 0, 'Siva', 1, 'ScrambledShapes/indexshapes.html', 1, 'images/apps/thumbnails/ScrambledShapes.png'),
(10, 'Bingo', 'http://localhost/bingo/Bingo.php', 'Bingo Puzzle', 'This is Bingo game', 0, 0, 0, 0, 'Siva', 1, 'bingo/Bingo.php', 1, 'images/apps/thumbnails/bingo.png'),
(11, 'Word Match', 'http://localhost/Word_Match/index.html', 'Word Match', 'This is Word Match game', 0, 0, 0, 0, 'Siva', 1, 'Word_Match/index.html', 1, 'images/apps/thumbnails/wordMatch.png'),
(12, '4Pics1Word', 'http://localhost/Rebus/index.php', '4 Pics 1 Word', 'This is 4 Pics 1 Word game', 0, 0, 0, 0, 'Siva', 1, 'Rebus/index.php', 1, 'images/apps/thumbnails/4pic1word.png'),
(13, 'Whats the Name', 'http://localhost/Whats/index.php', 'What is the Name', 'This is Name in Synonyms game', 0, 0, 0, 0, 'Siva', 1, 'Whats/index.php', 1, 'images/apps/thumbnails/whats.png'),
(14, 'Quote Scrambler', 'http://localhost/QSFL/Index.php', 'Quote Scrambler', 'This is Quote Scrambler game', 0, 0, 0, 0, 'Siva', 1, 'QSFL/Index.php', 1, 'images/apps/thumbnails/FindTheWords.GIF'),
(15, 'Text Analyzer', 'http://localhost/IndicTextAnalyzer/index.html', 'Text Analyzer', 'This is Text Analyzer game', 0, 0, 0, 0, 'Siva', 1, 'IndicTextAnalyzer/index.html', 1, 'images/apps/thumbnails/IndicTextAnalyzer.png'),
(16, 'Is it a Pair', 'http://localhost/TestingLanguages/Index.html', 'Is it a Pair', 'This is Is it a Pair game', 0, 0, 0, 0, 'Siva', 1, 'TestingLanguages1/Index.html', 1, 'images/apps/thumbnails/Test.png'),
(17, 'Drop Quote', 'http://localhost/QSFL/Index.php', 'Drop Quote', 'This is Drop Quote game', 0, 0, 0, 0, 'Siva', 1, 'QSFL/Index.php', 1, 'images/apps/thumbnails/FindTheWords.GIF'),
(18, '7 little words', 'http://localhost/Wordoku/index.php', '7 little words', 'This is 7 Little Words game', 0, 0, 0, 0, 'Alieu', 1, 'Wordoku/index.php', 1, 'images/apps/thumbnails/7littlewords.png'),
(19, 'FillIn', 'http://localhost/ScrambledShapes/indexshapes.html', 'Fill In', 'This is FillIn game', 0, 0, 0, 0, 'Alieu', 1, 'ScrambledShapes/indexshapes.html', 1, 'images/apps/thumbnails/fillIn.png'),
(20, 'Jumble', 'http://localhost/Wordoku/index.php', 'Jumble', 'This is Jumble game', 0, 0, 0, 0, 'Babatunde', 1, 'Wordoku/index.php', 1, 'images/apps/thumbnails/jumble.png'),
(21, 'Pick n Assemble (PAW)', 'http://localhost/Crossword/index.php', 'Pick n Assemble', 'This is Pick and Assemble game', 0, 0, 0, 0, 'Siva', 1, 'Crossword/index.php', 1, 'images/apps/thumbnails/picknassemble.png'),
(22, 'Word Ladder', 'http://localhost/WordFind/index.html', 'Word Ladder', 'This is Word Ladder game', 0, 0, 0, 0, 'Babatunde', 1, 'WordFind/index.html', 1, 'images/apps/thumbnails/wordLadder.png'),
(23, 'Quiz Master', 'http://localhost/Crossword/index.php', 'Quiz Master', 'This is Quiz Master game', 0, 0, 0, 0, 'Alieu', 1, 'Crossword/index.php', 1, 'images/apps/thumbnails/quiz.jpeg'),
(24, 'Text Twist', 'http://localhost/ScrambledShapes/indexshapes.html', 'Text Twist', 'This is Text Twist game', 0, 0, 0, 0, 'Babatunde', 1, 'ScrambledShapes/indexshapes.html', 1, 'images/apps/thumbnails/textTwist.png'),
(25, 'Rank By X', 'http://localhost/bingo/Bingo.php', 'Rank By X', 'This is Rank By X game', 0, 0, 0, 0, 'Alieu', 1, 'bingo/Bingo.php', 1, 'images/apps/thumbnails/RankByX.png'),
(26, 'Dabble Old', 'http://llocalhost/Dabble/index.php', 'Old Dabble', 'This is Old Dabble game', 0, 0, 0, 0, 'Babatunde', 1, 'Dabble/index.php', 1, 'images/apps/thumbnails/dabble.png');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(50) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_description` varchar(100) NOT NULL,
  `book_authorID` int(50) NOT NULL,
  `book_frontCover` varchar(50) NOT NULL,
  `book_backCover` varchar(50) NOT NULL,
  `book_notes` varchar(50) NOT NULL,
  `book_keywords` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_description`, `book_authorID`, `book_frontCover`, `book_backCover`, `book_notes`, `book_keywords`) VALUES
(1, 'Dinosaur Before Dark', 'While walking in the woods close to their home in Frog Creek, Pennsylvania, siblings Jack and Annie ', 123, 'book1/book1_frontCover.jpeg', 'book1/book1_backCover.jpg', 'test01', 'test01'),
(2, 'Fellowship Of The Ring', 'The future of civilization rests in the fate of the One Ring, which has been lost for centuries. Pow', 123, 'book2/book2_frontCover.jpg', 'book2/book2_backCover.jpg', 'test02', 'test02'),
(3, 'Dinosaur Before Dark', 'While walking in the woods close to their home in Frog Creek, Pennsylvania, siblings Jack and Annie ', 123, 'book1/book1_frontCover.jpeg', 'book1/book1_backCover.jpg', 'test01', 'test01'),
(4, 'Dinosaur Before Dark', 'While walking in the woods close to their home in Frog Creek, Pennsylvania, siblings Jack and Annie ', 123, 'book1/book1_frontCover.jpeg', 'book1/book1_backCover.jpg', 'test01', 'test01');

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
(3, 'books_per_row', '2', NULL),
(4, 'books_to_show', '4', NULL),
(5, 'app_height', '500', NULL),
(6, 'app_width', '200', NULL),
(7, 'apps_per_row', '5', NULL),
(8, 'apps_to_show', '24', NULL),
(9, 'puzzle_height', '200', NULL),
(10, 'puzzle_width', '200', NULL),
(11, 'puzzles_per_row', '4', NULL),
(12, 'puzzles_to_show', '10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `puzzles`
--

CREATE TABLE `puzzles` (
  `id` int(20) UNSIGNED NOT NULL,
  `app_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `sub_title` varchar(100) DEFAULT NULL,
  `directions` mediumblob DEFAULT NULL,
  `puzzle_image` varchar(250) DEFAULT NULL,
  `solution_image` varchar(250) DEFAULT NULL,
  `notes` blob DEFAULT NULL,
  `keywords` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `puzzles`
--

INSERT INTO `puzzles` (`id`, `app_id`, `author_id`, `title`, `sub_title`, `directions`, `puzzle_image`, `solution_image`, `notes`, `keywords`) VALUES
(1, 1, 1, 'Dabbles Puzzle 1', 'A great dabble', 0x596f75206a75737420646162626c65206974, 'images/apps/thumbnails/dabble.png', 'images/apps/thumbnails/dabble.png', 0x446162626c65206e6f746573, 'dabble');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` enum('SUPER_ADMIN','ADMIN','USER') NOT NULL DEFAULT 'USER',
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `creatorAccessId` int(11) NOT NULL,
  `expires` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `first_name`, `last_name`, `token`, `creatorAccessId`, `expires`) VALUES
(1, 'admin@admin.admin', '$2y$10$WQtaA4BvivKovbQlVyTL0eUWDwZnrEvx.6S..cQwaz5CER7QuIB1e', 'ADMIN', 'Best Admin', NULL, 'qVxccmMuRaVIteUu', 0, 1505827754),
(2, 'siva@jasthi.com', '$2y$10$6WJhLi8VkaKuO6dBob8zleY29E2AD1rLy1PDz64JMyi4J2atzy1C.', 'SUPER_ADMIN', 'Siva', NULL, NULL, 8, 1502409121);

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
  ADD PRIMARY KEY (`book_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `puzzles`
--
ALTER TABLE `puzzles`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `puzzles`
--
ALTER TABLE `puzzles`
  ADD CONSTRAINT `fk_puzzles_app_id` FOREIGN KEY (`app_id`) REFERENCES `apps` (`id`),
  ADD CONSTRAINT `fk_puzzles_author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
