<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class SubStep extends Model
{
    use HasFactory;
    use Translatable;
    public $additional_attributes = ['step_name'];
    public $translatable = ['name', 'status'];
    public $disable_export = true;

    public function step()
    {
        return $this->belongsTo(Step::class);
    }
    public function sub_images()
    {
        return $this->hasManyThrough(StepImage::class, ApartmentSubStep::class,
         'sub_step_id',
         'apartment_sub_step_id',
         'id',
         'id');
    }

    public function apartments(){
        return $this->belongsToMany(Apartments::class)->withPivot('order', 'id');
    }
    public function getStepNameAttribute()
    {
        return "{$this->name} - {$this->step->name}";
    }
}
