DROP SCHEMA IF EXISTS booksite;
CREATE DATABASE booksite;
GRANT ALL ON booksite.* TO 'web_user'@'localhost' IDENTIFIED BY 'mypass';
USE booksite;

DROP TABLE IF EXISTS author;

CREATE TABLE author (
  author_id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  country varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (author_id)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO author VALUES (1,'Frank Herbert','USA'),(2,'Richard Laymon','Canada'),(3,'Carmen Ynez','Canada'),(4,'Stephen King','USA'),(5,'Lee Sheldon','Russia'),(6,'Daniel Chambers','England'),(7,'Sally Unger','Canada'),(8,'John Lescroart','USA'),(9,'Robert Sawyer','Canada'),(10,'Tommy Dougald','Canada'),(16,'Michael Thompson','Mexico'),(17,'Jim Butcher','USA'),(18,'Mark Twain','USA'),(19,'Brent Weeks','USA'),(20,'Isaac Asimov','USA'),(21,'Michael Connelly','USA'),(22,'Enid Blyton','England');

DROP TABLE IF EXISTS book;
CREATE TABLE book (
  book_id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  year_published int(11) DEFAULT NULL,
  num_pages int(11) DEFAULT NULL,
  in_print tinyint(1) DEFAULT NULL,
  price decimal(5,2) DEFAULT NULL,
  description text COLLATE utf8mb4_unicode_ci,
  image varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  author_id int(11) DEFAULT NULL,
  publisher_id int(11) DEFAULT NULL,
  format_id int(11) DEFAULT NULL,
  genre_id int(11) DEFAULT NULL,
  PRIMARY KEY (book_id),
  FULLTEXT KEY title (title)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO book VALUES (1,'Dune',1975,556,1,5.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','dune.jpg',1,1,1,1),(2,'Island',2002,345,1,4.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','island.jpg',2,2,1,2),(3,'A Day in the Life',2012,704,1,22.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','a_day_in_the_life.jpg',3,3,2,3),(4,'Under the Dome',2010,1200,0,17.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','under_the_dome.jpg',4,1,3,2),(5,'Carpet Baggers',1977,340,1,3.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','the_carpet_baggers.jpg',5,4,1,4),(6,'Not a Penny More',1980,300,1,5.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','not_a_penny_more.jpg',6,5,1,5),(7,'A Mixed Blessing',2002,450,1,12.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','a_mixed_blessing.jpg',7,6,3,5),(8,'The Oath',2008,500,0,24.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','the_oath.jpg',8,2,2,6),(9,'Carrie',1975,300,1,4.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','carrie.jpg',4,1,1,2),(10,'Flash Forward',2006,417,1,19.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','flash_forward.jpg',9,7,2,1),(11,'The Black Box',2012,345,1,25.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','black_box.jpg',21,5,2,3),(12,'Caves of Steel',1957,198,1,4.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','caves_of_steel.jpg',20,5,2,1),(13,'Castle of Adventure',1944,224,1,33.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','castle_of_adventure.jpg',22,5,2,1),(14,'Dune Messiah',1977,350,1,2.99,'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>','dune_messiah.jpg',1,1,1,1);

DROP TABLE IF EXISTS format;
CREATE TABLE format (
  format_id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (format_id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO format VALUES (1,'Paper'),(2,'Hardcover'),(3,'Trade Paper');

DROP TABLE IF EXISTS genre;
CREATE TABLE genre (
  genre_id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (genre_id)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO genre VALUES (1,'SF'),(2,'Horror'),(3,'Literature'),(4,'Drama'),(5,'Politics'),(6,'Legal'),(19,'Cars'),(20,'Electronics');

DROP TABLE IF EXISTS publisher;
CREATE TABLE publisher (
  publisher_id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  city varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  phone varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (publisher_id)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO publisher VALUES (1,'Ballantine Books','New York','775-1234'),(2,'Dell','New York','766-1313'),(3,'Penguin Books','London','445-0987'),(4,'Putnam','New York','234-8876'),(5,'Delacorte','Toronto','555-1212'),(6,'Sun Press','Toronto','664-1234'),(7,'DAW','New York','543-1234');


DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  first_name varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  last_name varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  email varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  age int(11) DEFAULT NULL,
  password varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users VALUES (1,'Tom','Jones','tom@hotmail.com',45,'$2y$10$5.MfiJNHNR2O1yNuwz792O5xAJce4/PFoUscgDP.eZkEurdiQPtPm','2018-08-06 16:39:18');