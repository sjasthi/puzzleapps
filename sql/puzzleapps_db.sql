-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 04:05 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `puzzleapps_db`
--

CREATE TABLE `users` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `email` varchar(128) NOT NULL UNIQUE,
     `password` varchar(500) NOT NULL,
     `role` enum('SUPER_ADMIN', 'ADMIN', 'USER') NOT NULL DEFAULT 'USER',
     `first_name` varchar(128),
     `last_name` varchar(128),
     `token` varchar(500) DEFAULT NULL,
     `creatorAccessId` int(11) NOT NULL,
     `expires` bigint(20) DEFAULT NULL,
     PRIMARY KEY (id),
     UNIQUE KEY (email)
) AUTO_INCREMENT=3 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `email`, `creatorAccessId`, `password`, `role`, `first_name`, `token`, `expires`) VALUES
(1, 'admin@admin.admin', 0, '$2y$10$WQtaA4BvivKovbQlVyTL0eUWDwZnrEvx.6S..cQwaz5CER7QuIB1e', 'ADMIN', 'Best Admin', 'qVxccmMuRaVIteUu', 1505827754),
(2, 'siva@jasthi.com', 8, '$2y$10$6WJhLi8VkaKuO6dBob8zleY29E2AD1rLy1PDz64JMyi4J2atzy1C.', 'SUPER_ADMIN', 'Siva', NULL, 1502409121);

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preference_name` varchar(500) NOT NULL,
  `preference_value` varchar(500) NOT NULL,
  `comments` varchar(1000),
  PRIMARY KEY (id)
) AUTO_INCREMENT=4 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `preferences` (`id`, `preference_name`, `preference_value`) VALUES
(3, 'puzzlesPerPage', '8');


CREATE TABLE `apps` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `icon` varchar(250) DEFAULT NULL,
  PRIMARY KEY (id)
) AUTO_INCREMENT=27 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `apps` (`id`, `name`, `description`, `path`, `notes`, `inputFromDB`, `inputFromUI`, `outputToDB`, `outputToUI`, `developer`, `status`, `token`, `playable`, `icon`) VALUES
(1, 'Dabble (Pyramids)', 'Pyramids Dabble Puzzle', 'http://localhost/Dabble/index.php', 'This is Dabble game.', 0, 0, 0, 0, 'Babatunde', 1, 'Dabble/index.php', 1, 'images/apps/thumbnails/dabble.png'),
(2, 'Scrambler', 'Scrambler Puzzle', 'http://localhost/Scrambler/index.php', 'This is Scrambler game', 0, 0, 0, 0, 'Babatunde', 1, 'Scrambler/index.php', 1, 'images/apps/thumbnails/scrambler.jpeg'),
(3, 'Rebus', 'Rebus Puzzle', 'http://localhost/Rebus/index.php', 'This is Rebus game', 0, 0, 0, 0, 'Babatunde', 1, 'Rebus/index.php', 1, 'images/apps/thumbnails/rebus.png'),
(4, 'Word Find', 'Word Find', 'http://localhost/WordFind/index.html', 'This is Word_Find game', 0, 0, 0, 0, 'Siva', 1, 'WordFind/index.html', 1, 'images/apps/thumbnails/wordFind.png'),
(5, 'Wordoku', 'Wordoku Puzzle', 'http://localhost/Wordoku/index.php', 'This is Wordoku game', 0, 0, 0, 0, 'Stephen', 1, 'Wordoku/index.php', 1, 'images/apps/thumbnails/wordoku.png'),
(6, 'CrossWord (Fill-in)', 'Crossword Fill-in', 'http://localhost/Crossword/index.php', 'This is CrossWord Fill-in game', 0, 0, 0, 0, 'Stephen', 1, 'Crossword/index.php', 1, 'images/apps/thumbnails/join.jpeg'),
(7, 'CrossWord (Classic)', 'Crossword Classic', 'http://localhost/Crossword/index.php', 'This is CrossWord Classic game', 0, 0, 0, 0, 'Babatunde', 1, 'Crossword/index.php', 1, 'images/apps/thumbnails/join.jpeg'),
(8, 'CrossWord (Skeleton)', 'Crossword Skeleton', 'http://localhost/Crossword/index.php', 'This is CrossWord Skeleton game', 0, 0, 0, 0, 'Babatunde', 1, 'Crossword/index.php', 1, 'images/apps/thumbnails/join.jpeg'),
(9, 'Scrambled Shapes', 'Scrambled Shapes', 'http://localhost/ScrambledShapes/indexshapes.html', 'This is Scrambled Shapes game', 0, 0, 0, 0, 'Siva', 1, 'ScrambledShapes/indexshapes.html', 1, 'images/apps/thumbnails/ScrambledShapes.png'),
(10, 'Bingo', 'Bingo Puzzle', 'http://localhost/bingo/Bingo.php', 'This is Bingo game', 0, 0, 0, 0, 'Siva', 1, 'bingo/Bingo.php', 1, 'images/apps/thumbnails/bingo.png'),
(11, 'Word Match', 'Word Match', 'http://localhost/Word_Match/index.html', 'This is Word Match game', 0, 0, 0, 0, 'Siva', 1, 'Word_Match/index.html', 1, 'images/apps/thumbnails/wordMatch.png'),
(12, '4Pics1Word', '4 Pics 1 Word', 'http://localhost/Rebus/index.php', 'This is 4 Pics 1 Word game', 0, 0, 0, 0, 'Siva', 1, 'Rebus/index.php', 1, 'images/apps/thumbnails/4pic1word.png'),
(13, 'Whats the Name', 'What is the Name', 'http://localhost/Whats/index.php', 'This is Name in Synonyms game', 0, 0, 0, 0, 'Siva', 1, 'Whats/index.php', 1, 'images/apps/thumbnails/whats.png'),
(14, 'Quote Scrambler', 'Quote Scrambler', 'http://localhost/QSFL/Index.php', 'This is Quote Scrambler game', 0, 0, 0, 0, 'Siva', 1, 'QSFL/Index.php', 1, 'images/apps/thumbnails/FindTheWords.GIF'),
(15, 'Text Analyzer', 'Text Analyzer', 'http://localhost/IndicTextAnalyzer/index.html', 'This is Text Analyzer game', 0, 0, 0, 0, 'Siva', 1, 'IndicTextAnalyzer/index.html', 1, 'images/apps/thumbnails/IndicTextAnalyzer.png'),
(16, 'Is it a Pair', 'Is it a Pair', 'http://localhost/TestingLanguages/Index.html', 'This is Is it a Pair game', 0, 0, 0, 0, 'Siva', 1, 'TestingLanguages1/Index.html', 1, 'images/apps/thumbnails/Test.png'),
(17, 'Drop Quote', 'Drop Quote', 'http://localhost/QSFL/Index.php', 'This is Drop Quote game', 0, 0, 0, 0, 'Siva', 1, 'QSFL/Index.php', 1, 'images/apps/thumbnails/FindTheWords.GIF'),
(18, '7 little words', '7 little words', 'http://localhost/Wordoku/index.php', 'This is 7 Little Words game', 0, 0, 0, 0, 'Alieu', 1, 'Wordoku/index.php', 1, 'images/apps/thumbnails/7littlewords.png'),
(19, 'FillIn', 'Fill In', 'http://localhost/ScrambledShapes/indexshapes.html', 'This is FillIn game', 0, 0, 0, 0, 'Alieu', 1, 'ScrambledShapes/indexshapes.html', 1, 'images/apps/thumbnails/fillIn.png'),
(20, 'Jumble', 'Jumble', 'http://localhost/Wordoku/index.php', 'This is Jumble game', 0, 0, 0, 0, 'Babatunde', 1, 'Wordoku/index.php', 1, 'images/apps/thumbnails/jumble.png'),
(21, 'Pick n Assemble (PAW)', 'Pick n Assemble', 'http://localhost/Crossword/index.php', 'This is Pick and Assemble game', 0, 0, 0, 0, 'Siva', 1, 'Crossword/index.php', 1, 'images/apps/thumbnails/picknassemble.png'),
(22, 'Word Ladder', 'Word Ladder', 'http://localhost/WordFind/index.html', 'This is Word Ladder game', 0, 0, 0, 0, 'Babatunde', 1, 'WordFind/index.html', 1, 'images/apps/thumbnails/wordLadder.png'),
(23, 'Quiz Master', 'Quiz Master', 'http://localhost/Crossword/index.php', 'This is Quiz Master game', 0, 0, 0, 0, 'Alieu', 1, 'Crossword/index.php', 1, 'images/apps/thumbnails/quiz.jpeg'),
(24, 'Text Twist', 'Text Twist', 'http://localhost/ScrambledShapes/indexshapes.html', 'This is Text Twist game', 0, 0, 0, 0, 'Babatunde', 1, 'ScrambledShapes/indexshapes.html', 1, 'images/apps/thumbnails/textTwist.png'),
(25, 'Rank By X', 'Rank By X', 'http://localhost/bingo/Bingo.php', 'This is Rank By X game', 0, 0, 0, 0, 'Alieu', 1, 'bingo/Bingo.php', 1, 'images/apps/thumbnails/RankByX.png'),
(26, 'Dabble Old', 'Old Dabble', 'http://llocalhost/Dabble/index.php', 'This is Old Dabble game', 0, 0, 0, 0, 'Babatunde', 1, 'Dabble/index.php', 1, 'images/apps/thumbnails/dabble.png');

CREATE TABLE `puzzles` (
    `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `app_id` int(11) UNSIGNED,
    `author_id` int(11) NOT NULL,
    `title` varchar(50) NOT NULL,
    `sub_title` varchar(100),
    `directions` mediumblob,
    `puzzle_image` varchar(250),
    `solution_image` varchar(250),
    `notes` blob,
    `keywords` varchar(1000),
    PRIMARY KEY (id),
    CONSTRAINT `fk_puzzles_app_id`
        FOREIGN KEY (app_id) REFERENCES apps (id)
       ON DELETE RESTRICT,
    CONSTRAINT `fk_puzzles_author_id`
        FOREIGN KEY (author_id) REFERENCES users (id)
       ON DELETE RESTRICT
) AUTO_INCREMENT=2 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `puzzles` (`id`, `app_id`, `author_id`, `title`, `sub_title`, `directions`, `puzzle_image`, `solution_image`, `notes`, `keywords`) VALUES
(1, 1, 1, 'Dabbles Puzzle 1', 'A great dabble', 'You just dabble it', 'images/apps/thumbnails/dabble.png', 'images/apps/thumbnails/dabble.png', 'Dabble notes', 'dabble');

CREATE TABLE `books` (
    `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `author_id` int(11) NOT NULL,
    `name` varchar(100),
    `description` varchar(1000),
    `front_cover` varchar(500),
    `back_cover` varchar(500),
    `notes` varchar(1000),
    `keywords` varchar(1000),
    PRIMARY KEY (id),
    CONSTRAINT `fk_books_author_id`
        FOREIGN KEY (author_id) REFERENCES users (id)
        ON DELETE RESTRICT
) AUTO_INCREMENT=2 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `books` (`id`, `author_id`, `name`, `description`, `front_cover`, `back_cover`, `notes`, `keywords`) VALUES
(1, 1, 'Book Name', 'Such a good puzzle book', 'images/apps/thumbnails/dabble.png', 'images/apps/thumbnails/dabble.png', 'Book notes', 'book');