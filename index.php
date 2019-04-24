<?php
	session_start();
	require("includes/connection.php");
	$id = $_SESSION['id'];
	if (isset($id)) {
		$_head = 'pages/userHeader';
	} else {
		$_head = 'pages/header';
	}

	require($_head.".php");

	if(isset($_GET['page'])){
		$pages=array("foto","video","cart","home","uitloggen","inloggen","account");
		if(in_array($_GET['page'], $pages)) {
			$_page=$_GET['page'];
		}else{
			$_page="home";
		}
	}
	if ($_page == "foto" || $_page == "video" ) {
		include_once "mand.php";
	}
?>	

<div class="content">
	<div class="wrapper">
		<?php require($_page.".php"); ?>
	</div>
</div>
<?php include 'pages/footer.php';?>