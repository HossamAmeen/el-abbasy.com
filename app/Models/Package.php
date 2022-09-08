<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Package extends Model
{

    use Translatable;
    public $disable_export = true;
    public $translatable = ['name', 'content', 'policy', 'term'];

    public function packagedetails()
    {
        return PackagesDetail::join('package_packages_details', 'packages_details.id', '=', 'package_packages_details.packages_detail_id')
            ->where('package_packages_details.package_id', '=', $this->id)
            ->select('packages_details.*')->distinct()->get();

      //  return $this->belongsToMany(PackagesDetail::class);
    }

    use HasFactory;
}
