<?php
/**
 * PHP Capstone
 * @admin main page---index.php
 * @capstone, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-09-11
 */
 
require ('../config.php');
require ('../database/connect_db.inc.php');
require ('../model/model.php');

if(!empty($_GET['hotel_id'])){
  $delete=delHotel($dbh);
  $_SESSION['delete']="You've deleted a record successfully";
}
header('Location: '.$_SERVER['HTTP_REFERER']);
die;