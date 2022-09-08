<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use App\Models\City;

class Governorate extends Model
{

    use HasFactory;
    use Translatable;
    public $translatable = ['name'];
    public $disable_export = true;

    public function city()
    {
        return $this->hasMany(City::class, 'governorate_id');
    }

}
