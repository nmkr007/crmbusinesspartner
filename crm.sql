CREATE TABLE `crm`.`admin` (
  `adminid` INT NOT NULL AUTO_INCREMENT,
  `admin_user` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`adminid`),
  UNIQUE INDEX `admin_user_UNIQUE` (`admin_user` ASC));

CREATE TABLE `crm`.`companies` (
  `companyid` INT NOT NULL AUTO_INCREMENT,
  `companyname` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`companyid`),
  UNIQUE INDEX `companyname_UNIQUE` (`companyname` ASC));

CREATE TABLE `crm`.`company_contact` (
  `companyid` INT NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`companyid`, `email`));

  CREATE TABLE `crm`.`registration` (
  `regdate` DATE NOT NULL,
  `personname` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `contact` VARCHAR(45) NULL,
  `companyid` INT NULL,
  `line1` VARCHAR(45) NULL,
  `line2` VARCHAR(45) NULL,
  `intern_positions` INT NULL,
  `fulltime_positions` INT NULL,
  `peoplecount` INT NULL,
  `state` VARCHAR(45) NULL,
  `zip` INT(6) NULL,
  PRIMARY KEY (`regdate`),
  INDEX `fk_reg_com_idx` (`companyid` ASC),
  CONSTRAINT `fk_reg_com`
    FOREIGN KEY (`companyid`)
    REFERENCES `crm`.`companies` (`companyid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
  
  
