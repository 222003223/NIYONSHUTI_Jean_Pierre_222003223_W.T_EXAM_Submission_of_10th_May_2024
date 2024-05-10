-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 08:33 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ar_workshop_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Phonenumber` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Role` varchar(120) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Name`, `Phonenumber`, `Email`, `Role`, `Password`) VALUES
(1, 'Jean Pierre NIYONSHUTI', '0786407569', 'jeanpierreniyonshuti71@gmail.com', 'General Admin', 'Jean@2020');

-- --------------------------------------------------------

--
-- Table structure for table `ar_resources`
--

CREATE TABLE `ar_resources` (
  `resource_id` int(11) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `resource_type` enum('video','document','image') NOT NULL,
  `resource_url` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ar_resources`
--

INSERT INTO `ar_resources` (`resource_id`, `workshop_id`, `resource_type`, `resource_url`, `description`) VALUES
(4, 8, 'video', 'http:// https://www.youtube.com/watch?v=fWvUX-tzgag.com', 'Workshop slides'),
(5, 7, 'document', 'http://inyarwanda.com/slides.pdf', 'Workshop slides'),
(6, 9, 'image', 'http://video.com/image.jpg', 'AR demo image'),
(7, 8, '', 'http://inyarwanda.com/slides.pdf', 'AR demo image');

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `attendee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_text` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `feedback_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `workshop_id`, `user_id`, `feedback_text`, `rating`, `feedback_date`) VALUES
(1, 7, 1, 'Great workshop! Really learned a lot.', 5, '2024-04-08 10:00:00'),
(2, 9, 2, 'The content was informative.', 4, '2024-04-08 10:30:00'),
(3, 8, 1, 'Could have been more hands-on.', 3, '2024-04-09 09:00:00'),
(4, 8, 1, 'hello', 10, '2024-05-09 12:35:35'),
(5, 7, 2, 'hello', 10, '2024-05-09 12:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bio` text DEFAULT NULL,
  `expertise` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `user_id`, `bio`, `expertise`) VALUES
(4, 2, 'Experienced AR developer with 5+ years of industry experience.', 'Augmented Reality'),
(5, 1, 'AR enthusiast with a passion for teaching.', 'Education'),
(6, 2, 'Expert in AR design principles and user experience.', 'Design');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(10) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `contact_way` varchar(120) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `fullname`, `email`, `phone`, `contact_way`, `message`) VALUES
(10, '', 'jeanpierreniyonshuti71@gmail.com', '', '', '05Europe/Berlin5757pm3Europe/Berlin'),
(11, 'Jean Pierre NIYONSHUTI', 'jeanpierreniyonshuti71@gmail.com', '', 'email', '05Europe/Berlin0303pm3Europe/Berlin');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(250) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `workshop_id`, `user_id`, `amount`, `payment_method`, `payment_date`) VALUES
(4, 7, 1, '50.00', 'mobile phone', '2024-04-08 07:30:00'),
(5, 9, 2, '50.00', 'bank', '2024-04-08 08:00:00'),
(6, 8, 1, '50.00', 'MasterCard', '2024-04-09 06:45:00'),
(8, 9, 4, '600.00', '', '2024-05-09 14:33:33'),
(9, 7, 1, '4000.00', 'bank', '2024-05-09 14:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `session_date` date NOT NULL,
  `session_start_time` time NOT NULL,
  `session_end_time` time NOT NULL,
  `session_topic` varchar(255) NOT NULL,
  `session_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `workshop_id`, `session_date`, `session_start_time`, `session_end_time`, `session_topic`, `session_description`) VALUES
(1, 9, '2024-04-08', '10:00:00', '12:00:00', 'Introduction to AR', 'Overview of AR technology and its applications.'),
(2, 7, '2024-04-09', '10:00:00', '12:00:00', 'Hands-on AR Development', 'Practical session on creating AR applications.'),
(3, 8, '2024-04-10', '09:00:00', '11:00:00', 'AR Design Principles', 'Discussion on design principles for effective AR experiences.'),
(4, 8, '2024-05-09', '22:37:00', '23:37:00', 'web programming ', 'explanation ');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `TagID` int(11) NOT NULL,
  `TagName` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `CreatedBy` varchar(100) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`TagID`, `TagName`, `Description`, `CreatedBy`, `CreationDate`) VALUES
(1, 'AR Development', 'Tags related to augmented reality development workshops', 'Admin', '2024-05-02 11:01:36'),
(2, 'Virtual Reality', 'Tags related to virtual reality workshops', 'Jean', '2024-05-02 11:01:36'),
(3, 'Game Design', 'Tags related to game design workshops', 'Pierre', '2024-05-02 11:01:36'),
(4, 'AR Development', 'Tags related to game design workshops', 'user', '2024-05-09 13:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('participant','instructor') NOT NULL,
  `contact` text NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(10) NOT NULL,
  `dateofbirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `last_name`, `first_name`, `username`, `email`, `password`, `role`, `contact`, `registration_date`, `gender`, `dateofbirth`) VALUES
(1, 'MUKAMANA', 'PIERRE', 'alice', 'mukalice@gmail.com', 'Alice@2024', '', '', '2024-04-08 07:00:00', '0', NULL),
(2, 'NIYONSHUTI', 'Jean Pierre', 'Jean', 'jaenni@gmail.com', 'Jaen@2024', 'participant', '', '2024-04-08 07:30:00', '0', NULL),
(3, 'NIYONSHUTI', '', 'jeanpierre@gmail.com', '1234', 'Pierre', '', '0786407569', '2024-05-08 12:29:32', '0', '1997-01-01'),
(4, 'MUKANDAYISENGA', '', 'Jeannette', 'mjeannette170@gmail.com', '1234', 'participant', '0780000000', '2024-05-08 12:34:48', '0', '2004-01-08'),
(6, 'NIYONSHUTI', 'Jean Pierre', 'Pierre', 'jeanpierreniyonshuti71@gmail.com', '1234', 'participant', '0786407569', '2024-05-10 05:59:45', 'Male', '2024-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `workshop_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `instructor_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `TagID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`workshop_id`, `title`, `description`, `instructor_id`, `start_date`, `end_date`, `location`, `capacity`, `TagID`) VALUES
(7, 'Introduction to AR Development', 'Learn the basics of creating AR applications.', 6, '2024-04-08 00:00:00', '2024-04-09 00:00:00', 'Virtual Classroom', 50, NULL),
(8, 'AR Design Principles', 'Explore the fundamentals of designing AR experiences.', 4, '2024-04-10 00:00:00', '2024-04-11 00:00:00', 'Virtual Classroom', 50, NULL),
(9, 'Advanced AR Workshop', 'Deep dive into advanced AR development techniques.', 5, '2024-04-12 00:00:00', '2024-04-13 00:00:00', 'Virtual Classroom', 50, NULL),
(10, 'introduction to the development of AR', 'Learn the basics of creating AR applications', 6, '2024-05-09 00:00:00', '2024-05-26 00:00:00', 'kigali classroom', 123000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `ar_resources`
--
ALTER TABLE `ar_resources`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `workshop_id` (`workshop_id`);

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`attendee_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `workshop_id` (`workshop_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `workshop_id` (`workshop_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `workshop_id` (`workshop_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `workshop_id` (`workshop_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`TagID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`workshop_id`),
  ADD KEY `instructor_id` (`instructor_id`),
  ADD KEY `fk_tags_TagID` (`TagID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ar_resources`
--
ALTER TABLE `ar_resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `attendee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `TagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `workshop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ar_resources`
--
ALTER TABLE `ar_resources`
  ADD CONSTRAINT `ar_resources_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`);

--
-- Constraints for table `attendees`
--
ALTER TABLE `attendees`
  ADD CONSTRAINT `attendees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `attendees_ibfk_2` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`);

--
-- Constraints for table `workshops`
--
ALTER TABLE `workshops`
  ADD CONSTRAINT `fk_tags_TagID` FOREIGN KEY (`TagID`) REFERENCES `tags` (`TagID`),
  ADD CONSTRAINT `workshops_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
