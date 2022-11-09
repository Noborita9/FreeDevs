<?php
session_start();
if (strcmp($_SESSION["rol"], "admin") != 0) {
  header("Location: ./login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/f4e70a9fbd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/adminindex_media_big.css">
    <link rel="stylesheet" href="assets/adminindex_media_small.css">
    <title>Admin</title>
  </head>
  <body>
    <nav>
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
          <span>
            <button class='dropdown-caller'><i class="fa-solid fa-user"></i></button>
            <div class="dropdown-menu">
              <a href="login.php"> <i class="fa-solid fa-door-open"></i> log in</a>
            </div>
          </span>
        </div>
      </ul>
    </nav>

    <!-- indice del gestor -->
    <section id="gestor_indice">
      <ul>
        <li id="insumos">insumos</li>
        <li id="eventos">eventos</li>
        <li id="productos">productos</li>
        <li id="usuarios">usuarios</li>
        <li id="roles">roles</li>
        <li id="mobiliarios">mobiliario</li>
        <li id="menues">menu's</li>
        <li id="platos">platos</li>
        <li id="fichasTecnicas">fichas tecnicas</li>
        <li id="imagenes">imagenes</li>
      </ul>
    </section>
    <section id="gadgets">
      <ul>
        <button id="filtro">Filtrar</button>
        <input type="text" placeholder="Buscar" id="buscador">
        <button id="buscador_button">Buscar</button>
        <!-- <input type="text" placeholder="Filtrar"> -->
      </ul>
    </section>
    <section id="gestor_menu"> 
        <!-- eventos -->
        <section class="menu" id="menu_eventos">
        <!-- lista de eventos -->
        <div class="list" id="list_eventos">
        </div>
        <!-- agregar eventos -->
        <form action="" class="forms" id="form_eventos">
          <h2>Ingresar evento</h2>
          <input type="text" placeholder="Nombre del evento">
          <textarea name="" cols="30" rows="10" placeholder="Informacion del evento"></textarea>
          <input type="date">
          <input type="text" placeholder="Encargado">
          <input type="text" placeholder="Contacto">
          <input type="text" placeholder="Nombre de la ubicacion">
          <input type="text" placeholder="Link de la ubicacion">
          <input type="number" placeholder="cantidad de personas">
          <input type="text" placeholder="tipo de servicio">
          <input type="text" placeholder="seleccione el mobiliario">
          <input type="text" placeholder="seleccione los menu">
          <label for="ingresar_plano" class="cargar_file">cargar plano</label>
          <input type="file" id="ingresar_plano" class="none_border" placeholder="Plano del evento">
          <label for="ingresar_plano" class="cargar_file">cargar imagen para el evento</label>
          <input type="file" class="none_border" name="" placeholder="Imagen del evento">
          <button type="button" >guardar</button>
          <button type="button">Eliminar</button>
        </form>
        </section>

        <!-- insumos -->
        <section class="menu" id="menu_insumos">
          <!-- lista de insumos -->
          <div class="list" id="list_insumos">
          </div>

          <!-- agregar insumos -->
          <form action="../backend/api/create_insumo.php" method="post" class="forms" id="form_insumos">
            <h2>Ingresar insumo</h2>
            <input type="text" name="nombre" placeholder="Nombre del insumo">
            <span>
              <input type="number" class="objeto" name="stock" value=0 min=0 >
              <input type="text" class="counter" name="unidad" placeholder="Unidad">
            </span>
            <input type="number" name="precio" placeholder="precio">
            <button type="button" >guardar</button>
          <button type="button">Eliminar</button>
          </form>
        </section>

        <!-- usuarios -->
        <section class="menu" id="menu_usuarios">
          <!-- lista de usuarios -->
          <div class="list" id="list_usuarios">
            <span>
              <h2>Juan</h2>
              <p>Usuario</p>
            </span>
            <span>
              <h2>nombre</h2>
              <p>Rol</p>
            </span>
          </div>
      <!-- agregar usuarios -->
          <form action="../backend/api/create_insumo.php" method="post" class="forms" id="form_usuarios">
            <h2>Ingresar usuario</h2>
              <input type="text" name="nombre" placeholder="Nombre de usuario">
              <input type="text" name="password" placeholder="Ingrese una contrase;a" >
              <input type="text" name="rol" placeholder="Rol que ocupara en el sistema">
              <button type="button" >guardar</button>
              <button>Eliminar</button>
          </form>
        </section>

      <!-- productos -->
      <section class="menu" id="menu_productos">
        <!-- lista de productos -->
        <div class="list" id="list_productos">
          <span>
            <h2>Hamburguesa con queso de cabra</h2>
            <p>$330</p>
          </span>
          <span>
            <h2>nombre</h2>
            <p>precio</p>
          </span>
        </div>
  
        <!-- agregar productos -->
        <form action="../backend/api/create_insumo.php" method="post" class="forms" id="form_productos">
          <h2>Ingresar producto</h2>
            <input type="text" name="nombre" placeholder="Nombre del producto">
            <input type="number" name="password" placeholder="precio" >
            <label for="ingresar_plano" class="cargar_file">Imagen del producto</label>
            <input type="file" class="none_border" name="rol">
            <button type="button" >guardar</button>
            <button>Eliminar</button>
        </form>
      </section>

      <!-- roles -->
      <section class="menu" id="menu_roles">
        <!-- lista de roles -->
        <div class="list" id="list_roles">
          <span>
            <h2>vendedor</h2>
          </span>
          <span>
            <h2>nombre</h2>
          </span>
        </div>
  
        <!-- agregar roles -->
        <form action="../backend/api/create_insumo.php" method="post" class="forms" id="form_roles">
          <h2>Ingresar Rol</h2>
            <input type="text" name="nombre" placeholder="Nombre del rol">
            <button type="button" >guardar</button>
            <button>Eliminar</button>
        </form>
      </section>

      <!-- mobiliario -->
      <section class="menu" id="menu_mobiliarios">
        <!-- lista de mobiliario -->
        <div class="list" id="list_moiliarios">
          <span>
            <h2>mesas</h2>
          </span>
          <span>
            <h2>nombre</h2>
          </span>
        </div>
  
        <!-- agregar mobiliarios -->
        <form action="../backend/api/create_insumo.php" method="post" class="forms" id="form_mobiliarios">
          <h2>Ingresar Mobiliario</h2>
            <input type="text" name="nombre" placeholder="Nombre del mobiliario">
            <button type="button" >guardar</button>
            <button>Eliminar</button>
        </form>
      </section>

      <!-- menues -->
      <section class="menu" id="menu_menues">
        <!-- lista de menues -->
        <div class="list" id="list_menues">
          <span>
            <h2>menu premium</h2>
          </span>
          <span>
            <h2>nombre</h2>
          </span>
        </div>
  
        <!-- agregar menues -->
        <form action="../backend/api/create_insumo.php" method="post" class="forms" id="form_menus">
          <h2>Ingresar Menu</h2>
            <input type="text" name="nombre" placeholder="Nombre del menu">
            <button type="button" >guardar</button>
            <button>Eliminar</button>
        </form>
      </section>


      <!-- platos -->
      <section class="menu" id="menu_platos">
        <!-- lista de mobiliario -->
        <div class="list" id="list_platos">
          <span>
            <h2>plato principal</h2>
          </span>
          <span>
            <h2>nombre</h2>
          </span>
        </div>
  
        <!-- agregar mobiliarios -->
        <form action="../backend/api/create_insumo.php" method="post" class="forms" id="form_platos">
          <h2>Ingresar plato</h2>
            <input type="text" name="nombre" placeholder="Nombre del plato">
            <button type="button" >guardar</button>
            <button>Eliminar</button>
        </form>
      </section>

      <!-- fichas tecnicas -->
      <section class="menu" id="menu_fichasTecnicas">
        <!-- lista de fichas tecnicas -->
        <div class="list" id="list_fichasTecnincas">
          <span>
            <h2>pizza con pi;a</h2>
          </span>
          <span>
            <h2>nombre</h2>
          </span>
        </div>
  
        <!-- agregar fchas tecncas -->
        <form action="../backend/api/create_insumo.php" method="post" class="forms" id="form_fichas">
          <h2>Ingresar Ficha tecnica</h2>
            <input type="text" name="nombre" placeholder="Nombre de la ficha tecnica">
            <span>
              <input type="text" class="objeto" placeholder="ingrese un ingredente">
              <input type="number" class="counter" placeholder="0">
            </span>
            <textarea name="procedimiento" id="" cols="30" rows="10" placeholder="Descrba el procedmiento"></textarea>
            <input type="text" placeholder="Ingrese un comentario">
            <button type="button" >guardar</button>
            <button>Eliminar</button>
        </form>
      </section>

        <!-- imagenes de presentacion -->
        <section class="menu" id="menu_imagenes">
          <!-- lista de imagenes -->
          <div class="list" id="list_imagenes">
            <span>
              <img src="" alt="">
            </span>
            <span>
              <h2>imagen</h2>
            </span>
          </div>

          <!-- agregar imagenes -->
          <form action="../backend/api/create_insumo.php" method="post" class="forms" id="form_imagenes">
            <h2>Ingresar imagen</h2>
            <label for="ingresar_plano" class="cargar_file">Imagen de presentacion</label>
            <input type="file" class="none_border" name="rol">
            <button type="button" >guardar</button>
            <button>Eliminar</button>
          </form>
        </section>

    </section>      
  </section>

    <footer>

      <div id="footerTitle">
        <h1>Gestornomía</h1>
      </div>

    </footer>
    
    <script src="assets/actions.js"></script>
    <script src="./assets/gestor_menu.js"></script>
    <script src="./assets/loaders.js"></script>
    <script src="./assets/senders.js"></script>
  </body>
</html>
