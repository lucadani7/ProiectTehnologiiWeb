-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 14, 2021 la 02:11 PM
-- Versiune server: 10.4.18-MariaDB
-- Versiune PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `users`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `antrenamente`
--

CREATE TABLE `antrenamente` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `exercitiu` varchar(100) NOT NULL,
  `numar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `antrenamente`
--

INSERT INTO `antrenamente` (`id`, `id_user`, `exercitiu`, `numar`) VALUES
(1, 5, 'Abdomene cu picioarele ridicate', 10),
(2, 5, 'Flexia palmelor cu gantera/haltera', 10),
(3, 5, 'Exercitiu antebrat la cablu', 5),
(4, 5, 'Împins din culcat cu bara dreaptă', 5),
(5, 5, 'Fluturari cu ganterele', 3),
(6, 5, 'Kickback cu gantera', 3),
(7, 5, 'Mountain Climber', 4),
(8, 6, 'Ridicari de picioare', 10),
(9, 6, 'Mountain Climber', 13),
(10, 6, 'Abdomene cu picioarele ridicate', 5),
(11, 6, 'Plank', 2),
(12, 7, 'Genuflexiunile clasice', 15),
(13, 7, 'Flexii cu baza Z', 5),
(14, 7, 'Abdomene cu picioarele ridicate', 3),
(15, 7, 'Ridicari de picioare', 2),
(16, 8, 'Abdomene cu picioarele ridicate', 5),
(17, 8, 'Fluturari cu ganterele', 1),
(18, 8, 'Flotari la perete', 1),
(19, 9, 'Exercitiu antebrat la cablu', 20),
(20, 9, 'Ridicari de picioare', 5),
(21, 9, 'Podul', 10),
(22, 10, 'Flexii hammer', 4),
(23, 10, 'Genuflexiunile clasice', 1),
(24, 10, 'Flexii de concentrare/Arnold', 2),
(25, 11, 'Exercitiu antebrat la cablu', 14),
(26, 11, 'Abdomene cu picioarele ridicate', 1),
(27, 12, 'Exercitiu antebrat la cablu', 10),
(28, 12, 'Flotari la perete', 10),
(29, 12, 'Genuflexiunile clasice', 10),
(30, 12, 'Flotări la paralele', 5),
(31, 12, 'Podul', 10),
(32, 13, 'Abdomene cu picioarele ridicate', 10),
(33, 13, 'Ridicari de picioare', 10),
(34, 13, 'Exercitiu antebrat la cablu', 4),
(35, 13, 'Tracțiuni la Scripete cu Mânerul V', 1),
(36, 14, 'Flotări la paralele', 10),
(37, 14, 'Kickback cu gantera', 5),
(38, 14, 'Tracțiuni la Scripete cu Mânerul V', 10),
(39, 14, 'Flexii de concentrare/Arnold', 5),
(40, 14, 'Exercitiu antebrat la cablu', 5),
(41, 15, 'Plank', 1),
(42, 15, 'Abdomene cu picioarele ridicate', 2),
(43, 15, 'Mountain Climber', 1),
(44, 15, 'Împins din culcat cu bara dreaptă', 2),
(45, 15, 'Tracțiuni la Scripete cu Mânerul V', 3),
(46, 15, 'Podul', 2),
(50, 15, 'Genuflexiunile clasice', 5),
(51, 15, 'Ramat cu haltera', 1),
(52, 15, 'Flexii de concentrare/Arnold', 12);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizatori`
--

CREATE TABLE `utilizatori` (
  `id` int(11) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `prenume` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `parola` varchar(100) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `calorii` int(11) NOT NULL DEFAULT 0,
  `exercitii` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`id`, `nume`, `prenume`, `email`, `parola`, `gen`, `calorii`, `exercitii`) VALUES
(1, 'Pop', 'Ana', 'ana@gmail.com', '12345', 'femeie', 0, 0),
(2, 'Popescu', 'Dan', 'dan@gmail.com', 'dan123', 'barbat', 0, 0),
(3, 'Cojocaru', 'Marius', 'asd@gmail.com', 'ceamaibunaparola', 'barbat', 0, 0),
(4, 'Adiaconite', 'Sebastian', 'sebi@gmail.com', 'sebi123', 'barbat', 0, 0),
(5, 'Manole', 'Andrei', 'andreimanole@gmail.com', '4444andrei', 'barbat', 3900, 40),
(6, 'Manole', 'Maria', 'maria12345@yahoo.com', 'maria123', 'femeie', 1890, 30),
(7, 'Diaconu', 'Cristina', 'diaconu@yahoo.com', '7777', 'femeie', 2000, 25),
(8, 'Ion', 'Paul', 'ion123@gmail.com', 'parola123', 'barbat', 890, 7),
(9, 'Dron', 'Alexandra', 'ale@gmail.com', 'aaa123', 'femeie', 2900, 35),
(10, 'Castan', 'Dan', 'castan@gmail.com', 'castan54', 'barbat', 560, 7),
(11, 'Vantu', 'Marcel', 'mmm@gmail.com', 'marcelus', 'barbat', 1550, 15),
(12, 'Cojocaru', 'Teofana', 'teo@gmail.com', 'teo13', 'femeie', 2800, 45),
(13, 'Marius', 'Marius', 'mariussss123@gmail.com', 'mariussss', 'barbat', 2980, 25),
(14, 'Avram', 'David', 'avram@gmail.com', 'avram22', 'barbat', 3100, 35),
(15, 'Student', 'Student', 'student@gmail.com', 'student', 'barbat', 1425, 16);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `antrenamente`
--
ALTER TABLE `antrenamente`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `antrenamente`
--
ALTER TABLE `antrenamente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
