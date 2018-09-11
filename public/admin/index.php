<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajax</title>
  <meta charset="utf-8" />
  <style>
    body{
      width: 960px;
      margin: 0 auto;
    }
    h1{
      background: #0bb;
      text-align: center;
      padding: 25px 0;
    }
    div{
      box-sizing: border-box;
    }
    #list{
      width: 20%;
      float: left;
      margin-left: 25px;
    }
    #detail{
      width: 70%;
      float: left;
      margin-left: 60px;
    }
    #detail img{
      float: left;
    }
    #detail ul{
      float: left;
      display: block; 
    }
    #detail ul li{
      margin-bottom: 8px; 
    }
    table{
      width: 160px;
      border-collapse: collapse;
    }
    tr td{
      border: 1px solid #666;
      margin: 0;
      padding: 0;
      height: 30px;
      padding-left: 10px;
    }
    #list table tr td{
      cursor: pointer;
    }
    #list table tr td:hover{
      background: #0aa;
      color: #fff;
    }
    b{
      color:#088;
    }
    #menu{
      background: #ccc;
      height: 370px;
      width: 170px;
      padding: 2px 20px;
    }
    #menu a{
      text-decoration: none;
      color: #000;
    }
    #menu a:hover{
      color: #099;
    }
    li{
      font-size: 18px;
      font-weight: bold;
      line-height: 25px;
    }
  </style>
  <script>
    
    //create xhr
    var xhr=new XMLHttpRequest();
    /*create onreadystatechange*/
    xhr.onreadystatechange=function(){
      if(xhr.readyState==4&&xhr.status==200){
      //output response to list div
      var data=JSON.parse(xhr.responseText);
      buildLinks(data);
      }
    }
    
    /*open and send the request, also set the requestheader*/
    window.onload=function(){
      xhr.open('GET','server/server.php');
      xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
      xhr.send();
    }
    
    /*create function to show all books lists by table*/
    function buildLinks(data){
      var html='<h2>Hotels</h2>';
      html+='<table>';
      //use for loop to output every book title
      for(var i=0;i<data.length;i++){
      var book_id=data[i].hotel_id;
      var title=data[i].brand;
      html+='<tr>';
        html+="<td data-id='"+book_id+"'>"+title+"</td>";
      html+='</tr>';
      }
      html+='</table>';
      document.getElementById('list').innerHTML=html;
      handleClicks();
    }
    
    /*create function that every book can be clicked and get the book_id*/
    function handleClicks(){
      //target the li
      var links=document.getElementsByTagName('td');
      //add handler click hander to each one
      for(var i=0;i<links.length;i++){
        links[i].onclick=function(e){
          var book_id=this.getAttribute('data-id');
          loadDetail(book_id);
        }
      }   
    }
    
    /*create function to load the book detail data*/
    function loadDetail(book_id){
      xhr.onreadystatechange=function(){
      if(xhr.readyState==4&&xhr.status==200){
      //output response to list div
      var data=JSON.parse(xhr.responseText);
      buildDetail(data);
      }
    }
      //open and send the request, also set the requestheader
      xhr.open('GET','server/server.php?book_id='+book_id);
      xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
      xhr.send();
    }
    
    /*create function to show the book detail after I click the book title(got the book_id)*/
    function buildDetail(data){
      var html='<h2>'+data.title+'</h2>';
      html+='<img src="covers/'+data.image+'"alt"'+data.name+'"/>';
      html+='<ul>';
      html+='<li><b>title: </b>'+data.title+'</li>';
      html+='<li><b>num_pages: </b>'+data.num_pages+'</li>';
      html+='<li><b>price: </b>'+data.price+'</li>';
      html+='<li><b>year_published: </b>'+data.year_published+'</li>';
      html+='<li><b>in_print: </b>'+data.in_print+'</li>';
      html+='<li><b>author: </b>'+data.author+'</li>';
      html+='<li><b>publisher: </b>'+data.publisher+'</li>';
      html+='<li><b>format: </b>'+data.format+'</li>';
      html+='<li><b>genre: </b>'+data.genre+'</li>';
      html+='</ul>';
      //show book detail in the detail div
      document.getElementById('detail').innerHTML=html;
    }
  
    
  </script>
</head>

<body>
  <h1>Administration Center for Wind Travel</h1>
  <div id="list"></div>
  <div id="detail"></div>
  <div id="menu">
    <h2><a href="#">Hotels</a></h2>
    <ul>
      <li><a href="#">new</a></li>
      <li><a href="#">edit</a></li>
    </ul>
    <h2><a href="#">Customers</a></h2>
    <ul>
      <li><a href="#">new</a></li>
      <li><a href="#">edit</a></li>
    </ul>
    <h2><a href="#">Invoices</a></h2>
    <ul>
      <li><a href="#">new</a></li>
      <li><a href="#">edit</a></li>
    </ul>
  </div>
</body>

</html>