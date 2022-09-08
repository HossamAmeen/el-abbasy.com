<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepImage extends Model
{
    use HasFactory;
//    protected $casts = [
//        'image' => 'array',
//    ];
    public $disable_export = true;

    public function step()
    {
        return $this->hasOne(Step::class);
    }
    public function substep()
    {
        return $this->hasOne(SubStep::class);
    }
}
