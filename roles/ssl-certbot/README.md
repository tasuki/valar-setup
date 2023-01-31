# SSL certbot

Set up certbot for production server.

This won't work on dev: When certbot asks the LetsEncrypt server for a new certificate, the server sets up a "challenge" to verify the domain owner. The challenge typically is "put this file with these precise arbitrary contents on this url".
