<?php

use Illuminate\Database\Seeder;

class TecnicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tecnico::class, 5)->create();
    }
}
