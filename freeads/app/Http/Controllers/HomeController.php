<?php

namespace App\Http\Controllers;
use View;
//use Illuminate\Support\Facades\View;
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
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $show= new \App\HomeModel;
        // $show->showAnnonces();
        $annonces = \DB::table('annonces')
                    ->orderBy('id_annonce', 'desc')
                    ->join('users', 'users.id', '=', 'annonces.id_vendor')
                    ->get();
        return view('welcome', ['annonces' => $annonces]);
        return view('welcome');
    }
}
