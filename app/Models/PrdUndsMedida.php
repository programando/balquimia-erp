<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrdUndsMedida extends Model
{
     protected $table      ='prd_unds_medidas';
     protected $primaryKey = 'id_med';
     public $timestamps    = false;


    protected $casts = [
     'inactivo' => 'bool'
    ];

    protected $fillable = [
     'nom_med', 'inactivo'
    ];
}
