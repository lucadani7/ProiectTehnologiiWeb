-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 06:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sala`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `ID` int(11) NOT NULL,
  `LastName` varchar(61) DEFAULT NULL,
  `FirstName` varchar(91) DEFAULT NULL,
  `BirthDate` date NOT NULL DEFAULT current_timestamp(),
  `Gender` varchar(11) DEFAULT NULL,
  `Email` varchar(81) DEFAULT NULL,
  `Password` varchar(21) DEFAULT NULL,
  `Calories` int(11) NOT NULL,
  `Exercices` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`ID`, `LastName`, `FirstName`, `BirthDate`, `Gender`, `Email`, `Password`, `Calories`, `Exercices`) VALUES
(1, 'Dudeanu', 'Andrei', '1998-05-17', 'Male', 'dudeanuandrei@gmail.com', 'X.$qjf', 20, 10),
(2, 'Sandu', 'Veronica', '2007-07-21', 'Female', 'veronicasandu@gmail.con', 'uRs^\\)', 25, 13),
(3, 'Popescu', 'Ion', '2000-03-14', 'Male', 'ionpopescu@gmail.com', '9D)GQ', 21, 15),
(4, 'Serban', 'Alexandra', '1999-02-08', 'Female', 'alexandraserban12@yahoo.com', 'V-c6+q', 21, 14),
(5, 'Stan', 'George', '1996-10-18', 'Male', 'stangeorge@yahoo.com', 'rY2utN', 30, 20),
(6, 'Stan', 'Corina', '1998-11-17', 'Female', 'corinastan@yahoo.com', '5hVJt[', 20, 20),
(7, 'Dargagno', 'Roberto', '1990-12-13', 'Male', 'robidargagno@outlook.com', 'r<wBN@', 20, 20),
(8, 'Prodi', 'Alice', '1994-01-15', 'Female', 'aliceprodi@gmail.com', 's]56EM', 21, 20),
(9, 'Blaga', 'Ludovic', '1993-04-02', 'Male', 'ludovicblaga@gmail.com', 'n7TwKZ', 21, 15),
(10, 'Gherasim', 'Petronela', '1992-08-10', 'Female', 'petronelagherasim@gmail.com', 'X5CEE{', 21, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
