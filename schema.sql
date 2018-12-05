CREATE TABLE Users(
	id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	firstname varchar(20) NOT NULL,
	lastname varchar(20) NOT NULL,
	password varchar(255) NOT NULL,
	telephone varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	date_joined varchar(255) NOT NULL
);


CREATE TABLE Jobs(
	id int (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	job_title varchar(20) NOT NULL,
	job_description int(10) NOT NULL,
	category varchar(255) NOT NULL,
    company_name varchar(255) NOT NULL,
    company_location varchar(30) NOT NULL
	);


CREATE TABLE Jobs_Applied_For
(
	id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	job_id int(10) NOT NULL,
	user_id varchar(10) NOT NULL,
	date_applied varchar(30) NOT NULL

);
