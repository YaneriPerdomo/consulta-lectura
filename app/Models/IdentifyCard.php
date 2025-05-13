<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdentifyCard extends Model
{
       protected $table = 'identity_cards';  
    public $timestamps = false; 

    protected $primaryKey = 'identity_card_id'; 
    protected $fillable = [ 
        'identity_card_id',
        'identify_card',
    ];

    public function persons(){
        return $this->hasMany(Person::class, 'identity_card_id');
    }
}
