<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\MovieProducersAndDirectorSeeder;
use Database\Seeders\MoviesSeeder;
use Database\Seeders\ProducersDirectorsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(MoviesSeeder::class);
        $this->call(ProducersDirectorsSeeder::class);
        $this->call(MovieProducersAndDirectorSeeder::class);

    }
}
