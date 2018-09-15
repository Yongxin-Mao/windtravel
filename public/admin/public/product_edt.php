<?php
/**
 * PHP Capstone Admin 
 * @admin main page---product_edt.php
 * @capstone, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-09-14
 */

require ('../config.php');
require ('../database/connect_db.inc.php');
require ('../model/model.php');
if(!isset($_SESSION['logged'])){
  $_SESSION['fail']="Sorry, You should login first.";
  header('Location: login.php');
  die;
}
if(!empty($_GET['hotel_id'])){
$hotel=getHotel($dbh,$_GET['hotel_id']);
}


/*
Registration Form
*/
use \Classes\Validator;
$v=new Validator();

//test fot post request
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors=[];
  //var_dump($_POST);
  //validate field for
    //required
    
    $v->required('hotel_brand');
    $v->checkLength('hotel_brand',2,25);
    
    $v->required('hotel_name');
    $v->checkLength('hotel_name',2,35);
    
    $v->required('room');
    $v->checkLength('room',2,6);
    
    $v->required('bed');
    $v->checkNumber('bed');
    
    $v->required('adults');
    $v->checkNumber('adults');
    
    $v->required('children');
    $v->checkNumber('children');
    
    $v->required('phone');
    $v->checkTelephone('phone');
    
    $v->required('street');
    $v->checkLength('street',2,20);
    
    $v->required('city');
    $v->checkLength('city',2,20);
    
    $v->required('country');
    $v->checkLength('country',2,20);
    
    $v->required('postal');
    $v->checkPostal('postal');
    
    $v->required('rank');
    $v->checkNumber('rank');
    
    $v->required('price');
    $v->checkNumber('price');
    
    $v->required('description');
    
    $v->required('breakfast_included');
    
    $v->required('smoke_permit');
    
    $v->required('image');
   
    $errors=$v->errors();
    $hotel=$_POST;
   
  //if no errors
  if(count($errors)==0){
      if(updateHotel($dbh)){
      $_SESSION['update']="You've updated your record successfully!";
      $success=true;
      header('Location: product.php');
      }else{
      die('There is a problem inserting the record');
    }
    //end if
  }//end test for post
}

?>
<?php require '../includes/header.inc.php'?>
  <div id="content">
      <h2 id="title">Hotel Modification</h2>
      
      <?php if(empty($success)): ?>
      <form method="post"
            action="product_edt.php"
            id="hotel_info"
            name="hotel_info"
            accept-charset="utf-8"
            autocomplete="on"
            novalidate>
      <fieldset>
        <legend>Edit Panel</legend>
        
        <p>
          <label for="hotel_brand">Hotel Brand</label>
          <input type="text"
                 name="hotel_brand"
                 id="hotel_brand"
                 value="<?php
                 if(!empty($hotel['hotel_brand'])){
                   echo esc_attr($hotel['hotel_brand']);
                 }?>"/>
        <?php if(!empty($errors['hotel_brand'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['hotel_brand'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="hotel_name">Hotel Name</label>
          <input type="text"
                 name="hotel_name"
                 id="hotel_name"
                 value="<?php
                 if(!empty($hotel['hotel_name'])){
                   echo esc_attr($hotel['hotel_name']);
                 }?>"/>
        <?php if(!empty($errors['hotel_name'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['hotel_name'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="room">Room</label>
          <input type="text"
                 name="room"
                 id="room"
                 value="<?php
                 if(!empty($hotel['room'])){
                   echo esc_attr($hotel['room']);
                 }?>"/>
        <?php if(!empty($errors['room'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['room'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="bed">Bed</label>
          <input type="text"
                 name="bed"
                 id="bed"
                 value="<?php
                 if(!empty($hotel['bed'])){
                   echo esc_attr($hotel['bed']);
                 }?>"/>
        <?php if(!empty($errors['bed'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['bed'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="adults">Adults</label>
          <input type="text"
                 name="adults"
                 id="adults"
                 value="<?php
                 if(!empty($hotel['adults'])){
                   echo esc_attr($hotel['adults']);
                 }?>"/>
        <?php if(!empty($errors['adults'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['adults'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="children">Children</label>
          <input type="text"
                 name="children"
                 id="children"
                 value="<?php
                 if(!empty($hotel['children'])){
                    echo esc_attr($hotel['children']);
                  }else{
                    echo '0';
                 }?>"/>
        <?php if(!empty($errors['children'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['children'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="phone">Telephone</label>
          <input type="text"
                 name="phone"
                 id="phone"
                 value="<?php
                 if(!empty($hotel['phone'])){
                   echo esc_attr($hotel['phone']);
                 }?>"/>
        <?php if(!empty($errors['phone'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['phone'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="street">Street</label>
          <input type="text"
                 name="street"
                 id="street"
                 value="<?php
                 if(!empty($hotel['street'])){
                   echo esc_attr($hotel['street']);
                 }?>"/>
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
                 if(!empty($hotel['city'])){
                   echo esc_attr($hotel['city']);
                 }?>"/>
        <?php if(!empty($errors['city'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['city'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="country">Country</label>
          <input type="text"
                 name="country"
                 id="country"
                 value="<?php
                 if(!empty($hotel['country'])){
                   echo esc_attr($hotel['country']);
                 }?>"/>
        <?php if(!empty($errors['country'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['country'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="postal">Postal Code</label>
          <input type="text"
                 name="postal"
                 id="postal"
                 value="<?php
                 if(!empty($hotel['postal'])){
                   echo esc_attr($hotel['postal']);
                 }?>"/>
        <?php if(!empty($errors['postal'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['postal'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="rank">Ranking</label>
          <input type="text"
                 name="rank"
                 id="rank"
                 value="<?php
                 if(!empty($hotel['rank'])){
                   echo esc_attr($hotel['rank']);
                 }?>"/>
        <?php if(!empty($errors['rank'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['rank'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="price">Price</label>
          <input type="text"
                 name="price"
                 id="price"
                 value="<?php
                 if(!empty($hotel['price'])){
                   echo esc_attr($hotel['price']);
                 }?>"/>
        <?php if(!empty($errors['price'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['price'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="description">Description</label>
          <input type="text"
                 row="6"
                 name="description"
                 id="description"
                 value="<?php
                 if(!empty($hotel['description'])){
                   echo esc_attr($hotel['description']);
                 }?>"/>
        <?php if(!empty($errors['description'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['description'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="breakfast_included">Breakfast</label>
          <input type="text"
                 name="breakfast_included"
                 id="breakfast_included"
                 value="<?php
                 if(!empty($hotel['breakfast_included'])){
                    echo esc_attr($hotel['breakfast_included']);
                  }else{
                    echo 'No';
                 }?>"/>
        <?php if(!empty($errors['breakfast_included'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['breakfast_included'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="smoke_permit">Smoke Permission</label>
          <input type="text"
                 name="smoke_permit"
                 id="smoke_permit"
                 value="<?php
                 if(!empty($hotel['smoke_permit'])){
                    echo esc_attr($hotel['smoke_permit']);
                  }else{
                    echo 'No';
                 }?>"/>
        <?php if(!empty($errors['smoke_perimit'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['smoke_perimit'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="image">Image</label>
          <input type="text"
                 name="image"
                 id="image"
                 value="<?php
                 if(!empty($hotel['image'])){
                   echo esc_attr($hotel['image']);
                 }?>"/>
        <?php if(!empty($errors['image'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['image'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="on_maintain">Maintenance</label>
          <input type="text"
                 name="on_maintain"
                 id="on_maintain"
                 value="<?php
                 if(!empty($hotel['on_maintain'])){
                   echo esc_attr($hotel['on_maintain']);
                 }?>"/>
        <?php if(!empty($errors['on_maintain'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['on_maintain'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="log">Log</label>
          <input type="text"
                 name="log"
                 id="log"
                 value="<?php
                 if(!empty($hotel['log'])){
                   echo esc_attr($hotel['log']);
                 }?>"/>
        <?php if(!empty($errors['log'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['log'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        </fieldset>
        <input type="hidden" name="hotel_id" value="<?=$hotel['hotel_id']?>"/>
        <button id="button" type="submit" style="font-size:18px;width:100px;height:35px;margin-top:20px;margin-bottom: 50px;float:right;margin-right:50px;">Submit</button>
          
      </form>
      <?php else: ?>
      <div style="width: 600px; margin-left:0;">
        <p><b>Successful New Record!</b></p>
        <?php if(!empty($flash_message)) echo "<h3 style='text-align=center; color:#f00;'>Hi, $flash_message</h3>"; ?>
      </div>
        <?php endif; ?>
  </div>
  
</body>

</html>