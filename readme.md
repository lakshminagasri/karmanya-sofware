Read Me
1. First clone the repository in your local machine and swith to master branch

git clone https://github.com/lakshminagasri/karmanya-sofware.git

To switch to branch run the command

git checkout master

2. Go to the folder, run the command
composer install

3. Enter the following command in windows to copy the .env file
copy .env.example .env

If you are using linux platfrom
cp .env.example .env

4. Then run the command
php artisan key:generate

5. Create the database ex:'karmanyasoftware' in phpmyadmin manually and then put the database name in .env file and also username and password of your database.

6. Run the command to create database structure
 php artisan migrate 

7. Open the application in http://localhost/karmanyasoftware/public/userslist

8. create the roles,permission, users by clicking on respective buttons and you can perform crud operation.




