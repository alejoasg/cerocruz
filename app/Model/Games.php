<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    protected $table = 'games';
    protected $primaryKey ='id_games';
    protected $fillable = ['id_players','tablero', 'finalizo','ganador','nextplay'];
    protected $guarded = ['id_games'];
}
