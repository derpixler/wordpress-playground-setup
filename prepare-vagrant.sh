#!/bin/bash

host=$(grep '"host":' composer.json)
host=${host//'"host":'/''}
host=${host//'"'/''}
host=${host//','/''}
host=${host//'\t'/''}

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

