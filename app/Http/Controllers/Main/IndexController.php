<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function __invoke()
    {

      return redirect()->route('home.post.index');
    }
}