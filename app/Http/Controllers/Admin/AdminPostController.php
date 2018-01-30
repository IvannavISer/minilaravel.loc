<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Gate;
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
        $article = Article::select(['id','title','desc','text','alias'])->where('id',$id)->firstOrFail();
        return view('add_editing_pages.update_post',['title'=>'Редактирование материала','article'=>$article])->with(['message'=>$this->message,
            'header'=>$this->header
        ]);
    }

    public function create(Request $request){
        //если запрещенно
        $article = new Article;
        /*первый способ*/
//        if(Gate::denies('add',$article)){
//            return redirect()->back()->with(['message'=>'у вас нет прав']);
//        }
        /*второй способ*/
        if($request->user()->cannot('add',$article))
        {
            return redirect()->back()->with('status','у вас нет прав');
        }
        $this->validate($request,[
            'title' => 'required|max:10',
            'alias'=>'required',
            'desc' =>'required',
            'text' =>'required'
        ]);

        $user = Auth::user();//получаем текущего пользователя так как редактирвоать может только авториз.польз
        $data = $request->all();
        $user->articles()->create ([
           'title'=>$data['title'],
            'desc'=>$data['desc'],
            'alias'=>$data['alias'],
            'text'=>$data['text']
        ]);
        return redirect()->back()->with('status','Матеарил добавлен');
    }
    public function saveUp(Request $request){
        $this->validate($request,[
            'title' => 'required|max:10',
            'alias'=>'required',
            'desc' =>'required',
            'text' =>'required'
        ]);
        $user = Auth::user();//получаем текущего пользователя так как редактирвоать может только авториз.польз
        $data = $request->except('_token');
        //$data = $request->all();
        $article = Article::find($data['id']);
        //if(Gate::/*forUser(6)->*/allows('update',$article)) {
        if($request->user()->can('update',$article)){

            $article->title = $data['title'];
            $article->desc = $data['desc'];
            $article->alias = $data['alias'];
            $article->text = $data['text'];

            $user->articles()->save($article);

            return redirect()->back()->with('status', 'Материал изменён');
        }
        return redirect()->back()->with('status','у вас нет прав');
    }

}
