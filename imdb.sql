-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2026 at 07:29 PM
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
-- Database: `imdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept_employee_info`
--

CREATE TABLE `dept_employee_info` (
  `id` int(11) NOT NULL,
  `city_name` varchar(100) DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `employee_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`employee_details`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept_employee_info`
--

INSERT INTO `dept_employee_info` (`id`, `city_name`, `department_name`, `employee_details`) VALUES
(1, 'Seattle', 'IT', '[\n        {\n            \"id\": 101,\n            \"first_name\": \"Bruce\",\n            \"last_name\": \"Wayne\",\n            \"hire_date\": \"2018-03-15\",\n            \"job_title\": \"Programmer\",\n            \"salary\": 75000\n        },\n        {\n            \"id\": 102,\n            \"first_name\": \"Diana\",\n            \"last_name\": \"Prince\",\n            \"hire_date\": \"2019-07-22\",\n            \"job_title\": \"Systems Analyst\",\n            \"salary\": 82000\n        },\n        {\n            \"id\": 103,\n            \"first_name\": \"Clark\",\n            \"last_name\": \"Kent\",\n            \"hire_date\": \"2020-01-10\",\n            \"job_title\": \"Network Engineer\",\n            \"salary\": 79000\n        }\n    ]'),
(18, 'Seattle', 'IT', '[{\"id\":101,\"first_name\":\"Bruce\",\"last_name\":\"Wayne\",\"hire_date\":\"2018-03-15\",\"job_title\":\"Programmer\",\"salary\":75000},{\"id\":102,\"first_name\":\"Diana\",\"last_name\":\"Prince\",\"hire_date\":\"2019-07-22\",\"job_title\":\"Systems Analyst\",\"salary\":82000},{\"id\":103,\"first_name\":\"Clark\",\"last_name\":\"Kent\",\"hire_date\":\"2020-01-10\",\"job_title\":\"Network Engineer\",\"salary\":79000}]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dept_employee_info`
--
ALTER TABLE `dept_employee_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dept_employee_info`
--
ALTER TABLE `dept_employee_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
