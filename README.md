1) php artisan make:auth
    a) it will create auth folder, layout folder, and home.blade.php file
    b) but this command is not in laravel 6 and 7
    c) so we will use
        1) composer require laravel/ui --dev
        2) php artisan ui react --auth
        3) npm install && npm run dev