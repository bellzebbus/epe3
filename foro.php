<?php
session_start();
include_once 'header.php' ?>

<section class="main-container">
      <div class="container">
        <div class="jumbotron" style="background-image: url('img/turismo.png');
        background-repeat: no-repeat; background-position: center;">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h1 style="color: black; background-color: white; opacity: 0.7">
                Foro
              </h1>
            </div>
            <div class="col-sm-7"></div>
          </div>a
        </div>
      </div>
</section>

<section>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Comentarios recientes</h6>

        <?php
          $resultadosQR = rellenarComentarios($conn);
          while ($row = mysqli_fetch_assoc($resultadosQR)) {
            echo '<div class="media text-muted pt-3">';
            echo '<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">';
            echo '<strong class="d-block text-gray-dark">'.$row["autor"].'</strong>';
            echo ''.$row["contenido"].'';
            echo '</p>';
            echo '</div>';
          }
        ?>
      </div>
      <div class="text-center">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarcomentario">
            Agregar Comentario <i class="fa fa-plus-square"></i>
        </button>
      </div>
    </div>
    <div class="col-sm-2"></div>
  </div>

  <div class="modal fade bd-example-modal-lg" id="agregarcomentario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="text-center mt-5">
        <h3>Agregar Comentario</h3>
      </div>
      <div class="row index-form mt-5 mb-5">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <form class="form" action="includes/ingresarcomentario.inc.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="autor">Autor:</label>
              <input class="form-control border border-secondary" type="text" name="autor">
            </div>
            <div class="form-group">
              <label for="descripcion">Descripcion:</label>
              <textarea name="descripcion" rows="5" cols="80" class="form-control border border-secondary"></textarea>
            </div>
            <div class="text-center mt-5 mb-5">
              <button type="submit" name="insert-comentario-submit" class="btn btn-success">Agregar <i class="fa fa-plus-square"></i></button>
            </div>
          </form>
        </div>
        <div class="col-sm-2"></div>
      </div>
    </div>
  </div>
</div>



</section>




<br><br><br><br><br>
<?php include_once 'footer.php' ?>
