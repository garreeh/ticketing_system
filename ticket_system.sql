-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 11:51 AM
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
-- Database: `ticket_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL DEFAULT '',
  `admin_password` varchar(255) NOT NULL,
  `admin_confirm_password` varchar(255) NOT NULL,
  `remember_me` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `admin_fullname`, `admin_email`, `admin_username`, `admin_password`, `admin_confirm_password`, `remember_me`, `created_at`) VALUES
(5, 'Garry Gajultos', 'gajultos.garry123@gmail.com', 'garry', '$2y$10$MB2KTayKcQmLWqEPb1HD0.8GCiSLvf0tnnxGMmxPKPPR.aqwUzC/a', 'FD4MOjssMn', NULL, '2023-12-28 22:09:16'),
(7, 'Bert Dela Cruz', 'testemail@gmail.com', 'test', '$2y$10$jX4y4u2kbpPalDZLdZWoMe2D.XwX/Po28o3LvMRVH2hvVgiBvRYK2', 'test', NULL, '2023-12-28 22:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `emp_users`
--

CREATE TABLE `emp_users` (
  `emp_id` int(11) NOT NULL,
  `emp_firstname` varchar(100) NOT NULL,
  `emp_lastname` varchar(100) NOT NULL,
  `emp_email` varchar(200) DEFAULT NULL,
  `emp_contact` varchar(11) NOT NULL,
  `emp_username` varchar(200) DEFAULT NULL,
  `emp_password` varchar(200) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_department` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `isSupervisor` varchar(200) DEFAULT 'No',
  `company_details` enum('Vetsolutions','Pendragon') DEFAULT NULL,
  `employment_status` enum('Terminated','Resigned','Inactive','Active') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `emp_users`
--

INSERT INTO `emp_users` (`emp_id`, `emp_firstname`, `emp_lastname`, `emp_email`, `emp_contact`, `emp_username`, `emp_password`, `user_type_id`, `user_department`, `employee_id`, `isSupervisor`, `company_details`, `employment_status`) VALUES
(1, 'Mayem', 'Yao', 'admin@pendragonvet.com', '09698797891', 'Mayem', 'mimiRocks081677', 1, 'Admin', 1, 'Yes', 'Pendragon', 'Active'),
(2, '', 'Cruz', 'help@vetaidonline.info', '09178737283', 'Ronnel', 'test1005', 1, 'Admin', 2, 'No', 'Vetsolutions', 'Active'),
(3, '', 'acejalado', 'shella@test', '00000000000', 'Shella', 'shellapendragon', 1, 'Admin', 3, 'No', 'Pendragon', 'Terminated'),
(4, '', 'Aquino', 'sample@gmail.com', '11111111111', 'Jaz', 'jazpendragon88', 1, 'Admin', 4, 'Yes', 'Pendragon', 'Active'),
(18, '', 'Account', 'test@sample.com', '11111111111', 'garreeh', 'test1005', 1, 'Admin', 16, 'No', 'Pendragon', 'Inactive'),
(19, '', 'Corpuz', '', '09282268191', 'Michelle ', 'WBjAsHxp', 4, 'Employee', 17, 'No', 'Vetsolutions', 'Active'),
(20, '', 'Corpuz', '', '09282268191', 'Michelle ', 'QF1VdUEs', 4, 'Employee', 18, 'No', 'Vetsolutions', 'Resigned'),
(24, '', 'Guantero', 'guanteroa@gmail.com', '09508636113', 'April Gladys', 'zQWy68cC', 4, 'Employee', 22, 'No', 'Vetsolutions', 'Inactive'),
(25, '', 'Olitres', 'olitresmichelleann@yahoo.com', '09264100127', 'Michelle Ann ', 'wnSAaQCF', 4, 'Employee', 23, 'No', 'Pendragon', 'Active'),
(26, '', 'Test', 'test@gmail.com', '11111111111', 'Test', 'w2ZAcWVo', 4, 'Employee', 24, 'No', 'Pendragon', 'Inactive'),
(27, '', 'Bonilla', 'rheena_bonilla@yahoo.com', '09657023178', 'Rheena Mae ', 'V9PfQEUL', 2, 'Supervisor', 25, 'Yes', 'Pendragon', 'Active'),
(28, '', 'Danaguel', 'MARKNILDANAGUIL@gmail.com', '09501507179', 'Marknil', 'x2JARuMq', 4, 'Employee', 26, 'No', 'Pendragon', 'Resigned'),
(29, '', 'Dupingay', 'ruthdiana_08@yahoo.com', '09774265283', 'Ruth Diana', 'BVq6uZYj', 6, 'Doctor', 27, 'Yes', 'Pendragon', 'Active'),
(30, '', 'Garing', 'patricia_garing@gmail.com', '09281458535', 'Patricia ', 'QTfXCEkS', 7, 'Head Nurse', 28, 'Yes', 'Pendragon', 'Active'),
(31, '', 'Gan', 'reenamaegan@gmail.com', '09275610061', 'Reena Mae', 'QJt1EueP', 4, 'Nurse', 29, 'No', 'Pendragon', 'Terminated'),
(32, '', 'Galera ', 'daphnegalera@gmail.com', '09178340928', 'Daphne', 'eRQXqdHK', 6, 'Doctor', 30, 'Yes', 'Pendragon', 'Active'),
(33, '', 'Magpantay ', 'michaelmagpantay17@yahoo.com', '09109491462', 'Michael', 'tTYcPFHl', 4, 'Employee', 31, 'No', 'Pendragon', 'Active'),
(34, '', 'Mecos', 'mecos231992@gmail.com', '09756036501', 'Prenciss Camille', 'QiOqsawF', 4, 'Employee', 32, 'No', 'Pendragon', 'Terminated'),
(35, '', 'Pagtalunan', 'layalee10@gmail.com', '09152728526', 'Felix Toni', '9QHha51f', 4, 'Employee', 33, 'No', 'Pendragon', 'Inactive'),
(36, '', 'Tanay', 'cristinatanay@gmail.com', '09384421744', 'Ma. Cristina', 'UwCeDSfs', 4, 'Employee', 34, 'No', 'Vetsolutions', 'Inactive'),
(37, '', 'Toledo', 'toledojonel557@gmail.com', '09991050748', 'Junil', '8x1eDkmc', 4, 'Employee', 35, 'No', 'Pendragon', 'Terminated'),
(38, '', 'Ngo', 'NONE', '09255588980', 'Jacqueline', 'o29TDY4U', 2, 'Employee', 36, 'No', 'Vetsolutions', 'Active'),
(39, '', 'Ngo', 'NONE', '09255588898', 'Jac', '2023jac', 4, 'Employee', 37, 'No', 'Vetsolutions', 'Active'),
(40, '', 'Tolledo', 'biancatolledo07@gmail.com', '0932-323902', 'Fatima Bianca', 'ronpogi', 8, 'Accounting', 38, 'Yes', 'Pendragon', 'Active'),
(41, '', 'Dumalag', 'sherryjoyd@gmail.com', '09672881748', 'Sherry Joy', 'vA7mzSR5', 4, 'Employee', 39, 'No', 'Pendragon', 'Inactive'),
(42, '', 'Achay', 'jesaachay28@gmail.com', '09199003613', 'Rosa Jesabel', 'oaN3KcVl', 4, 'Employee', 40, 'No', 'Vetsolutions', 'Resigned'),
(43, '', 'Alarcio', 'NA', '09465021597', 'Aljon ', '2t9YloT7', 4, 'Employee', 41, 'No', 'Pendragon', 'Inactive'),
(44, '', 'Hindang', 'aronpaulhindang27@gmail.com', '09759858379', 'Aron', 'akmvq', 4, 'Employee', 42, 'No', 'Vetsolutions', 'Resigned'),
(48, '', 'Mauricio', 'desmonddoss26@gmail.com', '09953549660', 'Markus Desmond', 'VgtPBnFz', 4, 'Employee', 46, 'No', 'Vetsolutions', 'Terminated'),
(49, '', 'Acojedo', 'NA', '09652045803', 'Marven', '9WDapXtc', 4, 'Employee', 47, 'No', 'Pendragon', 'Inactive'),
(50, '', 'Penilla', 'NA', 'NA', 'Karen ', 'r1d2y3Mh', 4, 'Employee', 48, 'No', 'Vetsolutions', 'Inactive'),
(51, '', 'Bautista', 'mtbautista98@gmail.com', '09260453715', 'Matthew Lorenz ', 'Io2sNSCk', 4, 'Employee', 49, 'No', 'Pendragon', 'Terminated'),
(53, '', 'Aquino', 'jaz88aquino@gmail.com', '09999962684', 'Jasmine', 'FyXReazx', 1, 'Admin', 51, 'No', 'Vetsolutions', 'Active'),
(54, '', 'Aquino', 'jaz88aquino@gmail.com', '09999962684', 'Jasmine', 'Mb0FQCJ5', 1, 'Admin', 52, 'No', 'Vetsolutions', 'Active'),
(56, 'Juriel Ann', 'Balorio', 'jurielannbalorio@gmail.com', '0919630317', 'Juriel Ann', 'f1b29', 4, 'Employee', 53, 'No', 'Pendragon', 'Resigned'),
(57, '', '', NULL, '', NULL, NULL, 0, '', 0, 'No', NULL, 'Active'),
(58, 'Beverly', 'Francia', 'bhevlouie51714@gmail.com', '09455480217', 'Beverly', 'b3c1e', 4, '', 54, 'No', 'Vetsolutions', 'Terminated'),
(59, 'Georgelyn', 'Baguinat', 'bgeorgelyn@gmail.com', '09459971796', 'Georgelyn', '26a5d', 4, '', 55, 'No', 'Vetsolutions', 'Inactive'),
(60, 'Rusty', 'Atip', 'atiprusty218@gmail.com', '09127754736', 'Rusty', '48100', 4, '', 56, 'No', 'Pendragon', 'Resigned'),
(61, 'Russel', 'Regio', 'mandara12regio@gmail.com', '09085901274', 'Russel', '31159', 4, '', 57, 'No', 'Pendragon', 'Resigned'),
(62, 'Corisa ', 'Virata', 'ckvirata@yahoo.com', '09369852009', 'Corisa ', 'c706d', 7, '', 58, 'No', 'Pendragon', 'Active'),
(63, 'Anna Luisa', 'Faronilo', 'luisa.faronilo@gmail.com', '09095737612', 'Anna', 'eeaaa', 4, '', 59, 'No', 'Pendragon', 'Resigned'),
(65, 'Aimee', 'Bornilla', 'aimeebornillavetaid@gmail.com', '09151272434', 'Aimee', '403e6', 4, '', 60, 'No', 'Pendragon', 'Active'),
(66, 'May ', 'Valera', 'paramibebe14@yahoo.com', '09989968629', 'May ', '8af0e', 6, '', 61, 'No', 'Pendragon', 'Inactive'),
(67, 'Julienne', 'Ngatiyon', 'jkngatiyon@gmail.com', '09364054898', 'Julienne', 'ea13f', 4, '', 62, 'No', 'Pendragon', 'Terminated'),
(68, 'Roque', '', 'taghaproque24@gmail.com', '09612284051', 'Roque', 'fcafa', 4, '', 63, 'No', 'Vetsolutions', 'Terminated'),
(69, 'Roque', 'Taghap', 'taghaproque24@gmail.com', '09612284051', 'Roque', '8606a', 4, '', 64, 'No', 'Pendragon', 'Inactive'),
(70, 'Khevin Mark', 'Ranque', 'khevin_1523@yahoo.com', '', 'Khevin', '3ed4e', 4, '', 65, 'No', 'Pendragon', 'Terminated'),
(71, 'Jaquilyn ', 'Kengay', 'kengayjaqui@gmail.com', '09057027069', 'Jaquilyn ', '10ee3', 4, '', 66, 'No', 'Vetsolutions', 'Terminated'),
(72, 'Donabelle ', 'Corpuz', 'dhonnacorpuz24@gmail.com', '09270899728', 'Donabelle ', '3c344', 4, '', 67, 'No', 'Vetsolutions', 'Terminated'),
(73, 'kristine Anne', 'Moya', 'kristineannevmoya@gmail.com', '09461447800', 'Kristine', '5ad88', 4, '', 68, 'No', 'Vetsolutions', 'Terminated'),
(74, 'Jaime', 'Arcillas JR.', '', '', 'Jaime', '86cad', 4, '', 69, 'No', 'Pendragon', 'Terminated'),
(75, 'Chessa Marie', 'Escober', '', '09994477067', 'Chessa', '831a5', 1, '', 70, 'No', 'Pendragon', 'Active'),
(76, 'Kathelyn', 'Gabiola', 'Kathgwengabiola@gmail.com', '09368208731', 'Kathelyn', '30579', 4, '', 71, 'No', 'Vetsolutions', 'Inactive'),
(77, 'Marjon ', 'Miguela', '', '09610953289', 'Marjon ', 'b0fba', 4, '', 72, 'No', 'Pendragon', 'Inactive'),
(78, 'Vince neil', 'GarcuÃ±o', '', '09354391541', 'Vince neil', '57026', 4, '', 73, 'No', 'Pendragon', 'Terminated'),
(79, 'Richard', 'Abesamis', '', '09754702746', 'Richard', '58079', 4, '', 74, 'No', 'Pendragon', 'Terminated'),
(80, 'Kristine Anne', 'Josef', 'anne011010@gmail.com', '09452019783', 'Kristine', '96f08', 4, '', 75, 'No', 'Vetsolutions', 'Terminated'),
(81, 'Baby Hannah ', 'Daton', 'datonhannah@gmail.com', '09614232042', 'Baby Hannah ', '4d3e0', 4, '', 76, 'No', 'Vetsolutions', 'Inactive'),
(82, 'Marilou', 'Jacobe', 'erzaian024@gmail.com', '09366636568', 'Marilou', 'f500a', 4, '', 77, 'No', 'Vetsolutions', 'Terminated'),
(83, 'Justin Demielle ', 'Domingo', 'justindemielledomingo@gmail.com', '09325424377', 'Justin', 'db6d8', 4, '', 78, 'No', 'Pendragon', 'Inactive'),
(84, 'Vinerich', 'Vinluan', '', '', 'Vinerich', '5a164', 4, '', 79, 'No', 'Pendragon', 'Resigned'),
(85, 'Clark', 'Sanchez', 'Clarksanchez24@gmail.com', '09187298552', 'Clark', '1790f', 4, '', 80, 'No', 'Pendragon', 'Resigned'),
(86, 'Marlou', 'Ronato', '', '09568657876', 'Marlou', '9247a', 4, '', 81, 'No', 'Pendragon', 'Resigned'),
(87, 'Joanne ', 'Villacampa', 'joanne.villacampa97@gmail.com', '09511880563', 'Joanne ', '7181d', 4, '', 82, 'No', 'Pendragon', 'Resigned'),
(88, 'Reynaldo', 'Alinsunurin', 'reymima11@gmail.com', '09975542875', 'Reynaldo', 'ce29d', 4, '', 83, 'No', 'Pendragon', 'Terminated'),
(89, 'Emmanuel', 'Evoces', 'Evocese@gmail.com', '09097320637', 'Emmanuel', '4d926', 4, '', 84, 'No', 'Pendragon', 'Resigned'),
(90, 'Analiza', '', '', '', 'Analiza', 'e7cb4', 4, '', 85, 'No', 'Pendragon', 'Inactive'),
(91, 'Apple', 'Bello', '', '09614380625', 'Apple', 'ad6da', 4, '', 86, 'No', 'Pendragon', 'Inactive'),
(92, 'Tyessa', 'Lordan', '', '', 'Tyessa', 'f9171', 4, '', 87, 'No', 'Pendragon', 'Terminated'),
(93, 'Llana Jenica', 'Samper', '', '', 'Llana', '83b3e', 4, '', 88, 'No', 'Pendragon', 'Terminated'),
(94, 'Sergio', 'Soner', '', '', 'Sergio', '9a4a9', 4, '', 89, 'No', 'Pendragon', 'Inactive'),
(95, 'Jasmine Joy', 'Jacosalem', '', '', 'Jasmine Joy', '37ca4', 4, '', 90, 'No', 'Pendragon', 'Inactive'),
(96, 'John Gabriel', 'Cruz', 'johnnydeet264@gmail.com', '09283565706', 'John', 'b050d', 4, '', 91, 'No', 'Vetsolutions', 'Inactive'),
(97, 'Cherrydee', 'Enriquez', 'cherrydee.enriquez18@gmail.com', '09613084712', 'Cherrydee', '6b705', 4, '', 92, 'No', 'Pendragon', 'Inactive'),
(98, 'Kimberly', 'Reginaldo', 'Kimseokji0424@gmail.com', '09636713664', 'Kimberly', 'c74f6', 4, '', 93, 'No', 'Pendragon', 'Inactive'),
(99, 'Jeany Claire', 'Bulan', 'Jandiclaire20@gmail.com', '09387719464', 'Jeany Claire', 'af8eb', 4, '', 94, 'No', 'Vetsolutions', 'Inactive'),
(100, 'Winard', 'Cabujoc', 'winardcabujoc23@gmail.com', '09674227221', 'Winard', '8a303', 4, '', 95, 'No', 'Pendragon', 'Inactive'),
(101, 'Renato', 'Acido JR.', '', '09306641147', 'Renato', 'd5330', 4, '', 96, 'No', 'Pendragon', 'Terminated'),
(102, 'Vijaya', 'Nacionales ', 'nacionalesvijaya@gmail.com', '09984053580', 'Vijaya', '8b9d9', 4, '', 97, 'No', 'Vetsolutions', 'Terminated'),
(103, 'Kimberlyn ', 'Valdriz', 'kimy.kyv@gmail.com', '09685410043', 'Kimberlyn ', '9e953', 4, '', 98, 'No', 'Vetsolutions', 'Inactive'),
(104, 'Maricris', 'Pedraza', 'Chrispedz@gmail.com', '09066505790', 'Maricris', 'dff12', 4, '', 99, 'No', 'Vetsolutions', 'Terminated'),
(105, 'John Gabriel', 'Cruz', '', '', 'John Gabriel', '03b4e', 4, '', 100, 'No', 'Vetsolutions', 'Inactive'),
(106, 'Joshua', 'Eguna', 'egunajoshua00@gmail.com', '09564825665', 'Joshua', 'c6229', 4, '', 101, 'No', 'Pendragon', 'Inactive'),
(107, 'Roy', 'Burce', 'kapuroyburce@yahoo.com', '09630074720', 'Roy', '7ad1c', 4, '', 102, 'No', 'Pendragon', 'Resigned'),
(108, 'Mark', 'Gamotin', 'markgamotin12111999@gmail.com', '09058392082', 'Mark', 'f39bc', 4, '', 103, 'No', 'Pendragon', 'Inactive'),
(109, 'Ferdinand', 'Alata', 'alataferdinand30@gmail.com', '09066092639', 'Ferdinand', '0e795', 4, '', 104, 'No', 'Pendragon', 'Inactive'),
(110, 'Roselyn', 'Tobes', 'Rosepahayahay27@gmail.com', '09637748336', 'Roselyn', 'a03c6', 4, '', 105, 'No', 'Vetsolutions', 'Inactive'),
(111, 'Enciso', 'Carlo', '', '09665533232', 'Enciso', '075f9', 4, '', 106, 'No', 'Pendragon', 'Terminated'),
(112, 'Maurice', 'Torres', '', '09352305645', 'Maurice', 'ba196', 4, '', 107, 'No', 'Pendragon', 'Inactive'),
(113, 'Rowena ', 'Samson', '', '09658575596', 'Rowena ', 'b1998', 4, '', 108, 'No', 'Pendragon', 'Inactive'),
(114, 'Perlito', 'Delantar', '', '09632724901', 'Perlito', '0151d', 4, '', 109, 'No', 'Pendragon', 'Inactive'),
(115, 'John Felix', 'Gutierrez', 'ivesgutierrez22@gmail.com', '09170551297', 'John', '09c18', 4, '', 110, 'No', 'Pendragon', 'Terminated'),
(116, 'Abigail', 'Sarasin', '', '09458169546', 'Abigail', 'd615a', 4, '', 111, 'No', 'Vetsolutions', 'Inactive'),
(117, 'Ryan', 'Tecson', '', '09508267136', 'Ryan', '3c579', 4, '', 112, 'No', 'Pendragon', 'Inactive'),
(118, 'Bernadette', 'Pagela ', 'bernadettepagela@gmail.com', '09557912524', 'Bernadette', 'be278', 4, '', 113, 'No', 'Vetsolutions', 'Inactive'),
(119, 'Emma', 'Alvarez', '', '09100686278', 'Emma', 'a9428', 4, '', 114, 'No', 'Pendragon', 'Inactive'),
(120, 'Vincent', 'Tubongbanua', '', '09617827898', 'Vincent', 'f3939', 4, '', 115, 'No', 'Pendragon', 'Inactive'),
(121, 'Dyna ', 'Samulde', '', '09163326640', 'Dyna', '8b33d', 4, '', 116, 'No', 'Pendragon', 'Inactive'),
(122, 'Gereme', 'Amo', 'amogereme@gmail.com', '09460317255', 'Gereme', '740fa', 4, '', 117, 'No', 'Vetsolutions', 'Inactive'),
(123, 'John Lemark', 'Benedicto', '', '09070711680', 'John Lemark', '526bf', 4, '', 118, 'No', 'Pendragon', 'Inactive'),
(124, 'Mhariz', 'Abila', 'Mhariz2169@gmail.com', '09512852539', 'Mhariz', 'd6598', 4, '', 119, 'No', 'Vetsolutions', 'Inactive'),
(125, 'Leanne', 'Banal', 'daleannemo@gmail,com', '09169348452', 'Leanne', 'b65aa', 4, '', 120, 'No', 'Vetsolutions', 'Inactive'),
(126, 'Urgel', 'Ameri', 'ameriurgel@gmail.com', '09472609925', 'Urgel', '9f569', 4, '', 121, 'No', 'Vetsolutions', 'Inactive'),
(127, 'Zaldy ', 'Tabios', '', '09061063204', 'Zaldy ', '00912', 4, '', 122, 'No', 'Pendragon', 'Inactive'),
(128, 'James', 'De Jesus', 'jamesdejesus12301@gmail.com', '09459911490', 'James', 'bfa07', 4, '', 123, 'No', 'Pendragon', 'Inactive'),
(129, 'Edghie Malyn', 'Evangelista', 'edghiemalynevangelista@yahoo.com', '09619778557', 'Edghie Malyn', 'eaaa5', 4, '', 124, 'No', 'Vetsolutions', 'Inactive'),
(130, 'Jayson', 'Lanic', 'azorjayson.1999@gmail.com', '09668190913', 'Jayson', '21495', 4, '', 125, 'No', 'Pendragon', 'Inactive'),
(131, 'Edna', 'Manabat', 'ecmapril@gmail.com', '09056325264', 'Edna', '5e8ef', 4, '', 126, 'No', 'Pendragon', 'Active'),
(132, 'Christopher', 'Bajao', 'megredy_23@yahoo.com', '09358547141', 'Christopher', '8f1cd', 4, '', 127, 'No', 'Pendragon', 'Terminated'),
(133, 'Avelino', 'Robillos', 'Robillosavelino123@gmail.com', '09083044152', 'Avelino', 'c9bf5', 4, '', 128, 'No', 'Pendragon', 'Terminated'),
(134, 'Mhavel', 'Libranda', 'malibranda@gmail.com', '09610390815', 'Mhavel', 'f9776', 4, '', 129, 'No', 'Pendragon', 'Active'),
(135, 'Jiemavel', 'Cipcon', 'jiemavelcipcon@gmail.com', '09067093547', 'Jiemavel', '32d54', 4, '', 130, 'No', 'Vetsolutions', 'Inactive'),
(136, 'Dennis ', 'Jose', 'Dj6355221@gmail.com', '09606966621', 'Dennis', 'ce5ae', 4, '', 131, 'No', 'Pendragon', 'Resigned'),
(137, 'Romel', 'De Jesus', 'Roberdejesus47479@gmail.com', '09668930478', 'Romel', '17317', 4, '', 132, 'No', 'Pendragon', 'Inactive'),
(138, 'Flordelize', 'Alforque', '', '09567944417', 'Flordelize', '8b44e', 4, '', 133, 'No', 'Vetsolutions', 'Terminated'),
(139, 'Ma. Jell Lysa', 'Conception', 'jell.conception@yahoo.com', '09065725573', 'Ma. Jell Lysa', 'ff67a', 4, '', 134, 'No', 'Pendragon', 'Resigned'),
(140, 'Maria Pilar', '', '', '', 'Maria Pilar', '385fb', 4, '', 135, 'No', 'Pendragon', 'Inactive'),
(141, 'Maria Pilar', 'Hamor', 'mariahamor628@gmail.com', '09190955119', 'Maria Pilar', 'cc0c6', 4, '', 136, 'No', 'Pendragon', 'Inactive'),
(142, 'Joh Rafael', 'Agliam', '', '', 'Joh Rafael', 'c10fd', 4, '', 137, 'No', 'Pendragon', 'Inactive'),
(143, 'Aldrin', 'Arcilla', 'princeadrian04@gmail.com', '09108406509', 'Aldrin', 'd724a', 4, '', 138, 'No', 'Pendragon', 'Terminated'),
(144, 'Christopher', 'Beringa', '', '09212895104', 'Christopher', 'a75af', 4, '', 139, 'No', 'Pendragon', 'Terminated'),
(145, 'Dayanara ', 'Torres', 'msdayanaratorres@gmail.com', '09153440391', 'Dayanara ', 'f20c0', 4, '', 140, 'No', 'Pendragon', 'Inactive'),
(146, 'Shara Jane ', 'Tandaan', '011794', '09075751577', 'Shara Jane ', 'cdb0c', 4, '', 141, 'No', 'Pendragon', 'Inactive'),
(147, 'Victor Angelo', '150', '', '09164729564', 'Victor Angelo', '782b7', 4, '', 142, 'No', 'Pendragon', 'Inactive'),
(148, 'Zeiven ', 'Delas Alas JR.', '', '09510159172', 'Zeiven ', 'ee468', 4, '', 143, 'No', 'Pendragon', 'Inactive'),
(149, 'Jan Carlos', 'Castilo', 'jancastilo12@gmail.com', '09255330787', 'Jan Carlos', 'fade7', 4, '', 144, 'No', 'Pendragon', 'Inactive'),
(150, 'Alvin', 'Operio', '', '09654166965', 'Alvin', '0dec8', 4, '', 145, 'No', 'Pendragon', 'Terminated'),
(151, 'Jonathan ', 'Pascua', 'pascuajonathan29@gmail.com', '09357249396', 'Jonathan ', 'f8969', 4, '', 146, 'No', 'Pendragon', 'Inactive'),
(152, 'Jerick ', 'Mercado', '', '09124214554', 'Jerick ', '9e486', 4, '', 147, 'No', 'Pendragon', 'Inactive'),
(153, 'Alma', 'Navidad', '', '09462044160', 'Alma', '12aea', 4, '', 148, 'No', 'Pendragon', 'Inactive'),
(154, 'Jessa Krisha', 'Ancheta', '', '09488256029', 'Jessa', 'b38d8', 4, '', 149, 'No', 'Pendragon', 'Inactive'),
(156, 'Rose Lyn', 'Brin', 'Roselynbrin006@gmail.com', '09129036710', 'Rose', '4b864', 4, '', 151, 'No', 'Vetsolutions', 'Inactive'),
(158, 'Mary Joyce', 'Jardinico', 'mjoycejardinico@gmail.com', '09234468475', 'Mary', '743c8', 4, '', 153, 'No', 'Pendragon', 'Inactive'),
(159, 'Eva May', 'Cabaluna', 'mhaynacorda@gmail.com', '09993473604', 'Eva', '682a1', 4, '', 152, 'No', 'Vetsolutions', 'Inactive'),
(160, 'Jude Micheal', 'Jalalon', '', '09665502243', 'Jude Micheal', '92b3f', 4, '', 154, 'No', 'Pendragon', 'Inactive'),
(161, 'Richel ', 'Villanueva', 'miriku08_v01@yahoo.com', '09295145811', 'Richel ', 'bffe1', 4, '', 155, 'No', 'Pendragon', 'Inactive'),
(162, 'Kimberly Joy', 'Abad', 'Khimabad07061989', '09983951513', 'Kimberly Joy', '39e9d', 4, '', 156, 'No', 'Pendragon', 'Inactive'),
(163, 'Moji', 'Casenares', 'mojicasenares@gmail.com', '09184942684', 'Moji', '11c23', 4, '', 157, 'No', 'Pendragon', 'Inactive'),
(164, 'Queen Marie', 'Raganas', '', '09123917362', 'Queen', '9f183', 4, '', 158, 'No', 'Pendragon', 'Active'),
(165, 'Annaliza', 'Delos Reyes', 'analizadelosreyes19@gmail.com', '09359895414', 'Annaliza', 'b3442', 4, '', 159, 'No', 'Pendragon', 'Inactive'),
(166, 'Sunshine', 'Esperanza', 'shaneesperanza06@gmail.com', '09126804014', 'Sunshine', '49883', 4, '', 160, 'No', 'Pendragon', 'Active'),
(167, 'Debbie', 'Carranceja', 'dave.carranceja@gmail.com', '09305852511', 'Debbie', 'b0331', 1, '', 161, 'No', 'Pendragon', 'Inactive'),
(168, 'Niel Francis', 'Aurelio', 'Martinaureliofrancis@gmail.com', '09291948455', 'Niel Francis', '237fe', 4, '', 162, 'No', 'Pendragon', 'Inactive'),
(169, 'Mikaela Ross', 'Jacobe', 'mirojacobe@gmail.com', '09230858971', 'Mikaela', 'bea74', 4, '', 163, 'No', 'Pendragon', 'Terminated'),
(170, 'Sheila Mei', 'Said', '', '', 'Sheila', 'b5887', 4, '', 164, 'No', 'Pendragon', 'Terminated'),
(171, 'Francisco', 'Gaffud', '', '', 'Francisco', '47229', 4, '', 165, 'No', 'Pendragon', 'Active'),
(172, 'Shaina', 'Mercado', 'imshainamercado17@gmail.com', '09461970932', 'Shaina', '71a88', 4, '', 166, 'No', 'Pendragon', 'Inactive'),
(173, 'Michael ', 'Barrera', '', '', 'Michael ', '31615', 4, '', 167, 'No', 'Pendragon', 'Inactive'),
(174, 'Abigail', 'Rayos', 'rayosmiyukifaith@gmail.com', '09693207730', 'Abigail', '53aa8', 4, '', 168, 'No', 'Vetsolutions', 'Terminated'),
(175, 'Argie', 'Basanez', 'argiebasanez1999@gmail.com', '09273955954', 'Argie', '115f1', 4, '', 169, 'No', 'Pendragon', 'Inactive'),
(176, 'Jocel', 'Pabelonia', 'jocelpabelonia22@gmail.com', '09203485361', 'Jocel', 'e281a', 4, '', 170, 'No', 'Vetsolutions', 'Inactive'),
(177, 'Maria Paulyn ', 'Gatallo', 'gmariapaulyn@gmail.com', '09104921774', 'Paulyn', '37ec7', 4, '', 171, 'No', 'Vetsolutions', 'Terminated'),
(178, 'Ariel', 'Jose', '', '', 'Ariel', '1fb41', 4, '', 172, 'No', 'Pendragon', 'Inactive'),
(179, 'Jessica', 'Guido', '', '', 'Jessica', '8c7c8', 4, '', 173, 'No', 'Vetsolutions', 'Inactive'),
(180, 'Celeste', 'Villanueva', '', '', 'Celeste', '2f828', 4, '', 174, 'No', 'Vetsolutions', 'Inactive'),
(181, 'RENANTE', 'AMABA', 'amabarenante@gmail.com', '09051912392', 'RENANTE', '896cb', 4, '', 175, 'No', 'Vetsolutions', 'Inactive'),
(182, 'Maria Ana Isabel', 'Calces', '', '', 'Isabel', 'e499a', 4, '', 176, 'No', 'Pendragon', 'Terminated'),
(183, 'Anamae ', 'Capito', 'capitoanname@yahoo.com', '09092474901', 'Anamae ', '59849', 4, '', 177, 'No', 'Pendragon', 'Active'),
(184, 'Janetshane', 'Dela Cruz', 'janetshanedelacruz@gmail.com', '09277716834', 'Janetshane', 'd3c26', 4, '', 178, 'No', 'Pendragon', 'Active'),
(185, 'Leslie', 'Arabia', 'miagaleslie@gmail.com', '09563820957', 'Leslie', 'ee9b5', 4, '', 179, 'No', 'Pendragon', 'Active'),
(186, 'Jasmine', 'NuÃ±ez', 'lavienjolie@gmail.com', '09976216928', 'Jasmine', '7149b', 4, '', 180, 'No', 'Pendragon', 'Inactive'),
(187, 'Maria Katrina', 'LoreÃ±ana', 'katrinahutalla14@gmail.com', '09204684453', 'Katrina', '2ddd7', 4, '', 181, 'No', 'Vetsolutions', 'Terminated'),
(188, 'Sarah Jane ', 'Ramos', 'sarahjane.ramos.353@gmail.com', '09265156588', 'Sarah', '0873b', 4, '', 182, 'No', 'Vetsolutions', 'Inactive'),
(189, 'Aljes', 'Navales', 'Aljesmutia@gmail.com', '09162915434', 'Aljes', '9ba5a', 4, '', 183, 'No', 'Pendragon', 'Inactive'),
(190, 'Mica Krystel', 'Mendoza', 'mendoza.micakrystel@gmail.com', '09760261553', 'Mica Krystel', 'e0f93', 4, '', 184, 'No', 'Pendragon', 'Inactive'),
(191, 'Angelica', 'Polis', 'anhelica.polis99@gmail.com', '09658222025', 'Angelica', '09fe7', 4, '', 185, 'No', 'Pendragon', 'Inactive'),
(192, 'Princess Ira ', 'Bertuldes', '', '09452106130', 'Princess', 'd9748', 4, '', 186, 'No', 'Pendragon', 'Inactive'),
(193, 'Frances Ysabelle ', 'Capiz', 'capizfrances@gmail.com', '09065117516', 'Frances', '21a8a', 4, '', 187, 'No', 'Pendragon', 'Resigned'),
(194, 'Michaela', 'Cabaluna', 'mikeecabaluna08@gmail.com', '09278731149', 'Michaela', '40dfb', 4, '', 188, 'No', 'Pendragon', 'Inactive'),
(195, 'Shelly Denise ', 'Go', 'shellygo17@gmail.com', '09998469211', 'Shelly', '41f1e', 4, '', 189, 'No', 'Vetsolutions', 'Inactive'),
(196, 'Juanivel', 'Rodriguez', 'rodriguezjuanivel@gmail.com', '09318515929', 'Juanivel', 'adc42', 4, '', 190, 'No', 'Vetsolutions', 'Terminated'),
(197, 'Maria Doneca', 'Pale', 'dpale15@gmail.com', '09505183136', 'Maria', '4e10a', 4, '', 191, 'No', 'Vetsolutions', 'Terminated'),
(198, 'Irene', 'De Leon', 'rreileel@gmail.com', '09216682132', 'Irene', 'e2fff', 4, '', 192, 'No', 'Pendragon', 'Terminated'),
(199, 'April', 'Boquiron ', 'aprilboquiron@gmail.com', '09672834368', 'April', 'ae92c', 4, '', 193, 'No', 'Pendragon', 'Terminated'),
(200, 'Rica Mae', 'Roque', 'ricasroque@gmail.com', '09673118555', 'Rica Mae', '33ace', 9, 'Cashier Supervisor', 194, 'Yes', 'Pendragon', 'Active'),
(201, 'Ronie', 'Pastor', 'pastorronie11@yahoo.com', '09468015444', 'Ronie', '84769', 4, '', 195, 'No', 'Pendragon', 'Terminated'),
(202, 'Jeneveave', 'Brian ', '', '', 'Jeneveave', 'bc7ed', 4, '', 196, 'No', 'Pendragon', 'Inactive'),
(203, 'Analyn ', 'Porgas', 'analynporgas16@yahoo.com', '09154218729', 'Analyn ', '9aa27', 4, '', 197, 'No', 'Pendragon', 'Terminated'),
(204, 'Jun', 'Alvarez', '', '', 'Jun', '58ac3', 4, '', 198, 'No', 'Pendragon', 'Terminated'),
(205, 'RODEL ', 'ALIPIO', '', '09946341465', 'RODEL', '62d74', 4, '', 199, 'No', 'Pendragon', 'Terminated'),
(206, 'JOYLYN ', 'ATOK', 'jfatok.hilcres@gmail.com', '09453104948', 'JOYLYN ', '43162', 4, '', 200, 'No', 'Vetsolutions', 'Inactive'),
(207, 'Necole', 'Bugayong', 'necolebugayong1996@gmail.com', '09558921880', 'Necole', 'cb14d', 4, '', 201, 'No', 'Pendragon', 'Inactive'),
(208, 'Edralyn ', 'Alejo', '', '', 'Edralyn', '668a3', 4, '', 202, 'No', 'Pendragon', 'Terminated'),
(209, 'Sheila ', 'Flaviano', '', '', 'Sheila', '93cb2', 4, '', 203, 'No', 'Pendragon', 'Terminated'),
(210, 'Maria Haizel ', 'Dela Cruz', 'delacruzhaizel9@gmail.com', '09564407188', 'Haizel', 'fa1a2', 4, '', 204, 'No', 'Pendragon', 'Terminated'),
(211, 'Ranil', 'Gonzaga', 'ranilcruz666@gmail.com', '09519039085', 'Ranil', '4ed86', 4, '', 205, 'No', 'Vetsolutions', 'Inactive'),
(212, 'Jay Ann ', 'Colinares', '', '', 'Jay', 'e98d1', 4, '', 206, 'No', 'Vetsolutions', 'Inactive'),
(213, 'Leslie', 'Froyalde', 'froyaldeleslie96@gmail.com', '09306743328', 'Leslie', 'dcf9e', 4, '', 207, 'No', 'Vetsolutions', 'Inactive'),
(214, 'Marilou', 'Molina', 'marileo13@yahoo.com', '09098752722', 'Marilou', '7ce18', 4, '', 208, 'No', 'Vetsolutions', 'Inactive'),
(215, 'Lorhen Shane', 'Llaguno', 'lorhen.shane@gmail.com', '09277343269', 'Lorhen', '04fa6', 4, '', 209, 'No', 'Vetsolutions', 'Terminated'),
(216, 'Annalisa', '', '', '', 'Annalisa', 'e91ed', 4, '', 210, 'No', 'Vetsolutions', 'Terminated'),
(217, 'John Ryan ', 'Hechanova', 'Ryanbesin24@gmail.com', '09567290737', 'John', '3cab2', 4, '', 211, 'No', 'Pendragon', 'Inactive'),
(218, 'Jennylyn ', 'NaÃ±oz', 'nanozjennylyn@gmail.com', '09566037920', 'Jennylyn', '7142f', 4, '', 212, 'No', 'Pendragon', 'Active'),
(219, 'Bettina ', 'Gonzales ', 'innagonzales13@gmail.com', '09455980166', 'Bettina ', '4f547', 4, '', 213, 'No', 'Pendragon', 'Inactive'),
(220, 'Alexandrian ', 'Tomas', 'alexandriantomas15@gmail.com', '09382583438', 'Alexandrian ', '4ee92', 4, '', 214, 'No', 'Pendragon', 'Terminated'),
(221, 'Karen Joy ', 'QuiÃ±ones', '', '09602590780', 'Karen', '3c65b', 4, '', 215, 'No', 'Vetsolutions', 'Terminated'),
(222, 'Jane', 'Sibuyan ', 'elijahjean29@gmail.com', '09991299191', 'Jane', '0a667', 4, '', 216, 'No', 'Vetsolutions', 'Terminated'),
(223, 'Moonlee', 'Capiral', 'moonleecapiral427@yahoo.com', '09947698118', 'Moonlee', '538e8', 4, '', 217, 'No', 'Pendragon', 'Terminated'),
(224, 'Rea', 'Rogelio', 'yuri.yumie17@gmail.com', '09052863845', 'Rea', '023fa', 4, '', 218, 'No', 'Pendragon', 'Terminated'),
(225, 'Franklin', 'Valrea', 'vakerafranklin28@gmail.com', '09197242948', 'Franklin', '6b237', 4, '', 219, 'No', 'Pendragon', 'Terminated'),
(226, 'Alexis', 'Rufo', '', '09703509265', 'Alexis', '70bcc', 4, '', 220, 'No', 'Pendragon', 'Terminated'),
(227, 'Julie Ann ', 'Rebates', 'rebatesjulieann@gmail.com', '09707966517', 'Julie', 'fd5b6', 4, '', 221, 'No', 'Vetsolutions', 'Inactive'),
(228, 'Roger', 'Deguit', 'rogedeguit164@gmail.com', '09654852241', 'Roger', '21ceb', 4, '', 222, 'No', 'Pendragon', 'Active'),
(229, 'Renhard ', 'Berdijo', '', '09703433621', 'Renhard ', 'd543d', 4, '', 223, 'No', 'Pendragon', 'Terminated'),
(230, 'Lea Joy ', 'Cocjin', 'cocjin528@gmail.com', '09217234192', 'Lea', 'a889d', 4, '', 224, 'No', 'Pendragon', 'Active'),
(231, 'Shilyna', 'Auyong', 'auyongshilyna@gmail.com', '09321229634', 'Shilyna', '730c1', 4, '', 225, 'No', 'Vetsolutions', 'Active'),
(232, 'Bernadeth', 'Del Mundo', 'bernadethdelmundo87@gmail.com', '09770914891', 'Bernadeth', 'f633b', 4, '', 226, 'No', 'Vetsolutions', 'Resigned'),
(233, 'Jeffrey', 'Capellan', 'capellanjepoy1@gmail.com', '09497939766', 'Jeffrey', 'cba0c', 4, '', 227, 'No', 'Pendragon', 'Inactive'),
(234, 'Urbi', 'U.', 'julieannurbi05@gmail.com', '09650317321', 'Urbi', '8223a', 4, '', 228, 'No', 'Vetsolutions', 'Terminated'),
(235, 'Garry', 'Marfil', 'marfilgarry9@gmail.com', '09616100393', 'Garry', '07171', 4, '', 229, 'No', 'Pendragon', 'Terminated'),
(236, 'Rachel ', 'Hipolito', 'hipolitorachel888@gmail.com', '0991 419 11', 'Rachel', 'ee477', 4, '', 230, 'No', 'Pendragon', 'Terminated'),
(237, 'Roberto', 'Javellana', '', '09207378390', 'Roberto', '743aa', 4, '', 231, 'No', 'Pendragon', 'Active'),
(238, 'Lawrence John ', 'Gapul ', 'rencegapul@gmail.com', '09608117436', 'Lawrence', 'ce389', 4, '', 232, 'No', 'Pendragon', 'Active'),
(239, 'Maribel ', 'Bernabe', 'bernabemaribel10@gmail.com', '09516425516', 'Maribel', '0e91c', 4, '', 233, 'No', 'Vetsolutions', 'Inactive'),
(240, 'Bernadette ', 'Bernardino', 'bernagalvie11@gmail.com', '09197966083', 'Bernadette', 'b78d3', 4, '', 234, 'No', 'Pendragon', 'Active'),
(241, 'Melanie ', 'Sabanate', 'melaniesabanate08@gmail.com', '09994308947', 'Melanie', '48786', 4, '', 235, 'No', 'Pendragon', 'Inactive'),
(242, 'Johanna', 'Tendenilla', 'johannatendenilla221@gmail.com', '09675605961', 'Johanna', '7cb76', 4, '', 236, 'No', 'Pendragon', 'Active'),
(243, 'Hazel ', 'Turla', '', '', 'Hazel', 'f44b3', 4, '', 237, 'No', 'Pendragon', 'Active'),
(244, 'Alexander', 'Esponilla Jr.', '', '', 'Alexander', 'f2bcd', 4, '', 238, 'No', 'Pendragon', 'Active'),
(245, 'Marry Ann', 'Inocencio', 'maryanninocencio48@gmail.com', '09166865982', 'Marry', 'c954e', 4, '', 239, 'No', 'Vetsolutions', 'Terminated'),
(246, 'Angelica', 'Guzman', '', '09614115178', 'Angelica', '64579', 4, '', 240, 'No', 'Vetsolutions', 'Active'),
(247, 'Jeremy ', 'Talpe', 'jeremy.talpe11@gmail.com', '0930 107 84', 'Jeremy', '5e9c2', 4, '', 241, 'No', 'Pendragon', 'Inactive'),
(248, 'Jielou', 'Alcazar', 'jeloualcazar@gmail.com', '09068829304', 'Jielou', '7fc2c', 4, '', 242, 'No', 'Vetsolutions', 'Active'),
(249, 'Chris Cel', 'Agbisit ', '', '09266821133', 'Chris Cel', 'f36bf', 4, '', 243, 'No', 'Pendragon', 'Inactive'),
(250, 'Shella', 'Himarangan ', 'himaranganshella@gmail.com', '09912436149', 'Shella', '97cc8', 4, '', 244, 'No', 'Pendragon', 'Active'),
(251, 'Maria Cristina', 'Taguimacon', 'taguimacontina@gmail,com', '09171294312', 'Maria', 'fa56b', 4, '', 245, 'No', 'Pendragon', 'Active'),
(252, 'Maria Jessamae', 'Sebastian', 'jesa_sebastian@yahoo.com', '09501469506', 'Jessamae', 'd4565', 4, '', 246, 'No', 'Pendragon', 'Active'),
(253, 'Khristine ', 'Asiado', 'asiadokhristine9@gmail.com', '0961 156 04', 'Khristine', 'ea44b', 4, '', 247, 'No', 'Vetsolutions', 'Active'),
(254, 'Albert', 'Dela Cruz', 'albert.dela,cruz1896@gmail.com', '0905 526 62', 'Albert', '830f4', 4, '', 248, 'No', 'Pendragon', 'Inactive'),
(255, 'John Paul ', 'Baytamo', 'paulbaytamo@gmail.com', '09993288383', 'John', 'd489c', 4, '', 249, 'No', 'Pendragon', 'Active'),
(256, 'Garry ', 'Gajultos', 'gajultos.garry123@gmail.com', '09267453651', 'Garry', 'test', 4, '', 250, 'No', 'Pendragon', 'Active'),
(257, 'Jelo', 'Cervito', '', '', 'Jelo', '2411d', 4, '', 251, 'No', 'Vetsolutions', 'Active'),
(258, 'Joven Ken', 'Ongsitco', 'Ongsitcojovenken@gmail.com', '09567947968', 'Joven', '3ecd1', 4, '', 252, 'No', 'Pendragon', 'Active'),
(259, 'Jeffrey', 'Capellan', 'capellanjepoy1@gmail.com', '09497939766', 'Jeffrey', '4670f', 4, '', 253, 'No', 'Vetsolutions', 'Active'),
(260, 'Albert', 'Dela Cruz', 'albert.dela,cruz1896@gmail.com', '0905 526 62', 'Albert', 'c37e5', 4, '', 254, 'No', 'Vetsolutions', 'Active'),
(261, 'Rovilyn', 'De Vera', 'lhenlhendevera2@gmail.com', '09913927027', 'Rovilyn', 'd0b1c', 4, '', 255, 'No', 'Pendragon', 'Active'),
(262, 'Maribel', 'Paja', 'pajamaribel17@gmail.com', '09478532176', 'Maribel', 'e13a1', 4, '', 256, 'No', 'Vetsolutions', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `ticket_number` varchar(255) DEFAULT NULL,
  `ticket_category` varchar(255) DEFAULT NULL,
  `ticket_description` text DEFAULT NULL,
  `ticket_priority` enum('Normal','Priority','Urgent') DEFAULT NULL,
  `ticket_status` enum('Pending','Closed') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `emp_id`, `ticket_number`, `ticket_category`, `ticket_description`, `ticket_priority`, `ticket_status`, `created_at`, `admin_id`) VALUES
(100, 256, '240010', 'Hardware', 'test', 'Normal', 'Pending', '2024-02-11 10:48:05', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_category`
--

CREATE TABLE `ticket_category` (
  `ticket_category_id` int(11) NOT NULL,
  `ticket_category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_category`
--

INSERT INTO `ticket_category` (`ticket_category_id`, `ticket_category`, `created_at`) VALUES
(1, 'Hardware', '2024-01-01 09:37:36'),
(2, 'Software', '2024-01-01 09:37:40'),
(3, 'Request for Inventory', '2024-01-02 02:58:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `emp_users`
--
ALTER TABLE `emp_users`
  ADD PRIMARY KEY (`emp_id`) USING BTREE,
  ADD KEY `employee_id` (`employee_id`) USING BTREE;

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `user_id` (`emp_id`),
  ADD KEY `idx_admin_id` (`admin_id`);

--
-- Indexes for table `ticket_category`
--
ALTER TABLE `ticket_category`
  ADD PRIMARY KEY (`ticket_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_users`
--
ALTER TABLE `emp_users`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `ticket_category`
--
ALTER TABLE `ticket_category`
  MODIFY `ticket_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `emp_users` (`emp_id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin_user` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
