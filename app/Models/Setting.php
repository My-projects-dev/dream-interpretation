<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable = ['status', 'image', 'key', 'static_value'];
    public $translatedAttributes = ['value'];

    public $with = ['translations'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
