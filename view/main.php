<?php
session_start();
date_default_timezone_set("America/Bogota");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="view/public/img/favicon.ico" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="view/public/css/main.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>PayPo</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" 
	integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" 
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

	<?php

	if (isset($_SESSION["iniciarSesionPaypo"]) && $_SESSION["iniciarSesionPaypo"] == "ok") {

		include "resources/header.php";

		if (isset($_GET["ruta"])) {

			if (
				$_GET["ruta"] == "recordarios" ||
				$_GET["ruta"] == "agregar" ||
				$_GET["ruta"] == "pendientes" ||
				$_GET["ruta"] == "salir" ||
				$_GET["ruta"] == "inicio"
				) {
				include "resources/" . $_GET["ruta"] . ".php";
			} else {
				include "resources/404.php";
			}
		} else {
			include "resources/inicio.php";
		}
	} else {
		if (isset($_GET["ruta"])) {
			if (
				$_GET["ruta"] == "login"
			) {
				include "resources/" . $_GET["ruta"] . ".php";
			} else {
				include "resources/login.php";
			}
		} else {
			include "resources/login.php";
		}
	}
	?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" 
	integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" 
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

	<script src="view/public/assets/sweetalert2/sweetalert2.all.js"></script>

	<script src="view/public/js/login.js"></script>
	<script src="view/public/js/validacion.js"></script>
	<script src="view/public/js/pagos.js"></script>
	<script src="view/public/js/recordatorio.js"></script>
	<script src="view/public/js/detalle.js"></script>

</body>

</html>