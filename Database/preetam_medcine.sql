-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 06:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preetam_medcine`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `imgs` varchar(125) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `imgs`, `category_id`, `status`) VALUES
(1, 'm1.jpg', 1, 1),
(2, 'm2.jpg', 1, 1),
(3, 'H1.jpg', 2, 1),
(4, 'H2.jpg', 2, 1),
(5, 'H3.jpg', 2, 1),
(6, 'H4.jpg', 2, 1),
(7, 'H5.png', 2, 1),
(8, 'H6.jpg', 2, 1),
(9, 'H7.jpg', 2, 1),
(10, 'L1.jpg', 3, 1),
(11, 'L2.jpg', 3, 1),
(12, 'L3.jpg', 3, 1),
(13, 'L4.jpg', 3, 1),
(14, 'L5.jpg', 3, 1),
(15, 'L6.jpg', 3, 1),
(16, 'D1.jpg', 4, 1),
(17, 'D2.jpg', 4, 1),
(18, 'D3.png', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `numItem` int(11) NOT NULL,
  `itemPrice` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `numItem`, `itemPrice`, `date`, `status`, `user_id`) VALUES
(3, 2, 1, '372', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cName` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `parentId` int(11) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(11) DEFAULT 0,
  `showHome` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cName`, `img`, `parentId`, `color`, `date`, `status`, `showHome`) VALUES
(1, 'Order Medicines', 'category1.png', 0, '#cff0ea', '05-03-2023', 0, 1),
(2, 'Healthcare Products', 'category2.png', 0, '#fdf2d2', '2023-03-21', 0, 1),
(3, 'Lab Tests                          ', 'category3.png', 0, '#f3c5f9', '05-03-2023', 0, 1),
(4, 'Doctor Appointment', 'category4.png', 0, '#d6f0ff', '05-03-2023', 0, 1),
(5, 'women', 'Capture.PNG', 0, NULL, '2023-04-29', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE `masters` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`id`, `fullName`, `mobile`, `pin`, `address`, `city`, `state`, `type`, `date`, `status`, `user_id`) VALUES
(1, 'Akash Arya', '1234569778', '201009', 'A-704, Gour Goval Village', 'Ghaziabad', 'Uttar Pradesh', 'Home', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `numItem` int(11) NOT NULL,
  `itemPrice` varchar(255) NOT NULL,
  `payStatus` varchar(255) NOT NULL,
  `orderstatus` varchar(125) NOT NULL DEFAULT '0',
  `transaction_id` varchar(125) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `master_id`, `product_id`, `numItem`, `itemPrice`, `payStatus`, `orderstatus`, `transaction_id`, `status`, `created`, `modified`) VALUES
(4, 1, 2, 1, '372', '1', 'Proccessing', NULL, 1, '2023-04-01', '2023-04-27'),
(5, 1, 2, 1, '372', '1', 'Dispatch', NULL, 1, '2023-04-03', '2023-04-27'),
(6, 1, 2, 1, '372', '1', 'Delivered', NULL, 1, '1900-01-11', '2023-05-23'),
(10, 1, 2, 1, '372', '1', '0', NULL, 1, '2023-05-17', '2023-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `pDescription` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `pImg` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pName`, `pDescription`, `category_id`, `pImg`, `price`, `date`, `status`) VALUES
(1, 'Arachitol Nano 60k Sugar Free Bottle Of 5ml Solution', 'Product Details\r\nBrand: ARACHITOL\r\nExpires on or After: 29/09/2024\r\nCountry of Origin: India\r\nABBOTT INDIA LTD:  16th Floor, Godrej BKC, Plot – C, “G” Block, Bandra-Kurla Complex, Bandra (East), Mumbai – 400 051, India.\r\nDisclaimer: THE CONTENTS OF THIS WEBSITE ARE FOR INFORMATIONAL PURPOSES ONLY AND ARE NOT INTENDED TO BE A SUBSTITUTE FOR PROFESSIONAL MEDICAL ADVICE, DIAGNOSIS, TREATMENT, OR PREVENTION OF A DISEASE OR MEDICAL CONDITION. PLEASE CONSULT A PHYSICIAN FOR THE TREATMENT AND/OR MANAGE', 1, 'medicine1.png', 81, '2023-04-03', 0),
(2, 'Arachitol Nano Daily 2k Iu Sugar Free Bottle Of 150ml Solution', 'Product Details\r\nBrand: ARACHITOL\r\nExpires on or After: 29/09/2024\r\nCountry of Origin: India\r\nABBOTT INDIA LTD:  16th Floor, Godrej BKC, Plot – C, “G” Block, Bandra-Kurla Complex, Bandra (East), Mumbai – 400 051, India.\r\nDisclaimer: THE CONTENTS OF THIS WEBSITE ARE FOR INFORMATIONAL PURPOSES ONLY AND ARE NOT INTENDED TO BE A SUBSTITUTE FOR PROFESSIONAL MEDICAL ADVICE, DIAGNOSIS, TREATMENT, OR PREVENTION OF A DISEASE OR MEDICAL CONDITION. PLEASE CONSULT A PHYSICIAN FOR THE TREATMENT AND/OR MANAGE', 1, 'medicine2.png', 372, '2023-04-04', 0),
(3, 'Liveasy Wellness Multivitamin Multimineral - Immunity Booster - Complete Nutrition - Bottle Of 60', 'Product Details\r\nBrand: ARACHITOL\r\nExpires on or After: 29/09/2024\r\nCountry of Origin: India\r\nABBOTT INDIA LTD:  16th Floor, Godrej BKC, Plot – C, “G” Block, Bandra-Kurla Complex, Bandra (East), Mumbai – 400 051, India.\r\nDisclaimer: THE CONTENTS OF THIS WEBSITE ARE FOR INFORMATIONAL PURPOSES ONLY AND ARE NOT INTENDED TO BE A SUBSTITUTE FOR PROFESSIONAL MEDICAL ADVICE, DIAGNOSIS, TREATMENT, OR PREVENTION OF A DISEASE OR MEDICAL CONDITION. PLEASE CONSULT A PHYSICIAN FOR THE TREATMENT AND/OR MANAGE', 1, 'medicine3.png', 454, '2023-04-04', 0),
(4, 'Arachitol Kids 400iu/0.5ml Pineapple Flavour Bottle Of 15ml Solution', 'Product Details\r\nBrand: ARACHITOL\r\nExpires on or After: 29/09/2024\r\nCountry of Origin: India\r\nABBOTT INDIA LTD:  16th Floor, Godrej BKC, Plot – C, “G” Block, Bandra-Kurla Complex, Bandra (East), Mumbai – 400 051, India.\r\nDisclaimer: THE CONTENTS OF THIS WEBSITE ARE FOR INFORMATIONAL PURPOSES ONLY AND ARE NOT INTENDED TO BE A SUBSTITUTE FOR PROFESSIONAL MEDICAL ADVICE, DIAGNOSIS, TREATMENT, OR PREVENTION OF A DISEASE OR MEDICAL CONDITION. PLEASE CONSULT A PHYSICIAN FOR THE TREATMENT AND/OR MANAGE', 1, 'medicine4.png', 170, '2023-04-04', 0),
(5, 'Glucon-D Instant Energy Health Drink Tangy Orange - 450gm Refill', 'Description\r\nSummer days can be very sweaty and uncomfortable not only for adults but also for children. Energy levels can become low due to excess heat and you feel tired and strained. The Glucon-D instant energy powder has glucose which replenishes the glucose levels in the body and builds energy to work all day. This health drink is quickly absorbed by the body creating energy and strength. The powder is enriched with Vitamin C and other minerals like Calcium and Phosphorous, which help make ', 2, 'healthcare1.png', 180, '2023-04-04', NULL),
(6, 'Glucon-D Instant Energy Health Drink Tangy Orange - 450gm Refill', 'Description\r\nThe Himalaya Liv 52 DS is a liver support supplement that ensures the healthy functioning of the liver. It essentially contains hepatoprotective agents and also has certain antioxidant properties. This herbal medication actively protects the liver from external damage due to chemicals. The Himalaya Liv 52 DS also has an antiperoxidative activity that helps maintain the functionality and structural integrity of the liver cell membranes.\r\n\r\nBenefits\r\nFor people consuming alcohol, the ', 2, 'healthcare2.png', 175, '2023-04-04', NULL),
(7, 'Baidyanath Nagpur Honey Natural Immunity Booster 1 Kg.', 'Product Details\r\nBrand: BAIDYANATH\r\nExpires on or After: 30/08/2024\r\nCountry of Origin: India\r\nBAIDYANATH NAGPUR: SHREE BAIDYANATH AYURVED BHAWAN PVT LTD\r\nDisclaimer:\r\nTHE CONTENTS OF THIS WEBSITE ARE FOR INFORMATIONAL PURPOSES ONLY AND NOT INTENDED TO BE A SUBSTITUTE FOR PROFESSIONAL MEDICAL ADVICE, DIAGNOSIS, OR TREATMENT. PLEASE SEEK THE ADVICE OF A PHYSICIAN OR OTHER QUALIFIED HEALTH PROVIDER WITH ANY QUESTIONS YOU MAY HAVE REGARDING A MEDICAL CONDITION. DO NOT DISREGARD PROFESSIONAL MEDICAL ADVICE OR DELAY IN SEEKING IT BECAUSE OF SOMETHING YOU HAVE READ ON THIS WEBSITE.', 2, 'healthcare2.png', 320, '2023-04-05', 0),
(8, 'Grd Bix Cardamom Nutrition Biscuits Tin Of 250 G', 'Description\r\nGrd Bix Biscuit is a dietary food supplement enriched with carbohydrates, minerals, vitamins and proteins. These biscuits contain 18 essential nutrients required for the growth and maintenance of the body. These biscuits help to build stronger immunity to protect from diseases.\r\n\r\nGrd Bix Biscuits are for all age groups. These help to gain optimal weight and boost energy level. These biscuits are also useful for the recovery of patients after surgery. Two to five biscuits help to relieve hunger and exhaustion between meals.\r\n\r\n\r\n\r\nBenefits\r\nGrd Bix Biscuit is a nutritional dietary supplement.\r\nIt contains 18 essential nutrients.\r\nIt improves general health & increases immunity.\r\nIt is enriched with proteins, vitamins, carbohydrates and minerals.\r\nIt relieves hunger pangs and provides nutrition.\r\nIt is suitable for every individual.\r\n2-5 biscuits per day are good for your health.\r\nIt helps in optimal weight gain upon daily consumption.\r\n\r\n\r\nIngredients\r\nGRD Bix Protein Biscuit is made with the goodness of puffed rice and formulated with Carbohydrate, Sugar, Protein and Niacin, which helps in supporting general health, well being and immunity, flavoured with cardamom.\r\n\r\n\r\n\r\nHow to Use\r\n2-5 biscuits a day is enough for consumption.\r\nUse it under medical supervision.\r\n\r\n\r\nSafety Information\r\nRead the label carefully before use.\r\nStore it in a cool and dry place, away from direct sunlight.\r\nKeep it out of the reach of the children.', 2, 'healthcare4.png', 400, '2023-04-05', 0),
(9, 'Dengue NS 1 Antigen', 'This test is used for the qualitative detection of Dengue Virus NS1 antigen as an aid to the diagnosis of Acute Dengue infection. NS1 antigen is a nonstructural protein found in infected patients from 1st day of fever up to 5 days after the onset of fever. Dengue fever, a viral infection by nature, is transmitted to individuals through mosquito bites. In most cases, these mosquitoes belong to tropical or subtropical regions responsible for carrying the virus. That is why it is exceedingly rampant in the regions of Africa, the Caribbean Western Pacific, America and the Eastern Mediterranean. The dengue NS1 antigen test diagnoses dengue infection in the first few days itself. It is responsible for measuring the antibodies that are produced in response to dengue. This test allows for rapid detection, making it an extremely viable alternative to other dengue tests. The dengue NS1 antigen test can be prescribed to individuals showing symptoms and signs of dengue fever. Some of the symptoms include - Fever, Retro-orbital pain, Transient macular rash, Severe headache. Many individuals affected by the virus develop only mild symptoms. In some cases, affected individuals don’t show any symptoms. All the signs of the dengue virus only start showing after 4-7 days of being affected by an Aedes aegypti and albopictus mosquito. A dengue NS1 antigen test can also be prescribed if an individual is vomiting continuously or has swollen glands. When it comes to India, dengue is endemic in almost all regions. The DV-2 serotype is the most common dengue serotype in the country. Frequent dengue outbreaks in the country have a severe drain on the country’s economy and put stress on healthcare professionals. South states like Karnataka, Kerala and Tamil are some of the worst dengue affected states in the country. Apart from these, Rajasthan and Gujarat also witness high dengue spread every year.', 3, 'lab1.png', 649, '2023-04-04', 0),
(10, 'Complete Blood Count / Hemogram (CBC)', 'A CBC Test or the Complete Blood Count Test is a blood test that can help your doctor determine your health status. It measures the levels of different blood cells in your body. Testing White Blood Cells, Red Blood Cells, Platelets, and Haemoglobin helps determine your overall health status and specific health issues. This test can help detect disorders ranging from different types of anaemia, infections, fever, inflammation and cancers.', 3, 'lab1.png', 399, '2023-04-05', 0),
(11, 'Comprehensive Full Body Checkup with Vitamin D & B12', 'The Comprehensive Full Body Checkup with Vitamin D & B12 is ideal for people who want to monitor their overall health. It provides a range of tests to check the health of the Heart, Thyroid, Kidney, and Liver. It also includes tests for Blood Sugar, Complete Blood Count, Lipid Profile and Complete Urine Analysis. In addition, it includes tests for Vitamin D, Vitamin B12, and Iron levels. This checkup can help identify significant health issues early on. This health checkup is suitable for all age groups and can be taken once every 6 to 12 months or as recommended by your doctor.', 3, 'lab2.jpeg', 1699, '2023-04-05', 0),
(12, 'Complete Blood Count / Hemogram (CBC)', 'The Comprehensive Full Body Checkup with Vitamin D & B12 is ideal for people who want to monitor their overall health. It provides a range of tests to check the health of the Heart, Thyroid, Kidney, and Liver. It also includes tests for Blood Sugar, Complete Blood Count, Lipid Profile and Complete Urine Analysis. In addition, it includes tests for Vitamin D, Vitamin B12, and Iron levels. This checkup can help identify significant health issues early on. This health checkup is suitable for all age groups and can be taken once every 6 to 12 months or as recommended by your doctor.', 3, 'lab2.jpeg', 380, '2023-04-05', 0),
(13, 'Dr. Agarwal Mudit', 'Specialization: Pathologist-Microbiologist\r\nDegree: MBBS, MD, DNB (Pathology)', 4, 'category4.png', 500, '2023-04-05', 0),
(14, 'Dr. Agarwal Reshma', 'Specialization: Psychiatrist\r\nDegree: MBBS, MD (Psychiatry)', 4, 'category4.png', 600, '2023-04-05', 0),
(15, 'Dr. Aggarwal Nitin', 'Specialization: Pathologist-Microbiologist\r\nDegree: MBBS, MD, DNB (Pathology)', 4, 'category4.png', 600, '2023-04-05', 0),
(16, 'Dr. Aggrawal K.K.', 'Specialization: Psychiatrist\r\nDegree: MBBS, MD (Psychiatry)', 4, 'category4.png', 400, '2023-04-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `pinCode` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `role` varchar(500) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fName`, `lName`, `mobile`, `email`, `password`, `dob`, `gender`, `address`, `pinCode`, `city`, `state`, `role`, `otp`, `status`, `created`, `modified`) VALUES
(1, 'Preetam', 'Chaurasiya', '9598183016', 'preetam183016@gmail.com', '$2y$10$tNnivmd0LMpruIOW4L1bSecZMCIc3f4pP5U7m/WrHHcOavl1FI.S6', '2023-03-04', 'M', 'ABES Engineering College', '201009', 'Ghaziabad', 'UP', 'a', NULL, 1, NULL, NULL),
(2, 'Akash', 'Arya', '1234569778', 'akash@gmail.com', '$2y$10$TzBX/gshdbMGeOwU3ki.2OMmHvBliUq.5PmtV8ryLDPjET9rdnSFK', '2023-03-25', 'M', 'ABES', '201009', 'Ghaziabad', 'Uttar Pradesh', 'd', NULL, 1, NULL, NULL),
(3, 'shivam', 'sharma', '9653069027', 'shivam.20b1293002@abes.ac.in', '$2y$10$ozCK3zKRhbLLXRW2z3ohzeM.8g19JDXcGpaIOIDODhhKtIFNaQ1hG', '1999-08-12', 'M', 'A-704, Gour Goval Village, Crossing Republik', '201016', 'Ghaziabad', 'Uttar Pradesh', 'r', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `masters`
--
ALTER TABLE `masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
