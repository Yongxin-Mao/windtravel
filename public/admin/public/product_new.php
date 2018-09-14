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
require ('../model/model.php');

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
    
    $v->required('on_maintain');
    
    $v->required('log');
    $v->checkLength('log',1,200);
   
    $errors=$v->errors();
  
  //if no errors
  if(count($errors)==0){
    $result=createHotel($dbh);
    if($result){
      $success=true;
    }else{
      die('There is a problem inserting the record');
    }
    //end if
  }//end test for post
}

?>
<?php require '../includes/header.inc.php'?>
  <style>
  table{
      width: 760px;
      border-collapse: collapse;
      text-align: center;
    }
    tr,th,td{
      border: 1px solid #333;
      height: 21px;
    }
  </style>
  <div id="content" style="margin-left: 220px;">
      <h2 id="title">Create New Hotel Record</h2>
      <?php if(!empty($flash_message)) echo "<h3 style='text-align=center; color:#f00;'>Hi, $flash_message</h3>"; ?>
      <?php if(empty($success)): ?>
      <form method="post"
            action="product_new.php"
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
                 if(!empty($_POST['hotel_brand'])){
                   echo esc_attr($_POST['hotel_brand']);
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
                 if(!empty($_POST['hotel_name'])){
                   echo esc_attr($_POST['hotel_name']);
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
                 if(!empty($_POST['room'])){
                   echo esc_attr($_POST['room']);
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
                 if(!empty($_POST['bed'])){
                   echo esc_attr($_POST['bed']);
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
                 if(!empty($_POST['adults'])){
                   echo esc_attr($_POST['adults']);
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
                 if(!empty($_POST['children'])){
                   echo esc_attr($_POST['children']);
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
                 if(!empty($_POST['phone'])){
                   echo esc_attr($_POST['phone']);
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
                 if(!empty($_POST['street'])){
                   echo esc_attr($_POST['street']);
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
                 if(!empty($_POST['city'])){
                   echo esc_attr($_POST['city']);
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
                 if(!empty($_POST['country'])){
                   echo esc_attr($_POST['country']);
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
                 if(!empty($_POST['postal'])){
                   echo esc_attr($_POST['postal']);
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
                 if(!empty($_POST['rank'])){
                   echo esc_attr($_POST['rank']);
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
                 if(!empty($_POST['price'])){
                   echo esc_attr($_POST['price']);
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
                 name="description"
                 id="description"
                 value="<?php
                 if(!empty($_POST['description'])){
                   echo esc_attr($_POST['description']);
                 }?>"/>
        <?php if(!empty($errors['description'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['description'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="breakfast_included">Breakfast</label>
          <input type="radio" name="breakfast_included" 
                 value="Yes" <?php if(isset($_POST['breakfast_included'])&&$_POST['breakfast_included']=="Yes") 
                 echo 'checked="checked"';?>/>Yes 
          <input type="radio" name="breakfast_included" 
                 value="No" <?php if(isset($_POST['breakfast_included'])&&$_POST['breakfast_included']=="No") 
                 echo 'checked="checked"';?>/>No
        <?php if(!empty($errors['breakfast_included'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['breakfast_included'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="smoke_permit">Smoke Permission</label>
          <input type="radio" name="smoke_permit" 
                 value="Yes" <?php if(isset($_POST['smoke_permit'])&&$_POST['smoke_permit']=="Yes") 
                 echo 'checked="checked"';?>/>Yes 
          <input type="radio" name="smoke_permit" 
                 value="No" <?php if(isset($_POST['smoke_permit'])&&$_POST['smoke_permit']=="No") 
                 echo 'checked="checked"';?>/>No
        <?php if(!empty($errors['smoke_permit'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['smoke_permit'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
        <label for="image">Image Name</label>
        <input type="text"
               name="image"
               id="image"
               value="<?php if(!empty($_POST['image'])){
                   echo esc_attr($_POST['image']);
                 }?>"/>
        <?php if(!empty($errors['image'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['image'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        <p>
          <label for="on_maintain">Maintenance</label>
          <input type="radio" name="on_maintain" 
                 value="Yes" <?php if(isset($_POST['on_maintain'])&&$_POST['on_maintain']=="Yes") 
                 echo 'checked="checked"';?>/>Yes 
          <input type="radio" name="on_maintain" 
                 value="No" <?php if(isset($_POST['on_maintain'])&&$_POST['on_maintain']=="No") 
                 echo 'checked="checked"';?>/>No
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
                 if(!empty($_POST['log'])){
                   echo esc_attr($_POST['log']);
                 }?>"/>
        <?php if(!empty($errors['log'])):?>
        <span class="errors">
          <?=ucfirst(str_replace('_',' ',esc($errors['log'][0])))?>
        </span>
        <?php endif; ?>
        </p>
        
        </fieldset>
        
        <button id="button" type="submit" style="font-size:18px;width:100px;height:35px;margin-top:20px;margin-bottom: 50px;float:right;margin-right:50px;">Submit</button>
          
      </form>
      <?php else: ?>
        <div style="width: 600px; margin-left:0;">
        <p><b>Successful New Record!</b></p>
        <p><b>You've created a new hotel record as the following information:</b></p>
        <table>
          <tr style="height: 50px;">
            <th>ID</th>
            <td><?=$result['hotel_id']?></td>
            <th>Brand</th>
            <td><?=$result['hotel_brand']?></td>
            <th>Name</th>
            <td><?=$result['hotel_name']?></td>
            <th>Room</th>
            <td><?=$result['room']?></td>
          </tr>
          <tr style="height: 50px;">
            <th>Bed</th>
            <td><?=$result['bed']?></td>
            <th>Adults</th>
            <td><?=$result['adults']?></td>
            <th>Children</th>
            <td><?=$result['children']?></td>
            <th>Telephone</th>
            <td><?=$result['phone']?></td>
          </tr>
          <tr style="height: 50px;">
            <th>Street</th>
            <td><?=$result['street']?></td>
            <th>City</th>
            <td><?=$result['city']?></td>
            <th>Country</th>
            <td><?=$result['country']?></td>
            <th>Postal</th>
            <td><?=$result['postal']?></td>
          </tr>
          <tr style="height: 50px;">
            <th>Ranking</th>
            <td><?=$result['rank']?></td>
            <th>Price</th>
            <td><?=$result['price']?></td>
            <th>Description</th>
            <td><?=$result['description']?></td>
            <th>Breakfast</th>
            <td><?=$result['breakfast_included']?></td>
          </tr>
          <tr style="height: 50px;">
            <th>Smoke Permission</th>
            <td><?=$result['smoke_permit']?></td>
            <th>Image</th>
            <td><?=$result['image']?></td>
            <th>Maintainance</th>
            <td><?=$result['on_maintain']?></td>
            <th>Log</th>
            <td><?=$result['log']?></td>
          </tr>
        </table>
        
        </div>
      <?php endif; ?>
  </div>
  
</body>

</html>