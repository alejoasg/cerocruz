<?php

use Illuminate\Database\Seeder;
use App\Model\Players;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Players::create([
            'jugador_1'=> "pepe",
            'jugador_2'=> "papo",
            'simbolo_1'=> '1',
            'simbolo_2'=> '0'
        ]);
    }
}
