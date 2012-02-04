#!/bin/sh
################################################
# Script to copy tables.sql file to <database>
# USAGE tables <username> <password> <host> <database>
# Author Isioma Nnodum isioma.nnodum@gmail.com
################################################

echo "create database $4" | mysql -u$1 -p$2 -h$3;
cat ./tables.sql | mysql -u$1 -p$2 -h$3 $4;