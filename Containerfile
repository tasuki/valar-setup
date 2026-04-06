FROM debian:trixie
RUN apt-get update && \
  apt-get install -y \
    systemd acl procps cron sudo \
    python3 curl vim locales openssh-server && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/*

RUN useradd -m -s /bin/bash vita && \
    echo "vita ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers

# Tell systemd it's running in a container
ENV container docker
# Stop systemd from trying to handle hardware/TTYs
STOPSIGNAL SIGRTMIN+3
CMD ["/lib/systemd/systemd"]
