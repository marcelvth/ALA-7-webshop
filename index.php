<?php
	session_start();
	require("includes/connection.php");
	$id = $_SESSION['id'];
	if (isset($id)) {
		$_head = 'header1';
	} else {
		$_head = 'header';
	}

	require($_head.".php");

	if(isset($_GET['page'])){
		$pages=array("products", "cart","home","menu","uitloggen","inloggen","register", "Account");
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