<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['lead_id','version','status','totals','expires_at','accepted_option_id'];
    protected $casts = ['totals'=>'array','expires_at'=>'datetime'];
    public function lead(){ return $this->belongsTo(Lead::class); }
    public function options(){ return $this->hasMany(QuoteOption::class); }
}
