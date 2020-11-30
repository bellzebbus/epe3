<?php

if (isset($_POST["insert-comentario-submit"])) {

	$autor = $_POST["autor"];
  $comentario = htmlspecialchars($_POST["descripcion"]);
  $fecha = date("Y-m-d H:i:s");

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

  if (valoresVaciosComentario($autor, $comentario) !== false) {
		header("location: ../foro.php?error=campovacio");
		exit();
	}

  insertarComentario($conn, $autor, $comentario , $fecha);

}else{
	header("location: ../foro.php?error=nohaydatos");
}
