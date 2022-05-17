-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 08:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `transactionId` int(10) NOT NULL,
  `idProduct` int(10) NOT NULL,
  `idMember` int(10) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

CREATE TABLE `connexion` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('A','M') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin@gmail.com', 'admin@gmail.com', 'A'),
(2, 'membre@gmail.com', 'membre@gmail.com', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `idMember` int(11) NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `postalcode` varchar(7) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`idMember`, `email`, `lastname`, `firstname`, `age`, `country`, `state`, `city`, `postalcode`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', 99, 'Canada', 'QC', 'Laval', 'H8S 5E2'),
(2, 'membre@gmail.com', 'membre', 'membre', 27, 'Canada', 'QC', 'Laval', 'H1I 9G7');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `category` enum('SHONEN','SHOJO','OTHER') COLLATE utf8_unicode_ci NOT NULL,
  `releaseDate` date NOT NULL,
  `duration` int(3) DEFAULT NULL,
  `previewUrl` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `author`, `description`, `cover`, `price`, `category`, `releaseDate`, `duration`, `previewUrl`) VALUES
(51, 'Black Clover', 'Yuki Tabata', '', '00e28647ff24f00d1dcc9cd7087ac73b59cb9140.jpg', 39.99, 'SHONEN', '2017-05-02', 25, 'https://www.youtube.com/embed/uaDeobqouGQ'),
(52, 'Attack On Titan Final Season', 'Hajime Isayama', '', '72e321e2d297a38401a4546d8db15b4d8884f6a6.jpg', 29.99, 'OTHER', '2019-07-29', 24, 'https://www.youtube.com/embed/c14MVY3EVaQ'),
(53, 'Food Wars!', 'Yūto Tsukuda', 'is a Japanese shōnen manga series written by Yūto Tsukuda and illustrated by Shun Saeki. Yuki Morisaki also works as a Contributor, providing the recipes for the series. Individual chapters have been serialized in Weekly Shōnen Jump from November 2012 and concluded in June 2019. A total of 36 tankōbon volumes were released by Shueisha in Japan. The series is licensed by Viz Media for the American and Western market, who has been releasing the volumes digitally since March 2014, and released the first volume in print in August 2014.', '40c43046c25cc7f472418791a690d0ab2e0e1485.jpg', 35.99, 'OTHER', '2012-11-26', 26, 'https://www.youtube.com/embed/evRgdCqVnaE'),
(54, 'Fruits Basket', 'Natsuki Takaya', 'Fruits Basket is a Japanese shōjo manga series written and illustrated by Natsuki Takaya. It was serialized in the semi-monthly Japanese magazine Hana to Yume, published by Hakusensha, from 1998 to 2006. The series\' title comes from the name of a popular game played in Japanese elementary schools, which is alluded to in the series.', 'd12a1c3422be8f4aff9ba4eb992aaf5ce0837240.jpg', 19.99, 'SHOJO', '2001-07-05', 20, 'https://www.youtube.com/embed/yImLCDyxZjM'),
(55, 'Love Hina', 'Ken Akamatsu', 'Love Hina is a Japanese manga series written and illustrated by Ken Akamatsu. It was serialized in Weekly Shōnen Magazine from October 21, 1998 to October 31, 2001, with the chapters collected into 14 tankōbon volumes by Kodansha', '680e6fbf60ebdbc74e861ed4e92ddc9ed0dda952.jpg', 49.99, 'OTHER', '2000-04-19', 26, 'https://www.youtube.com/embed/J4UL8VyXRSc'),
(56, 'Yakitate!! Japan', 'Takashi Hashiguchi', 'Description Description Yakitate!! Japan is a Japanese manga series written and illustrated by Takashi Hashiguchi. It was serialized in Shogakukan\'s Weekly Shōnen Sunday from January 2002 to January 2007. The manga has spanned 26 tankōbon volumes.', 'afde10a755452f1209896f59ac55a622e7db8a1b.jpg', 69.99, 'OTHER', '2004-10-12', 27, 'https://www.youtube.com/embed/xs6xzznC9tY'),
(57, 'Demon Slayer', 'Koyoharu Gotōge', 'is a Japanese manga series written and illustrated by Koyoharu Gotōge. It follows Tanjiro Kamado, a young boy who becomes a demon slayer after his family is slaughtered and his younger sister Nezuko is turned into a demon. The manga was serialized in Weekly Shōnen Jump from February 2016 to May 2020, and its chapters collected in 20 tankōbon volumes as of May 2020. It is published in English by Viz Media and simulpublished by Shueisha in English and Spanish on their Manga Plus platform.', '6f05b9c6565f7628ec63bdc17885bca9ffdec3df.png', 32.99, 'SHONEN', '2019-04-06', 25, 'https://www.youtube.com/embed/VQGCKyvzIM4'),
(58, 'One Punch Man', 'Yusuke Murata', 'One-Punch Man is a Japanese superhero franchise created by the artist ONE. It tells the story of Saitama, a superhero who can defeat any opponent with a single punch but seeks to find a worthy foe after growing bored by a lack of challenge due to his overwhelming strength.', '6eddf2577683f1fd7f403548e9d725f687280c87.jpg', 59.99, 'SHONEN', '2015-10-05', 27, 'https://www.youtube.com/embed/Poo5lqoWSGw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`transactionId`);

--
-- Indexes for table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`idMember`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `transactionId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `idMember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
