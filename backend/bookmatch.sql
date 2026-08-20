-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2026 at 01:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookmatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `bio`, `image`, `created_at`) VALUES
(1, 'Tessa Bailey', 'Bestselling author of contemporary and spicy romance.', NULL, '2026-08-20 06:51:19'),
(2, 'Becka Mack', 'Author of heartfelt, funny, and high-stakes sports romance.', NULL, '2026-08-20 06:51:19'),
(3, 'Elsie Silver', 'Writer of small-town and professional athlete romances.', NULL, '2026-08-20 06:51:19'),
(4, 'Rebecca Yarros', '#1 NYT bestselling author of the Empyrean fantasy series.', NULL, '2026-08-20 06:51:19'),
(5, 'Sarah J. Maas', 'Internationally acclaimed author of epic fantasy and romance.', NULL, '2026-08-20 06:51:19'),
(6, 'Holly Black', 'Master of modern YA and adult faerie fantasy.', NULL, '2026-08-20 06:51:19'),
(7, 'Freida McFadden', 'Practicing physician and bestselling psychological thriller author.', NULL, '2026-08-20 06:51:19'),
(8, 'Colleen Hoover', 'Bestselling author of emotional contemporary romance and fiction.', NULL, '2026-08-20 06:51:19'),
(9, 'Alex Michaelides', 'Master of psychological suspense and Greek tragedy-inspired mysteries.', NULL, '2026-08-20 06:51:19'),
(10, 'Emily Henry', 'Queen of witty, character-driven contemporary romance.', NULL, '2026-08-20 06:51:19'),
(11, 'Matt Haig', 'Bestselling author exploring life, mental health, and alternate universes.', NULL, '2026-08-20 06:51:19'),
(12, 'Madeline Miller', 'Renowned historical-fantasy author retelling classical myths.', NULL, '2026-08-20 06:51:19'),
(13, 'Andy Weir', 'Sci-fi author famous for high-stakes space survival stories.', NULL, '2026-08-20 06:51:19'),
(14, 'Adam Silvera', 'Award-winning author of emotional and speculative young adult fiction.', NULL, '2026-08-20 06:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `cover_image` varchar(500) DEFAULT NULL,
  `published_year` int(11) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `isbn` varchar(30) DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT 0.00,
  `rating_count` int(11) DEFAULT 0,
  `is_featured` tinyint(1) DEFAULT 0,
  `is_trending` tinyint(1) DEFAULT 0,
  `is_new` tinyint(1) DEFAULT 0,
  `is_archived` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `primary_genre` varchar(100) DEFAULT 'Romance',
  `subgenre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `description`, `cover_image`, `published_year`, `pages`, `isbn`, `rating`, `rating_count`, `is_featured`, `is_trending`, `is_new`, `is_archived`, `created_at`, `primary_genre`, `subgenre`) VALUES
(1, 'My Killer Vacation', 1, 'A thrilling romance set against a backdrop of mystery.', 'My killer vacation.jpg', 2022, 380, NULL, 4.20, 410, 1, 0, 0, 0, '2026-08-20 06:51:19', 'Romance', 'Contemporary Romance'),
(2, 'Consider Me', 2, 'A grumpy hockey player falls hard for the sunshine girl next door.', 'Consider me.jpg', 2022, 412, NULL, 4.50, 830, 1, 0, 0, 0, '2026-08-20 06:51:19', 'Romance', 'Sports Romance'),
(3, 'Play With Me', 2, 'Playful banter turns into real sparks on and off the ice.', 'Play with me.jpg', 2023, 430, NULL, 4.40, 750, 0, 1, 0, 0, '2026-08-20 06:51:19', 'Romance', 'Sports Romance'),
(4, 'Unravel Me', 2, 'An emotional journey of love, healing, and high stakes.', 'Unravel me.jpg', 2023, 410, NULL, 4.60, 920, 1, 1, 0, 0, '2026-08-20 06:51:19', 'Romance', 'Sports Romance'),
(5, 'Fall With Me', 2, 'A slow-burn romance full of tension and heartfelt chemistry.', 'Fall with me.jpg', 2023, 445, NULL, 4.50, 680, 0, 0, 1, 0, '2026-08-20 06:51:19', 'Romance', 'Sports Romance'),
(6, 'Breathe With Me', 2, 'The ultimate comforting sports romance conclusion.', 'Breathe with me.jpg', 2023, 460, NULL, 4.70, 1100, 1, 1, 1, 0, '2026-08-20 06:51:19', 'Romance', 'Sports Romance'),
(7, 'Flawless', 3, 'Small-town romance meets a rugged bull rider with a heart of gold.', 'Flawless.jpg', 2021, 376, NULL, 4.40, 1250, 0, 1, 0, 0, '2026-08-20 06:51:19', 'Romance', 'Contemporary Romance'),
(8, 'Heartless', 3, 'A grumpy rancher and a city girl find unexpected love in the country.', 'Heartless.jpg', 2022, 392, NULL, 4.60, 2100, 1, 1, 0, 0, '2026-08-20 06:51:19', 'Romance', 'Contemporary Romance'),
(9, 'Powerless', 3, 'High-stakes romance and undeniable professional athlete chemistry.', 'Powerless.jpg', 2023, 450, NULL, 4.30, 950, 0, 0, 1, 0, '2026-08-20 06:51:19', 'Romance', 'Contemporary Romance'),
(10, 'Reckless', 3, 'Daring choices and deep emotional stakes in a cozy small town.', 'Reckless.jpg', 2023, 415, NULL, 4.50, 1020, 0, 1, 0, 0, '2026-08-20 06:51:19', 'Romance', 'Contemporary Romance'),
(101, 'Fourth Wing', 4, 'Enter the brutal and elite war college for dragon riders.', 'Fourth Wing.jpeg', 2023, 528, NULL, 4.80, 15400, 1, 1, 1, 0, '2026-08-20 06:51:19', 'Romantasy', 'Fantasy Romance'),
(102, 'Iron Flame', 4, 'The explosive, action-packed sequel to Fourth Wing.', 'Iron flame.jpg', 2023, 623, NULL, 4.60, 9200, 1, 1, 1, 0, '2026-08-20 06:51:19', 'Romantasy', 'Fantasy Romance'),
(103, 'A Court of Thorns and Roses', 5, 'A huntress enters a magical, dangerous faerie realm and changes her destiny.', 'A court of thorns & roses.jpg', 2015, 419, NULL, 4.70, 14200, 1, 1, 0, 0, '2026-08-20 06:51:19', 'Romantasy', 'Fantasy Romance'),
(104, 'House of Earth and Blood', 5, 'Urban fantasy full of magic, murder, and high-stakes mystery.', 'House of earth & blood.jpg', 2020, 800, NULL, 4.50, 6100, 0, 1, 0, 0, '2026-08-20 06:51:19', 'Romantasy', 'Fantasy Romance'),
(105, 'The Cruel Prince', 6, 'A mortal girl navigates the treacherous, deceitful politics of Faerie court.', 'The cruel prince.jpg', 2018, 370, NULL, 4.20, 3100, 0, 0, 0, 0, '2026-08-20 06:51:19', 'Romantasy', 'Fantasy Romance'),
(201, 'The Housemaid', 7, 'A dark psychological thriller full of twists you won’t see coming.', 'The housemaid.jpg', 2022, 336, NULL, 4.50, 6100, 1, 1, 0, 0, '2026-08-20 06:51:19', 'Thriller', 'Domestic Thriller'),
(202, 'Verity', 8, 'A gripping romantic thriller that will stay with you long after the final page.', 'Verity.jpg', 2018, 333, NULL, 4.60, 11200, 1, 1, 0, 0, '2026-08-20 06:51:19', 'Thriller', 'Psychological Thriller'),
(203, 'The Silent Patient', 9, 'A woman shoots her husband and then never speaks another word.', 'The silent patient.jpg', 2019, 336, NULL, 4.40, 8900, 0, 1, 0, 0, '2026-08-20 06:51:19', 'Thriller', 'Psychological Thriller'),
(301, 'Book Lovers', 10, 'Two city slickers, a small town, and a whole lot of sharp literary banter.', 'Book lovers.jpg', 2020, 377, NULL, 4.50, 4300, 1, 0, 0, 0, '2026-08-20 06:51:19', 'Romance', 'Contemporary Romance'),
(302, 'Beach Read', 10, 'Opposites attract in this witty take on writing, grief, and romance.', 'Beach read.jpg', 2019, 361, NULL, 4.30, 3800, 0, 1, 0, 0, '2026-08-20 06:51:19', 'Romance', 'Contemporary Romance'),
(401, 'It Ends with Us', 8, 'A poignant, emotional tale of resilient love and difficult choices.', 'it_ends_with_us.jpg', 2016, 376, NULL, 4.10, 5400, 1, 1, 0, 0, '2026-08-20 06:51:19', 'Romance', NULL),
(501, 'The Song of Achilles', 12, 'Greece in the age of heroes—a tale of love, war, and destiny.', 'song_of_achilles.jpg', 2011, 416, NULL, 4.40, 4800, 1, 0, 0, 0, '2026-08-20 06:51:19', 'Romance', NULL),
(601, 'Project Hail Mary', 13, 'A lone astronaut must save humanity from an extinction-level threat.', 'project_hail_mary.jpg', 2021, 496, NULL, 4.70, 7200, 1, 1, 0, 0, '2026-08-20 06:51:19', 'Romance', NULL),
(602, 'The Midnight Library', 11, 'Between life and death there is a library filled with alternate life choices.', 'The Midnight Library.jpg', 2020, 288, NULL, 4.80, 12430, 1, 0, 0, 0, '2026-08-20 06:51:19', 'Romance', NULL),
(701, 'The Whispering Tide', 11, 'A coastal town holds its breath as forgotten secrets begin to surface.', 'whispering_tide.jpg', 2019, 310, NULL, 3.40, 120, 0, 0, 0, 1, '2026-08-20 06:51:19', 'Romance', NULL),
(702, 'Letters Never Sent', 8, 'A collection of unspent letters that trace a love story through unspoken words.', 'letters_never_sent.jpg', 2021, 245, NULL, 2.90, 85, 0, 0, 0, 1, '2026-08-20 06:51:19', 'Romance', NULL),
(703, 'Ashfall', 2, 'When ash falls like snow, survival is only the beginning of the story.', 'ashfall.jpg', 2018, 400, NULL, 2.30, 95, 0, 0, 0, 1, '2026-08-20 06:51:19', 'Romance', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_genres`
--

CREATE TABLE `book_genres` (
  `book_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_genres`
--

INSERT INTO `book_genres` (`book_id`, `genre_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(101, 3),
(102, 3),
(103, 3),
(104, 3),
(105, 3),
(201, 4),
(202, 4),
(203, 4),
(301, 1),
(302, 1),
(401, 1),
(501, 3),
(601, 5),
(602, 1),
(701, 4),
(702, 1),
(703, 2);

-- --------------------------------------------------------

--
-- Table structure for table `book_moods`
--

CREATE TABLE `book_moods` (
  `book_id` int(11) NOT NULL,
  `mood_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community_comments`
--

CREATE TABLE `community_comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community_likes`
--

CREATE TABLE `community_likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community_posts`
--

CREATE TABLE `community_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `description`, `image`) VALUES
(1, 'Contemporary Romance', 'Modern love stories and emotional journeys.', NULL),
(2, 'Sports Romance', 'Romances featuring athletes, team dynamics, and competitive grit.', NULL),
(3, 'Romantasy', 'A blend of romance and fantastical world-building.', NULL),
(4, 'Thriller', 'Suspenseful, twist-filled mysteries and psychological thrillers.', NULL),
(5, 'Sci-Fi', 'Space travel, futuristic technology, and survival.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hidden_library`
--

CREATE TABLE `hidden_library` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `hidden_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moods`
--

CREATE TABLE `moods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `quiz_type` varchar(50) NOT NULL,
  `question_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_type`, `question_text`) VALUES
(1, 'next-read', 'What is your preferred setting for a novel?'),
(2, 'next-read', 'How do you like your stories to end?'),
(3, 'next-read', 'Choose a pacing style that fits you best.'),
(4, 'next-read', 'What role should romance play in your next book?'),
(5, 'next-read', 'Are you in the mood for fiction or non-fiction?'),
(6, 'next-read', 'Do you prefer standalone books or long series?'),
(7, 'next-read', 'What is your favorite narrative perspective?'),
(8, 'next-read', 'How dark or lighthearted do you want the plot to be?'),
(9, 'next-read', 'Do you enjoy historical backdrops?'),
(10, 'next-read', 'Are you looking for a plot twist heavy book?'),
(11, 'personality', 'You find yourself with a free weekend. What do you do?'),
(12, 'personality', 'How do you approach making major decisions?'),
(13, 'personality', 'What motivates you the most in daily life?'),
(14, 'personality', 'Choose an element that speaks to your soul.'),
(15, 'personality', 'How do friends describe your energy?'),
(16, 'personality', 'What kind of environments drain you the most?'),
(17, 'personality', 'How do you handle unexpected changes?'),
(18, 'personality', 'What is your ideal vacation destination?'),
(19, 'personality', 'Which core value matters most to you?'),
(20, 'personality', 'How do you prefer to solve complex problems?'),
(21, 'personality', 'What type of art moves you the most?'),
(22, 'personality', 'How do you view the concept of destiny?'),
(23, 'genre', 'Which emotional reaction do you seek most from a book?'),
(24, 'genre', 'How do you feel about magic or supernatural elements?'),
(25, 'genre', 'Do you like real-world historical contexts?'),
(26, 'genre', 'Are you fascinated by science and future tech?'),
(27, 'genre', 'Do you prefer fast-paced action or slow-burn character studies?'),
(28, 'genre', 'How do you feel about political intrigue in stories?'),
(29, 'genre', 'Do you enjoy suspense and guessing the villain?'),
(30, 'genre', 'Would you read a biography of a real historical figure?'),
(31, 'genre', 'Do you like humor embedded in your stories?'),
(32, 'genre', 'What cover art style catches your eye first?'),
(33, 'mood', 'How is your energy level right now?'),
(34, 'mood', 'What kind of weather matches your inner feeling?'),
(35, 'mood', 'Do you want comfort or a challenge?'),
(36, 'mood', 'Are you looking for an escape from reality?'),
(37, 'mood', 'How much emotional weight can you handle right now?'),
(38, 'mood', 'Do you want something nostalgic or totally fresh?'),
(39, 'mood', 'Are you seeking inspiration or pure entertainment?'),
(40, 'mood', 'What background sound fits your reading moment?');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_text` varchar(500) NOT NULL,
  `result_key` varchar(100) NOT NULL,
  `answer_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `question_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `quiz_id`, `question_text`, `question_order`) VALUES
(241, 1, 'What is your preferred pacing for a story?', 1),
(242, 1, 'How do you like your books to end?', 2),
(243, 1, 'What primary setting draws you in the most?', 3),
(244, 1, 'Which character dynamic do you enjoy following?', 4),
(245, 1, 'How long do you prefer your books to be?', 5),
(246, 1, 'What kind of emotional impact are you looking for?', 6),
(247, 1, 'Do you prefer standalone books or long series?', 7),
(248, 1, 'How do you feel about plot twists?', 8),
(249, 1, 'Which storytelling perspective do you prefer?', 9),
(250, 1, 'What is your go-to format?', 10),
(251, 2, 'When do you typically read the most?', 1),
(252, 2, 'How do you choose your next book?', 2),
(253, 2, 'What do you do if a book gets boring 50 pages in?', 3),
(254, 2, 'How do you treat your physical books?', 4),
(255, 2, 'What is your stance on movie adaptations of books you love?', 5),
(256, 2, 'How many books do you aim to read in a year?', 6),
(257, 2, 'What is your favorite place to read?', 7),
(258, 2, 'How do you track your reading goals?', 8),
(259, 2, 'What kind of reader are you regarding genres?', 9),
(260, 2, 'How do you react to a heartbreaking plot twist?', 10),
(261, 2, 'What motivates you to finish a challenging book?', 11),
(262, 2, 'What do your bookshelves look like?', 12),
(263, 3, 'If you could instantly travel anywhere, where would you go?', 1),
(264, 3, 'What kind of movies or TV shows do you binge-watch?', 2),
(265, 3, 'How do you feel about magic or futuristic technology in stories?', 3),
(266, 3, 'What historical era fascinates you the most?', 4),
(267, 3, 'What kind of conflict excites you most in a story?', 5),
(268, 3, 'How important is a romantic subplot to you?', 6),
(269, 3, 'What type of protagonist do you root for?', 7),
(270, 3, 'How do you feel about dark or gritty themes?', 8),
(271, 3, 'What pace keeps you turning pages late into the night?', 9),
(272, 3, 'What real-world topic could you read about for hours?', 10),
(273, 4, 'How are you feeling right now?', 1),
(274, 4, 'What kind of energy level do you have for reading today?', 2),
(275, 4, 'Do you want a book that offers an escape or reflects reality?', 3),
(276, 4, 'How heavy or deep do you want the themes to be?', 4),
(277, 4, 'Do you want a book that makes you laugh or makes you think?', 5),
(278, 4, 'Are you looking for something fast-paced or slow and cozy?', 6),
(279, 4, 'Do you want familiar tropes or something completely unpredictable?', 7),
(280, 4, 'How do you want to feel when you close the back cover?', 8);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `result_key` varchar(100) NOT NULL,
  `completed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_user_answers`
--

CREATE TABLE `quiz_user_answers` (
  `id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reading_list`
--

CREATE TABLE `reading_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` enum('want_to_read','currently_reading','finished') DEFAULT 'want_to_read',
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `finished_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `review_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `profile_image` varchar(500) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `is_archived` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD PRIMARY KEY (`book_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `book_moods`
--
ALTER TABLE `book_moods`
  ADD PRIMARY KEY (`book_id`,`mood_id`),
  ADD KEY `mood_id` (`mood_id`);

--
-- Indexes for table `community_comments`
--
ALTER TABLE `community_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `community_likes`
--
ALTER TABLE `community_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`post_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `community_posts`
--
ALTER TABLE `community_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `hidden_library`
--
ALTER TABLE `hidden_library`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `moods`
--
ALTER TABLE `moods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz_user_answers`
--
ALTER TABLE `quiz_user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_id` (`result_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- Indexes for table `reading_list`
--
ALTER TABLE `reading_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=704;

--
-- AUTO_INCREMENT for table `community_comments`
--
ALTER TABLE `community_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community_likes`
--
ALTER TABLE `community_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community_posts`
--
ALTER TABLE `community_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hidden_library`
--
ALTER TABLE `hidden_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moods`
--
ALTER TABLE `moods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_user_answers`
--
ALTER TABLE `quiz_user_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reading_list`
--
ALTER TABLE `reading_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD CONSTRAINT `book_genres_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_moods`
--
ALTER TABLE `book_moods`
  ADD CONSTRAINT `book_moods_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_moods_ibfk_2` FOREIGN KEY (`mood_id`) REFERENCES `moods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `community_comments`
--
ALTER TABLE `community_comments`
  ADD CONSTRAINT `community_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `community_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `community_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `community_likes`
--
ALTER TABLE `community_likes`
  ADD CONSTRAINT `community_likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `community_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `community_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `community_posts`
--
ALTER TABLE `community_posts`
  ADD CONSTRAINT `community_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hidden_library`
--
ALTER TABLE `hidden_library`
  ADD CONSTRAINT `hidden_library_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hidden_library_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD CONSTRAINT `quiz_answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `quiz_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `quiz_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_results_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_user_answers`
--
ALTER TABLE `quiz_user_answers`
  ADD CONSTRAINT `quiz_user_answers_ibfk_1` FOREIGN KEY (`result_id`) REFERENCES `quiz_results` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_user_answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `quiz_questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_user_answers_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `quiz_answers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reading_list`
--
ALTER TABLE `reading_list`
  ADD CONSTRAINT `reading_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reading_list_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
