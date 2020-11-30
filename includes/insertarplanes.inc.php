<?php
session_start();
if (isset($_POST["insert-plan-submit"])) {

	$nombre = $_POST["plan-nombre"];
  $user = $_SESSION["anf-id"];


	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (valoresVaciosValoresDetalle($nombre) !== false) {
		header("location: ../misplanes.php?error=campovacio1");
		exit();
	}

	insertarPlan($conn, $nombre, $user);

}elseif (isset($_POST["insert-valor-submit"])) {

	$nombre = $_POST["valor-nombre"];
  $precio = $_POST["valor-precio"];
  $idValores = $_POST["plan-nombre"];


	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';


	if (valoresVaciosValores($nombre, $precio) !== false) {
		header("location: ../misplanes.php?error=campovacio2");
		exit();
	}

	insertarValor($conn, $nombre, $idValores , $precio);

}elseif (isset($_POST["sel-valor-submit"])) {

  $idPlan = $_POST["plan-id-cb"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

  $_SESSION["plan-id"] = $idPlan;
  header("location: ../misplanes.php");

}else{
	header("location: ../misplanes.php?nohaydatos");
}
