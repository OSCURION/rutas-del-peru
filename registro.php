<?php
	include("config.php");
	$op = isset($_GET['op'])?$_GET['op']:'';
	$id = $_GET['id'];

	if($op=="eliminar"){
		$sql = "DELETE FROM registro WHERE id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
	}else if($id!='0'){
		$nombres = $_GET['nombres'];
		$apellidos = $_GET['apellidos'];
		$dni = $_GET['dni'];
		$login = $_GET['login'];
		$password = $_GET['password'];
		$sql = "UPDATE registro SET nombres='{$nombres}', apellidos='{$apellidos}', dni = '{$dni}', login='{$login}', password='{$password}' WHERE id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");	
	}else{
		$nombres = $_GET['nombres'];
		$apellidos = $_GET['apellidos'];
		$dni = $_GET['dni'];
		$login = $_GET['login'];
		$password = $_GET['password'];
		$sql = "INSERT INTO registro(nombres, apellidos, dni, login, password) VALUES('{$nombres}','{$apellidos}','{$dni}', '{$login}','{$password}')";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");	
	}
	
	header("location: registro-usuario.php")
?>