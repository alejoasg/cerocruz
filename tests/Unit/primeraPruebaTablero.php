<?php

namespace Tests\Unit;

use App\Services\GameService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class primeraPruebaTablero extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public  function test_returnTablero()
    {
        $tablero = array_fill(1, 9, '');

        $tablero1=GameService::crearMatrizdeJuego();

        $this->assertEquals(1,$tablero);
    }
}
