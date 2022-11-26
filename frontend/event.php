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
    <link rel="stylesheet" href="assets/event_media_big.css">
    <link rel="stylesheet" href="assets/event_media_small.css">
    <title>Document</title>
</head>

<body>

    <div id="avisos"> bienvenido de nuevo</div>

    <nav id="nav">
        <ul class="ulLogo">
            <img src="assets/img/greenHat.png" />

            <div>
                <ul class="navOptions">
                    <li class="liSelected">
                        <p>inicio</p>
                    </li>
                    <li onclick='sentToEvent()'>
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
                </ul>

                <div id="mover"></div>

        <span id="navOptionsResponsive">
          <button class='dropdown-caller login-caller-sm' id=""><i class="fa-solid fa-bars"></i></button>
          <div class="dropdown-menu" id="dropdown-log-sm">
          <li class="liSelected">
            <p>inicio</p>
          </li>
          <li onclick="sentToEvent()">
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

    <section id="content">
        <div id="nav-events">
            <p>evento</p>
            <p>evento</p>
            <p>evento</p>
            <p>evento</p>
            <p>evento</p>
            <p>evento</p>
            <p>evento</p>
            <p>evento</p>
            <p>evento</p>
        </div>
        
        <div class="event-space">
            <div id="event-banner">
                <img src="./assets/img/restaurant.jpg" alt="">
                <div id="event-info">
                        <h2>nombre del evento</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi consequatur itaque assumenda atque ducimus architecto, adipisci tempore ea facilis quia ut vel doloribus libero nihil velit. Facilis odio inventore laudantium!</p>
                        <div>
                        <li>fecha</li>
                        <li>nombre de la ubicacion</li>
                        <li>tipo de evento</li>
                        <li>cantidad de personas</li>
                        <li>conteacto</li>
                        </div>
                </div>
            </div>
        </div>

    </section>

    <script src="assets/actions.js"></script>
    <script src="assets/event_loader.js"></script>
    <script src="assets/senders.js"></script>
    <script src="assets/logout.js"></script>
</body>

</html>
