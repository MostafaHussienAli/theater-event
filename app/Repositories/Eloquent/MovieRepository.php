<?php

namespace App\Repositories\Eloquent;

use App\Models\Movie;
use App\Repositories\Contracts\MovieRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class MovieRepository implements MovieRepositoryInterface
{
    public function getAll()
    {
        return Movie::pluck('name', 'id');
    }
}
