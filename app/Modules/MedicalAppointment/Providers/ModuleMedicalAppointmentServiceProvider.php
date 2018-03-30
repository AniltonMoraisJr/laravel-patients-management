<?php

namespace App\Modules\MedicalAppointment\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleMedicalAppointmentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */

    protected $namespace = 'App\Modules\MedicalAppointment\Http\Controllers';

    public function boot()
    {
        //
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'medicala ppointment');
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
