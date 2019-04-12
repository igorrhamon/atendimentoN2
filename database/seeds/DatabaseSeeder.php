<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

//        $this->call(UserTableSeeder::class);
//        $this->call(SupervisorTableSeeder::class);
//        $this->call(LocationTableSeeder::class);
//        $this->call(TecnicoTableSeeder::class);
        $this->call(NewTableSeeder::class);
        Model::reguard();
    }
}
