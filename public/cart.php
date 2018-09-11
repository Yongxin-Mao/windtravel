<?php

/**
 * PHP Capstone
 * @cart.php (which you can check your choosed item and check out to)
 * @capstone, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-09-11
 */
 
require ('../config.php');
require ('../database/connect_db.inc.php');

$title = 'cart';
$slug = 'service';

include '../includes/header.inc.php'; 

//load models
require '../database/cart_model.php';
//check the session'addtocart', if it is set, it will show the flash message
if(!empty($_SESSION['addtocart'])){
	$flash_message = $_SESSION['addtocart'];
	unset($_SESSION['addtocart']);
}
//check the session'remove', if it is set, it will show another flash message
if(!empty($_SESSION['remove'])){
	$flash_message = $_SESSION['remove'];
	unset($_SESSION['remove']);
}

//this is for deleteing the items in the cart,and will set a flash message content if
//it is sucessfully deleted
if(!empty($_GET['id'])){
$hotel_id=$_GET['id'];
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cart => $value) {
        if($value['hotel_id'] == $hotel_id)
        {
            unset($_SESSION["cart"][$cart]);
            $_SESSION['remove']="You've deleted an item in your cart successfully.";
            header('Location: cart.php');
        }
    }
 }
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

  /*
  $(document).ready(function(){
    var num=document.getElementById('num').value;
    console.log(num);
    var price=document.getElementById('price').innerHTML;
    console.log(price);
  });
 
    function showPrice(num){
    var price=document.getElementById('price').innerHTML;
    var num=document.getElementById('num').value;
    var sum=num*price;
    sum=parseFloat(Math.round(sum*100)/100).toFixed(2);
    document.getElementById("result").innerHTML=sum;
  }
  
  */
</script>
 <style>
   table{
     width: 920px;
     text-align: center;
     border-collapse: collapse;
     margin-bottom: 30px;
   }
   tr, td, th{
     border: 1px solid #000;
   }
   form{
     float: right;
     margin-right: 30px;
   }
   .buttonbuy{
      width: 80px;
      height: 25px;
      background-color: #e20308;
      color: #fff;
      box-shadow: 2px 2px 2px rgba(150,150,150,0.4);
      border-radius: 3px 3px;
      font-weight: bold;
      text-align: center;
      padding-top: 8px;
      margin: auto;
      right: 20px;
    }
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
      <div class="titleservice" style="text-align: center;">Shopping Cart Service</div>
      <?php if(!empty($flash_message)) echo "<h3 style='text-align=center; color:#f00;'>Hi, $flash_message</h3>"; ?>
      <!--if we got the session cart, we will show the cart items, if not, just tell the user-->
      <?php if(empty($_SESSION['cart'])): ?>
      <?php echo 'Oops, Your cart is empty. Start your happy shopping from wind travel now ! '?>
      <?php else:?>
      <table>
      <tr>
        <th>Room</th>
        <th>Hotel</th>
        <th>Price</th>
        <th>Days</th>
        <th>Subtotal</th>
        <th>Delete</th>
      </tr>
      
      <?php foreach($_SESSION['cart'] as $value):?>
      <tr>
        <td><a href="detail.php?hotel_id=<?=$value['hotel_id']?>"><img src="images/<?=$value['image']?>"\></a></td>
        <td><?=$value['hotel_brand']?>,<?=$value['hotel_name']?></td>
        <td id="price" value="<?=$value['price']?>"><?=$value['price']?></td>
        <td><input id="num" type="number" min="1" max="99" placeholder="1" style="width: 30px;" onchange="showPrice(this.value)"/></td>
        <td id="result"><?=$value['price']?></td>
        <td><a href="cart.php?id=<?=$value['hotel_id']?>"><button class="buttonbuy" style="width:65px;height:30px;" >Delete</button></a></td>
      </tr>
      <?php endforeach;?>
      
      </table>  
      
      <form action="checkout.php">
		<input type="hidden" name="hotel_id"/>
		<button class="buttonbuy" type="submit" style="width:100px;height:35px;margin-bottom: 50px;">Checkout</button>
      </form>
      <?php endif; ?>
      </div>
      
<?php include '../includes/footer.inc.php'; ?>