<?php
    include('conexion.php');

    /*
        en las siguientes lineas se verifica que los datos que recibimos mediante POST no esten vacios.
        es importante destacar que los datos que recibimos tienen un nombre establecido en base al atributo
        'name' del form de html.
    */
    
    if(empty($_POST['usuario']))
    {
        $usuario = "";
    }else{
        $usuario = $_POST['usuario'];
    }
    
    if(empty($_POST['contra']))
    {
        $contra = "";
    }else{
        $contra = $_POST['contra'];
    }
    
    if(empty($_POST['nombre']))
    {
        $nombre = "";
    }else{
        $nombre = $_POST['nombre'];
    }

    /*
    ejemplo de GET
    if(empty($_GET['apellido'])){
        $apellido = "";
    }else{
        $apellido = $_GET['apellido'];
    }
    
    if(empty($_GET['correo'])){
        $correo = "";
    }else{
        $correo = $_GET['correo'];
    }
    
    
    echo $apellido;
    echo "<br>";
    echo $correo;
    */
    
    //INSERCION
    
    $sql = "INSERT INTO usuario VALUES (NULL,'".$usuario."', '".$contra."', '".$nombre."')";
    
    if ($mysqli->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    
    
?>
