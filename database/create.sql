CREATE DATABASE `meganews2`
	CHARACTER SET utf8
	COLLATE utf8_general_ci;
USE `meganews2`;
CREATE TABLE `posts` (
	`id` int(11) auto_increment, 
	`title` varchar(255) not null default '',
	`short_text` text,
	`full_text` text,
	`author` varchar(25),
	`date` datetime,
	`image` text,
	primary key(`id`)
);
CREATE TABLE `users` (
	`id` int(11) auto_increment,
	`username` varchar(255) not null,
	`password` varchar(255) not null,
	`type` ENUM('user','admin') not null,
	primary key(`id`)
);
CREATE TABLE `comments` (
	`id` int(11) auto_increment,
	`news_id` int(11) not null,
	`author` varchar(25),
	`comment` text,
	`data` datetime,
	primary key(`id`)
);
CREATE TABLE `images` (
	`id` int(11) auto_increment,
	`news_id` int(11),
	`preview` text,
	`full_img` text,
	primary key(`id`)
);
CREATE TABLE `views` (
	`id` int(11) auto_increment,
	`news_id` int(11),
	`nums` int(11),
	primary key(`id`)
);
INSERT INTO `users` (username,password,type) VALUES('slave','$2y$10$huRPsDUk9IJp8HTNU9npneHcWp81pbTsfvv3lC/IX/OJ8L0crtW/O','user');
INSERT INTO `users` (username,password,type) VALUES('admin','$2y$10$wWBUExECOTLLDFMOebOVs.bBzMvrFtVsSfBgP67RE/Pfyl4rXUt82','admin');