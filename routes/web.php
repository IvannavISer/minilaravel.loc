<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//{id?} function($var = null) параметр не обязателен
//проверка переданного пораметра на регулярном выражение на пример
//Route::get('page/{cat}/'{id}','EXAMPLE')->where(['id'=>'[0-9]+','cat'=>'[A-Za-z]+']);проверка на число и проверка кошки на строку
//Route::get('page/add','IndexController@add')->name('articleAdd');//теперь это в группе
//Route::post('page/add','IndexController@store')->name('articleStore');теперь это в группе
//Route::match(['get','post'],'/name page',function());//для нескольоких типов http зпросов
//Route::any('/namepage',function ());//для всех видов запроса
//имена для пути можно создавать ещё так
//    Route::get('page/add',['uses'=>'IndexController@add','as'=>'articleAdd']);
//Route::get('/','IndexController@index');
//Route::group(['prefix'=>'page/add'],function (){
//Route::get('page/add','IndexController@add')->name('articleAdd');
//Route::post('page/add','IndexController@store')->name('articleStore');
//});

    Route::get('article/{id}', 'IndexController@show')->name('articleShow');//динамический запрос
    Route::delete('/delete/{article}', function (\App\Article $article) {
        //$article_tmp = \App\Article::where('id',$article)->first();
        //$article_tmp->delete();
        $article->delete();
        return redirect('/');
    })->name('articleDelete');
    Route::get('/editing/{id}', 'IndexController@visual')->name('articleVisual');
    Route::post('/editing/{id}', 'IndexController@editing')->name('articleEditing');
    Route::get('/about', 'AboutController@show');
    Route::match(['get', 'post'], '/contact/{id?}', ['uses' => 'Admin\ContactController@contact', 'as' => 'contact']);
//Route::get('test','Admin\CoreResource'); //так добовляют дополнительный метод в рессуры
    Route::resource('/', 'Admin\CoreResource', ['except' => ['show']]);
