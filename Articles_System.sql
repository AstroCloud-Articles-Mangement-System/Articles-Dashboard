CREATE DATABASE Articles_System;

USE Articles_System;

CREATE TABLE Groups (
  id INT AUTO_INCREMENT  PRIMARY KEY,
  group_name VARCHAR(50),
  group_description VARCHAR(255)
);

CREATE TABLE Users (
  id INT AUTO_INCREMENT  PRIMARY KEY,
  user_name VARCHAR(50),
  user_email VARCHAR(50) UNIQUE,
  user_mobile_number VARCHAR(15),
  user_username VARCHAR(50),
  user_password VARCHAR(255),
  subscription_date DATE,
  group_id INT,
  remember_me varchar(255) accept null,
  FOREIGN KEY (group_id) REFERENCES Groups(id)
);

CREATE TABLE Articles (
  id INT AUTO_INCREMENT  PRIMARY KEY,
  article_title VARCHAR(255),
  article_summary TEXT,
  article_image VARCHAR(255),
  article_content TEXT,
  publishing_date DATE,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES Users(id)
);


