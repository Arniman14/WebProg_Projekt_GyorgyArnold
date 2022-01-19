-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Dec 07. 08:53
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `api`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `tarsasag` varchar(100) NOT NULL,
  `indulvaros` varchar(100) NOT NULL,
  `erkezvaros` varchar(100) NOT NULL,
  `indulidopont` date NOT NULL,
  `erkezidopont` date NOT NULL,
  `ar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `flights`
--

INSERT INTO `flights` (`id`, `tarsasag`, `indulvaros`, `erkezvaros`, `indulidopont`, `erkezidopont`, `ar`) VALUES
(1, 'Wizz Air', 'Budapest', 'London', '2020-02-12', '2020-02-13', 1500),
(2, 'Wizz Air', 'Budapest', 'London', '2020-02-13', '2020-02-14', 1480),
(3, 'Wizz Air', 'Bukarest', 'New York', '2020-02-13', '2020-02-14', 2210),
(4, 'American Airlines', 'New York', 'London', '2020-04-30', '0000-00-00', 2000),
(5, 'American Airlines', 'New York', 'New Zaeland', '2020-05-01', '2020-05-01', 1000),
(6, 'Fly Emirates', 'Budapest', 'Dubai', '2020-05-01', '2020-05-01', 3000),
(7, 'Fly Emirates', 'London', 'Dubai', '2020-06-21', '2020-06-22', 3400);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isadmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `isadmin`) VALUES
(1, 'shooper@user.com', '6b1bb8672f8d99abf79a560a31a7b08c', 0),
(2, 'user1@user.com', '661bb8672f8d99abf79a560a31a7b082', 0),
(3, 'user2@user.com', '761bb8672f8d99abf79a560a31a7b083', 0),
(4, 'shopadmin@shop.com', '661bb8672f8d99abf79a560a31a7b081', 1),
(5, 'shophelper@shop.com', '361bb8672f8d99abf79a560a31a7b08c', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
