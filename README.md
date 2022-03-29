Mayhaps this will one day automate my cloud server.

## Use

    $ sudo apt install ansible
    $ ansible-galaxy collection install community.general

    $ ansible -i inventory all -m ping

To set up a fresh server, create the user and set up sshd:

    $ ansible-playbook -i inventory -l ulmo playbooks/user.yml

Then run the rest of the setup:

    $ ansible-playbook -i inventory -l ulmo -K --vault-id .vault_pass playbook.yml

### Secrets

    $ echo "password" > .vault_pass # not actual password :)
    $ ansible-vault edit --vault-id .vault_pass vars/vault.yml

### Manually

Afaics right now, the following need manual setup:

- gallery.tasuki.org: all teh photo files
- tmp.tasuki.org: all teh random files
- domains.tasuki: the `listed.json`

## Develop

    $ sudo apt install virtualbox vagrant
    $ vagrant up

### Provision

    $ vagrant provision
    $ ansible-playbook -i inventory -l dev --vault-id .vault_pass playbook.yml
