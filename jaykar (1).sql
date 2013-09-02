-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2013 at 03:03 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jaykar`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(200) NOT NULL,
  `c_address` text NOT NULL,
  `c_mo` bigint(11) NOT NULL,
  `c_ph` bigint(11) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_id`, `c_name`, `c_address`, `c_mo`, `c_ph`, `c_email`) VALUES
(1, 'Pratiksha', ' Pathardi Fhata', 9999999998, 253231456, 'pratiksha@gmail.com'),
(2, 'Geeta', ' Kanherewadi', 9368521456, 253698741, 'geeta@gmail.com'),
(3, 'Ketan Patil', '  Nashik', 9561777744, 2532502050, 'ketanpatil1788@gmail.com'),
(4, 'kishor', ' nashik', 8888888888, 32465, 'asra.yogita@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dc`
--

CREATE TABLE IF NOT EXISTS `dc` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_date` date NOT NULL,
  `d_cname` varchar(255) NOT NULL,
  `doc_no` text NOT NULL,
  `doc_date` date NOT NULL,
  `ch_no` text NOT NULL,
  `ch_date` date NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dc`
--

INSERT INTO `dc` (`d_id`, `d_date`, `d_cname`, `doc_no`, `doc_date`, `ch_no`, `ch_date`) VALUES
(1, '2013-08-31', 'Pratiksha', '1', '2013-08-10', '1', '2013-08-11'),
(2, '2013-08-31', 'kishor', '2', '2013-08-13', '1,2,3', '2013-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `i_id` int(255) NOT NULL AUTO_INCREMENT,
  `i_cname` varchar(255) NOT NULL,
  `i_date` date NOT NULL,
  `i_vat` float(10,2) NOT NULL,
  `i_total` float(10,2) NOT NULL,
  `i_gtotal` float(10,2) NOT NULL,
  `po_no` int(11) NOT NULL,
  `po_date` date NOT NULL,
  `dc_no` text NOT NULL,
  `dc_date` date NOT NULL,
  `i_words` text NOT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`i_id`, `i_cname`, `i_date`, `i_vat`, `i_total`, `i_gtotal`, `po_no`, `po_date`, `dc_no`, `dc_date`, `i_words`) VALUES
(1, 'Pratiksha', '2013-08-31', 1250.00, 10000.00, 11250.00, 1, '2013-08-10', '1', '2013-08-04', 'eleven thousand two hundred fifty '),
(2, 'Pratiksha', '2013-08-21', 7156.25, 57250.00, 64406.25, 2, '2013-08-17', '1,2,3', '2013-08-24', 'sixty four thousand four hundred six point two five ');

-- --------------------------------------------------------

--
-- Table structure for table `partial_payment`
--

CREATE TABLE IF NOT EXISTS `partial_payment` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `sl_id` varchar(11) NOT NULL,
  `c_name` varchar(25) NOT NULL,
  `p_mode` varchar(25) NOT NULL,
  `p_date` date NOT NULL,
  `p_check` varchar(25) NOT NULL,
  `p_amt` double NOT NULL,
  `bank` varchar(100) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `partial_payment`
--

INSERT INTO `partial_payment` (`p_id`, `sl_id`, `c_name`, `p_mode`, `p_date`, `p_check`, `p_amt`, `bank`) VALUES
(1, 's1', 'Kishor Patil', 'Cash', '2013-08-31', '', 1000, 'SBI'),
(2, 's1', 'Kishor Patil', 'Cash', '2013-08-31', '', 1000, 'SBI'),
(3, '2', 'Pratiksha', 'Cheque', '2013-08-31', '1234', 4406.25, 'hdfc'),
(4, '2', 'Pratiksha', 'Cash', '2013-08-31', '', 25000, ''),
(5, '2', 'Pratiksha', 'Cheque', '2013-08-31', '9049402794', 500000, 'SBi'),
(6, '1', 'Pratiksha', 'Cheque', '2013-09-02', '123456', 1250, 'SBI');

-- --------------------------------------------------------

--
-- Table structure for table `purches`
--

CREATE TABLE IF NOT EXISTS `purches` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_id` int(11) NOT NULL,
  `st_name` varchar(255) NOT NULL,
  `st_qty` float(10,2) NOT NULL,
  `st_amount` float(10,2) NOT NULL,
  `sup_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purches`
--

INSERT INTO `purches` (`s_id`, `st_id`, `st_name`, `st_qty`, `st_amount`, `sup_name`, `date`) VALUES
(1, 0, 'S1', 10000.00, 5000.00, 'Kishor Patil', '2013-08-31'),
(2, 0, 'S2', 5000.00, 50000.00, 'Jeevan', '2013-08-06'),
(3, 0, 'plastic', 5555.00, 15000.00, 'sudhir', '2013-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `sl_id` int(11) NOT NULL AUTO_INCREMENT,
  `sl_pname` varchar(255) NOT NULL,
  `sl_pqty` float(10,2) NOT NULL,
  `sl_date` date NOT NULL,
  PRIMARY KEY (`sl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sl_id`, `sl_pname`, `sl_pqty`, `sl_date`) VALUES
(1, 'Steel', 300.00, '2013-08-31'),
(2, 'bottals', 25.00, '2013-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_name` varchar(200) NOT NULL,
  `st_qty` int(11) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`st_id`, `st_name`, `st_qty`) VALUES
(1, 'S1', 9000),
(2, 'S2', 4500),
(3, 'plastic', 5300);

-- --------------------------------------------------------

--
-- Table structure for table `sub_dc`
--

CREATE TABLE IF NOT EXISTS `sub_dc` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id` int(11) NOT NULL,
  `d_des` varchar(255) NOT NULL,
  `d_qty` float(10,2) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sub_dc`
--

INSERT INTO `sub_dc` (`s_id`, `d_id`, `d_des`, `d_qty`) VALUES
(1, 1, 'Steel', 100.00),
(2, 1, 'Steel', 100.00),
(3, 2, 'bottals', 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `sub_invoice`
--

CREATE TABLE IF NOT EXISTS `sub_invoice` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_id` int(11) NOT NULL,
  `i_fg` text NOT NULL,
  `i_qty` float(10,2) NOT NULL,
  `i_rate` double(10,2) NOT NULL,
  `i_amt` double(10,2) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sub_invoice`
--

INSERT INTO `sub_invoice` (`s_id`, `i_id`, `i_fg`, `i_qty`, `i_rate`, `i_amt`) VALUES
(1, 1, 'Steel', 5.00, 1000.00, 5000.00),
(2, 1, 'Steel', 5.00, 1000.00, 5000.00),
(4, 2, 'bottals', 25.00, 1000.00, 25000.00),
(5, 2, 'bottals', 10.00, 100.00, 1000.00),
(6, 2, 'bottals', 10.00, 100.00, 1000.00),
(7, 2, 'bottals', 50.00, 40.00, 2000.00),
(8, 2, 'bottals', 50.00, 10.00, 500.00),
(9, 2, 'Steel', 152.00, 100.00, 15200.00),
(10, 2, 'bottals', 12.00, 120.00, 1440.00),
(11, 2, 'bottals', 101.00, 110.00, 11110.00),
(12, 2, 'bottals', 100.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sale`
--

CREATE TABLE IF NOT EXISTS `sub_sale` (
  `sb_id` int(11) NOT NULL AUTO_INCREMENT,
  `sl_id` int(11) NOT NULL,
  `sb_rname` varchar(100) NOT NULL,
  `sb_qty` int(11) NOT NULL,
  PRIMARY KEY (`sb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sub_sale`
--

INSERT INTO `sub_sale` (`sb_id`, `sl_id`, `sb_rname`, `sb_qty`) VALUES
(1, 1, 'S1', 1000),
(2, 1, 'S2', 500),
(3, 2, 'plastic', 200),
(4, 2, 'plastic', 55);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(200) NOT NULL,
  `s_address` text NOT NULL,
  `s_mo` bigint(11) NOT NULL,
  `s_ph` bigint(11) NOT NULL,
  `s_email` varchar(25) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`s_id`, `s_name`, `s_address`, `s_mo`, `s_ph`, `s_email`) VALUES
(1, 'Kishor Patil', 'Nashik', 8888888888, 2532502050, 'kishore@gmail.com'),
(2, 'Jeevan', 'Bhagur', 96369636963, 253145678, 'jeevan@gmail.com'),
(3, 'sudhir', 'nashik', 9999999999, 9049402794, '1');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(25) NOT NULL,
  `u_password` varchar(25) NOT NULL,
  `u_type` varchar(25) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_password`, `u_type`) VALUES
(1, 'jeevan', 'jeevan', ''),
(2, 'viviek', 'viviek', ''),
(3, 'jaykar', 'jaykar', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
