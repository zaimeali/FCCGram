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
18) now save the user data into variable and pass it to view by returning an array into the return statement.
19) model represents table in a database and one object of a model represents an actual row in a db.
20) now we will create a profile model.
    - Eloquent : is what a laravel calls a database layer of the framework
    - a behind the scenes to fetch queries.
21) php artisan make:model Profile -m
    - it will create the model and migration files of Profile.
22) define columns in Profile migration
    - then we can migrate
23) php artisan migrate
24) Define relationship in User and Profile models
    - in Profile model create a user function and use belongsTo method and pass User::class
    - in User model create a profile function and use hasOne method and pass Profile::class
25) manually adding data through php artisan tinker
    - adding data in profile table
26) Commands in tinker
    - $profile = new \App\Profile()
    - $profile->title = 'Cool Title'
    - $profile->description = 'Description'
    - $profile->user_id = 1
    - $profile->save()    // this will save the data
    - $profile->user      // will show the user data through user_id bcz of the relationship
    - $user = \App\User::find(1)   // it will fetch the user who has a id 1
    - $user->profile      // will show the user profile through 1-to-1 relationship
27) Now adding url to the user by going into tinker again
    - $user = User::find(1)
    - $user->profile->url = 'google.com'
    - $user->push()
28) php artisan make:model Post -m
29) after defining fields in a Post Table
    - Migrate the table
30) Add button in a view
31) Add new route for creating a post and redirect it to the controller
    - Route::get('/p', 'PostsController@create')
32 php artisan make:controller PostsController