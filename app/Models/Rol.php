<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Rol extends Model
{
    protected $table = 'roles';  
    public $timestamps = false; 

    protected $primaryKey = 'rol_id'; 
    protected $fillable = [ 
        'rol_id',    //ASIGNACION MASIVA
        'rol',
        'description',
    ];

    public function users(){
        return $this->hasMany(User::class, 'rol_id');
    }

}
