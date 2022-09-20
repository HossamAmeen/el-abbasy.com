<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseReservation extends Model
{
    use HasFactory;
    
    public $fillable = [
    'course_id',
    'name',
    'nationality',
    'national_id',
    'phone_number',
    'email',
    'degree','specialty',
    'collage',
    'university',
    'favourite_time',
    'favourite_attendees',
    'payment_time','payment_option','payment_method','national_id'
];
public function course(){
    return $this->belongsTo(Course::class);
}
}
