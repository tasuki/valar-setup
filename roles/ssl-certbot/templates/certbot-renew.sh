#!/bin/sh

certbot certonly \
    --agree-tos --email {{ email }} \
    --renew-by-default --apache \
  -d tasuki.org \
  -d blog.tasuki.org \
  -d cv.tasuki.org \
  -d enchiridion.tasuki.org \
  -d fonts.tasuki.org \
  -d gallery.tasuki.org \
  -d golem.tasuki.org \
  -d masonry-ordered.tasuki.org \
  -d system.tasuki.org \
  -d tmp.tasuki.org \
  -d tsumego.tasuki.org \
  -d ttc.tasuki.org \
  -d www.tasuki.org
