<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    protected $fillable = ['material_id','location','qty_on_hand','min_qty'];
    public function material(){ return $this->belongsTo(Material::class); }
}
