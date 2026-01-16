#!/bin/bash

podman build -t debian-dev -f dev.Containerfile .

podman run -d \
  --name cloud-dev \
  --privileged \
  -v /sys/fs/cgroup:/sys/fs/cgroup:rw \
  -p 1080:80 \
  -p 1443:443 \
  -p 1678:678 \
  debian-dev
