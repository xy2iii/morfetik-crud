This is assuming a fresh Debian 9 (stretch) server.
It also assumes a MySQL database. This can change easily: the database could be any database that [Yii ActiveRecord supports](https://www.yiiframework.com/doc/guide/2.0/en/db-active-record). It could also be a remote database. 

# Dependecies
1. Install MySQL, Apache, Apache's PHP module, and various required PHP extensions for Yii, and clone the repository.
```shell
sudo apt install mariadb-server mariadb-client apache2 libapache2-mod-php php php-mbstring php-gd php-curl php-ds php7.3-xml php7.3-mysql unzip git -y
git clone https://github.com/xy2iii/morfetik-crud.git
```
2. Install Composer:
```shell
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
sudo mv composer.phar /usr/bin/composer
``` 
# Database user

1. Connect to MySQL: (use the -p switch if you have an admin password)
```shell
sudo mysql -u root
```
2. (MySQL) Create a database and user. Change the password and username according to your preferences. This user will be used by the framework to connect to the DB, with the db name.
```sql
CREATE USER 'user'@'localhost' IDENTIFIED BY 'pass';
CREATE DATABASE morfetik2;
```
3. (MySQL) Grant rights. Change the DB name and user as needed.
```sql
GRANT ALL PRIVILEGES ON morfetik2.* TO 'user'@'localhost';
```

# Yii configuration

1. Go inside the cloned repository and run `composer install`.
2. Edit the `config/db.php` file:
```php
<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=morfetik2',
    'username' => 'user',
    'password' => 'pass',
    'charset' => 'utf8', 

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
```
3. Using the `yii` binary at the root, run the migrations:
```shell
./yii migrate --migrationPath=@yii/rbac/migrations/
./yii migrate
```
If the migrations fail, that's okay: the tables might already exist.
4. If you're deploying in a subdomain, change the base URL in `config/Aliases.php`:
```php
class Aliases extends Component
{
    private $baseURL = 'https://tal.lipn.univ-paris13.fr/morfetik/'; // change
```
It is set for the LIPN by default.
5. Edit `web/index.php` and comment out the 4th and 5th line:
```php
<?php

// comment out the following two lines when deployed to production
//defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_ENV') or define('YII_ENV', 'dev');

...
```
    
6. Put the entire repo in your webroot, which may look like `var/www/html`.
7. Render `assets/`, and `web/assets` writable, run in `var/www/html`:    sudo mysql -u root
```shell
sudo chgrp www-data ./assets
sudo chmod g+w ./assets
sudo chgrp www-data ./web/assets
sudo chmod g+w ./web/assets
```
    
# Apache

1. In `/etc/apache2/sites-enabled`
```shell
# Set document root to be "web"
DocumentRoot "/var/www/html/web"

<Directory "/var/www/html/web">
    # use mod_rewrite for pretty URL support
    RewriteEngine on
    
    # if $showScriptName is false in UrlManager, do not allow accessing URLs with script name
    RewriteRule ^index.php/ - [L,R=404]
    
    # If a directory or a file exists, use the request directly
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    
    # Otherwise forward the request to index.php
    RewriteRule . index.php

    # ...other settings...
</Directory>
```
2. Enable mod-rewrite:
```
sudo a2enmod rewrite
```
3. Restart apache:
```
sudo systemctl restart apache2
```

# Populating database

1. Populate the MySQL database with the `morfetik.sql` at the root of the repo:
```shell
sudo mysql -u root < morfetik.sql
```
2. Run the createFormes() stored procedure to generate the 'formes' table:
```sql
-- MySQL
call createFormes();
```
