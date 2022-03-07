<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

Class DatoAbierto extends Model {

    protected $table='datos_abiertos';
    protected $fillable = ['id', 'titulo', 'autor', 'area_id', 'anho', 'descripcion', 'nombre_portada', 'nombre_documento' ,
                            'path_portada', 'path_document', 'idioma', 'programa_id', 'created_at', 'updated_at'];
    protected $auditExclude = ['id', 'area_id', 'updated_at'];

    public function area() {
        return $this->belongsTo('App\Models\area', 'area_id');
    }

    public function programa() {
        return $this->belongsTo('App\Models\programa', 'programa_id');
    }
}
