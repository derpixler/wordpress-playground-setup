# myHotelshop development virtual machine

Requirements:

 * [VirtualBox](https://www.virtualbox.org/)
 * [Vagrant](https://www.vagrantup.com/)
 * [Vagrant-Hostsupdater](https://github.com/cogitatio/vagrant-hostsupdater)
 * [Vagrant-triggers](https://github.com/cogitatio/vagrant-triggers)

## Quick start

1. 	Make sure that you have installed VirtualBox and Vagrant including the required Vagrant plugins

	 1.1	[Vagrant-Hostsupdater](https://github.com/cogitatio/vagrant-hostsupdater)
			```
			$ vagrant plugin install vagrant-hostsupdater
			```

	1.2		[Vagrant-triggers](https://github.com/cogitatio/vagrant-triggers)
			```
			$ vagrant plugin install vagrant-triggers
			```

3. 	Cloning this repository 'git@bitbucket.org:webdevmedia/myhotelshop-vm.git
	```
	$ git clone git@bitbucket.org:webdevmedia/myhotelshop-vm.git
	```

4.	Load project requirements
	```
	$ cd myhotelshop-vm
	$ composer install
	```
	This might take a wile on the first time because it will fetch WordPress core, WordPress plugins, WordPress Themes, Vagrant files and preapare vagrant.

5.	Run vagrant
	```
	$ cd vagrant
	$ vagrant up
	```

## Basic VM settings
You'll find the main setting, for this virtuallmaschine at the `vagrant.json`.

lets take a look at the basic settings.
```
IP: 192.168.33.177,
Mainhost: websites.myhotelshop.wp
Alias: network.arabiannights.hotel
	   network.websites.myhotelshop.wp
	   m-privathotels.network.websites.myhotelshop.wp
	   m-privathotels.de.websites.myhotelshop.wp
	   m-privathotels.en.websites.myhotelshop.wp
	   m-privathotels.it.websites.myhotelshop.wp
	   m-privathotels.es.websites.myhotelshop.wp
	   m-privathotels.fr.websites.myhotelshop.wp
	   m-privathotels.ru.websites.myhotelshop.wp


```

The maschine proviedes a auto import for db dumps, so you can place a plain sql file at `database/imports` and the maschin will do a import on `vagrant provision`
Furthermore on `vagrant up` the db will backuped in to `database/imports`.

## Known issues
 * `==> default: dpkg-preconfigure: unable to re-open stdin: No such file or directory` this [workaround](http://serverfault.com/a/670688/274427) seems not to work

