<?php
require "conexion.php";
//Consulta la base de datos//
$clientes="SELECT * FROM clientes";
$resclientes=$conexion-> query ($clientes);
?>

<html lang="es">
<head>
	<title>Eliminar registros</title>
</head>
<body>
	<header>
		<h2 align=center> 
			Eliminar Clientes
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
			while($registroclientes=$resclientes->fetch_array(MYSQLI_BOTH))
			{
				echo'<tr>
				<td>'.$registroclientes['codigo'].'</td>
				<td>'.$registroclientes['nombre'].'</td>
				<td>'.$registroclientes['telefono'].'</td>
				<td> <input type="checbox" name="eliminar[]" value="'.$registroclientes['codigo'].'"/></td>
				</tr>';
			}
			?>
		</table>
		<div align="center">
			<input type="submit" name="borrar" value="Eliminar Clientes" onclick="reload()"/>
		</div>
		
		<?php
		//programación del boton eliminar//
		if (isset($_POST['borrar']))
		{
			if(empty($_POST['eliminar']))
			{
				echo '<h2 align="center"> No se ha seleccionado ningún registro</h2>';
			}
			else
			{
				foreach($_POST['eliminar'] as $cod_borrar)
				{
					$borrarclientes=$conexion->query("DELETE FROM clientes WHERE codigo='$cod_borrar'");
				}
			}
		}
		?>
		
		
		</body>
		</html>