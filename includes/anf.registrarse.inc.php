<?php

if (isset($_POST["r-anf-submit"])) {

	$nombre = $_POST["r-anf-name"];
	$apellidos = $_POST["r-anf-lastname"];
	$email = $_POST["r-anf-email"];
	$contra = $_POST["r-anf-pass"];
	$contra2 = $_POST["r-anf-pass2"];
	$telefono = $_POST["r-anf-phone"];
	$banco = $_POST["r-anf-banco"];
	$numcuenta = $_POST["r-anf-account"];
  $web = $_POST["r-anf-web"];
  $descripcion = htmlspecialchars($_POST['r-anf-descripcion']);

	$fileName = basename($_FILES["r-anf-logo"]["name"]);
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (valoresVaciosAnf($nombre, $apellidos, $email, $telefono, $contra, $contra2, $banco, $numcuenta, $web, $descripcion) !== false) {
		header("location: ../index.php?error=campovacio");
		exit();
	}

	if (emailInvalido($email) !== false) {
		header("location: ../index.php?error=emailinvalido");
		exit();
	}

	if (comprobarcontrasena($contra, $contra2) !== false) {
		header("location: ../index.php?error=contraseñasnocoinciden");
		exit();
	}
	if (emailExistenteAnf($conn, $email) !== false) {
		header("location: ../index.php?error=usuarioyaexiste");
		exit();
	}

	crearAnfitrion($conn, $nombre, $apellidos, $email, $contra, $telefono, $banco, $numcuenta, $web, $descripcion, $fileName, $fileType);

}else{
	header("location: ../index.php?error=");
}
