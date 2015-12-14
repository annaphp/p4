<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// user authentication routes

# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');

//to test if user is loged in

Route::get('/confirm-login-worked', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});

// end of user authentication routes




Route::get('/', 'WelcomeController@index');

Route::post('/user/{id}', 'UsersController@getUser');
Route::get('/projects', 'ProjectsController@getProject');

Route::get('/projects/new', 'ProjectsController@getCreate');
Route::post('/projects/new', 'ProjectsController@postCreate');



Route::get('/projects/edit/{id}','ProjectsController@getEdit');
Route::post('/projects/{id}','ProjectsController@postEdit');
//what request should be used when deleting?
Route::post('/projects/delete/{id}', 'ProjectsController@postDelete');

//tasks routes
Route::get('/tasks/show/{project_id}', 'TasksController@getShow');
//think of a different controller name
Route::get('/tasks/incomplete', 'TasksController@getShowIncomplete');
Route::get('/tasks/completed','TasksController@getShowComplete');
//{id?} is a project id
Route::post('/tasks/new','TasksController@postCreate');
Route::get('/tasks/new/{project_id}','TasksController@getCreate');


Route::post('/tasks/edit', 'TasksController@postEdit');
Route::get('/tasks/edit/{id}','TasksController@getEdit');


//delete route - needs to be changed
Route::get('tasks/confirm-delete/{id}', 'TasksController@getConfirmDelete');
Route::get('/tasks/delete/{id}','TasksController@getDelete');

//delete routes for project
Route::get('projects/confirm-delete/{id}', 'ProjectsController@getConfirmDelete');
Route::get('projects/delete/{id}', 'ProjectsController@getDelete');

//routes for complete and incomlete tasks
Route::get('/tasks/show/incompleted/{project_id}','TasksController@getShowIncompleted');
Route::get('/tasks/show/completed/{project_id}','TasksController@getShowCompleted');



//to test database connection
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});
