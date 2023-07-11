-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 11, 2023 at 12:29 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pillhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_code` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `identifier` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` int(11) NOT NULL,
  `branch_type` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_code`, `name`, `identifier`, `address`, `city`, `country`, `branch_type`, `created`) VALUES
(1, 'BRH_00001', 'Pillhub Microfinance', 'Headquarters', 'Address1', 'Harare', 225, 1, '2023-05-28 17:23:51'),
(2, 'BRH_00002', 'Chiredzi', 'Chiredzi', 'Chiredzi', 'Chiredzi', 225, 2, '2023-07-08 11:33:49'),
(3, 'BRH_00003', 'Main Branch', 'Main', 'Harare', 'Harare', 225, 2, '2023-07-10 20:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `branch_type`
--

CREATE TABLE `branch_type` (
  `branch_type_id` int(11) NOT NULL,
  `branch_type_code` varchar(15) NOT NULL,
  `branch_type_name` varchar(20) NOT NULL,
  `branch_type_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_type`
--

INSERT INTO `branch_type` (`branch_type_id`, `branch_type_code`, `branch_type_name`, `branch_type_description`) VALUES
(1, 'BRT_00001', 'Headquarters', 'Headquarters office'),
(2, 'BRT_00002', 'Sub Agent', 'Sub agent');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL,
  `show_overdue_after` int(11) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `sms_delivery` varchar(3) NOT NULL,
  `transaction_fees` decimal(10,2) NOT NULL,
  `commission_rate` decimal(10,2) NOT NULL,
  `usd_buying_rate` decimal(10,2) NOT NULL,
  `usd_selling_rate` decimal(10,2) NOT NULL,
  `rtgs_buying_rate` decimal(10,2) NOT NULL,
  `rtgs_selling_rate` decimal(10,2) NOT NULL,
  `bwp_buying_rate` decimal(10,2) NOT NULL,
  `bwp_selling_rate` decimal(10,2) NOT NULL,
  `eur_buying_rate` decimal(10,2) NOT NULL,
  `eur_selling_rate` decimal(10,2) NOT NULL,
  `zar_buying_rate` decimal(10,2) NOT NULL,
  `zar_selling_rate` decimal(10,2) NOT NULL,
  `dom_default_primary_branch_commission_rate` decimal(10,2) NOT NULL,
  `dom_primary_agent_commission` decimal(10,2) NOT NULL,
  `tx_min_limit` decimal(10,2) NOT NULL,
  `tx_max_limit` decimal(10,2) NOT NULL,
  `monthly_limit` decimal(10,2) NOT NULL,
  `site_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_id`, `show_overdue_after`, `open_time`, `close_time`, `sms_delivery`, `transaction_fees`, `commission_rate`, `usd_buying_rate`, `usd_selling_rate`, `rtgs_buying_rate`, `rtgs_selling_rate`, `bwp_buying_rate`, `bwp_selling_rate`, `eur_buying_rate`, `eur_selling_rate`, `zar_buying_rate`, `zar_selling_rate`, `dom_default_primary_branch_commission_rate`, `dom_primary_agent_commission`, `tx_min_limit`, `tx_max_limit`, `monthly_limit`, `site_status`) VALUES
(1, 30, '07:00:00', '17:00:00', 'off', '1.00', '0.05', '3600.00', '4000.00', '3800.00', '4000.00', '1.00', '1.00', '1.00', '1.00', '15.00', '18.00', '16.00', '68.00', '20.00', '500.00', '2000.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_iso2` varchar(2) NOT NULL,
  `country_iso3` varchar(3) NOT NULL,
  `country_code` varchar(7) NOT NULL,
  `commission_rate` decimal(10,2) NOT NULL,
  `country_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_iso2`, `country_iso3`, `country_code`, `commission_rate`, `country_status`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', '93', '0.00', 1),
(2, 'Albania', 'AL', 'ALB', '355', '0.00', 1),
(3, 'Algeria', 'DZ', 'DZA', '213', '0.00', 1),
(4, 'American Samoa', 'AS', 'ASM', '+1 684', '0.00', 1),
(5, 'Andorra', 'AD', 'AND', '376', '0.00', 1),
(6, 'Angola', 'AO', 'AGO', '244', '0.00', 1),
(7, 'Anguilla', 'AI', 'AIA', '+1 264', '0.00', 1),
(8, 'Antarctica', 'AQ', 'ATA', '672', '0.00', 1),
(9, 'Argentina', 'AR', 'ARG', '54', '0.00', 1),
(10, 'Armenia', 'AM', 'ARM', '374', '0.00', 1),
(11, 'Aruba', 'AW', 'ABW', '297', '0.00', 1),
(12, 'Australia', 'AU', 'AUS', '61', '0.00', 1),
(13, 'Austria', 'AT', 'AUT', '43', '0.00', 1),
(14, 'Azerbaijan', 'AZ', 'AZE', '994', '0.00', 1),
(15, 'Bahamas', 'BS', 'BHS', '1', '0.00', 1),
(16, 'Bahrain', 'BH', 'BHR', '973', '0.00', 1),
(17, 'Bangladesh', 'BD', 'BGD', '880', '0.00', 1),
(18, 'Barbados', 'BB', 'BRB', '1', '0.00', 1),
(19, 'Belarus', 'BY', 'BLR', '375', '0.00', 1),
(20, 'Belgium', 'BE', 'BEL', '32', '0.00', 1),
(21, 'Belize', 'BZ', 'BLZ', '501', '0.00', 1),
(22, 'Benin', 'BJ', 'BEN', '229', '0.00', 1),
(23, 'Bermuda', 'BM', 'BMU', '1', '0.00', 1),
(24, 'Bhutan', 'BT', 'BTN', '975', '0.00', 1),
(25, 'Bolivia', 'BO', 'BOL', '591', '0.00', 1),
(26, 'Bosnia and Herzegovina', 'BA', 'BIH', '387', '0.00', 1),
(27, 'Botswana', 'BW', 'BWA', '267', '0.00', 1),
(28, 'Brazil', 'BR', 'BRA', '55', '0.00', 1),
(29, 'British Virgin Islands', 'VG', 'VGB', '+1 284', '0.00', 1),
(30, 'Brunei', 'BN', 'BRN', '673', '0.00', 1),
(31, 'Bulgaria', 'BG', 'BGR', '359', '0.00', 1),
(32, 'Burkina Faso', 'BF', 'BFA', '226', '0.00', 1),
(33, 'Burundi', 'BI', 'BDI', '257', '0.00', 1),
(34, 'Cambodia', 'KH', 'KHM', '855', '0.00', 1),
(35, 'Cameroon', 'CM', 'CMR', '237', '0.00', 1),
(36, 'Canada', 'CA', 'CAN', '1', '0.00', 1),
(37, 'Cape Verde', 'CV', 'CPV', '238', '0.00', 1),
(38, 'Cayman Islands', 'KY', 'CYM', '-344', '0.00', 1),
(39, 'Central African Republic', 'CF', 'CAF', '236', '0.00', 1),
(40, 'Chile', 'CL', 'CHL', '56', '0.00', 1),
(41, 'China', 'CN', 'CHN', '86', '0.00', 1),
(42, 'Colombia', 'CO', 'COL', '57', '0.00', 1),
(43, 'Comoros', 'KM', 'COM', '269', '0.00', 1),
(44, 'Cook Islands', 'CK', 'COK', '682', '0.00', 1),
(45, 'Costa Rica', 'CR', 'CRI', '506', '0.00', 1),
(46, 'Croatia', 'HR', 'HRV', '385', '0.00', 1),
(47, 'Cuba', 'CU', 'CUB', '53', '0.00', 1),
(48, 'Curacao', 'CW', 'CUW', '599', '0.00', 1),
(49, 'Cyprus', 'CY', 'CYP', '357', '0.00', 1),
(50, 'Czech Republic', 'CZ', 'CZE', '420', '0.00', 1),
(51, 'Democratic Republic of Congo', 'CD', 'COD', '243', '0.00', 1),
(52, 'Denmark', 'DK', 'DNK', '45', '0.00', 1),
(53, 'Djibouti', 'DJ', 'DJI', '253', '0.00', 1),
(54, 'Dominica', 'DM', 'DMA', '1', '0.00', 1),
(55, 'Dominican Republic', 'DO', 'DOM', '1', '0.00', 1),
(56, 'East Timor', 'TL', 'TLS', '670', '0.00', 1),
(57, 'Ecuador', 'EC', 'ECU', '593', '0.00', 1),
(58, 'Egypt', 'EG', 'EGY', '20', '0.00', 1),
(59, 'El Salvador', 'SV', 'SLV', '503', '0.00', 1),
(60, 'Equatorial Guinea', 'GQ', 'GNQ', '240', '0.00', 1),
(61, 'Eritrea', 'ER', 'ERI', '291', '0.00', 1),
(62, 'Estonia', 'EE', 'EST', '372', '0.00', 1),
(63, 'Ethiopia', 'ET', 'ETH', '251', '0.00', 1),
(64, 'Falkland Islands', 'FK', 'FLK', '500', '0.00', 1),
(65, 'Faroe Islands', 'FO', 'FRO', '298', '0.00', 1),
(66, 'Fiji', 'FJ', 'FJI', '679', '0.00', 1),
(67, 'Finland', 'FI', 'FIN', '358', '0.00', 1),
(68, 'France', 'FR', 'FRA', '33', '0.00', 1),
(69, 'French Polynesia', 'PF', 'PYF', '689', '0.00', 1),
(70, 'Gabon', 'GA', 'GAB', '241', '0.00', 1),
(71, 'Gambia', 'GM', 'GMB', '220', '0.00', 1),
(72, 'Georgia', 'GE', 'GEO', '995', '0.00', 1),
(73, 'Germany', 'DE', 'DEU', '49', '0.00', 1),
(74, 'Ghana', 'GH', 'GHA', '233', '0.00', 1),
(75, 'Gibraltar', 'GI', 'GIB', '350', '0.00', 1),
(76, 'Greece', 'GR', 'GRC', '30', '0.00', 1),
(77, 'Greenland', 'GL', 'GRL', '299', '0.00', 1),
(78, 'Guadeloupe', 'GP', 'GLP', '590', '0.00', 1),
(79, 'Guam', 'GU', 'GUM', '+1 671', '0.00', 1),
(80, 'Guatemala', 'GT', 'GTM', '502', '0.00', 1),
(81, 'Guinea', 'GN', 'GIN', '224', '0.00', 1),
(82, 'Guinea-Bissau', 'GW', 'GNB', '245', '0.00', 1),
(83, 'Guyana', 'GY', 'GUY', '592', '0.00', 1),
(84, 'Haiti', 'HT', 'HTI', '509', '0.00', 1),
(85, 'Honduras', 'HN', 'HND', '504', '0.00', 1),
(86, 'Hong Kong', 'HK', 'HKG', '852', '0.00', 1),
(87, 'Hungary', 'HU', 'HUN', '36', '0.00', 1),
(88, 'Iceland', 'IS', 'ISL', '354', '0.00', 1),
(89, 'India', 'IN', 'IND', '91', '0.00', 1),
(90, 'Indonesia', 'ID', 'IDN', '62', '0.00', 1),
(91, 'Iran', 'IR', 'IRN', '98', '0.00', 1),
(92, 'Iraq', 'IQ', 'IRQ', '964', '0.00', 1),
(93, 'Ireland', 'IE', 'IRL', '353', '0.00', 1),
(94, 'Isle of Man', 'IM', 'IMN', '44', '0.00', 1),
(95, 'Israel', 'IL', 'ISR', '972', '0.00', 1),
(96, 'Italy', 'IT', 'ITA', '39', '0.00', 1),
(97, 'Ivory Coast', 'CI', 'CIV', '225', '0.00', 1),
(98, 'Jamaica', 'JM', 'JAM', '1', '0.00', 1),
(99, 'Japan', 'JP', 'JPN', '81', '0.00', 1),
(100, 'Jordan', 'JO', 'JOR', '962', '0.00', 1),
(101, 'Kazakhstan', 'KZ', 'KAZ', '7', '0.00', 1),
(102, 'Kenya', 'KE', 'KEN', '254', '0.00', 1),
(103, 'Kiribati', 'KI', 'KIR', '686', '0.00', 1),
(104, 'Kosovo', 'XK', 'XKX', '381', '0.00', 1),
(105, 'Kuwait', 'KW', 'KWT', '965', '0.00', 1),
(106, 'Kyrgyzstan', 'KG', 'KGZ', '996', '0.00', 1),
(107, 'Laos', 'LA', 'LAO', '856', '0.00', 1),
(108, 'Latvia', 'LV', 'LVA', '371', '0.00', 1),
(109, 'Lebanon', 'LB', 'LBN', '961', '0.00', 1),
(110, 'Lesotho', 'LS', 'LSO', '266', '0.00', 1),
(111, 'Liberia', 'LR', 'LBR', '231', '0.00', 1),
(112, 'Libya', 'LY', 'LBY', '218', '0.00', 1),
(113, 'Liechtenstein', 'LI', 'LIE', '423', '0.00', 1),
(114, 'Lithuania', 'LT', 'LTU', '370', '0.00', 1),
(115, 'Luxembourg', 'LU', 'LUX', '352', '0.00', 1),
(116, 'Macau', 'MO', 'MAC', '853', '0.00', 1),
(117, 'Macedonia', 'MK', 'MKD', '389', '0.00', 1),
(118, 'Madagascar', 'MG', 'MDG', '261', '0.00', 1),
(119, 'Malawi', 'MW', 'MWI', '265', '0.00', 1),
(120, 'Malaysia', 'MY', 'MYS', '60', '0.00', 1),
(121, 'Maldives', 'MV', 'MDV', '960', '0.00', 1),
(122, 'Mali', 'ML', 'MLI', '223', '0.00', 1),
(123, 'Malta', 'MT', 'MLT', '356', '0.00', 1),
(124, 'Marshall Islands', 'MH', 'MHL', '692', '0.00', 1),
(125, 'Mauritania', 'MR', 'MRT', '222', '0.00', 1),
(126, 'Mauritius', 'MU', 'MUS', '230', '0.00', 1),
(127, 'Mexico', 'MX', 'MEX', '52', '0.00', 1),
(128, 'Micronesia', 'FM', 'FSM', '691', '0.00', 1),
(129, 'Moldova', 'MD', 'MDA', '373', '0.00', 1),
(130, 'Monaco', 'MC', 'MCO', '377', '0.00', 1),
(131, 'Mongolia', 'MN', 'MNG', '976', '0.00', 1),
(132, 'Montenegro', 'ME', 'MNE', '382', '0.00', 1),
(133, 'Montserrat', 'MS', 'MSR', '+1 664', '0.00', 1),
(134, 'Morocco', 'MA', 'MAR', '212', '0.00', 1),
(135, 'Mozambique', 'MZ', 'MOZ', '258', '0.00', 1),
(136, 'Myanmar [Burma]', 'MM', 'MMR', '95', '0.00', 1),
(137, 'Namibia', 'NA', 'NAM', '264', '0.00', 1),
(138, 'Nauru', 'NR', 'NRU', '674', '0.00', 1),
(139, 'Nepal', 'NP', 'NPL', '977', '0.00', 1),
(140, 'Netherlands', 'NL', 'NLD', '31', '0.00', 1),
(141, 'New Caledonia', 'NC', 'NCL', '687', '0.00', 1),
(142, 'New Zealand', 'NZ', 'NZL', '64', '0.00', 1),
(143, 'Nicaragua', 'NI', 'NIC', '505', '0.00', 1),
(144, 'Niger', 'NE', 'NER', '227', '0.00', 1),
(145, 'Nigeria', 'NG', 'NGA', '234', '0.00', 1),
(146, 'Niue', 'NU', 'NIU', '683', '0.00', 1),
(147, 'Norfolk Island', 'NF', 'NFK', '672', '0.00', 1),
(148, 'North Korea', 'KP', 'PRK', '850', '0.00', 1),
(149, 'Northern Mariana Islands', 'MP', 'MNP', '+1 670', '0.00', 1),
(150, 'Norway', 'NO', 'NOR', '47', '0.00', 1),
(151, 'Oman', 'OM', 'OMN', '968', '0.00', 1),
(152, 'Pakistan', 'PK', 'PAK', '92', '0.00', 1),
(153, 'Palau', 'PW', 'PLW', '680', '0.00', 1),
(154, 'Panama', 'PA', 'PAN', '507', '0.00', 1),
(155, 'Papua New Guinea', 'PG', 'PNG', '675', '0.00', 1),
(156, 'Paraguay', 'PY', 'PRY', '595', '0.00', 1),
(157, 'Peru', 'PE', 'PER', '51', '0.00', 1),
(158, 'Philippines', 'PH', 'PHL', '63', '0.00', 1),
(159, 'Pitcairn Islands', 'PN', 'PCN', '870', '0.00', 1),
(160, 'Poland', 'PL', 'POL', '48', '0.00', 1),
(161, 'Portugal', 'PT', 'PRT', '351', '0.00', 1),
(162, 'Puerto Rico', 'PR', 'PRI', '1', '0.00', 1),
(163, 'Qatar', 'QA', 'QAT', '974', '0.00', 1),
(164, 'Republic of the Congo', 'CG', 'COG', '242', '0.00', 1),
(165, 'Reunion', 'RE', 'REU', '262', '0.00', 1),
(166, 'Romania', 'RO', 'ROU', '40', '0.00', 1),
(167, 'Russia', 'RU', 'RUS', '7', '0.00', 1),
(168, 'Rwanda', 'RW', 'RWA', '250', '0.00', 1),
(169, 'Saint Barth?lemy', 'BL', 'BLM', '590', '0.00', 1),
(170, 'Saint Helena', 'SH', 'SHN', '290', '0.00', 1),
(171, 'Saint Kitts and Nevis', 'KN', 'KNA', '1', '0.00', 1),
(172, 'Saint Lucia', 'LC', 'LCA', '1', '0.00', 1),
(173, 'Saint Martin', 'MF', 'MAF', '+1 599', '0.00', 1),
(174, 'Saint Pierre and Miquelon', 'PM', 'SPM', '508', '0.00', 1),
(175, 'Saint Vincent and the Grenadines', 'VC', 'VCT', '1', '0.00', 1),
(176, 'Samoa', 'WS', 'WSM', '685', '0.00', 1),
(177, 'San Marino', 'SM', 'SMR', '378', '0.00', 1),
(178, 'Sao Tome and Principe', 'ST', 'STP', '239', '0.00', 1),
(179, 'Saudi Arabia', 'SA', 'SAU', '966', '0.00', 1),
(180, 'Senegal', 'SN', 'SEN', '221', '0.00', 1),
(181, 'Serbia', 'RS', 'SRB', '381', '0.00', 1),
(182, 'Seychelles', 'SC', 'SYC', '248', '0.00', 1),
(183, 'Sierra Leone', 'SL', 'SLE', '232', '0.00', 1),
(184, 'Singapore', 'SG', 'SGP', '65', '0.00', 1),
(185, 'Slovakia', 'SK', 'SVK', '421', '0.00', 1),
(186, 'Slovenia', 'SI', 'SVN', '386', '0.00', 1),
(187, 'Solomon Islands', 'SB', 'SLB', '677', '0.00', 1),
(188, 'Somalia', 'SO', 'SOM', '252', '0.00', 1),
(189, 'South Africa', 'ZA', 'ZAF', '27', '1.00', 1),
(190, 'South Korea', 'KR', 'KOR', '82', '0.00', 1),
(191, 'South Sudan', 'SS', 'SSD', '211', '0.00', 1),
(192, 'Spain', 'ES', 'ESP', '34', '0.00', 1),
(193, 'Sri Lanka', 'LK', 'LKA', '94', '0.00', 1),
(194, 'Sudan', 'SD', 'SDN', '249', '0.00', 1),
(195, 'Suriname', 'SR', 'SUR', '597', '0.00', 1),
(196, 'Swaziland', 'SZ', 'SWZ', '268', '0.00', 1),
(197, 'Sweden', 'SE', 'SWE', '46', '0.00', 1),
(198, 'Switzerland', 'CH', 'CHE', '41', '0.00', 1),
(199, 'Syria', 'SY', 'SYR', '963', '0.00', 1),
(200, 'Taiwan', 'TW', 'TWN', '886', '0.00', 1),
(201, 'Tajikistan', 'TJ', 'TJK', '992', '0.00', 1),
(202, 'Tanzania', 'TZ', 'TZA', '255', '1.00', 1),
(203, 'Thailand', 'TH', 'THA', '66', '0.00', 1),
(204, 'Togo', 'TG', 'TGO', '228', '0.00', 1),
(205, 'Tokelau', 'TK', 'TKL', '690', '0.00', 1),
(206, 'Trinidad and Tobago', 'TT', 'TTO', '1', '0.00', 1),
(207, 'Tunisia', 'TN', 'TUN', '216', '0.00', 1),
(208, 'Turkey', 'TR', 'TUR', '90', '0.00', 1),
(209, 'Turkmenistan', 'TM', 'TKM', '993', '0.00', 1),
(210, 'Tuvalu', 'TV', 'TUV', '688', '0.00', 1),
(211, 'Uganda', 'UG', 'UGA', '256', '0.00', 1),
(212, 'Ukraine', 'UA', 'UKR', '380', '0.00', 1),
(213, 'United Arab Emirates', 'AE', 'ARE', '971', '0.00', 1),
(214, 'United Kingdom', 'GB', 'GBR', '44', '0.00', 1),
(215, 'United States', 'US', 'USA', '1', '0.00', 1),
(216, 'Uruguay', 'UY', 'URY', '598', '0.00', 1),
(217, 'Uzbekistan', 'UZ', 'UZB', '998', '0.00', 1),
(218, 'Vanuatu', 'VU', 'VUT', '678', '0.00', 1),
(219, 'Vatican', 'VA', 'VAT', '39', '0.00', 1),
(220, 'Venezuela', 'VE', 'VEN', '58', '0.00', 1),
(221, 'Vietnam', 'VN', 'VNM', '84', '0.00', 1),
(222, 'Western Sahara', 'EH', 'ESH', '212', '0.00', 1),
(223, 'Yemen', 'YE', 'YEM', '967', '0.00', 1),
(224, 'Zambia', 'ZM', 'ZMB', '260', '1.00', 1),
(225, 'Zimbabwe', 'ZW', 'ZWE', '263', '5.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(10) NOT NULL,
  `currency_description` text NOT NULL,
  `currency_buying_rate` decimal(10,2) NOT NULL,
  `currency_selling_rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_code`, `currency_description`, `currency_buying_rate`, `currency_selling_rate`) VALUES
(1, 'USD', 'United States Dollar', '1.00', '1.05'),
(2, 'RAND', 'South African Rand', '19.33', '19.45'),
(3, 'ZWL', 'Zimbabwean Dollar', '8500.00', '10500.00'),
(4, 'KWACHA', 'Zambian Kwacha', '19.50', '20.00'),
(5, 'SHILLING', 'Tanzanian Shilling', '19.50', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_code` varchar(9) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_surname` varchar(20) NOT NULL,
  `customer_nat_id` varchar(20) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address1` varchar(50) NOT NULL,
  `customer_address2` text NOT NULL,
  `customer_address3` text NOT NULL,
  `customer_country` varchar(10) NOT NULL,
  `customer_registered_by` varchar(50) NOT NULL,
  `customer_registered_date` datetime NOT NULL,
  `customer_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_code`, `customer_name`, `customer_surname`, `customer_nat_id`, `customer_phone`, `customer_email`, `customer_address1`, `customer_address2`, `customer_address3`, `customer_country`, `customer_registered_by`, `customer_registered_date`, `customer_status`) VALUES
(1, 'CST_00001', 'Anna', 'Muza', '63-1542400-E-26', '0772123123', 'annatoria@pillhurb.co.zw', '5 Lawson Drive', 'CBD', 'Harare', '225', 'admin', '2023-07-08 11:24:36', 0),
(2, 'CST_00002', 'Ronald Tapiwa', 'Mutematsaka', '75-2030616-G-71', '0772910945', 'ronniematsak@gmail.com', '58 Musasa Ave', 'Mufakose', 'Harare', '225', 'admin', '2023-07-10 20:20:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dom_remittance`
--

CREATE TABLE `dom_remittance` (
  `dom_remittance_id` int(11) NOT NULL,
  `dom_sender_id` varchar(10) NOT NULL,
  `dom_transfer_code` varchar(20) NOT NULL,
  `dom_receiver_id` varchar(10) NOT NULL,
  `dom_transfer_amount` decimal(10,2) NOT NULL,
  `dom_transfer_charge` decimal(10,2) NOT NULL,
  `dom_transfer_diff` decimal(10,2) NOT NULL,
  `bank_type_charge` decimal(10,2) NOT NULL,
  `dom_transfer_currency` varchar(5) NOT NULL,
  `vault_code` varchar(10) NOT NULL,
  `bank_account_type` int(11) NOT NULL,
  `dom_remittance_open_agent` varchar(20) NOT NULL,
  `dom_remittance_open_branch` varchar(10) NOT NULL,
  `open_ip` varchar(15) NOT NULL,
  `dom_remittance_open_timestamp` datetime NOT NULL,
  `dom_remittance_closed_agent` varchar(20) NOT NULL,
  `dom_remittance_closed_branch` varchar(10) NOT NULL,
  `closed_ip` varchar(15) NOT NULL,
  `dom_remittance_closed_timestamp` datetime NOT NULL,
  `dom_remittance_status` int(11) NOT NULL,
  `overdue_notice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forex_purchase`
--

CREATE TABLE `forex_purchase` (
  `forex_purchase_id` int(11) NOT NULL,
  `forex_purchase_code` varchar(15) NOT NULL,
  `forex_purchase_from_name` text NOT NULL,
  `forex_purchase_from_id_number` varchar(20) NOT NULL,
  `forex_purchase_amount_sold` decimal(10,2) NOT NULL,
  `forex_purchase_amount_paid` decimal(10,2) NOT NULL,
  `forex_purchase_fx_rate` decimal(10,2) NOT NULL,
  `forex_purchase_commission_rate` decimal(10,2) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `settlement_mode` varchar(20) NOT NULL,
  `forex_purchase_comments` text NOT NULL,
  `forex_purchase_transaction_agent` varchar(100) NOT NULL,
  `forex_purchase_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forex_sale`
--

CREATE TABLE `forex_sale` (
  `forex_sale_id` int(11) NOT NULL,
  `forex_sale_code` varchar(15) NOT NULL,
  `forex_sale_to_name` text NOT NULL,
  `forex_sale_to_id_number` varchar(30) NOT NULL,
  `settlement_mode` varchar(20) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `forex_sale_amount_sold` decimal(10,2) NOT NULL,
  `forex_sale_amount_paid` decimal(10,2) NOT NULL,
  `forex_sale_fx_rate` float NOT NULL,
  `forex_sale_commission_charged` float NOT NULL,
  `purchase_checklist` text NOT NULL,
  `forex_sale_comments` text NOT NULL,
  `forex_sale_transaction_agent` varchar(50) NOT NULL,
  `forex_sale_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_list`
--

CREATE TABLE `loan_list` (
  `id` int(30) NOT NULL,
  `reference` varchar(10) NOT NULL,
  `loan_type` int(30) NOT NULL,
  `customer_code` varchar(20) NOT NULL,
  `nok_code` varchar(20) NOT NULL,
  `loan_purpose` text NOT NULL,
  `loan_amount` decimal(10,2) NOT NULL,
  `loan_repayment_total` decimal(10,2) NOT NULL,
  `loan_repayment_amount` decimal(10,2) NOT NULL,
  `loan_penalty_amount` decimal(10,2) NOT NULL,
  `loan_plan` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= request, 1= confirmed,2=released,3=completed,4=denied\r\n',
  `date_released` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_list`
--

INSERT INTO `loan_list` (`id`, `reference`, `loan_type`, `customer_code`, `nok_code`, `loan_purpose`, `loan_amount`, `loan_repayment_total`, `loan_repayment_amount`, `loan_penalty_amount`, `loan_plan`, `status`, `date_released`, `date_created`) VALUES
(1, '73152671', 1, 'CST_00001', 'NOK_00001', 'Personal loan text', '2000.00', '2400.00', '400.00', '20.00', 6, 2, '2023-07-10 20:34:20', '2023-07-08 12:13:58'),
(2, '1997045', 1, 'CST_00001', 'NOK_00001', 'Personal loan', '2000.00', '2400.00', '800.00', '40.00', 3, 0, '0000-00-00 00:00:00', '2023-07-10 20:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `loan_plan`
--

CREATE TABLE `loan_plan` (
  `id` int(30) NOT NULL,
  `months` int(11) NOT NULL,
  `interest_percentage` float NOT NULL,
  `penalty_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_plan`
--

INSERT INTO `loan_plan` (`id`, `months`, `interest_percentage`, `penalty_rate`) VALUES
(1, 1, 20, 5),
(2, 2, 20, 5),
(3, 3, 20, 5),
(4, 4, 20, 5),
(10, 36, 20, 5),
(11, 6, 20, 0),
(12, 24, 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `loan_schedules`
--

CREATE TABLE `loan_schedules` (
  `id` int(30) NOT NULL,
  `loan_id` int(30) NOT NULL,
  `date_due` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_status`
--

CREATE TABLE `loan_status` (
  `id` int(11) NOT NULL,
  `loan_status` int(11) NOT NULL,
  `status_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_status`
--

INSERT INTO `loan_status` (`id`, `loan_status`, `status_name`) VALUES
(1, 0, 'New'),
(2, 1, 'Confirmed'),
(3, 2, 'Released'),
(4, 3, 'Completed'),
(5, 4, 'Denied');

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `id` int(30) NOT NULL,
  `type_name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`id`, `type_name`, `description`) VALUES
(1, 'Personal Loan', 'Personal'),
(2, 'Business', 'Business'),
(3, 'Mortgage', 'Mortgage');

-- --------------------------------------------------------

--
-- Table structure for table `nok`
--

CREATE TABLE `nok` (
  `id` int(11) NOT NULL,
  `nok_code` varchar(9) NOT NULL,
  `nok_name` varchar(20) NOT NULL,
  `nok_surname` varchar(20) NOT NULL,
  `nok_nat_id` varchar(20) NOT NULL,
  `nok_phone` varchar(15) NOT NULL,
  `nok_email` varchar(50) NOT NULL,
  `nok_address1` varchar(50) NOT NULL,
  `nok_address2` text NOT NULL,
  `nok_address3` text NOT NULL,
  `nok_country` varchar(10) NOT NULL,
  `nok_registered_by` varchar(50) NOT NULL,
  `nok_registered_date` datetime NOT NULL,
  `nok_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nok`
--

INSERT INTO `nok` (`id`, `nok_code`, `nok_name`, `nok_surname`, `nok_nat_id`, `nok_phone`, `nok_email`, `nok_address1`, `nok_address2`, `nok_address3`, `nok_country`, `nok_registered_by`, `nok_registered_date`, `nok_status`) VALUES
(1, 'NOK_00001', 'Ushe', 'Mungaraza', '26-127982-E-26', '0773371433', 'ushe@pillhurb.co.zw', '5 Lawson Drive', 'CBD', 'Harare', '225', 'admin', '2023-07-08 11:53:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `customer_code` varchar(20) NOT NULL,
  `repayment_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `penalty_amount` float NOT NULL DEFAULT '0',
  `overdue` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=no , 1 = yes',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `reference`, `customer_code`, `repayment_amount`, `penalty_amount`, `overdue`, `date_created`) VALUES
(1, '73152671', 'CST_00001', '400.00', 0, 0, '2023-07-08 12:55:17'),
(2, '73152671', 'CST_00001', '400.00', 0, 0, '2023-07-10 20:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `remittance`
--

CREATE TABLE `remittance` (
  `remittance_id` int(11) NOT NULL,
  `sender_name` varchar(20) NOT NULL,
  `sender_lname` varchar(50) NOT NULL,
  `remittance_origin` text NOT NULL,
  `remittance_ref_code` varchar(20) NOT NULL,
  `remittance_voucher_number` varchar(20) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_title` int(11) NOT NULL,
  `receiver_gender` int(11) NOT NULL,
  `receiver_lname` varchar(100) NOT NULL,
  `receiver_nat_id` varchar(20) NOT NULL,
  `receiver_phone` bigint(20) NOT NULL,
  `receiver_address` varchar(100) NOT NULL,
  `receiver_city` varchar(100) NOT NULL,
  `remittance_commission_charged` decimal(10,2) NOT NULL,
  `remittance_commission_paid` decimal(10,2) NOT NULL,
  `remittance_total_tendered` decimal(10,2) NOT NULL,
  `remittance_amount` decimal(10,2) NOT NULL,
  `remittance_currency` varchar(5) NOT NULL,
  `remittance_agent` varchar(50) NOT NULL,
  `remittance_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `title`, `description`) VALUES
(1, 'Administrator', 'Super user of the system'),
(2, 'Agent', 'This is for agent role'),
(3, 'Accountant', 'Accounts clerk information');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_code` varchar(15) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `national_id` varchar(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_role` tinyint(4) NOT NULL,
  `admin_created` datetime NOT NULL,
  `admin_branch` varchar(15) NOT NULL,
  `admin_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_code`, `fullname`, `national_id`, `phone`, `email`, `username`, `password`, `admin_role`, `admin_created`, `admin_branch`, `admin_status`) VALUES
(1, 'USR_00001', 'admin', 'admin', 0, '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2023-06-12 11:00:19', 'BRH_00001', 0),
(3, 'USR_00002', 'Pepe', '63-1181175-T-42', 0, '', 'pepe', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2023-07-08 11:33:06', 'BRH_00001', 0),
(4, 'USR_00003', 'Ryaen Mubvumbi', '59-178360-D-45', 0, '', 'rmubvumbi', '47b787f292b2dd931143ed0425c28bdc', 1, '2023-07-10 20:21:48', 'BRH_00001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vault`
--

CREATE TABLE `vault` (
  `vault_id` int(11) NOT NULL,
  `vault_code` varchar(10) NOT NULL,
  `vault_name` varchar(50) NOT NULL,
  `vault_account_no` varchar(50) NOT NULL,
  `vault_description` text NOT NULL,
  `vault_currency` varchar(10) NOT NULL,
  `vault_balance` decimal(10,2) NOT NULL,
  `vault_created` datetime NOT NULL,
  `vault_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vault_transaction`
--

CREATE TABLE `vault_transaction` (
  `vault_transaction_id` int(11) NOT NULL,
  `vault_transaction_code` varchar(10) NOT NULL,
  `vault_transaction_name` varchar(10) NOT NULL,
  `vault_transaction_description` text NOT NULL,
  `vault_transaction_type` varchar(20) NOT NULL,
  `vault_transaction_currency` varchar(10) NOT NULL,
  `vault_transaction_amount` decimal(10,2) NOT NULL,
  `vault_transaction_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`),
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- Indexes for table `branch_type`
--
ALTER TABLE `branch_type`
  ADD PRIMARY KEY (`branch_type_id`),
  ADD UNIQUE KEY `branch_type_code` (`branch_type_code`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`),
  ADD UNIQUE KEY `currency_code` (`currency_code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`customer_code`),
  ADD UNIQUE KEY `customer_nat_id` (`customer_nat_id`);

--
-- Indexes for table `dom_remittance`
--
ALTER TABLE `dom_remittance`
  ADD PRIMARY KEY (`dom_remittance_id`),
  ADD UNIQUE KEY `dom_transfer_code` (`dom_transfer_code`);

--
-- Indexes for table `forex_purchase`
--
ALTER TABLE `forex_purchase`
  ADD PRIMARY KEY (`forex_purchase_id`),
  ADD UNIQUE KEY `forex_purchase_code` (`forex_purchase_code`);

--
-- Indexes for table `forex_sale`
--
ALTER TABLE `forex_sale`
  ADD PRIMARY KEY (`forex_sale_id`),
  ADD UNIQUE KEY `forex_sale_code` (`forex_sale_code`);

--
-- Indexes for table `loan_list`
--
ALTER TABLE `loan_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_plan`
--
ALTER TABLE `loan_plan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `months` (`months`);

--
-- Indexes for table `loan_schedules`
--
ALTER TABLE `loan_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_status`
--
ALTER TABLE `loan_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nok`
--
ALTER TABLE `nok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nok_id` (`nok_code`),
  ADD UNIQUE KEY `nok_nat_id` (`nok_nat_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remittance`
--
ALTER TABLE `remittance`
  ADD PRIMARY KEY (`remittance_id`),
  ADD UNIQUE KEY `remittance_ref_code` (`remittance_ref_code`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `admin_nat_id` (`national_id`);

--
-- Indexes for table `vault`
--
ALTER TABLE `vault`
  ADD PRIMARY KEY (`vault_id`),
  ADD UNIQUE KEY `vault_code` (`vault_code`),
  ADD UNIQUE KEY `vault_name` (`vault_name`);

--
-- Indexes for table `vault_transaction`
--
ALTER TABLE `vault_transaction`
  ADD PRIMARY KEY (`vault_transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch_type`
--
ALTER TABLE `branch_type`
  MODIFY `branch_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dom_remittance`
--
ALTER TABLE `dom_remittance`
  MODIFY `dom_remittance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forex_purchase`
--
ALTER TABLE `forex_purchase`
  MODIFY `forex_purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forex_sale`
--
ALTER TABLE `forex_sale`
  MODIFY `forex_sale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_list`
--
ALTER TABLE `loan_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_plan`
--
ALTER TABLE `loan_plan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loan_schedules`
--
ALTER TABLE `loan_schedules`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_status`
--
ALTER TABLE `loan_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nok`
--
ALTER TABLE `nok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `remittance`
--
ALTER TABLE `remittance`
  MODIFY `remittance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vault`
--
ALTER TABLE `vault`
  MODIFY `vault_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vault_transaction`
--
ALTER TABLE `vault_transaction`
  MODIFY `vault_transaction_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
