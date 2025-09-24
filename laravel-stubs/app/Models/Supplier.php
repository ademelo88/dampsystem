<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name','contact','terms','kpis'];
    protected $casts = ['contact'=>'array','terms'=>'array','kpis'=>'array'];
}
