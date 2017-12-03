<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function Symfony\Component\VarDumper\Tests\Caster\reflectionParameterFixture;
use App\Article;
use App\User;
use App\Country;
use App\Role;
use DB;

class AboutController extends Controller
{
    protected static $articles;

    public static function addArticles($array){
        return self::$articles[]= $array;

    }
    public function show(Request $request){
        $country = Country::find(1);
        $user = User::find(2);
        $country->user()->associate($user);//изменяет занчение, user c id 2 привязывает страну с id 1, страна перестаёт быть привязанно к user c id 1
        $country->save();

        $user = User::find(2);
        $role_id = Role::find(3)->id;
        $user->roles()->attach($role_id);//detach удалит запись об этом
        return;
    }
}
//        $articles = Article::with('user')->get();
//        foreach ($articles as $article){
//            echo $article->user->name.'</br>';
//        }
//        $articles = Article::all();
//        $articles->load('user');//жадная загрузка подгружает инфу из связанной таблицы users
//        foreach ($articles as $article){
//            echo $article->user->name.'</br>';
//        }
//        $users = User::with('articles','roles')->get();//жадная загрузка подгружаем инфу из связанных таблиц
//        foreach ($users as $user){
//            dump($user->roles);
//        }
//        $users = User::has('articles','>=','3')->get();//находим пользователей которые добавили запись в связанную бд articles и больше 3 раз
//        foreach ($users as $user){
//            dump($user);
//        }
//        $user = User::find(1);
//        $article = new Article([
//            'title'=>'New Article',
//            'alias'=>'Some text',
//            'desc'=>'Some',
//            'text'=>'Some text'
//
//        ]);
        // $user->articles()->save($article);
        //$user->articles()->where('id',25)->update(['title'=>'New Text']);//обновить запись
        //$role = new Role(['name'=>'guest']);
        //$user->roles()->save($role); //для конкретного пользователя саздаём роль



        //$article = Article::firstOrCreate(['name'=>'name']); метод проверит
        // если в баз запись с таким именем полезно для дабовления новых пользователей,
        // автоматически сохроняет и возвращает модель этой записи
        //мягкое удаление нужно для того что бы вдруг вернуть удалённую запись из карзины
//        $user = User::find(1);
//        $country = Country::find(1);
//        $role = Role::find(1);
//        $articles = $user->articles;
//        $f = $user->articles()->where('id',25)->first();
//        echo $f->title.'</br>';
//        foreach ($articles as $article) {
//            echo $article->title.'</br>';
//        }
//        $article = Article::find(25);
//        dump($article->user->name);
//        $role = $user->roles()->where('roles.id',2)->firstOrFail();
//        dump($role->name);
//        dump($role->users);


//но при помощи модели все делает проще это так для общего развития
//$articles = DB::table('articles')->take(4)->get();только 4 взять из бд
//$articles = DB::table('articles')->select('title')->where(['id','<',5],
//                                                 ['title','like','Ivan'])
//orWhere('id','<',2)->get(); whereBetween('id',[1,5]);
//несколько запросов where и разных видов
//return response()->view('about',['title'=>'Contacts'])->header('Content','newType');//заголовки http
//return response()->json(['name'=>'hello','name1'=>'kkk']); //использование json
//return response()->download('C:\Users\Seregin Ivan\Desktop\Tor Browser\mmm.jpg','Ivan.jpg',['Content'=>'newType']);//отдать на скачивание картинку под именем Ivan с заголовками