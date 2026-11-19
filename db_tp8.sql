CREATE DATABASE IF NOT EXISTS `db_tp8` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_tp8`;

CREATE TABLE IF NOT EXISTS `departments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `code` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `lecturers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `nidn` VARCHAR(30) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `join_date` DATE NOT NULL,
  `department_id` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lect_dept` (`department_id`),
  CONSTRAINT `fk_lect_dept` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `courses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `credits` INT(11) NOT NULL DEFAULT 0,
  `lecturer_id` INT(11) DEFAULT NULL,
  `department_id` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_course_lect` (`lecturer_id`),
  KEY `fk_course_dept` (`department_id`),
  CONSTRAINT `fk_course_lect` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_course_dept` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `departments` (`name`,`code`) VALUES
('Teknik Informatika','IF'),
('Sistem Informasi','SI');

INSERT INTO `lecturers` (`name`,`nidn`,`phone`,`join_date`,`department_id`) VALUES
('Dr. Andi','123456','08123456789','2020-01-15',1),
('Prof. Budi','654321','08987654321','2019-03-10',2);

INSERT INTO `courses` (`name`,`credits`,`lecturer_id`,`department_id`) VALUES
('Pemrograman Berorientasi Objek',3,1,1),
('Basis Data',3,2,2);
