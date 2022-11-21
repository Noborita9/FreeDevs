#!/bin/bash

show_groups() {
	for group in $(cat /etc/group | tr " " "\n"); do
		gui=$(echo $group | cut -d: -f3)
		if [[ $gui -ge 1000 ]] && [[ $gui -lt 65534 ]]; then
			g_name=$(echo $group | cut -d: -f1)
			echo $g_name
		fi
	done
}

get_registers_quantity() {
	q_registers=$(ls ./users_abm/logs | wc -l)
}

create_file() {
	new_file_number=$(($1 + 1))
	date_time="$(date +'%d_%m_%y')_n"
	newlog="log_$date_time$new_file_number"
	new_file_location="./users_abm/logs/$newlog"
	touch $new_file_location
}

startup_register() {
    echo "-------------------" >> $1
    echo -e "FECHA: $(date +'%d%m%y')\nUSER: $USER\nARCHIVO: $0" >> $1
    echo "-------------------" >> $1
}

register_access() {
	get_registers_quantity
    create_file $q_registers
    startup_register $new_file_location
}

base_register() {
    base_reg_text="[$(date +'%H:%M:%S')] $USER "
}

register_file_change() {
    base_register
    text="Ha entrado a $2"
    echo -e "$base_reg_text$text" >> $1
}

make_register() {
    base_register
    echo -e "$base_reg_text$2" >> $1
}
