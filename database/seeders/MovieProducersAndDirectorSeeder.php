<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieProducersAndDirectorSeeder extends Seeder
{
    private static function get_movies(): array
    {
        return array(
            [
                "id_movie" => 1,
                "id_producers_and_director" => 1,
                "type" => "director",
            ],
            [
                "id_movie" => 1,
                "id_producers_and_director" => 2,
                "type" => "producer",
            ],
            [
                "id_movie" => 2,
                "id_producers_and_director" => 2,
                "type" => "director",
            ],
            [
                "id_movie" => 2,
                "id_producers_and_director" => 3,
                "type" => "producer",
            ],
            [
                "id_movie" => 3,
                "id_producers_and_director" => 1,
                "type" => "director",
            ],
            [
                "id_movie" => 3,
                "id_producers_and_director" => 1,
                "type" => "producer",
            ],
            [
                "id_movie" => 4,
                "id_producers_and_director" => 1,
                "type" => "director",
            ],
            [
                "id_movie" => 4,
                "id_producers_and_director" => 1,
                "type" => "producer",
            ],
            [
                "id_movie" => 5,
                "id_producers_and_director" => 2,
                "type" => "director",
            ],
            [
                "id_movie" => 5,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 6,
                "id_producers_and_director" => 1,
                "type" => "director",
            ],
            [
                "id_movie" => 6,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 7,
                "id_producers_and_director" => 2,
                "type" => "director",
            ],
            [
                "id_movie" => 7,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 8,
                "id_producers_and_director" => 5,
                "type" => "director",
            ],
            [
                "id_movie" => 8,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 9,
                "id_producers_and_director" => 1,
                "type" => "director",
            ],
            [
                "id_movie" => 9,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 10,
                "id_producers_and_director" => 2,
                "type" => "director",
            ],
            [
                "id_movie" => 10,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 11,
                "id_producers_and_director" => 1,
                "type" => "director",
            ],
            [
                "id_movie" => 11,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 12,
                "id_producers_and_director" => 6,
                "type" => "director",
            ],
            [
                "id_movie" => 12,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 13,
                "id_producers_and_director" => 1,
                "type" => "director",
            ],
            [
                "id_movie" => 13,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 14,
                "id_producers_and_director" => 7,
                "type" => "director",
            ],
            [
                "id_movie" => 14,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 15,
                "id_producers_and_director" => 1,
                "type" => "director",
            ],
            [
                "id_movie" => 15,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 16,
                "id_producers_and_director" => 8,
                "type" => "director",
            ],
            [
                "id_movie" => 16,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 17,
                "id_producers_and_director" => 7,
                "type" => "director",
            ],
            [
                "id_movie" => 17,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 18,
                "id_producers_and_director" => 1,
                "type" => "director",
            ],
            [
                "id_movie" => 18,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 19,
                "id_producers_and_director" => 2,
                "type" => "director",
            ],
            [
                "id_movie" => 19,
                "id_producers_and_director" => 9,
                "type" => "producer",
            ],
            [
                "id_movie" => 20,
                "id_producers_and_director" => 8,
                "type" => "director",
            ],
            [
                "id_movie" => 20,
                "id_producers_and_director" => 9,
                "type" => "producer",
            ],
            [
                "id_movie" => 21,
                "id_producers_and_director" => 10,
                "type" => "director",
            ],
            [
                "id_movie" => 21,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
            [
                "id_movie" => 21,
                "id_producers_and_director" => 2,
                "type" => "producer",
            ],
            [
                "id_movie" => 21,
                "id_producers_and_director" => 11,
                "type" => "producer",
            ],
            [
                "id_movie" => 21,
                "id_producers_and_director" => 12,
                "type" => "producer",
            ],
            [
                "id_movie" => 21,
                "id_producers_and_director" => 13,
                "type" => "producer",
            ],
            [
                "id_movie" => 22,
                "id_producers_and_director" => 7,
                "type" => "director",
            ],
            [
                "id_movie" => 22,
                "id_producers_and_director" => 4,
                "type" => "producer",
            ],
        );
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = self::get_movies();
        foreach ($movies as $key => $value) {
            DB::table('movie_producers_and_director')->insert([
                "id_movie" => $value['id_movie'],
                "id_producers_and_director" => $value['id_producers_and_director'],
                "type" => $value['type'],
            ]);
        }
    }
}
