<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    protected $primaryKey = 'employee_id'; 
    protected $fillable = [
        'identity_card_id',
        'user_id',
        'avatar_id',
        'room_id',
        'job_id',
        'gender_id',
        'name',
        'lastname',
        'cedula',
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

    public function job(){
        return $this->belongsTo(Job::class,'job_id');
    }

    
    public function avatar(){
        return $this->belongsTo(Avatar::class,'avatar_id'); 
    }

    public function gender(){
        return $this->belongsTo(Gender::class,'gender_id'); 
    }

}
