<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait Sluggable
{
    public static function bootSluggable()
    {
        static::creating(function ($model) {
            $model->slug = $model->generateUniqueSlug($model->slug);
        });

        static::updating(function ($model) {
            $model->slug = $model->generateUniqueSlug($model->slug, $model->id);
        });
    }

    protected function generateUniqueSlug($name, $id = null)
    {
        $slug = Str::slug($name);

        if (static::whereSlug($slug)->where('id', '!=', $id)->exists()) {
            $count = 1;
            $newSlug = $slug . '-' . $count;
            while (static::whereSlug($newSlug)->where('id', '!=', $id)->exists()) {
                $count++;
                $newSlug = $slug . '-' . $count;
            }
            return $newSlug;
        }

        return $slug;
    }
}
