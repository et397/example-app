<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});
//授權csrf token
Route::get('/csrf-token', function () {
    return csrf_token();
});

#用get方法，導向「/post」的網址，並執行PostController的index方法，回傳頁面
Route::get('/post', [PostController::class, 'index']);

Route::post('/post', [PostController::class, 'store']);

// Route::resource('test', 'TestController');

//用resource方法，依據PostController內的每個function，各自建立一支符合RESTful API的路由 (GET、POST、PUT/PATCH、DELETE)，並以post作為路由前綴修飾，
// Route::resource('post', 'PostController');