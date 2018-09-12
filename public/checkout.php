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
            (security_code,total_price,hotel_id,customer_id)
            VALUES
            (:security_code,:total_price,:hotel_id,:customer_id)";
    //prepare query
    $stmt=$dbh->prepare($query);
    //bind values
    $params=array(
      ':security_code'=>$_POST['security'],
      ':total_price'=>$_SESSION['total'],
      ':hotel_id'=>$_SESSION['hotel_id'],
      ':customer_id'=>$_SESSION['user_id']
      );
    //execute query
    //if insert secceful
    if($stmt->execute($params)){
      //set session
      
      $_SESSION['logged_in']='true';
      //set a session message....success
      //redirect to profile
      
      
      session_regenerate_id();
      $success=true;
      //$_SESSION['cart']=array();
    }else{
      die('There is a problem inserting the record');
    }
    //end if
  }//end test for post
}
var_dump($_SESSION);
var_dump($cart);
var_dump($customer);

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
        <td><a href="detail.php?hotel_id=<?=$value['hotel_id']?>"><img src="images/<?=$value['image']?>" style="height:30px;width:40px;"/></a></td>
        <td><?=$value['hotel_brand']?>,<?=$value['hotel_name']?></td>
        <td id="price"><?=$value['price']?></td>
        <td>1</td>
        <td>0.08</td>
        <td>0.05</td>
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
            
          <button class="buttonbuy" type="submit" style="width:100px;height:35px;margin-bottom: 50px;float:right;margin-right:80px;">Submit</button>
          
        </form>
    <?php else: ?>
      <div style="width: 920px;text-align:center; margin-top:80px;">
      <h1>Thank you for booking our hotel!</h1>
      <p><b>Your purchasing is completely!</b></p>
      <table>
        <tr>
          <th>ID</th>
          <th>Customer</th>
          <th>Email</th>
          <th>Hotel</th>
          <th>Address</th>
          <th>Price</th>
          <th>GST</th>
          <th>PST</th>
          <th>Total</th>
        </tr>
        <?php foreach($cart as $value):?>
        <tr>
          <td><?=$customer['customer_id']?></td>
          <td><?=$customer['first_name']?> <?=$customer['last_name']?></td>
          <td><?=$customer['email']?></td>
          <td><?=$_SESSION['cart'][$_SESSION['hotel_id']]['hotel_brand']?></td>
          <td><?=$_SESSION['cart'][$_SESSION['hotel_id']]['hotel_name']?></td>
          <td><?=$_SESSION['cart'][$_SESSION['hotel_id']]['price']?></td>
          <td>0.05</td>
          <td>0.08</td>
          <td><?=$_SESSION['total']?></td>
        </tr>
      <?php endforeach;?>
      </table>
    
      </div>
    <?php endif; ?>
      
      </div>
      
<?php include '../includes/footer.inc.php'; ?>