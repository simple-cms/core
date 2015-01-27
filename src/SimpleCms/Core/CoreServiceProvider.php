<?php namespace SimpleCms\Core;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider {

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot()
  {
    // Register our package views
    $this->loadViewsFrom('core', __DIR__.'/../../views');

    // Register our package translation files
    $this->loadTranslationsFrom('core', __DIR__.'/../../lang');

    // Register the files our package should publish
    $this->publishes([
      // Publish our views
      __DIR__.'/../../views' => base_path('resources/views/vendor/core'),
      // Publish our config
      __DIR__.'/../../config/core.php' => config_path('core.php'),
    ]);
    require __DIR__.'/../../routes.php';
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app->instance('ContentProviderService', new ContentProviderService);
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return [];
  }

}