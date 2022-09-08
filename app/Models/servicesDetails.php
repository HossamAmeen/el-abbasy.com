<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class servicesDetails extends Model
{
    public function detailsimages()
    {
        return $this->hasOne(DetailsImage::class, 'details_id');
    }
    use HasFactory;
    use Translatable;
    public $translatable = ['title', 'content','details'];
    public $disable_export = true;

}
