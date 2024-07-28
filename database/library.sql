-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 10:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(25) NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `publisher` varchar(30) NOT NULL,
  `publishing_date` year(4) NOT NULL,
  `sub_id` int(25) NOT NULL,
  `cat_id` int(25) NOT NULL,
  `ratings` int(5) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `total_pages` int(25) NOT NULL,
  `book_file_url` varchar(256) NOT NULL,
  `book_cover_url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `author`, `publisher`, `publishing_date`, `sub_id`, `cat_id`, `ratings`, `isbn`, `total_pages`, `book_file_url`, `book_cover_url`) VALUES
(221, 'Swanirbachita Kishor Samagra', 'Mahasweta Devi', 'Punoshcho', 1959, 6, 103, 4, '81-7332-087-X', 209, 'uploads/book/Swanirbachito Kishore Samagra By Mahasweta Devi (BDeBooks.Com).pdf', 'uploads/cover/Swanirbachita-Kishor-Samagra-ebook.webp'),
(222, 'Bankim Upanyas Samagra', 'Bankim Chandra Chattopadhyay', ' Lekhapora', 2017, 6, 103, 4, 'Unknown', 1054, 'uploads/book/Bankim Upanyas Samagra (BDeBooks.Com) .pdf', 'uploads/cover/upanyas samagraha.jpg'),
(223, 'Jhikorgachar Jhonjhat ', 'Shirshendu Mukhopadhyay', 'Ananda Publishers', 2002, 6, 103, 4, 'Unknown', 46, 'uploads/book/Jhikorgachar Jhonjhat by Shirshendu Mukhopadhyay - (BdeBooks.Com).pdf', 'uploads/cover/jhikor gachay jhanjhat.png'),
(224, 'Mohon Royer Bashi', 'Shirshendu Mukhopadhyay', 'Ananda Publishers', 1992, 6, 103, 4, 'Unknown', 28, 'uploads/book/Mohon_royer_bashi.pdf', 'uploads/cover/mohonrayer bashi.png'),
(226, 'Igoler Chokh', 'Shirshendu Mukhopadhyay', 'Ananda Publishers', 2002, 6, 103, 3, 'Unknown', 21, 'uploads/book/Igoler chokh by Shirshendu Mukhopadhyay - (BdeBooks.Com).PDF', 'uploads/cover/igoler chokh.png'),
(230, 'Kalapahar', 'Samaresh Majumdar', 'Mondal Book House', 1992, 6, 103, 3, 'unknown', 163, 'uploads/book/Kalapahar.pdf', 'uploads/cover/kalapahar.png'),
(231, 'Abhilash', 'Buddhadeb Guha', 'Unknown', 2015, 6, 103, 4, 'Unknown', 181, 'uploads/book/Abhilash By Buddhadeb Guha (BDeBooks.Com).pdf', 'uploads/cover/abhilash.png'),
(232, 'Kajogar', 'Buddhadeb Guha', 'Unknown', 1984, 6, 103, 4, 'Unknown', 306, 'uploads/book/Kojagar By Buddhadeb Guha (BDeBooks.Com).pdf', 'uploads/cover/kojagor.png'),
(233, 'Prothom Komudfull ', 'Achintya Kumar Sengupta', 'Prakash Bhawan', 2000, 6, 103, 4, 'Unknown', 627, 'uploads/book/Prothom Kodomfull By Achintya Kumar Sengupta (bdebooks.com).pdf', 'uploads/cover/prothom kodomer ful.jpg'),
(234, 'I NDIAN E CONOMIC D EVELOPMENT', 'NCERT', ' National Council of Education', 1927, 3, 102, 3, 'Unknown', 14, 'uploads/book/keec1ps.pdf', 'uploads/cover/ncert.jpg'),
(235, 'INDIAN ECONOMIC DEVELOPMENT', 'NCERT', ' National Council of Education', 1927, 3, 102, 3, 'Unknown', 15, 'uploads/book/keec101.pdf', 'uploads/cover/ncert.jpg'),
(236, 'INDIAN ECONOMIC DEVELOPMENT', 'NCERT', ' National Council of Education', 1927, 3, 102, 3, 'Unknown', 19, 'uploads/book/keec101.pdf', 'uploads/cover/ncert.jpg'),
(237, 'Kritika part-2', 'NCERT', ' National Council of Education', 2009, 2, 102, 3, 'Unknown', 66, 'uploads/book/NCERT-Hindi-Class-10-Hindi-Part-4.pdf', 'uploads/cover/NcertNcert-kritika-Hindi-part-2-text-book-for-class-10.jpg'),
(238, 'Aarog Part-2', 'NCERT', ' National Council of Education', 2006, 2, 102, 3, 'Unknown', 197, 'uploads/book/NCERT-Hindi-Class-11-Hindi-Part-2.pdf', 'uploads/cover/khar1cc.jpg'),
(239, 'The Science Book', 'Rob Colson', 'DK Publishing', 2014, 1, 102, 4, '978-1-4654-19', 354, 'uploads/book/The Science Book (DK Publishing) (z-lib.org).pdf', 'uploads/cover/science.jpg'),
(240, 'Fundamental Of Physics', 'David Halliday, Robert Resnick', 'Wiley', 2010, 1, 102, 4, '9780470469088', 1333, 'uploads/book/Fundamentals of Physics (David Halliday, Robert Resnick, Jearl Walker) (z-lib.org).pdf', 'uploads/cover/phisics.jpg'),
(241, 'Sparsh Part-1', 'NCERT', ' National Council of Education', 2007, 2, 102, 3, 'Unknown', 118, 'uploads/book/NCERT-Hindi-Class-9-Hindi-Part-1.pdf', 'uploads/cover/sparsh.jpg'),
(242, 'Molecular Biology of the Cell', 'Bruce Alberts', 'DK Publishing', 2014, 1, 102, 3, '978-1-4654-19', 354, 'uploads/book/Molecular Biology of the Cell (Bruce Alberts, Alexander Johnson, Julian Lewis etc.) (z-lib.org).pdf', 'uploads/cover/biology.jpg'),
(243, 'Fantastic Mr. Fox', 'ROALD DAHL', 'PUFFIN BOOKS', 1988, 5, 103, 4, '9780140328721', 41, 'uploads/book/Fantastic Mr. Fox (Dahl, Roald) (z-lib.org).pdf', 'uploads/cover/fantastic.jpg'),
(244, 'Peppa Pig Tiny Creatures', 'Neville Astley, Mark Baker', 'Ladybird Books', 2012, 5, 103, 4, '9781846469510', 15, 'uploads/book/Peppa Pig Tiny Creatures (Neville Astley, Mark Baker, Peppa Pig) (z-lib.org).pdf', 'uploads/cover/pepa.jpg'),
(245, 'Physical Chemistry', 'Peter Atkins', 'Oxford University Press', 2018, 1, 102, 4, 'Unknown', 940, 'uploads/book/Atkins’ Physical Chemistry (Peter Atkins, Julio de Paula, James Keeler) (z-lib.org).pdf', 'uploads/cover/chemistry.jpg'),
(246, 'China Syndrome', 'Karl Taro Greenfeld', 'Penguin Books Ltd', 2006, 5, 103, 3, '9780141027531', 468, 'uploads/book/China Syndrome The True Story of the 21st Centurys First Great Epidemic (Karl Taro Greenfeld) (z-lib.org).pdf', 'uploads/cover/china.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `cat_id` int(25) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`cat_id`, `cat_name`) VALUES
(101, 'Sports'),
(102, 'Educational'),
(103, 'Story/Novels'),
(104, 'News'),
(105, 'Poem');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `comments` text NOT NULL,
  `feedback_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `name`, `email`, `comments`, `feedback_type`) VALUES
(8, 'Sinjita Ghosh', 'sinjita11ghosh.sg@gmail.com', 'some pages are missing in the ebook', 'complaint'),
(9, 'Kriti Thakur', 'thakurkriti514@gmail.com', 'page is not loading', 'problem'),
(10, 'Kriti Thakur', 'thakurkriti514@gmail.com', 'page is not loading', 'problem'),
(11, 'Kriti Thakur', 'thakurkriti514@gmail.com', 'page is not loading', 'problem'),
(12, 'Kriti Thakur', 'thakurkriti514@gmail.com', 'page is not loading', 'problem'),
(13, 'Kriti Thakur', 'thakurkriti514@gmail.com', 'page is not loading', 'problem'),
(21, 'Tasneem Khan', 'khan.tasneem017@gmail.com', 'This is a test feedback.', 'suggestion'),
(22, 'tasneem', 'khan.tasneem@gmail.com', 'hii there', 'praise'),
(26, 'Kriti Thakur', 'thakurkriti514@gmail.com', 'jhsgajfhgdkfgsdj', 'suggestion'),
(27, 'tahseen ', 'khantahseen123@gmail.com', 'qwrqweqerw', 'complaint'),
(28, 'Tahseen Khan', 'khan.tahseen681@gmail.com', 'Thank you.', 'praise');

-- --------------------------------------------------------

--
-- Table structure for table `sub_catagory`
--

CREATE TABLE `sub_catagory` (
  `sub_id` int(25) NOT NULL,
  `sub_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_catagory`
--

INSERT INTO `sub_catagory` (`sub_id`, `sub_name`) VALUES
(1, 'Science'),
(2, 'Hindi'),
(3, 'Humanity'),
(4, 'Computer'),
(5, 'English'),
(6, 'Bengali');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `signup_date` datetime NOT NULL DEFAULT current_timestamp(),
  `email_id` varchar(30) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `first_name`, `last_name`, `phone`, `signup_date`, `email_id`, `role`) VALUES
(1, 'P@$$w0r5', 'Tasneem', 'Khan', '9038681824', '2022-05-29 13:30:17', 'khan.tasneem017@gmail.com', 'admin'),
(2, 'asdf123', 'Kriti', 'Thakur', '9330921889', '2022-05-29 13:35:33', 'thakurkriti514@gmail.com', 'admin'),
(3, 'zxcvbn321', 'Sinjita', 'Ghosh', '9330485962', '2022-05-29 13:35:33', 'sinjita11ghosh@gmail.com', 'admin'),
(48, 'aeiouaeiouaeiou', 'Tahseen', 'Khan', '8100426158', '2022-05-29 13:40:26', 'khan.tahseen681@gmail.com', 'user'),
(49, 'zxcvb123', 'Ozair', 'Alam', '1234567890', '2022-05-29 14:09:37', 'ozair@gmail.com', 'user'),
(50, 'qwerty', 'junaid', 'Alam', '1234567890', '2022-05-29 14:12:06', 'junaid@gmail.com', 'user'),
(51, 'shabbirshakila', 'Shabbir', 'Alam', '9748774596', '2022-05-29 14:18:18', 'shabbiralam123@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `cat_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `catagories` (`cat_id`),
  ADD CONSTRAINT `sub_id` FOREIGN KEY (`sub_id`) REFERENCES `sub_catagory` (`sub_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
