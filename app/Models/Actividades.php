<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'idactividad';
    
    protected $table = 'actividades';
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'idespecialidad',
        'tipoactividad'
    ];

    //1 especialid -> * actividades
    public function especialidad() 
    {
        return $this->belongsTo("App\Models\Especialidades",'idespecialidad','idespecialidad');
    }

    public function pasosactividad()
    {
        return $this->hasMany("App\Models\PasosActividad",'idactividad','idactividad');
    }

    public function actividadesfamilia() 
    {
        return $this->HasMany("App\Models\ActividadesFamilia",'idactividad','idactividad');
    }

    public function intentosjuego() 
    {
        return $this->hasOne("App\Models\IntentosJuego",'idactividad','idactividad');
    }

    /* Scope para busqueda de actividades */
    public function scopebuscar($query,$valorActividad = null, $valorCategoria = null, $tipoActividad = null)
    {   
        if($valorActividad)
        {   
            $query->whereRaw('LOWER(actividades.nombre) LIKE \'%'.strtolower($valorActividad).'%\'');
        } 

        if($valorCategoria)   
        {   
            $query->where('actividades.idespecialidad',$valorCategoria);
        }

        if($tipoActividad)   
        {   
            $query->where('actividades.tipoactividad',$tipoActividad);
        }

        $query->leftjoin('especialidades', 'especialidades.idespecialidad','=','actividades.idespecialidad');
        //$query->leftjoin('especialidades', 'especialidades.idespecialidad','=','actividades.idespecialidad');
        
        return $query->paginate(10, ['actividades.idactividad AS idactividad','actividades.descripcion AS descripcion', 'actividades.nombre AS nombre', 'especialidades.descripcion AS esp_desc']);
        //return $query->get();
        //return $query->get( ['actividades.descripcion', 'especialidades.descripcion AS esp_desc']);
    }

}
