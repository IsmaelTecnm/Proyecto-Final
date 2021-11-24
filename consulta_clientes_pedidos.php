<?php
require "conexion.php";
?>


<html lang="es">
<head>
	<title>
		Consulta de registros
	</title>
</head>
<body>
	<header>
		<h2 align=center>
			Mostrar clientes y pedidos
		</h2>
	</header>
	<table align=center>
		<tr>
			<th>Codigo_cliente</th>
			<th>Nombre</th>
			<th>Codigo_pedido</th>
			<th>Precio</th>
			<th>Domicilio</th>
		</tr>
		<?php
		$query = "SELECT clientes.codigo, clientes.nombre, pedidos.codigo, pedidos.precio, pedidos.domicilio
				 FROM clientes 
		 		INNER JOIN pedidos ON clientes.telefono = pedidos.codigo";
		 		$consulta = $conexion->query($query);
		 		while ($fila= $consulta->fetch_array())
		 		{
		 			echo'
		 			<tr>
		 			<td>'.$fila['codigo'].'</td>
		 			<td>'.$fila['nombre'].'</td>
		 			<td>'.$fila['codigo'].'</td>
		 			<td>'.$fila['precio'].'</td>
		 			<td>'.$fila['domicilio'].'</td>
		 			</tr>
		 			';
		 		}
		 		?>
	</table>
	<br>
	<div align="center">
	<a href="index.html" target="_parent"><button> Volver al inicio</button></a>
	 </div>
</body>
</html>