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

# strip the hosts and write them into vagrant/config/hosts.list
host=$(grep -o ".*: .*" composer.json | grep -iw host | cut -d: -f2)
host=${host//'"'/''}
host=${host//','/''}
host=${host//'   '/''}

hosts="vagrant/config/hosts.list"

rm ${hosts}
echo "${host}" > ${hosts}


# strip the ip for this vagant and write this into vagrant/Vagrantfile
ip=$(grep -o ".*: .*" composer.json | grep -iw ip | cut -d: -f2)
ip=${ip//'"'/''}
ip=${ip//','/''}
ip=${ip//' '/''}

# strip the vagrant name for this vagant and write this into vagrant/Vagrantfile
vn=$(grep -o ".*: .*" composer.json | grep -iw vagrant-name | cut -d: -f2)
vn=${vn//'"'/''}
vn=${vn//','/''}
vn=${vn//' '/''}

Vagrantfile=$(cat vagrant/Vagrantfile)
Vagrantfile=${Vagrantfile//'192.168.56.101'/${ip}}
Vagrantfile=${Vagrantfile//'playground'/${vn}}

rm vagrant/Vagrantfile
echo "${Vagrantfile}" > vagrant/Vagrantfile

# giva the user a msg
printf "\n  - Configure Vagrant ${GREEN}${host}${NC} (${YELLOW}${ip}${NC})\n    Hosts mapped\n\n"


IFS='|' read -ra hosts <<< "$host"
if [ ${#hosts[@]} > 1 ]
then
	hosts=${hosts[0]//' '/''}
	IFS='.' read -ra host <<< "${hosts[0]}"
	mkdir -p vagrant/html/${host[0]}/${host[1]} > /dev/null
	ln -s vendor/wordpress/ vagrant/html/${host[0]}/${host[1]}/ > /dev/null
fi

# giva the user a msg
printf "  - Configure Vagrant ${GREEN}vendor/wordpress/ vagrant/html/${host[0]}/${host[1]}/${NC} \n    Symlink created\n\n"

