<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminOnlyPage()
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return view('admin.admin');
        } else {
            abort(403, 'Доступ запрещен.');
        }
    }
}
