<?php
session_start();
include_once 'header.php'
?>


<section class="main-container">
  <div class="container-fluid">
    <h1 class="text-center mb-5 mt-5">Perfil</h1>
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-9">
      </div>
      <div class="col-sm-3"></div>
    </div>
  </div>
</section>



<div class="container">
  <section class="main row bg-dark">
    <article class="col-md-7">
      <div class="card p-2 my-2 ">
        <div class="card-body text-center">
          <img class="rounded-circle" 
          src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" 
          style="width: 20rem; height: 20rem;">
        </div>
      </div>
    </article>

    <article class="col-md-5">
      <div class="rounded-lg bg-white text-dark p-2 my-4">
          nombre
      </div>

      <div class="rounded-lg bg-white text-dark p-2 my-4">
          correo
      </div>

      <div class="rounded-lg bg-white text-dark p-2 my-4">
          no se
      </div>

      <div class="rounded-lg bg-white text-dark p-2 my-4">
          no se
      </div>
    </article>

    <article class="col-md-4">
      <div class="rounded-lg bg-secondary text-white p-2 my-4 text-center">
         este espacio es para
      </div>
    </article>
    <article class="col-md-4">
      <div class="rounded-lg bg-secondary text-white p-2 my-4 text-center">
         poner botones y eso
      </div>
    </article>
    <article class="col-md-4">
      <div class="rounded-lg bg-secondary text-white p-2 my-4 text-center">
         no se, era pa hacer alguna wea uwu
      </div>
    </article>

    <!-- No pude poner los botones negros uwu -->
    <article class="col-md-4 text-center p-2">
      <h1 >
        <button type="button" class="btn btn-primary btn-lg p-2" style='width:200px; height:100px'>Boton1
      </h1>
      <h1>
        <button type="button" class="btn btn-primary btn-lg p-2" style='width:200px; height:100px'>Boton1
      </h1>
      <h1>
        <button type="button" class="btn btn-primary btn-lg p-2" style='width:200px; height:100px'>Boton1
      </h1>
    </article>

    <article class="col-md-8">
      <div class="card p-2 my-2 ">
        <div class="card-body text-center">
          <img class="rounded-circle" 
          src="https://image.flaticon.com/icons/png/512/854/854878.png" 
          style="width: 20rem; height: 20rem;">
        </div>
      </div>
    </article>




  </section>
</div>

<section class="main-container">
  <div class="container-fluid bg-light">
  <h1>  </h1>
  </div>
</section>

<!-- jQuery, Popper.js, y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


<?php include_once 'footer.php' ?>
