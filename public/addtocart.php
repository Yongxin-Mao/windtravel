<?php
/**
 * PHP Capstone
 * @this is the file that can add item into cart
 * @capstone, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-09-11
 */
 
require ('../config.php');
require ('../database/connect_db.inc.php');

$title = 'cart';
$slug = 'service';

include '../includes/header.inc.php'; 

//load models
require '../database/cart_model.php';
//make sure we have a post request
if($_SERVER['REQUEST_METHOD']!='POST'&&empty($_SESSION['cart'])){
  die('Sorry, you are in the wrong place.');
}
//make sure there's a cart or create one


if(!empty($_POST['hotel_id'])){
  $cart=addToCart($dbh,$_POST['hotel_id']);
  //header('Location:'.$_SERVER['HTTP_REFERER']);
  //die;
  //$_SESSION['cart'][]=$cart;
  //set the session for hotel id
  $_SESSION['hotel_id']=$_POST['hotel_id'];
  $_SESSION['cart'][0]=$cart;
  //set the flash message content
  $_SESSION['addtocart']="You add an item in your cart successfully! <a href='hotel.php'>Go on shopping</a> | <a href='cart.php'>Go to cart</a>";
  //$_POST['hotel_id']=array();
}
//go to the page where you from
header('Location: '.$_SERVER['HTTP_REFERER']);
die;