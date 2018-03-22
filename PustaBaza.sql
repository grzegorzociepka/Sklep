-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Mar 2018, 17:50
-- Wersja serwera: 10.1.16-MariaDB
-- Wersja PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `elementy_transakcji`
--

CREATE TABLE `elementy_transakcji` (
  `elementy_transakcjiID` int(11) NOT NULL,
  `transakcjeID` int(11) NOT NULL,
  `towaryID` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `cena_netto` int(11) NOT NULL,
  `cena_brutto` int(11) NOT NULL,
  `wartosc` int(11) NOT NULL,
  `status_elementuID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `kategorieID` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta`
--

CREATE TABLE `konta` (
  `kontoID` int(11) NOT NULL,
  `statusID` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `miejscowosc` text COLLATE utf8_polish_ci NOT NULL,
  `wiek` int(11) NOT NULL,
  `województwo` text COLLATE utf8_polish_ci NOT NULL,
  `adres` text COLLATE utf8_polish_ci NOT NULL,
  `kod_pocztowy` char(7) COLLATE utf8_polish_ci NOT NULL,
  `poczta` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `podkategorie`
--

CREATE TABLE `podkategorie` (
  `podkategorieID` int(11) NOT NULL,
  `kategorieID` int(11) NOT NULL,
  `nazwapk` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status`
--

CREATE TABLE `status` (
  `statusID` int(11) NOT NULL,
  `administrator` int(11) NOT NULL,
  `operator` int(11) NOT NULL,
  `klient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_elementu`
--

CREATE TABLE `status_elementu` (
  `status_elementuID` int(11) NOT NULL,
  `nazwa_elementu` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_transakcji`
--

CREATE TABLE `status_transakcji` (
  `status_transakcjiID` int(11) NOT NULL,
  `nazwa_transakcji` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towary`
--

CREATE TABLE `towary` (
  `towaryID` int(11) NOT NULL,
  `podkategorieID` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `cena_netto` float NOT NULL,
  `stawka_vat` float NOT NULL,
  `cena_brutto` float NOT NULL,
  `imageLink` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcje`
--

CREATE TABLE `transakcje` (
  `transakcjeID` int(11) NOT NULL,
  `kontoID` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `status_transakcjiID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `elementy_transakcji`
--
ALTER TABLE `elementy_transakcji`
  ADD PRIMARY KEY (`elementy_transakcjiID`),
  ADD KEY `elementy_transakcjiID` (`elementy_transakcjiID`),
  ADD KEY `transakcjeID` (`transakcjeID`),
  ADD KEY `ilosc` (`ilosc`),
  ADD KEY `status_elementuID` (`status_elementuID`),
  ADD KEY `towaryID` (`towaryID`);

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`kategorieID`),
  ADD KEY `kategorieID` (`kategorieID`);

--
-- Indexes for table `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`kontoID`),
  ADD KEY `kontoID` (`kontoID`),
  ADD KEY `statusID` (`statusID`);

--
-- Indexes for table `podkategorie`
--
ALTER TABLE `podkategorie`
  ADD PRIMARY KEY (`podkategorieID`),
  ADD KEY `podkategorieID` (`podkategorieID`),
  ADD KEY `kategorieID` (`kategorieID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusID`),
  ADD KEY `statusID` (`statusID`);

--
-- Indexes for table `status_elementu`
--
ALTER TABLE `status_elementu`
  ADD PRIMARY KEY (`status_elementuID`),
  ADD KEY `status_elementuID` (`status_elementuID`);

--
-- Indexes for table `status_transakcji`
--
ALTER TABLE `status_transakcji`
  ADD PRIMARY KEY (`status_transakcjiID`),
  ADD KEY `status_transakcjiID` (`status_transakcjiID`);

--
-- Indexes for table `towary`
--
ALTER TABLE `towary`
  ADD PRIMARY KEY (`towaryID`),
  ADD KEY `towaryID` (`towaryID`),
  ADD KEY `podkategorieID` (`podkategorieID`);

--
-- Indexes for table `transakcje`
--
ALTER TABLE `transakcje`
  ADD PRIMARY KEY (`transakcjeID`),
  ADD KEY `transakcjeID` (`transakcjeID`),
  ADD KEY `status_transakcjiID` (`status_transakcjiID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `elementy_transakcji`
--
ALTER TABLE `elementy_transakcji`
  MODIFY `elementy_transakcjiID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `kategorieID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `konta`
--
ALTER TABLE `konta`
  MODIFY `kontoID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `podkategorie`
--
ALTER TABLE `podkategorie`
  MODIFY `podkategorieID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `status`
--
ALTER TABLE `status`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `status_elementu`
--
ALTER TABLE `status_elementu`
  MODIFY `status_elementuID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `status_transakcji`
--
ALTER TABLE `status_transakcji`
  MODIFY `status_transakcjiID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `towary`
--
ALTER TABLE `towary`
  MODIFY `towaryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  MODIFY `transakcjeID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
