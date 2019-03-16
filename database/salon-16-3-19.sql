-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 16, 2019 at 11:20 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `password`, `is_admin`, `last_ip`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'arm', 'account', 'arm.wurfel@gmail.com', '03001234567', '$2y$10$dDEb1pRY4fjole667ISDd.8yC2XRWjyA77pYcm1IOwJ6ZG5miQ9J.', 1, '', '2019-03-11 00:00:00', '2019-03-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

DROP TABLE IF EXISTS `appoinments`;
CREATE TABLE IF NOT EXISTS `appoinments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `appoinment_date` date NOT NULL,
  `appoinment_time` time NOT NULL,
  `appoinment_status` tinyint(4) NOT NULL,
  `comments` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`id`, `product_id`, `customer_id`, `appoinment_date`, `appoinment_time`, `appoinment_status`, `comments`, `created_at`, `updated_at`) VALUES
(1, 2, 9, '2019-03-19', '12:00:00', 0, 'test service updated', '2019-03-16 10:03:24', '2019-03-16 10:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `assign_tasks`
--

DROP TABLE IF EXISTS `assign_tasks`;
CREATE TABLE IF NOT EXISTS `assign_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `task_date` datetime NOT NULL,
  `task_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_tasks`
--

INSERT INTO `assign_tasks` (`id`, `task_id`, `worker_id`, `task_date`, `task_status`, `created_at`, `updated_at`) VALUES
(3, 1, 11, '2019-03-19 00:00:00', 1, '2019-03-10 09:03:06', '2019-03-11 05:03:46'),
(2, 0, 0, '2019-03-15 00:00:00', 0, '2019-03-10 09:03:12', '2019-03-10 09:03:12'),
(8, 2, 6, '2019-03-16 00:00:00', 0, '2019-03-11 05:03:14', '2019-03-11 05:03:14'),
(7, 1, 1, '2019-03-11 00:00:00', 1, '2019-03-10 10:03:10', '2019-03-10 10:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(70) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_stock` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `product_stock`, `created_at`, `updated_at`) VALUES
(1, 'Cut & Style 1', 'Clipper, taper + fade with minimal styling ', '2000.00', 60, '2019-03-10 05:03:54', '2019-03-10 05:03:36'),
(2, 'Cut & Style 2', 'Short to long hair with styling', '1000.00', 1000, '2019-03-10 06:03:02', '2019-03-10 06:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(70) NOT NULL,
  `task_description` text NOT NULL,
  `task_price` decimal(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `task_description`, `task_price`, `created_at`, `updated_at`) VALUES
(1, 'Cut & Style 1', 'Clipper, taper + fade with minimal styling ', '700.00', '2019-03-10 07:03:47', '2019-03-10 07:03:41'),
(2, 'Cut & Style 2', 'Short to long hair with styling', '1400.00', '2019-03-10 10:03:45', '2019-03-10 10:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_worker` tinyint(4) NOT NULL DEFAULT '0',
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `password`, `is_worker`, `last_ip`, `created_at`, `updated_at`) VALUES
(7, 'test champion', 'test', 'champion', 'test@gmail.com', '12345', '$2y$10$3CcDtXZsNhE/PmZDi7UKFu933X4By6vkKvL0yOUsyOQHdsDXtb./m', 0, '', '2017-09-29 11:09:02', '2019-03-10 12:03:19'),
(6, 'Ali Raza', 'Ali', 'Raza', 'ali@admin.com', '123456', '$2y$10$X.9EGvKY2FaWVsP9iHHJHudF7HUY.pDjmKAHDOzFfrYltAObUY/s.', 0, '', '2017-10-03 06:10:31', '2019-03-11 04:03:34'),
(11, 'abcd ab', 'abcd', 'ab', 'abcd@gmail.com', '123456789', '$2y$10$s9G605MzL3IfIjczyA615uLTXxd.ES1NiCSSgZnG2AKb4OdYdmqHy', 0, '', '2019-03-11 04:03:15', '2019-03-11 04:03:15'),
(8, 'John Smith', 'John', 'Smith', 'johnsmith@gmail.com', '12345', '$2y$10$0F4BYWqcKPK/OoepLPA3SOYOt2XCOeWA7i4i5AlKjaXuQcMWOOmjK', 1, '', '2017-09-29 11:09:02', '2019-03-10 12:03:32'),
(9, 'Herry Jhone', 'Herry', 'Jhone', 'herrypro@gmail.com', '449548545624', '$2y$10$.P.vz6NaSbLPq.BvOY0umulTKBj9Ovds2jaQBdGbyKzlfjOV0O4RW', 1, '', '2017-10-03 07:10:26', '2017-10-03 07:10:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
