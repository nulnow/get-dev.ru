<?php

use Illuminate\Support\Facades\Cache;

Route::get('/', function () {

    if ($value = Cache::get('python')) {

        return view('welcome')->withPython($value);

    } else {

        $value = Requests::get('http://127.0.0.1:5000/')->body;

        Cache::put('python', $value, 600);

        return view('welcome')->withPython($value);

    }

});

Route::get('/echo/{text?}', function ($text = null) {
    $value = Requests::post('http://127.0.0.1:5000/',
        ['content-type' => 'application/json; charset=utf-8'], \json_encode([
            'text' => $text
        ]))->body;
    return $value;
});
