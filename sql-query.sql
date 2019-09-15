CREATE DATABASE joblister;

CREATE TABLE `tblcategories`(
	`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=innoDB DEFAULT CHARSET=latin1;

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

/* ======================================= joblister version 2 ================================= */

CREATE TABLE tbluser(
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`first_name` VARCHAR(150) NOT NULL,
	`middle_name` VARCHAR(150),
	`last_name` VARCHAR(150) NOT NULL,
	`email_address` VARCHAR(150) NOT NULL,
	`contact_number` VARCHAR(50),
	`pass_word` VARCHAR(100) NOT NULL,
	`user_type` VARCHAR(50) NOT NULL DEFAULT 'user',
	`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tbluser(first_name,middle_name,last_name,email_address,contact_number,pass_word)
	VALUES('Yumi','S','Tiangco','ystiangco@gmail.com','09161171131','1111');


CREATE TABLE `tbljobs`(
	`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`category_id` INT NOT NULL,
	`company` VARCHAR(255) NOT NULL,
	`job_title` VARCHAR(255) NOT NULL,
	`description` TEXT NOT NULL,
	`salary` VARCHAR(255) NOT NULL,
	`location` VARCHAR(255) NOT NULL,
	`contact_user` VARCHAR(255) NOT NULL,
	`contact_number` VARCHAR(255) NOT NULL,
	`contact_email` VARCHAR(255) NOT NULL,
	`user_id` INT NOT NULL,
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=innoDB DEFAULT CHARSET=latin1;

SELECT jobs.*,cat.name AS cname,u.* FROM tbljobs jobs
	INNER JOIN tblcategories cat ON cat.id = jobs.category_id
	INNER JOIN tbluser u ON u.id = jobs.user_id
	WHERE jobs.id = 1;
	UPDATE tbljobs SET category_id = 2,company = 'ECS',job_title = 'Manager',description = 'test desc',salary = '55k',location='pampanga',
	contact_user = 'Heddy',contact_number = '1111',contact_email = 'test@gmail.com' WHERE id=1;

UPDATE tbluser SET
	first_name = 'Son',
	middle_name = 'F.',
	last_name = 'Tiangco',
	email_address = 'root@gmail.com',
	contact_number = '09208918136'
	WHERE id = 3;