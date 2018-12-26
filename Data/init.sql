CREATE DATABASE LoginSystem;

use LoginSystem;

CREATE TABLE User (
	id INT AUTO_INCREMENT, 
    firstname VARCHAR(40) NOT NULL,
    lastname VARCHAR(40) NOT NULL,
	username VARCHAR(40) NOT NULL,
	email VARCHAR(50) NOT NULL,
    password VARCHAR(120) NOT NULL,
	date TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE (username),
    UNIQUE (email)
);

