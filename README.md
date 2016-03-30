# Come lets play with WordPress
Here you get a ready to use `composer.json` and a vagrant `prepare shell script` to generate your own Local WordPress Playground. What you need is a little experience with [Vagrant](https://www.vagrantup.com/) and [Composer](https://getcomposer.org/) 

>Note: I know composer is a package manager and not a build-tool! There isn't just one way of doing it but this is the easiest.

## Install your local WordPress - Vagrant
0. Check if you have installed [Vagrant](https://www.vagrantup.com/) and [Composer](https://getcomposer.org/doc/00-intro.md)
1. Clone this Reposetory.`git clone https://github.com/derpixler/wordpress-playground-setup.git`
2. Start Vagrant
   `cd vagrant && vagrant up`
3. Browse to http://www.playground.wp

## Whats in the Playground?
We have a small set of plugins and themes. 
* Vagrant: https://github.com/derpixler/vagrant-apache-php-mysql
* Plugins:
    * [Search & Replace](https://wordpress.org/plugins/search-and-replace/)
    * [Captcha](https://de.wordpress.org/plugins/captcha/)

* Themes:
    * all WordPress default Themes
    * [Martial Lite](https://themes.trac.wordpress.org/ticket/30278)
    * [Human](https://wordpress.org/themes/hueman/)


## Customize your Vagrant setup
At the [composer.json](https://github.com/derpixler/wordpress-playground-setup/blob/master/composer.json) you'll find a *vagrant* section.
```
"vagrant": [
  	  {
  	  "vagrant-name": "vagrant-playground",
  	  "host": "www.playground.wp",
  	  "ip": "192.168.50.103"
  	  }
    ],
```
