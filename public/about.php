<?php 

/**
 * PHP Capstone
 * @about page
 * @Assignment 1, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-08-02
 */

 
include ('../config.php');
$title = 'about';
$slug = 'about';

include '../includes/header.inc.php'; 

?>
 
  <body>
    <!-- Start "wrapper" div. This will contain the entire web page.-->
    <div id="wrapper">
      <header>
        <img src="images/aboutus.jpg" alt="about us" />
        <div id="searchbar"></div>
      </header>
      
<?php include '../includes/nav.inc.php'; ?>
      
      <!--Here is the main content -->
      <div id="contentabout">
        <div class="titleabout">Story About Wind Travel</div>
        <img src="images/logo_big.png" alt="company logo"/>
        <article>
        <h2>Wind Travel</h2>
        <p>Wind Travel, Inc. is a Canadian company providing one-stop traveling services to people around the country and the whole world. People can purchase travel products, such as accommodations, flights, tickets, and coupons. They can also acquire travel insurance service and tour guide service. Wind Travel is a company providing online products and recreational activities, their customers are people who like traveling and sightseeing, so the website should be attractive, creative, and convenient for their customers to use. Our company-Mountain Rock Tech, a web design, and development company can provide the best solution for your company.</p>
        <p>In Canada, more and more people like traveling around the country or the world with their family and friends. Sometimes, people spend a lot of time and effort on searching information about tickets, hotels, and places, etc. They even get exhausted before they begin their trip. Our primary audience is the people who like traveling but don’t like troublesome procedures. We are willing to set up a one-stop service traveling website. People do not have to worry about accommodation, transportation and traveling insurance, etc. They can easily purchase tickets, book hotels, and restaurants, and even acquire guidance, insurance, and other kinds of help. </p>
        <p>According to this, the new website will focus on traveling service and information, such as “The most popular places”, “The most popular hotels”, flights, restaurants and other helpful services. Besides, many beautiful colors on this website make it eye-catching. It also has “Canadian styles”: not only the beautiful scenery in Canada but also includes red color and maple leaf. All these designs will be a good reason for people to use this new website. Moreover, the new website will have “map” and “search” function, because searching and positioning is really important for a traveler.</p>
        </article>
      </div>
      
<?php include '../includes/footer.inc.php'; ?>