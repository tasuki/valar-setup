# Automating my cloud server.

## Set up Ansible

Ansible keeps changing things. It needs to be managed.
So does Python. It also need to be managed.
Use `mise` to get python 3.11...

    $ virtualenv -p ~/.local/share/mise/installs/python/3.11/bin/python env

Now we can fly...

    $ source env/bin/activate
    $ pip install -r requirements.txt

    $ ansible -i inventory all -m ping

## Use

To set up a fresh server, create the user and set up sshd:

    $ ansible-playbook -i inventory -l ulmo playbook-init.yml

Then run the rest of the setup:

    $ ansible-playbook -i inventory -l ulmo -K --vault-id .vault_pass playbook.yml

### Secrets

    $ echo "password" > .vault_pass # not actual password :)
    $ ansible-vault edit --vault-id .vault_pass vars/vault.yml

### Run just one playbook

    $ ansible-playbook -i inventory -l ulmo -K --vault-id .vault_pass playbooks/sites/org.tasuki.gallery.yml

### Manually

Afaics right now, the following need manual setup:

- gallery.tasuki.org: all teh photo files
- tmp.tasuki.org: all teh random files
- domains.tasuki: the `listed.json`

## Develop

    $ sudo apt install podman
    $ ./dev.setup.sh

### Provision

    $ ansible-playbook -i inventory -l cloud-dev --vault-id .vault_pass playbook.yml

### Test

1. Put something along the lines of `127.0.0.1 tasuki.org` into `/etc/hosts`.
2. Visit something like http://tasuki.org:1080/ or https://tasuki.org:1443/
