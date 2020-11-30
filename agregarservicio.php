<?php
session_start();
include_once 'header.php' ?>

<section class="container-fluid">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <form class="form" action="includes/ingresarservicio.inc.php" method="post" enctype="multipart/form-data">
        <h1 class="text-center mb-4 mt-5">Agregar Servicio</h1>
        <div class="form-group">
          <label for="titulo">Titulo del Servicio:</label>
          <input class="form-control border border-secondary" type="text" name="titulo">
        </div>
        <div class="form-group">
          <label for="descripcion">Descripcion:</label>
          <textarea name="descripcion" rows="5" cols="80" class="form-control border border-secondary"></textarea>
        </div>
        <div class="form-group">
          <label for="url">Url Google Maps:</label>
          <input class="form-control border border-secondary" type="text" name="url">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-4">
              <label for="ciudad">Ciudad:</label>
              <select class="form-control border border-secondary" name="ciudad">
                <?php
                  $resultadosQR = rellenarCiudad($conn);
                  while ($row = mysqli_fetch_assoc($resultadosQR)) {
                    echo '<option value="'.$row["id"].'">';
                    echo $row["nombre"];
                    echo '</option>';
                  }
                ?>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="categoria">Categoria:</label>
              <select class="form-control border border-secondary" name="categoria">
                <?php
                  $resultadosQR = rellenarCategoria($conn);
                  while ($row = mysqli_fetch_assoc($resultadosQR)) {
                    echo '<option value="'.$row["id"].'">';
                    echo $row["nombre"];
                    echo '</option>';
                  }
                ?>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="planes">Planes:</label>
              <select class="form-control border border-secondary" name="planes">
                <?php
                  $user = $_SESSION["anf-id"];
                  $resultadosQR = rellenarValoresDetalle($conn, $user);
                  while ($row = mysqli_fetch_assoc($resultadosQR)) {
                    echo '<option value="'.$row["id"].'">';
                    echo $row["nombre"];
                    echo '</option>';
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="imagen">Imagenes: </label>
          <div class="row mb-5">
            <div class="col-sm-4"><input class="form-control" type="file" name="imagen-1"></div>
            <div class="col-sm-4"><input class="form-control" type="file" name="imagen-2"></div>
            <div class="col-sm-4"><input class="form-control" type="file" name="imagen-3"></div>
          </div>
        </div>
        <div class="row mt-5 mb-5">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
            <button type="submit" name="insert-servicio-submit" class="btn btn-success form-control mb-3">Enviar</button>
          </div>
          <div class="col-sm-2"></div>
        </div>
      </form>
    </div>
    <div class="col-sm-2"></div>
  </div>
</section>



<?php include_once 'footer.php' ?>
