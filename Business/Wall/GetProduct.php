
<?php
	require ('../../Data/conexion.php');
	$idTypeProduct = $_GET['idTypeProduct'];
	//echo $idTypeProduct;
	//$entra=0;
	//
	echo 'Seleccione el producto: <select name="cbxProducto" id="cbxProducto">';
	
	$query = "SELECT * FROM tbproduct WHERE idTypeProduct = '$idTypeProduct'";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<form action='../../Presentation/WallView/Wall.php' method="POST">
		<option value="<?php echo $row['idProduct']; ?>"><?php echo $row['brand']; ?></option>
		
		</form>
		<?php
		}
		echo '<input type="submit" value="Ir al muro">';
	}	
	echo '</select>';

?>