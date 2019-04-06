<?php

use Illuminate\Support\Facades\Cache;

Route::view('/docs', 'docs');
Route::view('/app', 'app');

Route::get('/clear-cache', function () {
    Cache::flush();
    return 'K 😎😎😎😎😎😎😎😎😎😎😎';
});

//Route::get('/', '');

Route::get('/', function () {
    return view('welcome')->withPython('краундфай');

    /*
    if (!$value = Cache::get('python')) {
        try {
            $value = Requests::get('http://127.0.0.1:5000/welcome')->body;
        } catch (Exception $e) {
            $value =  'connect people 4444';
        }
        sleep(2);
        Cache::put('python', $value . ' 😎', 600);
    }
    return view('welcome')->withPython($value);
    */
});

Route::get('/echo/{text?}', function ($text = null) {
    $value = Requests::post('http://127.0.0.1:5000/echo',
        ['content-type' => 'application/json; charset=utf-8'], \json_encode([
            'text' => $text
        ]))->body;
    return $value;
});

Route::get('/delay', function () {
    sleep(2);
    return 'ok';
});

Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::redirect('/home', '/');

Route::middleware('auth')->group(function () {
    Route::get('/profile', 'UsersController@profile')->name('profile');
    Route::post('/profile', 'UsersController@updateProfile')->name('update-profile');
    Route::get('/tasks', 'TasksController@index')->name('tasks');
    Route::get('/tasks/{task}', 'TasksController@show')->name('task');
    Route::get('/create-task', 'TasksController@form')->name('create-task');
    Route::post('/tasks', 'TasksController@create')->name('create-task');
    Route::get('/delete-task/{task}', 'TasksController@delete')->name('delete-task');
    Route::get('/users', 'UsersController@search')->name('users');
    Route::get('/users/{user}', 'UsersController@show')->name('user');
    Route::get('/users/{user}/chat', 'ChatController@chat')->name('chat');
    Route::get('/users/{notYou}/messages', 'ChatController@messages')->name('messages');
    Route::get('/users/{notYou}/sendMessage', 'ChatController@sendMessage')->name('sendMessage');
    Route::view('/my-requests', 'my-requests')->name('my-requests');
    Route::view('/my-tasks', 'my-tasks')->name('my-tasks');
    Route::get('/create-dev-request/{task}', 'DevRequestsController@create')->name('create-dev-request');
    Route::get('/accept-dev-request/{devRequest}', 'DevRequestsController@acceptRequest')->name('accept-request');
    Route::get('/delete-dev-request/{devRequest}', 'DevRequestsController@delete')->name('delete-dev-request');
});
