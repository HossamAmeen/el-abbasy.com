<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class ApartmentSubStep extends Model
{
    use HasFactory;
    public $table = 'apartment_sub_step';
    public $additional_attributes = ['name'];

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }

    public function sub_step(){
        return $this->belongsTo(SubStep::class);
    }

    public function getNameAttribute()
    {
      return "{$this->sub_step->name} - {$this->apartment->with_user_name}";
    }

}
