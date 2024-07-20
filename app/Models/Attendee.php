<?php

namespace App\Models;

use App\Http\Filters\AttendeeFilter;
use App\Http\Filters\Filterable;
use App\Models\Helpers\UserHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendee extends Model
{
    use HasFactory, Filterable, UserHelpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'event_day_id',
        'showtime_id',
        'movie_id',
    ];

    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = AttendeeFilter::class;

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
