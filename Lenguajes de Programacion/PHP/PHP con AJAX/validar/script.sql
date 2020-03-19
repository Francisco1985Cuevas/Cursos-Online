CREATE TABLE users
(
 user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
 user_name VARCHAR(32) NOT NULL, 
 PRIMARY KEY (user_id)
);

INSERT INTO users (user_name) VALUES ('pedro');
INSERT INTO users (user_name) VALUES ('felipe');
INSERT INTO users (user_name) VALUES ('miguel');
INSERT INTO users (user_name) VALUES ('emilio');
INSERT INTO users (user_name) VALUES ('paula');
INSERT INTO users (user_name) VALUES ('cristian');
