<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends \TCG\Voyager\Models\Permission
{
    use HasFactory;
    public $disable_export = true;

}
