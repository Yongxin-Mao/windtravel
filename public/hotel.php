<?php 
/**
 * PHP Capstone
 * @hotel page
 * @Assignment 1, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-08-02
 */

 
include ('../config.php');
$title = 'hotel';
$slug = 'hotel';

include '../includes/header.inc.php'; 

?>
 
  <body>
    <!-- Start "wrapper" div. This will contain the entire web page.-->
    <div id="wrapper">
      <!-- header begins-->
      <header>
      <img src="images/hotel.jpg" alt="hotel" />
      
      <div id="searchbar"></div>
      
      </header>
      
<?php include '../includes/nav.inc.php'; ?>
      
      <!-- content begins-->
      <div id="contenthotel">
        <table>
          <tr>
            <th>Hotel</th>
            <th>Info</th>
            <th>Price</th>
            <th>Order</th>
          </tr>
          <tr>
            <td><img src="images/h1.jpg" alt="hotel"/></td>
            <td>1295 Ellice Ave, Winnipeg, MB R3G 0N5</td>
            <td>$100</td>
            <td><a href="#"><div class="buttonbuy">Buy</div></a></td>
          </tr>
          <tr>
            <td><img src="images/h2.jpg" alt="hotel"/></td>
            <td>410 Portage Ave, Winnipeg, MB R3D 6G5</td>
            <td>$110</td>
            <td><a href="#"><div class="buttonbuy">Buy</div></a></td>
          </tr>
          <tr>
            <td><img src="images/h3.jpg" alt="hotel"/></td>
            <td>550 Notre Dame Ave, Winnipeg, MB R5G 3F6</td>
            <td>$120</td>
            <td><a href="#"><div class="buttonbuy">Buy</div></a></td>
          </tr>
          <tr>
            <td><img src="images/h4.jpg" alt="hotel"/></td>
            <td>125 William Ave, Winnipeg, MB R3C 0S5</td>
            <td>$140</td>
            <td><a href="#"><div class="buttonbuy">Buy</div></a></td>
          </tr>
          <tr>
            <td><img src="images/h5.jpg" alt="hotel"/></td>
            <td>336 Pacific Ave, Winnipeg, MB R3D 5N5</td>
            <td>$150</td>
            <td><a href="#"><div class="buttonbuy">Buy</div></a></td>
          </tr>
          <tr>
            <td><img src="images/h6.jpg" alt="hotel"/></td>
            <td>855 River Ave, Winnipeg, MB R3B 0N6</td>
            <td>$160</td>
            <td><a href="#"><div class="buttonbuy">Buy</div></a></td>
          </tr>
        </table>
      </div>
      
<?php include '../includes/footer.inc.php'; ?>