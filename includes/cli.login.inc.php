<?php

if (isset($_POST["i-cli-submit"])) {

	$email = $_POST["cli-email"];
	$contra = $_POST["cli-pass"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (valoresVaciosLog($email, $contra) !== false) {
		header("location: ../index.php?error=campovacio");
		exit();
	}

	iniciarSesionCli($conn, $email, $contra);

}else{
	header("location: ../index.php?error=noserecivierondatos");
	exit();
}
