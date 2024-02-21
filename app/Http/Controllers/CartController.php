<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Purchase;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($scriptId)
    {
        // Проверяем, есть ли уже такой товар в корзине пользователя
        $existingCartItem = CartItem::where([
            ['user_id', '=', auth()->id()],
            ['script_id', '=', $scriptId],
        ])->exists();
    
        // Если товара нет, добавляем его
        if (!$existingCartItem) {
            CartItem::create([
                'user_id' => auth()->id(),
                'script_id' => $scriptId,
            ]);
    
            return redirect()->back()->with('success', 'Товар успешно добавлен в корзину.');
        }
    
        return redirect()->back()->with('error', 'Этот товар уже находится в вашей корзине.');
    }
    

    public function index()
    {
        $cartItems = CartItem::where('user_id', auth()->id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function remove($id)
    {
        $cartItem = CartItem::find($id);
        if ($cartItem->user_id == auth()->id()) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Товар удален из корзины');
        }

        return redirect()->back()->with('error', 'Ошибка удаления товара');
    }


    public function checkout(Request $request)
    {
        $request->validate([
            'card_number' => 'required|digits:16',
            'expiration_date' => 'required|date_format:m/y',
            'cvv' => 'required|digits:3',
        ]);
    
        // Получаем товары в корзине
        $cartItems = CartItem::where('user_id', auth()->id())->get();
    
        // Записываем каждую покупку в базу данных
        foreach ($cartItems as $item) {
            Purchase::create([
                'user_id' => auth()->id(),
                'script_id' => $item->script_id,
            ]);
    
            // Удаляем товар из корзины
            $item->delete();
        }
    
        return redirect()->route('profile')->with('success', 'Покупка успешно совершена!');
    }
    

    public function showOrderForm()
    {
        return view('cart.order');
    }

    public function profile()
    {
        $purchases = auth()->user()->purchases()->with('script')->get();
        return view('profile.profile', compact('purchases'));
    }
    
}
