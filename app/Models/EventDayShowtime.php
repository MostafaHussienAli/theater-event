<?php

namespace App\Models;

use App\Http\Filters\EventDayFilter;
use App\Http\Filters\EventDayShowtimeFilter;
use App\Http\Filters\Filterable;
use App\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EventDayShowtime extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_day_id',
        'showtime_id',
        'movie_id',
    ];

    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = EventDayShowtimeFilter::class;

    /**
     * @return BelongsTo
     */
    public function eventDay()
    {
        return $this->belongsTo(EventDay::class);
    }

    /**
     * @return BelongsTo
     */
    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

    /**
     * @return BelongsTo
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
