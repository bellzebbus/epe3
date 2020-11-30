
<?php
  session_start();
  include_once 'header.php';
 ?>

  <!-- Cabecera -->
  <section class="main-container">
      <div class="container">
        <div class="jumbotron" style="background-image: url('img/turismo.png');
        background-repeat: no-repeat; background-position: center;">
          <div class="row">
            <div class="col-sm-5">
              <h1 style="color: black; background-color: white; opacity: 0.7">
                Siéntete un turista cerca de casa!
              </h1>
              <p style="color: black; background-color: white; opacity: 0.7">
                Aqui iria una descripcion de algo pues y bla bla bla bla bla bla
                bla bla bla.
              </p>
            </div>
            <div class="col-sm-7"></div>
          </div>
        </div>

        <div class="row mt-4 mb-4">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <h1 class="text-center">Ciudades</h1>
          </div>
          <div class="col-sm-4"></div>
        </div>

        <div class="container">
          <?php
          $contador = 3;
          $contadoraux;
          $resultadosQR = rellenarCiudad($conn);
              while ($row = mysqli_fetch_assoc($resultadosQR)) {


                if ($contador % 3 == 0) {
                  echo '<div class="row mb-4">';
                  $contadoraux = $contador;
                }
                echo '<div class="col-sm-4">';
                echo '<form class="" action="servicios.php" method="get">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                ?>
                <div class="text-center">
                  <img class="card-img-top img-thumbnail" style="width:150px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" />
                </div>
                <?php
                echo '<h5 class="card-title">'.$row["nombre"].'</h5>';
                echo '<div class="text-center">';
                echo '<button type="submit" name="idciudad" value="'.$row["id"].'"  class="btn btn-primary btn-lg">Ir</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</form>';
                echo '</div>';

                if ($contador == $contadoraux + 2) {
                  echo '</div>';
                }

                $contador++;
              }
           ?>
        </div>


        <div class="row mt-4 mb-4">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <h1 class="text-center mt-4 mb-4">Categorias</h1>
          </div>
          <div class="col-sm-4"></div>
        </div>

        <div class="container">
          <?php
          $contador = 4;
          $contadoraux;
          $resultadosQR = rellenarCategoria($conn);
              while ($row = mysqli_fetch_assoc($resultadosQR)) {

                if ($contador % 4 == 0) {
                  echo '<div class="row mb-4">';
                  $contadoraux = $contador;
                }
                echo '<div class="col-sm-3">';
                echo '<form class="" action="servicios.php" method="get">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                ?>
                <div class="text-center">
                  <img class="card-img-top img-thumbnail" style="height:150px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" />
                </div>
                <?php
                echo '<h5 class="card-title">'.$row["nombre"].'</h5>';
                echo '<div class="text-center">';
                echo '<button type="submit" name="idcategoria" value="'.$row["id"].'"  class="btn btn-primary btn-lg">Ir</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</form>';
                echo '</div>';

                if ($contador == $contadoraux + 3) {
                  echo '</div>';
                }

                $contador++;
              }
           ?>
        </div>
  </section>

<?php
  include_once 'footer.php';
 ?>
