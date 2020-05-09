<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;

class IndexController extends BaseController{

    public function showIndex(){
        return view('index');
    }
}