<?php
require_once "../libs/sesion.php";
require_once "../libs/database.php";

// obtenemos la instancia 
$sesion = sesion::getInstance();

// comprobar si hay una sesión activa
if (!$sesion->checkActiveSession()) {
    $sesion->redirect("../index.php");
}
$db = database::getInstance();
//recogemos la api key 
$idUsuario = $sesion->getUsuario()->getIdUsu();
$api = $db->runQuery("SELECT api_key FROM usuarios WHERE idUsu='$idUsuario' ;")->fetchColumn();
//generar api

if (empty($api))
{
    $api = md5($sesion->getUsuario()->getEmail() . time());
    $sql = "UPDATE usuarios SET api_key=? WHERE idUsu=?";
    $idUsu = $sesion->getUsuario()->getIdUsu();
    $db->runQuery($sql, [$api,$idUsu])
        or die("Ha habido algun error al generar su API KEY.");
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gamers</title>
</head>

<body>
    <h1>Generador de API KEY</h1>
    Tu API KEY es:
    <?php
        echo $api;
    ?>
    

    
</body>

</html>