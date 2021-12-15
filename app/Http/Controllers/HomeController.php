<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use App\Models\Team;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(User::all());
        $article = Article::where(['status'=>'1'])->get();
        $team = Team::where(['status'=>'1'])->get();
        $title = ['title'=>'Dashboard','route'=>'dashboard.0'];
        return view('home',compact('title','article','team'));
    }

}
