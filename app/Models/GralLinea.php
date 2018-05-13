<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GralLinea extends Model
{
  protected $primaryKey = 'id_linea';
  public $timestamps = false;
  protected $table ='gral_lineas';

  protected $casts = [
    'orden' => 'int',
    'inactivo' => 'bool'
  ];

  protected $fillable = [
    'cod_linea',
    'nom_linea',
    'orden',
    'inactivo'
  ];

      public function setNomLineaAttribute ( $value ){
        $value = TrimString ( $value,25); // 49 Longitud del campo en la base de datos
        $value = mb_strtoupper( $value,'UTF-8');
        $this->attributes['nom_linea'] = $value ;
    }


  public function SubLineas() {
    return $this->hasMany(\App\Models\GralLineasSubLinea::class, 'id_linea');
  }



}
