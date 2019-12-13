<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;

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
        return view('home');
    }

    public function shuffle(){

      $peliculas = Pelicula::all();
      $shuffled = $peliculas->shuffle();
      $shuffled->all()->take(5)->get();
      $vac = compact("shuffled");
      return view('home', $vac);
    }

}
