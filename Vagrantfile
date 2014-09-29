# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  
  config.vm.box = "avenuefactory/lamp"

  config.vm.network "forwarded_port", guest: 80, host: 8080

  config.vm.network :private_network, ip: "192.168.10.10"

  config.vm.provision "shell", inline: "sudo service mysql restart", run: "always"

  config.vm.provision "shell", path: "provision.sh"

  config.vm.provision "shell", inline: "sudo service apache2 restart", run: "always"

  config.vm.synced_folder "./code", "/var/www/html/wp-content/themes/speeches", owner: "www-data", group: "www-data"

end
