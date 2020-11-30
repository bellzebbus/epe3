<?php
if (isset($_POST["insert-ciu-submit"])) {

	$nombre = $_POST["ciu-nombre"];

	$fileName = basename($_FILES["ciu-imagen"]["name"]);
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (valoresVaciosCiuCat($nombre, $fileName, $fileType) !== false) {
		header("location: ../admindatos.php?error=campovacio");
		exit();
	}

	insertarCiudad($conn, $nombre, $fileName, $fileType);

}else{
	header("location: ../admindatos.php?error=nohaydatos");
}
