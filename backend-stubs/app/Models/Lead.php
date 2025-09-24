<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = ['contact','property','problems','status'];
    protected $casts = [
        'contact'  => 'array',
        'property' => 'array',
        'problems' => 'array',
    ];
}
