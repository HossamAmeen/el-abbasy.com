<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use App\Models\SubStep;

class Step extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = ['name' , 'status'];
    public $additional_attributes = ['concate_step_name'];
    public $disable_export = true;

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function sub_steps(int $apartment_id)
    {
        return SubStep::join('steps', 'steps.id', '=', 'sub_steps.step_id')
        ->join('apartment_sub_step as pivot', 'sub_steps.id', '=', 'pivot.sub_step_id')
        ->where('steps.id', '=', $this->id)
        ->where('pivot.apartment_id', '=', $apartment_id)
        ->select('sub_steps.*')->get();
    }

    public function getConcateStepNameAttribute()
    {
      $user_apartment = $this->apartment;
      $apartment_address = $user_apartment->address;
      $user_name = $user_apartment->user->name;

      return "{$this->name} - {$apartment_address} - {$user_name}";
    }
}
