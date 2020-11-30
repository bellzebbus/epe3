<?php
  require "includes/dbh.inc.php";
  require "includes/functions.inc.php";
 ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
     integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
     crossorigin="anonymous">
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <title>Epe3</title>
  </head>
  <body>

    <!-- Barra de navegacion -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Epe3</a>

        <!-- Desplegar menu -->
        <button class="navbar-toggler" type="button" name="button" data-toggle="collapse"
        data-target="#barra" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu desplegable -->
        <div class="collapse navbar-collapse" id="barra">
          <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="servicios.php">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="foro.php">Foros</a>
            </li>
          </ul>

          <div class="w-auto d-flex">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
              </li>

              <?php
              //boton de cuenta usuario
                if (isset($_SESSION["cli-email"])) {
                  echo '<li class="nav-item dropleft">';
                  echo '<a class="nav-link dropdown-toggle" href="#" id="miMenu" role="button" data-toggle="dropdown" aria-expanded="false">';
                  echo '<i class="fa fa-user"></i></a>';
                  echo '<ul class="dropdown-menu" aria-labelledby="miMenu">';
                  echo '<li><a class="dropdown-item" href="#">Mi Perfil</a></li>';
                  echo '<li><a class="dropdown-item" href="#">Compras</a></li>';
                  echo '<li><hr class="dropdown-divider" /></li>';
                  echo '<li><a class="dropdown-item" href="includes/cerrarsesion.inc.php">Cerrar Sesion</a></li>';
                  echo '</ul>';
                  echo '</li>';
                  //boton de cuenta anfitrion
                }elseif (isset($_SESSION["anf-email"])) {
                  echo '<li class="nav-item dropleft">';
                  echo '<a class="nav-link dropdown-toggle" href="#" id="miMenu" role="button" data-toggle="dropdown" aria-expanded="false">';
                  echo '<i class="fa fa-user"></i></a>';
                  echo '<ul class="dropdown-menu" aria-labelledby="miMenu">';
                  echo '<li><a class="dropdown-item" href="misplanes.php">Mis Planes</a></li>';
                  echo '<li><a class="dropdown-item" href="#">Mis Servicios</a></li>';
                  echo '<li><a class="dropdown-item" href="agregarservicio.php">Agregar Servicio</a></li>';
                  echo '<li><hr class="dropdown-divider" /></li>';
                  echo '<li><a class="dropdown-item" href="includes/cerrarsesion.inc.php">Cerrar Sesion</a></li>';
                  echo '</ul>';
                  echo '</li>';
                  //boton de cuenta Administrador
                } elseif (isset($_SESSION["admin-email"])) {
                  echo '<li class="nav-item dropleft">';
                  echo '<a class="nav-link dropdown-toggle" href="#" id="miMenu" role="button" data-toggle="dropdown" aria-expanded="false">';
                  echo '<i class="fa fa-user"></i></a>';
                  echo '<ul class="dropdown-menu" aria-labelledby="miMenu">';
                  echo '<li><a class="dropdown-item" href="admindatos.php">Administrar Datos</a></li>';
                  echo '<li><a class="dropdown-item" href="ventas.php">Revisar Ventas</a></li>';
                  echo '<li><hr class="dropdown-divider" /></li>';
                  echo '<li><a class="dropdown-item" href="includes/cerrarsesion.inc.php">Cerrar Sesion</a></li>';
                  echo '</ul>';
                  echo '</li>';
                } else {
                  echo '<li class="nav-item">';
                  echo '<a class="nav-link" data-toggle="modal" data-target="#ventanaInicio" href="#">Iniciar Sesión</a>';
                  echo '</li>';
                }
               ?>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- Modal para inicio de sesion -->

    <div class="modal fade" id="ventanaInicio" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="container">
            <ul class="nav nav-tabs nav-justified mt-3 " id="tab" role="tablist">
              <li class="nav-item active">
                <a class="nav-link active" id="btn-cliente" data-toggle="pill" href="#cliente" role="tab" aria-controls="cliente" aria-selected="true">Cliente</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="btn-anfitrion" data-toggle="pill" href="#anfitrion" role="tab" aria-controls="anfitrion" aria-selected="false">Anfitrion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="btn-admin" data-toggle="pill" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Administrador</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <!-- Inicio Sesion de Cliente -->

              <div class="tab-pane fade show active" id="cliente" role="tabpanel" aria-labelledby="btn-cliente">
                <div class="row index-form mt-5 mb-5">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                    <form class="" action="includes/cli.login.inc.php" method="post">
                      <h1 class="text-center mb-4">Cliente</h1>
                      <div class="form-group">
                        <label for="cli-email">Email:</label>
                        <input class="form-control border border-secondary" type="text" name="cli-email">
                      </div>
                      <div class="form-group">
                        <label for="cli-pass">Contraseña:</label>
                        <input class="form-control border border-secondary" type="password" name="cli-pass">
                      </div>
                      <button type="submit" name="i-cli-submit" class="btn btn-success form-control mb-3">Enviar</button>
                    </form>
                    <p class="text-center">¿No tienes cuenta? Registrate <a class="link" data-toggle="modal" data-target="#ventanaRegistro" href="">aqui</a></p>
                  </div>
                  <div class="col-sm-4"></div>
                </div>
              </div>
              <!-- Inicio Sesion de Anfitrion -->
              <div class="tab-pane fade" id="anfitrion" role="tabpanel" aria-labelledby="btn-anfitrion">

                <div class="tab-pane fade show active" id="cliente" role="tabpanel" aria-labelledby="btn-cliente">
                  <div class="row index-form mt-5 mb-5">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                      <form class="" action="includes/anf.login.inc.php" method="post">
                        <h1 class="text-center mb-4">Anfitrion</h1>
                        <div class="form-group">
                          <label for="anf-email">Email:</label>
                          <input class="form-control border border-secondary" type="text" name="anf-email">
                        </div>
                        <div class="form-group">
                          <label for="anf-pass">Contraseña:</label>
                          <input class="form-control border border-secondary" type="password" name="anf-pass">
                        </div>
                        <button type="submit" name="i-anf-submit" class="btn btn-success form-control mb-3">Enviar</button>
                      </form>
                      <p class="text-center">¿No tienes cuenta? Registrate <a class="link" data-toggle="modal" data-target="#ventanaRegistro" href="">aqui</a></p>
                    </div>
                    <div class="col-sm-4"></div>
                  </div>
                </div>
              </div>
              <!-- Inicio Sesion de Administrador -->
              <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="btn-admin">

                <div class="tab-pane fade show active" id="cliente" role="tabpanel" aria-labelledby="btn-cliente">
                  <div class="row index-form mt-5 mb-5">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                      <form class="" action="includes/admin.login.inc.php" method="post">
                        <h1 class="text-center mb-4">Administrador</h1>
                        <div class="form-group">
                          <label for="admin-email">Email:</label>
                          <input class="form-control border border-secondary" type="text" name="admin-email">
                        </div>
                        <div class="form-group">
                          <label for="admin-pass">Contraseña:</label>
                          <input class="form-control border border-secondary" type="password" name="admin-pass">
                        </div>
                        <button type="submit" name="i-admin-submit" class="btn btn-success form-control mb-3">Enviar</button>
                      </form>
                      <p class="text-center">¿No tienes cuenta? Registrate <a class="link" data-toggle="modal" data-target="#ventanaRegistro" href="">aqui</a></p>
                    </div>
                    <div class="col-sm-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para registro -->

    <div class="modal fade" id="ventanaRegistro" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="container">
            <ul class="nav nav-tabs nav-justified mt-3 " id="tab" role="tablist">
              <li class="nav-item active">
                <a class="nav-link active" id="btn-R-cliente" data-toggle="pill" href="#R-cliente" role="tab" aria-controls="R-cliente" aria-selected="true">Cliente</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="btn-R-anfitrion" data-toggle="pill" href="#R-anfitrion" role="tab" aria-controls="R-anfitrion" aria-selected="false">Anfitrion</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <!-- registro de Cliente -->

              <div class="tab-pane fade show active" id="R-cliente" role="tabpanel" aria-labelledby="btn-R-cliente">
                <div class="row index-form mt-5 mb-5">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8">
                    <form class="" action="includes/cli.registrarse.inc.php" method="post">
                      <h1 class="text-center mb-4">Cliente</h1>
                      <div class="form-group">
                        <label for="r-cli-name">Nombre:</label>
                        <input class="form-control border border-secondary" type="text" name="r-cli-name">
                      </div>
                      <div class="form-group">
                        <label for="r-cli-lastname">Apellido:</label>
                        <input class="form-control border border-secondary" type="text" name="r-cli-lastname">
                      </div>
                      <div class="form-group">
                        <label for="r-cli-email">Email:</label>
                        <input class="form-control border border-secondary" type="text" name="r-cli-email">
                      </div>
                      <div class="form-group">
                        <label for="r-cli-pass">Contraseña:</label>
                        <input class="form-control border border-secondary" type="password" name="r-cli-pass">
                      </div>
                      <div class="form-group">
                        <label for="r-cli-pass2">Repita su contraseña:</label>
                        <input class="form-control border border-secondary" type="password" name="r-cli-pass2">
                      </div>
                      <div class="form-group">
                        <label for="r-cli-phone">Teléfono:</label>
                        <input class="form-control border border-secondary" type="text" name="r-cli-phone">
                      </div>
                      <div class="form-group">
                        <label for="r-cli-bank">Banco:</label>
                        <select class="form-control border border-secondary" name="r-cli-banco">
                          <?php
                            $resultadosQR = rellenarBanco($conn);
                            while ($row = mysqli_fetch_assoc($resultadosQR)) {
                              echo '<option value="'.$row["id"].'">'.$row["nombre"].'</option>';
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="r-cli-account">Numero de Cuenta:</label>
                        <input class="form-control border border-secondary" type="text" name="r-cli-account">
                      </div>
                      <button type="submit" name="r-cli-submit" class="btn btn-success form-control mb-3">Enviar</button>
                    </form>
                    <p class="text-center">¿Ya tienes Cuenta? Inicia Sesion <a class="link" data-toggle="modal" data-target="#ventanaInicio" href="">aqui</a></p>
                  </div>
                  <div class="col-sm-2"></div>
                </div>
              </div>
              <!-- registro de Anfitrion -->
              <div class="tab-pane fade" id="R-anfitrion" role="tabpanel" aria-labelledby="btn-R-anfitrion">
                <div class="tab-pane fade show active" id="R-cliente" role="tabpanel" aria-labelledby="btn-R-cliente">
                  <div class="row index-form mt-5 mb-5">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                      <form class="" action="includes/anf.registrarse.inc.php" method="post" enctype="multipart/form-data">
                        <h1 class="text-center mb-4">Anfitrion</h1>
                        <div class="form-group">
                          <label for="r-anf-name">Nombre:</label>
                          <input class="form-control border border-secondary" type="text" name="r-anf-name">
                        </div>
                        <div class="form-group">
                          <label for="r-anf-lastname">Apellido:</label>
                          <input class="form-control border border-secondary" type="text" name="r-anf-lastname">
                        </div>
                        <div class="form-group">
                          <label for="r-anf-email">Email:</label>
                          <input class="form-control border border-secondary" type="text" name="r-anf-email">
                        </div>
                        <div class="form-group">
                          <label for="r-anf-pass">Contraseña:</label>
                          <input class="form-control border border-secondary" type="password" name="r-anf-pass">
                        </div>
                        <div class="form-group">
                          <label for="r-anf-pass2">Repita su contraseña:</label>
                          <input class="form-control border border-secondary" type="password" name="r-anf-pass2">
                        </div>
                        <div class="form-group">
                          <label for="r-anf-phone">Teléfono:</label>
                          <input class="form-control border border-secondary" type="text" name="r-anf-phone">
                        </div>
                        <div class="form-group">
                          <label for="r-anf-bank">Banco:</label>
                          <select class="form-control border border-secondary" name="r-anf-banco">
                            <?php
                							$resultadosQR = rellenarBanco($conn);
                							while ($row = mysqli_fetch_assoc($resultadosQR)) {
                								echo '<option value="'.$row["id"].'">';
                                echo $row["nombre"];
                                echo '</option>';
                							}
                						?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="r-anf-account">Numero de Cuenta:</label>
                          <input class="form-control border border-secondary" type="text" name="r-anf-account">
                        </div>
                        <div class="form-group">
                          <label for="r-anf-web">Pagina Web:</label>
                          <input class="form-control border border-secondary" type="text" name="r-anf-web">
                        </div>
                        <div class="form-group">
                          <label for="r-anf-descripcion">Descripcion:</label>
                          <textarea name="r-anf-descripcion" rows="5" cols="80" class="form-control border border-secondary"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="r-anf-logo">Logo:</label>
                          <input class="form-control" type="file" name="r-anf-logo">
                        </div>
                        <button type="submit" name="r-anf-submit" class="btn btn-success form-control mb-3" value="Upload">Enviar</button>
                      </form>
                      <p class="text-center">¿Ya tienes Cuenta? Inicia Sesion <a class="link" data-toggle="modal" data-target="#ventanaInicio" href="">aqui</a></p>
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
