CREATE DATABASE dashboard_esport_team;
USE dashboard_esport_team;

CREATE TABLE user(
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	email VARCHAR(255) UNIQUE,
	password VARCHAR(16)
);
CREATE TABLE tournament(
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	name VARCHAR(100),
	address TEXT,
	start_date DATE,
	creation_date TIMESTAMP,
	schedule VARCHAR(23),
	game VARCHAR(110),
	prize1 TEXT,
	prize2 TEXT,
	prize3 TEXT
);
CREATE TABLE sponsor(
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	name VARCHAR(110) UNIQUE,
	url VARCHAR(225),
	description TEXT
);
CREATE TABLE tournament_sponsor(
	tournament_id INT,
	sponsor_id INT,
	FOREIGN KEY(tournament_id) REFERENCES tournament(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(sponsor_id) REFERENCES sponsor(id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE player(
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	username VARCHAR(110),
	name VARCHAR(30),
	last_name VARCHAR(30),
	email VARCHAR(255) UNIQUE
);
CREATE TABLE tournament_player(
	tournament_id INT,
	player_id INT,
	FOREIGN KEY(tournament_id) REFERENCES tournament(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(player_id) REFERENCES player(id) ON DELETE CASCADE ON UPDATE CASCADE
);