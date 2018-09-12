<?php
/**
 * PHP Capstone
 * @admin main page---index.php
 * @capstone, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-09-11
 */
 
require ('../config.php');
require ('../database/connect_db.inc.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wind Travel Admin</title>
  <meta charset="utf-8" />
  <style>
    body{
      width: 1000px;
      margin: 0 auto;
    }
    h1{
      background: #0bb;
      text-align: center;
      padding: 35px 0;
      height: 70px;
      margin: 0;
    }
    #menu{
      background: #ccc;
      height: 580px;
      width: 155px;
      padding: 2px 20px;
      float: left;
    }
    #menu a{
      text-decoration: none;
      color: #000;
    }
    #menu a:hover{
      color: #099;
    }
    ul li, ol li{
      line-height: 35px;
    }
    li{
      font-size: 18px;
      line-height: 25px;
    }
    #partone{
      float: left;
      padding-left: 20px;
    }
    iframe{
      margin-top: 20px;
    }
  </style>
  <script>

  </script>
</head>

<body>
  <h1>Administration Center for Wind Travel</h1>
  <div id="menu">
    <h1 style="height: 35px; width:134px; padding:10px;"><a href="index.php">Home</a></h1>
    <h2><a>Hotels</a></h2>
    <ul>
      <li><a href="product.php">List ALL</a></li>
      <li><a href="product_new.php">Create New</a></li>
    </ul>
    <h2><a>Customers</a></h2>
    <ul>
      <li><a href="#">List ALL</a></li>
      <li><a href="#">Create New</a></li>
    </ul>
    <h2><a>Invoices</a></h2>
    <ul>
      <li><a href="#">List ALL</a></li>
      <li><a href="#">Create New</a></li>
    </ul>
  </div>
  
  <div id="content">
    <div id="partone">
      <h2>Welcome to Administration Center</h2>
      <p style="font-size:19px;font-weight:bold;">Instruction</p>
      <ol>
        <li>All records in Database can be manipulated as Admin user.</li>
        <li>Tables can be selected and modified through menu on the left side.</li>
        <li>Frontend of Wind Travel site can be checked in the following embedded window.</li>
        <li>Manipulating data before thinking.</li>
        <li>If you have any trouble, please contact the designer of this website.
          <ul>
            <li>Designer: Yongxin Mao</li>
            <li>E-mail: maoyongxin115@gmail.com</li>
            <li>Telephone: 204-805-5998</li>
          </ul>
        </li>
      </ol>
    </div>
    <iframe src="../../index.php"  width="1000" height="800" frameborder="0"></iframe>
  </div>
  
</body>

</html>