<?php

namespace App\Repository;

use App\Model\Games;
use App\Model\Players;
use PhpParser\Node\Expr\Empty_;

class GamesRepository
{

    public static function savegamesRepository()
    {
        $games=Games::all();
        return $games;
    }

    public static function playersRepository() {
        $lists = Players::all();
        return $lists;
    }


    public static function storeplayRepository(Players $player)
    {
        return $player->save();
    }

    public static function UltimoJuegoRepository()
    {
        $players= self::ultimosJugadoresRepository();
        $games=Games::select('id_players')->where('id_players',$players->id_players)->get()->first();
        if(is_null($games))
        {
            return  null;
        }
        else
        {
            $lastgame=Games::find($games->idGames);
            return $lastgame;
        }

    }
    public static function ultimosJugadoresRepository()
    {
        $players=Players::get()->last();
        $players=Players::find($players->id_players);
        return $players;
    }

    public static function playingRepository($id_players)
    {
        $players = Players::where('id_players',$id_players)->get()->first;
        return $players;
    }

    public function salvarJuegoRepository( Games $juego)
    {
        return $juego->save();
    }


}

