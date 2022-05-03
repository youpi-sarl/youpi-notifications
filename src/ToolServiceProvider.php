<?php

namespace Youpi\YoupiNotifications;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Youpi\YoupiNotifications\Http\Middleware\Authorize;

class   ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'YoupiNotifications');

        $this->publishes([
            __DIR__.'/../config/notifications.php' => config_path('youpi-notifications.php'),
        ]);


        $this->publishes([
            __DIR__.'/../resources/lang/' => resource_path('lang/vendor/youpi-notifications'),
        ]);

        $this->registerTranslations();

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            Nova::provideToScript([
                'user_model_namespace' => config('YoupiNotifications.user_model'),
                'play_sound' => config('YoupiNotifications.play_sound'),
                'default_sound' => config('YoupiNotifications.default_sound'),
                'toasted_enabled' => config('YoupiNotifications.toasted_enabled'),
            ]);
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/youpi-notifications')
                ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/notifications.php', 'YoupiNotifications'
        );
    }


    protected function registerTranslations()
    {
        $locale = app()->getLocale();

        Nova::translations(__DIR__.'/../resources/lang/' . $locale . '.json');
        Nova::translations(resource_path('lang/vendor/YoupiNotifications/' . $locale . '.json'));

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'YoupiNotifications');
        $this->loadJSONTranslationsFrom(__DIR__.'/../resources/lang');
        $this->loadJSONTranslationsFrom(resource_path('lang/vendor/YoupiNotifications'));
    }
}
