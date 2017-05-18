/*
---------------------------------------------------------------
---------------------------------------------------------------
-------------- DMU-NET - Database Install Script --------------
---------------------------------------------------------------
---------------------------------------------------------------
*/

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*
-- -------------------------------------------------------------
-- -------------------------------------------------------------
-- -------------------------------------------------------------
-- -------------------------------------------------------------
*/

DROP TABLE IF EXISTS `Parts`;
CREATE TABLE IF NOT EXISTS `Parts` (
  `idPart` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `original_partName` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `format` enum('STEP','STL') NOT NULL,
  PRIMARY KEY (`idPart`),
  UNIQUE KEY `name` (`name`),
  KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*
-- --------------------------------------------------------
-- --------------------------------------------------------
-- --------------------------------------------------------
*/

DROP TABLE IF EXISTS `Part_Categories`;
CREATE TABLE IF NOT EXISTS `Part_Categories` (
  `name` varchar(255) NOT NULL,
  `parent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `fk_parent_category` (`parent`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
-- --------------------------------------------------------
-- ------------------ FOREIGN KEYS ------------------------
-- --------------------------------------------------------
*/

ALTER TABLE `Parts`
  ADD CONSTRAINT `fk_cateory` FOREIGN KEY (`category`) 
  REFERENCES `Part_Categories` (`name`) 
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Part_Categories`
  ADD CONSTRAINT `fk_parent_category` FOREIGN KEY (`parent`) 
  REFERENCES `Part_Categories` (`name`) 
  ON DELETE CASCADE ON UPDATE CASCADE;
  


/*
-- --------------------------------------------------------
-- ----------------- Insert in Table ----------------------
-- --------------------------------------------------------
*/
INSERT INTO `Part_Categories` (`name`, `parent`) VALUES 
    ('Actuator', NULL),
    ('Bar', NULL),
    ('Bearing', NULL),
    ('Body', NULL),
    ('Brake', NULL),
    ('Button', NULL),
    ('Carter', NULL),
    ('Clutch', NULL),
    ('Crankshaft', NULL),
    ('Electric Engine', NULL),
    ('Fan', NULL),
    ('Gear', NULL),
    ('Gear Wheel', NULL),
    ('GearBox', NULL),
    ('Geared Motor', NULL),
    ('Nut', NULL),
    ('Piston', NULL),
    ('Pulley', NULL),
    ('Pump', NULL),
    ('Radiator', NULL),
    ('Reducer', NULL),
    ('Rim', NULL),
    ('Ring', NULL),
    ('Rod', NULL),
    ('Rod Piston Assembly', NULL),
    ('Screw', NULL),
    ('Shock Absorber', NULL),
    ('Thermic Engine', NULL),
    ('Transmission', NULL),
    ('Tyre', NULL);
  
/*
-- --------------------------------------------------------
-- --------------------- COMMIT ---------------------------
-- --------------------------------------------------------
*/

COMMIT;
