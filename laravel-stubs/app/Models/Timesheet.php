<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    protected $fillable = ['user_id','job_id','hours','notes','date'];
    protected $casts = ['date'=>'date'];
}
