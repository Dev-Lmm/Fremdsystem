<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//spatie
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Alumno extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
}
