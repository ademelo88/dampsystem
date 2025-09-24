<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
    protected $fillable = ['code','name','description','bom','labour_hours','tags'];
    protected $casts = ['bom'=>'array','tags'=>'array'];
}
