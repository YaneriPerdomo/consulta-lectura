<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $table = 'avatars';  
    public $timestamps = false; 

    protected $primaryKey = 'avatar_id'; 
    protected $fillable = [ 
        'avatar_id',
        'avatar'
    ];

    public function persons(){
        return $this->hasMany(Person::class, 'avatar_id');
    }

    public function employees(){
        return $this->hasMany(Employee::class, 'avatar_id');
    }
}
