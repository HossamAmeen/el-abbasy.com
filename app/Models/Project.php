<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Project extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = ['name', 'content', 'image_title', 'image_content'];
    public $disable_export = true;

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
