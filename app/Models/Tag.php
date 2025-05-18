<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

      protected $table = "tags";
    public $timestamps = false;
    protected $primaryKey = 'tag_id';

  

    protected $fillables = [
        'tag',
        'slug'
    ];
}
