<!doctype html>

<html lang="en">
<!--
/////////////////////////////////////////////////////////
//                                                     //
//                                                     //
//            (^_^)       (∩_∩)       (¯▽¯)            //
//            Lovely       可 爱      かわいい           //
//                 Capstone HTML/CSS                   //
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
  </style>
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