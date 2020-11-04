<?php

namespace App\Services;
;
use Illuminate\Http\Request;
use App\Repository\GamesRepository;
use mysql_xdevapi\Result;
use Symfony\Component\EventDispatcher\Tests\Service;

class  GameService
{

    /**
     * Muestra la lista de los partidas jugadas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public static  function savegamesService() {

        $lists = GamesRepository::savegamesRepository();
        return $lists;
    }
    /**
     * Muestra la lista de los jugadores a escojer para la partida
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public static function playersService() {
        $lists = GamesRepository::playersRepository();
        return $lists;
    }

    /**
     * @param Request $request
     */
    public static function storeplayService($players)
    {
        GamesRepository::storeplayRepository($players);
    }

    public static function tableroService()
    {
        session_start();
        $juego=GamesRepository::UltimoJuegoRepository();
        if(is_null($juego) or $juego->finalizo)
        {
            $players=GamesRepository::ultimosJugadoresRepository();
            $juego=self::BuildGame($players);
            $jugador= $players->jugador_1;
        }
        else
        {
            $players=GamesRepository::playingRepository($juego->id_players);
            self::BuildGame($players,$juego['tablero']);
            $jugador=$juego->nextplay==1?$players->jugador_1:$players->jugador_2;
        }
        $mensaje = "Le corresponde el turno al jugador ".$jugador;
        $result=array("juego"=>$juego,"mensaje"=>$mensaje);

        return $result;
    }

    public static function BuildGame($players,$newTablero=null,$ganador="",$next=null)
    {
        if($newTablero==null)
        {
            $tablero=self::crearMatrizdeJuego();
            $finalizo=0;
            $nextplay=1;
        }
        else
        {
            //$tablero=unserialize($juego1->tablero);// se sustituyo temporalmente por el de session
            $juego1=$_SESSION['MiArreglo'];
            $tablero=$newTablero;
            $finalizo=$ganador!=""?1:0;
            $nextplay=($next==null)?$juego1['nextplay']:$next;
        }
        $juego=array('id_players'=>$players->id_players,
            'tablero'=>$tablero,
            'finalizo'=>$finalizo,
            'ganador'=>$ganador,
            'nextplay'=>$nextplay);

        $_SESSION['MiArreglo']=$juego;//aqui se debe guardar en base de datos
        return $juego;
    }

    public static function playingService($request)
    {
        session_start();
        $arraypos= array_keys($request);
        $valor=$request[$arraypos[1]];
        $juego=$_SESSION['MiArreglo'];
        $players = GamesRepository::ultimosJugadoresRepository();
        $checkSame=self::CheckTheSame($juego,$arraypos[1],$players);
        if($checkSame["same"])
        {
               $result = array("juego" => $juego,
               "same" => $checkSame["same"],
               "mensaje" => $checkSame["mensaje"]);
        }
        else
        {
            $newTablero = self::crearMatrizdeJuego($juego['tablero'], $arraypos[1], $valor);
            $ganador = "";
            $next = null;
            switch (self::CheckWinner($newTablero, $juego['nextplay'])) {
                case "X":
                    $ganador = $players->jugador_1;
                    $mensaje = "Ha ganado el jugador " . $ganador . ".Felicidades";
                    break;
                case "O":
                    $ganador = $players->jugador_2;
                    $mensaje = "Ha ganado el jugador " . $ganador . ".Felicidades";
                    break;
                case "E":
                    $ganador = "empate";
                    $mensaje = "El juego ha quedado empatado.Buena Partida";
                    break;
                default:
                    $jugador = $juego['nextplay'] == 1 ? $players->jugador_2 : $players->jugador_1;
                    $next = $juego['nextplay'] == 1 ? 2 : 1;
                    $mensaje = "Le corresponde el turno al jugador " . $jugador;
                    break;
            }
            $juego = self::BuildGame($players, $newTablero, $ganador, $next);
            $result = array("juego" => $juego, "mensaje" => $mensaje, "same" => false);
        }
        return $result;
    }

    public static function CheckWinner($tablero,$nextplay)
    {
        $countKeys=array_count_values($tablero);
        $answer="C";
        if((isset($countKeys["O"]) and isset($countKeys["X"])))
        {
            $sum=$countKeys["O"]+$countKeys["X"];
            switch ($sum)
            {
                case $sum>4 && $sum < 9:
                    if($nextplay==1)
                    {
                        $answer=self::checkLine(array_keys($tablero,"X"))?"X":"C";
                    }
                    else
                    {
                        $answer=self::checkLine(array_keys($tablero,"O"))?"O":"C";
                    }
                    break;
                case 9:
                    $answer="E";
                    break;
            }

        }
        return $answer;
    }

    public static  function checkLine($lines)
    {
        $arraywin=array(
            "1"=>array(1,5,9),
            "2"=>array(3,5,7),
            "3"=>array(1,2,3),
            "4"=>array(4,5,6),
            "5"=>array(7,8,9),
            "6"=>array(1,4,7),
            "7"=>array(2,5,8),
            "8"=>array(3,6,9)
        );
        $result=false;
        foreach ($arraywin as $item) {
            if(count(array_intersect($item,$lines))==3)
            {
                $result=true;
                break;
            }
        }
        return $result;
    }

    public static function crearMatrizdeJuego($tablero=null,$newposition=null,$newvalue=null)
    {
        if($newposition==null){
            $tablero = array_fill(1, 9, '');
        }
        else
        {
            $tablero=array_set($tablero,$newposition,$newvalue);

        }

        return $tablero;
    }

    public static function CheckTheSame($juego,$arraypos,$players)
    {
        $tablero=$juego["tablero"];
        $check=$tablero[$arraypos]=="X" || $tablero[$arraypos]=="O";
        $jugador = $juego['nextplay'] == 1 ? $players->jugador_1 : $players->jugador_2;
        $mensaje = "Le corresponde el turno al jugador " . $jugador.
            ". Por favor ".$jugador. " seleccione una casilla que no se encuentre ocupada.";
        $result = array("same" => $check,"mensaje" => $mensaje);
        return $result;
    }

}

