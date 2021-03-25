-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Gru 2018, 19:04
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `formularz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ankieta`
--

CREATE TABLE `ankieta` (
  `id` int(3) NOT NULL,
  `pytanie1` varchar(999) COLLATE utf8_polish_ci NOT NULL,
  `pytanie2` varchar(999) COLLATE utf8_polish_ci NOT NULL,
  `pytanie3` varchar(999) COLLATE utf8_polish_ci NOT NULL,
  `pytanie4` varchar(999) COLLATE utf8_polish_ci NOT NULL,
  `pytanie5` varchar(999) COLLATE utf8_polish_ci NOT NULL,
  `pytanie6` varchar(999) COLLATE utf8_polish_ci NOT NULL,
  `pytanie7` varchar(999) COLLATE utf8_polish_ci NOT NULL,
  `pytanie8` varchar(999) COLLATE utf8_polish_ci NOT NULL,
  `pytanie9` varchar(999) COLLATE utf8_polish_ci NOT NULL,
  `pytanie10` varchar(999) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ankieta`
--

INSERT INTO `ankieta` (`id`, `pytanie1`, `pytanie2`, `pytanie3`, `pytanie4`, `pytanie5`, `pytanie6`, `pytanie7`, `pytanie8`, `pytanie9`, `pytanie10`) VALUES
(1, 'Jest mi potrzebny do biznesu pracy', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(2, 'Wykorzystuje go w celach rozrywkowych', 'Samsung', 'Symbian', 'YouTube', '1-2', 'Bezawaryjne działanie', 'ok. 2-3 godziny', 'Tak', 'Często', 'Do 18 lat'),
(3, 'Jest mi potrzebny do biznesu pracy', 'Sony', 'IOS', 'YouTube', '5-10', 'Bezawaryjne działanie', 'ok. 2-3 godziny', 'Nie', 'Często', '36-45 lat'),
(4, 'Jest mi potrzebny do biznesu pracy', 'Sony', 'IOS', 'YouTube', '5-10', 'Bezawaryjne działanie', 'ok. 2-3 godziny', 'Nie', 'Często', '36-45 lat'),
(5, 'Jest mi potrzebny do biznesu pracy', 'Sony', 'IOS', 'YouTube', '5-10', 'Bezawaryjne działanie', 'ok. 2-3 godziny', 'Nie', 'Często', '36-45 lat'),
(6, 'Jest mi potrzebny do biznesu pracy', 'Sony', 'IOS', 'YouTube', '5-10', 'Bezawaryjne działanie', 'ok. 2-3 godziny', 'Nie', 'Często', '36-45 lat'),
(7, 'Jest mi potrzebny do biznesu pracy', 'Sony', 'IOS', 'YouTube', '5-10', 'Bezawaryjne działanie', 'ok. 2-3 godziny', 'Nie', 'Często', '36-45 lat'),
(8, 'Jest mi potrzebny do biznesu pracy', 'Sony', 'IOS', 'YouTube', '5-10', 'Bezawaryjne działanie', 'ok. 2-3 godziny', 'Nie', 'Często', '36-45 lat'),
(9, 'Jest mi potrzebny do biznesu pracy', 'Sony', 'IOS', 'YouTube', '5-10', 'Bezawaryjne działanie', 'ok. 2-3 godziny', 'Nie', 'Często', '36-45 lat'),
(10, 'Jest mi potrzebny do biznesu pracy', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(11, 'Jest mi potrzebny do biznesu pracy', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(12, 'Jest mi potrzebny do biznesu pracy', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(13, 'Jest mi potrzebny do biznesu pracy', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(14, 'Jest mi potrzebny do biznesu pracy', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(15, 'Jest mi potrzebny do biznesu pracy', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(16, 'Jest mi potrzebny do biznesu pracy', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(17, 'Ze względu na prestiż', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(18, 'Ze względu na prestiż', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(19, 'Ze względu na prestiż', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(20, 'Ze względu na prestiż', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(21, 'Ze względu na prestiż', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(22, 'Ze względu na prestiż', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat'),
(23, 'Ze względu na prestiż', 'Nokia', 'Android', 'Facebook', 'Nie instaluję dodatkowych aplikacji', 'Brak reklam', 'Mniej niż godzina', 'Tak', 'Praktycznie cały czas', 'Do 18 lat');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ankieta`
--
ALTER TABLE `ankieta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ankieta`
--
ALTER TABLE `ankieta`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
