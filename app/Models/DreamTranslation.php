<?php

namespace App\Models;

use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DreamTranslation extends Model
{
    use HasFactory, Sluggable;
    public $fillable = ['name', 'slug', 'title', 'description', 'keywords', 'text'];
    public $timestamps = false;
}
