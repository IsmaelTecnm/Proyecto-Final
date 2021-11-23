<?php
require "conexion.php";
//Consulta a la base de datos//
$clientes="SELECT * FROM clientes";
$resclientes=$conexion-> query ($clientes);
?>



<html lang="es">
<head>
	<title>Editar registros</title>
</head>
<body>
	<header>
		<h2 align=center> 
			Editar Clientes
		</h2>
	</header>

	<form method="post">
		<table align="center">
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Telefono</th>
			</tr>

			<?php
			//Mostrar resultados de la consulta//
			while ($registroclientes = $resclientes->fetch_array(MYSQLI_BOTH))
			 {
			 	echo'<tr>
			 	<td><input name="cod['.$registroclientes['codigo'].']" value="'.$registroclientes['codigo'].'" readonly/></td>
			 	<td><input name="nom['.$registroclientes['codigo'].']" value="'.$registroclientes['nombre'].'" /></td>
			 	<td><input name="tel['.$registroclientes['codigo'].']" value="'.$registroclientes['telefono'].'" /></td>
 				</tr>';

			}
			?>
		</table>
		<div align="center">
			<input type="submit" name="actualizar" value="Actualizar los clientes"/>
		</div>
	</form>
	<?php
	if(isset($_POST['actualizar']))
	{
		foreach ($_POST['cod'] as $ids)
		{
			$editcod=mysqli_real_escape_string($conexion,$_POST['cod'][$ids]);
			$editnom=mysqli_real_escape_string($conexion,$_POST['nom'][$ids]);
			$edittel=mysqli_real_escape_string($conexion,$_POST['tel'][$ids]);
			$actualizar=$conexion->query("UPDATE clientes SET codigo='$editcod',nombre='$editnom', telefono='$edittel'
			 WHERE codigo='$ids'");
		}

	}
	?>
	<div align="center">
		<a href="index.html" target="_parent"> <button>Volver al inicio</button></a>
	</div>
</body>
</html>