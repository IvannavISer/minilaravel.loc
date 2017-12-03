<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //создание таблицы newArticles
        Schema::create('newArticles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);//создание столбца с названием 'name' длиной 100 типа varChar
            $table->text('text');//столбец с техтом
            $table->string('img',255);//стобец с изображением
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newArticles');
    }
}
