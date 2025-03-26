<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearningResource extends Model
{
    /** @use HasFactory<\Database\Factories\LearningResourceFactory> */
    use HasFactory, SoftDeletes;
}
