CREATE DATABASE joblister;

/* categories table */

CREATE TABLE `tblcategories`(
	`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=innoDB DEFAULT CHARSET=latin1;

/* jobs table test*/
CREATE TABLE `tbljobs`(
	`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`category_id` INT NOT NULL,
	`company` VARCHAR(255) NOT NULL,
	`job_title` VARCHAR(255) NOT NULL,
	`description` VARCHAR(255) NOT NULL,
	`salary` VARCHAR(255) NOT NULL,
	`location` VARCHAR(255) NOT NULL,
	`contact_user` VARCHAR(255) NOT NULL,
	`contact_email` VARCHAR(255) NOT NULL,
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=innoDB DEFAULT CHARSET=latin1;

INSERT INTO tblcategories(name)
	VALUES('Bussiness');

INSERT INTO tbljobs(category_id,company,job_title,description,salary,location,contact_user,contact_email)
	VALUES(1,'Cognizant','IT Specialist','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s','20k','Makati','Yumi','ystiangco@gmail.com');

/*
ALTER TABLE `tblcategories`
	ADD PRIMARY KEY(`id`);

ALTER TABLE `tbljobs`
	ADD PRIMARY KEY(`id`);

ALTER TABLE `tblcategories`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tbljobs`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
*/