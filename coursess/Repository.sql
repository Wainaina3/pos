SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*Creation of database*/
CREATE DATABASE IF NOT EXISTS `REPOSITORY`;

/*Using the database*/
USE `REPOSITORY`;

/*dropping Department table if exists*/
DROP TABLE IF EXISTS `DEPARTMENT`;

/*Creating the department table*/
CREATE TABLE `DEPARTMENT`(`Department_Id` varchar(10) not null,
                          `Department_Name` varchar(45) not null,
                          `Dept_HOD` varchar(10), PRIMARY KEY(`Department_Id`))
                          ENGINE=InnoDB DEFAULT CHARSET=latin1;
                          
Insert into `DEPARTMENT`(`Department_Id`,`Department_Name`,`Dept_HOD`) values('102','BUSA','B10235'),('103','Computer Science','CS10342');

/*Creating the relationship between faculty and course*/
CREATE TABLE `faculty_course` (`FacCourse_Id` int(10) not null AUTO_INCREMENT,
                                `Faculty_Id` varchar(10) not null,
                               `Course_id` varchar(11) not null, PRIMARY KEY(`FacCourse_Id`))
                                ENGINE=InnoDB DEFAULT CHARSET=latin1;
                                
DROP TABLE IF EXISTS `FACULTY`;

/*Creating the relationship between faculty and department*/
CREATE TABLE `faculty_department`(`FacDep_Id` int(10) not null AUTO_INCREMENT,
                                  `Faculty_Id` varchar(10) not null,
                                  `Department_id` int(11) not null,PRIMARY KEY(`FacDep_Id`))
                                  ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

/*dropping Faculty Table if exists*/
DROP TABLE IF EXISTS `FACULTY`;

/*Creating the faculty table*/
CREATE TABLE `FACULTY`(`Faculty_Id` varchar(10) not null,
                       `Department_Name` varchar(125) not null, PRIMARY KEY(`Faculty_Id`))
                       ENGINE=InnoDB DEFAULT CHARSET=latin1;
                       
Insert into `FACULTY`(`Faculty_Id`,`Department_Name`) values('B10235','Anamang James Wilson'),('CS10342','Kingley Hayford');

/*dropping course_outline table if exists*/
DROP TABLE IF EXISTS `course_outline`;

/*Creating the course outline table*/
create table if not exists `course_outline`(
			`course_id` int(11) not null,
			`course_name` varchar(255) not null,
			`course_objective` varchar(200) not null,
			`course_topics` varchar(600) not null,
			`course_readings` varchar(600) not null,
			`course_description` varchar(600) not null,
			`course_grading` Varchar(25),
			primary key(`course_id`))ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

/*dropping course_stu if exists*/
DROP TABLE IF EXISTS `course_stu`;

CREATE TABLE IF NOT EXISTS `course_stu` (
                                    `student_id` int(11) NOT NULL AUTO_INCREMENT,
                                    `student_fname` varchar(45) NOT NULL,
                                    `student_lname` varchar(45) NOT NULL,
                                    `student_major` varchar(45) NOT NULL,
                                    `student_yeargroup` DATE NOT NULL,
                                   PRIMARY KEY (`student_id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;