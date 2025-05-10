<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
     protected $table = 'genders';

     protected $fillable = [
        'gender_id',
        'gender'
     ];

     public function employees(){
        return $this->hasMany(Employee::class,'gender_id');
     }

     public function persons(){
        return $this->hasMany(Person::class,'gender_id');
     }
}
