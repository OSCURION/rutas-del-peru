<?php
    include("config.php");
    include("cabecera.php");

?>
<div class="container  bg-light">
	<br>
<?php

	$sql = "SELECT * FROM registro";
	if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
	echo "<table class='table table-hover table-bordered'>";
	echo "<tr class='info'>";
	echo "<th>ID</th>";
	echo "<th>Nombre</th>";
	echo "<th>Apellidos</th>";
	echo "<th>DNI</th>";
	echo "<th>Login</th>";
	echo "<th>Opciones</th>";
	echo "</tr>";
	while ($reg = $resultado->fetch_assoc()) {
		echo "<tr>";
	    echo "<td>".$reg['id']."</td>";
	    echo "<td>".$reg['nombres']."</td>";
		echo "<td>".$reg['apellidos']."</td>";
		echo "<td>".$reg['dni']."</td>";
	    echo "<td>".$reg['login']."</td>";
	    echo "<td class='text-right'>

	    	<a href='registro.php?op=eliminar&id=".$reg['id']."' class='btn btn-danger' width='100'>Eliminar<span class='glyphicon glyphicon-remove'></span></a>
	    	<a href='registro-usuario.php?id=".$reg['id']."' class='btn btn-success' width='100px'>Editar<span class='glyphicon glyphicon-pencil'></span></a>
	    </td>";
	    echo "</tr>";
	}
	
?>
</div>
<?php
    include("pie.php");
?>