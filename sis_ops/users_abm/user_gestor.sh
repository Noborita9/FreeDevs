#!/bin/bash
source ./users_abm/shared.sh

register_file_change $new_file_location "./users_abm/user_gestor.sh"

u_answer=0
show_menu() {
	clear
	echo "<< Gestionando USUARIOS >>"
	echo ""
	echo "q) Exit"
	echo "1) Mostrar usuarios"
	echo "2) Agregar usuarios"
	echo "3) Eliminar usuarios"
	echo "4) Cambiar permisos de usuarios"
	echo ""
	read -p "Opcion seleccionada: " u_answer
}

m_answer=0
modify_menu() {
	echo "Modificando a $1"
	echo ""
	echo "q) Salir"
	echo "1) Cambiar nombre"
	echo "2) Cambiar directorio home"
	echo "3) Agregarle otro grupo"
	echo "4) Agregar fecha de vencimiento"
	echo ""
	read -p "Opcion seleccionada: " m_answer
}

u_is_in=1

while [[ $u_is_in -eq 1 ]]; do
	show_menu
	case "$u_answer" in
	[qQ])
		u_is_in=0
		;;
	1)
		echo ""
		cat /etc/passwd | grep -v /nologin | cut -d: -f1
		read -rsp $'\nPresione enter para continuar...\n'
		;;
	2)
		read -p "Nombre del nuevo usuario[q para cancelar]: " new_user_name
		if [[ $new_user_name == "q" ]] || [[ $new_user_name == "Q" ]] || [[ -z $new_user_name ]]; then
			echo "No se ha agregado un nuevo usuario"
		else
			read -p "Desea agregarlo a un grupo existente?: " existing_group
			if [[ $existing_group == "q" ]] || [[ $existing_group == "Q" ]] || [[ -z $existing_group ]]; then
                if [[ $(getent group $new_user_name) ]]; then
				    sudo useradd $new_user_name -g $new_user_name
                fi
				sudo useradd $new_user_name
				echo "$new_user_name ha sido agregado"
                make_register $new_file_location "Ha agregado a $new_user_name"            
			else
				sudo useradd $new_user_name -g $existing_group
				echo "$new_user_name ha sido agregado a $existing_group"
                make_register $new_file_location "Ha agregado a $new_user_name al grupo $existing_group"            
			fi
		fi
		;;
	3)
		read -p "Nombre del usuario a eliminar[q para cancelar]: " del_user
		if [[ $del_user == "q" ]] || [[ $del_user == "Q" ]] || [[ -z $del_user ]]; then
			echo "No se ha eliminado ningun usuario"
		else
			sudo userdel -rf $del_user
			echo "$del_user ha sido eliminado"
            make_register $new_file_location "Ha eliminado a $del_user"
		fi
		;;
	4)
        echo "Los posibles usuarios son: "
		cat /etc/passwd | grep -v /nologin | cut -d: -f1
		read -p "Nombre del usuario a modificar[q para cancelar]: " mod_user
		if [[ $mod_user == "q" ]] || [[ $mod_user == "Q" ]] || [[ -z $mod_user ]]; then
			echo "No se ha modificado ningun usuario"
		else
			mod_user_in=1
            make_register $new_file_location "Ha entrado a modificar a $mod_user"
			while [[ $mod_user_in -eq 1 ]]; do
				modify_menu $mod_user
				case "$m_answer" in
				[qQ])
					mod_user_in=0
					;;
				1)
					read -p "Ingrese el nuevo nombre[q para cancelar]: " new_mod_name
					if [[ $new_mod_name == "q" ]] || [[ $new_mod_name == "Q" ]] || [[ -z $new_mod_name ]]; then
						echo "No se ha cambiado el nombre"
					else
						sudo usermod -l $new_mod_name $mod_user
						echo "$mod_user ahora es $new_mod_name"
                        make_register $new_file_location "Ha cambiado el nombre de $mod_user a $new_mod_name"
						mod_user=$new_mod_name
					fi
					;;
				2)
					read -p "Ingrese una nueva direcion[q para cancelar]: " new_home_dir
					if [[ $mod_user == "q" ]] || [[ $mod_user == "Q" ]] || [[ -z $mod_user ]]; then
						echo "No se ha cambiado el directorio Home"
					else
						sudo usermod -d $new_home_dir
                        echo "Ha cambiado el directorio home de $mod_user a $new_home_dir"
                        make_register $new_file_location "Ha cambiado el directorio home de $mod_user a $new_home_dir"
					fi
					;;
				3)
					echo "A que grupo desea agregarlo? "
					show_groups
					read -p "Opcion seleccionada: " add_u_to_group
					if [[ $add_u_to_group == "q" ]] || [[ $add_u_to_group == "Q" ]] || [[ -z $add_u_to_group ]]; then
						echo "No se ha agregado a ningun grupo"
					else
						sudo usermod -G $add_u_to_group $mod_user
						echo "$mod_user ha sido agregado a $add_u_to_group"
                        make_register $new_file_location "Ha agregado a $mod_user a $add_u_to_group"
					fi
					;;
				4)
					read -p "Que fecha de expiracion desea agregar[YYYY-MM-DD]: " expire_date
					if [[ $expire_date == "q" ]] || [[ $expire_date == "Q" ]] || [[ -z $expire_date ]]; then
						echo "No se ha agregado una fecha de expiracion"
					else
						sudo usermod -e $expire_date $mod_user
						echo "$mod_user sera desactivado el $expire_date"
                        make_register $new_file_location "Le ha agregado fecha de desactivacion a $mod_user para el $expire_date"
					fi
					;;
				*)
					echo "Opcion desconocida"
                ;;
				esac
			done
		fi
		;;
	*)
		echo "Opcion desconocida"
    ;;
	esac
done
