<?php

namespace App\Jobs;

use App\Report;
use App\Worker;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReadDatabase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $reports = Report::get();
        foreach($reports as $report)
        {

            if($report->an1 !== 0) {
                Worker::create([
                    'test' => $report->an1,
                    'date' => Carbon::now()->toDateTimeString()
                ]);
            }

        }
    }
}
