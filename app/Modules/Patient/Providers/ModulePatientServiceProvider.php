<?php

namespace App\Modules\Patient\Providers;

use Illuminate\Support\ServiceProvider;

class ModulePatientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */

    protected $namespace = 'App\Modules\Patient\Http\Controllers';

    public function boot()
    {
        //
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'patient');
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function mapWebRoutes()
    {
        if(is_dir(__DIR__.'/../Routes') && (file_exists(__DIR__.'/../Routes/web.php')))
        {
            \Route::middleware('web')
                ->prefix('api')
                ->namespace($this->namespace)
                ->group(__DIR__.'/../Routes/web.php');
        }
    }

    protected function mapApiRoutes()
    {
        if(is_dir(__DIR__.'/../Routes') && (file_exists(__DIR__.'/../Routes/api.php')))
        {
            \Route::middleware('api')
                ->prefix('api')
                ->namespace($this->namespace)
                ->group(__DIR__.'/../Routes/api.php');
        }
    }
}
