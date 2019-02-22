
# AlgoTest

![diagram](https://github.com/licontre/AlgoTest/blob/master/diagram.jpg?raw=true)

1. We need a machine with Ubuntu SO.
2. sudo apt-get update && sudo apt-get upgrade
3. sudo apt-get install apache2
4. sudo apt-get install apache2-doc
5. sudo apt-get install php
6. sudo apt-get install libapache2-mod-php
7. sudo apt-get install php-mysql php-gettext php-mbstring
8. sudo apt-get install git mysql-server
9. git clone https://github.com/licontre/AlgoTest.git
1. You have to connect to mysql: 
2. create user algoRoot identified by algoRoot;
3. grant all privileges on AlgoTest. * to algoRoot;
4. Wherever you saved the file from github, type: 
5. sudo mysql -u algoRoot -p < AlgoTest/algoTest.sql
6. sudo cp -R AlgoTest/  /var/www/
7. sudo rm -R /var/www/html/
8. sudo mv /var/www/AlgoTest /var/www/html
9. sudo chmod 755 /var/www/html
