<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class IndexController extends Controller
{
    //
    protected $message;
    protected $header;
    protected $url;
    public function __construct()
    {
        $this->header = 'MAIN';
        $this->message = 'This is a template for a simple marketing or informational website. 
        It includes a large callout called a jumbotron and three supporting pieces 
        of content. Use it as a starting point to create something more unique.';
        $this->url = 'http://minilaravel.loc/page/add';
    }
    //для отображения конкретного элемента на экране запрос get
    public function show($id){
        $array = array('title'=>'laravel project', 'data'=>['list1','list2'],'data2'=>['one'=>'two','three'=>'four']);
        //$article  = Article::find([$id]); where id = $id
        $article  = Article::select(['id','title','text'])->where('id',$id)->firstOrFail();//получить элемени по id и только первый который нашли
        return view ('show',$array)->with(['message'=>$this->message,
            'header'=>$this->header, 'article'=>$article
        ]);
    }
    public function visual($id){
        $article = Article::select(['id','title','text','alias'])->where('id',$id)->firstOrFail();
        return view('editing')->with(['message'=>$this->message,'header'=>$this->header,'article'=>$article]);
    }
    public function editing(Request $request,$id){
        $this->validate($request,[
            'title' => 'required|max:7',
            'text' =>'required'
        ]);
        $data = $request->all();
        $article = Article::where('id',$id)->firstOrFail();
        $article->delete();
        $article = new Article();
        $article->fill($data);
        $article->save();
        return redirect('/');
    }

}
