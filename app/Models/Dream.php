<?php

namespace App\Models;

use App\Models\Concerns\TranslatableColumnsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Dream extends Model implements TranslatableContract
{
    use HasFactory, Translatable, TranslatableColumnsTrait;

    protected $fillable = ['status','image'];
    public $translatedAttributes = ['name', 'slug', 'title', 'description', 'keywords', 'text'];

    public $with = ['translations'];

    public function getAppUrlAttribute()
    {
        if (isset($this->transslug)) {
            return route('dreams.show', ['language'=>app()->getLocale(), 'slug' => $this->transslug]);
        }
        return 'javascript:void(0);';
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function category()
    {
        return $this->belongsTo(DreamCategory::class, 'category_id', 'id');
    }
}
