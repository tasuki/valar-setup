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

    $ ansible-playbook -i inventory -l ulmo -K --vault-id ../vault-valar playbook.yml

### Secrets

    $ echo "password" > ../vault-valar # not actual password :)
    $ ansible-vault edit --vault-id ../vault-valar vars/vault.yml

### Run just one playbook

    $ ansible-playbook -i inventory -l ulmo -K --vault-id ../vault-valar playbooks/sites/org.tasuki.gallery.yml

### Manually

The untracked content:

- /var/www/org.tasuki/games/backend/game-comment.sqlite3: the db
- /var/www/org.tasuki/gallery/public/gallery/*: all teh photo files
- /var/www/org.tasuki/tmp/*: all teh random files
- /var/www/org.tasuki/system/yliw/: life in weeks lookin' for a better home

The system things:

- /var/lib/awstats/*: the stats
- /var/log/apache2/*: maybe the apache logs

## Develop

    $ sudo apt install podman
    $ ./setup.sh

### Provision

First, see the [ssl-cheat readme](roles/ssl-cheat/README.md). Without that, errors. Then:

    $ ansible-playbook -i inventory -l cloud-dev --vault-id .vault_pass playbook.yml

### Test

Shell in the dev container: `podman exec -u vita -it cloud-dev bash`

1. Put something along the lines of `127.0.0.1 tasuki.org` into `/etc/hosts`.
2. Visit something like http://tasuki.org:1080/ or https://tasuki.org:1443/
