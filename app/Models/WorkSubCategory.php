<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class WorkSubCategory extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = ['name'];
    public $additional_attributes = ['with_category'];
    public $disable_export = true;
    public function work_category(){
        return $this->belongsTo(WorkCategory::class);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function getWithCategoryAttribute(){
        return "{$this->name} - {$this->category->name}";
    }

}
