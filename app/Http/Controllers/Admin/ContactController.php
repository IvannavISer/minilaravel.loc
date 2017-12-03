<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

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

    public function contact(Request $request,$id=FALSE){
        $rules = [
            'name'=>'required|max:10',
            'email'=>'required|email'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($request->isMethod('post')){
            if( $validator->fails() ) {
                $request->flash();

            }
            dump( $request->all() );

        }
        // $request->flash();//сохранения данные сессии еще нужно в классе karnel добавить старт сессии
        // $request->flush();//отчищяет данные сессии
        //print_r($request->except('email','site'));
        return view('contact',['title'=>'Contacts'])->with(['message'=>$this->message,'header'=>$this->header])
            ->withErrors($validator)
            ->withInput( $request->all() );
       // return view('contact',['title'=>'Contacts'])->with(['message'=>$this->message,'header'=>$this->header]);
    }
}
