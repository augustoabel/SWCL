<?php
  session_start();
  include('../login/verificar_login.php');
  include('../templates/header.php');
?>

<style>

    .largura {
      width: 1018px;
      height: 509px;
    }

</style>
<div class="container largura">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active ">
        <img src="img_into.jpg" class="d-block w-100 rounded" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Otimize sua lavoura</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img_into2.jpg" class="d-block w-100 rounded" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text-white">Calcule os custos de um jeito rápido e fácil</h5>
        </div>
      </div>
      <div class="carousel-item ">
        <img src="img_into3.jpg" class="d-block w-100 rounded" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Confira tudo no relátorio final</h5>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<?php 
  include('../templates/footer.php');

?>

