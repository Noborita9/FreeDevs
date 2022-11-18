#!/bin/bash

getPort(){    
    portNumber=$(sudo cat /etc/ssh/sshd_config | grep "Port " | cut -d " " -f2)
}

checkPort(){
    portOk=0
    if [[ $1 -ge 1024 ]] || [[ $1 -le 65535 ]]; then
        portOk=1
    fi
}

updatePort(){
    # Add check to $1 to be correct
    checkPort $1
    if [[ $portOk -eq 1 ]]; then
        getPort
        repText="s/$portNumber/$1/g"
        sudo sed -i $repText /etc/ssh/sshd_config
        sudo service sshd restart
    else
        echo "Port $1 incorrect. Should be from 1024 to 65535"
    fi
}

