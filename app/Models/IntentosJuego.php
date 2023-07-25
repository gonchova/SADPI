<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntentosJuego extends BaseModel
{
    use HasFactory;

    protected $table = 'intentosjuego';
    protected $primaryKey = 'idactividad';

    protected $fillable = [
        'idactividad',
        'cantintentos',
        'descripcion',
    ];

    //1 intentojuego -> * actividades
    public function actividad() 
    {
        return $this->belongsTo("App\Models\Actividades",'idactividad','idactividad');
    }
}

