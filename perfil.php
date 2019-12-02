<?php

require_once("libs/database.php");
require_once("libs/sesion.php");

// obtenemos la instancia de la sesión
$ses = Sesion::getInstance() ;

// comprobar si hay una sesión activa
if (!$ses->checkActiveSession())
	 $ses->redirect("index.php") ;

// hay sesión activa
// obtenemos el usuario
$usr = $ses->getUsuario() ;

if (isset($_POST["borrar"])) {
    $pdo = database::getInstance();
    $idUsu = $_POST["borrar"];
    $query = "DELETE FROM usuarios where idUsu = '$idUsu'";
	$pdo->runQuery($query)
        or die("Se ha producido un error al apuntarse en el torneo");
    if ($pdo) {
        require_once("logout.php");
    }
        
    $pdo = null;
}


if (!empty($_POST)) :


    $email = $_POST["email"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $pass = $_POST["pass"];
    $conf = $_POST["conf"];
    $fec = !empty($_POST["fnac"]) ? $_POST["fnac"] : null;

    //Se comprueba si la contraseña y la confirmación son iguales.
    if ($pass == $conf) :

        // conectamos con la base de datos, devuelve error en caso de fallar la conexión.
        $db = database::getInstance();

        // Sentencia sql para insertar el nuevo usuario.
        $sql = "UPDATE usuarios SET email=?,pass=MD5(?) ,nombre=? ,apellidos=? ,fec_nacimiento=? ";
        $sql .= "WHERE idUsu=" . $ses->getUsuario()->getIdUsu();

        $ok = $db->runQuery($sql, [$email, $pass, $nombre, $apellidos, $fec])
        or die("Se ha producido un error.");
        ;
        // cerramos la conexión
        $pdo = null;

    else :
        $error = "Las contraseñas no coinciden";
    endif;

endif;



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>· Games ·</title>
    <meta charset="utf8" />
    <link rel="stylesheet" type="text/css" href="css/miestilo.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body class="body">


	<div class="container-flex">		
		<div class="navbar navbar-expand-lg navbar-light bg-black">
		<img class="logo" src="img/logonav.png" alt="Games" />
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon" href="main.php"></span>
				</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link text-light" href="main.php">GAMERS</a>
					</li>

					<li class="nav-item">
						<a class="nav-link text-light" href="perfil.php">Perfil</a>
					</li>

					<li class="nav-item">
						<a class="nav-link text-danger" href="logout.php">Salir</a>
					</li>
				</ul> 

			</div>	<!-- end-collapse -->

			
			<div class="navbar-text text-primary">
				Has iniciado sesión como: <?=$usr?> 
			</div>

		</div>	<!-- end-navbar -->



        </div> <!-- end-navbar -->

        <div class="container">

        
            <div class="row">
                <div class="col-sd-12 mx-auto mb-5">
                    <h4>Modifica tu perfil personal</h4>
                </div>
            </div>


            <!-- formulario de registro -->
            <form method="post">

                <!-- nombre de usuario -->
                <div class="form-group">
                    <div class="col-md-6 mx-auto">
                        <label class="col-form-label" for="email">Nombre de usuario:</label>
                        <input class="form-control" type="email" name="email" placeholder="email@gamers.com" required />
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
                        <input class="form-control" type="password" name="pass" required />
                    </div>
                </div>

                <!-- confirmación contraseña -->
                <div class="form-group">
                    <div class="col-md-6 mx-auto">
                        <label class="col-form-label" for="conf">Confirmación contraseña:</label>
                        <input class="form-control" type="password" name="conf" required />
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
            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <button class="btn btn-primary w-100" type="submit">Actualizar perfil</button>
                </div>
            </div>
            <?php if ((isset($ok)) && ($ok)):
			?>
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="alert alert-success w-50 mx-auto" role="alert">
					  Se ha actualizado el usuario correctamente.
					</div>
				</div>
			</div>
			<?php
				endif ;
			?>
        </form>

           
            <!-- borrar jugador -->
            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <form action="" method="post">
						<input type="hidden" value="<?= $ses->getUsuario()->getIdUsu() ?>" name="borrar">
                        <button class="btn btn-danger w-100" type="submit">Eliminar Cuenta</button>
                    </form>
                </div>
            </div>

    </div> <!-- container -->

    <br />

</body>

</html>