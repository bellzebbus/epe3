<?php

if (isset($_POST["r-cli-submit"])) {

	$nombre = $_POST["r-cli-name"];
	$apellidos = $_POST["r-cli-lastname"];
	$email = $_POST["r-cli-email"];
	$contra = $_POST["r-cli-pass"];
	$contra2 = $_POST["r-cli-pass2"];
	$telefono = $_POST["r-cli-phone"];
	$banco = $_POST["r-cli-banco"];
	$numcuenta = $_POST["r-cli-account"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (valoresVaciosCli($nombre, $apellidos, $email, $telefono, $contra, $contra2, $banco, $numcuenta) !== false) {
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
	if (emailExistenteCli($conn, $email) !== false) {
		header("location: ../index.php?error=usuarioyaexiste");
		exit();
	}

	crearCliente($conn, $nombre, $apellidos, $email, $contra, $telefono, $banco, $numcuenta);

}else{
	header("location: ../index.php?error");
}
