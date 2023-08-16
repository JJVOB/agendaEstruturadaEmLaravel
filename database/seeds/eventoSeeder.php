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
        factory(App\Evento::class, 100)->create();
    }
}
