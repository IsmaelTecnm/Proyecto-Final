<?php
require "conexion.php";
//Consulta a la base de datos//
$pedidos="SELECT * FROM pedidos";
$respedidos=$conexion->query ($pedidos);
?>

<html lang="es">
<head>
	<title>
		Mostrar registros
	</title>
</head>
     </head>
     <body>
     	<header>
     		<h2 align="center">
     			Mostrar pedidos
     		</h2>
     	</header>
     	<table align="center">
     		<tr>
     			<th> codigo</th>
     			<th> precio</th>
     			<th> domicilio</th>
     		</tr>


     		<?php
     		while($registropedidos=$respedidos->fetch_array(MYSQLI_BOTH))
     		{
     			echo'<tr>
     			<td>' .$registropedidos['codigo'].'</td>
     			<td>' .$registropedidos['precio'].'</td>
     			<td>' .$registropedidos['domicilio'].'</td>
     			</tr>';
     		}
     		?>
     	</table>
     	<br> 
     	<div align="center">
     		<a href="index.html" target="_parent"> <button>Volver a inicio</button></a>
     	</div>
     </body>
     </html>
