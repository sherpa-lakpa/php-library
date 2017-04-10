-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2017 at 01:10 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-librarys`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `author` varchar(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `publisher` varchar(40) NOT NULL,
  `edition` varchar(10) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `semester` varchar(1) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `image`, `author`, `category`, `publisher`, `edition`, `subject`, `semester`, `quantity`) VALUES
(1, 'Game of thrones', 'image/got.jpg', 'Georger R.R. Martin', 'Nobel', '', '', '', '0', 9),
(2, 'Harry Porter', 'image/hp.jpg', 'J.K Rowling', 'Nobel', '', '', '', '0', 9),
(3, 'Go Set a Watchman', 'image/gw.jpg', 'Harper Lee', 'Nobel', '', '', '', '0', 10),
(4, 'The Girl On The Train', 'image/tgot.jpg', 'Paula Hawkins', 'Nobel', '', '', '', '0', 10),
(6, 'To kill A MockingBird', 'image/ki.jpg', 'Harper Lee', 'Nobel', '', '', '', '0', 10),
(7, 'The Hobbit', 'image/th.jpg', 'J.R.R. Tolkein', 'Nobel', '', '', '', '0', 10),
(8, 'Vampire Academy', 'image/va.jpg', 'Richelle Mead', 'Nobel', '', '', '', '0', 10),
(9, 'Divergent', 'image/d.jpg', 'Veronica Roth', 'Nobel', '', '', '', '0', 10),
(10, 'Hush Hush', 'image/hh.jpg', 'Becca Fitzpatrick', 'Nobel', '', '', '', '0', 10),
(11, 'The Maze Runner', 'image/tmr.jpg', 'James Dashner', 'Nobel', '', '', '', '0', 5),
(12, 'The Hunger Games', 'image/thg.jpg', 'Suzanne Collins', 'Nobel', '', '', '', '0', 9),
(13, 'The Girl with The Dragon Tatoo', 'image/gt.jpg', 'Steig Larsson', 'Nobel', '', '', '', '0', 10),
(14, 'The Hast', 'image/theh.jpg', 'Stephene Meyer', 'Nobel', '', '', '', '0', 13),
(15, 'Artemis fowl', 'image/af.jpg', 'Eoin Colfer', 'Nobel', '', '', '', '0', 33),
(16, 'Eragon', 'image/e.jpg', 'Christopher Paolini', 'Nobel', '', '', '', '0', 13),
(17, 'The Bad Beginning', 'image/tbb.jpg', 'Lemony Snicket', 'Nobel', '', '', '', '0', 14),
(18, 'Just Listen', 'image/demo.jpg', 'Sarah Dessen', 'Nobel', '', '', '', '0', 0),
(19, 'Silent Scream', 'image/demo.jpg', 'Angela Marsons', 'Nobel', '', '', '', '0', 0),
(22, 'tes', 'image/demo.jpg', 'test', 'Course', 'test', 'test', 'test', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `name`) VALUES
(1, 'Nobel'),
(2, 'Course'),
(7, 'IT ML');

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `eid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `download` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`eid`, `name`, `subject`, `category`, `download`) VALUES
(1, 'toc.zip', 'Toc', 'Course', 'ebooks/toc.zip'),
(2, 'dbms.zip', 'dbms', 'Course', 'ebooks/dbms.zip'),
(6, 'chapter', 'IT', 'Course', ''),
(7, 'Hacking', 'computer', 'Course', 'ebooks/hacking.txt'),
(8, 'zip bomber', 'IT', 'Nobel', '');

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `incharge` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`id`, `name`, `exam_id`, `sem_id`, `date`, `incharge`) VALUES
(1, 'chaitra 5th sem 1st exam', 1, 1, '2017-03-07', 'Ratey Kaila');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `type`) VALUES
(1, 'First term'),
(2, 'Pre-Board ');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `fid` int(11) NOT NULL,
  `feedby` varchar(40) NOT NULL,
  `feed_type` varchar(10) NOT NULL,
  `feeds` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`fid`, `feedby`, `feed_type`, `feeds`) VALUES
(1, 'Lakpa Sherpa', 'idea', 'Give some features for teacher too!'),
(2, 'Basanta Shahi', 'praise', 'Well done! Guys! I am impressed with your works. '),
(3, 'Lakpa Sherpaa<br>', 'idea', 'How about feedback by people who are already logged in with facebook!');

-- --------------------------------------------------------

--
-- Table structure for table `fullnames`
--

CREATE TABLE `fullnames` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fullnames`
--

INSERT INTO `fullnames` (`id`, `firstname`, `lastname`) VALUES
(1, 'lakpa', 'sherpa'),
(2, 'Ram', 'Bahadur');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `tid` int(11) NOT NULL,
  `issuedate` date NOT NULL,
  `submission` date NOT NULL,
  `b_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `bookmarked` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`tid`, `issuedate`, `submission`, `b_id`, `s_id`, `bookmarked`) VALUES
(4, '2016-08-19', '2016-08-18', 3, 2, '2016-04-12'),
(12, '2016-09-16', '2016-09-16', 6, 2, '2016-04-12'),
(13, '2017-03-25', '2017-03-25', 13, 2, '2016-03-01'),
(159, '2017-04-10', '2017-04-17', 17, 1, '2017-04-10'),
(162, '0000-00-00', '0000-00-00', 1, 1, '2017-04-10'),
(164, '0000-00-00', '0000-00-00', 2, 1, '2017-04-10'),
(165, '0000-00-00', '0000-00-00', 15, 22, '2017-04-10'),
(166, '0000-00-00', '0000-00-00', 17, 22, '2017-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `marksheet`
--

CREATE TABLE `marksheet` (
  `id` int(11) NOT NULL,
  `examination_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `marks_obtained` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marksheet`
--

INSERT INTO `marksheet` (`id`, `examination_id`, `stu_id`, `sub_id`, `marks_obtained`) VALUES
(1, 1, 1, 1, 55),
(2, 1, 1, 2, 56),
(3, 1, 1, 3, 68),
(4, 1, 1, 4, 51),
(5, 1, 1, 5, 46);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `nid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `download` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`nid`, `name`, `subject`, `category`, `download`) VALUES
(1, 'dbms', 'Database Management ', 'Course', ''),
(2, 'Test', 'any', 'Course', 'notes/multiple.txt');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `name`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Third'),
(4, 'Fourth'),
(5, 'Fifth'),
(6, 'Sixth'),
(7, 'Seventh'),
(8, 'Eighth');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `image` varchar(50) NOT NULL,
  `sid` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `program` varchar(10) DEFAULT NULL,
  `year` varchar(8) DEFAULT NULL,
  `roll_no` int(11) DEFAULT NULL,
  `address` varchar(30) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `reg_date` date NOT NULL,
  `reg_time` time NOT NULL,
  `ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`image`, `sid`, `email`, `password`, `fname`, `program`, `year`, `roll_no`, `address`, `mobile`, `reg_date`, `reg_time`, `ip_address`) VALUES
('pp/lakpa.jpg', 1, 'sherpalakpa18@gmail.com', 'developer', 'Lakpa Sherpa<br>', 'BSc. CSIT', '2071', 15, 'kapan', '9849446626', '0000-00-00', '00:00:00', ''),
('pp/sandes.jpg', 2, '', 'designer', 'Sandes Jonchhe', 'Bsc. CSIT', '2071', 28, '', '9849128762', '0000-00-00', '00:00:00', ''),
('', 4, '', 'admin', 'admin', 'Bsc CSIT', '2071', 1, '', '9803030413', '0000-00-00', '00:00:00', ''),
('', 21, 'abc@gmail.com', 'asdf', 'Jhon Doe', 'blank', '2069', 0, '', '', '2017-04-10', '16:47:26', '127.0.0.1'),
('pp/IMG_20170207_135320_995.jpg', 22, 'asdf@asdf.com', 'asdf', 'Jhon Doe', 'BSc. CSIT', '2069', 12, 'Somewhere', '9841525252', '2017-04-10', '16:54:18', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `full` int(11) NOT NULL,
  `pass` int(11) NOT NULL,
  `subject_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `full`, `pass`, `subject_code`) VALUES
(1, 'Calculus', 80, 32, 'MTH-129'),
(2, 'Probabilty & Statics', 60, 24, 'MTH-101'),
(3, 'Introduction to Technology', 80, 32, 'CSC-191'),
(4, 'Statistics I', 60, 24, 'STA-191'),
(5, 'Introduction to Programming', 60, 24, 'CSC-001');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_time` time NOT NULL,
  `ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `username`, `password`, `reg_date`, `reg_time`, `ip_address`) VALUES
('sherpalakpa18@gmail.com', 'admin', 'admin', '2016-07-21', '01:25:24', ''),
('talk2samrat27@gmail.com', 'Samrat Acharya', '9847748310', '2016-07-23', '21:44:56', '::1'),
('test@test.com', 'test', 'test', '2016-07-31', '18:13:27', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `marksheet`
--
ALTER TABLE `marksheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `marksheet`
--
ALTER TABLE `marksheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
