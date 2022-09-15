/* Create Database and Table */
create database crud_db;

use crud_db;

CREATE TABLE `todo` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100),
  `content` varchar(100),
  `done` bit(1),
  PRIMARY KEY  (`id`)
);