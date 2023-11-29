System Requirements:
Xamp server with 
PHP 8.2
Mysql

Editor (any like VS Code)
node


Setup project:

move project folder to xampp/htdocs/

open project folder in CMD and run following commands

composer update
(Above command are required to install project dependancy)

open browser and go to phpmyadmin
create new database with name "laravel"

php artisan migrate
(This command will add tables into Database. Make sure you must have .env file having database configuration)

goto command prompt and type these commands to optimize cache,routes and paths
php artisan config clear
php artisan optimize
php artisan route:clear

To run the peoject type following command
php artisan serve

Run project:
goto browse and hit url http://127.0.0.1:8000/

Functionalities:
You may find following functionality
1- Register user
2- Login
3- Dashboard
4- Profile page with upload profile picture
5- Logged in user reset password link by email
6- Logout
7- Reset password link without login
8- Reset password by clicking URL found in email

Validations:
All modules are having laravel form validations

Logs:
logs are managed in project_directory/storage/logs folder 

Test case:
I have created 2 test cases for home page and registration page that could be found at project_directory/tests/Unit/AppUnitTest.php file.
You may run this test case by following command in terminal
./vendor/bin/phpunit

Migrations:
Migrations can be found in project_directory/database/migrations directory

Credential for Mailtrap:
You may check emails here
URL: https://mailtrap.io/?gad_source=1
email: abdulrahemanmca@gmail.com
password: Assessment123

