<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CampTableSeeder;
use Database\Seeders\CampBenefitTableSeeder;
use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CampTableSeeder::class,
            CampBenefitTableSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
