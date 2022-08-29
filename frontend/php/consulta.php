<?php

    include("conexion.php");

    /*Consultas a BD del primer valor cargado en tabla usuario.

    //si el resultado de la consulta existe
    if($resultado_boxconsulta = $mysqli->query("SELECT usuario, pass FROM usuario LIMIT 1"))
    {
        $total_num_rows =  $resultado_boxconsulta->num_rows; //variable de total de columnas
        $row_boxconsulta = $resultado_boxconsulta->fetch_assoc(); //las columnas pasadas a datos
    }
    echo $row_boxconsulta['usuario'].'<br>';
    echo $row_boxconsulta['pass'].'<br>'.'<br>';
    */


    //Consulta a base de datos recorriendo todos los valores.

    //si el resultado de la consulta existe
    if($resultado_boxconsulta_todo = $mysqli->query("SELECT usuario, pass, IdUsuario FROM usuario  "))
    {
        $total_num_rows_todo =  $resultado_boxconsulta_todo->num_rows; //variable de total de columnas
        $row_boxconsulta_todo = $resultado_boxconsulta_todo->fetch_assoc(); //las columnas pasadas a datos
    }

    do{
        echo $row_boxconsulta_todo['usuario'].'<br>';
        echo $row_boxconsulta_todo['pass'].'<br>';
        echo $row_boxconsulta_todo['IdUsuario'].'<br>';

        $ejemplo_nuevo_usuario = "peperoni";
        $ejemplo_nueva_pass = "prepre123";

        echo '<a href="modificacion.php?usuario='.$ejemplo_nuevo_usuario.'&pass='.$ejemplo_nueva_pass.'&idusr='.$row_boxconsulta_todo['IdUsuario'].'">modificar usuario</a>'.'<br>'.'<br>';
    }while($row_boxconsulta_todo = $resultado_boxconsulta_todo->fetch_assoc());
?>