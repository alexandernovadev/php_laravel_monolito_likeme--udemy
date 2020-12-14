<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $images = Image::orderBy('id','desc')->get();

        // Paginacion de Laravel, MUY EASY
        $images = Image::orderBy('id','desc')->paginate(4);

        return view('home')
        ->with(['images'=>$images]);
    }


}
