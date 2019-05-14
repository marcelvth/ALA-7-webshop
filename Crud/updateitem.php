<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("UPDATE product SET omschrijving = :omschrijving , prijs = :prijs , voorraad =:voorraad  WHERE id = :id"); 
    $stmt->bindParam(":id" , $_POST["id"]);
    $stmt->bindParam(":omschrijving" , $_POST["omschrijving"]);
    $stmt->bindParam(":prijs" , $_POST["prijs"]);
    $stmt->bindParam(":voorraad" , $_POST["voorraad"]);
    $stmt->execute();

    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    
}
$conn = null;
header('Location: index.php');
?>