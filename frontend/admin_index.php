<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/f4e70a9fbd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/style.css" />
    <title>Admin</title>
  </head>
  <body>
    <nav>
      <ul class="ulLogo">
        <img src="assets/img/LogoFDWhite.png" />
        <!-- <ul>
          <li class="liSelected">Inicio</li>
          <li>Stock</li>
          <li>Productos</li>
          <li>Fichas Tecnicas</li>
          <li>Eventos</li>
          <li>Usuarios</li>
        </ul> -->
        <a href="login.html"><i class="fa-solid fa-user"></i></a>
      </ul>
    </nav>

    <!-- indice del gestor -->
    <section id="gestor_indice">
      <ul>
        <li id="insumos">insumos</li>
        <li id="eventos">eventos</li>
      </ul>
    </section>

    <section id="gestor_menu"> 
        <!-- eventos -->
        <section id="menu_eventos">
        <!-- lista de eventos -->
        <div id="list_eventos"></div>
        <!-- agregar eventos -->
        <form action="" id="evento_form">
          <h2>Ingresar evento</h2>
          <input type="text" placeholder="Nombre del evento">
          <textarea name="" cols="30" rows="10" placeholder="Informacion del evento"></textarea>
          <input type="file" name="" placeholder="Imagen del evento">
          <button>Agregar evento</button>
        </form>
        </section>

        <!-- insumos -->
        <section id="menu_insumos">
          <!-- lista de insumos -->
          <div id="list_insumos">
            <span>
              <h2>nombre</h2>
              <span class="list_sub_data">
                <p>stock</p>
                <p>unidad</p>
              </span>
            </span>
            <span>
              <h2>nombre</h2>
              <span class="list_sub_data">
                <p>stock</p>
                <p>unidad</p>
              </span>
            </span>
            <span>
              <h2>nombre</h2>
              <span class="list_sub_data">
                <p>stock</p>
                <p>unidad</p>
              </span>
            </span>
            <span>
              <h2>nombre</h2>
              <span class="list_sub_data">
                <p>stock</p>
                <p>unidad</p>
              </span>
            </span>
            <span>
              <h2>nombre</h2>
              <span class="list_sub_data">
                <p>stock</p>
                <p>unidad</p>
              </span>
            </span>
            <span>
              <h2>nombre</h2>
              <span class="list_sub_data">
                <p>stock</p>
                <p>unidad</p>
              </span>
            </span>
            <span>
              <h2>nombre</h2>
              <span class="list_sub_data">
                <p>stock</p>
                <p>unidad</p>
              </span>
            </span>
            <span>
              <h2>nombre</h2>
              <span class="list_sub_data">
                <p>stock</p>
                <p>unidad</p>
              </span>
            </span>
          </div>

          <!-- agregar insumos -->
          <form action="../backend/api/create_insumo.php" method="post" id="insumo_form">
            <h2>Ingresar insumo</h2>
            <input type="text" name="nombre" placeholder="Nombre del insumo">
            <input type="number" name="stock" value=0 min=0 >
            <input type="text" name="unidad" placeholder="Unidad de medida">
            <button type="button" onclick="verify_fetch_insumo()">SUBIR</button>
          </form>
        </section>
    </section>

    <footer>
      <div class="divLeft">
        <ul>
          <a href=""><li>Terminos y Servicios</li></a>
          <a href=""><li>Cookies</li></a>
          <a href=""><li>Peñarol tiene</li></a>
        </ul>
      </div>
      <div id="footerTitle"><h1>Gestornomía</h1></div>
      <div class="divRight">
        <ul>
          <a href=""><li>About Us</li></a>
          <a href=""><li>Contact</li></a>
          <a href=""><li>5 Libertadores</li></a>
        </ul>
      </div>
    </footer>
    <script src="./assets/gestor_menu.js"></script>
    <script src="./assets/gestion_state.js"></script>
    <script src="./assets/loaders.js"></script>

  </body>
</html>
