<?php
require "conexion.php";
//Consulta la base de datos//
$pedidos="SELECT * FROM pedidos";
$respedidos=$conexion-> query ($pedidos);
?>

<html lang="es">
<head>
	<title>Eliminar registros</title>
</head>
<body>
	<header>
		<h2 align=center> 
			Eliminar pedidos
		</h2>
	</header>

	<form method="post">
		<table align="center">
			<tr>
				<th>Codigo</th>
				<th>Precio</th>
				<th>Domicilio</th>
			</tr>
			<?php
			//Mostrar resultados de la consulta//
			while($registropedidos=$respedidos->fetch_array(MYSQLI_BOTH))
			{
				echo'<tr>
				<td>'.$registropedidos['codigo'].'</td>
				<td>'.$registropedidos['precio'].'</td>
				<td>'.$registropedidos['domicilio'].'</td>
				<td> <input type="checbox" name="eliminar[]" value="'.$registropedidos['codigo'].'"/></td>
				</tr>';
			}
			?>
		</table>
		<div align="center">
			<input type="submit" name="borrar" value="Eliminar pedidos" onclick="reload()"/>
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
					$borrarpedidos=$conexion->query("DELETE FROM pedidos WHERE codigo='$cod_borrar'");
				}
			}
		}
		?>
		
		
		</body>
		</html>