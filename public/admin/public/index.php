<?php
/**
 * PHP Capstone Admin 
 * @admin main page---index.php
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
if(!empty($_SESSION['success'])){
	$flash_message = $_SESSION['success'];
	unset($_SESSION['success']);
}

$data=showData($dbh);
$record=showRecord($dbh);

?>
<style>
  .data{
    border: 1px solid #000;
    width: 210px;
    height: 175px;
    float: left;
    padding: 10px 20px;
    margin-right: 7px;
    background: #ddd;
  }
  .data li{
   font-size: 15px;
   line-height: 20px;
  }
</style>
<?php require '../includes/header.inc.php'?>
  
  <div id="content">
    <div id="partone">
      <h2>Welcome to Administration Center</h2>
      <?php if(!empty($flash_message)) echo "<h3 style='text-align=center;color:#f00;'>$flash_message</h3>"; ?>
      <p style="font-size:19px;font-weight:bold;">Dashboard</p>
      <ol class="data">
        <p><b>Hotel Statistics</b></p>
        <li>Highest hotel price: $<?=$data[0]['max']?></li>
        <li>Lowest hotel price: $<?=$data[0]['min']?></li>
        <li>Average hotel price: $<?=$data[0]['avg']?></li>
        <li>Hotels amount: <?=$data[0]['hotels']?></li>
        <li>Customers amount: <?=$data[0]['customers']?></li>
      </ol>
      <ol class="data">
        <p><b>Revenue Statistics</b></p>
        <li>Highest payment: $<?=$data[0]['max_pay']?></li>
        <li>Lowest payment: $<?=$data[0]['min_pay']?></li>
        <li>Average payment: $<?=$data[0]['avg_pay']?></li>
        <li>Invoices amount: <?=$data[0]['invoices']?></li>
        <li>Total Revenue: $<?=$data[0]['sum']?></li>
      </ol>
      <ol class="data">
        <p><b>New Hotel Record</b></p>
        <li>ID: <?=$record[0]['hotel_id']?></li>
        <li>Hotel: <?=$record[0]['hotel_brand']?>,<?=$record[0]['hotel_name']?></li>
        <li>Price: <?=$record[0]['price']?></li>
        <li>Address: <?=$record[0]['city']?>,<?=$record[0]['country']?></li>
        <li>Created time: <?=$record[0]['created_at']?></li>
      </ol>
      <ol id="data">
        <li>All records in Database can be manipulated as Admin user.</li>
        <li>Tables can be selected and modified through menu on the left side.</li>
        <li>Frontend of Wind Travel site can be checked in the following embedded window.</li>
        <li>Manipulating data after thinking carefully.</li>
        <li>If you have any trouble, please contact the designer of this website.
          <ul>
            <li>Instructor: Steve George</li>
            <li>Designer: Yongxin Mao</li>
          </ul>
        </li>
      </ol>
    </div>
    <iframe src="../../index.php"  width="1000" height="800" frameborder="0"></iframe>
  </div>
  
</body>

</html>