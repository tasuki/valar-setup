## Who always forgets how to do git deployments? Who should have written a readme about 10 years ago?

On the server:

  export DOMAIN=domainname
  export SUBDOMAIN=subdomain

  # bare repo
  mkdir -p /var/git/$DOMAIN/$SUBDOMAIN.git/
  git init --bare /var/git/$DOMAIN/$SUBDOMAIN.git/
  ln -s /var/git/hooks/post-update /var/git/$DOMAIN/$SUBDOMAIN.git/hooks/

  # destination repo
  mkdir -p /var/www/$DOMAIN/$SUBDOMAIN/
  git init /var/www/$DOMAIN/$SUBDOMAIN/
  ln -s /var/git/hooks/post-commit /var/www/$DOMAIN/$SUBDOMAIN/.git/hooks/
  ln -s /var/git/hooks/post-merge /var/www/$DOMAIN/$SUBDOMAIN/.git/hooks/
  git remote add hub /var/git/$DOMAIN/$SUBDOMAIN.git

On the dev machine:

  git remote add live manwe:/var/git/$DOMAIN/$SUBDOMAIN.git
  git push live
