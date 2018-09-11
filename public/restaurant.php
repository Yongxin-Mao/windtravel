<?php 
/**
 * PHP Capstone
 * @restaurant page
 * @Assignment 1, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-08-02
 */

 
include ('../config.php');
$title = 'restaurant';
$slug = 'rest';

include '../includes/header.inc.php'; 

?>
  
  <body>
    <!-- Start "wrapper" div. This will contain the entire web page.-->
    <div id="wrapper">
      <header>
      <img src="images/restbg.jpg" alt="Restaurants" />
     
      </header>
      
<?php include '../includes/nav.inc.php'; ?>
      
       <!-- Content begins-->
      <div id="contentrest">
        <div class="titlerest">Discover Your Favorite Food</div>
        <img src="images/map.jpg" 
             width="600" 
             height="400" 
             alt="google map"
             />
        <br/><br/>
      </div>
      
<?php include '../includes/footer.inc.php'; ?>