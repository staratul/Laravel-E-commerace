<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function categories()
    {
        return view('admin.pages.categories');
    }

    public function units()
    {
        return view('admin.pages.units');
    }

    public function products()
    {
        // $data = Product::with('category')->select('products.*')->get();
        // dd($data);
        return view('admin.pages.products');
    }
}
