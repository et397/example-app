<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
#用get方法，導向「/test」的網址，並執行TestController的test方法，回傳業ai驗
Route::get('test', 'TestController@test');
