<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'estado';
    protected $primaryKey = 'id_estado';
    protected $fillable = [
        'nom_estado',
        'sgl_estado',
        'id_pais'
    ];
}
