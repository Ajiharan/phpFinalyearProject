-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 03:48 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `awardedprojects`
--

CREATE TABLE `awardedprojects` (
  `id` bigint(20) NOT NULL,
  `tenderId` bigint(20) NOT NULL,
  `estimatedValue` double NOT NULL,
  `projectStartDate` varchar(50) NOT NULL,
  `projectEndDate` varchar(50) NOT NULL,
  `retentionAmount` double NOT NULL,
  `retentionDueDate` varchar(50) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) NOT NULL,
  `projectId` bigint(20) NOT NULL,
  `billNo` int(11) NOT NULL,
  `receivedAmount` double NOT NULL,
  `receivedDate` varchar(50) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) NOT NULL,
  `projectId` bigint(20) NOT NULL,
  `expenseType` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `cdate` varchar(50) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL,
  `tid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expensetype`
--

CREATE TABLE `expensetype` (
  `id` bigint(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expensetype`
--

INSERT INTO `expensetype` (`id`, `type`, `createdAt`, `modifiedAt`, `createdBy`, `updatedBy`) VALUES
(3, ' Machinery Rent', '2020-12-06 21:16:00', '2020-12-06 23:17:08', 'haran', 'haran'),
(1, ' Material Purchase', '2020-12-06 21:16:00', '2020-12-06 23:17:15', 'haran', 'haran'),
(2, 'Labour Charges', '2020-12-06 21:16:00', '2020-12-06 23:17:21', 'haran', 'haran'),
(4, 'Other Expenses', '2020-12-06 21:16:00', '2020-12-06 23:17:27', 'haran', 'haran');

-- --------------------------------------------------------

--
-- Table structure for table `labourpayment`
--

CREATE TABLE `labourpayment` (
  `id` bigint(20) NOT NULL,
  `projectId` bigint(20) NOT NULL,
  `labourId` bigint(20) NOT NULL,
  `noOfWorkers` int(11) NOT NULL,
  `payment` double NOT NULL,
  `paidOn` varchar(200) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL,
  `ndate` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `labours`
--

CREATE TABLE `labours` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `workType` varchar(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labours`
--

INSERT INTO `labours` (`id`, `name`, `address`, `phone`, `workType`, `createdAt`, `modifiedAt`, `createdBy`, `updatedBy`) VALUES
(5, 'Baskaran Ajiharan', 'earlalai,west earlalai', '0776377435', 'plumber', '2020-12-08 02:01:35', '2020-12-08 02:01:35', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `machineries`
--

CREATE TABLE `machineries` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machineries`
--

INSERT INTO `machineries` (`id`, `name`, `createdAt`, `modifiedAt`, `createdBy`, `updatedBy`) VALUES
(1, 'Roller', '2020-12-06 21:16:52', '2020-12-06 23:16:01', 'haran', 'haran'),
(2, 'JCB', '2020-12-06 21:16:52', '2020-12-06 23:16:18', 'haran', 'haran');

-- --------------------------------------------------------

--
-- Table structure for table `machineryrents`
--

CREATE TABLE `machineryrents` (
  `id` bigint(20) NOT NULL,
  `projectId` bigint(20) NOT NULL,
  `machineryId` bigint(20) NOT NULL,
  `hourlyPayment` double NOT NULL,
  `noOfHrs` int(11) NOT NULL,
  `payment` double NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL,
  `ndate` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materialpurchase`
--

CREATE TABLE `materialpurchase` (
  `id` bigint(20) NOT NULL,
  `projectId` bigint(20) NOT NULL,
  `materialId` bigint(20) NOT NULL,
  `unitPrice` double NOT NULL,
  `qty` int(11) NOT NULL,
  `totalAmount` double NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL,
  `ndate` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `createdAt`, `modifiedAt`, `createdBy`, `updatedBy`) VALUES
(9, 'Cotton', '2020-12-07 00:46:31', '2020-12-08 08:58:42', 'admin', 'admin'),
(10, 'silk', '2020-12-08 08:57:48', '2020-12-08 08:57:54', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `othertypes`
--

CREATE TABLE `othertypes` (
  `id` bigint(20) NOT NULL,
  `projectId` bigint(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `cdate` varchar(50) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL,
  `ndate` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `storeitems`
--

CREATE TABLE `storeitems` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storeitems`
--

INSERT INTO `storeitems` (`id`, `name`, `createdAt`, `modifiedAt`, `createdBy`, `updatedBy`) VALUES
(1, 'Water tank', '2020-12-06 21:20:18', '2020-12-06 23:16:32', 'haran', 'haran'),
(2, 'Driller', '2020-12-06 21:20:18', '2020-12-06 23:16:37', 'haran', 'haran');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `vehicleNo` varchar(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `phone`, `vehicleNo`, `createdAt`, `modifiedAt`, `createdBy`, `updatedBy`) VALUES
(25, 'Thanusha krishnamoorthy ', 'earlalai,west earlalai', '0776377435', 'sdad', '2020-12-07 00:08:05', '2020-12-08 08:49:59', 'haran', 'admin'),
(26, 'Baskaran Ajiharan', 'earlalai,west earlalai', '0776377435', 'asd', '2020-12-08 08:49:35', '2020-12-08 08:51:20', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `id` bigint(20) NOT NULL,
  `clientId` bigint(20) NOT NULL,
  `project` varchar(50) NOT NULL,
  `projectValue` double NOT NULL,
  `duration` double NOT NULL,
  `security_fee` double NOT NULL,
  `isAwarded` tinyint(1) DEFAULT 0,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` varchar(200) NOT NULL,
  `updatedBy` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isActive` tinyint(1) DEFAULT 1,
  `userType` int(11) DEFAULT 1,
  `createdAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `emailId`, `password`, `isActive`, `userType`, `createdAt`, `modifiedAt`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 1, 2, '2020-12-06 21:26:21', '2020-12-06 21:26:21'),
(16, 'haran', 'haran@gmail.com', 'haran', 1, 1, '2020-12-06 22:48:48', '2020-12-06 22:48:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awardedprojects`
--
ALTER TABLE `awardedprojects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tenderId` (`tenderId`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_projectId` (`projectId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ExpensesprojectId` (`projectId`);

--
-- Indexes for table `expensetype`
--
ALTER TABLE `expensetype`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `labourpayment`
--
ALTER TABLE `labourpayment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_LabourPaymentprojectId` (`projectId`),
  ADD KEY `LabourPaymentFK_labourId` (`labourId`);

--
-- Indexes for table `labours`
--
ALTER TABLE `labours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machineries`
--
ALTER TABLE `machineries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machineryrents`
--
ALTER TABLE `machineryrents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_MachineryRentsprojectId` (`projectId`),
  ADD KEY `MachineryRentsFK_machineryId` (`machineryId`);

--
-- Indexes for table `materialpurchase`
--
ALTER TABLE `materialpurchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_MaterialPurchaseprojectId` (`projectId`),
  ADD KEY `MaterialPurchaseFK_materialId` (`materialId`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `othertypes`
--
ALTER TABLE `othertypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_OtherTypessprojectId` (`projectId`);

--
-- Indexes for table `storeitems`
--
ALTER TABLE `storeitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_clientid` (`clientId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `awardedprojects`
--
ALTER TABLE `awardedprojects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `labourpayment`
--
ALTER TABLE `labourpayment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `labours`
--
ALTER TABLE `labours`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `machineries`
--
ALTER TABLE `machineries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `machineryrents`
--
ALTER TABLE `machineryrents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `materialpurchase`
--
ALTER TABLE `materialpurchase`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `othertypes`
--
ALTER TABLE `othertypes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `storeitems`
--
ALTER TABLE `storeitems`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `awardedprojects`
--
ALTER TABLE `awardedprojects`
  ADD CONSTRAINT `FK_tenderId` FOREIGN KEY (`tenderId`) REFERENCES `tenders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `FK_projectId` FOREIGN KEY (`projectId`) REFERENCES `awardedprojects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `FK_ExpensesprojectId` FOREIGN KEY (`projectId`) REFERENCES `awardedprojects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `labourpayment`
--
ALTER TABLE `labourpayment`
  ADD CONSTRAINT `FK_LabourPaymentprojectId` FOREIGN KEY (`projectId`) REFERENCES `awardedprojects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LabourPaymentFK_labourId` FOREIGN KEY (`labourId`) REFERENCES `labours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `machineryrents`
--
ALTER TABLE `machineryrents`
  ADD CONSTRAINT `FK_MachineryRentsprojectId` FOREIGN KEY (`projectId`) REFERENCES `awardedprojects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MachineryRentsFK_machineryId` FOREIGN KEY (`machineryId`) REFERENCES `machineries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materialpurchase`
--
ALTER TABLE `materialpurchase`
  ADD CONSTRAINT `FK_MaterialPurchaseprojectId` FOREIGN KEY (`projectId`) REFERENCES `awardedprojects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MaterialPurchaseFK_materialId` FOREIGN KEY (`materialId`) REFERENCES `materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `othertypes`
--
ALTER TABLE `othertypes`
  ADD CONSTRAINT `FK_OtherTypessprojectId` FOREIGN KEY (`projectId`) REFERENCES `awardedprojects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tenders`
--
ALTER TABLE `tenders`
  ADD CONSTRAINT `FK_clientid` FOREIGN KEY (`clientId`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
