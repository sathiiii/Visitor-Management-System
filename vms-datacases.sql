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
  `department` VARCHAR(45) NULL,
  `address` VARCHAR(70) NOT NULL,
  `phone_no` VARCHAR(10) NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `profile_pic` VARCHAR(255),
  PRIMARY KEY (`staff_id`));
INSERT INTO `vms`.`staff` (`staff_id`, `first_name`, `last_name`, `department`, `address`, `email`, `password`, `profile_pic`) VALUES ('1', 'Roshan', 'Ragel',  'COMP', 'Kandy', 'r@pdn.ac.lk', 'password', '');
-- INSERT INTO `vms`.`staff` (`staff_id`, `first_name`, `last_name`, `department`, `address`, `email`) VALUES ('2', 'Janaka', 'Wijayakulasooriya',  'EE', 'Kandy', 'j@pdn.ac.lk');
-- INSERT INTO `vms`.`staff` (`staff_id`, `first_name`, `last_name`, `department`, `address`, `email`) VALUES ('3', 'Dammika', 'Elkaduwa',  'COMP', 'Kandy', 'd@pdn.ac.lk');

  
  CREATE TABLE `vms`.`students` (
  `reg_no` VARCHAR(20) NOT NULL,
  `username` VARCHAR(20) NOT NULL,
  `first_name` VARCHAR(20) NOT NULL,
  `last_name` VARCHAR(20) NOT NULL,
  `department` VARCHAR(45) NULL,
  `address` VARCHAR(70) NOT NULL,
  `phone_no` VARCHAR(10) NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(40) NOT NULL,
  `profile_pic` VARCHAR(255),
    PRIMARY KEY (`reg_no`));
-- INSERT INTO `vms`.`students` (`reg_no`, `first_name`, `last_name`,  `department`, `address`, `email`) VALUES ('E/17/072', 'Dinura', 'Dissanayake',  'COMP', 'Colombo', 'e17072@eng.pdn.ac.lk');
-- INSERT INTO `vms`.`students` (`reg_no`, `first_name`, `last_name`,  `department`, `address`, `phone_no`, `email`) VALUES ('W/17/334', 'Donald', 'Trump',  'POL', 'America', '1234456786', 'Danne naa');

CREATE TABLE `vms`.`admins` (
  `admin_id` INT NOT NULL AUTO_INCREMENT,
  `staff_id` INT NOT NULL,
  `authorization` VARCHAR(50) NOT NULL,
  `username` VARCHAR(30) NOT NULL,
  `last_active` BOOLEAN DEFAULT true,
  PRIMARY KEY (`admin_id`),
  FOREIGN KEY (`staff_id`) REFERENCES `vms`.`staff` (`staff_id`) ON UPDATE CASCADE
);
INSERT INTO `vms`.`admins` (`admin_id`, `staff_id`, `authorization`, `username`) VALUES ('1', '1', 'Full', 'admin1');
-- INSERT INTO `vms`.`admins` (`admin_id`, `staff_id`, `authorization`) VALUES ('2', '1', 'Faculty Only');

CREATE TABLE `vms`.`visitors` (
   `visitors_id` INT NOT NULL AUTO_INCREMENT,
   `username` VARCHAR(20) NOT NULL,
   `first_name` VARCHAR(20) NOT NULL,
   `last_name` VARCHAR(20) NOT NULL,
   `NIC` VARCHAR(20) NOT NULL,
   `address` VARCHAR(70) NOT NULL,
   `tel_no` VARCHAR(10) NOT NULL,
   `email` VARCHAR(30) NOT NULL,
   `password` VARCHAR(40) NOT NULL,
   `profile_pic` VARCHAR(255),
   PRIMARY KEY (`visitors_id`),
   KEY (`NIC`)
   );
   -- INSERT INTO `vms`.`visitors` (`visitors_id`, `username`, `first_name`, `last_name`, `NIC`, `address`, `tel_no`, `email`, `password`) VALUES ('1', 'rava123', 'Ravana', 'King', '00123344334V', 'Paralova', '0000000000', 'ravana@ravana.lk', 'seetha123');
   
   CREATE TABLE `vms`.`visiting_requests` (
   `request_id` INT NOT NULL AUTO_INCREMENT,
   `visitors_id` INT NOT NULL,
   `purpose` VARCHAR(50) NOT NULL,
   `visiting_date` DATE NOT NULL,
   `from` TIME NOT NULL,
   `to` TIME NOT NULL,
   `to_meet` VARCHAR(30),
   `visiting_places` VARCHAR(50),
   `bringing_vehicle` BOOLEAN NOT NULL,
   `status` VARCHAR(15) NOT NULL,
   PRIMARY KEY (`request_id`),
   FOREIGN KEY (`visitors_id`) REFERENCES `vms`.`visitors` (`visitors_id`)
   ); 
   -- INSERT INTO `vms`.`visiting_requests` (`request_id`, `visitors_id`, `purpose`, `visiting_date`, `from`, `to`, `to_meet`, `visiting_places`, `bringing_vehicle`, `status`) VALUES ('1', '1', 'Conqure', '2020-12-26', '13:00', '15:00', 'Yakka puthun', 'Efac', '1', 'Approved');

   
   CREATE TABLE `vms`.`vehicles` (
	`reg_no` VARCHAR(10) NOT NULL,
    `visitors_id` INT NOT NULL,
    `model_name` VARCHAR(30),
    `color` VARCHAR(20),
    `type` VARCHAR(15),
    PRIMARY KEY (`reg_no`),
    FOREIGN KEY (`visitors_id`) REFERENCES `vms`.`visitors` (`visitors_id`)
   );
  -- INSERT INTO `vms`.`vehicles` (`reg_no`, `visitors_id`, `model_name`, `color`, `type`) VALUES ('DDD 6969', '1', 'Dandumonare', 'Unknown', 'Plane');