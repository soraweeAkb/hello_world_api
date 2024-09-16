<?php

use Illuminate\Support\Facades\Route;

// routes/web.php

Route::get('/', function () {
    return view('welcome');
});

// use Illuminate\Support\Facades\Route;

Route::get('/api/hello', function () {
    return response()->json(['Hello World']);
});


