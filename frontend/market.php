<?php
session_start();
if (strcmp($_SESSION["rol"], "admin") != 0 && strcmp($_SESSION["rol"], "usuario") != 0) {
  header("Location: ./login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://kit.fontawesome.com/f4e70a9fbd.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/style.css" />
  <link rel="stylesheet" href="assets/market_media_big.css" />
  <link rel="stylesheet" href="assets/market_media_small.css" />
</head>

<body>

<div id="avisos"> bienvenido de nuevo</div>

  <nav id="nav">
    <ul class="ulLogo">
      <img src="assets/img/greenHat.png" />



      <div>
          <ul class="navOptions">
            <li class="liSelected" onclick='location.href="./index.php"'><p>inicio</p></li>
            <li onclick='location.href="."'><p>eventos</p></li>
            <li onclick='location.href="."'><p>nosotros</p></li>
            <li onclick='location.href="."'><p>contacto</p></li>
            <li onclick='location.href="./adminIndex.php"'><p>admin</p></li>
            <li onclick='location.href="market.php"'><p>market</p></li>
          </ul>

          <div id="mover"></div>

          <span id="navOptionsResponsive">
          <button class='dropdown-caller login-caller-sm' id=""><i class="fa-solid fa-bars"></i></button>
          <div class="dropdown-menu" id="dropdown-log-sm">
          <li class="liSelected">
            <p>inicio</p>
          </li>
          <li onclick='location.href="".'>
            <p>eventos</p>
          </li>
          <li onclick='location.href="."'>
            <p>nosotros</p>
          </li>
          <li onclick='location.href="#formularioContacto"'>
            <p>contacto</p>
          </li>

          <li onclick='sendToAdmin()'>
            <p>admin</p>
          </li>

          <li onclick='location.href='>
            <p>market</p>
          </li>

            <li ><a href="logout.php">log out</a></li>

          </div>
        </span>

        <span id="logOutOptions">
          <button class='dropdown-caller' id="login-caller-bg"><i class="fa-solid fa-user"></i></button>
          <div class="dropdown-menu" id="dropdown-log-bg">
          <?php if (strcmp($_SESSION["rol"], "usuario") == 0 || strcmp($_SESSION["rol"], "admin") == 0) {
            echo '
            <a href="logout.php"> <i class="fa-solid fa-door-open"></i> log out</a>
          ';
          } else{
            echo '
            <a href="login.php"> <i class="fa-solid fa-door-open"></i> log in</a>
            ';
          }
           ?>
          </div>
        </span>
        </div>
  </nav>

  <section id="market">

    <i id="stageCaller" class="fa-solid fa-cart-shopping"></i>

    <div class="stage">
      <i class="fa-solid fa-backward"></i>
      <span id="filter">
        <input id="buscarInput" type="text" placeholder="buscar">
        <label for=""><input type="checkbox"> alfabeticamente</label>
        <label for=""><input type="checkbox"> por precio</label>
        <label for=""><input type="checkbox"> por stock</label>
        <button id="buscar">buscar</button>
        <button id="filtrar">filtrar</button>
      </span>
      <span id="cart">
        <h2>carrito</h2>
        <button id="cancelar">cancelar</button>
        <button onclick="buyCart()" id="comprar">comprar</button>
      </span>
    </div>

    <div id="content">
    </div>
  </section>

  <script src="assets/move.js"></script>
  <script src="assets/actions.js"></script>
  <script src="./assets/senders.js"></script>
  <script src="./assets/market.js"></script>
</body>

</html>
