<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./assets/login.css" />
  </head>
  <body>
    <form action="login_verify.php" method="post" id="form_login">
      <img src="./assets/img/LogoFD.png" />
      <h2>sign in</h2>
      <input id="inUsuario" type="text" name="user_name" placeholder="user" />
      <section>
        <input id="inPass" type="password" name="user_pass" placeholder="password"/>
        <img id="showImg" onclick="reveal()" src="./assets/img/candado.png">
      </section>
      <button id="sign" type="button" onclick="verify_data_state()">sign in now</button>
      <section id="contentColors">
      </section>
    </form>
    <script src="./assets/acces.js"> 
    </script>
  </body>
</html>

<script> 
  function fetch_send(data_set)
  {
      fetch('login_verify.php', 
      {
          method: 'POST',
          body: data_set,
      })
      .then(function(response) 
      {
          if(response.ok) 
          {
              window.location.replace("./index.html")
              return response.text();
          } else 
          {
              throw "Error";
          }
      })
      .then(function(texto) 
      {
          // Aca deberia reenviar al user .. creo
          console.log(texto)
      })
      .catch(function(err) 
      {
          console.log(err); });
  }

  function verify_data_state() 
  {  
      const data = new FormData(document.getElementById('form_login'));
      let usr = data.get("user_name");
      let psw = data.get("user_pass");
      
      
      /*me aseguro que los datos ingresados al menos tengan 5 caracteres de lenght (lo define cada sistema)*/ 
      if(usr.length >=5 && psw.length >=5){fetch_send(data);}else
      {
          /*caso de error, campos vacios o con menos de 5 caracteres*/
          let form = document.querySelector("#form_login");
          if(usr.length <5){form.children[0].classList.add("error_input")}
          if(psw.length <5){form.children[1].classList.add("error_input")}
      } 
  }
</script>
