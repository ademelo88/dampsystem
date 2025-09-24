<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['lead_id','data','notes'];
    protected $casts = ['data'=>'array'];
    public function lead(){ return $this->belongsTo(Lead::class); }
}
