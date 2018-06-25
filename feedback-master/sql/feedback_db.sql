-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 05, 2018 at 07:29 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `feedback_db`
--
CREATE DATABASE IF NOT EXISTS `feedback_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `feedback_db`;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `fid` int(11) NOT NULL PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `co1` int(11) NOT NULL,
  `co2` int(11) NOT NULL,
  `co3` int(11) NOT NULL,
  `co4` int(11) NOT NULL,
  `co5` int(11) NOT NULL,
  `co6` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subid` int(11) NOT NULL PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `co1` varchar(3000) NOT NULL,
  `co2` varchar(3000) NOT NULL,
  `co3` varchar(3000) NOT NULL,
  `co4` varchar(3000) NOT NULL,
  `co5` varchar(3000) NOT NULL,
  `co6` varchar(3000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `year` varchar(10) NOT NULL,
  `sec` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `regno` bigint(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
