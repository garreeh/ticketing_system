-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 11:13 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL DEFAULT '',
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_name`, `user_password`) VALUES
(1, 'gajultos.garry123@gmail.com', 'garry', '$2y$10$jrx1cQWQZqI2dJO5blQr6uOgVFcG.0hyXdW4nLvfdvgspuMfYnoz2'),
(3, 'gars', 'gars', '$2y$10$FtSRe1cK29SpZ5w4KosNRe4Ubb/K0YUydvH1tLOEuAluwYYrsubOa');

-- --------------------------------------------------------

--
-- Table structure for table `z_user`
--

CREATE TABLE `z_user` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_contact` varchar(20) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_status` varchar(10) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT '',
  `user_decode_pass` varchar(255) DEFAULT NULL,
  `date_register` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_user`
--

INSERT INTO `z_user` (`user_id`, `user_firstname`, `user_lastname`, `user_contact`, `user_email`, `user_name`, `user_type`, `user_type_id`, `user_status`, `user_password`, `user_decode_pass`, `date_register`) VALUES
(1, 'Systems', 'Admin', '09789789797', 'admin@pendragonvet.com', 'admin', '1', 1, 'enabled', '29914b96927c218b3aef4d8596773e7f2cc1bdc58a2157cffb963d8518590255f1aaf3b7927c8e3a60316ad5d3326f18c6aff39c65e31e9c22e424aaec434e1e', '123456', '2020-02-28'),
(2, 'Ron', 'Cruz', '09178737283', 'ronnellcruz@gmail.com', 'Ron', '1', 1, 'enabled', 'a1e26d2828f9f814ff582fd6c88c16972ede2972ad46c34c4ccd6e22823927cf96cb6eef4d4b85dc3a4cbcc8ad8941519e63d002130d9c401f9bef53023f44f8', 'akosironnel', '2020-07-30'),
(7, 'Vet', 'Test', '09222222222', 'sample@vet.com', 'Vet', '1', 1, 'enabled', 'e85b011bc8aeed8eba21a8832318a2caa6537f367e80f8d23b42d6d3a571f3866a1d09664a91a52f40428978855555ac9dd6abf6176c8ffddf089abc306a4eb4', NULL, '2020-02-14'),
(8, 'Ruth', 'Dupingay', '09111111111', 'test@test.com', 'Ruth', '2', 2, 'enabled', 'e85b011bc8aeed8eba21a8832318a2caa6537f367e80f8d23b42d6d3a571f3866a1d09664a91a52f40428978855555ac9dd6abf6176c8ffddf089abc306a4eb4', NULL, '0000-00-00'),
(13, 'Mayem', 'yao', '00000000000', 'test@gmail.com', 'mayem', '1', 1, 'enabled', 'd95542b8197eaf0e5cc70861be574e5c4dfe267071316acc5c356a67978301b196214a2207f86d782bf6f4fa27cfecfeb735f6f10d519e3f5e004789427ddcb8', 'mybossrocks081677', '0000-00-00'),
(48, 'Doc May', 'Valera', '00000000000', 'test@gmail.com', 'May', '2', 2, 'enabled', '8ceb92b89a99415c80878f3ea8b922bce570de708fdbe3d9043546fcc338db9d7582cba62d5d4d33f9b679c9de4da990bdab60fa1567659799abebf282d31df9', 'M@y0', '2021-02-05'),
(78, 'Corisa', 'Virata', '09369852009', 'iamck.012991@gmail.com', 'Corisa', '3', 3, 'enabled', '59d3bbbe7f7f5b2fd67d6d2382aa6a92413a49639a53e13594dfdf017bfd8ef90e6ef802a4dbbc5a1cba189c9501cdf5b924131ff2748eb75bb683864f217c32', 'ckpendragon', '0000-00-00'),
(90, 'Michelle Ann', 'Olitres', '00000000000', 'olitresmichelleann@yahoo.com', 'Mitch', '3', 3, 'enabled', '55aa3c21b0bc5c4e08dab365e38f669d792039b27ac7099d20e2ac2ae7df8d36c37ee711367af9727b54b08843847f7d6e7b4ff9a107491c587913b787978447', '572013', '0000-00-00'),
(118, 'Ruth', 'Dupingay', '09774265283', 'ruthdianadupingay@gmail.com', 'Ruth', '2', 2, 'enabled', 'd1681ad12bcfd197e68602e035462fd582f1d7aa5881d5d8a1dccdd459511abc692335919c5542faa9ee84919ade88adebe0d89c29f64664f3486ac8e6a001e0', 'Hash348*', '0000-00-00'),
(119, 'Daphne', 'Gelera', '09178340928', 'daphnegelera@ymail.com', 'Daphne', '2', 2, 'enabled', '66d3129433243891099bf871a393eb529a345517ccf344d38796fceb2241213556b8b4986fbffab592a8021d8171575bd5301253d1328a4e017e62a6ae1f7990', 'Dapang955857*', '0000-00-00'),
(120, 'Michelle', 'Ann', '00000000000', 'olitresmichelleann@yahoo.com', 'Mitch', '3', 3, 'enabled', '55aa3c21b0bc5c4e08dab365e38f669d792039b27ac7099d20e2ac2ae7df8d36c37ee711367af9727b54b08843847f7d6e7b4ff9a107491c587913b787978447', '572013', '0000-00-00'),
(121, 'Mike', 'Magpantay', '00000000000', 'mikemagpantay@pendragonvet.com', 'Mike', '3', 3, 'enabled', '5f09b59d3c49d1c44967a02e949a48bc339e2eb43e5a4764669e1631fe93a11be85e59df036afbcf2d1493d70176f33ac6757b2d27cda850a7b84c778531330d', '0640', '0000-00-00'),
(122, 'Patricia', 'Garing', '00000000000', 'patriciagaring@y7mail.com', 'Pat', '3', 3, 'enabled', 'a43f7449fc8b8f265fa2b5ed7ba32426ce92b7da089446943d8e69649ff8980a462de8f465b16034a43924eb4c11d3cb29dcba71bcffc2b39836a3537d90c362', 'Pat0718', '0000-00-00'),
(123, 'Ronnel', 'Cruz', '11111111111', 'test@gmail.com', 'test', '3', 3, 'enabled', '0fc9f1a48b1b215d7fa29c63d4ae3ca94323f676226d0189b562de7f7aa059616864e931aeef244bfbfc7ac92d137493daaed155e29d9997cffc6c0b1e9ebf5b', 'test', '2020-04-07'),
(124, '', '', '', '', '', '', NULL, '', '', NULL, '0000-00-00'),
(125, 'Rheena', 'Bonilla', '09657023178', 'rhennabonilla.pendragonlab@gmail.com', 'Rheena', '9', 9, 'enabled', '4a75570f6009287ec7eeb095b0bf42a036d1fe7a16f27226aba62e6f96e96424d8407e35962fa2be2d56bfd18e0399eb0105fe32f67836c4ae24474cef50c090', '536826', '0000-00-00'),
(126, 'Sherry', 'Dumalag', '09362881748', 'sherryjoyd@gmail.com', 'Sherry', '3', 3, 'enabled', 'b180a4289b325c8a7224968c4ad856e1fdb5935618b2d665eb85a5faa1a8ec1087289072a546b8b06610217849bf69db475c52dacf4c8ba4659873c3ba7d5b9e', 'sherryjoy', '0000-00-00'),
(127, 'Reena Mae', 'Gan', '09275610061', 'reenamaegan@gmail.com', 'Meg', '3', 3, 'enabled', '24f388b411ce2a0bd7b1e1afe204ac2e00d5a3d2b007a933c7cefb0072b8246065fa939570d3664ff1da1ee547ae362e4f6e05702472213bb445c785dede34f0', '0315', '0000-00-00'),
(130, 'Fatima', 'Tolledo', '09161570607', 'biancatolledo07@gmail.com', 'fatima', '25', 25, 'enabled', '09cb2769e73c174789a085f9f3408dc3cb860aad8ff617eaa7bebb22ddc8cd5b66ee9766867a61bb2d4263e0796ccaf9089dbd258760e59fe89ff7387b86c366', 'Pat123', '2020-08-26'),
(226, 'Camille', 'Mecos', '09758656774', 'mecos1992@gmail.com', 'Camille', '5', 5, 'disabled', 'ddf59f75b45110e51062d5b8dfedb80140a2bd9847791264311bab2b5cd0cf8fbc49a544863abf5ebb59d2d65ca89336b75801dff1340266e0d542fbed4f70cc', '041123', '2021-03-05'),
(241, 'Ma. Cristina', 'Tanay', '09384421741', 'cristinatanay@gmail.com', 'Cristina', '5', 5, 'disabled', 'c6542b20982b5c911bb8517727ebecce8b536ca16502da933521f97ca040f9c2ab32b5fd8f132a3d3272f6603924fa085e188d34b9429051db55710300038518', '03142016', '0000-00-00'),
(243, 'Rosa Jesabel', 'Achay', '09199003613', 'jesaachay28@gmail.com', 'Jesa', '5', 5, 'enabled', 'be8f229c5117ae5376c78ae0649b923ecdfc69611d225b3d5acd8ff5713aa927fd7ea011787c53cd56d4477d5e2530f2c1eaf76b4d8525fae61dd9cdf336ea2b', 'luis28', '2020-08-18'),
(246, 'Juriel Ann', 'Balorio', '00000000000', 'jurielannbalorio@gmail.com', 'Juriel', '5', 5, 'enabled', 'fd57af5344a7891dc3e3ef2c0007700430eb2c4fc8de6c0c67c0925b96951a4d2d5bab49dc2abda84a17785a59059bad822722f27b422f885c764dff46d277f7', 'juriel@pendragon', '0000-00-00'),
(247, 'Aimee', 'Bornilla', '09151272434', 'aimeebornillavetaid@gmail.com', 'Aimee', '3', 3, 'enabled', 'f186298f4bab78a1f7b70d004d284b93e727f37538ac9f1addbce41793c6979ac5d54b2604bf26ce26fd2716ab7650949ea23cfd67ad9498578ebb8258d5523c', '0317', '0000-00-00'),
(248, 'CK', 'Virata', '09369852009', 'iamck.012991@gmail.com', 'Ckck', '3', 3, 'enabled', '27534f0252d80d81503802101710d950341fc41ae5cb618716b92caef1d5bc46bce22dec7bbdce1fcb5ec764915565c66066eb542def2efd56ab0b01baa476a7', 'ckckck', '0000-00-00'),
(250, 'Khevin', 'Ranque', '09752027914', 'khevin_1523@yahoo.com', 'Khevin', '9', 9, 'enabled', '3f3efc1cab77d3024532e202b5bf48034fcf786521ef12de9152c06c8687382a89fb6c196d7335d70c28352ea536242a69e1b83e45d4b71b001409bc646135b9', 'khevin21', '0000-00-00'),
(251, 'Juliane', 'Ngatiyon', '09364054898', 'jkngatiyon@gmail.com', 'Juliane', '3', 3, 'enabled', 'b7b04dd6e5c98d7120e1a2f825131cdf155d2cd20ed7d88526ed4efb5b5a600bbfd673f383225a193278db5d1c259acbcad994115f2086860d767038c7a61bb5', '08156', '2021-02-27'),
(252, 'Sample', 'Test', '09947698118', 'test@gmail.com', 'testing', '29', 29, 'enabled', '54da915e7bd6b5e7df952bb2281160e0610db9335dd3c042eda880d3e7ac4566d1f7f838a2ceca5f6dd7dcd1c7952d9c7387363055d752c2b210af9ab58d9fe0', 'tae', '2023-08-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `z_user`
--
ALTER TABLE `z_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `z_user`
--
ALTER TABLE `z_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
