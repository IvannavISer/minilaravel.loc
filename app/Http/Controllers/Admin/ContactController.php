<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\MyInter\SaveData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;




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

    public function contact(Request $request,SaveData $data, $id=FALSE){

        $result = $data->save($request, Auth::user());
        dump($result);

        if($request->isMethod('post')){
            $rules = [
                'name'=>'required|max:10|unique:users,name',//проврека на уникальность name в таблице users
                'email'=>'required|email|max:15'
            ];
            $validator = Validator::make($request->all(), $rules);
            //сообщения об ошибке валидации в файле validation.php
            if( $validator->fails() ) {
                $request->flash();
            }
            dump( $request->all() );
            return view('contact',['title'=>'Contacts'])->with(['message'=>$this->message,'header'=>$this->header])
                ->withErrors($validator)
                ->withInput( $request->all());// для флэш вывода

        }
        //$user = User::find(1);
        //dump($user->articles);получим все записи которые привязаны к юзиру с id = 1
        //$user->articles()->where('id',1) вызывая articles() это конструктор динамических запросов
        // $request->flash();//сохранения данные сессии еще нужно в классе karnel добавить старт сессии
        // $request->flush();//отчищяет данные сессии
        //print_r($request->except('email','site'));
        $res = $request->session()->all();
        dump($res);
       return view('contact',['title'=>'Contacts'])->with(['message'=>$this->message,'header'=>$this->header]);
    }
}
