<?php

namespace App\Http\Controllers;

use App\Model\Players;
use Illuminate\Http\Request;
use App\Services\GameService;

class GameController extends Controller
{

    /**
     * Muestra la lista de los partidas jugadas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function savegames() {

        $lists = GameService::savegamesService();
        return view('savegames')->with(compact('lists'));
    }
    /**
     * Muestra la lista de los jugadores a escojer para la partida
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function players() {
        $lists = GameService::playersService();
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
        ];

        $messages=['jugador_1.required'=> 'El nombre del jugador 1 es requerido.',
            'jugador_2.required'=> 'El nombre del jugador 2 es requerido.'
        ];
        $this->validate($request, $rules,$messages);
        $players=new Players();
        $players->jugador_1= $request->input('jugador_1');
        $players->jugador_2 = $request->input('jugador_2');
        $players->simbolo_1 = "X";
        $players->simbolo_2="O";
        GameService::storeplayService($players);
        $mensaje = "Puede comenzar a jugar cuando desee dirigiendose a la pestaña a Jugar ";

        return back()->with("mensaje", $mensaje);
    }

    public function tablero()
    {
        $result=GameService::tableroService();
        $juego=$result["juego"];
        $mensaje=$result["mensaje"];
        return view('gameplay')->with(compact('juego','mensaje'));
    }

    public function playing(Request $request)
    {

            $result=GameService::playingService($request->input());
            $juego=$result["juego"];
            $mensaje=$result["mensaje"];

        return view('gameplay')->with(compact('juego'))->with("mensaje", $mensaje);
    }



}
