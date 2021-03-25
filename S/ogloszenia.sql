-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Cze 2018, 01:08
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ogloszenia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `o`
--

CREATE TABLE `o` (
  `id` int(11) NOT NULL,
  `user` varchar(15) COLLATE utf8_polish_ci DEFAULT NULL,
  `tytul` text COLLATE utf8_polish_ci NOT NULL,
  `kategoria` enum('Mieszkanie','Dom','Działka','Biura i lokale','Garaż') COLLATE utf8_polish_ci NOT NULL,
  `typ` enum('Kupię','Sprzedam','Wynajmę') COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(1000) COLLATE utf8_polish_ci DEFAULT NULL,
  `imie` text COLLATE utf8_polish_ci,
  `lok` text COLLATE utf8_polish_ci,
  `tel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `o`
--

INSERT INTO `o` (`id`, `user`, `tytul`, `kategoria`, `typ`, `opis`, `imie`, `lok`, `tel`) VALUES
(42, 'adam', 'Dupa', 'Garaż', 'Wynajmę', 'Dupa', 'Marlena', 'Wrocław', 555555555);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `uprawnienia` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `uprawnienia`) VALUES
(1, 'adam', '$2y$10$uvVS3Dc/ZZrzNIze9xKc2.trJDz2tWOdcSpBWm9EBapl2FnOrALZS', 'adam@gmail.com', 1),
(11, 'admin', '$2y$10$pjkSssDS/POncONVeaO5KuvgOGHoN94JX0l2XEt0C/pKMWJKtxm.2', 'admin@gmail.com', 0),
(9, 'janusz', '$2y$10$Ndawwxpc7z623iBfFAycFOw.5M5PyuF4NSBp6BWfuqsj10yXnI3vq', 'janusz@gmail.com', 1),
(2, 'marek', '$2y$10$uvVS3Dc/ZZrzNIze9xKc2.trJDz2tWOdcSpBWm9EBapl2FnOrALZS', 'marek@gmail.com', 1),
(10, 'roman', '$2y$10$vZPTjDTzB88cKqld2Uv0J.usvx6vEV88b.ygpUmKetQP4kgdZIsmW', 'roman@gmail.com', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `o`
--
ALTER TABLE `o`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `o`
--
ALTER TABLE `o`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `o`
--
ALTER TABLE `o`
  ADD CONSTRAINT `o_ibfk_1` FOREIGN KEY (`user`) REFERENCES `uzytkownicy` (`user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
