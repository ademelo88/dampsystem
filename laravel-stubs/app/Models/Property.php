<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['contact_id','address','postcode','type','age_band','occupancy','ownership'];
    public function contact(){ return $this->belongsTo(Contact::class); }
    public function leads(){ return $this->hasMany(Lead::class); }
}
