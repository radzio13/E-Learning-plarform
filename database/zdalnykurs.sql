-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Cze 2020, 16:38
-- Wersja serwera: 10.3.22-MariaDB-54+deb10u1
-- Wersja PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `zdalnykurs`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(4) NOT NULL DEFAULT 0,
  `choice` text COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Zrzut danych tabeli `choices`
--

INSERT INTO `choices` (`id`, `question_number`, `is_correct`, `choice`) VALUES
(1, 1, 1, 'Poprawna'),
(2, 1, 0, 'Niepoprawna'),
(3, 1, 0, 'Niepoprawna'),
(4, 1, 0, 'Niepoprawna'),
(5, 2, 0, 'Niepoprawna'),
(6, 2, 1, 'Poprawna'),
(7, 2, 0, 'Niepoprawna'),
(8, 3, 0, 'Niepoprawna'),
(9, 3, 0, 'Niepoprawna'),
(10, 3, 0, 'Niepoprawna'),
(11, 3, 1, 'Poprawna'),
(22, 4, 1, 'Jest super'),
(23, 4, 0, 'tak'),
(24, 4, 0, 'nie '),
(25, 4, 0, 'nie super'),
(26, 4, 0, 'nie nie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategorii` int(3) NOT NULL,
  `temat` varchar(50) NOT NULL,
  `data_dodania` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kategorii`, `temat`, `data_dodania`) VALUES
(1, 'Informatyka', '2020-04-25 12:14:32'),
(2, 'Biologia', '2020-04-25 12:44:43'),
(3, 'Chemia', '2020-04-25 13:00:11');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `id_komentarza` int(3) NOT NULL,
  `id_kursu` int(3) NOT NULL,
  `login` varchar(30) NOT NULL,
  `tresc_kom` varchar(250) NOT NULL,
  `data_dodania` datetime DEFAULT current_timestamp(),
  `ocena` int(1) DEFAULT NULL,
  `zatwierdzony` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`id_komentarza`, `id_kursu`, `login`, `tresc_kom`, `data_dodania`, `ocena`, `zatwierdzony`) VALUES
(1, 1, 'admin', 'Super', '2020-04-02 16:59:52', 5, 1),
(2, 1, 'admin', 'Elegancko', '2020-04-02 17:00:36', 5, 1),
(4, 1, 'test101', 'Jest naprawdę super!', '2020-05-12 15:03:41', 5, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kursy`
--

CREATE TABLE `kursy` (
  `id_kursu` int(3) NOT NULL,
  `temat` varchar(50) NOT NULL,
  `tresc` varchar(20000) NOT NULL,
  `data_dodania` datetime DEFAULT current_timestamp(),
  `sposob` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kursy`
--

INSERT INTO `kursy` (`id_kursu`, `temat`, `tresc`, `data_dodania`, `sposob`) VALUES
(1, 'Lekcja 1', '    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum sjfioajfspasfpo\r\n<br> \r\n<img src=\"https://www.psy.pl/wp-content/uploads/2017/05/szczesliwy-pies.jpg\"> ', '2020-04-02 19:39:01', 1),
(4, 'Lekcja 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2020-04-02 19:39:01', 2),
(3, 'Lekcja 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2020-04-02 19:39:01', 3),
(2, 'Lekcja 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2020-04-02 19:39:01', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lekcje`
--

CREATE TABLE `lekcje` (
  `id_lekcji` int(3) NOT NULL,
  `temat` varchar(50) NOT NULL,
  `data_dodania` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `lekcje`
--

INSERT INTO `lekcje` (`id_lekcji`, `temat`, `data_dodania`) VALUES
(1, 'Bazy danych', '2020-05-12 14:07:59'),
(2, 'PHP', '2020-05-12 14:08:10'),
(3, 'Sieciowe', '2020-05-12 14:08:20');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `id_kursu` int(3) NOT NULL,
  `ocena` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `oceny`
--

INSERT INTO `oceny` (`id_kursu`, `ocena`) VALUES
(1, 5),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `question` text COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Zrzut danych tabeli `questions`
--

INSERT INTO `questions` (`question_number`, `question`) VALUES
(1, 'Jakaś treść pytania 1'),
(2, 'Jakaś treść pytania 2'),
(3, 'Jakaś treść pytania 3'),
(4, 'Czy może być?');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(3) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(20) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `stanowisko` varchar(30) DEFAULT 'Czlonek',
  `sposob_uczenia` varchar(20) NOT NULL DEFAULT 'brak'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `email`, `stanowisko`, `sposob_uczenia`) VALUES
(1, 'admin', 'admin', 'projekt_moodle@wp.pl', 'Admin', 'wzrokowiec'),
(2, 'Jan', 'qwerty', 'janek123@wp.pl', 'Admin', ''),
(3, 'user', 'user1', '', 'Moderator', 'wzrokowiec'),
(5, 'admin1', 'admin1', 'ss', 'Czlonek', 'wzrokowiec'),
(6, 'user2', 'user2', 'user2@gmail.com', 'Czlonek', 'dzialanowiec'),
(7, 'user3', 'user3', 'xd', 'Czlonek', 'wzrokowiec'),
(8, 'kowalski', 'kowalski', 'kowalski@abc.pl', 'Czlonek', 'wzrokowiec'),
(9, 'nowicka', 'nowicka', 'nowicka@abc.pl', 'Czlonek', 'wzrokowiec'),
(10, 'qwery', 'qwerty', '', 'Czlonek', 'sluchowiec'),
(12, 'test101', 'test1011', 'tak@wp.pl', 'Czlonek', 'wzrokowiec'),
(11, 'qwe', 'qwe', '', 'Czlonek', 'sluchowiec'),
(13, 'asdfg', 'asdfg', 'asdfg@o2.pl', 'Czlonek', 'wzrokowiec');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategorii`);

--
-- Indexes for table `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`id_komentarza`);

--
-- Indexes for table `kursy`
--
ALTER TABLE `kursy`
  ADD PRIMARY KEY (`id_kursu`);

--
-- Indexes for table `lekcje`
--
ALTER TABLE `lekcje`
  ADD PRIMARY KEY (`id_lekcji`);

--
-- Indexes for table `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`id_kursu`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_number`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategorii` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `id_komentarza` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `kursy`
--
ALTER TABLE `kursy`
  MODIFY `id_kursu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT dla tabeli `lekcje`
--
ALTER TABLE `lekcje`
  MODIFY `id_lekcji` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `id_kursu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
