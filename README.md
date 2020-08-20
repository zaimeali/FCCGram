1) php artisan make:auth
    - it will create auth folder, layout folder, and home.blade.php file
    - but this command is not in laravel 6 and 7
    - so we will use
        1) composer require laravel/ui --dev
        2) php artisan ui react --auth
        3) npm install && npm run dev
2) php artisan migrate
3) now make folder in public with svg and add svg file
4) now go to app.blade.php and then change the app name and include svg there.
5) after every change in css or js we should run: npm run dev
6) add username field in the register.blade.php
7) then add username in validator and create function in the controllers/RegisterController.php
8) then go to database then migration then create_users_table, here i will add the username field which will be unique.
9) php artisan tinker
    - here you will go to the command line of your app
    - User::all(); and enter so it will so all the users.
    - there's no username field because we haven't migrate it.
10) php artisan migrate:fresh   
    - it will drop all the table but make changes which is add or remove fields.