<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesFamilia extends Model
{
   // use HasFactory;

    protected $primaryKey = 'idactividadfamilia';
    
    protected $table = 'actividadesfamilia';
    public $timestamps = ["created_at"]; 
    const UPDATED_AT = null; 
    const CREATED_AT = null; 
    
    protected $fillable = [
        'idactividadfamilia',
        'idusuario',
        'idactividad',
        'fecdesde',
        'fecdasta',
        'cantdia'
    ];
    // una ActividadFamila tiene un idactividad
    public function actividades() 
    {
        return $this->BelongsTo("App\Models\Actividades",'idactividad','idactividad');
    }

    public function actividadesAvances() 
    {
        return $this->BelongsTo("App\Models\ActividadesAvances",'idactividadfamilia','idactividadfamilia');
    }


}
