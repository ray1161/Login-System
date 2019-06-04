-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-05-31 11:45:54
-- 服务器版本： 10.1.40-MariaDB
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `accounts`
--

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE `account` (
  `username` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`username`, `password`) VALUES
('admin', '0000'),
('tom@gmail.com', '1234'),
('peter@gmail.com', 'peter');

-- --------------------------------------------------------

--
-- 表的结构 `orderlist`
--

CREATE TABLE `orderlist` (
  `orderID` int(100) NOT NULL,
  `account` varchar(200) COLLATE utf8_bin NOT NULL,
  `productID` int(11) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `orderlist`
--

INSERT INTO `orderlist` (`orderID`, `account`, `productID`, `amount`) VALUES
(2, 'tom@gmail.com', 11, 10),
(1, 'tom@gmail.com', 25, 5),
(3, 'tom@gmail.com', 15, 2),
(1, 'tom@gmail.com', 10, 3),
(111, 'tom@gmail.com', 1, 11),
(111, 'tom@gmail.com', 1, 1111),
(1, 'tom@gmail.com', 22, 33),
(22, 'peter@gmail.com', 33, 44),
(11, 'tom@gmail.com', 123, 444),
(2, 'tom@gmail.com', 4, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
