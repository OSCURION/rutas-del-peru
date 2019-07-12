<?php
	include("config.php");
	include("cabecera.php");

	$id = isset($_GET['id'])?$_GET['id']:'0';

	$nombres = "";
	$apellidos = "";
	$login = "";
	$password = "";
	if(!empty($id)){
		$sql = "SELECT * FROM registro WHERE id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
		$reg = $resultado->fetch_assoc();
		$nombres = $reg['nombres'];
		$apellidos = $reg['apellidos'];
		$login = $reg['login'];
		$password = $reg['password'];
	}
?>
<div class="container bg-light">
	<div class="row">
		<br><br><br><br>
		<div class="col-12 col-sm-12 col-md-7">
			<br><br><br><br>
			<h1>REGISTRO</h1>
			<form class="form-horizontal" action="registro.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
				<label for="nombres" class="col-sm-2 control-label">Nombres</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombres; ?>" placeholder="Nombres">
				</div>
			</div>
			<div class="form-group">
				<label for="apellidos" class="col-sm-2 control-label">Apellidos</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>" placeholder="apellidos">
				</div>
			</div>
			<div class="form-group">
				<label for="dni" class="col-sm-2 control-label">DNI</label>
				<div class="col-sm-12">
					<input type="number" class="form-control" id="dni" name="dni" value="<?php echo $dni; ?>" placeholder="77777777">
				</div>
			</div>
			<div class="form-group">
				<label for="login" class="col-sm-2 control-label">Login</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="login" name="login" value="<?php echo $login; ?>" placeholder="Login">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-12">
					<input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" placeholder="Password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-12">
					<button type="submit" class="btn btn-primary">Guardar</button>
            		<a href="registro-usuario.php" class="btn btn-danger">Cancelar</a>
				</div>
			</div>
			</form>
		</div>
		<div class="d-none d-md-block col-md-5">
			<br><br><br><br><br><br>
			<img class="img-fluid" src="img/img-regiones/cusco-machu-picchu.jpg">
		</div>
	</div>
</div>
<?php

include("pie.php");

?>