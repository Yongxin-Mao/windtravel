<?php
/**
 * PHP Capstone Admin 
 * @admin main page---product_del.php
 * @capstone, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-09-14
 */
 
require ('../config.php');
require ('../database/connect_db.inc.php');
require ('../model/model.php');
if(!isset($_SESSION['logged_in'])){
  $_SESSION['fail']="Sorry, You should login first.";
  header('Location: login.php');
  die;
}
if(!empty($_GET['hotel_id'])){
  $delete=delHotel($dbh);
  $_SESSION['delete']="You've deleted a record successfully";
}
header('Location: '.$_SERVER['HTTP_REFERER']);
die;