<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['thread_id','from_id','to_id','body','attachments','channel'];
    protected $casts = ['attachments'=>'array'];
}
