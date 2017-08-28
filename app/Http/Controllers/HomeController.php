<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('home');
    }

    public function getLevadas(){
    
     return view('levadas');
    }

    public function getExcursoes(){
    
     return view('excursoes');
    }

    public function getLevadas_table(){
        $levada=DB::table('levadas')
              ->select('levadas.*')
              ->get();
        
        return view('levadas_table',['levada'=>$levada]);
    }
}
