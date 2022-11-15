<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link id="css" rel="stylesheet" href="assets/login.css" />
  <script src="https://kit.fontawesome.com/f4e70a9fbd.js" crossorigin="anonymous"></script>
</head>

<body>
  <form action="login_verify.php" method="post" id="form_login">
    <img id="imgLogo" src="./assets/img/darkHat.png" />
    <h2>sign in</h2>
    <input id="inUsuario" type="text" name="user_name" placeholder="user" />
    <section>
      <input id="inPass" type="password" name="user_pass" placeholder="password" />
      <img id="showImg" onclick="reveal()" src="./assets/img/candado.png">
    </section>
    <button id="sign" type="button" onclick="verify_data_state()">sign in now</button>
    <section id="contentColors">
    </section>
    <div class="colorMode">
      <i class="fa-solid fa-moon" id="icoMoon"></i>
      <i class="fa-solid fa-sun" id="icoSun"></i>
    </div>
  </form>
  <script src="./assets/access.js"></script>
  <script src="./assets/layout.js"></script>
  <script>
    function fetch_send(data_set) {
      fetch('login_verify.php', {
          method: 'POST',
          body: data_set,
        })
        .then(function(response) {
          if (response.ok) {
            return response.text();
          } else {
            throw "Error";
          }
        })
        .then(function(texto) {
          console.log(texto)
          if (texto == "true") {
            window.open("index.php","_self")
          }
        })
        .catch(function(err) {
          console.log(err);
        });
    }

    function verify_data_state() {
      const data = new FormData(document.getElementById('form_login'));
      let usr = data.get("user_name");
      let psw = data.get("user_pass");


      /*me aseguro que los datos ingresados al menos tengan 5 caracteres de lenght (lo define cada sistema)*/
      if (usr.length >= 5 && psw.length >= 5) {
        fetch_send(data);
      } else {
        /*caso de error, campos vacios o con menos de 5 caracteres*/
        let form = document.querySelector("#form_login");
        if (usr.length < 5) {
          form.children[0].classList.add("error_input")
        }
        if (psw.length < 5) {
          form.children[1].classList.add("error_input")
        }
      }
    }
  </script>
</body>

</html>
