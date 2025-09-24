<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['contact_id','property_id','problems','severity','duration','status','metadata'];
    protected $casts = ['problems'=>'array','metadata'=>'array'];
    public function contact(){ return $this->belongsTo(Contact::class); }
    public function property(){ return $this->belongsTo(Property::class); }
    public function surveys(){ return $this->hasMany(Survey::class); }
}
