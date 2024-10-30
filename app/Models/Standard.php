<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'subjects',
        'fees',
        'total_students',
        'status'
    ];
}
