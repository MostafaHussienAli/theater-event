<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\EventDayFilter;
use App\Models\Helpers\UserHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EventDay extends Model
{
    use HasFactory, Filterable, UserHelpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
    ];

    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = EventDayFilter::class;

    /**
     * @return BelongsToMany
     */
    public function showtimes()
    {
        return $this->belongsToMany(Showtime::class, 'event_day_showtimes')
            ->withPivot('movie_id')
            ->using(EventDayShowtime::class);
    }
}
