<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index() {
        $orders = Order::where('id_user', Auth::id())
            ->orderBy('updated_at')
            ->get();

        return view('orders', compact('orders'));
    }
}
