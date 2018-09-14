<?php
/**
 * PHP Capstone 
 * @server.php for searching function which outputs the results matching keywords
 * @capstone, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-09-14
 */
require '../../database/connect_db.inc.php';
//this is server file for search function
  if(!empty($_GET['s'])){
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
            where hotel_brand like '%$keyword%' OR city like '%$keyword%'
            limit 5";
    $stmt=$dbh->prepare($query);
    $stmt->execute();
    $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
    };
    
    header('Content-type:application/json');
    echo json_encode($results);
   
