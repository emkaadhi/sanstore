<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Profile;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

// use PDF;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function test()
    {
        $products = Product::all();
        return view('test', compact('products'));
    }

    public function createPDF()
    {
        $data = Product::all();

        view()->share('products', $data);
        $pdf = PDF::loadView('test', $data);

        return $pdf->download('pdf_file.pdf');
    }
}
