<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $table = "languages";
    public $timestamps = false;
    protected $primaryKey = 'language_id';



    protected $fillables = [
        'language',
        'slug'
    ];

   public function books(){
        return $this->hasMany(Book::class, 'language_id');
    }
}
