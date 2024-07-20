<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\MovieFilter;
use App\Models\Helpers\UserHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory, Filterable, UserHelpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = MovieFilter::class;

    /**
     * @return HasMany
     */
    public function eventDayShowtimes()
    {
        return $this->hasMany(EventDayShowtime::class);
    }
}
