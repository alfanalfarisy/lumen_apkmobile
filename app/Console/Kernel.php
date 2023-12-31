<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Untuk menginisialisasi command agar dapat dijalankan
        Commands\DownloadCuaca::class,
        Commands\GempaCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Untuk menjalankan cron job
        $schedule->command('download:cuaca')->everyMinute();
        $schedule->command('download:gempa')->everyMinute();
    }
}