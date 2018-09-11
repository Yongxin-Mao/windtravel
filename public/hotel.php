<?php 
/**
 * PHP Capstone
 * @hotel page
 * @Assignment 1, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-08-02
 */

 
include ('../config.php');

$title = 'hotel';
$slug = 'hotel';

include '../includes/header.inc.php'; 
require '../database/connect_db.inc.php';
require '../database/hotel_model.php';
//identify different siuation, then show the correct contents
if(!empty($_GET['hotel_brand'])){
  $hotels=getHotelsByBrand($dbh,$_GET['hotel_brand']);
}elseif(!empty($_GET['city'])){
  $hotels=getHotelsByCity($dbh,$_GET['city']);
}elseif(!empty($_GET['rank'])){
  $hotels=getHotelsByRank($dbh,$_GET['rank']);
}elseif(!empty($_GET['s'])) {
  $hotels=search($dbh,$_GET['s']);
}else{
  $hotels=getRandom($dbh,8);
}
?>
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
          window.location.replace("hotel.php?s="+keyword);
        });
      }
      //create a function that shows the relevant results according to searching keywords
      function showList(str){
        if(str.length==0){ 
          document.getElementById("livesearch").innerHTML="";
          return;
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
            html+='<li><a href="detail.php?hotel_id='+id+'">'+brand+' in '+place+'-$'+price+'</a></li>';
            }
            html+='</ul>';
            document.getElementById("livesearch").innerHTML=html;
            document.getElementById("livesearch").style.visibility="visible";
          }
        }
        //fire the ajax
        xhr.open("GET","scripts/search.php?s="+str,true);
        xhr.send();
      }
      
      
</script>
<style>
  .button{
      width: 80px;
      height: 32px;
      background-color: #e20308;
      color: #fff;
      box-shadow: 2px 2px 2px rgba(150,150,150,0.4);
      border-radius: 3px 3px;
      font-weight: bold;
      text-align: center;
      margin: auto;
      right: 20px;
      font-size: 16px;
    }
    #key_word{
      height: 23px;
      width: 180px;
    }
    #search{
      text-align: right;
      margin-right: 20px;
      margin-top: 20px;
    }
    #category{
      margin-top: 30px;
      font-size: 14px;
      padding: 0;
      border-spacing: 0;
    }
    #category tr{
      border: 1px solid #000;
      padding: 0;
      height: 10px !important;
    }
    #category table tr th{
      width: 182px;
    }
    #category table tr td{
      text-align: left;
      height: 1px;
    }
    #category ul li{
      display: inline;
      margin-left: 50px;
      margin-top: 0;
    }
    #search{
      position: relative;
    }
    #category ul li a:hover{
      font-weight: bold;
      color: #e20308;
    }
    #livesearch{
        position: absolute;
        border: 1px solid #a5acb2;
        width: 267px;
        height: 120px;
        right: 0;
        background: #fff;
        visibility: hidden;
      }
     
      #livesearch ul{
        list-style: none;
        margin: 6px 10px;
        padding: 0;
      }
      #livesearch ul li a{
        text-decoration: none;
        color: #000;
      }
      #livesearch ul li a:hover{
        color: #09d;
      }
      #search_list{
        position: absolute;
        border: 1px solid #a5acb2;
        width: 1000px;
        height: 1100px;
        visibility: hidden;
      }
</style>
  <body>
    <!-- Start "wrapper" div. This will contain the entire web page.-->
    <div id="wrapper">
      <!-- header begins-->
      <header>
      <img src="images/hotel.jpg" alt="hotel" />
      
      <!--<div id="searchbar"></div>-->
      
      </header>
      
<?php include '../includes/nav.inc.php'; ?>
      
      <!-- content begins-->
      <div id="search_list"></div>
      <div id="search">
        <form id="search_form" method="get" >
            <input id="key_word" type="text" onkeyup="showList(this.value)"/>
            <button class="button" type="submit">Search</button>
            <div id="livesearch"></div>
        </form>
      </div>
      <div id="category">
        <table>
          <tr>
            <th>Brand</th>
            <td>
              <ul>
                <li><a href="hotel.php">All</a></li>
                <li><a href="hotel.php?hotel_brand=Holiday_Inn">Holiday Inn</a></li>
                <li><a href="hotel.php?hotel_brand=Crowne_Plaza">Crowne Plaza</a></li>
                <li><a href="hotel.php?hotel_brand=Hilton_Hotel">Hilton</a></li>
                <li><a href="hotel.php?hotel_brand=Victoria_Inn">Victoria Inn</a></li>
              </ul>
            </td>
          </tr>
          <tr>
            <th>City</th>
            <td>
              <ul>
                <li><a href="hotel.php">All</a></li>
                <li><a href="hotel.php?city=Winnipeg">Winnipeg</a></li>
                <li><a href="hotel.php?city=Toronto">Toronto</a></li>
                <li><a href="hotel.php?city=Quebec">Quebec</a></li>
                <li><a href="hotel.php?city=Edmonton">Edmonton</a></li>
                <li><a href="hotel.php?city=Vancouver">Vancouver</a></li>
              </ul>
            </td>
          </tr>
          <tr>
            <th>Ranking</th>
            <td>
              <ul>
                <li><a href="hotel.php">All</a></li>
                <li><a href="hotel.php?rank=1">1</a></li>
                <li><a href="hotel.php?rank=2">2</a></li>
                <li><a href="hotel.php?rank=3">3</a></li>
                <li><a href="hotel.php?rank=4">4</a></li>
                <li><a href="hotel.php?rank=5">5</a></li>
              </ul>
            </td>
          </tr>
        </table>
      </div>
      <div id="contenthotel">
        <table>
          <tr>
            <th>Image</th>
            <th>Hotel</th>
            <th>Bed</th>
            <th>Address</th>
            <th>Ranking</th>
            <th>Price</th>
            <th>Detail</th>
          </tr>
          <!--show the all the detail of hotel using php -->
          <?php foreach($hotels as $value):?>
          <tr>
            <td><a href="detail.php?hotel_id=<?php echo $value['hotel_id'];?>"><img src="images/<?=$value['image']?>" alt="hotel"/></a></td>
            <td><a href="detail.php?hotel_id=<?php echo $value['hotel_id'];?>"><?php echo $value['hotel_brand'];?></a></td>
            <td><?php echo $value['bed'];?></td>
            <td><?php echo $value['street'].' , '.$value['city'];?></td>
            <td><?php echo $value['rank'];?></td>
            <td><?php echo $value['price'];?></td>
            <td><a href="detail.php?hotel_id=<?php echo $value['hotel_id'];?>"><div class="buttonbuy">More</div></a></td>
          </tr>
          <?php endforeach;?>
          
        </table>
      </div>
      
<?php include '../includes/footer.inc.php'; ?>