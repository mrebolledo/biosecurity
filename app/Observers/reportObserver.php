<?php

namespace App\Observers;

use App\Report;
use App\Worker;

class reportObserver
{
    public function updated(Report $report)
    {
        Worker::create(['test' => $report->an1]);
    }
}
