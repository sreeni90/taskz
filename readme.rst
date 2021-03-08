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

**************
Access the application
**************

Now we can access the app from http://localhost:8001/

Demo Credentials: (Assuming database is already imported and available)

username: sreeni
password: admin 

After login it will redirect to the tasks. 

http://localhost:8001/tasks/
