<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <section id="space">
            <form action="register_verify.php" method="post" id="form_register">
                <input type="text" name="user_name" placeholder="usuario">
                <input type="password" name="user_pass" placeholder="constrasena">
                <input type="text" name="mail" placeholder="mail">
                <input type="text" name="ci" placeholder="ci">
                <button type="button" onclick="verify_data_state_register()" >Registrarme</button>
            </form>

            <form action="login_verify.php" method="post" id="form_login">
                <input type="text" name="user_name" placeholder="usuario">
                <input type="password" name="user_pass" placeholder="constrasena">
                <button type="button" onclick="verify_data_state_login()" >Iniciar sesion</button>
            </form>
        </section> 
    </body>

    <script>
    function fetch_send_login(data_set)
    {
        fetch('login_verify.php', 
        {
            method: 'POST',
            body: data_set
        })
        .then(function(response) 
        {
            if(response.ok) 
            {
                return response.text();
            } else 
            {
                throw "Error";
            }
        })
        .then(function(texto) 
        {
            // document.getElementById("message").textContent = texto;
        })
        .catch(function(err) 
        {
            console.log(err);
        });
    }

    function fetch_send_register(data_set)
    {
        fetch('register_verify.php', 
        {
            method: 'POST',
            body: data_set
        })
        .then(function(response) 
        {
            if(response.ok) 
            {
                return response.text();
            } else 
            {
                throw "Error";
            }
        })
        .then(function(texto) 
        {
            // document.getElementById("message").textContent = texto;
        })
        .catch(function(err) 
        {
            console.log(err);
        });
    }

    function verify_data_state_login() 
    {  
        const data = new FormData(document.getElementById('form_login'));
        let usr = data.get("user_name");
        let psw = data.get("user_pass");

        /*me aseguro que los datos ingresados al menos tengan 5 caracteres de lenght (lo define cada sistema)*/ 
        if(usr.length >=5 && psw.length >=5){fetch_send_login(data);}else
        {
            /*caso de error, campos vacios o con menos de 5 caracteres*/
            let form = document.querySelector("#form_login");
            if(usr.length <5){form.children[0].classList.add("error_input")}
            if(psw.length <5){form.children[1].classList.add("error_input")}
        } 
    }

    function verify_data_state_register() 
    {  
        const data = new FormData(document.getElementById('register_login'));
        let usr = data.get("user_name");
        let psw = data.get("user_pass");
        let email = data.get("email");
        let ci = data.get("ci");

        /*me aseguro que los datos ingresados al menos tengan 5 caracteres de lenght (lo define cada sistema)*/ 
        if(usr.length >=5 && psw.length >=5 && ci.length == 8 && email.length <= 10){fetch_send(data);}else
        {
            /*caso de error, campos vacios o con menos de 5 caracteres*/
            let form = document.querySelector("#register_login");
            if(usr.length <5){form.children[0].classList.add("error_input")}
            if(psw.length <5){form.children[1].classList.add("error_input")}
            if(email.length < 10){form.children[2].classList.add("error_input")}
            if(ci.length != 8){form.children[3].classList.add("error_input")}
        } 
    }
    </script>
</html> 
