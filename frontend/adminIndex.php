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
    
  <div id="avisos"> bienvenido de nuevo</div>

    <div id="confirmar-accion">
      <div id="cartel">
        <p>seguro que quieres eliminarlo?</p>
        <span>
          <button onclick="confirmSign('none')">cancelar</button>
          <button>confirmar</button>
        </span>
      </div>
    </div>

    <nav>
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
            <li onclick='sendToEvent()'><p>eventos</p></li>
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
          <li onclick='sendToEvent()'>
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

          <li onclick='sendToMarket()'>
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
      </ul>

    </nav>

    <!-- indice del gestor -->
    <section id="gestor_indice_responsive">
      <span class="gestion-dropdown">
        <button class="dropdown-caller" id="opciones-gestor-responsive">opciones</button>
        <div class="dropdown-menu" id="opciones-drop">
          <button id="eventos_responsive" class="eventos">eventos</button>
          <button id="productos_responsive" class="productos">productos</button>
          <button id="insumos_responsive" class="insumos">insumos</button>
          <button id="pedidos_responsive" class="pedidos">pedidos</button>
          <button id="usuarios_responsive" class="usuarios">usuarios</button>
          <button id="imagenes_responsive" class="imagenes">imagenes</button>
        </div>
      </span>

    </section>

    <section id="gestor_indice">
      <ul>
        <span class="gestion_map">
          <button id="eventos" class="dropdown-caller eventos">eventos</button>
            <div class="dropdown-menu none_display">
              <li id="mobiliarios">mobiliario</li>
              <li id="menues"> menu's</li>
              <li id="platos">platos</li>
            </div>
        </span>
        
        <span class="gestion_map">
          <button id="productos" class="dropdown-caller productos">productos</button>
          <div class="dropdown-menu none_display">
            <li id="fichasTecnicas">fichas tecnicas</li>
          </div>
        </span>

        <button id="insumos" class="insumos">insumos</button>

        <button id="pedidos" class="pedidos">pedidos</button>

        <span class="gestion_map">
          <button id="usuarios" class="dropdown-caller usuarios">usuarios</button>
          <div class="dropdown-menu none_display">
            <li id="roles">roles</li>
          </div>
        </span>

        <button id="imagenes" class="imagenes">imagenes</button>
      </ul>
    </section>
    <section id="gadgets">
      <ul>
        <!-- <button id="filtro">Filtrar</button> -->
        <input type="text" placeholder="Buscar" id="buscador">
        <button id="buscador_button">Buscar</button>
        <!-- <input type="text" placeholder="Filtrar"> -->
      </ul>
      <i class="fa-solid fa-gears manage" id="stageCaller"></i>
      <i class="fa-solid fa-backward manage"></i>
    </section>
    <section id="gestor_menu"> 
        <!-- eventos -->
        <section class="menu" id="menu_eventos">
        <!-- lista de eventos -->
        <div class="list" id="list_eventos">
        </div>
        <div class="fill"></div>
        <!-- agregar eventos -->
        <form action="" class="forms" id="form_eventos">
          <h2>Ingresar evento</h2>
          <button type="button">agregar</button>
          <input type="text" placeholder="Nombre del evento">
          <textarea name="" cols="30" rows="10" placeholder="Informacion del evento"></textarea>
          <input type="date">
          <span style="position: relative;">
            <i class="fa-solid fa-plus" id="add-encargado"></i>
            <!-- <select name="" id="select-encargado" class="select"> -->
              <!-- <option>manuela</option>
              <option>piero</option> -->
            <!-- </select> -->
            <input type="text" class="objeto encargado-input" id="name-input-encargado" placeholder="nombre">
            <input type="text" class="objeto encargado-input" id="apellido-input-encargado" placeholder="apellido">
          </span>
          <table id="encargados-list">
            <caption>encargados/s</caption>
            <tr>
              <th></th>
              <th>nombre</th>
              <th>apellido</th>
            </tr>
          </table>
          <input type="text" placeholder="Contacto">
          <input type="text" placeholder="Nombre de la ubicacion">
          <input type="number" placeholder="cantidad de personas">
          <input type="text" placeholder="tipo de servicio">
          <span style="position: relative;">
            <i class="fa-solid fa-plus" id="add-menu"></i>
            <select name="" id="select-menu" class="select">
            <option value="torta">torta</option>
            </select>
          </span>
          <table id="menu-list">
              <caption>menu</caption>
              <tr>
                <th></th>
                <th>producto</th>
              </tr>
          </table>
          <textarea name="" cols="30" rows="10" placeholder="Detalle el mobiliario del evento"></textarea>
          <!-- <input type="text" placeholder="seleccione los menu"> -->
          <span style="position: relative">
           <label for="ingresar_plano" class="cargar_file">cargar plano</label>
           <input type="file" id="ingresar_plano" class="none_border" placeholder="Plano del evento">
           <i class="fa-solid fa-check" id="plano-checked"></i>
          </span>
          <!-- <img src="" id="" alt=""> -->
          <span style="position: relative">
            <label for="event-image" class="cargar_file">cargar imagen para el evento</label>
            <input type="file" class="none_border" id="event-image" name="" placeholder="Imagen del evento">
            <i class="fa-solid fa-check" id="event-checked"></i>
          </span>
          <button type="button" >guardar</button>
          <button type="button" onclick="confirmSign('flex')">Eliminar</button>
        </form>
        </section>

        <!-- insumos -->
        <section class="menu" id="menu_insumos">
          <!-- lista de insumos -->
          <div class="list" id="list_insumos">
          </div>
          <div class="fill"></div>
          <!-- agregar insumos -->
          <form action="../backend/endpoints/remove_item_by_id.php" method="post" class="forms" id="form_insumos">
            <h2>Ingresar insumo</h2>
            <button type="button">agregar</button>
            <input type="text" name="nombre" placeholder="Nombre del insumo">
            <span>
              <input type="number" class="objeto" name="stock" value=0 min=0 >
              <select id="unidad-select" type="text" class="counter select" name="unidad" placeholder="Unidad" style="height: initial;">
                <!-- <option>kg</option>
                <option>L</option> -->
              </select>
            </span>
            <input type="number" name="precio" placeholder="precio">
            <button type="button" >guardar</button>
          <button type="button" onclick="confirmSign('flex')">Eliminar</button>
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
          <div class="fill"></div>
      <!-- agregar usuarios -->
          <form action="../backend/endpoints/remove_item_by_id.php" method="post" class="forms" id="form_usuarios">
            <h2>Ingresar usuario</h2>
            <button type="button">agregar</button>
              <input type="text" name="nombre" placeholder="Nombre de usuario">
              <input type="text" name="password" placeholder="Ingrese una contrase;a" >
              <label for="select-rol"></label>
              <select name="rol" id="select-rol" class="select">
                <!-- <option value="usuario">usuario</option>
                <option value="administrador">administrador</option> -->
              </select>
              <button type="button" >guardar</button>
              <button onclick="confirmSign('flex')">Eliminar</button>
          </form>
        </section>

      <!-- productos -->
      <section class="menu" id="menu_productos">
        <!-- lista de productos -->
        <div class="list" id="list_productos">
        </div>
        <div class="fill"></div>
  
        <!-- agregar productos -->
        <form action="../backend/endpoints/remove_item_by_id.php" method="post" class="forms stage" id="form_productos">
        <h2>Ingresar producto</h2>
        <button type="button">agregar</button>
            <input type="text" name="nombre" placeholder="Nombre del producto">
            <span style="position: relative">
             <label for="imagen_elaborado" class="cargar_file">Imagen del producto</label>
             <input type="file" id="imagen_elaborado">
             <i class="fa-solid fa-check" id="producto-checked"></i>
            </span>
            <span class="variants_system">
            <i class="fa-solid fa-plus" id="add-variant"></i>
            <p>nueva unidad</p>
            </span>
            <section id="variant_list"></section>
            <h2 style="padding: 2vw 0">Agrega una Ficha tecnica</h2>
            <span id="ingredient-field">
              <i class="fa-solid fa-plus" id="add-ingredient"></i>
              <!-- <input type="text" class="objeto" placeholder="ingrese un ingredente"> -->
              <select name="" class="objeto select" id="ingredient-select" style="height: initial;">
                <!-- <option value="harina">harina</option>
                <option value="dulce de leche"> dulce de leche</option> -->
              </select>
              <input type="number" min="1" max="100" class="counter" id="ingredient-counter" placeholder="0">
            </span>
            <!-- <section id="ingredient-list" class="table-list"></section> -->
            <table id="ingredient-list">
              <tr>
                <th></th>
                <th>insumo</th>
                <th>cantidad</th>
              </tr>
            </table>
            <textarea name="procedimiento" id="" cols="30" rows="10" placeholder="Descrba el procedmiento"></textarea>
            <input type="text" name="comment" placeholder="Ingrese un comentario">
            <button type="button" >guardar</button>
            <button onclick="confirmSign('flex')">Eliminar</button>
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
        <form action="../backend/endpoints/remove_item_by_id.php" method="post" class="forms" id="form_roles">
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
        <form action="../backend/endpoints/remove_item_by_id.php" method="post" class="forms" id="form_mobiliarios">
          <h2>Ingresar producto</h2>
            <input type="text" name="nombre" placeholder="Nombre del producto">
            <label for="imagen_elaborado" class="cargar_file">Imagen del producto</label>
            <input type="file" id="imagen_elaborado">
            <span class="variants_system">
            <i class="fa-solid fa-plus" id="add-variant"></i>
            <p>nueva unidad</p>
            </span>
            <section id="variant_list"></section>
            <h2 style="padding: 2vw 0">Agrega una Ficha tecnica</h2>
            <input type="text" name="nombre" placeholder="Nombre de la ficha tecnica">
            <span id="ingredient-field">
              <i class="fa-solid fa-plus" id="add-ingredient"></i>
              <!-- <input type="text" class="objeto" placeholder="ingrese un ingredente"> -->
              <select name="" class="objeto" id="ingredient-select">
                <!-- <option value="harina">harina</option>
                <option value="dulce de leche"> dulce de leche</option> -->
              </select>
              <input type="number" min="1" max="100" class="counter" id="ingredient-counter" placeholder="0">
            </span>
            <section id="ingredient-list" class="table-list"></section>
            <textarea name="procedimiento" id="" cols="30" rows="10" placeholder="Descrba el procedmiento"></textarea>
            <input type="text" placeholder="Ingrese un comentario">
            <button type="button" >guardar</button>
            <button onclick="confirmSign('flex')">Eliminar</button>
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
        <form action="../backend/endpoints/remove_item_by_id.php" method="post" class="forms" id="form_menus">
          <h2>Ingresar Menu</h2>
            <input type="text" name="nombre" placeholder="Nombre del menu">
            <button type="button" >guardar</button>
            <button>Eliminar</button>
        </form>
      </section>


      <!-- platos -->
      <section class="menu" id="menu_platos">
        <!-- lista de platos -->
        <div class="list" id="list_platos">
          <span>
            <h2>plato principal</h2>
          </span>
          <span>
            <h2>nombre</h2>
          </span>
        </div>
  
        <!-- agregar platos -->
        <form action="../backend/endpoints/remove_item_by_id.php" method="post" class="forms" id="form_platos">
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
        <form action="../backend/endpoints/remove_item_by_id.php" method="post" class="forms" id="form_fichas">
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
          <div class="fill"></div>

          <!-- agregar imagenes -->
          <form action="../backend/endpoints/remove_item_by_id.php" method="post" class="forms" id="form_imagenes">
            <h2>Ingresar imagen</h2>
            <button type="button">agregar</button>
            <span style="position: relative;">
              <label for="ingresar-imagen" class="cargar_file">Imagen de presentacion</label>
              <input type="file" class="none_border" id="ingresar-imagen" name="rol">
              <i class="fa-solid fa-check" id="imagen-checked"></i>
            </span>
            <button type="button" >guardar</button>
            <button onclick="confirmSign('flex')">Eliminar</button>
          </form>
        </section>

              <!-- pedidos -->
      <section class="menu" id="menu_pedidos">
        <!-- lista de pedidos -->
        <div class="list" id="list_pedidos">
          <span>
            <h2>pedido principal</h2>
          </span>
          <span>
            <h2>nombre</h2>
          </span>
        </div>
        <div class="fill"></div>
  
        <!-- agregar pedidos -->
        <form action="../backend/endpoints/remove_item_by_id.php" method="post" class="forms" id="form_pedidos">
          <h2>Ingresar pedido</h2>
          <button type="button">agregar</button>
            <input type="text" name="nombre" placeholder="Nombre del pedido">
            <span style="position: relative;">
            <i class="fa-solid fa-plus" id="add-fichTec"></i>
              <select id="select_fichTec" class="select"> 
                <!-- <option value="un producto">torta</option>  -->
              </select>
            </span>
            <!-- <section class="table-list" id="fichTec-list"></section> -->
            <table id="fichTec-list">
              <tr><th>producto</th></tr>
            </table>
            <input type="numeric" placeholder="cantidad">
            <textarea name="" id="" cols="30" rows="10" placeholder="detalles del pedido"></textarea>
            <button type="button" >guardar</button>
            <button onclick="confirmSign('flex')">Eliminar</button>
        </form>
      </section>

    </section>      
  </section>

    <footer>

      <div id="footerTitle">
        <h1>Gestornomía</h1>
      </div>

    </footer>
    
    <script src="./assets/actions.js"></script>
    <script src="./assets/gestor_menu.js"></script>
    <script src="./assets/loaders.js"></script>
    <script src="./assets/senders.js"></script>
    <script src="./assets/adminStage.js"></script>
    <script src="./assets/confirm.js"></script>
  </body>
</html>
