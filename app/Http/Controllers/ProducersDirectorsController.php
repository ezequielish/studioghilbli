<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\MoviesProducersDirectorsModel;
use Illuminate\Http\JsonResponse;

class ProducersDirectorsController extends Controller
{

    public function get_all(): JsonResponse
    {
        $all_movies = Movies::all();
        // Movies::gg();
        $data = [];
        foreach ($all_movies as $key => $movie) {
            $data[$key]["id_movie"] = $movie['id_movie'];
            $data[$key]["producer"] = MoviesProducersDirectorsModel::get_all_producer_director_by_type($movie['id'], "producer");
            $data[$key]["director"] = MoviesProducersDirectorsModel::get_all_producer_director_by_type($movie['id'], "director");
            $data[$key]["video_id"] = $movie['id_yt_video'];
        }

        return response()->json([
            'error' => false,
            'message' => 'OK',
            'data' => $data,
        ], 200);
    }
}
