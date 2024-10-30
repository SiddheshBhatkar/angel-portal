<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     use HasFactory, Notifiable;

     protected $fillable = [
        'name',
        'standard',
        'classroom',
        'admission_date',
        'address',
        'parental_contact',
        'parental_email',
        'status'
    ];
}
