#!/bin/bash

sudo yum install -y https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
sudo yum install -y https://rpms.remirepo.net/enterprise/remi-release-7.rpm

sudo yum -y install yum-utils
sudo yum-config-manager --disable 'remi-php*'
sudo yum-config-manager --enable remi-php80
