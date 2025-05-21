<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';  
    public $timestamps = false; 

    protected $primaryKey = 'room_id'; 
    protected $fillable = [ 
        'room',
        'description',
        'slug'
    ];

    public function employees(){
        return $this->hasMany(Employee::class, 'room_id');
    }

    public function books(){
        return $this->hasMany(Book::class, 'room_id');
    }
}
