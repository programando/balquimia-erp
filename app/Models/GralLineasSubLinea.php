<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GralLineasSubLinea extends Model
{
    protected $primaryKey = 'id_sub_linea';
  public $timestamps = false;
  protected $table = 'gral_lineas_sub_lineas';

  protected $casts = [
    'id_linea' => 'int',
    'inactivo' => 'bool'
  ];

  protected $fillable = [
    'id_linea',
    'nom_sub_linea',
    'inactivo'
  ];


  public function Linea() {
    return $this->belongsTo(\App\Models\GralLinea::class, 'id_linea');
  }

}
