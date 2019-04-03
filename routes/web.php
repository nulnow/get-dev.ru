<?php

use Illuminate\Support\Facades\Cache;
Route::view('/docs', 'docs');
Route::view('/app', 'app');
Route::get('/clear-cache', function () {
    Cache::flush();
    return 'K 😎😎😎😎😎😎😎😎😎😎😎';
});

Route::get('/', function () {

    if ($value = Cache::get('python')) {
    } else {
        try {
            $value = Requests::get('http://127.0.0.1:5000/welcome')->body;
        } catch (Exception $e) {
            return 'can not connect to python';
        }
        sleep(2);
        Cache::put('python', $value . ' 😎', 600);
    }
    return view('welcome')->withPython($value);
});

Route::get('/echo/{text?}', function ($text = null) {
    $value = Requests::post('http://127.0.0.1:5000/echo',
        ['content-type' => 'application/json; charset=utf-8'], \json_encode([
            'text' => $text
        ]))->body;
    return $value;
});
