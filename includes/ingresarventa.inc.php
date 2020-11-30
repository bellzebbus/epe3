<?php
session_start();

if (isset($_POST["i-serv-submit"])) {

	$idServicio = $_POST["i-serv-submit"];
  $fecha_venta = date("Y-m-d");
  $fecha_inicio = $_POST["inicio-servicio"];
  $fecha_fin = $_POST["fin-servicio"];
  $idCliente = $_SESSION["cli-id"];
  $idoferta = $_POST["comprar-servicio"];

  echo $idoferta;

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	//insertarVenta($conn, $fecha_venta, $fecha_inicio , $fecha_fin, $idCliente, $idServicio, $idoferta);

}else{
	header("location: ../servicios.php?error=nohaydatos");
}
