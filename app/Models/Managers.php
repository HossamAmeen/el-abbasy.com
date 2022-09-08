<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Managers extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = ['name','title','type', 'content'];
    public $disable_export = true;
}
