-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 11:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lets-hike`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tokens`
--

CREATE TABLE `admin_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tokens`
--

INSERT INTO `admin_tokens` (`id`, `token`, `user_id`, `date`) VALUES
(1, '5999653bcf06a68a48d9282e3cc6637f94da8108', 1, '2020-12-26 02:15:33'),
(2, '866f6acaf6b067940b236743a8bf4c96fc8c3eb8', 1, '2021-02-04 19:20:21'),
(3, 'a90690d80f87d272445157fd885726372ce3df90', 2, '2021-02-14 03:18:25'),
(4, '8c4983a3e8ece8054a6ede9871a8a1c1065882c9', 1, '2021-02-19 05:49:55'),
(5, 'fdeeaa37182960c941cd87d0b358f62699e9006b', 1, '2021-02-20 11:38:45'),
(6, 'eada92f25048fab0c2bfc4e05beb869407b0f0a7', 1, '2021-02-24 17:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hike_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `total_price` varchar(32) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `persons` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `hike_id`, `date_added`, `total_price`, `start_date`, `end_date`, `persons`) VALUES
(8, 3, 2, '2021-02-23 14:45:25', '40384', '2021-03-02', '2021-04-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `_date`) VALUES
(2, 'Abdelrahman Sayed', 'abdelrahman3aysh@hotmail.com', 'Very Important', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo odio sed voluptatem quo et, harum accusamus eaque quod nisi optio asperiores commodi expedita, iste rerum.', '2021-02-19 06:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(5) NOT NULL,
  `value` float NOT NULL,
  `_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `value`, `_date`) VALUES
(1, 'INR', 4.61138, '2021-02-25 19:58:44'),
(2, 'CAD', 0.079713, '2021-02-25 20:06:28'),
(3, 'GBP', 0.045017, '2021-02-25 20:08:41'),
(4, 'EUR', 0.052348, '2021-02-25 20:20:35'),
(5, 'USD', 0.063757, '2021-02-25 20:31:14'),
(6, 'EUR', 0.052384, '2021-02-26 13:39:56'),
(7, 'EUR', 0.052384, '2021-02-26 23:45:18'),
(8, 'USD', 0.063687, '2021-02-26 23:45:48'),
(9, 'USD', 0.063675, '2021-02-27 00:46:27'),
(10, 'USD', 0.063675, '2021-02-27 01:59:50'),
(11, 'USD', 0.063675, '2021-02-27 11:59:25'),
(12, 'USD', 0.063675, '2021-02-27 15:13:44'),
(13, 'USD', 0.063699, '2021-03-01 00:44:13'),
(14, 'USD', 0.063637, '2021-03-01 18:44:09'),
(15, 'USD', 0.063637, '2021-03-01 20:17:37'),
(16, 'EUR', 0.052671, '2021-03-01 20:23:34'),
(17, 'EUR', 0.052671, '2021-03-01 21:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `_date`) VALUES
(1, 'Is my payment to hikingfy.com safe?', 'We only make use of Stripe, which allows you to make a fully secure and SSL encrypted payment. We support the following payment methods: all Visa and Mastercards, iDEAL, SOFORT, Bancontact and Giropay. Your payment is safe and the details of your form of payment are invisible.', '2020-12-26 01:40:56'),
(2, 'I pay a 15% deposit now. What happens next?', 'When you decide to make a 15% deposit, your spot is reserved and you will have the possibility to settle the rest of your payment upon arrival at your destination. Your deposit comes with the same level of guarantee as a full payment: Your spot is reserved, your dates are blocked and your trekking is good to go. All you have to do is pay the rest amount before the start of your trekking. This can, for example, be a cash or credit card payment in the offices of your trekking company.', '2020-12-26 01:45:09'),
(3, 'I rather pay the full amount upfront. Is this possible?', 'Do you wish to avoid having to pay the rest amount upon arrival at your destination? Choose then for paying the whole amount and we take care of the payment process.', '2020-12-26 01:45:51'),
(4, 'What happens once I have made my booking?', 'Once your booking is made, we get your trekking confirmed by your trekking agency. You will then get a confirmation e-mail with all the details of your trekking and the contact details of your trekking company.', '2020-12-26 01:46:28'),
(5, 'Can I change my booking?', 'You can change your reservation by contacting your trekking company directly and agree upon a new starting date. The same goes for changing your trekking. If this leads to a price difference, it is important to contact us as well.', '2020-12-26 01:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Rather Not To Say');

-- --------------------------------------------------------

--
-- Table structure for table `hikes`
--

CREATE TABLE `hikes` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `location` int(11) DEFAULT NULL,
  `overview` text NOT NULL,
  `route` text NOT NULL,
  `safety` text NOT NULL,
  `howtobook` text NOT NULL,
  `price` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hikes`
--

INSERT INTO `hikes` (`id`, `name`, `location`, `overview`, `route`, `safety`, `howtobook`, `price`) VALUES
(1, 'Salkantay Traditional', 226, 'The Inca Trail to Machu Picchu is a once in a lifetime experience and an opportunity not to be missed. It is one of the world’s oldest pilgrimages and is consistently ranked among the ten best hikes on the planet. Over four unforgettable days you will hike through different ecological zones which house an abundance of diverse flora and fauna. These include various orchids, bromeliads, hummingbirds, foxes and deer. Some lucky hikers may even catch a glimpse of the magnificent spectacled bear of South America during the trekking.', 'Your trekking team will pick you up from your hotel between 4:30-6:30am (depending on your location) and drive you to KM. 82 – arriving at approximately 8.00am. After a delicious breakfast we will head straight to the checkpoint to begin your trekking to Machu Picchu. It’s a relatively easy two-hour walk to Patallacta; the first Inca site along the trail. From a unique, secluded location we will enjoy the breathtaking views of this ancient city. It’s then another two-hour walk to Hatunchaca – located in the heart of the Inca trail – where lunch will be waiting. We will walk for another two hours to the first campsite located in Ayapata, arriving at approximately 5:00pm. Your tent, a snack and a hot drink will be waiting for you. You will then have some time to rest and enjoy the view of the mountains before dinner.', 'Safety is of the utmost importance to us. That is why this is an area in which we simply do not compromise when it comes to keeping the cost of our trekkings low. Our guides have been selected on the basis of their technical competence, proven safety performance, impeccable judgment, friendly attitude and ability to provide useful and expert instructions. They are also very professional and well trained in first aid and personal protection equipment. First aid kits are available on all treks. In addition, the routes are ideally designed to give you enough time to acclimatize.', 'On Bookatrekking.com you can find and compare the adventures of your dreams. Is this trekking adventure your match? In that case you can proceed to booking. At Bookatrekking.com you make a deposit of 15% of the total amount. You pay the remaining amount on location prior to the trek directly to the trekking company. Bookatrekking.com uses only the safest payment methods. Once your booking has been received, your place is reserved, your place is safe and you can look forward to your chosen trekking.', '925'),
(2, 'Everest Base Camp Trek', 226, 'The Inca Trail to Machu Picchu is a once in a lifetime experience and an opportunity not to be missed. It is one of the world’s oldest pilgrimages and is consistently ranked among the ten best hikes on the planet. Over four unforgettable days you will hike through different ecological zones which house an abundance of diverse flora and fauna. These include various orchids, bromeliads, hummingbirds, foxes and deer. Some lucky hikers may even catch a glimpse of the magnificent spectacled bear of South America during the trekking.', 'Your trekking team will pick you up from your hotel between 4:30-6:30am (depending on your location) and drive you to KM. 82 – arriving at approximately 8.00am. After a delicious breakfast we will head straight to the checkpoint to begin your trekking to Machu Picchu. It’s a relatively easy two-hour walk to Patallacta; the first Inca site along the trail. From a unique, secluded location we will enjoy the breathtaking views of this ancient city. It’s then another two-hour walk to Hatunchaca – located in the heart of the Inca trail – where lunch will be waiting. We will walk for another two hours to the first campsite located in Ayapata, arriving at approximately 5:00pm. Your tent, a snack and a hot drink will be waiting for you. You will then have some time to rest and enjoy the view of the mountains before dinner.', 'Safety is of the utmost importance to us. That is why this is an area in which we simply do not compromise when it comes to keeping the cost of our trekkings low. Our guides have been selected on the basis of their technical competence, proven safety performance, impeccable judgment, friendly attitude and ability to provide useful and expert instructions. They are also very professional and well trained in first aid and personal protection equipment. First aid kits are available on all treks. In addition, the routes are ideally designed to give you enough time to acclimatize.', 'On Bookatrekking.com you can find and compare the adventures of your dreams. Is this trekking adventure your match? In that case you can proceed to booking. At Bookatrekking.com you make a deposit of 15% of the total amount. You pay the remaining amount on location prior to the trek directly to the trekking company. Bookatrekking.com uses only the safest payment methods. Once your booking has been received, your place is reserved, your place is safe and you can look forward to your chosen trekking.', '1262'),
(8, 'Ultimate Salkantay Trek', 226, 'The Inca Trail to Machu Picchu is a once in a lifetime experience and an opportunity not to be missed. It is one of the world’s oldest pilgrimages and is consistently ranked among the ten best hikes on the planet. Over four unforgettable days you will hike through different ecological zones which house an abundance of diverse flora and fauna. These include various orchids, bromeliads, hummingbirds, foxes and deer. Some lucky hikers may even catch a glimpse of the magnificent spectacled bear of South America during the trekking.', 'Your trekking team will pick you up from your hotel between 4:30-6:30am (depending on your location) and drive you to KM. 82 – arriving at approximately 8.00am. After a delicious breakfast we will head straight to the checkpoint to begin your trekking to Machu Picchu. It’s a relatively easy two-hour walk to Patallacta; the first Inca site along the trail. From a unique, secluded location we will enjoy the breathtaking views of this ancient city. It’s then another two-hour walk to Hatunchaca – located in the heart of the Inca trail – where lunch will be waiting. We will walk for another two hours to the first campsite located in Ayapata, arriving at approximately 5:00pm. Your tent, a snack and a hot drink will be waiting for you. You will then have some time to rest and enjoy the view of the mountains before dinner.', 'Safety is of the utmost importance to us. That is why this is an area in which we simply do not compromise when it comes to keeping the cost of our trekkings low. Our guides have been selected on the basis of their technical competence, proven safety performance, impeccable judgment, friendly attitude and ability to provide useful and expert instructions. They are also very professional and well trained in first aid and personal protection equipment. First aid kits are available on all treks. In addition, the routes are ideally designed to give you enough time to acclimatize.', 'On Bookatrekking.com you can find and compare the adventures of your dreams. Is this trekking adventure your match? In that case you can proceed to booking. At Bookatrekking.com you make a deposit of 15% of the total amount. You pay the remaining amount on location prior to the trek directly to the trekking company. Bookatrekking.com uses only the safest payment methods. Once your booking has been received, your place is reserved, your place is safe and you can look forward to your chosen trekking.', '477'),
(9, 'Classic Lares Trek', 168, 'The Lares Trek is the second most popular route to Machu Picchu – after the Inca Trail – and its not difficult to see why. This is the Classic Itinerary of a Peruvian Classic. This route is one of the most varied and most beautiful. We make our way through breathtaking snowcapped mountains and picturesque valleys, passed beautiful lakes and waterfalls. We have created the Ultimate Lares trek to give you more time to enjoy these amazing places. The Salcantay Mountain is one of the most beautiful in Peru and is considered sacred by local villagers. We take five unforgettable days to hike alongside the majestic mountains, taking time to enjoy each magical location and feel the energy through meditation, yoga and exercise. As a final treat we will join the Inca Trail for a short section before arriving to Machu Picchu via the stunning Llaqtapata.', 'The Trekking team will pick you up from your hotel at around 5:00 am and drive you from the beautiful Sacred Valley of the Incas to the famous Lares thermo-medicinal baths – arriving at approximately 8:00 am. We will jump straight into the medicinal pools – all of which are set at different temperatures. The water is great for your bones, muscles, stress and headaches and therefore this is the prefect way to prepare for your Lares Trek to Machu Picchu. Today’s route is relatively easy with 2 hour trek uphill until we reach Kiswarani village. Our chef will be waiting with a delicious lunch that has been freshly prepared using natural, organic, local produce. Finally it’s another 2 hour walk to our campsite, located on the bank of a beautiful blue lake at (3750 m/ 1230 ft). We will pass beautiful streams and a waterfall which is the source of the Amazon river – the largest in the world. On reaching our campsite your tents and a hot cup of tea will be waiting for you. This is a perfect place to relax, stargaze, and learn about Inca astronomy.', 'Safety is of the utmost importance to us. That is why this is an area in which we simply do not compromise when it comes to keeping the cost of our trekkings low. Our guides have been selected on the basis of their technical competence, proven safety performance, impeccable judgment, friendly attitude and ability to provide useful and expert instructions. They are also very professional and well trained in first aid and personal protection equipment. First aid kits are available on all treks. In addition, the routes are ideally designed to give you enough time to acclimatize.', 'On hikingify.com you can find and compare the adventures of your dreams. Is this trekking adventure your match? In that case you can proceed to booking. At hikingify.com you make a deposit of 15% of the total amount. You pay the remaining amount on location prior to the trek directly to the trekking company. hikingify.com uses only the safest payment methods. Once your booking has been received, your place is reserved, your place is safe and you can look forward to your chosen trekking.', '488'),
(10, 'Machame Route', 115, 'The Whisky Route? The name is the cooler sibling of the much easier Marangu Route. The Marangu Route is known as the Coca-Cola Route or the Tourist Route. Although the Machame is not technically much more difficult, it is considered to be a bit more challenging. It is the most popular route nowadays because of its high success rates and because of the beauty of highlights on the trail such as the Shira Plateau, the Lava Tower, and the Barranco Wall. Because the Machame Route is so popular, the rates are also relatively lower. ', 'Your trekking team will pick you up from your hotel between 4:30-6:30am (depending on your location) and drive you to KM. 82 – arriving at approximately 8.00am. After a delicious breakfast we will head straight to the checkpoint to begin your trekking to Machu Picchu. It’s a relatively easy two-hour walk to Patallacta; the first Inca site along the trail. From a unique, secluded location we will enjoy the breathtaking views of this ancient city. It’s then another two-hour walk to Hatunchaca – located in the heart of the Inca trail – where lunch will be waiting. We will walk for another two hours to the first campsite located in Ayapata, arriving at approximately 5:00pm. Your tent, a snack and a hot drink will be waiting for you. You will then have some time to rest and enjoy the view of the mountains before dinner.', 'Safety is of the utmost importance to us. That is why this is an area in which we simply do not compromise when it comes to keeping the cost of our trekkings low. Our guides have been selected on the basis of their technical competence, proven safety performance, impeccable judgment, friendly attitude and ability to provide useful and expert instructions. They are also very professional and well trained in first aid and personal protection equipment. First aid kits are available on all treks. In addition, the routes are ideally designed to give you enough time to acclimatize.', 'On hikingify.com you can find and compare the adventures of your dreams. Is this trekking adventure your match? In that case you can proceed to booking. At hikingify.com you make a deposit of 15% of the total amount. You pay the remaining amount on location prior to the trek directly to the trekking company. hikingify.com uses only the safest payment methods. Once your booking has been received, your place is reserved, your place is safe and you can look forward to your chosen trekking.', '1601'),
(11, 'Classic Inca Trail Trek', 168, 'The Inca Trail to Machu Picchu is a once in a lifetime experience and an opportunity not to be missed. It is one of the world’s oldest pilgrimages and is consistently ranked among the ten best hikes on the planet. Over four unforgettable days you will hike through different ecological zones which house an abundance of diverse flora and fauna. These include various orchids, bromeliads, hummingbirds, foxes and deer. Some lucky hikers may even catch a glimpse of the magnificent spectacled bear of South America during the trekking.', 'Your trekking team will pick you up from your hotel between 4:30-6:30am (depending on your location) and drive you to KM. 82 – arriving at approximately 8.00am. After a delicious breakfast we will head straight to the checkpoint to begin your trekking to Machu Picchu. It’s a relatively easy two-hour walk to Patallacta; the first Inca site along the trail. From a unique, secluded location we will enjoy the breathtaking views of this ancient city. It’s then another two-hour walk to Hatunchaca – located in the heart of the Inca trail – where lunch will be waiting. We will walk for another two hours to the first campsite located in Ayapata, arriving at approximately 5:00pm. Your tent, a snack and a hot drink will be waiting for you. You will then have some time to rest and enjoy the view of the mountains before dinner.', 'Safety is of the utmost importance to us. That is why this is an area in which we simply do not compromise when it comes to keeping the cost of our trekkings low. Our guides have been selected on the basis of their technical competence, proven safety performance, impeccable judgment, friendly attitude and ability to provide useful and expert instructions. They are also very professional and well trained in first aid and personal protection equipment. First aid kits are available on all treks. In addition, the routes are ideally designed to give you enough time to acclimatize.', 'On hikingify.com you can find and compare the adventures of your dreams. Is this trekking adventure your match? In that case you can proceed to booking. At hikingify.com you make a deposit of 15% of the total amount. You pay the remaining amount on location prior to the trek directly to the trekking company. hikingify.com uses only the safest payment methods. Once your booking has been received, your place is reserved, your place is safe and you can look forward to your chosen trekking.', '538'),
(12, 'Black Perigord & Prehistory trek', 73, 'This limestone plateau, lined at the West by the Vezere Valley and at the South by the Dordogne Valley, is covered by forests of chestnut trees, pines and Holm oaks, which give it a dark color and its name: Black Perigord. History tells us that life has always been pleasant along the banks of these two rivers and in the valleys sheltering magnificent old villages, which have kept their uniqueness throughout time. These two rivers have carved impressive sites in the plateau, which men have exploited by erecting castles and villages on top of rock pinnacles and thus enhancing the natural beauty of the site. You will return to prehistoric times as you visit the troglodyte caverns in the cliffs of the Vezere valley, then advance through the middle ages and progress to present day as you traverse the valley of the Dordogne.', 'You will spend your nights in 2-3 star hotels along the way. Accommodation is normally in double or twin-bedded rooms, with en-suite facilities. Sentiers de France will take care of all the arrangements. On the Dossier, you will find all the information regarding your accommodation. Also, your luggage will be taken from one hotel to the next, you only have to worry about enjoying your trek!', 'Our treks in France are absolutely safe. In our dossier you will find a detailed map of the route you have to follow and information and contact details of the different places of accommodation where you will stay, and for different taxis that will carry your luggage, Moreover, a 24-hour helpline is available for you during the whole trek in case of an emergency. We will be there for you every step of the way!', 'On hikingify.com you can find and compare the adventures of your dreams. Is this trekking adventure your match? In that case you can proceed to booking. At hikingify.com you make a deposit of 15% of the total amount. You pay the remaining amount on location prior to the trek directly to the trekking company. hikingify.com uses only the safest payment methods. Once your booking has been received, your place is reserved, your place is safe and you can look forward to your chosen trekking.', '1102'),
(13, 'Mt Olympus & Meteora Trek', 83, 'The Olympus mountain range has been declared the first Greek National Park since 1938 and it’s also characterized as a World’s Biosphere Reserve. Organized mountain refuges and numerous hiking routes are available for all levels. In total there are 52 peaks ranging from altitudes of 760m to 2,918m, which combined with the alpine fields, sheer ravines, deep gorges, and thick forest create a unique landscape. Olympus mountain harbors more than 1,500 types of plants, dozens of animal species and many rare birds that we look forward to spotting for you.', 'Meeting and transfer to Litochoro, the “basecamp” town for all expeditions on Mount Olympus. The town is divided in two parts, one lying next to the sea and the other one by the riverbed of Enipeas gorge, at the foothills of Mount Olympus. Litochoro offers a slow-paced atmosphere inspiring visitors to stroll down its shady streets and wander around its solitary beaches. After accommodating yourself at our guesthouse, we’ll walk into Enipeas gorge to admire its amazing rock formations. We’ll discuss the week’s itinerary over a traditional drink and ‘meze’ by the river. You’ll enjoy a traditional meal at our favorite local tavern.', 'Safety is of the utmost importance to us. That is why this is an area in which we simply do not compromise when it comes to keeping the cost of our trekkings low. Our guides have been selected on the basis of their technical competence, proven safety performance, impeccable judgment, friendly attitude and ability to provide useful and expert instructions. They are also very professional and well trained in first aid and personal protection equipment. First aid kits are available on all treks. In addition, the routes are ideally designed to give you enough time to acclimatize.', 'On Bookatrekking.com you can find and compare the adventures of your dreams. Is this trekking adventure your match? In that case you can proceed to booking. At Bookatrekking.com you make a deposit of 15% of the total amount. You pay the remaining amount on location prior to the trek directly to the trekking company. Bookatrekking.com uses only the safest payment methods. Once your booking has been received, your place is reserved, your place is safe and you can look forward to your chosen trekking.', '1058');

-- --------------------------------------------------------

--
-- Table structure for table `hike_images`
--

CREATE TABLE `hike_images` (
  `id` int(11) NOT NULL,
  `hike_id` int(11) NOT NULL,
  `image` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hike_images`
--

INSERT INTO `hike_images` (`id`, `hike_id`, `image`) VALUES
(3, 1, '1.png'),
(4, 2, '2.png'),
(9, 8, '1537844230The-Ultimate-Salkantay-Trek-Trekexperience-1.png'),
(13, 8, '1537844230The-Ultimate-Salkantay-Trek-Trekexperience-1.png'),
(14, 8, '1537844230The-Ultimate-Salkantay-Trek-Trekexperience-1.png'),
(15, 9, '1247294693Classic-Lares-Trek-Trexperience-1.jpg'),
(16, 9, '1279150893Classic-Lares-Trek-Trexperience-3.jpg'),
(17, 9, '2127573649Classic-Lares-Trek-Trexperience-5.jpg'),
(18, 9, '278983725The-Ultimate-Salkantay-Trek-Trekexperience-5.png'),
(19, 9, '1532624194The-Ultimate-Salkantay-Trek-Trekexperience-4.png'),
(20, 10, '1180626451happy-to-reach-the-top-of-Kilimanjaro.jpg'),
(21, 10, '1567264950Camping-at-Mount-Kilmanjaro.png'),
(22, 10, '147102107Hikers-to-Kilimanjaro.png'),
(23, 10, '1370272469IMG-20170618-WA0024.jpg'),
(24, 10, '838798416IMG-20170606-WA0003.jpg'),
(25, 11, '71713276Classic-Inca-Trail-Trek-Trexperience-8.jpg'),
(26, 11, '529236653Classic-Inca-Trail-Trek-Trexperience-7.jpg'),
(27, 11, '104095180Classic-Inca-Trail-Trek-Trexperience-6.jpg'),
(28, 11, '64618208Classic-Inca-Trail-Trek-Trexperience-4.jpg'),
(29, 11, '1203182908Classic-Inca-Trail-Trek-Trexperience-1.jpg'),
(30, 11, '1904927897Classic-Inca-Trail-Trek-Trexperience-12.jpg'),
(31, 12, '627904862perigord-1__medium.jpg'),
(32, 12, '948636603perigord-2__medium.jpg'),
(33, 12, '1481356081perigord-3__medium.jpg'),
(34, 13, '754746826img-1329__medium.jpg'),
(35, 13, '1575704728img-1516-new__medium.jpg'),
(36, 13, '1544725064img-2171__medium.jpg'),
(37, 13, '1592869525img-2178__medium.jpg'),
(38, 13, '964718091img-2471__medium.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `user_id`, `date`) VALUES
(1, 'a5b2e98c8c36b45a020b086c1d47bd599f4fa8d1', 1, '2021-02-18 03:26:37'),
(2, 'e797ff5f5051c1ebf27bce75f32fb0789d0827f0', 1, '2021-02-18 04:08:11'),
(3, 'c2724cc64ae1f6df2a2412deb9c1c9b3325361ec', 2, '2021-02-20 11:26:48'),
(4, '925dab1acec5f0d65c4a101606ed1e13cc449416', 1, '2021-02-20 12:22:47'),
(5, '596de300b68d2b92610fe6c7214f3a12e74a70ae', 3, '2021-02-23 14:03:39'),
(6, 'c4965541233853994ed2c6d2bdd2b25a8af7d916', 4, '2021-02-24 14:29:51'),
(7, '69ab99dd40f45e31b4a65b6bfa3bf465828c104a', 4, '2021-02-24 14:29:53'),
(8, '04d982e6afc5ad006e22cce8680de0af291854fe', 6, '2021-02-25 10:19:44'),
(10, 'bde80983f1e81ff872ece38f01834df8215070bb', 6, '2021-02-25 10:37:46'),
(12, '898b74a9ec38326983ff2890cedca8f0bb2c29bc', 6, '2021-02-27 00:16:57'),
(13, '59881e83847caadcd945aa5fb12d0866a6926da6', 8, '2021-02-27 00:40:45'),
(14, '2214b9f10ac8207a96e0b4f995e49511327df944', 6, '2021-02-27 00:44:48'),
(16, '1dc8df978f36a2bf25fc1fe579f57aa194d3b8a0', 1, '2021-03-01 20:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `_from` int(11) NOT NULL,
  `_to` int(11) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `_date` datetime NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message_reports`
--

CREATE TABLE `message_reports` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `_date` datetime NOT NULL,
  `auditor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ordered_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `ordered_date`) VALUES
(1, 3, '2021-02-22 22:07:12'),
(2, 1, '2021-03-01 20:34:18'),
(3, 1, '2021-03-01 21:38:24'),
(4, 1, '2021-03-01 21:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `hike_id` int(11) NOT NULL,
  `price` varchar(32) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `persons` int(4) NOT NULL,
  `order_id` int(11) NOT NULL,
  `is_rated` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `hike_id`, `price`, `start_date`, `end_date`, `persons`, `order_id`, `is_rated`) VALUES
(1, 2, '500', '2021-02-23 22:06:49', '2021-02-24 22:06:49', 1, 1, 0),
(2, 2, '12948.12', '2021-03-01 00:00:00', '2021-03-04 00:00:00', 3, 2, 1),
(3, 1, '19275.12', '2021-03-01 00:00:00', '2021-03-03 00:00:00', 3, 2, 1),
(4, 8, '6525.36', '2021-03-09 00:00:00', '2021-03-13 00:00:00', 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penalties`
--

CREATE TABLE `penalties` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `_date` datetime NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `hike_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `stars` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `hike_id` int(11) NOT NULL,
  `rating` varchar(8) NOT NULL,
  `comment` text NOT NULL,
  `stars` float NOT NULL,
  `_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `hike_id`, `rating`, `comment`, `stars`, `_date`, `user_id`) VALUES
(1, 1, '', 'Very Good Place', 4.5, '2021-02-10 17:46:19', 1),
(2, 1, '', 'Good', 2, '2021-02-24 17:47:07', 1),
(4, 1, '', 'I Liked It', 5, '2021-02-23 17:46:19', 1),
(11, 2, '', '', 2.5, '2021-02-22 17:46:19', 3),
(12, 2, '', 'Very good experience', 4.5, '2021-03-01 21:28:32', 1),
(13, 1, '', 'Too Bad', 2, '2021-03-01 21:36:33', 1),
(14, 8, '', 'Very Good .. Will Try It Again', 4.875, '2021-03-01 21:39:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey_options`
--

CREATE TABLE `survey_options` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions`
--

CREATE TABLE `survey_questions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `survey_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `type` varchar(64) NOT NULL,
  `_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `fullname`, `subject`, `type`, `_date`, `user_id`, `status`) VALUES
(2, 'Abdelrahman Sayed', 'Very Important', 'Suggestion', '2021-02-25 10:35:37', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickets_messages`
--

CREATE TABLE `tickets_messages` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `_date` datetime NOT NULL,
  `_read` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets_messages`
--

INSERT INTO `tickets_messages` (`id`, `ticket_id`, `message`, `user_id`, `_date`, `_read`) VALUES
(1, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt minus doloribus mollitia! Perferendis, debitis rerum illum nostrum praesentium reprehenderit. Quo eligendi tempora recusandae sunt qui amet delectus illo officiis ipsam.', 1, '2021-02-25 10:35:37', 1),
(10, 2, 'Test Message For Ajax', 1, '2021-02-25 13:43:07', 1),
(12, 2, 'Test message from admin                      ', 6, '2021-02-25 16:07:21', 1),
(13, 2, 'Test Message', 6, '2021-02-26 22:58:13', 1),
(14, 2, 'Test Message from test', 6, '2021-02-26 23:13:03', 1),
(16, 2, 'Test Message from Admin', 6, '2021-02-26 23:40:18', 1),
(17, 2, 'Test Message from Admin', 8, '2021-02-26 23:40:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `gender` int(11) NOT NULL,
  `phonenumber` varchar(32) NOT NULL,
  `image` varchar(512) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `gender`, `phonenumber`, `image`, `type`) VALUES
(1, 'Abdelrahman Sayed', 'bodda@gmail.com', '$2y$10$nRmrGZkfk6DAtx5Hnjs1UOyaia4NqiwWDgOXEgFF2X.buzrLlqIm.', 1, '01158999135', '814503530unnamed.jpg', 1),
(2, 'Ahmed Ashraf', 'ashroof@gmail.com', '$2y$10$FA2aeY1CFahkSvcsLqihpeQEHChQRY/vp3e9dVJ6MCqZmuHIHtdPe', 1, '01158999145', 'user.png', 1),
(3, 'Mohamed Ashraf', 'Mohamed1812470@miuegypt.edu.eg', '$2y$10$sHuj0QEnh06aq2RMhgWIBOpkC1TSEFTMEVWPvvQ.V5QcjbbCEnNR2', 1, '+201156052920', '1756500080400018700354_306553.jpg', 1),
(4, 'Mohamed Ashraf2', 'Mohamed18124701@miuegypt.edu.eg', '$2y$10$FC6YOmSReylgww.62EDPMOlZoI2Ml.sTYft7v3Nx9Q5kM33m5hiu2', 1, '+201156052920', 'user.png', 2),
(6, 'Abdelrahman Sayed', 'abdelrahman3aysh@hotmail.com', '$2y$10$mu25KwxW5SrAJfpvDMiwGeNvOxJ2tSVWMDHTW9G01wElFHIeQQUra', 1, '01158999135', 'user.png', 3),
(8, 'Admin Test', 'testmail@email.com', '$2y$10$a39EQpt7sqm4zj7aePDbE.m5Iffhp8ahhIapsFyBlAn23byiiWWla', 1, '1212749589', 'user.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`) VALUES
(1, 'User'),
(2, 'Auditor'),
(3, 'HR partner'),
(4, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tokens`
--
ALTER TABLE `admin_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hike_id` (`hike_id`),
  ADD KEY `cart_ibfk_2` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hikes`
--
ALTER TABLE `hikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location` (`location`);

--
-- Indexes for table `hike_images`
--
ALTER TABLE `hike_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hike_id` (`hike_id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contact_id`);

--
-- Indexes for table `message_reports`
--
ALTER TABLE `message_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auditor_id` (`auditor_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `message_id` (`message_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `hike_id` (`hike_id`);

--
-- Indexes for table `penalties`
--
ALTER TABLE `penalties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_id` (`message_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hike_id` (`hike_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hike_id` (`hike_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_options`
--
ALTER TABLE `survey_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_questions`
--
ALTER TABLE `survey_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tickets_messages`
--
ALTER TABLE `tickets_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gender` (`gender`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tokens`
--
ALTER TABLE `admin_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hikes`
--
ALTER TABLE `hikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hike_images`
--
ALTER TABLE `hike_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_reports`
--
ALTER TABLE `message_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penalties`
--
ALTER TABLE `penalties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_options`
--
ALTER TABLE `survey_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_questions`
--
ALTER TABLE `survey_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets_messages`
--
ALTER TABLE `tickets_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`hike_id`) REFERENCES `hikes` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hikes`
--
ALTER TABLE `hikes`
  ADD CONSTRAINT `hikes_ibfk_1` FOREIGN KEY (`location`) REFERENCES `country` (`id`);

--
-- Constraints for table `hike_images`
--
ALTER TABLE `hike_images`
  ADD CONSTRAINT `hike_images_ibfk_1` FOREIGN KEY (`hike_id`) REFERENCES `hikes` (`id`);

--
-- Constraints for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD CONSTRAINT `login_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`);

--
-- Constraints for table `message_reports`
--
ALTER TABLE `message_reports`
  ADD CONSTRAINT `message_reports_ibfk_1` FOREIGN KEY (`auditor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `message_reports_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `message_reports_ibfk_3` FOREIGN KEY (`message_id`) REFERENCES `tickets_messages` (`id`),
  ADD CONSTRAINT `message_reports_ibfk_4` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`hike_id`) REFERENCES `hikes` (`id`);

--
-- Constraints for table `penalties`
--
ALTER TABLE `penalties`
  ADD CONSTRAINT `penalties_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `tickets_messages` (`id`),
  ADD CONSTRAINT `penalties_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`hike_id`) REFERENCES `hikes` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`hike_id`) REFERENCES `hikes` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tickets_messages`
--
ALTER TABLE `tickets_messages`
  ADD CONSTRAINT `tickets_messages_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`),
  ADD CONSTRAINT `tickets_messages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`type`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
