<?php
	require("includes/connection.php");

	if(isset($_GET['page'])){

		$pages=array("foto","video","cart","home","uitloggen","inloggen","account");

		if(in_array($_GET['page'], $pages)) {

			$_page=$_GET['page'];

		}else{

			$_page="home";

		}

	}else{

		$_page="home";

	}

?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css?ts<?=time()?>">

    <link rel="stylesheet" href="css/header-footer.css?ts<?=time()?>">

    <title>Otto Graaf</title>

</head>

<body>
