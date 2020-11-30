<?php
session_start();
if (isset($_POST["insert-servicio-submit"])) {

	$titulo = $_POST["titulo"];
	$descripcion = $_POST["descripcion"];
	$url = $_POST["url"];
	$ciudad = $_POST["ciudad"];
	$categoria = $_POST["categoria"];
	$plan = $_POST["planes"];
	$anfitrion = $_SESSION["anf-id"];

	$fileName1 = basename($_FILES["imagen-1"]["name"]);
  $fileType1 = pathinfo($fileName1, PATHINFO_EXTENSION);

	$fileName2 = basename($_FILES["imagen-2"]["name"]);
  $fileType2 = pathinfo($fileName2, PATHINFO_EXTENSION);

	$fileName3 = basename($_FILES["imagen-3"]["name"]);
  $fileType3 = pathinfo($fileName3, PATHINFO_EXTENSION);

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';


	if (valoresVaciosServicio($titulo, $descripcion, $url, $ciudad, $categoria, $plan, $fileName1, $fileType1, $fileName2, $fileType2, $fileName3, $fileType3) !== false) {
		header("location: ../agregarservicio.php?error=campovacio");
		exit();
	}

	insertarServicio($conn2, $titulo, $fileName1, $fileType1, $fileName2, $fileType2, $fileName3, $fileType3, $descripcion, $url, $anfitrion, $plan, $ciudad, $categoria);

}else{
	header("location: ../agregarservicio.php?error=nohaydatos");
}
