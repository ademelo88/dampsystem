<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['reg','make','model','mot_due','service_due','meta'];
    protected $casts = ['mot_due'=>'date','service_due'=>'date','meta'=>'array'];
}
