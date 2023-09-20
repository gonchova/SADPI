<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    
    protected $table = 'roles';
    protected $primaryKey = 'idrol';
    
    const UPDATED_AT = null; 
    const CREATED_AT = null; 

    protected $fillable = [
        'idrol',
        'descripcion'        
    ];

    public function user() 
    {
        return $this->belongsTo("App\Models\User",'idrol','idrol');
    }
}
