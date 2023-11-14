<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Producers_DirectorsSeeder extends Seeder
{
    private static function get_people(): array
    {
        return array(
            [
                "name" => "Hayao Miyazaki",
                "url" => "",
            ],
            [
                "name" => "Isao Takahata",
                "url" => "",
            ],
            [
                "name" => "Toru Hara",
                "url" => "",
            ],
            [
                "name" => "Toshio Suzuki",
                "url" => "",
            ],
            [
                "name" => "Yoshifumi Kondō",
                "url" => "",
            ],
            [
                "name" => "Yoshifumi Kondō",
                "url" => "",
            ],
            [
                "name" => "Hiroyuki Morita",
                "url" => "",
            ],
            [
                "name" => "Gorō Miyazaki",
                "url" => "",
            ],
            [
                "name" => "Hiromasa Yonebayashi",
                "url" => "",
            ],
            [
                "name" => "Yoshiaki Nishimura",
                "url" => "",
            ],
            [
                "name" => "Michaël Dudok de Wit",
                "url" => "",
            ],
            [
                "name" => "Vincent Maraval",
                "url" => "",
            ],
            [
                "name" => "Pascal Caucheteux",
                "url" => "",
            ],
            [
                "name" => "Grégoire Sorlat",
                "url" => "",
            ],
        );
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $people = self::get_people();
        foreach ($people as $key => $value) {
            $model = DB::table('producers_and__director');
            $person = $model->where('name', $value['name'])->first();

            if (isset($person->name)) {
                $person->name = $value['name'];
                $person->photo_url = $value['url'];
            }

            $model->insert([
                'name' => $value['name'],
                'photo_url' => $value['url'],
            ]);
        }
    }
}
