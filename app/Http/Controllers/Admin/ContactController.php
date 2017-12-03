<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //
    protected $message;
    protected $header;
    protected $url;
    //можно делать и так
//    protected $request;
//    public function __construct(Request $request){
//        $this->request;
//    }

    public function __construct()
    {
        $this->header = 'MAIN';
        $this->message = 'This is a template for a simple marketing or informational website. 
        It includes a large callout called a jumbotron and three supporting pieces 
        of content. Use it as a starting point to create something more unique.';
        $this->url = 'http://minilaravel.loc/page/add';
    }

    public function contact(Request $request,$id=null){
        if($request->has('name')) {
            echo "<h1 style='margin-top: 100px'>" . $request->input('name') . "</h1>";//напечатать имя которое в 'name'
            if($request->isMethod('post'))
                echo "<h1 style='margin-top: 100px'>" . $request->method(). "</h1>";//какой метод использован
            print_r($request->only('email','site'));
            $request->flash();//сохранения данные сессии еще нужно в классе karnel добавить старт сессии
           // $request->flush();//отчищяет данные сессии
            //print_r($request->except('email','site'));

        }
        return view('contact',['title'=>'Contacts'])->with(['message'=>$this->message,'header'=>$this->header]);
    }
}
