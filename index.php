<?php

require_once("libs/sesion.php");

//instanciamos la sesión
$ses = Sesion::getInstance();

// comprobamos si hay sesión activa
if ($ses->checkActiveSession())
	$ses->redirect("main.php");

// comprobar si hemos recibido información
// a través del formulario ($_POST)
if (!empty($_POST)) :

	$email = $_POST["email"];
	$pass  = $_POST["pass"];

	// intentamos loguearnos
	$ok  = $ses->login($email, $pass);

	// si el login se ha hecho con éxito
	// redirigimos al main
	if ($ok) $ses->redirect("main.php?p=1");

endif;

?>



<!DOCTYPE html>
<html lang="es">

<head>
	<title>Gamers</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="css/miestilo.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

</head>

<body class="body">

	<div class="container">

		<div class="row">
			<div class="col-sd-12 mx-auto">
				<img class="logo" src="img/logo.png" alt="logo" />
			</div>
		</div>

		<!-- formulario -->
		<form method="post">

			<div class="form-group">
				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="email">Nombre de usuario:</label>
					<input class="form-control" type="text" name="email" placeholder="nombre@games.com" required />
				</div>
			</div>


			<div class="form-group">
				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="email">Password:</label>

					<input class="form-control" type="text" name="pass" placeholder="contraseña" required />
				</div>

				</br>


				<?php
				if ((isset($ok)) && (!$ok)) :
					?>
					<div class="row">
						<div class="col-md-6 mx-auto">
							<div class="alert alert-danger w-150" role="alert">
								Usuario o contraseña incorrectas.
							</div>
						</div>
					</div>
				<?php
				endif;
				?>
			</div>
			<div class="row form-group">
				<div class="col-md-12 mx-auto text-center">
					<button class="btn btn-primary w-50" type="submit">Entrar</button>
				</div>
			</div>

		</form>


		<div class="row">
			<div class="col-md-12 mx-auto text-center">
				<a href="registro.php" class="btn btn-secondary w-50">¿Sin cuenta? !Regístrate!</a>
			</div>
		</div>

	</div> <!-- container -->


	<?php include_once("libs/footer.php"); ?>



</body>

</html>