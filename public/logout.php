<?php

require ('../config.php');
require ('../database/connect_db.inc.php');
$title = 'logout';
$slug = 'service';

include '../includes/header.inc.php'; 
//logout

$_SESSION=array();
session_regenerate_id();
$_SESSION['logout']=" Goodbye! You are logged out securely.";

header('Location: login.php');
?>
<body>
    <!-- Start "wrapper" div. This will contain the entire web page.-->
    <div id="wrapper">
    
      <!-- header begins-->
      <header style="height: 300px;">
        <img src="images/service.jpg" alt="Servicess" />
        <div id="searchbar"></div>
      </header>
      
<?php include '../includes/nav.inc.php'; ?>
      
      <!-- content begins-->
      <div id="contentservice">
      <div class="titleservice">Customer Profile</div>
    
    <?php if(empty($_SESSION['loggedin'])):?>
    <div style="text-align: center;padding-top: 100px;">
      <h3>Hi, Dear Sir or Madam:</h3>
      <p>Sorry. You are not logged in yet!</p>
      <p>Thank you.</p>
    </div>
    <?php endif;?><br/><br/>
    </div>
      
    
<?php include '../includes/footer.inc.php'; ?>