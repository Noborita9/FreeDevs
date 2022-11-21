#!/bin/bash

read -p "You are about to install MariaDB-server, are you sure[y/N]" confirm

if [[ $confirm == "y" ]] || [[ $confirm == "Y" ]]; then
    echo "Installing MariaDB-server"
    sudo yum install mariadb-server
    sudo yum install wget
    wget https://downloads.mariadb.com/MariaDB/mariadb_repo_setup
    chmod +x mariadb_repo_setup
    sudo ./mariadb_repo_setup

    sudo yum install MariaDB-server
    read -p "Should the service be started[y/N]" conf_service
    if [[ $confirm == "y" ]] || [[ $confirm == "Y" ]]; then
        sudo systemctl start mariadb.service
        echo "Service Started"
    else
        echo "Service Not Startet"
    fi
else
    echo "Not Installing"
fi
