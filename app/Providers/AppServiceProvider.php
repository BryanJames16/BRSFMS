<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use \App\Models\Documentrequest;
use \App\Models\Reservation;
use \App\Models\User;
use \App\Models\Utility;
use \App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        

        view()->composer('*',function ($view)
        {
            if(Auth::check())
            {

            
            $id = Auth::user()->id;
            $messages= Message::select('messages.id','content', 'dateSent','imagePath', 'firstName','middleName','lastName',
                                                    'isRead')                 
                                        ->join('users', 'users.id', '=', 'messages.senderID')
                                        ->where('receiverID','=', $id)
                                        ->orderby('dateSent','desc')
                                        ->get();

            $us= User::select('id','firstName', 'middleName','lastName')                 
                                        ->where('id','!=', $id)
                                        ->get();

            $util= Utility::select('brgyLogoPath','provLogoPath','barangayName','address','barangayIDAmount',
                                            'expirationID','yearsOfExpiration','signaturePath')        
                                        ->get();
        

            $mess = Message::where("receiverID", "=", $id)
                            ->where('isRead', 0)
                            ->count();

            $request = Documentrequest::where("status", "=", "Pending")->count();
            $approval = Documentrequest::where("status", "=", "Waiting for approval")->count();
            $pendingres = Reservation::where("status", "=", "Pending")->count();
            $total = $request + $approval + $pendingres;
            View::share('countOfRequest',$request);
            View::share('countOfApproval',$approval);
            View::share('countOfReservation',$pendingres);
            View::share('total',$total);
            View::share('messages',$messages);
            View::share('mess',$mess);
            View::share('us',$us);
            View::share('util',$util);
            }
        }
        );

        

        

        
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
