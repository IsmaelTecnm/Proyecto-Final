<?php
    //Información de la cuenta de la base de datos **NO MODIFICAR** 
	$host="localhost";
	$usuario="id16967209_proyectobduser";
	$contraseña="$]q{n(A@pi2xgVG|";
	$base="id16967209_proyectobd";
	$conexion=new mysqli($host,$usuario,$contraseña,$base);
	if($conexion -> connect_errno)
	{
	die("Fallo la conexion:(".$conexion->mysqli_connect_errno().")".$conexion->mysqli_connect_errno());
	}
?>