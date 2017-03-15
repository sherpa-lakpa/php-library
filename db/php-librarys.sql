-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2017 at 11:11 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

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
  `semester` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `image`, `author`, `category`, `publisher`, `edition`, `subject`, `semester`) VALUES
(1, 'Game of thrones', 'image/got.jpg', 'Georger R.R. Martin', 'Nobel', '', '', '', '0'),
(2, 'Harry Porter', 'image/hp.jpg', 'J.K Rowling', 'Nobel', '', '', '', '0'),
(3, 'Go Set a Watchman', 'image/gw.jpg', 'Harper Lee', 'Nobel', '', '', '', '0'),
(4, 'The Girl On The Train', 'image/tgot.jpg', 'Paula Hawkins', 'Nobel', '', '', '', '0'),
(6, 'To kill A MockingBird', 'image/ki.jpg', 'Harper Lee', 'Nobel', '', '', '', '0'),
(7, 'The Hobbit', 'image/th.jpg', 'J.R.R. Tolkein', 'Nobel', '', '', '', '0'),
(8, 'Vampire Academy', 'image/va.jpg', 'Richelle Mead', 'Nobel', '', '', '', '0'),
(9, 'Divergent', 'image/d.jpg', 'Veronica Roth', 'Nobel', '', '', '', '0'),
(10, 'Hush Hush', 'image/hh.jpg', 'Becca Fitzpatrick', 'Nobel', '', '', '', '0'),
(11, 'The Maze Runner', 'image/tmr.jpg', 'James Dashner', 'Nobel', '', '', '', '0'),
(12, 'The Hunger Games', 'image/thg.jpg', 'Suzanne Collins', 'Nobel', '', '', '', '0'),
(13, 'The Girl with The Dragon Tatoo', 'image/gt.jpg', 'Steig Larsson', 'Nobel', '', '', '', '0'),
(14, 'The Hast', 'image/theh.jpg', 'Stephene Meyer', 'Nobel', '', '', '', '0'),
(15, 'Artemis fowl', 'image/af.jpg', 'Eoin Colfer', 'Nobel', '', '', '', '0'),
(16, 'Eragon', 'image/e.jpg', 'Christopher Paolini', 'Nobel', '', '', '', '0'),
(17, 'The Bad Beginning', 'image/tbb.jpg', 'Lemony Snicket', 'Nobel', '', '', '', '0'),
(18, 'Just Listen', 'image/sd.jpg', 'Sarah Dessen', 'Nobel', '', '', '', '0'),
(19, 'Silent Scream', 'image/ss.jpg', 'Angela Marsons', 'Nobel', '', '', '', '0'),
(20, 'Twilight', 'image/t.jpg', 'Stephenie Meyer', 'Nobel', '', '', '', '0'),
(30, 'new graphics', 'image/demo.jpg', 'lakpa', 'Course', 'person', '2010', 'computer graphics', '4');

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
(2, 'Course');

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
(5, 'SAD', 'sad', 'Course', 'ebooks/sad.zip'),
(6, 'chapter1', 'IT', 'Course', 'ebooks/IT.txt'),
(7, 'Hacking', 'computer', 'Course', 'ebooks/hacking.txt'),
(8, 'zip bomb', 'IT', 'Nobel', 'ebooks/dont touch.txt'),
(9, 'big datas', 'IT', 'Nobel', ''),
(10, 'economy', 'commerse', 'Course', ''),
(11, 'DBMS', 'DBMS', 'Course', 'ebooks/index.html');

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
(2, 'Basanta Shahi', 'praise', 'Well done! Guys! I am impressed with your works. ');

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
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`tid`, `issuedate`, `submission`, `b_id`, `s_id`) VALUES
(1, '2016-08-19', '2016-08-26', 1, 1),
(4, '2016-08-19', '2016-08-18', 3, 2),
(7, '2016-08-21', '2016-08-25', 19, 1),
(8, '2016-08-22', '2016-08-25', 2, 13),
(9, '2016-08-22', '2016-08-23', 15, 5),
(10, '2016-09-16', '2016-09-16', 0, 0),
(11, '2016-09-16', '2016-09-16', 0, 0),
(12, '2016-09-16', '2016-09-16', 0, 0);

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
(1, 'dms', 'Database Management ', 'Course', 'ebooks/dbms.zip'),
(2, 'Test', 'any', 'Course', 'notes/multiple.txt'),
(3, 'SAD', 'SAD', 'Course', 'notes/sad.zip');

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
('pp/lakpa.jpg', 1, 'sherpalakpa18@gmail.com', 'developer', 'Lakpa Sherpa', 'BSc. CSIT', '2071', 15, 'kapan', '9849446626', '0000-00-00', '00:00:00', ''),
('pp/sandes.jpg', 2, '', 'designer', 'Sandes Jonchhe', 'Bsc. CSIT', '2071', 28, '', '9849128762', '0000-00-00', '00:00:00', ''),
('pp/basanta.jpg', 3, '', 'vuro', 'Basanta Shahi', '2071', '2071', 8, '', '9843312532', '0000-00-00', '00:00:00', ''),
('', 4, '', 'admin', 'admin', 'Bsc CSIT', '2071', 1, '', '9803030413', '0000-00-00', '00:00:00', ''),
('', 5, 'saileshmainali123@gmail.com', 'kapan123', 'Sailesh Mainali', 'BSc. CSIT', '2071', 27, 'kapan', '9801234567', '2016-07-31', '18:18:47', '::1'),
('', 12, 'bjbhai35@gmail.com', 'nothing35', 'bijay koirala', 'BSc. CSIT', '2071', 11, 'kapan,kathmandu', '9843312905', '2016-08-22', '16:02:38', '::1'),
('', 13, 'talk2samrat27@gmail.com', '123456789', 'Samrat Acharya', 'BSc. CSIT', '2071', 24, 'Kushma,Parbat', '9847748310', '2016-08-22', '16:06:05', '::1'),
('', 14, 'jonny@gmail.com', 'test', 'Sipal Vuro', 'BSc. CSIT', '2072', 2, 'anywhere', '9841000001', '2016-08-25', '16:36:33', '::1');

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
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `marksheet`
--
ALTER TABLE `marksheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
