<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use Alert;
use Auth;
class CarouselController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $title = ['title'=>'Carousel','route'=>'carousel.'.Auth::user()->is_admin];
        // dd($title);
        $carousel = Carousel::join('users','users.id','=','carousel.created_by')->select('carousel.*','users.name')->get();
        $no=1;
        return view('backend.carousel',compact('carousel','title','no'));
    }
    public function add(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'status'=>'required',
            'img'=>['required','mimes:jpeg,png,bmp'],
        ]);

        $fileName = time().'.'.$request->img->extension();  
        $request->img->move(public_path('carousel'), $fileName);

        $input = [
            'title'=>$request->title,
            'status'=>$request->status,
            'path'=> $fileName,
            'created_by'=> Auth::user()->id,
        ];
        // $path = $request->file('img')->store('public/articles');
        // dd($input);
        Carousel::create($input);
        Alert::success('Success','Carousel has been added');
        return back();
    }
    public function updateForm($id)
    {
        $title = ['title'=>'Carousel Data','route'=>'carousel.'.Auth::user()->is_admin];
        $carousel = Carousel::where(['carousel.id'=>$id])->join('users','users.id','=','carousel.created_by')->select('users.name','carousel.*')->get();
        return view('backend.carousel_details',compact('carousel','title'));
    }

    public function update(Request $request)
    {
        if(empty($request->path))
        {
            $this->validate($request,[
                'title'=>'required',
                'status'=>'required',
            ]);
            $input = [
                'title'=>$request->title,
                'status'=>$request->status,
                'update_by'=> Auth::user()->id,
            ];
            Carousel::where(['id'=>$request->id])->update($input);
            Alert::success('Success','Carousel has been updated');
            return back();
        }
        else
        {
            $this->validate($request,[
                'title'=>'required',
                'status'=>'required',
                'path'=>['required','mimes:jpeg,png,bmp,jpg'],
                
            ]);
            // dd($request->all());
    
            $fileName = time().'.'.$request->path->extension();  
            $request->path->move(public_path('carousel'), $fileName);
    
            $input = [
                'title'=>$request->title,
                'status'=>$request->status,
                'path'=> $fileName,
                'created_by'=> Auth::user()->id,
            ];
            // dd($input);
            Carousel::where(['id'=>$request->id])->update($input);
            Alert::success('Success','Carousel has been updated');
            return back();
        }
    }

    public function delete($id)
    {
        $delete = Carousel::find($id)->delete();
        if($delete)
        {
            return back();
        }
    }

}
