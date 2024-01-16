<?php

namespace App\Models;

use App\Models\MoviesProducersDirectorsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movies extends Model
{
    use HasFactory;

    protected $table = 'movies';

    public function producers_directors(): HasMany
    {
        return $this->HasMany(MoviesProducersDirectorsModel::class, 'id_movie', 'id');
    }
}
