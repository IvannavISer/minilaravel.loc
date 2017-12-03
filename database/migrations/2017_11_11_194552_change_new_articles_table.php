<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNewArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('newArticles', function (Blueprint $table) {
            if(!Schema::hasColumn('alias')) {
                $table->string('alias', 100);//добавил новое поле
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('newArticles', function (Blueprint $table) {
            $table->dropColumn('alias');
        });
    }
}
