<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Classes\MultiPrimaryKey;

class ActividadComentario extends BaseModel
{
    use HasFactory;
    use MultiPrimaryKey;

    protected $table = 'actividadcomentario';
    protected $primaryKey = ['idactividadfamilia','idnumerodia'];
    
    public $timestamps = ["created_at"]; 
    const UPDATED_AT = null; 
    const CREATED_AT = null; 

    protected $fillable = [
        'idactividadfamilia',
        'idnumerodia',
        'comentario',
        'fecha'
    ];
}
