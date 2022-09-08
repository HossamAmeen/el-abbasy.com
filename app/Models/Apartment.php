<?php

namespace App\Models;
use App\Models\Contract;
use App\Models\Step;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    public $additional_attributes = ['with_user_name'];
    public $disable_export = true;

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }
    public function steps()
    {
        return Step::join('sub_steps', 'steps.id', '=', 'sub_steps.step_id')
        ->join('apartment_sub_step', 'sub_steps.id', '=', 'apartment_sub_step.sub_step_id')
        ->where('apartment_sub_step.apartment_id', '=', $this->id)
        ->select('steps.*')->distinct()->get();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sub_steps(){
        return $this->belongsToMany(SubStep::class)->withPivot('order', 'id');
    }

    public function getWithUserNameAttribute()
    {
      return "{$this->user->name} - {$this->address}";
    }
}
