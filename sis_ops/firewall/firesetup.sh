#!/bin/bash

f_answer=0
fireMenu() {
	clear
	echo "<< Gestor del firewall >>"
	echo ""
	echo "q) Salir"
	echo "1) Instalar firewall"
	echo "2) Recargar puerto"
	echo "3) Listar servicios permitidos"
	echo "4) Ver lista de servicios disponibles"
	echo ""
	read -p "Opcion selecionada: " f_answer
}

f_is_in=1

while [[ $f_is_in -eq 1 ]]; do
	fireMenu
	case "$f_answer" in
	q)
		f_is_in=0
		;;
	1)
		echo "Instalando e iniciando firewall"
		sudo yum install firewalld
		sudo systemctl start firewalld
		sudo firewall-cmd --permanent --add-service=ssh
		sudo firewall-cmd --permanent --add-service=http
		sudo firewall-cmd --permanent --add-service=https
		sudo systemctl enable firewalld
		read -p "Firewall ha sido instalado e iniciado, presione enter para continuar"
		;;
	2)
		source ./config.sh
		getPort
		echo "Cambiando puerto SSH actual a $portNumber"
		sudo firewall-cmd --permanent --remove-service=ssh
		sudo firewall-cmd --permanent --add-port=$portNumber/tcp
		sudo firewall-cmd --reload
		read -p "Firewall ahora acepta el puerto $portNumber, presione enter para continuar"
		;;
	3)
		sudo firewall-cmd --permanent --list-all
		read -p "Presione enter para continuar"
		;;
	4)
		sudo firewall-cmd --get-services
		read -p "Presione enter para continuar"
		;;
	*)
		echo "Opcion desconocida"
		;;
	esac
done
