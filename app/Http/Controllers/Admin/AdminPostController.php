<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminPostController extends Controller
{
    public function __construct()
    {
        $this->header = 'MAIN';
        $this->message = 'This is a template for a simple marketing or informational website. 
        It includes a large callout called a jumbotron and three supporting pieces 
        of content. Use it as a starting point to create something more unique.';
        $this->url = 'http://minilaravel.loc/page/add';
    }

    public function show(){
        return view('add_editing_pages.add_post',['title'=>'Добавление нового материала'])->with(['message'=>$this->message,
            'header'=>$this->header
        ]);
    }

    public function showUp($id){
        $article = Article::find($id);
        return view('add_editing_pages.update_post',['title'=>'Редактирование материала','article'=>$article])->with(['message'=>$this->message,
            'header'=>$this->header
        ]);
    }

    public function create(Request $request){
        if(Gate::denies('add-article')){
            return redirect()->back()->with(['message'=>'у вас нет прав']);
        }
        $this->validate($request,[
            'title' => 'required|max:10',
            'desk' => 'required|max:10',
            'alias' => 'required|unique:articles,alias',
            'text' =>'required'
        ]);
        $user = Auth::user();//получаем текущего пользователя так как редактирвоать может только авториз.польз
        $data = $request->all();
        $res = $user->articles()->create([
           'title'=>$data['title'],
            'desk'=>$data['desk'],
            'alias'=>$data['alias'],
            'test'=>$data['data']
        ]);
        return redirect()->back()->with('message','Матеарил добавлен');
    }
    public function createUp(Request $request){
        $this->validate($request,[
            'title' => 'required|max:10',
            'desk' => 'required|max:10',
            'alias' => 'required|unique:articles,alias',
            'text' =>'required'
        ]);
        $user = Auth::user();//получаем текущего пользователя так как редактирвоать может только авториз.польз
        $data = $request->except('_token');
        $article = Article::find($data['id']);

        $article->title = $data['title'];
        $article->desk = $data['desk'];
        $article->alias = $data['alias'];
        $article->text = $data['text'];

        $res = $user->articles()->save($article);

        return redirect()->back()->with('message','Материал изменён');
    }

}
