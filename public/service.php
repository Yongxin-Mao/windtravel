<?php 
/**
 * PHP Capstone
 * @service page
 * @Assignment 1, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-08-02
 */

 
include ('../config.php');
//require '../connect_db.inc.php';
define('DB_USER','web_user');
define('DB_PASS','mypass');
define('DB_DSN','mysql:host=localhost;dbname=capstone');
require '../includes/functions.php';
$title = 'service';
$slug = 'service';

include '../includes/header.inc.php'; 

/*
Registration Form
*/

//test fot post request
if($_SERVER['REQUEST_METHOD']=='POST'){
  $errors=[];
  //var_dump($_POST);
  //validate field for
    //required
    
    $errors=required('first_name', $errors);
    $errors=minLength('first_name', 2, $errors);
    
    $errors=required('last_name', $errors);
    $errors=minLength('last_name', 2, $errors);
    
    $errors=required('street', $errors);
    $errors=minLength('street', 2, $errors);
    
    $errors=required('city', $errors);
    $errors=minLength('city', 2, $errors);
    
    $errors=required('postal_code', $errors);
    $errors=minLength('postal_code', 6, $errors);
    
    $errors=required('province', $errors);
    $errors=minLength('province', 2, $errors);
    
    $errors=required('country', $errors);
    $errors=minLength('country', 2, $errors);
    
    $errors=validateEmail($_POST['email'], 'email', $errors);
    
    $errors=required('phone', $errors);
    if(!is_numeric($_POST['phone'])){
    $errors['phone'][]="Telephone should be numbers.";
    }
    
    $errors=required('password', $errors);
    $errors=minLength('password', 6, $errors);
    $errors=passwordMatch('password', 'password_confirm', $errors);
    
    
    
    //var_dump($errors);
    //min length
  //if no errors
  if(count($errors)==0){
    //insert record in DB
    //connect to mysql
    $dbh=new PDO(DB_DSN, DB_USER, DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //create query
    $query="INSERT INTO
            customer
            (first_name,last_name,street,city,postal_code,province,country,phone,email,password)
            VALUES
            (:first_name,:last_name,:street,:city,:postal_code,:province,:country,:phone,:email,:password)";
    //prepare query
    $stmt=$dbh->prepare($query);
    //bind values
    $params=array(
      ':first_name'=>$_POST['first_name'],
      ':last_name'=>$_POST['last_name'],
      ':street'=>$_POST['street'],
      ':city'=>$_POST['city'],
      ':postal_code'=>$_POST['postal_code'],
      ':province'=>$_POST['province'],
      ':country'=>$_POST['country'],
      ':phone'=>$_POST['phone'],
      ':email'=>$_POST['email'],
      ':password'=>$_POST['password']
    );
    //execute query
    //if insert secceful
    if($stmt->execute($params)){
      //get last insert id
      $id=$dbh->lastInsertId();
      //create query to select new record
      $query="SELECT 
              customer.first_name as 'First Name',
              customer.last_name as 'Last Name',
              customer.street as 'Street',
              customer.city as 'City',
              customer.postal_code as 'Postal Code',
              customer.province as 'Province',
              customer.country as 'Country',
              customer.phone as 'Phone',
              customer.email as 'E-mail'
              FROM customer where id=:id";
      //prepare query to select record you just inserted
      $stmt=$dbh->prepare($query);
      //bindValue
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      //execute query
      $stmt->execute();
      //fetch results
      $customer=$stmt->fetch(PDO::FETCH_ASSOC);
      //set boolean flag
      $success=true;
    }else{
      die('There is a problem inserting the record');
    }
    //end if
  
}//end test for post
}
?>
 
  <body>
    <!-- Start "wrapper" div. This will contain the entire web page.-->
    <div id="wrapper">
    
      <!-- header begins-->
      <header>
        <img src="images/guidance.jpg" alt="Servicess" />
        <div id="searchbar"></div>
      </header>
      
<?php include '../includes/nav.inc.php'; ?>
      
      <!-- content begins-->
      <div id="contentservice">
      <div class="titleservice">Customer Service Centre</div>
      <?php if(empty($success)): ?>
        <form method="post"
              action="service.php"
              id="customer_info"
              name="customer_info"
              accept-charset="utf-8"
              autocomplete="on"
              novalidate>
          <fieldset>
            <legend style="font-weight: bold;">Personal Information</legend>
            <p>
              <label for="first_name">First Name</label>
              <input type="text"
                     id="first_name" 
                     name="first_name"
                     value="<?php
                     if(!empty($_POST['first_name'])){
                       echo esc_attr($_POST['first_name']);
                     }
                     ?>" />
            <?php if(!empty($errors['first_name'])):?>
            <span class="errors">
              <?=ucfirst(str_replace('_',' ',esc($errors['first_name'][0])))?>
            </span>
            <?php endif; ?>
            </p>
            <p>
              <label for="last_name">Last Name</label>
              <input type="text"
                     id="last_name"
                     name="last_name"
                     value="<?php
                     if(!empty($_POST['last_name'])){
                       echo esc_attr($_POST['last_name']);
                     }
                     ?>"/>
            <?php if(!empty($errors['last_name'])):?>
            <span class="errors">
              <?=ucfirst(str_replace('_',' ',esc($errors['last_name'][0])))?>
            </span>
            <?php endif; ?>
            </p>
            <p>
		      <label for="street">Street</label>
		      <input type="text"
					 name="street"
				     id="street"
                     value="<?php
                     if(!empty($_POST['street'])){
                       echo esc_attr($_POST['street']);
                     }
                     ?>"/>
            <?php if(!empty($errors['street'])):?>
            <span class="errors">
              <?=ucfirst(str_replace('_',' ',esc($errors['street'][0])))?>
            </span>
            <?php endif; ?>
		    </p>
            <p>
		      <label for="city">City</label>
		      <input type="text"
					 name="city"
				     id="city"
                     value="<?php
                     if(!empty($_POST['city'])){
                       echo esc_attr($_POST['city']);
                     }
                     ?>"/>
            <?php if(!empty($errors['city'])):?>
            <span class="errors">
              <?=ucfirst(str_replace('_',' ',esc($errors['city'][0])))?>
            </span>
            <?php endif; ?>
		    </p>
            <p>
		      <label for="postal_code">Postal Code</label>
		      <input type="text"
					 name="postal_code"
				     id="postal_code"
                     value="<?php
                     if(!empty($_POST['postal_code'])){
                       echo esc_attr($_POST['postal_code']);
                     }
                     ?>"/>
            <?php if(!empty($errors['postal_code'])):?>
            <span class="errors">
              <?=ucfirst(str_replace('_',' ',esc($errors['postal_code'][0])))?>
            </span>
            <?php endif; ?>
		    </p>
            <p>
		      <label for="provice">Provice</label>
		      <input type="text"
					 name="province"
				     id="province"
                     value="<?php
                     if(!empty($_POST['province'])){
                       echo esc_attr($_POST['province']);
                     }
                     ?>"/>
            <?php if(!empty($errors['province'])):?>
            <span class="errors">
              <?=ucfirst(str_replace('_',' ',esc($errors['province'][0])))?>
            </span>
            <?php endif; ?>
		    </p>
            <p>
		      <label for="country">Country</label>
		      <input type="text"
					 name="country"
				     id="country"
                     value="<?php
                     if(!empty($_POST['country'])){
                       echo esc_attr($_POST['country']);
                     }
                     ?>"/>
            <?php if(!empty($errors['country'])):?>
            <span class="errors">
              <?=ucfirst(str_replace('_',' ',esc($errors['country'][0])))?>
            </span>
            <?php endif; ?>
		    </p>
            <p>
		      <label for="email">Email Address</label>
		      <input type="text"
					 name="email"
				     id="email"
                     placeholder="xxxx@xx.xx"
                     value="<?php
                     if(!empty($_POST['email'])){
                       echo esc_attr($_POST['email']);
                     }
                     ?>"/>
            <?php if(!empty($errors['email'])):?>
            <span class="errors">
              <?=esc($errors['email'])?>
            </span>
            <?php endif; ?>
		    </p>
            <p>
              <label for="phone">Telephone</label>
              <input type="text"
                     id="phone"
                     name="phone"
                     value="<?php
                     if(!empty($_POST['phone'])){
                       echo esc_attr($_POST['phone']);
                     }
                     ?>"/>
            <?php if(!empty($errors['phone'])):?>
            <span class="errors">
              <?=ucfirst(str_replace('_',' ',esc($errors['phone'][0])))?>
            </span>
            <?php endif; ?>
            </p>
            <p>
		      <label for="password">Password</label>
		      <input type="password"
					 name="password"
				     id="password"
                     placeholder="6 letters or numbers minimum..."/>
            <?php if(!empty($errors['password'])):?>
            <span class="errors">
              <?=ucfirst(str_replace('_',' ',esc($errors['password'][0])))?>
            </span>
            <?php endif; ?>
		    </p>
            <p>
		      <label for="password_confirm">Password Confirmation</label>
		      <input type="password"
					 name="password_confirm"
				     id="password_confirm"
                     placeholder="Be same with above..."/>
		    </p>
          </fieldset>
            
          <p id="button">
            <input type="submit" 
                   value="Log In"
                   class="button"
                   />&nbsp;&nbsp;
          </p><br/><br/>
        </form>
    <?php else: ?>
    <div style="width: 420px; margin: 0 auto;">
      <h1>Thank you for registering!</h1>
      <p><b>You submitted the following information:</b></p>
   
      <?php foreach($customer as $key=>$value): ?>
         <p><?=$key?>: <?=$value?></p>
      <?php endforeach; ?>
  <?php endif; ?>
    </div>
      </div>
      
<?php include '../includes/footer.inc.php'; ?>