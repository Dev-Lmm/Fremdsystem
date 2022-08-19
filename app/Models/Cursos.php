<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cursos extends Model {
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'id',
        'name',
        'nivel',
        'calificacion_final',
        'calificacion_actividad',
        'actividad',
        'maestro',
        'cupo',
        'user_id',
    ];
}