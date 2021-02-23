Read Me
1. First clone the repository in your local machine in xampp/htdocs folder

   git clone https://github.com/lakshminagasri/karmanya-sofware.git

2. Go to the clones path(folder) from command line and switch to branch run the command
  example:c:\xampp\htdocs\karmanya-sofware> git checkout master
  
   git checkout master

3. Go to the folder, run the command

   composer install

4. Enter the following command in windows to copy the .env file
 
   copy .env.example .env

  If you are using linux platfrom
  
  cp .env.example .env

5. Then run the command

   php artisan key:generate

6. Create the database ex:'karmanyasoftware' in phpmyadmin manually and then put the database name in .env file and also username and password of your database.

7. Run the command to create database structure

   php artisan migrate 

8. Open the application in browse with the url  http://localhost/karmanyasoftware/public/userslist

9. Create the roles,permission, users by clicking on respective buttons and you can perform crud operation.




