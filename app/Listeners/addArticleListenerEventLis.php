<?php

namespace App\Listeners;

use App\Article;
use App\Events\onAddArticleEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class addArticleListenerEventLis
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  onAddArticleEvent  $event
     * @return void
     */
    public function handle(onAddArticleEvent $event)
    {
        Log::info('Article save in database',[$event->user_name=>$event->article_title]);
    }
}
