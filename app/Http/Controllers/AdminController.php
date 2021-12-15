<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use Illuminate\Validation\Validator;
use Auth;
use Alert;
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
        $title = ['title'=>'Dashboard','route'=>'dashboard.1'];
        return view('backend.dashboard',compact('title'));
    }

    public function user()
    {
        $title = ['title'=>'User Data','route'=>'user'];
        $no=1;
        $user= User::all();
        return view('backend.user',compact('user','title','no'));
    }
    public function updateForm($id)
    {
        $title = ['title'=>'User Data','route'=>'user'];

        $user = User::where(['id'=>$id])->first();
        // dd($user);
        return view('backend.user_details', compact('user','title'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        if(empty($request->password && $request->passwordconfirm))
        {
            $this->validate($request,['name'=>'required','email'=>'required']);
            User::where(['id'=>$request->id])->update(['name'=>$request->name,'email'=>$request->email]);
        }
        else
        {
            if($request->password == $request->passwordconfirm)
            {
                $this->validate($request,['name'=>'required','email'=>'required','password'=>'required','passwordconfirm'=>'required']);
                Alert::success('Success','User has been deleted');
                User::where(['id'=>$request->id])->update(['name'=>$request->name,'email'=>$request->email,'password'=> bcrypt($request->password)]);
            }
            else
            {
                Alert::error('Oopps',"Password doesn't match !");
                return redirect()->back();
            }
        }
            Alert::success('Success','User has been updated');
            return redirect()->back();
    }
    public function delete($id)
    {
        if($id==1)
        {
            Alert::error('Oppss you can not delete admin');
            return back();
        }
        else{
            $delete = User::find($id)->delete();
            if($delete)
            {
                return back();
            }
        }

    }

    public function add(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
            'is_admin'=>'required'
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'is_admin'=>$request->is_admin,
        ]);
        if($user)
        {
            Alert::success('Success','User has been created');
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request)
    {
        // dd($request->all());
        if(empty($request))
        {
            if(empty($request->password && $request->passwordconfirm))
            {
                $this->validate($request,['name'=>'required','email'=>'required']);
                User::where(['id'=>$request->id])->update(['name'=>$request->name,'email'=>$request->email]);
            }
            else
            {
                if($request->password == $request->passwordconfirm)
                {
                    $this->validate($request,['name'=>'required','email'=>'required','password'=>'required','passwordconfirm'=>'required']);
                    Alert::success('Success','User has been deleted');
                    User::where(['id'=>$request->id])->update(['name'=>$request->name,'email'=>$request->email,'password'=> bcrypt($request->password)]);
                }
                else
                {
                    Alert::error('Oopps',"Password doesn't match !");
                    return redirect()->back();
                }
            }
                Alert::success('Success','User has been updated');
                return redirect()->back();
        }

            $user = User::where(['id'=>Auth::user()->id])->first();
            // dd($user);
            $title = ['title'=>'Profile','route'=>'update.profile.'.Auth::user()->is_admin];

            return view('backend\user_details', compact('user','title'));
    }
    

    
}
