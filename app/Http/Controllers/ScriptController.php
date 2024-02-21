<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Script;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    // ВЫВОД ВСЕХ ТОВАРОВ
    public function index(Request $request)
    {
        $query = Script::query();
    
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
    
        if ($request->filled('price')) {
            if ($request->price == 'low_to_high') {
                $query->orderBy('price');
            } elseif ($request->price == 'high_to_low') {
                $query->orderByDesc('price');
            }
        }
    
        if ($request->filled('date')) {
            if ($request->date == 'newest') {
                $query->orderByDesc('created_at');
            } elseif ($request->date == 'oldest') {
                $query->orderBy('created_at');
            }
        }
    
        $scripts = $query->paginate(9); // Для отображения по 3 товара в ряд
    
        return view('scripts.catalog', compact('scripts'));
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
            "source_code" => ["nullable", "file"],
        ], [
            "title.required" => "Поле 'Название скрипта' обязательно для заполнения",
            "description.required" => "Поле 'Описание' обязательно для заполнения",
            "image.required" => "Поле 'Изображение' обязательно для заполнения",
            "category.required" => "Поле 'Категории' обязательно для заполнения",
            "price.required" => "Поле 'Цена' обязательно для заполнения",
        ]);

        if ($request->has('category')) {
            $data['category_id'] = $request->input('category');
        } else {
            $data['category_id'] = 1;
        }

        if ($request->has("image")) {
            $image = str_replace("public/scripts", "", $request->file("image")->store("public/scripts"));
            $data["image"] = $image;
        }

        if ($request->hasFile("source_code")) {
            $file = $request->file("source_code");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs("public/source_codes", $filename);
            $data["source_code_path"] = $path;
        }
        
        

        if (auth()->check()) {
            $data['user_id'] = auth()->id();
        } else {
            return redirect()->route('login')->with('error', 'Необходима авторизация.');
        }

        Script::create($data);

        return redirect()->route('admin.admin');
    }



    // ПРОСМОТР СКРИПТА
    public function show(Script $script)
    {
        $fileExtension = null;
        if ($script->source_code_path) {
            $fileExtension = pathinfo(storage_path('app/public/' . $script->source_code_path), PATHINFO_EXTENSION);
        }
    
        return view('scripts.show', compact('script', 'fileExtension'));
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
