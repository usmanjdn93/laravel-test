<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = ['title', 'body', 'published_at', 'slug'];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($post) {
            $post->update(['slug' => $post->title]);
        });
    }

    /**
     * @param $value
     */
    public function setPublishedAtAttribute($value)
    {
        $date = Carbon::parse($value, $this->getLocalTimeZone());
        $new_date = $date->setTimezone('UTC');

        $this->attributes['published_at'] = $new_date;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getPublishedAtAttribute($value)
    {
        $tz = $this->getLocalTimeZone();

        return Carbon::parse($value)->setTimezone($tz)->toDayDateTimeString();
    }

    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = str_slug($value))->exists()) {
            $slug = "{$slug}-{$this->id}";
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * Get the route key name.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return false|string
     */
    private function getLocalTimeZone()
    {
        $ip = request()->ip();
        $url = 'http://ip-api.com/json/' . $ip;
        $tz = file_get_contents($url);
        $tz = json_decode($tz, true)['timezone'];

        // return 'Europe/Stockholm';

        return $tz;

    }
}


