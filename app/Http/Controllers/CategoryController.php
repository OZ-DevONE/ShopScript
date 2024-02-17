<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{

    // ДОБАВЛЕНИЕ КАТЕГОРИИ
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => ["required", "max:30"],
        ], [
            "title.required" => "Поле 'Название категории' обязательно для заполнения",
        ]);

        Category::create([
            "title" => $data['title'],
        ]);

        return redirect()->route('/')->with('success', 'Запись успешно добавлена');

    }

    // РЕДАКТИРОВАНИЕ КАТЕГОРИИ

}
