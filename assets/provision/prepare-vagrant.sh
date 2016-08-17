#!/bin/bash

# Prepare Vagrantfile strip the hosts the Vagrant name and ip
# out of the composer.json and write the ip and name into the
# Vagrantfile. The host will written in to config/hosts.list
#
# Set symlinks from vendor/wp-content
# to vagrant/html/${host[1]}/${host[1]}/ for wp-content

# set colors
RED='\033[0;31m'
GREEN='\033[3;32;40m'
YELLOW='\033[1;33;40m'
NC='\033[0m' # No Color
symlinkFile="create-symlink.sh"

dumpfolder='vagrant/database/imports/'

if [ ! -d "$dumpfolder" ]; then
	mkdir -p ${dumpfolder}
fi

cp vagrant.json vagrant/vagrant.json
cp vagrant.dist.json vagrant/vagrant.dist.json

printf "  - Moved Vagrant config ${GREEN}Copy vagrant.json -> vagrant/vagrant.json${NC})\n    Files copied\n\n"


cp assets/data/wp-config.php vagrant/html/wp-config.php

printf "  - Copy wp-config ${GREEN}wp-config.php -> vagrant/html/wp-config.php${NC})\n    Files copied\n\n"

cp assets/data/.htaccess.dist vagrant/html/.htaccess

printf "  - Copy .htaccess ${GREEN}.htaccess.dist -> vagrant/html/.htaccess${NC})\n    Files copied\n\n"

cp assets/data/website_myhotelshop_wp.sql ${dumpfolder}website_myhotelshop_wp.sql

printf "  - Copy website_myhotelshop_wp.sql ${GREEN}website_myhotelshop_wp.sql -> ${dumpfolder}website_myhotelshop_wp.sql${NC})\n    Files copied\n\n"
