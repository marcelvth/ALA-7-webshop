<?php
$id = 0;

if(isset($_GET["id"])) {
    $id = $_GET["id"];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DELETE FROM product WHERE id = :id"); 
    $stmt->bindParam(":id" , $id);
    $stmt->execute();

    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
header('Location: index.php');
?>