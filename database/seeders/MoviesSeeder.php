<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesSeeder extends Seeder
{

    private static function get_movies(): array
    {
        return array(
            [
                "id" => "2baf70d1-42bb-4437-b551-e5fed5a87abe",
                "id_yt_video" => "8ykEy-yPBFc?si=AUBhajALlYSRJ8YA",
            ],
            [
                "id" => "12cfb892-aac0-4c5b-94af-521852e46d6a",
                "id_yt_video" => "4vPeTSRd580?si=Oi8gOGPRwizUQwxK",
            ],
            [
                "id" => "58611129-2dbc-4a81-a72f-77ddfc1b1b49",
                "id_yt_video" => "nqAxRJhUT3k?si=Vp4KTwOEVb0e72xk",
            ],
            [
                "id" => "ea660b10-85c4-4ae3-8a5f-41cea3648e3e",
                "id_yt_video" => "4bG17OYs-GA?si=GctZiBo6fkhVie5U",
            ],
            [
                "id" => "4e236f34-b981-41c3-8c65-f8c9000b94e7",
                "id_yt_video" => "OfkQlZArxw0?si=2jrsnduXvoPtWDB6",
            ],
            [
                "id" => "ebbb6b7c-945c-41ee-a792-de0e43191bd8",
                "id_yt_video" => "awEC-aLDzjs?si=BVid4sHMXt-QKAuh",
            ],
            [
                "id" => "1b67aa9a-2e4a-45af-ac98-64d6ad15b16c",
                "id_yt_video" => "_7cowIHjCD4?si=9xsIrkd3jADsLAB3",
            ],
            [
                "id" => "ff24da26-a969-4f0e-ba1e-a122ead6c6e3",
                "id_yt_video" => "0pVkiod6V0U?si=m83TJ91mcVpyxjTU",
            ],
            [
                "id" => "0440483e-ca0e-4120-8c50-4c8cd9b965d6",
                "id_yt_video" => "4OiMOHRDs14?si=uVr2-luphmgnA8Rp",
            ],
            [
                "id" => "45204234-adfd-45cb-a505-a8e7a676b114",
                "id_yt_video" => "1C9ujuCPlnY?si=KOtVE5lvVEUezpll",
            ],
            [
                "id" => "dc2e6bd1-8156-4886-adff-b39e6043af0c",
                "id_yt_video" => "ByXuk9QqQkk?si=5YH_aizgYKuY8SF6",
            ],
            [
                "id" => "90b72513-afd4-4570-84de-a56c312fdf81",
                "id_yt_video" => "Gp-H_YOcYTM?si=AoGtMt8JMQH9AFC6",
            ],
            [
                "id" => "cd3d059c-09f4-4ff3-8d63-bc765a5184fa",
                "id_yt_video" => "iwROgK94zcM?si=KZrPGwk-J3s4ylPq",
            ],
            [
                "id" => "112c1e67-726f-40b1-ac17-6974127bb9b9",
                "id_yt_video" => "8hxYx3Jq3kI?si=CwrNGqc22K6ySAjn",
            ],
            [
                "id" => "758bf02e-3122-46e0-884e-67cf83df1786",
                "id_yt_video" => "d3RQYjmDRgg?si=Ha4sxKacphepfhAB",
            ],
            [
                "id" => "2de9426b-914a-4a06-a3a0-5e6d9d3886f6",
                "id_yt_video" => "9CtIXPhPo0g?si=aurOWlb96VWcvT2s",
            ],
            [
                "id" => "45db04e4-304a-4933-9823-33f389e8d74d",
                "id_yt_video" => "9nzpk_Br6yo?si=kqvfZaw4Gmambybc",
            ],
            [
                "id" => "67405111-37a5-438f-81cc-4666af60c800",
                "id_yt_video" => "RzSpDgiF5y8?si=yJhTGGry1w0X_a2G",
            ],
            [
                "id" => "578ae244-7750-4d9f-867b-f3cd3d6fecf4",
                "id_yt_video" => "W71mtorCZDw?si=yFee2S56fQCovobR",
            ],
            [
                "id" => "5fdfb320-2a02-49a7-94ff-5ca418cae602",
                "id_yt_video" => "jjmrxqcQdYg?si=3UNRcGLPapkPrXTV",
            ],
            [
                "id" => "d868e6ec-c44a-405b-8fa6-f7f0f8cfb500",
                "id_yt_video" => "Sw7BggqBpTk?si=uHR-NIWOacYJ9d7x",
            ],
            [
                "id" => "790e0028-a31c-4626-a694-86b7a8cada40",
                "id_yt_video" => "_PfhotgXEeQ?si=ORWqnJ0OSpLd2mx2",
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
            DB::table('movies')->insert([
                'id_movie' => $value['id'],
                'id_yt_video' => $value['id_yt_video'],
            ]);
        }
    }
}
