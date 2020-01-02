-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 12:42 PM
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
-- Database: `bktravels1`
--

-- --------------------------------------------------------

--
-- Table structure for table `aacorporate`
--

CREATE TABLE `aacorporate` (
  `id` int(11) NOT NULL,
  `name` varchar(555) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `email` varchar(555) NOT NULL,
  `address` varchar(555) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aacorporate`
--

INSERT INTO `aacorporate` (`id`, `name`, `phone`, `email`, `address`, `status`, `create_date`) VALUES
(1, 'new corporate india', 1234567890, 'demo@demo.com', 'bbsr', 1, '2018-05-19 05:36:44'),
(4, 'rakesh india', 1234567890, 'demo@demo.com', 'bbsr', 1, '2018-05-19 06:50:18'),
(5, 'bapi shau', 9776754563, 'bapishau@gmail.com', 'bbsr', 1, '2019-06-17 07:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `advance`
--

CREATE TABLE `advance` (
  `id` int(11) NOT NULL,
  `employee` tinyint(1) NOT NULL,
  `eid` varchar(10) NOT NULL,
  `advance` int(10) NOT NULL,
  `date` varchar(50) NOT NULL,
  `month` tinyint(2) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advance`
--

INSERT INTO `advance` (`id`, `employee`, `eid`, `advance`, `date`, `month`, `creationDate`) VALUES
(1, 1, 'ARGC01', 200, '2018-05-16', 6, '2018-05-16 12:09:40'),
(2, 1, 'ARGC01', 300, '2018-05-16', 7, '2018-05-16 13:27:36'),
(3, 1, 'ARGC01', 300, '2018-05-16', 7, '2018-05-16 13:28:40'),
(4, 1, 'ARGC01', 300, '2018-05-16', 7, '2018-05-16 13:29:19'),
(5, 1, 'ARGC01', 300, '2018-05-16', 7, '2018-05-16 13:29:24'),
(6, 1, 'ARGC01', 300, '2018-05-16', 7, '2018-05-16 13:29:40'),
(7, 1, 'ARGC01', 300, '2018-05-16', 7, '2018-05-16 13:30:49'),
(8, 1, 'ARGC01', 300, '2018-05-16', 7, '2018-05-16 13:31:05'),
(9, 1, 'ARGC01', 300, '2018-05-16', 7, '2018-05-16 13:32:06'),
(10, 1, 'ARGC01', 300, '2018-05-16', 7, '2018-05-16 13:32:22'),
(11, 1, 'ARGC01', 400, '2018-05-16', 8, '2018-05-16 13:33:18'),
(12, 1, 'ARGC01', 400, '2018-05-16', 8, '2018-05-16 13:36:32'),
(13, 1, 'ARGC01', 400, '2018-05-16', 8, '2018-05-16 13:45:29'),
(14, 1, 'ARGC01', 400, '2018-05-16', 8, '2018-05-16 13:45:34'),
(15, 1, 'ARGC01', 400, '2018-05-16', 8, '2018-05-16 13:47:08'),
(16, 1, 'ARGC01', 400, '2018-05-16', 8, '2018-05-16 13:47:32'),
(17, 2, 'ARGC02', 400, '2018-05-16', 5, '2018-05-16 13:48:12'),
(18, 2, 'ARGC02', 400, '2018-05-16', 5, '2018-05-16 13:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(50) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `vehicle_name`, `size`, `status`) VALUES
(1, 'Honda City', 'small', '1'),
(2, 'tata safari', 'big', '1'),
(3, 'honda', 'small', '1');

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `id` int(10) NOT NULL,
  `vehicle_no` varchar(15) NOT NULL,
  `vehicle_id` varchar(40) NOT NULL,
  `vehicle_name` varchar(40) NOT NULL,
  `owner_name` varchar(40) NOT NULL,
  `owner_contact_no` varchar(40) NOT NULL,
  `owner_address` varchar(255) NOT NULL,
  `owner_email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_details`
--

INSERT INTO `car_details` (`id`, `vehicle_no`, `vehicle_id`, `vehicle_name`, `owner_name`, `owner_contact_no`, `owner_address`, `owner_email`, `status`, `creationDate`) VALUES
(1, 'or-01-t3094', '1', 'Honda City', 'Honda city owner Name', '7894561230', 'bsr', 'hondacity.owneremail@gmail.com', 1, '2018-05-16 06:52:27'),
(2, 'or-01-t3095', '2', 'tata safari', 'Tata safari owner name', '7418529630', 'bbsr', 'tatasafari.owneremail@gmail.com', 1, '2018-05-16 06:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `corporate_bill`
--

CREATE TABLE `corporate_bill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `invoice_no` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `gst_no` varchar(25) NOT NULL,
  `sac_code` varchar(25) NOT NULL,
  `bill_no` varchar(25) NOT NULL,
  `month` varchar(20) NOT NULL,
  `total_km_cover` varchar(10) NOT NULL,
  `km_cover_liter` varchar(10) NOT NULL,
  `fuel_consume` varchar(10) NOT NULL,
  `fuel_rate` varchar(10) NOT NULL,
  `sub_total` varchar(10) NOT NULL,
  `km_covers_engine_oil` varchar(10) NOT NULL,
  `engine_oil_consumed` varchar(10) NOT NULL,
  `engine_oil_rate` varchar(10) NOT NULL,
  `engine_oil_charge` varchar(10) NOT NULL,
  `sub_total1` varchar(10) NOT NULL,
  `no_of_working_days` varchar(20) NOT NULL,
  `per_day_charge` varchar(20) NOT NULL,
  `sub_total2` varchar(20) NOT NULL,
  `sgst` varchar(10) NOT NULL,
  `cgst` varchar(10) NOT NULL,
  `grand_total` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corporate_bill`
--

INSERT INTO `corporate_bill` (`id`, `client_name`, `invoice_no`, `start_date`, `gst_no`, `sac_code`, `bill_no`, `month`, `total_km_cover`, `km_cover_liter`, `fuel_consume`, `fuel_rate`, `sub_total`, `km_covers_engine_oil`, `engine_oil_consumed`, `engine_oil_rate`, `engine_oil_charge`, `sub_total1`, `no_of_working_days`, `per_day_charge`, `sub_total2`, `sgst`, `cgst`, `grand_total`, `status`) VALUES
(1, 'rakesh india', '111111111111111', '2018-05-24', '11111111111111', '11111111111111', '4', '5', '100', '25', '4', '70', '280', '500', '0', '200', '0', '280', '10', '1200', '12000', '2.5 %', '2.5 %', '94', '1');

-- --------------------------------------------------------

--
-- Table structure for table `corporate_bill_client`
--

CREATE TABLE `corporate_bill_client` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `invoice_no` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `gst_no` varchar(25) NOT NULL,
  `sac_code` varchar(25) NOT NULL,
  `bill_no` varchar(25) NOT NULL,
  `month` varchar(20) NOT NULL,
  `total_km_cover` varchar(10) NOT NULL,
  `km_cover_liter` varchar(10) NOT NULL,
  `fuel_consume` varchar(10) NOT NULL,
  `fuel_rate` varchar(10) NOT NULL,
  `sub_total` varchar(10) NOT NULL,
  `km_covers_engine_oil` varchar(10) NOT NULL,
  `engine_oil_consumed` varchar(10) NOT NULL,
  `engine_oil_rate` varchar(10) NOT NULL,
  `engine_oil_charge` varchar(10) NOT NULL,
  `sub_total1` varchar(10) NOT NULL,
  `no_of_working_days` varchar(20) NOT NULL,
  `per_day_charge` varchar(20) NOT NULL,
  `sub_total2` varchar(20) NOT NULL,
  `sgst` varchar(10) NOT NULL,
  `cgst` varchar(10) NOT NULL,
  `grand_total` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corporate_bill_client`
--

INSERT INTO `corporate_bill_client` (`id`, `client_name`, `invoice_no`, `start_date`, `gst_no`, `sac_code`, `bill_no`, `month`, `total_km_cover`, `km_cover_liter`, `fuel_consume`, `fuel_rate`, `sub_total`, `km_covers_engine_oil`, `engine_oil_consumed`, `engine_oil_rate`, `engine_oil_charge`, `sub_total1`, `no_of_working_days`, `per_day_charge`, `sub_total2`, `sgst`, `cgst`, `grand_total`, `status`) VALUES
(3, 'rakesh india', '111111111111111', '2018-05-24', '11111111111111', '11111111111111', '2', '5', '100', '25', '4', '70', '280', '500', '0', '200', '0', '280', '20', '1500', '30000', '2.5 %', '2.5 %', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `corporate_car_charges`
--

CREATE TABLE `corporate_car_charges` (
  `id` int(11) NOT NULL,
  `corporate_id` int(100) NOT NULL,
  `corporate_name` varchar(255) NOT NULL,
  `vehicle_id` varchar(555) NOT NULL,
  `vehicle_name` varchar(255) NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `gst_no` varchar(255) NOT NULL,
  `sac_code` varchar(255) NOT NULL,
  `fuel_price` varchar(255) NOT NULL,
  `km_covers_onelitter_engineoil` varchar(255) NOT NULL,
  `engine_oil_price` varchar(255) NOT NULL,
  `day_charge` varchar(255) NOT NULL,
  `night_holt_charge` varchar(255) NOT NULL,
  `km_cover_in_one_litre` varchar(255) NOT NULL,
  `extra_hour_charges` varchar(255) NOT NULL,
  `price_per_km` varchar(255) NOT NULL,
  `day_charge_client` int(11) NOT NULL,
  `night_holt_charge_client` int(11) NOT NULL,
  `price_per_km_client` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corporate_car_charges`
--

INSERT INTO `corporate_car_charges` (`id`, `corporate_id`, `corporate_name`, `vehicle_id`, `vehicle_name`, `vehicle_no`, `ref_no`, `gst_no`, `sac_code`, `fuel_price`, `km_covers_onelitter_engineoil`, `engine_oil_price`, `day_charge`, `night_holt_charge`, `km_cover_in_one_litre`, `extra_hour_charges`, `price_per_km`, `day_charge_client`, `night_holt_charge_client`, `price_per_km_client`, `status`) VALUES
(5, 6, 'corporate2', '2', 'tata safari', 'or-01-t3095', '111', '555555555', 'sac2', '70', '80', '700', '1200', '100', '65', '', '80', 0, 0, 0, '1'),
(6, 4, 'rakesh india', '1', 'Honda City', 'or-01-t3094', '111111111111111', '11111111111111', '11111111111111', '70', '500', '200', '1200', '200', '25', '', '50', 1500, 500, 60, '1'),
(7, 1, 'new corporate india', '2', 'tata safari', 'or-01-t3095', '22222', '222222', '2222222', '222222', '222222', '2222222', '2222222', '22222222', '2222222222', '', '2222222', 22222222, 2222222, 2222222, '1');

-- --------------------------------------------------------

--
-- Table structure for table `corporate_month_entry`
--

CREATE TABLE `corporate_month_entry` (
  `id` int(11) NOT NULL,
  `month` varchar(11) NOT NULL,
  `year` varchar(11) NOT NULL,
  `corporate_name` varchar(555) NOT NULL,
  `km` varchar(555) NOT NULL,
  `ttime` varchar(555) NOT NULL,
  `toolgate` varchar(555) NOT NULL,
  `parking` varchar(555) NOT NULL,
  `costomer_adv` varchar(555) NOT NULL,
  `travel_adv` varchar(555) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corporate_month_entry`
--

INSERT INTO `corporate_month_entry` (`id`, `month`, `year`, `corporate_name`, `km`, `ttime`, `toolgate`, `parking`, `costomer_adv`, `travel_adv`, `date`, `status`) VALUES
(1, '5', '2018', 'rakesh india', '100', '0', '50', '20', '100', '200', '2018-05-22 09:37:33', 1),
(2, '5', '2018', 'corporate2', '1500', '0', '150', '60', '500', '1500', '2018-05-22 09:38:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customercarcharges`
--

CREATE TABLE `customercarcharges` (
  `id` int(50) NOT NULL,
  `vehicle_id` varchar(100) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `charging_type` varchar(100) NOT NULL,
  `day_charge` varchar(100) NOT NULL,
  `night_holt_charge` varchar(100) NOT NULL,
  `km_cover_in_one_litre` varchar(100) NOT NULL,
  `extra_hour_charges` varchar(100) NOT NULL,
  `price_per_km` varchar(100) NOT NULL,
  `detaintion_charges` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customercarcharges`
--

INSERT INTO `customercarcharges` (`id`, `vehicle_id`, `vehicle_name`, `charging_type`, `day_charge`, `night_holt_charge`, `km_cover_in_one_litre`, `extra_hour_charges`, `price_per_km`, `detaintion_charges`, `status`) VALUES
(1, '1', 'Honda City', 'long', '', '100', '', '', '20', '50', '1'),
(2, '1', 'Honda City', 'local', '200', '300', '10', '50', '', '', '1'),
(3, '1', 'Honda City', 'fixed', '200', '300', '10', '50', '', '', '1'),
(4, '2', 'tata safari', 'long', '', '100', '', '', '10', '50', '1'),
(5, '2', 'tata safari', 'local', '200', '300', '20', '50', '', '', '1'),
(6, '2', 'tata safari', 'fixed', '200', '300', '20', '50', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment_slip`
--

CREATE TABLE `customer_payment_slip` (
  `id` bigint(30) NOT NULL,
  `duty_slip_no` varchar(20) NOT NULL,
  `duty_date` varchar(50) NOT NULL,
  `place_from` varchar(100) NOT NULL,
  `journey_to` varchar(50) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `starting_km` varchar(20) NOT NULL,
  `closing_km` varchar(20) NOT NULL,
  `total_km` varchar(20) NOT NULL,
  `starting_time` varchar(50) NOT NULL,
  `closing_time` varchar(50) NOT NULL,
  `total_time` varchar(50) NOT NULL,
  `charging_type` varchar(30) NOT NULL,
  `extra_hour` varchar(50) NOT NULL,
  `extrahour_price` varchar(100) NOT NULL,
  `night_halt` varchar(50) NOT NULL,
  `tool_gate` varchar(50) NOT NULL,
  `parking` varchar(50) NOT NULL,
  `kmforlitre` varchar(30) NOT NULL,
  `day_basic` varchar(50) NOT NULL,
  `fuel_rate` varchar(50) NOT NULL,
  `priceper_km` varchar(30) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `day_charge` varchar(50) NOT NULL,
  `detaintion` varchar(100) NOT NULL,
  `advance_office` varchar(50) NOT NULL,
  `advance_guest` varchar(50) NOT NULL,
  `total_adv` varchar(30) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `detaintion_hour` varchar(100) NOT NULL,
  `detaintion_charges` varchar(100) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1',
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `night_halt1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_payment_slip`
--

INSERT INTO `customer_payment_slip` (`id`, `duty_slip_no`, `duty_date`, `place_from`, `journey_to`, `vehicle_name`, `vehicle_no`, `starting_km`, `closing_km`, `total_km`, `starting_time`, `closing_time`, `total_time`, `charging_type`, `extra_hour`, `extrahour_price`, `night_halt`, `tool_gate`, `parking`, `kmforlitre`, `day_basic`, `fuel_rate`, `priceper_km`, `amount`, `day_charge`, `detaintion`, `advance_office`, `advance_guest`, `total_adv`, `total_amount`, `detaintion_hour`, `detaintion_charges`, `remark`, `status`, `creationDate`, `night_halt1`) VALUES
(1, '2', '2018-05-16', 'ctc', 'bbs', 'tata safari', 'or-01-t3095', '100', '351', '251', '08:56', '10:36', '0 days : 1 hours : 40 minutes : 0 seconds', 'long', '', '', '1', '20', '20', '', '', '', '10', '2510', '', '', '0.00', '0.00', '0', '2300', '0', '0', 'nothing', 1, '2018-05-17 05:55:58', 0),
(2, '2', '2018-05-16', 'ctc', 'bbs', 'tata safari', 'or-01-t3095', '100', '351', '251', '08:56', '10:36', '0 days : 1 hours : 40 minutes : 0 seconds', 'long', '', '', '100', '20', '20', '', '', '', '10', '2510', '', '', '0.00', '0.00', '0', '2300', '0', '0', 'nothing1', 1, '2018-05-17 05:55:58', 2),
(3, '9', '2018-05-19', 'bbs', 'ctc', 'Honda City', 'or-01-t3094', '100', '200', '100', '08:56', '10:36', '0 days : 1 hours : 40 minutes : 0 seconds', 'local', '', '', '300', '20', '20', '10', '', '', '', '0', '200', '', '100.00', '100.00', '0', '0', '', '', 'new payment', 1, '2018-05-19 12:15:37', 0),
(4, '2', '2018-05-16', 'ctc', 'bbs', 'tata safari', 'or-01-t3095', '100', '351', '251', '08:56', '10:36', '0 days : 1 hours : 40 minutes : 0 seconds', 'long', '', '', '100', '20', '20', '10', '', '', '10', '2510', '200', '', '0.00', '0.00', '0', '2750', '0', '0', '', 1, '2018-05-20 16:46:34', 2),
(5, '4', '2018-05-24', 'bbs', 'ctc', 'Honda City', 'or-01-t3094', '100', '200', '100', '08:56', '12:36', '0 days : 3 hours : 40 minutes : 0 seconds', 'fixed', '', '0', '', '50', '20', '', '', '', '', '500', '', '', '200.00', '100.00', '100', '470', '', '', '', 1, '2018-05-23 22:40:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `duty_slip`
--

CREATE TABLE `duty_slip` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dutyslip_slno` int(100) NOT NULL,
  `duty_of` varchar(50) NOT NULL,
  `report_at` varchar(50) NOT NULL,
  `booked_by` varchar(50) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `vehicle_id` varchar(50) NOT NULL,
  `vehicle_name` varchar(50) NOT NULL,
  `vehicle_size` varchar(100) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `place_from` varchar(50) NOT NULL,
  `place_to` varchar(60) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `starting_km` varchar(15) NOT NULL,
  `start_time` varchar(15) NOT NULL,
  `closing_km` varchar(15) NOT NULL,
  `closing_time` varchar(15) NOT NULL,
  `closing_date` varchar(15) NOT NULL,
  `total_km` varchar(15) NOT NULL,
  `total_time` varchar(200) NOT NULL,
  `charging_type` varchar(15) NOT NULL,
  `ac_nonac` varchar(15) NOT NULL,
  `toll_gate` varchar(15) NOT NULL,
  `parking_charge` varchar(15) NOT NULL,
  `advance_paid_client` decimal(10,2) NOT NULL,
  `advance_paid_travel` decimal(10,2) NOT NULL,
  `advance_return_driver` int(11) NOT NULL,
  `paid_to_owener` int(11) NOT NULL,
  `remarks` varchar(555) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duty_slip`
--

INSERT INTO `duty_slip` (`id`, `dutyslip_slno`, `duty_of`, `report_at`, `booked_by`, `vehicle_no`, `vehicle_id`, `vehicle_name`, `vehicle_size`, `driver_name`, `place_from`, `place_to`, `start_date`, `starting_km`, `start_time`, `closing_km`, `closing_time`, `closing_date`, `total_km`, `total_time`, `charging_type`, `ac_nonac`, `toll_gate`, `parking_charge`, `advance_paid_client`, `advance_paid_travel`, `advance_return_driver`, `paid_to_owener`, `remarks`, `created_date`) VALUES
(1, 1, 'duity of', 'report at', 'booked by', 'or-01-t3094', '1', 'Honda City', 'small', 'driver name', 'bbs', 'ctc', '2018-05-23', '100', '08:56', '200', '10:36', '2018-05-23', '100', '0 days : 1 hours : 40 minutes : 0 seconds', 'local', 'ac', '20', '30', '100.00', '200.00', 300, 400, 'remarks here', '2018-05-23 21:11:01'),
(2, 2, 'duty of', 'report', 'booked by', 'or-01-t3094', '1', 'Honda City', 'small', 'driver name', 'bbs', 'ctc', '2018-05-23', '100', '08:56', '200', '23:36', '2018-05-23', '100', '0 days : 14 hours : 40 minutes : 0 seconds', 'local', 'nonac', '50', '20', '100.00', '200.00', 100, 200, 'remarks here', '2018-05-23 21:19:40'),
(3, 3, 'jjjjjj', 'jjjjjj', 'jjjjjjj', 'or-01-t3094', '1', 'Honda City', 'small', 'lllll', 'ctc', 'bbs', '2018-05-24', '100', '08:56', '1000', '23:36', '2018-05-24', '900', '0 days : 14 hours : 40 minutes : 0 seconds', 'long', 'ac', '50', '20', '100.00', '200.00', 100, 100, 'remarks here', '2018-05-23 22:05:38'),
(4, 4, 'kkkkk', 'kkkkkk', 'kkkkk', 'or-01-t3094', '1', 'Honda City', 'small', 'llllll', 'bbs', 'ctc', '2018-05-24', '100', '08:56', '200', '12:36', '2018-05-24', '100', '0 days : 3 hours : 40 minutes : 0 seconds', 'fixed', 'ac', '50', '20', '100.00', '200.00', 100, 100, 'no', '2018-05-23 22:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `duty_slip_corporate`
--

CREATE TABLE `duty_slip_corporate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dutyslip_slno` int(100) NOT NULL,
  `corporate_id` varchar(50) NOT NULL,
  `corporate_name` varchar(255) NOT NULL,
  `report_at` varchar(50) NOT NULL,
  `booked_by` varchar(50) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `vehicle_id` varchar(50) NOT NULL,
  `vehicle_name` varchar(50) NOT NULL,
  `vehicle_size` varchar(100) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `place_from` varchar(50) NOT NULL,
  `place_to` varchar(60) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `starting_km` varchar(15) NOT NULL,
  `start_time` varchar(15) NOT NULL,
  `closing_km` varchar(15) NOT NULL,
  `closing_time` varchar(15) NOT NULL,
  `closing_date` varchar(15) NOT NULL,
  `total_km` varchar(15) NOT NULL,
  `total_time` varchar(200) NOT NULL,
  `charging_type` varchar(15) NOT NULL,
  `ac_nonac` varchar(15) NOT NULL,
  `toll_gate` varchar(15) NOT NULL,
  `parking_charge` varchar(15) NOT NULL,
  `advance_paid_client` decimal(10,2) NOT NULL,
  `advance_paid_travel` decimal(10,2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `monthof` int(11) NOT NULL,
  `yearof` int(11) NOT NULL,
  `advance_return_driver` int(11) NOT NULL,
  `paid_to_owener` int(11) NOT NULL,
  `remarks` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duty_slip_corporate`
--

INSERT INTO `duty_slip_corporate` (`id`, `dutyslip_slno`, `corporate_id`, `corporate_name`, `report_at`, `booked_by`, `vehicle_no`, `vehicle_id`, `vehicle_name`, `vehicle_size`, `driver_name`, `place_from`, `place_to`, `start_date`, `starting_km`, `start_time`, `closing_km`, `closing_time`, `closing_date`, `total_km`, `total_time`, `charging_type`, `ac_nonac`, `toll_gate`, `parking_charge`, `advance_paid_client`, `advance_paid_travel`, `created_date`, `monthof`, `yearof`, `advance_return_driver`, `paid_to_owener`, `remarks`) VALUES
(1, 1, '4', 'rakesh india', 'kkkk', 'kkkkkk', 'or-01-t3094', '1', 'Honda City', '', 'kkkkkkkk', 'bbs', 'c', '2018-05-24', '200', '08:56', '300', '10:36', '2018-05-24', '100', '0 days : 1 hours : 40 minutes : 0 seconds', '', 'ac', '50', '20', '100.00', '200.00', '2018-05-23 22:51:01', 5, 2018, 100, 200, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(10) NOT NULL,
  `emp_catagory` varchar(100) NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `aadhar_cardno` varchar(15) NOT NULL,
  `dl_no` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `basic` decimal(10,2) NOT NULL,
  `epf` decimal(10,2) NOT NULL,
  `esic` decimal(10,2) NOT NULL,
  `hra` decimal(10,2) NOT NULL,
  `da` decimal(10,2) NOT NULL,
  `other` decimal(10,2) NOT NULL,
  `gross` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1' COMMENT '1 -> True 0 -> False',
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `emp_catagory`, `emp_name`, `father_name`, `contact_no`, `emailid`, `birth_date`, `joining_date`, `aadhar_cardno`, `dl_no`, `address`, `basic`, `epf`, `esic`, `hra`, `da`, `other`, `gross`, `amount`, `status`, `creationDate`) VALUES
(1, 'driver', 'Driver Name', 'Driver Father Name', '9876543210', 'driver.name@gmail.com', '1995-03-17', '2018-05-16', '111111111111', '000000000000', 'BBSR', '1000.00', '1100.00', '1000.00', '1200.00', '1300.00', '1400.00', '4900.00', '2800.00', 1, '2018-05-16 06:32:48'),
(2, 'employee', 'Employee Name', 'Employee Father Name', '9638527410', 'employe.email@gmail.com', '1995-02-01', '2018-05-16', '111111111111', '000000000000', 'bbsr', '1000.00', '1100.00', '1200.00', '1300.00', '1400.00', '1500.00', '5200.00', '2900.00', 1, '2018-05-16 06:40:38'),
(3, 'employee', 'rakesh kumar', 'manoj kumar', '977287826', 'rakieshkumar@gmail.com', '1994-06-17', '2019-06-17', '45678901234', '8756375467', 'bbsr', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '4.00', '2.00', 1, '2019-06-17 07:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `details` varchar(255) NOT NULL,
  `mode` varchar(40) NOT NULL,
  `amount` int(5) NOT NULL,
  `payType` tinyint(1) NOT NULL COMMENT '0-> Debit 1->Credit',
  `balance` int(10) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `ename`, `details`, `mode`, `amount`, `payType`, `balance`, `creationDate`) VALUES
(1, 'Driver Name', 'Salary Paid to Mr.Driver Name holding the Employee ID :ARGC01', '1', 2900, 0, -2900, '2018-05-16 11:39:07'),
(2, 'Driver Name', 'Advance Returned by Mr.Driver Name holding the Employee ID :ARGC01', '1', 0, 1, -2900, '2018-05-16 11:39:07'),
(3, 'Driver Name', 'expanse details', '1', 200, 1, 0, '2018-05-16 12:10:24'),
(4, 'Driver Name', 'expanse details', '1', 200, 0, 0, '2018-05-16 12:10:33'),
(5, 'Driver Name', 'Advance Paid to Mr/Ms.Driver Name holding the Employee ID :ARGC01', '1', 400, 0, -400, '2018-05-16 13:47:32'),
(6, '', 'Advance Paid to Mr/Ms.Employee Name holding the Employee ID :ARGC02', '1', 400, 0, -800, '2018-05-16 13:48:13'),
(7, 'Employee Name', 'Advance Paid to Mr/Ms.Employee Name holding the Employee ID :ARGC02', '1', 400, 0, -1200, '2018-05-16 13:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `insertproduct`
--

CREATE TABLE `insertproduct` (
  `id` int(10) NOT NULL,
  `customer_details` varchar(100) NOT NULL,
  `order_no` varchar(100) NOT NULL,
  `rdate` varchar(100) NOT NULL,
  `so_no` varchar(100) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `place_of_supply` varchar(200) NOT NULL,
  `sl_no` int(10) NOT NULL,
  `mat_code` varchar(100) NOT NULL,
  `mat_des` varchar(100) NOT NULL,
  `hsn_code` varchar(10) NOT NULL,
  `freight` int(10) NOT NULL,
  `cgst` varchar(40) NOT NULL,
  `sgst` varchar(100) NOT NULL,
  `igst` varchar(10) NOT NULL,
  `customer_drg_no` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `amount` float NOT NULL,
  `tax_cost` decimal(10,2) NOT NULL,
  `pay_cost` decimal(10,2) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill` int(10) NOT NULL,
  `quantity_avail` int(10) NOT NULL,
  `volume` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `days` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month`, `days`) VALUES
(1, 'January', 31),
(2, 'February', 28),
(3, 'March', 31),
(4, 'April', 30),
(5, 'May', 31),
(6, 'June', 30),
(7, 'July', 31),
(8, 'August', 31),
(9, 'September', 30),
(10, 'October', 31),
(11, 'November', 30),
(12, 'December', 31);

-- --------------------------------------------------------

--
-- Table structure for table `officebill`
--

CREATE TABLE `officebill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `invoice_no` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `gst_no` varchar(25) NOT NULL,
  `sac_code` varchar(25) NOT NULL,
  `bill_no` varchar(25) NOT NULL,
  `month` varchar(20) NOT NULL,
  `total_km_cover` varchar(10) NOT NULL,
  `km_cover_liter` varchar(10) NOT NULL,
  `fuel_consume` varchar(10) NOT NULL,
  `fuel_rate` varchar(10) NOT NULL,
  `sub_total` varchar(10) NOT NULL,
  `km_covers_engine_oil` varchar(10) NOT NULL,
  `engine_oil_consumed` varchar(10) NOT NULL,
  `engine_oil_rate` varchar(10) NOT NULL,
  `engine_oil_charge` varchar(10) NOT NULL,
  `sub_total1` varchar(10) NOT NULL,
  `no_of_working_days` varchar(20) NOT NULL,
  `per_day_charge` varchar(20) NOT NULL,
  `sub_total2` varchar(20) NOT NULL,
  `sgst` varchar(10) NOT NULL,
  `cgst` varchar(10) NOT NULL,
  `grand_total` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officebill`
--

INSERT INTO `officebill` (`id`, `client_name`, `invoice_no`, `start_date`, `gst_no`, `sac_code`, `bill_no`, `month`, `total_km_cover`, `km_cover_liter`, `fuel_consume`, `fuel_rate`, `sub_total`, `km_covers_engine_oil`, `engine_oil_consumed`, `engine_oil_rate`, `engine_oil_charge`, `sub_total1`, `no_of_working_days`, `per_day_charge`, `sub_total2`, `sgst`, `cgst`, `grand_total`, `status`) VALUES
(3, 'hgdgh', 'hgfhgvh', '2018-05-21', '4654tgdf', 'ghdg554', '34', 'jan', '1000', '10', '100', '50', '5000', '500', '2', '500', '1000', '6000', '20', '200', '4000', '2.5 %', '2.5 %', '10500', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ownercarcharges`
--

CREATE TABLE `ownercarcharges` (
  `id` int(50) NOT NULL,
  `vehicle_id` varchar(100) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `charging_type` varchar(100) NOT NULL,
  `day_charge` varchar(100) NOT NULL,
  `night_holt_charge` varchar(100) NOT NULL,
  `km_cover_in_one_litre` varchar(100) NOT NULL,
  `extra_hour_charges` varchar(100) NOT NULL,
  `price_per_km` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ownercarcharges`
--

INSERT INTO `ownercarcharges` (`id`, `vehicle_id`, `vehicle_name`, `charging_type`, `day_charge`, `night_holt_charge`, `km_cover_in_one_litre`, `extra_hour_charges`, `price_per_km`, `status`) VALUES
(1, '1', 'Honda City', 'long', '', '100', '', '', '10', '1'),
(2, '1', 'Honda City', 'local', '100', '50', '15', '150', '', '1'),
(3, '1', 'Honda City', 'fixed', '300', '400', '30', '50', '', '1'),
(4, '2', 'tata safari', 'long', '', '200', '', '', '20', '1'),
(5, '2', 'tata safari', 'local', '400', '500', '20', '50', '', '1'),
(6, '2', 'tata safari', 'fixed', '600', '700', '60', '50', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `owner_payment_slip`
--

CREATE TABLE `owner_payment_slip` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duty_slip_no` varchar(20) NOT NULL,
  `duty_date` varchar(50) NOT NULL,
  `place_from` varchar(100) NOT NULL,
  `journey_to` varchar(50) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `starting_km` varchar(20) NOT NULL,
  `closing_km` varchar(20) NOT NULL,
  `total_km` varchar(20) NOT NULL,
  `starting_time` varchar(50) NOT NULL,
  `closing_time` varchar(50) NOT NULL,
  `total_time` varchar(50) NOT NULL,
  `charging_type` varchar(30) NOT NULL,
  `extra_hour` varchar(50) NOT NULL,
  `extrahour_price` varchar(100) NOT NULL,
  `night_halt` varchar(50) NOT NULL,
  `tool_gate` varchar(50) NOT NULL,
  `parking` varchar(50) NOT NULL,
  `kmforlitre` varchar(30) NOT NULL,
  `day_basic` varchar(50) NOT NULL,
  `fuel_rate` varchar(50) NOT NULL,
  `priceper_km` varchar(30) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `day_charge` varchar(50) NOT NULL,
  `advance_office` varchar(50) NOT NULL,
  `advance_guest` varchar(50) NOT NULL,
  `total_adv` varchar(30) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1',
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner_payment_slip`
--

INSERT INTO `owner_payment_slip` (`id`, `duty_slip_no`, `duty_date`, `place_from`, `journey_to`, `vehicle_name`, `vehicle_no`, `starting_km`, `closing_km`, `total_km`, `starting_time`, `closing_time`, `total_time`, `charging_type`, `extra_hour`, `extrahour_price`, `night_halt`, `tool_gate`, `parking`, `kmforlitre`, `day_basic`, `fuel_rate`, `priceper_km`, `amount`, `day_charge`, `advance_office`, `advance_guest`, `total_adv`, `total_amount`, `remark`, `status`, `creationDate`) VALUES
(1, '2', '2018-05-23', '', 'ctc', 'Honda City', 'or-01-t3094', '100', '200', '100', '08:56', '23:36', '0 days : 14 hours : 40 minutes : 0 seconds', 'local', '2 hours : 30 minutes  ', '375', '50', '50', '20', '15', '467', '70', '', '567', '100', '200.00', '100.00', '200', '742', '', 1, '2018-05-23 21:58:47'),
(2, '3', '2018-05-24', '', 'bbs', 'Honda City', 'or-01-t3094', '100', '1000', '900', '08:56', '23:36', '0 days : 14 hours : 40 minutes : 0 seconds', 'long', '', '0', '100', '50', '20', '', '', '', '10', '9000', '', '200.00', '100.00', '100', '8900', 'mothing', 1, '2018-05-23 22:11:55'),
(3, '4', '2018-05-24', '', 'ctc', 'Honda City', 'or-01-t3094', '100', '200', '100', '08:56', '12:36', '0 days : 3 hours : 40 minutes : 0 seconds', 'fixed', '', '0', '', '50', '20', '', '', '', '', '500', '', '200.00', '100.00', '100', '400', 'no', 1, '2018-05-23 22:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `employee` int(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `month` int(10) NOT NULL,
  `leaves` int(10) NOT NULL,
  `salary` int(10) NOT NULL,
  `advance` int(5) NOT NULL,
  `status` int(30) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employee`, `designation`, `eid`, `pan`, `month`, `leaves`, `salary`, `advance`, `status`, `creationDate`) VALUES
(1, 1, 'employee', 'ARGC01', '', 4, 0, 2900, 0, 0, '2018-05-16 11:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `sellitems`
--

CREATE TABLE `sellitems` (
  `id` int(10) NOT NULL,
  `customer_details` varchar(100) NOT NULL,
  `po_no` varchar(100) NOT NULL,
  `new_customer` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `offer_no` varchar(100) NOT NULL,
  `gstin` varchar(100) NOT NULL,
  `dispatched` varchar(100) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `invoice_date` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `challan_no` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `challan_date` varchar(40) NOT NULL,
  `serial_no` int(10) NOT NULL,
  `mat_des` int(40) NOT NULL,
  `pl_serial_no` varchar(10) NOT NULL,
  `hsn_code` int(10) NOT NULL,
  `unit` int(10) NOT NULL,
  `purchase_rate` int(10) NOT NULL,
  `tax_amount` int(10) NOT NULL,
  `total_cost` int(10) NOT NULL,
  `rate` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `item_value` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `sgst` int(10) NOT NULL,
  `cgst` int(10) NOT NULL,
  `igst` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `pay_cost` int(10) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill` int(10) NOT NULL,
  `income` int(10) NOT NULL,
  `mrp` varchar(100) NOT NULL,
  `retail` int(10) NOT NULL DEFAULT '0',
  `volume` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_advance`
--

CREATE TABLE `trans_advance` (
  `id` int(11) NOT NULL,
  `employee` tinyint(1) NOT NULL,
  `eid` varchar(10) NOT NULL,
  `advance` int(10) NOT NULL,
  `date` varchar(50) NOT NULL,
  `month` tinyint(2) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1->Advance Taken 2->Advance Paid',
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_advance`
--

INSERT INTO `trans_advance` (`id`, `employee`, `eid`, `advance`, `date`, `month`, `type`, `creationDate`) VALUES
(1, 1, 'ARGC01', 200, '2018-05-16', 6, 1, '2018-05-16 12:09:40'),
(2, 1, 'ARGC01', 300, '2018-05-16', 7, 1, '2018-05-16 13:27:37'),
(3, 1, 'ARGC01', 300, '2018-05-16', 7, 1, '2018-05-16 13:28:40'),
(4, 1, 'ARGC01', 300, '2018-05-16', 7, 1, '2018-05-16 13:29:19'),
(5, 1, 'ARGC01', 300, '2018-05-16', 7, 1, '2018-05-16 13:29:24'),
(6, 1, 'ARGC01', 300, '2018-05-16', 7, 1, '2018-05-16 13:29:40'),
(7, 1, 'ARGC01', 300, '2018-05-16', 7, 1, '2018-05-16 13:30:49'),
(8, 1, 'ARGC01', 300, '2018-05-16', 7, 1, '2018-05-16 13:31:05'),
(9, 1, 'ARGC01', 300, '2018-05-16', 7, 1, '2018-05-16 13:32:06'),
(10, 1, 'ARGC01', 300, '2018-05-16', 7, 1, '2018-05-16 13:32:22'),
(11, 1, 'ARGC01', 400, '2018-05-16', 8, 1, '2018-05-16 13:33:18'),
(12, 1, 'ARGC01', 400, '2018-05-16', 8, 1, '2018-05-16 13:36:32'),
(13, 1, 'ARGC01', 400, '2018-05-16', 8, 1, '2018-05-16 13:45:29'),
(14, 1, 'ARGC01', 400, '2018-05-16', 8, 1, '2018-05-16 13:45:34'),
(15, 1, 'ARGC01', 400, '2018-05-16', 8, 1, '2018-05-16 13:47:08'),
(16, 1, 'ARGC01', 400, '2018-05-16', 8, 1, '2018-05-16 13:47:32'),
(17, 2, 'ARGC02', 400, '2018-05-16', 5, 1, '2018-05-16 13:48:13'),
(18, 2, 'ARGC02', 400, '2018-05-16', 5, 1, '2018-05-16 13:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_name`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aacorporate`
--
ALTER TABLE `aacorporate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advance`
--
ALTER TABLE `advance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporate_bill`
--
ALTER TABLE `corporate_bill`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `corporate_bill_client`
--
ALTER TABLE `corporate_bill_client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `corporate_car_charges`
--
ALTER TABLE `corporate_car_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporate_month_entry`
--
ALTER TABLE `corporate_month_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customercarcharges`
--
ALTER TABLE `customercarcharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payment_slip`
--
ALTER TABLE `customer_payment_slip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duty_slip`
--
ALTER TABLE `duty_slip`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `duty_slip_corporate`
--
ALTER TABLE `duty_slip_corporate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insertproduct`
--
ALTER TABLE `insertproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officebill`
--
ALTER TABLE `officebill`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ownercarcharges`
--
ALTER TABLE `ownercarcharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_payment_slip`
--
ALTER TABLE `owner_payment_slip`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellitems`
--
ALTER TABLE `sellitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_advance`
--
ALTER TABLE `trans_advance`
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
-- AUTO_INCREMENT for table `aacorporate`
--
ALTER TABLE `aacorporate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `advance`
--
ALTER TABLE `advance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car_details`
--
ALTER TABLE `car_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `corporate_bill`
--
ALTER TABLE `corporate_bill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `corporate_bill_client`
--
ALTER TABLE `corporate_bill_client`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `corporate_car_charges`
--
ALTER TABLE `corporate_car_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `corporate_month_entry`
--
ALTER TABLE `corporate_month_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customercarcharges`
--
ALTER TABLE `customercarcharges`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_payment_slip`
--
ALTER TABLE `customer_payment_slip`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `duty_slip`
--
ALTER TABLE `duty_slip`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `duty_slip_corporate`
--
ALTER TABLE `duty_slip_corporate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `insertproduct`
--
ALTER TABLE `insertproduct`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `officebill`
--
ALTER TABLE `officebill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ownercarcharges`
--
ALTER TABLE `ownercarcharges`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `owner_payment_slip`
--
ALTER TABLE `owner_payment_slip`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sellitems`
--
ALTER TABLE `sellitems`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_advance`
--
ALTER TABLE `trans_advance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
