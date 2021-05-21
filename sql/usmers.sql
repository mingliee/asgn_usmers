-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 08:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usmers`
--

-- --------------------------------------------------------

--
-- Table structure for table `abbr`
--

CREATE TABLE `abbr` (
  `ABBR_ID` int(255) NOT NULL,
  `ABBR_VALUE` varchar(11) NOT NULL,
  `ABBR_NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abbr`
--

INSERT INTO `abbr` (`ABBR_ID`, `ABBR_VALUE`, `ABBR_NAME`) VALUES
(1, 'meetup', 'Meet Up'),
(2, 'mail', 'Mailing or Delivery'),
(3, 'meetup mail', 'Meet Up, Mailing or Delivery'),
(4, 'male', 'Male'),
(5, 'female', 'Female'),
(6, 'male female', 'Male,Female'),
(7, 'parttime', 'Part-time'),
(8, 'freelance', 'Freelance'),
(9, 'internship', 'Internship'),
(10, 'permonth', 'Per Month'),
(11, 'perday', 'Per Day'),
(12, 'used', 'Used'),
(13, 'new', 'New'),
(14, 'perhour', 'Per Hour');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` varchar(20) NOT NULL,
  `USER_EMAIL` varchar(255) NOT NULL,
  `ADDED_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `USER_EMAIL`, `ADDED_DATE`) VALUES
('A00001', 'henry@usm.my', '2021-05-01 15:42:32'),
('A00002', 'anna@usm.my', '2021-05-02 13:57:51'),
('A00003', 'minglilee@student.usm.my', '2021-05-02 14:03:37'),
('A00004', 'Wohoo@usm.my', '2021-05-02 14:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `ads_accom`
--

CREATE TABLE `ads_accom` (
  `ADS_ID` varchar(20) NOT NULL,
  `ADS_STATUS` varchar(50) NOT NULL,
  `ADS_TITLE` text NOT NULL,
  `ADS_CAT` varchar(50) NOT NULL,
  `ADS_PRICE` decimal(9,2) NOT NULL,
  `ADS_DESCP` text NOT NULL,
  `ADS_LOC` varchar(50) NOT NULL,
  `ADS_AREA` varchar(50) DEFAULT NULL,
  `ADS_PUBLISH_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ADS_LATEST_UPDATE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USER_ID` int(11) NOT NULL,
  `ACCM_TENET_PREF` varchar(11) NOT NULL,
  `PRIVATE_STATUS` varchar(11) DEFAULT NULL,
  `ADMIN_UPDATE_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads_accom`
--

INSERT INTO `ads_accom` (`ADS_ID`, `ADS_STATUS`, `ADS_TITLE`, `ADS_CAT`, `ADS_PRICE`, `ADS_DESCP`, `ADS_LOC`, `ADS_AREA`, `ADS_PUBLISH_DATE`, `ADS_LATEST_UPDATE_DATE`, `USER_ID`, `ACCM_TENET_PREF`, `PRIVATE_STATUS`, `ADMIN_UPDATE_DATE`) VALUES
('AA00007', 'DELETED', 'room for rent', 'accommodation room', '220.00', 'new', 'Desa Airmas', '', '2021-04-19 10:22:20', '2021-03-30 11:43:28', 33, 'male female', 'ACTIVE', NULL),
('AA00008', 'SOLD', 'Queensbay area', 'accommodation room', '44.00', 'Queensbay Area', 'Penang', '', '2021-04-19 10:22:20', '2021-04-01 11:38:59', 33, 'male female', 'ACTIVE', NULL),
('AA00009', 'ACTIVE', 'Taman Pekaka Room for Rent', 'accommodation room', '500.00', 'Taman Pekaka Room For Rent<br />\r\n<br />\r\n&quot;nice place&quot;', 'Taman Pekaka', '', '2021-04-19 10:22:20', '2021-04-01 11:17:17', 37, 'male female', 'ACTIVE', NULL),
('AA00010', 'ACTIVE', 'U-Height House to Rent', 'accommodation house', '7800.00', 'U-Height House To Rent.<br />\r\nNear to USM', 'University Heights', '', '2021-04-19 10:22:20', '2021-04-01 11:26:03', 34, 'male female', 'ACTIVE', NULL),
('AA00011', 'DELETED', 'Universiti Heights Apartment, Room for rent', 'accommodation room', '550.00', 'Universiti Heights Apartment, Sungai Dua, Gelugor<br />\r\n-Master bedroom (2-3 persons) RM550 per room<br />\r\n-Middle room (2 persons -left one slot) RM360 per room<br />\r\n-Single room RM200<br />\r\n*Utilities fees excluded<br />\r\n-no contract<br />\r\n-available at 1st April<br />\r\n-Fully furnished (washing machine, heater, refrigerator etc)<br />\r\n-cooking allowed<br />\r\n-WIFI provided<br />\r\n-swimming pool (currently closed)<br />\r\n-walking distance to usm, bus stop<br />\r\n-5 mins to tesco extra, food court, KFC, McD etc<br />\r\n-prefer Chinese<br />\r\nKindly PM me if interested', 'University Heights', '', '2021-04-19 10:22:20', '2021-04-03 10:59:35', 35, 'male female', 'ACTIVE', NULL),
('AA00012', 'ACTIVE', 'Desa Airmas, Shared Middle Room For rent', 'accommodation room', '275.00', 'Desa Airmas<br />\r\nShared Middle Room for rent from now until September 2021 (one place left)<br />\r\n*GIRL ONLY*<br />\r\n- RM275/month<br />\r\n- Rental fees includes utilities and Wi-Fi<br />\r\n- Fully furnished: refrigerator, washing machine, water heater, study table and chair, bed, wardrobe, etc.<br />\r\n-Facilities: swimming pool, 24 hours security, playground, etc.<br />\r\n-Cooking is allowed.<br />\r\n-Have regular cleaning services.<br />\r\nPlease message me directly if interested. Thank you.', 'Desa Airmas', '', '2021-04-19 10:22:20', '2021-04-03 11:00:26', 35, 'female ', 'ACTIVE', NULL),
('AA00013', 'DELETED', 'U Height 97 whole unit for rent', 'accommodation house', '5454.00', 'U Height 97 whole unit for rent ðŸ¢<br />\r\n- 3 Bedroom and 2 bathroom<br />\r\n- Fully FurnishedðŸ›‹ï¸ (Refrigeratorâœ”ï¸, Washing Machineâœ”ï¸)<br />\r\n- Cooking allowedðŸ²ðŸ³<br />\r\n- 1 Car ParkðŸš—<br />\r\n- 1 Motorcycle Park ðŸï¸<br />\r\n- Walking distance to USM, Tesco, Hawker centerðŸš¶ðŸš¶&zwj;â™‚ï¸<br />\r\n- Prefer ChineseðŸ‘­ðŸ»ðŸ‘«ðŸ»<br />\r\n- Direct to ownerðŸ˜²<br />\r\nPm me if you&quot;re interestedðŸ˜‰', 'University Heights', '', '2021-04-19 10:03:14', '2021-04-03 11:01:07', 35, 'male female', 'ACTIVE', '2021-04-19 10:03:14'),
('AA00014', 'ACTIVE', 'Gambier Heights Middle room for rent', 'accommodation room', '400.00', 'Gambier Heights Middle room for rent<br />\r\n- monthly rental RM400<br />\r\n- contract end at 31 Aug 2021<br />\r\n- queen sized bed<br />\r\n- rental excluding water, electric bills, Wifi<br />\r\n- including 1 parking spot<br />\r\n- fully furnished<br />\r\n- aircond, ceiling fan, refrigerator, stove, water heater, wardrobe, washing machine available<br />\r\n- walking distance from USM, 10 mins drive from tesco,15mins drive from queensbay mall<br />\r\n- hawker stall, convenient store and barber at G floor<br />\r\n- swimming pool,gym<br />\r\n- strictly no smoking/vape/e-cigarette<br />\r\n- May move in<br />\r\n- preferable Chinese<br />\r\n- 1 year contract<br />\r\n- PM or whatsapp () for more details and room viewing', 'op', 'Gambier Heights', '2021-04-19 10:22:20', '2021-04-03 11:15:16', 34, 'male female', 'ACTIVE', NULL),
('AA00015', 'ACTIVE', 'Taman Pekaka fully furnished small room', 'accommodation room', '390.00', 'Taman Pekaka fully furnished small room for rent at 1st April with reasonable rental.<br />\r\n(Short rent period is acceptable).<br />\r\nPrefer female.<br />\r\n<br />\r\nWhat will you enjoy?<br />\r\n-table<br />\r\n-wardrobe<br />\r\n-mattress<br />\r\n-cooker<br />\r\n-fridge<br />\r\n-washing Machine<br />\r\n-tv<br />\r\n-sofa<br />\r\n-wifi etc.<br />\r\n<br />\r\nAll the necessary things will be available except personal care things.<br />\r\npm or whatapp 017 for more info ya', 'Taman Pekaka', '', '2021-04-19 10:22:20', '2021-04-03 11:21:13', 34, 'female ', 'ACTIVE', NULL),
('AA00016', 'ACTIVE', 'Taman Pekaka 31B Room for Rent', 'accommodation room', '350.00', 'Taman Pekaka 31B Room for Rent<br />\r\nSmall Room (Max 2ppl)<br />\r\n- RM 350 (Rental and wifi only)<br />\r\n- (Utilities and gas tank excluded)<br />\r\n- Queen size bed<br />\r\n- Aircond<br />\r\n- Wardrobe<br />\r\n- Window<br />\r\n- Ceiling fan<br />\r\n- Ready to move in from January 2021<br />\r\nOther<br />\r\n- Light cooking allowed<br />\r\n- Time wifi 100mbps<br />\r\n- Shared bathroom<br />\r\n- Bathroom with water heater<br />\r\n- Stove<br />\r\n- Refrigerator<br />\r\n- Washing machine<br />\r\n- Prefer CLEAN and RESPONSIBLE tenant<br />\r\n- Prefer CHINESE couple or female tenant', 'Taman Pekaka', '', '2021-04-19 10:22:20', '2021-04-03 11:31:13', 34, 'female ', 'ACTIVE', NULL),
('AA00017', 'ACTIVE', 'PLAZA IVORY room for rent', 'accommodation room', '300.00', 'BILIK UNTUK DISEWA untuk lelaki sahaja<br />\r\n<br />\r\nkawasan: PLAZA IVORY, halaman bukit gambier, gelugor (depan gate USM)<br />\r\n<br />\r\nKelebihan:<br />\r\n1) hanya 3 orang serumah (high privacy)<br />\r\n2) 24jam security<br />\r\n3) akses percuma (gym, kolam renang, parking motor)<br />\r\n4) Fully furnished (katil, tilam, almari, peti sejuk, perkakas memasak, mesin basuh)<br />\r\n5) kedai makan di tingkat bawah<br />\r\n6) berdekatan dengan 7E dan dobi<br />\r\n7) kawasan rumah yang tenang dan sunyi<br />\r\n<br />\r\nHarga: RM300 (termasuk bill air)<br />\r\nDeposit 1 bulan sahaja<br />\r\nTiada caj tambahan (agent dan security)<br />\r\n<br />\r\nWhatsapp', 'Plaza Ivory', '', '2021-04-19 10:22:20', '2021-04-03 11:32:41', 34, 'male ', 'ACTIVE', NULL),
('AA00018', 'DELETED', '31A Taman Pekaka Room for rent', 'accommodation room', '400.00', '31A Taman Pekaka Room for rent<br />\r\n-fully furnished<br />\r\n-cooking allowed<br />\r\n-no contract<br />\r\n-no agent fees<br />\r\n-friendly housemates<br />\r\n- kindly pm if interested<br />\r\nThank you', 'Taman Pekaka', '', '2021-04-19 10:22:20', '2021-04-03 11:42:03', 33, 'male female', 'ACTIVE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ads_item`
--

CREATE TABLE `ads_item` (
  `ADS_ID` varchar(20) NOT NULL,
  `ADS_STATUS` varchar(50) DEFAULT NULL,
  `ADS_TITLE` text NOT NULL,
  `ADS_CAT` varchar(50) NOT NULL,
  `ADS_PRICE` decimal(9,2) NOT NULL,
  `ADS_DESCP` text NOT NULL,
  `ADS_LOC` varchar(50) NOT NULL,
  `ADS_AREA` varchar(50) DEFAULT NULL,
  `ADS_PUBLISH_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ADS_LATEST_UPDATE_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `USER_ID` int(11) NOT NULL,
  `ITEM_CONDITION` varchar(11) DEFAULT NULL,
  `ITEM_DEAL_METHOD` varchar(11) DEFAULT NULL,
  `PRIVATE_STATUS` varchar(11) DEFAULT NULL,
  `ADMIN_UPDATE_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads_item`
--

INSERT INTO `ads_item` (`ADS_ID`, `ADS_STATUS`, `ADS_TITLE`, `ADS_CAT`, `ADS_PRICE`, `ADS_DESCP`, `ADS_LOC`, `ADS_AREA`, `ADS_PUBLISH_DATE`, `ADS_LATEST_UPDATE_DATE`, `USER_ID`, `ITEM_CONDITION`, `ITEM_DEAL_METHOD`, `PRIVATE_STATUS`, `ADMIN_UPDATE_DATE`) VALUES
('AI00001', 'DELETED', 'Power cable', 'item home', '10.00', 'used one sem', 'Plaza Ivory', '', '2021-03-30 11:39:31', '2021-03-30 11:39:31', 33, 'used', 'meetup mail', 'ACTIVE', NULL),
('AI00098', 'SOLD', 'guitar', 'item sport', '222.00', 'used one sem', 'Plaza Ivory', '', '2021-03-30 11:28:35', '2021-03-30 11:28:35', 33, 'used', 'meetup mail', 'ACTIVE', NULL),
('AI00099', 'RESERVED', 'Power Cable', 'item home', '44.00', 'Power Cable with 3 socket', 'Desa Universiti', '', '2021-03-30 13:45:54', '2021-03-30 13:45:54', 33, 'used', 'meetup mail', 'ACTIVE', NULL),
('AI00101', 'DELETED', 'Laptop', 'item computer', '3500.00', 'Acer Laptop<br />\r\nUsed 1 year.', 'Desa Universiti', '', '2021-03-31 16:08:55', '2021-03-31 16:08:55', 33, 'new', 'meetup ', 'ACTIVE', NULL),
('AI00103', 'INACTIVE', 'Marketing research Textbook', 'item book', '20.00', 'New', 'Plaza Ivory', '', '2021-04-01 04:03:25', '2021-04-01 04:56:47', 35, 'new', 'meetup mail', 'ACTIVE', NULL),
('AI00106', 'ACTIVE', 'lifeboay', 'item personal', '0.00', 'New. 300ml<br />\r\nReason to sell: bought extra, moving soon', 'Plaza Ivory', '', '2021-04-01 10:15:25', '2021-04-01 10:15:25', 37, 'new', 'meetup ', 'ACTIVE', NULL),
('AI00108', 'ACTIVE', 'Financial calculator', 'item book', '60.00', 'Used 1 year.', 'Fajar Harapan', '', '2021-04-01 11:18:22', '2021-04-01 11:18:22', 37, 'used', 'meetup ', 'ACTIVE', NULL),
('AI00111', 'ACTIVE', 'Hand Sanitizer', 'item health', '7.00', 'Bought extra during MCO.<br />\r\n300 ml :)', 'Cahaya Gemilang', '', '2021-04-01 11:25:08', '2021-04-01 11:25:08', 34, 'new', 'meetup ', 'ACTIVE', NULL),
('AI00112', 'ACTIVE', 'Table Lamp', 'item home', '15.00', 'Used 1 year.<br />\r\nReason to sell: graduate', 'Desa Airmas', '', '2021-04-01 11:26:50', '2021-04-01 11:26:50', 34, 'used', 'meetup ', 'ACTIVE', NULL),
('AI00113', 'ACTIVE', 'HadaLabo Hydrating Lotion', 'item health', '8.00', 'Bought extra during sales. Hahahahahahhahahaha niceeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee<br />\r\nExp: December 2021', 'Saujana', '', '2021-04-01 11:28:13', '2021-04-02 16:22:08', 34, 'new', 'meetup mail', 'ACTIVE', NULL),
('AI00115', 'ACTIVE', 'Small Refrigerator', 'item home', '55.00', 'Price can be negotiate<br />\r\nUsed 2 years. Still functional and cool.', 'Plaza Ivory', '', '2021-04-01 11:31:48', '2021-04-01 17:26:26', 33, 'new', 'meetup mail', 'ACTIVE', NULL),
('AI00118', 'ACTIVE', 'Spanish textbook (LAE100&LAE200)', 'item book', '60.00', 'Spanish textbook (LAE100&amp;LAE200)<br />\r\n<br />\r\nPrice: RM 60 (original price RM120)<br />\r\n<br />\r\nSelf pick up from Desa Airmasï¼ˆæ°´é‡‘é˜ï¼‰<br />\r\nPm if interested', 'Desa Airmas', '', '2021-04-03 11:09:49', '2021-04-03 11:09:49', 35, 'used', 'meetup ', 'ACTIVE', NULL),
('AI00119', 'ACTIVE', 'Financial Calculator', 'item book', '60.00', 'Condition: 8.5/10<br />\r\nPrice: RM 60<br />\r\nKindly PM if interested.<br />\r\n(Hand over within USM only)', 'Indah Kembara', '', '2021-04-03 11:10:50', '2021-04-03 11:10:50', 35, 'used', 'meetup ', 'ACTIVE', NULL),
('AI00120', 'ACTIVE', 'Item: Khind Air Cooler', 'item home', '240.00', 'Item: Khind Air Cooler<br />\r\nCondition: 9.5/10<br />\r\nPrice: RM240<br />\r\nWarranty: Yes<br />\r\nReason: Moving<br />\r\n<br />\r\nKindly pm me if interested.', 'Plaza Ivory', '', '2021-04-03 11:11:48', '2021-04-03 11:11:48', 35, 'used', 'meetup ', 'ACTIVE', '2021-04-19 10:18:38'),
('AI00121', 'ACTIVE', 'Brand new Plus correction tape', 'item book', '4.00', 'Brand new Plus correction tape<br />\r\n', 'Plaza Ivory', '', '2021-04-03 11:12:57', '2021-04-03 11:12:57', 34, 'new', 'meetup ', 'ACTIVE', NULL),
('AI00122', 'ACTIVE', 'Test with 5 photo', 'item book', '0.00', 'test with 5 pic', 'Cahaya Gemilang', '', '2021-04-03 11:34:49', '2021-04-05 17:44:23', 34, 'used', 'meetup mail', 'ACTIVE', NULL),
('AI00123', 'RESERVED', 'Washing Machine', 'item home', '170.00', 'used one year', 'Gambier Heights', '', '2021-04-03 11:51:40', '2021-04-05 13:54:21', 33, 'used', 'meetup ', 'ACTIVE', NULL),
('AI00124', 'DELETED', 'test', 'item book', '23.00', 'test', 'Desa Universiti', '', '2021-04-03 11:53:08', '2021-04-03 11:53:08', 33, 'used', 'meetup ', 'ACTIVE', NULL),
('AI00125', 'DELETED', 'test ttfb', 'item book', '1.00', 'rre', 'Restu', '', '2021-04-03 11:57:23', '2021-04-03 11:57:23', 33, 'used', 'meetup ', 'ACTIVE', NULL),
('AI00126', 'ACTIVE', 'guitar', 'item sport', '45.00', 'guitar', 'Bakti Permai', '', '2021-04-03 14:25:19', '2021-04-03 14:25:19', 33, 'used', 'meetup ', 'ACTIVE', NULL),
('AI00127', 'ACTIVE', 'algo book', 'item mobile', '7.00', 'Still new. Use one sem', 'Saujana', '', '2021-04-05 18:24:01', '2021-04-05 18:24:41', 35, 'used', 'meetup mail', 'ACTIVE', NULL),
('AI00128', 'ACTIVE', 'My passport Western Digital 1tb', 'item mobile', '180.00', 'My passport Western Digital 1tb<br />\r\nCondition : 10/10 (new, never opened)<br />\r\nWarranty : 3 years (can register the product after opening)<br />\r\nPrice : RM180<br />\r\nPM if interested', 'Gambier Heights', '', '2021-04-06 04:57:49', '2021-04-06 04:57:49', 35, 'new', 'meetup mail', 'ACTIVE', '2021-04-19 09:56:53'),
('AI00129', 'RESERVED', 'Pensonic Stand Fan', 'item home', '70.00', 'Pensonic Stand Fan for sale.<br />\r\nFan is in great condition &amp; comes with the original box.<br />\r\nPrice: RM 70.<br />\r\nCOD around USM.', 'Bakti Permai', '', '2021-04-06 04:58:53', '2021-05-02 14:39:01', 37, 'used', 'meetup ', 'ACTIVE', NULL),
('AI00134', 'DELETED', 'Water Cooker', 'item home', '15.00', 'Used one sem. Clean', 'Aman Damai', '', '2021-04-06 05:07:16', '2021-04-25 10:32:15', 37, 'used', 'meetup ', 'ACTIVE', NULL),
('AI00138', 'DELETED', 'Adidas NMD', 'item personal', '500.00', 'Adidas NMD for sale<br />\r\n- bought RM850 at QB Adidas Original<br />\r\n- Letting go at RM500<br />\r\n- Size 38 (UK5)<br />\r\n- Wear it for less than 5 times<br />\r\n- Condition 8/10<br />\r\n- Not a fan of sneakers, seldom wear it now', 'Sri Saujana', '', '2021-04-06 05:24:34', '2021-04-06 05:24:34', 37, 'used', 'meetup mail', 'ACTIVE', '2021-04-19 15:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `ads_job`
--

CREATE TABLE `ads_job` (
  `ADS_ID` varchar(20) NOT NULL,
  `ADS_STATUS` varchar(50) NOT NULL,
  `ADS_TITLE` text NOT NULL,
  `ADS_CAT` varchar(50) NOT NULL,
  `ADS_PRICE` decimal(9,2) NOT NULL,
  `ADS_DESCP` text NOT NULL,
  `ADS_LOC` varchar(50) NOT NULL,
  `ADS_AREA` varchar(50) NOT NULL,
  `ADS_PUBLISH_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ADS_LATEST_UPDATE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USER_ID` int(11) NOT NULL,
  `JOB_CONTRACT_TYPE` varchar(11) DEFAULT NULL,
  `JOB_SALARY_TYPE` varchar(11) DEFAULT NULL,
  `PRIVATE_STATUS` varchar(11) DEFAULT NULL,
  `ADMIN_UPDATE_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads_job`
--

INSERT INTO `ads_job` (`ADS_ID`, `ADS_STATUS`, `ADS_TITLE`, `ADS_CAT`, `ADS_PRICE`, `ADS_DESCP`, `ADS_LOC`, `ADS_AREA`, `ADS_PUBLISH_DATE`, `ADS_LATEST_UPDATE_DATE`, `USER_ID`, `JOB_CONTRACT_TYPE`, `JOB_SALARY_TYPE`, `PRIVATE_STATUS`, `ADMIN_UPDATE_DATE`) VALUES
('AJ00001', 'DELETED', 'Promoter at Sungai Dua Tesco', 'jobs', '20.00', 'Promoter At Sungai Dua Tesco', 'Penang', '', '2021-03-30 13:26:06', '2021-03-30 13:26:06', 33, 'parttime', 'permonth', 'ACTIVE', NULL),
('AJ00004', 'ACTIVE', 'The Kapit\"s Cashier', 'jobs', '5.50', 'Part-timer needed in Kapit&quot;s CG', 'Cahaya Gemilang', '', '2021-04-01 11:04:54', '2021-04-01 11:04:54', 37, 'parttime', 'perhour', 'ACTIVE', NULL),
('AJ00005', 'DELETED', 'Part time Job', 'jobs', '25.00', 'Part-timer needed<br />\r\nQueensbay', 'Penang', '', '2021-04-01 16:16:37', '2021-04-01 16:16:37', 33, 'parttime', 'perday', 'ACTIVE', NULL),
('AJ00006', 'RESERVED', 'Find me', 'job service', '111.00', 'https://www.w3schools.com/howto/howto_js_snackbar.asp', 'Penang', '', '2021-04-02 16:17:16', '2021-04-02 16:17:16', 33, 'parttime', 'perday', 'DELETED', '2021-04-19 13:29:20'),
('AJ00007', 'SOLD', ' Service Crew (Vegetarian Restaurant)', 'jobs', '5.00', '**Looking For Part Time Service Crew (Vegetarian Restaurant)**<br />\r\nLocation: Nearby Bukit Jambul Complex<br />\r\nDrop message if your are interested ðŸ˜ŠðŸ˜Š', 'Penang', '', '2021-04-03 11:02:06', '2021-04-05 18:26:36', 35, 'parttime', 'perhour', 'ACTIVE', NULL),
('AJ00008', 'SOLD', 'data entry for system updates', 'jobs', '300.00', 'Job title: data entry for system updates<br />\r\nPeriod: asap (1-2weeks)<br />\r\nLocation: Bayan lepas<br />\r\nWages: RM 300<br />\r\nInterested pls pm me.', 'Penang', '', '2021-04-03 11:02:41', '2021-04-06 08:29:04', 35, 'parttime', 'perday', 'ACTIVE', NULL),
('AJ00009', 'DELETED', 'restu Daily Dose Parttimer', 'jobs', '5.00', 'parttimer needed', 'Restu', '', '2021-04-04 16:41:09', '2021-04-04 16:41:09', 33, 'parttime', 'perhour', 'ACTIVE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ads_management`
--

CREATE TABLE `ads_management` (
  `ID` int(11) NOT NULL,
  `ADS_ID` varchar(20) DEFAULT NULL,
  `ACTION` varchar(11) DEFAULT NULL,
  `DESCP` varchar(255) DEFAULT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PIC` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads_management`
--

INSERT INTO `ads_management` (`ID`, `ADS_ID`, `ACTION`, `DESCP`, `TIME`, `PIC`) VALUES
(1, NULL, 'DELETE', 'VIOLATE RULES', '2021-04-19 09:52:57', 33),
(2, 'AI00128', 'DELETE', 'Violate Usmers\" Rule', '2021-04-19 09:56:53', 33),
(3, 'AA00013', 'RECOVER', 'pass checking test', '2021-04-19 10:03:14', 33),
(4, 'AI00120', 'RECOVER', 'pass test', '2021-04-19 10:16:58', 33),
(5, 'AI00120', 'DELETE', 'delete ads', '2021-04-19 10:18:07', 33),
(6, 'AI00120', 'RECOVER', 'recover ads', '2021-04-19 10:18:31', 33),
(7, 'AI00120', 'DELETE', 'delete test', '2021-04-19 10:18:38', 33),
(8, 'AJ00006', 'DELETE', 'violated rules', '2021-04-19 13:26:42', 33),
(9, 'AJ00006', 'RECOVER', 'recover with reason', '2021-04-19 13:28:14', 33),
(10, 'AJ00006', 'DELETE', 'delete', '2021-04-19 13:29:20', 33),
(11, 'AI00138', 'DELETE', 'test delete, see from user page', '2021-04-19 15:10:22', 33),
(12, 'AI00138', 'RECOVER', 'TEST RECOVER AND SEE FROM USER SITE', '2021-04-19 15:11:05', 33),
(13, 'AI00138', 'DELETE', 'test delete', '2021-04-19 15:12:01', 33),
(14, 'AI00137', 'DELETE', 'TEST DELETE', '2021-04-19 15:38:38', 33),
(15, 'AI00137', 'RECOVER', 'YES', '2021-04-19 15:39:03', 33),
(16, 'AI00137', 'DELETE', 'AGAIN', '2021-04-19 15:41:03', 33),
(17, 'AI00137', 'RECOVER', 'AGIAN', '2021-04-19 15:41:12', 33),
(18, 'AI00138', 'RECOVER', 'YES', '2021-04-19 15:48:47', 33),
(19, 'AI00107', 'DELETE', 'deleted', '2021-04-20 02:59:51', 37);

-- --------------------------------------------------------

--
-- Table structure for table `ads_status`
--

CREATE TABLE `ads_status` (
  `STATUS_ID` int(50) NOT NULL,
  `STATUS_VALUE` varchar(50) NOT NULL,
  `STATUS_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads_status`
--

INSERT INTO `ads_status` (`STATUS_ID`, `STATUS_VALUE`, `STATUS_NAME`) VALUES
(1, 'ACTIVE', 'ACTIVE'),
(2, 'DELETED', 'DELETED'),
(3, 'RESERVED', 'RESERVED'),
(4, 'SOLD', 'SOLD'),
(5, 'INACTIVE', 'INACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `AVATAR_ID` varchar(20) NOT NULL,
  `AVATAR_NAME` varchar(255) NOT NULL,
  `AVATAR_FILE` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`AVATAR_ID`, `AVATAR_NAME`, `AVATAR_FILE`) VALUES
('0', 'TEST', ''),
('A00001', '15052021-171108selfie.png', 0x73656c6669652e706e67),
('A00002', '15052021-163618download-removebg-preview.png', 0x646f776e6c6f61642d72656d6f766562672d707265766965772e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CAT_ID` int(255) NOT NULL,
  `CAT_VALUE` varchar(50) NOT NULL,
  `CAT_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CAT_ID`, `CAT_VALUE`, `CAT_NAME`) VALUES
(0, 'none', '---Item or Pre-Loved Item---'),
(1, 'item book', 'Books & Stationary'),
(2, 'item mobile', 'Mobile & Gadgets'),
(3, 'item computer', 'Computer & Cameras'),
(4, 'item cloting', 'Clothing & Accessories'),
(5, 'item personal', 'Personal Accessories'),
(6, 'item home', 'Home Appliances & Furnitures'),
(7, 'item sport', 'Sport & Hobbies'),
(8, 'item health', 'Health & Beauty'),
(9, 'item automotive', 'Automotive'),
(19, 'item others', 'Others'),
(20, 'none', '---Accommodation & Rental---'),
(21, 'accommodation house', 'House Rental'),
(22, 'accommodation room', 'Room Rental'),
(30, 'none', '---Job & Services---'),
(31, 'jobs', 'Jobs'),
(32, 'job service', 'Services');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_ads`
--

CREATE TABLE `deleted_ads` (
  `DELETED_ADS_ID` varchar(20) NOT NULL,
  `ADS_ID` varchar(20) NOT NULL,
  `ADS_STATUS` varchar(50) NOT NULL,
  `ADS_TITLE` text NOT NULL,
  `ADS_CAT` varchar(50) NOT NULL,
  `ADS_PRICE` decimal(9,2) NOT NULL,
  `ADS_DESCP` text NOT NULL,
  `ADS_LOC` varchar(50) NOT NULL,
  `ADS_AREA` varchar(50) NOT NULL,
  `ADS_PUBLISH_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ADS_LATEST_UPDATE_DATE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `USER_ID` int(11) NOT NULL,
  `SUB_INFO_1` varchar(11) NOT NULL,
  `SUB_INFO_2` varchar(11) NOT NULL,
  `PRIVATE_STATUS` varchar(11) NOT NULL,
  `ADMIN_UPDATE_DATE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted_ads`
--

INSERT INTO `deleted_ads` (`DELETED_ADS_ID`, `ADS_ID`, `ADS_STATUS`, `ADS_TITLE`, `ADS_CAT`, `ADS_PRICE`, `ADS_DESCP`, `ADS_LOC`, `ADS_AREA`, `ADS_PUBLISH_DATE`, `ADS_LATEST_UPDATE_DATE`, `USER_ID`, `SUB_INFO_1`, `SUB_INFO_2`, `PRIVATE_STATUS`, `ADMIN_UPDATE_DATE`) VALUES
('DA00001', 'AI00131', 'DELETED', 'Power cable', 'item home', '10.00', 'used one sem', 'Plaza Ivory', '', '2021-04-25 18:55:09', '2021-03-30 11:39:31', 33, 'used', 'meetup mail', 'ACTIVE', '2021-04-25 18:48:58'),
('DA00002', 'AI00133', 'DELETED', 'scissors', 'item book', '5.00', 'Bought extra', 'Bakti Permai', '', '2021-04-25 18:55:13', '2021-04-01 05:05:35', 37, 'new', 'meetup ', 'ACTIVE', '2021-04-25 18:53:16'),
('DA00003', 'AI00105', 'DELETED', 'New Concept Chinese Book LAC100', 'item book', '10.00', 'Used one sem.<br />\r\nRM10 for 2 books- level 1 &amp; 2', 'Cahaya Gemilang', '', '2021-04-25 18:55:17', '2021-04-01 10:11:26', 37, 'used', 'meetup mail', 'ACTIVE', '2021-04-25 18:53:42'),
('DA00004', 'AI00136', 'DELETED', 'Squash Racket', 'item sport', '39.00', 'Used one sem', 'Tekun', '', '2021-04-06 05:09:39', '2021-04-06 05:10:20', 37, 'used', 'meetup ', 'ACTIVE', '2021-04-25 18:56:27'),
('DA00005', 'AI00130', 'DELETED', 'NEW External HDD cable 3.1 fast transfer', 'item mobile', '15.00', 'NEW External HDD cable 3.1 fast transfer<br />\r\nRM 15<br />\r\nReason: bought wrong thing', 'Plaza Ivory', '', '2021-04-06 04:59:52', '2021-04-06 04:59:52', 37, 'new', 'meetup mail', 'ACTIVE', '2021-04-25 18:59:49'),
('DA00006', 'AI00110', 'DELETED', 'Motorcycle', 'item automotive', '540.00', 'Used 1 year around Penang.', 'Tekun', '', '2021-04-01 11:21:25', '2021-04-01 11:21:25', 37, 'used', 'meetup ', 'ACTIVE', '2021-04-25 19:00:55'),
('DA00007', 'AI00109', 'DELETED', 'USB Type-C Charging Dock Sony', 'item mobile', '20.00', 'New.<br />\r\nReason to sell: Bought Extra', 'University Heights', '', '2021-04-01 11:20:18', '2021-04-01 11:20:18', 37, 'new', 'meetup mail', 'ACTIVE', '2021-04-25 19:01:06'),
('DA00008', 'AI00135', 'DELETED', 'Harddisk', 'item mobile', '187.00', 'New.', ' 	Putrajaya', '', '2021-04-06 05:08:01', '2021-04-06 05:08:01', 37, 'new', 'meetup mail', 'ACTIVE', '2021-04-25 19:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_image`
--

CREATE TABLE `deleted_image` (
  `DELETED_IMAGE_ID` varchar(20) NOT NULL,
  `IMAGE_ID` varchar(20) NOT NULL,
  `IMAGE_NAME` varchar(255) NOT NULL,
  `IMAGE_FILE` longblob NOT NULL,
  `ADS_ID` varchar(20) NOT NULL,
  `IMAGE_STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted_image`
--

INSERT INTO `deleted_image` (`DELETED_IMAGE_ID`, `IMAGE_ID`, `IMAGE_NAME`, `IMAGE_FILE`, `ADS_ID`, `IMAGE_STATUS`) VALUES
('DI00001', 'II00107', '30032021-154555118513656_1628081910698951_1420826555857116714_o.jpg', 0x3131383531333635365f313632383038313931303639383935315f313432303832363535353835373131363731345f6f2e6a7067, 'AI00099', 'ACTIVE'),
('DI00002', 'II00123', '30032021-154555118513656_1628081910698951_1420826555857116714_o.jpg', 0x3131383531333635365f313632383038313931303639383935315f313432303832363535353835373131363731345f6f2e6a7067, 'AI00116', 'DELETED'),
('DI00003', 'II00160', '06042021-07053514032021-182422s2.jpg', 0x31343033323032312d31383234323273322e6a7067, 'AI00133', 'DELETED'),
('DI00004', 'II00160', '06042021-07053514032021-182422s2.jpg', 0x31343033323032312d31383234323273322e6a7067, 'AI00133', 'DELETED'),
('DI00005', 'II00109', '01042021-121126158434878_3747598791953377_9208070573117501308_o.jpg', 0x3135383433343837385f333734373539383739313935333337375f393230383037303537333131373530313330385f6f2e6a7067, 'AI00105', 'DELETED'),
('DI00006', 'II00163', '06042021-070939racquet.jpg', 0x726163717565742e6a7067, 'AI00136', 'DELETED'),
('DI00007', 'II00157', '06042021-0659522.jpg', 0x322e6a7067, 'AI00130', 'DELETED'),
('DI00008', 'II00115', '01042021-132125117410588_3212318608863854_8463565417869916590_o.jpg', 0x3131373431303538385f333231323331383630383836333835345f383436333536353431373836393931363539305f6f2e6a7067, 'AI00110', 'DELETED'),
('DI00009', 'II00114', '01042021-132018121523794_10158615954241069_4044641292330411452_o.jpg', 0x3132313532333739345f31303135383631353935343234313036395f343034343634313239323333303431313435325f6f2e6a7067, 'AI00109', 'DELETED'),
('DI00010', 'II00162', '06042021-070801harddisk.jpg', 0x686172646469736b2e6a7067, 'AI00135', 'DELETED');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `USER_ID` int(11) NOT NULL,
  `ADS_ID` varchar(20) NOT NULL,
  `FAV_ADDED_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`USER_ID`, `ADS_ID`, `FAV_ADDED_DATE`) VALUES
(33, 'AA00015', '2021-04-05 11:59:33'),
(33, 'AI00122', '2021-04-05 11:59:38'),
(33, 'AI00103', '2021-04-05 14:02:13'),
(33, 'AI00107', '2021-04-05 14:46:38'),
(35, 'AI00115', '2021-04-05 18:27:49'),
(35, 'AI00133', '2021-04-06 05:12:41'),
(44, 'AI00119', '2021-04-06 08:14:28'),
(35, 'AI00131', '2021-04-06 08:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `image_accom`
--

CREATE TABLE `image_accom` (
  `IMAGE_ID` varchar(20) NOT NULL,
  `IMAGE_NAME` varchar(255) DEFAULT NULL,
  `IMAGE_FILE` longblob,
  `ADS_ID` varchar(20) NOT NULL,
  `IMAGE_STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_accom`
--

INSERT INTO `image_accom` (`IMAGE_ID`, `IMAGE_NAME`, `IMAGE_FILE`, `ADS_ID`, `IMAGE_STATUS`) VALUES
('IA00001', '30032021-154440118513656_1628081910698951_1420826555857116714_o.jpg', 0x3131383531333635365f313632383038313931303639383935315f313432303832363535353835373131363731345f6f2e6a7067, 'AA00008', 'ACTIVE'),
('IA00002', '01042021-131717143323478_10222579861758444_8565751726708371530_n.jpg', 0x3134333332333437385f31303232323537393836313735383434345f383536353735313732363730383337313533305f6e2e6a7067, 'AA00009', 'ACTIVE'),
('IA00003', '01042021-131719143918455_10222579853878247_3989026736606154323_n.jpg', 0x3134333931383435355f31303232323537393835333837383234375f333938393032363733363630363135343332335f6e2e6a7067, 'AA00009', 'ACTIVE'),
('IA00004', '01042021-132603142960132_3194273224008328_2974609898773065167_o.jpg', 0x3134323936303133325f333139343237333232343030383332385f323937343630393839383737333036353136375f6f2e6a7067, 'AA00010', 'ACTIVE'),
('IA00005', 'back.jpg', NULL, 'AA00011', 'ACTIVE'),
('IA00006', 'back.jpg', NULL, 'AA00012', 'ACTIVE'),
('IA00007', 'back.jpg', NULL, 'AA00013', 'ACTIVE'),
('IA00008', '03042021-131516room.jpg', 0x726f6f6d2e6a7067, 'AA00014', 'ACTIVE'),
('IA00009', '03042021-132113room1.jpg', 0x726f6f6d312e6a7067, 'AA00015', 'ACTIVE'),
('IA00010', 'back.jpg', NULL, 'AA00016', 'ACTIVE'),
('IA00011', '03042021-133242ivory.jpg', 0x69766f72792e6a7067, 'AA00017', 'ACTIVE'),
('IA00012', '03042021-134203srisaujana.jpg', 0x7372697361756a616e612e6a7067, 'AA00018', 'ACTIVE'),
('IA00013', '03042021-134204ss.jpg', 0x73732e6a7067, 'AA00018', 'ACTIVE'),
('IA00014', '03042021-134204tp.jpg', 0x74702e6a7067, 'AA00018', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `image_item`
--

CREATE TABLE `image_item` (
  `IMAGE_ID` varchar(20) NOT NULL,
  `IMAGE_NAME` varchar(255) DEFAULT NULL,
  `IMAGE_FILE` longblob,
  `IMAGE_LABEL` varchar(255) DEFAULT NULL,
  `IMAGE_OCR` varchar(500) DEFAULT NULL,
  `ADS_ID` varchar(20) NOT NULL,
  `IMAGE_STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_item`
--

INSERT INTO `image_item` (`IMAGE_ID`, `IMAGE_NAME`, `IMAGE_FILE`, `IMAGE_LABEL`, `IMAGE_OCR`, `ADS_ID`, `IMAGE_STATUS`) VALUES
('II00100', '30032021-154555118513656_1628081910698951_1420826555857116714_o.jpg', 0x3131383531333635365f313632383038313931303639383935315f313432303832363535353835373131363731345f6f2e6a7067, 'Font,Gas,Electronic component,Electronic device,Cable,', '', 'AI00099', 'ACTIVE'),
('II00103', '31032021-180855119037647_2836749156427405_1133240207257501025_o.jpg', 0x3131393033373634375f323833363734393135363432373430355f313133333234303230373235373530313032355f6f2e6a7067, 'Laptop,Computer keyboard', '', 'AI00101', 'ACTIVE'),
('II00106', '01042021-060326122668074_4511143332292028_7115184180018496207_n.jpg', 0x3132323636383037345f343531313134333333323239323032385f373131353138343138303031383439363230375f6e2e6a7067, 'Packaged goods,Orange,Triangle,Font,Wheel,Book', 'GLOBAL\nEDITION\nMarketing Research\nAn Applied Orientation\nSEVENTH EDITION\nNaresh K. Malhotra', 'AI00103', 'ACTIVE'),
('II00110', '01042021-121525153034394_3875260909197486_974216977668471792_o.jpg', 0x3135333033343339345f333837353236303930393139373438365f3937343231363937373636383437313739325f6f2e6a7067, 'Packaged goods,Hand,Liquid,Drinkware,Window,', 'Lifebuoy\nACTIV SILVER FORMULA\nantibacierial bodywash\nAF\nRM\nCOol fresh\nwith menthol\nkills 99.9% germs', 'AI00106', 'ACTIVE'),
('II00113', '01042021-131822117287823_3283153008441709_3774745954395949514_o.jpg', 0x3131373238373832335f333238333135333030383434313730395f333737343734353935343339353934393531345f6f2e6a7067, 'Calculator,Packaged goods,Telephony,Mobile phone,Communication Device,Telephone,', '6\nBAII Plus\nTEXAS INSTRUMENTS\nA TEXAS INSTRUMENTS\nBA II PLUSTM\nBUSINESS ANALYST\næç¤ºå·¥ä½œè¡¨:èž¢å¹•æŒ‡ç¤ºç‡ˆè™Ÿ\né€™äº›ç™»å¹•æŒ‡ç¤ºç‡ˆè™Ÿæœƒæç¤ºæ‚¨è¦æŽ¡å–è¡Œå‹•ã€‚\nQUIT\nSET\nSNI\nON|OFF\n130\nCPT\nENTER\næŒ‡ç¤ºç‡ˆè™Ÿ æ„ç¾©\nCOMPUTEè‹¥è¦è¨ˆç®—å€¼,æŒ‰ä¸‹@ã€‚\n2ND\nCF\nNPV\nIRR\nENTER\nè‹¥è¦è¼¸å…¥é¡¯ç¤ºè®Šæ•¸çš„å€¼,è«‹å¥äººæ•¸å­—ç„¶å¾ŒæŠ€\nTENTER\nè‹¥è¦æª¢è¦–è¨­å®šé¸é …,è«‹æŒ‰ä¸‹æ¯å€‹é¸é …çš„å›ž\nSET]ã€‚é¡¯ç¤ºé¸é …ä¾†é¸å–å®ƒã€‚\nè‹¥è¦æª¢è¦–å·¥ä½œè¡¨è®Šæ•¸,è«‹æŒ‰ä¸‹å£æˆ–å›ž.\n,è‹¥è¦é¸å–æ¨™æº–è¨ˆ', 'AI00108', 'ACTIVE'),
('II00116', '01042021-132508119124273_10223747421779297_7044679361817617957_o.jpg', 0x3131393132343237335f31303232333734373432313737393239375f373034343637393336313831373631373935375f6f2e6a7067, 'Packaged goods,Liquid,Bottle cap,Solution,Bottle,', 'GOTDYA\"\nBACTERIOSTATIC\nRATE\n99.9 %\nDISPOSABLE\nALCOHOL\nRinse-free Hand Sanitizer\nhet content 500ml', 'AI00111', 'ACTIVE'),
('II00117', '01042021-132650132009325_10158842441334243_7042266840867819298_o.jpg', 0x3133323030393332355f31303135383834323434313333343234335f373034323236363834303836373831393239385f6f2e6a7067, 'Lighting', '', 'AI00112', 'ACTIVE'),
('II00118', '01042021-132813142057172_4288621054487981_5614656930171343688_n.jpg', 0x3134323035373137325f343238383632313035343438373938315f353631343635363933303137313334333638385f6e2e6a7067, 'Packaged goods,Fluid,Drinkware,Finger,Drink,', 'ã‚†3ã6ã ã‚ã‚Š\næ¥µæ½¤\nã‚¹ãƒ¼ãƒ‘ãƒ¼ãƒ’ã‚¢ãƒ«ãƒ­ãƒ³ç·š\ngã˜ãƒ’ã‚¢ãƒ«ãƒ­ãƒ³æ¶²', 'AI00113', 'ACTIVE'),
('II00121', '01042021-133148142796091_10225271222313673_5690524665664163424_n.jpg', 0x3134323739363039315f31303232353237313232323331333637335f353639303532343636353636343136333432345f6e2e6a7067, 'Packaged goods,Rectangle,Personal computer,Home appliance,Gadget,', 'Hisense', 'AI00115', 'ACTIVE'),
('II00126', '03042021-130950spanish.jpg', 0x7370616e6973682e6a7067, 'Person,Packaged goods,Person,Person,Top,Product,Font,Publication,T-shirt,Book', 'mÃ©todoo\nDE ESPAÃ‘OL\nA1\nLibro del alumno\nESPAÃ‘OL LENGUA EXTRANJERA\nANAYA\nCD-AUDIO', 'AI00118', 'ACTIVE'),
('II00127', '03042021-131050cal.jpg', 0x63616c2e6a7067, 'Calculator', '', 'AI00119', 'ACTIVE'),
('II00128', '03042021-131148khind.jpg', 0x6b68696e642e6a7067, 'Home appliance,Box', '', 'AI00120', 'ACTIVE'),
('II00129', '03042021-131257correction tape.jpg', 0x636f7272656374696f6e20746170652e6a7067, 'Grooming trimmer,Packaged goods,Font,Material property,Electric blue,Plastic,', 'D.\ncaps lock\nPLUS F t\nshift O\nWHIPER\nWHIPER MINI\næ™ºæ…§åž‹æ»šè½®ä¿®\nå¯æ›¿æ¢å¼\nå®½\n*6.\né•¿\n60m\nNVID\nGER\n(intel\nCORE i5\n7th Gen\né»è´´ç¨³åœ‹\nä½¿ç”¨èˆ’å¿ƒ\nå¹³æ»‘æŸ”è½¯çš„è¿·ä½ æ¼”è¼¸\nå¯ä¸Žçº¸é¢ç´§å¯†è´´åˆ\næ—¥æœ¬å“è´¨\nWH-635B\nCorrection Tape WH-635\nPLUSWHIPER MR\nä½¿ç”¨è¿‡ç¨‹ä¸­ä¸ä¼šæ–­è£‚,è®©æ‚¨è½»æ¾ç”¨åˆ°æœ€åŽ!', 'AI00121', 'ACTIVE'),
('II00130', '03042021-133449109706732_3525048794195337_1715923026977269009_o.jpg', 0x3130393730363733325f333532353034383739343139353333375f313731353932333032363937373236393030395f6f2e6a7067, 'Washing machine', '', 'AI00122', 'DELETED'),
('II00131', '03042021-133452109833814_3525050077528542_1269344369023780186_o.jpg', 0x3130393833333831345f333532353035303037373532383534325f313236393334343336393032333738303138365f6f2e6a7067, 'Packaged goods,Automotive tire,Output device,Grey,Motor vehicle,', 'ren\nOidea\nEB\n39L\n24L-O 2\nORINSE\n15L O 19\nO SPIN\nPOWER\n7.0kg\nMFW-701S BruzzY\nPROGRAM\nWATER\nLEVEL\nFUNCTION\n...\n****\n0 00 0', 'AI00122', 'DELETED'),
('II00134', '03042021-133503117406865_4183795211662252_3850583446267892413_o.jpg', 0x3131373430363836355f343138333739353231313636323235325f333835303538333434363236373839323431335f6f2e6a7067, 'Chair', '', 'AI00122', 'DELETED'),
('II00135', '03042021-135140109706732_3525048794195337_1715923026977269009_o.jpg', 0x3130393730363733325f333532353034383739343139353333375f313731353932333032363937373236393030395f6f2e6a7067, 'Washing machine', '', 'AI00123', 'ACTIVE'),
('II00136', '03042021-135144109833814_3525050077528542_1269344369023780186_o.jpg', 0x3130393833333831345f333532353035303037373532383534325f313236393334343336393032333738303138365f6f2e6a7067, 'Packaged goods,Automotive tire,Output device,Grey,Motor vehicle,', 'ren\nOidea\nEB\n39L\n24L-O 2\nORINSE\n15L O 19\nO SPIN\nPOWER\n7.0kg\nMFW-701S BruzzY\nPROGRAM\nWATER\nLEVEL\nFUNCTION\n...\n****\n0 00 0', 'AI00123', 'ACTIVE'),
('II00137', '03042021-135308117410588_3212318608863854_8463565417869916590_o.jpg', 0x3131373431303538385f333231323331383630383836333835345f383436333536353431373836393931363539305f6f2e6a7067, 'Wheel,Wheel,Motorcycle', '', 'AI00124', 'ACTIVE'),
('II00138', '03042021-135311117879324_4183796514995455_1636773310287565261_o.jpg', 0x3131373837393332345f343138333739363531343939353435355f313633363737333331303238373536353236315f6f2e6a7067, 'Luggage & bags,Tire,Tire', '', 'AI00124', 'ACTIVE'),
('II00139', '03042021-135315117953177_3212374575524924_8331510463929762043_o.jpg', 0x3131373935333137375f333231323337343537353532343932345f383333313531303436333932393736323034335f6f2e6a7067, 'Guitar', '', 'AI00124', 'ACTIVE'),
('II00140', '03042021-135723109706732_3525048794195337_1715923026977269009_o.jpg', 0x3130393730363733325f333532353034383739343139353333375f313731353932333032363937373236393030395f6f2e6a7067, 'Washing machine', '', 'AI00125', 'ACTIVE'),
('II00141', '03042021-135726109833814_3525050077528542_1269344369023780186_o.jpg', 0x3130393833333831345f333532353035303037373532383534325f313236393334343336393032333738303138365f6f2e6a7067, 'Packaged goods,Automotive tire,Output device,Grey,Motor vehicle,', 'ren\nOidea\nEB\n39L\n24L-O 2\nORINSE\n15L O 19\nO SPIN\nPOWER\n7.0kg\nMFW-701S BruzzY\nPROGRAM\nWATER\nLEVEL\nFUNCTION\n...\n****\n0 00 0', 'AI00125', 'ACTIVE'),
('II00142', '03042021-135730117287823_3283153008441709_3774745954395949514_o.jpg', 0x3131373238373832335f333238333135333030383434313730395f333737343734353935343339353934393531345f6f2e6a7067, 'Calculator,Packaged goods,Telephony,Mobile phone,Communication Device,Telephone,', '6\nBAII Plus\nTEXAS INSTRUMENTS\nA TEXAS INSTRUMENTS\nBA II PLUSTM\nBUSINESS ANALYST\næç¤ºå·¥ä½œè¡¨:èž¢å¹•æŒ‡ç¤ºç‡ˆè™Ÿ\né€™äº›ç™»å¹•æŒ‡ç¤ºç‡ˆè™Ÿæœƒæç¤ºæ‚¨è¦æŽ¡å–è¡Œå‹•ã€‚\nQUIT\nSET\nSNI\nON|OFF\n130\nCPT\nENTER\næŒ‡ç¤ºç‡ˆè™Ÿ æ„ç¾©\nCOMPUTEè‹¥è¦è¨ˆç®—å€¼,æŒ‰ä¸‹@ã€‚\n2ND\nCF\nNPV\nIRR\nENTER\nè‹¥è¦è¼¸å…¥é¡¯ç¤ºè®Šæ•¸çš„å€¼,è«‹å¥äººæ•¸å­—ç„¶å¾ŒæŠ€\nTENTER\nè‹¥è¦æª¢è¦–è¨­å®šé¸é …,è«‹æŒ‰ä¸‹æ¯å€‹é¸é …çš„å›ž\nSET]ã€‚é¡¯ç¤ºé¸é …ä¾†é¸å–å®ƒã€‚\nè‹¥è¦æª¢è¦–å·¥ä½œè¡¨è®Šæ•¸,è«‹æŒ‰ä¸‹å£æˆ–å›ž.\n,è‹¥è¦é¸å–æ¨™æº–è¨ˆ', 'AI00125', 'ACTIVE'),
('II00143', '03042021-162519128360364_10219215550841055_4205455050157265481_o.jpg', 0x3132383336303336345f31303231393231353535303834313035355f343230353435353035303135373236353438315f6f2e6a7067, 'Guitar', '', 'AI00126', 'ACTIVE'),
('II00144', '05042021-194309109706732_3525048794195337_1715923026977269009_o.jpg', 0x3130393730363733325f333532353034383739343139353333375f313731353932333032363937373236393030395f6f2e6a7067, 'Washing machine', '', 'AI00122', 'DELETED'),
('II00145', '05042021-194312109833814_3525050077528542_1269344369023780186_o.jpg', 0x3130393833333831345f333532353035303037373532383534325f313236393334343336393032333738303138365f6f2e6a7067, 'Packaged goods,Automotive tire,Output device,Grey,Motor vehicle,', 'ren\\nOidea\\nEB\\n39L\\n24L-O 2\\nORINSE\\n15L O 19\\nO SPIN\\nPOWER\\n7.0kg\\nMFW-701S BruzzY\\nPROGRAM\\nWATER\\nLEVEL\\nFUNCTION\\n...\\n****\\n0 00 0', 'AI00122', 'DELETED'),
('II00146', '05042021-194316117287823_3283153008441709_3774745954395949514_o.jpg', 0x3131373238373832335f333238333135333030383434313730395f333737343734353935343339353934393531345f6f2e6a7067, 'Calculator,Packaged goods,Telephony,Mobile phone,Communication Device,Telephone,', '6\\nBAII Plus\\nTEXAS INSTRUMENTS\\nA TEXAS INSTRUMENTS\\nBA II PLUSTM\\nBUSINESS ANALYST\\næç¤ºå·¥ä½œè¡¨:èž¢å¹•æŒ‡ç¤ºç‡ˆè™Ÿ\\né€™äº›ç™»å¹•æŒ‡ç¤ºç‡ˆè™Ÿæœƒæç¤ºæ‚¨è¦æŽ¡å–è¡Œå‹•ã€‚\\nQUIT\\nSET\\nSNI\\nON|OFF\\n130\\nCPT\\nENTER\\næŒ‡ç¤ºç‡ˆè™Ÿ æ„ç¾©\\nCOMPUTEè‹¥è¦è¨ˆç®—å€¼,æŒ‰ä¸‹@ã€‚\\n2ND\\nCF\\nNPV\\nIRR\\nENTER\\nè‹¥è¦è¼¸å…¥é¡¯ç¤ºè®Šæ•¸çš„å€¼,è«‹å¥äººæ•¸å­—ç„¶å¾ŒæŠ€\\nTENTER\\nè‹¥è¦æª¢è¦–è¨­å®šé¸é …,è«‹æŒ‰ä¸‹æ¯å€‹é¸é …çš„å›ž\\nSET]ã€‚é¡¯ç¤ºé¸é …ä¾†é¸å–å®ƒã€‚\\nè‹¥è¦æª¢è¦–å·¥ä½œè¡¨è®Šæ•¸,è«‹æŒ‰ä¸‹å£æˆ–å', 'AI00122', 'DELETED'),
('II00147', '05042021-194324117301918_3212375718858143_7942614420945364665_o.jpg', 0x3131373330313931385f333231323337353731383835383134335f373934323631343432303934353336343636355f6f2e6a7067, 'Packaged goods,Brown,Wood,Font,Rectangle,', 'Techno\\nGuitar', 'AI00122', 'DELETED'),
('II00148', '05042021-194326117406865_4183795211662252_3850583446267892413_o.jpg', 0x3131373430363836355f343138333739353231313636323235325f333835303538333434363236373839323431335f6f2e6a7067, 'Chair', '', 'AI00122', 'DELETED'),
('II00149', '05042021-194423109706732_3525048794195337_1715923026977269009_o.jpg', 0x3130393730363733325f333532353034383739343139353333375f313731353932333032363937373236393030395f6f2e6a7067, 'Washing machine', '', 'AI00122', 'ACTIVE'),
('II00150', '05042021-194426109833814_3525050077528542_1269344369023780186_o.jpg', 0x3130393833333831345f333532353035303037373532383534325f313236393334343336393032333738303138365f6f2e6a7067, 'Packaged goods,Automotive tire,Output device,Grey,Motor vehicle,', 'ren\\nOidea\\nEB\\n39L\\n24L-O 2\\nORINSE\\n15L O 19\\nO SPIN\\nPOWER\\n7.0kg\\nMFW-701S BruzzY\\nPROGRAM\\nWATER\\nLEVEL\\nFUNCTION\\n...\\n****\\n0 00 0', 'AI00122', 'ACTIVE'),
('II00151', '05042021-194431117287823_3283153008441709_3774745954395949514_o.jpg', 0x3131373238373832335f333238333135333030383434313730395f333737343734353935343339353934393531345f6f2e6a7067, 'Calculator,Packaged goods,Telephony,Mobile phone,Communication Device,Telephone,', '6\\nBAII Plus\\nTEXAS INSTRUMENTS\\nA TEXAS INSTRUMENTS\\nBA II PLUSTM\\nBUSINESS ANALYST\\næç¤ºå·¥ä½œè¡¨:èž¢å¹•æŒ‡ç¤ºç‡ˆè™Ÿ\\né€™äº›ç™»å¹•æŒ‡ç¤ºç‡ˆè™Ÿæœƒæç¤ºæ‚¨è¦æŽ¡å–è¡Œå‹•ã€‚\\nQUIT\\nSET\\nSNI\\nON|OFF\\n130\\nCPT\\nENTER\\næŒ‡ç¤ºç‡ˆè™Ÿ æ„ç¾©\\nCOMPUTEè‹¥è¦è¨ˆç®—å€¼,æŒ‰ä¸‹@ã€‚\\n2ND\\nCF\\nNPV\\nIRR\\nENTER\\nè‹¥è¦è¼¸å…¥é¡¯ç¤ºè®Šæ•¸çš„å€¼,è«‹å¥äººæ•¸å­—ç„¶å¾ŒæŠ€\\nTENTER\\nè‹¥è¦æª¢è¦–è¨­å®šé¸é …,è«‹æŒ‰ä¸‹æ¯å€‹é¸é …çš„å›ž\\nSET]ã€‚é¡¯ç¤ºé¸é …ä¾†é¸å–å®ƒã€‚\\nè‹¥è¦æª¢è¦–å·¥ä½œè¡¨è®Šæ•¸,è«‹æŒ‰ä¸‹å£æˆ–å', 'AI00122', 'ACTIVE'),
('II00152', '05042021-194438117301918_3212375718858143_7942614420945364665_o.jpg', 0x3131373330313931385f333231323337353731383835383134335f373934323631343432303934353336343636355f6f2e6a7067, 'Packaged goods,Brown,Wood,Font,Rectangle,', 'Techno\\nGuitar', 'AI00122', 'ACTIVE'),
('II00153', '05042021-194441117406865_4183795211662252_3850583446267892413_o.jpg', 0x3131373430363836355f343138333739353231313636323235325f333835303538333434363236373839323431335f6f2e6a7067, 'Chair', '', 'AI00122', 'ACTIVE'),
('II00154', '05042021-202401122668074_4511143332292028_7115184180018496207_n.jpg', 0x3132323636383037345f343531313134333333323239323032385f373131353138343138303031383439363230375f6e2e6a7067, 'Packaged goods,Orange,Triangle,Font,Wheel,Book', 'GLOBAL\nEDITION\nMarketing Research\nAn Applied Orientation\nSEVENTH EDITION\nNaresh K. Malhotra', 'AI00127', 'ACTIVE'),
('II00155', '06042021-0657495.jpg', 0x352e6a7067, 'Packaged goods,Hand,Publication,Finger,Font,Book', 'MY PASSPORT\nWD\nAuto backup.\nPasswerd protection.\nSauvegarde automatique.\nProtection par\net de passe,\nLGO\nTO To\nPORTABLE STORAGE\nSTOCKAGE PORTABLE\nwe', 'AI00128', 'ACTIVE'),
('II00156', '06042021-0658534.jpg', 0x342e6a7067, 'Mechanical fan', '', 'AI00129', 'ACTIVE'),
('II00161', '06042021-070716boiler.jpg', 0x626f696c65722e6a7067, 'Packaged goods,Drinkware,Green,Cup,Kitchen appliance,', 'MAX\n1.8L\n1.2L\nMIN\n0.GL\nwing\"', 'AI00134', 'ACTIVE'),
('II00166', '06042021-07243577.jpg', 0x37372e6a7067, 'Shoe', '', 'AI00138', 'ACTIVE'),
('II00167', '06042021-07243678.jpg', 0x37382e6a7067, 'Shoe,Shoe,Packaged goods,Footwear,Jeans,Hand,Dress,', 'ES - 3717\nTHE\nSENE\nDIE W', 'AI00138', 'ACTIVE'),
('II00168', '06042021-07243979.jpg', 0x37392e6a7067, 'Shoe,Shoe,Footwear', '', 'AI00138', 'ACTIVE'),
('II00169', '06042021-07244180.jpg', 0x38302e6a7067, 'Shoe', '', 'AI00138', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `image_job`
--

CREATE TABLE `image_job` (
  `IMAGE_ID` varchar(20) NOT NULL,
  `IMAGE_NAME` varchar(255) DEFAULT NULL,
  `IMAGE_FILE` longblob,
  `ADS_ID` varchar(20) NOT NULL,
  `IMAGE_STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_job`
--

INSERT INTO `image_job` (`IMAGE_ID`, `IMAGE_NAME`, `IMAGE_FILE`, `ADS_ID`, `IMAGE_STATUS`) VALUES
('IJ00002', '30032021-155015118513656_1628081910698951_1420826555857116714_o.jpg', 0x3131383531333635365f313632383038313931303639383935315f313432303832363535353835373131363731345f6f2e6a7067, 'AJ00001', 'ACTIVE'),
('IJ00004', 'back.jpg', NULL, 'AJ00004', 'ACTIVE'),
('IJ00005', '01042021-181638158591175_4342368485796705_8121668060363904627_n.jpg', 0x3135383539313137355f343334323336383438353739363730355f383132313636383036303336333930343632375f6e2e6a7067, 'AJ00005', 'ACTIVE'),
('IJ00006', 'back.jpg', NULL, 'AJ00006', 'ACTIVE'),
('IJ00007', 'back.jpg', NULL, 'AJ00007', 'ACTIVE'),
('IJ00008', 'back.jpg', NULL, 'AJ00008', 'ACTIVE'),
('IJ00009', 'back.jpg', NULL, 'AJ00009', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LOC_ID` int(255) NOT NULL,
  `LOC_VALUE` varchar(50) NOT NULL,
  `LOC_NAME` varchar(255) NOT NULL,
  `LAT` decimal(10,8) DEFAULT NULL,
  `LNG` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LOC_ID`, `LOC_VALUE`, `LOC_NAME`, `LAT`, `LNG`) VALUES
(0, 'none', '---USM Area---', NULL, NULL),
(1, 'Restu', 'Restu', '5.35584660', '100.28922960'),
(2, 'Saujana', 'Saujana', '5.35666526', '100.29017680'),
(3, 'Tekun', 'Tekun', '5.35564834', '100.29081409'),
(4, 'Bakti Permai', 'Bakti Permai', '5.35615530', '100.29934593'),
(5, 'Cahaya Gemilang', 'Cahaya Gemilang', '5.35933852', '100.30336496'),
(6, 'Indah Kembara', 'Indah Kembara', '5.35625037', '100.29548785'),
(7, 'Fajar Harapan', 'Fajar Harapan', '5.35478373', '100.30018278'),
(8, 'Aman Damai', 'Aman Damai', '5.35483500', '100.29676243'),
(9, 'ou', 'Other USM incampus hostel', NULL, NULL),
(10, 'none', '---PETAS Area---', NULL, NULL),
(11, 'University Heights', 'University Heights', '5.35236600', '100.30297000'),
(12, 'Desa Airmas', 'Desa Airmas', '5.35129900', '100.29997200'),
(13, 'Desa Universiti', 'Desa Universiti', '5.35270500', '100.29870000'),
(14, 'Plaza Ivory', 'Plaza Ivory', '5.35799837', '100.29256504'),
(15, 'Taman Pekaka', 'Taman Pekaka', '5.35126990', '100.29427610'),
(16, 'Gambier Heights', 'Gambier Heights', '5.36211625', '100.29266697'),
(17, 'Sri Saujana', 'Sri Saujana', '5.35197700', '100.30118800'),
(18, 'op', 'Other PETAS hostel', NULL, NULL),
(19, 'none', '---Others---', NULL, NULL),
(20, ' Johor', ' Johor', '1.93734400', '103.36658500'),
(21, 'Kedah', 'Kedah', '6.15567200', '100.56964900'),
(22, 'Kelantan', 'Kelantan', '6.12539700', '102.23806800'),
(23, 'Kuala Lumpur', 'Kuala Lumpur', '3.14085300', '101.69320700'),
(24, 'Labuan', ' 	Labuan', '5.28515300', '115.24778700'),
(25, 'Melaka', 'Melaka', '2.20084400', '102.24014300'),
(26, 'Negeri Sembilan', 'Negeri Sembilan', '2.73181300', '102.25250200'),
(27, 'Pahang', ' 	Pahang', '3.97434100', '102.43805700'),
(28, 'Penang', 'Penang', '5.28515300', '100.45623800'),
(29, 'Perak', 'Perak', '4.69395000', '101.11757700'),
(30, ' 	Perlis', 'Perlis', '6.44358900', '100.21659900'),
(32, ' 	Putrajaya', ' 	Putrajaya', '2.92640000', '101.69640000'),
(33, 'Selangor', 'Selangor', '3.50924700', '101.52480300'),
(34, 'Sabah', 'Sabah', '5.42040400', '116.79678300'),
(35, 'Sarawak', 'Sarawak', '4.39949300', '113.99138600'),
(36, 'Terengganu', 'Terengganu', '4.75645900', '103.39968100'),
(37, 'o', 'Others', NULL, NULL),
(99, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MSG_ID` int(11) NOT NULL,
  `ROOM_ID` int(11) NOT NULL,
  `SENDER_ID` int(11) NOT NULL,
  `RECEIVER_ID` int(11) NOT NULL,
  `CONTENT` text NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MSG_ID`, `ROOM_ID`, `SENDER_ID`, `RECEIVER_ID`, `CONTENT`, `TIME`, `STATUS`) VALUES
(1, 0, 33, 37, 'hi', '2021-05-03 15:17:09', 1),
(2, 0, 37, 33, 'hi1', '2021-05-03 15:17:09', 1),
(3, 0, 33, 37, 'WHAT', '2021-05-04 12:53:22', 1),
(4, 0, 33, 37, 'ANYHTNG?', '2021-05-04 12:53:22', 1),
(5, 1, 33, 35, 'HI ', '2021-05-04 12:55:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `REPORT_ID` varchar(20) NOT NULL,
  `REPORT_TYPE` varchar(10) DEFAULT NULL,
  `REPORTED_BY_USER_ID` int(11) NOT NULL,
  `REASON` varchar(255) NOT NULL,
  `REPORT_DESCP` text,
  `REPORT_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` varchar(20) DEFAULT NULL,
  `COMMENT` varchar(255) DEFAULT NULL,
  `UPDATE_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`REPORT_ID`, `REPORT_TYPE`, `REPORTED_BY_USER_ID`, `REASON`, `REPORT_DESCP`, `REPORT_DATE`, `STATUS`, `COMMENT`, `UPDATE_DATE`) VALUES
('R00009', 'ADS', 33, 'ALL VIOLATION', 'FAKEEE\r\nFAKEEEEE', '2021-04-02 17:11:35', 'OPEN', NULL, '2021-04-12 10:18:24'),
('R00011', 'MULTI', 33, 'ALL PROHIBITED', 'prohibited items sold by mingli.', '2021-04-02 17:19:52', 'ON HOLD', 'on hold reason', '2021-04-12 11:26:46'),
('R00012', 'MULTI', 33, 'ALL OFFENSIVE', 'Test null for adsID', '2021-04-02 17:20:40', 'OPEN', NULL, '2021-04-12 10:18:24'),
('R00013', 'MULTI', 33, 'ALL VIOLATION', '', '2021-04-03 14:53:42', 'PROGRESS', NULL, '2021-04-12 10:18:24'),
('R00014', 'ADS', 33, 'ALL VIOLATION', 'repeated', '2021-04-04 13:58:04', 'REJECTED', NULL, '2021-04-12 10:18:24'),
('R00015', 'ADS', 35, 'ALL OFFENSIVE', 'wrong', '2021-04-05 18:11:28', 'REJECTED', '              test<br />\r\ntest123             ', '2021-04-12 10:45:45'),
('R00016', 'ADS', 35, 'ALL OFFENSIVE', 'wrong', '2021-04-05 18:11:29', 'PROGRESS', 'wert\r\nwertuy             \r\nwhyy    \r\nohhhh          \r\nSettle                                       ', '2021-04-20 02:38:12'),
('R00017', 'ADS', 44, 'ALL PROHIBITED', 'reason', '2021-04-06 08:14:57', 'REJECTED', NULL, '2021-04-12 10:18:24'),
('R00018', 'MULTI', 44, 'ALL OFFENSIVE', 'report because...', '2021-04-06 08:24:57', 'OPEN', 'settle', '2021-04-20 02:35:34'),
('R00020', 'MULTI', 37, 'ALL VIOLATION', 'public', '2021-04-25 09:00:34', 'OPEN', NULL, NULL),
('R00021', 'MULTI', 37, 'ALL PROHIBITED', 'public 2', '2021-04-25 09:02:13', 'OPEN', NULL, NULL),
('R00022', 'MULTI', 37, 'ALL OFFENSIVE', 'public3\r\n', '2021-04-25 09:02:47', 'OPEN', NULL, NULL),
('R00023', 'MULTI', 37, 'ALL OFFENSIVE', 'report4', '2021-04-25 09:03:42', 'OPEN', NULL, NULL),
('R00024', 'ADS', 37, 'ALL OFFENSIVE', 'test report sahibba', '2021-04-25 09:13:08', 'OPEN', NULL, NULL),
('R00025', 'ADS', 37, 'ALL OFFENSIVE', 'TEST REPORT HDMI', '2021-04-25 09:15:46', 'OPEN', NULL, NULL),
('R00026', 'ADS', 37, 'ALL PROHIBITED', '', '2021-04-25 10:13:38', 'OPEN', NULL, NULL),
('R00027', 'ADS', 37, 'ALL PROHIBITED', '', '2021-04-25 10:13:56', 'OPEN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report_ads`
--

CREATE TABLE `report_ads` (
  `REPORT_ID` varchar(20) NOT NULL,
  `ADS_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_ads`
--

INSERT INTO `report_ads` (`REPORT_ID`, `ADS_ID`) VALUES
('R00009', 'AA00009'),
('R00014', 'AI00116'),
('R00015', 'AA00017'),
('R00016', 'AA00017'),
('R00017', 'A100119'),
('R00024', 'AI00137'),
('R00025', 'AI00131'),
('R00026', 'AI00136'),
('R00027', 'AI00136');

-- --------------------------------------------------------

--
-- Table structure for table `report_reason`
--

CREATE TABLE `report_reason` (
  `REASON_ID` int(11) NOT NULL,
  `REASON_VALUE` varchar(20) DEFAULT NULL,
  `REASON_NAME` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_reason`
--

INSERT INTO `report_reason` (`REASON_ID`, `REASON_VALUE`, `REASON_NAME`) VALUES
(1, 'ALL PROHIBITED', 'Prohibited (bannded) ads'),
(2, 'ALL VIOLATION', 'Listing policy violations (improper keywords, outside links, etc.)'),
(3, 'ALL OFFENSIVE', 'Offensive and potentially offensive ads'),
(4, 'ALL FRAUD', 'Fraudulent listings (illegal seller demands etc.)'),
(5, 'ALL STOLEN', 'Stolen property'),
(6, 'ALL OTHERS', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `SCHOOL_ID` varchar(20) NOT NULL,
  `SCHOOL_VALUE` varchar(20) NOT NULL,
  `SCHOOL_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`SCHOOL_ID`, `SCHOOL_VALUE`, `SCHOOL_NAME`) VALUES
('M001', 'none', '---Applied Sciences---'),
('M002', 'hbp', 'School of Housing, Building and Planning'),
('M003', 'ti', 'School of Industrial Technology'),
('M004', 'pharm', 'School of Pharmaceutical Sciences'),
('M005', 'cs', 'School of Computer Sciences'),
('M010', 'none', '---Applied Arts---'),
('M011', 'edu', 'School of Educational Studies'),
('M012', 'som', 'School of Management / Graduate School of Business'),
('M013', 'comm', 'School of Communication'),
('M014', 'art', 'School of the Art'),
('M020', 'none', '---Pure Arts---'),
('M021', 'ppblt', 'School of Languages, Literacies and Translation'),
('M022', 'humanities', 'School of Humanities'),
('M023', 'socialsciences', 'School of Social Sciences'),
('M030', 'none', '---Pure Sciences---'),
('M031', 'bio', 'School of Biological Sciences'),
('M032', 'chem', 'School of Chemical Sciences'),
('M033', 'math', 'School of Mathematical Sciences'),
('M034', 'physics', 'School of Physics'),
('M040', 'none', '---USM Staff---'),
('M041', 'academic', 'Academic Staff'),
('M042', 'nonacademic', 'Non-academic Staff'),
('M099', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `SUPPORT_ID` varchar(20) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `SUPPORT_SUBJECT` varchar(255) NOT NULL,
  `SUPPORT_DESCP` text,
  `SUPPORT_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` varchar(20) DEFAULT NULL,
  `COMMENT` varchar(255) DEFAULT NULL,
  `UPDATE_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`SUPPORT_ID`, `USER_ID`, `SUPPORT_SUBJECT`, `SUPPORT_DESCP`, `SUPPORT_DATE`, `STATUS`, `COMMENT`, `UPDATE_DATE`) VALUES
('S00002', 33, 'support subject', 'support description', '2021-04-03 17:31:21', 'OPEN', NULL, NULL),
('S00003', 33, 'support subject 2', 'support description 2', '2021-04-03 17:34:02', 'REJECTED', '              On hold comment\r\ncomment1            ', '2021-04-12 14:26:19'),
('S00013', 44, 'Support', 'Descp', '2021-04-06 08:24:39', 'OPEN', NULL, NULL),
('S00014', 37, 'Query About Posting Rules', 'Can i sell my own product at here?\r\nI am selling popcorn\r\nanyone wanna buy?', '2021-04-21 15:56:00', 'OPEN', NULL, NULL),
('S00015', 37, 'Query About Posting Rules', 'Can i sell my own product at here?\r\nI am selling popcorn\r\nanyone wanna buy?', '2021-04-21 15:56:24', 'OPEN', NULL, NULL),
('S00016', 37, 'Query about Everything', 'i wana ask.....\r\nask...', '2021-04-21 16:40:29', 'OPEN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status`
--

CREATE TABLE `ticket_status` (
  `STATUS_ID` int(10) NOT NULL,
  `STATUS_VALUE` varchar(20) DEFAULT NULL,
  `STATUS_NAME` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_status`
--

INSERT INTO `ticket_status` (`STATUS_ID`, `STATUS_VALUE`, `STATUS_NAME`) VALUES
(1, 'OPEN', 'OPEN'),
(2, 'PROGRESS', 'IN PROGRESS'),
(3, 'ON HOLD', 'ON HOLD'),
(4, 'REJECTED', 'REJECTED'),
(5, 'CLOSED', 'CLOSED');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USER_EMAIL` varchar(255) NOT NULL,
  `USER_PSWD` varchar(200) NOT NULL,
  `USER_NAME` varchar(255) NOT NULL,
  `WHATSAPP` text,
  `USER_GENDER` varchar(200) DEFAULT NULL,
  `SCHOOL` varchar(10) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `AREA` varchar(50) DEFAULT NULL,
  `AVATAR_ID` varchar(20) NOT NULL,
  `USER_STATUS` varchar(1) NOT NULL DEFAULT 'P',
  `CREATE_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TOKEN` varchar(255) DEFAULT NULL,
  `ADMIN_UPDATE_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_EMAIL`, `USER_PSWD`, `USER_NAME`, `WHATSAPP`, `USER_GENDER`, `SCHOOL`, `ADDRESS`, `AREA`, `AVATAR_ID`, `USER_STATUS`, `CREATE_AT`, `TOKEN`, `ADMIN_UPDATE_DATE`) VALUES
(33, 'minglilee@student.usm.my', '123', 'MingLi1234', '60124268891', NULL, 'cs', 'op', 'Greenlane', '', 'A', '2021-03-07 15:54:29', '21888c26a9cf8e938998', NULL),
(34, 'michelle@usm.my', '123', 'Michelle', '60124268891', NULL, 'academic', 'Tekun', '', '', 'A', '2021-03-11 16:40:20', NULL, NULL),
(35, 'anna@usm.my', '123', 'Anna88', '60124268891', NULL, 'cs', 'Fajar Harapan', '', '', 'R', '2021-03-14 17:29:54', NULL, '2021-04-19'),
(37, 'henry@usm.my', '123', 'Henry', '60124268891', NULL, 'edu', ' 	Putrajaya', '', 'A00002', 'R', '2021-03-18 19:18:03', NULL, '2021-04-20'),
(44, 'minglile@student.usm.my', '123', 'mingli1234', '60124268891', NULL, 'art', 'Fajar Harapan', '', '', 'A', '2021-04-06 08:11:53', '85bd1b2a1dc14fd049bd', NULL),
(53, 'minglile@student.usm.my', '123', 'MingLi123', '60124268891', NULL, 'cs', 'ou', 'Staff Hostel', '', 'R', '2021-04-09 15:13:55', '3fdb9fabcd2dac3e01e8', '2021-04-19'),
(54, 'minglile@student.usm.my', '123', 'MINGLIO', '60124268891', NULL, 'chem', 'ou', 'Home', 'A00001', 'A', '2021-05-14 18:20:44', '9132b80a1c292ebb5196', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_management`
--

CREATE TABLE `user_management` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `ACTION` varchar(11) DEFAULT NULL,
  `DESCP` varchar(255) DEFAULT NULL,
  `TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `PIC` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_management`
--

INSERT INTO `user_management` (`ID`, `USER_ID`, `ACTION`, `DESCP`, `TIME`, `PIC`) VALUES
(1, 35, 'GRANT', 'pass check', '2021-04-19 10:12:32', 0),
(2, 35, 'REVOKE', 'violate rules', '2021-04-19 10:13:43', 33),
(3, 35, 'GRANT', 'pass check', '2021-04-19 10:14:17', 0),
(4, 35, 'REVOKE', 'violate USMERS\" rules', '2021-04-19 10:16:14', 33),
(5, 35, 'GRANT', 'Pass checking', '2021-04-19 10:16:30', 33),
(6, 35, 'REVOKE', 'test revoke user', '2021-04-19 10:18:49', 33),
(7, 35, 'GRANT', 'test grant ', '2021-04-19 10:18:56', 33),
(8, 35, 'REVOKE', 'revoke test', '2021-04-19 10:19:33', 33),
(9, 35, 'GRANT', 'grant test', '2021-04-19 10:19:41', 33),
(10, 35, 'REVOKE', 'revoke test1', '2021-04-19 10:19:46', 33),
(11, 37, 'REVOKE', 'violate', '2021-04-20 02:54:36', 37);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abbr`
--
ALTER TABLE `abbr`
  ADD PRIMARY KEY (`ABBR_ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `ads_accom`
--
ALTER TABLE `ads_accom`
  ADD PRIMARY KEY (`ADS_ID`),
  ADD KEY `FK_ACCOM_USER_ID` (`USER_ID`);

--
-- Indexes for table `ads_item`
--
ALTER TABLE `ads_item`
  ADD PRIMARY KEY (`ADS_ID`),
  ADD KEY `USER_ID` (`USER_ID`);
ALTER TABLE `ads_item` ADD FULLTEXT KEY `ADS_TITLE` (`ADS_TITLE`);
ALTER TABLE `ads_item` ADD FULLTEXT KEY `ADS_DESCP` (`ADS_DESCP`);

--
-- Indexes for table `ads_job`
--
ALTER TABLE `ads_job`
  ADD PRIMARY KEY (`ADS_ID`),
  ADD KEY `FK_JOB_USER_ID` (`USER_ID`);

--
-- Indexes for table `ads_management`
--
ALTER TABLE `ads_management`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ads_status`
--
ALTER TABLE `ads_status`
  ADD PRIMARY KEY (`STATUS_ID`);

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`AVATAR_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CAT_ID`);

--
-- Indexes for table `deleted_ads`
--
ALTER TABLE `deleted_ads`
  ADD PRIMARY KEY (`DELETED_ADS_ID`);

--
-- Indexes for table `deleted_image`
--
ALTER TABLE `deleted_image`
  ADD PRIMARY KEY (`DELETED_IMAGE_ID`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD KEY `FK_user_id` (`USER_ID`);

--
-- Indexes for table `image_accom`
--
ALTER TABLE `image_accom`
  ADD PRIMARY KEY (`IMAGE_ID`),
  ADD KEY `FK_ADS_ID` (`ADS_ID`);

--
-- Indexes for table `image_item`
--
ALTER TABLE `image_item`
  ADD PRIMARY KEY (`IMAGE_ID`),
  ADD KEY `fk_image_item` (`ADS_ID`);

--
-- Indexes for table `image_job`
--
ALTER TABLE `image_job`
  ADD PRIMARY KEY (`IMAGE_ID`),
  ADD KEY `fk_image_id` (`ADS_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LOC_ID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`REPORT_ID`);

--
-- Indexes for table `report_ads`
--
ALTER TABLE `report_ads`
  ADD PRIMARY KEY (`REPORT_ID`,`ADS_ID`),
  ADD KEY `FK_REPORT_ID` (`REPORT_ID`) USING BTREE;

--
-- Indexes for table `report_reason`
--
ALTER TABLE `report_reason`
  ADD PRIMARY KEY (`REASON_ID`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`SCHOOL_ID`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`SUPPORT_ID`);

--
-- Indexes for table `ticket_status`
--
ALTER TABLE `ticket_status`
  ADD PRIMARY KEY (`STATUS_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `user_management`
--
ALTER TABLE `user_management`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abbr`
--
ALTER TABLE `abbr`
  MODIFY `ABBR_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ads_management`
--
ALTER TABLE `ads_management`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ads_status`
--
ALTER TABLE `ads_status`
  MODIFY `STATUS_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LOC_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `ticket_status`
--
ALTER TABLE `ticket_status`
  MODIFY `STATUS_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_management`
--
ALTER TABLE `user_management`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads_accom`
--
ALTER TABLE `ads_accom`
  ADD CONSTRAINT `FK_ACCOM_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `ads_item`
--
ALTER TABLE `ads_item`
  ADD CONSTRAINT `ads_item_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `ads_job`
--
ALTER TABLE `ads_job`
  ADD CONSTRAINT `FK_JOB_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `image_accom`
--
ALTER TABLE `image_accom`
  ADD CONSTRAINT `FK_ADS_ID` FOREIGN KEY (`ADS_ID`) REFERENCES `ads_accom` (`ADS_ID`);

--
-- Constraints for table `image_item`
--
ALTER TABLE `image_item`
  ADD CONSTRAINT `fk_image_item` FOREIGN KEY (`ADS_ID`) REFERENCES `ads_item` (`ADS_ID`);

--
-- Constraints for table `image_job`
--
ALTER TABLE `image_job`
  ADD CONSTRAINT `fk_image_id` FOREIGN KEY (`ADS_ID`) REFERENCES `ads_job` (`ADS_ID`),
  ADD CONSTRAINT `fk_image_job_id` FOREIGN KEY (`ADS_ID`) REFERENCES `ads_job` (`ADS_ID`);

--
-- Constraints for table `report_ads`
--
ALTER TABLE `report_ads`
  ADD CONSTRAINT `FK_Report_ID` FOREIGN KEY (`REPORT_ID`) REFERENCES `report` (`REPORT_ID`),
  ADD CONSTRAINT `report_ads_ibfk_1` FOREIGN KEY (`REPORT_ID`) REFERENCES `report` (`REPORT_ID`),
  ADD CONSTRAINT `report_ads_ibfk_2` FOREIGN KEY (`REPORT_ID`) REFERENCES `report` (`REPORT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
