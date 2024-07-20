<?php

namespace App\Models;

use App\Http\Filters\ShowtimeFilter;
use App\Http\Filters\Filterable;
use App\Models\Helpers\UserHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Showtime extends Model
{
    use HasFactory, Filterable, UserHelpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_time',
        'end_time',
    ];

    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = ShowtimeFilter::class;

    /**
     * @return HasMany
     */
    public function eventDayShowtimes()
    {
        return $this->hasMany(EventDayShowtime::class);
    }
}
