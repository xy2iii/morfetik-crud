#!/bin/bash
# Run on the server.
read -p 'WARNING: This script will remove your /var/www/html/ webroot. It needs to be run with sudo! Are you OK with this? [y/N]' -n 1 -r

echo
if [[ ! $REPLY =~ ^[Yy]$ ]]
then
    exit 1
fi

rm -rf /var/www/html/*
cp -R * /var/www/html
cd /var/www/html
chown -vR www-data web/assets
chown -vR www-data runtime
chmod 744 web/assets
chmod 744 runtime
chmod 755 yii
