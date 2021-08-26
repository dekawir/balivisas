<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
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
        // dd(User::all());
        return view('backend.dashboard');
    }

    public function user()
    {
        $user= User::all();
        return view('backend.user',compact('user'));
    }
    public function edit($id)
    {
        dd($id);
    }
}
