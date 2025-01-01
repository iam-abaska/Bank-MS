-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 04:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_ms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `login_pro` (`username_sp` VARCHAR(50), `Password_sp` TEXT)   BEGIN
if EXISTS(SELECT * FROM userlogin WHERE Username=Username_sp and Password=md5(Password_sp))THEN
SELECT UserID,CustomerID,Username FROM userlogin WHERE Username=Username_sp AND Password=md5(Password_sp);
ELSE
SELECT 'Username or Password Incorrect' as error;
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `AccountID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `AccountType` varchar(50) NOT NULL,
  `Balance` decimal(15,2) NOT NULL,
  `AccountStatus` varchar(20) DEFAULT 'Active',
  `DateCreated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AccountID`, `CustomerID`, `AccountType`, `Balance`, `AccountStatus`, `DateCreated`) VALUES
(2, 3, 'Saving Account', 2000.00, 'Active', '2024-12-30'),
(3, 1, 'Saving Account', 1000.00, 'Active', '2024-12-30'),
(4, 4, 'Fixed Deposit Account', 450.00, 'Active', '2024-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `BranchID` int(11) NOT NULL,
  `BranchName` varchar(100) NOT NULL,
  `Address` text DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`BranchID`, `BranchName`, `Address`, `Phone`, `Email`) VALUES
(6, 'Branch C', 'Somalia, Banaadir , wadajir', '+252615562630', 'branch.c@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `FullName` varchar(90) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Address` text DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `DateJoined` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FullName`, `DateOfBirth`, `Address`, `Phone`, `Email`, `DateJoined`) VALUES
(1, 'Yoonis Abdi Said', '2004-08-30', 'somalia, Mogadishu, Deyniile', '+252618659765', 'bruno76@gmail.com', '2024-12-30'),
(3, 'Aisha Hussein', '2001-04-01', 'Mogadishu, Somalia, Hodan', '+252615437764', 'aisha34@gmail.com', '2024-12-30'),
(4, 'Abdirashid Hassan', '2002-04-01', 'Mogadishu, Somalia, Wadajir', '+252615908762', 'antonio@gmail.com', '2024-12-30'),
(5, 'Mohamed Bashir', '2004-01-01', 'Mogadishu, Somalia, Hodan', '+252615432313', 'moha@gmail.com', '2024-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `FullName` varchar(90) NOT NULL,
  `Position` text NOT NULL,
  `BranchID` int(11) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `FullName`, `Position`, `BranchID`, `Phone`, `Email`) VALUES
(3, 'Abdirizack Hussein Hassan', 'Branch Manager', 5, '+252612544685', 'abaska@gmail.com'),
(4, 'Abdirashid Hassan Abdi', 'Customer Service', 6, '+252612349048', 'rashka01@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loanrepayments`
--

CREATE TABLE `loanrepayments` (
  `RepaymentID` int(11) NOT NULL,
  `LoanID` int(11) NOT NULL,
  `RepaymentDate` date NOT NULL,
  `RepaymentAmount` decimal(15,2) NOT NULL,
  `RemainingBalance` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loanrepayments`
--

INSERT INTO `loanrepayments` (`RepaymentID`, `LoanID`, `RepaymentDate`, `RepaymentAmount`, `RemainingBalance`) VALUES
(1, 5, '2024-12-30', 4000.00, 46000.00),
(2, 4, '2024-12-31', 150.00, 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `LoanID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `LoanType` varchar(50) NOT NULL,
  `LoanAmount` decimal(15,2) NOT NULL,
  `LoanStartDate` date NOT NULL,
  `LoanEndDate` date NOT NULL,
  `LoanStatus` varchar(20) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`LoanID`, `CustomerID`, `LoanType`, `LoanAmount`, `LoanStartDate`, `LoanEndDate`, `LoanStatus`) VALUES
(4, 1, 'Student Loan', 150.00, '2024-12-10', '2025-01-30', 'Approved'),
(5, 3, 'Business Loan', 50000.00, '2024-12-30', '2025-12-30', 'Approved'),
(6, 3, 'Student Loan', 150.00, '2024-12-31', '2025-06-28', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `TransactionType` varchar(90) NOT NULL,
  `Amount` decimal(15,2) NOT NULL,
  `TransactionDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransactionID`, `AccountID`, `TransactionType`, `Amount`, `TransactionDate`, `Description`) VALUES
(6, 3, 'Withdrawal', 20.00, '2024-12-31 00:00:00', '20$ ayaad la baxday'),
(15, 4, 'Deposit', 2000.00, '2024-12-31 00:00:00', '2000$ ayaad dhigatay akoonkaaga'),
(16, 2, 'Transfer', 300.00, '2024-12-31 00:00:00', '300$ ayaad ka dirtay akoonkaaga');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `UserID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`UserID`, `CustomerID`, `Username`, `Password`) VALUES
(2, 3, 'aisha', '21'),
(4, 5, 'moha', 'moha12'),
(5, 5, 'moha', '1212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`BranchID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `loanrepayments`
--
ALTER TABLE `loanrepayments`
  ADD PRIMARY KEY (`RepaymentID`),
  ADD KEY `LoanID` (`LoanID`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`LoanID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `AccountID` (`AccountID`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `BranchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loanrepayments`
--
ALTER TABLE `loanrepayments`
  MODIFY `RepaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `LoanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE;

--
-- Constraints for table `loanrepayments`
--
ALTER TABLE `loanrepayments`
  ADD CONSTRAINT `loanrepayments_ibfk_1` FOREIGN KEY (`LoanID`) REFERENCES `loans` (`LoanID`) ON DELETE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`AccountID`) REFERENCES `accounts` (`AccountID`) ON DELETE CASCADE;

--
-- Constraints for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `userlogin_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
