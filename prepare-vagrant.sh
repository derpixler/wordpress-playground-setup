#!/bin/bash

RED='\033[0;31m'
GREEN='\033[3;32;40m'
YELLOW='\033[1;33;40m'
NC='\033[0m' # No Color

host=$(grep '"host":' composer.json)
host=${host//'"host":'/''}
host=${host//'"'/''}
host=${host//','/''}
host=${host//'   '/''}

hosts="vagrant/config/hosts.list"

rm ${hosts}
echo "${host}" > ${hosts}


ip=$(grep '"ip":' composer.json)
ip=${ip//'"ip":'/''}
ip=${ip//'"'/''}
ip=${ip//','/''}
ip=${ip//' '/''}

Vagrantfile=$(cat vagrant/Vagrantfile)
Vagrantfile=${Vagrantfile//'192.168.56.101'/${ip}}

rm vagrant/Vagrantfile
echo "${Vagrantfile}" > vagrant/Vagrantfile

printf "\n  - Configure Vagrant ${GREEN}${host}${NC} (${YELLOW}${ip}${NC})\n    Hosts mapped\n\n"

