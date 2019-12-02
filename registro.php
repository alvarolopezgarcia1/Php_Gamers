<?php
require_once("libs/database.php");

	if (!empty($_POST)):
	
        //recogemos los datos que el nuevo usuario pasa por el formulario.
		$email = $_POST["email"] ;
		$nombre = $_POST["nombre"] ;
		$apellidos = $_POST["apellidos"] ;
		$pass = $_POST["pass"] ;
		$conf = $_POST["conf"] ;
		$fec = !empty($_POST["fnac"])?$_POST["fnac"]:null ;

		//Se comprueba si la contraseña y la confirmación son iguales.
		if ($pass==$conf):

			// conectamos con la base de datos, devuelve error en caso de fallar la conexión.
			$db= database::getInstance();
		
            // Sentencia sql para insertar el nuevo usuario.
			$sql = "INSERT INTO usuarios (email,pass,nombre,apellidos,fec_nacimiento) " ;
			$sql.= "VALUES (?, md5(?), ?, ?, ?) ;" ;
			
			$db->runQuery($sql, [$email, $pass, $nombre, $apellidos, $fec]);
			// cerramos la conexión
			$pdo = null ;

		else:
			$error = "Las contraseñas no coinciden" ;
		endif ;

	endif ;


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>· Games ·</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="css/miestilo.css"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body class = "body">

	<div class="container">

		<!-- logotipo -->
		<div class="row">
			<div class="col-sd-12 mx-auto">
				<img class="logo" src="img/logo.png" alt="Games" />
			</div>
		</div>

		<!-- nota -->
		<div class="row">
			<div class="col-sd-12 mx-auto mb-5">
				<h4>Regístrate y disfruta de todas las ventajas</h4>
			</div>
		</div>

		
		<?php
			if (isset($error)):
				echo "<div class=\"alert alert-danger w-50 mx-auto\">" ;
				echo $error ;
				echo "</div>" ;
			endif ;
		?>

		<!-- formulario de registro -->
		<form method="post">
			
			<!-- nombre de usuario -->
			<div class="form-group">
				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="email">Nombre de usuario:</label>
					<input class="form-control" type="email" name="email" 
						   placeholder="email@gamers.com" required />
				</div>
			</div>

			<!-- nombre -->
			<div class="form-group">
				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="nombre">Nombre:</label>
					<input class="form-control" type="text" name="nombre" required />
				</div>
			</div>

			<!-- apellidos -->
			<div class="form-group">
				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="apellidos">Apellidos:</label>
					<input class="form-control" type="text" name="apellidos" required />
				</div>
			</div>

			<!-- contraseña -->
			<div class="form-group">
				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="pass">Contraseña:</label>
					<input class="form-control" type="password" name="pass" 
						   required />
				</div>
			</div>

			<!-- confirmación contraseña -->
			<div class="form-group">
				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="conf">Confirmación contraseña:</label>
					<input class="form-control" type="password" name="conf" 
						   required />
				</div>
			</div>

			<!-- fecha de nacimiento -->
			<div class="form-group">
				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="fnac">Fecha de Nacimiento:</label>
					<input class="form-control" type="date" name="fnac" />
				</div>
			</div>

			<!-- registro -->
			<div class="form-group">
				<div class="col-md-6 mx-auto">
					<button class="btn btn-success w-100" type="submit">Registrar</button>
				</div>
			</div>
		</form>

		<!-- volver atrás -->
		<div class="row">
			<div class="col-md-6 mx-auto text-center">
				<a href="index.php" class="btn btn-link">Retrocede</a>
			</div>
		</div>

	</div> <!-- container -->

	<br/>

	<?=include_once("libs/footer.php");?>

</body>
</html>