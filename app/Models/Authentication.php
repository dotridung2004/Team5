<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Authentication extends Model
{
    /** @use HasFactory<\Database\Factories\AuthenticationFactory> */
    use HasFactory, Notifiable, SoftDeletes;
}
