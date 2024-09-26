<?php

namespace App\Models;

use App\Models\Concerns\TranslatableColumnsTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DreamCategory extends Model implements TranslatableContract
{
    use HasFactory, Translatable, TranslatableColumnsTrait;

    protected $fillable = ['status', 'image'];
    public $translatedAttributes = ['name'];

    public $with = ['translations'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
