<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();

        return view('frontend.history.index', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::where('id', $id)->first();
        $order_details = OrderDetail::where('order_id', $order->id)->get();

        return view('frontend.history.detail', compact('order', 'order_details'));
    }
}
