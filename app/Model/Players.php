<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $table = 'players';
    protected $primaryKey ='id_players';
    protected $fillable = ['jugador_1','jugador_2', 'simbolo_1','simbolo_2'];
    protected $guarded = ['id_players'];

}
