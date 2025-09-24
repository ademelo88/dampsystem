<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['invoice_id','method','amount','reference','received_at','meta'];
    protected $casts = ['received_at'=>'datetime','meta'=>'array'];
    public function invoice(){ return $this->belongsTo(Invoice::class); }
}
