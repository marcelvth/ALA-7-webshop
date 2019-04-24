<?php

require_once('connection.php');

$email = $password = $pwd = '';

$email = $_POST['email'];

$pwd = $_POST['password'];

$password = MD5($pwd);

$sql = "SELECT  FROM  WHERE Mail='$email' AND Wachtwoord='$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)

{

	while($row = mysqli_fetch_assoc($result))

	{

		$id = $row[""];

		$email = $row["Mail"];

		$naam = $row["Naam"];

		session_start();

		$_SESSION['id'] = $id;

		$_SESSION['email'] = $email;

		$_SESSION['naam'] = $naam;
	}
	header("Location: index.php");
}
else
{
    header("Location: index.php");
    echo 'fout wachtwoord of gebruikersnaam';
}

?>