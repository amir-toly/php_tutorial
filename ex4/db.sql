CREATE TABLE test.posts (
	id INT PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(255),
	content TEXT,
	created_at DATETIME
);

CREATE TABLE test.comments (
	id INT PRIMARY KEY AUTO_INCREMENT,
	post_id INT,
	author VARCHAR(255),
	comment TEXT,
	comment_date DATETIME
);

CREATE TABLE test.members (
	id INT PRIMARY KEY AUTO_INCREMENT,
	nickname VARCHAR(255),
	password VARCHAR(255),
	email VARCHAR(255),
	joined_at DATE
);
