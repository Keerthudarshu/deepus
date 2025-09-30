-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2025 at 11:43 AM
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
-- Database: `deepus`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `vitri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `img`, `vitri`) VALUES
(1, 'banner 1.png', 1),
(2, 'banner 2.png', 2),
(3, 'banner 3.png', 3),
(4, 'banner-custom-1.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL DEFAULT 1,
  `id_product` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `thanhtien` double(10,2) NOT NULL,
  `img` varchar(100) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `product_design` tinyint(1) NOT NULL DEFAULT 0,
  `id_product_design` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_donhang`, `id_product`, `soluong`, `price`, `thanhtien`, `img`, `id_size`, `id_color`, `product_design`, `id_product_design`, `name`) VALUES
(658, 91, 148, 76, 1, 399000.00, 399000.00, 'AK_008_blue.png', 1, 5, 0, 1, 'Trucker Denim Extended'),
(659, 91, 148, 75, 1, 399000.00, 399000.00, 'AK_007_yellow.png', 1, 10, 0, 1, 'Raglan Clock Color'),
(660, 91, 149, 69, 1, 315000.00, 315000.00, 'APL_003_black.png', 1, 2, 0, 1, 'Polo Radiate Positivity'),
(661, 91, 150, 74, 1, 375000.00, 375000.00, 'AK_006_black.png', 1, 2, 0, 1, ' Windproof Flexible'),
(662, 91, 151, 71, 1, 315000.00, 315000.00, 'APL_005_black.png', 1, 2, 0, 1, 'Polo Milk Coffee Striped'),
(664, 91, 152, 1, 1, 300000.00, 300000.00, 'AT_DESIGN_44296425.png', 1, 1, 1, 68, 'Regular Basic T-Shirt'),
(665, 92, 153, 70, 1, 250000.00, 250000.00, 'APL_004_white.png', 1, 1, 0, 1, 'Polo Horional Green Stripes'),
(668, 92, 154, 1, 1, 300000.00, 300000.00, 'AT_DESIGN_20480023.png', 1, 1, 1, 70, 'Regular Basic T-Shirt'),
(672, 92, 155, 1, 1, 300000.00, 300000.00, 'AT_DESIGN_26470811.png', 1, 1, 1, 73, 'Regular Basic T-Shirt'),
(673, 92, 156, 75, 1, 399000.00, 399000.00, 'AK_007_yellow.png', 1, 10, 0, 1, 'Raglan Clock Color'),
(674, 93, 157, 68, 1, 288000.00, 288000.00, 'ASM_007_blue.png', 1, 5, 0, 1, 'Logo Customize Vertical'),
(678, 93, 158, 1, 1, 300000.00, 300000.00, 'AT_DESIGN_59742211.png', 1, 1, 1, 75, 'Regular Basic T-Shirt'),
(679, 93, 159, 71, 1, 315000.00, 315000.00, 'APL_005_black.png', 1, 2, 0, 1, 'Polo Milk Coffee Striped'),
(680, 94, 160, 66, 1, 300000.00, 300000.00, 'ASM_005_white.png', 1, 1, 0, 1, 'Slimfit Button Down Shirt'),
(683, 94, 161, 1, 1, 300000.00, 300000.00, 'AT_DESIGN_60816077.png', 1, 1, 1, 77, 'Regular Basic T-Shirt'),
(684, 94, 162, 76, 1, 399000.00, 399000.00, 'AK_008_blue.png', 1, 5, 0, 1, 'Trucker Denim Extended'),
(685, 94, 163, 74, 1, 375000.00, 375000.00, 'AK_006_black.png', 1, 2, 0, 1, ' Windproof Flexible'),
(686, 94, 163, 62, 1, 450000.00, 450000.00, 'AK_005_blue.png', 1, 5, 0, 1, 'Varsity Rhythm Jacket'),
(687, 94, 163, 64, 1, 300000.00, 300000.00, 'ASM_003_brown.png', 1, 3, 0, 1, 'Cuban Floral Plain Shirt'),
(688, 95, 164, 53, 1, 490000.00, 490000.00, 'AK_001_white.png', 1, 1, 0, 1, 'Regular Surpass Jacket'),
(689, 95, 164, 57, 1, 420000.00, 420000.00, 'AK_003_beige.png', 1, 8, 0, 1, 'Varsity Festive Vibe Jacket'),
(690, 95, 164, 63, 1, 390000.00, 390000.00, 'AT_008_black.png', 1, 2, 0, 1, 'Regular Tiger T-Shirt'),
(691, 95, 164, 59, 1, 290000.00, 290000.00, 'AT_006_white.png', 1, 1, 0, 1, 'Regular Special T-Shirt'),
(693, 95, 165, 1, 1, 300000.00, 300000.00, 'AT_DESIGN_14856513.png', 1, 1, 1, 79, 'Regular Basic T-Shirt'),
(694, 95, 166, 45, 1, 290000.00, 290000.00, 'AT_002_white.png', 1, 1, 0, 1, 'Regular Come T-Shirt'),
(695, 95, 166, 61, 1, 270000.00, 270000.00, 'AT_007_white.png', 3, 1, 0, 1, 'Mono style T-Shirt'),
(696, 95, 166, 60, 1, 399000.00, 399000.00, 'AK_004_blue.png', 1, 5, 0, 1, 'style Classic Jacket'),
(697, 96, 167, 55, 1, 450000.00, 450000.00, 'AK_002_black.png', 1, 2, 0, 1, 'Colorblock Raglan Jacket'),
(698, 96, 167, 50, 1, 850000.00, 850000.00, 'ASM_001_brown.png', 1, 3, 0, 1, 'Cuban Label Shirt'),
(699, 96, 167, 67, 1, 315000.00, 315000.00, 'ASM_006_black.png', 1, 2, 0, 1, 'Cuban Chrysanthemum Shirt'),
(701, 96, 168, 1, 1, 300000.00, 300000.00, 'AT_DESIGN_03019319.png', 1, 1, 1, 81, 'Regular Basic T-Shirt'),
(702, 97, 169, 46, 1, 320000.00, 320000.00, 'AT_003_white.png', 1, 1, 0, 1, 'Oversize V-Neck T-Shirt'),
(703, 97, 169, 49, 1, 350000.00, 350000.00, 'AT_005_blue.png', 1, 5, 0, 1, 'Streetfood Pop Art T-Shirt'),
(705, 97, 170, 1, 1, 300000.00, 300000.00, 'AT_DESIGN_73288057.png', 1, 1, 1, 82, 'Regular Basic T-Shirt'),
(706, 98, 171, 51, 1, 440000.00, 440000.00, 'APL_001_white.png', 1, 1, 0, 1, 'Polo Nam Tay Ngắn'),
(707, 98, 171, 52, 1, 350000.00, 350000.00, 'APL_002_white.png', 1, 1, 0, 1, 'Polo Elegant Alphabet'),
(708, 98, 171, 73, 1, 315000.00, 315000.00, 'APL_007_white.png', 1, 1, 0, 1, 'Polo Regular Horizonal'),
(709, 99, 172, 75, 1, 399000.00, 399000.00, 'AK_007_yellow.png', 1, 10, 0, 1, 'Raglan Clock Color'),
(710, 99, 172, 61, 1, 270000.00, 270000.00, 'AT_007_white.png', 1, 1, 0, 1, 'Mono style T-Shirt'),
(712, 99, 173, 1, 1, 300000.00, 300000.00, 'AT_DESIGN_34305599.png', 1, 1, 1, 83, 'Regular Basic T-Shirt'),
(713, 100, 174, 50, 1, 850000.00, 850000.00, 'ASM_001_brown.png', 1, 3, 0, 1, 'Cuban Label Shirt'),
(714, 100, 174, 74, 1, 375000.00, 375000.00, 'AK_006_black.png', 1, 2, 0, 1, ' Windproof Flexible'),
(715, 100, 174, 72, 1, 315000.00, 315000.00, 'APL_006_black.png', 1, 2, 0, 1, 'Polo Alphabet Pattern'),
(717, 101, 175, 1, 1, 300000.00, 300000.00, 'AT_DESIGN_80372540.png', 1, 1, 1, 84, 'Regular Basic T-Shirt'),
(718, 101, 176, 76, 1, 399000.00, 399000.00, 'AK_008_blue.png', 1, 5, 0, 1, 'Trucker Denim Extended'),
(719, 101, 177, 65, 1, 300000.00, 300000.00, 'ASM_004_white.png', 1, 1, 0, 1, 'Regular Oxford Shirt'),
(720, 101, 178, 68, 1, 288000.00, 288000.00, 'ASM_007_blue.png', 1, 5, 0, 1, 'Logo Customize Vertical'),
(721, 102, 179, 53, 2, 490000.00, 980000.00, 'AK_001_white.png', 1, 1, 0, 1, 'Regular Surpass Jacket'),
(722, 102, 180, 74, 1, 375000.00, 375000.00, 'AK_006_black.png', 1, 2, 0, 1, ' Windproof Flexible'),
(723, 103, 181, 73, 1, 315000.00, 315000.00, 'APL_007_white.png', 1, 1, 0, 1, 'Polo Regular Horizonal'),
(724, 103, 182, 59, 1, 290000.00, 290000.00, 'AT_006_white.png', 1, 1, 0, 1, 'Regular Special T-Shirt'),
(727, 103, 183, 1, 1, 300000.00, 300000.00, 'AT_DESIGN_67008393.png', 1, 1, 1, 87, 'Regular Basic T-Shirt'),
(728, 104, 184, 75, 1, 399000.00, 399000.00, 'AK_007_yellow.png', 1, 10, 0, 1, 'Raglan Clock Color'),
(729, 104, 184, 72, 1, 315000.00, 315000.00, 'APL_006_black.png', 1, 2, 0, 1, 'Polo Alphabet Pattern'),
(730, 104, 184, 64, 1, 300000.00, 300000.00, 'ASM_003_brown.png', 1, 3, 0, 1, 'Cuban Floral Plain Shirt'),
(731, 104, 184, 1, 1, 250000.00, 250000.00, 'AT_001_white.png', 1, 1, 0, 1, 'Regular Basic T-Shirt'),
(732, 104, 185, 72, 1, 315000.00, 315000.00, 'APL_006_black.png', 1, 2, 0, 1, 'Polo Alphabet Pattern'),
(733, 104, 186, 72, 1, 315000.00, 315000.00, 'APL_006_black.png', 1, 2, 0, 1, 'Polo Alphabet Pattern'),
(734, 105, 187, 49, 1, 350000.00, 350000.00, 'AT_005_blue.png', 1, 5, 0, 1, 'Streetfood Pop Art T-Shirt'),
(735, 105, 188, 75, 1, 399000.00, 399000.00, 'AK_007_yellow.png', 1, 10, 0, 1, 'Raglan Clock Color'),
(736, 106, 189, 57, 1, 420000.00, 420000.00, 'AK_003_beige.png', 1, 8, 0, 1, 'Varsity Festive Vibe Jacket'),
(737, 106, 190, 57, 1, 420000.00, 420000.00, 'AK_003_beige.png', 1, 8, 0, 1, 'Varsity Festive Vibe Jacket'),
(738, 107, 191, 49, 1, 350000.00, 350000.00, 'AT_005_blue.png', 1, 5, 0, 1, 'Streetfood Pop Art T-Shirt'),
(739, 107, 192, 72, 1, 315000.00, 315000.00, 'APL_006_black.png', 1, 2, 0, 1, 'Polo Alphabet Pattern'),
(740, 107, 193, 74, 1, 375000.00, 375000.00, 'AK_006_black.png', 1, 2, 0, 1, ' Windproof Flexible'),
(741, 108, 194, 72, 1, 315000.00, 315000.00, 'APL_006_black.png', 1, 2, 0, 1, 'Polo Alphabet Pattern'),
(742, 108, 195, 59, 1, 290000.00, 290000.00, 'AT_006_white.png', 1, 1, 0, 1, 'Regular Special T-Shirt'),
(743, 108, 196, 46, 1, 320000.00, 320000.00, 'AT_003_white.png', 1, 1, 0, 1, 'Oversize V-Neck T-Shirt'),
(744, 109, 197, 45, 1, 290000.00, 290000.00, 'AT_002_white.png', 1, 1, 0, 1, 'Regular Come T-Shirt'),
(745, 109, 198, 75, 1, 399000.00, 399000.00, 'AK_007_yellow.png', 1, 10, 0, 1, 'Raglan Clock Color'),
(746, 110, 199, 65, 1, 300000.00, 300000.00, 'ASM_004_white.png', 1, 1, 0, 1, 'Regular Oxford Shirt'),
(747, 110, 200, 70, 1, 250000.00, 250000.00, 'APL_004_white.png', 1, 1, 0, 1, 'Polo Horional Green Stripes'),
(748, 110, 201, 62, 1, 450000.00, 450000.00, 'AK_005_blue.png', 1, 5, 0, 1, 'Varsity Rhythm Jacket'),
(749, 111, 202, 58, 1, 320000.00, 320000.00, 'ASM_002_brown.png', 1, 3, 0, 1, 'Cuban Abstract Shirt'),
(750, 111, 203, 53, 1, 490000.00, 490000.00, 'AK_001_white.png', 1, 1, 0, 1, 'Regular Surpass Jacket'),
(751, 112, 204, 50, 1, 850000.00, 850000.00, 'ASM_001_brown.png', 1, 3, 0, 1, 'Cuban Label Shirt'),
(752, 112, 205, 47, 1, 290000.00, 290000.00, 'AT_004_blue.png', 1, 5, 0, 1, 'Thun Regular Rhythm'),
(753, 113, 206, 46, 1, 320000.00, 320000.00, 'AT_003_white.png', 1, 1, 0, 1, 'Oversize V-Neck T-Shirt'),
(754, 113, 207, 45, 1, 290000.00, 290000.00, 'AT_002_white.png', 1, 1, 0, 1, 'Regular Come T-Shirt'),
(755, 113, 208, 1, 1, 250000.00, 250000.00, 'AT_001_white.png', 1, 1, 0, 1, 'Regular Basic T-Shirt'),
(756, 114, 209, 47, 1, 290000.00, 290000.00, 'AT_004_blue.png', 1, 5, 0, 1, 'Thun Regular Rhythm'),
(757, 114, 210, 71, 1, 315000.00, 315000.00, 'APL_005_black.png', 1, 2, 0, 1, 'Polo Milk Coffee Striped'),
(758, 114, 211, 65, 1, 300000.00, 300000.00, 'ASM_004_white.png', 1, 1, 0, 1, 'Regular Oxford Shirt'),
(759, 115, 212, 66, 1, 300000.00, 300000.00, 'ASM_005_white.png', 1, 1, 0, 1, 'Slimfit Button Down Shirt'),
(760, 115, 213, 1, 1, 250000.00, 250000.00, 'AT_001_white.png', 1, 1, 0, 1, 'Regular Basic T-Shirt'),
(761, 115, 214, 71, 1, 315000.00, 315000.00, 'APL_005_black.png', 1, 2, 0, 1, 'Polo Milk Coffee Striped'),
(762, 116, 215, 55, 1, 450000.00, 450000.00, 'AK_002_black.png', 1, 2, 0, 1, 'Colorblock Raglan Jacket'),
(763, 117, 216, 76, 1, 399000.00, 399000.00, 'AK_008_blue.png', 1, 5, 0, 1, 'Trucker Denim Extended'),
(764, 117, 217, 64, 1, 300000.00, 300000.00, 'ASM_003_brown.png', 1, 3, 0, 1, 'Cuban Floral Plain Shirt'),
(765, 118, 218, 61, 1, 270000.00, 270000.00, 'AT_007_white.png', 1, 1, 0, 1, 'Mono style T-Shirt'),
(766, 119, 219, 70, 1, 250000.00, 250000.00, 'APL_004_white.png', 1, 1, 0, 1, 'Polo Horional Green Stripes'),
(767, 120, 220, 74, 1, 375000.00, 375000.00, 'AK_006_black.png', 1, 2, 0, 1, ' Windproof Flexible'),
(768, 120, 221, 64, 1, 300000.00, 300000.00, 'ASM_003_brown.png', 1, 3, 0, 1, 'Cuban Floral Plain Shirt'),
(769, 104, 222, 73, 1, 315000.00, 315000.00, 'APL_007_white.png', 1, 1, 0, 1, 'Polo Regular Horizonal'),
(772, 104, 223, 46, 1, 320000.00, 320000.00, 'AT_003_white.png', 1, 1, 0, 1, 'Oversize V-Neck T-Shirt'),
(773, 104, 1, 1, 1, 300000.00, 300000.00, 'AT_DESIGN_59536545.png', 3, 1, 1, 89, 'Regular Basic T-Shirt'),
(774, 91, 225, 78, 1, 3150.00, 3150.00, 'designer-multilayer-ruffled-maroon-gown-with-floral-embellishments-for-girls-lagorii-kids-1.jpg', 1, 1, 0, 1, 'top'),
(775, 91, 226, 78, 1, 3150.00, 3150.00, 'designer-multilayer-ruffled-maroon-gown-with-floral-embellishments-for-girls-lagorii-kids-1.jpg', 1, 1, 0, 1, 'top'),
(776, 91, 227, 78, 1, 3150.00, 3150.00, 'designer-multilayer-ruffled-maroon-gown-with-floral-embellishments-for-girls-lagorii-kids-1.jpg', 1, 1, 0, 1, 'top'),
(777, 91, 228, 78, 1, 3150.00, 3150.00, 'designer-multilayer-ruffled-maroon-gown-with-floral-embellishments-for-girls-lagorii-kids-1.jpg', 1, 1, 0, 1, 'top'),
(778, 91, 229, 78, 1, 3150.00, 3150.00, 'designer-multilayer-ruffled-maroon-gown-with-floral-embellishments-for-girls-lagorii-kids-1.jpg', 1, 1, 0, 1, 'top'),
(782, 91, 231, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 9, 0, 1, NULL),
(783, 91, 232, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 9, 0, 1, NULL),
(784, 91, 233, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 9, 0, 1, NULL),
(785, 91, 234, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 9, 0, 1, NULL),
(786, 91, 235, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 9, 0, 1, NULL),
(787, 91, 236, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 9, 0, 1, NULL),
(788, 91, 237, 79, 1, 1145.00, 1145.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(789, 91, 238, 79, 1, 1145.00, 1145.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(790, 91, 239, 79, 1, 1145.00, 1145.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(791, 91, 241, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 9, 0, 1, NULL),
(792, 2, 1, 79, 1, 1145.00, 1145.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(794, 1, 243, 75, 1, 1.00, 1.00, 'AK_007_yellow.png', 1, 10, 0, 1, 'Raglan Clock Color'),
(795, 1, 244, 75, 1, 1.00, 1.00, 'AK_007_yellow.png', 1, 10, 0, 1, 'Raglan Clock Color'),
(796, 1, 245, 75, 1, 1.00, 1.00, 'AK_007_yellow.png', 1, 10, 0, 1, 'Raglan Clock Color'),
(797, 1, 246, 75, 1, 1.00, 1.00, 'AK_007_yellow.png', 1, 10, 0, 1, 'Raglan Clock Color'),
(798, 1, 247, 75, 1, 1.00, 1.00, 'AK_007_yellow.png', 1, 10, 0, 1, 'Raglan Clock Color'),
(799, 1, 248, 79, 1, 1145.00, 1145.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(800, 1, 251, 74, 1, 3750.00, 3750.00, 'AK_006_black.png', 1, 2, 0, 1, ' Windproof Flexible'),
(801, 1, 253, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 1, 0, 1, NULL),
(802, 1, 254, 76, 1, 3990.00, 3990.00, 'AK_008_blue.png', 1, 1, 0, 1, 'Trucker Denim Extended'),
(803, 1, 255, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 1, 0, 1, NULL),
(804, 1, 256, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 1, 0, 1, NULL),
(805, 1, 259, 79, 1, 1145.00, 1145.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 1, 0, 1, NULL),
(806, 1, 260, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 1, 0, 1, NULL),
(807, 1, 262, 76, 1, 3990.00, 3990.00, 'AK_008_blue.png', 1, 5, 0, 1, 'Trucker Denim Extended'),
(808, 1, 263, 79, 1, 1145.00, 1145.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(809, 1, 264, 77, 1, 3150.00, 3150.00, 'img1.webp', 1, 1, 0, 1, 'pant'),
(810, 1, 265, 79, 1, 1145.00, 1145.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 1, 0, 1, NULL),
(811, 1, 265, 75, 1, 1.00, 1.00, 'AK_007_yellow.png', 1, 1, 0, 1, 'Raglan Clock Color'),
(812, 1, 266, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 9, 0, 1, NULL),
(813, 1, 267, 79, 1, 1145.00, 1145.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(814, 1, 268, 79, 1, 1145.00, 1145.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(815, 1, 269, 78, 1, 3150.00, 3150.00, 'designer-multilayer-ruffled-maroon-gown-with-floral-embellishments-for-girls-lagorii-kids-1.jpg', 1, 1, 0, 1, 'top'),
(816, 1, 270, 80, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4 (1).webp', 1, 9, 0, 1, NULL),
(817, 1, 271, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 1, 0, 1, 'Grey Hakoba Co-ord Set'),
(818, 1, 271, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 1, 0, 1, 'Thread Embroidery Palazzo Set'),
(820, 1, 272, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, 'Grey Hakoba Co-ord Set'),
(821, 1, 273, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 1, 0, 1, 'Thread Embroidery Palazzo Set'),
(822, 1, 273, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 1, 0, 1, 'Grey Hakoba Co-ord Set'),
(823, 1, 273, 76, 1, 3990.00, 3990.00, 'AK_008_blue.png', 1, 1, 0, 1, 'Trucker Denim Extended'),
(824, 1, 273, 71, 1, 3150.00, 3150.00, 'APL_005_black.png', 1, 1, 0, 1, 'Polo Milk Coffee Striped'),
(825, 1, 278, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 1, 0, 1, 'Grey Hakoba Co-ord Set'),
(826, 1, 278, 77, 1, 3150.00, 3150.00, 'img1.webp', 1, 1, 0, 1, 'pant'),
(830, 1, 286, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(833, 1, 289, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(834, 1, 290, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(835, 1, 290, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 1, 0, 1, NULL),
(836, 1, 291, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(837, 1, 292, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(838, 1, 293, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(841, 1, 296, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(842, 1, 297, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(843, 1, 298, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 1, 0, 1, NULL),
(844, 1, 299, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(845, 1, 300, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(846, 1, 301, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(847, 1, 304, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(848, 1, 305, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(849, 1, 306, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(850, 1, 307, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(851, 1, 308, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(869, 0, 326, 76, 1, 3990.00, 3990.00, '', 1, 1, 0, 1, 'Trucker Denim Extended'),
(870, 0, 327, 49, 1, 3500.00, 3500.00, '', 1, 1, 0, 1, 'Streetfood Pop Art T-Shirt'),
(871, 0, 328, 49, 1, 3500.00, 3500.00, '', 1, 1, 0, 1, 'Streetfood Pop Art T-Shirt'),
(872, 0, 328, 74, 1, 3750.00, 3750.00, '', 1, 1, 0, 1, ' Windproof Flexible'),
(873, 0, 328, 83, 1, 2190.00, 2190.00, '', 1, 1, 0, 1, 'Thread Embroidery Palazzo Set'),
(874, 0, 328, 75, 1, 1.00, 1.00, '', 1, 1, 0, 1, 'Raglan Clock Color'),
(875, 0, 329, 82, 1, 3150.00, 3150.00, '', 1, 1, 0, 1, 'Grey Hakoba Co-ord Set'),
(876, 0, 330, 83, 1, 2190.00, 2190.00, '', 1, 1, 0, 1, 'Thread Embroidery Palazzo Set'),
(877, 1, 331, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(878, 1, 332, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(879, 1, 333, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(880, 1, 334, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(881, 1, 335, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(882, 1, 336, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(883, 1, 337, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(884, 1, 338, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(885, 1, 339, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(886, 1, 340, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(887, 1, 341, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(888, 1, 342, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(889, 1, 343, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(890, 1, 344, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(891, 1, 345, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(892, 1, 346, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(893, 1, 347, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(894, 1, 348, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(895, 1, 349, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23.webp', 1, 7, 0, 1, NULL),
(896, 1, 350, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3 (1).webp', 1, 8, 0, 1, NULL),
(898, 0, 351, 68, 1, 2880.00, 2880.00, '', 1, 1, 0, 1, 'Logo Customize Vertical'),
(899, 1, 352, 75, 1, 1.00, 1.00, 'AK_007_yellow.png', 1, 10, 0, 1, NULL),
(900, 1, 353, 75, 1, 1.00, 1.00, 'AK_007_yellow.png', 1, 10, 0, 1, NULL),
(901, 1, 354, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(902, 1, 355, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(903, 1, 356, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(904, 1, 357, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(905, 1, 358, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(906, 1, 359, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(907, 1, 360, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(908, 1, 361, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(909, 1, 362, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(910, 1, 363, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(911, 1, 364, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(912, 1, 365, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', 1, 7, 0, 1, NULL),
(914, 1, 366, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', 1, 7, 0, 1, NULL),
(915, 1, 367, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', 1, 7, 0, 1, NULL),
(916, 1, 368, 81, 1, 2900.00, 2900.00, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4__1_-removebg-preview.png', 1, 2, 0, 1, NULL),
(917, 1, 369, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', 1, 7, 0, 1, NULL),
(918, 1, 370, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(919, 1, 371, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', 1, 7, 0, 1, NULL),
(920, 1, 372, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', 1, 7, 0, 1, NULL),
(922, 1, 375, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(923, 1, 376, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(924, 1, 377, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(925, 1, 378, 75, 1, 1.00, 1.00, 'AK_007_yellow.png', 1, 10, 0, 1, NULL),
(926, 1, 379, 75, 1, 1.00, 1.00, 'AK_007_yellow.png', 1, 10, 0, 1, NULL),
(928, 1, 382, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(929, 0, 383, 81, 2, 2900.00, 5800.00, '', 1, 1, 0, 1, 'Elegant Yellow Hakoba'),
(930, 0, 384, 51, 1, 4400.00, 4400.00, '', 1, 1, 0, 1, 'Polo Nam Tay Ngắn'),
(931, 0, 385, 83, 1, 2190.00, 2190.00, '', 1, 1, 0, 1, 'Thread Embroidery Palazzo Set'),
(932, 1, 386, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(933, 1, 387, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(934, 1, 388, 82, 1, 3150.00, 3150.00, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', 1, 8, 0, 1, NULL),
(935, 0, 389, 65, 1, 3000.00, 3000.00, '', 1, 1, 0, 1, 'Regular Oxford Shirt'),
(936, 1, 391, 77, 1, 3150.00, 3150.00, 'img3-removebg-preview.png', 1, 2, 0, 1, NULL),
(937, 1, 392, 77, 1, 3150.00, 3150.00, 'img3-removebg-preview.png', 1, 2, 0, 1, NULL),
(938, 1, 393, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', 1, 7, 0, 1, NULL),
(939, 1, 394, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', 1, 7, 0, 1, NULL),
(940, 1, 395, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', 1, 7, 0, 1, NULL),
(942, 1, 396, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', 1, 7, 0, 1, NULL),
(943, 1, 397, 83, 1, 2190.00, 2190.00, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', 1, 7, 0, 1, NULL),
(944, 0, 398, 47, 1, 2900.00, 2900.00, '', 1, 1, 0, 1, 'Thun Regular Rhythm'),
(945, 0, 399, 83, 1, 2190.00, 2190.00, '', 1, 1, 0, 1, 'Thread Embroidery Palazzo Set'),
(946, 1, 400, 77, 1, 3150.00, 3150.00, 'img3-removebg-preview.png', 1, 2, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stt` int(11) NOT NULL DEFAULT 0,
  `sethome` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `stt`, `sethome`) VALUES
(11, 'T-shirt', 1, 1),
(12, 'Polo shirt', 2, 1),
(13, 'Jacket', 3, 1),
(14, 'Shirt', 4, 1),
(16, 'Frock', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `ma_color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`, `ma_color`) VALUES
(1, 'Trắng', '#ffffff'),
(2, 'Đen', '#000000'),
(3, 'Nâu', '#5C3F2E'),
(4, 'Lục', '#014A36'),
(5, 'Lam', '#405474'),
(6, 'Tím', '#AAAFD8'),
(7, 'Hồng', '#DEB3B4'),
(8, 'Be', '#E6D2A6'),
(9, 'Cam', '#CB6747'),
(10, 'Vàng', '#FFAC24');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `thoigian` date NOT NULL,
  `noidung` text NOT NULL,
  `rate` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_product`, `id_user`, `thoigian`, `noidung`, `rate`) VALUES
(37, 69, 91, '2023-12-07', 'Áo xấu quắc', 2),
(38, 71, 91, '2023-12-07', 'Tạm được', 2),
(39, 64, 92, '2023-12-07', 'Áo mà bày đặt bông với chả hoa', 1),
(40, 76, 92, '2023-12-07', 'Này bán đắt quá, Choose mua Femalea đâu, hàng gì mà xấu quắc', 2),
(41, 65, 92, '2023-12-07', 'Áo đẹp', 4),
(42, 67, 92, '2023-12-07', 'Áo xinh nha', 2),
(43, 75, 92, '2023-12-07', 'Áo khoác mặc vào nóng', 3),
(44, 74, 93, '2023-12-07', 'Áo đẹp xuất sắc', 4),
(45, 72, 93, '2023-12-07', 'Áo nhìn sang', 0),
(46, 70, 93, '2023-12-07', 'Áo đẹp, phù hợp để đi chơi', 0),
(47, 69, 94, '2023-12-07', 'Chời ơi áo dì mà đẹp khùng đẹp điên', 5),
(48, 76, 94, '2023-12-07', 'Áo này mặc vô đi bay đi lắc xịn nha', 4),
(49, 49, 95, '2023-12-07', 'Nhìn mà muốn ăn luôn cái áo', 4),
(50, 58, 95, '2023-12-07', 'Áo nhìn màu nâu quá', 3),
(51, 50, 96, '2023-12-07', 'Áo này mặc hơi nóng nhưng đẹp', 4),
(52, 1, 96, '2023-12-07', 'Áo trắng mà mắc ác', 2),
(53, 47, 97, '2023-12-07', 'Màu xanh, Choose thích', 1),
(54, 46, 97, '2023-12-07', 'Áo đẹp nha, mua nha', 5),
(55, 45, 97, '2023-12-07', 'Áo này chắc đẹp mua test nè', 4),
(56, 75, 98, '2023-12-07', 'thích thích thích', 5),
(57, 60, 98, '2023-12-07', 'đẹp đẹp đẹp', 4),
(58, 71, 99, '2023-12-07', 'Mua về mặc thử ', 5),
(59, 76, 99, '2023-12-07', 'Áo gì mà Choose có tay áoo', 0),
(60, 69, 100, '2023-12-07', 'Áo vậy mà Dĩm nó khen, ghét vô cmt chê', 1),
(61, 73, 101, '2023-12-07', 'áo đẹp', 4),
(62, 51, 101, '2023-12-07', 'áo này đẹp luôn ', 5),
(63, 76, 101, '2023-12-07', 'Áo vải hong đẹp gì cả', 2),
(64, 68, 101, '2023-12-07', 'Áo sơ mi vải đẹp, Choose có gì để chê', 5),
(65, 62, 102, '2023-12-07', 'Tui thích style dạng năng động thế này', 4),
(66, 67, 102, '2023-12-07', 'tạm ổn', 4),
(67, 52, 103, '2023-12-07', 'Áo đẹp lắm luôn nhaaaa.!!', 4),
(68, 59, 103, '2023-12-07', 'áo này form đẹp', 0),
(69, 64, 104, '2023-12-07', 'Áo đẹp áo đẹp', 4),
(70, 75, 104, '2023-12-07', 'Áo này đẹp', 0),
(71, 74, 104, '2023-12-07', 'Áo này nóng', 2),
(72, 64, 104, '2023-12-07', 'Áo này màu mè', 0),
(73, 1, 104, '2023-12-07', 'Áo trắng dễ chơi dễ trúng thưởng', 0),
(74, 73, 104, '2023-12-07', 'Áo xấu vậy mà khen', 1),
(75, 72, 104, '2023-12-07', 'Áo đẹp cực', 0),
(76, 61, 104, '2023-12-07', 'Áo đẹp 10đ Choose có nhưng', 5),
(77, 49, 105, '2023-12-07', 'Đồ nhìn ngon thiệt', 0),
(78, 47, 105, '2023-12-07', 'Áo hơi bình thường', 3),
(79, 46, 105, '2023-12-07', 'Áo đẹp quá, sẽ mua tiếp', 0),
(80, 45, 105, '2023-12-07', 'Áo tạm tạm', 3),
(81, 57, 106, '2023-12-07', 'Áo vừa rẻ, vừa đẹp', 5),
(82, 1, 106, '2023-12-07', '셔츠가 너무 예쁜데 다들 혹평을 받네요', 5),
(83, 67, 106, '2023-12-07', '셔츠가 너무 예뻐요', 4),
(84, 52, 106, '2023-12-07', '셔츠가 너무 예뻐요', 5),
(85, 47, 107, '2023-12-07', 'Đẹp', 0),
(86, 72, 107, '2023-12-07', 'Áo này đẹp lắm', 4),
(87, 64, 107, '2023-12-07', 'Áo đẹp thật', 0),
(88, 75, 107, '2023-12-07', 'Áo đẹp như này chắc làm đại diện thương hiệu luôn quá', 5),
(89, 74, 107, '2023-12-07', 'Check email, add mình với', 5),
(90, 72, 108, '2023-12-07', 'Áo này nhìn cũng bình thường vậy mà mtp khen hơi lố', 2),
(91, 75, 108, '2023-12-07', 'mtp mua áo nào, tôi Choose mua áo đó', 1),
(92, 74, 108, '2023-12-07', 'Mua về mới biết đụng hàng mtp', 3),
(93, 76, 108, '2023-12-07', 'Áo đẹp', 0),
(94, 73, 108, '2023-12-07', 'Áo đẹp nhaa', 4),
(95, 61, 108, '2023-12-07', 'Áo đẹp vãiii', 4),
(96, 59, 108, '2023-12-07', '10đ', 5),
(97, 47, 108, '2023-12-07', 'Định khen, thấy mtp cmt', 2),
(98, 46, 108, '2023-12-07', 'Áo đẹp quá', 4),
(99, 45, 109, '2023-12-07', 'Áo đẹp', 0),
(100, 68, 109, '2023-12-07', 'đẹp đẹp đẹp đẹp', 4),
(101, 66, 109, '2023-12-07', 'Áo này dễ mặc', 4),
(102, 75, 109, '2023-12-07', 'Thấy hot mua thử', 4),
(103, 65, 110, '2023-12-07', '셔츠가 너무 예뻐요', 4),
(104, 70, 110, '2023-12-07', '셔츠가 너무 예뻐요', 4),
(105, 63, 110, '2023-12-07', '셔츠가 너무 예뻐요', 4),
(106, 62, 110, '2023-12-07', '셔츠가 너무 예뻐요', 3),
(107, 58, 111, '2023-12-07', '못생긴', 2),
(108, 57, 111, '2023-12-07', '못생긴', 1),
(109, 55, 111, '2023-12-07', '셔츠가 한국적이네요', 4),
(110, 51, 111, '2023-12-07', '예쁜', 3),
(111, 50, 112, '2023-12-07', 'Áo đẹp, giá cả học sinh tiểu học', 5),
(112, 49, 112, '2023-12-07', 'Nhìn thèm ghê', 3),
(113, 47, 112, '2023-12-07', 'Cái áo chữ D', 5),
(114, 46, 113, '2023-12-07', 'Áo bình thường', 3),
(115, 45, 113, '2023-12-07', 'Cũng được', 3),
(116, 1, 113, '2023-12-07', 'Áo đơn giản dễ mặc', 4),
(117, 66, 114, '2023-12-09', 'sản phẩm này đẹp', 0),
(118, 66, 114, '2023-12-09', 'sản phẩm okk', 4),
(119, 65, 114, '2023-12-09', 'Áo ok', 4),
(120, 66, 115, '2023-12-09', 'Sản phẩm giống như trên hình', 4),
(121, 58, 115, '2023-12-09', 'Áo đẹp', 4),
(122, 1, 115, '2023-12-09', 'Đơn giản', 2),
(123, 70, 116, '2023-12-09', 'Áo được', 3),
(124, 76, 117, '2023-12-09', 'Áo okkkk', 4),
(125, 72, 117, '2023-12-09', 'Áo xấu', 1),
(126, 64, 117, '2023-12-09', 'Áo xấuuu', 1),
(127, 61, 118, '2023-12-09', 'Áo đẹp vừa vừa', 3),
(128, 72, 119, '2023-12-09', 'Áo đẹp', 4),
(129, 47, 120, '2023-12-09', 'Đồ gì mà xấu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dadung_voucher`
--

CREATE TABLE `dadung_voucher` (
  `id` int(11) NOT NULL,
  `id_voucher` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dadung_voucher`
--

INSERT INTO `dadung_voucher` (`id`, `id_voucher`, `id_user`) VALUES
(34, 2, 91),
(35, 2, 91),
(36, 3, 91),
(37, 2, 94),
(38, 2, 95),
(39, 3, 96),
(40, 3, 97),
(41, 2, 98),
(42, 2, 104),
(43, 2, 104);

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `img_front` varchar(200) NOT NULL,
  `img_back` varchar(200) NOT NULL,
  `price` double(10,2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`id`, `id_color`, `id_size`, `img_front`, `img_back`, `price`, `name`, `id_user`) VALUES
(1, 1, 4, '1', '1', 1.00, '1', 1),
(67, 1, 1, 'AT_DESIGN_05119196.png', 'AT_DESIGN_91059097.png', 200000.00, 'Áo thun tự thiết kế', 91),
(68, 1, 1, 'AT_DESIGN_44296425.png', 'AT_DESIGN_83480126.png', 300000.00, 'Áo thun tự thiết kế', 91),
(69, 1, 1, 'AT_DESIGN_27161754.png', 'AT_DESIGN_88431544.png', 300000.00, 'Áo thun tự thiết kế', 92),
(70, 1, 1, 'AT_DESIGN_20480023.png', 'AT_DESIGN_58569889.png', 300000.00, 'Áo thun tự thiết kế', 92),
(71, 8, 1, 'AT_DESIGN_33670188.png', 'AT_DESIGN_40893448.png', 300000.00, 'Áo thun tự thiết kế', 92),
(72, 8, 1, 'AT_DESIGN_26456666.png', 'AT_DESIGN_95127976.png', 300000.00, 'Áo thun tự thiết kế', 92),
(73, 1, 1, 'AT_DESIGN_26470811.png', 'AT_DESIGN_37802245.png', 300000.00, 'Áo thun tự thiết kế', 92),
(74, 1, 1, 'AT_DESIGN_87616594.png', 'AT_DESIGN_03258980.png', 300000.00, 'Áo thun tự thiết kế', 93),
(75, 1, 1, 'AT_DESIGN_59742211.png', 'AT_DESIGN_52022110.png', 300000.00, 'Áo thun tự thiết kế', 93),
(76, 1, 1, 'AT_DESIGN_03937412.png', 'AT_DESIGN_91207380.png', 300000.00, 'Áo thun tự thiết kế', 94),
(77, 1, 1, 'AT_DESIGN_60816077.png', 'AT_DESIGN_70526419.png', 300000.00, 'Áo thun tự thiết kế', 94),
(78, 1, 1, 'AT_DESIGN_74504028.png', 'AT_DESIGN_06989583.png', 200000.00, 'Áo thun tự thiết kế', 95),
(79, 1, 1, 'AT_DESIGN_14856513.png', 'AT_DESIGN_30806810.png', 300000.00, 'Áo thun tự thiết kế', 95),
(80, 1, 1, 'AT_DESIGN_49503286.png', 'AT_DESIGN_21564919.png', 200000.00, 'Áo thun tự thiết kế', 96),
(81, 1, 1, 'AT_DESIGN_03019319.png', 'AT_DESIGN_93093004.png', 300000.00, 'Áo thun tự thiết kế', 96),
(82, 1, 1, 'AT_DESIGN_73288057.png', 'AT_DESIGN_45168188.png', 300000.00, 'Áo thun tự thiết kế', 97),
(83, 1, 1, 'AT_DESIGN_34305599.png', 'AT_DESIGN_16677962.png', 300000.00, 'Áo thun tự thiết kế', 99),
(84, 1, 1, 'AT_DESIGN_80372540.png', 'AT_DESIGN_90358077.png', 300000.00, 'Áo thun tự thiết kế', 101),
(85, 1, 1, 'AT_DESIGN_51174406.png', 'AT_DESIGN_58687242.png', 200000.00, 'Áo thun tự thiết kế', 103),
(86, 1, 1, 'AT_DESIGN_53025504.png', 'AT_DESIGN_68460968.png', 300000.00, 'Áo thun tự thiết kế', 103),
(87, 1, 1, 'AT_DESIGN_67008393.png', 'AT_DESIGN_64178294.png', 300000.00, 'Áo thun tự thiết kế', 103),
(88, 1, 1, 'AT_DESIGN_33277609.png', 'AT_DESIGN_08248325.png', 200000.00, 'Áo thun tự thiết kế', 104),
(89, 3, 1, 'AT_DESIGN_59536545.png', 'AT_DESIGN_35913389.png', 300000.00, 'Áo thun tự thiết kế', 104);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `ma_donhang` varchar(50) DEFAULT NULL,
  `ngaylap` date NOT NULL,
  `trangthai` varchar(50) NOT NULL,
  `tongtien` double(10,2) NOT NULL,
  `tendat` varchar(50) NOT NULL,
  `tennhan` varchar(50) DEFAULT NULL,
  `emaildat` varchar(50) NOT NULL,
  `emailnhan` varchar(50) DEFAULT NULL,
  `sdtdat` varchar(20) NOT NULL,
  `sdtnhan` varchar(20) DEFAULT NULL,
  `diachidat` varchar(100) NOT NULL,
  `diachinhan` varchar(100) DEFAULT NULL,
  `ptthanhtoan` varchar(50) NOT NULL,
  `giaohangnhanh` tinyint(1) NOT NULL DEFAULT 0,
  `id_voucher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `iduser`, `ma_donhang`, `ngaylap`, `trangthai`, `tongtien`, `tendat`, `tennhan`, `emaildat`, `emailnhan`, `sdtdat`, `sdtnhan`, `diachidat`, `diachinhan`, `ptthanhtoan`, `giaohangnhanh`, `id_voucher`) VALUES
(1, 1, 'ADMIN_0001', '2023-01-23', 'Unpaid', 1.00, '1', '', '1', '', '1', NULL, '1', NULL, '1', 0, 1),
(147, 91, 'ZS_w0oP5Sn', '2023-01-07', 'Unpaid', 718200.00, 'Lê Minh Tú', '', 'lmt@gmail.com', '', '0123456789', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 2),
(148, 91, 'ZS_jNfkD8k', '2023-01-07', 'Unpaid', 718200.00, 'Lê Minh Tú', '', 'lmt@gmail.com', '', '0123456789', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 2),
(149, 91, 'ZS_dWRNWKj', '2023-02-07', 'Unpaid', 315000.00, 'Lê Minh Tú', '', 'leminhtu10062004@gmail.com', '', '0123456789', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(150, 91, 'ZS_a6bnlqv', '2023-02-07', 'Unpaid', 285000.00, 'Lê Minh Tú', '', 'leminhtu10062004@gmail.com', '', '0123456789', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 3),
(151, 91, 'ZS_X9wJxYk', '2023-03-07', 'Unpaid', 315000.00, 'Lê Minh Tú', '', 'leminhtu10062004@gmail.com', '', '0123456789', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(152, 91, 'ZS_UJynd2X', '2023-03-07', 'Unpaid', 300000.00, 'Lê Minh Tú', '', 'leminhtu10062004@gmail.com', '', '0123456789', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(153, 92, 'ZS_B8DNLlB', '2023-04-07', 'Unpaid', 250000.00, 'Tú Minh Lê', '', 'tuminhle1006@gmail.com', '', '0123456788', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(154, 92, 'ZS_7P1u5ad', '2023-04-07', 'Unpaid', 300000.00, 'Tú Minh Lê', '', 'tuminhle1006@gmail.com', '', '0123456788', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(155, 92, 'ZS_RedwIvF', '2023-05-07', 'Unpaid', 300000.00, 'Tú Minh Lê', '', 'tuminhle1006@gmail.com', '', '0123456788', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(156, 92, 'ZS_xq2byro', '2023-05-07', 'Unpaid', 399000.00, 'Tú Minh Lê', '', 'tuminhle1006@gmail.com', '', '0123456788', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(157, 93, 'ZS_Dlf5TTw', '2023-06-07', 'Unpaid', 288000.00, 'Minh Tú Lê', '', 'tuminhle1006@gmail.com', '', '0123456787', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(158, 93, 'ZS_6XYvaGF', '2023-06-07', 'Unpaid', 300000.00, 'Minh Tú Lê', '', 'tuminhle1006@gmail.com', '', '0123456787', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(159, 93, 'ZS_8zEKmZ0', '2023-07-07', 'Unpaid', 315000.00, 'Minh Tú Lê', '', 'tuminhle1006@gmail.com', '', '0123456787', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(160, 94, 'ZS_ajnLlur', '2023-07-07', 'Unpaid', 300000.00, 'Bùi Dương Dĩm', '', 'jodd23855@gmail.com', '', '0123456789', '', 'Bình Phước', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(161, 94, 'ZS_iv7BfKq', '2023-08-07', 'Unpaid', 300000.00, 'Bùi Dương Dĩm', '', 'jodd23855@gmail.com', '', '0123456789', '', 'Bình Phước', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(162, 94, 'ZS_0j9fwLW', '2023-08-07', 'Unpaid', 399000.00, 'Bùi Dương Dĩm', '', 'jodd23855@gmail.com', '', '0123456789', '', 'Bình Phước', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(163, 94, 'ZS_QlI4oCH', '2023-09-07', 'Unpaid', 1012500.00, 'Bùi Dương Dĩm', '', 'jodd23855@gmail.com', '', '0123456789', '', 'Bình Phước', '', 'Thanh toán trực tiếp khi giao hàng', 0, 2),
(164, 95, 'ZS_uwKwxgm', '2023-09-07', 'Unpaid', 1431000.00, 'Dương Dĩm Bùi', '', 'jodd23855@gmail.com', '', '0123456786', '', 'Bình Phước 1', '', 'Thanh toán trực tiếp khi giao hàng', 0, 2),
(165, 95, 'ZS_VPx0iaN', '2023-10-07', 'Unpaid', 300000.00, 'Dương Dĩm Bùi', '', 'jodd23855@gmail.com', '', '0123456786', '', 'Bình Phước 1', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(166, 95, 'ZS_jDziH8S', '2023-10-07', 'Unpaid', 959000.00, 'Dương Dĩm Bùi', '', 'jodd23855@gmail.com', '', '0123456786', '', 'Bình Phước 1', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(167, 96, 'ZS_uqAW9Fg', '2023-11-07', 'Unpaid', 1227400.00, 'Dĩm Bùi Dương', '', 'jodd23855@gmail.com', '', '0123456785', '', 'Bình Phước 2', '', 'Thanh toán bằng Thẻ quốc tế / Thẻ nội địa', 0, 3),
(168, 96, 'ZS_dI4bRUP', '2023-11-07', 'Unpaid', 300000.00, 'Dĩm Bùi Dương', '', 'jodd23855@gmail.com', '', '0123456785', '', 'Bình Phước 2', '', 'Thanh toán bằng Thẻ quốc tế / Thẻ nội địa', 0, 1),
(169, 97, 'ZS_j7zxMth', '2023-12-07', 'Unpaid', 509200.00, 'Nguyễn Hoàng Thông', '', 'thong@gmail.com', '', '0123456784', '', 'Vĩnh Long, Long An', '', 'Thanh toán trực tiếp khi giao hàng', 0, 3),
(170, 97, 'ZS_enE7gcy', '2023-12-07', 'Unpaid', 300000.00, 'Nguyễn Hoàng Thông', '', 'thong@gmail.com', '', '0123456784', '', 'Vĩnh Long, Long An', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(171, 98, 'ZS_VX8Kekp', '2023-01-07', 'Unpaid', 994500.00, 'Hoàng Thông', '', 'thong@gmail.com', '', '0123456783', '', 'Vĩnh Long, Long An', '', 'Thanh toán trực tiếp khi giao hàng', 0, 2),
(172, 99, 'ZS_uL6Waqp', '2023-01-07', 'Unpaid', 669000.00, 'Nguyễn Thanh Toàn', '', 'toan@gmail.com', '', '0123456783', '', 'Miền Nam', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(173, 99, 'ZS_sRLY0Wo', '2023-02-07', 'Unpaid', 300000.00, 'Nguyễn Thanh Toàn', '', 'toan@gmail.com', '', '0123456783', '', 'Miền Nam', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(174, 100, 'ZS_EOSVjvn', '2023-02-07', 'Unpaid', 1540000.00, 'Võ Hoàng Quý', '', 'quy@gmail.com', '', '0123456782', '', 'Miền Nam', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(175, 101, 'ZS_9IYnxo0', '2023-03-07', 'Unpaid', 300000.00, 'Lê Thị Mỹ Hồng', '', 'hongltmps28690@fpt.edu.vn', '', '0123456780', '', 'Sa Đéc', '', 'Thanh toán bằng ví MoMo', 0, 1),
(176, 101, 'ZS_W9xPawi', '2023-03-07', 'Unpaid', 399000.00, 'Lê Thị Mỹ Hồng', '', 'hongltmps28690@fpt.edu.vn', '', '0123456780', '', 'Sa Đéc', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(177, 101, 'ZS_oWTHF3c', '2023-04-07', 'Unpaid', 300000.00, 'Lê Thị Mỹ Hồng', '', 'hongltmps28690@fpt.edu.vn', '', '0123456780', '', 'Sa Đéc', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(178, 101, 'ZS_fXDKNZG', '2023-04-07', 'Unpaid', 288000.00, 'Lê Thị Mỹ Hồng', '', 'hongltmps28690@fpt.edu.vn', '', '0123456780', '', 'Sa Đéc', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(179, 102, 'ZS_b4HV6bS', '2023-05-07', 'Unpaid', 980000.00, 'Phạm Ngọc Lang', '', 'lagdz.1646@gmail.com', '', '0123456779', '', 'Quảng Ngãi', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(180, 102, 'ZS_wkWlebe', '2023-05-07', 'Unpaid', 375000.00, 'Phạm Ngọc Lang', '', 'lagdz.1646@gmail.com', '', '0123456779', '', 'Quảng Ngãi', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(181, 103, 'ZS_wJID5NZ', '2023-06-07', 'Unpaid', 315000.00, 'Lê Thị Mỹ Hường', '', 'myhong11a32004@gmail.com', '', '0704838199', '', 'Phùng Khắc Khoan', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(182, 103, 'ZS_zkX0N5P', '2023-06-07', 'Unpaid', 290000.00, 'Lê Thị Mỹ Hường', '', 'myhong11a32004@gmail.com', '', '0704838199', '', 'Phùng Khắc Khoan', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(183, 103, 'ZS_HcOB1Sz', '2023-07-07', 'Unpaid', 300000.00, 'Lê Thị Mỹ Hường', '', 'myhong11a32004@gmail.com', '', '0704838199', '', 'Phùng Khắc Khoan', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(184, 104, 'ZS_kFoKQc8', '2023-07-07', 'Unpaid', 1264000.00, 'Đỗ Tuấn Kiệt', '', 'hoa48488474773@gmail.com', '', '0123456778', '', 'Bến Tre', '', 'Thanh toán bằng Thẻ quốc tế / Thẻ nội địa', 0, 1),
(185, 104, 'ZS_q7lXPSY', '2023-08-07', 'Unpaid', 315000.00, 'Đỗ Tuấn Kiệt', '', 'hoa48488474773@gmail.com', '', '0123456778', '', 'Bến Tre', '', 'Thanh toán bằng Thẻ quốc tế / Thẻ nội địa', 0, 1),
(186, 104, 'ZS_I4jmhVR', '2023-08-07', 'Unpaid', 315000.00, 'Đỗ Tuấn Kiệt', '', 'hoa48488474773@gmail.com', '', '0123456778', '', 'Bến Tre', '', 'Thanh toán bằng Thẻ quốc tế / Thẻ nội địa', 0, 1),
(187, 105, 'ZS_wlxE2m5', '2023-09-07', 'Unpaid', 350000.00, 'Trần Anh Toàn', '', 'toan21420@gmail.com', '', '0123456775', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(188, 105, 'ZS_fJzeooF', '2023-09-07', 'Unpaid', 399000.00, 'Trần Anh Toàn', '', 'toan21420@gmail.com', '', '0123456775', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(189, 106, 'ZS_DfeoJPY', '2023-10-07', 'Unpaid', 420000.00, 'VVV', '', 'vbts@gmail.com', '', '0123456776', '', 'Nước ngoài', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(190, 106, 'ZS_pfm92se', '2023-10-07', 'Unpaid', 420000.00, 'VVV', '', 'vbts@gmail.com', '', '0123456776', '', 'Nước ngoài', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(191, 107, 'ZS_Eoxh9B8', '2023-11-07', 'Unpaid', 350000.00, 'Nguyễn Thanh Tùng', '', 'sontungmtp@gmail.com', '', '0123456774', '', 'Thái Bình', '', 'Thanh toán bằng Thẻ quốc tế / Thẻ nội địa', 0, 1),
(192, 107, 'ZS_RtqUfsW', '2023-11-07', 'Unpaid', 315000.00, 'Nguyễn Thanh Tùng', '', 'sontungmtp@gmail.com', '', '0123456774', '', 'Thái Bình', '', 'Thanh toán bằng Thẻ quốc tế / Thẻ nội địa', 0, 1),
(193, 107, 'ZS_PeOCU41', '2023-05-07', 'Unpaid', 375000.00, 'Nguyễn Thanh Tùng', '', 'sontungmtp@gmail.com', '', '0123456774', '', 'Thái Bình', '', 'Thanh toán bằng Thẻ quốc tế / Thẻ nội địa', 0, 1),
(194, 108, 'ZS_Czl76Mg', '2023-07-07', 'Unpaid', 315000.00, 'Trịnh Trần Phương Tuấn', '', 'j97@gmail.com', '', '0123456773', '', 'Miền Tây', '', 'Thanh toán bằng ví MoMo', 0, 1),
(195, 108, 'ZS_cgYmTT0', '2023-04-07', 'Unpaid', 290000.00, 'Trịnh Trần Phương Tuấn', '', 'j97@gmail.com', '', '0123456773', '', 'Miền Tây', '', 'Thanh toán bằng ví MoMo', 0, 1),
(196, 108, 'ZS_clgrO4s', '2023-08-07', 'Unpaid', 320000.00, 'Trịnh Trần Phương Tuấn', '', 'j97@gmail.com', '', '0123456773', '', 'Miền Tây', '', 'Thanh toán bằng ví MoMo', 0, 1),
(197, 109, 'ZS_hjEOwMa', '2023-08-07', 'Unpaid', 290000.00, 'Phan Thị Mỹ Tâm', '', 'mytam@gmail.com', '', '0123456772', '', 'Miền Nam', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(198, 109, 'ZS_7RbzWMg', '2023-10-07', 'Unpaid', 399000.00, 'Phan Thị Mỹ Tâm', '', 'mytam@gmail.com', '', '0123456772', '', 'Miền Nam', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(199, 110, 'ZS_Z89R7GL', '2023-10-07', 'Unpaid', 300000.00, 'naruto', '', 'naruto@gmail.com', '', '0123456771', '', 'Thế giới cartoon', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(200, 110, 'ZS_1zSWZVG', '2023-11-07', 'Unpaid', 250000.00, 'naruto', '', 'naruto@gmail.com', '', '0123456771', '', 'Thế giới cartoon', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(201, 110, 'ZS_0ROiO9j', '2023-11-07', 'Unpaid', 450000.00, 'naruto', '', 'naruto@gmail.com', '', '0123456771', '', 'Thế giới cartoon', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(202, 111, 'ZS_6F7FZeM', '2023-01-07', 'Unpaid', 320000.00, 'sasuke', '', 'sasuke@gmail.com', '', '0123456770', '', 'naa', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(203, 111, 'ZS_ILgKj4b', '2023-01-07', 'Unpaid', 490000.00, 'sasuke', '', 'sasuke@gmail.com', '', '0123456770', '', 'naa', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(204, 112, 'ZS_nkeeGKV', '2023-02-07', 'Unpaid', 850000.00, 'doraemon', '', 'doraemon@gmail.com', '', '0123456699', '', 'Nước ngoài', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(205, 112, 'ZS_IlSx9we', '2023-02-07', 'Unpaid', 290000.00, 'doraemon', '', 'doraemon@gmail.com', '', '0123456699', '', 'Nước ngoài', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(206, 113, 'ZS_Jv47tXR', '2023-03-07', 'Unpaid', 320000.00, 'nobita', '', 'nobita@gmail.com', '', '0123456768', '', 'Nước ngoài', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(207, 113, 'ZS_omW1KoO', '2023-03-07', 'Unpaid', 290000.00, 'nobita', '', 'nobita@gmail.com', '', '0123456768', '', 'Nước ngoài', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(208, 113, 'ZS_ZXN70bU', '2023-04-07', 'Unpaid', 250000.00, 'nobita', '', 'nobita@gmail.com', '', '0123456768', '', 'Nước ngoài', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(209, 114, 'ZS_R4Zv301', '2023-04-09', 'Unpaid', 290000.00, 'Trần Anh Toàn', '', 'toan21420@gmail.com', '', '0123456759', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(210, 114, 'ZS_WQac7zr', '2023-06-09', 'Unpaid', 315000.00, 'Trần Anh Toàn', '', 'toan21420@gmail.com', '', '0123456759', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(211, 114, 'ZS_NLW6TEQ', '2023-06-09', 'Unpaid', 300000.00, 'Trần Anh Toàn', '', 'toan21420@gmail.com', '', '0123456759', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(212, 115, 'ZS_8kPpe7u', '2023-08-09', 'Unpaid', 300000.00, 'Đỗ Tuấn Kiệt', '', 'hoa48488474773@gmail.com', '', '0123456711', '', 'Bến Tre', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(213, 115, 'ZS_gYNcNOc', '2023-08-09', 'Unpaid', 250000.00, 'Đỗ Tuấn Kiệt', '', 'hoa48488474773@gmail.com', '', '0123456711', '', 'Bến Tre', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(214, 115, 'ZS_uMOFCia', '2023-06-09', 'Unpaid', 315000.00, 'Đỗ Tuấn Kiệt', '', 'hoa48488474773@gmail.com', '', '0123456711', '', 'Bến Tre', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(215, 116, 'ZS_thmrJ5q', '2023-03-09', 'Unpaid', 450000.00, 'Kiệt Đỗ', '', 'hoa48488474773@gmail.com', '', '9876534256', '', 'Bến Tre', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(216, 117, 'ZS_uwZYpAu', '2023-03-09', 'Unpaid', 399000.00, 'mỹ pink', '', 'hongltmps28690@fpt.edu.vn', '', '8796543897', '', 'Miền Nam', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(217, 117, 'ZS_sFWeYnm', '2023-04-09', 'Unpaid', 300000.00, 'mỹ pink', '', 'hongltmps28690@fpt.edu.vn', '', '8796543897', '', 'Miền Nam', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(218, 118, 'ZS_5POEpRD', '2023-04-09', 'Unpaid', 270000.00, 'Hồng', '', 'hongltmps28690@fpt.edu.vn', '', '7648397650', '', 'Miền Nam', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(219, 119, 'ZS_e2UnauJ', '2023-12-09', 'Unpaid', 250000.00, 'Tú', '', 'lmt@gmail.com', '', '0987657852', '', 'TPHCM', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(220, 120, 'ZS_c5qmvTP', '2023-12-09', 'Unpaid', 375000.00, 'Cao Văn Quí', '', 'qui@gmail.com', '', '6758493764', '', 'Việt Nam', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(221, 120, 'ZS_6firuTx', '2023-11-09', 'Unpaid', 300000.00, 'Cao Văn Quí', '', 'qui@gmail.com', '', '6758493764', '', 'Việt Nam', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(222, 104, 'ZS_rJbPHKP', '2023-11-10', 'Unpaid', 315000.00, 'Đỗ Tuấn Kiệt', '', 'hoa48488474773@gmail.com', '', '0123456778', '', 'Bến Tre', '', 'Thanh toán trực tiếp khi giao hàng', 0, 1),
(223, 104, 'ZS_sDJLMJF', '2023-12-10', 'Unpaid', 288000.00, 'Đỗ Tuấn Kiệt', 'Sơn', 'hoa48488474773@gmail.com', 'son@gmail.com', '0123456778', '1235647895', 'Bến Tre', 'Tân Trung', 'Thanh toán bằng Thẻ quốc tế / Thẻ nội địa', 1, 2),
(224, 91, 'ZS_UGkJ1RlI', '2025-08-22', 'Unpaid', 3150.00, 'sanjeev', '', 'kmsanjeev322@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(225, 91, 'ZS_Co4vzniv', '2025-08-22', 'Unpaid', 3150.00, 'sanjeev', '', 'kmsanjeev322@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(226, 91, 'ZS_sbvVM7u7', '2025-08-22', 'Unpaid', 3150.00, 'sanjeev', '', 'kmsanjeev322@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(227, 91, 'ZS_lTCnJeCu', '2025-08-22', 'Unpaid', 3150.00, 'sanjeev', '', 'kmsanjeev322@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(228, 91, 'ZS_hBdMfiV2', '2025-08-22', 'Unpaid', 3150.00, 'sanjeev', '', 'kmsanjeev322@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(229, 91, 'ZS_J8uOfunE', '2025-08-22', 'Unpaid', 3150.00, 'sanjeev', '', 'kmsanjeev322@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(230, 91, 'ZS_xq5vHdf3', '2025-08-23', 'Unpaid', 2900.00, 'keerthan', '', 'keerthan20020907@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(231, 91, 'ZS_93d2nEmq', '2025-08-23', 'Unpaid', 0.00, 'keerthan', '', 'keerthan20020907@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(232, 91, 'ZS_LRApz5x4', '2025-08-23', 'Unpaid', 2900.00, 'keerthan', '', 'keerthan20020907@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(233, 91, 'ZS_K4JFCQrv', '2025-08-23', 'Unpaid', 2900.00, 'keerthan', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(234, 91, 'ZS_dYXPx3Di', '2025-08-23', 'Unpaid', 2900.00, 'keerthan', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(235, 91, 'ZS_GSvvkR8X', '2025-08-23', 'Unpaid', 2900.00, 'keerthan', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(236, 91, 'ZS_aH050eRY', '2025-08-23', 'Unpaid', 2900.00, 'keerthan', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(237, 91, 'ZS_4q36I4sp', '2025-08-23', 'Unpaid', 1145.00, 'keerthan', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(238, 91, 'ZS_JdZWsusJ', '2025-08-23', 'Unpaid', 1145.00, 'keerthan', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(239, 91, 'ZS_7grqfrzR', '2025-08-23', 'Unpaid', 1145.00, 'keerthan', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(240, 91, 'ZS_9nB8tKqU', '2025-08-23', 'Unpaid', 0.00, 'keerthan', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(241, 91, 'ZS_SP0T725C', '2025-08-23', 'Unpaid', 2900.00, 'keerthan', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'sullia', '', 'Cash on Delivery', 0, 1),
(243, 1, 'ZS_aYp2IEvD', '2025-08-25', 'Unpaid', 1.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(244, 1, 'ZS_pOvcV2fE', '2025-08-25', 'Unpaid', 1.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(245, 1, 'ZS_nt5C50RX', '2025-08-25', 'Unpaid', 1.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(246, 1, 'ZS_ko2hXyYN', '2025-08-25', 'Unpaid', 1.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(247, 1, 'ZS_JChVosMU', '2025-08-25', 'Unpaid', 1.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(248, 1, 'ZS_hk8aN4Qq', '2025-08-25', 'Unpaid', 1145.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(249, 1, 'ZS_3KUpqtB2', '2025-08-26', 'Unpaid', 5135.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(250, 1, 'ZS_E8iQKsg4', '2025-08-26', 'Unpaid', 8285.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(251, 1, 'ZS_zlnzmtfK', '2025-08-26', 'Unpaid', 3750.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(252, 1, 'ZS_aQhK7r5J', '2025-08-26', 'Unpaid', 2900.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(253, 1, 'ZS_qvURnZNg', '2025-08-26', 'Unpaid', 2900.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(254, 1, 'ZS_ZQRm73v5', '2025-08-26', 'Unpaid', 3990.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(255, 1, 'ZS_S4Knvlvl', '2025-08-26', 'Unpaid', 2900.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(256, 1, 'ZS_iSKuFd7J', '2025-08-26', 'Unpaid', 2900.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(257, 1, 'ZS_mpR3nbtt', '2025-08-27', 'Unpaid', 1145.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(258, 1, 'ZS_jtaon3Am', '2025-08-27', 'Unpaid', 0.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(259, 1, 'ZS_3OLXH323', '2025-08-27', 'Unpaid', 0.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(260, 1, 'ZS_16OmcvVh', '2025-08-27', 'Unpaid', 2900.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(261, 1, 'ZS_Y1jzRwgI', '2025-08-28', 'Unpaid', 3990.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(262, 1, 'ZS_aZfcCgjG', '2025-08-28', 'Unpaid', 0.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(263, 1, 'ZS_Nj7aMIH3', '2025-08-30', 'Unpaid', 1145.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(264, 1, 'ZS_XzATX4Ov', '2025-08-30', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(265, 1, 'ZS_Re4cLkEn', '2025-08-30', 'Unpaid', 1146.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(266, 1, 'ZS_9F9HPraQ', '2025-08-30', 'Unpaid', 2900.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(267, 1, 'ZS_zhqGauOR', '2025-08-30', 'Unpaid', 1145.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(268, 1, 'ZS_p1r15dwA', '2025-08-30', 'Unpaid', 1145.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(269, 1, 'ZS_7KdzeZ8l', '2025-08-30', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(270, 1, 'ZS_d5a2NQwl', '2025-08-30', 'Unpaid', 2900.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(271, 1, 'ZS_iXDvHqTT', '2025-08-30', 'Unpaid', 5340.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(272, 1, 'ZS_AuckjWU1', '2025-08-31', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(273, 1, 'ZS_esgc6dCc', '2025-08-31', 'Unpaid', 12480.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(277, 0, 'ZS_b7a1038c', '2025-09-01', 'Pending', 8400.00, 'Keerthan V', NULL, '', NULL, '07892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(278, 1, 'ZS_xMZxlMvi', '2025-09-01', 'Unpaid', 6300.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(279, 0, 'ZS_f48210fb', '2025-09-01', 'Pending', 5800.00, 'Keerthan V', NULL, '', NULL, '7892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(280, 0, 'ZS_a05c3689', '2025-09-01', 'Pending', 5800.00, 'Keerthan V', NULL, '', NULL, '7892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(281, 0, 'ZS_95ffc444', '2025-09-01', 'Pending', 5800.00, 'Keerthan V', NULL, '', NULL, '7892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(282, 0, 'ZS_01dd5b26', '2025-09-01', 'Pending', 6900.00, 'Keerthan V', NULL, '', NULL, '7892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(283, 0, 'ZS_24e1e279', '2025-09-01', 'Pending', 6900.00, 'Keerthan V', NULL, '', NULL, '7892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(284, 0, 'ZS_0ae46da3', '2025-09-01', 'Pending', 6900.00, 'Keerthan V', NULL, '', NULL, '7892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(285, 0, 'ZS_f18657b0', '2025-09-01', 'Pending', 2500.00, 'Keerthan V', NULL, '', NULL, '07892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(286, 1, 'ZS_cfYZumVW', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(287, 0, 'ZS_3db19d51', '2025-09-01', 'Pending', 3150.00, 'Keerthan V', NULL, '', NULL, '7892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(288, 0, 'ZS_8e0cc28c', '2025-09-01', 'Pending', 2190.00, 'Keerthan V', NULL, '', NULL, '7892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(289, 1, 'ZS_eLXZX5bN', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(290, 1, 'ZS_Ku9PifWc', '2025-09-01', 'Unpaid', 4380.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(291, 1, 'ZS_k1UbTD1q', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(292, 1, 'ZS_RdxyRHAi', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(293, 1, 'ZS_lsQ61dtG', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(294, 0, 'ZS_9e82b938', '2025-09-01', 'Pending', 3200.00, 'Keerthan V', NULL, '', NULL, '07892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(295, 0, 'ZS_8eceaad2', '2025-09-01', 'Pending', 2190.00, 'Keerthan V', NULL, '', NULL, '7892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(296, 1, 'ZS_IrCYwlia', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(297, 1, 'ZS_z5Mvpw3z', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(298, 1, 'ZS_AkcplXii', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(299, 1, 'ZS_4gbdQ6eU', '2025-09-01', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(300, 1, 'ZS_sIdVn8Ro', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(301, 1, 'ZS_nSb8D9la', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(302, 1, 'ZS_rpAkkxET', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(303, 1, 'ZS_bQWe5fBn', '2025-09-01', 'Unpaid', 0.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(304, 1, 'ZS_uTfZZtKF', '2025-09-01', 'Unpaid', 0.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(305, 1, 'ZS_IyzH93mg', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(306, 1, 'ZS_oPzqwS3F', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(307, 1, 'ZS_tBXqLIP5', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(308, 1, 'ZS_jYkCNyhq', '2025-09-01', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(309, 0, 'ZS_a3081c46', '2025-09-01', 'Pending', 5090.00, 'keerthu v', NULL, '', NULL, '7892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(310, 0, 'ZS_430cab82', '2025-09-01', 'Pending', 2900.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(311, 0, 'ZS_169a8b54', '2025-09-01', 'Pending', 2900.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(312, 0, 'ZS_f7691a20', '2025-09-01', 'Pending', 3990.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(313, 0, 'ZS_d88dbc14', '2025-09-01', 'Pending', 3990.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(314, 0, 'ZS_e82e3211', '2025-09-01', 'Pending', 2900.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(315, 0, 'ZS_126e5b67', '2025-09-01', 'Pending', 1.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(316, 0, 'ZS_e69535fb', '2025-09-01', 'Pending', 2900.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(317, 0, 'ZS_55404581', '2025-09-01', 'Pending', 2900.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(318, 0, 'ZS_910b16f3', '2025-09-01', 'Pending', 8500.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(319, 0, 'ZS_3b8a414e', '2025-09-01', 'Pending', 3150.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(320, 0, 'ZS_27ca9e4e', '2025-09-01', 'Pending', 3150.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(321, 0, 'ZS_ab4cff64', '2025-09-01', 'Pending', 3150.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(322, 0, 'ZS_4eee4775', '2025-09-01', 'Pending', 3990.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(323, 0, 'ZS_d10ad44f', '2025-09-01', 'Pending', 3990.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(324, 0, 'ZS_3624572a', '2025-09-01', 'Pending', 3990.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(325, 0, 'ZS_35f8a296', '2025-09-01', 'Pending', 3990.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(326, 0, 'ZS_453978f6', '2025-09-01', 'Pending', 3990.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(327, 0, 'ZS_386e2e67', '2025-09-01', 'Pending', 3500.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(328, 0, 'ZS_6d0a472b', '2025-09-01', 'Pending', 9441.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(329, 0, 'ZS_5f244a0f', '2025-09-01', 'Pending', 3150.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(330, 0, 'ZS_d2a330f5', '2025-09-01', 'Pending', 2190.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(331, 1, 'ZS_qdPphK7b', '2025-09-03', 'Paid', 3150.00, 'Keerthan V', 'Keerthan V', 'keerthudarshu06@gmail.com', 'keerthudarshu06@gmail.com', '7892783668', '7892783668', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Razorpay', 0, 1),
(332, 1, 'ZS_GuvzTQ8P', '2025-09-03', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(333, 1, 'ZS_bBRLrRaB', '2025-09-03', 'Paid', 3150.00, 'Keerthan V', 'Keerthan V', 'keerthudarshu06@gmail.com', 'keerthudarshu06@gmail.com', '7892783668', '7892783668', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Razorpay', 0, 1),
(334, 1, 'ZS_YBnR51LE', '2025-09-03', 'Paid', 2190.00, 'Keerthan V', 'Keerthan V', 'keerthudarshu06@gmail.com', 'keerthudarshu06@gmail.com', '7892783668', '7892783668', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Razorpay', 0, 1),
(335, 1, 'ZS_aWItoWGI', '2025-09-03', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(336, 1, 'ZS_GoKvgWQD', '2025-09-03', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(337, 1, 'ZS_K7w1wVde', '2025-09-03', 'Paid', 2190.00, 'Keerthan V', 'Keerthan V', 'keerthudarshu06@gmail.com', 'keerthudarshu06@gmail.com', '7892783668', '7892783668', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Razorpay', 0, 1),
(338, 1, 'ZS_8KFvP4ps', '2025-09-03', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(339, 1, 'ZS_fTV0W6lS', '2025-09-03', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(340, 1, 'ZS_Xo2aP2UD', '2025-09-04', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(341, 1, 'ZS_t8cZ9ybZ', '2025-09-04', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(342, 1, 'ZS_YJECf2T8', '2025-09-04', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(343, 1, 'ZS_MWs5ZH3w', '2025-09-04', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(344, 1, 'ZS_RnVr7FXW', '2025-09-04', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(345, 1, 'ZS_Nvbdtuqr', '2025-09-04', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(346, 1, 'ZS_cyGB0X40', '2025-09-04', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(347, 1, 'ZS_yD42UDTJ', '2025-09-04', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(348, 1, 'ZS_u7g9hsQB', '2025-09-04', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(349, 1, 'ZS_x5qJ1wld', '2025-09-04', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(350, 1, 'ZS_piWA1Dw4', '2025-09-04', 'Paid', 3150.00, 'Keerthan V', 'Keerthan V', 'keerthudarshu06@gmail.com', 'keerthudarshu06@gmail.com', '7892783668', '7892783668', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Razorpay', 0, 1),
(351, 0, 'ZS_26449697', '2025-09-08', 'Pending', 2880.00, 'Keerthan V', NULL, '', NULL, '07892783668', NULL, 'Kandadka house dugaladka post sullia TQ DK Karnataka india', NULL, 'Admin', 0, 0),
(352, 1, 'ZS_kpQXyb7H', '2025-09-08', 'Unpaid', 1.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(353, 1, 'ZS_e7iudN8R', '2025-09-08', 'Unpaid', 1.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(354, 1, 'ZS_d4bxZv3y', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(355, 1, 'ZS_gLfeH507', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(356, 1, 'ZS_ghqFW2XN', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(357, 1, 'ZS_qdW4URWM', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(358, 1, 'ZS_Dm2gmjmU', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(359, 1, 'ZS_jUhBa0io', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(360, 1, 'ZS_RPv13WvV', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(361, 1, 'ZS_7OEzfDCz', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(362, 1, 'ZS_3amGpMTe', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(363, 1, 'ZS_1K5OtJDW', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(364, 1, 'ZS_fCl1bm1T', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(365, 1, 'ZS_3bboT9FP', '2025-09-08', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(366, 1, 'ZS_kfM8ExSv', '2025-09-08', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(367, 1, 'ZS_XWfigEm0', '2025-09-08', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(368, 1, 'ZS_xD3XzDpf', '2025-09-08', 'Unpaid', 2900.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(369, 1, 'ZS_mS7XzGdB', '2025-09-08', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(370, 1, 'ZS_Q0SKu3U3', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(371, 1, 'ZS_ysJdfQWA', '2025-09-08', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(372, 1, 'ZS_QqKyXG0y', '2025-09-08', 'Paid', 2190.00, 'Keerthan V', 'Keerthan V', 'keerthudarshu06@gmail.com', 'keerthudarshu06@gmail.com', '7892783668', '7892783668', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Razorpay', 0, 1),
(373, 1, 'ZS_1ABILffm', '2025-09-08', 'Unpaid', 2900.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(375, 1, 'ZS_i0YpZKuO', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(376, 1, 'ZS_LknY4JmB', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(377, 1, 'ZS_onhEz34g', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(378, 1, 'ZS_RjmqPCmN', '2025-09-08', 'Unpaid', 1.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(379, 1, 'ZS_u9Bz4XXb', '2025-09-08', 'Unpaid', 1.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(380, 1, 'ZS_LNfxAYJF', '2025-09-08', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(382, 1, 'ZS_AO0aXNO5', '2025-09-08', 'Paid', 3150.00, 'Keerthan V', 'Keerthan V', 'keerthudarshu06@gmail.com', 'keerthudarshu06@gmail.com', '7892783668', '7892783668', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Razorpay', 0, 1),
(383, 0, 'ZS_bd5d2447', '2025-09-08', 'Pending', 5800.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(384, 0, 'ZS_d688f97c', '2025-09-08', 'Pending', 4400.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(385, 0, 'ZS_f1d7e71f', '2025-09-08', 'Pending', 2190.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(386, 1, 'ZS_VY7N5Piz', '2025-09-08', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(387, 1, 'ZS_VlD9HI4t', '2025-09-08', 'Paid', 3150.00, 'Keerthan V', 'Keerthan V', 'keerthudarshu06@gmail.com', 'keerthudarshu06@gmail.com', '7892783668', '7892783668', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Razorpay', 0, 1),
(388, 1, 'ZS_njupWOyb', '2025-09-08', 'Paid', 3150.00, 'Keerthan V', 'Keerthan V', 'keerthudarshu06@gmail.com', 'keerthudarshu06@gmail.com', '7892783668', '7892783668', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Razorpay', 0, 1),
(389, 0, 'ZS_51ac79e1', '2025-09-08', 'Pending', 3000.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(390, 1, 'ZS_dVOmWy6O', '2025-09-09', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(391, 1, 'ZS_oZebCNd6', '2025-09-09', 'Unpaid', 0.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(392, 1, 'ZS_A8E3bins', '2025-09-09', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(393, 1, 'ZS_vEVo5fV8', '2025-09-09', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(394, 1, 'ZS_TUnTpkyM', '2025-09-09', 'Unpaid', 2190.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1),
(395, 1, 'ZS_4VLGH9dZ', '2025-09-09', 'Paid', 2190.00, 'Keerthan V', 'Keerthan V', 'keerthudarshu06@gmail.com', 'keerthudarshu06@gmail.com', '7892783668', '7892783668', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Razorpay', 0, 1),
(396, 1, 'ZS_yAR1cevh', '2025-09-09', 'Paid', 2190.00, 'Keerthan V', 'Keerthan V', 'keerthudarshu06@gmail.com', 'keerthudarshu06@gmail.com', '7892783668', '7892783668', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Razorpay', 0, 1),
(397, 1, 'ZS_Ia0R5EOB', '2025-09-09', 'Paid', 2190.00, 'Keerthan V', 'Keerthan V', 'keerthudarshu06@gmail.com', 'keerthudarshu06@gmail.com', '7892783668', '7892783668', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 'Razorpay', 0, 1),
(398, 0, 'ZS_db8eaba7', '2025-09-09', 'Pending', 2900.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(399, 0, 'ZS_87c4c1f6', '2025-09-09', 'Pending', 2190.00, 'keerthu v', NULL, '', NULL, '07892783668', NULL, '2nd Cross Rd, East of NGEF Layout', NULL, 'Admin', 0, 0),
(400, 1, 'ZS_HfQykObn', '2025-09-10', 'Unpaid', 3150.00, 'Keerthan V', '', 'keerthudarshu06@gmail.com', '', '7892783668', '', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', '', 'Cash on Delivery', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `img_design`
--

CREATE TABLE `img_design` (
  `id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `img_design`
--

INSERT INTO `img_design` (`id`, `img`, `id_user`) VALUES
(1, 'img_design1.png', 1),
(2, 'img_design2.png', 1),
(3, 'img_design3.png', 1),
(4, 'img_design4.png', 1),
(5, 'img_design5.png', 1),
(6, 'img_design6.png', 1),
(7, 'img_design7.png', 1),
(8, 'img_design8.png', 1),
(14, 'd60ff7cc8940201e7951.jpg', 92),
(15, '12d345c6204a8914d05b.jpg', 92),
(16, '12d345c6204a8914d05b.jpg', 92),
(17, '12d345c6204a8914d05b-removebg-preview.png', 92),
(18, 'ed50ac2495a83cf665b9-removebg-preview.png', 93),
(19, '85b110d50c59a507fc48.jpg', 95),
(20, '3eb710a90c25a57bfc34.jpg', 96),
(21, 'image-removebg-preview (3).png', 97),
(22, 'image-removebg-preview (4).png', 99),
(23, '4056d16fa9e000be59f1.jpg', 101),
(24, 'piccc.jpg', 103);

-- --------------------------------------------------------

--
-- Table structure for table `img_product_color`
--

CREATE TABLE `img_product_color` (
  `id` int(11) NOT NULL,
  `main_img` varchar(200) NOT NULL,
  `sub_img1` varchar(200) DEFAULT NULL,
  `sub_img2` varchar(200) DEFAULT NULL,
  `sub_img3` varchar(200) DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  `id_color` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `img_product_color`
--

INSERT INTO `img_product_color` (`id`, `main_img`, `sub_img1`, `sub_img2`, `sub_img3`, `id_product`, `id_color`) VALUES
(1, 'AT_001_white.png', 'AT_001_white1.png', 'AT_001_detail1.jpg', 'AT_001_detail2.jpg', 1, 1),
(2, 'AT_001_black.png', 'AT_001_black1.png', 'AT_001_detail1.jpg', 'AT_001_detail2.jpg', 1, 2),
(3, 'AT_001_brown.png', 'AT_001_brown1.png', 'AT_001_detail1.jpg', 'AT_001_detail2.jpg', 1, 3),
(4, 'AT_001_green.png', 'AT_001_green1.png', 'AT_001_detail1.jpg', 'AT_001_detail2.jpg', 1, 4),
(5, 'AT_001_blue.png', 'AT_001_blue1.png', 'AT_001_detail1.jpg', 'AT_001_detail2.jpg', 1, 5),
(6, 'AT_001_purple.png', 'AT_001_purple1.png', 'AT_001_detail1.jpg', 'AT_001_detail2.jpg', 1, 6),
(7, 'AT_001_pink.png', 'AT_001_pink1.png', 'AT_001_detail1.jpg', 'AT_001_detail2.jpg', 1, 7),
(8, 'AT_001_beige.png', 'AT_001_beige1.png', 'AT_001_detail1.jpg', 'AT_001_detail2.jpg', 1, 8),
(9, 'AT_001_orange.png', 'AT_001_orange1.png', 'AT_001_detail1.jpg', 'AT_001_detail2.jpg', 1, 9),
(10, 'AT_001_yellow.png', 'AT_001_yellow1.png', 'AT_001_detail1.jpg', 'AT_001_detail2.jpg', 1, 10),
(11, 'AT_002_white.png', 'AT_002_detail1.jpg', 'AT_002_detail2.jpg', 'AT_001_detail1.jpg', 45, 1),
(12, 'AT_002_black.png', 'AT_002_detail1.jpg', 'AT_002_detail2.jpg', 'AT_001_detail1.jpg', 45, 2),
(13, 'AT_002_brown.png', 'AT_002_detail1.jpg', 'AT_002_detail2.jpg', 'AT_001_detail1.jpg', 45, 3),
(14, 'AT_002_green.png', 'AT_002_detail1.jpg', 'AT_002_detail2.jpg', 'AT_001_detail1.jpg', 45, 4),
(15, 'AT_003_white.png', 'AT_003_white1.jpg', 'AT_003_detail1.jpg', 'AT_003_detail2.webp', 46, 1),
(16, 'AT_003_black.png', 'AT_003_black1.webp', 'AT_003_detail1.jpg', 'AT_003_detail2.webp', 46, 2),
(17, 'AT_004_blue.png', 'AT_004_blue1.webp', 'AT_004_detail1.jpg', 'AT_004_detail1.jpg', 47, 5),
(23, 'APL_001_white.png', 'APL_001_white1.jpg', 'APL_001_white2.webp', 'APL_001_white3.webp', 51, 1),
(27, 'AK_001_white.png', 'AK_001_white1.webp', 'AK_001_white2.webp', 'AK_001_white3.webp', 53, 1),
(28, 'AK_001_black.png', 'AK_001_black1.webp', 'AK_001_black2.webp', 'AK_001_black3.webp', 53, 2),
(29, 'AK_002_black.png', 'AK_002_black1.webp', 'AK_002_black2.webp', 'AK_002_black3.webp', 55, 2),
(30, 'AK_002_beige.png', 'AK_002_beige1.webp', 'AK_002_beige2.webp', 'AK_002_beige3.webp', 55, 8),
(31, 'AK_003_beige.png', 'AK_003_beige1.webp', 'AK_003_beige2.webp', 'AK_003_beige3.webp', 57, 8),
(32, 'ASM_002_brown.png', 'ASM_002_brown1.webp', 'ASM_002_brown2.webp', 'ASM_002_brown3.webp', 58, 3),
(33, 'AT_006_white.png', 'AT_006_detail1.jpg', 'AT_006_detail2.jpg', 'AT_006_detail3.jpg', 59, 1),
(34, 'AT_006_black.png', 'AT_006_detail1.jpg', 'AT_006_detail2.jpg', 'AT_006_detail3.jpg', 59, 2),
(35, 'ASM_001_brown.png', 'ASM_001_detail1.jpg', 'ASM_001_detail2.webp', 'ASM_001_detail3.webp', 50, 3),
(36, 'ASM_001_beige.png', 'ASM_001_detail1.jpg', 'ASM_001_detail2.webp', 'ASM_001_detail3.webp', 50, 8),
(38, 'ASM_001_white.png', 'ASM_001_detail1.jpg', 'ASM_001_detail2.webp', 'ASM_001_detail3.webp', 50, 1),
(39, 'APL_002_white.png', 'APL_002_detail1.jpg', 'APL_002_detail2.jpg', 'APL_002_detail3.jpg', 52, 1),
(40, 'APL_002_black.png', 'APL_002_detail1.jpg', 'APL_002_detail2.jpg', 'APL_002_detail3.jpg', 52, 2),
(41, 'AT_005_blue.png', 'AT_005_detail1.jpg', 'AT_005_detail2.jpg', 'AT_005_detail3.jpg', 49, 5),
(42, 'AT_005_white.png', 'AT_005_detail1.jpg', 'AT_005_detail2.jpg', 'AT_005_detail3.jpg', 49, 1),
(43, 'AT_005_black.png', 'AT_005_detail1.jpg', 'AT_005_detail2.jpg', 'AT_005_detail3.jpg', 49, 2),
(44, 'AK_004_blue.png', 'AK_004_blue1.webp', 'Ak_004_detail1.webp', 'AK_004_detail2.jpg', 60, 5),
(45, 'AT_007_white.png', 'AT_007_detail1.jpg', 'AT_007_detail2.webp', 'AT_007_detail3.webp', 61, 1),
(46, 'AT_007_black.png', 'AT_007_detail1.jpg', 'AT_007_detail2.webp', 'AT_007_detail3.webp', 61, 2),
(47, 'AK_005_blue.png', 'AK_005_blue1.webp', 'AK_005_detail1.webp', 'AK_005_detail2.webp', 62, 5),
(49, 'AT_008_black.png', 'AT_008_black1.webp', 'AT_008_detail1.webp', 'AT_008_detail2.jpg', 63, 2),
(50, 'ASM_003_brown.png', 'ASM_003_brown1.webp', 'ASM_003_detail1.jpg', 'ASM_003_detail2.jpg', 64, 3),
(51, 'ASM_004_white.png', 'ASM_004_white1.webp', 'ASM_004_detail1.webp', 'ASM_004_detail2.jpg', 65, 1),
(52, 'ASM_005_white.png', 'ASM_005_detail1.webp', 'ASM_005_detail2.webp', 'ASM_005_detail3.webp', 66, 1),
(53, 'ASM_005_black.png', 'ASM_005_detail1.webp', 'ASM_005_detail2.webp', 'ASM_005_detail3.webp', 66, 2),
(54, 'ASM_006_black.png', 'ASM_006_black1.jpg', 'ASM_006_detail1.webp', 'ASM_006_detail2.webp', 67, 2),
(55, 'ASM_007_blue.png', 'ASM_007_detail1.jpg', 'ASM_007_detail2.jpg', 'ASM_007_detail3.jpg', 68, 5),
(56, 'APL_003_black.png', 'APL_003_black1.webp', 'APL_003_detail1.webp', 'APL_003_detail2.webp', 69, 2),
(57, 'APL_004_white.png', 'APL_004_white1.jpg', 'APL_004_detail1.jpg', 'APL_004_detail2.jpg', 70, 1),
(58, 'APL_005_black.png', 'APL_005_black1.jpg', 'APL_005_detail1.jpg', 'APL_005_detail2.jpg', 71, 2),
(59, 'APL_006_black.png', 'APL_006_detail1.webp', 'APL_006_detail2.webp', 'APL_006_detail3.jpg', 72, 2),
(60, 'APL_006_beige.png', 'APL_006_detail1.webp', 'APL_006_detail2.webp', 'APL_006_detail3.jpg', 72, 8),
(61, 'APL_007_white.png', 'APL_007_white1.jpg', 'APL_007_detail1.jpg', 'APL_007_detail2.jpg', 73, 1),
(62, 'AK_006_black.png', 'AK_006_detail1.webp', 'AK_006_detail2.webp', 'AK_006_detail3.webp', 74, 2),
(64, 'AK_007_yellow.png', 'AK_007_yellow1.jpg', 'AK_007_detail1.jpg', 'AK_007_detail1.jpg', 75, 10),
(65, 'AK_008_blue.png', 'AK_008_blue1.jpg', 'AK_008_detail1.jpg', 'AK_008_detail1.jpg', 76, 5),
(66, 'img3-removebg-preview.png', 'img2-removebg-preview.png', 'img3-removebg-preview.png', 'img4-removebg-preview.png', 77, 2),
(67, 'designer-multilayer-ruffled-maroon-gown-with-floral-embellishments-for-girls-lagorii-kids-1-removebg-preview.png', 'designer-multilayer-ruffled-maroon-gown-with-floral-embellishments-for-girls-lagorii-kids-3_compact-removebg-preview.png', 'designer-multilayer-ruffled-maroon-gown-with-floral-embellishments-for-girls-lagorii-kids-1-removebg-preview.png', 'designer-multilayer-ruffled-maroon-gown-with-floral-embellishments-for-girls-lagorii-kids-3_compact-removebg-preview.png', 78, 1),
(70, '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4__1_-removebg-preview.png', '6_ec41f733-8e79-4230-8967-b271ba932098-removebg-preview.png', '5_e6d18c4f-b4e6-4758-9d3a-cda6cc0162a4__1_-removebg-preview.png', '7_747f80fb-efa4-4c75-bcb5-f8ebdf26bfe2-removebg-preview.png', 81, 2),
(71, '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', '3_77602329-2d6d-4725-bf27-8aeade0927b2-removebg-preview.png', '1_f1ad62b7-1831-4f4b-9c4d-3d1f58b409f3__1_-removebg-preview.png', '4_64cc586d-b1b4-49d1-9e79-bf954b4152a6-removebg-preview.png', 82, 8),
(72, '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', '3_299d0f4d-e6b5-415d-9c30-98a6e4f1078e-removebg-preview.png', '1_ddedcb06-4358-46f4-8d94-3b65d8317e23-removebg-preview.png', '4_5c306c0a-e8f4-4a62-80a3-69139c3023a6-removebg-preview.png', 83, 7);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(200) NOT NULL,
  `thoigian` date NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `img`, `thoigian`, `noidung`) VALUES
(1, 'What is unisex style?', 'Casual_Wear.jpg', '2023-11-29', 'Unisex is an adjective used to describe clothing styles that are not gender-specific, suitable for both sexes and make both sexes look similar. They are called genderless or gender-neutral clothing by young people.'),
(2, 'Interesting facts about t-shirts.', 'mobile-casual-wear-menuboys.jpg', '2023-11-30', 'Besides jeans, T-shirts are also extremely popular clothes, not only with young people but also with everyone of all ages. More specifically, T-shirts are items that never go out of fashion, and are also easy to mix and match with any items and any'),
(3, 'Life magazine was the first publication to “promote” T-shirts.', '24_5a49ebb3-cac2-4548-a6b9-2501491b0d86_533x.png', '2023-11-30', 'The cover of Life magazine in 1942 helped make the T-shirt a popular fashion icon. Suddenly, the T-shirt became a fashion statement full of personality, and it “demanded”'),
(4, 'T-shirts appeared on screen in 1950', 'mobile-casual-wear-menurompers.jpg', '2023-12-30', 'However, T-shirts only really gained attention from the 1950s until now after the appearance of the revenge action movie ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `ma_sanpham` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `priceold` double(10,2) NOT NULL DEFAULT 0.00,
  `hot` tinyint(1) NOT NULL DEFAULT 0,
  `noibat` tinyint(1) NOT NULL DEFAULT 0,
  `chitiet` varchar(1000) DEFAULT NULL,
  `gioitinh` tinyint(1) DEFAULT 0,
  `idcatalog` int(11) NOT NULL,
  `bestsell` tinyint(1) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `trend` tinyint(1) NOT NULL DEFAULT 0,
  `stock` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `ma_sanpham`, `name`, `price`, `priceold`, `hot`, `noibat`, `chitiet`, `gioitinh`, `idcatalog`, `bestsell`, `view`, `trend`, `stock`) VALUES
(1, 'AT_001', 'Regular Basic T-Shirt', 2500.00, 0.00, 0, 0, '', 0, 11, 1, 286, 0, 0),
(45, 'AT_002', 'Regular Come T-Shirt', 2900.00, 3500.00, 1, 1, '', 1, 11, 1, 101, 0, -1),
(46, 'AT_003', 'Oversize V-Neck T-Shirt', 3200.00, 0.00, 1, 1, '', 0, 11, 1, 85, 1, -1),
(47, 'AT_004', 'Thun Regular Rhythm', 2900.00, 3300.00, 0, 1, '', 1, 11, 1, 123, 1, -2),
(49, 'AT_005', 'Streetfood Pop Art T-Shirt', 3500.00, 0.00, 0, 1, '', 0, 11, 1, 69, 1, -2),
(50, 'ASM_001', 'Cuban Label Shirt', 8500.00, 9000.00, 0, 1, '', 1, 14, 1, 59, 0, -1),
(51, 'APL_001', 'Polo Nam Tay Ngắn', 4400.00, 5000.00, 0, 0, '', 1, 12, 0, 136, 1, -1),
(52, 'APL_002', 'Polo Elegant Alphabet', 3500.00, 3900.00, 0, 1, '', 1, 12, 0, 34, 1, 0),
(53, 'AK_001', 'Regular Surpass Jacket', 4900.00, 0.00, 1, 1, '', 2, 13, 0, 71, 1, 0),
(55, 'AK_002', 'Colorblock Raglan Jacket', 4500.00, 0.00, 0, 1, '', 0, 13, 1, 117, 0, 0),
(57, 'AK_003', 'Varsity Festive Vibe Jacket', 4200.00, 4500.00, 0, 0, '', 0, 13, 1, 33, 0, 0),
(58, 'ASM_002', 'Cuban Abstract Shirt', 3200.00, 0.00, 0, 0, '', 1, 14, 1, 54, 0, 0),
(59, 'AT_006', 'Regular Special T-Shirt', 2900.00, 0.00, 0, 0, '', 1, 11, 0, 78, 1, 0),
(60, 'AK_004', 'style Classic Jacket', 3990.00, 0.00, 0, 0, '', 0, 13, 0, 85, 0, 0),
(61, 'AT_007', 'Mono style T-Shirt', 2700.00, 0.00, 1, 0, '', 0, 11, 0, 103, 1, 0),
(62, 'AK_005', 'Varsity Rhythm Jacket', 4500.00, 3990.00, 1, 0, '', 0, 13, 0, 100, 1, 0),
(63, 'AT_008', 'Regular Tiger T-Shirt', 3900.00, 3500.00, 1, 0, '', 0, 11, 0, 12, 1, 0),
(64, 'ASM_003', 'Cuban Floral Plain Shirt', 3000.00, 3500.00, 1, 1, '', 0, 14, 0, 73, 1, 0),
(65, 'ASM_004', 'Regular Oxford Shirt', 3000.00, 3500.00, 1, 0, '', 0, 14, 0, 113, 1, -1),
(66, 'ASM_005', 'Slimfit Button Down Shirt', 3000.00, 3500.00, 1, 0, '', 0, 14, 0, 166, 1, 0),
(67, 'ASM_006', 'Cuban Chrysanthemum Shirt', 3150.00, 3500.00, 0, 0, '', 0, 14, 1, 85, 0, 0),
(68, 'ASM_007', 'Logo Customize Vertical', 2880.00, 3200.00, 1, 0, '', 0, 14, 1, 50, 1, -1),
(69, 'APL_003', 'Polo Radiate Positivity', 3150.00, 3500.00, 0, 0, '', 0, 12, 1, 156, 1, 0),
(70, 'APL_004', 'Polo Horional Green Stripes', 2500.00, 3500.00, 0, 0, '', 1, 12, 1, 13, 0, 0),
(71, 'APL_005', 'Polo Milk Coffee Striped', 3150.00, 3500.00, 1, 0, '', 1, 12, 1, 62, 1, 0),
(72, 'APL_006', 'Polo Alphabet Pattern', 3150.00, 3500.00, 1, 1, '', 0, 12, 1, 225, 1, 0),
(73, 'APL_007', 'Polo Regular Horizonal', 3150.00, 3500.00, 0, 0, '', 0, 12, 1, 92, 1, 0),
(74, 'AK_006', ' Windproof Flexible', 3750.00, 4200.00, 1, 1, '', 0, 13, 1, 0, 1, 4),
(75, 'AK_007', 'Raglan Clock Color', 1.00, 4900.00, 1, 1, '', 0, 13, 1, 0, 1, 13),
(76, 'AK_008', 'Trucker Denim Extended', 3990.00, 5200.00, 0, 0, '', 2, 13, 0, 0, 1, 12),
(77, '1234', 'pant', 3150.00, 3400.00, 0, 0, '', 2, 16, 0, 4, 0, 20),
(78, '199', 'top', 3150.00, 3400.00, 0, 0, '', 2, 16, 0, 0, 0, 10),
(81, '2', 'Elegant Yellow Hakoba', 2900.00, 3400.00, 0, 0, '', 2, 16, 0, 6, 0, 5),
(82, '1', 'Grey Hakoba Co-ord Set', 3150.00, 3500.00, 0, 0, '', 2, 16, 0, 46, 0, 0),
(83, '3', 'Thread Embroidery Palazzo Set', 2190.00, 2900.00, 0, 0, '', 2, 16, 0, 25, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quantity_of_inventory`
--

CREATE TABLE `quantity_of_inventory` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quantity_of_inventory`
--

INSERT INTO `quantity_of_inventory` (`id`, `id_product`, `id_size`, `id_color`, `soluong`) VALUES
(1, 1, 1, 1, 10),
(2, 1, 2, 1, 5),
(3, 1, 3, 1, 18),
(4, 1, 4, 1, 14),
(5, 1, 5, 1, 10),
(6, 1, 6, 1, 5),
(7, 1, 1, 2, 7),
(8, 1, 2, 2, 7),
(9, 1, 3, 2, 11),
(10, 1, 4, 2, 9),
(11, 1, 5, 2, 6),
(12, 1, 6, 2, 13),
(13, 1, 1, 3, 7),
(14, 1, 2, 3, 10),
(15, 1, 3, 3, 12),
(16, 1, 4, 3, 7),
(17, 1, 5, 3, 14),
(18, 1, 6, 3, 8),
(19, 1, 1, 4, 6),
(20, 1, 2, 4, 8),
(21, 1, 3, 4, 10),
(22, 1, 4, 4, 5),
(23, 1, 5, 4, 10),
(24, 1, 6, 4, 5),
(25, 1, 1, 5, 7),
(26, 1, 2, 5, 10),
(27, 1, 3, 5, 5),
(28, 1, 4, 5, 10),
(29, 1, 5, 5, 6),
(30, 1, 6, 5, 6),
(31, 1, 1, 6, 10),
(32, 1, 2, 6, 5),
(33, 1, 3, 6, 6),
(34, 1, 4, 6, 9),
(35, 1, 5, 6, 7),
(36, 1, 6, 6, 10),
(37, 1, 1, 7, 6),
(38, 1, 2, 7, 9),
(39, 1, 3, 7, 8),
(40, 1, 4, 7, 13),
(41, 1, 5, 7, 7),
(42, 1, 6, 7, 10),
(43, 1, 1, 8, 10),
(44, 1, 2, 8, 8),
(45, 1, 3, 8, 10),
(46, 1, 4, 8, 8),
(47, 1, 5, 8, 10),
(48, 1, 6, 8, 9),
(49, 1, 1, 9, 7),
(50, 1, 2, 9, 8),
(51, 1, 3, 9, 12),
(52, 1, 4, 9, 10),
(53, 1, 5, 9, 8),
(54, 1, 6, 9, 9),
(55, 1, 1, 10, 10),
(56, 1, 2, 10, 8),
(57, 1, 3, 10, 8),
(58, 1, 4, 10, 13),
(59, 1, 5, 10, 6),
(60, 1, 6, 10, 13),
(61, 45, 1, 1, 77),
(62, 45, 2, 1, 60),
(63, 45, 3, 1, 55),
(64, 45, 4, 1, 15),
(65, 45, 5, 1, 3),
(66, 45, 6, 1, 60),
(67, 45, 1, 2, 40),
(68, 45, 1, 2, 40),
(69, 45, 2, 2, 100),
(70, 45, 3, 2, 75),
(71, 45, 4, 2, 90),
(72, 45, 5, 2, 5),
(73, 45, 6, 2, 70),
(74, 45, 1, 3, 65),
(75, 45, 2, 3, 34),
(76, 45, 3, 3, 20),
(77, 45, 4, 3, 87),
(78, 45, 5, 3, 91),
(79, 45, 6, 3, 45),
(80, 45, 1, 4, 32),
(81, 45, 2, 4, 67),
(82, 45, 3, 4, 23),
(83, 45, 4, 4, 80),
(84, 45, 5, 4, 75),
(85, 45, 6, 4, 89),
(86, 46, 1, 1, 50),
(87, 46, 2, 1, 35),
(88, 46, 3, 1, 78),
(89, 46, 4, 1, 50),
(90, 46, 5, 1, 76),
(91, 46, 6, 1, 8),
(92, 47, 1, 5, 22),
(93, 47, 2, 5, 67),
(94, 47, 3, 5, 56),
(95, 47, 4, 5, 3),
(96, 47, 5, 5, 88),
(97, 47, 6, 5, 59),
(98, 49, 1, 1, 45),
(99, 49, 2, 1, 99),
(100, 49, 3, 1, 66),
(101, 49, 4, 1, 59),
(102, 49, 6, 1, 49),
(103, 49, 5, 1, 47),
(104, 49, 1, 2, 12),
(105, 49, 2, 2, 34),
(106, 49, 3, 2, 5),
(107, 49, 4, 2, 1),
(108, 49, 5, 2, 86),
(109, 49, 6, 2, 90),
(110, 49, 1, 5, 12),
(111, 49, 2, 5, 76),
(112, 49, 3, 5, 45),
(113, 49, 4, 5, 95),
(114, 49, 5, 5, 46),
(115, 49, 6, 5, 89),
(116, 50, 1, 1, 50),
(117, 50, 2, 1, 78),
(118, 50, 3, 1, 60),
(119, 50, 4, 1, 80),
(120, 50, 5, 1, 50),
(121, 50, 6, 1, 89),
(122, 50, 1, 8, 56),
(123, 50, 2, 8, 79),
(124, 50, 3, 8, 35),
(125, 50, 4, 8, 65),
(126, 50, 5, 8, 78),
(127, 50, 6, 8, 86),
(128, 50, 1, 3, 41),
(129, 50, 2, 3, 40),
(130, 50, 3, 3, 3),
(131, 50, 4, 3, 10),
(132, 50, 5, 3, 72),
(133, 50, 6, 3, 71),
(134, 51, 1, 1, 44),
(135, 51, 2, 1, 34),
(136, 51, 3, 1, 76),
(137, 51, 4, 1, 6),
(138, 51, 5, 1, 10),
(139, 51, 6, 1, 78),
(140, 52, 1, 1, 6),
(141, 52, 2, 1, 71),
(142, 52, 3, 1, 65),
(143, 52, 4, 1, 86),
(144, 52, 5, 1, 14),
(145, 52, 6, 1, 32),
(146, 52, 1, 2, 2),
(147, 52, 2, 2, 54),
(148, 52, 3, 2, 63),
(149, 52, 4, 2, 70),
(150, 52, 5, 2, 80),
(151, 52, 6, 2, 15),
(152, 53, 1, 1, 41),
(153, 53, 2, 1, 12),
(154, 53, 3, 1, 19),
(155, 53, 4, 1, 78),
(156, 53, 5, 1, 92),
(157, 53, 6, 1, 93),
(158, 53, 1, 2, 51),
(159, 53, 2, 2, 43),
(160, 53, 3, 2, 17),
(161, 53, 4, 2, 98),
(162, 53, 5, 2, 62),
(163, 53, 6, 2, 15),
(164, 55, 1, 2, 23),
(165, 55, 2, 2, 35),
(166, 55, 3, 2, 45),
(167, 55, 4, 2, 5),
(168, 55, 5, 2, 15),
(169, 55, 6, 2, 95),
(170, 55, 1, 8, 32),
(171, 55, 2, 8, 15),
(172, 55, 3, 8, 76),
(173, 55, 4, 8, 80),
(174, 55, 5, 8, 40),
(175, 55, 6, 8, 13),
(176, 57, 1, 8, 51),
(177, 57, 2, 8, 65),
(178, 57, 3, 8, 13),
(179, 57, 4, 8, 98),
(180, 57, 5, 8, 56),
(181, 57, 6, 8, 34),
(182, 58, 1, 3, 22),
(183, 58, 2, 3, 54),
(184, 58, 3, 3, 78),
(185, 58, 4, 3, 89),
(186, 58, 5, 3, 60),
(187, 58, 6, 3, 62),
(188, 59, 1, 1, 29),
(189, 59, 2, 1, 67),
(190, 59, 3, 1, 84),
(191, 59, 4, 1, 90),
(192, 59, 5, 1, 43),
(193, 59, 6, 1, 76),
(194, 59, 1, 2, 89),
(195, 59, 2, 2, 43),
(196, 59, 3, 2, 21),
(197, 59, 4, 2, 78),
(198, 59, 5, 2, 45),
(199, 59, 6, 2, 94),
(200, 60, 1, 5, 44),
(201, 60, 2, 5, 34),
(202, 60, 3, 5, 29),
(203, 60, 4, 5, 76),
(204, 60, 5, 5, 99),
(205, 60, 6, 5, 57),
(206, 61, 1, 1, 53),
(207, 61, 2, 1, 34),
(208, 61, 3, 1, 44),
(209, 61, 4, 1, 96),
(210, 61, 5, 1, 12),
(211, 61, 6, 1, 6),
(212, 61, 1, 2, 45),
(213, 61, 2, 2, 40),
(214, 61, 3, 2, 32),
(215, 61, 4, 2, 34),
(216, 61, 5, 2, 67),
(217, 61, 6, 2, 23),
(218, 62, 1, 5, 16),
(219, 62, 2, 5, 9),
(220, 62, 3, 5, 25),
(221, 62, 4, 5, 56),
(222, 62, 5, 5, 78),
(223, 62, 6, 5, 56),
(224, 63, 1, 2, 97),
(225, 63, 2, 2, 15),
(226, 63, 3, 2, 73),
(227, 63, 4, 2, 87),
(228, 63, 5, 2, 77),
(229, 63, 6, 2, 54),
(230, 64, 1, 3, 35),
(231, 64, 2, 3, 90),
(232, 64, 3, 3, 46),
(233, 64, 4, 3, 99),
(234, 64, 5, 3, 82),
(235, 64, 6, 3, 78),
(236, 65, 1, 1, 31),
(237, 65, 2, 1, 12),
(238, 65, 3, 1, 10),
(239, 65, 4, 1, 87),
(240, 65, 5, 1, 54),
(241, 65, 6, 1, 23),
(242, 66, 1, 1, 87),
(243, 66, 2, 1, 54),
(244, 66, 3, 1, 75),
(245, 66, 4, 1, 98),
(246, 66, 5, 1, 51),
(247, 66, 6, 1, 45),
(248, 66, 1, 2, 21),
(249, 66, 2, 2, 20),
(250, 66, 3, 2, 30),
(251, 66, 4, 2, 40),
(252, 66, 5, 2, 67),
(253, 66, 6, 2, 98),
(254, 67, 1, 2, 64),
(255, 67, 2, 2, 55),
(256, 67, 3, 2, 10),
(257, 67, 4, 2, 23),
(258, 67, 5, 2, 78),
(259, 67, 6, 2, 43),
(260, 68, 1, 5, 92),
(261, 68, 2, 5, 70),
(262, 68, 3, 5, 50),
(263, 68, 4, 5, 7),
(264, 68, 5, 5, 98),
(265, 68, 6, 5, 65),
(266, 69, 1, 2, 40),
(267, 69, 2, 2, 76),
(268, 69, 3, 2, 87),
(269, 69, 4, 2, 53),
(270, 69, 5, 2, 12),
(271, 69, 6, 2, 81),
(272, 70, 1, 1, 72),
(273, 70, 2, 1, 34),
(274, 70, 3, 1, 87),
(275, 70, 4, 1, 19),
(276, 70, 5, 1, 43),
(277, 70, 6, 1, 76),
(278, 71, 1, 2, 77),
(279, 71, 2, 2, 45),
(280, 71, 3, 2, 19),
(281, 71, 4, 2, 84),
(282, 71, 5, 2, 13),
(283, 71, 6, 2, 54),
(284, 72, 1, 2, 69),
(285, 72, 2, 2, 56),
(286, 72, 3, 2, 91),
(287, 72, 4, 2, 45),
(288, 72, 5, 2, 96),
(289, 72, 6, 2, 36),
(290, 72, 1, 8, 77),
(291, 72, 2, 8, 45),
(292, 72, 3, 8, 40),
(293, 72, 4, 8, 41),
(294, 72, 5, 8, 82),
(295, 72, 6, 8, 67),
(296, 73, 1, 1, 81),
(297, 73, 2, 1, 32),
(298, 73, 3, 1, 67),
(299, 73, 4, 1, 43),
(300, 73, 5, 1, 12),
(301, 73, 6, 1, 6),
(302, 74, 1, 2, 189),
(303, 74, 2, 2, 76),
(304, 74, 3, 2, 8),
(305, 74, 4, 2, 5),
(306, 74, 5, 2, 30),
(307, 74, 6, 2, 65),
(308, 75, 1, 10, 2549),
(309, 75, 2, 10, 85),
(310, 75, 3, 10, 88),
(311, 75, 4, 10, 32),
(312, 75, 5, 10, 65),
(313, 75, 6, 10, 12),
(314, 76, 1, 5, 515),
(315, 76, 2, 5, 98),
(316, 76, 3, 5, 43),
(317, 76, 4, 5, 43),
(318, 76, 5, 5, 4),
(319, 76, 6, 5, 45);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `ma_size` varchar(10) NOT NULL,
  `chieucao` varchar(20) NOT NULL,
  `cannang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `ma_size`, `chieucao`, `cannang`) VALUES
(1, 'XS', '1m54 - 1m59', '42kg - 47kg'),
(2, 'S', '1m56 - 1m63', '50kg - 59kg'),
(3, 'M', '1m56 - 1m68', '60kg - 65kg'),
(4, 'L', '1m56 - 1m80', '60kg - 75kg'),
(5, 'XL', '1m59 - 1m88', '60kg - 80kg'),
(6, 'XXL', '1m64 - 1m88', '70kg - 99kg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sdt` varchar(255) DEFAULT NULL,
  `gioitinh` varchar(10) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `kichhoat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `name`, `email`, `sdt`, `gioitinh`, `ngaysinh`, `diachi`, `role`, `img`, `kichhoat`) VALUES
(1, 'keerthan', '123456', 'Keerthan V', 'keerthudarshu06@gmail.com', '7892783668', '0', '2002-07-09', 'Kandadka house dugaladka post sullia TQ DK Karnataka india', 0, '9_5ec1e6fb-3754-4578-9892-95dd180f1266_533x.png', 1),
(2, 'kavan', '123456', '', 'techmindset@kvgengg.com', '', '0', NULL, '', 0, '', 1),
(3, 'admin', 'admin', 'Đỗ Tuấn Kiệt', 'dotuankiet04092003@gmail.com', '0383858853', '1', '2003-09-04', 'Gò Vấp', 1, NULL, 1),
(91, 'leminhtu', '123456', 'Lê Minh Tú', 'leminhtu10062004@gmail.com', '0123456789', '0', NULL, 'TPHCM', 0, '', 1),
(92, 'tuminhle', '123456', 'Tú Minh Lê', 'tuminhle1006@gmail.com', '0123456788', '0', NULL, 'TPHCM', 0, '', 1),
(93, 'minhtule', '123456', 'Minh Tú Lê', 'tuminhle1006@gmail.com', '0123456787', '0', NULL, 'TPHCM', 0, 'sothich.jpg', 1),
(94, 'duongdim', '123456', 'Bùi Dương Dĩm', 'jodd23855@gmail.com', '0123456789', '0', NULL, 'Bình Phước', 0, '85b110d50c59a507fc48.jpg', 1),
(95, 'dimduong', '123456', 'Dương Dĩm Bùi', 'jodd23855@gmail.com', '0123456786', '0', NULL, 'Bình Phước 1', 0, '9d6f1d03018fa8d1f19e.jpg', 1),
(96, 'dimbui', '123456', 'Dĩm Bùi Dương', 'jodd23855@gmail.com', '0123456785', '0', NULL, 'Bình Phước 2', 0, '3eb710a90c25a57bfc34.jpg', 1),
(97, 'thong', '123456', 'Nguyễn Hoàng Thông', 'thong@gmail.com', '0123456784', '0', NULL, 'Vĩnh Long, Long An', 0, 'image-removebg-preview (2).png', 1),
(98, 'hoangthong', '123456', 'Hoàng Thông', 'thong@gmail.com', '0123456783', '0', NULL, 'Vĩnh Long, Long An', 0, 'image-removebg-preview (3).png', 1),
(99, 'thanhtoan', '123456', 'Nguyễn Thanh Toàn', 'toan@gmail.com', '0123456783', '0', NULL, 'Miền Nam', 0, 'image-removebg-preview (4).png', 1),
(100, 'quy', '123456', 'Võ Hoàng Quý', 'quy@gmail.com', '0123456782', '0', NULL, 'Miền Nam', 0, 'image-removebg-preview (5).png', 1),
(101, 'mhong', '123456', 'Lê Thị Mỹ Hồng', 'hongltmps28690@fpt.edu.vn', '0123456780', '0', '2004-08-12', 'Sa Đéc', 0, 'mhonggg.jpg', 1),
(102, 'lang', '123456', 'Phạm Ngọc Lang', 'lagdz.1646@gmail.com', '0123456779', '1', NULL, 'Quảng Ngãi', 0, 'khoaileg.jpg', 1),
(103, 'pinky', '123456789', 'Lê Thị Mỹ Hường', 'myhong11a32004@gmail.com', '0704838199', '0', NULL, 'Phùng Khắc Khoan', 0, 'piccc.jpg', 1),
(104, 'kiet', '555555', 'Đỗ Tuấn Kiệt', 'hoa48488474773@gmail.com', '0123456778', '0', NULL, 'Bến Tre', 0, '', 1),
(105, 'toan', '123456', 'Trần Anh Toàn', 'toan21420@gmail.com', '0123456775', '0', NULL, 'TPHCM', 0, 'image-removebg-preview (6).png', 1),
(106, 'V', '123456', 'VVV', 'vbts@gmail.com', '0123456776', '0', NULL, 'Nước ngoài', 0, '220624_방탄소년단_뷔(1).jpg', 1),
(107, 'mtp', '123456', 'Nguyễn Thanh Tùng', 'sontungmtp@gmail.com', '0123456774', '0', NULL, 'Thái Bình', 0, 'son-tung-mtp-va-hai-tu (1).webp', 1),
(108, 'j97', '123456', 'Trịnh Trần Phương Tuấn', 'j97@gmail.com', '0123456773', '0', NULL, 'Miền Tây', 0, 'jjj.jpeg', 1),
(109, 'tam', '123456', 'Phan Thị Mỹ Tâm', 'mytam@gmail.com', '0123456772', '0', NULL, 'Miền Nam', 0, 'mt.webp', 1),
(110, 'na', '123456', 'naruto', 'naruto@gmail.com', '0123456771', '0', NULL, 'Thế giới cartoon', 0, '20230107-naruto-jutsu-555x555.webp', 1),
(111, 'sa', '123456', 'sasuke', 'sasuke@gmail.com', '0123456770', '0', NULL, 'naa', 0, 'naruto-sasuke.jpg', 1),
(112, 'do', '123456', 'doraemon', 'doraemon@gmail.com', '0123456699', '0', NULL, 'Nước ngoài', 0, 'Doraemon_character.png', 1),
(113, 'no', '123456', 'nobita', 'nobita@gmail.com', '0123456768', '0', NULL, 'Nước ngoài', 0, 'Nobita-1-game4v.png', 1),
(114, 'atoan', '123456', 'Trần Anh Toàn', 'toan21420@gmail.com', '0123456759', '0', NULL, 'TPHCM', 0, '', 1),
(115, 'tkiet', '555555', 'Đỗ Tuấn Kiệt', 'hoa48488474773@gmail.com', '0123456711', '0', NULL, 'Bến Tre', 0, 'deo-kinh-can-thuong-xuyen-tot-cho-mat-hay-nguoc-lai-tim-7-800x450.jpg', 1),
(116, 'kietdo', '555555', 'Kiệt Đỗ', 'hoa48488474773@gmail.com', '9876534256', '0', NULL, 'Bến Tre', 0, 'lienket.jpg', 1),
(117, 'mpink', '123456', 'mỹ pink', 'hongltmps28690@fpt.edu.vn', '8796543897', '0', NULL, 'Miền Nam', 0, 'tenmien.jpg', 1),
(118, 'hong', '123456', 'Hồng', 'hongltmps28690@fpt.edu.vn', '7648397650', '0', NULL, 'Miền Nam', 0, 'AT_001_detail1.jpg', 1),
(120, 'qui', '123456', 'Cao Văn Quí', 'qui@gmail.com', '6758493764', '0', NULL, 'Việt Nam', 0, '', 1),
(121, 'nithish', '123456', '', 'nithish@gmail.com', '', '0', NULL, '', 0, '', 1),
(122, 'nith', '123456', '', 'nithish@gmail.com', '', '0', NULL, '', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `ma_voucher` varchar(10) NOT NULL,
  `giamgia` double(10,2) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `dieukien` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `ma_voucher`, `giamgia`, `ngaybatdau`, `ngayketthuc`, `dieukien`) VALUES
(1, '0', 0.00, '2023-11-23', '2023-11-23', 10.00),
(2, 'giamgia', 10.00, '2023-12-03', '2024-01-30', 100000.00),
(3, 'chua', 24.00, '2023-12-21', '2024-01-04', 0.00),
(7, 'het', 20.00, '2023-11-26', '2023-12-05', 500000.00),
(8, 'dieukien', 10.00, '2023-11-26', '2023-12-28', 500000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_user` (`id_user`),
  ADD KEY `fk_cart_donhang` (`id_donhang`),
  ADD KEY `fk_cart_product` (`id_product`),
  ADD KEY `fk_cart_size` (`id_size`),
  ADD KEY `fk_cart_color` (`id_color`),
  ADD KEY `fk_cart_product_design` (`id_product_design`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_product` (`id_product`),
  ADD KEY `fk_comment_user` (`id_user`);

--
-- Indexes for table `dadung_voucher`
--
ALTER TABLE `dadung_voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dadungvoucher_voucher` (`id_voucher`),
  ADD KEY `fk_dadungvoucher_user` (`id_user`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_design_color` (`id_color`),
  ADD KEY `fk_design_size` (`id_size`),
  ADD KEY `fk_design_user` (`id_user`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_danhmuc` (`iduser`),
  ADD KEY `fk_donhang_voucher` (`id_voucher`);

--
-- Indexes for table `img_design`
--
ALTER TABLE `img_design`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_img_design_user` (`id_user`);

--
-- Indexes for table `img_product_color`
--
ALTER TABLE `img_product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=947;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT for table `img_product_color`
--
ALTER TABLE `img_product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_donhang` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
