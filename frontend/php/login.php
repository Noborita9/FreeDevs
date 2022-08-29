<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="assets/login.css" />
  </head>
  <body>
    <div>
      <img src="assets/img/LogoFD.png" />
      <h2>sign in</h2>
        <form  method="POST" action="freedevs/web/insercion.php" enctype="multipart/form-data">
            <input id="inUsuario" name="usuario" value="usuario">
            <input id="inPass" name="contra" value="contra">
            <button id="sign" type="send">enviar</button>
        </form>
        <!-- <input id="inUsuario" type="text" placeholder="user" /> -->
        <!-- <input id="inPass" type="password" placeholder="password" /> -->
        <!-- <button id="sign" onclick="getData()">sign in now</button> -->
    </div>
    <script src="./assets/acces.js"></script>
  </body>
</html>
