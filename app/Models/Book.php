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
        'editorial_id',
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
}
