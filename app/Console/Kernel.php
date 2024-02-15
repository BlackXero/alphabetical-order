<?php

namespace App\Console;

use App\Models\RemoteDataset;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(static function(){
            try {
                $url = env('FETCH_URL','https://dev.shepherds-mountain.appoly.io/fruit.json');
                $data = file_get_contents($url);
                $dataset = new RemoteDataset();
                $dataset->fill([
                    'dataset' => $data
                ]);
                $dataset->save();
                Log::info('Dataset saved successfully.',[]);
            }catch (\Exception $exception){
                Log::info('Some issue with fetch url',[$exception]);
            }
        })->hourly();
        //->everyTenSeconds();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
