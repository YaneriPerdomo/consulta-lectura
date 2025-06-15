<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
        protected $table = "books";
    public $timestamps = false;
    protected $primaryKey = 'book_id';


    protected $fillable = [
        'author_id',
        'employee_id',
        'editorial_id',
        'room_id', 
        'language_id',
        'title',
        'sub_title',
        'translator',
        'description',
        'ISBN',
        'page_number',
        'image_path',
        'publication_date'
    ];

     public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function language(){
        return $this->belongsTo(Language::class,'language_id');
    }

    public function author(){
        return $this->belongsTo(Author::class,'author_id');
    }

     public function editorial(){
        return $this->belongsTo(Editorial::class,'editorial_id');
    }

     public function copies(){
        return $this->hasMany(Copie::class, 'book_id');
    }
}
