<?php

namespace App\Http\Controllers;

use App\Report;
use App\Worker;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index($value)
    {
        Worker::create(['test' => $value]);
    }

    public function checkValues()
    {
        dd(Worker::get(), Report::where('grd_id',2)->first());
    }
}
