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

        return back()->with('success', 'Запись успешно добавлена');

    }

    // РЕДАКТИРОВАНИЕ КАТЕГОРИИ
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('categories.edit', [
            "categories" => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        $data = $request->validate([
            "title" => ["required", "max:30"],
        ], [
            "title.required" => "Поле 'Название категории' обязательно для заполнения",
        ]);

        $categories->update($data);

        return redirect()->route('admin.admin');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.admin');
    }
}
