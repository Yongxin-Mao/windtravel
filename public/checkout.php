<?php

/**
 * PHP Capstone
 * @checkout.php (which can process the payment and submit the invoice form)
 * @capstone, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-09-11
 */
 
require ('../config.php');
require ('../database/connect_db.inc.php');
require '../includes/functions.php';
$title = 'checkout';
$slug = 'service';

include '../includes/header.inc.php'; 

//load models
require '../database/cart_model.php';
$replace=array(':','-',' ');
//show the page before checking for login, if not logged in we should go to login page
if(!isset($_SESSION['logged_in'])){
  $_SESSION['fail']="Sorry, You should login/register before checkout.";
  header('Location: login.php');
  die;
}else{
  $customer=getCustomer($dbh,$_SESSION['user_id']);
}
//get the cart item
if(!empty($_SESSION['cart'])){
  $cart=$_SESSION['cart'];
}

/*
Registration Form
*/
use \Classes\Utility\Validator;
$v=new Validator();

//test fot post request
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors=[];
    //var_dump($_POST);
    
    //validate the fields:required fields, length, and input type
    $v->required('card_number');
    $v->checkNumber('card_number');
    $v->checkLength('card_number',15,16);
    $v->required('security');
    $v->checkNumber('security');
    $v->checkLength('security',3,4);
    $v->required('expire');
    
    //set the errors
    $errors=$v->errors();
  
    
  //if no errors
  if(count($errors)==0){
    //insert record in DB
    //connect to mysql
    $dbh=new PDO(DB_DSN, DB_USER, DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //create query
    $query="INSERT INTO
            invoice
            (security_code,price,GST,PST,total_price,hotel_id,customer_id)
            VALUES
            (:security_code,:price,:GST,:PST,:total_price,:hotel_id,:customer_id)";
    //prepare query
    $stmt=$dbh->prepare($query);
    //bind values
    $params=array(
      ':security_code'=>$_POST['security'],
      ':price'=>$_SESSION['cart'][0]['price'],
      ':GST'=>GST,
      ':PST'=>PST,
      ':total_price'=>$_SESSION['total'],
      ':hotel_id'=>$_SESSION['hotel_id'],
      ':customer_id'=>$_SESSION['user_id']
      );
    //execute query
    //if insert secceful
    if($stmt->execute($params)){
      //set session
      unset($_SESSION['cart']);
      $_SESSION['logged_in']='true';
      //set a session message....success
      //redirect to profile
      $id=$dbh->lastInsertId();
      //create query to select new record
     
      $_SESSION['invoice_id']=$id;
     
      $_SESSION['checkout']="Congratulations, your hotel order has been processed. Thank you for booking!";
      header('Location: thankyou.php');
      die;
      //$_SESSION['cart']=array();
    }else{
      die('There is a problem inserting the record');
    }
    //end if
    
  }//end test for post
 
}
 if(!empty($_SESSION['invoice_id'])){
  $invoice=getInvoice($dbh,$_SESSION['invoice_id']);
  unset($_SESSION['invoice_id']);
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
      <div class="titleservice" style="text-align: center;">Invoice Service</div>
      <?php if(empty($success)): ?>
      <table>
      <caption>Order Info</caption>
      <tr>
        <th>Room</th>
        <th>Hotel</th>
        <th>Price</th>
        <th>Days</th>
        <th>PST</th>
        <th>GST</th>
        <th>Total</th>
      </tr>
      
      <?php foreach($cart as $value):?>
      <tr>
        <td><a href="detail.php?hotel_id=<?=$value['hotel_id']?>"><img src="images/<?=$value['image']?>.jpg" style="height:30px;width:40px;"/></a></td>
        <td><?=str_replace('_',' ',$value['hotel_brand'])?>,<?=$value['hotel_name']?></td>
        <td id="price"><?=$value['price']?></td>
        <td>1</td>
        <td><?=PST?></td>
        <td><?=GST?></td>
        <td><?=$value['total']?></td>
      </tr>
      <?php endforeach;?>
      
      </table>   
      
      <table>
      <caption>Personal Info</caption>
      <tr>
        <th>First Name</th>
        <td><?=$customer['first_name']?></td>
        <th>Last Name</th>
        <td><?=$customer['last_name']?></td>
        <th>Telephone</th>
        <td><?=$customer['phone']?></td>
      </tr>
      <tr>
        <th>E-mail</th>
        <td><?=$customer['email']?></td>
        <th>Street</th>
        <td><?=$customer['street']?></td>
        <th>City</th>
        <td><?=$customer['city']?></td>
      </tr>
      <tr>
        <th>Province</th>
        <td><?=$customer['province']?></td>
        <th>country</th>
        <td><?=$customer['country']?></td>
        <th>Postal Code</th>
        <td><?=$customer['postal_code']?></td>
      </tr>
      </table>    
      
      
      <form method="post"
            action="checkout.php"
            id="customer_info"
            name="customer_info"
            accept-charset="utf-8"
            autocomplete="on"
            novalidate>

          <legend>Payment Info</legend>

          <p>
            <label for="card_number">Card Number</label>
            <input type="text"
                   name="card_number"
                   id="card_number"
                   value="<?php
                   if(!empty($_POST['card_number'])){
                     echo esc_attr($_POST['card_number']);
                   }
                   ?>"/>
          <?php if(!empty($errors['card_number'])):?>
          <span class="errors">
            <?=ucfirst(str_replace('_',' ',esc($errors['card_number'][0])))?>
          </span>
          <?php endif; ?>
          </p>
          <p>
            <label for="security">Security Code</label>
            <input type="text"
                   name="security"
                   id="security"
                   value="<?php
                   if(!empty($_POST['security'])){
                     echo esc_attr($_POST['security']);
                   }
                   ?>"/>
          <?php if(!empty($errors['security'])):?>
          <span class="errors">
            <?=ucfirst(str_replace('_',' ',esc($errors['security'][0])))?>
          </span>
          <?php endif; ?>
          </p>
          <p>
            <label for="expire">Expiration Date</label>
            <input type="date"
                   id="expire"
                   name="expire"
                   value="<?php
                   if(!empty($_POST['expire'])){
                     echo esc_attr($_POST['expire']);
                   }
                   ?>"/>
          <?php if(!empty($errors['expire'])):?>
          <span class="errors">
            <?=ucfirst(str_replace('_',' ',esc($errors['expire'][0])))?>
          </span>
          <?php endif; ?>
          </p>

        <button class="buttonbuy" type="submit" 
                style="width:100px;height:35px;margin-bottom: 50px;float:right;margin-right:80px;"
                >Purchase</button>

      </form>
    <?php else: ?>
      <div style="width: 920px; margin-top:80px;">
      <h3>Thank you for booking our hotel!</h3>
      <table>
        <caption id="invoice">INVOICE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        (Order ID: <?=str_replace($replace,'',$invoice['created_at'])?><?=$invoice['invoice_id']?>)</caption>
        <tr>
          <td style="text-align: left;">
            <p><img src="images/<?=$invoice['image']?>" style="margin-left:40px;"/></p>
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
    <?php endif; ?>
      
      </div>
      
<?php include '../includes/footer.inc.php'; ?>