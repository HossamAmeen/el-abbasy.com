<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    public $additional_attributes = ['name'];
    public $disable_export = true;

    public function career_form()
    {
        return $this->belongsTo(CareerForm::class);
    }

    public function getNameAttribute()
    {
      return "{$this->job_title} - {$this->company_name} - {$this->note}";
    }
}
