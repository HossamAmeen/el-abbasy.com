<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class teamWork extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = ['name','title', 'content'];
    public $disable_export = true;

}
