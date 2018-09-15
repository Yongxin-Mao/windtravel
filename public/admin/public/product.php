<?php
/**
 * PHP Capstone Admin 
 * @admin main page---product.php
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
if(!empty($_SESSION['delete'])){
	$flash_message = $_SESSION['delete'];
	unset($_SESSION['delete']);
}
if(!empty($_SESSION['update'])){
	$flash_message = $_SESSION['update'];
	unset($_SESSION['update']);
}
if(!empty($_SESSION['new'])){
	$flash_message = $_SESSION['new'];
	unset($_SESSION['new']);
}
if(!empty($_GET['s'])) {
  $hotels=search($dbh,$_GET['s']);
}else{
  $hotels=getHotels($dbh);
}
?>
<?php require '../includes/header.inc.php'?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      sendForm();
    });
    //create a funciton that when the user submit the search form, it will
    //go to another page(result page)
    function sendForm(html){
      $('#search_form').submit(function(e){
        e.preventDefault();
        var keyword=document.getElementById('key_word').value;
        //console.log(keyword);
        window.location.replace("product.php?s="+keyword);
      });
    }
    //create a function that shows the relevant results according to searching keywords
    function showList(str){
      if(str.length==0){ 
        document.getElementById("livesearch").innerHTML="";
        return;
        console.log(str);
      }
    //create XHR and get data from the server file(which get search results using json)
    var xhr=new XMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4 && xhr.status==200){
          var data=JSON.parse(xhr.responseText);
          var html='<ul>';
          for(var i=0;i<data.length;i++){
          var id=data[i].hotel_id;
          var brand=data[i].hotel_brand;
          var place=data[i].city;
          var price=data[i].price;
          html+='<li><a href="product_edt.php?hotel_id='+id+'">'+brand+' in '+place+'--$'+price+'</a></li>';
          }
          html+='</ul>';
          document.getElementById("livesearch").innerHTML=html;
          document.getElementById("livesearch").style.visibility="visible";
        }
      }
      //fire the ajax
      xhr.open("GET","../server/search.php?s="+str,true);
      xhr.send();
    }

  </script>
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
    .button{
      display: inline-block;
      border: 1px solid #666;
      background: #ccc;
      width: 55px;
      height: 19px;
      padding-top: 2px;
      border-radius: 3px 3px;
    }
    a{
      text-decoration: none;
      color: #000;
    }
    #search{
      margin-bottom: 20px;
      float: right;
      margin-right: 50px;
      position: relative;
    }
    #livesearch{
        position: absolute;
        border: 1px solid #a5acb2;
        width: 243px;
        height: 130px;
        right: 0px;
        background: #fff;
        visibility: hidden;
      }
     #button{
       height: 22px;
       width: 80px;
     }
      #livesearch ul{
        list-style: none;
        margin: 6px 10px;
        padding: 0;
      }
      #livesearch ul li a{
        text-decoration: none;
        color: #000;
        font-size: 14px;
        
      }
      #livesearch ul li{
        line-height: 20px;
      }
      #livesearch ul li a:hover{
        color: #09d;
      }
      </style>
  <div id="content"  style="margin-left: 220px;">
      <h2 id="title">Hotels List</h2>
      <div id="search_list"></div>
      <div id="search">
        <form id="search_form" method="get" >
            <input id="key_word" type="text" onkeyup="showList(this.value)"/>
            <button id="button" type="submit">Search</button>
            <div id="livesearch"></div>
        </form>
      </div>
      <?php if(!empty($flash_message)) echo "<h3 style='text-align=center; color:#f00;'>Hi, $flash_message</h3>"; ?>
      <table>
        <tr>
          <th>ID</th>
          <th>Brand</th>
          <th>Name</th>
          <th>Address</th>
          <th>Action</th>
        </tr>
        <?php foreach($hotels as $hotel):?>
        <tr>
          <td><?=$hotel['hotel_id']?></td>
          <td><?=$hotel['hotel_brand']?></td>
          <td><?=$hotel['hotel_name']?></td>
          <td><?=$hotel['street']?>,<?=$hotel['city']?>,<?=$hotel['country']?></td>
          <td><a class="button" href="product_edt.php?hotel_id=<?=$hotel['hotel_id']?>">Edit</a> | 
              <a class="button" href="product_del.php?hotel_id=<?=$hotel['hotel_id']?>">Delete</a></td>
        </tr>
        <?php endforeach;?>
      </table>
  </div>
  
</body>

</html>