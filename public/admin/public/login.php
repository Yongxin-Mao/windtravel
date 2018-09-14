<?php
/**
 * PHP Capstone Admin 
 * @admin main page---login.php
 * @capstone, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-09-14
 */
require ('../config.php');
require ('../database/connect_db.inc.php');

$title = 'login';
$slug = 'service';


//login
if(!empty($_SESSION['logout'])){
	$flash_message = $_SESSION['logout'];
	unset($_SESSION['logout']);
}
if(!empty($_SESSION['fail'])){
	$flash_message = $_SESSION['fail'];
	unset($_SESSION['fail']);
}
use \Classes\Validator;
$v=new Validator();

//test fot post request
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors=[];
    
    $v->required('user_name');
    
    $v->required('password');
    
    $errors=$v->errors();
  
  //if no errors
  if(count($errors)==0){
  //query db for username
  $dbh=new PDO(DB_DSN, DB_USER, DB_PASS);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query='select * from administration where user_name=:user_name';
  $params=array(':user_name'=>$_POST['user_name']);
  $stmt=$dbh->prepare($query);
  $stmt->execute($params);
  $user=$stmt->fetch(PDO::FETCH_ASSOC);
  //test provided password against stored password
  if(password_verify($_POST['password'],$user['password'])){
    //if they match
    //flag user as logged in
    $_SESSION['logged_in']=true;
    $_SESSION['success']="Hi, my dear admin. You have successfully logged in.";
    $_SESSION['user_id']=$user['admin_id'];
    //session_regenerate_id();
    header('Location: index.php');
    die;
  }else{
     $notice='Sorry, we have no record of these credencials.';
   }//endif
  }//check errors
}//end check for post
//var_dump($_SESSION);

?><!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Wind Travel Admin</title>
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
      <!-- content begins-->
      <h1>Administration Center for Wind Travel</h1>
      <h2>Welcome to Wind Travel</h2>
      <?php if(!empty($flash_message)) echo "<h3 style='text-align=center; color: #f00;'>$flash_message</h3>"; ?>
      
      <?php if(empty($success)): ?>
        <form method="post"
              action="login.php"
              id="customer_info"
              name="customer_info"
              accept-charset="utf-8"
              autocomplete="on"
              novalidate>
          <fieldset>
            <legend style="font-weight: bold;">Login Information</legend>
            
            <p style="text-align: center;">
		      <label for="user_name" style="margin-left: -30px;">User Name</label><br/>
		      <input type="text"
					 name="user_name"
				     id="user_name"
                     style="width: 282px; height: 30px; margin-left: -22px;"
                     value="<?php
                     if(!empty($_POST['user_name'])){
                       echo esc_attr($_POST['user_name']);
                     }
                     ?>"/>
            </p>
            <?php if(!empty($errors['user_name'])):?>
            <span class="errors" style="margin-left: 330px;">
              <?=ucfirst(str_replace('_',' ',esc($errors['user_name'][0])))?>
            </span>
            <?php endif; ?>
		    
            
            <p style="text-align: center; margin-top: 20px;">
		      <label for="password" style="margin-left: -30px; ">Password</label><br/>
		      <input type="password"
					 name="password"
				     id="password"
                     style="width: 282px; height: 30px; margin-left: -22px;"
                     />
            </p>
            <?php if(!empty($errors['password'])):?>
            <span class="errors" style="margin-left: 330px;">
              <?=ucfirst(str_replace('_',' ',esc($errors['password'][0])))?>
            </span>
            <?php elseif(isset($notice)): ?>
		    <span class="errors" style="margin-left: 330px;">
              <?=$notice?>
            </span>
            <?php endif; ?>
            
            <p id="button" style="text-align: center; margin-top: 40px;">
            <input type="submit" 
                   value="Login"
                   class="button"
                   style="width: 285px; height: 40px; margin-left: -12px;font-size:16px;"
                   />&nbsp;&nbsp;
          </p><br/><br/>
            
          </fieldset>
            
          
        </form>
    
  <?php endif; ?>
    

 </body>

</html>