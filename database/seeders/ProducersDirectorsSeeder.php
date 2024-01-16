<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProducersDirectorsSeeder extends Seeder
{
    private static function get_people(): array
    {
        return array(
            [
                "name" => "Hayao Miyazaki",
                "url" => "producer_director/Hayao_Miyazaki.jpg",
            ],
            [
                "name" => "Isao Takahata",
                "url" => "producer_director/Isao_Takahata.jpg",
            ],
            [
                "name" => "Toru Hara",
                "url" => "producer_director/Toru_Hara.png",
            ],
            [
                "name" => "Toshio Suzuki",
                "url" => "producer_director/Toshio_Suzuki.jpg",
            ],
            [
                "name" => "Yoshifumi Kondō",
                "url" => "producer_director/Yoshifumi_Kondō.png",
            ],
            [
                "name" => "Hiroyuki Morita",
                "url" => "producer_director/Hiroyuki_Morita.jpg",
            ],
            [
                "name" => "Gorō Miyazaki",
                "url" => "producer_director/Gorō_Miyazaki.jpg",
            ],
            [
                "name" => "Hiromasa Yonebayashi",
                "url" => "producer_director/Hiromasa_Yonebayashi.jpg",
            ],
            [
                "name" => "Yoshiaki Nishimura",
                "url" => "producer_director/Yoshiaki_Nishimura.jpg",
            ],
            [
                "name" => "Michaël Dudok de Wit",
                "url" => "producer_director/Michaël_Dudok_de_Wit.jpg",
            ],
            [
                "name" => "Vincent Maraval",
                "url" => "producer_director/Vincent_Maraval.jpg",
            ],
            [
                "name" => "Pascal Caucheteux",
                "url" => "producer_director/Pascal_Caucheteux.jpg",
            ],
            [
                "name" => "Grégoire Sorlat",
                "url" => "producer_director/Grégoire_Sorlat.jpg",
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
            $model = DB::table('producers_and_director');
            $person = $model->where('name', $value['name'])->first();

            if (isset($person->name)) {
                $model->where('name', $value['name'])->update(['name' => $value['name']]);
                $model->where('name', $value['name'])->update(['photo_url' => $value['url']]);
            } else {
                $model->insert([
                    'name' => $value['name'],
                    'photo_url' => $value['url'],
                ]);
            }
        }
    }
}
