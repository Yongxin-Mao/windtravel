<?php
//Database on local
define('DB_USER','root');
define('DB_PASS','');
define('DB_DSN','mysql:host=localhost;dbname=capstone');
//connect to the database
$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
