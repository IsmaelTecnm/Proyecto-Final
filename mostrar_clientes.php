<?php
require "conexion.php";
//Consulta a la base de datos//
$clientes="SELECT * FROM clientes";
$resclientes=$conexion->query ($clientes);
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
     			Mostrar clientes
     		</h2>
     	</header>
     	<table align="center">
     		<tr>
     			<th> codigo</th>
     			<th> nombre</th>
     			<th> telefono</th>
     		</tr>


     		<?php
     		while($registroclientes=$resclientes->fetch_array(MYSQLI_BOTH))
     		{
     			echo'<tr>
     			<td>' .$registroclientes['codigo'].'</td>
     			<td>' .$registroclientes['nombre'].'</td>
     			<td>' .$registroclientes['telefono'].'</td>
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
