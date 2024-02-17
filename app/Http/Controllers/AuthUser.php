<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class AuthUser extends Controller
{
    public function loginuser(Request $request)
    {
        // Валидация данных
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Электронная почта обязательна к заполнению.',
            'email.email' => 'Необходим формат адреса электронной почты.',
            'password.required' => 'Пароль обязателен к заполнению.',
        ]);

        // Попытка аутентификации
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Переадресация на страницу профиля
            return redirect()->route('profile');
        }

        return back()->withErrors([
            'email' => 'Учетные данные не соответствуют нашим записям.',
        ]);
    }

    public function reguser(Request $request)
    {
        // Валидация данных
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Создание пользователя
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Аутентификация пользователя
        Auth::login($user);

        // Переадресация на страницу профиля
        return redirect()->route('profile');
    }
}
