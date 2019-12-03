<?php

require_once "libs/titulo.php";
require_once "libs/sesion.php";
require_once "libs/database.php";

require_once "libs/libreria.php";

// conectamos con la base de datos
$db = database::getInstance();


// obtenemos el identificador de la serie
$id = $_GET["id"] ?? null;

// importamos la cabecera de la págin
include_once "libs/navbar.php";

$sql = "SELECT * from titulo WHERE idVid = $id";


if ($db->runQuery($sql)->rowCount() > 0) {




    while ($item = $db->getObject("titulo")) {



        ?>
        <div class="card mb-3 mx-auto" style="max-width: 50rem;">
            <div class="row no-gutters align-items-center h-100">
                <div class="col-md-6">
                    <img src="<?= $item->getimg() ?>" class="card-img">
                </div>
                <div class="col-md-6">
                    <h2 class="card-title"><?= $item->getnombre() ?></h2>
                    <p class="card-text text-justify"><?= $item->getdescripcion() ?></p>
                    <strong>Género:</strong> <?= $item->getgenero() ?><br />

                </div>
        <?php
            }
        }


        ?>
            </div>
        </div>
        </div> >

        </div>


        </body>

        </html>