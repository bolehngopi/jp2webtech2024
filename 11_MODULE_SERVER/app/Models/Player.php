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
        'squad_number',
        'club_id',
        'positions_id',
        'nationality_id',
        'active'
    ];

    public function club() {
        Player::belongsTo(Club::class);
    }

    public function position() {
        Player::belongsTo(Position::class);
    }

    public function nationality() {
        Player::belongsTo(Nationality::class);
    }
}
