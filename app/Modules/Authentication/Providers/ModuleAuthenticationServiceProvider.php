<?php

namespace App\Modules\Authentication\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleAuthenticationServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\Authentication\Http\Controllers';
    
    
    public function boot()
    {
        $this->map();
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'authentication');        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        if(is_dir(__DIR__.'/../Routes') && (file_exists(__DIR__.'/../Routes/web.php')))
        {
            \Route::middleware('web')
                 ->namespace($this->namespace)
                ->group(__DIR__.'/../Routes/web.php');
        }
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        if(is_dir(__DIR__.'/../Routes') && (file_exists(__DIR__.'/../Routes/api.php')))
        {            
            \Route::prefix('api')
                 ->middleware('api')
                 ->namespace($this->namespace)
                 ->group(__DIR__.'/../Routes/api.php');
        }
    }
    
    
}
