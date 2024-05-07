-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 11, 2023 at 01:07 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmagaj_projektbd`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `nr_telefonu` varchar(9) NOT NULL,
  `e-mail` varchar(40) NOT NULL,
  `adres` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `imie`, `nazwisko`, `nr_telefonu`, `e-mail`, `adres`) VALUES
(1, 'Mikołaj', 'Magaj', '542920120', 'mmagaj@gmail.com', 'Żyrardowska 65,\r\n54-321 Wrocław\r\nPolska'),
(2, 'Kamil', 'Zdun', '690438567', 'kamilzdun@wp.pl', 'ul. Warszawska 43b/1,\r\n60-233 Oleśnica\r\nPolska'),
(3, 'Aleksandra', 'Nowak', '521409450', 'aleksakowan@gmail.com', 'ul. Spacerowa 4\r\n98-400 Mirków\r\nPolska');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazyn`
--

CREATE TABLE `magazyn` (
  `id_magazynu` int(11) NOT NULL,
  `adres` varchar(150) NOT NULL,
  `nr_telefonu` varchar(9) NOT NULL,
  `e-mail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `magazyn`
--

INSERT INTO `magazyn` (`id_magazynu`, `adres`, `nr_telefonu`, `e-mail`) VALUES
(1, 'ul. Legnicka 45a\r\n54-241 Wrocław\r\nPolska', '615909615', 'magazyn1@firma.com'),
(2, 'ul. Legnicka 45b\r\n54-241 Wrocław\r\nPolska', '614909614', 'magazyn2@firma.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `ilosc_laczna` int(11) NOT NULL,
  `opis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `nazwa`, `cena`, `ilosc_laczna`, `opis`) VALUES
(1, 'Czajnik elektryczny', 79.99, 40, 'Biały nowoczesny czajnik elektryczny z funkcją ustawiania temperatury'),
(2, 'Leżak ogrodowy', 120.00, 3, 'Rozkładany drewniany leżak, idealny do odpoczynku w upalne dni'),
(3, 'Rama na obraz 20x40', 21.50, 25, 'Rama na obraz z plastikową nakładką, do powieszenia na ścianie o wymiarach 20x40 cm'),
(4, 'Termos czarny 500ml', 19.99, 10, 'Czarny termos z kubkiem o pojemności 500ml');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty_magazyn`
--

CREATE TABLE `produkty_magazyn` (
  `produkt_id` int(11) NOT NULL,
  `magazyn_id` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produkty_magazyn`
--

INSERT INTO `produkty_magazyn` (`produkt_id`, `magazyn_id`, `ilosc`) VALUES
(1, 1, 40),
(2, 2, 3),
(3, 1, 10),
(3, 2, 15),
(4, 1, 1),
(4, 2, 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `klient_id` int(11) NOT NULL,
  `data_zamowienia` date NOT NULL,
  `kwota` decimal(10,2) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zamowienia`
--

INSERT INTO `zamowienia` (`id_zamowienia`, `klient_id`, `data_zamowienia`, `kwota`, `status`) VALUES
(1, 1, '2023-05-12', 79.99, 'opłacone'),
(2, 3, '2023-05-16', 141.50, 'wysłane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia_produkty`
--

CREATE TABLE `zamowienia_produkty` (
  `produkt_id` int(11) NOT NULL,
  `zamowienie_id` int(11) NOT NULL,
  `sztuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zamowienia_produkty`
--

INSERT INTO `zamowienia_produkty` (`produkt_id`, `zamowienie_id`, `sztuk`) VALUES
(1, 1, 1),
(3, 2, 1),
(2, 2, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `magazyn`
--
ALTER TABLE `magazyn`
  ADD PRIMARY KEY (`id_magazynu`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`);

--
-- Indeksy dla tabeli `produkty_magazyn`
--
ALTER TABLE `produkty_magazyn`
  ADD KEY `produkt_id` (`produkt_id`),
  ADD KEY `magazyn_id` (`magazyn_id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `klient_id` (`klient_id`);

--
-- Indeksy dla tabeli `zamowienia_produkty`
--
ALTER TABLE `zamowienia_produkty`
  ADD KEY `zamowienie_id` (`zamowienie_id`),
  ADD KEY `produkt_id` (`produkt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `magazyn`
--
ALTER TABLE `magazyn`
  MODIFY `id_magazynu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produkty_magazyn`
--
ALTER TABLE `produkty_magazyn`
  ADD CONSTRAINT `produkty_magazyn_ibfk_1` FOREIGN KEY (`magazyn_id`) REFERENCES `magazyn` (`id_magazynu`),
  ADD CONSTRAINT `produkty_magazyn_ibfk_2` FOREIGN KEY (`produkt_id`) REFERENCES `produkty` (`id_produktu`);

--
-- Constraints for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `klient-zamowienie` FOREIGN KEY (`klient_id`) REFERENCES `klienci` (`id_klienta`);

--
-- Constraints for table `zamowienia_produkty`
--
ALTER TABLE `zamowienia_produkty`
  ADD CONSTRAINT `zamowienia_produkty_ibfk_1` FOREIGN KEY (`zamowienie_id`) REFERENCES `zamowienia` (`id_zamowienia`),
  ADD CONSTRAINT `zamowienia_produkty_ibfk_2` FOREIGN KEY (`produkt_id`) REFERENCES `produkty` (`id_produktu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
