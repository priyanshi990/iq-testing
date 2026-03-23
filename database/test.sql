-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2025 at 04:57 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(102, 'shivani', 'shivi1217@gmail.com', 'shi145');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `selected_answer` varchar(255) NOT NULL,
  `answer_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `test_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `user_id`, `question_id`, `selected_answer`, `answer_time`, `test_type`) VALUES
(535, 21, 11, '42', '2025-03-14 18:16:46', 'Mathematics'),
(536, 21, 16, '463', '2025-03-14 18:16:46', 'Mathematics'),
(537, 21, 23, '64', '2025-03-14 18:16:46', 'Mathematics'),
(538, 21, 32, '105 km', '2025-03-14 18:16:46', 'Mathematics'),
(539, 21, 33, 'None, because you forgot you’re allergic to apples.', '2025-03-14 18:16:46', 'Mathematics'),
(545, 21, 5, '⬅️\r\n', '2025-03-14 18:20:52', 'Logical Reasoning'),
(546, 21, 9, '15', '2025-03-14 18:20:52', 'Logical Reasoning'),
(547, 21, 12, '10', '2025-03-14 18:20:52', 'Logical Reasoning'),
(548, 21, 15, '200', '2025-03-14 18:20:52', 'Logical Reasoning'),
(549, 21, 25, 'Blue', '2025-03-14 18:20:52', 'Logical Reasoning'),
(550, 21, 2, '4\r\n', '2025-03-14 18:59:15', 'Memory'),
(551, 21, 7, 'B', '2025-03-14 18:59:15', 'Memory'),
(552, 21, 20, 'Lamp', '2025-03-14 18:59:15', 'Memory'),
(553, 21, 21, '9', '2025-03-14 18:59:15', 'Memory'),
(554, 21, 22, 'Yellow\r\n', '2025-03-14 18:59:15', 'Memory'),
(555, 22, 11, '42', '2025-04-10 14:52:59', 'Mathematics'),
(556, 22, 16, '444', '2025-04-10 14:52:59', 'Mathematics'),
(557, 22, 23, '64', '2025-04-10 14:52:59', 'Mathematics'),
(558, 22, 32, '110 km', '2025-04-10 14:52:59', 'Mathematics'),
(559, 22, 33, '3', '2025-04-10 14:52:59', 'Mathematics'),
(560, 22, 5, '↗️\r\n', '2025-04-10 15:14:09', 'Logical Reasoning'),
(561, 22, 9, '30', '2025-04-10 15:14:09', 'Logical Reasoning'),
(562, 22, 10, 'febrary', '2025-04-10 15:14:09', 'Logical Reasoning'),
(563, 22, 12, '6', '2025-04-10 15:14:09', 'Logical Reasoning'),
(564, 22, 15, '250', '2025-04-10 15:14:09', 'Logical Reasoning'),
(565, 22, 2, '3\r\n', '2025-04-11 07:10:14', 'Memory'),
(566, 22, 7, 'C', '2025-04-11 07:10:14', 'Memory'),
(567, 22, 20, 'Lamp', '2025-04-11 07:10:14', 'Memory'),
(568, 22, 21, '5', '2025-04-11 07:10:14', 'Memory'),
(569, 22, 22, 'Green', '2025-04-11 07:10:14', 'Memory');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `full_name`, `email`, `message`, `created_at`) VALUES
(1, 'uma', 'uma2@gmail.com', 'it is very helpful platform that build IQ level and enhance the interest of test .', '2025-04-11 07:46:57'),
(3, 'bandana', 'ban@gmail.com', 'it is very helpful platform that build IQ level and enhance the interest of test .', '2025-04-11 07:48:29'),
(4, 'priya', 'p@gmail.com', 'thanks for build excellent and fabulous iQ testing platform', '2025-04-11 07:49:38'),
(6, 'animesh', 'a@gmail.com', 'thanks to give more beautiful IQ testing website and its helps more understanding and advanced questions .', '2025-04-11 08:03:41'),
(7, 'shiv', 'shivani@gmail.com', 'our message has been successfully sent.thanks. Your message should be between 50 and 500 characters.', '2025-04-11 08:28:08'),
(8, 'sanar', 'sanar@gmail.com', 'We greatly appreciate your interest in proskillmind! Your feedback, questions, and suggestions are highly valued, and we are committed to providing you with outstanding support and service.', '2025-04-11 09:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `free`
--

CREATE TABLE `free` (
  `first` char(20) DEFAULT NULL,
  `last` char(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `q1` varchar(200) DEFAULT NULL,
  `q2` varchar(200) DEFAULT NULL,
  `q3` varchar(200) DEFAULT NULL,
  `q4` varchar(200) DEFAULT NULL,
  `q5` varchar(200) DEFAULT NULL,
  `q6` varchar(200) DEFAULT NULL,
  `q7` varchar(200) DEFAULT NULL,
  `q8` varchar(200) DEFAULT NULL,
  `q9` varchar(200) DEFAULT NULL,
  `q10` varchar(200) DEFAULT NULL,
  `grade` char(5) DEFAULT NULL,
  `score` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `free`
--

INSERT INTO `free` (`first`, `last`, `email`, `password`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `grade`, `score`) VALUES
('meera', 'signh', 'meera56@gmail.com', 'meera56', '32', ' Pacific', 'Unknown', 'Rectangle', ' 9', ' 5 minutes', ' P', '  Nine', ' Nowhere', ' They’re all married', 'A', '90');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_no` int(11) NOT NULL,
  `q_text` mediumtext NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `op_a` varchar(255) DEFAULT NULL,
  `op_b` varchar(255) DEFAULT NULL,
  `op_c` varchar(255) DEFAULT NULL,
  `op_d` varchar(255) DEFAULT NULL,
  `correct_answer` varchar(255) DEFAULT NULL,
  `hint` varchar(50) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `test_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_no`, `q_text`, `image_path`, `op_a`, `op_b`, `op_c`, `op_d`, `correct_answer`, `hint`, `category`, `test_type`) VALUES
(1, 'Which shape completes the sequence?', 'http://localhost/proskillmind/images/q1.png.', '🔴', '🟢', '🔵', '🟡', '🔴', 'Notice the order of colors—it\'s repeating!', 'sequence', 'Quiz'),
(2, 'Spot the Difference!\r\nHow many differences are there between the two images?', 'http://localhost/proskillmind/images/q2.png.', '2\r\n\r\n', '3\r\n', '4\r\n', '5', '4', 'Look closely at each corner; the difference might ', 'Memory', 'Memory'),
(3, 'Complete the Pattern\r\nWhat shape should go in the missing spot?', 'http://localhost/proskillmind/images/q3.png', '🔺\r\n\r\n', '⚪\r\n\r\n \r\n', '🔶\r\n ', '🔲', '🔺', 'Follow the alternating pattern from the previous r', 'sequence', 'Quiz'),
(4, 'Odd One Out\r\nWhich shape is different?', 'http://localhost/proskillmind/images/q4.png', 'First\r\n', 'Third', 'Fifth\r\n', 'Last', 'Third', 'One of these things is not like the others!', 'sequence', 'Quiz'),
(5, 'Mirror Image Puzzle\r\n', 'http://localhost/proskillmind/images/q5.jpg', '➡️\r\n\r\n', '↗️\r\n', '⬅️\r\n', '↘️', '⬅️', 'Imagine flipping it as if it were reflected in a m', 'Logical Reasoning', 'Logical Reasoning'),
(6, 'Complete the sequence', 'http://localhost/proskillmind/images/q6.png', ' 🟥 🟩 🟦 🟨 🟥 🟩 🟦 🟨\r\n \r\n', '🟨 🟩 🟥 🟦 🟩 🟥 🟦\r\n \r\n', '🟩 🟦 🟨 🟥 🟩 🟥', '🟩🟥 🟩 🟦 🟦 🟨', '🟥 🟩 🟦 🟨 🟥 🟩 🟦 🟨', 'Follow the colors—it’s like a repeating rainbow.', 'sequence', 'Quiz'),
(7, 'Which Shadow Matches?', 'http://localhost/proskillmind/images/q7.png', 'A', 'B', 'C', 'D', 'B', 'Focus on the monkey\"s  feet.', 'Memory', 'Memory'),
(8, 'Odd One Out', 'http://localhost/proskillmind/images/q8.png', 'Pineapple\r\n', 'Broccoli\r\n', 'Chocolate chips', 'Extra cheese', 'Chocolate chips', 'One of these belongs more in a dessert than on a p', 'sequence', 'Quiz'),
(9, 'What is the angle between the hour and minute hands at 3:15?', '', '7.5', '15', '30', '45', '7.5', 'It’s not just on the quarter! The hour hand isn’t ', 'Logical Reasoning', 'Logical Reasoning'),
(10, 'A month has 31 days, but only one Monday, one Tuesday, one Wednesday, one Thursday, one Friday, one Saturday, and one Sunday. Which month is it?', '', 'none', 'january', 'febrary', 'december', 'none', 'Only if it exists in a puzzle world!', 'Logical Reasoning', 'Logical Reasoning'),
(11, 'In the sequence 2, 6, 12, 20, 30, what is the next number?', 'http://localhost/proskillmind/images/ql39.png', '40\r\n\r\n', '42', '50', '54', '42', 'It’s not just addition—there’s something “squared”', 'sequence', 'Mathematics'),
(12, 'Half of 8 plus a third of 12 gives you what?', '', '10', '12', '8', '6', '10', 'Break each part down; fractions are your friends!', 'Logical Reasoning', 'Logical Reasoning'),
(13, 'Alex is twice as old as Ben. In 10 years, the difference between their ages will be 10 years. How old is Alex now?', '', '10', '20', '30', '40', '20', 'Even age gaps like to stay the same!', 'Verbal Ability', 'Quiz'),
(15, 'Divide 100 by 0.5 and add 50. What’s the result?', '', '100', '200', '250', '450', '250', 'Dividing by 0.5 is not what it seems. Think multip', 'Logical Reasoning', 'Logical Reasoning'),
(16, 'In a code language, if “CAR” is written as “316”, what is the code for “DOG”?', '', '471', '463', '444', '482', '463', 'Each letter has a special place in the alphabet—fi', NULL, 'Mathematics'),
(18, 'A wolf, a goat, and a cabbage need to cross a river in a boat that holds only one item and the boatman. The wolf can’t be left with the goat, and the goat can’t be left with the cabbage. How can they all get across safely?', '', 'Boat the wolf, return, boat cabbage, return with wolf, boat goat, return, boat wolf', 'Boat the goat, return, boat cabbage, return with goat, boat wolf, return, boat goat', 'both of these', 'none of these', 'Boat the goat, return, boat cabbage, return with goat, boat wolf, return, boat goat', 'The trick is in the switching—send one back to avo', NULL, 'Quiz'),
(19, ' Look at this sequence for 10 seconds: ', 'http://localhost/proskillmind/images/ql3.png', 'Star\r\n\r\n', 'Square\r\n', 'Triangle\r\n', 'Pentagon', 'Square', 'Try to picture the shapes grouped in pairs.', NULL, 'Quiz'),
(20, 'Which of the following was NOT on the list?\r\n“apple, tree, book, shoe, car, window, star, chair.”', 'http://localhost/proskillmind/images/ql32.png', 'Car\r\n\r\n', 'Shoe\r\n', 'Star\r\n', 'Lamp', 'Lamp', 'Visualize the items you read, and imagine each in ', NULL, 'Memory'),
(21, 'You saw the sequence What number appeared most frequently?', 'http://localhost/proskillmind/images/ql37.png', '5', '9', '4', '2', '9', 'Think of a number that repeated noticeably.', NULL, 'Memory'),
(22, 'Remember this color sequence: Red, Blue, Green, Yellow, Orange. Which color appeared just before Orange?', 'http://localhost/proskillmind/images/ql34.png', 'Blue\r\n\r\n', 'Yellow\r\n', 'Red\r\n', 'Green', 'Yellow', 'Picture each color as it builds on the last one.', NULL, 'Memory'),
(23, 'How many smaller cubes are there in a 4x4x4 cube structure?', 'http://localhost/proskillmind/images/ql35.png', '16', '24', '64', '66', '64', 'Imagine each layer and multiply accordingly.', NULL, 'Mathematics'),
(24, 'If a paper with a 2D cross of six squares is folded into a cube, what would the opposite face of the center square be?', 'http://localhost/proskillmind/images/ql36.png\r\n', 'Square on the left\r\n\r\n', 'Square at the right', 'Square at the bottom', 'Square at the top', 'Square at the bottom', 'Fold the paper mentally to imagine the cube.', NULL, 'Quiz'),
(25, 'A cube with distinct colors on each face is rotated 90° clockwise. If the front face was blue and the top was red, what will the new top color be?', 'http://localhost/proskillmind/images/ql38.png', 'Green\r\n', 'Red\r\n', 'Yellow', 'Blue', 'Blue', 'Think of each face shifting according to the rotat', NULL, 'Logical Reasoning'),
(26, 'You’re at a party, and you don’t know anyone. What’s your move?', NULL, 'Find the food table and pretend you’re busy munching.', 'Introduce yourself to random people like you own the place.', 'Quietly observe until you find someone approachable.', 'Text your friend, \"Where are you?? 😰\"', 'Quietly observe until you find someone approachable.', 'Socializing is easier when you’re holding a plate ', 'Personality', 'MBTI'),
(27, 'Your friend asks for your opinion on their wild outfit. What do you say?', NULL, 'You’re rocking it! Confidence is key!', 'Hmm... Are you sure that’s... intentional?', 'I mean... it’s unique!', 'Looks great! (But silently hope they change later).', 'You’re rocking it! Confidence is key!', 'Compliments cost nothing, but they can save friend', 'Personality', 'MBTI'),
(28, 'You have a group project deadline tomorrow. What’s your approach?', NULL, 'Finish your part days in advance like a responsible adult.', 'Procrastinate, then panic-write at 3 AM.', 'Divide the work and constantly remind others to stay on track.', 'Show up and hope for the best.', 'Finish your part days in advance like a responsible person.', 'Group projects are 10% work, 90% praying your team', 'Personality', 'MBTI'),
(29, 'You find a stray cat on your way home. What do you do?', NULL, 'Bring it home and adopt it immediately.', 'Name it “Sir Whiskers” and give it life advice.', 'Ask around to see if anyone’s missing a cat.', 'Admire it from a distance... you’re not about that cat hair life.', 'Ask around to see if anyone’s missing a cat.', 'Every cat secretly believes they own you anyway. 🐾', 'Personality', 'MBTI'),
(30, 'Your crush finally texts you. What’s your response?', NULL, 'Type a message, delete it, type it again... repeat 5 times.', 'Send a GIF and hope for the best.', 'Overthink your punctuation for 20 minutes.', 'Forget to reply for 3 hours, then panic-text them back.', 'Send a GIF and hope for the best.', 'Emojis are your best friend. Just don’t overdo the', 'Personality', 'MBTI'),
(31, 'How do you react when you hear a weird noise at 3 AM?', NULL, 'Investigate bravely with a shoe in hand.', 'Hide under the blanket like it’s a force field.', 'Text someone: \"If I die, I love you.\"', 'Assume it’s just your imagination and go back to sleep.', 'Investigate bravely with a shoe in hand.', 'Monsters respect people who sleep through their no', 'Personality', 'MBTI'),
(32, 'If a train leaves Station A at 60 km/h and another train leaves Station B at 80 km/h towards each other, how far apart will they be after 45 minutes?', NULL, '100 km', '105 km', '110 km', '120 km', '105 km', 'Hint: They’re speeding towards each other faster t', 'Mathematics', 'Mathematics'),
(33, 'You have 5 apples. You give away 2, then eat 1. How many apples do you have left?', NULL, '2', '3', '4', 'None, because you forgot you’re allergic to apples.', '2', 'Hint: Apple math is easier than remembering your o', 'Mathematics', 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(5, 'shina', 'chawra', 'shina234@gmail.com', '$2y$10$wOOXPbYb32/WRSQxaBQQgekIlShSioX1mqyWRkVV1kV7wp0WWM//6', '2024-11-09 13:23:35', '2024-11-09 13:23:35'),
(6, 'tarun', 'jha', 'tarun345@gmail.com', '$2y$10$B10jYjUEiXXc7anCxcDNqOhDaFfcFXMiM3DrfayxeqoCEKdvLR9Ai', '2024-11-09 14:19:56', '2024-11-09 14:19:56'),
(7, 'shreya', 'singh', 'shreya345@gmail.com', '$2y$10$hFFTZvK3otPtk7phXK8lOuBiZB3K8pbBQpbxgqnUX4Mk77lH196f2', '2024-11-09 19:38:42', '2024-11-09 19:38:42'),
(9, 'kamal', 'kumar', 'kamal56@gmail.com', '$2y$10$Ryu876cab38CQppcEdgzsuqDGrP8M4fe6F/9LBcy9QucoNzOLYLL2', '2024-11-09 22:03:56', '2024-11-09 22:03:56'),
(10, 'angel', 'khanna', 'angel@gmail.com', '$2y$10$pbaB2h4ChTL.mk2hDh6dieS7pzLvOiPL43TK2RjF14/LWLVv75jMG', '2024-11-11 04:08:31', '2024-11-11 04:08:31'),
(12, 'sita', 'ram', 'ram@gmail.com', '$2y$10$pg.sFpvlG6b.O3eqcKW6POJfnlkn7KULbC9guS3UNzGAm99f9qw2W', '2024-11-11 05:56:20', '2024-11-11 05:56:20'),
(13, 'durga', 'shiv', 'shiv@gmail.com', '$2y$10$57BzXJUEFwoPy/z62qXFIuN8titKYlxuFTp7TSutuGPfmB.OXQPuC', '2024-11-11 06:21:06', '2024-11-11 06:21:06'),
(15, 'bani', 'khanna', 'bani67@gmail.com', '$2y$10$52IUcFYNJJDGPyk2l0bTpOzxL4XlmjpG92aeGQq3NYKysUiuz9r6u', '2024-11-11 18:26:10', '2024-11-11 18:26:10'),
(16, 'shinchan', 'nohara', 's@gmail.com', '$2y$10$qLCU/HIeHF0p0CtnKza4XedV1rJZ1T.5dDzzEzl7fPDl8enDeUeq.', '2024-11-13 05:45:27', '2024-11-13 05:45:27'),
(17, 'jetalal', 'gada', 'jetala@gmail.com', '$2y$10$R8TVxPXrU7pz41Omcc7Q4OzU5Z8oNwxW0AvOQuVUIwXlYz9UWB15K', '2024-11-20 14:40:42', '2024-11-20 14:40:42'),
(18, 'shina', 'kumar', 'shina12@gmail.com', '$2y$10$m6HGKgHUVF2E9sLov/RHROVCovpcIzIX4U0c7G.sliDQRjg2J/nTe', '2025-03-11 10:56:40', '2025-03-11 10:56:40'),
(20, 'rahul', 'kumar', 'rahul78@gmail.com', '$2y$10$B8TANn7E5D11G9.PekLM6uFDLwXz/nqdGoNAjlCiSOSzsBRmQ1p.S', '2025-03-14 12:28:46', '2025-03-14 12:28:46'),
(21, 'meera', 'singh', 'meera56@gmail.com', '$2y$10$ViUlwYle9rI6aajXB2yzF.fXgswkwGjsaGSYQ1f6JFL2NzJnw.ete', '2025-03-14 13:43:14', '2025-03-14 13:43:14'),
(22, 'bandana', 'dutta', 'ban@gmail.com', '$2y$10$pLNH/XKh0yk5r8kS8SSUpeBB75TVvk6Q2uHHUS1GfQ8jyG60ArREu', '2025-04-10 14:51:36', '2025-04-10 14:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `score` int(11) NOT NULL,
  `test_type` varchar(50) DEFAULT NULL,
  `status` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `user_id`, `grade`, `date`, `score`, `test_type`, `status`) VALUES
(198, 21, 'D', '2025-03-14 18:16:48', 3, 'Mathematics', 'Attempted'),
(229, 21, 'D', '2025-03-14 18:58:37', 3, 'Logical Reasoning', 'Attempted'),
(231, 21, 'D', '2025-03-14 18:59:17', 5, 'Memory', 'Attempted'),
(233, 22, 'D', '2025-04-10 14:53:02', 2, 'Mathematics', 'Attempted'),
(235, 22, 'D', '2025-04-10 15:14:11', 1, 'Logical Reasoning', 'Attempted'),
(237, 22, 'D', '2025-04-11 07:10:16', 1, 'Memory', 'Attempted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_no`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`test_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=570;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`q_no`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
