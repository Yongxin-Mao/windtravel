<?php 
/**
 * PHP Capstone
 * @flight page
 * @Assignment 1, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-08-02
 */

 
include ('../config.php');
$title = 'flight';
$slug = 'flight';

include '../includes/header.inc.php'; 

?>
 
  <body>
    <!-- Start "wrapper" div. This will contain the entire web page.-->
    <div id="wrapper">
      <header>
      <img src="images/flightbg.jpg" alt="Flight Background" />
      <div id="searchbar">
        
      </div>
      </header>
      
<?php include '../includes/nav.inc.php'; ?>
      
      <!--here is content-->
      <div id="contentflight">
        <div class="company">
          <img src="images/co1.jpg" alt="West Jet"/>
          <div><h2><a style="color: #fff;" href="https://www.westjet.com/en-ca/index">West Jet</a></h2></div>
        </div> 
        <div class="company">
          <img src="images/co2.jpg" alt="Canada Air"/>
          <div><h2><a style="color: #fff;" href="https://www.aircanada.com/ca/en/aco/home.html">Canada Air</a></h2></div>
        </div>
        <div class="company">
          <img src="images/co3.jpg" alt="DELTA"/>
          <div><h2><a style="color: #fff;" href="https://www.delta.com/">DELTA</a></h2></div>
        </div>
        <div class="company">
          <img src="images/co4.jpg" alt="Southwest"/>
          <div><h2><a style="color: #fff;" href="https://www.southwest.com/?clk=GNAVHOMELOGO">Southwest</a></h2></div>
        </div>
      </div>
      
<?php include '../includes/footer.inc.php'; ?>