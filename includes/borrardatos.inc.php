<?php

if (isset($_POST["borrar-id-ciudad"])) {

	$id = $_POST["borrar-id-ciudad"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	borrarCiudad($conn, $id);

}else{
	header("location: ../admindatos.php?error=nohaydatos");
}

if (isset($_POST["borrar-id-categoria"])) {

	$id = $_POST["borrar-id-categoria"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	borrarCategoria($conn, $id);

}else{
	header("location: ../admindatos.php?error=nohaydatos");
}

if (isset($_POST["borrar-id-cliente"])) {

	$id = $_POST["borrar-id-cliente"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	borrarCliente($conn, $id);

}else{
	header("location: ../admindatos.php?error=nohaydatos");
}

if (isset($_POST["borrar-id-anfitrion"])) {

	$id = $_POST["borrar-id-anfitrion"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	borrarAnfitrion($conn, $id);

}else{
	header("location: ../admindatos.php?error=nohaydatos");
}

if (isset($_POST["borrar-id-valores-d"])) {

	$id = $_POST["borrar-id-valores-d"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	borrarValoresDetalle($conn, $id);

}else{
	header("location: ../misplanes.php?error=nohaydatos");
}

if (isset($_POST["borrar-id-valores"])) {

	$id = $_POST["borrar-id-valores"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	borrarValores($conn, $id);

}else{
	header("location: ../misplanes.php?error=nohaydatos");
}
