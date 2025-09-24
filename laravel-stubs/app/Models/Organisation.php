<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $fillable = ['name','type','notes'];
    public function contacts(){ return $this->hasMany(Contact::class); }
}
