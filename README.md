# Come lets play with WordPress
Here you get a ready to use `composer.json` and a vagrant `prepare shell script` to generate your own Local WordPress Playground. What you need is a little experience with [Vagrant](https://www.vagrantup.com/) and [Composer](https://getcomposer.org/)

## Install your local WordPress - Vagrant
[1] Check if you have installed [Vagrant](https://www.vagrantup.com/) and [Composer](https://getcomposer.org/doc/00-intro.md)

[2] Clone this Reposetory.
```bash
git clone https://github.com/derpixler/wordpress-playground-setup.git playground-box
```

[3] Run Composer install and Start Vagrant
```bash
cd playground-box && composer install && cd vagrant && vagrant up
```

[4] Browse to http://www.playground.wp

## Whats in the Playground?
We have a small set of plugins and themes.
* Vagrant: https://github.com/derpixler/vagrant-apache-php-mysql
* The WordPress Core dev-master
* Plugins:
    * [Multilingual Press](https://wordpress.org/plugins/multilingual-press/)

* Themes:
    * all WordPress default Themes
    * [Human](https://wordpress.org/themes/hueman/)
	* [Onepress](https://wordpress.org/themes/onepress)


## Customize your Vagrant setup
At the [vagrant.json](https://github.com/derpixler/wordpress-playground-setup/blob/master/vagrant.json) you'll find the vagrant setting and you can make your changes here.

You want a to use a custom domains for your setup then change the private network setting.
```
"private_network": {
	"ip": "192.168.12.111",
	"host": "payground.box"
}
```

If you want to use aliases add the alias section at the privat network.
```
"private_network": {
	"ip": "192.168.12.111",
	"host": "payground.box",
	"alias": [
		"word.press",
		"play.wp"
	]
}
```
