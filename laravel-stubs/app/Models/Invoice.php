<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['job_id','type','lines','total','vat_rate','due_at','status'];
    protected $casts = ['lines'=>'array','due_at'=>'datetime'];
    public function job(){ return $this->belongsTo(Job::class); }
}
