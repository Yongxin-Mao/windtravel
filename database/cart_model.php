<?php
//load config
//require '../config.php';
//load models
require '../database/hotel_model.php';
//cart model
define('PST',.08);
define('GST',.05);

//add an item to the cart and set the session for reusing
function addToCart($dbh,$hotel_id)
{
  $hotel=getHotel($dbh,$hotel_id);
  $total=(1+PST+GST)*$hotel['price'];
  $total=number_format($total,2,'.','');
  $cart=[
        'hotel_id'=>$hotel['hotel_id'],
        'hotel_brand'=>$hotel['hotel_brand'],
        'hotel_name'=>$hotel['hotel_name'],
        'price'=>$hotel['price'],
        'image'=>$hotel['image'],
        'total'=>$total
        ];
  $_SESSION['total']=$cart['total'];
  //$_SESSION['cart']=$cart;
  return $cart;
}
