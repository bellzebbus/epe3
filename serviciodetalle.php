<?php
  session_start();
  include_once 'header.php';

  $id = $_GET["id_servicio"];
  $resultadosQR = rellenarServicioDetalle($conn, $id);
  $row = mysqli_fetch_assoc($resultadosQR);
    $titulo = $row["titulo"];
    $img1 = $row["img1"];
    $img2 = $row["img2"];
    $img3 = $row["img3"];
    $descripcion = $row["descripcion"];
    $url = $row["url"];
    $nombre_anf = $row["nombreanfitrion"];
    $apellido_anf = $row["apellidoanfitrion"];
    $email_anf = $row["emailanfitrion"];
    $telefono_anf = $row["telefonoanfitrion"];
    $web_anf = $row["webanfitrion"];
    $desc_anf = $row["descanfitrion"];
    $img_anf = $row["imganfitrion"];
    $plan = $row["plan"];
    $idplan = $row["idplan"];
    $ciudad = $row["ciudad"];
    $categoria = $row["categoria"];
 ?>

 <section class="container">
   <div class="row mt-5 mb-5">
     <div class="col-sm-12">
       <h2 class="mb-5"><?php echo $titulo; ?></h2>
       <div id="galeria" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#galeria" data-slide-to="0" class="active"></li>
            <li data-target="#galeria" data-slide-to="1"></li>
            <li data-target="#galeria" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100 embed-responsive embed-responsive-16by9" style="height:400px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img1']); ?>" />
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 embed-responsive embed-responsive-16by9" style="height:400px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img2']); ?>" />
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 embed-responsive embed-responsive-16by9" style="height:400px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img3']); ?>" />
            </div>
          </div>
          <a class="carousel-control-prev" href="#galeria" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#galeria" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
     </div>
   </div>
   <div class="row mb-3">
     <div class="col-sm-6">
       <h4><?php echo $categoria; ?> - Anfitrión: <?php echo $nombre_anf." ".$apellido_anf; ?></h4>
     </div>
     <div class="col-sm-3">
       <div class="text-right">
        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#datosanfitrion" href="#">Saber mas</a>
       </div>
     </div>
     <div class="col-sm-3"></div>
   </div>
   <div class="row mb-3">
     <div class="col-sm-8">
       <h4>Descripcion</h4>
       <p><?php echo $descripcion; ?></p>
       <h4>Ubicacion</h4>
       <a href="<?php echo $url; ?>"><big><i class="fa fa-map-marker"></i>Aqui!</big></a>
       <h4>Ciudad</h4>
       <p><?php echo $ciudad; ?></p>
     </div>
     <div class="col-sm-4"></div>
   </div>


   <?php if (isset($_SESSION["cli-email"])){
     $id = $idplan;
     $contador = 4;
     $contadoraux;
     $resultadosQR = rellenarPreciosPlanes($conn,$id);
         while ($row = mysqli_fetch_assoc($resultadosQR)) {
           if ($contador % 4 == 0) {
             echo '<div class="row mb-4">';
             $contadoraux = $contador;
           }

           echo '<div class="card mb-4 box-shadow">';
           echo '<form class="form" action="includes/ingresarventa.inc.php" method="post">';
           echo '<div class="card-header">';
           echo '<h4 class="my-0 font-weight-normal">'.$row["nombre"].'</h4>';
           echo '</div>';
           echo '<div class="card-body">';
           echo '<h1 class="card-title pricing-card-title">$'.$row["precio"].'</h1>';
           echo '<button type="button" name="comprar-servicio" value="'.$row["id"].'" data-toggle="modal" data-target="#compra-servicio" class="btn btn-sm btn-block btn-outline-primary">Contratar</button>';
           echo '</div>';
           echo '</div>';


           echo '<div class="modal fade bd-example-modal-lg" id="compra-servicio" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">';
           echo '<div class="modal-dialog modal-lg">';
           echo '<div class="modal-content">';
           echo '<div class="text-center mb-4 mt-4">';
           echo '<h2>Compra de Servicio</h2>';
           echo '</div>';
           echo '<div class="row">';
           echo '<div class="col-md-2"></div>';
           echo '<div class="col-md-8">';
           echo '<label for="cc-name">Ingrese Numero de Targeta</label>';
           echo '<input type="text" class="form-control" placeholder="">';
           echo '</div>';
           echo '<div class="col-md-2"></div>';
           echo '</div>';
           echo '<div class="row">';
           echo '<div class="col-md-2"></div>';
           echo '<div class="col-md-8">';
           echo '<div class="row">';
           echo '<div class="col-md-3">';
           echo '<label for="mes">Mes</label>';
           echo '<input type="text" class="form-control" placeholder="">';
           echo '</div>';
           echo '<div class="col-md-3">';
           echo '<label for="anio">Año</label>';
           echo '<input type="text" class="form-control" placeholder="">';
           echo '</div>';
           echo '<div class="col-md-3">';
           echo '<label for="ccv">CCV</label>';
           echo '<input type="text" class="form-control" placeholder="">';
           echo '</div>';
           echo '<div class="col-md-3"><i class="fa fa-credit-card"></i>';
           echo '</div>';
           echo '<div class="col-md-2"></div>';
           echo '</div>';

           echo '<div class="row mb-4">';
           echo '<div class="col-md-12">';
           echo '<label for="cc-name">Ingrese Numero de Targeta</label>';
           echo '<input type="text" class="form-control" placeholder="">';
           echo '</div>';
           echo '</div>';

           echo '<div class="row mb-4">';
           echo '<div class="col-md-1"></div>';
           echo '<div class="col-md-10">';
           echo '<div class="row mb-4">';
           echo '<div class="col-sm-6">';
           echo '<label for="inicio">Fecha inicio:</label>';
           echo '<input type="date" id="inicio" name="inicio-servicio" value="2020-11-01" min="2018-01-01" max="2020-11-31">';
           echo '</div>';
           echo '<div class="col-sm-6">';
           echo '<label for="fin">Fecha fin:</label>';
           echo '<input type="date" id="fin" name="fin-servicio" value="2020-11-01" min="2018-01-01" max="2020-11-31">';
           echo '</div>';
           echo '<div class="col-md-1"></div>';
           echo '</div>';
           echo '<div class="text-center">';
           echo '<button type="submit" name="i-serv-submit" value="'.$_GET["id_servicio"].'" class="btn btn-success form-control mb-3">Enviar</button>';
           echo '</div>';
           echo '</div>';
           echo '</div>';

           echo '</div>';
           echo '</div>';
           echo '</div>';
           echo '</div>';
           echo '</div>';
           echo '</form>';




           if ($contador == $contadoraux + 3) {
             echo '</div>';
           }

           $contador++;
         }
   }
   ?>

 </section>

 <?php
   include_once 'footer.php';
  ?>
