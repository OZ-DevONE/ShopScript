<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Script;
use App\Models\Category;

class AdminController extends Controller
{
    public function adminOnlyPage()
    {
        if (auth()->check() && auth()->user()->is_admin) {
            $scripts = Script::paginate(8);
            $categories = Category::all();
            return view('admin.admin', [
                "scripts" => $scripts,
                "categories" => $categories,
            ]);
        } else {
            abort(403, 'Доступ запрещен.');
        }
    }

}
