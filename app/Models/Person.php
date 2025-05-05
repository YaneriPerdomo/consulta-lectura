<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';  
    public $timestamps = true; 

    protected $primaryKey = 'person_id'; 
    protected $fillable = [ 
        'user_id',
        'avatar_id',
        'identity_card_id',
        'name',    //ASIGNACION MASIVA
        'lastname',
        'cedula',
        'email',
        'number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' es la clave foránea en esta tabla
    }

    public function avatar(){
        return $this->belongsTo(Avatar::class,'avatar_id'); 
    }

}
