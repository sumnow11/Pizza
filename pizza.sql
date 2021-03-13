-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 10:53 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `c_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `c_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`c_id`, `id`, `posts_id`, `comment`, `c_time`) VALUES
(1, 3, 57, 'ดีมากเลย\r\n                ', '2021-03-09 14:54:08'),
(2, 3, 58, 'ดีค่ะ\r\n                ', '2021-03-09 14:55:41'),
(3, 3, 57, 'ชอบมากเลยค่ะ\r\n                ', '2021-03-09 14:59:41'),
(6, 1, 57, 'ขอบคุณครับ\r\n                ', '2021-03-09 15:50:14'),
(7, 3, 57, 'สุดยอด\r\n\r\n                ', '2021-03-09 17:48:34'),
(8, 14, 59, 'น่าลองทำมากครับ\r\n                ', '2021-03-09 18:05:24'),
(9, 15, 68, 'ดีมาก\r\n                ', '2021-03-10 03:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`) VALUES
(5, 'ของหวาน'),
(6, 'อาหารต่างประเทศ'),
(7, 'ต้ม-แกง'),
(8, 'ทอด-ผัด'),
(9, 'ปิ่ง-ย่าง');

-- --------------------------------------------------------

--
-- Table structure for table `postmenu`
--

CREATE TABLE `postmenu` (
  `posts_id` int(11) NOT NULL,
  `posts_name` varchar(255) NOT NULL,
  `posts_img` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `article_img` varchar(255) NOT NULL,
  `posts_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `menu_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `article_video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `postmenu`
--

INSERT INTO `postmenu` (`posts_id`, `posts_name`, `posts_img`, `article`, `article_img`, `posts_time`, `menu_id`, `id`, `article_video`) VALUES
(59, 'หมูกรอบ', '20210309114192802012.jpg', 'ส่วนผสม หมูกรอบ\r<br>\nหมูสามชั้น 1,000 กรัม\r<br>\nเกลือ\r<br>\n \r<br>\n\r<br>\nวิธีทำ หมูกรอบ\r<br>\n1.นำหมูมาหั่นเป็นเส้นยาว ความกว้าง ในคลิปประมาณ 1-2 นิ้ว จากนั้นนำเกลือมาทาให้รอบด้าน\r<br>\n2.นำหมูที่หั่นเตรียมไว้มาวางในกระทะเหล็กก้นลึก โดยนำด้านหนังลงไปก่อน จากนั้นเทน้ำพืชลงไปให้ท่วมหมู เปิดเตาแก๊ส ทอดให้พอหนังหมูสุก แล้วตักขึ้น\r<br>\n3.จากนั้นนำส้อมจิ้มที่หนังหมู จิ้มให้ทั่ว และลึกลงไปถึงชั้นไขมันหมู \r<br>\n4.เทคนิคคือคอยพลิกหมูทุกๆ 5 นาที และควรใช้ไฟอ่อน สังเกตดูที่หมูว่าเริ่มกรอบแล้วหรือยัง\r<br>\n5.จากนั้นเพิ่มไฟมาเกือบกลาง ทอดที่หนังหมูทิ้งไว้อีกประมาณ 5-10 นาที จากนั้นยกขึ้นมาพักไว้ พักให้หมูเย็นตัวลง (จะใช้พัดลมเป่าก็ได้)\r<br>\n6.เปิดไฟในกระทะเดิม ใช้ไฟกลาง - แรง นำหมูกรอบที่พักไว้ลงไป โดยนำด้านหนังหมูลงก่อน \r<br>\n7.สังเกตว่าหนังหมูเริ่มพอง คอยขยับไปเรื่อยๆ เมื่อหนังเริ่มออกสีเหลืองสวย ยกขึ้นมาพักสะเด็ดน้ำมัน รอให้หายร้อน เป็นอันเสร็จ', '', '2021-03-09 16:37:09', 8, 12, ''),
(60, 'หมูผัดขิง', 'food.png', 'ส่วนผสมและสัดส่วน\r<br>\n1. เนื้อหมูหั่นชิ้นบางๆ 200 กรัม\r<br>\n2. ขิงซอย 50 กรัม\r<br>\n3. กระเทียมสับหยาบๆ 5 กลีบ\r<br>\n4. หอมใหญ่ซอย 50 กรัม\r<br>\n5. พริกชีฟ้า 2 เม็ด\r<br>\n6. เห็ดหนูหนู 50 กรัม\r<br>\n7. ซอสปรุงรส 1 ช้อนชา\r<br>\n8. น้ำมันหอย 1 ช้อนโต๊ะ\r<br>\n9. น้ำปลา 1 ช้อนชา\r<br>\n10. น้ำตาลทราย 1 ช้อนโต๊ะ\r<br>\n\r<br>\nวิธีปรุง\r<br>\n1. เนื้อหมูหั่นเป็นชิ้นบางๆ ขิงซอยถ้ากลัวเผ็ดก็ให้ขยำกับน้ำทิ้งหลายๆ รอบ\r<br>\n2. ตั้งกระทะใส่น้ำมันพืชลงไป ตามด้วยกระเทียมลงมาเจียวจนหอม ใส่เนื้อหมูลงมาผัดจนสุก\r<br>\n3. ใส่ขิง หอมใหญ่ลงมาผัด ตามด้วยเห็ดหูหนู แล้วปรุงรสด้วยน้ำมันหอย น้ำปลา น้ำตาลทรายผัดจนเข้ากันดี\r<br>\n4. ใส่ต้นหอม พริกชี้ฟ้าผัดให้เข้ากันแล้วปิดไฟตักใส่จาน', '20210309105327986512.webp', '2021-03-09 16:39:49', 8, 12, ''),
(66, 'ต้มจืดเต้าหู้สอดไส้เนื้อปลา', '20210310120670157213.jpg', 'ส่วนผสม แกงจืดเต้าหู้สอดไส้เนื้อปลา\r<br>\n\r<br>\n          • เต้าหู้ขาว (แบบนิ่ม)\r<br>\n          • ต้นหอม\r<br>\n          • ผักชี\r<br>\n          • กระเทียม พริกไทย และรากผักชี โขลกละเอียด\r<br>\n          • เนื้อปลาอินทรีบด หรือเนื้อปลากรายบด\r<br>\n          • แตงกวา หรือมะระสด (คว้านเมล็ดออก)\r<br>\n          • น้ำเปล่า\r<br>\n          • ผงซุปไก่\r<br>\n          • เห็ดหอมหั่น\r<br>\n          • ซีอิ๊วขาว หรือน้ำปลา หรือเกลือป่น\r<br>\n          • แครอท\r<br>\n          • พริกไทยป่น\r<br>\n          • กระเทียมเจียว\r<br>\n\r<br>\n วิธีทำแกงจืดเต้าหู้สอดไส้เนื้อปลา\r<br>\n\r<br>\n          1. หั่นแบ่งเต้าหู้ขาวเป็น 4 ชิ้น แล้วผ่าครึ่งเพื่อให้สอดไส้เข้าไปได้ จากนั้นหั่นต้นหอมและผักชีเป็นท่อน พักไว้\r<br>\n          2. โขลกสามเกลอ กระเทียม พริกไทย และรากผักชีให้ละเอียดแล้วนำมาคลุกเคล้ากับเนื้อปลา\r<br>\n          3.นำเนื้อปลาที่ปรุงรสยัดไส้ไปในเต้าหู้ และแตงกวา หรือมะระ (ที่สิงคโปร์เขาทำสามแบบ ไส้แตงกวา ไส้มะระ และไส้เต้าหู้)\r<br>\n          4. นำหม้อใส่น้ำเปล่าลงไป ตั้งไฟให้เดือด ใส่ผงซุปไก่ลงไป (อาจใส่เห็ดหอมหั่นลงไปต้มด้วย เพื่อให้ได้กลิ่น)\r<br>\n          5. เมื่อน้ำเดือดจัด ใส่เต้าหู้และแตงกวายัดไส้ลงไป ปรุงรสด้วยซีอิ๊วขาว ถ้าเต้าหู้และแตงกวาลอยขึ้นมาแสดงว่าสุกดีแล้ว\r<br>\n          6. ก่อนปิดไฟให้แบ่งใส่ต้นหอมและผักชีบางส่วนลงไป ใส่แครอทเพื่อเพิ่มสีสัน \r<br>\n          7. ก่อนเสิร์ฟ โรยต้นหอม ผักชี และพริกไทย ใส่กระเทียมเจียวลงไป ', '', '2021-03-10 01:27:37', 7, 13, ''),
(67, 'ต้มยำกุ้งน้ำข้น', '2021031085137508213.jpg', 'ส่วนผสม ต้มยำกุ้งน้ำข้น\r<br>\n\r<br>\n      • กุ้งแชบ๊วยตัวใหญ่ 5 ตัว\r<br>\n      • ตะไคร้ 3 ต้น\r<br>\n      • หอมแดงหัวเล็ก 4-5 หัว\r<br>\n      • ข่า 1 แง่ง\r<br>\n      • ใบมะกรูด 2-3 ใบ\r<br>\n      • เห็ดฟาง 8-10 ชิ้น\r<br>\n      • น้ำพริกเผา 2 ช้อนโต๊ะ\r<br>\n      • กะทิสด 1+1/2 ถ้วยตวง\r<br>\n      • น้ำสต๊อก 2 ถ้วยตวง\r<br>\n      • พริกขี้หนูสวนโขลก 3 ช้อนโต๊ะ\r<br>\n      • น้ำปลา 2 ช้อนโต๊ะ\r<br>\n      • น้ำมะนาว 2+1/2 ช้อนโต๊ะ\r<br>\n      • ผักชีฝรั่ง (สำหรับโรยหน้า)\r<br>\n      • พริกทอด (สำหรับโรยหน้า)\r<br>\n\r<br>\nวิธีทำต้มยำกุ้งน้ำข้น\r<br>\n\r<br>\n     1. ตั้งหม้อ ใส่น้ำสต๊อก ทุบตะไคร้ หอมแดง ข่า และขยี้ใบมะกรูดส่วนหนึ่งใส่ลงในหม้อ\r<br>\n     2. เมื่อน้ำเริ่มเดือดเป็นฟองใส่เห็ดฟาง ลดไฟลงไม่ให้น้ำเดือดพล่าน\r<br>\n     3. ใส่กะทิ น้ำพริกเผา และกุ้งแชบ๊วย ต้มจนกุ้งสุก\r<br>\n     4. ปิดไฟ ปรุงรสด้วยน้ำปลา น้ำมะนาว และพริกขี้หนูสวน\r<br>\n     5. ขยี้ใบมะกรูดส่วนที่เหลือลงในหม้ออีกครั้ง โรยผักชีฝรั่งและพริกทอด จัดเสิร์ฟ', '', '2021-03-10 01:16:02', 7, 13, ''),
(68, 'ผัดกระเพา', '20210310158381739515.jpg', ' ส่วนผสม\r<br>\n\r<br>\nสำหรับ 2 ที่\r<br>\n\r<br>\nหมูสับ2 ขีดครึ่ง\r<br>\n\r<br>\nใบกะเพรา1 กำมือ\r<br>\n\r<br>\nกระเทียม3-4 กลีบ\r<br>\n\r<br>\nพริกตามชอบ\r<br>\n\r<br>\nน้ำมันหอย\r<br>\n\r<br>\nน้ำปลา\r<br>\n\r<br>\nน้ำมันพืช \r<br>\n\r<br>\n\r<br>\n\r<br>\nวิธีทำ\r<br>\n\r<br>\nเวลาเตรียมส่วนผสม: 5 นาที\r<br>\n\r<br>\nเวลาปรุงอาหาร: 5 นาที\r<br>\n\r<br>\n	1ล้างพริก ใบกะเพรา บุบกระเทียม บุบพริกและหั่น เตรียมไว้ ถ้าชอบรสจัดๆก็โขลกพริกรวมกับกระเทียมได้เลย\r<br>\n\r<br>\nเคล็ดลับ: เวลาเลือกซื้อใบกะเพรา เลือกแบบก้านม่วงๆแดงๆ จะหอมกว่าก้านเขียว แต่ถ้าก้านเขียวข้อดีคือเก็บได้นานกว่าก้านแดงและใบใหญ่กว่า\r<br>\n\r<br>\n	2ตั้งกระทะ ใส่น้ำมัน นำพริกกระเทียมลงผัด ใส่หมูสับ ผัดจนเริ่มสุก ปรุงรสด้วยน้ำมันหอย น้ำปลา ผัดต่อจนหมูสุก\r<br>\n\r<br>\n	3เมื่อหมูสุกและปรุงรสแบบที่ชอบเรียบร้อยแล้ว ปิดไฟทันที และใส่ใบกะเพราลงไปคลุก ยกออกจากเตา ใส่จานกินกับข้าวสวยร้อนๆ\r<br>\n\r<br>\nเคล็ดลับ: ใบกะเพราอยากให้เขียว ไม่เหี่ยวจนดำ ควรใส่ตอนปิดไฟแล้วใส่ใบลงคลุก เนื่องจากยังมีความร้อนจากการปรุงอยู่ เท่านี้ก็จะได้ใบกะเพราสีสวยไม่ดำแล้ว\r<br>\n------------------', '', '2021-03-10 03:19:52', 8, 15, '20210310158381739515.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `save_pos`
--

CREATE TABLE `save_pos` (
  `save_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `save_pos`
--

INSERT INTO `save_pos` (`save_id`, `id`, `posts_id`) VALUES
(8, 3, 59),
(9, 15, 66);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `u_level` varchar(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `user_ time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `u_level`, `password`, `user_img`, `user_ time`) VALUES
(1, 'admin@gmail.com', 'admin01', 'a', '1234', '202103051578986430ีีuser.jpg', '2021-03-09 03:08:19'),
(3, 'nan@gmail.com', 'nan', 'u', 'nan', '202103051249555027nan.jpg', '2021-03-08 21:11:19'),
(12, 'gg@gmail.com', 'สมชาย', 'u', '1234', '202103091694068999สมชาย.png', '2021-03-08 19:02:26'),
(13, 'joy@gmail.com', 'joy', 'u', '1234', '202103091921811919joy.jpg', '2021-03-09 08:31:31'),
(15, 'u@gmail.com', 'user', 'u', '1234', '20210310759059808user.jpg', '2021-03-10 03:23:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `postmenu`
--
ALTER TABLE `postmenu`
  ADD PRIMARY KEY (`posts_id`),
  ADD KEY `menus_id` (`menu_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `save_pos`
--
ALTER TABLE `save_pos`
  ADD PRIMARY KEY (`save_id`),
  ADD KEY `posts_id` (`posts_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `postmenu`
--
ALTER TABLE `postmenu`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `save_pos`
--
ALTER TABLE `save_pos`
  MODIFY `save_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `postmenu`
--
ALTER TABLE `postmenu`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menus_id` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `save_pos`
--
ALTER TABLE `save_pos`
  ADD CONSTRAINT `posts_id` FOREIGN KEY (`posts_id`) REFERENCES `postmenu` (`posts_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
