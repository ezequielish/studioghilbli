<?php

namespace App\Models;

use App\Models\ProducersDirectorsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MoviesProducersDirectorsModel extends Model
{
    use HasFactory;
    protected $table = 'movie_producers_and_director';

    public function producer_director()
    {
        return $this->HasMany(ProducersDirectorsModel::class, 'id', 'id_producers_and_director');
    }

    public static function get_all_producer_director_by_type(int $id_movie, String $type)
    {
        $producers_and_director = self::where([
            ["type", "=", $type], ["id_movie", "=", $id_movie],
        ])->get();

        $people = [];
        foreach ($producers_and_director as $key => $value) {
            foreach ($value->producer_director as $f => $ff) {
                $info = [
                    "name" => $ff['name'],
                    "url" => $ff['photo_url'],
                ];

                array_push($people, $info);
            }
        }
        return $people;
    }

}
