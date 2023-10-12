<?php

namespace App\Models;

use App\Events\ChirpCreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    use HasFactory;
    /**
     * Champs qu'on peut soumettre
     */
    protected $fillabe = [
        'message'
    ];

    /**
     * Champs qu'on ne peut pas soumettre
     */
    protected $guarded = [];
public function user(){
    return $this->belongsTo(User::class);
}
    protected $dispatchesEvent = [
        'created' => ChirpCreatedEvent::class,
        // 'updated' => ,
        // 'deleted' => ,
    ];
}
