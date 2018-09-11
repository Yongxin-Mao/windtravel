<?php

// Book model

/**
* Get random books for home page
* @param $dbh PDO database handle
* @param $limit Int Number of books
* @return Array result
*/
function getRandom($dbh, $limit)
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
	ORDER BY RAND()
	LIMIT :limit";
	$stmt = $dbh->prepare($query);
	$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
	$stmt->execute();
	// fetch multiple books
	return $stmt->fetchAll(PDO::FETCH_ASSOC);	
}

/**
* Get single book by id
* @param $dbh PDO database handle
* @param $book_id Int Book id
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


function getHotelByBrand($dbh, $hotel_brand)
{
	$query = "SELECT
    hotel_id,
	hotel_brand,
    hotel_name,
    rank,
    price,
    city,
    description,
    image
	FROM
	hotel
	WHERE
	hotel_brand = :hotel_brand
    limit 4";

	$stmt = $dbh->prepare($query);

	$param=array(':hotel_brand'=>$hotel_brand);

	$stmt->execute($param);

	// fetch multiple books
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	
}

function getHotelByCity($dbh, $city)
{
	$query = "SELECT
    hotel_id,
	hotel_brand,
    hotel_name,
    rank,
    price,
    city,
    description,
    image
	FROM
	hotel
	WHERE
	city = :city
    limit 4";

	$stmt = $dbh->prepare($query);

	$param=array(':city'=>$city);

	$stmt->execute($param);

	// fetch multiple books
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	
}

function getHotelsByBrand($dbh, $hotel_brand)
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
    WHERE hotel_brand=:hotel_brand
	ORDER BY RAND()
	LIMIT 8";

	$stmt = $dbh->prepare($query);

	$param=array(':hotel_brand'=>$hotel_brand);

	$stmt->execute($param);

	// fetch multiple books
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	
}
function getHotelsByCity($dbh, $city)
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
    WHERE city=:city
	ORDER BY RAND()
	LIMIT 8";

	$stmt = $dbh->prepare($query);

	$param=array(':city'=>$city);

	$stmt->execute($param);

	// fetch multiple books
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	
}

function getHotelsByRank($dbh, $rank)
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
    WHERE rank=:rank
	ORDER BY RAND()
	LIMIT 8";

	$stmt = $dbh->prepare($query);

	$param=array(':rank'=>$rank);

	$stmt->execute($param);

	// fetch multiple books
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	
}
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
            where hotel_brand like '%$keyword%' OR city like '%$keyword%'
            limit 8";
    $stmt=$dbh->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
/**
* Get books by publisher
* @param $dbh PDO database handle
* @param $publisher_id Int Publiser ID
* @param $limit Int Number of books
* @return Array result
*/
function getCustomer($dbh, $customer_id)
{
	$query = "SELECT
    customer_id,
	first_name,
    last_name,
    street,
    city,
    postal_code,
    province,
    country,
    phone,
    email
	FROM
	customer
	WHERE
	customer_id = :customer_id";
	$stmt = $dbh->prepare($query);
	$stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
	$stmt->execute();
	// fetch one book
	return $stmt->fetch(PDO::FETCH_ASSOC);
}
