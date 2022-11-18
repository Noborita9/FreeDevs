#!/bin/bash

s_answer=0
sshMenu(){
    clear
    echo "<< Gestionando Conexion >>"
    echo ""
    echo "q) Salir"
    echo "1) Cambiar Puerto"
    echo "2) Generar llave"
    echo "3) Cambiar Puerto"
    echo ""
    read -p "Opcion Selecionada: " s_answer
}

s_is_in=1

while [[ $s_is_in -eq 1 ]]; do
    sshMenu
    case "$s_answer" in
        [qQ]) 
            s_is_in=0
        ;;
        1) 
            source ./config.sh
            read -p "Nuevo puerto[1024 - 65535]: " new_port
            updatePort $new_port
            read -p "Se ha cambiado el puerto a $new_port, presione enter para continuar"
        ;;
        2)
          echo "Generando llave"
          ssh-keygen
          read -p "Llave generada, presione enter para continuar"
        ;;
        *)
            echo "Opcion desconocida"
        ;;
    esac
done

