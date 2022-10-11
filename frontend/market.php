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
        <a href="index.php"><i class="fa-solid fa-user"></i></a>
      </div>
    </ul>
  </nav>

  <section id="market">

    <i class="fa-solid fa-bars"></i>

    <div>
      <i class="fa-solid fa-backward"></i>
      <span id="filter">
        <input type="text" placeholder="buscar">
        <label for=""><input type="checkbox"> precio</label>
        <label for=""><input type="checkbox"> checkbox2</label>
        <label for=""><input type="checkbox"> checkbox3</label>
        <label for=""><input type="checkbox"> checkbox4</label>
        <button id="buscar">buscar</button>
        <button id="filtrar">filtrar</button>
      </span>
      <span id="cart">
        <h2>carrito</h2>
        <div class="registro">
          <button>+</button>
          <p>1</p>
          <button>-</button>
          <p>pancakes</p>
          <button>x</button>

        </div>
        <button id="cancelar">cancelar</button>
        <button id="comprar">comprar</button>
      </span>
    </div>

    <div id="content">
      <span class="producto">
        <div class="filter"></div>
        <h2>pancakes</h2>
        <div>
          <p>stock: 2</p>
          <p>$220</p>
        </div>
      </span>
      <span class="producto">
        <div class="filter"></div>
        <h2>pancakes</h2>
        <div>
          <p>stock: 2</p>
          <p>$220</p>
        </div>
      </span>
      <span class="producto">
        <div class="filter"></div>
        <h2>pancakes</h2>
        <div>
          <p>stock: 2</p>
          <p>$220</p>
        </div>
      </span>
      <span class="producto">
        <div class="filter"></div>
        <h2>pancakes</h2>
        <div>
          <p>stock: 2</p>
          <p>$220</p>
        </div>
      </span>
      <span class="producto">
        <div class="filter"></div>
        <h2>pancakes</h2>
        <div>
          <p>stock: 2</p>
          <p>$220</p>
        </div>
      </span>
      <span class="producto">
        <div class="filter"></div>
        <h2>pancakes</h2>
        <div>
          <p>stock: 2</p>
          <p>$220</p>
        </div>
      </span>
      <span class="producto">
        <div class="filter"></div>
        <h2>pancakes</h2>
        <div>
          <p>stock: 2</p>
          <p>$220</p>
        </div>
      </span>
    </div>
  </section>

  <script src="assets/move.js"></script>
  <script src="assets/actions.js"></script>
  <script src="./assets/senders.js"></script>
</body>

</html>
