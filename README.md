1) php artisan make:auth
    a) it will create auth folder, layout folder, and home.blade.php file
    b) but this command is not in laravel 6 and 7
    c) so we will use
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