-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Jan 12. 09:45
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `beyou`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `colors`
--

CREATE TABLE `colors` (
  `color_ID` int(11) NOT NULL,
  `color_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `colors`
--

INSERT INTO `colors` (`color_ID`, `color_Name`) VALUES
(1, 'Yellow'),
(2, 'Gray'),
(3, 'Pink gold');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `materials`
--

CREATE TABLE `materials` (
  `material_ID` int(11) NOT NULL,
  `material_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `materials`
--

INSERT INTO `materials` (`material_ID`, `material_Name`) VALUES
(1, 'Gold'),
(2, 'Silver'),
(3, 'Rosegold');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Received','Processing','Shipped') DEFAULT 'Received'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`order_ID`, `user_ID`, `order_date`, `status`) VALUES
(2, 2, '2024-01-11 12:39:56', 'Received');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_items`
--

CREATE TABLE `order_items` (
  `order_item_ID` int(11) NOT NULL,
  `order_ID` int(11) DEFAULT NULL,
  `product_ID` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `status` enum('Cart','Order') DEFAULT 'Cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `order_items`
--

INSERT INTO `order_items` (`order_item_ID`, `order_ID`, `product_ID`, `quantity`, `item_price`, `user_ID`, `status`) VALUES
(62, 2, 4, 3, 24500.00, 2, 'Cart'),
(65, 2, 7, 3, 60500.00, 2, 'Cart');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `product_ID` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `color_ID` int(11) DEFAULT NULL,
  `type_ID` int(11) DEFAULT NULL,
  `material_ID` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `color_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`product_ID`, `product_name`, `price`, `description`, `stock`, `color_ID`, `type_ID`, `material_ID`, `image`, `color_name`) VALUES
(2, 'Pandora Moments szikrázó koronás O és kígyólánc karkötő', 70500.00, 'Legyen ragyogó minden pillanatod a Pandora Moments szikrázó koronás O és kígyólánc karkötővel! A 14 karátos arannyal futtatott különleges fémötvözetünkből készült karkötő kapcsát az ikonikus Pandora koronás O monogram és szikrázó cirkónia pavé díszítik, m', 6, 1, 3, 1, 'kar_aranykorona.png', NULL),
(3, 'Pandora Moments hengerkapcsos kígyólánc karkötő', 21200.00, 'Ez a sterling ezüst, hengerkapcsos kígyólánc karkötő emlékeztessen arra, hogy ne felejtsd el, honnan jössz! A Pandora örökségének része a hengerkapocs, amely már az első kígyólánc karkötőinknek is része volt. Ezért most modern változatban, elegánsabb rész', 12, 2, 3, 2, 'kar_hengerkapocs.png', NULL),
(4, 'Pandora Moments végtelen csomó kígyólánc karkötő', 24500.00, 'Az anya és gyermeke közötti kötelék által inspirált Pandora Moments végtelen csomó kígyólánc karkötő jellegzetessége egy aszimmetrikus végtelen csomó, amely egyben kapocsként szolgál. A két kiugró szálfonat három részre osztja a karkötőt. Az örökké tartó ', 17, 2, 3, 2, 'kar_kigyolanc.png', NULL),
(5, 'Pandora ME kis szemű láncos karkötő', 21200.00, 'Kapcsold össze azt, amit szeretsz, ahogy eddig még soha! A sterling ezüst Pandora ME kis szemű láncos karkötőnk végtelen stíluslehetőségeket tartogat, és új dimenziót visz stílusodba. A dizájn két nagyobb nyitható kapoccsal rendelkezik, melyeket egy dupla', 4, 2, 3, 2, 'kar_lancos.png', NULL),
(7, 'Pandora Moments szegecselt láncos karkötő', 60500.00, 'Újítsd meg a kollekciódat a Pandora Moments szegecselt kigyólánc karkötővel, amely 14 karátos rózsaarannyal futtatott innovatív fémötveözetünkből készült. A kézzel megmunkált, sterling ezüst karkötőt rugalmas, texturált lánc és végtelenjel részletű, nyith', 5, 3, 3, 3, 'kar_rosegoldszegecseltlancos.png', NULL),
(8, 'Dupla szív szikrázó gyűrű', 31800.00, 'A Dupla szív szikrázó gyűrűt két szív alakú, áttetsző cirkónia díszíti, amelyek különböző szögben simulnak egymáshoz az anya és gyermeke közötti szeretetet szimbolizálva. A gyűrűsínt egy fél sor pavé díszíti, amely aszimmetrikusan kapcsolódik a két szívhe', 7, 2, 1, 2, 'gyuru_duplasziv.png', NULL),
(9, ' Szikrázó hópehely nyaklánc', 24500.00, 'Ünnepeld azt, ami mindannyiunkat egyedivé tesz ezzel a sterling ezüst hópehely medállal díszített Szikrázó hópehely nyaklánccal! A szikrázó, áttetsző cirkónia kövekkel, valamint kivágott és nyomott díszítőelemekkel rendelkező, részletgazdag ékszer a téli ', 13, 2, 2, 2, 'nyak_hopehely.png', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `address_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`address_ID`, `user_ID`, `country`, `postal_code`, `street_address`, `city`) VALUES
(1, 1, 'Hungary', '5142', 'Test street 32', 'Test city'),
(2, 2, 'Hungary', '4214', 'Test Street 23', 'Test City'),
(3, 3, 'Ffsafsa', '51244', 'Ffsafsadas', 'Gfssad');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `table_admin`
--

CREATE TABLE `table_admin` (
  `admin_ID` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `table_admin`
--

INSERT INTO `table_admin` (`admin_ID`, `admin_username`, `admin_password`, `admin_name`, `admin_email`, `admin_phone_number`) VALUES
(1, 'testadmin', '$2y$10$HT4Z3BKv9h8tAeozR0lSrud8hMMGFMRCsVT9kowbI3XtBFUCJkEme', 'Admin Name', 'testadmin@gmail.com', '06204365664');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `types`
--

CREATE TABLE `types` (
  `type_ID` int(11) NOT NULL,
  `type_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `types`
--

INSERT INTO `types` (`type_ID`, `type_Name`) VALUES
(1, 'Ring'),
(2, 'Necklace'),
(3, 'Bracelet'),
(4, 'Charm');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_table`
--

CREATE TABLE `user_table` (
  `user_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `user_table`
--

INSERT INTO `user_table` (`user_ID`, `name`, `gender`, `birthdate`, `email`, `phone_number`, `username`, `password`, `ip_address`) VALUES
(1, 'Test name', 'Male', '2002-03-02', 'test@gmail.com', '054214214', 'test', '$2y$10$gxsQjM3pNwkB5mJ1PZZEzOxw0urZz2C47QDuKwX1w6o98I2xK6Y2C', '127.0.0.1'),
(2, 'Peter Arpad', 'Male', '2001-03-23', 'testuser@gmail.com', '06214214124', 'testuser', '$2y$10$9sZN0XuhNtqH8QBhxuKrzuGAivI3RpmhW1jihEPmyBQ/.K9yamkL.', '127.0.0.1'),
(3, 'User Admin', 'Male', '2001-02-01', 'useradmin@gmail.com', '51252112', 'useradmin', '$2y$10$HT4Z3BKv9h8tAeozR0lSrud8hMMGFMRCsVT9kowbI3XtBFUCJkEme', '::1');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_ID`);

--
-- A tábla indexei `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_ID`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- A tábla indexei `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_ID`),
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `product_ID` (`product_ID`),
  ADD KEY `fk_order_items_user` (`user_ID`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`),
  ADD KEY `color_ID` (`color_ID`),
  ADD KEY `type_ID` (`type_ID`),
  ADD KEY `material_ID` (`material_ID`);

--
-- A tábla indexei `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`address_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- A tábla indexei `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- A tábla indexei `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_ID`);

--
-- A tábla indexei `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `colors`
--
ALTER TABLE `colors`
  MODIFY `color_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `materials`
--
ALTER TABLE `materials`
  MODIFY `material_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `address_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `types`
--
ALTER TABLE `types`
  MODIFY `type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_table` (`user_ID`);

--
-- Megkötések a táblához `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_items_user` FOREIGN KEY (`user_ID`) REFERENCES `user_table` (`user_ID`),
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_ID`) REFERENCES `products` (`product_ID`);

--
-- Megkötések a táblához `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`color_ID`) REFERENCES `colors` (`color_ID`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`type_ID`) REFERENCES `types` (`type_ID`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`material_ID`) REFERENCES `materials` (`material_ID`);

--
-- Megkötések a táblához `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD CONSTRAINT `shipping_addresses_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_table` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
