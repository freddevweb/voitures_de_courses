DROP DATABASE IF EXISTS vehicules;

CREATE DATABASE vehicules;

USE vehicules;

CREATE TABLE voiture (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(255),
    model VARCHAR(255),
    puissance INT,
    prix DECIMAL(10,2),
    couleur VARCHAR(255)

)ENGINE=InnoDB;


INSERT INTO voiture VALUES
(1, 'Porsche', 'Carrera cup',230, "25000.00", 'blanc' ),
(2, 'Pontiac', '211 gto',340, "20000.00", 'gris' ),
(3, 'Ferrary', '340',500, "60000.00", 'rouge' ),
(4, 'Lancia', 'delta 4', 250, "20000.00", "blanc"),
(5, "Renault", "maxiturbo" , 250, "45000.00", "bleue et rouge");

CREATE TABLE course (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255),
    duree TIME NOT NULL,
    dateCourse DATE not NULL

)ENGINE=InnoDB;

INSERT INTO course VALUES
(1, '12 h de Nurbrungring', '12:00:00', '2018-05-25'),
(2, '24 h du Mans', '24:00:00', '2017-09-25');


create table courseVoiture (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	course_id int not null,
    voiture_id int not null,
    
    foreign key (course_id) references course(id) ON DELETE CASCADE,
    foreign key (voiture_id) references voiture(id)ON DELETE CASCADE
    
)ENGINE=InnoDB;



insert into courseVoiture values
(1, 1, 3),
(2, 1, 2),
(3, 1, 1),
(4, 2, 3),
(5, 2, 4),
(6, 2, 5);

create table spectateur (
	id int not null auto_increment primary key,
    nom varchar(255),
    date_achat datetime,
    email varchar(255),
    sexe int,
    course_id int,
    
    foreign key (course_id) references course(id)ON DELETE CASCADE
)ENGINE=InnoDB;

INSERT INTO spectateur VALUES
(1,'paul', '2017-12-01 12:10:00', 'paul@mail.com',1, 1),
(2,'math', '2017-12-02 13:20:00', 'math@mail.com',1, 1),
(3,'fred', '2017-12-03 14:30:00', 'fred@mail.com',1, 2),
(4,'guindoulette', '2017-12-04 15:40:00', 'guindoulette@mail.com',2, 2);

select * from voiture where id = 2;

select * from course;

select c.*, v.* from courseVoiture as cv
inner join course as c
	on  c.id = cv.course_id
INNER JOIN voiture as v
	on cv.voiture_id = v.id
where v.id = (
	select id from voiture where model = 'Carrera cup');
    
DELETE from courseVoiture where voiture_id = 5;

select * from spectateur;

select * from courseVoiture;