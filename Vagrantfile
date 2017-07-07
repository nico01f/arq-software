# -*- mode: ruby -*-
# vi: set ft=ruby :
#
#####
# Definición de dos ambientes laravel para proyecto Arq. Software
####

Vagrant.configure("2") do |config|

  config.vm.box = "laravel/homestead"

  nodes = {
  :frontend   => {:host => 'as-frontend01',   :ip => '192.168.33.10'},
  :backend    => {:host => 'as-backend01',    :ip => '192.168.33.11'},
  :db         => {:host => 'as-tx-mon02-zz1', :ip => '192.168.33.12'},
  }

  nodes.each do |node, opt|
    config.vm.define name do |node|
      node.vm.provision :host do |provisioner|
        provisioner.autoconfigure = false
        provisioner.add_host "#{opt[:ip]}", "#{opt[:node]}"
      end
      node.vm.network :private_network, ip: opt[:ip]
      node.vm.hostname = "#{opt[:hostname]}"
    end
  end

  # config.vm.network "forwarded_port", guest: 80, host: 8080

  # config.vm.synced_folder "../data", "/vagrant_data"

  # config.vm.provision "shell", inline: <<-SHELL
  #   apt-get update
  #   apt-get install -y apache2
  # SHELL
end
