-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2016 at 09:51 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_approve`
--

CREATE TABLE `admin_approve` (
  `admin_approve` int(11) NOT NULL,
  `name_stat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_approve`
--

INSERT INTO `admin_approve` (`admin_approve`, `name_stat`) VALUES
(1, 'Pending'),
(2, 'Approve'),
(3, 'Disapproved');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `admin_user_name` varchar(100) NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_user_name`, `admin_password`) VALUES
(1, 'Adnan', 'adnan'),
(2, 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_fname` varchar(50) NOT NULL,
  `emp_lname` varchar(50) NOT NULL,
  `emp_uname` varchar(100) NOT NULL,
  `emp_img` text NOT NULL,
  `emp_designation` varchar(100) NOT NULL,
  `emp_basic_salary` int(255) NOT NULL,
  `emp_contact_num` int(11) NOT NULL,
  `emp_address` text NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_fname`, `emp_lname`, `emp_uname`, `emp_img`, `emp_designation`, `emp_basic_salary`, `emp_contact_num`, `emp_address`, `emp_dob`, `emp_email`, `emp_password`) VALUES
(13, 'Salman', 'Irfan', 'Salman', '13435477_10154307332163896_2963929287087149695_n.jpg', 'importer', 70000, 324, '123-C Block ', '1989-06-12', 'salman@gmail.com', 'salman'),
(15, 'Hassan', 'Iftikhar', 'Hassan', '555387_274479266014786_1567974469_n.jpg', 'Project Manager', 80000, 321, '123-D Block ', '1993-12-12', 'hassan@gmail.com', 'hassan'),
(16, 'Haroon', 'Irfan', 'Haroon', 'mahirakhan_635553571782798750.jpg', 'Chief Executive', 90000, 322, '123-F,Block', '1992-08-08', 'haroon@gmail.com', 'haroon'),
(18, 'Usman', 'Irfan', 'Usman', 'photo.jpg', 'Market Manager', 50000, 2147483647, '123-E,Block ', '1988-01-01', 'usman@gmail.com', 'usman'),
(19, 'Imran', 'Khan', 'Imran', 'mahira .jpg', 'Manager', 70000, 2147483647, '123-F,Block ', '1987-08-01', 'imran@gmail.com', 'imran'),
(20, 'Hamza', 'Ahmad', 'Hamza', '11033188_410820549086724_6404838366550616256_n.jpg', 'Junior Worker', 10000, 2147483647, '123-E,Block', '1994-08-01', 'hamza@gmail.com', 'hamza');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `att_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `attendance` int(10) NOT NULL,
  `attend_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`att_id`, `emp_id`, `attendance`, `attend_date`) VALUES
(1, 10, 1, '0000-00-00'),
(2, 13, 3, '2016-07-14'),
(3, 13, 3, '2016-07-14'),
(4, 8, 1, '2016-07-13'),
(5, 15, 1, '2016-07-13'),
(6, 10, 1, '2016-07-15'),
(7, 16, 1, '2016-07-18'),
(8, 20, 1, '2016-07-20'),
(9, 13, 1, '2016-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leave_id` int(11) NOT NULL,
  `emp_id` int(100) NOT NULL,
  `date` date NOT NULL,
  `leave_type` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_days` int(10) NOT NULL,
  `admin_approve` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `emp_id`, `date`, `leave_type`, `start_date`, `end_date`, `no_days`, `admin_approve`) VALUES
(1, 15, '2016-07-14', 'Vacation Leave', '2016-07-14', '2016-07-20', 6, 2),
(2, 15, '2016-07-14', 'Vacation Leave', '2016-07-14', '2016-07-20', 6, 3),
(3, 10, '2016-07-15', 'Sick Leave', '2016-07-15', '2016-07-29', 14, 2),
(4, 16, '2016-07-18', 'Sick Leave', '2016-07-18', '2016-07-21', 3, 2),
(5, 16, '2016-07-18', 'Sick Leave', '2016-07-18', '2016-07-21', 3, 3),
(6, 19, '2016-07-20', 'Urgent Work', '2016-07-20', '2016-07-25', 5, 3),
(7, 19, '2016-07-20', 'Urgent Work', '2016-07-20', '2016-07-25', 5, 2),
(8, 19, '2016-07-20', 'sick leave', '2016-07-26', '2016-07-28', 2, 2),
(9, 20, '2016-07-21', 'sick leave', '2016-07-20', '2016-07-30', 10, 3),
(10, 13, '2016-08-02', 'sick leave', '2016-08-02', '2016-08-10', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(100) NOT NULL,
  `emp_id` int(100) NOT NULL,
  `emp_fname` varchar(100) NOT NULL,
  `emp_lname` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `basic_salary` varchar(100) NOT NULL,
  `house_rent` varchar(100) NOT NULL,
  `transport` varchar(100) NOT NULL,
  `utility` varchar(100) NOT NULL,
  `tax_deductions` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `salary_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `emp_id`, `emp_fname`, `emp_lname`, `designation`, `basic_salary`, `house_rent`, `transport`, `utility`, `tax_deductions`, `total`, `salary_date`) VALUES
(1, 13, 'Salman', 'Irfan', 'importer', '70000', '10500', '7000', '7000', '6300', '88200', '2016-08-02 05:31:46'),
(2, 15, 'Hassan', 'Iftikhar', 'Project Manager', '80000', '12000', '8000', '8000', '7200', '100800', '2016-08-02 07:34:25'),
(3, 16, 'Haroon', 'Irfan', 'Chief Executive', '90000', '13500', '9000', '9000', '8100', '113400', '2016-08-02 07:34:35'),
(4, 18, 'Usman', 'Irfan', 'Market Manager', '50000', '7500', '5000', '5000', '4500', '63000', '2016-08-02 07:34:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_approve`
--
ALTER TABLE `admin_approve`
  ADD PRIMARY KEY (`admin_approve`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_approve`
--
ALTER TABLE `admin_approve`
  MODIFY `admin_approve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `att_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
