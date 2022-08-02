<?php
$pagina_admin = 0;
$pagina = 1;
$video = 1;
$nombre_pagina = "Inicio";
require_once 'includes/header.php';

?>

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://utvtblog.files.wordpress.com/2017/10/cropped-somosutvt-2-01.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url ?>assets/img/banner2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url ?>assets/img/banner3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<?php

require_once 'includes/footer.php';

?>