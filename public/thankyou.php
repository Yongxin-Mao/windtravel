<?php

/**
 * PHP Capstone
 * @thankyou.php (which can give the feedback when finished checkout)
 * @capstone, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-09-11
 */
 
require ('../config.php');
require ('../database/connect_db.inc.php');
require '../includes/functions.php';
require '../database/cart_model.php';
$title = 'checkout';
$slug = 'service';

include '../includes/header.inc.php'; 


$replace=array(':','-',' ');
//show the page before checking for login, if not logged in we should go to login page
if(!isset($_SESSION['logged_in'])){
  $_SESSION['fail']="Sorry, You should login/register before checkout.";
  header('Location: login.php');
  die;
}



/*
Registration Form
*/
use \Classes\Utility\Validator;
$v=new Validator();

//test fot post request

   
     $invoice_id=$_SESSION['invoice_id'];
     
     $invoice=getInvoice($dbh,$invoice_id);
      
      $success=true;
      //$_SESSION['cart']=array();
    
    //end if
    
  //end test for post
 

if(!empty($_SESSION['checkout'])){
	$flash_message = $_SESSION['checkout'];
	unset($_SESSION['checkout']);
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  
  
</script>
 <style>
   table{
     width: 920px;
     text-align: center;
     border-collapse: collapse;
     margin-bottom: 30px;
   }
   tr, td, th{
     border: 1px solid #000;
   }
   .buttonbuy{
      width: 80px;
      height: 25px;
      background-color: #e20308;
      color: #fff;
      box-shadow: 2px 2px 2px rgba(150,150,150,0.4);
      border-radius: 3px 3px;
      font-weight: bold;
      text-align: center;
      padding-top: 8px;
      margin: auto;
      right: 20px;
    }
    caption{
      background: #ccc;
      height: 23px;
      padding-top: 7px;
      font-weight: bold;
    }
    legend{
      background: #ccc;
      height: 25px;
      padding-top: 7px;
      font-weight: bold;
      text-align: center;
      width: 917px;
    }
    #invoice{
      background: #ccc;
      height: 23px;
      padding-top: 7px;
      font-weight: bold;
    }
    ul{
      list-style: none;
    }
    
 </style>
 <body>
    <!-- Start "wrapper" div. This will contain the entire web page.-->
    <div id="wrapper">
    
      <!-- header begins-->
      <header style="height: 300px;">
        <img src="images/service.jpg" alt="Servicess" />
    
      </header>
      
<?php include '../includes/nav.inc.php'; ?>
      
      <!-- content begins-->
      <div id="contentservice">
      <div class="titleservice" style="text-align: center;">Customer Service</div>
      
      <div style="width: 920px; margin-top:80px;">
      <?php if(!empty($flash_message)) echo "<h3 style='text-align=center; color:#f00;'>Hi, $flash_message</h3>"; ?>
      <table>
        <caption id="invoice">INVOICE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        (Order ID: <?=str_replace($replace,'',$invoice['created_at'])?><?=$invoice['invoice_id']?>)</caption>
        <tr>
          <td style="text-align: left;">
            <p><img src="images/<?=$invoice['image']?>.jpg" style="margin-left:40px;"/></p>
            <ul>
              <li><b>Hotel:</b> <?=$invoice['hotel_brand']?><?=$invoice['hotel_name']?></li>
              <li><b>Room:</b> <?=$invoice['room']?></li>
              <li><b>Bed:</b> <?=$invoice['bed']?></li>
              <li><b>Adults:</b> <?=$invoice['adults']?></li>
              <li><b>Children:</b> <?=$invoice['children']?></li>
              <li><b>Breakfast:</b> <?=$invoice['breakfast_included']?></li>
              <li><b>Smoke Permission:</b> <?=$invoice['smoke_permit']?></li>
              <li><b>Ranking:</b> <?=$invoice['rank']?></li>
              <li><b>Address:</b> <?=$invoice['street']?>,<?=$invoice['city']?>,<?=$invoice['country']?></li>
              <li><b>Telephone:</b> <?=$invoice['phone']?></li>
            </ul>
          </td>
        </tr>
      </table>
      
      <table>
        <caption>Customer Info</caption>
        <tr>
          <td style="text-align: left;">
          <ul>
            <li><b>Customer Name:</b> <?=$invoice['first_name']?> <?=$invoice['last_name']?></li>
            <li><b>Street:</b> <?=$invoice['customer_street']?></li>
            <li><b>City:</b> <?=$invoice['customer_city']?></li>
            <li><b>Province:</b> <?=$invoice['customer_province']?></li>
            <li><b>Country:</b> <?=$invoice['customer_country']?></li>
            <li><b>Telephone:</b> <?=$invoice['customer_phone']?></li>
            <li><b>E-mail:</b> <?=$invoice['customer_email']?></li>
          </ul>
          </td>
        </tr>
      </table>
      <table>
        <caption>Payment Info</caption>
        <tr>
          <th>Invoice ID</th>
          <th>Price</th>
          <th>GST</th>
          <th>PST</th>
          <th>Total</th>
        </tr>
        
        <tr>
          <td><?=$invoice['invoice_id']?></td>
          <td><?=$invoice['price']?></td>
          <td><?=$invoice['GST']?></td>
          <td><?=$invoice['PST']?></td>
          <td><?=$invoice['total_price']?></td>
        </tr>
     
      </table>
    
      </div>
  
      
      </div>
      
<?php include '../includes/footer.inc.php'; ?>