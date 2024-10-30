<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
   use HasFactory;

   protected $fillable = [
        'name',
        'standard',
        'class_teacher',
        'admission_date',
        'salary',
        'address',
        'contact',
        'email',
        'status'
   ];
}
