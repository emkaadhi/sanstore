<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        return view('admin.user.index', compact('users'));
    }

    public function order($id)
    {
        $orders = Order::where('user_id', $id)->get();
        $user = User::where('id', $id)->first();
        return view('admin.user.order', compact('orders', 'user'));
    }

    public function order_detail($id)
    {
        $order = Order::where('id', $id)->first();
        $order_details = OrderDetail::where('order_id', $order->id)->get();
        return view('admin.user.detail', compact('order', 'order_details'));
    }
}
