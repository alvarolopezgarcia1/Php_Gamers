<?php

require_once "sesion.php" ;

// obtenemos la instancia de la sesión
$ses = Sesion::getInstance() ;

// comprobar si hay una sesión activa
if (!$ses->checkActiveSession())
	 $ses->redirect("index.php") ;

// hay sesión activa
// obtenemos el usuario
$usr = $ses->getUsuario() ;
	

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Games</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="css/miestilo.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
	
	<!--<script src="https://code.jquery.com/jquery-3.4.1.js"></script>-->

	<style>
	.card {
		background-color:black;
	
	}

	.card-img-top{
		margin: 5px ;
		padding: 10px;
	}

</style>

</head>
<body class = "body">

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

					<!--<li class="nav-item">
						<a class="nav-link text-light" href="favoritos.php">Favoritos</a>
					</li>-->

					<li class="nav-item">
						<a class="nav-link text-light" href="perfil.php">Perfil</a>
					</li>

					<li class="nav-item">
						<a class="nav-link text-danger" href="logout.php">Salir</a>
					</li>
				</ul> 

			</div>	<!-- end-collapse -->

			
			<div class="navbar-text text-primary">
				Usuario: <?=$usr?> 
			</div>

		</div>	<!-- end-navbar -->