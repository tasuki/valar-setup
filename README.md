Mayhaps this will one day automate my cloud server.

## Use

    $ sudo apt install ansible
    $ ansible-galaxy collection install community.general

    $ ansible -i inventory all -m ping

### Secrets

    $ echo "password" > .vault_pass # not actual password :)
    $ ansible-vault edit --vault-id .vault_pass vars/vault.yml

## Develop

    $ sudo apt install virtualbox vagrant
    $ vagrant up

### Provision

    $ vagrant provision
    $ ansible-playbook -i inventory -l dev --vault-id .vault_pass playbook.yml
