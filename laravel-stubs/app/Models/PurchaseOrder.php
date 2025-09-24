<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = ['supplier_id','job_id','items','status','total'];
    protected $casts = ['items'=>'array'];
}
