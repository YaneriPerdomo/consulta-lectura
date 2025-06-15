<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Copie extends Model
{
    protected $table = "copies_books";
    public $timestamps = false;
    protected $primaryKey = 'copie_book_id';


    protected $fillable = [
        'copie_book_id',
        'book_id',
        'type_state_id',
        'acquisition_date',
        'location',
        'notes'
    ];

    public function book(){
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function typeState(){
        return $this->belongsTo(TypeState::class,'type_state_id');
    }
}
