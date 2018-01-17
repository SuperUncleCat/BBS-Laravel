<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\User::observe(\App\Observers\UserObserver::class);
		\App\Topic::observe(\App\Observers\TopicObserver::class);
    \App\Reply::observe(\App\Observers\ReplyObserver::class);
    \App\Link::observe(\App\Observers\LinkObserver::class);

        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(app()->isLocal()){
          $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }
}
