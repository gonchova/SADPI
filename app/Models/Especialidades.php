<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    use HasFactory;

    protected $table = 'especialidades';
    protected $primaryKey = 'idespecialidad';

    protected $fillable = [
        'descripcion',
        'activo',
    ];

    //1 especialid -> * actividades
    public function actividad() 
    {
        return $this->hasMany("App\Models\Actividades",'idespecialidad','idespecialidad');
    }
}
