<?php

namespace App\Services;
;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;
use mysql_xdevapi\Result;
use Symfony\Component\EventDispatcher\Tests\Service;

class ConexionService
{

    public static  function conexiontablaService() {

        $lists = self::crearTablaConexion();
        return $lists;
    }

    public static function crearTablaConexion()
    {
        session_start();
        $cities=['Logroño','Zaragoza','Teruel','Madrid','Lleida','Alicante','Castellón','Segovia','Ciudad Real'];
        $connections=array([0,4,6,8,0,0,0,0,0],
            [4,0,2,0,2,0,0,0,0],
            [6,2,0,3,5,7,0,0,0],
            [8,0,3,0,0,0,0,0,0],
            [0,2,5,0,0,0,4,8,0],
            [0,0,7,0,0,0,3,0,7],
            [0,0,0,0,4,3,0,0,6],
            [0,0,0,0,8,0,0,0,4],
            [0,0,0,0,0,7,6,4,0]);

        $connectionscities['cities']=$cities;
        $connectionscities['conections']=$connections;
        $_SESSION['ConexionMatriz']=$connectionscities;
        return $connectionscities;
    }

    public  static function devolverTablaConexion()
    {
        session_start();
        $connectionscities=$_SESSION['ConexionMatriz'];
        session_abort();
        return $connectionscities;

    }

    public static function buscarCaminoService($origen,$destino)
    {
        $connectionscities=self::devolverTablaConexion();

        $grafo=self::crearGrafoPorConexiones($connectionscities['conections']);
        if($origen > $destino)
        {
            $resultcamino=self::caminoCosteMinimo($grafo,$destino,$origen);
            $camino=array_reverse($resultcamino['camino']);
        }
        else
        {
            $resultcamino=self::caminoCosteMinimo($grafo,$origen,$destino);
            $camino=$resultcamino['camino'];
        }
        $mensaje=self::crearMensajePorCamino($camino,$origen,$destino,$resultcamino['pesoTotal']);
        $result['mensaje']=$mensaje;

        return $result;

    }

    public static function crearGrafoPorConexiones($conexionesmatriz)
    {
        $vertices=array();
        $contCitiesorigen=0;
        foreach ($conexionesmatriz as $conexion)
        {
            $contCitiesdestinos=0;
            foreach ($conexion as $peso)
            {
                if($peso>0)
                {
                    if(array_search(array('origen' => $contCitiesdestinos, 'destino' =>$contCitiesorigen , 'peso' => $peso),$vertices)===false)
                    {
                    array_push($vertices, array('origen' => $contCitiesorigen, 'destino' => $contCitiesdestinos, 'peso' => $peso));
                    }
                }
                $contCitiesdestinos++;
            }
            $contCitiesorigen++;
        }
       return $vertices;

    }

    public static function caminoCosteMinimo($GrafoPonderado,$ciudad_origen,$ciudad_destino)
    {

        $arrangecities=self::devolverCiudadesyVecinos($GrafoPonderado);
        $ciudades=$arrangecities['ciudades'];
        $adyacentes=$arrangecities['adyacentes'];
        $contCiudades= count($ciudades);

        // se llenan los arreglos de distancia por ciudad en infinito y el arreglo de secuencia de ciudades en nulo
        $distancia = array_fill(0, $contCiudades, INF);
        $anterior = array_fill(0, $contCiudades, null);

        //se inicializa el primer nodo o ciudad en 0,como peso menor.
        $distancia[$ciudad_origen]=0;
         while(count($ciudades)>0)
         {
             $menordistancia=self::minimoPesoCiudad($ciudades,$distancia);
             $vecinomin=$menordistancia['vecinomin'];
             $ciudades=$menordistancia['ciudades'];
             $distancia=$menordistancia['distancia'];

             //se comprueba si no existen caminos o si se encontro en el vecino cercano la ciudad destino
             if($distancia[$vecinomin]==INF || $vecinomin == $ciudad_destino)
             {
                 break;
             }
             //llenar el arreglo de anteriores buscando los vecinos de menor peso y dandole peso a las ciudades vecinas
              if(isset($adyacentes[$vecinomin]))
              {
                  foreach ($adyacentes[$vecinomin] as $vecinosadyacente)
                  {
                      $sumaAristaConVecino=$distancia[$vecinomin]+ $vecinosadyacente['peso'];
                      if($sumaAristaConVecino<$distancia[$vecinosadyacente['ciudadadyacente']])
                      {
                          $distancia[$vecinosadyacente['ciudadadyacente']]=$sumaAristaConVecino;
                          $anterior[$vecinosadyacente['ciudadadyacente']]= $vecinomin;
                             }

                  }
              }

         }

        self::pesoTotalCaminoMenor(self::crearCaminoMenor($anterior,$ciudad_destino),$adyacentes);
         if($distancia[$vecinomin]===INF)
             return array();
         else
             $camino= self::crearCaminoMenor($anterior,$ciudad_destino);
              $pesoTotal= self::pesoTotalCaminoMenor($camino,$adyacentes);
               $result['camino']=$camino;
               $result['pesoTotal']=$pesoTotal;
         return $result;
    }



    public static function minimoPesoCiudad($ciudades,$distancia)
    {
        $minimo=INF;
        //se recorren las ciudades buscando las ciudades de menor peso
        //en el primer caso solo reconocera el origen
        //Luego reconocera el vecino menor
        foreach ($ciudades as $ciudad)
        {
            if($distancia[$ciudad] < $minimo)
            {
                $minimo=$distancia[$ciudad];
                $vecinomin=$ciudad;
            }
        }
       // se van eliminando las ciudades que ya se visitaron
        $ciudades= array_diff($ciudades,array($vecinomin));

        $result['ciudades']=$ciudades;
        $result['distancia']=$distancia;
        $result['vecinomin']=$vecinomin;

        return $result;

    }

    public static function crearCaminoMenor($anterior,$ciudad_destino)
    {
        $vecinomin=$ciudad_destino;
        $camino=array();
        //Con el arreglo de los caminos minimos, se realiza un recorrido a la inversa para completar el recorrido.
        while(isset($anterior[$vecinomin]))
        {
            array_unshift($camino,$vecinomin);
            $vecinomin=$anterior[$vecinomin];
        }
        array_unshift($camino, $vecinomin);
         return $camino;

    }

    public static function devolverCiudadesyVecinos($GrafoPonderado)
    {
        $ciudades=array();
        $adyacentes=array();
        foreach ($GrafoPonderado as $vector) {

            array_push($ciudades,$vector['origen'],$vector['destino']);

            $adyacentes[$vector['origen']][]=array('ciudadadyacente'=>$vector['destino'],'peso'=>$vector['peso']);
        }
        $ciudades=array_unique($ciudades);
        $result['ciudades']=$ciudades;
        $result['adyacentes']=$adyacentes;
        return $result;
    }

    public static function crearMensajePorCamino($camino,$salida,$llegada,$pesoTotal)
    {
        if(!isset($camino))
        {
            $mensaje="No existe Camino entre las dos ciudades.";
        }
        else
       {

        $cities=['Logroño','Zaragoza','Teruel','Madrid','Lleida','Alicante','Castellón','Segovia','Ciudad Real'];
        $mensaje= "El camino mas corto desde ".$cities[$salida]." hasta ".$cities[$llegada]." es (";
        $start=true;
            foreach ($camino as $city)
            {
                $mensaje.=($start)?$cities[$city]:"-".$cities[$city];
                $start=false;
            }
        }
            return $mensaje."). Con un peso ponderado total de ".$pesoTotal.".";
    }

    public static function pesoTotalCaminoMenor($camino,$adyacentes)
    {
        $peso=0;
        $cont=0;
        while($cont < count($camino)-1)
        {
            foreach ($adyacentes[$camino[$cont]] as $ciudadadyacente)
            {
                if($ciudadadyacente['ciudadadyacente']==$camino[$cont+1])
                    $peso+=$ciudadadyacente['peso'];
            }
            $cont++;
        }

        return $peso;
    }

    public static function caminoEntreOrigenYTodosService($origen)
    {
        $mensajes=array();
        $connectionscities=self::devolverTablaConexion();
        $cities=$connectionscities['cities'];
        $cities=array_keys($cities);
        $anteriorescities=array();
        $mensaje=null;
        $cont=0;
        foreach ($cities as $city)
        {
            if($city!=$origen and !in_array($city,$anteriorescities))
            {
                $mensaje=self::buscarCaminoService($origen,$city);
                array_push($anteriorescities,$city);
                $cont++;
                array_push($mensajes,$mensaje['mensaje']);
            }
        }
        return $mensajes;
    }
}

