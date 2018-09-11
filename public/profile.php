<?php

//profile
require ('../config.php');
require ('../database/connect_db.inc.php');
$title = 'login';
$slug = 'service';

if(!empty($_SESSION['success'])) {
	$flash_message = $_SESSION['success'];
	unset($_SESSION['success']);
}
if(isset($_SESSION['logged_in'])){
$dbh=new PDO(DB_DSN, DB_USER, DB_PASS);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query="select
              customer.first_name as 'First Name',
              customer.last_name as 'Last Name',
              customer.street as 'Street',
              customer.city as 'City',
              customer.postal_code as 'Postal Code',
              customer.province as 'Province',
              customer.country as 'Country',
              customer.phone as 'Phone',
              customer.email as 'E-mail'
              from customer
              where customer_id=:customer_id";
  $params=array(':customer_id'=>$_SESSION['user_id']);
  $stmt=$dbh->prepare($query);
  $stmt->execute($params);
  $user=$stmt->fetch(PDO::FETCH_ASSOC);
  
}

include '../includes/header.inc.php'; 

?>
<style>
  
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
      <div class="titleservice">Customer Profile</div>
        
      <?php if(!empty($flash_message)) echo "<h3 style='text-align=center;'> $flash_message</h3>"; ?>
      
      <?php if(isset($_SESSION['logged_in'])):?>
      <div style="width: 420px; margin: 0 auto;">
        <h1>Personal Information</h1>
        <?php foreach($user as $key=>$value): ?>
         <p><?=$key?>: <?=$value?></p>
        <?php endforeach; ?>
      </div>
    <?php else:?> 
    <div style="text-align: center;padding-top: 100px;">
      <h3>Hi, Dear Sir or Madam:</h3>
      <p>Sorry. If you want to check your profile, please login or register first!</p>
      <p>Thank you.</p>
    </div>
    <?php endif;?><br/><br/>
    </div>
      
    
<?php include '../includes/footer.inc.php'; ?>
 