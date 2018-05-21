<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Support\Facades\Auth;

class CoreResource extends Controller
{
    protected $message;
    protected $header;
    protected $url;
    public function __construct()
    {
        //$this->middleware('auth'); все пользваотели должны регаца
        $this->header = 'MAIN';
        $this->message = 'This is a template for a simple marketing or informational website. 
        It includes a large callout called a jumbotron and three supporting pieces 
        of content. Use it as a starting point to create something more unique.';
        $this->url = 'http://minilaravel.loc/page/add';

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::select(['id','title','desc'])->get();//запрос к базе данных получить все элементы их определенны значения
        //dump($articles); распичатывает всё что храниться в переменной, а в ней mysql
        return view('page')->with(['message'=>$this->message,
            'header'=>$this->header,
            'articles'=>$articles
        ]);//отправляем что отобразить на странице в view
    }
//тот самый дополнительный метод
    public function test(){
        return view('test')->with(['message'=>$this->message,
            'header'=>$this->header]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //используется для отображения на экране страницы добавления нового элемента
    public function create()
    {
        return view('create')->with(['message'=>$this->message,
            'header'=>$this->header]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //для запросов типа post нужен для сохранения новых элементов в бд
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:10',
            'alias' => 'required|unique:articles,alias',
            'text' =>'required'
        ]);
        $data = $request->all();
        $article = new Article;
        $article->fill($data);//используется для заполнения модели массивом  data
        $article->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //для отображения конкретного элемента на экране запрос get
    public function show($id)
    {
        $article  = Article::select(['id','title','text'])->where('id',$id)->first();//получить элемени по id и только первый который нашли where('id','<',$id) можно ещё делать где мненьше id переданного
        return view ('show')->with(['message'=>$this->message,
            'header'=>$this->header, 'article'=>$article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //для отображения страницы редактирования запрос get
    public function edit($id)
    {
//        $article = Article::select(['id','title','text','alias'])->where('id',$id)->first();
//        return view('editing')->with(['message'=>$this->message,'header'=>$this->header,'article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //для сохранения отредактиованной записи в базе запрос put
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //для удаления из бд с переданным id
    public function destroy()
    {

    }
}
