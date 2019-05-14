

<div id="aanmaak">
<a href="create.php"> Nieuw item aanmaken!</a>
</div>


<?php

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>productCode</th><th>omschrijving</th><th>voorraad</th><th>prijs</th><th>btwCode</th><th>image</th><th>Action</th></tr>";
$id = 0;
class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 
   
    function endChildren() { 
        echo '</tr>' . "\n";
    } 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, productCode, omschrijving, voorraad, prijs, btwCode, image FROM product"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
        if ($k == 'id') {
          $id = strip_tags($v);
        }
        if ($k == 'image'){
            echo '<td><a href="edit.php?id='.$id.'"><img src="images/edit.png" alt="Edit" width="25"></a> <a href="delete.php?id='.$id.'"><img src="images/trash.png" alt="Delete" width="25"></a></td>';
        }
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>