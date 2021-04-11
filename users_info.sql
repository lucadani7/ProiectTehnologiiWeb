-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 06:43 PM
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
-- Database: `fitness_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `nume` varchar(51) NOT NULL,
  `prenume` varchar(51) NOT NULL,
  `data_nasterii` date NOT NULL,
  `gen` varchar(11) NOT NULL,
  `greutate` float NOT NULL,
  `inaltime` int(11) NOT NULL,
  `email` varchar(201) NOT NULL,
  `parola` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `nume`, `prenume`, `data_nasterii`, `gen`, `greutate`, `inaltime`, `email`, `parola`) VALUES
(1, 'Ionescu', 'Andrei', '1950-12-17', 'Barbat', 86, 180, 'andreiionescu50@gmail.com', '7TDgF7TcYuXqS4uf'),
(2, 'Calancea', 'Andreea Maria', '1962-09-21', 'Femeie', 70, 172, 'mariandreeacalancea62@gmail.com', 'D3LJgMAqFY82aENU'),
(3, 'Timofte', 'Stefan Andrei', '1975-06-10', 'Barbat', 90, 185, 'stefantimofte75@yahoo.com', 'sRQ7bMuE3QS63T6Z'),
(4, 'Popescu', 'Madalina Iulia', '2003-04-10', 'Femeie', 85, 190, 'madaiuliapopescu10@yahoo.com', 'PA5N8~Le\"wN!f!VX'),
(5, 'Iancu', 'Nicolae', '1997-11-12', 'Barbat', 78, 176, 'nicolaeiancu97@gmail.com', 'jV;H#$?aN3?Yp)S'),
(6, 'Iancu', 'Florentina', '1998-10-06', 'Femeie', 89, 200, 'iancuflorentina98@gmail.com', 'w\'{,7LYRHc.%+S#'),
(7, 'Ionescu', 'Alexandra Elena', '1990-06-21', 'Femeie', 80, 178, 'alexelenaionescu90@yahoo.com', '!G#56M=E3e58`*=*'),
(8, 'Petrica', 'Filip', '1983-03-23', 'barbat', 87, 200, 'filippetrica83@gmail.com', 'DM;~KvZ,Nd&6BB@['),
(9, 'Petrica', 'Georgeta Andreea', '1996-09-06', 'Femeie', 85, 185, 'georgetapetrica96@gmail.com', 'H+}M5g8h-n\"C_-!:'),
(10, 'Tudorache', 'Robert', '1989-10-17', 'Barbat', 82, 172, 'tudoracherobert89@gmail.com', '$!ccH;`YYBM2He`}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
