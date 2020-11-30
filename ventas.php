<?php
session_start();
include_once 'header.php'
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
      <div class="col-sm-2 content1-left"></div>
      <div class="col-sm-8 content1-center">
        <h1 class="text-center mb-4 mt-4">Lista de Ventas</h1>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Cliente</th>
              <th scope="col">Servicio</th>
              <th scope="col">Anfitrion</th>
              <th scope="col">Ciudad</th>
              <th scope="col">Categoria</th>
              <th scope="col">Fecha de Inicio</th>
              <th scope="col">Fecha de Fin</th>
              <th scope="col">Valor</th>
              <th scope="col">Fecha de Compra</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $resultadosQR = rellenarVentas($conn);
              while ($row = mysqli_fetch_assoc($resultadosQR)) {
                echo '<tr>';
                echo '<th scope="row">'.$row["id"].'</th>';
                echo '<th>'.$row["cliente"].'</th>';
                echo '<th>'.$row["servicio"].'</th>';
                echo '<th>'.$row["anfitrion"].'</th>';
                echo '<th>'.$row["ciudad"].'</th>';
                echo '<th>'.$row["fecha_inicio"].'</th>';
                echo '<th>'.$row["fecha_fin"].'</th>';
                echo '<th>'.$row["valor"].'</th>';
                echo '<th>'.$row["fecha_venta"].'</th>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-sm-2 content1-right"></div>

    </div>
  </div>
</section>


<?php include_once 'footer.php' ?>
