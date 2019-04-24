<?php
	$conn = mysqli_connect("localhost","test","test12345","marcel");
	if(!$conn)
	{
		echo "Database connection faild.";
	}
?>