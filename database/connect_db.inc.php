<?php
//Database on local
define('DB_USER','root');
define('DB_PASS','');
define('DB_DSN','mysql:host=localhost;dbname=capstone');

$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*Database on nexus
define('DB_USER','yongxin');
define('DB_PASS','outr36');
define('DB_DSN','mysql:host=localhost;dbname=yongxin');
*/