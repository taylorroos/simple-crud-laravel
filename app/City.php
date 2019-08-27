<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cidade';
    protected $primaryKey = 'id_cidade';
    protected $fillable = [
        'nom_cidade',
        'id_estado',
    ];
}
