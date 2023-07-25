<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Classes\MultiPrimaryKey;

class PasosActividad extends BaseModel
{
    use HasFactory;
    use MultiPrimaryKey;

    protected $table = 'pasosactividad';
    protected $primaryKey = ['idactividad', 'idpaso'];

    protected $fillable = [
        'descripcion'
    ];
}
