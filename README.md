- This file is laravel-e-commerce-laptop-project
- Language uses
        - HTML CSS BOOTSTRAP LARAVEL BLADE JQUERY SASS ...
- This project is e-commerce website project using laravel 10.
- This project has two main parts..
- They are User section and Admin session..
- User must log in and admin also log in because each session has different exist url route but you can log in user account and also log in admin account.(if you log in with user account , 
  you won't see admin dashboard button and if you log in with admin acount , you will see admin dashboard button)
- For user , If user is not logged in, user can view products and visit routes and if user is logged in user can view products and visit routes and also order cart .
- For admin , admin must log in if not admin is not used. so admin can insert products , view messages from user and promote from user to admin
- Must be careful things
     - Don't open the file without internet
- If you want to run this file,  you first
     - Download this file or git clone this repository .
     - Open this file on code editer as you like .
     - Type 'composer install'
     - Create file as .env in root directory and then copy the all codes from .env.example to .env file
     - Type 'php artisan key:generate'
     - Create new database and add that new database name to .env file
     - Type 'php artisan migrate'
     - If a patched version is released https://www.npmjs.com/package/axios ,
           run npm install axios@latest --save-dev
     - Install npm and xmapp OR use your local environment .
     - Open apache server and sql  OR use other ways you like.
     - To check any vulnerabilities is existed or not please run npm audit
     - Then run this command ' php artisan serve '
- If you have problems , please visit to laravel official website https://laravel.com/docs/10.x/routing
- Good luck for your try.😊😊😊😊😊😊😊
