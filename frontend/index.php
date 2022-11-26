<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/f4e70a9fbd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/index_media_big.css">
    <link rel="stylesheet" href="assets/index_media_small.css">
    <title>Document</title>
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
                    <li class="liSelected">
                        <p>inicio</p>
                    </li>
                    <li onclick='sentToEvent()'>
                        <p>eventos</p>
                    </li>
                    <li onclick='location.href="#nosotros"'>
                        <p>nosotros</p>
                    </li>
                    <li onclick='location.href="#formularioContacto"'>
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
          <li onclick='location.href="."'>
            <p>nosotros</p>
          </li>
          <li onclick='location.href="#formularioContacto"'>
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
                        <?php if (strcmp($_SESSION["rol"], "usuario") == 0 || strcmp($_SESSION["rol"], "admin") == 0) {
                            echo '
            <li ><a href="logout.php">log out</a></li>
          ';
                        } else {
                            echo '
            <li ><a href="login.php">log in</a></li>
            ';
                        }
                        ?>
                    </div>
                </span>

        <span id="logOutOptions">
          <button class='dropdown-caller' id="login-caller-bg"><i class="fa-solid fa-user"></i></button>
          <div class="dropdown-menu" id="dropdown-log-bg">
          <?php if (strcmp($_SESSION["rol"], "usuario") == 0 || strcmp($_SESSION["rol"], "admin") == 0) {
            echo '
            <a href="logout.php"> <i class="fa-solid fa-door-open"></i> log out</a>
          ';
                        } else {
                            echo '
            <a href="login.php"> <i class="fa-solid fa-door-open"></i> log in</a>
            ';
                        }
                        ?>
                    </div>
                </span>
            </div>
        </ul>

    </nav>

    <section id="carrusel">
        <div>
            <img src="assets/img/hamburger.jpg">
            <img src="assets/img/pancakes.jpg">
            <img src="assets/img/charcuterie.jpg">
            <img src="assets/img/meatloaf.jpg">
            <img src="assets/img/pancakes2.jpg">
            <img src="assets/img/hamburger.jpg">
        </div>
    </section>


    <section id="event_container">
      
    </section>

  <section id="nosotros">
    <div id="test-bg"></div>
    <img src="assets/img/restaurant.jpg" alt="">
    <div id="nosotros-text">
      <p>Somos un grupo de estudiantes de Gastronomía de la Escuela Técnica Solymar, ubicada en Solymar Norte. Nos hemos capacitado en elaboración de primorosos y deleitables platos que ofrecemos en distintos tipos de eventos, contemplando la variedad de gustos de los asistentes.</p>
    </div>
  </section>

  <section id="formularioContacto">
    <a href="#nav"><i class="fa-solid fa-circle-arrow-up"></i></a>
    <form action="">
      <div>
        <input type="text" placeholder="nombre">
        <input type="text" placeholder="apellido">
      </div>
      <input type="email" placeholder="e-mail">
      <input type="number" placeholder="numero de telefono">
      <div>
        <textarea name="" id="" cols="30" rows="10" placeholder="que nos quiere comunicar?"></textarea>
        <button>enviar</button>
      </div>
    </form>
  </section>

    <script src="assets/actions.js"></script>
    <script src="assets/event_loader.js"></script>
    <script src="assets/senders.js"></script>
    <script src="assets/logout.js"></script>
</body>

</html>
