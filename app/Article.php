<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Article extends Model
{
    //
    protected $table = 'articles';//не обязательно если имя модели в ед числе совпад с имен табл в множ числе
    public $timestamps = TRUE;// автоматическое заполнение полей create и update
    //protected $guarded = [''];//какие поля запрещены для зполнения
    protected $fillable = ['title','alias','desc','text'];//список полей для которых разрешенно массовое заполнение

    public function user(){
        return $this->belongsTo('App\User');
    }
}
