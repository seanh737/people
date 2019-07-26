<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /*protected $fillable = [
        'first_name',
        'last_name',
        'city',
        'phone',
        'email',
    ];*/
    protected $table = 'user';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
    ];
}
