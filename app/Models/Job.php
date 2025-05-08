<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';  
    public $timestamps = false; 

    protected $primaryKey = 'job_id'; 
    protected $fillable = [ 
        'job',
    ];

    public function employees(){
        return $this->hasMany(Employee::class, 'room_id');
    }
}
