<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{

    // ДОБАВЛЕНИЕ СКРИПТА
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

    }
}
