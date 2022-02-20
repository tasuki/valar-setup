# Hack to determine whether Vagrant has provisioned already
def provisioned?(vm_name='default', provider='virtualbox')
  File.exist?(".vagrant/machines/#{vm_name}/#{provider}/action_provision")
end


Vagrant.configure("2") do |config|
  config.vm.box = "debian/bullseye64"

  # To check for updates run `vagrant box outdated`
  config.vm.box_check_update = false

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "playbook.yml"
  end

  config.vm.network "forwarded_port", guest: 80, host: 1080
  config.vm.network "forwarded_port", guest: 443, host: 1443
  config.vm.network "forwarded_port", guest: 678, host: 1678
  config.ssh.guest_port = 678 if provisioned?
end
