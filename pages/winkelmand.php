<div class="">
    <h1>Uw winkelmand:</h1>
    <?php
    if(isset($_SESSION['cart'])){
        
        $sql="SELECT * FROM products WHERE product_id IN (";
        
        foreach($_SESSION['cart'] as $id => $value) {
            $sql.=$id.",";
        }
        
        $sql=substr($sql, 0, -1).")";
        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query)){
            
        ?>
            <p>
            
            <?php echo $row['product_name'] ?> x <?php echo $_SESSION['cart'][$row['product_id']]['quantity'] ?></p>
        <?php
            
        }
    ?>
        <hr />
        <a href="index.php?page=cart">Winkmand overzicht</a>
    <?php
        } else	{

            echo "<p>U heeft nog niks in uw winkelmand.</p>";
            
        }
    ?>
</div>