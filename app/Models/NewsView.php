<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsView extends Model
{
    /** @use HasFactory<\Database\Factories\NewsViewFactory> */
    use HasFactory, SoftDeletes;
}
