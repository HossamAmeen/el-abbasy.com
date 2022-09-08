<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class PackagesDetail extends Model
{
    use HasFactory;
    use Translatable;
    public $disable_export = true;
    public $translatable = ['name', 'content' ];
    public function package()
    {
        return $this->belongsToMany(Package::class);
    }
}
