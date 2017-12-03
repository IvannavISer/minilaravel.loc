<?php

use Illuminate\Database\Seeder;
use App\Article;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Article::create([
            'title'=>'sample blog post3',
            'alias'=>'<p>tonight 3</p>',
            'desc'=>'ads',
            'text'=>'pac33.jpg'
        ]
        );
    }
}
