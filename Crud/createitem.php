<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT into product(productCode , omschrijving , voorraad , prijs , btwCode , image) VALUES(:productCode , :omschrijving , :voorraad , :prijs , :btwCode , :image) "); 
    
    $stmt->bindParam(":omschrijving" , $_POST["omschrijving"]);
    $stmt->bindParam(":prijs" , $_POST["prijs"]);
    $stmt->bindParam(":voorraad" , $_POST["voorraad"]);
    $stmt->bindParam(":productCode" , $_POST["productCode"]);
    $stmt->bindParam(":btwCode" , $_POST["btwCode"]);
    $stmt->bindParam(":image" , $_POST["image"]);
    $stmt->execute();

    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    
}
$conn = null;
header('Location: index.php');
?>