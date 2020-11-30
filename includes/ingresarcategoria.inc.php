<?php
if (isset($_POST["insert-cat-submit"])) {

	$nombre = $_POST["cat-nombre"];

	$fileName = basename($_FILES["cat-imagen"]["name"]);
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (valoresVaciosCiuCat($nombre, $fileName, $fileType) !== false) {
		header("location: ../admindatos.php?error=campovacio");
		exit();
	}

	insertarCategoria($conn, $nombre, $fileName, $fileType);

}else{
	header("location: ../admindatos.php");
}
