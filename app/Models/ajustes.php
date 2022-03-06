<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Ajustes extends Model implements AuditableContract{
    use Auditable;
    protected $table='ajustes';
    protected $fillable = ['titulo_sitio', 'logo_url','path_img_upload','path_document_upload','elements_per_page','mail_to'];
   protected $auditExclude = ['id'];
}
