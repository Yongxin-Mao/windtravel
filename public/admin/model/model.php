<?php

/**
* Get random hotels for hotel page
* @param $dbh PDO database handle
* @param $limit Int Number of hotes
* @return Array result
*/
function getHotels($dbh)
{
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
    image
	FROM
	hotel
    where deleted='0'";
	$stmt = $dbh->prepare($query);
	$stmt->execute();
	// fetch multiple books
	return $stmt->fetchAll(PDO::FETCH_ASSOC);	
}

/**
* Delete hotel with soft delete
* @param $dbh PDO database handle
* @return Array result
*/
function delHotel($dbh)
{
	$query = "UPDATE
              hotel
              SET
              deleted='1'
              where hotel_id=:hotel_id";
    $hotel_id=$_GET['hotel_id'];
	$stmt = $dbh->prepare($query);
    $stmt->bindValue(':hotel_id', $hotel_id, PDO::PARAM_INT);
	$stmt->execute();
	// fetch 
	
}
/**
* Get single hotel by id
* @param $dbh PDO database handle
* @param $book_id Int hotel id
* @return Array result
*/
function getHotel($dbh, $hotel_id)
{
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
	WHERE
	hotel_id = :hotel_id";
	$stmt = $dbh->prepare($query);
	$stmt->bindValue(':hotel_id', $hotel_id, PDO::PARAM_INT);
	$stmt->execute();
	// fetch one book
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
* Create a new record of hotel for
* @param $dbh PDO database handle
* @return Array result
*/
function createHotel($dbh)
{
  $query="INSERT INTO
            hotel
            (hotel_brand,
             hotel_name,
             room,
             bed,
             adults,
             children,
             phone,
             street,
             city,
             country,
             postal,
             rank,
             price,
             description,
             breakfast_included,
             smoke_permit,
             image,
             on_maintain,
             log,
             deleted)
            VALUES
            (:hotel_brand,
             :hotel_name,
             :room,
             :bed,
             :adults,
             :children,
             :phone,
             :street,
             :city,
             :country,
             :postal,
             :rank,
             :price,
             :description,
             :breakfast_included,
             :smoke_permit,
             :image,
             :on_maintain,
             :log,
             :deleted)";
    //prepare query
    $stmt=$dbh->prepare($query);
    //bind values
    $params=array(
             ':hotel_brand'=>$_POST['hotel_brand'],
             ':hotel_name'=>$_POST['hotel_name'],
             ':room'=>$_POST['room'],
             ':bed'=>$_POST['bed'],
             ':adults'=>$_POST['adults'],
             ':children'=>$_POST['children'],
             ':phone'=>$_POST['phone'],
             ':street'=>$_POST['street'],
             ':city'=>$_POST['city'],
             ':country'=>$_POST['country'],
             ':postal'=>$_POST['postal'],
             ':rank'=>$_POST['rank'],
             ':price'=>$_POST['price'],
             ':description'=>$_POST['description'],
             ':breakfast_included'=>$_POST['breakfast_included'],
             ':smoke_permit'=>$_POST['smoke_permit'],
             ':image'=>$_POST['image'],
             ':on_maintain'=>$_POST['on_maintain'],
             ':log'=>$_POST['log'],
             ':deleted'=>'0');
    if($stmt->execute($params)){
      //set session
      $_SESSION['insert']='true';
      //get last insert id
      $id=$dbh->lastInsertId();
      //create query to select new record
      $query="SELECT * FROM hotel where hotel_id=:hotel_id";
      //prepare query to select record you just inserted
      $stmt=$dbh->prepare($query);
      //bindValue
      $stmt->bindValue(':hotel_id', $id, PDO::PARAM_INT);
      //execute query
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }else{
      return false;
    }
}
/**
* Modify the record of hotel for
* @param $dbh PDO database handle
* @return Array result
*/
function updateHotel($dbh)
{
  $query="UPDATE
            hotel
          SET
             hotel_brand=:hotel_brand,
             hotel_name=:hotel_name,
             room=:room,
             bed=:bed,
             adults=:adults,
             children=:children,
             phone=:phone,
             street=:street,
             city=:city,
             country=:country,
             postal=:postal,
             rank=:rank,
             price=:price,
             description=:description,
             breakfast_included=:breakfast_included,
             smoke_permit=:smoke_permit,
             image=:image,
             on_maintain=:on_maintain,
             log=:log,
             deleted=:deleted,
             updated_at=NOW()
          WHERE
             hotel_id=:hotel_id";
    //prepare query
    $stmt=$dbh->prepare($query);
    //bind values
    $params=array(
             ':hotel_id'=>$_POST['hotel_id'],
             ':hotel_brand'=>$_POST['hotel_brand'],
             ':hotel_name'=>$_POST['hotel_name'],
             ':room'=>$_POST['room'],
             ':bed'=>$_POST['bed'],
             ':adults'=>$_POST['adults'],
             ':children'=>$_POST['children'],
             ':phone'=>$_POST['phone'],
             ':street'=>$_POST['street'],
             ':city'=>$_POST['city'],
             ':country'=>$_POST['country'],
             ':postal'=>$_POST['postal'],
             ':rank'=>$_POST['rank'],
             ':price'=>$_POST['price'],
             ':description'=>$_POST['description'],
             ':breakfast_included'=>$_POST['breakfast_included'],
             ':smoke_permit'=>$_POST['smoke_permit'],
             ':image'=>$_POST['image'],
             ':on_maintain'=>$_POST['on_maintain'],
             ':log'=>$_POST['log'],
             ':deleted'=>'0');
    if($stmt->execute($params)){
      //set session
      $_SESSION['update']="You've update hotel record successfully.";
      return true;
    }else{
      return false;
    }
}
/**
* Show the Aggregate data about database
* @param $dbh PDO database handle
* @return Array result
*/
function showData($dbh)
{
  $query="SELECT
          MAX(hotel.price) as max,
          MIN(hotel.price) as min,
          FORMAT(AVG(hotel.price),2) as avg,
          COUNT(DISTINCT hotel.hotel_id) as hotels,
          COUNT(DISTINCT customer.customer_id) as customers,
          COUNT(DISTINCT invoice.invoice_id) as invoices,
          MAX(invoice.total_price) as max_pay,
          MIN(invoice.total_price) as min_pay,
          FORMAT(AVG(invoice.total_price),2) as avg_pay,
          SUM(invoice.total_price) as sum
          FROM
          hotel,customer,invoice";
    //prepare query
  $stmt=$dbh->prepare($query);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
  
}

/**
* Show the newest record of inserted hotels 
* @param $dbh PDO database handle
* @return Array result
*/
function showRecord($dbh)
{
  $query="SELECT
          *
          FROM
          hotel
          WHERE
          hotel_id=(select MAX(hotel_id) from hotel)";
    //prepare query
  $stmt=$dbh->prepare($query);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
  
}
//create the function that can escape the output
function esc($string)
{
  return htmlspecialchars($string, NULL, 'UTF-8', false);
}
//create the function that can escape the output in quotes
function esc_attr($string)
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8', false);
}

/**
* Search 5 hotels which can match the keyword 
* @param $dbh PDO database handle
* @return Array result
*/
function search($dbh,$keyword)
{
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
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
