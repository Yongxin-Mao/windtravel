<?php

/**
 * PHP Capstone
 * @detail.php (which can show the products detail using dynamic php)
 * @capstone, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-09-11
 */
require ('../config.php');
require ('../database/connect_db.inc.php');
require ('../database/hotel_model.php');
$title = 'detail';
$slug = 'service';

// if no ID, send back to hotel page
//if(empty($_GET['hotel_id'])) {
//	header('Location: hotel.php');
//	die;
//}

require '../includes/header.inc.php'; 
//check the session or show the flash message
if(!empty($_SESSION['addtocart'])){
	$flash_message = $_SESSION['addtocart'];
	unset($_SESSION['addtocart']);
}
//get the single hotel from model file
$hotel=getHotel($dbh,$_GET['hotel_id']);
//get the hotels from model file by brand name
$hotelbybrand=getHotelByBrand($dbh,$hotel['hotel_brand']);
//get the hotes from model file by same city
$hotelbycity=getHotelByCity($dbh,$hotel['city']);
?>
 
 <body>
 <style>
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
    }
    a{
      text-decoration: none;
    }
    #contentservice{
      min-height: 600px;
    }
    #head,table{
      float: left;
      margin-left: 30px;
    }
    table{
      width: 680px;
    }
    table tr th,td{
      border-bottom: 1px solid #000;
      height: 30px;
    }
    table tr th{
      width: 200px;
    }
    table tr td{
      text-align: center;
    }
    form{
      clear: both;
      margin-bottom: 60px;
      margin-top: 30px;
      float: right;
      margin-right: 110px;
    }
    .entity{
      display: block;
      float: left;
      margin: 15px 30px;
    }
 </style>
    <!-- Start "wrapper" div. This will contain the entire web page.-->
    <div id="wrapper">
    
      <!-- header begins-->
      <header style="height: 300px;">
        <img src="images/service.jpg" alt="Servicess" />
    
      </header>
      
<?php include '../includes/nav.inc.php'; ?>
      
      <!-- content begins-->
      <div id="contentservice">
      <!--show the hotels list view by using php-->
      <div class="titleservice">Welcome to <?=str_replace('_',' ',$hotel['hotel_brand'])?></div>
      <?php if(!empty($flash_message)) echo "<h3 style='text-align=center; color:#f00;'>Hi, $flash_message</h3>"; ?>
      <div id="head">
        <img src="images/<?=$hotel['image']?>.jpg" alt="hotel"/>
        <div>
          <p><?=$hotel['hotel_brand']?></p>
          <p><?=$hotel['hotel_name']?></p>
          <p>Ranking: <?=$hotel['rank']?></p>
        </div>
      </div>
      <table>
        <tr>
          <th>Beds</th>
          <td><?=$hotel['bed']?></td>
        </tr>
        <tr>
          <th>Adults</th>
          <td><?=$hotel['adults']?></td>
        </tr>
        <tr>
          <th>Children</th>
          <td><?=$hotel['children']?></td>
        </tr>
        <tr>
          <th>Breakfast</th>
          <td><?=$hotel['breakfast_included']?></td>
        </tr>
        <tr>
          <th>Smoking</th>
          <td><?=$hotel['smoke_permit']?></td>
        </tr>
        <tr>
          <th>Street</th>
          <td><?=$hotel['street']?></td>
        </tr>
        <tr>
          <th>City</th>
          <td><?=$hotel['city']?></td>
        </tr>
        <tr>
          <th>Country</th>
          <td><?=$hotel['country']?></td>
        </tr>
        <tr>
          <th>Postal Code</th>
          <td><?=$hotel['postal']?></td>
        </tr>
        <tr>
          <th>Telephone</th>
          <td><?=$hotel['phone']?></td>
        </tr>
        <tr>
          <th>Price</th>
          <td><?=$hotel['price']?></td>
        </tr>
        <tr>
          <th>Description</th>
          <td><?=$hotel['description']?></td>
        </tr>
      </table>
      
      <form action="addtocart.php" method="post">
		<input type="hidden" name="hotel_id" value="<?=$hotel['hotel_id']?>" />
		<button class="buttonbuy" type="submit" style="width:100px;height:35px;">Add to Cart</button>
      </form>
     
      <div id="others">
      <fieldset>
      <legend>Other Hotels of <?=str_replace('_',' ',$hotel['hotel_brand'])?></legend>
      <?php foreach($hotelbybrand as $hotels):?>
      <div class="entity">
        <a href="detail.php?hotel_id=<?=$hotel['hotel_id']?>"><img src="images/<?=$hotels['image']?>.jpg" alt="hotel"/></a>
        <div><?=$hotels['hotel_brand']?></div>
        <div><?=$hotels['hotel_name']?></div>
        <div>Price: $<?=$hotels['price']?> | Rank: <?=$hotels['rank']?></div>
      </div>
      <?php endforeach;?>
      </fieldset>
      
      <fieldset>
      <legend>Other Hotels in <?=$hotel['city']?></legend>
      <?php foreach($hotelbycity as $hotel):?>
      <div class="entity">
        <a href="detail.php?hotel_id=<?=$hotel['hotel_id']?>"><img src="images/<?=$hotel['image']?>.jpg" alt="hotel"/></a>
        <div><?=$hotel['hotel_brand']?></div>
        <div><?=$hotel['hotel_name']?></div>
        <div>Price: $<?=$hotel['price']?> | Rank: <?=$hotel['rank']?></div>
      </div>
      <?php endforeach;?>
      </fieldset>
      </div>
      </div>
      
<?php include '../includes/footer.inc.php'; ?>