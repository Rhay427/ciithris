-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 10:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciiteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_list`
--

CREATE TABLE `access_list` (
  `id` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `manage_employee` int(11) NOT NULL,
  `manage_leave` int(11) NOT NULL,
  `payroll` int(11) NOT NULL,
  `attendance` int(11) NOT NULL,
  `resignations` int(11) NOT NULL,
  `recruitment` int(11) NOT NULL,
  `manage_mails` int(11) NOT NULL,
  `manage_admin` int(11) NOT NULL,
  `announcements` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_list`
--

INSERT INTO `access_list` (`id`, `adminId`, `manage_employee`, `manage_leave`, `payroll`, `attendance`, `resignations`, `recruitment`, `manage_mails`, `manage_admin`, `announcements`, `datecreated`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-10-29 16:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `adminId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`adminId`, `username`, `email`, `password`, `is_active`, `date_added`) VALUES
(1, '@masterAdmin', 'ciiteam.official@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2022-10-29 16:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `state` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `author`, `title`, `description`, `datestamp`, `state`) VALUES
(1, 'Rhay Sabaria', 'Christmas Party!', 'askdjfklasdnfl;kandf;lna', '2021-04-18 01:55:09', 1),
(2, 'Rhay Sabaria', 'Another Announcement sample', 'Sample description date will be updated!!', '2021-04-18 02:02:20', 1),
(3, 'Rhay Sabaria', 'Faculty Trip', 'Next Week, the faculty will have an outing', '2021-04-16 02:24:07', 1),
(4, 'test Author', 'this is a test', 'test desc', '2021-04-16 02:27:09', 0),
(5, 'Vincent Sabaria', 'last announcement', 'Last Post for this night', '2021-04-16 03:55:10', 0),
(6, 'sample', 'sample is this', 'sample wowow', '2021-04-18 01:30:28', 0),
(7, 'Rhay Sabaria', 'Another example this is it', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ipsum ipsum', '2021-04-20 01:05:29', 0),
(8, 'me', 'test this is a test', 'test this is a test test this is a test test this is a test', '2021-04-18 02:22:47', 1),
(9, 'Mr. Sabaria', 'Faculty Welcome Party', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut asdasdasdasdjashdlfjkhaaksjdhfjkasdhfjkasdhfkjashdfkjhasdfhjkasdfhashdfljkashdflkashjdfljkashdfkljhasdfkljahsdfjkhasdjklfhalsjkdfhlajksdhfjklashdfljkahsdfkljhasjkldfhahsdfjhasdjlfhasldjkfhaklsjdfhajkl', '2021-04-19 23:35:19', 1),
(10, 'Rhay Sabaria', 'title of the announcement', 'asd:asdlkhasdofhasdfasdf;asdfhscjnvPK1234WDLFALSKNDANSDF', '2021-04-19 23:27:17', 0),
(11, 'Kgwd. Vince', 'mawawalan ng kuryente', 'yawa ala ', '2021-04-20 18:45:30', 1),
(12, 'Rhay Sabaria', 'Medical Clearance Update!', 'this date this date sample information sample information', '2021-06-06 21:11:52', 1),
(13, 'Rhay Sabaria', 'test announcement', 'sample description', '2021-06-04 02:22:56', 1),
(14, 'Rhay Sabaria', 'LAUGHTER WEEK', 'sample sample sample', '2021-06-04 02:25:58', 0),
(15, 'Rhay Sabaria', 'LAUGHTER WEEK', 'sample sample sample', '2021-06-04 02:26:30', 0),
(16, 'Rhay Sabaria', 'LAUGHTER WEEK', 'sample sample sample', '2021-06-04 02:27:11', 0),
(17, 'rhay sabaria', 'another test alert', 'sample description', '2021-06-04 02:30:50', 1),
(18, 'rhay sabaria', 'sample', 'samepl descl', '2021-06-04 02:41:37', 1),
(19, 'rhay sabaria', 'new new new', 'samopamepamsdlalsd', '2021-06-04 02:45:32', 1),
(20, 'Rhay Sabaria', 'adding new test', 'sdlasdklasdlkasjdasd', '2021-06-06 17:04:29', 1),
(21, 'Rhay Sabaria', 'sample announce again', 'sample sample messsage', '2021-06-06 17:14:49', 1),
(22, 'Rhay Sabaria', 'another sample announcement', 'sample message again', '2021-06-06 17:34:46', 1),
(23, 'Rhay Sabaria', 'soasdpasdlmasd', 'sa,pe', '2021-06-06 17:42:05', 0),
(24, 'Rhay Sabaria', 'asdasdasdasd', 'asdlkasdasdasd', '2021-06-06 17:42:29', 0),
(25, 'RHay sabaria', 'sampkle', 'aslkd;alksdl;\'askd;ljksd\r\n', '2021-06-06 17:45:10', 0),
(26, 'Rhay Sabaria', 'Another Announcement example', 'asdhasdjkaskljdhasd', '2021-06-06 17:48:04', 0),
(27, 'dasd', 'medical t', 'asasdasdasd', '2021-06-06 17:50:21', 0),
(28, 'Rhay Sabaria', 'future sample', 'd;lakjdl;kasjdlkasjdlkahjsd', '2021-06-06 17:56:27', 1),
(29, 'rhay sabaria', 'new sweetalert new sample', 'aksjdakdajklsdn', '2021-06-24 00:18:29', 0),
(30, 'dasda', 'dasdasd', 'sdasdasd', '2021-06-06 18:17:35', 0),
(31, 'Rhay Sabaria', 'success', 'happy yehey', '2021-06-06 18:29:14', 0),
(32, 'Rhay Sabaria', 'Success alert!', 'success message', '2021-06-06 18:42:04', 0),
(33, 'Rhay Sabaria', 'Success Party', 'welcoming party to juniors', '2021-06-29 00:47:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_user`
--

CREATE TABLE `emp_user` (
  `id` int(11) NOT NULL,
  `empid` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `memail` varchar(100) NOT NULL,
  `aemail` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `mcontact` varchar(100) NOT NULL,
  `acontact` varchar(100) NOT NULL,
  `mstatus` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `present` varchar(200) NOT NULL,
  `permanent` varchar(200) NOT NULL,
  `profImage` varchar(200) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `datestarted` date NOT NULL,
  `salarygrade` varchar(50) NOT NULL,
  `basicsalary` bigint(20) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `state` int(11) NOT NULL,
  `isadmin` int(11) NOT NULL,
  `edit_auth` int(11) NOT NULL,
  `is_mauth` int(11) NOT NULL,
  `is_aauth` int(11) NOT NULL,
  `auth_code` varchar(4) NOT NULL,
  `onetimekey` varchar(4) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_user`
--

INSERT INTO `emp_user` (`id`, `empid`, `fullname`, `username`, `password`, `memail`, `aemail`, `birthdate`, `mcontact`, `acontact`, `mstatus`, `religion`, `nationality`, `present`, `permanent`, `profImage`, `branch`, `department`, `designation`, `datestarted`, `salarygrade`, `basicsalary`, `frequency`, `state`, `isadmin`, `edit_auth`, `is_mauth`, `is_aauth`, `auth_code`, `onetimekey`, `created`) VALUES
(16, '002022', 'Vincent Sabaria', '@vincentsabaria', 'f8b1ba658fe1b9011a323c6f755090aa', 'vincent@gmail.com', 'vincent.rhay@gmail.com', '2021-03-01', '09123971293', '0977812381', 'single', 'catholic', 'filipino', 'sample address sample address sample address sample address sample address,.,.-', 'example sample sample address sample address sample address sample address sample address,.,.-', 'http://192.168.100.103/prof_img/002022.jpeg', 'Pasay', 'CS', 'Web Developer', '2021-04-04', 'Grade 2', 15000, 'Monthly', 0, 0, 1, 0, 0, '0', '0', '2021-04-03 21:12:08'),
(23, '002023', 'Jane Doe', '@JaneDoe', '5d9e950da28c969677622b6c5d962b46', 'jane@sample.com', 'sampleJane@gmail.com', '2021-03-30', '09123971293', '0977812381', 'single', 'catholic', 'filipino', 'sample', 'sample', 'http://192.168.100.103/prof_img/002023.jpeg', 'Pasay', 'Academic Department', 'English Instructor', '2021-04-06', 'Grade 1', 14500, 'Weekly', 1, 1, 1, 0, 0, '0', '1791', '2021-04-05 16:48:23'),
(24, '002021', 'Rhay Vincent F. Sabaria', '@rhaysabaria', '733f08c7fde85311493c8c874bacf831', 'rhayvincent.sabaria@gmail.com', 'rhaysabaria123@gmail.com', '2021-03-30', '09453164432', '09453164432', 'single', 'catholic', 'filipino', 'example', 'sample', 'http://192.168.100.103/prof_img/002021.jpeg', 'Kamuning, GMA', 'CS Department', 'Web Developer', '2021-04-08', 'Grade 1', 15000, 'Weekly', 1, 1, 2, 0, 0, '5031', '3466', '2021-04-08 15:51:30'),
(27, '001011', 'Admin', '@masterAdmin', '5f4dcc3b5aa765d61d8327deb882cf99', 'ciiteamofficial@gmail.com', 'ciiteamofficial@gmail.com', '2021-06-06', '00000', '00000', 'NA', 'NA', 'NA', 'NA', 'NA', 'http://192.168.100.103/prof_img/001011.png', 'NA', 'NA', 'NA', '2021-06-06', 'Grade 1', 10000, 'Weekly', 1, 1, 1, 0, 0, '', '', '2021-06-06 13:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `interview_tbl`
--

CREATE TABLE `interview_tbl` (
  `id` int(11) NOT NULL,
  `recId` int(11) NOT NULL,
  `fullName` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` text NOT NULL,
  `empIDrefer` text NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `state` int(11) NOT NULL,
  `datetimestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_credits`
--

CREATE TABLE `leave_credits` (
  `id` int(11) NOT NULL,
  `empid` varchar(50) NOT NULL,
  `credits` int(11) NOT NULL,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` int(11) NOT NULL,
  `empid` varchar(100) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `startDate` text NOT NULL,
  `endDate` text NOT NULL,
  `totalDays` text NOT NULL,
  `reason` text NOT NULL,
  `status` text NOT NULL,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `state` int(11) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `empid`, `fullname`, `email`, `startDate`, `endDate`, `totalDays`, `reason`, `status`, `datestamp`, `state`, `remarks`) VALUES
(6, '002021', 'Rhay Sabaria', 'rhayvincent.sabaria@gmail.com', '2021-6-1', '2021-7-26', '56', 'lorem ipsum lorem ipsum lorem ipsum', 'Approved', '2021-06-15 17:40:08', 1, 'sample'),
(10, '002021', 'Rhay Sabaria', 'rhayvincent.sabaria@gmail.com', '2021-5-27', '2021-5-27', '1', 'sample reason to have a leave', 'Pending', '2021-06-09 01:34:17', 1, 'Enjoy your leave!'),
(11, '001011', 'Sample Name', 'ciiteamofficial@gmail.com', '2021-7-7', '2021-7-9', '3', 'Sick leave', 'Pending', '2021-07-07 14:30:17', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `mail_tbl`
--

CREATE TABLE `mail_tbl` (
  `id` int(11) NOT NULL,
  `empid` varchar(100) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `response` text NOT NULL,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_tbl`
--

INSERT INTO `mail_tbl` (`id`, `empid`, `fullname`, `email`, `title`, `message`, `response`, `datestamp`, `status`, `state`) VALUES
(20, '002021', 'Rhay Sabaria', 'rhayvincent.sabaria@gmail.com', 'Sample mail', 'this is a sample mail to admin', '$response', '2021-05-22 02:32:36', 'Responded', 1),
(21, '002021', 'Rhay Sabaria', 'rhayvincent.sabaria@gmail.com', 'This is a sample title', 'so this is a message from me', 'This is a sample response', '2021-05-20 23:56:34', 'Responded', 1),
(22, '002021', 'Rhay Sabaria', 'rhayvincent.sabaria@gmail.com', 'another title', 'this is just a sample message', '$response', '2021-05-22 20:32:12', 'Responded', 1),
(23, '002021', 'Rhay Sabaria', 'rhayvincent.sabaria@gmail.com', 'sample sample', 'sample', '$response', '2021-05-23 15:41:50', 'Responded', 1),
(24, '002021', 'Rhay Sabaria', 'rhayvincent.sabaria@gmail.com', 'New TItle', 'new message', '$response', '2021-05-23 16:38:56', 'Responded', 1),
(25, '002021', 'Rhay sabaria', 'rhayvincent.sabaria@gmail.com', 'another title', 'ANOTHER EXAMPLE', '$response', '2021-05-23 16:47:12', 'Responded', 1),
(26, '002021', 'sample', 'rhayvincent.sabaria@gmail.com', 'sample', 'sample', '$response', '2021-05-23 16:49:01', 'Responded', 1),
(27, '002021', 'sample s', 'rhayvincent.sabaria@gmail.com', 'sample', 'sample', '$response', '2021-05-23 16:50:18', 'Responded', 1),
(28, '002021', 'sample sample', 'rhayvincent.sabaria@gmail.com', 'sample sap,', 'sampkle', 'another sample response', '2021-05-23 16:55:55', 'Responded', 1),
(29, '002021', 'rhayv', 'rhayvincent.sabaria@gmail.com', 'sample', 'sampkasasd', 'responded this mail', '2021-05-22 00:48:48', 'Responded', 1),
(30, '002021', 'newname', 'rhayvincent.sabaria@gmail.com', 'snasodjoa', 'nskanksdnasd', 'responded now', '2021-05-23 17:10:04', 'Responded', 1),
(31, '002021', 'rhay', 'rhayvincent.sabaria@gmail.com', 'sample', 'mail465', '', '2021-05-22 00:55:52', 'Sent', 1),
(32, '002021', 'newname', 'rhayvincent.sabaria@gmail.com', 'sample8889', 'test mail', '$response', '2021-05-23 16:54:53', 'Responded', 1),
(33, '002021', 'rhay', 'rhayvincent.sabaria@gmail.com', 'sample25', 'sample', '', '2021-05-22 01:02:34', 'Sent', 1),
(34, '002021', 'rhay', 'rhayvincent.sabaria@gmail.com', 'last8889', 'samplesample', '', '2021-05-22 01:06:57', 'Sent', 1),
(35, '002021', 'rhay sabaria', 'rhayvincent.sabaria@gmail.com', 'lastsamplegmail', 'sample', '$response', '2021-05-23 16:51:14', 'Responded', 1),
(36, '002021', 'another', 'rhayvincent.sabaria@gmail.com', 'another', 'another', '', '2021-05-22 01:44:15', 'Sent', 1),
(37, '002021', 'new another', 'rhayvincent.sabaria@gmail.com', 'another1', 'ANOTHER', '', '2021-05-22 01:45:01', 'Sent', 1),
(38, '002021', 'rhay', 'rhayvincent.sabaria@gmail.com', 'another2', 'sample', '', '2021-05-22 01:45:56', 'Sent', 1),
(39, '002021', 'rhay', 'rhayvincent.sabaria@gmail.com', 'another3', 'sample', '', '2021-05-22 01:54:00', 'Sent', 1),
(40, '002021', 'rhay', 'rhayvincent.sabaria@gmail.com', 'another4', 'sample', '', '2021-05-22 01:54:36', 'Sent', 1),
(41, '002021', 'rhay', 'rhayvincent.sabaria@gmail.com', 'another5', 'sample', 'gotta response', '2021-06-06 21:32:27', 'Responded', 1),
(42, '002021', 'rhay', 'rhayvincent.sabaria@gmail.com', 'last6', 'sample', 'sample response', '2021-06-06 21:31:45', 'Responded', 1),
(43, '002021', 'rhay', 'rhayvincent.sabaria@gmail.com', 'last7', 'sample', 'asasdasdasdasdasdasd', '2021-06-02 23:01:46', 'Responded', 1),
(44, '002021', 'rhay', 'rhayvincent.sabaria@gmail.com', 'last8', '995', 'sample', '2021-06-02 22:58:14', 'Responded', 1),
(45, '002021', 'rhay', 'rhayvincent.sabaria@gmail.com', 'last9', 'sample', '', '2021-05-22 02:18:00', 'Sent', 0),
(46, '002021', 'Rhay Vincent F. Sabaria', 'rhayvincent.sabaria@gmail.com', 'Testing', 'another testing message', 'sample response', '2021-06-02 22:49:15', 'Responded', 1),
(47, '002021', 'Rhay Sabaria', 'rhayvincent.sabaria@gmail.com', 'testing1', 'sample sample', '', '2021-05-24 22:52:28', 'Sent', 0),
(48, '002021', 'Rhay Sabaria', 'rhayvincent.sabaria@gmail.com', 'about something', 'somethingsomething something something', 'sample response is this one', '2021-06-02 22:47:59', 'Responded', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_tbl`
--

CREATE TABLE `recruitment_tbl` (
  `id` int(11) NOT NULL,
  `fullName` text NOT NULL,
  `jobSpec` text NOT NULL,
  `gender` text NOT NULL,
  `birthdate` text NOT NULL,
  `contact` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `specialization` text NOT NULL,
  `years` text NOT NULL,
  `currentCompany` text NOT NULL,
  `designation` text NOT NULL,
  `empIDrefer` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `dateStamp` datetime NOT NULL DEFAULT current_timestamp(),
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruitment_tbl`
--

INSERT INTO `recruitment_tbl` (`id`, `fullName`, `jobSpec`, `gender`, `birthdate`, `contact`, `email`, `specialization`, `years`, `currentCompany`, `designation`, `empIDrefer`, `status`, `dateStamp`, `state`) VALUES
(2, 'Rhay Sabaria', 'Front end developer', 'M', 'April 27, 2000', '190823891', 'sabaria.rhayvincent@gmail.com', 'Web development', '2', 'Accenture', 'Front end developer', '002021', 'Pending', '2021-05-30 01:03:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resignation_requests`
--

CREATE TABLE `resignation_requests` (
  `id` int(11) NOT NULL,
  `empid` varchar(100) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `department` text NOT NULL,
  `reason` text NOT NULL,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resignation_requests`
--

INSERT INTO `resignation_requests` (`id`, `empid`, `fullname`, `email`, `department`, `reason`, `datestamp`, `state`) VALUES
(2, '002021', 'Rhay Sabaria', 'rhayvincent.sabaria@gmail.com', 'CS Department', 'change of plans', '2021-05-28 19:29:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_attendance`
--

CREATE TABLE `time_attendance` (
  `empid` varchar(100) NOT NULL,
  `fullname` text NOT NULL,
  `timeIn` varchar(100) NOT NULL,
  `timeOut` varchar(100) NOT NULL,
  `hours` varchar(100) NOT NULL,
  `dateStamp` date NOT NULL,
  `errorMessage` text NOT NULL,
  `state` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_attendance`
--

INSERT INTO `time_attendance` (`empid`, `fullname`, `timeIn`, `timeOut`, `hours`, `dateStamp`, `errorMessage`, `state`) VALUES
('002021', 'Rhay Vincent F. Sabaria', '23:40:13', '23:40:14', '0:0:1', '2021-05-19', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '23:40:24', '23:40:26', '0:0:2', '2021-05-19', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '24:12:48', '24:12:52', '0:0:4', '2021-05-20', '', '0'),
('002021', 'Rhay Vincent F. Sabaria', '24:13:30', '24:13:31', '0:0:1', '2021-05-20', 'wrong lick', '0'),
('002021', 'Rhay Vincent F. Sabaria', '24:18:50', '24:18:54', '0:0:4', '2021-05-20', 'accidentaly clicked', '0'),
('002021', 'Rhay Vincent F. Sabaria', '24:37:58', '24:38:01', '0:0:3', '2021-05-20', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '24:39:36', '24:39:39', '0:0:3', '2021-05-20', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '24:39:43', '24:39:44', '0:0:1', '2021-05-20', 'wrong tap', '0'),
('002021', 'Rhay Vincent F. Sabaria', '01:08:31', '01:08:36', '0:0:5', '2021-05-21', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '24:08:12', '24:08:15', '0:0:3', '2021-05-22', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '17:38:39', '17:38:42', '0:0:3', '2021-05-23', 'lag', '0'),
('002021', 'Rhay Vincent F. Sabaria', '17:45:15', '17:45:21', '0:0:6', '2021-05-23', 'wrong tap', '0'),
('002021', 'Rhay Vincent F. Sabaria', '17:46:06', '17:46:08', '0:0:2', '2021-05-23', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '17:46:09', '17:46:11', '0:0:2', '2021-05-23', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '17:46:13', '17:46:17', '0:0:4', '2021-05-23', 'sample report', '0'),
('002021', 'Rhay Vincent F. Sabaria', '22:33:10', '22:33:12', '0:0:2', '2021-05-25', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '23:54:15', '23:54:17', '0:0:2', '2021-05-25', 'something wrong', '0'),
('002021', 'Rhay Vincent F. Sabaria', '24:10:26', '24:10:27', '0:0:1', '2021-05-26', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '24:46:40', '24:46:43', '0:0:3', '2021-05-26', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '01:09:52', '01:09:55', '0:0:3', '2021-05-30', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '23:50:07', '23:50:10', '0:0:3', '2021-06-01', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '12:01:41', '12:01:43', '0:0:2', '2021-06-11', '', '1'),
('002021', 'Rhay Vincent F. Sabaria', '11:39:52', '11:39:57', '0:0:5', '2021-06-15', '', '1'),
('002023', 'Jane Doe', '24:08:36', '24:09:19', '0:0:43', '2021-06-29', '', '1'),
('002023', 'Jane Doe', '24:09:36', '24:09:39', '0:0:3', '2021-06-29', '', '1'),
('001011', 'Admin', '14:27:26', '14:27:28', '0:0:2', '2021-07-07', '', '1'),
('001011', 'Admin', '14:27:30', '14:27:32', '0:0:2', '2021-07-07', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_list`
--
ALTER TABLE `access_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_user`
--
ALTER TABLE `emp_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `memail` (`memail`),
  ADD UNIQUE KEY `empid` (`empid`),
  ADD UNIQUE KEY `fullname` (`fullname`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `interview_tbl`
--
ALTER TABLE `interview_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_credits`
--
ALTER TABLE `leave_credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_tbl`
--
ALTER TABLE `mail_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitment_tbl`
--
ALTER TABLE `recruitment_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resignation_requests`
--
ALTER TABLE `resignation_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_list`
--
ALTER TABLE `access_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `emp_user`
--
ALTER TABLE `emp_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `interview_tbl`
--
ALTER TABLE `interview_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_credits`
--
ALTER TABLE `leave_credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mail_tbl`
--
ALTER TABLE `mail_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `recruitment_tbl`
--
ALTER TABLE `recruitment_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resignation_requests`
--
ALTER TABLE `resignation_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
