<?php

use Illuminate\Database\Seeder;

class eventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Evento::factory()->count(100)->create();
    }
}
