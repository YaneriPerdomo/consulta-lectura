<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    protected $primaryKey = 'employee_id'; 
    protected $fillable = [
        'identity_card_id',
        'user_id',
        'room_id',
        'name',
        'lastname',
        'cedula',
        'email',
        'number',
        'low_data'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
