<?php
require "conexion.php";
//consulta a la base de datos//
$clientes="SELECT * FROM clientes order by codigo";
$resclientes=$conexion->query($clientes);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>
		Insertar registros
	</title>
	<meta charset="utf-8"/>
</head>
<body>
<header>
	<h2 align="cente">
		Insertar clientes
	</h2> 
	<table align="center">
		<tr>
			<th>Clientes</th>
			<th>Nombre</th>
			<th>Telefono</th>
		</tr>
		<?php
		//mostrar resultados de la consulta//
		while($registroclientes=$resclientes->fetch_array(MYSQLI_BOTH))
		{
			echo'<tr>
			<td>'.$registroclientes['codigo'].'</td>
			<td>'.$registroclientes['nombre'].'</td>
			<td>'.$registroclientes['telefono'].'</td>
			</tr>';
		}
		?>
	</table>
	<!--formulario para insersion-->
<form method="post">
	<h3 align="center"> Agregar nuevo cliente</h3>
	<table align="cen">
		<td><input required name="codigo" placeholder="Codigo"/></td>
		<td><input required name="nombre" placeholder="Nombre"/></td>
		<td><input required name="telefono" placeholder="Telefono"/></td>
	</tr>
	</table>
	<div align="center">
		<input type="submit" name="insertar" value="Insertar cliente">
	</div>
</form>
<!-- boton insertar-->
<?php
///Presionar el boton///
if(isset($_POST['insertar']))
{
	$cod=$_POST['codigo'];
	$nom=$_POST['nombre'];
	$tel=$_POST['telefono'];
	mysqli_query($conexion,"insert into clientes(codigo, nombre, telefono)
	values('$cod','$nom', '$tel')")or die (mysqli_error($conexion));
	
}
?> 
<div  align="center">
	<a href="index.html" target="_parent"> <button>	Volver al inicio</button></a>
	</div>
</body>
</html>