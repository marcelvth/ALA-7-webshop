<?php
	if(isset($_POST['submit'])){
		
		foreach($_POST['quantity'] as $key => $val) {
			if($val==0) {
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		
	}
?>

<div class='wrapper'><h1>Bestellingsoverzicht</h1>
<a href="index.php?page=products">Shop verder</a>
<form method="post" action="index.php?page=cart">
    
	<table>
		<tr>
		    <th>Item</th>
		    <th>Hoeveelheid </th>
		    <th>Prijs per stuk </th>
		    <th>Totaal prijs item</th>
		</tr>
		
		<?php
		
			$sql="SELECT * FROM products WHERE product_id IN (";
					
					foreach($_SESSION['cart'] as $id => $value) {
						$sql.=$id.",";
					}

					$sql=substr($sql, 0, -1).")";
					$query=mysqli_query($conn, $sql);
					$totalprice=0;
					$totalPizzas = 0;
					$firstPizza = 0;

					while($row=mysqli_fetch_array($query)){
						$subtotal=$_SESSION['cart'][$row['product_id']]['quantity']*$row['product_price'];

						$totalprice+=$subtotal;

						$totalPizzas += $_SESSION['cart'][$row['product_id']]['quantity'];

						if($firstPizza == 0)
						{
							// dit is de eerste pizza
							$firstPizza = $row['product_price'];
						}
					?>
						<tr>
						    <td><?php echo $row['product_name'] ?></td>
						    <td><input type="text" name="quantity[<?php echo $row['product_id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['product_id']]['quantity'] ?>" /></td>
						    <td> €<?php echo $row['product_price'] ?></td>
						    <td> €<?php echo $_SESSION['cart'][$row['product_id']]['quantity']*$row['product_price'] ?></td>
						</tr>
					<?php
						
					}
		?>
					<tr>
					    <td>Totaal bedrag:  €<?php echo $totalprice ?></td>
					</tr>
		
	</table>
	<br />
	<button type="submit" name="submit">Update uw winkelmand</button>
	
</form>
<br />
<p>Om een item te verwijderen zet u de hoeveelheid op 0</p></div>