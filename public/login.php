<?php

require ('../config.php');
require ('../database/connect_db.inc.php');
require '../includes/functions.php';
$title = 'login';
$slug = 'service';

include '../includes/header.inc.php'; 
//login
if(!empty($_SESSION['logout'])){
	$flash_message = $_SESSION['logout'];
	unset($_SESSION['logout']);
}
if(!empty($_SESSION['fail'])){
	$flash_message = $_SESSION['fail'];
	unset($_SESSION['fail']);
}
use \Classes\Utility\Validator;
$v=new Validator();

//test fot post request
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors=[];
    
    $v->required('email');
    $v->validateEmail('email');
    
    $v->required('password');
    
    $errors=$v->errors();
  
  //if no errors
  if(count($errors)==0){
  //query db for username
  $dbh=new PDO(DB_DSN, DB_USER, DB_PASS);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query='select
              customer.customer_id,
              customer.first_name,
              customer.password,
              customer.email
              from customer
              where email=:email';
  $params=array(':email'=>$_POST['email']);
  $stmt=$dbh->prepare($query);
  $stmt->execute($params);
  $user=$stmt->fetch(PDO::FETCH_ASSOC);
  //test provided password against stored password
  if(password_verify($_POST['password'],$user['password'])){
    //if they match
    //flag user as logged in
    $_SESSION['logged_in']=true;
    $_SESSION['success']="Welcome back, ".ucfirst($user['first_name']).". You have successfully
logged in.";
    $_SESSION['user_id']=$user['customer_id'];
    session_regenerate_id();
    header('Location: profile.php');
    die;
  }else{
     $notice='Sorry, we have no record of these credencials.';
   }//endif
  }//check errors
}//end check for post
//var_dump($_SESSION);
?>
 <style>
  
 </style>
 <body>
    <!-- Start "wrapper" div. This will contain the entire web page.-->
    <div id="wrapper">
    
      <!-- header begins-->
      <header style="height: 300px;">
        <img src="images/service.jpg" alt="Servicess" />
    
      </header>
      
<?php include '../includes/nav.inc.php'; ?>
      
      <!-- content begins-->
      <div id="contentservice">
      <div class="titleservice">Welcome to WindTravel</div>
      
      <?php if(!empty($flash_message)) echo "<h3 style='text-align=center;'>Notice: $flash_message</h3>"; ?>
      
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
		      <label for="email" style="margin-left: -70px;">Email Address</label><br/>
		      <input type="text"
					 name="email"
				     id="email"
                     style="width: 282px; height: 30px; margin-left: -22px;"
                     value="<?php
                     if(!empty($_POST['email'])){
                       echo esc_attr($_POST['email']);
                     }
                     ?>"/>
            </p>
            <?php if(!empty($errors['email'])):?>
            <span class="errors" style="margin-left: 285px;">
              <?=ucfirst(esc($errors['email'][0]))?>
            </span>
            <?php endif; ?>
		    
            
            <p style="text-align: center; margin-top: 20px;">
		      <label for="password" style="margin-left: -70px;">Password</label><br/>
		      <input type="password"
					 name="password"
				     id="password"
                     style="width: 282px; height: 30px; margin-left: -22px;"
                     />
            </p>
            <?php if(!empty($errors['password'])):?>
            <span class="errors" style="margin-left: 285px;">
              <?=ucfirst(str_replace('_',' ',esc($errors['password'][0])))?>
            </span>
            <?php elseif(isset($notice)): ?>
		    <span class="errors" style="margin-left: 285px;">
              <?=$notice?>
            </span>
            <?php endif; ?>
            
            <p id="button" style="text-align: center; margin-top: 40px;">
            <input type="submit" 
                   value="Login"
                   class="button"
                   style="width: 300px;"
                   />&nbsp;&nbsp;
          </p><br/><br/>
            
          </fieldset>
            
          
        </form>
    
  <?php endif; ?>
    
      </div>
      
<?php include '../includes/footer.inc.php'; ?>