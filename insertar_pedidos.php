<?php
require "conexion.php";
//consulta a la base de datos//
$pedidos="SELECT * FROM pedidos order by codigo";
$respedidos=$conexion->query($pedidos);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>
		Insertar pedidos
	</title>
	<meta charset="utf-8"/>
</head>
<body>
<header>
	<h2 align="center">
		Insertar pedidos
	</h2> 
	<table align="center">
		<tr>
			<th>Codigo</th>
			<th>Precio</th>
			<th>Domicilio</th>
		</tr>
		<?php
		//mostrar resultados de la consulta//
		while($registropedidos=$respedidos->fetch_array(MYSQLI_BOTH))
		{
			echo'<tr>
			<td>'.$registropedidos['codigo'].'</td>
			<td>'.$registropedidos['precio'].'</td>
			<td>'.$registropedidos['domicilio'].'</td>
			</tr>';
		}
		?>
	</table>
	<!--formulario para insersion-->
<form method="post">
	<h3 align="center"> Agregar nuevo cliente</h3>
	<table align="cen">
		<td><input required name="codigo" placeholder="Codigo"/></td>
		<td><input required name="precio" placeholder="Precio"/></td>
		<td><input required name="domicilio" placeholder="Domicilio"/></td>
	</tr>
	</table>
	<div align="center">
		<input type="submit" name="insertar" value="Insertar pedidos">
	</div>
</form>
<!-- boton insertar-->
<?php
///Presionar el boton///
if(isset($_POST['insertar']))
{
	$cod=$_POST['codigo'];
	$prec=$_POST['precio'];
	$dom=$_POST['domicilio'];
	mysqli_query($conexion,"insert into pedidos(codigo, precio, domicilio)
	values('$cod','$prec', '$dom')")or die (mysqli_error($conexion));
	
}
?> 
<div  align="center">
	<a href="index.html" target="_parent"> <button>	Volver al inicio</button></a>
	</div>
</body>
</html>