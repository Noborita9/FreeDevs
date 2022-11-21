#!/bin/bash
source ./users_abm/shared.sh

register_file_change $new_file_location "./users_abm/group_gestor.sh"

g_answer=0
g_show_menu() {
	clear
	echo "<< Gestionando GRUPOS >>"
	echo ""
	echo "q) Exit"
	echo "1) Mostrar grupos"
	echo "2) Agregar grupo"
	echo "3) Eliminar grupo"
	echo "4) Gestionar grupo"
	echo ""
	read -p "Opcion seleccionada: " g_answer
}
mg_answer=0
mod_group_menu(){
    clear
    echo "<< Gestionando $1"
    echo ""
    echo "1) Agregar usuario al grupo"
    echo "2) Eliminar usuario del grupo"
    echo ""
    read -p "Opcion seleccionada" mg_answer
}

g_is_in=1

while [[ $g_is_in -eq 1 ]]; do
	g_show_menu
	case "$g_answer" in
	[qQ])
		g_is_in=0
		;;
	1)
		show_groups
		read -rsp $'Presione enter para continuar...\n'
		;;
	2)
		read -p "Nombre del nuevo grupo[q para cancelar]: " new_group_name
		if [[ $new_group_name == "q" ]] || [[ $new_group_name == "Q" ]] || [[ -z $new_group_name ]]; then
			echo "No se ha agregado un nuevo grupo"
		else
			sudo groupadd $new_group_name
			echo "$new_group_name ha sido agregado"
            make_register $new_file_location "Ha agregado el grupo $new_group_name"
		fi
		;;
	3)
		read -p "Nombre del grupo a eliminar[q para cancelar]: " del_group
		if [[ $del_group == "q" ]] || [[ $del_group == "Q" ]] || [[ -z $del_group ]]; then
			echo "No se ha eliminado ningun usuario"
		else
            sudo groupdel $del_group
			echo "$del_group ha sido eliminado"
            make_register $new_file_location "Ha eliminado al grupo $del_group"
		fi
		;;
	4)
        read -p "Nombre del grupo a gestionar[q para cancelar]: " mod_group
		if [[ $mod_group == "q" ]] || [[ $mod_group == "Q" ]] || [[ -z $mod_group ]]; then
            echo "No se getionara ningun grupo ahora"
        else
            mg_is_in=1
            while [[ $mg_is_in -eq 1 ]]; do
                mod_group_menu $mod_group
                case $mg_answer in
                    1) 
                        read -p "Nombre del usuario a agregar[q para cancelar]: " mod_agr_user
                        if [[ $mod_agr_user == "q" ]] || [[ $mod_agr_user == "Q" ]] || [[ -z $mod_agr_user ]]; then
                            echo "No se agrego ningun usuario del grupo $mod_del_user"
                        else
                            sudo gpasswd -a $mod_del_user $mod_group
                            echo "$mod_del_user ha sido agregado a $mod_group"
                            make_register $new_file_location "Ha agregado a $mod_del_user al grupo $mod_group"
                        fi
                    ;;
                    2) 
                        read -p "Nombre del usuario a eliminar[q para cancelar]: " mod_del_user
                        if [[ $mod_del_user == "q" ]] || [[ $mod_del_user == "Q" ]] || [[ -z $mod_del_user ]]; then
                            echo "No se elimino ningun usuario del grupo $mod_del_user"
                        else
                            sudo gpasswd -d $mod_del_user $mod_group
                            echo "$mod_del_user ha sido eliminado de $mod_group"
                            make_register $new_file_location "Ha eliminado a $mod_del_user de $mod_group"
                        fi
                    ;;
                    *) echo default
                    ;;
                esac
                
            done
            
        fi
    ;;
	*)
		echo "No conosco esa opcion"
		;;
	esac
done
