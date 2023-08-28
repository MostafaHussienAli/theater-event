<?php

namespace App\Models;

use App\Http\Filters\CountryFilter;
use App\Http\Filters\Filterable;
use App\Models\Translations\CountryTranslation;
use App\Support\Traits\Selectable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Country extends Model implements HasMedia, TranslatableContract
{
    use HasFactory, Translatable, InteractsWithMedia, Filterable, Selectable;

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name', 'currency'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
        'media',
    ];

    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = CountryFilter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'code',
        'key',
        'currency',
        'is_default',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_default' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * Define the media collections.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('flags')
            ->useFallbackUrl('https://www.countryflags.io/' . $this->code . '/shiny/64.png')
            ->singleFile();
    }

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Handle saving event, it fire when creating and updating.
        static::saving(function (Country $country) {
            if (optional(request()->route())->getName() != "dashboard.countries.status") {
                // Determine default country if not exists.
                if (Country::where('is_default', true)->doesntExist()) {
                    $country->forceFill(['is_default' => true]);
                }

                // If other country marked as default, replace the default country with it.
                if ($country->is_default) {
                    Country::withoutEvents(function () {
                        Country::where('is_default', true)->update([
                            'is_default' => null,
                        ]);
                    });

                    $country->forceFill(['is_default' => true]);
                }
            }
        });
    }

    /**
     * Scope the query to include only default country.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDefault(Builder $builder)
    {
        return $builder->where('is_default', true);
    }

    /**
     * Scope a query to only include active country.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * set Active Status.
     */
    public function setActiveStatus()
    {
        $this->forceFill(['active' => $this->active == 1 ? 0 : 1])->save();
    }

    /**
     * city translation model.
     * @var string
     */
    public $translationModel = CountryTranslation::class;


    /**
     * start activity log.
     */

    // Customize log name
    protected static $logName = 'countries';

    // Only defined attribute will store in log while any change
    protected static $logAttributes = [
        'code',
        'key',
        'currency',
        'is_default',
    ];

    // Customize log description
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Country has been {$eventName}";
    }

    /*
     * End activity log.
     */
}
