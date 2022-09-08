<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Mistake extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = ['name', 'content', 'mistake_content', 'solution_content', 'suggest_content'];
    public $disable_export = true;

    public function mistake_category()
    {
        return $this->belongsTo(MistakeCategory::class);
    }
}
