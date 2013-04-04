#!/bin/sh
pushd .
cd ~/Thing/Code/PHP
rm -rf intrepion/app/cache/*
rm -rf intrepion/app/logs/*
cp intrepion/src/.htaccess intrepion/bin/
cp intrepion/src/.htaccess intrepion/vendor/
rsync -avz --delete --exclude app/sessions/* --exclude .git --exclude .gitignore --exclude scripts intrepion ~/webapps/php/
popd
