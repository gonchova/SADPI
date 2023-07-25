<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuegosAvances extends Model
{
    use HasFactory;
    
    protected $table = 'juegosavances';
    protected $primaryKey = 'idactividadfamilia';

    protected $fillable = [
        'idactividadfamilia',
        'estado',
        'cantintentoscompletados',
        'ultimodiarealizada',

    ];

    //1 intentojuego -> * actividades
    public function actividad() 
    {
        return $this->belongsTo("App\Models\Actividades",'idactividad','idactividad');
    }
}
