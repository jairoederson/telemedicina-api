<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\loggerLink'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('sendsms')->everyMinute();
        $schedule->command('sendnotification')->everyMinute();
        
        //$date = new DateTime;
        //$date->modify('-2 minutes');
        //$formatted_date = $date->format('Y-m-d H:i:s');

        $schedule->call(function () {
            DB::table('verifications_code')->where('status','=','pending')->where('created_at','<',Carbon::now()->subMinutes(2)->toDateTimeString())->update(['status' => 'expired']);
            //DB::table('verifications_code')->update(['status' => 'expired']);
        //})->cron('*/2 * * * *');
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
