<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Script;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    // ВЫВОД ВСЕХ ТОВАРОВ
    public function index()
    {
        $scripts = Script::paginate(10);

        return view('scripts.catalog', [
            "scripts" => $scripts,
        ]);
    }

    public function admin()
    {
        $scripts = Script::all();
        return view('admin.admin', [
            "scripts" => $scripts,
        ]);
    }

    // ДОБАВЛЕНИЕ СКРИПТА
    public function create()
    {
        $categories = Category::all();
        return view('scripts.create', [
            "categories" => $categories,
        ]);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            "title" => ["required", "max:70"],
            "description" => ["required"],
            "image" => ["required", "image"],
            "category" => ["required"],
            "price" => ["required"],
        ], [
            "title.required" => "Поле 'Название скрипта' обязательно для заполнения",
            "description.required" => "Поле 'Описание' обязательно для заполнения",
            "image.required" => "Поле 'Изображение' обязательно для заполнения",
            "category.required" => "Поле 'Категории' обязательно для заполнения",
            "price.required" => "Поле 'Цена' обязательно для заполнения",
        ]);

        if ($request->has('category')) {
            $data['category'] = $request->input('category');
        } else {
            $data['category'] = 1;
        }

        if ($request->has("image")) {
            $image = str_replace("public/scripts", "", $request->file("image")->store("public/scripts"));
            $data["image"] = $image;
        }


        Script::create([
            "title" => $data['title'],
            "description" => $data['description'],
            "image" => $data['image'],
            "category_id" => $data['category'],
            "price" => $data['price'],
        ]);

        return back()->with('success', 'Запись успешно добавлена');
    }



    // ПРОСМОТР СКРИПТА
    public function show($id)
    {
        $scripts = Script::findOrFail($id);

        return view("scripts.show", [
            "scripts" => $scripts,
        ]);
    }



    // РЕДАКТИРОВАНИЕ СКРИПТА
    public function edit($id)
    {
        $categories = Category::all();
        $scripts = Script::findOrFail($id);
        return view('scripts.edit', [
            "scripts" => $scripts,
            "categories" => $categories,
        ]);
    }


    public function update(Request $request, $id)
    {
        $scripts = Script::findOrFail($id);

        $data = $request->validate([
            "title" => ["required", "max:70"],
            "description" => ["required"],
            "image" => ["required", "image"],
            "category" => ["required"],
            "price" => ["required"],
        ], [
            "title.required" => "Поле 'Название скрипта' обязательно для заполнения",
            "description.required" => "Поле 'Описание' обязательно для заполнения",
            "image.required" => "Поле 'Изображение' обязательно для заполнения",
            "category.required" => "Поле 'Категории' обязательно для заполнения",
            "price.required" => "Поле 'Цена' обязательно для заполнения",
        ]);

        if ($request->has("image")) {
            $image = str_replace("public/scripts", "", $request->file("image")->store("public/scripts"));
            $data["image"] = $image;
        }

        $scripts->update($data);

        return back()->with('success', 'Запись успешно добавлена');

    }


    // УДАЛИТЬ СКРИПТ
    public function destroy($id)
    {
        Script::destroy($id);
        return back()->with('success', 'Запись успешно добавлена');
    }
}
