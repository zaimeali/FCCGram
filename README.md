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
11) now go to app.blade.php and change name to username
12) php artisan make:controller ProfilesController
13) type index function and return home view
14) go to routes and change the route from HomeController to ProfilesController
15) Now create a new get route of profile and pass user through url and then pass name('profile.show') with a get function.
16) now in ProfilesController pass $user arg in a index function
17) do dd() and pass arg in dd function and then go to url and check is it catching the user or not by passing user with any number or name in URL.
18) model represents table in a database and one object of a model represents an actual row in a db