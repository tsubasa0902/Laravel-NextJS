<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::get('/phpinfo', function () {
    phpinfo();
});
require __DIR__.'/auth.php';
