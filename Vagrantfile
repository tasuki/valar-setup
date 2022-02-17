Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/focal64"

  # To check for updates run `vagrant box outdated`
  config.vm.box_check_update = false

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "playbook.yml"
  end

  config.vm.network "forwarded_port", guest: 678, host: 1678
  config.ssh.guest_port = 678 # TODO comment out when creating VM
end
