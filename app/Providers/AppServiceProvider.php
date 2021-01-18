<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!app()->isLocal()) {
            \URL::forceScheme('https');

            $view = config('view.compiled');
            foreach ([$view] as $path) {
                if (! is_dir($path)) {
                    mkdir($path, 0755, true);
                }
            }
        }
    }
}
