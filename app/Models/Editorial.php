<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
      protected $table = "editorials";
    public $timestamps = false;
    protected $primaryKey = 'editorial_id';


    protected $fillable = [
        'editorial',
        'slug'
    ];
}
