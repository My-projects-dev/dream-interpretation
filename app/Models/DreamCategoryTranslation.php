<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DreamCategoryTranslation extends Model
{
    use HasFactory;
    public $fillable = ['name'];
    public $timestamps = false;

}
