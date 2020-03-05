# Set-up Instructions
This small project uses PHP, MySQL and the Laravel Framework.

## Server Requirements
- PHP >= 7.2.0
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Composer

## Inital Setup
1. Set-up the server how you see fit. I typically build Laravel applications with Vagrant and ScotchBoxPro, which is included in this project.
2. If you're using Vagrant, simple run `vagrant up` and the necessary files will be downloaded
3. When vagrant is up and ready run `vagrant ssh` to sign into the server
4. Navigate to root directory `cd /var/www`
5. Run composer to download the required packages `composer install`
6. Once all files have been downloaded you should be able to navigate to <http://192.168.33.10/>

## MySQL Setup
Server settings:
  - HOST: 127.0.0.1
  - PORT: 3306
  - DATABASE: DemoRss
  - USERNAME: root
  - PASSWORD: root

1. You can create the databse through your favourite GUI like MySQL Workbench
2. Alternatively you can create it though the command line whilst logged into the server.
    1. `mysql -u root -p`
    2. You will then be asked for the password by default is 'root'.
    3. `create database DemoRss;` which the response should read `Query OK, 1 row affected (0.00 sec)`
    4. Confirm the database has been created by running `show databases;` and you should see it DemoRss listed.
    5. To exit run `exit`

## Laravel Setup
1.  Ensure Artisan commands are working, in the `/var/ww` directory run the following command `php artisan -V` and if successful a message similar to `Laravel Framework 6.17.1` will be returned.
2. Run the database migrations `php artisan migrate` you should see a list of tables that have now been created on your MySQL server.
3. Run the seeders `php artisan db:seed` and the previous tables should now be populated with demo data.
