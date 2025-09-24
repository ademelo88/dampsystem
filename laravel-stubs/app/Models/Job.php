<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['quote_id','schedule_start','schedule_end','status','crew_notes'];
    protected $casts = ['schedule_start'=>'datetime','schedule_end'=>'datetime'];
    public function quote(){ return $this->belongsTo(Quote::class); }
}
