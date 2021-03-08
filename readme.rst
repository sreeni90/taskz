###################
TaskIT
###################

TaskIT is a simple task management app based on codeigniter 3.x, Mysql ( Database ), BootStrap as front end framework

*******************
Server Requirements
*******************

PHP version 7.0 or newer is recommended.
Mysql 8.x

************
Setup Instructions
************

Import database db.sql 

mysql -u {username} -p {database_name} <  {repo_folder_path}/db.php

Change the database credentials in application/database.php

**************
Running using PHP Server
**************

Please use the php in built web server to run the app from root path of the repo_folder_path

php -S localhost:8001

localhost:8001  ## the url should be updated on the config.php base_url

$config['base_url'] = 'http://localhost:8001/';

The above change is required for some ajax requests 