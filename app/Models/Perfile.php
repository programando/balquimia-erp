<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfile extends Model
{
    protected $casts      = ['inactivo' => 'bool'  ];
    protected $fillable   = ['nom_perfil', 'inactivo'];
    protected $hiden      = ['cod_perfil'];
    protected $primaryKey = 'id_perfil';
    protected $table      = 'perfiles' ;
    public    $timestamps    = false;

    public function setNomPerfilAttribute ( $value ){
        $value = TrimString ( $value,49); // 49 Longitud del campo en la base de datos
        $this->attributes['nom_perfil'] = $value ;
    }

}
