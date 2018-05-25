#!/bin/bash
#
#Fix up SeLinux
sudo sed -i 's/enforcing/disabled/g' /etc/selinux/config
#
#Install the basics first!
sudo yum -y install wget vim unzip htop
#
#Install epel + remi repo
cd ~
wget https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
wget http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
sudo rpm -Uvh remi-release-7*.rpm epel-release-latest-7.noarch.rpm
#
#Install yum-utils and enable remi + php56 repo
sudo yum -y install yum-utils
sudo yum-config-manager --enable remi remi-php56
#
#Enable HTTPD and start it up
sudo yum -y install httpd
sudo systemctl enable httpd
#
#Install repo for Mysql
wget http://repo.mysql.com/mysql-community-release-el7-5.noarch.rpm
sudo rpm -ivh mysql-community-release-el7-5.noarch.rpm
sudo yum -y update
#
#Install MySQL Server
sudo yum -y install mysql-server
sudo systemctl start mysqld
sudo systemctl enable mysqld
#
#Set-up PHP
sudo yum -y install curl curl-devel gcc
sudo yum -y install php php-opcache
sudo yum -y install php-xml php-mcrypt php-gd php-devel php-mysql php-intl php-mbstring php-bcmath ImageMagick-devel php-pear php-xdebug
sudo yum -y install phpmyadmin telnet
sudo yum -y update
#
#Fix up PhpMyAdmin - 192.168.33.1
sudo sed -i 's/127.0.0.1/192.168.0.0\/16/g' /etc/httpd/conf.d/phpMyAdmin.conf
#Settings for Apache 2.4
sudo sed -i 's/Require local/Require ip 192.168.0.0\/16/g' /etc/httpd/conf.d/phpMyAdmin.conf
#
#Put in custom configs
#
sudo cp -f /tmp/vagrant/httpd.conf /etc/httpd/conf/httpd.conf
sudo cp -f /tmp/vagrant/php.ini /etc/php.ini
#
#Fix up error log for PHP
sudo touch /var/log/httpd/php_errors.log
sudo chown root:apache /var/log/httpd/php_errors.log
sudo chmod 664 /var/log/httpd/php_errors.log
#
#Reset MySQL root password and allow access from everywhere
mysqladmin -uroot password 'root'
mysql -uroot -proot -e "use mysql; update user set host='%' where user='root' and host = '127.0.0.1'; flush privileges;"
#
#Set-up path for website
[ -f /var/www/html/web/app_dev.php ] && sudo sed -i 's/\/var\/www\/html/\/var\/www\/html\/web/g' /etc/httpd/conf/httpd.conf
#
#Setup local time zone to berlin and load up NTP service
sudo rm -rf /etc/localtime && ln -s /usr/share/zoneinfo/Europe/Berlin /etc/localtime
sudo yum -y install ntp
sudo systemctl start ntpd
sudo systemctl enable ntpd
#
#Restart Apache
sudo service httpd start
#
#Install git, node.js and bower
sudo yum -y install git nodejs
sudo npm install -g bower gulp-cli
#
#
# Add symbolic link for HTML path
ln -s /var/www/html ~/www
