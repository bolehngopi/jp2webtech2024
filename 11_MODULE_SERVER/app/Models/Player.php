<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'height',
        'weight',
        'description',
        'squad_number',
        'club_id',
        'positions_id',
        'nationality_id',
        'active'
    ];

    /**
     * Get the club that the player belongs to.
     */
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    /**
     * Get the position that the player belongs to.
     */
    public function position()
    {
        return $this->belongsTo(Position::class, 'positions_id');
    }

    /**
     * Get the nationality that the player belongs to.
     */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }
}
