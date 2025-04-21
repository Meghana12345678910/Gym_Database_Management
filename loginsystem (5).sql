-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 01:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `logintb`
--

CREATE TABLE `logintb` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `logintb`
--

INSERT INTO `logintb` (`username`, `password`) VALUES
('admin', 'admin123'),
('sm134', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `member_id` int(11) NOT NULL,
  `Trainer_id` int(11) DEFAULT NULL,
  `Package_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`fname`, `lname`, `email`, `member_id`, `Trainer_id`, `Package_id`, `start_date`, `end_date`, `status`) VALUES
('mmmmm', 'mmm', '2025-05-04', 223, 103, 122, '2025-04-21', '2025-05-21', 'Active'),
('mmmmm', 'mmm', '2025-05-04', 224, 103, 122, '2025-04-21', '2025-05-21', 'Active'),
('wsw', 'ssddddd', 'admin@admin.com', 232, 103, 121, '2025-04-21', '2025-05-21', 'Active'),
('mmmm', 'gbhb', 'admin@admin.com', 235, 103, 122, '2025-04-21', '2025-04-28', 'Active'),
('Meghana', 'csacsa', 'swswqsw', 237, 103, 122, '2025-04-21', '2025-04-28', 'Active'),
('mmmm', 'ssddddd', 'swswqsw', 239, 103, 121, '2025-04-24', '2025-04-30', 'Upcoming'),
('fd', 'gbhb', 'km796@snu.edu.in', 241, 103, 121, '2025-04-19', '2025-04-30', 'Active'),
('gfgf', 'fdd', 'Breeze@breeze.com', 243, 103, 121, '2025-04-20', '2025-04-30', 'Active'),
('mmmm', 'fdd', 'km796@snu.edu.in', 245, 103, 121, '2025-04-18', '2025-05-03', 'Active'),
('fd', 'ssddddd', 'Breeze@breeze.com', 247, 103, 121, '2025-04-17', '2025-04-30', 'Active'),
('gfgf', 'fdd', 'Breeze@breeze.com', 249, 103, 122, '2025-04-19', '2025-05-02', 'Active'),
('saathvik', 'mullappudi', 'Breeze@breeze.com', 250, 103, 121, '2025-04-19', '2025-05-09', 'Active'),
('saathvik', 'mullappudi', 'Breeze@breeze.com', 251, 103, 121, '2025-04-19', '2025-05-09', 'Active'),
('mmmm', 'K', 'fdd', 252, 103, 121, '2025-04-20', '2025-04-25', 'Active'),
('mmmm', 'K', 'fdd', 253, 103, 121, '2025-04-20', '2025-04-25', 'Active'),
('wsw', 'K', 'Breeze@breeze.com', 254, 103, 121, '2025-05-24', '2025-06-28', 'Upcoming'),
('Meghana', 'K', 'Breeze@breeze.com', 255, 103, 122, '2025-04-16', '2025-05-04', 'Active'),
('cdsd', 'K', 'Breeze@breeze.com', 256, NULL, 122, '2025-04-10', '2025-04-19', 'Expired'),
('Gourav', 'Varnasi', 'gv665@snu.edu.in', 257, NULL, NULL, '2025-04-21', '2025-05-21', 'Active'),
('Hrahita', 'Mulla', 'km796@snu.edu.in', 258, 2345, 123, '2025-04-21', '2025-05-21', 'Active');

--
-- Triggers `members`
--
DELIMITER $$
CREATE TRIGGER `update_status_before_insert` BEFORE INSERT ON `members` FOR EACH ROW BEGIN
    -- Check if start date is in the future
    IF CURDATE() < DATE(NEW.start_date) THEN
        SET NEW.status = 'Upcoming';  -- Membership starts in the future
    ELSEIF CURDATE() <= DATE(NEW.end_date) THEN
        SET NEW.status = 'Active';    -- Membership is active (before or on end date)
    ELSE
        SET NEW.status = 'Expired';   -- Membership has ended (after end date)
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `notification_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `member_id`, `message`, `notification_date`) VALUES
(1348, 235, 'Membership will expire in 7 days or less for member: mmmm gbhb', '2025-04-21 11:55:19'),
(1349, 237, 'Membership will expire in 7 days or less for member: Meghana csacsa', '2025-04-21 11:55:19'),
(1350, 252, 'Membership will expire in 7 days or less for member: mmmm K', '2025-04-21 11:55:19'),
(1351, 253, 'Membership will expire in 7 days or less for member: mmmm K', '2025-04-21 11:55:19'),
(1355, 256, 'Membership has already expired for member: cdsd K', '2025-04-21 11:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `Package_id` int(11) NOT NULL,
  `Package_name` varchar(40) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`Package_id`, `Package_name`, `Amount`) VALUES
(121, 'preliminary', 800),
(122, 'muscle gain', 2000),
(123, 'ss', 900),
(125, 'hi', 1500),
(126, 'gold', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` int(11) NOT NULL,
  `Amount` int(20) NOT NULL,
  `Member_id` int(11) DEFAULT NULL,
  `payment_type` varchar(20) NOT NULL,
  `payment_activity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_id`, `Amount`, `Member_id`, `payment_type`, `payment_activity`) VALUES
(305, 2000, NULL, 'cash', 'Payment of 2000 made by Member ID 219 using cash'),
(306, 2000, 243, 'cash', 'Payment of 2000 made by Member ID 243 using cash'),
(308, 2169, 250, 'cash', 'Warning: Payment of 2169 is not divisible by 10. Please check the payment.'),
(309, 2169, 245, 'cash', 'Warning: Payment of 2169 does not seem right. Please check the payment.'),
(310, 900, 249, 'cash', 'Payment of 900 made by Member ID 249 using cash'),
(312, 2169, 249, 'cash', 'Warning: Payment of 2169 does not seem right. Please check the payment.'),
(6565, 1000, 258, 'cash', 'Payment of 1000 made by Member ID 258 using cash');

--
-- Triggers `payment`
--
DELIMITER $$
CREATE TRIGGER `before_payment_insert` BEFORE INSERT ON `payment` FOR EACH ROW BEGIN
    -- Check if Amount is divisible by 10
    IF NEW.Amount % 10 != 0 THEN
        -- If not divisible by 10, set payment_activity with a warning message
        SET NEW.payment_activity = CONCAT('Warning: Payment of ', NEW.Amount, ' does not seem right. Please check the payment.');
    ELSE
        -- If divisible by 10, set payment_activity with a confirmation message
        SET NEW.payment_activity = CONCAT('Payment of ', NEW.Amount, ' made by Member ID ', NEW.Member_id, ' using ', NEW.payment_type);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `Trainer_id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `phone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`Trainer_id`, `Name`, `phone`) VALUES
(103, 'wasim', 123564789),
(2345, 'Megsus', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logintb`
--
ALTER TABLE `logintb`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `fk_trainer_id` (`Trainer_id`),
  ADD KEY `fk_package_id` (`Package_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `fk_member_id_neww` (`member_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Package_id`),
  ADD UNIQUE KEY `Package_id` (`Package_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `fk_member_id` (`Member_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`Trainer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1356;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `fk_package_id` FOREIGN KEY (`Package_id`) REFERENCES `package` (`Package_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trainer_id` FOREIGN KEY (`Trainer_id`) REFERENCES `trainer` (`Trainer_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_member_id_neww` FOREIGN KEY (`member_id`) REFERENCES `members` (`Member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_member_id` FOREIGN KEY (`Member_id`) REFERENCES `members` (`Member_id`) ON DELETE SET NULL ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `notify_expiring_members` ON SCHEDULE EVERY 2 MINUTE STARTS '2025-04-21 03:09:19' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
DELETE FROM notifications;
    INSERT INTO notifications (member_id, message)
    SELECT Member_id, CONCAT('Membership will expire in 7 days or less for member: ', fname, ' ', lname)
    FROM members
    WHERE end_date <= CURDATE() + INTERVAL 7 DAY
      AND end_date > CURDATE();

    INSERT INTO notifications (member_id, message)
    SELECT Member_id, CONCAT('Membership has already expired for member: ', fname, ' ', lname)
    FROM members
    WHERE end_date < CURDATE();
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
