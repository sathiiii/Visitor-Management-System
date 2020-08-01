DROP DATABASE IF EXISTS `vms`;
CREATE DATABASE `vms`;
USE vms;

SET NAMES utf8 ;
SET character_set_client = utf8mb4 ;

-- Staff Table
CREATE TABLE `vms`.`staff` (
  `staff_id` INT NOT NULL,
  `first_name` VARCHAR(20) NOT NULL,
  `last_name` VARCHAR(20) NOT NULL,
  `facutly` VARCHAR(45) NOT NULL,
  `department` VARCHAR(45) NULL,
  `address` VARCHAR(70) NOT NULL,
  `phone_no` VARCHAR(10) NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`staff_id`));
INSERT INTO `vms`.`staff` (`staff_id`, `first_name`, `last_name`, `facutly`, `department`, `address`, `email`) VALUES ('1', 'Roshan', 'Ragel', 'ENG', 'COMP', 'Kandy', 'r@pdn.ac.lk');
INSERT INTO `vms`.`staff` (`staff_id`, `first_name`, `last_name`, `facutly`, `department`, `address`, `email`) VALUES ('2', 'Janaka', 'Wijayakulasooriya', 'ENG', 'EE', 'Kandy', 'j@pdn.ac.lk');
INSERT INTO `vms`.`staff` (`staff_id`, `first_name`, `last_name`, `facutly`, `department`, `address`, `email`) VALUES ('3', 'Dammika', 'Elkaduwa', 'ENG', 'COMP', 'Kandy', 'd@pdn.ac.lk');

  
  CREATE TABLE `vms`.`students` (
  `reg_no` VARCHAR(20) NOT NULL,
  `first_name` VARCHAR(20) NOT NULL,
  `last_name` VARCHAR(20) NOT NULL,
  `facutly` VARCHAR(45) NOT NULL,
  `department` VARCHAR(45) NULL,
  `address` VARCHAR(70) NOT NULL,
  `phone_no` VARCHAR(10) NULL,
  `email` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`reg_no`));
INSERT INTO `vms`.`students` (`reg_no`, `first_name`, `last_name`, `facutly`, `department`, `address`, `email`) VALUES ('E/17/072', 'Dinura', 'Dissanayake', 'ENG', 'COMP', 'Colombo', 'e17072@eng.pdn.ac.lk');
INSERT INTO `vms`.`students` (`reg_no`, `first_name`, `last_name`, `facutly`, `department`, `address`, `phone_no`, `email`) VALUES ('W/17/334', 'Donald', 'Trump', 'ART', 'POL', 'America', '1234456786', 'Danne naa');

CREATE TABLE `vms`.`admins` (
  `admin_id` INT NOT NULL,
  `staff_id` INT NOT NULL,
  `ortharization` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`admin_id`),
  FOREIGN KEY (`staff_id`) REFERENCES `vms`.`staff` (`staff_id`) ON UPDATE CASCADE
);
INSERT INTO `vms`.`admins` (`admin_id`, `staff_id`, `ortharization`) VALUES ('1', '3', 'Full');
INSERT INTO `vms`.`admins` (`admin_id`, `staff_id`, `ortharization`) VALUES ('2', '1', 'Faculty Only');

CREATE TABLE `vms`.`visitors` (
   `visitors_id` INT NOT NULL,
   `first_name` VARCHAR(20) NOT NULL,
   `last_name` VARCHAR(20) NOT NULL,
   `NIC` VARCHAR(20) NOT NULL,
   `address` VARCHAR(70) NOT NULL,
   `tel_no` VARCHAR(10) NOT NULL,
   `email` VARCHAR(30) NOT NULL,
   `purpose` VARCHAR(50) NOT NULL,
   `visiting_date` DATE NOT NULL,
   `from` TIME NOT NULL,
   `to` TIME NOT NULL,
   PRIMARY KEY (`visitors_id`),
   KEY (`NIC`)
   );
   INSERT INTO `vms`.`visitors` (`visitors_id`, `first_name`, `last_name`, `NIC`, `address`, `tel_no`, `email`, `purpose`, `visiting_date`, `from`, `to`) VALUES ('1', 'Ravana', 'King', '00123344334V', 'Paralova', '0000000000', 'ravana@ravana.lk', 'nidagena aharuna', '2020-12-23', '12:30', '13:30');
   
   CREATE TABLE `vms`.`vehicles` (
	`reg_no` VARCHAR(10) NOT NULL,
    `visitors_id` INT NOT NULL,
    `model_name` VARCHAR(30),
    `color` VARCHAR(20),
    `type` VARCHAR(15),
    PRIMARY KEY (`reg_no`),
    FOREIGN KEY (`visitors_id`) REFERENCES `vms`.`visitors` (`visitors_id`)
   );
   INSERT INTO `vms`.`vehicles` (`reg_no`, `visitors_id`, `model_name`, `color`, `type`) VALUES ('DDD 6969', '1', 'Dandumonare', 'Unknown', 'Plane');
