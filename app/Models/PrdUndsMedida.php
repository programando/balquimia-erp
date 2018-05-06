<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrdUndsMedida extends Model
{
     protected $primaryKey = 'id_med';
     public $timestamps = false;
     protected $table ='prd_unds_medidas';

    protected $casts = [
     'inactivo' => 'bool'
    ];

    protected $fillable = [
     'nom_med', 'inactivo'
    ];
}
