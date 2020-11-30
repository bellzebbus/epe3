<?php
  session_start();
  include_once 'header.php';
 ?>

<section class="container-fluid">
  <div class="row">
    <div class="col-sm-1 content1-left"></div>
    <div class="col-sm-10 content1-center">
      <h1 class="text-center mb-4 mt-4">Insertar Plan</h1>
      <table class="table table-bordered table-responsive-lg">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Borrar</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $user = $_SESSION["anf-id"];
            $resultadosQR = rellenarValoresDetalle($conn, $user);
            while ($row = mysqli_fetch_assoc($resultadosQR)) {
              echo '<tr>';
              echo '<form class="" action="includes/borrardatos.inc.php" method="post">';
              echo '<th scope="row">'.$row["id"].'</th>';
              echo '<th>'.$row["nombre"].'</th>';
              echo '<td><button type="submit" name="borrar-id-valores-d" value="'.$row["id"].'"  class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
              echo '</form>';
              echo '</tr>';
            }
          ?>
          <tr>
            <form class="" action="includes/insertarplanes.inc.php" method="post">
              <th scope="row">Agregar</th>
              <td><input class="form-control" type="text" name="plan-nombre" placeholder="Inserte Nombre"></td>
              <td><button type="submit" name="insert-plan-submit" class="btn btn-success"><i class="fa fa-plus-square"></i></button></td>
            </form>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-sm-1 content1-right"></div>

    <div class="col-sm-1 content1-left"></div>
    <div class="col-sm-10 content1-center">
      <h1 class="text-center mb-4 mt-4">Mis Precios</h1>

      <div class="row">
        <div class="col-sm-4 text-right">Filtrar por: </div>
        <div class="col-sm-4">

          <form class="form" action="includes/insertarplanes.inc.php" method="post">
            <select class="form-control border border-secondary" name="plan-id-cb">
              <?php
                $user = $_SESSION["anf-id"];
                $resultadosQR = rellenarValoresDetalle($conn, $user);
                while ($row = mysqli_fetch_assoc($resultadosQR)) {
                  echo '<option value="'.$row["id"].'">'.$row["nombre"].'</option>';
                }
              ?>
            </select>

        </div>
        <div class="col-sm-4">
          <button type="submit" name="sel-valor-submit" class="btn btn-success"><i class="fa fa-check-square"></i></button>
        </div>
        </form>
      </div>

      <table class="table table-bordered table-responsive-lg">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Borrar</th>
          </tr>
        </thead>
        <tbody>

          <?php
          if (isset($_SESSION["plan-id"])) {
            $idPlan = $_SESSION["plan-id"];
            $resultadosQR = rellenarValores($conn, $idPlan);
            while ($row = mysqli_fetch_assoc($resultadosQR)) {
              echo '<tr>';
              echo '<form class="" action="includes/borrardatos.inc.php" method="post">';
              echo '<th scope="row">'.$row["id"].'</th>';
              echo '<th>'.$row["nombre"].'</th>';
              echo '<th>'.$row["precio"].'</th>';
              echo '<td><button type="submit" name="borrar-id-valores" value="'.$row["id"].'"  class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
              echo '</form>';
              echo '</tr>';
            }
          }

          ?>
        </tbody>
      </table>

      <div class="text-center">
        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#agregarPrecio">Agregar precio</button>
      </div>

    </div>
    <div class="col-sm-1 content1-right"></div>


    <div class="modal fade" id="agregarPrecio" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="container">
            <div class="row mb-4 mt-4">
              <div class="col-sm-4"></div>
              <div class="col-sm-4">
                <form id="agregarPrecio" class="form" action="includes/insertarplanes.inc.php" method="post">
                  <h2 class="text-center mb-4">Agregar Precio</h2>
                  <div class="form-group">
                    <label for="valor-nombre">Nombre:</label>
                    <input class="form-control border border-secondary" type="text" name="valor-nombre" placeholder="Por noche; Por Fin de Semana; etc">
                  </div>
                  <div class="form-group">
                    <label for="valor-precio">Precio:</label>
                    <input class="form-control border border-secondary" type="text" name="valor-precio">
                  </div>
                  <div class="form-group">
                    <label for="plan-nombre">Plan:</label>
                    <select class="form-control border border-secondary" name="plan-nombre">
                      <?php
                        $user = $_SESSION["anf-id"];
                        $resultadosQR = rellenarValoresDetalle($conn, $user);
                        while ($row = mysqli_fetch_assoc($resultadosQR)) {
                          echo '<option value="'.$row["id"].'">'.$row["nombre"].'</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <button type="submit" name="insert-valor-submit" class="btn btn-success form-control mb-3">Enviar</button>
                </form>
              </div>
              <div class="col-sm-4"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

</section>

 <?php
   include_once 'footer.php';
  ?>
