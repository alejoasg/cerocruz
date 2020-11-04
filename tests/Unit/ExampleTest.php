<?php

namespace Tests\Unit;

use App\Services\GameService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public  function test_return_Tablero_new()
    {
        $tablero = array_fill(1, 9, '');

        $tablero1=GameService::crearMatrizdeJuego();

        $this->assertEquals($tablero,$tablero1);
    }


    public function test_crear_matriz_de_ciudades_con_pesos()
    {
        //
    }

}
