<?php

namespace Some\Kind\Of;

use Illuminate\Support\ServiceProvider;

class ReactionServiceProvider extends ServiceProvider
{
  /**
  * Register the service provider.
  *
  * @return void
  */
  public function register()
  {
    $this->app->singleton('reaction', function () {
      return $this->app->make('Some\Kind\Of\Reaction');
    });
  }

  /**
  * Bootstrap the application events.
  *
  * @return void
  */
  public function boot()
  {
    //
  }

}
