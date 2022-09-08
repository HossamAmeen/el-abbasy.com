<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Work extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = ['name', 'content', 'image_title', 'image_content', 'location'];
    public $disable_export = true;

    public function work_sub_category(){
        return $this->belongsTo(WorkSubCategory::class);
    }
}
