<?php 

    include('conexion.php');

    if(empty($_GET['usuario']))
    {
        $usuario = "";
    }else{
        $usuario = $_GET['usuario'];
    }

    if(empty($_GET['idusr']))
    {
        $idusr = "";
    }else{
        $idusr = $_GET['idusr'];
    }

    if(empty($_GET['pass']))
    {
        $contra = "";
    }else{
        $contra = $_GET['pass'];
    }

    //MODIFICACION

    //Modificacion
    $sql = "UPDATE usuario SET usuario='.$usuario.' WHERE IdUsuario ='.$idusr.'";
    if ($mysqli->query($sql) === TRUE) {
        echo "New record modify successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }



?>