<!doctype html>

<html lang="en">
<!--
/////////////////////////////////////////////////////////
//                                                     //
//                                                     //
//            (^_^)       (∩_∩)       (¯▽¯)            //
//            Lovely       可 爱      かわいい           //
//               Capstone HTML/CSS/PHP                 //
//                     Yongxin Mao                     //
//                                                     //
//                                                     //
//                                                     //
/////////////////////////////////////////////////////////
-->
  <head>
    <title><?=$title?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="images/favicon.ico" />
    <!-- Desktop Stylesheet -->
    <link rel="stylesheet" 
          type="text/css" 
          href="css/desktop.css"
          media="screen and (min-width: 768px)"
    />
    <!-- Mobile Stylesheet -->
    <link rel="stylesheet"
          type="text/css"
          href="css/mobile.css"
          media="screen and (max-width: 767px)"
    />
    <!-- Print Stylesheet -->
    <link rel="stylesheet"
          type="text/css"
          href="css/print.css"
          media="print"
    />
    
    <!-- Here is for IE users -->
    <!--[if LTE IE 9]>
      <p>Sorry, your browser is outdated. Strongly advice you to use the newest version.</p>
    <![endif]-->
    
    
    
  <style>
    #navlist li a.current{
      color: #fff;
      background: #e20308;
    }
    .errors{
      color: #e20308;
      font-size: 14px;
      }
    .errors2{
      color: #666;
      font-size: 12px;
      margin-left: 255px;
      }
    nav{
      height: 82px;
    }
    #logo{
      top: 32px;
    }
    nav ul{
      margin-top: 32px;
      margin-left: 25px;
    }
    #utility{
      position: absolute;
      top: 0;
      height: 30px;
      width: 925px;
      background: #ddd;
      text-align: right;
      padding-right: 35px;
      padding-top: 2px;
    }
    #utility img{
       vertical-align: middle;
       top: 0;
    }
    nav ul li ul#flight_submenu{
      top: 18px;
      left: -25px;
    }
    nav ul li ul#hotel_submenu{
      top: 18px;
      left: -25px;
    }
    #searchbar{
      width: 550px;
      height: 150px;
      border: 1px solid #000;
      position: absolute;
      vertical-align: middle;
      left: 22%;
      border-radius: 10px 10px;
      background: #666;
      opacity: 0.6;
    }
  </style>
  <!--PHP conditional for different page using different css file-->
  <?php if($slug=='home') : ?>

    <link rel="stylesheet" type="text/css" href="css/index.css" />

  <?php endif; ?>
  <?php if($slug=='about') : ?>

    <link rel="stylesheet" type="text/css" href="css/about.css" />

  <?php endif; ?>
    <?php if($slug=='flight') : ?>

    <link rel="stylesheet" type="text/css" href="css/flight.css" />

  <?php endif; ?>
    <?php if($slug=='hotel') : ?>

    <link rel="stylesheet" type="text/css" href="css/hotel.css" />

  <?php endif; ?>
  <?php if($slug=='rest') : ?>

    <link rel="stylesheet" type="text/css" href="css/rest.css" />

  <?php endif; ?>
  <?php if($slug=='service') : ?>

    <link rel="stylesheet" type="text/css" href="css/service.css" />

  <?php endif; ?>
  
  <!--[if lte IE 8]>

    <script> 
        document.createElement('header');
        document.createElement('nav');
        document.createElement('footer');
        document.createElement('article');
        document.createElement('section');
        document.createElement('main');
    </script>

    <style type="text/css">
        header,
        footer,
        main,
        nav
        {
          display: block;
        }
    </style>

   <![endif]-->
  </head> 