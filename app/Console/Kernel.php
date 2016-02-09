<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Orchestra\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
        Commands\Com\ScanComputers::class,
        Commands\ActiveDirectory\SyncUsers::class,
        Commands\ClearMonthlyData::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('computers:scan')->everyFiveMinutes();

        $schedule->command('computers:clear-monthly')->everyTenMinutes();

        $schedule->command('users:sync')->hourly();
    }
}
