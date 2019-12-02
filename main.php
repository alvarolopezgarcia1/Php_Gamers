<?php

require_once "libs/titulo.php";
require_once "libs/sesion.php";
require_once "libs/database.php";
require_once "libs/libreria.php";

define("MAX_COL", 3);	// número de columnas
define("MAX_ITEM", 9);	// ítems por página

// importamos la cabecera de la página
require_once "libs/navbar.php";
?>

<div class="content">

	<?php

	// conectamos con la base de datos
	$db = database::getInstance();


	// calculamos el total de registros
	$cont = $db->runQuery("SELECT COUNT(*) AS total FROM titulo ;")->fetchAll();
	$item  = $db->getObject();
	//$total = $item->total ;
	$total = (int) $cont[0]["total"];


	// obtenemos el número de página
	// si no se nos pasa ninguna, fijamos la primera
	$pag = isset($_GET["p"]) ? $_GET["p"] : 1;

	// determinamos el punto de partida para la consulta
	$ini = ($pag - 1) * MAX_ITEM;

	// buscamos las series correspondientes a la página actual
	if (!$db->runQuery("SELECT * FROM titulo ORDER BY nombre LIMIT $ini, " . MAX_ITEM . ";")) :
		mostrarAlerta("No hay videojuegos en la base de datos", "danger");
	else :

		do {

			echo "<div class=\"row mb-2\">";
			$col = 0;
			while (($col < MAX_COL) && ($item = $db->getObject("titulo"))) :

				?><div class="col col-lg-4">
					<div class="card mx-auto " style="width:22rem;">
						<div class="card-body text-center">
							<!--<a href="info.php?id=<?= $item->getIdVid() ?>"-->
							<img src="<?= $item->getimg() ?>" class="card-img-top" />
							<h6 class="card-title text-primary"><?= $item->getnombre() ?></h6>
							<h6 class="card-title text-light"><?= $item->getgenero() ?></h6>
							</a>
						</div> <!-- end-card-body -->
					</div> <!-- end-card -->
				</div> <!-- end-col -->

		<?php
					$col++;

				endwhile;

				echo "</div>";
			} while ($item);

			// añadimos una paginación sencilla
			$ant_cond = ($pag == 1);
			$sig_cond = (($pag * MAX_ITEM) >= $total);

			?>


		<nav aria-label="paginación">
			<ul class="pagination justify-content-center">

				<!-- anterior -->
				<li class="page-item <?= $ant_cond ? "disabled" : "" ?>">
					<a class="page-link" href="<?= $ant_cond ? "#" : "main.php?p=" . ($pag - 1) ?>">Atrás</a>
				</li>

				<!-- siguiente -->
				<li class="page-item <?= $sig_cond ? "disabled" : "" ?>">
					<a class="page-link" href="<?= $sig_cond ? "#" : "main.php?p=" . ($pag + 1) ?>">Siguiente</a>
				</li>
			</ul>
		</nav>


	<?php

	endif;
	?>

</div>

</div>

</body>

</html>