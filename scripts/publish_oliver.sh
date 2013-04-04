#!/bin/sh
pushd .
cd ~/Code/PHP
rm -rf transformer/app/cache/*
rm -rf transformer/app/logs/*
sudo chown apache:apache transformer/app/cache
sudo chown apache:apache transformer/app/logs
sudo chown apache:apache transformer/app/sessions
sudo chown apache:apache transformer/web
sudo rsync -avz --delete --exclude app/sessions/* --exclude .git --exclude .gitignore --exclude scripts transformer /var/www/html/
sudo chown oliver:oliver transformer/app/cache
sudo chown oliver:oliver transformer/app/logs
sudo chown oliver:oliver transformer/app/sessions
sudo chown oliver:oliver transformer/web
popd
