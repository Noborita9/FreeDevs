#!/bin/bash
function menu {
     clear
     echo "Bienvenido al Menu"
     echo "Presione 1 para ver los inicios de sesión exitosos"
     echo "Presione 2 para ver los inicios de sesión fallidos"
     echo "Presione 3 para salir"
     read -n1 key
     if [[ $key == "1" ]]; then
        log=`last`
        last
        echo "¿Generar un reporte? (SI = 1, NO = 2)"
        read -n1 reportConfirm
        if [[ $reportConfirm == "1" ]]; then
          echo "`last`" >> "$(date +"%Y_%m_%d_%I_%M_%p").log"
          echo "Reporte generado exitosamente"
        fi
        echo "Presione una tecla para volver al menu"
        read -n1 exitOnPress
        menu
     elif [[ $key == "2" ]]; then
        log=`sudo lastb`

        sudo lastb
        echo "¿Generar un reporte? (SI = 1, NO = 2)"
        read -n1 reportConfirm
        if [[ $reportConfirm == "1" ]]; then
#          echo `sed -i 's/)/)\n/g' "$(sudo lastb)"` >> "$(date +"%Y_%m_%d_%I_%M_%p").log"
          echo "`sudo lastb`" >> "$(date +"%Y_%m_%d_%I_%M_%p").log"
          echo "Reporte generado exitosamente"
        fi
        echo "Presione una tecla para volver al menu"
        read -n1 exitOnPress
        menu
     elif [[ $key == "3" ]]; then
        exit
     fi
     menu
}
menu
