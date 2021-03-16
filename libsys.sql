-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 28, 2021 at 07:24 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libsys`
--
CREATE DATABASE IF NOT EXISTS `libsys` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `libsys`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_t`
--

DROP TABLE IF EXISTS `admin_t`;
CREATE TABLE IF NOT EXISTS `admin_t` (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_first_name` varchar(40) NOT NULL,
  `adm_last_name` varchar(40) NOT NULL,
  `adm_dob` date NOT NULL,
  `adm_gender` varchar(6) NOT NULL,
  `adm_phone_number` varchar(12) NOT NULL,
  `adm_email` varchar(40) NOT NULL,
  `adm_password` varchar(40) NOT NULL,
  `adm_street` varchar(40) NOT NULL,
  `adm_city` varchar(40) NOT NULL,
  `adm_postcode` varchar(5) NOT NULL,
  `adm_state` varchar(30) NOT NULL,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_t`
--

INSERT INTO `admin_t` (`adm_id`, `adm_first_name`, `adm_last_name`, `adm_dob`, `adm_gender`, `adm_phone_number`, `adm_email`, `adm_password`, `adm_street`, `adm_city`, `adm_postcode`, `adm_state`) VALUES
(1, 'Faris Danial', 'Bin Johari', '2001-01-06', 'male', '0125748372', 'Faris@gmail.com', 'DanialJo22', '9, Jalan  Permai, Taman Sri Gandang', 'Batu Caves', '68100', 'Selangor'),
(2, 'Eren', 'Pemburu', '1991-01-13', 'male', '0137584736', 'YeagerZeke@gmail.com', 'EREHHHH', '10,Jalan Kasturi, Taman Indah', 'Ampang', '68000', 'Selangor'),
(3, 'Aisyah', 'Binti Fuad', '2001-06-09', 'female', '0127564827', 'Aisy@gmail.com', 'AIFuad', '232, Jalan Pemburu, Taman Selaseh', 'Cheras', '56000', 'Kuala Lumpur'),
(4, 'Jonah Lee ', 'Pan Yu Chuen', '1999-11-06', 'male', '0124873827', 'JPYu@gmail.com', 'YuChuen666', '27, Jalan Tiku, Taman Kucing', 'Sri Petaling', '57000', 'Kuala Lumpur'),
(5, 'Nur Shahidah Qistina', 'Binti Irfan Zafri', '1997-01-16', 'male', '0128573829', 'Shahi@gmail.com', 'QistinaZafri', '100, jalan Pemuda, Taman Tua', 'Ampang', '68000', 'Selangor'),
(6, 'Aiman Nazirul', 'Bin Mohammad Afiq', '2000-10-16', 'male', '0198374658', 'Aimannaz@gmail.com', 'NazirulAiman19209', '29, Jalan Selaseh 3/2, Taman Koriander', 'Ampang', '68000', 'Selangor'),
(7, 'Rajukumar Sivaragam', 'A/L Muthu', '1987-01-19', 'male', '0137281839', 'Rajukumar@yahoo.com', 'Rajuuuuu257', '1000, Jalan Megah, Taman Tun Razak', 'Bandar Tun Razak', '53000', 'Kuala Lumpur'),
(8, 'Siti', 'Nurhaliza', '2009-03-07', 'female', '01222222222', 'siti@tepisungai.com', 'sitimatiditepisungai', '65, Jalan Telawi', 'Bangsar', '53674', 'Kuala Lumpur');

-- --------------------------------------------------------

--
-- Table structure for table `book_author_t`
--

DROP TABLE IF EXISTS `book_author_t`;
CREATE TABLE IF NOT EXISTS `book_author_t` (
  `bk_author_id` int(6) NOT NULL AUTO_INCREMENT,
  `bk_author_firstname` varchar(40) NOT NULL,
  `bk_author_lastname` varchar(40) NOT NULL,
  `bk_id` int(6) NOT NULL,
  PRIMARY KEY (`bk_author_id`,`bk_id`),
  KEY `bk_id` (`bk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book_author_t`
--

INSERT INTO `book_author_t` (`bk_author_id`, `bk_author_firstname`, `bk_author_lastname`, `bk_id`) VALUES
(4, 'Sean', 'Covey', 3),
(6, 'J.K.', 'Rowling', 5),
(7, 'J.K.', 'Rowling', 6),
(8, 'J.K.', 'Rowling', 7),
(9, 'J.K.', 'Rowling', 8),
(10, 'J.K.', 'Rowling', 9),
(11, 'J.K.', 'Rowling', 10),
(13, 'Benjamin', 'Graham', 12),
(14, 'Jason', 'Zweig', 12),
(15, 'Andy', 'Rathbone', 13),
(16, 'John', 'Arundel', 16),
(17, 'Justin', 'Domingus', 16),
(18, 'Wayne', 'Winston', 15),
(19, 'Doug', 'Lowe', 14),
(21, 'Josh', 'Axe', 18),
(22, 'Adam', 'Grant', 19),
(23, 'Ethan', 'Kross', 20),
(24, 'Hajime', 'Isayama', 21),
(25, 'George', 'Lucas', 22),
(26, 'Eiichiro', 'Oda', 23),
(27, 'Fred KH', 'Tam', 24),
(28, 'Lim', 'Tat Seng', 24),
(29, 'Tan', 'Kong Huat', 24),
(30, 'Carol', 'McCloud', 26),
(31, 'Walter', 'Tevis', 27),
(32, 'James', 'Clear', 28),
(33, 'Nat', 'What', 29),
(34, 'Alex', 'Michaelides', 30),
(35, 'Matt', 'Haig', 31),
(36, 'Kate', 'Allinson', 32),
(37, 'Kay', 'Featherstone', 32),
(38, 'Victor', 'Hugo', 33),
(39, 'Christine', 'Donougher', 33),
(51, 'Victor', 'Frankl', 35),
(61, 'Robert', 'T.Kiyosaki', 11),
(62, 'Dave', 'Asprey', 17),
(66, 'J.K.', 'Rowling', 4),
(106, 'Robin', 'Sharma', 2),
(111, 'Kathleen', 'Brooks', 1),
(112, 'Brian', 'Dolan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_t`
--

DROP TABLE IF EXISTS `book_t`;
CREATE TABLE IF NOT EXISTS `book_t` (
  `bk_id` int(6) NOT NULL AUTO_INCREMENT,
  `bk_title` varchar(70) NOT NULL,
  `bk_genre` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bk_cover` varchar(60) NOT NULL,
  `bk_summary` varchar(450) NOT NULL,
  `bk_quantity` int(3) NOT NULL,
  `bk_serialno` varchar(13) NOT NULL,
  `bk_priority` int(2) NOT NULL,
  `bk_publisher` varchar(40) NOT NULL,
  `bk_publish_date` date NOT NULL,
  PRIMARY KEY (`bk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book_t`
--

INSERT INTO `book_t` (`bk_id`, `bk_title`, `bk_genre`, `bk_cover`, `bk_summary`, `bk_quantity`, `bk_serialno`, `bk_priority`, `bk_publisher`, `bk_publish_date`) VALUES
(1, 'Currency Trading For Dummies', 'Finance', '1.jpg', 'A book on how to start a journey as a forex trader that consists of both technical and fundamental aspect of trading foreign exchange. Informational with images of example of charts for beginners to start their forex journey.', 28, '9781118989807', 3, 'For Dummies', '2015-02-17'),
(2, 'The Monk Who Sold His Ferrari', 'Life Lessons', '2.jpg', 'This inspiring tale provides a step-by-step approach to living with greater courage, balance, abundance, and joy. A wonderfully crafted fable, The Monk Who Sold His Ferrari tells the extraordinary story of Julian Mantle, a lawyer forced to confront the spiritual crisis of his out-of-balance life. On a life-changing odyssey to an ancient culture, he discovers powerful, wise, and practical lessons.', 15, '9780062515674', 5, 'HarperSanFrancisco', '1999-04-02'),
(3, 'The 7 Habits of Highly Effective Teens', 'Life Lessons', '3.jpg', 'Imagine you had a roadmap—a step-by-step guide to help you get from where you are now, to where you want to be in the future. Your goals, your dreams, your plans…they’re all within reach. You just need the tools to help you get there. That’s what this book is: a handbook to self-esteem and success. This book is stuffed with cartoons, clever ideas, great quotes, and incredible stories about real teens from all over the world.', 7, '9781476764665', 3, 'Simon & Schuster', '2014-05-27'),
(4, 'Harry Potter and the Philosophers Stone', 'Teen & Young Adult', '4.jpg', 'When a letter arrives for unhappy but ordinary Harry Potter, a decade-old secret is revealed to him that apparently hes the last to know. Leaving his unsympathetic aunt and uncle for Hogwarts School of Witchcraft and Wizardry, Harry stumbles upon a sinister mystery when he hears of a missing stone with astonishing powers, which could be valuable, dangerous - or both. An incredible adventure is about to begin!', 13, '1526602385', 1, 'Pottermore', '2017-09-05'),
(5, 'Harry Potter and the Chamber of Secrets', 'Teen & Young Adult', '5.jpg', 'Harry Potter\'s summer has included the worst birthday ever, doomy warnings from a house-elf called Dobby, and rescue from the Dursleys by his friend Ron Weasley in a magical flying car! Back at Hogwarts School of Witchcraft and Wizardry for his second year, Harry hears strange whispers echo through empty corridors - and then the attacks start.', 8, '9781526609205', 4, 'Pottermore', '2019-08-08'),
(6, 'Harry Potter And The Prisoner Of Azkaban', 'Teen & Young Adult', '6.jpg', 'For twelve long years, the dread fortress of Azkaban held an infamous prisoner named Sirius Black. Convicted of killing thirteen people with a single curse, he was said to be the heir apparent to the Dark Lord, Voldemort.\r\n\r\nNow he has escaped, leaving only two clues as to where he might be headed: Harry Potter\'s defeat of You-Know-Who was Black\'s downfall as well.\r\n', 34, '9780439136365', 1, 'Pottermore', '2001-10-01'),
(7, 'Harry Potter And The Goblet Of Fire', 'Teen & Young Adult', '7.jpg', 'Harry Potter is midway through his training as a wizard and his coming of age. Harry wants to get away from the pernicious Dursleys and go to the International Quidditch Cup. He wants to find out about the mysterious event that\'s supposed to take place at Hogwarts this year, an event involving two other rival schools of magic, and a competition that hasn\'t happened for a hundred years.', 24, '9780439139601', 3, 'Pottermore', '2020-09-01'),
(8, 'Harry Potter and the Half-Blood Prince', 'Teen & Young Adult', '8.jpg', 'The war against Voldemort is not going well; even the Muggles have been affected. Dumbledore is absent from Hogwarts for long stretches of time, and the Order of the Phoenix has already suffered losses.', 16, '9780439785969', 4, 'Pottermore', '2006-07-25'),
(9, 'Harry Potter and the Deathly Hallows', 'Teen & Young Adult', '9.jpg', 'A spectacular finish to a phenomenal series. The journey is hard, filled with events both tragic and triumphant, the battlefield littered with the bodies of the dearest and despised, but the final chapter is as brilliant and blinding as a phoenix\'s flame, and fans and skeptics alike will emerge from the confines of the story with full but heavy hearts, giddy and grateful for the experience.', 21, '9780545139700', 2, 'Pottermore', '2009-07-01'),
(10, 'Harry Potter and the Cursed Child', 'Teen & Young Adult', '10.jpg', 'A spectacular finish to a phenomenal series. The journey is hard, filled with events both tragic and triumphant, the battlefield littered with the bodies of the dearest and despised, but the final chapter is as brilliant and blinding as a phoenix\'s flame, and fans and skeptics alike will emerge from the confines of the story with full but heavy hearts, giddy and grateful for the experience.', 19, '9781338216660', 2, 'Pottermore', '2017-07-25'),
(11, 'Rich Dad Poor Dad', 'Life Lessons', '11.jpg', 'Rich Dad Poor Dad is Robert\'s story of growing up with two dads — his real father and the father of his best friend, his rich dad — and the ways in which both men shaped his thoughts about money and investing. The book explodes the myth that you need to earn a high income to be rich and explains the difference between working for money and having your money work for you.', 8, '9781612680170', 2, 'Plata Publishing', '2017-04-11'),
(12, 'The Intelligent Investor', 'Finance', '12.jpg', 'The greatest investment advisor of the twentieth century, Benjamin Graham, taught and inspired people worldwide. Graham\'s philosophy of \"value investing\" -- which shields investors from substantial error and teaches them to develop long-term strategies -- has made The Intelligent Investor the stock market bible ever since its original publication in 1949.', 28, '9780060555665', 5, 'Harper Buisness', '2006-02-21'),
(13, 'Windows 10 For Dummies', 'Computers & Technology', '13.jpg', 'Windows 10 For Dummies remains the #1 source for readers looking for advice on Windows 10. Expert author Andy Rathbone provides an easy-to-follow guidebook to understanding Windows 10 and getting things done based on his decades of experience as a Windows guru.', 30, '1119679338', 3, 'For Dummies', '2020-08-25'),
(14, 'Networking All-in-One For Dummies', 'Computers & Technology', '14.jpg', 'Whether you\'re in charge of a small network or a large network, Networking All-in-One is full of the information you’ll need to set up a network and keep it functioning. Fully updated to capture the latest Windows 10 releases through Spring 2018, this is the comprehensive guide to setting up, managing, and securing a successful network.', 14, '9781119471608', 2, 'For Dummies', '2018-04-08'),
(15, 'Microsoft Excel 2019 Data Analysis and Business Modeling', 'Computers & Technology', '15.jpg', 'Master business modeling and analysis techniques with Microsoft Excel 2019, and transform data into bottom-line results. Written by award-winning educator Wayne Winston, this hands-on, scenario-focused guide shows you how to use the latest Excel tools to integrate data from multiple tables–and how to effectively build a relational data source inside an Excel workbook.', 34, '9781509305889', 2, 'Microsoft Press', '2018-01-06'),
(16, 'Cloud Native DevOps with Kubernetes', 'Computers & Technology', '16.jpg', 'Kubernetes is the operating system of the cloud native world, providing a reliable and scalable platform for running containerized workloads. In this friendly, pragmatic book, cloud experts John Arundel and Justin Domingus show you what Kubernetes can do—and what you can do with it.', 25, '9781492040767', 4, 'O\'Reilly', '2015-01-13'),
(17, 'Fast This Way', 'Health, Fitness & Diet', '17.jpg', 'For more than a decade, Bulletproof founder Dave Asprey has shared his unique point of view and expertise to help fans become the best versions of themselves. From living longer to getting smarter, maximizing performance to practicing mindfulness, Dave’s followers look to him for his take on the most effective techniques to become healthier and more powerful than most doctors think is possible.', 11, '9780062882868', 4, 'Harper Wave', '2020-01-07'),
(18, 'Ancient Remedies', 'Health, Fitness & Diet', '18.jpg', 'Long before the first pharmaceutical companies opened their doors in the 1850s, doctors treated people, not symptoms. And although we\'ve become used to popping pills, Americans have finally had it with the dangerous side effects, addiction and over-prescribing—and they\'re desperate for an alternative.', 27, '9780316496452', 2, 'Little, Brown Spark', '2019-01-13'),
(19, 'Think Again', 'Health, Fitness & Diet', '19.jpg', 'Organizational psychologist Adam Grant is an expert on opening other people\'s minds--and our own. As Wharton\'s top-rated professor and the bestselling author of Originals and Give and Take, he makes it one of his guiding principles to argue like he\'s right but listen like he\'s wrong. With bold ideas and rigorous evidence, he investigates how we can embrace the joy of being wrong, bring nuance to charged conversations, and build schools, workplace', 14, '9781984878106', 3, 'Viking', '2014-07-09'),
(20, 'Chatter', 'Health, Fitness & Diet', '20.jpg', 'In Chatter, acclaimed psychologist Ethan Kross explores the silent conversations we have with ourselves. Interweaving groundbreaking behavioral and brain research from his own lab with real-world case studies—from a pitcher who forgets how to pitch, to a Harvard undergrad negotiating her double life as a spy—Kross explains how these conversations shape our lives, work, and relationships. He warns that giving in to negative and disorienting self-t', 16, '9780525575238', 4, 'Crown', '2020-03-21'),
(21, 'Shingeki no Kyojin Chapter 1 Manga', 'Shonen Manga', '21.jpg', 'A tale of humanity being trapped inside walls in order to survive from titans that exhibit outside of the walls that are trying to eat all humans', 25, '9783622747238', 2, 'Isayama Publication Sdn. Bhd', '2016-05-13'),
(22, 'Star Wars from the Adventure of Luke Skywalker', 'Sci-Fi', '22.jpg', 'One of the book in star wars book collection that revolve around Luke Skywalker adventure', 16, '3743628487', 3, 'Ballantine Books', '1976-11-12'),
(23, 'One Piece Chapter 1 Manga', 'Shonen Manga', '23.jpeg', 'A boy name Luffy also known as Straw Hat Luffy with his ability as a rubber person aims to be the Pirate King by going to the grand line', 15, '4982845953', 2, 'Pelangi Pembaca Sdn. Bhd.', '2009-01-24'),
(24, 'Chart Pattern Analysis', 'Finance', '24.jpg', 'Book on chart pattern that can be used in trading financial market', 20, '2356634463', 4, 'Naskir Publication Sdn. Bhd.', '2018-10-28'),
(25, 'The Autobiography of Benjamin Franklin', 'Biography', '25.jpg', 'An autobiography regarding Benjamin Franklin as Founding Fathers of the United States', 11, '3242345634', 3, 'Ballantine Books', '2017-06-18'),
(26, 'Have You Filled A Bucket Today? : A Guide to Daily Happiness for Kids:', 'Children ', '26.jpg', 'A classic tale, beautifully told and beautifully shared.\" --Emily-Jane Hills Orford, Readers\' Favorite Book Reviews While using a simple metaphor of a bucket and a dipper, author Carol McCloud illustrates that when we choose to be kind, we not only fill the buckets of those around us, but also fill our OWN bucket! Conversely, when we choose to say or do mean things, we are dipping into buckets', 22, '4274575433', 1, 'Bucket Fillosophy', '2014-09-09'),
(27, 'The Queen\'s Gambit ', 'Contemporary Fiction', '27.jpg', 'When she is sent to an orphanage at the age of eight, Beth Harmon soon discovers two ways to escape her surroundings, albeit fleetingly: playing chess and taking the little green pills given to her and the other children to keep them subdued. Before long, it becomes apparent that hers is a prodigious talent, and as she progresses to the top of the US chess rankings she is able to forge a new life for herself. But she can never quite overcome her ', 38, '5353535325', 4, 'Orion Publishing Co', '2020-10-29'),
(28, 'Atomic Habits ', 'Life Lessons', '28.jpg', 'Transform your life with tiny changes in behaviour, starting now.\r\n\r\nPeople think that when you want to change your life, you need to think big. But world-renowned habits expert James Clear has discovered another way. He knows that real change comes from the compound effect of hundreds of small decisions: doing two push-ups a day, waking up five minutes early, or holding a single short phone call.', 11, '9782342423432', 3, 'Cornerstone', '2018-11-27'),
(29, 'Un-cook Yourself ', 'Parodies & Spoofs', '29.jpg', 'Nat’s What I Reckon was the tattooed lockdown saviour we didn’t know we needed, rescuing us from packet food, jar sauce and total boredom with his hilarious viral recipe videos that got us cooking at home like champions again.', 16, '3225642235', 2, 'Ebury Australia', '2020-12-15'),
(30, 'The Silent Patient', 'Thriller', '30.jpg', 'Alicia Berenson lived a seemingly perfect life until one day six years ago.\r\nWhen she shot her husband in the head five times.\r\nSince then she hasn\'t spoken a single word.\r\nIt\'s time to find out why.', 10, '5235857865', 3, 'Orion Publishing Co', '2020-01-05'),
(31, 'The Midnight Library', 'Contemporary Fiction', '31.jpg', 'Nora\'s life has been going from bad to worse. Then at the stroke of midnight on her last day on earth she finds herself transported to a library. There she is given the chance to undo her regrets and try out each of the other lives she might have lived.\r\n', 35, '2353453637', 2, 'Canongate Books Ltd', '2020-02-18'),
(32, 'Pinch of Nom', 'Health, Fitness & Diet', '32.jpg', 'Slimming food has never tasted so good; the must-have first cookbook from the UK\'s most visited food blog.\r\nSharing delicious home-style recipes with a hugely engaged online community, Pinch of Nom has helped millions of people to cook well and lose weight. The Pinch of Nom cookbook can help novice and experienced home cooks enjoy exciting, flavourful and satisfying meals. Accessible to everyone by not including diet points, all of these recipes ', 23, '1421343247', 3, 'Pinch of Nom', '2019-07-11'),
(33, 'Les Miserables', 'Contemporary Fiction', '33.jpg', 'The subject of the world’s longest-running musical and the award-winning film, Les Misérables is a genuine literary treasure. Victor Hugo’s tale of injustice, heroism, and love follows the fortunes of Jean Valjean, an escaped convict determined to put his criminal past behind him, and has been a perennial favorite since it first appeared over 150 years ago.', 16, '978014310756', 3, 'Penguin', '2015-02-24'),
(35, 'Man Search for Meaning', 'Life Lessons', '35.jpg', 'An enduring work of survival literature, according to the New York Times, Viktor Frankl does a riveting account of his time in the Nazi concentration camps, and his insightful exploration of the human will to find meaning in spite of the worst adversity, has offered solace and guidance to generations of readers since it was first published in 1946.', 26, '9780807014271', 2, 'Beacon Press', '2006-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `borrowing_t`
--

DROP TABLE IF EXISTS `borrowing_t`;
CREATE TABLE IF NOT EXISTS `borrowing_t` (
  `br_id` int(6) NOT NULL AUTO_INCREMENT,
  `cl_id` int(6) NOT NULL,
  `bk_id` int(6) NOT NULL,
  `br_date` date NOT NULL,
  `br_due_date` date NOT NULL,
  `br_returning_date` date DEFAULT NULL,
  `br_feedback` varchar(150) DEFAULT NULL,
  `br_fine` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`br_id`,`cl_id`,`bk_id`),
  KEY `bk_id` (`bk_id`),
  KEY `cl_id` (`cl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `borrowing_t`
--

INSERT INTO `borrowing_t` (`br_id`, `cl_id`, `bk_id`, `br_date`, `br_due_date`, `br_returning_date`, `br_feedback`, `br_fine`) VALUES
(1, 27, 13, '2020-10-13', '2020-10-20', '2020-10-18', 'Taught me in further detail about Windows 10', NULL),
(2, 27, 16, '2020-10-13', '2020-10-18', '2020-10-17', 'A good book.', NULL),
(3, 34, 28, '2021-02-01', '2021-02-08', '2021-02-09', NULL, '0.20'),
(4, 38, 1, '2021-01-20', '2021-01-27', '2021-01-25', 'yes, I can do Forex now!', NULL),
(5, 33, 2, '2020-12-05', '2020-12-08', '2020-12-10', NULL, '0.40'),
(6, 33, 6, '2021-02-14', '2021-02-28', NULL, NULL, NULL),
(7, 33, 11, '2020-12-05', '2020-12-19', NULL, NULL, NULL),
(8, 32, 6, '2021-01-02', '2021-01-16', '2021-01-19', 'Returned late because it was too good', '0.60');

-- --------------------------------------------------------

--
-- Table structure for table `client_t`
--

DROP TABLE IF EXISTS `client_t`;
CREATE TABLE IF NOT EXISTS `client_t` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_first_name` varchar(40) NOT NULL,
  `cl_last_name` varchar(40) NOT NULL,
  `cl_dob` date NOT NULL,
  `cl_gender` varchar(6) NOT NULL,
  `cl_phone_number` varchar(12) NOT NULL,
  `cl_email` varchar(40) NOT NULL,
  `cl_password` varchar(40) NOT NULL,
  `cl_street` varchar(40) NOT NULL,
  `cl_city` varchar(40) NOT NULL,
  `cl_postcode` varchar(5) NOT NULL,
  `cl_state` varchar(30) NOT NULL,
  `adm_id` int(11) NOT NULL,
  PRIMARY KEY (`cl_id`),
  KEY `adm_id` (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client_t`
--

INSERT INTO `client_t` (`cl_id`, `cl_first_name`, `cl_last_name`, `cl_dob`, `cl_gender`, `cl_phone_number`, `cl_email`, `cl_password`, `cl_street`, `cl_city`, `cl_postcode`, `cl_state`, `adm_id`) VALUES
(1, 'Ahmad Johari', 'Bin Jamzul Jamal', '2000-01-20', 'male', '0126473829', 'ajjamzul@gmail.com', 'JohariSwagz666', '29, Lorong Permata 2/1, Taman Petaling', 'Sri Petaling', '57000', 'Kuala Lumpur', 5),
(2, 'Chee Cung', ' Ming', '1967-01-11', 'male', '0126433429', 'CCCming@gmail.com', 'CCCming347836', '298, Lorang Haji Talib 2/1, Taman Talib', 'Sri Petaling', '57000', 'Kuala Lumpur', 3),
(3, 'Sariwati Izrina', 'Binti Hariz Daniel', '1998-05-14', 'male', '0167382918', 'Sariizrina@gmail.com', 'SariXOXO274', '200, Jalan SG 3/1, Taman Gombak', 'Batu Caves', '68100', 'Selangor', 7),
(4, 'Siti Nur Sofea', 'Binti Amirul Hamdan', '2000-09-16', 'female', '0178263748', 'NurSofea@gmail.com', 'SNSAH284', '100, Jalan Taming Jalen, Taman Kasturi', 'Cheras', '56000', 'Kuala Lumpur', 1),
(22, 'Syarifah Nur Adawiyah', 'Binti Muhammad Roslin', '1991-02-09', 'female', '0126563429', 'snaroslin@gmail.com', 'Syarifah9281', '30, Jalan Kasturi 2/1, Taman Bangsawan', 'Kuantan', '26100', 'Pahang', 5),
(23, 'Kamalia Sofea', 'Binti Jamal Abdul', '2001-02-17', 'female', '0167382648', 'Kamaliasofea@gmail.com', 'cammysofea273', '200, Jalan SG 3/1, Taman Sri Bestari', 'Kuantan', '26100', 'Pahang', 4),
(24, 'Muhammad Zamri ', 'Bin Abdul Manaf', '1991-02-16', 'male', '0124837583', 'ZamriManaf@gmail.com', 'Zamrizamri21', '19, Lorong Talib 2/11, Taman Saujana', 'Ipoh', '30000', 'Perak', 4),
(25, 'Chee Sung', 'Ming', '1995-02-15', 'male', '0177382918', 'cheesungming6272@gmail.com', 'Cheesung22', '29, Jalan Puncak 11/1, Taman Gemilang', 'Taiping', '34000', 'Perak', 1),
(26, 'Rajoosinggam ', 'A/L Muthu', '2001-02-23', 'male', '0197382216', 'rajooo28162@gmail.com', 'rajoosinggam2321', '102, Jalan Muhibbah 2/1, Taman Puncak', 'Ipoh', '30000', 'Perak', 8),
(27, 'Nur Fatin Azzahra', 'Binti Tarmizi', '2000-11-10', 'female', '0132849502', 'fatinzahra22@gmail.com', 'Azzahra245554', '10, Jalan Cahaya 1/1, Taman Pelangi', 'Ampang', '68000', 'Selangor', 3),
(28, 'Nur Amira', 'Binti Hamid Zamri', '1999-05-14', 'female', '0137232918', 'nuramira218@gmail.com', 'nuramirazamri29389', '29, Lorang Kumbang 2/1, Taman Bangsawan', 'Kuantan', '26100', 'Pahang', 8),
(29, 'Muzafar Syukur', 'Bin Abdul Amin', '1987-02-25', 'male', '0167293819', 'Muzafarsyukur22@gmail.com', 'syukuramin286781', '10, Jalan Minang 2/33, Taman Rombau', 'Rembau', '71400', 'Negeri Sembilan', 7),
(30, 'Ajmal Izhar', 'Bin Idzman', '2001-02-16', 'male', '0136533429', 'ajmal818@gmail.com', 'AjmalHusein234534', '29, Lorong Budiman 8/1, Taman Hilir', 'Bandar Hilir', '75000', 'Melaka', 6),
(31, 'Nur Amni', 'Binti Shahril Juzuk', '1999-02-16', 'female', '0197833429', 'amnijuzuk22@yahoo.com', 'amninurjuzuk21212', '298, Lorong Perkasa 8/1, Taman Pahlawan', 'Kota Bharu', '15000', 'Kelantan', 3),
(32, 'Mohd Faris', 'Bin Shamsudin Jumur', '2000-02-18', 'male', '0132482918', 'farissham@gmail.com', 'farissshamm2ew2', '29, Jalan 1/2 Kosas, Taman Permain', 'Bandar Hilir', '34000', 'Melaka', 5),
(33, 'Irfan Zamri', 'Bin Muhammad Johari', '1997-02-18', 'male', '0197882918', 'amirirfanjohari@gmail.com', 'irfanamri2022', '20, Jalan TG 3/1, Taman Cempeka', 'Muar', '84200', 'Johor', 4),
(34, 'Lai Lee', 'Xiang', '1999-05-27', 'male', '0127052918', 'Laileexiang12212@gmail.com', 'laiilee08901', '29, Lorong Hang Tuah 9/1, Taman Pahlawan', 'Kangar', '01000', 'Perlis', 1),
(35, 'Lai Sia ', 'Chiong', '1989-02-10', 'male', '0198433748', 'llaisia@gmail.com', 'Laisiachiong8282', '29, Lorong Bahagia 2, Taman Tembak', 'Kangar', '01000', 'Perlis', 8),
(36, 'Premnaran ', 'A/L David Singgam', '2001-06-09', 'male', '0194663748', 'premnaran9782987@gmail.com', 'premnarandavid82698', '20, Jalan Pedang 1/1, Taman Megah', 'Bandar Hilir', '75000', 'Melaka', 4),
(37, 'Doroti ', 'A/P Ragumutu', '1991-08-13', 'female', '0178433385', 'dorotiragu@gmail.com', 'Doroti2789', '2, Lorong Batang Serai 2/1, Taman Sayur', 'Permatang Pauh', '13500', 'Pulau Pinang', 4),
(38, 'Liew Ka ', 'Tan', '1992-07-01', 'male', '01928687264', 'lktan567@gmail.com', 'liewka678', '100, Jalan Impian 7/1, Taman Kurma', 'Alor Setar', '05514', 'Kedah ', 4),
(39, 'Siti Fatimah Sofea', 'Binti Amin Danial', '2000-04-01', 'female', '0194363748', 'SitiSofea@gmail.com', 'SFS3456@gmail.com', '29, Lorong Purnama 2/6, Taman Kiamang', 'Kuala Terengganu', '20596', 'Terengganu', 8),
(40, 'Amin Wafi', 'Bin Dzulzizwan', '2001-01-15', 'male', '0198275728', 'Aminzul@gmail.com', 'aminwafiu26789', '20, Jalan TG 2/1, Taman Kucing', 'Kuching ', '93000', 'Sarawak', 6),
(41, 'Akmal Danial', 'Bin Jamzulamir', '2001-03-17', 'male', '0126832278', 'akmaldanial789@gmail.com', 'akamlswagsz890', '11, Jalan Melanau 2/1, Taman Kundasang', 'Kota Kinabalu', '88100', 'Sabah', 4),
(42, 'Siti Zubaidah', 'Binti Jamil Zul', '1997-05-21', 'female', '0196752437', 'SitiZubaidah@gmail.com', 'zubai7890', '100, Jalan Pelaman 2/1, Taman Julian', 'Sibu', '96000', 'Sarawak', 6);

-- --------------------------------------------------------

--
-- Table structure for table `librarian_t`
--

DROP TABLE IF EXISTS `librarian_t`;
CREATE TABLE IF NOT EXISTS `librarian_t` (
  `lb_id` int(11) NOT NULL AUTO_INCREMENT,
  `lb_first_name` varchar(40) NOT NULL,
  `lb_last_name` varchar(40) NOT NULL,
  `lb_dob` date NOT NULL,
  `lb_gender` varchar(6) NOT NULL,
  `lb_phone_number` varchar(12) NOT NULL,
  `lb_email` varchar(40) NOT NULL,
  `lb_password` varchar(40) NOT NULL,
  `lb_street` varchar(40) NOT NULL,
  `lb_city` varchar(40) NOT NULL,
  `lb_postcode` varchar(5) NOT NULL,
  `lb_state` varchar(30) NOT NULL,
  `adm_id` int(11) NOT NULL,
  PRIMARY KEY (`lb_id`),
  KEY `adm_id` (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `librarian_t`
--

INSERT INTO `librarian_t` (`lb_id`, `lb_first_name`, `lb_last_name`, `lb_dob`, `lb_gender`, `lb_phone_number`, `lb_email`, `lb_password`, `lb_street`, `lb_city`, `lb_postcode`, `lb_state`, `adm_id`) VALUES
(1, 'Roland ', 'A/L Jayagilan', '2001-01-20', 'male', '0128764357', 'RolandJaya@gmail.com', 'rolandjaya666', '10, Jalan Permata 2/5, Taman Mutiara', 'Ampang', '68100', 'Selangor', 1),
(2, 'Lee Hong ', 'Shen', '2000-05-13', 'male', '0178263746', 'LHShen@gmail.com', 'LHShen2618', '287, Jalan Sri Minang 2/1, Taman Minag', 'Cheras', '56000', 'Kuala Lumpur', 2),
(3, 'Isaac', 'Pan', '2001-03-06', 'male', '0147254926', 'isaac@hotmail.com', 'isaacpann', '43, Jalan Berenang', 'Bernam', '45338', 'Sabah', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_author_t`
--
ALTER TABLE `book_author_t`
  ADD CONSTRAINT `BOOK_AUTHOR_T_ibfk_1` FOREIGN KEY (`bk_id`) REFERENCES `book_t` (`bk_id`);

--
-- Constraints for table `borrowing_t`
--
ALTER TABLE `borrowing_t`
  ADD CONSTRAINT `BORROWING_T_ibfk_1` FOREIGN KEY (`bk_id`) REFERENCES `book_t` (`bk_id`),
  ADD CONSTRAINT `BORROWING_T_ibfk_2` FOREIGN KEY (`cl_id`) REFERENCES `client_t` (`cl_id`);

--
-- Constraints for table `client_t`
--
ALTER TABLE `client_t`
  ADD CONSTRAINT `CLIENT_T_ibfk_1` FOREIGN KEY (`adm_id`) REFERENCES `admin_t` (`adm_id`);

--
-- Constraints for table `librarian_t`
--
ALTER TABLE `librarian_t`
  ADD CONSTRAINT `LIBRARIAN_T_ibfk_1` FOREIGN KEY (`adm_id`) REFERENCES `admin_t` (`adm_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
