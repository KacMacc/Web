-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Sty 2019, 23:48
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pwrstar`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aspects`
--

CREATE TABLE `aspects` (
  `id_aspects` int(9) NOT NULL,
  `fun` int(1) NOT NULL DEFAULT '50',
  `science` int(1) NOT NULL DEFAULT '50',
  `money` int(1) NOT NULL DEFAULT '50',
  `relationships` int(1) NOT NULL DEFAULT '50',
  `id_users` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `aspects`
--

INSERT INTO `aspects` (`id_aspects`, `fun`, `science`, `money`, `relationships`, `id_users`) VALUES
(1, 54, 50, 50, 54, 1),
(2, 40, 100, 90, 50, 2),
(3, 40, 100, 90, 50, 3),
(4, 40, 100, 90, 50, 4),
(5, 44, 55, 63, 120, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dead`
--

CREATE TABLE `dead` (
  `id_dead` int(3) NOT NULL,
  `die_text` varchar(300) NOT NULL,
  `to_much` bit(1) NOT NULL,
  `aspect_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `dead`
--

INSERT INTO `dead` (`id_dead`, `die_text`, `to_much`, `aspect_id`) VALUES
(1, 'Włączył Ci się agresor po wódzie i wdałeś się w walkę z Robertem Makłowiczem. Po kilku dniach intensywnej terapii w szpitalu lekarze się poddali.', b'1', 1),
(2, 'Zginąłeś skacząc na główkę do pustego basenu. Twoimi ostatnimi słowami były "Potrzymaj mi piwo".', b'1', 1),
(3, 'Zastał Cię dosłownie kac morderca. Czy warto było szaleć tak, przez całe życie?', b'1', 1),
(4, 'Nadmiar wiedzy sprawił, że Twój mózg urusł do niewyobrażalnych rozmiarów po czym pękł.', b'1', 2),
(5, 'Zostałeś zaproszony na Uniwersytet Harvadzki. Po wylądowaniu samolotem, zacząłeś klaskać, po czym umarłeś ze wstydu.', b'1', 2),
(6, 'Ukończyłeś studia przed czasem. Dlatego nie jesteś już studentem i nie możesz grać w tę grę.', b'1', 2),
(7, 'Zacząłeś wydawać pieniądze na głupoty. Przekonałeś się na własnej skórze że świeżo zakupiony gekon okazał się jadowity.', b'1', 3),
(8, 'Wieść o Twoim bogactwie szybko się rozniosła. Tym razem zarobiłeś kosę pod żebra.', b'1', 3),
(9, 'Kupiłeś sobie prywatny odrzutowiec i uparłeś się, że chcesz nim pilotować. Nie udało się.', b'1', 3),
(10, 'Zapoznałeś się grubą szychą na mieście. Szybko zwietrzył u ciebie konkurenta i załatwił chłopaków żeby cię odstrzelić.', b'1', 4),
(11, 'Nowo zapoznana koleżanka dała ci nie tylko piękne chwile. Umarłeś na Hiv, Eids', b'1', 4),
(12, 'Zapoznałeś się z arabem i przeszedłeś na islam. Koledzy cię zabili zanim zrobiłbyś to ty.', b'1', 4),
(13, 'Zdechłeś z nudów. Dosłownie.', b'0', 1),
(14, 'Wydłubałeś sobie oko łyżeczką w herbacie, którą zaparzyłeś sobie do picia podczas robienia na drutach.', b'0', 1),
(15, 'Zostałeś potrącony przez auto, gdy zagapiłeś się jak rośnie trawa.', b'0', 1),
(16, 'Zostałeś wydalony ze studiów. Skończył się dzień dziecka.', b'0', 2),
(17, 'Gdy Twoje IQ osiągneło wartość jednocyfrową, proces oddychania stał się dla Ciebie za trudny.', b'0', 2),
(18, 'Niejaki pan Kaszlak, zabił Cię wzrokiem, gdy przyszedłeś po raz 5 na poprawę.', b'0', 2),
(19, 'Pani Dorotka z akademika zabiła Cię na wieść, że nie masz jak zapłacić czynszu.', b'0', 3),
(20, 'Nie stać Cię już na zupkę chińską i padłeś z głodu.', b'0', 3),
(21, 'Legałeś hajs chyba każdemu w akademiku. Jeden z mieszkańców próbował ściągnąć należność siłą.', b'0', 3),
(22, 'Zatrzasnąłeś się w kabinie w kiblu. Nie masz kolegów to nie miał ci jak pomóc.', b'0', 4),
(23, 'Na imprezę poszedłeś sam a wynieśli cię w trzech. W czarnym worku.', b'0', 4),
(24, 'Na twoje urodziny nikt nie przyszedł. Umarłeś z żalu.', b'0', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `n_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `text` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `owner` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`n_id`, `title`, `text`, `date`, `owner`, `id`) VALUES
(1, 'beta_0.0.1', '*struktura bazy danych</br>*tabela users i aspects</br>*logowanie i rejestracja</br>*sha1</br>*sesja</br>*okienko z informacją o złym haśle itd</br>', '2018-11-09 22:24:21', 'KamilW + Adam + Krzysiek', 1),
(2, 'beta_0.0.2', '*supi css w okienku z info o złym haśle</br>*fontawesome</br>', '2018-11-10 16:47:19', 'KamilW', 1),
(3, 'beta_0.0.3', '*dodanie wszystkich kółek wykresowych</br>*połączenie kółek z bazą</br>*troche css', '2018-11-11 21:36:15', 'KamilW + Kacper', 1),
(4, 'beta_0.0.4', '* dodane lokalnie font-awesome', '2018-11-23 10:53:44', 'KamilW', 1),
(5, 'beta_0.0.5', 'Zmiany: <br />* poprawione logowanie, <br /> * poprawiona repsonsywnosc, <br /> * nowa strona glowna oraz strona z newsami, <br /> * nawigacja i footer na kazdej podstronie, <br /> * poprawiony styl aspektow oraz kart, <br /> * napisy na kartach z bazy danych.', '2018-12-05 18:18:09', 'Kuba', 1),
(6, 'beta_0.0.6', '* naprawione złe przekierowywanie po logowaniu,rejestracji</br>\n* poprawienie newsów </br>\n<strike>* poprawienie tego co zjebał Kuba </strike>', '2018-12-15 21:03:19', 'KamilW', 1),
(7, 'beta_0.0.7', '* Dodanie opcji języka angielskiego na wszystkich stronach na zasadzie linku i tłumaczenia poszczegónych partii tekstu', '2018-12-16 00:17:20', 'Kacper', 1),
(8, 'beta_0.0.8', '* poprawki w tłumaczeniu</br>* poprawki w rejestracji</br>* errory są w ciastkach nie w sesji', '2018-12-18 11:11:40', 'KamilW', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `question` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `answer1` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `impact1` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `answer2` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `impact2` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `questions`
--

INSERT INTO `questions` (`q_id`, `question`, `answer1`, `impact1`, `answer2`, `impact2`) VALUES
(1, 'Dostałeś supi głośniki', 'Bass na cały akademik', '6,0,0,-1', 'Słucham dyskretnie', '-1,0,0,0'),
(2, 'Skończył ci się pakiet neta', 'Kupuje', '0,0,-2,0', 'Męczę się z wifi 10kbps', '-3,0,0,0'),
(3, 'Wracasz z imprezy na drugim końcu miasta, jaki środek tranpostu wybierasz?', 'Zamawiam złotówe', '-4,0,-20,0', 'Zabieram się z ziomkiem', '5,0,0,5'),
(4, 'Co dziś na obiad?', 'Wiadomo że McDonalds', '0,0,-10,0', 'Pyszny domowy schabowy', '-4,0,0,0'),
(5, 'Zapomniałeś o projeckie na jutro', 'Biere od kolegi', '0,-10,-5,5', 'Spokojnie, wyrobię się', '0,-5,0,0'),
(6, 'Szybko, tak czy nie? Nie ma czasu na wyjaśnienia', 'Tak', '-10,-10,-1', 'Nie', '10,10,10,1'),
(7, 'Kolega ma parę historii do opowiedzenia', 'Słucham co nowego', '4,3,0,2', 'Słucham wykładowcy', '-3,8,0,0'),
(8, 'Co na śniadanie?', 'Hotdog z żabki', '0,0,-5,0', 'Kanapka z szynką', '-2,0,0,0'),
(9, 'O której dziś się kładziesz?', 'Około 23', '-5,0,0,0', 'Po 3. w nocy', '2,5,0,0'),
(10, 'Pan żul oferuje swoje mądrości w zamian za 20zł', 'Tanio, biere', '6,0,-10,7', 'Nigdy w życiu', '0,0,0,-10'),
(11, 'Znajdziesz portfel z dokumentami i kilkoma stówami', 'Zwracam właścicielowi', '-10,0,0,10', 'Ja to jednak jestem w czepku urodzony', '0,0,20,-15'),
(12, 'Budzisz się o 10:30 a zajęcia masz na 11', 'Śpię dalej', '0,-10,0,0', 'Wstaję i jadę', '-3,5,0,0'),
(13, 'Przyszedł Zawisza z prośbą o udostępnienie mu projektu', 'Ależ proszę, Zawiszo Czarny rycerzu', '0,0,10,5', 'Nie dla psa, dla pana to', '0,0,0,12'),
(14, 'Dziewczyny proponują wymienienie się projektami', 'Interesy z wami to przyjemność', '5,0,0,8', '50zł #kmwtw', '0,0,0,-14'),
(15, 'Nie masz czystych ubrań, orientujesz się w nocy', 'Robię pranie', '-3,0,-1,0', 'Wywracam na drugą stronę', '0,2,3,0'),
(16, 'Smażysz kotlety, ale nie masz oleju', 'Pożyczasz od sąsiada', '0,0,0,3', 'Zamawiasz kebaba', '0,0,-4,0'),
(17, 'Jest czwartek i masz tylko zajęcia ze Zgrzywą', 'Śpię dalej', '0,0,0,0', 'Śpię dalej', '0,0,0,0'),
(18, 'Masz zrobić sprawko, ale nie było Cię na ćwiczeniach', 'Ściągasz z neta', '0,-10,0,0', 'Prosisz kogoś o pomoc', '0,0,0,7'),
(19, 'Zepsuł Ci się telefon', 'Idę do Patryka', '0,0,-5,8', 'Kupuję nowego fona', '0,0,-15,0'),
(20, 'Trzeba zrobić stronę na bazy danych', 'Robię wraz z grupą', '5,5,0,5', 'I cyk Wordpress', '0,-5,0,-5'),
(21, 'Jakiś random proponuje Ci palenie po 2dychy', 'Jak mi dadzą to zjem', '5,0,-7,1', 'Oddalam to pytanie', '-3,0,0,-4'),
(22, 'Idziesz na imprezę', 'Wóda', '5,-5,-3,4', 'Browary', '-2,0,-1,1'),
(23, 'Kolega prosi Cię o pomoc w zadaniu z analizy', 'Nie mam czasu', '0,-3,0,-3', 'Spoko', '-2,3,0,3'),
(24, 'Wyszła nowa gra komputerowa, wszyscy koledzy grają', 'Kupuje!', '3,0,-5,0', 'Po co mi ta gra', '0,0,0,-4'),
(25, 'Koledzy zapraszają Cie na impreze, ale jesteś zmęczony', 'Idę na impreze', '3,0,-4,6', 'Idę spać', '0,0,0,-4'),
(26, 'Są wybory i możesz wziąć udział w komisji wyborczej jako praca', 'Biorę udział', '0,2,4,0', 'Nie obchodzi mnie to', '0,-3,0,0'),
(27, 'Podoba Ci się pewna dziewczyna w klubie, stawiasz jej drina?', 'Jasne', '0,0,-3,4', 'Może następnym razem', '0,0,0,-5'),
(28, 'Musisz podbić legitymacj ale kolejka jest długa, a w restauracji jeszcze przez 30 min jest happy hour', 'Podbijam legitymację', '0,3,0,0', 'Idę zjeść', '0,0,-1,0'),
(29, 'Jedziesz autobusem i łapie Cię kanar', 'Zwiewam', '5,0,0,0', 'Daje sie spisać', '0,0,-8,0'),
(30, 'Jedziesz autobusem i łapie Cię kanar', 'Zwiewam', '5,0,0,0', 'Daje sie spisać', '-3,0,-8,0'),
(31, 'Idziesz na randkę', 'Zapraszasz ją do akademika', '5,0,0,8', 'Idziesz do restauracji', '0,0,-6,5'),
(32, 'Twój lokator chrapie', 'Budzisz go', '2,0,0,-3', 'Kupujesz zatyczki do uszu', '0,0,-3,0'),
(33, 'Kolega ogarnąl towar z Meksyku', 'Bongo przed lolkiem', '5,0,0,3', 'Lolek przed bongiem', '4,0,0,4'),
(34, 'Nudne zajęcia dzisiejszego dnia', 'I tak idę, może sprawdzi obecność', '-4,2,0,0', 'Dawaj do baru na piłkarzyki', '5,-2,-1,4'),
(35, 'Masz na sprzedaż telefon', 'Sprzedajesz po znajomości', '0,0,3,2', 'Czekasz aż ktoś kupi po normalnej cenie', '0,0,5,0'),
(36, 'Zarosłeś a nie masz golarki', 'Kupuję jednorazówke', '0,0,-1,0', 'Walić, broda jest teraz modna', '0,0,0,-1'),
(37, 'Łukaszek spóźnił się na zajęcia', 'xDDD', '2,0,0,-1', 'Beka', '1,0,0,-2'),
(38, 'Dostałeś oferte dorywczej pracy w kebabie', 'To moja wielka szansa', '0,-3,9,3', 'łee obciach', '0,2,0,0'),
(39, 'Kolega prosi o "pożyczenie" projektu', 'Wysyłasz', '0,0,3,3', 'Pal wroty ziom', '0,0,0,-4'),
(40, 'Masz ochotę na pizze', 'Zrób sam', '3,0,0,0', 'Zamów', '0,0,-3,0'),
(41, 'Za 2 dni jest kolokwium', 'Uczyś się przez całe 2 dni', '-7,0,0,0', 'Będziesz Ściągał', '5,-8,0,0'),
(42, 'Musisz się uczyć, a twoi koledzy namawiają Cie na rundke w lola', 'Nexus sam sie nie obroni', '6,0,0,3', 'Będziesz Ściągał', '0,1,0,-2'),
(43, 'Jesteś w żabce i wszyscy kupujo hotdogi', 'Też kupie', '1,0,-3,0', 'Nie kupuje', '-1,0,0,0'),
(44, 'Musisz iść na zajęcia a na dworze -20 stopni', 'Idę', '-2,4,0,0', 'Nie idę', '0,-5,0,0'),
(45, 'Koncert twojego ulubionego zespołu w klubie', 'Beze mnie nie ma tego koncertu', '5,0,-5,5', 'Na yt sobie posłucham', '1,0,0,-3'),
(46, 'Są Juwenalia, będziesz pił?', 'Tak', '3,0,-3,4', 'Tak tylko po prawej', '4,0,-3,3'),
(47, 'Wyszła nowa gra chciałeś w nią zagrać ale kończy Ci się karnet na siłownie', 'Gra ważniejsza', '3,0,-3,1', 'Forma ważniejsza', '1,0,-4,0'),
(48, 'Masz do wyboru wieczór z dziewczyną albo z kolegami na imprezie', 'Dziewczyna', '2,0,0,2', 'Impreza', '4,0,-5,6'),
(49, 'Wypiles na imprezie, a dziewczyna która mieszka daleko zaprasza na wieczór', 'Jedziesz po pijaku', '10,-5,0,5', 'Wracasz do domu', '-8,0,0,-5'),
(50, 'Poznales dziewczyne, która lubi drogie restauracje, ale potrafi to wynagrodzić', 'Idziesz do restauracji', '5,0,-8,6', 'Zostajesz', '-3,2,0,-4'),
(51, 'Wykladowca zbiera chetnych do udziału w projekcie', 'Bierzesz udział', '-2,5,0,0', 'Nie bierzesz', '0,-3,0,0'),
(52, 'Jutro kolos a ty zupełnie nic nie umiesz', 'Biały wąż', '0,10,0,0', 'Jakoś to będzie', '0,-7,0,0'),
(53, 'Na imprezie grasz w ruletkę, do wygrania 100 zł', 'Czarny', '5,0,15,0', 'Biały', '-5,0,0,0'),
(54, 'Czujesz sie juz moocno wstawiony, kolega proponuje kolejną kolejke', 'Pije', '2,0,0,2', 'Odmawiam', '0,0,0,-6'),
(55, 'Dziewczyna pyta Cie o swoje zainteresowania', 'Lubię pociągi', '0,0,0,4', 'Informatyka', '0,0,0,-3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ranking`
--

CREATE TABLE `ranking` (
  `id_ranking` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `live` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ranking`
--

INSERT INTO `ranking` (`id_ranking`, `name`, `live`) VALUES
(1, 'admin', 34);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `usrs`
--

CREATE TABLE `usrs` (
  `id_users` int(11) NOT NULL,
  `nickname` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `permissions` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `usrs`
--

INSERT INTO `usrs` (`id_users`, `nickname`, `email`, `password`, `permissions`) VALUES
(1, 'admin', 'admin@admin.pl', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1),
(2, 'andrzej', 'andrzej@nowak.pl', 'f353ae2ff6d7a0fb7635d6cb79f01602a42dd26c', 1),
(3, 'juan', 'juan@pablito.com', '5c5b40b9e97090946ed98ea7c27c140f65020540', 1),
(4, 'janpawel2', 'jan@pawel.pl', '952293562bee98f53e554d6e37167be9c1195d0e', 1),
(5, 'Jan', 'pawel@o2.pl', 'dc0199d2807caf8ccae0ad055fd38f9cf0323ad5', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `aspects`
--
ALTER TABLE `aspects`
  ADD PRIMARY KEY (`id_aspects`),
  ADD UNIQUE KEY `id_aspects` (`id_aspects`),
  ADD UNIQUE KEY `id_users` (`id_users`);

--
-- Indexes for table `dead`
--
ALTER TABLE `dead`
  ADD PRIMARY KEY (`id_dead`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_ranking`);

--
-- Indexes for table `usrs`
--
ALTER TABLE `usrs`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `aspects`
--
ALTER TABLE `aspects`
  MODIFY `id_aspects` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `dead`
--
ALTER TABLE `dead`
  MODIFY `id_dead` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT dla tabeli `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT dla tabeli `usrs`
--
ALTER TABLE `usrs`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `aspects`
--
ALTER TABLE `aspects`
  ADD CONSTRAINT `aspects_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `usrs` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
