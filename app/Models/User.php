<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'idrol',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->hasOne("App\Models\Roles",'idrol','idrol');
    }

        /* Scope para busqueda de actividades */
        public function scopebuscar($query,$valorUsuario= null)
        {   
            if($valorUsuario)
            {   
                $query->whereRaw('LOWER(users.name) LIKE \'%'.strtolower($valorUsuario).'%\'');
            } 
                      
            return $query->paginate(10, ['users.name AS name','users.id AS id', 'users.idrol AS idrol']);

        }
}
