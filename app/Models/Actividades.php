<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    use HasFactory;
    protected $primaryKey = 'idactividad';

    protected $fillable = [
        'descripcion',
        'idespecialidad',
    ];

    //1 especialid -> * actividades
    public function especialidad() 
    {
        return $this->belongsTo("App\Models\Especialidades",'idespecialidad','idespecialidad');
    }

    /* Scope para busqueda de actividades */
    public function scopebuscar($query,$valorActividad = null, $valorCategoria = null)
    {   
        if($valorActividad)
        {   
            $query->whereRaw('LOWER(actividades.descripcion) LIKE \'%'.strtolower($valorActividad).'%\'');
        } 

        if($valorCategoria)   
        {   
            $query->where('actividades.idespecialidad',$valorCategoria);
        }

        $query->join('especialidades', 'especialidades.idespecialidad','=','actividades.idespecialidad');
        
        return $query->get( ['actividades.descripcion', 'especialidades.descripcion AS esp_desc']);
    }

}
