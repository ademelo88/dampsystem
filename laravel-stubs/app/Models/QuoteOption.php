<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteOption extends Model
{
    protected $fillable = ['quote_id','tier','summary','warranty_months','lines','totals'];
    protected $casts = ['lines'=>'array','totals'=>'array'];
    public function quote(){ return $this->belongsTo(Quote::class); }
}
