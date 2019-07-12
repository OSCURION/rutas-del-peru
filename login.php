<?php
    include("cabecera.php");
?>
<br><br><br>
<div class="container text-center bg-light">
    <form action="comprueba-login.php" method="post">
        <h1>Login</h1>
			<div class="form-group">
				<label for="nombres" class="col-sm-2 control-label">Usuario</label>
				<div class="col-sm-8 m-auto">
					<input type="text" class="form-control" id="login" name="login" placeholder="Login">
				</div>
            </div>
            <div class="form-group">
				<label for="nombres" class="col-sm-2 control-label">Contraseña</label>
				<div class="col-sm-8 m-auto">
					<input type="password" class="form-control" id="password" name="password" placeholder="••••••••••">
				</div>
            </div>
            <div class="form-group">
				<div class="col-sm-offset-2 col-sm-12">
					<button type="submit" class="btn btn-secondary">Entrar</button>
				</div>
			</div>
	</form>
	<br><br><br>
</div>
<?php
    include("pie.php");
?>