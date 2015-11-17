-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Lis 2015, 20:20
-- Wersja serwera: 10.0.17-MariaDB
-- Wersja PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `portfel`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `ID_kategorii` int(11) NOT NULL,
  `nazwa_kategorii` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`ID_kategorii`, `nazwa_kategorii`) VALUES
(1, 'zakupy'),
(2, 'rozrywka'),
(3, 'transport'),
(4, 'uslugi'),
(5, 'rachunki'),
(6, 'pozostale');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `Id_uzytkownika` int(11) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `login` text NOT NULL,
  `haslo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`Id_uzytkownika`, `imie`, `nazwisko`, `login`, `haslo`) VALUES
(1, 'Jarek', 'Kusibab', 'quil', 'qwerty');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wydatki`
--

CREATE TABLE `wydatki` (
  `ID_wydatku` int(11) NOT NULL,
  `ID_kategorii` int(11) NOT NULL,
  `ID_uzytkownika` int(11) NOT NULL,
  `data` date NOT NULL,
  `miejsce` text NOT NULL,
  `kwota` float NOT NULL,
  `notatka` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`ID_kategorii`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`Id_uzytkownika`);

--
-- Indexes for table `wydatki`
--
ALTER TABLE `wydatki`
  ADD PRIMARY KEY (`ID_wydatku`),
  ADD KEY `ID_kategorii` (`ID_kategorii`),
  ADD KEY `ID_uzytkownika` (`ID_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `ID_kategorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `Id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `wydatki`
--
ALTER TABLE `wydatki`
  MODIFY `ID_wydatku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wydatki`
--
ALTER TABLE `wydatki`
  ADD CONSTRAINT `wydatki_ibfk_1` FOREIGN KEY (`ID_uzytkownika`) REFERENCES `uzytkownicy` (`Id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wydatki_ibfk_2` FOREIGN KEY (`ID_kategorii`) REFERENCES `kategorie` (`ID_kategorii`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
