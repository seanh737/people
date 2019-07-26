<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lists extends Model
{
    public $timestamps = false;
    protected $table = 'lists';
    protected $fillable = [
        'message',
        'user_id',
        'time',
        'done',
    ];
}
