<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabourRate extends Model
{
    protected $fillable = ['role','hourly_rate','overhead_pct','note'];
}
