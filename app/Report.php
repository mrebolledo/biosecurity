<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $connection= 'grdxf';

    protected $table = 'grdxf.reports';
}
