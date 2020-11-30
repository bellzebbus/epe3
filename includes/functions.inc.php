<?php
header('Content-Type: text/html; charset=UTF-8');

function valoresVaciosLog($email, $contra){
	$resultado;
	if (empty($email) || empty($contra))  {
		$resultado = true;
	}else{
		$resultado = false;
	}
	return $resultado;
}

function valoresVaciosValores($nombre, $precio){
	$resultado;
	if (empty($nombre) || empty($precio))  {
		$resultado = true;
	}else{
		$resultado = false;
	}
	return $resultado;
}

function valoresVaciosComentario($autor, $comentario){
	$resultado;
	if (empty($autor) || empty($comentario))  {
		$resultado = true;
	}else{
		$resultado = false;
	}
	return $resultado;
}

function valoresVaciosValoresDetalle($nombre){
	$resultado;
	if (empty($nombre))  {
		$resultado = true;
	}else{
		$resultado = false;
	}
	return $resultado;
}

function valoresVaciosServicio($titulo, $descripcion, $url, $ciudad, $categoria, $plan, $fileName1, $fileType1, $fileName2, $fileType2, $fileName3, $fileType3){
	$resultado;
	if (empty($titulo) || empty($descripcion) || empty($url) || empty($ciudad) || empty($categoria) || empty($plan) || empty($fileName1) || empty($fileType1) || empty($fileName2) || empty($fileType2) || empty($fileName3) || empty($fileType3))  {
		$resultado = true;
	}else{
		$resultado = false;
	}
	return $resultado;
}

function valoresVaciosCli($nombre, $apellidos, $email, $telefono, $contra, $contra2, $banco, $numcuenta){
	$resultado;
	if (empty($nombre) || empty($apellidos) || empty($email) || empty($telefono) || empty($contra) || empty($contra2) || empty($banco) || empty($numcuenta)) {
		$resultado = true;
	}else{
		$resultado = false;
	}
	return $resultado;
}

function valoresVaciosAnf($nombre, $apellidos, $email, $telefono, $contra, $contra2, $banco, $numcuenta, $web, $descripcion){
	$resultado;
	if (empty($nombre) || empty($apellidos) || empty($email) || empty($telefono) || empty($contra) || empty($contra2) || empty($banco) || empty($numcuenta) || empty($web) || empty($descripcion)) {
		$resultado = true;
	}else{
		$resultado = false;
	}
	return $resultado;
}

function valoresVaciosCiuCat($nombre, $fileName, $fileType){
	$resultado;
	if (empty($nombre) || empty($fileName) || empty($fileType)) {
		$resultado = true;
	}else{
		$resultado = false;
	}
	return $resultado;
}

function emailInvalido($email){
	$resultado;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))  {
		$resultado = true;
	}else{
		$resultado = false;
	}
	return $resultado;
}

function comprobarcontrasena($contra, $contra2){
	$resultado;
	if ($contra !== $contra2)  {
		$resultado = true;
	}else{
		$resultado = false;
	}
	return $resultado;
}

function emailExistenteCli($conn, $email){
	$sql = "select * from cliente where email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../index.php?error=hubounerrorconlabasededatos");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultadosDB)) {
		return $row;
	}else{
		$resultado = false;
		return $resultado;
	}

	mysqli_stmt_close($stmt);
}

function emailExistenteAnf($conn, $email){
	$sql = "select * from anfitrion where email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../index.php?error=hubounerrorconlabasededatos");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultadosDB)) {
		return $row;
	}else{
		$resultado = false;
		return $resultado;
	}

	mysqli_stmt_close($stmt);
}

function emailExistenteAdmin($conn, $email){
	$sql = "select * from administrador where email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../index.php?error=hubounerrorconlabasededatos");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultadosDB)) {
		return $row;
	}else{
		$resultado = false;
		return $resultado;
	}

	mysqli_stmt_close($stmt);
}

function crearCliente($conn, $nombre, $apellidos, $email, $contra, $telefono, $banco, $numcuenta){

	$sql = "insert into cliente (nombre, apellido, email, pass, telefono, id_banco, num_cuenta) values (?, ?, ?, ?, ?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../index.php?error=fallolaquery");
		exit();
	}

	$contra_encriptada = md5($contra);
	mysqli_stmt_bind_param($stmt, "sssssis", $nombre , $apellidos, $email, $contra_encriptada, $telefono, $banco, $numcuenta);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../index.php?error=ninguno");

		echo '<div class="alert alert-success alert-dismissable">Se ha creado el usuario exitosamente!</div>';

	exit();

}

function insertarLogo($fileName, $fileType){

	$allowTypes = array('jpg','png','jpeg','gif');
  if(in_array($fileType, $allowTypes)){
      $image = $_FILES['r-anf-logo']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));

		return $imgContent;

  }else{
		header("location: ../index.php?error=tipoDeArchivoIncorrecto");
		exit();
  }

}

function crearAnfitrion($conn2, $nombre, $apellidos, $email, $contra, $telefono, $banco, $numcuenta, $web, $descripcion, $fileName, $fileType){

	$img = insertarLogo($fileName, $fileType);
	$contra_encriptada = md5($contra);
	$sql = "insert into anfitrion (nombre, apellido, email, pass, telefono, web, descripcion, id_banco, num_cuenta, img)
	values ('".$nombre."', '".$apellidos."', '".$email."', '".$contra_encriptada."', '".$telefono."', '".$web."', '".$descripcion."', ".$banco.", '".$numcuenta."', '".$img."');";

	if ($conn2->query($sql) === TRUE) {
		header("location: ../index.php?error=ninguno");
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . $conn2->error;
		exit();
	}

}

function iniciarSesionCli($conn, $email, $contra){
	$usuarioExiste = emailExistenteCli($conn, $email);

	if ($usuarioExiste === false) {
		header("location: ../index.php?error=Loginvalido");
		exit();
	}
	$contra_encriptada = $usuarioExiste["pass"];
	if (md5($contra) != $contra_encriptada) {
		header("location: ../index.php?error=Loginvalido");
		exit();
	}elseif (md5($contra) == $contra_encriptada) {

		session_start();
		$_SESSION["cli-email"] = $usuarioExiste["email"];
		$_SESSION["cli-id"] = $usuarioExiste["id"];
		header("location: ../index.php");
		exit();
	}
}

function iniciarSesionAnf($conn, $email, $contra){
	$usuarioExiste = emailExistenteAnf($conn, $email);

	if ($usuarioExiste === false) {
		header("location: ../index.php?error=Loginvalido");
		exit();
	}
	$contra_encriptada = $usuarioExiste["pass"];
	if (md5($contra) != $contra_encriptada) {
		header("location: ../index.php?error=Loginvalido");
		exit();
	}elseif (md5($contra) == $contra_encriptada) {

		session_start();
		$_SESSION["anf-email"] = $usuarioExiste["email"];
		$_SESSION["anf-id"] = $usuarioExiste["id"];
		header("location: ../index.php");
		exit();
	}
}

function iniciarSesionAdmin($conn, $email, $contra){
	$usuarioExiste = emailExistenteAdmin($conn, $email);

	if ($usuarioExiste === false) {
		header("location: ../index.php?error=Loginvalido");
		exit();
	}
	if ($contra != $usuarioExiste["pass"]) {
		header("location: ../index.php?error=Loginvalido");
		exit();
	}elseif ($contra == $usuarioExiste["pass"]) {

		session_start();
		$_SESSION["admin-email"] = $usuarioExiste["email"];
		header("location: ../index.php");
		exit();
	}
}

function rellenarBanco($conn){
	$sql = "select * from banco;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarAnfitrion($conn){
	$sql = "select a.id as id, a.nombre as nombre, a.apellido as apellido, a.email as email, a.telefono as telefono, a.web as web, b.nombre as banco, a.num_cuenta as num_cuenta from anfitrion a join banco b on a.id_banco = b.id;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarCliente($conn){
	$sql = "select a.id as id, a.nombre as nombre, a.apellido as apellido, a.email as email, a.telefono as telefono, b.nombre as banco, a.num_cuenta as num_cuenta from cliente a join banco b on a.id_banco = b.id;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarVentas($conn){
	$sql = "select v.id as id, c.nombre as cliente, s.titulo as servicio, a.nombre as anfitrion, ciu.nombre as ciudad, cat.nombre as categoria, v.fecha_inicio as fecha_inicio, v.fecha_fin as fecha_fin, val.precio as valor, v.fecha_venta as fecha_venta from venta v join cliente c on v.id_cliente = c.id join servicio s on v.id_servicio = s.id join anfitrion a on s.id_anfitrion = a.id join valores val on v.id_valor = val.id join ciudad ciu on s.id_ciudad = ciu.id join categoria cat on s.id_categoria = cat.id;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../ventas.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarCategoria($conn){
	$sql = "select * from categoria;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarValoresDetalle($conn, $user){
	$sql = "select * from valores_detalle where id_anfitrion = ".$user.";";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarValores($conn, $idPlan){
	$sql = "select * from valores where id_valores = ".$idPlan.";";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarCiudad($conn){
	$sql = "select * from ciudad;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarServicio($conn){
	$sql = "select id, titulo, img1, img2, img3, descripcion from servicio;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarServicioPorCiudad($conn, $id){
	$sql = "select id, titulo, img1, img2, img3, descripcion from servicio where id_ciudad = ".$id.";";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarServicioPorCategoria($conn, $id){
	$sql = "select id, titulo, img1, img2, img3, descripcion from servicio where id_categoria = ".$id.";";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarServicioDetalle($conn, $id){
	$sql = "select s.titulo as titulo, s.img1 as img1, s.img2 as img2, s.img3 as img3,
	 s.descripcion as descripcion, s.url as url, a.nombre as nombreanfitrion, a.apellido as apellidoanfitrion,
	 a.email as emailanfitrion, a.telefono as telefonoanfitrion, a.web as webanfitrion, a.descripcion as descanfitrion,
	 a.img as imganfitrion, vd.nombre as plan,vd.id as idplan, v.id as idoferta, ciu.nombre as ciudad, cat.nombre as categoria from servicio s
		join anfitrion a on s.id_anfitrion = a.id
		join valores_detalle vd on s.id_valores = vd.id
		join valores v on v.id_valores = vd.id
		join ciudad ciu on s.id_ciudad = ciu.id
		join categoria cat on s.id_categoria = cat.id where s.id = ".$id." ;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarPreciosPlanes($conn, $id){
	$sql = "select * from valores where id_valores= ".$id.";";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function rellenarComentarios($conn){
	$sql = "select * from foro order by fecha desc;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../foro.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	$resultadosDB = mysqli_stmt_get_result($stmt);

	return $resultadosDB;

	mysqli_stmt_close($stmt);
}

function insertarCategoria($conn2, $nombre, $fileName, $fileType){

	$allowTypes = array('jpg','png','jpeg','gif');
  if(in_array($fileType, $allowTypes)){
      $image = $_FILES['cat-imagen']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));

			$sql = "insert into categoria (img, nombre)
			values ('".$imgContent."','".$nombre."');";

			if ($conn2->query($sql) === TRUE) {
				header("location: ../admindatos.php?error=ninguno");
				exit();
			} else {
				echo "Error: " . $sql . "<br>" . $conn2->error;
				exit();
			}

  }else{
		header("location: ../admindatos.php?error=tipoDeArchivoIncorrecto");
		exit();
  }

}

function insertarCiudad($conn2, $nombre, $fileName, $fileType){

	$allowTypes = array('jpg','png','jpeg','gif');
  if(in_array($fileType, $allowTypes)){
      $image = $_FILES['ciu-imagen']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));

			$sql = "insert into ciudad (img, nombre)
			values ('".$imgContent."','".$nombre."');";

			if ($conn2->query($sql) === TRUE) {
				header("location: ../admindatos.php?error=ninguno");
				exit();
			} else {
				echo "Error: " . $sql . "<br>" . $conn2->error;
				exit();
			}

  }else{
		header("location: ../admindatos.php?error=tipoDeArchivoIncorrecto");
		exit();
  }

}

function insertarPlan($conn, $nombre, $user){

	$sql = "insert into valores_detalle (nombre, id_anfitrion) values (?, ?);";

	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../misplanes.php?error=fallolaquery");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "si", $nombre , $user);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../misplanes.php?error=ninguno");

	exit();

}

function insertarValor($conn, $nombre, $idValores , $precio){

	$sql = "insert into valores (nombre, id_valores, precio) values (?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../misplanes.php?error=fallolaquery");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "sii", $nombre, $idValores , $precio);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../misplanes.php?error=ninguno");

	exit();

}

function insertarServicio($conn2, $titulo, $fileName1, $fileType1, $fileName2, $fileType2, $fileName3, $fileType3, $descripcion, $url, $anfitrion, $plan, $ciudad, $categoria){

	$allowTypes = array('jpg','png','jpeg','gif');
  if(in_array($fileType1, $allowTypes) && in_array($fileType2, $allowTypes) && in_array($fileType3, $allowTypes)){

      $image1 = $_FILES['imagen-1']['tmp_name'];
      $imgContent1 = addslashes(file_get_contents($image1));

			$image2 = $_FILES['imagen-2']['tmp_name'];
      $imgContent2 = addslashes(file_get_contents($image2));

			$image3 = $_FILES['imagen-3']['tmp_name'];
      $imgContent3 = addslashes(file_get_contents($image3));

			$sql = "insert into servicio (titulo, img1, img2, img3, descripcion, url, id_anfitrion, id_valores, id_ciudad, id_categoria)
			values ('".$titulo."','".$imgContent1."','".$imgContent2."','".$imgContent3."','".$descripcion."','".$url."','".$anfitrion."','".$plan."','".$ciudad."','".$categoria."');";

			if ($conn2->query($sql) === TRUE) {
				header("location: ../agregarservicio.php?error=ninguno");
				exit();
			} else {
				echo "Error: " . $sql . "<br>" . $conn2->error;
				exit();
			}

  }else{
		header("location: ../agregarservicio.php?error=tipoDeArchivoIncorrecto");
		exit();
  }

}

function insertarVenta($conn, $fecha_venta, $fecha_inicio , $fecha_fin, $idCliente, $idServicio, $idoferta){

	$sql = "insert into venta (fecha_venta, fecha_inicio, fecha_fin, id_cliente, id_servicio, id_valor) values (?, ?, ?, ?,?, ?);";

	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../servicios.php?error=fallolaquery");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "sssiii", $fecha_venta, $fecha_inicio , $fecha_fin, $idCliente, $idServicio, $idoferta);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../servicios.php?error=ninguno");

	exit();

}

function insertarComentario($conn, $autor, $comentario , $fecha){

	$sql = "insert into foro (autor, contenido, fecha) values (?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../foro.php?error=fallolaquery");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "sss", $autor, $comentario , $fecha);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../foro.php?error=ninguno");

	exit();

}

function borrarCiudad($conn, $id){
	$sql = "delete from ciudad where id = '".$id."';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	header("location: ../admindatos.php?error=seeliminoeldatoexitosamente");
	exit();

	mysqli_stmt_close($stmt);
}

function borrarValoresDetalle($conn, $id){
	$sql = "delete from valores_detalle where id = '".$id."';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../misplanes.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	header("location: ../misplanes.php?error=seeliminoeldatoexitosamente");
	exit();

	mysqli_stmt_close($stmt);
}

function borrarValores($conn, $id){
	$sql = "delete from valores where id = '".$id."';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../misplanes.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	header("location: ../misplanes.php?error=seeliminoeldatoexitosamente");
	exit();

	mysqli_stmt_close($stmt);
}

function borrarCategoria($conn, $id){
	$sql = "delete from categoria where id = '".$id."';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	header("location: ../admindatos.php?error=seeliminoeldatoexitosamente");
	exit();

	mysqli_stmt_close($stmt);
}

function borrarCliente($conn, $id){
	$sql = "delete from cliente where id = '".$id."';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	header("location: ../admindatos.php?error=seeliminoeldatoexitosamente");
	exit();

	mysqli_stmt_close($stmt);
}

function borrarAnfitrion($conn, $id){
	$sql = "delete from anfitrion where id = '".$id."';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../admindatos.php?error=hubounerrorconlabasededatos");
		exit();
	}
	mysqli_stmt_execute($stmt);

	header("location: ../admindatos.php?error=seeliminoeldatoexitosamente");
	exit();

	mysqli_stmt_close($stmt);
}
