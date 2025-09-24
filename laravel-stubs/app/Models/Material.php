<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['sku','name','unit','cost','supplier_id','category','vat_rate','meta'];
    protected $casts = ['meta'=>'array'];
    public function supplier(){ return $this->belongsTo(Supplier::class); }
}
