<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use \App\Models\Documentrequest;
use \App\Models\Reservation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $request = Documentrequest::where("status", "=", "Pending")->count();
        $approval = Documentrequest::where("status", "=", "Waiting for approval")->count();
        $pendingres = Reservation::where("status", "=", "Pending")->count();
        $total = $request + $approval + $pendingres;
        View::share('countOfRequest',$request);
        View::share('countOfApproval',$approval);
        View::share('countOfReservation',$pendingres);
        View::share('total',$total);

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
        }
    }
}
