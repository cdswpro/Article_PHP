-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Mar 2022, 12:04
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `article`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `article`
--

CREATE TABLE `article` (
  `ID` int(11) NOT NULL,
  `Title` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Content` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `Stat` tinyint(1) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `article`
--

INSERT INTO `article` (`ID`, `Title`, `Content`, `Stat`, `User_ID`) VALUES
(1, 'Dobre Gry', 'Przedstawiam listę gier wartych uwagi.\n1.Wiedźmin 3 Dziki Gon.\n2.Fifa 21.\n3.Kingdom Two Crowns\n4.Cyberpunk 2077\n\nKażdy powinien zagrać.\n', 1, 1),
(2, 'Robert Lewandowski kończy z Huawei', 'Odcięcie się kapitana reprezentacji Polski w piłce nożnej od Huawei może być pokłosiem ostatnich doniesień dotyczących chińskiej firmy i jej rzekomego wsparcia udzielanego rządowi Rosji. W tle kontrakt na kwotę nawet 5 milionów euro rocznie.\r\n\r\nCiemne chmury wiszą dziś nad Huawei\r\nTrwająca od 2015 roku współpraca Huawei z Robertem Lewandowskim została dziś rozwiązana ze skutkiem natychmiastowym. Jednocześnie wstrzymane zostały wszelkie działania marketingowe, w których brał udział kapitan reprezentacji Polski.', 1, 1),
(3, 'Dodawanie artykułu', 'Aby dodać artykuł trzeba przejść do zakładki dodaj', 0, 1),
(4, 'Nowy windows już nadchodzi', 'Trwają prace nad najnowszą wersją systemu windows. Ma zostać nazwany Windows12', 1, 1),
(7, 'erthdrtdhrdrhdrh', 'drhdrhrddrhdrhdrhdrhdrhdrhdrhdrhdrhdrhdrhrdrhdrthsxdrhsdrhsdrh', 1, 1),
(8, 'yhjrtmmrmftfmtftmftmftm', 'hellodwawdawdawdawdawd world segbsegbsebsebsebsebsebseb\r\ndocument.write(1);', 1, 1),
(11, 'dodajemy kolejny artykuł', 'dodajemy kolejny artykułdodajemy kolejny artykułdodajemy kolejny artykułdodajemy kolejny artykułdodajemy kolejny artykułdodajemy kolejny artykuł', 1, 2),
(12, 'sasddawawdawdasfwea', 'sasddawawdawdasfweasasddawawdawdasfweasasddawawdawdasfweasasddawawdawdasfweasasddawawdawdasfwea', 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Login` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `Pass` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `Login`, `Pass`) VALUES
(1, 'admin', '$2y$10$Y0HMy3EEaLqQMDe5RMVXWeLLLCuYt3mT5pu01xAs7a/430RTMnKgu'),
(2, 'erykeryk', '$2y$10$zdlQBlhjHgl5yeN.9h7Cb.cybXi3EAVY3dP9gYnI5wLK9k11qOtF.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Stat` (`Stat`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `article`
--
ALTER TABLE `article`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
