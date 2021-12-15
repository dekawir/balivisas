<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Auth;
use Alert;
class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function articles()
    {
        $title = ['title'=>'Article Data','route'=>'article.'.Auth::user()->is_admin];
        $no=1;
        $article = Article::join('users','users.id','=','articles.created_by')->select('articles.*','users.name')->get();
        // dd($article);
        
        return view('backend.article', compact('article','no','title'));
    }

    public function addArticle(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
            'img'=>['required','mimes:jpeg,png,bmp'],
            
        ]);

        $fileName = time().'.'.$request->img->extension();  
        $request->img->move(public_path('articles'), $fileName);

        $input = [
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'path'=> $fileName,
            'created_by'=> Auth::user()->id,
        ];
        // $path = $request->file('img')->store('public/articles');
        // dd($input);
        Article::create($input);
        Alert::success('Success','Article has been added');
        return back();
    }
    public function delete($id)
    {
        $delete = Article::find($id)->delete();
        if($delete)
        {
            return back();
        }
    }

    public function updateForm($id)
    {
        $title = ['title'=>'Article Data','route'=>'article.'.Auth::user()->is_admin];
        // dd(Article::count());
        $article = Article::where(['articles.id'=>$id])->join('users','users.id','=','articles.created_by')->select('users.name','articles.*')->get();
        return view('backend.article_details',compact('article','title'));
    }
    public function update(Request $request)
    {
        if(empty($request->path))
        {
            $this->validate($request,[
                'title'=>'required',
                'description'=>'required',
                'status'=>'required',
            ]);
            $input = [
                'title'=>$request->title,
                'description'=>$request->description,
                'status'=>$request->status,
                'update_by'=> Auth::user()->id,
            ];
            Article::where(['id'=>$request->id])->update($input);
            Alert::success('Success','Article has been updated');
            return back();
        }
        else
        {
            $this->validate($request,[
                'title'=>'required',
                'description'=>'required',
                'status'=>'required',
                'path'=>['required','mimes:jpeg,png,bmp,jpg'],
                
            ]);
            // dd($request->all());
    
            $fileName = time().'.'.$request->path->extension();  
            $request->path->move(public_path('articles'), $fileName);
    
            $input = [
                'title'=>$request->title,
                'description'=>$request->description,
                'status'=>$request->status,
                'path'=> $fileName,
                'created_by'=> Auth::user()->id,
            ];
            // dd($input);
            Article::where(['id'=>$request->id])->update($input);
            Alert::success('Success','Article has been updated');
            return back();
        }


    }
}
