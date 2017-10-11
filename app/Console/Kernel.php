<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        // System Back Up
        if (strtolower(env('SYS_BACKUP')) == "yes") {
            $schedule->command('backup:clean')->daily()->at('06:00');
            $schedule->command('backup:run')->daily()->at('07:00');
            $schedule->command('backup:monitor')->daily()->at('09:00');
        }

        // Realtime System
        if (strtolower(env('SYS_REALTIME')) == "yes") {
            $schedule->call('App\Http\Controllers\ReservationController@realtime')->everyMinute();
        }
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
