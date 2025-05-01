<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Role extends Model
{
    protected $table = 'roles';  
    public $timestamps = false; 

    protected $primaryKey = 'role_id'; 
    protected $fillable = [ 
        'role_id',    //ASIGNACION MASIVA
        'rol',
        'description',
    ];

    public function users(){
        return $this->hasMany(User::class, 'role_id');
    }

}
