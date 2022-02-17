Mayhaps this will one day automate my cloud server.

## Develop

    $ sudo apt install virtualbox vagrant ansible
    $ ansible-galaxy collection install community.general
    $ vagrant up

## Use

    $ sudo apt install ansible
    $ ansible-galaxy collection install community.general

    ansible -i inventory all -m ping

