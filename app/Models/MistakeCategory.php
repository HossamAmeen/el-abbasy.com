<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class MistakeCategory extends Model
{
    use HasFactory;
    use Translatable;
    public $disable_export = true;
    public $translatable = ['name'];

    public function mistakes()
    {
        return $this->hasMany(Mistake::class);
    }
}
