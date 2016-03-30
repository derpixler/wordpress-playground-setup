# Come lets play with WordPress
Her you get a ready to use `composer.json` and a vagrant `prepare shell script` to generate your own Local WordPress Playground.

## Install your local WordPress - Vagrant
1. Clone this Reposetory.`git clone https://github.com/derpixler/wordpress-playground-setup.git`

2. Start Vagrant
   `cd vagrant && vagrant up`

3. Browse to http://www.playground.wp

## Customize your Vagrant setup
At the `composer.json` you'll find a `vagrant` section.
```
"vagrant": [
  	  {
  	  "vagrant-name": "vagrant-playground",
  	  "host": "www.playground.wp | dev.playground.wp | my.playground.wp",
  	  "ip": "192.168.50.103"
  	  }
    ],
```
