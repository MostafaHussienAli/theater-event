<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface MovieRepositoryInterface
{
    public function getAll();
}
