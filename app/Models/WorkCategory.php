<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class WorkCategory extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = ['name'];
    public $disable_export = true;
    public function work_sub_categories(){
        return $this->hasMany(WorkSubCategory::class);
    }
}
