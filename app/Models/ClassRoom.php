<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'standard',
        'class_teacher',
        'total_students',
        'status'
    ];
}
