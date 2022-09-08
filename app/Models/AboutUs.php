<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class AboutUs extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = ['title', 'content'];
    public $disable_export = true;
}
