-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 03:54 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tv_shop`
--
CREATE DATABASE IF NOT EXISTS `tv_shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tv_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `find_us` varchar(100) NOT NULL,
  `news` varchar(15) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_description` text NOT NULL,
  `stock` int(10) NOT NULL,
  `product_image` varchar(50) DEFAULT 'default_product_image.jpg',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_description`, `stock`, `product_image`) VALUES
(1, 'LG 50 Inch HD TV with HDR', '479.00', 'LG UHD TV with 4K Display and Active HDR for superb picture quality. ThinQ AI brings intelligence to your TV, responding to your questions and bringing convenience to your home. Packaged in a cutting\r\n edge metallic design and with the award winning Smart TV bOS this set is a great reason to stay on the sofa.', 10, 'LG_50_1.jpg'),
(2, 'Samsung 49 Inch 4K UHD Curved Smart TV With HDR', '479.00', 'Enjoy a beautifully vibrant and immersive Ultra HD certified experience with our NU7300 Curved UHD TV. With true Ultra HD 4K colour and clarity you can enjoy the latest movies in more colour and detail than ever before. And HDR enhances every detail, from a subtle tear, to a tiny frown line. Immerse yourself in the action with the 49-inch curved screen that surrounds you with a superb viewing experience.\r\n Discover a deeper, wider and larger perceived picture that captivates you from every angle.', 10, 'Samsung_49_2.jpg'),
(3, 'Hitachi 43 Inch Smart 4K Ultra HD TV with HDR', '349.99', 'Make family TV time magical with the Hitachi 32-inch Smart HD Ready TV. Any action-packed movie will look more energetic than ever with tiny details coming into the bigger picture. Indulge in you fave apps like Netflix, BBC iPlayer and Amazon\r\n Prime which are built-in. Not forgetting Freeview Play where you can catch up on any missed shows.', 10, 'Hitachi_3.jpg'),
(4, 'Desktop', '199.99', 'loren ipson', 10, 'desktop.png'),
(5, 'USB 2.0', '4.99', 'loren ipson', 10, 'usb_2.0.png'),
(6, 'USB 3.0', '9.99', 'loren ipson', 10, 'usb_3_0.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
