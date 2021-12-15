<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Team;
use Alert;
class TeamController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title = ['title'=>'Team Data','route'=>'team.'.Auth::user()->is_admin];
        $no=1;

        $team = Team::join('users','users.id','=','team.created_by')->select('users.name as uname','team.*')->get();
        // dd($team);
        return view('backend.team',compact('title','no','team'));
    }

    public function add(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'position'=>'required',
            'whatsapp'=>'required',
            'email'=>'email',
            'status'=>'required',
            'img'=>['required','mimes:jpeg,png,bmp'],
        ]);

        $fileName = time().'.'.$request->img->extension();  
        $request->img->move(public_path('team'), $fileName);

        $input = [
            'name'=>$request->name,
            'position'=>$request->position,
            'whatsapp'=>$request->whatsapp,
            'email'=>$request->email,
            'status'=>$request->status,
            'path'=> $fileName,
            'created_by'=> Auth::user()->id,
        ];
        // $path = $request->file('img')->store('public/articles');
        // dd($input);
        Team::create($input);
        Alert::success('Success','Team has been added');
        return back();
    }
    public function updateForm($id)
    {
        $title = ['title'=>'Team Data','route'=>'team.'.Auth::user()->is_admin];
        $team = Team::where(['team.id'=>$id])->join('users','users.id','=','team.created_by')->select('users.name as uname','team.*')->get();
        return view('backend.team_details',compact('team','title'));
    }

    public function update(Request $request)
    {
        if(empty($request->path))
        {
            $this->validate($request,[
                'name'=>'required',
                'position'=>'required',
                'whatsapp'=>'required',
                'email'=>'email',
                'status'=>'required',
            ]);
            $input = [
                'name'=>$request->name,
                'position'=>$request->position,
                'whatsapp'=>$request->whatsapp,
                'email'=>$request->email,
                'status'=>$request->status,
                'created_by'=> Auth::user()->id,
            ];
            Team::where(['id'=>$request->id])->update($input);
            Alert::success('Success','Team has been updated');
            return back();
        }
        else
        {
            $this->validate($request,[
                'name'=>'required',
                'position'=>'required',
                'whatsapp'=>'required',
                'email'=>'email',
                'status'=>'required',
                
            ]);
            // dd($request->all());
    
            $fileName = time().'.'.$request->path->extension();  
            $request->path->move(public_path('team'), $fileName);
    
            $input = [
                'name'=>$request->name,
                'position'=>$request->position,
                'whatsapp'=>$request->whatsapp,
                'email'=>$request->email,
                'status'=>$request->status,
                'path'=> $fileName,
                'created_by'=> Auth::user()->id,
            ];
            // dd($input);
            Team::where(['id'=>$request->id])->update($input);
            Alert::success('Success','Team has been updated');
            return back();
        }
    }
    public function delete($id)
    {
        $delete = Team::find($id)->delete();
        if($delete)
        {
            return back();
        }
    }

}