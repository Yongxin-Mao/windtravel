<?php
//this is server file for search function
  if(!empty($_GET['s'])){
    define('DB_DSN', 'mysql:host=localhost;dbname=capstone');
    define('DB_USER', 'root');
    define('DB_PASS', '');

    $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $keyword=$_GET['s'];
    //query for keywords matching city or hotel brand
    $query = "SELECT
            hotel_id,
            hotel_brand,
            hotel_name,
            room,
            bed,
            adults,
            children,
            street,
            city,
            country,
            postal,
            phone,
            rank,
            price,
            description,
            breakfast_included,
            smoke_permit,
            image,
            on_maintain,
            log
            FROM
            hotel
            where deleted='0' AND hotel_brand like '%$keyword%' OR city like '%$keyword%' OR hotel_name like '%$keyword%'
            limit 5";
    $stmt=$dbh->prepare($query);
    $stmt->execute();
    $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
    };
    
    header('Content-type:application/json');
    echo json_encode($results);
   
