<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Service extends Model
{
    use Translatable;
    use HasFactory;
    public $translatable = ['name', 'content'];
    public $disable_export = true;

}
