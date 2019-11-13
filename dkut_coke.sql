-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 04:26 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dkut_coke`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sirname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreated` date NOT NULL,
  `timeCreated` time NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `username`, `firstname`, `lastname`, `sirname`, `email`, `tel`, `password`, `dateCreated`, `timeCreated`, `status`) VALUES
(1, 'agent001', 'john ', 'doe', 'bond', 'johndoe@gmail.com', '0718610463', '213b8657a6eba94f55dccd6f669a3bb1', '2019-08-08', '07:29:56', 'ACTIVE'),
(2, 'agent002', 'raven', 'wanyama', 'kuria', 'raven@yahoo.com', '0712456456', 'e0d32b8565368e90074b51e567f6e4d3', '2019-08-08', '07:37:39', 'ACTIVE'),
(3, 'agent003', 'Keptler', '452b', 'rover', 'keptler452b@gmail.com', '0725114223', '88a8e5273c27ec4e6c4afd6b40041610', '2019-08-08', '07:54:05', 'INNACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `deptname` varchar(255) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `deptname`, `datecreated`) VALUES
(2, 'Dasani', '2019-08-10'),
(3, 'Soda', '2019-08-10'),
(4, 'Merchandise', '2019-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` int(11) NOT NULL,
  `distname` varchar(255) NOT NULL,
  `distoname` varchar(255) NOT NULL,
  `distemail` varchar(255) NOT NULL,
  `distel` int(12) NOT NULL,
  `distlocation` varchar(255) NOT NULL,
  `dateadded` date NOT NULL,
  `timeadded` time NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `distname`, `distoname`, `distemail`, `distel`, `distlocation`, `dateadded`, `timeadded`, `description`, `status`) VALUES
(1, 'Distributor001', 'Jannet Wambui ', 'jannet@dist001.co.ke', 712457896, 'Kangema ', '2019-08-09', '11:09:40', 'some sort of description about distributor 001 ', 'ACTIVE'),
(2, 'Distributor 002 ', 'Fredrick Mzito ', 'fredie@dist002.ac.ke', 789456123, 'Classic ', '2019-08-09', '11:11:31', 'some sort of description about distributor 002 ', 'INNACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `agentid` int(11) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `distributor` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `datecreated` date NOT NULL,
  `timecreated` time NOT NULL,
  `datecompleted` date NOT NULL,
  `timecompleted` time NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `distributorgrade` varchar(20) NOT NULL,
  `distributorremarks` varchar(255) NOT NULL,
  `manageremarks` varchar(255) NOT NULL,
  `managergrade` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `agentid`, `agent`, `distributor`, `category`, `description`, `datecreated`, `timecreated`, `datecompleted`, `timecompleted`, `remarks`, `status`, `lat`, `lng`, `distributorgrade`, `distributorremarks`, `manageremarks`, `managergrade`) VALUES
(1, 1, 'agent001', 'Distributor001', 'Merchandise', 'supply 50  coke t-shirts  and provide remarks on the distributors progress on the remarks section ', '2019-08-10', '06:31:47', '0000-00-00', '00:00:00', '', 'PENDING', 0, 0, '', '', '', 0),
(2, 2, 'agent002', 'Distributor 002 ', 'Soda', 'supply 50 crates on soft drinks to the distributor and take a review on the operation performed by the distributor ', '2019-08-10', '06:38:37', '0000-00-00', '00:00:00', '', 'PENDING', 0, 0, '', '', '', 0),
(4, 1, 'agent001', 'Distributor001', 'Dasani', 'SAMPLE SAMPLE', '2019-08-10', '07:18:19', '0000-00-00', '00:00:00', '', 'PENDING', 0, 0, '', '', '', 0),
(5, 1, 'agent001', 'Distributor001', 'Soda', 'Tricky kidogo', '2019-08-10', '07:19:04', '0000-00-00', '00:00:00', '', 'PENDING', 0, 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'cokeadmin', 'cokeadmin@gmail.com', '2d28a1598b25a32d21b46b901b27a1ef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
