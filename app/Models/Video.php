<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public $disable_export = true;
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
