<?php

namespace App\Repositories\Eloquent;

use App\Models\Showtime;
use App\Repositories\Contracts\ShowtimeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ShowtimeRepository implements ShowtimeRepositoryInterface
{
    public function getAll()
    {
        return Showtime::pluck('start_time', 'id');
    }
}
