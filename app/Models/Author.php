<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "authors";
    public $timestamps = false;
    protected $primaryKey = 'author_id';


    protected $fillable = [
        'author',
        'gender_id',
        'slug'
    ];
}
