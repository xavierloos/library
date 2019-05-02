-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 11:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` text NOT NULL,
  `year` int(4) NOT NULL,
  `edition` varchar(20) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `storage` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `year`, `edition`, `isbn`, `storage`, `description`) VALUES
(8, 'The Worst President in History: The Legacy of Bara', 'Matt Margolis Mark Noonan', 2017, '1', '9781541470224', 2, 'As Barack Obama\'s presidential failures keep adding up, remembering them all can be a challenge. Matt Margolis and Mark Noonan have compiled everything you need to know about the presidency of Barack Obama (so far) into one book. Now you can easily find all the information that was ignored by the media and that Barack Obama would like you to forget. Did Barack Obama really save this country from another Great Depression? Did he really improve our country\'s image around the world, or unite America? What about the new era of post-partisanship and government transparency? Did he really expand health coverage while lowering costs and cutting taxes? The Worst President in History: The Legacy of Barack Obama compiles 200 inconvenient truths about Obama\'s presidency-the facts that will shape his legacy: His real record on the economy; the disaster that is Obamacare; his shocking abuses of taxpayer dollars; his bitterly divisive style of governing; his shameless usurping of the Constitution; his scandals and cover ups; his policy failures at home and abroad; the unprecedented expansion of government power . . . and more.\r\n'),
(9, 'The Couple Next Door', 'Shari Lapena', 2016, '1', '9781473541672', 5, 'PEOPLE ARE CAPABLE OF ALMOST ANYTHING.\r\n\r\nFast-paced and addictive, THE COUPLE NEXT DOOR announces a major new talent in thriller writing.\r\n\r\nYou never know what\'s happening on the other side of the wall.\r\n\r\nYour neighbour told you that she didn\'t want your six-month-old daughter at the dinner party. Nothing personal, she just couldn\'t stand her crying.\r\n\r\nYour husband said it would be fine. After all, you only live next door. You\'ll have the baby monitor and you\'ll take it in turns to go back every half hour.\r\n\r\nYour daughter was sleeping when you checked on her last. But now, as you race up the stairs in your deathly quiet house, your worst fears are realized. She\'s gone.\r\n\r\nYou\'ve never had to call the police before. But now they\'re in your home, and who knows what they\'ll find there.\r\n\r\nWhat would you be capable of, when pushed past your limit?'),
(10, 'Battle Scars: A Story of War and All That Follows', 'Jason Fox', 2018, '1', '9781473565739', 5, 'This is a true story. The events depicted took place during the last decade in an unnamed warzone. The names and locations have been redacted to protect the security of those involved and the practices of the British Special Forces. Out of respect for the KIA and survivors, everything else has been told as it happened...\r\n\r\nJason Fox served with the SBS for over a decade, thriving on the close bonds of the Special Forces brotherhood and the â€˜death or gloryâ€™ nature of their missions.\r\n\r\nBattle Scars tells the story of his career as an elite operator, from the gunfights, hostage rescues, daring escapes and heroic endeavours that defined his service, to a battle of a very different kind: the psychological devastation of combat that ultimately forced him to leave the military, and the hard reality of what takes place in the mind of a man once a career of imagined invincibility has come to an end.\r\n\r\nUnflinchingly honest, Battle Scars is a breathtaking account of Special Forces soldiering: a chronicle of operational bravery, and of superhuman courage on and off the battlefield.'),
(11, 'Behind Her Eyes', 'Sarah Pinborough', 2017, '1', '9780008132002', 5, 'Donâ€™t Trust This Book\r\n\r\nDonâ€™t Trust These People\r\n\r\nDonâ€™t Trust Yourself\r\n\r\nAnd whatever you do, DONâ€™T give away that ending...\r\n\r\nBehind Her Eyes has been called the new Girl on the Train and Gone Girl. This is one psychological thriller you will not want to miss.\r\n\r\nâ€˜One of the biggest thrillers of 2017â€™ RED\r\n\r\nLouise\r\n\r\nSince her husband walked out, Louise has made her son her world, supporting them both with her part-time job. But all that changes when she meets...\r\n\r\nDavid\r\n\r\nYoung, successful and charming â€“ Louise cannot believe a man like him would look at her twice let alone be attracted to her. But that all comes to a grinding halt when she meets his wife...\r\n\r\nAdele\r\n\r\nBeautiful, elegant and sweet â€“ Louise\'s new friend seems perfect in every way. As she becomes obsessed by this flawless couple, entangled in the intricate web of their marriage, they each, in turn, reach out to her.\r\n\r\nBut only when she gets to know them both does she begin to see the cracks... Is David really is the man she thought she knew and is Adele as vulnerable as she appears?\r\nJust what terrible secrets are they both hiding and how far will they go to keep them?\r\n\r\nâ€˜Fully realized characters, peerless writing, a tank of a plot that sustains the suspense right to the end, and a whammy of a finale. It takes a lot to catch me out, but this one did. It\'ll get you too...â€™ Joanne Harris');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user`, `comment`) VALUES
(3, 'Javier', 'I liked this book. People who are interested in national disasters and US history as well as immigration will most probably be interested in reading this book.  Readers can gain knowledge of what it was like to work in New York City in the early 1900s. One of the things that was especially interesting was that there were no safety laws at work. Also, there was a big contrast between the rich and the poor. Some people may not like this book because it is very depressing, but it is an important event in history to remember.  This book was very well written. It has black and white photos along with descriptions of the photos. These photos give us a better idea of what people\'s lives were like. This book is suitable for 9-20 year olds.  I give this book 5 stars.'),
(4, 'Pamela', 'This book was about a bird who didn\'t yet know how to fly.  The bird has to decide if it will try to fly, but it was not sure if it wants to. The bird thought, \"If I never forever endeavor\" then I won\'t ever learn. On one wing, he worries he might fail and on the other wing he thinks of how he may succeed. He worries that if he tries, he may get lost in the world. That makes him want to stay in his nest where he\'s safe.');

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `selector` text NOT NULL,
  `token` text NOT NULL,
  `expire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resetpassword`
--

INSERT INTO `resetpassword` (`id`, `email`, `selector`, `token`, `expire`) VALUES
(1, 'xavir@cvcv.com', '2d9980260d307fc4', '$2y$10$OmsqkIC8/jQ5N/LdhlGUeOCUckv.isHB0eYuR13mVz1N79HrX/yv6', '1556382344'),
(2, 'xfddf@dfds.com', 'b54694cc35db5761', '$2y$10$rKJPCR0TQudDj2wXovwC3e6uptbHyTz/dKIpAZTwNtTdadNHXrdaa', '1556382393'),
(4, 'fdgxdfg@dfgdfgfgfc.cc', '463a74d1aa2fc435', '$2y$10$Y10HHouK9jwqgepsN1LyH.b1qK2s84ZfghzaMFRKNGmNfHoOJ0FeO', '1556386054'),
(6, 'xavier.loos04@gmail.co', '9affc3439e7ab2eb', '$2y$10$nIyjczoQG1dTjUOEvx/ksOQ8nPdNmaBxtMz6.E5tjrb8DzVXd3qvW', '1556387033'),
(9, 'xavier.loos04@gmail.com', 'd33aa5812f23808b', '$2y$10$pyRa5F3SbqLxx6W.bJSmXe4g6mB1vKdfGWOK.KBms6eV7HdDgVqpu', '1556389521');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `user` text NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user`, `email`, `password`) VALUES
(1, 'Javier Lopez ', 'jlopez', 'xavier.loos04@gmail.com', '$2y$10$6O6GGypV60XiaM1vh79hPeaROn/vNPEQAugYahxwZnhcnzpjdsi.K'),
(3, 'ghj', 'ghj', 'ghj@gfh.fgh', '$2y$10$L0GEhwhRiQS5oaiofWGPWeUTMB7PY5LG8vr8pnWATTtgrpkykks0G'),
(4, 'Lopez', 'lopez', 'xavier@gmail.com', '$2y$10$m6Jw6KmpU.OCDDZmZqFPqedULJDxMtPNZvhPBZBtpGtpM3BYD6Z4u'),
(5, 'admin', 'admin', 'admin@admin.com', '$2y$10$SjUhKXHdJUsBwxhzehfP1OVJo3Cg5Wmq0rAQ8p.WMcSm0BIrT4NfS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resetpassword`
--
ALTER TABLE `resetpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
