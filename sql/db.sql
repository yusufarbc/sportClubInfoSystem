CREATE TABLE users(
    username VARCHAR(45) NOT NULL UNIQUE,
    name VARCHAR(45) NOT NULL,
    surname VARCHAR(45) NOT NULL,
    tc VARCHAR(12) NOT NULL,
    birthday DATE NOT NULL,
    branch varchar(25) NOT NULL,
    resume TEXT,
    email VARCHAR(45) NOT NULL,
    password VARCHAR(100) NOT NULL,
    PRIMARY KEY(username)
);

CREATE TABLE admins(
	rootname VARCHAR(45) NOT NULL UNIQUE,
    email VARCHAR(45) NOT NULL,
    password VARCHAR(100) NOT NULL,
    PRIMARY KEY(rootname)
);

INSERT INTO admins(rootname, email, password) VALUES ('admin', 'admin@admin.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4');

CREATE TABLE posts(
	id INT NOT NULL AUTO_INCREMENT,
 	title VARCHAR(45) NOT NULL,
    image VARCHAR(100),
    branch VARCHAR(25) NOT NULL,
    content TEXT,
    PRIMARY KEY(id)
);
