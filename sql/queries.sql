-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 05:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--
USE `sms`;


--
-- Complex Queries 
--


SELECT e.exam_id, s.student_name, c.c_name, d.dept_name , e.marks
	FROM exams e 
	INNER JOIN courses c 
	ON e.course_id=c.course_id
	INNER JOIN depts d
	ON e.dept_id=d.dept_id
	INNER JOIN stds s
	ON e.student_id=s.student_id 
	WHERE s.student_name LIKE '%$query%';
	
SELECT e.enrol_id, s.student_name, c.c_name, d.dept_name, e.dated, e.description
	FROM enrollments e 
	INNER JOIN courses c 
	ON e.course_id=c.course_id
	INNER JOIN depts d
	ON e.dept_id=d.dept_id
	INNER JOIN stds s
	ON e.student_id=s.student_id 
	WHERE s.student_name LIKE '%$query%'

SELECT stds.student_name, fees.receipt_no, fees.dated, fees.tution_fee
	FROM stds
	INNER JOIN fees ON stds.student_id=fees.student_id WHERE stds.student_name LIKE '%$query%'

update stds set student_name='$name',sex='$sex',address='$add',contact='$ph'
	where student_id='$id'
	
update courses set c_name='$cname', tutor='$tutor', qualification='$qual', experience='$exp'
	where course_id='$id'
	
update admins set admin_name='$name', sex='$sex', password='$pass'
	where admin_id='$id'
--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `sex`, `password`) VALUES
(1, 'Kivi Maddy', 'F', '3884dRu3#k'),
(2, 'David Peterson ', 'M', 'dk((@kD83D'),
(3, 'Joy Hood', 'M', '4RT(sskdajeu'),
(4, 'Milli Gom', 'F', 'e477J20q)*ask'),
(5, 'Michel Bark', 'M', '28240jsj!ej'),
(6, 'Sofi Amendson', 'F', '28dafa*Y@'),
(7, 'Kamala Dok', 'F', 'u9e03djEi3@'),
(8, 'Gomal Gome', 'F', 'je*#E2kdA');

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `c_name`, `tutor`, `qualification`, `experience`) VALUES
(1, 'Computer Programming', 'Tomas Hardy', 'Bachelors', '5 year'),
(2, 'Pure Mathematics', 'Phillip Com', 'Bachelors', '3 Years'),
(3, 'Airodynamics', 'Deitel ', 'Masters', 'N/A'),
(4, 'Databases', 'Jefery Hoffer', 'Masters', '5 years'),
(5, 'Neural Networks', 'Mejenta Garry', 'Bachelors', '2 years'),
(6, 'Basic Electronics', 'Ronaldo Pres', 'Bachelors', '2 year'),
(7, 'Deep Learning', 'Dumino Bird', 'Masters', '2 years'),
(8, 'Data Science', 'Cassey Bay', 'Masters', '1 year'),
(10, 'Linguistics', 'Joseph Kissing', 'Bachelors', '5 years');

--
-- Dumping data for table `depts`
--

INSERT INTO `depts` (`dept_id`, `dept_name`, `dept_head`) VALUES
(1, 'Aerospace', 'Kalison Das'),
(2, 'Atomic Technology', 'Jony Hood'),
(3, 'Mechanical Technology', 'Quserra Bee'),
(4, 'Robotics', 'Mr. Hodds'),
(5, 'Computer Science', 'Anasche Gome'),
(6, 'Mathematics', 'Billi Cose'),
(7, 'Chemical Engineering', 'Mark Burac'),
(8, 'Civil Technology', 'Quislin Jaw'),
(9, 'Artificial Intelligence', 'May Don'),
(10, 'Medical Science', 'Bool Govind'),
(11, 'BioInformatics', 'Sachin Das'),
(12, 'Physics', 'Bell Dose');

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrol_id`, `student_id`, `course_id`, `dept_id`, `dated`, `description`) VALUES
(1, 3, 4, 6, '2020-03-23', '...'),
(2, 4, 1, 4, '2021-12-02', 'blah blah'),
(3, 2, 3, 4, '2021-01-28', 'have a good day!'),
(4, 5, 6, 3, '2020-10-14', 'Hey, whatsapp'),
(5, 6, 5, 3, '2020-02-03', ''),
(6, 6, 7, 3, '2020-07-29', 'yes, this is enrolled'),
(8, 12, 4, 11, '2021-03-30', 'blah blah blah blah ');

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `student_id`, `course_id`, `dept_id`, `marks`) VALUES
(1, 1, 5, 2, 79),
(2, 2, 4, 1, 67),
(3, 3, 2, 4, 86),
(4, 4, 3, 3, 59),
(5, 6, 4, 6, 93),
(6, 1, 1, 1, 80),
(7, 3, 2, 9, 75);

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`student_id`, `receipt_no`, `dated`, `tution_fee`) VALUES
(6, 1, '2020-02-20', 50000),
(3, 2, '2021-04-04', 43000),
(1, 3, '2021-11-16', 42110),
(5, 4, '2021-08-19', 94900),
(2, 5, '2020-02-04', 100320),
(7, 7, '2021-04-06', 49900);

--
-- Dumping data for table `stds`
--

INSERT INTO `stds` (`student_id`, `student_name`, `sex`, `address`, `contact`) VALUES
(1, 'David Hardy', 'M', 'Arabia', '(938) 3827 8274'),
(2, 'John Blair', 'M', 'Kigdom', '(939) 9299 334'),
(3, 'Jimmy Charter', 'M', 'Madrid', '(233) 4993 888'),
(4, 'Billi Blinken', 'F', 'Osaka', '(283) 288 3737'),
(5, 'Jennifer Fit', 'F', 'Uganda', '(993) 532 9938'),
(6, 'Jennifer Gol', 'F', 'Indiana', '(251) 2003 3003'),
(7, 'Jasmine', 'F', 'Veitname', '(484) 7377 342'),
(8, 'McCarthy Bin', 'F', 'India', '(323) 2377 7482'),
(9, 'Thomas Cuff', 'M', 'Germany', '(344) 39848 828'),
(12, 'Kitty Gomes', 'F', 'Madagascar', '(439) 3888 5544'),
(14, 'Killer bee', 'F', 'Jakarta', '9398 3883 282');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
