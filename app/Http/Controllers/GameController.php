<?php

namespace App\Http\Controllers;

use App\Model\Games;
use App\Model\Players;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Session\SessionManager;
use App\Repository\GamesRepository;

class GameController extends Controller
{


    /**
     * Muestra la lista de los partidas jugadas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function savegames() {

        $lists = GamesRepository::savegamesRepository();
        return view('savegames')->with(compact('lists'));
    }
    /**
     * Muestra la lista de los jugadores a escojer para la partida
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function players() {
        $lists = GamesRepository::playersRepository();
        return view('play')->with(compact('lists'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function storeplay(Request $request)
    {
        $rules= [
            'jugador_1'=> 'required',
            'jugador_2'=> 'required',
            'simbolo'=> 'required'
        ];

        $messages=['jugador_1.required'=> 'El nombre del jugador 1 es requerido.',
            'jugador_2.required'=> 'El nombre del jugador 2 es requerido.',
            'simbolo.required'=> 'El simbolo jugador 1 es requerido.',
        ];
        $this->validate($request, $rules,$messages);
        $players=new Players();
        $players->jugador_1= $request->input('jugador_1');
        $players->jugador_2 = $request->input('jugador_2');
        $players->simbolo_1 = $request->input('simbolo');
        $players->simbolo_2=$request->input('simbolo')==1?0:1;
        GamesRepository::storeplayRepository($players);
        $mensaje = "Puede comenzar a jugar cuando desee dirigiendose a la pestaña a Jugar ";
         return back()->with("mensaje", $mensaje);
    }

    public function tablero()
    {
        $juego=GamesRepository::UltimoJuegoRepository();
        if(is_null($juego) or $juego->finalizo)
        {
            $tablero=$this->crearMatrizdeJuego();
            $players=GamesRepository::ultimosJugadoresRepository();
            $juego=array('id_players'=>$players->id_players,
                'tablero'=>$tablero,
                'finalizo'=>0,'ganador'=>"",
                'nextplay'=>1);
            $jugador= $players->jugador_1;
        }
        else
            {
                $players=GamesRepository::playingRepository($juego->id_players);
                $tablero=unserialize($juego->tablero);
                $nextplay=$juego->nextplay;
                $juego=array('id_players'=>$players->id_players,
                    'tablero'=>$tablero,
                    'finalizo'=>$juego->finalizo,'ganador'=>"",
                    'nextplay'=>$nextplay);
                $jugador=$nextplay==1?$players->jugador_1:$players->jugador_2;
            }
        $mensaje = "Le corresponde el turno al jugador ".$jugador;

        return view('gameplay')->with(compact('juego'))->with("mensaje", $mensaje);
    }

    public function playing(Request $request)
    {

        return view('gameplay');
    }

    public function crearMatrizdeJuego()
    {
        $tablero = array_fill(1, 9, 'X');
     return $tablero;
    }

    public function SalvarJuego(Request $request)
    {
        $tabla=$request->input('tabla');
        $tablero=self::generartablero($tabla);
        $players = $request->input('jugadores');
        $juego = new Game();
        $juego->id_players= $players->id_players;
        $juego->tablero = $tablero;
        $juego->finalizo= false;
        $juego->ganador = "";
        $juego->nextplay = $request->input("last");
        GamesRepository::salvarJuegoRepository($juego);
    }

    public function generartablero($tabla)
    {
        return serialize(array());
    }
}
