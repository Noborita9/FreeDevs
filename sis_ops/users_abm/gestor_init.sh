#!/bin/bash
source ./users_abm/shared.sh

register_access

answer=0

print_menu() {
	clear
	echo "<< Bienvenido al gestor de usuarios y grupos >>"
	echo ""
	echo "q) Salir"
	echo "1) Gestionar USUARIOS"
	echo "2) Gestionar GRUPOS"
	echo ""
	read -p "Opcion selecionada: " answer
}
is_in=1

while [[ $is_in -eq 1 ]]; do
	print_menu
	case $answer in
	[qQ])
		is_in=0
		;;
	1)
		source ./users_abm/user_gestor.sh
        register_file_change $new_file_location $0
		;;
	2)
		source ./users_abm/group_gestor.sh
        register_file_change $new_file_location $0 #./gestor_init.sh
		;;
	*)
		echo "La opcion no existe o es incorrecta"
		;;
	esac
done
