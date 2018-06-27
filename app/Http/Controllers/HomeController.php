<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodinfox = products::all()->toArray();
        $prod = null;
        return view('home', compact('prodinfox','prod'));
    }
}
