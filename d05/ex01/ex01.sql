use db_alcaroff;
source ~/Documents/php/d05/resources/data_student.sql;
CREATE TABLE IF NOT EXISTS ft_table (
	id INT AUTO_INCREMENT NOT NULL,
	login VARCHAR(8) DEFAULT 'toto' NOT NULL,
	groupe ENUM('staff', 'student', 'other') NOT NULL,
	date_de_creation DATE NOT NULL,
	PRIMARY KEY (id)
);
