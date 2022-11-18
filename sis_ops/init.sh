#!/bin/bash

m_answer=0
initMenu(){
    clear
    echo "<< Gestor de entorno >>"
    echo ""
    echo "q) Salir"
    echo "1) Gestionar usuarios y grupos"
    echo "2) Actualizar sistema"
    echo "3) Conexion SSH"
    echo "4) Configurar firewall"
    echo "5) Installar MariaDB"
    echo ""
    read -p "Opcion seleccionada: " m_answer
}
m_is_in=1

while [[ $m_is_in -eq 1 ]]; do
    initMenu
    case "$m_answer" in
        [qQ])
            m_is_in=0
        ;;
        1) 
            source ./users_abm/gestor_init.sh
        ;;
        2)
            sudo yum update
            read -p "El sistema ha sido actualizado, presiones enter para continuar"
        ;;
        3)
            source ./conexion/init.sh
        ;;
        4)
            source ./firewall/firesetup.sh
        ;;
        5)
            source ./setup/mariadb.sh
        ;;
        *) 
            echo "Opcion desconocido"
        ;;
    esac
    
done

