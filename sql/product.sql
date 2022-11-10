-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 04:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f32ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float(16,2) DEFAULT NULL,
  `category` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `name`, `price`, `category`, `description`, `image`) VALUES
(1, 'Adidas Black Logo Backpack', 89.00, 'backpack', 'Width: 23cm\r\nHeight: 25cm\r\nBreadth: 5cm\r\nMaterial: Nylon', 'https://assets.adidas.com/images/w_600,f_auto,q_auto/06c8c6f98a09409b9f4bab9f00cad5cc_9366/Classic_Big_Logo_Backpack_Black_FS8332_01_standard.jpg'),
(2, 'Adidas Green Logo Backpack', 89.00, 'backpack', 'Width: 23cm\r\nHeight: 25cm\r\nBreadth: 5cm\r\nMaterial: Nylon', 'https://assets.adidas.com/images/w_600,f_auto,q_auto/f6ded4cc65764b92bb08ae8c014043b6_faec/Adicolor_Backpack_Green_HK2623_db01_standard.jpg'),
(3, 'Billabong Blue Canvas Backpack', 35.00, 'backpack', 'Width: 20cm\r\nHeight: 22cm\r\nBreadth: 5cm\r\nMaterial: Canvas', 'https://images.boardriders.com/global/billabong-products/all/default/large/jabk3bho_billabong,p_pjb0_frt1.jpg'),
(4, 'Billabong Mini Green Backpack', 20.00, 'backpack', 'Width: 10cm\r\nHeight: 15cm\r\nBreadth: 5cm\r\nMaterial: Canvas', 'https://images.boardriders.com/global/billabong-products/all/default/large/gabgwbmi_billabong,p_gbq0_sd1.jpg'),
(5, 'Cabin Zero Green Backpack', 50.00, 'backpack', 'Width: 23cm\r\nHeight: 25cm\r\nBreadth: 7cm\r\nMaterial: Denier Polyester', 'https://cdn.shopify.com/s/files/1/0495/6445/0968/products/cabinzero-classic-georgian-khaki17_1000x_67a23154-96e7-4b2c-a206-9a24690bd16e_1024x1024@2x.jpg?v=1624706509'),
(6, 'BTV Canvas Blue Handbag', 70.00, 'handbag', 'Width: 15cm\r\nHeight: 10cm\r\nBreadth: 3cm\r\nMaterial: Canvas', 'https://cdn.shopify.com/s/files/1/0207/5974/0480/products/01_76b48d3e-752a-41ed-a339-e84903837cc8_5000x.jpg?v=1653384884'),
(7, 'BTV Black Dumpling Handbag', 79.00, 'handbag', 'Width: 20cm\r\nHeight: 17cm\r\nBreadth: 9cm\r\nMaterial: Polyester & Cotton', 'https://cdn.shopify.com/s/files/1/0207/5974/0480/products/01_dd45a5f9-9887-44fb-b82d-02c6678856a1_5000x.jpg?v=1637553542'),
(8, 'BTV Khaki Dumpling Handbag', 79.00, 'handbag', 'Width: 20cm\r\nHeight: 17cm\r\nBreadth: 9cm\r\nMaterial: Polyester & Cotton', 'https://cdn.shopify.com/s/files/1/0207/5974/0480/products/Artboard1_23042270-d8eb-47cd-afc0-7531ecb234fe_5000x.jpg?v=1637553542'),
(9, 'BTV Maroon Dumpling Handbag', 59.00, 'handbag', 'Width: 10cm\r\nHeight: 7cm\r\nBreadth: 7cm\r\nMaterial: Polyester & Cotton', 'https://cdn.shopify.com/s/files/1/0207/5974/0480/products/01_e7136f66-13d4-4b93-8bfd-b5442863217b_5000x.jpg?v=1662949692'),
(10, 'Charles & Keith Navy Handbag', 99.00, 'handbag', 'Width: 25cm\r\nHeight: 12cm\r\nBreadth: 5cm\r\nMaterial: Leather & Canvas', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcTF-3v2AREflPiKxKHdOrJkq3cOFKarj2SuHEo4uiZKSLgeKCKVEirg-Wd7Yhm5XBM549evu7k1AI_AKs7rSqc3b5a24_NZXYKhP5b_dlydfrP1GygRqhHH&usqp=CAE'),
(11, 'Adidas Beige Waistbag', 30.00, 'waistbag', 'Width: 23cm\r\nHeight: 15cm\r\nBreadth: 7cm\r\nMaterial: Nylon', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/fd298145d9874cc0b37fae3f01383228_9366/Adicolor_Classic_Waist_Bag_Beige_HK2627_01_standard.jpg'),
(12, 'Billabong Black Waistbag', 30.00, 'waistbag', 'Width: 23cm\r\nHeight: 15cm\r\nBreadth: 7cm\r\nMaterial: Nylon', 'https://dynamic.zacdn.com/Ukkfw2UGzmMXAUzXT_bM8QjRrIc=/fit-in/346x500/filters:quality(95):fill(ffffff)/https://static-sg.zacdn.com/p/billabong-0021-6331282-1.jpg'),
(13, 'Billabong Flower Waistbag', 40.00, 'waistbag', 'Width: 20cm\r\nHeight: 15cm\r\nBreadth: 5cm\r\nMaterial: Polyester & Polyurethane', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHNaIvYBAhvgtMMj577BYUGTg_7M-UFR-jMw&usqp=CAU'),
(14, 'Billabong Grey Waistbag', 30.00, 'waistbag', 'Width: 23cm\r\nHeight: 15cm\r\nBreadth: 7cm\r\nMaterial: Nylon', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgjAQUx_q12OUdPy0yTso5cei4aRdMK_2DTmq-ARkgYg&s'),
(15, 'Herschel Yellow Waistbag', 45.00, 'waistbag', 'Width: 23cm\r\nHeight: 15cm\r\nBreadth: 7cm\r\nMaterial: Cotton', 'https://i.pinimg.com/736x/59/e9/24/59e924e186778c02e8436ec2b4f7a37c.jpg'),
(16, 'Billabong HGL Totebag', 69.00, 'totebag', 'Width: 25cm\r\nHeight: 30cm\r\nBreadth: 7cm\r\nMaterial: Canvas', 'https://www.tradeinn.com/f/13880/138809182/billabong-happy-go-lucky-bag.jpg'),
(17, 'Billabong Blue Canvas Totebag', 30.00, 'totebag', 'Width: 30cm\r\nHeight: 23cm\r\nBreadth: 5cm\r\nMaterial: Canvas', 'https://cdn.shopify.com/s/files/1/0490/4311/2086/products/billabong-along-the-way-tote-bag-bags-billabong-womens-386323.jpg?v=1659888788'),
(18, 'BTV Brown Totebag', 89.00, 'totebag', 'Width: 30cm\r\nHeight: 27cm\r\nBreadth: 10cm\r\nMaterial: Canvas', 'https://cdn.shopify.com/s/files/1/0207/5974/0480/products/01_7cb75ee0-2860-41fc-a070-4515793ef0cd_5000x.jpg?v=1653366336'),
(19, 'BTV Khaki Drawstring Totebag', 100.00, 'totebag', 'Width: 10cm\r\nHeight: 15cm\r\nBreadth: 5cm\r\nMaterial: Canvas', 'https://cdn.shopify.com/s/files/1/0207/5974/0480/products/2KHAKI_5000x.jpg?v=1660636499'),
(20, 'BTV Olive Drawstring Totebag', 100.00, 'totebag', 'Width: 10cm\r\nHeight: 15cm\r\nBreadth: 5cm\r\nMaterial: Canvas', 'https://cdn.shopify.com/s/files/1/0207/5974/0480/products/2OLIVE_5000x.jpg?v=1660725676'),
(21, 'Billabong BiFold Black Wallet', 40.00, 'wallet', 'Width: 10cm\r\nHeight: 7cm\r\nBreadth: 3cm\r\nMaterial: Leather', 'https://dynamic.zacdn.com/BCRgZwwRQmZFCzdIe4vakEWgZpU=/fit-in/346x500/filters:quality(95):fill(ffffff)/https://static-sg.zacdn.com/p/billabong-8046-4915912-1.jpg'),
(22, 'Billabong Leather Wallet', 40.00, 'wallet', 'Width: 10cm\r\nHeight: 7cm\r\nBreadth: 3cm\r\nMaterial: Leather', 'https://internetfusion.imgix.net/1678230.jpg?auto=format,compress&cs=srgb&fit=fill&fill=solid&w=550&h=550'),
(23, 'Charles & Keith Strawberry Wallet', 55.00, 'wallet', 'Width: 10cm\r\nHeight: 7cm\r\nBreadth: 3cm\r\nMaterial: Polyester & Stainless Steel', 'https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw2bd90274/images/hi-res/2022-L3-CK6-10840462-13-1.jpg?sw=1152&sh=1536'),
(24, 'Charles & Keith Cloud Wallet', 60.00, 'wallet', 'Width: 10cm\r\nHeight: 7cm\r\nBreadth: 3cm\r\nMaterial: Polyester & Stainless Steel', 'https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dwd4fcbdb6/images/hi-res/2022-L6-CK6-30681013-1-24-1.jpg?sw=1152&sh=1536'),
(25, 'Charles & Keith Holo Wallet', 60.00, 'wallet', 'Width: 10cm\r\nHeight: 7cm\r\nBreadth: 3cm\r\nMaterial: Polyester & Stainless Steel', 'https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw21f1bcd2/images/hi-res/2022-L6-CK6-10770551-I3-1.jpg?sw=1152&sh=1536'),
(26, 'Away Grey Luggage', 110.00, 'luggage', 'Width: 29cm\r\nHeight: 76cm\r\nBreadth:30cm\r\nMaterial: Acrylonitrile Butadiene Styrene (ABS)', 'https://assets.awaytravel.com/spree/products/27417/original/PDP_PC_Asphalt_CAR_01.jpg'),
(27, 'Away Pink Luggage', 110.00, 'luggage', 'Width: 29cm\r\nHeight: 76cm\r\nBreadth:30cm\r\nMaterial: Acrylonitrile Butadiene Styrene (ABS)', 'https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1658432335-bafe9b45-17a2-4387-8f89-5bb3eccacb47.jpg'),
(28, 'Herschel Black Duffel Luggage', 79.00, 'luggage', 'Width: 48cm\r\nHeight: 18cm\r\nBreadth:20cm\r\nMaterial: Nylon', 'https://internetfusion.imgix.net/565740.jpg?auto=format,compress&cs=srgb&fit=fill&fill=solid&w=550&h=550'),
(29, 'Billabong Black Luggage', 99.00, 'luggage', 'Width: 25cm\r\nHeight: 67cm\r\nBreadth: 25cm\r\nMaterial: Nylon', 'https://m.media-amazon.com/images/I/711o0aBaaxL._AC_SY879_.jpg'),
(30, 'Jetstream White Luggage', 99.00, 'luggage', 'Width: 29cm\r\nHeight: 76cm\r\nBreadth:30cm\r\nMaterial: Acrylonitrile Butadiene Styrene (ABS)', 'https://i5.walmartimages.ca/images/Enlarge/574/496/6000202574496.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
