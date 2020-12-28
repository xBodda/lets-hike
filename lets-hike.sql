-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 02:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lets-hike`
--
CREATE DATABASE IF NOT EXISTS `lets-hike` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lets-hike`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Abdelrahman Sayed', 'bodda@gmail.com', '$2y$10$JcFKRUHotQx.fr2yfgoOpOhEb58niENDSzrc4jHAkiabTkgZw2MoW', 1),
(2, 'Mohamed Ashraf', 'xtrimy@gmail.com', '$2y$10$sI0Zuzmk7ndRJn4nJPwvb.m3alAU2a1axcY7v/094V0sn7eQC6qtC', 3);

-- --------------------------------------------------------

--
-- Table structure for table `admin_levels`
--

CREATE TABLE `admin_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_levels`
--

INSERT INTO `admin_levels` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Auditor'),
(3, 'HR partner');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tokens`
--

CREATE TABLE `admin_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tokens`
--

INSERT INTO `admin_tokens` (`id`, `token`, `user_id`, `date`) VALUES
(1, '5999653bcf06a68a48d9282e3cc6637f94da8108', 1, '2020-12-26 02:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `_date`) VALUES
(1, 'Is my payment to hikingfy.com safe?', 'We only make use of Stripe, which allows you to make a fully secure and SSL encrypted payment. We support the following payment methods: all Visa and Mastercards, iDEAL, SOFORT, Bancontact and Giropay. Your payment is safe and the details of your form of payment are invisible.', '2020-12-26 01:40:56'),
(2, 'I pay a 15% deposit now. What happens next?', 'When you decide to make a 15% deposit, your spot is reserved and you will have the possibility to settle the rest of your payment upon arrival at your destination. Your deposit comes with the same level of guarantee as a full payment: Your spot is reserved, your dates are blocked and your trekking is good to go. All you have to do is pay the rest amount before the start of your trekking. This can, for example, be a cash or credit card payment in the offices of your trekking company.', '2020-12-26 01:45:09'),
(3, 'I rather pay the full amount upfront. Is this possible?', 'Do you wish to avoid having to pay the rest amount upon arrival at your destination? Choose then for paying the whole amount and we take care of the payment process.', '2020-12-26 01:45:51'),
(4, 'What happens once I have made my booking?', 'Once your booking is made, we get your trekking confirmed by your trekking agency. You will then get a confirmation e-mail with all the details of your trekking and the contact details of your trekking company.', '2020-12-26 01:46:28'),
(5, 'Can I change my booking?', 'You can change your reservation by contacting your trekking company directly and agree upon a new starting date. The same goes for changing your trekking. If this leads to a price difference, it is important to contact us as well.', '2020-12-26 01:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Rather Not To Say');

-- --------------------------------------------------------

--
-- Table structure for table `hikes`
--

CREATE TABLE `hikes` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `location` varchar(128) NOT NULL,
  `overview` text NOT NULL,
  `route` text NOT NULL,
  `safety` text NOT NULL,
  `howtobook` text NOT NULL,
  `price` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hikes`
--

INSERT INTO `hikes` (`id`, `name`, `location`, `overview`, `route`, `safety`, `howtobook`, `price`) VALUES
(1, 'Salkantay Traditional', 'Mexico', 'The Inca Trail to Machu Picchu is a once in a lifetime experience and an opportunity not to be missed. It is one of the world’s oldest pilgrimages and is consistently ranked among the ten best hikes on the planet. Over four unforgettable days you will hike through different ecological zones which house an abundance of diverse flora and fauna. These include various orchids, bromeliads, hummingbirds, foxes and deer. Some lucky hikers may even catch a glimpse of the magnificent spectacled bear of South America during the trekking.', 'Your trekking team will pick you up from your hotel between 4:30-6:30am (depending on your location) and drive you to KM. 82 – arriving at approximately 8.00am. After a delicious breakfast we will head straight to the checkpoint to begin your trekking to Machu Picchu. It’s a relatively easy two-hour walk to Patallacta; the first Inca site along the trail. From a unique, secluded location we will enjoy the breathtaking views of this ancient city. It’s then another two-hour walk to Hatunchaca – located in the heart of the Inca trail – where lunch will be waiting. We will walk for another two hours to the first campsite located in Ayapata, arriving at approximately 5:00pm. Your tent, a snack and a hot drink will be waiting for you. You will then have some time to rest and enjoy the view of the mountains before dinner.', 'Safety is of the utmost importance to us. That is why this is an area in which we simply do not compromise when it comes to keeping the cost of our trekkings low. Our guides have been selected on the basis of their technical competence, proven safety performance, impeccable judgment, friendly attitude and ability to provide useful and expert instructions. They are also very professional and well trained in first aid and personal protection equipment. First aid kits are available on all treks. In addition, the routes are ideally designed to give you enough time to acclimatize.', 'On Bookatrekking.com you can find and compare the adventures of your dreams. Is this trekking adventure your match? In that case you can proceed to booking. At Bookatrekking.com you make a deposit of 15% of the total amount. You pay the remaining amount on location prior to the trek directly to the trekking company. Bookatrekking.com uses only the safest payment methods. Once your booking has been received, your place is reserved, your place is safe and you can look forward to your chosen trekking.', '925'),
(2, 'Everest Base Camp Trek', 'USA', 'The Inca Trail to Machu Picchu is a once in a lifetime experience and an opportunity not to be missed. It is one of the world’s oldest pilgrimages and is consistently ranked among the ten best hikes on the planet. Over four unforgettable days you will hike through different ecological zones which house an abundance of diverse flora and fauna. These include various orchids, bromeliads, hummingbirds, foxes and deer. Some lucky hikers may even catch a glimpse of the magnificent spectacled bear of South America during the trekking.', 'Your trekking team will pick you up from your hotel between 4:30-6:30am (depending on your location) and drive you to KM. 82 – arriving at approximately 8.00am. After a delicious breakfast we will head straight to the checkpoint to begin your trekking to Machu Picchu. It’s a relatively easy two-hour walk to Patallacta; the first Inca site along the trail. From a unique, secluded location we will enjoy the breathtaking views of this ancient city. It’s then another two-hour walk to Hatunchaca – located in the heart of the Inca trail – where lunch will be waiting. We will walk for another two hours to the first campsite located in Ayapata, arriving at approximately 5:00pm. Your tent, a snack and a hot drink will be waiting for you. You will then have some time to rest and enjoy the view of the mountains before dinner.', 'Safety is of the utmost importance to us. That is why this is an area in which we simply do not compromise when it comes to keeping the cost of our trekkings low. Our guides have been selected on the basis of their technical competence, proven safety performance, impeccable judgment, friendly attitude and ability to provide useful and expert instructions. They are also very professional and well trained in first aid and personal protection equipment. First aid kits are available on all treks. In addition, the routes are ideally designed to give you enough time to acclimatize.', 'On Bookatrekking.com you can find and compare the adventures of your dreams. Is this trekking adventure your match? In that case you can proceed to booking. At Bookatrekking.com you make a deposit of 15% of the total amount. You pay the remaining amount on location prior to the trek directly to the trekking company. Bookatrekking.com uses only the safest payment methods. Once your booking has been received, your place is reserved, your place is safe and you can look forward to your chosen trekking.', '1262');

-- --------------------------------------------------------

--
-- Table structure for table `hike_images`
--

CREATE TABLE `hike_images` (
  `id` int(11) NOT NULL,
  `hike_id` int(11) NOT NULL,
  `image` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `hike_id` int(11) NOT NULL,
  `rating` varchar(8) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `gender` int(11) NOT NULL,
  `phonenumber` varchar(32) NOT NULL,
  `image` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `admin_levels`
--
ALTER TABLE `admin_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_tokens`
--
ALTER TABLE `admin_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hikes`
--
ALTER TABLE `hikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hike_images`
--
ALTER TABLE `hike_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hike_id` (`hike_id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gender` (`gender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_levels`
--
ALTER TABLE `admin_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_tokens`
--
ALTER TABLE `admin_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hikes`
--
ALTER TABLE `hikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hike_images`
--
ALTER TABLE `hike_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`level`) REFERENCES `admin_levels` (`id`);

--
-- Constraints for table `hike_images`
--
ALTER TABLE `hike_images`
  ADD CONSTRAINT `hike_images_ibfk_1` FOREIGN KEY (`hike_id`) REFERENCES `hikes` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
