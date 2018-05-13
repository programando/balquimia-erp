<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RhCargo extends Model
{
  protected $primaryKey = 'id_cargo';
  public $timestamps = false;
  protected $table = 'rh_cargos';

  protected $casts = [
    'inactivo' => 'bool'
  ];

  protected $fillable = [
    'cod_cargo',
    'nom_cargo',
    'inactivo'
  ];


    public function setNomCargoAttribute ( $value ){
        $value = TrimString ( $value,49); // 49 Longitud del campo en la base de datos
        $value = mb_strtoupper( $value,'UTF-8');
        $this->attributes['nom_cargo'] = $value ;
    }

}
