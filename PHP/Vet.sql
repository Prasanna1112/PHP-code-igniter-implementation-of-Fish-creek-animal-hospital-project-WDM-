-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 04:56 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vet`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `name`, `address`, `phone`, `email`, `password`) VALUES
(4, 'Bhushan Chivane', 'Trimurti Nagar, MH, IN', '9876023456', 'bhushanchivane@hotmail.com', '734527d8971d3b8d5c554019b17bbd81'),
(5, 'Rahul Roy', 'Dharampeth, MH, IN', '8087987789', 'rahulsroy@rediffmail.com', '45a7c0b1def3338fef679c7f303ab702'),
(6, 'Ray Rushford', 'S Cooper, Arlington, TX', '3134455345', 'rayray@gmail.com', '54b4838c3eb23a7bd78f76550e6338b2'),
(7, 'Jack Knight', 'Houston, TX', '6823132145', 'jknight@gmail.com', '6a06b6152b3e560f226c7cd58d93a0d1'),
(8, 'Krissy Walter', 'Randoll Mill, Arlington, TX', '2142256545', 'kissy@yahoo.com', '2ad09b58e12dc1a07457f291353ee425'),
(9, 'Rick Tareja', 'Richardson, TX', '3134442344', 'ricktareja@hotmail.com', '814a7fff990498eb34990899a112e26a'),
(10, 'Jeremy Watson', 'Springfield, TX', '6523655412', 'jeremy12@gmail.com', '97834d635611f0b1e8b0e45f0f1c700e'),
(11, 'Max Wright', 'Hamilton St, TX', '3138909987', 'maximax@yahoo.com', 'de71c68cf351f878d300ccfed8dd2d3d');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `comments`) VALUES
('Ravi Chopra', 'ravichopra@yahoo.com', 'My cat is behaving abnormally. Need an appointment.'),
('Kai Lee', 'kailee@gmail.com', 'Cool website. By the way, I need an appointment asap since nobody seems to be receiving my calls. '),
('Kelly Richardson', 'kellyrichard@rediffmail.com', 'Cool website. '),
('Rick Martin', 'rickymartin@yahoo.com', 'My dog has been sleeping a lot lately. Is there a problem with him that I should be concerned about ?');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `petid` int(11) NOT NULL,
  `petname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`petid`, `petname`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Rabbit'),
(4, 'Fishes'),
(5, 'Hamster'),
(6, 'Turtle'),
(7, 'Birds');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionid` int(11) NOT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionid`, `question`, `answer`) VALUES
(1, 'Can My Puppy Go Outside Yet?', 'It is safest to wait until the puppy has finished the series of vaccinations before letting it go outside, Vyorst says. That is usually at 4 months old.'),
(2, 'What is the Scoop on Flea, Tick, and Heartworm Medicine?', 'Takashima and Vyorst generally recommend using this triple protection (against fleas, ticks, and heartworms) all year-round. But Takashima adds that where you live and your lifestyle will determine your pets individual medication plan.'),
(3, ' Is My Pet Up to Date on Shots?', 'It never hurts to make sure your furry friend is totally up-to-date on all his or her vaccinations and immunizations, it is something that can easily be overlooked.'),
(4, 'Can My Pet Make Me Sick?', 'In general, if your pet has a cold, or if you do, you cannot transfer it to each other, Buchter says. However, she notes, there are a few conditions, including intestinal parasites and skin diseases, that could be transferred to people.');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceid` int(11) NOT NULL,
  `servicename` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceid`, `servicename`, `description`) VALUES
(1, 'Medical Services', 'We offer state-of-the-art equipment and technology.'),
(2, 'Surgical Services', 'Full range of surgical procedures including orthopedics and emergency surgeries.'),
(3, 'Dental Care', 'A dental exam can determine whether your pet needs preventive dental care such as scaling and polish'),
(4, 'House Calls', 'The elderly, physically challenged, and multiple pet households often find out in-home-veterinary se'),
(5, 'Emergencies', 'At least one of our doctors is on call every day and night.');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `clientid` int(11) DEFAULT NULL,
  `serviceid` int(11) DEFAULT NULL,
  `petid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`clientid`, `serviceid`, `petid`, `date`) VALUES
(4, 4, 7, '2017-11-22'),
(5, 5, 6, '2017-11-22'),
(6, 3, 1, '2017-11-22'),
(7, 2, 3, '2017-11-22'),
(8, 4, 4, '2017-11-22'),
(9, 4, 2, '2017-11-22'),
(10, 2, 6, '2017-11-22'),
(11, 3, 2, '2017-11-22'),
(9, 3, 5, '2017-11-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`petid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD KEY `clientid` (`clientid`),
  ADD KEY `serviceid` (`serviceid`),
  ADD KEY `petid` (`petid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `petid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`serviceid`) REFERENCES `service` (`serviceid`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_ibfk_3` FOREIGN KEY (`petid`) REFERENCES `pet` (`petid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
