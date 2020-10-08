<?php

use Illuminate\Database\Seeder;
use App\Model\Games;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Games::create([
            'id_players'=> 1,
            'tablero'=> "prueba",
            'finalizo'=> 1,
            'ganador'=> 'pepe',
            'nextplay'=>1
        ]);
    }
}
