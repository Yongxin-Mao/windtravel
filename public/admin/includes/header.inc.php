<!--This is the header of all pages in Admin-->
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
    header{
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
  <header>
    <h1>Administration Center for Wind Travel</h1>
    <div id="utility" style="text-align: right; margin-right: 20px;">
          <?php if(empty($_SESSION['logged_in'])):?>
            <a href="login.php" style="color: #fff; text-decoration: none;">Login</a>
          <?php else:?>
            Hi, Admin.&nbsp;&nbsp;&nbsp;<a href="logout.php" style="color: #fff; text-decoration: none;">Logout</a>
          <?php endif;?>&nbsp;
    </div>
  
  </header>
  <div id="menu">
    <h1 style="height: 35px; width:134px; padding:10px;"><a href="index.php" style="color:#088;">Home</a></h1>
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