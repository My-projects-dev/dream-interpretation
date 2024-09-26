<?php

namespace App\Models;

use App\Models\Concerns\TranslatableColumnsTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory, Translatable, TranslatableColumnsTrait;
    protected $fillable = ['status'];
    protected $translatedAttributes = ['title', 'content'];
    public $with = ['translations'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
