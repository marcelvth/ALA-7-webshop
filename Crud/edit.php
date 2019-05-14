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
    $stmt = $conn->prepare("SELECT id, productCode, omschrijving, voorraad, prijs, btwCode, image FROM product WHERE id = :id"); 
    $stmt->bindParam(":id" , $id);
    $stmt->execute();
    

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $row = $stmt->fetch();
    ?>

<body>
<form method = "post" action = "updateitem.php">
<input name="voorraad" value="<?= $row["voorraad"]?> " >
<input name="prijs" value="<?= $row["prijs"]?> ">
<textarea name="omschrijving"><?= $row["omschrijving"]?></textarea>
<input name="id" type="hidden" value="<?= $row["id"]?>">
<input type="submit">
</form>
</body>
    
<?php    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

?>