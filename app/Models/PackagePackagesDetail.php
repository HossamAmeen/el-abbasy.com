<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePackagesDetail extends Model
{
    use HasFactory;
    //public $table = 'package_packages_details';
    public $additional_attributes = ['name'];

    public function package(){
        return $this->belongsTo(PackagesDetail::class);
    }

    public function packagedetails(){
        return $this->belongsTo(Package::class);
    }
}
