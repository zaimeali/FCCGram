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
32) php artisan make:controller PostsController
33) write create function and return view to the posts folder into the form
34) make folder of a posts and create view in it
35) after making a form in posts/create.blade.php
36) go to routes and define the route where the form will go
37) add csrf directive inside a form
    - it will add token
38) add validation in a PostsController Store method with validate function
39) override guarded feature in Post model file
40) then call auth function with user function with post function which is in UserModel to create new post
41) now go to tinker
    - php artisan tinker
    - Post::all()
    - it will show all the post of the user but first when you're creating the post you've to logged in.
42) now we will create the auth middleware in a PostsController so that guest user which is not logged in will not go to create page directly.
43) this->middleware('auth') will stop the user to go to any post create page
    - now log out
    - go to p/create page
    - it will redirect you to the login page directly bcz you are not logged in
44) to save image in a storage/app/public/uploads folder
    - we have to define the path in a store function in a PostsController
45) to view the file through url we have to run this command once 
    - so it will link the storage folder
    - php artisan storage:link
    - run it only once
    - now file can be view after creating and passing it to dd function it will  return the path
    - so http://127.0.0.1:8000/storage/uploads/Y7kxkrXswVxluycHJ9zJyPoxv85qERJoE4ycCvOx.jpeg
46) now we have to store image path
47) now go to index.blade.php and show the posts in a profile
48) if you want to delete all posts
    - go to tinker
    - Post::truncate()
49) add link to add new post href
50) currently it displaying post in ascending order
    - we have to go to User model
    - then post function 
    - after hasMany()->orderby('created_at', 'DESC')
51) will retrieve posts count
    - $user->posts->count()
52) now we will add new package for image resizing
    - composer require intervention/image
53) create show.blade.php file in posts folder
54) create a route for a picture when user click it will show the picture
55) create show function in a PostsController to return the view to the show.blade.php
56) then create edit.blade.php view in profiles folder
57) then create route with user id for edit
58) add button in a index.blade.php of edit profile
59) add edit method in ProfilesController and return the view to edit.blade.php
60) add patch method in ProfilesController for updating user profile
61) use patch directive in edit.blade.php
62) make a route for updating user profile
63) but there's an issue in it
    - if a guest user write any id in a url with edit the guest user can edit any user.
    - so adding auth method in a user so the guest user cannot edit any other user.
64) now we will make policy
    - php artisan make:policy ProfilePolicy -m  Profile  // m for a model
65) in policy go to update function return true or false based on condition
66) use @can directive and pass $user->profile in a 2nd arg




after so long
1) composer require laravel/telescope
2) php artisan telescope:install
3) php artisan migrate

1) mailtrap
2) .env edit smtp
3) php artisan make:mail NewUserWelcomeMail -m emails.welcome-email  // it'll create one mail class file and one view file
