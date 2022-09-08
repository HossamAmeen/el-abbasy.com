<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CareerForm extends Model
{
    use HasFactory;

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    public $allow_export_all = true;
    public $export_handler = \App\Exports\CareerFormsExport::class;
}
