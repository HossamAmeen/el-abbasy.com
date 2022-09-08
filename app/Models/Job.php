<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Job extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = [ 'name', 'title', 'requirements' ,'functional_tasks'];
    public $disable_export = true;

}
