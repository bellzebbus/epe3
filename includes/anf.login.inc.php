<?php

if (isset($_POST["i-anf-submit"])) {

	$email = $_POST["anf-email"];
	$contra = $_POST["anf-pass"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (valoresVaciosLog($email, $contra) !== false) {
		header("location: ../login.php?error=campovacio");
		exit();
	}

	iniciarSesionAnf($conn, $email, $contra);

}else{
	header("location: ../login.php?error=aaaa");
	exit();
}
