<?php
/**
 * PHP Capstone Admin 
 * @admin main page---logout.php
 * @capstone, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-09-14
 */
require ('../config.php');
require ('../database/connect_db.inc.php');
$title = 'logout';
$slug = 'service';

//logout

$_SESSION=array();
session_regenerate_id();
$_SESSION['logout']=" Goodbye! You are logged out securely.";

header('Location: login.php');
?>
<body>
    <!-- Start "wrapper" div. This will contain the entire web page.-->

    <?php if(empty($_SESSION['logged'])):?>
    <div style="text-align: center;padding-top: 100px;">
      <h3>Hi, Dear Sir or Madam:</h3>
      <p>Sorry. You are not logged in yet!</p>
      <p>Thank you.</p>
    </div>
    <?php endif;?><br/><br/>
</body>
      
