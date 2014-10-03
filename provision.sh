#!/bin/bash

shopt -s extglob

# need this for unzipping wordpress
sudo apt-get install --yes unzip
# not sure what this is for but it's for wordpress installation
sudo apt-get install --yes lynx

# remove any existing files in the directory
sudo rm -rf /var/www/html/!(wp-content|import)

# get wordpress.zip
curl https://wordpress.org/latest.zip > wordpress.zip

# unzip wordpress
sudo unzip wordpress.zip -d /var/www/html

# everything gets placed into a wordpress file inside of html so we need to move everything up one directory
sudo mv /var/www/html/wordpress/* ../

# remove the now empty directory
sudo rm -rf /var/www/html/wordpress

# WORDPRESS SETUP


# Get input
filesystem_directory="/var/www/html"
blog_title="Speeches"
admin_email="webmaster@byui.edu"
admin_pass="password"

# Generating needed variables
db_name="wp_speeches"
# The database user is the same as the database name.
db_user="root"
db_password="root"

# First check if the file has been ever downloaded
if test -f /tmp/latest.tar.gz
then
    echo "File is already there."
# Download the file for the first time
else
    echo "Downloading file file for the first time"
    cd /tmp/ && wget "http://wordpress.org/latest.tar.gz"
fi

# Extract the installation archive
sudo /bin/mkdir /tmp/wordpress
sudo /bin/tar -C /tmp/wordpress -zxf /tmp/latest.tar.gz --strip-components=1
sudo /bin/cp -r /tmp/wordpress/!(wp-content) $filesystem_directory
sudo /bin/cp -r /tmp/wordpress/wp-content/!(themes) $filesystem_directory/wp-content

# Fix the ownership of the files
sudo chown www-data: $filesystem_directory -R

# Rename the default config file
sudo /bin/mv $filesystem_directory/wp-config-sample.php $filesystem_directory/wp-config.php

# Substitute the default database values
sudo /bin/sed -i "s/database_name_here/$db_name/g" $filesystem_directory/wp-config.php
sudo /bin/sed -i "s/username_here/$db_user/g" $filesystem_directory/wp-config.php
sudo /bin/sed -i "s/password_here/$db_password/g" $filesystem_directory/wp-config.php

# Get the salts and keys
sudo /bin/grep -A50 'table_prefix' $filesystem_directory/wp-config.php > /tmp/wp-temp-config
sudo /bin/sed -i '/**#@/,/$p/d' $filesystem_directory/wp-config.php
sudo /usr/bin/lynx --dump -width 200 https://api.wordpress.org/secret-key/1.1/salt/ >> $filesystem_directory/wp-config.php
sudo echo "define('WP_DEFAULT_THEME', 'speeches');" >> $filesystem_directory/wp-config.php

sudo /bin/cat /tmp/wp-temp-config >> $filesystem_directory/wp-config.php && rm /tmp/wp-temp-config -f


# Create the database
/usr/bin/mysql -u$db_user -p$db_password -e "DROP DATABASE IF EXISTS $db_name"
/usr/bin/mysql -u$db_user -p$db_password -e "CREATE DATABASE $db_name"

# install wordpress
sudo /usr/bin/php -r "
include '"$filesystem_directory"/wp-admin/install.php';
wp_install('"$blog_title"', 'admin', '"$admin_email"', 1, '', '"$admin_pass"');
" > /dev/null 2>&1

# create .htaccess file
echo "<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
<IfModule mod_security.c>
SecFilterEngine Off
SecFilterScanPOST Off
</IfModule>" > /var/www/html/.htaccess

# run the importer
cd /var/www/html/import
sudo /usr/bin/php import.php forward