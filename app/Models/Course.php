<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Course extends Model
{
    use Translatable;
    use HasFactory;
    public $translatable = [ 'course_name',
        'course_detail',
        'course_duration',
        'course_coach',
        'course_cost_before',
        'course_cost_after',
        'course_reservation_cost',
        'coach_info','explain_points'];
        
        public function course_reservation()
        {
            return $this->belongsTo(CourseReservation::class);
        }

}
