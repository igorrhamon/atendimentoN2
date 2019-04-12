<?php

use Illuminate\Database\Seeder;

class SupervisorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Supervisor::class, 2)->create();
    }
}
