CREATE TABLE IF NOT EXISTS ft_table (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, login varchar(8) DEFAULT 'toto' NOT NULL, 
	group ENUM('staff', 'student', 'other') NOT NULL, creation_date datetime NOT NULL);
