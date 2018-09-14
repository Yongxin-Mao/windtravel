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
function getInvoice($dbh, $invoice_id)
{
	$query = "SELECT
              invoice.invoice_id,
              invoice.price,
              invoice.GST,
              invoice.PST,
              invoice.total_price,
              invoice.created_at,
              hotel.hotel_brand,
              hotel.hotel_name,
              hotel.room,
              hotel.bed,
              hotel.adults,
              hotel.children,
              hotel.phone,
              hotel.street,
              hotel.city,
              hotel.country,
              hotel.rank,
              hotel.breakfast_included,
              hotel.smoke_permit,
              hotel.image,
              customer.first_name,
              customer.last_name,
              customer.street as customer_street,
              customer.city as customer_city,
              customer.province as customer_province,
              customer.country as customer_country,
              customer.phone as customer_phone,
              customer.email as customer_email
              FROM
              invoice
              JOIN customer USING(customer_id)
              JOIN hotel USING(hotel_id)
              WHERE
              invoice_id = :invoice_id";
	$stmt = $dbh->prepare($query);
	$stmt->bindValue(':invoice_id', $invoice_id, PDO::PARAM_INT);
	$stmt->execute();
	// fetch one book
	return $stmt->fetch(PDO::FETCH_ASSOC);
}
