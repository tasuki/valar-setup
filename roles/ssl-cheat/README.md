# Cheat the SSL

Useful for local development. Files unreachable directly.

## Eg:

1. On the server: `sudo cp -Lr /etc/letsencrypt/live/ ~ && sudo chown -R vita: ~/live/`
2. Locally:

    ```
    rm -r roles/ssl-cheat/files/keys/*
    scp -r "ulmo:~/live/*" roles/ssl-cheat/files/keys/
    ```

3. Remove files on the server: `$ rm ~/*.pem`
4. Rerun Ansible.
5. Restart Apache I'm afraid...
