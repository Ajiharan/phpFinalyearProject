-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 07:06 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `retentionDueDate` varchar(50) NOT NULL
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
  `receivedDate` varchar(50) NOT NULL
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
  `email` varchar(50) DEFAULT NULL
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
  `cdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expensetype`
--

CREATE TABLE `expensetype` (
  `id` bigint(20) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `paidOn` double NOT NULL
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
  `workType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `machineries`
--

CREATE TABLE `machineries` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `payment` double NOT NULL
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
  `totalAmount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `othertypes`
--

CREATE TABLE `othertypes` (
  `id` bigint(20) NOT NULL,
  `projectId` bigint(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `cdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `storeitems`
--

CREATE TABLE `storeitems` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `vehicleNo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `isAwarded` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `FK_ExpensesprojectId` (`projectId`),
  ADD KEY `FK_expenseType` (`expenseType`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `awardedprojects`
--
ALTER TABLE `awardedprojects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labourpayment`
--
ALTER TABLE `labourpayment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labours`
--
ALTER TABLE `labours`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machineries`
--
ALTER TABLE `machineries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machineryrents`
--
ALTER TABLE `machineryrents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materialpurchase`
--
ALTER TABLE `materialpurchase`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `othertypes`
--
ALTER TABLE `othertypes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storeitems`
--
ALTER TABLE `storeitems`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `FK_ExpensesprojectId` FOREIGN KEY (`projectId`) REFERENCES `awardedprojects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_expenseType` FOREIGN KEY (`expenseType`) REFERENCES `expensetype` (`type`) ON DELETE CASCADE ON UPDATE CASCADE;

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
