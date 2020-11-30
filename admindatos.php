<?php
session_start();
include_once 'header.php';
/*
if (!isset($_SESSION['admin-email'])) {
header("location: /index.php?error=debeiniciarsesionprimero");
exit();
}
*/
?>

<section class="main-container">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-1 content1-left"></div>
      <div class="col-sm-10 content1-center">
        <h1 class="text-center mb-4 mt-4">Insertar Categoria</h1>
        <table class="table table-bordered table-responsive-lg">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Imagen</th>
              <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>

            <?php
              $resultadosQR = rellenarCategoria($conn);
              while ($row = mysqli_fetch_assoc($resultadosQR)) {
                echo '<tr>';
                echo '<form class="" action="includes/borrardatos.inc.php" method="post">';
                echo '<th scope="row">'.$row["id"].'</th>';
                echo '<th>'.$row["nombre"].'</th><th>';
                ?>
                <div class="text-center">
                  <img class="img-fluid img-thumbnail" style="width:200px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" />
                </div>
                <?php
                echo '</th><td><button type="submit" name="borrar-id-categoria" value="'.$row["id"].'"  class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
                echo '</form>';
                echo '</tr>';
              }
            ?>
            <tr>
              <form class="" action="includes/ingresarcategoria.inc.php" method="post" enctype="multipart/form-data">
                <th scope="row"></th>
                <td><input class="form-control" type="text" name="cat-nombre" placeholder="Inserte Nombre"></td>
                <td><input class="form-control" type="file" name="cat-imagen"></td>
                <td><button type="submit" name="insert-cat-submit" class="btn btn-success"><i class="fa fa-plus-square"></i></button></td>
              </form>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-sm-1 content1-right"></div>

      <div class="col-sm-1 content1-left"></div>
      <div class="col-sm-10 content1-center">
        <h1 class="text-center mb-4 mt-4">Insertar Ciudad</h1>
        <table class="table table-bordered table-responsive-lg">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Imagen</th>
              <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $resultadosQR = rellenarCiudad($conn);
              while ($row = mysqli_fetch_assoc($resultadosQR)) {
                echo '<tr>';
                echo '<form class="" action="includes/borrardatos.inc.php" method="post">';
                echo '<th scope="row">'.$row["id"].'</th>';
                echo '<th>'.$row["nombre"].'</th><th>';
                ?>
                <div class="text-center">
                  <img class="img-fluid img-thumbnail" style="width:200px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" />
                </div>
                <?php
                echo '</th><td><button type="submit" name="borrar-id-ciudad" value="'.$row["id"].'"  class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
                echo '</form>';
                echo '</tr>';
              }
            ?>
            <tr>
              <form class="" action="includes/ingresarciudad.inc.php" method="post" enctype="multipart/form-data">
                <th scope="row"></th>
                <td><input class="form-control" type="text" name="ciu-nombre" placeholder="Inserte Nombre"></td>
                <td><input class="form-control" type="file" name="ciu-imagen"></td>
                <td><button type="submit" name="insert-ciu-submit" class="btn btn-success"><i class="fa fa-plus-square"></i></button></td>
              </form>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-sm-1 content1-right"></div>

      <div class="col-sm-1 content1-left"></div>
      <div class="col-sm-10 content1-center">
        <h1 class="text-center mb-4 mt-4">Lista de Clientes</h1>
        <table class="table table-bordered table-responsive-lg">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Email</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Banco</th>
              <th scope="col">Numero de Cuenta</th>
              <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $resultadosQR = rellenarCliente($conn);
              while ($row = mysqli_fetch_assoc($resultadosQR)) {
                echo '<tr>';
                echo '<form class="" action="includes/borrardatos.inc.php" method="post">';
                echo '<th scope="row">'.$row["id"].'</th>';
                echo '<th>'.$row["nombre"].'</th>';
                echo '<th>'.$row["apellido"].'</th>';
                echo '<th>'.$row["email"].'</th>';
                echo '<th>'.$row["telefono"].'</th>';
                echo '<th>'.$row["banco"].'</th>';
                echo '<th>'.$row["num_cuenta"].'</th>';
                echo '<td><button type="submit" name="borrar-id-cliente" value="'.$row["id"].'" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
                echo '</form>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-sm-1 content1-right"></div>

      <div class="col-sm-1 content1-left"></div>
      <div class="col-sm-10 content1-center">
        <h1 class="text-center mb-4 mt-4">Lista de Anfitriones</h1>
        <table class="table table-bordered table-responsive-lg">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Email</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Web</th>
              <th scope="col">Banco</th>
              <th scope="col">Numero de Cuenta</th>
              <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>

              <?php
                $resultadosQR = rellenarAnfitrion($conn);
                while ($row = mysqli_fetch_assoc($resultadosQR)) {
                  echo '<tr>';
                  echo '<form class="" action="includes/borrardatos.inc.php" method="post">';
                  echo '<th scope="row">'.$row["id"].'</th>';
                  echo '<th>'.$row["nombre"].'</th>';
                  echo '<th>'.$row["apellido"].'</th>';
                  echo '<th>'.$row["email"].'</th>';
                  echo '<th>'.$row["telefono"].'</th>';
                  echo '<th>'.$row["web"].'</th>';
                  echo '<th>'.$row["banco"].'</th>';
                  echo '<th>'.$row["num_cuenta"].'</th>';
                  echo '<td><button type="submit" name="borrar-id-anfitrion" value="'.$row["id"].'" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
                  echo '</form>';
                  echo '</tr>';
                }
              ?>

            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-sm-1 content1-right"></div>

    </div>
  </div>
</section>


<?php include_once 'footer.php' ?>
