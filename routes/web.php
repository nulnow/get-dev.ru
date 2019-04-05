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

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/profile', 'profile')->name('profile');
Route::get('/tasks', 'TasksController@index');
