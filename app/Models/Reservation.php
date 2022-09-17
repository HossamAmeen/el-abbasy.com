<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Reservation extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = ['course_name', 'course_detail','course_duration', 'course_status', 'course_coach','course_cost_before', 'course_cost_after','course_reservation_cost','coach_info','course_type','specialty',];
    public $disable_export = true;

}
