<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['owner_type','owner_id','type','path','meta'];
    protected $casts = ['meta'=>'array'];
    public function owner(){ return $this->morphTo(); }
}
