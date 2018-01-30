<?php

namespace App\Listeners;

use App\Events\onAddArticleEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class addArticleListenerEventLis
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  onAddArticleEvent  $event
     * @return void
     */
    public function handle(onAddArticleEvent $event)
    {
        //
    }
}
