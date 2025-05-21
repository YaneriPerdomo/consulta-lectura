<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeState extends Model
{
    
    protected $table = "types_state";
    public $timestamps = false;
    protected $primaryKey = 'type_state_id';


    protected $fillables = [
        'type_state_id',
        'type_state'
    ];
}
