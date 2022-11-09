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
  <nav id="nav">
    <ul class="ulLogo">
      <img src="assets/img/greenHat.png" />

      <div>
        <ul class="navOptions">
          <li onclick='location.href="./index.php"' class="liSelected">
            <p>inicio</p>
          </li>
          <li onclick='location.href="."'>
            <p>eventos</p>
          </li>
          <li onclick='location.href="."'>
            <p>nosotros</p>
          </li>
          <li onclick='location.href="."'>
            <p>contacto</p>
          </li>
          <?php if (strcmp($_SESSION["rol"], "admin") == 0) {
            echo "
          <li onclick='sendToAdmin()'>
            <p>admin</p>
          </li>
          <li onclick='sendToMarket()'>
            <p>market</p>
          </li>
          ";
          } ?>
          <?php if (strcmp($_SESSION["rol"], "usuario") == 0) {
            echo "
          <li onclick='location.href='>
            <p>market</p>
          </li>
          ";
          } ?>
        </ul>
        <span>
          <button class='dropdown-caller'><i class="fa-solid fa-user"></i></button>
          <div class="dropdown-menu">
            <a href="login.php"> <i class="fa-solid fa-door-open"></i> log in</a>
          </div>
        </span>
      </div>
    </ul>
  </nav>

  <section id="market">

    <i class="fa-solid fa-bars"></i>

    <div>
      <i class="fa-solid fa-backward"></i>
      <span id="filter">
        <input id="buscarInput" type="text" placeholder="buscar">
        <label for=""><input type="checkbox"> alfabeticamente</label>
        <label for=""><input type="checkbox"> por precio</label>
        <label for=""><input type="checkbox"> por stock</label>
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
