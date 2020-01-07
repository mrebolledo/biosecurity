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
                $worker = Worker::where('grd_id',$report->grd_id)
                                ->whereDate('date',Carbon::now()->toDateTimeString())
                                ->where('test',$report->an1)->first();

                if(!$worker) {
                    Worker::create([
                        'test' => $report->an1,
                        'grd_id' => $report->grd_id,
                        'date' => Carbon::now()->toDateTimeString()
                    ]);
                }

            }

        }
    }
}
