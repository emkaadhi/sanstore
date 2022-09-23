<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $id)
    {
        // cek quantity

        $product = Product::find($id);
        $date = Carbon::now();

        if ($request->quantity > $product->quantity) {
            return back();
        }

        // cek order

        $cek_order = Order::where('user_id', auth()->user()->id)->where('status', 0)->first();

        if (empty($cek_order)) {
            Order::create([
                'user_id' => auth()->user()->id,
                'date' => $date,
                'total_price' => 0
            ]);
        }

        $new_order = Order::where('user_id', auth()->user()->id)->where('status', 0)->first();

        OrderDetail::create([
            'product_id' => $product->id,
            'order_id' => $new_order->id,
            'quantity' => $request->quantity,
            'price_amount' => $product->price * $request->quantity
        ]);

        $order = Order::where('user_id', auth()->user()->id)->where('status', 0)->first();
        $order->total_price += $product->price * $request->quantity;
        $order->update();

        Alert::success('Berhasil', 'Order berhasil');
        return redirect('front-product')->with('status', 'Order berhasil');
    }

    public function checkout()
    {
        $order = Order::where('user_id', auth()->user()->id)->where('status', 0)->first();
        $order_details = [];
        if (!empty($order)) {
            $order_details = OrderDetail::where('order_id', $order->id)->get();
        }

        return view('frontend.checkout', compact('order', 'order_details'));
    }

    public function delete($id)
    {
        $order_detail = OrderDetail::where('id', $id)->first();

        $order = Order::where('id', $order_detail->order_id)->first();

        $order->total_price -= $order_detail->price_amount;

        $order->update();

        $order_detail->delete();

        return back();
    }

    public function cancel()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $order_id = $order->id;

        $order->delete();


        $order_details = OrderDetail::where('order_id', $order_id)->get();

        foreach ($order_details as $order_detail) {
            $order_detail->delete();
        }


        return redirect('front-product');
    }

    public function confirm()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $profile = Profile::where('user_id', $user->id)->first();

        if (empty($profile->address) && empty($profile->phone)) {
            Alert::warning('Oopss', 'Anda harus isi profile terlebih dahulu');
            return redirect('profile');
        }

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $order_id = $order->id;
        $order->status = 1;
        $order->update();

        $order_details = OrderDetail::where('order_id', $order_id)->get();
        foreach ($order_details as $order_detail) {
            $product = Product::where('id', $order_detail->product_id)->first();
            $product->quantity = $product->quantity - $order_detail->quantity;
            $product->update();
        }

        return redirect(url('final'));
    }

    public function final()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 1)->latest()->first();
        $profile = Profile::where('user_id', Auth::user()->id)->first();

        return view('frontend.final', compact('order', 'profile'));
    }
}
