<?php

if (isset($_POST["i-admin-submit"])) {

	$email = $_POST["admin-email"];
	$contra = $_POST["admin-pass"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (valoresVaciosLog($email, $contra) !== false) {
		header("location: ../index.php?error=campovacio");
		exit();
	}

	iniciarSesionAdmin($conn, $email, $contra);

}else{
	header("location: ../index.php?error=aaaa");
	exit();
}
