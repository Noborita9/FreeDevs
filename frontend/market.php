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

      <?php if (strcmp($_SESSION["rol"], "usuario") == 0 || strcmp($_SESSION["rol"], "admin") == 0) {
            echo '
        <p id="userName">'.$_SESSION["username"].'</p>
          ';}
          ?>

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
          <li class="liSelected" onclick="sendToIndex()">
            <p>inicio</p>
          </li>
          <li onclick="sendToEvent()">
            <p>eventos</p>
          </li>
          <li onclick="sendToIndex()">
            <p>nosotros</p>
          </li>
          <li onclick="sendToIndex()">
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
        <button id="filtrar">filtrar</button>
        <button id="clean-filtrar">limpiar filtros</button>
        <button id="buscar">buscar</button>
      </span>

      <span id="cart">
      <h2>carrito</h2>
        <!-- <div id="prod_${id}" class="registro">
          <button onclick='chargeItem(${item["id"]}, 1)'>+</button>
          <p id='stock_${item["id"]}'>${charged_items.get(id).stock}</p>
          <button onclick='chargeItem(${item["id"]}, -1)'>-</button>
          <p>${item["nombre"].slice(0,10)}</p>
          <button onclick='removeItem(${item["id"]})'>x</button>
        </div> -->

        <div class="new-register"></div>

        <div class="new-register">
          <p class="register-title">pizza con pi;a</p>
          <div class="register-options">
            <button><i class="fa-solid fa-trash"></i></button>
            <button><i class="fa-solid fa-plus"></i></button>
            <p>200</p>
            <button><i class="fa-solid fa-minus"></i></button>
            <p class="">3000</p>
          </div>
        </div>

        <div class="new-register">
          <p class="register-title">pizza con pi;a</p>
          <div class="register-options">
            <button><i class="fa-solid fa-trash"></i></button>
            <button><i class="fa-solid fa-plus"></i></button>
            <button><i class="fa-solid fa-minus"></i></button>
            <p class="">3000</p>
          </div>
        </div>

        <div class="new-register">
          <p class="register-title">pizza con pi;a</p>
          <div class="register-options">
            <button><i class="fa-solid fa-trash"></i></button>
            <button><i class="fa-solid fa-plus"></i></button>
            <button><i class="fa-solid fa-minus"></i></button>
            <p class="">3000</p>
          </div>
        </div>

        <div class="new-register">
          <p class="register-title">pizza con pi;a</p>
          <div class="register-options">
            <button><i class="fa-solid fa-trash"></i></button>
            <button><i class="fa-solid fa-plus"></i></button>
            <button><i class="fa-solid fa-minus"></i></button>
            <p class="">3000</p>
          </div>
        </div>

        <div class="new-register">
          <p class="register-title">pizza con pi;a</p>
          <div class="register-options">
            <button><i class="fa-solid fa-trash"></i></button>
            <button><i class="fa-solid fa-plus"></i></button>
            <button><i class="fa-solid fa-minus"></i></button>
            <p class="">3000</p>
          </div>
        </div>

        <div class="new-register">
          <p class="register-title">pizza con pi;a</p>
          <div class="register-options">
            <button><i class="fa-solid fa-trash"></i></button>
            <button><i class="fa-solid fa-plus"></i></button>
            <button><i class="fa-solid fa-minus"></i></button>
            <p class="">3000</p>
          </div>
        </div>

        <div class="new-register">
          <p class="register-title">pizza con pi;a</p>
          <div class="register-options">
            <button><i class="fa-solid fa-trash"></i></button>
            <button><i class="fa-solid fa-plus"></i></button>
            <button><i class="fa-solid fa-minus"></i></button>
            <p class="">3000</p>
          </div>
        </div>

        <div class="new-register">
          <p class="register-title">pizza con pi;a</p>
          <div class="register-options">
            <button><i class="fa-solid fa-trash"></i></button>
            <button><i class="fa-solid fa-plus"></i></button>
            <button><i class="fa-solid fa-minus"></i></button>
            <p class="">3000</p>
          </div>
        </div>

        <div class="new-register">
          <p class="register-title">pizza con pi;a</p>
          <div class="register-options">
            <button><i class="fa-solid fa-trash"></i></button>
            <button><i class="fa-solid fa-plus"></i></button>
            <button><i class="fa-solid fa-minus"></i></button>
            <p class="">3000</p>
          </div>
        </div>

        <div class="new-register">
          <p class="register-title">pizza con pi;a</p>
          <div class="register-options">
            <button><i class="fa-solid fa-trash"></i></button>
            <button><i class="fa-solid fa-plus"></i></button>
            <button><i class="fa-solid fa-minus"></i></button>
            <p class="">3000</p>
          </div>
        </div>
        
      </span>

      <span id="compra-detalles">
          <div id="monto">
            <p>monto final:</p>
            <p>$27800000000</p>
          </div>
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
