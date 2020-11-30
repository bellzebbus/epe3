<?php
session_start();
include_once 'header.php' ?>

<h1 class="text-center mb-4 mt-4">Lista de Servicios</h1>


<section class="container">
  <?php
		if (isset($_GET["idciudad"])) {
      $id = $_GET["idciudad"];
      $resultadosQR = rellenarServicioPorCiudad($conn, $id);
    }elseif (isset($_GET["idcategoria"])) {
      $id = $_GET["idcategoria"];
      $resultadosQR = rellenarServicioPorCategoria($conn, $id);
    }else {
      $resultadosQR = rellenarServicio($conn);
    }
		while ($row = mysqli_fetch_assoc($resultadosQR)) {
			echo '<div class="card mb-3">';
			echo '<div class="row">';
			echo '<div class="col-sm-4">';
			echo '<div id="galeria'.$row["id"].'" class="carousel slide" data-ride="carousel">';
			echo '<ol class="carousel-indicators">';
			echo '<li data-target="#galeria'.$row["id"].'" data-slide-to="0" class="active"></li>';
      echo '<li data-target="#galeria'.$row["id"].'" data-slide-to="1"></li>';
      echo '<li data-target="#galeria'.$row["id"].'" data-slide-to="2"></li>';
      echo '</ol>';
      echo '<div class="carousel-inner">';
      echo '<div class="carousel-item active">';
      ?>
        <img class="d-block w-100" style="height:300px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img1']); ?>" />
      <?php
      echo '</div>';
      echo '<div class="carousel-item">';
      ?>
        <img class="d-block w-100" style="height:300px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img2']); ?>" />
      <?php
      echo '</div>';
      echo '<div class="carousel-item">';
      ?>
        <img class="d-block w-100" style="height:300px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img3']); ?>" />
      <?php
      echo '</div>';
      echo '</div>';
      echo '<a class="carousel-control-prev" href="#galeria'.$row["id"].'" role="button" data-slide="prev">';
      echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
      echo '<span class="sr-only">Previous</span>';
      echo '</a>';
      echo '<a class="carousel-control-next" href="#galeria'.$row["id"].'" role="button" data-slide="next">';
      echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
      echo '<span class="sr-only">Next</span>';
      echo '</a>';
      echo '</div>';
      echo '</div>';
      echo '<div class="col-sm-8">';
      echo '<form class="" action="serviciodetalle.php" method="get">';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">'.$row["titulo"].'</h5>';
      echo '<p class="card-text">'.$row["descripcion"].'</p>';
      echo '<button type="submit" name="id_servicio" value="'.$row["id"].'" class="btn btn-primary btn-lg">Ver</button>';
      echo '</div>';
      echo '</div>';
      echo '</form>';
      echo '</div>';
      echo '</div>';
		}
	?>
</section>

<?php include_once 'footer.php' ?>
