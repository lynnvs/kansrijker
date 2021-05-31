DROP DATABASE IF EXISTS kansrijker;

CREATE DATABASE kansrijker;

USE kansrijker;

CREATE TABLE jongere(
    jongerecode INT NOT NULL AUTO_INCREMENT,
    roepnaam VARCHAR(33) NOT NULL,
    tussenvoegsel VARCHAR(20),
    achternaam VARCHAR(33) NOT NULL,
    inschrijfdatum DATE NOT NULL,
    primary key(jongerecode)
);

CREATE TABLE activiteit(
    actiecode INT NOT NULL AUTO_INCREMENT,
    activiteit VARCHAR(20) NOT NULL,
    primary key(actiecode)
);

CREATE TABLE instituut(
    instituutcode INT NOT NULL AUTO_INCREMENT,
    instituut VARCHAR(33) NOT NULL,
    telefooninstituut VARCHAR(11) NOT NULL,
    primary key(instituutcode)
);

CREATE TABLE account(
	id INT NOT NULL AUTO_INCREMENT,
	username varchar(255) not null UNIQUE,
	email varchar(255) not null UNIQUE,
	password varchar(255) not null,
	created_at datetime not null,
	primary key(id) 
);

CREATE TABLE jongereinstituut(
    jongerecode INT NOT NULL,
    instituutcode INT NOT NULL,
    startdatum DATE NOT NULL,
    foreign key(jongerecode) references jongere(jongerecode),
    foreign key(instituutcode) references instituut(instituutcode)
);

CREATE TABLE jongereactiviteit(
    jongerecode INT NOT NULL,
    actiecode INT NOT NULL,
    startdatum DATE NOT NULL,
    afgerond TINYINT(1) NOT NULL,
    foreign key(jongerecode) references jongere(jongerecode),
    foreign key(actiecode) references activiteit(actiecode)
)

