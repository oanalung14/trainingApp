CREATE TABLE user_detail (
     id integer AUTO_INCREMENT PRIMARY KEY,
	 id_user integer,
     first_name varchar(200),
     last_name varchar(200),
     department varchar(200),
     experience varchar(200),
	 FOREIGN KEY (id_user)
        REFERENCES user(id)
);

CREATE TABLE user (
     id integer,
     email varchar(200),
     password varchar(200),
     role integer
);
ALTER TABLE `user` ADD PRIMARY KEY( `id`);
ALTER TABLE `user` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE training (
     id integer,
	 title varchar(200),
	 date varchar(200),
	 time varchar(200),
	 duration varchar(200),
	 location varchar(200),
	 status varchar(200),
	 details varchar(200),
	 photo blob,
	 max_participants integer,
	 id_trainer integer,
	 FOREIGN KEY (id_trainer)
        REFERENCES user(id)
);
ALTER TABLE `training` ADD PRIMARY KEY( `id`);
ALTER TABLE `training` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;

CREATE table comment (
    id integer AUTO_INCREMENT PRIMARY KEY,
    id_training integer,
    id_user integer,
    comment varchar(200),
    date varchar(200),
    FOREIGN KEY (id_training)
        REFERENCES training(id),
    FOREIGN KEY (id_user)
        REFERENCES user(id)
);

create table trainer_technology (
    id integer AUTO_INCREMENT PRIMARY KEY,
    id_trainer integer,
    id_technology integer,
    details varchar(200),
    FOREIGN KEY (id_trainer)
        REFERENCES user(id),
    FOREIGN KEY (id_technology)
        REFERENCES technology(id)
);

create table technology (
    id integer AUTO_INCREMENT PRIMARY KEY,
    name varchar(200),
	type integer
);

---------------------------------table entries--------------------------------
INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES (NULL, 'maria.cotos7@yahoo.com', 'maria', '0'),
															  (NULL, 'oanalung14@yahoo.com', 'oana', '1'),
															  (NULL, 'nico_viregan@yahoo.com', 'nico', '2');

INSERT INTO `user_detail` (`id`, `id_user`, `first_name`, `last_name`, `department`, `experience`) VALUES (NULL, '1', 'Maria ', 'Cotos', 'SAP', 'Junior'),
																									      (NULL, '2', 'Oana', 'Lung', 'Java', 'Junior'),
																										  (NULL, '3', 'Nico', 'Viregan', 'Java', 'Junior');

INSERT INTO `training` (`id`, `title`, `date`, `time`, `duration`, `location`, `status`, `details`, `photo`, `max_participants`)
VALUES (NULL, 'Angular', '12.05.2020', '09:00 - 16:00', '2 days', 'MSG - Negreanu', 'Upcoming', 'The training is recommended for Junior or Mid developers', NULL, '15', '2'),
	   (NULL, 'Java', '20.02.2020', '09:00 - 17:00', '3 days', 'NTT - Socrate', 'Past ', 'Introduction in Java', NULL, '10', '2');

INSERT INTO `technology` (`id`, `name`, `type`) VALUES (NULL, 'Java', '0'),
													   (NULL, 'Angular', '1'),
													   (NULL, 'JavaScript', '1'),
													   (NULL, 'Time Management', '2'),
													   (NULL, 'PHP', '0'),
													   (NULL, 'HTML+CSS', '2');

INSERT INTO `comment` (`id`, `id_training`, `id_user`, `comment`, `date`) VALUES (NULL, '2', '3', 'Very nice! ', '22.02.2020');

INSERT INTO `trainer_technology` (`id`, `id_trainer`, `id_technology`, `details`) VALUES (NULL, '2', '1', '3 years experience in Java and Angular');