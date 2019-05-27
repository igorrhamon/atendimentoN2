<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\HardDrive;

class HardDriveTableSeeder extends Seeder
{
    public function run()
    {
        factory(HardDrive::class, 5)->create();    }
}
