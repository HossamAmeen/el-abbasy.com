<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Branches extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = ['name', 'address'];
    public $disable_export = true;

    public function phones()
    {
        return $this->hasMany(phoneNumbers::class, 'branch_id');
    }

}
