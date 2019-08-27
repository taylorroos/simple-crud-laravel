<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'peoples';

    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:m:i';

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'location',
    ];
}
