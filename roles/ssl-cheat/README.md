# Cheat the SSL

Useful for local development. Files unreachable directly.

## Eg:

1. On the server: `$ cp -L /etc/letsencrypt/live/tasuki.org/*.pem ~`
2. Locally:

    ```
    rm roles/ssl-cheat/files/keys/tasuki.org/*
    scp "ulmo:~/*.pem" roles/ssl-cheat/files/keys/tasuki.org
    (cd roles/ssl-cheat/files/keys/tasuki.org; for i in `ls`; do mv $i `echo $i | sed -e 's/.pem/1.pem/g'`; done)
    ```

3. Remove files on the server: `$ rm ~/*.pem`
4. Rerun Ansible.
5. Restart Apache I'm afraid...
