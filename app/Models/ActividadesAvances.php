<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesAvances extends Model
{
    use HasFactory;

    protected $table = 'actividadesavances';
    protected $primaryKey = 'idactividadfamilia';
    
    public $timestamps = ["created_at"]; 
    const UPDATED_AT = null; 
    const CREATED_AT = null; 

    protected $fillable = [
        'idactividadfamilia',
        'cantdiasfinalizados',
        'estado',
        'ultimodiarealizada',
        'cantintentosdiarealizados'
    ];

    public function actividadesFamilia() 
    {
        return $this->hasOne("App\Models\ActividadesFamilia",'idactividadfamilia','idactividadfamilia');
    }
}
