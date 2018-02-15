<?php

namespace App\Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleAdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    protected $namespace = 'App\Modules\Admin\Http\Controllers';

    public function boot()
    {   
         $this->mapWebRoutes();
         $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'admin');
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
            \Route::middleware(['web', 'auth'])
                 ->namespace($this->namespace)
                ->group(__DIR__.'/../Routes/web.php');
        }
    }
}
