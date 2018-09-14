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
if(!isset($_SESSION['logged_in'])){
  $_SESSION['fail']="Sorry, You should login/register before checkout.";
  header('Location: login.php');
  die;
}
if(!empty($_SESSION['success'])){
	$flash_message = $_SESSION['success'];
	unset($_SESSION['success']);
}
?>

<?php require '../includes/header.inc.php'?>
  
  <div id="content">
    <div id="partone">
      <h2>Welcome to Administration Center</h2>
      <?php if(!empty($flash_message)) echo "<h3 style='text-align=center;color:#f00;'>$flash_message</h3>"; ?>
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