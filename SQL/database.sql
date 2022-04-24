-- create a database --
CREATE DATABASE IF NOT EXISTS `formdb`

-- create tables --
CREATE TABLE `form_element` (
        `form name` text NOT NULL,
        `form filds` varchar(120) NOT NULL,
        `form link` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `fild1` text NOT NULL,
        `fild1-type` varchar(100) NOT NULL,
        `fild2` text NOT NULL,
        `fild2-type` varchar(100) NOT NULL,
        `fild3` text NOT NULL,
        `fild3-type` varchar(100) NOT NULL,
        `fild4` text NOT NULL,
        `fild4-type` varchar(100) NOT NULL,
        `fild5` text NOT NULL,
        `fild5-type` varchar(100) NOT NULL,
        `fild6` text NOT NULL,
        `fild6-type` varchar(100) NOT NULL,
        `fild7` text NOT NULL,
        `fild7-type` varchar(100) NOT NULL,
         `fild8` text NOT NULL,
         `fild8-type` varchar(100) NOT NULL,
         `fild9` text NOT NULL,
         `fild9-type` varchar(100) NOT NULL,
         `fild10` text NOT NULL,
         `fild10-type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `answers` (
         `form id` int(11) NOT NULL,
         `fild1` text NOT NULL,
         `fild2` text NOT NULL,
         `fild3` text NOT NULL,
         `fild4` text NOT NULL,
         `fild5` text NOT NULL,
         `fild6` text NOT NULL,
         `fild7` text NOT NULL,
         `fild8` text NOT NULL,
         `fild9` text NOT NULL,
         `fild10` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `username` varchar(16) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `email` varchar(500) NOT NULL,
  `name` text NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`username`, `password`, `email`, `name`, `admin`) VALUES
('demo1234', '0EAD2060B65992DCA4769AF601A1B3A35EF38CFAD2C2C465BB160EA764157C5D', 'demo1234@gmail.com', 'admin', 0);