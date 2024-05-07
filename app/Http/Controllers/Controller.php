<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

// 進入test function後，回傳「resources\views\test.blade.php」的頁面
class TestController extends Controller
{
    public function test()
    {
        return view('test');
    }
}