<?php 

/**
 * PHP Capstone
 * @home page
 * @Assignment 1, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-08-02
 */

// include ('../config.php');  this is same with below
include __DIR__ . '/../config.php';
require ('../database/connect_db.inc.php');
use \Classes\Utility\Validator;
$v=new Validator();

$title = 'home';
$slug = 'home';

include '../includes/header.inc.php'; 

?>


 <body>
    <!-- Start "wrapper" div. This will contain the entire web page.-->
    <div id="wrapper">
      <header>
        <img src="images/bg1.jpg" alt="Rocky Mountains" />
        <div id="searchbar">
          <form>
            <input type="text"
                   id="search"
                   name="search_result"
                   size="30"
                   placeholder="   Find your dream place..."
            />
            <div class="button"><a href="#" title="search">Search</a></div>
          </form>

        </div>
      </header>
      
<?php include '../includes/nav.inc.php'; ?>
 
      
      <!--Content begins-->
      <div id="content">
        <div class="title">Most Popular Place</div>
        <a href="http://www.winnipeg.ca/interhom/" title="winnipeg"><div id="box1" class="box">
        <h2>Winnipeg</h2>
        </div></a>
        <a href="https://www.toronto.ca/" title="toronto"><div id="box2" class="box">
        <h2>Toronto</h2>
        </div></a>
        <a href="https://ottawa.ca/en" title="ottawa"><div id="box3" class="box">
        <h2>Ottawa</h2>
        </div></a>
        <a href="http://vancouver.ca/" title="vancouver"><div id="box4" class="box">
        <h2>Vancouver</h2>
        </div></a>
        
        <div class="title">Most Popular Hotel</div>
        <a href="hotel.html" title="hotel"><div id="box5" class="box">
        <h2>Hilton</h2>
        </div></a>
        <a href="hotel.html" title="hotel"><div id="box6" class="box">
        <h2>Crowne Plaza</h2>
        </div></a>
        <a href="hotel.html" title="hotel"><div id="box7" class="box">
        <h2>Grand Hyatt</h2>
        </div></a>
        <a href="hotel.html" title="hotel"><div id="box8" class="box">
        <h2>Howard Johnson</h2>
        </div></a>
        
        <div class="title">Guidance Service</div>
        <a href="#" title="medical"><div id="ball1" class="ball">
        </div></a>
        <a href="#"><div title="family" id="ball2" class="ball">
        </div></a>
        <a href="#"><div title="transport" id="ball3" class="ball">
        </div></a>
        <a href="#"><div title="social movement" id="ball4" class="ball">
        </div></a>
        <a href="#"><div title="tools" id="ball5" class="ball">
        </div></a>
        <a href="#"><div title="contact" id="ball6" class="ball">
        </div></a>
      </div>
      
<?php include '../includes/footer.inc.php'; ?>